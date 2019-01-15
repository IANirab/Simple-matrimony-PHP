<?
error_reporting("E_ALL");
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$userid_from = $_POST["txt_uid_from"];
$userid_to = $_POST["txt_uid_to"];
$que ="";
if (($userid_from != "") && is_numeric($userid_from))
	$que ="userid>=$userid_from and ";
	
if (($userid_to != "") && is_numeric($userid_to))
	$que .="userid<=$userid_to and ";


$column_title = "email,name,mobile\r\n";
$status  = "0,1,2,4";
$data = "";



$result = getdata("select email,name,mobile from tbldatingusermaster where $que  currentstatus IN ($status)");


while($rs= mysqli_fetch_array($result))
{
	$email='"'.$rs[0].'"';
	$name='"'.$rs[1].'"';
	$mobile='"'.$rs[2].'"';
	 
	
	
	$data .= "$email,$name,$mobile\r\n";

	
}
freeingresult($result);
if ($data != "")
 $data = $column_title.$data;  

$filenm ="user_csv1.csv";
$filenm_path ="../uploadfiles/$filenm";
$fp = fopen($filenm_path, "w");
fwrite($fp, $data);
fclose($fp);

header("Content-type: application/force-download");
header('Content-Disposition: inline; filename="' . $filenm_path . '"');
header("Content-Transfer-Encoding: Binary");
header("Content-length: ".filesize($filenm_path));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filenm . '"');
readfile("$filenm_path"); 
?>