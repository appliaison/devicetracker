function prevalidate()
{
	
	var hh_type = document.getElementById("type").value;
	var handheld_location = document.getElementById("handheld_location").value;
	var assigned_num = document.getElementById("assigned_num").value;
	var revision_num = document.getElementById("revision_num").value;
	var pin = document.getElementById("pin").value;
	var imei = document.getElementById("imei").value;
	var pin = document.getElementById("pin").value;
	var imei = document.getElementById("imei").value;
	var bootrom_version = document.getElementById("bootrom_version").value;
	var cpr = document.getElementById("cpr").value;
	var userid = document.getElementById("userid").value;
	alert(userid);
	/*if ( (hh_type == 'any') and (handheld_location == 'any') and (assigned_num.length == 0) and (revision_num.length == 0) and (pin.length == 0) and (imei.length == 0) 
	and (bootrom_version.length == 0) and (cpr.length == 0) )
	{
		alert ('Nothing filled in');
	}
	*/
	
	//submitform();

}

function submitform()
{
  document.hhsearchform.submit();
}