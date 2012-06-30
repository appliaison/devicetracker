<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');
	session_start();
	if(!session_is_registered("email"))
	{
	header("location:index.php");
	}
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<script type="text/javascript" src="javascript/sortedtable-event.js"></script>
<script type="text/javascript" src="javascript/sortedtable.js"></script>

<script type="text/javascript" src="javascript/sortedtable-event.js"></script>
<script type="text/javascript" src="javascript/sortedtable.js"></script>

<title>Device Tracker</title>
<link href="default.css" rel="stylesheet" type="text/css" />


<style type="text/css">

a 
{ 
color: white; 
}
</style>

<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
</head>
<body>
<!-- start of header navigation -->
<table id="pagetop" cellpadding="0" cellspacing="0" >
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">
  <form method="get" action="index.php" class="navpop" style="display: inline;">

</form></td></tr>
  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
  <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
			<td class="tabup"><a href="displaysim-sorted.php" class="plain">Display SIM</a></td>
			<td class="tabdown2"><a href="searchsim.php" class="plain">Search SIM</a></td>
			<td class="tabdown2"><a href="signoutsim.php" class="plain">Sign-out SIM</a></td>
			<td class="tabdown2"><a href="signinsim.php" class="plain">Sign-in SIM</a></td>
			<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
			<td class="tabdown2"><a href="editsim.php" class="plain">Edit SIM</a></td>
			<td class="tabdown2"><a href="removesim.php" class="plain">Remove SIM</a></td>
			
			</tr></table></td>
			</tr>
</table>

<!-- end of header navigation -->
<script type="text/javascript">
function moveRows(s,d) {
var a = new Array();
for (var o in s.selectedElements) {
a.push(s.selectedElements[o]);
}
for (var o in a) {
var elm = a[o];
var tds = elm.getElementsByTagName('td');
for (var i in tds) {
if (tds[i].headers) tds[i].headers = d.table.id+''+tds[i].headers.substr(d.table.id.length);
}
d.body.appendChild(a[o]);
d.deselect(a[o]);
d.init(d.table);
d.sort();
s.deselect(a[o]);
s.init(s.table);
}
}
</script>

<div class="content">

<table class="sorted regroup" cellpadding="0" cellspacing="0" style="margin:0 0 20px 40px;">
<thead>
<tr>
<th style="cursor: pointer;" id="order" class="sortedplus"><span>simcard_id</span></th>
<th style="cursor: pointer;" id="sim_iccid"><span>ICCID</span></th>
<th style="cursor: pointer;" id="sim_carrier"><span>Carrier</span></th>
<th style="cursor: pointer;" id="assigned_to"><span>Assigned To</span></th>
<th style="cursor: pointer;" ><span>&nbsp;</span></th>
<th style="cursor: pointer;" id="sim_pin"><span>IMSI</span></th>
<th style="cursor: pointer;" ><span>&nbsp;</span></th>
<th style="cursor: pointer;" id="sim_pin"><span>MSISDN</span></th>
<th style="cursor: pointer;" id="sim_notes"><span>Notes</span></th>
</tr>
</thead>
<tfoot>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tfoot>
<tbody>
<?php
$sql = "SELECT * FROM troubador_device.simcards22";
$rs = mysql_query($sql, $connect);
$counter = 0;
while ($fetch = mysql_fetch_assoc($rs) ) 
{
	
	?>
	<tr class="<? if ($counter%2) { echo 'even'; } else { echo 'odd'; }?>" style="cursor: pointer;" >	
	<td axis="date" headers="order" ><?echo $simcard_id = $fetch['simcard_id']?></td>
	<td axis="date" headers="sim_iccid"><?=$fetch['ICCID']?></td>
	<td axis="date" headers="sim_carrier"><?=$fetch['Carrier']?></td>
	<td axis="date" headers="assigned_to"><?
	echo $Assigned_To= $fetch['Assigned_To'];	
	?></td>
    <td>&nbsp;</td>
	<td axis="date" headers="sim_pin"><? echo   $fetch['IMSI']; ?></td>
    <td>&nbsp;</td>
    <td axis="date" headers="sim_pin"><? echo   $fetch['MSISDN']; ?></td>
	<td axis="date" headers="sim_notes"><? echo   $fetch['Notes']; ?></td>
	</tr>
<?
	$counter++;
}
?>



</tbody>

</table>
<dl>


</div>

<script type="text/javascript">
var sourceTable, destTable;
function init() {
sourceTable = new SortedTable('s');
destTable = new SortedTable('d');
mySorted = new SortedTable();
mySorted.colorize = function() {
for (var i=0;i<this.elements.length;i++) {
if (i%2){
this.changeClass(this.elements[i],'even','odd');
} else {
this.changeClass(this.elements[i],'odd','even');
}
}
}
mySorted.onsort = mySorted.colorize;
mySorted.onmove = mySorted.colorize;
mySorted.colorize();
secondTable = SortedTable.getSortedTable(document.getElementById('id'));
secondTable.allowDeselect = false;
}
init();

</script>
</body>
</html> 