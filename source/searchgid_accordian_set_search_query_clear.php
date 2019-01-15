<? include("commonfile.php");
$action ="";
$searchque ="";
$_SESSION[$session_name_initital . "accordian_option"] = "";
$_SESSION[$session_name_initital . "searchquery"] = "";
$searchque_original = $_SESSION[$session_name_initital . "searchquery_original"];
$_SESSION[$session_name_initital . "searchquery"] = $searchque_original;
$_SESSION[$session_name_initital . "filter_searchquery"]='';
$_SESSION[$session_name_initital . "filter_religion_id"]='';
$_SESSION[$session_name_initital . "filter_subcast_id"]='';
$_SESSION[$session_name_initital . "filter_edu_id"]='';
$_SESSION[$session_name_initital . "filter_photo_id"]='';
$_SESSION[$session_name_initital . "filter_income_id"]='';
$_SESSION[$session_name_initital . "filter_occ_id"]='';
$_SESSION[$session_name_initital . "filter_ms_id"]='';
$_SESSION[$session_name_initital . "filter_mothert_id"]='';
$_SESSION[$session_name_initital . "filter_country_id"]='';



header("location:searchresult.php");
exit();
?>