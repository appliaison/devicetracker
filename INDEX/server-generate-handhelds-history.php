<?

/** Error reporting */
error_reporting(E_ALL);

/* DB stuff */
require_once 'db.php';

/** PHPExcel */
require_once 'phpexcel/Classes/PHPExcel.php';

/** PHPExcel_IOFactory */
require_once 'phpexcel/Classes/PHPExcel/IOFactory.php';

/*
After doing some test, I've got these results benchmarked
for writing to Excel2007:
	
	Number of rows	Seconds to generate
	200				3
	500				4
	1000			6
	2000			12
	4000			36
	8000			64
	15000			465
*/

// Create new PHPExcel object
echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Arunabh Das")
							 ->setLastModifiedBy("Arunabh Das")
							 ->setTitle("RIM - SV&V Handheld Inventory Report.")
							 ->setSubject("RIM - SV&V Handheld Inventory Report.")
							 ->setDescription("RIM - SV&V Handheld Inventory Report.")
							 ->setKeywords("RIM - SV&V Handheld Inventory Report.")
							 ->setCategory("RIM - SV&V Handheld Inventory Report.");

							 
 // Set column widths
echo date('H:i:s') . " Set column widths\n";
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(40);

// Set fonts
echo date('H:i:s') . " Set fonts\n";
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Candara');
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);

$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setName('Candara');
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);

