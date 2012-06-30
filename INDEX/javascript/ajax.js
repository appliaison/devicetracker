  //	Alex Pedwysocki
 //	2008-01
//	This page is full of javascript functions that are mostly designed to facilitate the ajaxy elements of the
//searchhandheld.jsp page.  The two major features are input (text) boxes that are automatically added to a form
//and a dropdown menu that acts on those very same boxes.  Either of these are simple ideas but combined they are
//a mite bit complicated.

//These boxes were designed to make things a bit simpler for the db admin.  Requested by Peggy Collier.

//The first two functions are designed to add boxes directly to the form.  Javascript only, no jsp backend or other
//elements involved here.  Boxes come in the varieties of input
//and output, and each has two boxes.  These functions essentially create a new div and populate it with some
//html and then append it to the end of a div inside the page.
//The added html contains the code for a pair of text input boxes.  One of these boxes is complex because it is
//using an ajax dropdown menu and contains javascript commands of its own.
function addInBox() {
	var ni = document.getElementById('inDiv');
	var numi = document.getElementById('inValue');
	var num = (document.getElementById('inValue').value - 1) + 2;	//The '... -1) +2' thing is to make sure it stays as a value.  Using '... + 1' it just tacks a '1' onto the end of a string.
	numi.value = num;
	var newdiv = document.createElement('div');
	var divIdName = 'in'+num+'Div';
	newdiv.setAttribute('id',divIdName);
	newdiv.innerHTML = '<input type=text name=ti onBlur="setTimeout(\'shutDown(\\\'ti' + num + '\\\');\', 250);" onkeyup="typeSuggest(\'ti' + num + '\',event);" autosuggest=off id=ti' + num +' size=15> / <input type=text name=ai size=5> or <input type=text name=pi size=10><br><div id=ti' + num + 'sug class="sugdiv"></div>';
	ni.appendChild(newdiv);
}

function addOutBox() {
	var ni = document.getElementById('outDiv');
	var numi = document.getElementById('outValue');
	var num = (document.getElementById('outValue').value - 1) + 2;
	numi.value = num;
	var newdiv = document.createElement('div');
	var divIdName = 'out'+num+'Div';
	newdiv.setAttribute('id',divIdName);
	newdiv.innerHTML = '<input type=text name=to onBlur="setTimeout(\'shutDown(\\\'to' + num + '\\\');\', 250);" onkeyup="typeSuggest(\'to' + num + '\',event);" autosuggest=off id=to' + num +' size=15> / <input type=text name=ao size=5> or <input type=text name=po size=10><br><div id=to' + num + 'sug class="sugdiv"></div>';
	ni.appendChild(newdiv);
}

//AJAX code borrowed from www.dynamicajax.com ajax suggest tutorial
//modified enough to make it work the the dynamically placed boxes that required autosuggesting
//Gets the browser specific XmlHttpRequest Object
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Where did you even find a browser that didn't support XmlHttpRequest?\nThat must have been difficult.");
	}
}



//this is required to hold the id of the box in question AND the event AND the current up/down selectory thing
//we can only hold data on one box at a time with this method
//if they figure out how to type into more than one box at once we're toast
function idholder() {
	var id = "";
	var kc = 0;		//holds data on the keycode of the last button pressed
	var sel = 0;		//holds data on which dropdown box item is selected currently
	var maxsel = 0;	//holds data on the maximum value selectable in the current dropdown box
}


idx = new idholder();
idx.sel=0;
idx.maxsel=0;
//now we have a global variable idx that the following functions can use to transfer data between one another.
//sort of sloppy but the code does not always support direct passing of data and storage.

//this is our ajax object
var searchReq = getXmlHttpRequestObject();

//Called from keyup on the search textbox.
//Starts the AJAX request.
function typeSuggest(id,ev) {

	idx.id = id;
	idx.kc = ev.keyCode;
	var str = escape(document.getElementById(id).value);

	if ((searchReq.readyState == 4 || searchReq.readyState == 0)
		&& idx.kc != 13 && idx.kc != 38 && idx.kc != 40) {

		if (str.length < 1) { return; }

		searchReq.open("GET", 'suggest.php?search=' + str, true);
		searchReq.onreadystatechange = handleSearchSuggest;
		searchReq.send(null);
	}

	keyPoll();	//calls keyPoll() which checks to see if a special key has been pressed
}

