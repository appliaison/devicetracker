<?
require "loginstuff.php";
require 'globalheader.php';
?>

            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabdown"><a href="index.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabup"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabup"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>

<!-- start of export -->		
<?
require 'checkadmin.php';
?>
<div style="margin: 3em auto auto auto; text-align: center;">
<p>Report Generation (Please note that it takes about 10 minutes to generate this report. Please be patient.)</p>
<br/>
<input type="button" name="generate handheld history" value="generate handheld history" onclick="generatehandheldhistory(); return false;" />
<br/>
<span class="ok" id="returned_value" ></span>

</div>


</html>