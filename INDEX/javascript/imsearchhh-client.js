function runajaxsearch(fadin)
{

    var type = document.getElementById("type").value;
	var rnd = Math.random();

	  //start of ajaxRequest code
		var ajaxRequest;  // The variable that makes Ajax possible!
        document.getElementById("imsearchhh-container").innerHTML = "<img src='ajax-loader.gif'/>";     
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
      
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){


			document.getElementById("imsearchhh-container").innerHTML = ajaxRequest.responseText;


		}
	}

   ajaxRequest.open("GET", "imsearchhh-server.php?type="+type+'&rnd='+rnd, true);

	ajaxRequest.send(null);
	//location.href="imsearchhh.php?handheld_id="+handheld_id+getstring;

  // end of sendRequest code
}