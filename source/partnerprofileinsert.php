<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$ip = getip();
$profileid = getonefielddata(" select profileid from tbldatingpartnerprofilemaster where userid=$curruserid");

if ($profileid == "")
{
	execute("insert into tbldatingpartnerprofilemaster (userid,CreateBy,CreateIP,CreateDate) 
	values 	($curruserid,$curruserid,'$ip',now())");
	$profileid = getonefielddata("select max(profileid) from tbldatingpartnerprofilemaster");
}
$action = $profileid;

$cmbreligian=get_form_data($_POST['cmbreligian'],2);

$religian = getonefielddata("select religianid from tbldatingcastmaster where id='".$cmbreligian."' " );
if(isset($_POST['chkmaritalstatus']) && $_POST['chkmaritalstatus']!='')
{
	$maritalstatus=implode(",",$_POST['chkmaritalstatus']);
}else{$maritalstatus='';}
if(isset($_POST['chkoccupation']) && $_POST['chkoccupation']!='')
{
	$occupation=implode(",",$_POST['chkoccupation']);
}else{$occupation='';}

$industry = getcheckboxids("tbl_dating_industry_master","chkindustry");
$function_area = getcheckboxids("tbl_dating_work_function_area_master","chkfunctional_area");


if(isset($_POST['chkeducation']) && $_POST['chkeducation']!='')
{
	$education=implode(",",$_POST['chkeducation']);
}else{$education='';}

if(isset($_POST['chklocation']) && $_POST['chklocation']!='')
{
	$location=implode(",",$_POST['chklocation']);
}else{$location='';}

if(isset($_POST['chkdiet']) && $_POST['chkdiet']!='')
{
	$dietids=implode(",",$_POST['chkdiet']);
}else{$dietids='';}


$spiritual_order = getcheckboxids("tbldatingspiritualmaster","chksilsila");
$religiousnessid = getcheckboxids("tbldating_religiousness_master","religiousness");
$denominationid = getcheckboxids("tbl_muslim_denomination","denomination");

if(isset($_POST['chksmoke']) && $_POST['chksmoke']!='')
{
	$smokeids=implode(",",$_POST['chksmoke']);
}else{$smokeids='';}

if(isset($_POST['chkdrink']) && $_POST['chkdrink']!='')
{
	$drinkids=implode(",",$_POST['chkdrink']);
}else{$drinkids='';}

if(isset($_POST['kids_children']) && $_POST['kids_children']!=""){
	$kidsids = $_POST['kids_children'];
}else{$kidsids='';}	

$subcastid = getcheckboxids("tbldatingsubcastmaster","chksubcast");
$castid = getcheckboxids("tbldatingcastmaster","chkcast");

if(isset($_POST['chkwork_in']) && $_POST['chkwork_in']!='')
{
	$work_in=implode(",",$_POST['chkwork_in']);
}else{$work_in='';}

if(isset($_POST['chkwork_in_country']) && $_POST['chkwork_in_country']!='')
{
	$work_in_country=implode(",",$_POST['chkwork_in_country']);
}else{$work_in_country='';}

if(isset($_POST['chkanninc']) && $_POST['chkanninc']!='')
{
	$anninc=implode(",",$_POST['chkanninc']);
}else{$anninc='';}

if(isset($_POST['chkworkinstate']) && $_POST['chkworkinstate']!='')
{
	$work_in_state=implode(",",$_POST['chkworkinstate']);
}else{$work_in_state='';}

if (isset($_POST["chksendmeemail"]))
	$chksendmeemail = $_POST['chksendmeemail'];
else
	$chksendmeemail = "N";
	
$cmblookingfor=get_form_data($_POST['cmblookingfor'],1);
$cmbagefrom=get_form_data($_POST['cmbagefrom'],2);

if(isset($_POST['ageto']) && $_POST['ageto']!=0.0)
{
	$ageto=$_POST['ageto'];
}else{$ageto='';}

if(isset($_POST['chr_denomination']) && $_POST['chr_denomination']!='')
{
	$chr_denomination=$_POST['chr_denomination'];
}else{$chr_denomination='';}

if(isset($_POST['cmbcounty']) && $_POST['cmbcounty']!='')
{
	$cmbcounty=$_POST['cmbcounty'];
}else{$cmbcounty='';}

if(isset($_POST['txtgotra']) && $_POST['txtgotra']!='')
{
	$txtgotra=$_POST['txtgotra'];
}else{$txtgotra='';}


$cmbreligian=get_form_data($_POST['cmbreligian'],2);
$cmbanninccurrency=get_form_data($_POST['cmbanninccurrency'],1);
$cmbheightfrom=get_form_data($_POST['cmbheightfrom'],2);
$cmbheightto=get_form_data($_POST['cmbheightto'],2);


	
$query = sendtogeneratequery($action,"genderid",$cmblookingfor,"Y");
$query .= sendtogeneratequery($action,"agefrom",$cmbagefrom,"Y");
$query .= sendtogeneratequery($action,"ageto",$ageto,"Y");
$query .= sendtogeneratequery($action,"workin_state",$work_in_state,"Y");
$query .= sendtogeneratequery($action,"christian_denomination",$chr_denomination,"Y");
$query .= sendtogeneratequery($action,"religianid",$cmbreligian,"Y");
$query .= sendtogeneratequery($action,"countyid",$cmbcounty,"Y");
$query .= sendtogeneratequery($action,"castid",$castid,"Y");
$query .= sendtogeneratequery($action,"subcast",$subcastid,"Y");
$query .= sendtogeneratequery($action,"work_in",$work_in,"Y"); 
$query .= sendtogeneratequery($action,"work_in_country",$work_in_country,"Y"); 
$query .= sendtogeneratequery($action,"annincome",$anninc,"Y");
$query .= sendtogeneratequery($action,"annincome_curr",$cmbanninccurrency,"Y");
$query .= sendtogeneratequery($action,"gotra",$txtgotra,"Y");
$query .= sendtogeneratequery($action,"maritalstatus",$maritalstatus,"Y");
$query .= sendtogeneratequery($action,"occupation",$occupation,"Y");
$query .= sendtogeneratequery($action,"industry",$industry,"Y");
$query .= sendtogeneratequery($action,"functional_area",$function_area,"Y");
if ($ethnic_field_enable == "Y")
{
	$ethnic=get_form_data($_POST['ethnic'],2);
	$query .= sendtogeneratequery($action,"ethnic",$ethnic,"Y");
}

$query .= sendtogeneratequery($action,"education",$education,"Y");

$pg_education = getcheckboxids("tbldating_education_pg_master","chkpgeducation");
$query .= sendtogeneratequery($action,"pg_education",$pg_education,"Y");
$query .= sendtogeneratequery($action,"location",$location,"Y");
$query .= sendtogeneratequery($action,"sendmeemail",$chksendmeemail,"Y");
$query .= sendtogeneratequery($action,"heightfrom",$cmbheightfrom,"Y");
$query .= sendtogeneratequery($action,"heightto",$cmbheightto,"Y");
$query .= sendtogeneratequery($action,"dietids",$dietids,"Y");
$query .= sendtogeneratequery($action,"smokeids",$smokeids,"Y");
$query .= sendtogeneratequery($action,"drinkids",$drinkids,"Y");
$state = getcheckboxids("tbldatingcastmaster","chkstate");	
$query .= sendtogeneratequery($action,"states",$state,"Y");
$query .= sendtogeneratequery($action,"kidsids",$kidsids,"Y"); 

if($enable_astrological_module == "Y") 
{ 
	if(isset($_POST['chkmangalik']) && $_POST['chkmangalik']!='')
	{
		$mangalikid=implode(",",$_POST['chkmangalik']);
	}else{$mangalikid='';}
	$query .= sendtogeneratequery($action,"grahid",$mangalikid,"Y");
}	


$query .= sendtogeneratequery($action,"ModifyIP",$ip,"Y");
$query .= sendtogeneratequery($action,"ModifyBy",$curruserid,"Y");

if (isset($_POST["chk_can_contact_religion"]))
	$can_contact_religion = "Y";
else
	$can_contact_religion = "N";
$query .= sendtogeneratequery($action,"selected_religion_can_contact",$can_contact_religion,"Y");

if ($Enable_cast_subcast_design_setting == "Y") 
{
	if (isset($_POST["chk_can_contact_cast"]))
		$can_contact_cast = "Y";
	else
		$can_contact_cast = "N";
	$query .= sendtogeneratequery($action,"selected_cast_contact_me",$can_contact_cast,"Y");
}

if (findsettingvalue("Religion_field_display") == "M")
{
	$cmbhijab_id=get_form_data($_POST['cmbhijab_id'],2);
	$cmbbeard_id=get_form_data($_POST['cmbbeard_id'],2);
	$cmbrevert_islam_id=get_form_data($_POST['cmbrevert_islam_id'],2);
	$cmbhalal_strict_id=get_form_data($_POST['cmbhalal_strict_id'],2);
	$cmbsalah_perform_id=get_form_data($_POST['cmbsalah_perform_id'],2);

	$query .= sendtogeneratequery($action,"religiosness_id",$religiousnessid,"Y");
	$query .= sendtogeneratequery($action,"hijab_id",$cmbhijab_id,"Y");
	$query .= sendtogeneratequery($action,"beard_id",$cmbbeard_id,"Y");
	$query .= sendtogeneratequery($action,"revert_islam_id",$cmbrevert_islam_id,"Y");
	$query .= sendtogeneratequery($action,"halal_strict_id",$cmbhalal_strict_id,"Y");
	$query .= sendtogeneratequery($action,"salah_perform_id",$cmbsalah_perform_id,"Y");
	$query .= sendtogeneratequery($action,"spiritual_order",$spiritual_order,"Y");
	$query .= sendtogeneratequery($action,"denominationid",$denominationid,"Y");
}
	
$query = substr($query,1);	
execute("update tbldatingpartnerprofilemaster set $query,ModifyDate=now() where profileid=$profileid");

$get_pkg_id = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);
if($get_pkg_id==0) 
{
	header("location:packagemanager.php");
} else 
{
		$chkverified = getonefielddata("SELECT emailverified from tbldatingusermaster WHERE userid=".$curruserid);
		if(file_exists("source/advance_family.php"))
		{
				if($chkverified=='N')
				{
					header("location:advance_family.php");
				} 
				else
				{	
					header("location:advance_family.php");
				}		
		}else{header("location:dashboard.php");}
		
		
}	

ob_flush();
?>