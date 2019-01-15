<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
$userid = getonefielddata("select userid from tbl_booklet_template_master WHERE currentstatus=0 AND id=".$action);
$result = getdata("select name,landline from tbldatingusermaster WHERE userid IN ($userid) AND currentstatus=0");
$data = "Name,PhoneNo.\n";
while($rs = mysqli_fetch_array($result)){
	$name = '"'.$rs[0].'"';
	$landline = '"'.$rs[1].'"';
	$data .= $name.",".$landline."\n";
}
if($data!=''){
	$rand = rand(1,10000);
	$filenm = $rand."user_csv.csv";
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
}
?>