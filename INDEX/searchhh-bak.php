<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');
	session_start();
	if(!session_is_registered("email"))
	{
	header("location:index.php");
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<script type="text/javascript" src="shortcuts.js"></script>
<script type="text/javascript">
function markCalled(id) {

	document.getElementById('type').focus();
}
function init() 
{
	document.getElementById('type').focus();
	shortcut.add("Ctrl+s", function() {
	markCalled("ctrl1");		
	});
	


}

</script>

<title>Device Tracker</title>
<link href="default.css" rel="stylesheet" type="text/css" />

<?

$session_email_not_set = (!isset($_SESSION['email']));
if ($session_email_not_set == 1)
{

 ?>
<!-- <script type="text/javascript">
location.replace('index.php');
</script>
-->
<?
}
?>
</head>
<?
//$type = $_POST['type'];
$handheld_location = $_POST['handheld_location'];
$AssignedNumber = $_POST['AssignedNumber'];
$PIN = $_POST['PIN'];

$sqlqty = "SELECT settings_value FROM settings WHERE settings_id = 1";
$rsqty = mysql_query($sqlqty, $connect);
$fetchqty = mysql_fetch_assoc($rsqty);



// qty
if (strlen($_POST['qty']) > 0)
{
  $qty = $_POST['qty'];
  $_SESSION['qty'] = $qty;
}
else
{
  
  if (!(strlen($_SESSION['qty'])>0))
  {	
	$qty = $fetch['settings_value'];
	$_SESSION['qty'] = $fetchqty['settings_value'];
  }
  
}

// handheld_type
if (strlen($_POST['type']) > 0)
{
  $type = $_POST['type'];
  $_SESSION['type'] = $type;
}
else
{
  $type = $_SESSION['type'];
}


// handheld_location
if (strlen($_POST['handheld_location']) > 0)
{
  $handheld_location = $_POST['handheld_location'];
  $_SESSION['handheld_location'] = $handheld_location;
}
else
{
  $handheld_location = $_SESSION['handheld_location'];
}

// assigned_num
if (isset($_POST['assigned_num']) > 0)
{
  $assigned_num = $_POST['assigned_num'];
  $_SESSION['assigned_num'] = $assigned_num;
}
else
{
  $assigned_num = $_SESSION['assigned_num'];
}
// revision_num
if (isset($_POST['revision_num']) > 0)
{
  $revision_num = $_POST['revision_num'];
  $_SESSION['revision_num'] = $revision_num;
}
else
{
  $revision_num = $_SESSION['revision_num'];
}
// PIN
if (isset($_POST['pin']) > 0)
{
  $pin = $_POST['pin'];
  $_SESSION['pin'] = $pin;
}
else
{
  $pin = $_SESSION['pin'];
}
// IMEI
if (isset($_POST['imei']) > 0)
{
  $imei = $_POST['imei'];
  $_SESSION['imei'] = $imei;
}
else
{
  $imei = $_SESSION['imei'];
}
// bootrom_version
if (isset($_POST['bootrom_version']) > 0)
{
  $bootrom_version = $_POST['bootrom_version'];
  $_SESSION['bootrom_version'] = $bootrom_version;
}
else
{
  $bootrom_version = $_SESSION['bootrom_version'];
}

// CPR
if (isset($_POST['cpr']) > 0)
{
  $cpr = $_POST['cpr'];
  $_SESSION['cpr'] = $cpr;
}
else
{
  $cpr = $_SESSION['cpr'];
}


?>
<body id="page-admin" onLoad="init()">

	<table id="pagetop" cellpadding="0" cellspacing="0">
	  <tr id="branding"><td>
	  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
	  </td><td id="navpop">
	<frameset rows="*" cols="180,*" framespacing="0" frameborder="NO" border="0">
	  <frame src="search_menu.php" name="leftFrame" scrolling="yes" noresize>
	  <frame src="search_results.php" name="mainFrame">
	</frameset>

	  <form method="get" action="index.php" class="navpop" style="display: inline;">

	</form>
	</td></tr>
	  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
			<table cellpadding="0" cellspacing="0" align="center"><tr>
	  <td valign="middle" style="width:368px">&nbsp;</td>
	  <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
	  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>	
	  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

	  </tr>
	  </table></td></tr>
	  <tr id="nav-secondary">
	  <td align="center" class="tabs" colspan="2">

				<table cellpadding="0" cellspacing="0" align="center"><tr>
				<td class="tabup"><a href="searchhh.php" class="plain">Search HH</a></td>
				<td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
				
				<td class="tabdown2"><a href="addhhtype.php" class="plain">Add HH Type</a></td>
				<td class="tabdown2"><a href="displayhhtype.php" class="plain">Display HH Types</a></td>
				<td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
				<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
				</table>
		</td>
		</tr>
	</table>

	<!-- start of the form -->		
<table>
<tr>
<td>

	<form action="searchhh.php" method="post" name="longform" ">
	<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

		<tr>	
		
		<td><a href=""><strong>Type</strong></a></td>
		<td>
		<select name="type" id="type" tabindex="1">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY type";
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
			// echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
			 
			if (strlen($type) > 0)
			{
				if ($_SESSION['type']	== $fetch['type'])
				{ 
				echo "<option value='" . $fetch['type'] . "'" . " selected" . ">" . $fetch['type'] . "</option>\n";  
				}
				else
				{
				  echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
				}

			}
			else
			{
				echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
			}
			 
		 
		}
		
	
				
		?>
		
	</select>
		
		</td>
		<td></td>
		<td>&nbsp;</td>

	</tr>
	<!-- start of location -->

		<tr>	
			
		<td><a href="">Location</a>
		</td>
		<td>
		<select name="handheld_location" tabindex="2">
		<option value="any" selected="selected" >ANY</option>

		<?php

		$sql = "SELECT name, id FROM troubador_device.location ";
		
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 //echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
		 
		 if (strlen($handheld_location) > 0)
			{
				if ($_SESSION['handheld_location']	== $fetch['id'])
				{ 
				echo "<option value='" . $fetch['handheld_location'] . "'" . " selected" . ">" . $fetch['name'] . "</option>\n";  
				}
				else
				{
				  echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
				}

			}
			else
			{
				echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
			}
		 }
		
		?>
		
	</select>
		
		</td>
		
		<td></td>
		<td>&nbsp;</td>

	</tr>

	<!-- end of location -->

	<!-- start of assigned number -->
	<tr>

		<th></th>	
		<th>&nbsp;</th>
		</tr>
		<tr>	

		<td><a href="">Assigned #</a>
		</td>
		<td>
		<input value="<?=$_SESSION['assigned_num']?>" name="assigned_num" size="20" class="edit" id="assigned_num" type="text" tabindex="3">
		</td>
		<td>&nbsp;</td>
		
	</tr>
	<!-- end of assigned# -->
	<!-- start of assigned number -->
	<tr>

		<th></th>
		<th>&nbsp;</th>
		</tr>
		<tr>	

		<td><a href="">Revision #</a>
		</td>
		<td>
		<input value="<?=$_SESSION['revision_num']?>" name="revision_num" size="20" class="edit" id="revision_num" type="text" tabindex="4">
		</td>
		<td>&nbsp;</td>
		
	</tr>
	<!-- end of assigned# -->
	<!-- start of pin -->
	<tr>

		<th></th>
		<th>&nbsp;</th>

		</tr>
		
		<tr>	
		
		<td><a href="">PIN</a>
		</td>
		
		<td>
		<input value="<?=$_SESSION['pin']?>" name="pin" size="20" class="edit" id="pin" type="text" tabindex="5">
		</td>
		<td>&nbsp;</td>
	</tr>
	<!-- end of pin -->
	<!-- start of IMEI -->
	<tr>

		<th></th>
		<th>&nbsp;</th>

		</tr>
		
		<tr>	
		
		<td><a href="">IMEI</a>
		</td>
		
		<td>
		<input value="<?=$_SESSION['imei']?>" name="imei" size="20" class="edit" id="imei" type="text" tabindex="6">
		</td>
		<td>&nbsp;</td>
	</tr>
	<!-- end of IMEI -->
	<!-- start of bootrom -->
	<tr>

		<th></th>
	
		<th>&nbsp;</th>

		
		</tr>
		
		<tr>	
		
		<td><a href="">Bootrom version</a>
		</td>
		
		<td>
		<input value="<?=$bootrom_version?>" name="bootrom_version" size="20" class="edit" id="bootrom_version" type="text" tabindex="7">
		</td>
		<td>&nbsp;</td>
	</tr>
	<!-- end of bootroom -->
	
	<!-- start of CPR -->
	<tr>

		<th></th>

		<th>&nbsp;</th>

		</tr>
		
		<tr>	
		
		<td><a href="">CPR</a>
		</td>
		
		<td>
		<input value="<?=$cpr?>" name="cpr" size="20" class="edit" id="cpr" type="text" tabindex="8">
		</td>
		<td>&nbsp;</td>
	</tr>
	<!-- end of CPR -->
	<!-- start of user -->
	<tr>

		<th></th>
		<th>

		<th>&nbsp;</th>

		
		<tr>	
		
		<td>
		<a href="">User</a>
		</td>
		<td>
		<select name="user" tabindex="9">
		<option value="any">ANY</option>

		<?php

		$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 order by username asc";
		
		$rs = mysql_query($sql, $connect);
		while ($fetch = mysql_fetch_assoc($rs))
		{
		 echo "<option value='" . $fetch['id'] . "'>" . $fetch['username'] . "</option>\n";  
		 }
		
		?>
		
	</select>
		
		</td>
		<td>&nbsp;</td>

	</tr>
	<!-- end of user-->
	<!-- start of available -->
		
	<tr>	
		
		<td><a href="">Available Only</a>
		</td>
		<td>
		<input type="checkbox" name="hh_available_only" 

		<?
		if ( ($_POST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		{
			echo 'checked="checked"';
			$_SESSION['hh_available_only'] = $_POST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="10"/>
		</td>
		<td>&nbsp;</td>

	</tr>
	<!-- end of available-->
	<!-- start of secure/insecure -->
	<tr>	
		
		<td><a href="">Secure / Insecure</a>
		</td>
		<td>
		<input type="checkbox" name="hh_is_secure" 

		<?
		if ( ($_POST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		{
			echo 'checked="checked"';
			$_SESSION['hh_available_only'] = $_POST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="11"/>
		</td>
		<td>&nbsp;</td>

	</tr>
	<!-- end of secure / insecure-->
	
	<!-- start of corporate -->
	<tr>	
		
		<td><a href="">Corporate</a>
		</td>
		<td>
		<input type="checkbox" name="hh_is_corp" 

		<?
		if ( ($_POST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		{
			echo 'checked="checked"';
			$_SESSION['hh_available_only'] = $_POST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="12"/>
		</td>
		<td>&nbsp;</td>

	</tr>
	<!-- end of corporate-->
	<!-- start of otasl -->
	<tr>	
		
		<td><a href="">OTASL</a>
		</td>
		<td>
		<input type="checkbox" name="hh_is_otasl" 

		<?
		if ( ($_POST['hh_available_only'] =="on") or ($_SESSION['hh_available_only']) )
		{
			echo 'checked="checked"';
			$_SESSION['hh_available_only'] = $_POST['hh_available_only'];
		}
		?>

		class="checkbox" tabindex="13"/>
		</td>
		<td>&nbsp;</td>

	</tr>
	<!-- end of otasl-->
	
	
	
	
	<!-- start of submit -->
	<tr>

		<td><input type="submit" value="Search" name="search" class="smallerboxsp" title="search"" tabindex="14"/></td>
		<td>&nbsp;</td>
	</tr>
		

	<!-- end of submit-->
	<tr>
	</tr>
	</table>
	</form>


</td>
<!-- start of right frame - search results -->
<td>
<?



if (isset($_REQUEST['type']))
{

	if (strlen($_POST['search']) > 0)
	{
		$type = $_POST['type'];
		$handheld_location = $_POST['handheld_location'];
		$assigned_num = $_POST['assigned_num'];
		$revision_num = $_POST['revision_num'];
		$type = $_REQUEST['type'];
		$hh_available_only = $_REQUEST['hh_available_only'];
		$pin = $_REQUEST['pin'];
		$imei = $_REQUEST['imei'];
		$bootrom_verion = $_REQUEST['bootrom_version'];
		$cpr = $_REQUEST['cpr'];
	 ?>
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tr>
		<th class="desc"><a href="index.php?step=list&#38;event=admin&#38;sort=name&#38;dir=desc">Type</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=email&#38;dir=desc">Asg#</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">CPR</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Status</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Secure</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Corp</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">OTASL</a></th>
		<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>

		
		<th>&#160;</th><th>&#160;</th></tr>
		
		<!-- start of dynamic rows -->	
		<?
		 $sqlhh = "SELECT * FROM troubador_device.handhelds WHERE (1=1) AND (userid <> 248) " ;
		
		if (isset($type))
		{
			if (!($type == 'any'))
			{
				$sqlhh .= " AND type='$type' ";
			}			
		 }
		 
		 if (isset($handheld_location))
		 {
		  if (strlen($handheld_location) > 0)
          {		  
		   if (!($handheld_location == 'any'))
			{
			
				$sqlhh .= "	AND loc_id=$handheld_location ";
			}
		  }
		 }
		 // available_only
		 if (strlen($_SESSION['hh_available_only'])>0)
		 {
		   if ($_SESSION['hh_available_only'])
			{
				$sqlhh .= "	AND Status='AVAILABLE' ";
			}
		 }
		 // assigned_num
		 if (isset($assigned_num))
		 {
		  if (strlen($assigned_num) > 0)
          {		  
		   if (!($assigned_num == 'any'))
			{
			
				$sqlhh .= "	AND AssignedNumber=$assigned_num ";
			}
		  }
		 }
		 
		 // revision_num
		 if (isset($revision_num))
		 {
		  if (strlen($revision_num) > 0)
          {		  
		   if (!($revision_num == 'any'))
			{
			
				$sqlhh .= "	AND RevisionNumber=$revision_num ";
			}
		  }
		 }
		 
		 // PIN
		 if (isset($pin))
		 {
		  if (strlen($pin) > 0)
          {		  
		   if (!($pin == ''))
			{
			
				$sqlhh .= "	AND PIN LIKE '$pin%' ";
			}
		  }
		 }
		 
		 // IMEI
		 if (isset($imei))
		 {
		  if (strlen($imei) > 0)
          {		  
		   if (!($imei == ''))
			{
			
				$sqlhh .= "	AND IMEI LIKE '$imei%' ";
			}
		  }
		 }
		 
		 // bootrom_version
		 if (isset($bootrom_verion))
		 {
		  if (strlen($bootrom_version) > 0)
          {		  
		   if (!($bootrom_version == ''))
			{
			
				$sqlhh .= "	AND bootrom LIKE '$bootrom_version%' ";
			}
		  }
		 }
		 
		 // CPR
		 if (isset($cpr))
		 {
		  if (strlen($cpr) > 0)
          {		  
		   if (!($cpr == ''))
			{
			
				$sqlhh .= "	AND CPR LIKE '$cpr%' ";
			}
		  }
		 }
		 
		 // qty
		if (strlen($_SESSION['qty']>0))
		{		
		  $sqlhh = $sqlhh . " LIMIT 0, " . $_SESSION['qty']*50 ;
			
		}
		else
		{
			$sqlhh = $sqlhh;
		}
		
		
		$resulthh = mysql_query($sqlhh, $connect);
		while ($fetch = mysql_fetch_assoc($resulthh))
		{
		?>
		<tr>	
		<td><?=$fetch['type']?></td>
		<td><? echo $fetch['AssignedNumber']?></td>

		<td><?=$fetch['RevisionNumber']?></td>
		
		<td><?=$fetch['PIN']?></td>
		
		<td><?=$fetch['IMEI']?></td>
		
		<td><?=$fetch['bootrom']?></td>
		
		<td><?=$fetch['CPR']?></td>
		
		<td><?
		$user_id = $fetch['userid'];
		$sqluser = "SELECT * FROM troubador_device.users WHERE Id = $user_id";
		$resultuser = mysql_query($sqluser, $connect);
		$fetchuser = mysql_fetch_assoc($resultuser);
		echo $fetchuser['username']?></td>
		
		<td><? echo substr($fetch['Notes'], 0, 10); ?></td>
		
		<td  <? if ($fetch['Status']=='SIGNED OUT') { echo 'class="not-ok"'; } else { echo 'class="ok"';} ?> ><strong><? echo $fetch['Status']; ?></strong></td>
		<td  <? if (!$fetch['is_secure']) { echo 'class="not-ok">INSECURE'; } else { echo 'class="ok"> SECURE';} ?></td>
		<td  <? if (!$fetch['is_corp']) { echo 'class="not-ok">TESTING'; } else { echo 'class="ok"> CORPORATE';} ?></td>
		<td  <? if (!$fetch['is_otasl']) { echo 'class="not-ok">NO'; } else { echo 'class="ok"> OTASL';} ?></td>
		<td><?
		
		$loc_id = $fetch['loc_id'];
		
		$sqllocation = "SELECT * FROM troubador_device.location WHERE id = $loc_id";
		$resultlocation = mysql_query($sqllocation, $connect);
		$fetchlocation = mysql_fetch_assoc($resultlocation);
		echo $fetchlocation['name'];
		?></td>


		</tr>
		<?
		}
		?>
		<!-- end of dynamic rows -->
		</table>
	  <?
	}
	
}

?>


</td>
<!-- end of right frame - search results -->
</tr>

</table>

<div style="margin: 3em auto auto auto; text-align: center;">
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<div style="margin: auto; text-align: center;">View 

	<?
	echo strlen($_SESSION['qty']);
	if (strlen($_SESSION['qty'])>0) 
	{
	?>
	<select name="qty" class="list" onchange="submit(this.form);">
	<?
	for ($i=0; $i < 3; $i++)
	{
		?>
		<option value="<? echo $i; ?>" <? if ($_SESSION['qty']==$i) { echo 'selected="selected"'; }?>>
		<?
		if ($i==1) echo "50";
		else if ($i==2) echo "100";
		else echo "All";
		?>
		</option>
		<?
	}
	?>
	</select> 
	<?
	}
	else
	{
	  ?>
	  <select name="qty" class="list" onchange="submit(this.form);">
		<option value="1">50</option>
		<option value="2" selected="selected">100</option>
		<option value="0">All</option>
        </select> 
	  <?
	}
	?>
	per page<input type="hidden" value="admin" name="event" />
<input type="hidden" value="admin_change_pageby" name="step" /><noscript> 
<input type="submit" value="Go" class="smallerbox" /></noscript></div>
</form>

<?
include 'footer.php';

echo $sqlhh;
echo "<br>";
echo "qty : " . $_SESSION['qty'];
echo "<br>";
echo "available only : " . $hh_available_only;
echo "<br>";
echo "handheld location : " . $handheld_location;
?>
