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
                            <td class="tabup"><a href="handhelds.php" class="plain">Handhelds</a></td>
                            <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
                            <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>

                        </tr>
                    </table></td></tr>
            <tr id="nav-secondary">
                <td align="center" class="tabs" colspan="2">

                    <table cellpadding="0" cellspacing="0" align="center"><tr>
                            <td class="tabdown2"><a href="index.php" class="plain">Search HH</a></td>
							<td class="tabup"><a href="quicksearchhh.php" class="plain">Quicksearch</a></td>
							 <td class="tabdown2"><a href="qsigninhh.php" class="plain">Quicksignin</a></td>
							 <td class="tabdown2"><a href="qsignouthh.php" class="plain">Quicksignout</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                           
                    </table>
                </td>
            </tr>

        </table>
		<? 
		require 'checkadmin.php';
		?>
        <?
        require "imsearchhh-constructsearchform-quicksearch.php";
        ?>
        <div class="content"  >
            <!-- start of right frame - search results -->
            <!-- start of block for displaying handheld using handheld_id -->
            <?
            if (strlen($_GET['handheld_id'])>0)
            {
                require "imsearchhh-displayhandheld.php";

            }
            ?>

            <!-- end of block for displaying handheld using handheld_id -->
            <?

              ?>
             <span class="ok" id="imsearchhh-container" >  </span>
            <?
             if (isset($_REQUEST['type']))
            {

                if (strlen($_REQUEST['type']) > 0 )
                {

                    require "imsearchhh-server-quicksearch.php";

                }

            }

            ?>


            <!-- end of right frame - search results -->
        </div>
        <div style="margin: 3em auto auto auto; text-align: center;">
            <form method="GET" action="<?=$_SERVER['PHP_SELF']?>">
                <p id="moniker">Logged in as <span><? echo $user; ?> </span><br />
                <?
				//echo $sqlhh;
				?>
				</p>
            </form>
            <!-- start of overlay form -->
            <div id="filter"></div>

            <div id="box">
                <span id="boxtitle"></span>
                <span class="ok" id="returned_value" ></span>

                <span class="ok" id="hh_save_returned_value" ></span>

            </div>
            <!-- end of overlay form -->

            <!-- start of history box overlay -->
            <div id="filter"></div>

            <div id="historybox">
                <span id="boxtitle"></span>
                <input type="button" name="cancel" value="Cancel" onclick="closehistorybox()">
                <span class="ok" id="history_returned_value" ></span>


                <span class="ok" id="hh_save_returned_value" ></span>
                <input type="button" name="cancel" value="Cancel" onclick="closehistorybox()">

            </div>
            <!-- end of history box overlay  -->
            <!-- start of delete box overlay -->
            <div id="deletebox">
                <span id="deleteboxtitle"></span>
                <span class="ok" id="delete_returned_value" ></span>


                <span class="ok" id="delete_hh_save_returned_value" ></span>
            </div>
            <!-- end of delete box overlay -->

    </body>
</html>

