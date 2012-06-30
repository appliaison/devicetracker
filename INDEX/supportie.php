<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
<title>Collapsible 3-Column Layout</title>

<style type='text/css'>
.jsLink {
  border-bottom:1px dotted #09C;
  cursor:pointer;
}


/* 3 col flanking menus */

  

/* All the content boxes belong to the content class. */
.content {
position:relative; /* Position is declared "relative" to gain control of stacking order (z-index). */
width:auto;
min-width:400px;
margin:20px 10px 10px 350px;
border:1px solid black;
background-color:white;
padding:0px;
z-index:3; /* This allows the content to overlap the right menu in narrow windows in good browsers. */
}

#navAlpha {
position:absolute;
width:300px;
top:100px;
left:20px;
border:1px dashed black;
background-color:#eee;
padding:10px;
z-index:2;

/* Here is the ugly brilliant hack that protects IE5/Win from its own stupidity. 
Thanks to Tantek Celik for the hack and to Eric Costello for publicizing it. 
IE5/Win incorrectly parses the "\"}"" value, prematurely closing the style 
declaration. The incorrect IE5/Win value is above, while the correct value is 
below. See http://glish.com/css/hacks.asp for details. */
voice-family: "\"}\"";
voice-family:inherit;
width:300px;
}
/* I've heard this called the "be nice to Opera 5" rule. Basically, it feeds correct 
length values to user agents that exhibit the parsing error exploited above yet get 
the CSS box model right and understand the CSS2 parent-child selector. ALWAYS include
a "be nice to Opera 5" rule every time you use the Tantek Celik hack (above). */
body>#navAlpha {width:300px;}



</style>
<link href="default.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/lightbox-form.css">


</head>

<body>
<!-- start of header nav -->
	<table id="pagetop" cellpadding="0" cellspacing="0">
	  <tr id="branding"><td>
	  <a href="http://svv-db:8090/devicetracker/index2.php"><h1 id="textpattern">Textpattern</h1></a>
	  </td><td id="navpop">
	<frameset rows="*" cols="180,*" framespacing="0" frameborder="NO" border="0">
	  <frame src="search_menu.php" name="leftFrame" scrolling="yes" noresize>
	  <frame src="search_results.php" name="mainFrame">
	</frameset>

	  <form method="get" action="index.php" class="navpop" style="display: inline;">

	</form>
	</td></tr>
	  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
			<table cellpadding="0" cellspacing="0" align="center"><tr>
	  <td valign="middle" style="width:368px">&nbsp;</td>
	  <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
	  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>	
	  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

	  </tr>
	  </table></td></tr>
	  <tr id="nav-secondary">
	  <td align="center" class="tabs" colspan="2">

				<table cellpadding="0" cellspacing="0" align="center"><tr>
				<td class="tabdown2"><a href="searchhh.php" class="plain">Search HH</a></td>
				<td class="tabup"><a href="imsearchhh.php" class="plain">Search HH (im)</a></td>
				<td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
				
				<td class="tabdown2"><a href="addhhtype.php" class="plain">Add HH Type</a></td>
				<td class="tabdown2"><a href="displayhhtype.php" class="plain">Display HH Types</a></td>
				<td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
				<td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
				</table>
		</td>
		</tr>
	</table>

<!-- end of header nav -->
<!-- Center Column -->

<div class="content">
  <h1>Collapsible 3-Column Layout</h1>

  <p>This is an example of taking one of the popular three-column CSS layouts from <a href='http://bluerobot.com/'>BlueRobot.com</a> and adding a little javascript to enable collapsible left and right columns.</p>
  <p>The purpose of this exercise is to utilize a proven CSS layout without modifying the original CSS or original html structure.</p>
  <p>The <a href='xtoolbar.html'>xToolbar</a> demo also makes use of this CSS layout.</p>
  <p>Enjoy,<br />Mike Foster</p>

  <p><i>updated: 12Jan07</i></p>
  <p>
  <button onclick='toggleAlpha()'>Toggle Alpha Column</button>
  <button onclick='toggleBeta()' style='margin-left:20px'>Toggle Beta Column</button>
  </p>
</div>



<!-- Absolutely Positioned Left and Right Columns -->

<div id="navAlpha">
 <p><a href='http://www.earlychristianwritings.com/q-synopsis-young.html'>Lk 6:27-36</a> "But I say to you who are hearing, Love your enemies, do good to those hating you, bless those cursing you, and pray for those accusing you falsely; and to him smiting thee upon the cheek, give also the other, and from him taking away from thee the mantle, also the coat thou mayest not keep back. And to every one who is asking of thee, be giving; and from him who is taking away thy goods, be not asking again; and as ye wish that men may do to you, do ye also to them in like manner; and -- if ye love those loving you, what grace have ye? for also the sinful love those loving them; and if ye do good to those doing good to you, what grace have ye? for also the sinful do the same; and if ye lend to those of whom ye hope to receive back, what grace have ye? for also the sinful lend to sinners -- that they may receive again as much. But love your enemies, and do good, and lend, hoping for nothing again, and your reward will be great, and ye shall be sons of the Highest, because He is kind unto the ungracious and evil; be ye therefore merciful, as also your Father is merciful."</p>
  <p><a href='http://www.misericordia.edu/users/davies/thomas/Trans.htm'>13</a> Jesus said to his disciples, "Compare me to something and tell me what I am like." Simon Peter said to him, "You are like a just messenger." Matthew said to him, "You are like a wise philosopher." Thomas said to him, "Teacher, my mouth is utterly unable to say what you are like." Jesus said, "I am not your teacher. Because you have drunk, you have become intoxicated from the bubbling spring that I have tended."</p>

  
</div>



</body>
</html>