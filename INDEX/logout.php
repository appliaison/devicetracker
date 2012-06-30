
<script type="text/javascript">

location.replace('imsearchhh.php');
</script>
<?
if (!isset($headers['Authorization'])){
	header('HTTP/1.1 401 Unauthorized');
	header('WWW-Authenticate: NTLM', false);
	exit;
}
?>
session_start();
session_destroy();


