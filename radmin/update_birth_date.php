<?
include("commonfileadmin.php");

$result = getdata("select day(dob), month(dob),userid from tbldatingusermaster ");
while($r= mysqli_fetch_array($result))
{
	$dd = $r[0];
	$mm = $r[1];
	$userid = $r[2];
	if (($dd != "") && ($mm != ""))
	{
		$zodiacsign =findzodiacsign($dd,$mm);
		execute("update tbldatingusermaster set zodiacsign='$zodiacsign' where userid = $userid");
	}
}
freeingresult($result);
echo("zodiac sign saved successfully");
?>