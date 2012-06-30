<?
	require 'db.php';
	session_start();
	if(!session_is_registered("email")){
	header("location:index.php");
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
	<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Device Tracker</title>
<link href="default.css" rel="stylesheet" type="text/css" />

<?

$session_email_not_set = (!isset($_SESSION['email']));
echo "test" . $session_email_not_set;
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
<body id="page-admin">
	  <table id="pagetop" cellpadding="0" cellspacing="0">
  <tr id="branding"><td>
  <a href="http://svv-db:8090/devicetracker/index.php"><h1 id="textpattern">Textpattern</h1></a>
  </td><td id="navpop">