$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('K3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('L3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('M3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('N3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('O3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('P3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Q3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('R3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('S3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('T3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('U3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('V3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('W3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('X3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Y3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('Z3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AA3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AB3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AC3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AD3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AE3')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('AF3')->getFont()->setBold(true);							 

// Create a first sheet
echo date('H:i:s') . " Add data\n";
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', "SV&V Handheld Inventory Report");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Sep, 2009");
$objPHPExcel->getActiveSheet()->setCellValue('A3', "Device Type");
$objPHPExcel->getActiveSheet()->setCellValue('B3', "Assigned Number");
$objPHPExcel->getActiveSheet()->setCellValue('C3', "PIN / Accessory Name");
$objPHPExcel->getActiveSheet()->setCellValue('D3', "IMEI");
$objPHPExcel->getActiveSheet()->setCellValue('E3', "1st");
$objPHPExcel->getActiveSheet()->setCellValue('F3', "2nd");
$objPHPExcel->getActiveSheet()->setCellValue('G3', "3rd");
$objPHPExcel->getActiveSheet()->setCellValue('H3', "4th");
$objPHPExcel->getActiveSheet()->setCellValue('I3', "5th");
$objPHPExcel->getActiveSheet()->setCellValue('J3', "6th");
$objPHPExcel->getActiveSheet()->setCellValue('K3', "7th");
$objPHPExcel->getActiveSheet()->setCellValue('L3', "8th");
$objPHPExcel->getActiveSheet()->setCellValue('M3', "9th");
$objPHPExcel->getActiveSheet()->setCellValue('N3', "10th");
$objPHPExcel->getActiveSheet()->setCellValue('O3', "11th");
$objPHPExcel->getActiveSheet()->setCellValue('P3', "12th");
$objPHPExcel->getActiveSheet()->setCellValue('Q3', "13rd");
$objPHPExcel->getActiveSheet()->setCellValue('R3', "14th");
$objPHPExcel->getActiveSheet()->setCellValue('S3', "15th");
$objPHPExcel->getActiveSheet()->setCellValue('T3', "16th");
$objPHPExcel->getActiveSheet()->setCellValue('U3', "17th");
$objPHPExcel->getActiveSheet()->setCellValue('V3', "18th");
$objPHPExcel->getActiveSheet()->setCellValue('W3', "19th");
$objPHPExcel->getActiveSheet()->setCellValue('X3', "20th");
$objPHPExcel->getActiveSheet()->setCellValue('Y3', "21st");
$objPHPExcel->getActiveSheet()->setCellValue('Z3', "22nd");
$objPHPExcel->getActiveSheet()->setCellValue('AA3', "23rd");
$objPHPExcel->getActiveSheet()->setCellValue('AB3', "24th");
$objPHPExcel->getActiveSheet()->setCellValue('AC3', "25th");
$objPHPExcel->getActiveSheet()->setCellValue('AD3', "26th");
$objPHPExcel->getActiveSheet()->setCellValue('AA3', "27th");
$objPHPExcel->getActiveSheet()->setCellValue('AB3', "28th");
$objPHPExcel->getActiveSheet()->setCellValue('AC3', "29th");
$objPHPExcel->getActiveSheet()->setCellValue('AD3', "30th");
$objPHPExcel->getActiveSheet()->setCellValue('AE3', "31st");
$objPHPExcel->getActiveSheet()->setCellValue('AF3', "Actual");




// Add a drawing to the worksheet
echo date('H:i:s') . " Add a drawing to the worksheet\n";
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('rim_logo.png');
$objDrawing->setHeight(40);
$objDrawing->setCoordinates('D1');
//$objDrawing->setOffsetX(10);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

// Hide "Phone" and "fax" column
echo date('H:i:s') . " Add date columns\n";
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setVisible(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setVisible(true);


// Set outline levels
echo date('H:i:s') . " Set outline levels\n";

$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setVisible(true);


// Freeze panes
echo date('H:i:s') . " Freeze panes\n";
$objPHPExcel->getActiveSheet()->freezePane('A4');


// Rows to repeat at top
echo date('H:i:s') . " Populate the actual records\n";
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(3, 3);


// Add data
$sql = "SELECT id, type, AssignedNumber, PIN, Notes, IMEI FROM handhelds ORDER BY type, AssignedNumber";
$rs = mysql_query($sql, $connect);
$i = 5;
while ($fetch = mysql_fetch_assoc($rs)) 
{
	$handheld_id = $fetch['id'];
	$type = $fetch['type'];
	$assignednumber = $fetch['AssignedNumber'];
	$pin = $fetch['PIN'];
	$notes = $fetch['Notes'];
	$imei = $fetch['IMEI'];
	
	$sql2 = "SELECT his.id, his.userid, u.username FROM history AS his LEFT JOIN users AS u on u.Id = his.hhid "
	. " WHERE his.hhid = $handheld_id AND  his.date >= '2009-09-01' ";
	
	$rs2 = mysql_query($sql2, $connect);
	
	$num_rows = mysql_num_rows($rs2);
	
	
	
	if ($num_rows == 0) 
	{
		$activity = "No activity in Sept, 2009";
		$sql3 = "No activity";
		
	}
	else
	{
		$sql3 = "SELECT his.id, his.userid AS userid, u.username AS username, his.date AS date FROM history AS his " 
	. " LEFT JOIN users AS u on u.Id = his.hhid "
	. " WHERE his.hhid = $handheld_id AND  his.date >= '2009-09-01' ORDER BY date DESC LIMIT 0, 1 ";
	
		$rs3 = mysql_query($sql3, $connect);
		
		$fetch3 = mysql_fetch_assoc($rs3);
		
		$userid = $fetch3['userid'];
		
		$username_pre = $fetch3['username'];
	
		$date = $fetch3['date'];
		
		
		if (strlen($username_pre) > 0)
		{
			$username = $username_pre;
			$activity = "Last checked out to " . $username . " on " . $date; 
		}
		else
		{
		
			$sql4 = "SELECT id, username FROM users WHERE id = $userid ";
			
			$rs4 = mysql_query($sql4, $connect);
			
			$fetch4 = mysql_fetch_assoc($rs4);
			
			$username_pre2 = $fetch4['username'];
			
			$userid_pre2 = $fetch4['id'];
			
			if ($userid_pre2 == 0)
			{
			
				$activity = "Last checked in  on " . $date;
			
			}
			else
			{
				$activity = "Last checked out to " . $username . " on " . $date;
			
			}
			
			
			
		}
		
		
	}
		
		
	
	//$fetch2 = mysql_fetch_assoc($rs2);
	
	//$username1 = $fetch2['username'];
	
	//SELECT * FROM history WHERE hhid = 238 AND DATE_SUB(CURDATE(),INTERVAL 30 DAY) < date;
	
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, " : $type");
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, " : $assignednumber");
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, " : $pin");
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, " : $imei");
	
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, " : $activity");
	
	//$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, " : $sql3");
	
	
	
	$i++;
}


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

		
// Save Excel 2007 file
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";

echo 'Click <a href="server-generate-handhelds-history.xlsx">here</a>';

?>

</html>