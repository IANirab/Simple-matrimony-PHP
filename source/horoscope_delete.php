<? require_once("commonfile.php");
checklogin($sitepath);
 
	$horoscope=getonefielddata("select horoscope from tbldatingusermaster
	where userid='".$curruserid."' ");
	
	unlink("uploadfiles/".$horoscope);
	execute("UPDATE tbldatingusermaster SET horoscope=''  WHERE userid='".$curruserid."' ");
	header("location:updateprofile2.php");
	exit;
?>