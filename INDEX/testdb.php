<?php
echo $connect = mysql_connect('localhost', 'devicetracker', 'device');
echo $select = mysql_select_db('devicetracker');
echo $sql = "SELECT * FROM troubador_device.handheld_type ORDER BY TYPE";
$rs = mysql_query($sql, $connect) or die(mysql_error()) ;

//Class.forName("com.mysql.jdbc.Driver").newInstance();
//connection = DriverManager.getConnection(connectionURL, "simcarddb", "simcarddbuser");
//statement = connection.createStatement();
//rs = statement.executeQuery("SELECT * FROM hhdb2.handheld_type ORDER BY TYPE;");

while ($fetch = mysql_fetch_array($rs))
{
//out.println("<option value='" + rs.getString("type") + "'>" + rs.getString("type") + "</option>\n");
echo "<option value='" . $fetch['type'] . "'>" + $fetch['type'] + "</option>\n"; 
}
?>
