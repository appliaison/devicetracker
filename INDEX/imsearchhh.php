<?
require "loginstuff.php";
require 'globalheader.php';
include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
?>

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
                            <td class="tabup"><a href="imsearchhh.php" class="plain">Search HH</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
                            <td class="tabdown2"><a href="addhhtype.php" class="plain">Add HH Type</a></td>
                            <td class="tabdown2"><a href="displayhhtype.php" class="plain">Display HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>
        <?
        require "imsearchhh-constructsearchform.php";
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

                    require "imsearchhh-server.php";

                }

            }

            ?>


            <!-- end of right frame - search results -->
        </div>
        <div style="margin: 3em auto auto auto; text-align: center;">
            <form method="GET" action="<?=$_SERVER['PHP_SELF']?>">
                <div style="margin: auto; text-align: center;">View

                    <?
                    if (strlen($_SESSION['qty'])>0)
                    {
                        ?>
                    <select name="qty" class="list" onchange="submit(this.form);">
                            <?
                            for ($i=0; $i < 3; $i++)
                            {
                                ?>
                        <option value="<? echo $i; ?>" <? if ($_SESSION['qty']==$i)
                                        { echo 'selected="selected"'; }?>>
                                            <?
                                            if ($i==1) echo "50";
                                            else if ($i==2) echo "100";
                                                else echo "All";
                                            ?>
                        </option>
                            <?
                            }
                            ?>
                    </select>
                    <?
                    }
                    else
                    {
                        ?>
                    <select name="qty" class="list" onchange="submit(this.form);">
                        <option value="1">50</option>
                        <option value="2" selected="selected">100</option>
                        <option value="0">All</option>
                    </select>
                    <?
                    }
                    ?>
	per page<input type="hidden" value="admin" name="event" />

                    <input type="hidden" value="admin_change_pageby" name="step" /><noscript>
                        <input type="submit" value="Go" class="smallerbox" /></noscript></div>
                <p id="moniker">Logged in as <span><? echo $_SESSION['email']; ?> </span><br /><a href="logout.php">Logout</a>
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

