<? ob_start();
include("commonfile.php");
checklogin($sitepath);
$_SESSION[$session_name_initital . "notify_item"]='';
$_SESSION[$session_name_initital . "notify_sort"]='';

if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}

if(isset($_POST['tabv']) && $_POST['tabv']!='')
{
	$tabv=$_POST['tabv'];
}


if($type=='p')
{
	if(isset($_POST['id']) && $_POST['id']!='')
	{
		$_SESSION[$session_name_initital . "notify_item".$tabv]=$_POST['id'];
	}
}

if($type=='s')
{
	if(isset($_POST['id']) && $_POST['id']!='')
	{
		$_SESSION[$session_name_initital . "notify_sort".$tabv]=$_POST['id'];
	}
}

?>