<?
require "loginstuff.php";
require 'globalheader.php';
?>

            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabup"><a href="index.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
                            <td class="tabup"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>
<!-- start of displayhhtype -->

<?
$hh_id = $_REQUEST['hh_id'];
if ( (strlen($_REQUEST['hh_type']) > 0) && (strlen($_REQUEST['hh_desc']) > 0)  && (isset($_REQUEST['edit']) ) )
{
	$hh_type = $_REQUEST['hh_type'];
	$hh_desc = $_REQUEST['hh_desc'];
	
	echo $sqladd = "UPDATE devicetracker.handheld_type SET type='$hh_type', description='$hh_desc' WHERE Id = $hh_id";
	$rsadd = mysql_query($sqladd, $connect) or die (mysql_error());
	
	?>
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
	<tr>

	<th class="ok">Handheld updated</th>
	<th></th>

	<th></th>
	<th></th>
	<th></a></th>
	<th>&nbsp;</a></th>
	<th></a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
	<script type="text/javascript">
	
	location.href="hhtypes.php";
	</script>
	
	<?
	
	
}
else
{

?>
<?


$sql = "SELECT * FROM troubador_device.handheld_type WHERE Id = $hh_id";
$rs = mysql_query($sql, $connect);
$fetch = mysql_fetch_assoc($rs);

$hh_type = $fetch['type'];
$hh_desc = $fetch['description'];


?>

<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
<tr>
	<th class="asc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">ID</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=RealName&#38;dir=desc">&nbsp;</a></th>

	<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Type</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Description</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=privs&#38;dir=desc">&nbsp;</a></th>
	<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Count</a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">

	<tr>
	<th class="asc"></a></th>
	<th></th>

	<th><input value="<?=$hh_type?>" name="hh_type" size="10" class="edit" id="sitename" tabindex="1" type="text"></th>
	<th></th>
	<th><input value="<?=$hh_desc?>" name="hh_desc" size="20" class="edit" id="sitename" tabindex="1" type="text"></a></th>
	<th>&nbsp;<input name="hh_id" type="hidden" value="<?=$hh_id?>"</th>
	<th><input value="edit" name="edit" tabindex="6" type="submit"></a></th>
	<th>&#160;</th>
	<th>&#160;</th>
	
	</tr>
	</form>



</table>
<?

}

?>

<p class="prev-next">1/1</p>
<form method="post" action="index.php"><div style="margin: auto; text-align: center;">View <select name="qty" class="list" onchange="submit(this.form);">
	<option value="15">15</option>
	<option value="25" selected="selected">25</option>
	<option value="50">50</option>
	<option value="100">100</option>

</select> per page<input type="hidden" value="admin" name="event" /><input type="hidden" value="admin_change_pageby" name="step" /><noscript> <input type="submit" value="Go" class="smallerbox" /></noscript></div></form>
<div style="margin: 3em auto auto auto; text-align: center;">


<p id="moniker">Logged in as <span>ardas</span><br /><a href="index.php?logout=1">Logout</a></p>

</div>
</body>
</html>