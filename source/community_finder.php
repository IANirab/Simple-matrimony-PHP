<?

include_once("commonfile.php");
$data_result ="";
if (isset($_POST["txtreligionid"]))
{
$religianid = $_POST["txtreligionid"];
$result = getdata("select title,id from tbldatingcastmaster where currentstatus in(0) and languageid=$sitelanguageid and religianid=" .$religianid);
while ($rs = mysqli_fetch_array($result))
{
	$return = $rs[0] ."-". $rs[1];
	if ($data_result !="")
		$data_result =$data_result.",";
	$data_result .= $return;
}
	freeingresult($result);
}
echo($data_result);
?>