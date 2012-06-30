
function activate_checkbox(me)
{ 
	var checked = me.checked;

	
	var ck = document.getElementById(me);
	if (ck.checked)
	{
		ck.checked = false;
	}
	else
	{
		ck.checked = true;
	}
	
	me.checked = checked; // checkbox action
	//me.checked = true; // radiobox action
} 