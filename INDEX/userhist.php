<?
require "loginstuff.php";
require 'globalheader.php';
include 'loadsessionvariables.php';
include 'loadsimsessionvariables.php';
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
                            <td class="tabup"><a href="index.php" class="plain">Search HH</a></td>
                            <td class="tabdown2"><a href="addhh.php" class="plain">Add HH</a></td>
							<td class="tabdown2"><a href="hhtypes.php" class="plain">HH Types</a></td>
                            <td class="tabdown2"><a href="displayhistoryhh.php" class="plain">History</a></td>
                            <td class="tabdown2"><a href="export.php" class="plain">Export to Excel</a></td></tr>
                    </table>
                </td>
            </tr>

        </table>



<?

$userid = $_REQUEST['userid'];

$sql = "SELECT users.username, users.email, history.userid, history.adminid, history.hhID, history.action, history.date "
     . " FROM troubador_device.history AS h LEFT JOIN ON devicetracker.users AS u WHERE history.userid = users.id AND userid = $userid "
	 . " ORDER BY date DESC, history.id DESC";
$rs = mysql_query($sql, $connect);



//this next little section counts how many handhelds this user has out currently

$sql2 = "SELECT COUNT(id) AS count FROM troubador_device.handhelds WHERE userid = $userid ";

$rs2 = mysql_query($sql2, $connect);

$fetchcount = mysql_fetch_assoc($rs2);

$count = $fetchcount['count'];



//this finds out the user's name
$sql3 = "SELECT username, email, id FROM troubador_device.users WHERE id = $userid ";
$rs3 = mysql_query($sql3, $connect);
$fetchuser = mysql_fetch_assoc($rs3);
$username = $fetchuser['username'];




?>
<h3>Information on <?=$username?></h3>
<a href="executesearchhandheld.jsp?user=<?=$userid?>&type=any&AssignedNumber=&PIN=&location=0"><?=$count?> handheld(s) currently signed out</a><br>
Email address: <a href='mailto:<?=$fetchuser['email']?>'><?=$fetchuser['email']?></a><br>
<a href="edituser.jsp?id=<?=$fetchuser['id']?>">Edit User</a><br>
<a href="deleteuser.jsp?id=<?=$fetchuser['id']?>&confirm=false">Delete User</a><br><br>


<table border=1>
<tr bgcolor='#c0c0c0'><th>#</th><th>User</th><th>Admin</th><th>Action</th><th>Date</th></tr>

<%
int c = 0;
String date = "";
String d = "";

while(rs.next()) {

	//this loop prints out the history entries related to this user
	//it only prints out entries where they are the USER, not admin
	//and it maxes at 100
try
{
	if(c == 100) { break; }
	c++;
	
	rs2 = statement2.executeQuery("SELECT username FROM hhdb2.users WHERE id=" + rs.getString("history.adminid") + ";");
	
	if (rs2.next())
		uname = rs2.getString("username");
	else
		uname = "== Check with Admin for error ==";
	}
catch(Exception e)
{
	out.print("FAIL FAIL FAIL OF LOG IN");
	out.print(e);
}

	date = rs.getString("history.date");


%>




<tr>
<td><%=c%></td>
<td><%=rs.getString("users.username")%></td>
<td><%=uname%></td>
<td><%=rs.getString("history.action")%></td>
<td><%=date%></td>
</tr>
<%
}
connection.close();
%>

</table>
*/
?>