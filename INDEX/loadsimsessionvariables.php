<?

// qty
if (strlen($_REQUEST['qty']) > 0)
{
  $qty = $_REQUEST['qty'];
  //$_SESSION['qty'] = $qty;
}
else
{
  
  if (!(strlen($_SESSION['qty'])>0))
  {	
	$qty = $fetch['settings_value'];
	//$_SESSION['qty'] = $fetch['settings_value'];
  }
  
}

// sim_carrier
if (isset($_REQUEST['sim_carrier']) > 0)
{
  $sim_carrier = $_REQUEST['sim_carrier'];
  //$_SESSION['sim_carrier'] = $sim_carrier;
}
else
{
  //$sim_carrier = $_SESSION['sim_carrier'];
}
// sim_location
if (strlen($_REQUEST['sim_location']) > 0)
{
 $sim_location = $_REQUEST['sim_location'];
  //$_SESSION['sim_location'] = $sim_location;
}
else
{
  //$sim_location = $_SESSION['sim_location'];
}

// sim_iccid
if (isset($_REQUEST['sim_iccid']) > 0)
{
  $sim_iccid = $_REQUEST['sim_iccid'];
  //$_SESSION['sim_imsi'] = $sim_imsi;
}
else
{
  //$sim_imsi = $_SESSION['sim_imsi'];
}

// sim_imsi
if (isset($_REQUEST['sim_imsi']) > 0)
{
  $sim_imsi = $_REQUEST['sim_imsi'];
  //$_SESSION['sim_imsi'] = $sim_imsi;
}
else
{
  //$sim_imsi = $_SESSION['sim_imsi'];
}
// sim_msisdn
if (isset($_REQUEST['sim_msisdn']) > 0)
{
 $sim_msisdn = $_REQUEST['sim_msisdn'];
  //$_SESSION['sim_msisdn'] = $sim_msisdn;
}
else
{
  //$sim_msisdn = $_SESSION['sim_msisdn'];
}

// user_id
if (strlen($_REQUEST['sim_user_id']) > 0)
{
  $sim_user_id = $_REQUEST['sim_user_id'];
  //$_SESSION['sim_user_id'] = $sim_user_id;
}
else
{
  //$sim_user_id = $_SESSION['sim_user_id'];
}


// available_only
if (strlen($_REQUEST['sim_available_only']) > 0)
{
  $sim_available_only = $_REQUEST['sim_available_only'];

}
?>