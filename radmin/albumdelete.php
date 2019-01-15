<?  require_once("../translation.php");
require_once("../dbinclude/function.php");
require_once("../dbinclude/configuration.php");
include_once("../dbinclude/datingcommonfunction.php");
include_once('../assets/'.$sitethemefolder.'/design_config.php');

function remove_numbers($string) {
	$vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  	$string = str_replace($vowels, '*', $string);
  	return $string;
} 
//include_once("reg_include.php");
checkadminlogin();
if(isset($_GET['c']))
{	


					 $imagenm = getonefielddata("select imagenm from 
					 tbldatingalbummaster where currentstatus in(0,1)  
					 and albumid='".$_GET['c']."' ");
					 $imagenm2="album".$imagenm;
						 
		if(file_exists("../uploadfiles/".$imagenm))
		{
			@unlink("../uploadfiles/".$imagenm."");
		}
		
		if(file_exists("../uploadfiles/".$imagenm2))
		{
			@unlink("../uploadfiles/".$imagenm2."");
		}
		


	execute("update tbldatingalbummaster set currentstatus = 2 where albumid =" . $_GET['c'] ." 
	and CreateBy=".$_GET['b']."");
	$_SESSION[$session_name_initital . 'error'] =$deletemess;
}
header("location:albummaster.php?b=".$_GET['b']."");
ob_flush();
?>