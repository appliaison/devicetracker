<html>
<head>
<title>Ajax auto-suggest / auto-complete | BrandSpankingNew</title>


<script type="text/javascript" src="javascript/bsn.AutoSuggest_c_2.0.js"></script>

<link rel="stylesheet" href="css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />

<style type="text/css">

	body {
		font-family: Lucida Grande, Arial, sans-serif;
		font-size: 10px;
		text-align: center;
		margin: 0;
		padding: 0;
	}
	
	table
	{
		border: 1px;
		background-color: #999;
		font-size: 10px;
	}
	tr
	{
		vertical-align: top;
	}
	th
	{
		text-align: left;
		background-color: #ccc;
	}
	th,
	td
	{
		padding: 2px;
		font-family: Lucida Grande, Arial, sans-serif;
		font-size: 1.2em;
	}
	td
	{
		background-color: #fff;
	}
	
	a {
		font-weight: bold;
		text-decoration: none;
		color: #f30;
	}
	
	a:hover {
		color: #fff;
		background-color: #f30; 
	}
	
	#wrapper {
		width: 600px;
		margin: 10px auto;
		text-align: left;
	}
	
	#content {
		font-size: 1.2em;
		line-height: 1.8em;
	}
	
	#content h1 {
		font-size: 1.6em;
		border-bottom: 1px solid #ccc;
		padding: 5px 0 5px 0;
	}

	#content h2 {
		font-size: 1.2em;
		margin-top: 3em;
	}








	label
	{
		font-weight: bold;
	}








	
</style>


</head>
<body>

<div id="wrapper">
<div id="content">

<p>view the <a href="http://www.brandspankingnew.net/archive/2006/08/ajax_auto-suggest_auto-complete.html">original article</a> at BrandSpankingNew</p>
	
<h1>Autosuggest / Autocomplete with Ajax <small>v. 2.0</small></h1>

<p>Here's <strong>Version 2</strong> of my Ajax-powered auto-suggestion, or auto-complete textfield.</p>

<h2>What's new?</h2>

<ul>
	<li>Optional JSON Support</li>
	<li>Callback function support (set ID when user selects list item, or anything else...)</li>
	<li>Display extra information (see XML example below)</li>
	<li>Am optional message can be displayed when no results are returned</li>
	<li>Completes field when enter key is pressed</li>
	<li>Slick new look (2.0 ready!) inspired by <a href="http://www.inquisitorx.com/safari/" title="spotlight for the web">Inquisitor</a></li>
	<li>Matching input is highlighted in the list</li>
	<li>Fade effect!</li>
	<li>Available as a single, bundled JS file</li>
	<li>More feature, less bug</li>
	<li>CSS provided in an external folder, for easy tinkering</li>
</ul>

<h2>Example (JSON)</h2>

<div>
<form method="get" action="">
	<small style="float:right">Hidden ID Field: <input type="text" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" /></small>
	<label for="testinput">Person</label>
	<input style="width: 200px" type="text" id="testinput" value="" /> 
	<input type="submit" value="submit" />
</form>
</div>

<h2>Description</h2>

<p>The AutoSuggest class adds a pulldown menu of suggested values to a text field. The user can either click directly on a suggestion to enter it into the field, or navigate the list using the up and down arrow keys, selecting a value using the enter key. The values for the suggestion list are to provided as XML, <em>or as JSON</em> (by a PHP script, or similar).</p>

<p>The results of the first request are cached on the client machine and are filtered as the user continues to type, to reduce the number of requests hitting the server.</p>

<p>In the JSON example above a callback function is passed to the autoSuggest instance. It is called when the user selects an entry, and inserts the entry id into a hidden field (visible for this example).</p>

<p>In the XML example below supplementary information is being displayed along with the names, in this case an english county.</p>

<h2>Example (XML)</h2>

<div>
<form method="get" action="">
	<label for="testinput_xml">Person</label>
	<input type="text" id="testinput_xml" value="" style="width:300px" /> 
	<br /><br /><input type="submit" value="submit" />
</form>
</div>



<h2>Usage</h2>

<p>The script requires a single javascript file to be included in the HEAD:</p>

