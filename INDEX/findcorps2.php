<?
require "loginstuff.php";
require 'globalheader.php';
//include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
$query_string = $_SERVER['QUERY_STRING'];

?>

  <tr id="nav-primary"><td align="center" class="tabs" colspan="2">
 		<table cellpadding="0" cellspacing="0" align="center"><tr>
  <td valign="middle" style="width:368px">&nbsp;</td>
  <td class="tabdown"><a href="home.php" class="plain">Home</a></td>
  <td class="tabdown"><a href="index.php" class="plain">Handhelds</a></td>
  <td class="tabdown"><a href="simcards.php" class="plain">SIM cards</a></td>
  <td class="tabdown"><a href="admin.php" class="plain">Admin</a></td>
  <td class="tabup"><a href="superadmin.php" class="plain">Superadmin</a></td>

  </tr>
  </table></td></tr>
  <tr id="nav-secondary">
  <td align="center" class="tabs" colspan="2">

			<table cellpadding="0" cellspacing="0" align="center"><tr>
                                   <td class="tabdown"><a href="superadmin-searchhh.php" class="plain">Search HH</a></td>
								<td class="tabup"><a href="findcorps.php" class="plain">Find Corporates</a></td>
                          
                    </table>
			</td>
			</tr>
			
			</table>

			<div class="content">
<?
	require "checksuperadmin.php";
		
			$sql = "SELECT username, id FROM troubador_device.users WHERE isactive = 1 AND email <> '' order by username asc";

			$rs = mysql_query($sql, $connect);
			while ($fetch = mysql_fetch_assoc($rs))
			{
			
				$my_id = $fetch['id'];
				
				echo "<b>" . $fetch['username'] . "</b>";
				$sqlcount = "SELECT COUNT(*) AS devicecount FROM handhelds WHERE userid = $my_id";
				$rscount = mysql_query($sqlcount, $connect);
				$fetchcount = mysql_fetch_assoc($rscount);
				
				echo "(" . $fetchcount['devicecount'] . ")";
				
				echo "<br/>";
				//echo $sql2 = "SELECT * FROM handhelds WHERE userid = $my_id";
				//$rsfind = mysql_query($sq12, $connect);
				//$fetchfind = mysql_fetch_assoc($rsfind);
				//echo $fetchfind['Id'];
				
				
				
				$sql2 = "SELECT * FROM handhelds WHERE userid = $my_id";
				
				$rsfind = mysql_query($sql2);
				
				while ($fetchfind = mysql_fetch_assoc($rsfind))
				{
				
					if ($fetchfind['is_corp'])
					{
						echo '<a class="available"> Corporate' ;
						echo $fetchfind['type'] . "# " .  $fetchfind['AssignedNumber'] .  "  "  . $fetchfind['IMEI'] . " " . $fetchfind['PIN']. "--" . $fetchfind['Notes'];
						
						echo '</a>';
					}
					else
					{
						echo $fetchfind['type'] . "# " .  $fetchfind['AssignedNumber'] .  "  "  . $fetchfind['IMEI'] . " " . $fetchfind['PIN'] . "--" . $fetchfind['Notes'];
					}
					echo "<br />";
				}
			
				echo "<br/>";
				
			
			
			}

?>

</div>