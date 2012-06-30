<?

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