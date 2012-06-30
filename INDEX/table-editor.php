<html>
<head>
<link rel="stylesheet" type="text/css" href="stylenew.css" />
<script type="text/javascript" src="jquery.pack.js"></script>
<script type="text/javascript" src="jquery.tablesorter.js"></script>
<script type="text/javascript" src="jquery.tableEditor.js"></script>
<script type="text/javascript" src="validate.js"></script>

<script type="text/javascript">
$().ready(function() {	
	$("#editableTable").tableSorter({ 
		sortClassAsc: 'ASC', 		// class name for ascending sorting action to header
		sortClassDesc: 'DESC',	// class name for descending sorting action to header
		headerClass: 'header', 				// class name for headers (th's)
		disableHeader: 0 
	}).tableEditor({
		SAVE_HTML: '<img src="yes.png">',
		EDIT_HTML: '<img src="edit.png">',
		EVENT_LINK_SELECTOR: 'button.edit',
		COL_APPLYCLASS: true,
		ROW_KEY_SELECTOR: 'p.key',
		FUNC_POST_EDIT: 'postEdit'
	});
	
	$('#addNew').click(function() {
		var options = {
			CLASS: 'newRow', 
			VALUES: {
				email: 'auto@populated.com',
				chicago: 'bearsch'
			}
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
	
	$('#addCopy').click(function() {
		var options = {
			KEY: -1,
			COPY: true
		};
		jQuery.tableEditor.lib.appendRow(options);
	});
});

// inject validation
function postEdit(o) {
	var inputSelector = 'input.pvV';
	var submitSelector = '../td button.edit'
	
	PommoValidate.reset();
	PommoValidate.init(inputSelector, submitSelector, true, o.row);
}
</script>

</head>
<body>


<p>Using a unique KEY for the new row
(0 by default) will allow your data source updater to ADD vs. UPDATE
the row. The datasource updater is likely an ajax submit defined in your
FUNC_UPDATE.</p>


<button id="addNew" class="b">Add New Row</button>
<button id="addCopy" class="b">Add Row Copy</button>
<br/><br/>

<table id="editableTable" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th name="ID"></th>
			<th name="email" class="pvV pvEmail">Email</th>

			<th name="first" class="pvV pvEmpty">First Name</th>
			<th name="last" class="pvV pvEmpty">Last Name</th>
			<th name="age" class="pvV pvNumber pvEmpty">Age</th>
			<th name="chicago">Chicago</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td><p class="key">1</p> <button class="edit"><img src="edit.png"></button></td>
			<td>hates.spam@iceburg.net</td>
			<td>Brice</td>
			<td>Burgess</td>
			<td>26</td>

			<td>Bears</td>
		</tr>
		<tr>
			<td><p class="key">2</p> <button class="edit"><img src="edit.png"></button></td>
			<td>hurricane@ditka</td>
			<td>Mike</td>

			<td>Ditka</td>
			<td>62</td>
			<td>Francheesi</td>
		</tr>
		<tr>
			<td><p class="key">3</p> <button class="edit"><img src="edit.png"></button></td>

			<td>berghoff@gone.com</td>
			<td></td>
			<td>Berghoff <cry></td>
			<td>99</td>
			<td>Free Bacon</td>
		</tr>
		<tr>

			<td><p class="key">4</p> <button class="edit"><img src="edit.png"></button></td>
			<td>jazz@mpark.com</td>
			<td>Mill</td>
			<td>Green</td>
			<td>67</td>
			<td>Organ</td>

		</tr>
		<tr>
			<td><p class="key">5</p> <button class="edit"><img src="edit.png"></button></td>
			<td>marina</td>
			<td>towers</td>
			<td>is</td>

			<td>bueno</td>
			<td>River</td>
		</tr>
	<tr>
		<td><p class="key">2020</p> <button class="edit"><img src="edit.png"></button></td>
		<td><input type="text" value="abc@123.com"></input></td>
		<td>Iam</td>

		<td>FormMan</td>
		<td><select name="age"><option>3</option><option>17</option><option>21</option><option SELECTED>33</option><option>55</option><option>88</option><option>119</option></select></td>
		<td><input type="checkbox" checked></input></td>
	</tr>
	</tbody>

</table>

<br>

</body>
</html>
