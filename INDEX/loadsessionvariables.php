<?

// qty
if (strlen($_REQUEST['qty']) > 0)
{
  $qty = $_REQUEST['qty'];
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
if (strlen($_REQUEST['type']) > 0)
{
  $type = $_REQUEST['type'];
  //$_SESSION['type'] = $type;
}
else
{
  //$type = $_SESSION['type'];
}


// handheld_location
if (strlen($_REQUEST['handheld_location']) > 0)
{
  $handheld_location = $_REQUEST['handheld_location'];
  //$_SESSION['handheld_location'] = $handheld_location;
}
else
{
  //$handheld_location = $_SESSION['handheld_location'];
}

// assigned_num
if (isset($_REQUEST['assigned_num']) > 0)
{
  $assigned_num = $_REQUEST['assigned_num'];
  //$_SESSION['assigned_num'] = $assigned_num;
}
else
{
  //$assigned_num = $_SESSION['assigned_num'];
}
// revision_num
if (isset($_REQUEST['revision_num']) > 0)
{
  $revision_num = $_REQUEST['revision_num'];
  //$_SESSION['revision_num'] = $revision_num;
}
else
{
  //$revision_num = $_SESSION['revision_num'];
}
// PIN
if (isset($_REQUEST['pin']) > 0)
{
  $pin = $_REQUEST['pin'];
  //$_SESSION['pin'] = $pin;
}
else
{
  //$pin = $_SESSION['pin'];
}

// MEID
if (isset($_REQUEST['meid']) > 0)
{
  $meid = $_REQUEST['meid'];
  //$_SESSION['meid'] = $meid;
}
else
{
	//$meid = $_SESSION['meid'];
}
// IMEI
if (isset($_REQUEST['imei']) > 0)
{
  $imei = $_REQUEST['imei'];
  //$_SESSION['imei'] = $imei;
}
else
{
	//$imei = $_SESSION['imei'];
}
// bootrom_version
if (isset($_REQUEST['bootrom_version']) > 0)
{
  $bootrom_version = $_REQUEST['bootrom_version'];
  //$_SESSION['bootrom_version'] = $bootrom_version;
}
else
{
  //$bootrom_version = $_SESSION['bootrom_version'];
}

// CPR
if (isset($_REQUEST['cpr']) > 0)
{
  $cpr = $_REQUEST['cpr'];
  //$_SESSION['cpr'] = $cpr;
}
else
{
  //$cpr = $_SESSION['cpr'];
}

// userid
if (isset($_REQUEST['userid']) > 0)
{
  $userid = $_REQUEST['userid'];
  //$_SESSION['userid'] = $userid;
}
else
{
  //$userid = $_SESSION['userid'];
}

// hh_available_only
if (isset($_REQUEST['hh_available_only']) > 0)
{
	$hh_available_only = $_REQUEST['hh_available_only'];
	//$_SESSION['hh_available_only'] = $hh_available_only;

}
else
{
	//$hh_available_only = $_SESSION['hh_available_only'];
}

// hh_is_secure
if (isset($_REQUEST['hh_is_secure']) > 0)
{
	$hh_is_secure = $_REQUEST['hh_is_secure'];
	//$_SESSION['hh_is_secure'] = $hh_is_secure;

}
else
{
	//$hh_is_secure = $_SESSION['hh_is_secure'];
}

// hh_is_not_secure
if (isset($_REQUEST['hh_is_not_secure']) > 0)
{
	$hh_is_not_secure = $_REQUEST['hh_is_not_secure'];
	//$_SESSION['hh_is_not_secure'] = $hh_is_not_secure;

}
else
{
	//$hh_is_not_secure = $_SESSION['hh_is_not_secure'];
}



// hh_is_corporate 
if (isset($_REQUEST['hh_is_corp']) > 0)
{
	$hh_is_corp = $_REQUEST['hh_is_corp'];
	//$_SESSION['hh_is_corp'] = $hh_is_corp;

}
else
{
	//$hh_is_corp = $_SESSION['hh_is_corp'];
}
// hh_is_otasl
if (isset($_REQUEST['hh_is_otasl']) > 0)
{
	$hh_is_otasl = $_REQUEST['hh_is_otasl'];
	//$_SESSION['hh_is_otasl'] = $hh_is_otasl;

}
else
{
	//$hh_is_otasl = $_SESSION['hh_is_otasl'];
}



?>