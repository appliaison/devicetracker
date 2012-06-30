<?
header("content-type: text/xml");
echo '<?xml version="1.0"?><user>
        <name>'.$_GET['name'].'</name><email>'.$_GET['email'].'</email>
        <random>'.$_GET['rnd'].'</random></user>';
		
		
die();
?>