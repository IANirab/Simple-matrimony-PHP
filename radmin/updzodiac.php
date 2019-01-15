<? 
include("commonfileadmin.php");
$result = getdata("SELECT userid from tbldatingusermaster WHERE currentstatus=0 AND userid>=801");
while($rs = mysqli_fetch_array($result)){
	execute("update tbldatingusermaster set lastlogin='2012-05-08' where userid=".$rs[0]);
}
?>