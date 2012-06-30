<?
header("content-type: text/xml");
$hh_userid = $_GET['hh_userid'];
$hh_type = $_GET['hh_type'];


echo '<?xml version="1.0"?><user>
        <hh_message>'.hh_save_testmessage.'</hh_message>	
        <random>'.$_GET['rnd'].'</random></user>';
		
die();


?>