<?php

$input = strip_tags(trim($_POST['inputdata']));

function ValidateInput($FormInput)
{
	if(empty($FormInput))
		return false;
	else
		return true;
}

if(ValidateInput($input))
	echo 1;
else
	echo 0;

?>