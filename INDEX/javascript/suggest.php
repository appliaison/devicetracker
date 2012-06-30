<?
	$connect = mysql_connect('localhost', 'devicetracker', 'device');
	$select = mysql_select_db('devicetracker');

// Replace all instances of ' with /'
// This will escape my strings for me

public String fix( String s )
{
   if (s == null)  return s;
   String f = "\'";
   String r = "\\\'";

   int index01 = s.indexOf( f );
   while (index01 != -1)
   {
      s = s.substring(0,index01) + r + s.substring(index01+f.length());
      index01 += r.length();
      index01 = s.indexOf( f, index01 );
   }
   return s;
}


  //	Alex Pedwysocki
 //	2008-01
//	This page to return search results as part of an AJAX function to make handheld type dropdown menus.

$search = $_REQUEST['search'];
$sql = "SELECT type FROM devicetracker.handheld_type WHERE type LIKE '" + search + "%' AND type <> '" + search + "' ORDER BY TYPE;"
$result = mysql_query($sql, $connect);
echo ("\n");	//hack to get the dropdown to stop skipping the first entry
while ($fetch = mysql_fetch_assoc($rs))
{
	echo $fetch['type'] . "\n";
	
}
?>