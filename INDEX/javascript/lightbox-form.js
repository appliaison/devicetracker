
function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}


// Open the lightbox


function openbox(formtitle, fadin, getstring)
{
	var handheld_id = document.getElementById("handheld_id").value;
	var formtitle_id = formtitle;
	var getstringvalue = getstring;
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
	  //start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById("returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-populateedit.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id+'&getstringvalue='+getstringvalue, true);
	ajaxRequest.send(null); 
	
  // end of sendRequest code 
  var box = document.getElementById('box'); 
  document.getElementById('filter').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  
  if(fadin)
  {
	 gradient("box", 0);
	 fadein("box");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

// start of historybox
function openhistorybox(formtitle, fadin)
{
	var handheld_id = document.getElementById("handheld_id").value;
	var formtitle_id = formtitle;
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
	  //start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById("history_returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-populatehistorybox.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id, true);
	ajaxRequest.send(null); 
	
  // end of sendRequest code 
  var box = document.getElementById('historybox'); 
  document.getElementById('filter').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  
  if(fadin)
  {
	 gradient("historybox", 0);
	 fadein("historybox");
  }
  else
  { 	
    box.style.display='block';
  }  	
}


// end of historybox

// start of deletebox
function opendeletebox(formtitle, fadin)
{
	var handheld_id = document.getElementById("handheld_id").value;
	var formtitle_id = formtitle;
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
	  //start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById("delete_returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-populatedeletebox.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id, true);
	ajaxRequest.send(null); 
	
  // end of sendRequest code 
  var box = document.getElementById('deletebox'); 
  document.getElementById('filter').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  
  if(fadin)
  {
	 gradient("deletebox", 0);
	 fadein("deletebox");
  }
  else
  { 	
    box.style.display='block';
  }  	
}
// end of deletebox



// start of openbox2
function openbox2(formtitle, fadin)
{
	var handheld_id = document.getElementById("handheld_id2").value;
	var formtitle_id = formtitle;
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
	  //start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById("returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-populateedit.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id, true);
	ajaxRequest.send(null); 
	
  // end of sendRequest code 
  var box = document.getElementById('box'); 
  document.getElementById('filter').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  
  if(fadin)
  {
	 gradient("box", 0);
	 fadein("box");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

// end of openbox2

// Close the lightbox

function closebox()
{
   document.getElementById('box').style.display='none';
   document.getElementById('filter').style.display='none';
   document.getElementById("hh_save_returned_value").innerHTML = '';
}

function closedeletebox()
{
   document.getElementById('deletebox').style.display='none';
   document.getElementById('filter').style.display='none';
   document.getElementById("hh_save_returned_value").innerHTML = '';
}

function closehistorybox()
{
   document.getElementById('historybox').style.display='none';
   document.getElementById('filter').style.display='none';
   document.getElementById("hh_save_returned_value").innerHTML = '';
}

var http = createRequestObject();

function createRequestObject() {  
	// find the correct xmlHTTP, works with IE, FF and Opera
	var xmlhttp;
	try {
  	xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
  catch(e) {
    try {
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch(e) {
    	xmlhttp=null;
    }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
  	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function sendRequest() {

	var handheld_id = document.getElementById("handheld_id").value;

	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
		try
		{
		http.open("GET", "server-populateeditbox.php?handheld_id="+handheld_id+'&rnd='+rnd, true);
		http.setRequestHeader('Content-Type',  "text/xml");
		http.onreadystatechange = handleResponse;
		http.send(null);
		}
		catch(e){
			// caught an error
			//alert('Request send failed.');
			alert(e);
		}
		finally{}
		// disable button until end of response
		//document.getElementById('go').disabled = true;
		//document.getElementById('go').value = "Hold On";
		// hide any previous returned values
		document.getElementById('returned_value').style.display="none";
	}
	else
	{
		document.getElementById("returned_value").innerHTML = '<br /><strong>Please fill in the required fields</strong> ';
	}
}

function handleResponse() {
	try{
    if((http.readyState == 4)&&(http.status == 200)){
    	var response = http.responseXML.documentElement;
    	var hh_message = response.getElementsByTagName('hh_message')[0].firstChild.nodeValue;
    	// write out response
	  //document.getElementById("returned_value").innerHTML = '<br /><strong>Response from server:</strong>: '+hh_message ;
	  document.getElementById("returned_value").innerHTML = hh_message;
	  

      // re-enable the button
      //document.getElementById('go').disabled = false;
      //document.getElementById('go').value = "Submit";
      document.getElementById('returned_value').style.display="";
		}
  }
	catch(e){
		// caught an error
		//alert('Not added.');
		alert(e);
	}
	finally{}
}

// start of signoutbox
function opensignoutbox(formtitle, fadin)
{
	var handheld_id = document.getElementById("handheld_id").value;
	var formtitle_id = formtitle;
	var rnd = Math.random();
	if ( (handheld_id.length >0) )
	{
	  //start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			document.getElementById("delete_returned_value").innerHTML = ajaxRequest.responseText;
			
		}
	}
	ajaxRequest.open("GET", "server-populatesignoutsigninbox.php?handheld_id="+handheld_id+'&rnd='+rnd+'&formtitle_id='+formtitle_id, true);
	ajaxRequest.send(null); 
	
  // end of sendRequest code 
  var box = document.getElementById('deletebox'); 
  document.getElementById('filter').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  
  if(fadin)
  {
	 gradient("deletebox", 0);
	 fadein("deletebox");
  }
  else
  { 	
    box.style.display='block';
  }  	
}
// end of signoutbox

// start of hh_save_signoutsignin_sendRequest





// end of hh_save_signoutsignin_sendRequest()