<ul>
	<li><code>bsn.AutoSuggest_c_2.0.js</code></li>
</ul>

<p><a href="http://www.brandspankingnew.net/download.php?file=autosuggest_v2.zip" title="download the zip archive"><strong>Get the files here!</strong></a></p>

<p>A normal text field is transformed into an AutoSuggest text field by adding the following javascript to your code, either in a <code>body.onload</code> function or just before the <code>&lt;/body&gt;</code> tag.</p>

<pre><code>var options = {
	script: "pathToScript.php?",
	varname: "variableName",
	json: true
};
var as = new AutoSuggest('idOfTextfield', options);</code>
</pre>

<p>The <code>options</code> object contains the (surprise, surprise) the options for the AutoSuggest instance. Note that the script variable includes the question mark (<code>?</code>) at the end. This is to allow other variables to be passed to the script via <code>GET</code>, for example <code>script: "http://www.yourserver.com/backend.php?list=countries&amp;"</code>. The <code>varname</code> option is the name of the variable that should contain the current value of the text field, and is simpy added on to the end of the script variable when the script is called, along with the current value of the text field, giving:</p>

<p><code>http://www.yourserver.com/backend.php?list=countries&amp;variableName=currentValue</code></p>

<p>The XML output from the script should have the following structure:</p>

<pre><code>&lt;results&gt;
	&lt;rs id="1" info=""&gt;Foobar&lt;/rs&gt;
	&lt;rs id="2" info=""&gt;Foobarfly&lt;/rs&gt;
	&lt;rs id="3" info=""&gt;Foobarnacle&lt;/rs&gt;
&lt;/results&gt;</code>
</pre>

<p>A JSON object should have the following structure:</p>

<pre><code>{ results: [
	{ id: "1", value: "Foobar", info: "Cheshire" },
	{ id: "2", value: "Foobarfly", info: "Shropshire" },
	{ id: "3", value: "Foobarnacle", info: "Essex" }
] }</code>
</pre>

<p>The AutoSuggest object creates the following XHTML code, inserting as the last element in the <code>body</code>:</p>

<pre><code>
&lt;div style=&quot;left: 347px; top: 1024px; width: 400px;&quot; class=&quot;autosuggest&quot; id=&quot;as_testinput_xml&quot;&gt;
	&lt;div class=&quot;as_header&quot;&gt;
		&lt;div class=&quot;as_corner&quot;&gt;&lt;/div&gt;
		&lt;div class=&quot;as_bar&quot;&gt;&lt;/div&gt;
	&lt;/div&gt;
	&lt;ul id=&quot;as_ul&quot;&gt;
		&lt;li&gt;
			&lt;a name=&quot;1&quot; href=&quot;#&quot;&gt;
			&lt;span class=&quot;tl&quot;&gt; &lt;/span&gt;
			&lt;span class=&quot;tr&quot;&gt; &lt;/span&gt;
			&lt;span&gt;&lt;em&gt;W&lt;/em&gt;aldron, Ashley&lt;br&gt;&lt;small&gt;Leicestershire&lt;/small&gt;&lt;/span&gt;
			&lt;/a&gt;
		&lt;/li&gt;
		&lt;li&gt;
			&lt;a name=&quot;2&quot; href=&quot;#&quot;&gt;
			&lt;span class=&quot;tl&quot;&gt; &lt;/span&gt;
			&lt;span class=&quot;tr&quot;&gt; &lt;/span&gt;
			&lt;span&gt;&lt;em&gt;W&lt;/em&gt;heeler, Bysshe&lt;br&gt;&lt;small&gt;Lincolnshire&lt;/small&gt;&lt;/span&gt;
			&lt;/a&gt;
		&lt;/li&gt;
	&lt;/ul&gt;
	&lt;div class=&quot;as_footer&quot;&gt;
		&lt;div class=&quot;as_corner&quot;&gt;&lt;/div&gt;
		&lt;div class=&quot;as_bar&quot;&gt;&lt;/div&gt;
	&lt;/div&gt;
&lt;/div&gt;
</code>
</pre>

<p>The list can then be styled using normal CSS. Check out the CSS file.</p>


