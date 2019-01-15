<?

	$lang_val='eng';
	$_SESSION['matrimonylang']='eng';
	if(isset($_POST['lang']) && $_POST['lang']!='')
	{
	
			session_start();
			$_SESSION['matrimonylang']=$_POST['lang'];
			$lang_val = $_POST['lang']; 
	}
	else
	{
	
		if(isset($_SESSION['matrimonylang']) && $_SESSION['matrimonylang']!='')
		{
			$lang_val = $_SESSION['matrimonylang'];	
		}
	}


//if($type=='t')
//{
//	$lang_val='default5';
//	$_SESSION['matrimonytheme']='default5';
//	if(isset($_POST['lang']) && $_POST['lang']!='')
//	{
//	
//			session_start();
//			$_SESSION['matrimonylang']=$_POST['lang'];
//			$lang_val = $_POST['lang']; 
//	}
//	else
//	{
//	
//		if(isset($_SESSION['matrimonytheme']) && $_SESSION['matrimonytheme']!='')
//		{
//			$theme_val = $_SESSION['matrimonytheme'];	
//		}
//	}
//}
//echo $_SESSION['matrimonylang'];
//echo $lang_val;
?>

