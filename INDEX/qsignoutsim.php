<?
require "loginstuff.php";
require "globalheader-quicksearch.php";
include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
$query_string = $_SEREVR['QUERY_STRING'];

?>
            <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td valign="middle" style="width:368px">&nbsp;</td>
							<td class="tabdown"><a href="home.php" class="plain">Home</a></td>
                            <td class="tabdown"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabup"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
						<td class="tabdown2"><a href="imsearchsim-run.php" class="plain">Search SIM</a></td>
						<td class="tabdown2"><a href="quicksearchsim.php" class="plain">Quicksearch</a></td>
						 <td class="tabdown2"><a href="qsigninsim.php" class="plain">Quicksignin</a></td>
						 <td class="tabup"><a href="qsignoutsim.php" class="plain">Quicksignout</a></td>
						<td class="tabdown2"><a href="addsim.php" class="plain">Add SIM</a></td>
						<td class="tabdown2"><a href="displayhistorysim.php" class="plain">History</a></td>
                    </table>
                </td>
            </tr>

        </table>