<p>
	NOTE: Safari seems to require that the <code>position</code> attribute of the <code>body</code> element be set to <code>relative</code>.
</p>


<h2>Options</h2>

<p>The options object can contain the following properties:</p>

<table>
	<tr>
		<th>Property</th>
		<th>Type</th>
		<th>Default</th>
		<th>Description</th>
	</tr>
	<tr>
		<td><strong>script</strong></td>
		<td>String</td>
		<td>-</td>
		<td><strong>REQUIRED!</strong> The path to the script that returns the results in XML format.</td>
	</tr>
	<tr>
		<td><strong>varname</strong></td>
		<td>String</td>
		<td>"input"</td>
		<td>Name of variable passed to script holding current input.</td>
	</tr>
	<tr>
		<td><strong>minchars</strong></td>
		<td>Integer</td>
		<td>1</td>
		<td>Length of input required before AutoSuggest is triggered.</td>
	</tr>
	<tr>
		<td><strong>className</strong></td>
		<td>String</td>
		<td>"autosuggest"</td>
		<td>Value of the class name attribute added to the generated <code>ul</code>.</td>
	</tr>
	<tr>
		<td><strong>delay</strong></td>
		<td>Integer</td>
		<td>500</td>
		<td>Number of milliseconds before an AutoSuggest AJAX request is fired.</td>
	</tr>
	<tr>
		<td><strong>timeout</strong></td>
		<td>Integer</td>
		<td>2500</td>
		<td>Number of milliseconds before an AutoSuggest list closes itself.</td>
	</tr>
	<tr>
		<td><strong>cache</strong></td>
		<td>Boolean</td>
		<td>true</td>
		<td>Whether or not a results list should be cached during typing.</td>
	</tr>
	<tr>
		<td><strong>offsety</strong></td>
		<td>Integer</td>
		<td>-5</td>
		<td>Vertical pixel offset from the text field.</td>
	</tr>
	<tr>
		<td><strong>shownoresults</strong></td>
		<td>Boolean</td>
		<td>true</td>
		<td>Whether to display a message when no results are returned.</td>
	</tr>
	<tr>
		<td><strong>noresults</strong></td>
		<td>String</td>
		<td>No results!</td>
		<td>No results message.</td>
	</tr>
	<tr>
		<td><strong>callback</strong></td>
		<td>Function</td>
		<td>&nbsp;</td>
		<td>
			A function taking one argument: an object
			<br />
			<br />
			<pre><code>{id:"1", value:"Foobar", info:"Cheshire"}</code></pre>
		</td>
	</tr>
	<tr>
		<td><strong>json</strong></td>
		<td>Boolean</td>
		<td>false</td>
		<td>Whether or not a results are returned in JSON format. If not, script assumes results are in XML.</td>
	</tr>
</table>

<h3>Timeouts</h3>

<p>
	The default timeout is set at 2500 milliseconds. After two and a half seconds of inactivity the list closes itself. However, this timeout is reset each time the user types another character. Furthermore, if the user moves the mouse pointer over the AutoSuggest list, the timeout is cancelled altogether, until the mouse pointer is moved off the list.
</p>

<h3>AJAX Errors</h3>

<p>At the moment, AJAX errors simply trigger a javascript <code>alert()</code> containing the error code.</p>

</div>
</div>


<script type="text/javascript">
	var options = {
		script:"newtest.php?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('testid').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
	var options_xml = {
		script:"newtest.php?",
		varname:"input"
	};
	var as_xml = new AutoSuggest('testinput_xml', options_xml);
</script>











<!-- BlogCounter Code START -->
<p><a href="http://www.blogcounter.de/" id="bclink" title="kostenloser Counter fuer Weblogs"><span id="bccount" style="font-size:8px">kostenloser Counter</span></a></p><script type="text/javascript" src="http://track.blogcounter.de/js.php?user=gulfstream&amp;style=6"></script><noscript><p><a href="http://www.blogcounter.de/"><img style="border: 0px;" alt="Weblog counter" src="http://track.blogcounter.de/log.php?id=gulfstream"/></a></p></noscript>
<!-- BlogCounter Code END -->





</body>