//Called when the AJAX response is returned.
//this one actually constructs the response and places it into the required div.
//The response is a series of divs which can be independently selected.
function handleSearchSuggest() {
	if (searchReq.readyState == 4) {
		var ss = document.getElementById(idx.id + 'sug');
		ss.innerHTML = '';
		var str = searchReq.responseText.split("\n");
		for(i=1; i < str.length - 1; i++) {
			//Build our element string.
			var suggest = '<div onmouseover="javascript:suggestOver(this);" ';
			suggest += 'id="sug' + (i) + '" ';
			suggest += 'onmouseout="javascript:suggestOut(this);" ';
			suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';
			suggest += 'class="suggest_link">' + str[i] + '</div>';
			ss.innerHTML += suggest;
		}
		idx.maxsel = str.length-2;
	}
}

//Mouse over function for dropdown menu items
function suggestOver(div_value) {
	div_value.className = 'suggest_link_over';
}
//Mouse out function for dropdown menu items
function suggestOut(div_value) {
	div_value.className = 'suggest_link';
}

//Click function for dropdown menu items
function setSearch(value) {
	document.getElementById(idx.id).value = value;
	document.getElementById(idx.id+'sug').innerHTML = '';
	idx.sug=0;
}

//Custom function to shut down the result box when the element in question loses focus
//Needs to wait a quarter second to let the box register a click
function shutDown(id) {
	document.getElementById(id + 'sug').innerHTML = '';	//empty the suggestion box
	idx.sel=0;	//reset the suggestion box to zero (unused)
}


//keyPoll looks for up or down keys pressed while in a dropdown-capable box.
//These keys have the ability to change the focus of a dropdown menu when there is one available so they
//get special treatement.  Mostly this function changes the value of idx.sel and moves the 'focus'
//where the 'focus' item refers to the selected dropdown menu item.
function keyPoll() {


	switch(idx.kc) {
	case 38: //up arrow!
		//change the value of idx.sel and move the focus up

		if (idx.sel > 1) { suggestOut(document.getElementById('sug' + idx.sel)); }
		if (idx.sel > 1) { idx.sel--; }
		if (idx.sel > 0) { suggestOver(document.getElementById('sug' + idx.sel)); }
		break;

	case 40: //down arrow!
		//change the value of idx.sel and move the focus down

		if (idx.sel > 0) { suggestOut(document.getElementById('sug' + idx.sel)); }
		if (idx.sel < idx.maxsel) { idx.sel++;}
		if (idx.sel != 0) { suggestOver(document.getElementById('sug' + idx.sel)); }
		break;

	}
}

//makes sure that 'enter' does not submit the form while scrolling through suggestion entries
//we do this by checking to see if there are active suggestion dropdowns -- there are if idx.sel
//is anything other than zero.  In that case, we need to 'select' the current dropdown item.
//this function is really only called to check the status of a form onsubmit, but I've hijacked it
//for my own purposes.
function readySubmit() {
	if (idx.sel != 0) {
		//When enter is pressed, place the contents of the selected div and put them in the text box
		//after that, clean everything else up -- close the sug div, set sel back to 0

		document.getElementById(idx.id).value = document.getElementById('sug' + idx.sel).innerHTML;
		idx.sel = 0;
		idx.maxsel = 0;
		document.getElementById(idx.id + 'sug').innerHTML= '';

		//this bit added to switch the focus back to the proper element in IE
		if (!document.getSelection) { document.getElementById(idx.id).focus(); }

		return false;	//don't submit yet, we're not ready
	}
	else return true;
}



//Below are functions that are actually not solely for the main search page
//such as this one, which checks to make sure a variety of fields are numeric
function isNumeric(sText) {

	var ValidChars = "0123456789.";
	var IsNumber=true;
	var Char;


	for (i = 0; i < sText.length && IsNumber == true; i++) {
		Char = sText.charAt(i);
		if (ValidChars.indexOf(Char) == -1) {
			IsNumber = false;
		}
	}
	return IsNumber;
}

//hhval is a proprietary form validation function.  It is passed a form object and returns a boolean value
//if the form's properties are acceptable (ie the correct fields are numeric).
function hhval(f) {

	if (!isNumeric(f.assignednumber.value)) {
		alert("Assigned Number must be a number.");
		return false;
	}
	

	

	if (!isNumeric(f.MB.value)) {
		alert("MB must be a number.");
		return false;
	}

	return true;
}

//to prevent searching by nonnumber assigned numbers
//used in searchhandheld.jsp
function execval(f) {
	if(!isNumeric(f.AssignedNumber.value)) {
		alert("Assigned Number must be a number.");
		return false;
	}
	return true;
}
