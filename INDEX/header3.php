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
<script type="text/javascript" src="javascript/sortedtable-event.js"></script>
<script type="text/javascript" src="javascript/sortedtable.js"></script>

<script type="text/javascript" src="javascript/sortedtable-event.js"></script>
<script type="text/javascript" src="javascript/sortedtable.js"></script>

<title>Device Tracker</title>
<link href="default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
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
