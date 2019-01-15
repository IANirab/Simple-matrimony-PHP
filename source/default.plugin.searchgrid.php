<?  
if ($searchque != "") { ?>

<? 
	include("searchgrid_design.php");

$defaultclassnm = "gritem";
$NoofPages  = "";
$ordby ="lastlogin desc";
$educationid = '';
$heightid = '';
$weightid = '';
$current_displayed_userids = "0";	
if (isset($_SESSION[$session_name_initital . "searchordby"]) && $_SESSION[$session_name_initital . "searchordby"] != "")
{
	$ordby = $_SESSION[$session_name_initital . "searchordby"];
}
 $fromqry = from_que_search_result($searchque_fil.$filter_searchquery,$ordby,$curruserid); 
 $totalnorecord = getonefielddata( "select count(userid) ".$fromqry." ");

if ($Pgnm == "")
	$Pgnm = 1;
	$cnt = 1;	
	$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$searchgridtnext,$searchgridback,"Y");
?>


<? 
$curruserid = getuserid();
?>


<? 
if ($totalnorecord > 0){
if  ($curruserid !=0) { ?>
<form name="frm_save_search_crieteria" method="post" action="search_crieteria_save.php">
<div class="searccriteriasave"><?= $searchgrid_save_search_crieteria_title  ?> <input type="text" name="search_criteria_title" />
<input type="hidden" name="save_search_crieteria_query" value="<?= $searchque_fil.$filter_searchquery ?>" />
<input type="submit" value="<?= $searchgrid_save_search_crieteria_submit ?>" /></div>
</form>
<? } ?>
<? } ?>


<? 


	$NoOfRecord = $arrval["NoOfRecord"];
	$BackStr = $arrval["BackStr"];
	$NextStr = $arrval["NextStr"];
	$page_no_str = $arrval['PageStr'];			
		
    $sql = "select userid, name,genderid," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,100),city,zodiacsign,nickname,maritalstatusid,date_format(lastlogin,'$date_format'),religianid,mobile,castid,image_password_protect,ocupationid,annual_income_currancyid,annual_income_id,educationid,packageid,heightid,weightid,date_format(ModifyDate,'$date_format') as mdate,smsverified $fromqry $NoOfRecord"; 
	$result = getdata($sql);	
$rows = mysqli_num_rows($result);
?>

<div class="total_record_outer">

<div class="total_record">
<? if($totalnorecord>0){?>
<?=$search_txt1?> <strong><?=$totalnorecord?></strong>
<? }else{?>
<?=$search_txt2?>
<? } ?>
</div>
</div>
 
 




<script>
function send_form_filter_d(name,id) 
{
	
    document.getElementById(name+id).checked = false;
	document.getElementById('filter_submit').click();
	
}
</script>


<!------------------ selected filter start ------------------------>


<?  
if(isset($_SESSION[$session_name_initital . "filter_religion_id"]) && 
        $_SESSION[$session_name_initital . "filter_religion_id"]!='' || 
		isset($_SESSION[$session_name_initital . "filter_subcast_id"]) && 
            $_SESSION[$session_name_initital . "filter_subcast_id"]!='' ||
			isset($_SESSION[$session_name_initital . "filter_ms_id"]) && 
            $_SESSION[$session_name_initital . "filter_ms_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_edu_id"]) && 
            $_SESSION[$session_name_initital . "filter_edu_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_occ_id"]) && 
            $_SESSION[$session_name_initital . "filter_occ_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_photo_id"]) && 
            $_SESSION[$session_name_initital . "filter_photo_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_income_id"]) && 
            $_SESSION[$session_name_initital . "filter_income_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_mothert_id"]) && 
            $_SESSION[$session_name_initital . "filter_mothert_id"]!='' || 
			isset($_SESSION[$session_name_initital . "filter_country_id"]) && 
            $_SESSION[$session_name_initital . "filter_country_id"]!=''
		) {
?>

		<div class="filter_show_list">
        	<div class="filter_select"><?=$search_txt3?>  </div>
        
        
        <ul class="list-inline">
	 <?   if(isset($_SESSION[$session_name_initital . "filter_religion_id"]) && 
        $_SESSION[$session_name_initital . "filter_religion_id"]!='')
        {
            $sel_filter_religion_dis=explode(',',$_SESSION[$session_name_initital . "filter_religion_id"]);
            for($ir=0;$ir<count($sel_filter_religion_dis);$ir++)
            {
				 $display_rel_tit=getonefielddata("select title from tbldatingreligianmaster where 
				id='".$sel_filter_religion_dis[$ir]."' ");
			?>
            <li class="list-inline-item" onclick="send_form_filter_d('filter_religion','<?=$sel_filter_religion_dis[$ir]?>');">
			<?=$display_rel_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
            <?	
            }
        }
	 ?>  
 
		   <?
            
            if(isset($_SESSION[$session_name_initital . "filter_subcast_id"]) && 
            $_SESSION[$session_name_initital . "filter_subcast_id"]!='')
            {
					 $sel_filter_subcast_dis=explode(',',$_SESSION[$session_name_initital . "filter_subcast_id"]);
				for($ir=0;$ir<count($sel_filter_subcast_dis);$ir++)
				{
					 $display_sub_tit=getonefielddata("select title from tbldatingcastmaster where 
					id='".$sel_filter_subcast_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_subcast','<?=$sel_filter_subcast_dis[$ir]?>');">
				<?=$display_sub_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
				
			}
            ?>
            
  		  <?
            if(isset($_SESSION[$session_name_initital . "filter_ms_id"]) && 
            $_SESSION[$session_name_initital . "filter_ms_id"]!='')
            {
					 $sel_filter_ms_dis=explode(',',$_SESSION[$session_name_initital . "filter_ms_id"]);
				for($ir=0;$ir<count($sel_filter_ms_dis);$ir++)
				{
					 $display_ms_tit=getonefielddata("select title from tbldatingmaritalstatusmaster where 
					id='".$sel_filter_ms_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_ms','<?=$sel_filter_ms_dis[$ir]?>');">
				<?=$display_ms_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>
            
              <?
            if(isset($_SESSION[$session_name_initital . "filter_edu_id"]) && 
            $_SESSION[$session_name_initital . "filter_edu_id"]!='')
            {
					 $sel_filter_edu_dis=explode(',',$_SESSION[$session_name_initital . "filter_edu_id"]);
				for($ir=0;$ir<count($sel_filter_edu_dis);$ir++)
				{
					 $display_edu_tit=getonefielddata("select title from tbl_education_master where 
					id='".$sel_filter_edu_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_edu','<?=$sel_filter_edu_dis[$ir]?>');">
				<?=$display_edu_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>    
            
              <?
            if(isset($_SESSION[$session_name_initital . "filter_occ_id"]) && 
            $_SESSION[$session_name_initital . "filter_occ_id"]!='')
            {
					 $sel_filter_occ_dis=explode(',',$_SESSION[$session_name_initital . "filter_occ_id"]);
				for($ir=0;$ir<count($sel_filter_occ_dis);$ir++)
				{
					 $display_occ_tit=getonefielddata("select title from tbldating_education_pg_master where 
					id='".$sel_filter_occ_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_occ','<?=$sel_filter_occ_dis[$ir]?>');">
				<?=$display_occ_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>
            
            <?
            if(isset($_SESSION[$session_name_initital . "filter_photo_id"]) && 
            $_SESSION[$session_name_initital . "filter_photo_id"]!='')
            {
					 $sel_filter_photo_dis=$_SESSION[$session_name_initital . "filter_photo_id"];
				for($ir=0;$ir<count($sel_filter_photo_dis);$ir++)
				{
					if($sel_filter_photo_dis=='Y')
					{
					 	$display_photo_tit=$search_filter_with_photo_title;
						$display_photo_name='y';
					}
					elseif($sel_filter_photo_dis=='N')
					{
					 	$display_photo_tit=$search_filter_without_photo_title;
						$display_photo_name='n';
					}
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_with_photo','<?=$display_photo_name?>');">
				<?=$display_photo_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>
              
                <?
            if(isset($_SESSION[$session_name_initital . "filter_income_id"]) && 
            $_SESSION[$session_name_initital . "filter_income_id"]!='')
            {
					 $sel_filter_inc_dis=explode(',',$_SESSION[$session_name_initital . "filter_income_id"]);
				for($ir=0;$ir<count($sel_filter_inc_dis);$ir++)
				{
					 $display_inc_tit=getonefielddata("select title from tbldating_annual_income_master where 
					id='".$sel_filter_inc_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_income','<?=$sel_filter_inc_dis[$ir]?>');">
				<?=$display_inc_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>
            
            <?
            if(isset($_SESSION[$session_name_initital . "filter_mothert_id"]) && 
            $_SESSION[$session_name_initital . "filter_mothert_id"]!='')
            {
					 $sel_filter_mt_dis=explode(',',$_SESSION[$session_name_initital . "filter_mothert_id"]);
				for($ir=0;$ir<count($sel_filter_mt_dis);$ir++)
				{
					 $display_mt_tit=getonefielddata("select title from tbldatingmothertonguemaster where 
					id='".$sel_filter_mt_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_mothert','<?=$sel_filter_mt_dis[$ir]?>');">
				<?=$display_mt_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>
            
             <?
            if(isset($_SESSION[$session_name_initital . "filter_country_id"]) && 
            $_SESSION[$session_name_initital . "filter_country_id"]!='')
            {
					 $sel_filter_ct_dis=explode(',',$_SESSION[$session_name_initital . "filter_country_id"]);
				for($ir=0;$ir<count($sel_filter_ct_dis);$ir++)
				{
					 $display_ct_tit=getonefielddata("select title from tbldatingcountrymaster where 
					id='".$sel_filter_ct_dis[$ir]."' ");
				?>
				<li class="list-inline-item" onclick="send_form_filter_d('filter_country','<?=$sel_filter_ct_dis[$ir]?>');">
				<?=$display_ct_tit?>&nbsp;<i class="fa fa-times" aria-hidden="true"></i></li>
				<?	
				}
			}
            ?>                       
       		<li class="list-inline-item reset-filter-li">
      <? if(isset($_SESSION[$session_name_initital . "accordian_option"]) && 
$_SESSION[$session_name_initital . "accordian_option"]!=''){?>
      <form name='frm_accordian_data' method='post' 
    action='<?=$sitepath?>searchgid_accordian_set_search_query_clear.php'>
        <input type='submit' class='btn' value='<?=$search_filter_reset_title?>'>
      </form>
      <? } ?>
   
            </li>     
            
      </ul>
		</div>
			<!------------------ selected filter end ------------------------>
<? }?>
		<? require_once("searchgridoptions.php"); ?>
<form name="frm_search_result" method="post" class="search_gdoption">
<? if (($totalnorecord > 0) && ($curruserid !=0)) { ?>
<?
if(enable_communication=="Y") { 
?>
<div class="searchgridtopbtns selec3but">
<button class="btn" type="button" onclick="select_all('<?=$rows?>','chk_user_')"><i class="fa fa-th-list" aria-hidden="true"></i> <?=$searchgrid_btn_selectall ?></button>
<button class="btn" type="button" onclick="search_grid_submit('I')"><i class="fa fa-heart" aria-hidden="true"></i> <?=$searchgrid_btn_text_express_intrest ?></button>
<button class="btn" type="button" onclick="search_grid_submit('F')"><i class="fa fa-star" aria-hidden="true"></i> <?=$searchgrid_btn_text_favorite ?></button>
</div>
<? } } ?>
<?
		$k = 1;
		while($rs= mysqli_fetch_array($result)){
		$userid = $rs[0] ;
		$current_displayed_userids = $current_displayed_userids ."," .$userid;  
		$name = $rs[1] ;
		$genderid = "";
		if ($rs[2] !="")
		$genderid = findgender($rs[2]);
		$age = $rs[3];
		$countryid = "";
		if ($rs[4] !="")
		$countryid = findcountryid($rs[4]);
		$state = $rs[5];		 
		if($rs[5]!="" && $rs[5]!="0.0" && is_numeric($rs[5])){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[5]);
		} else {
			$state = "";	 
		}
		$area = $rs[6];
		//$imagenm = $rs[7];
		$profileheadline = $rs[8];
		$city = $rs[9];
		if($rs[9]!="" && $rs[9]!="0.0" && is_numeric($rs[9])){
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[9]);	 			
		} else {
			$city = "";	 
		 }
		 $zodiacsign = $rs[10];
		 if ($zodiacsign != "")
		 	$zodiacsign ="<img align=absmiddle src ='". $siteimagepath . "images/zodiac-$zodiacsign.gif' alt='". $zodiacsign ."'> $zodiacsign";
		$nickname = $rs[11];
		$maritalstatusid = $rs[12];
		if ($maritalstatusid != "")
			$maritalstatusid = getonefielddata("select title from tbldatingmaritalstatusmaster where id=$maritalstatusid");
			
		$lastlogin  = $rs[13];
		$religianid = $rs[14];
		
		$mobile = $rs[15];
		$castid = $rs[16];
		$imageonrequest = $rs[17];
		$smsverified = $rs['smsverified'];
		
		$ocupationid = $rs[18];
		if ($ocupationid != "")
		  $ocupationid = getonefielddata("select title from tbldatingoccupationmaster where id=$ocupationid");
		  
		$annual_income_currancyid = $rs[19];
		if ($annual_income_currancyid != "")
		  $annual_income_currancyid = getonefielddata("select title from tbldating_annual_income_currancy_master where id=$annual_income_currancyid");
		  
		$annual_income_id = $rs[20];
		if ($annual_income_id != "")
		  $annual_income_id = getonefielddata("select title from tbldating_annual_income_master where id=$annual_income_id");
		
		// Haresh code starts Here 
		
		$educationid = $rs[21];
		if ($educationid != "")
			$educationid = getonefielddata("select title from tbl_education_master where id=$educationid");
			
		//	Haresh code ends Here 
		
		$heightid = $rs['heightid'];
		if ($heightid != "" && $heightid != "0.0" && is_numeric($heightid)){
			$heightid = getonefielddata("select title from tbldatingheightmaster where id=$heightid");
			}
			else{
				$heightid = '';
			}
		$weightid = $rs['weightid'];
		if ($weightid != "" && $weightid != "0.0" && is_numeric($weightid)){
			$weightid = getonefielddata("select title from tbldatingweightmaster where id=$weightid");
			}
			else{
				$weightid = '';
			}
		//exit;
		if ($castid != "")
		  $castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
			
		$packageid = $rs["packageid"];
		if ($religianid != "")
			$religianid = getonefielddata("select title from tbldatingreligianmaster where id=$religianid");
		 $imagenm = find_user_image($userid,"","","");		
		$packagearr = findfeatureddetail($userid);
		$classnm = $packagearr["packageclassnm"];
		$packimg = $packagearr["packageimage"];
		$stylesheet = $packagearr["stylesheetcode"];
		$modifydate = $rs['mdate'];
		echo($stylesheet);
		$userlink = displayprofilelink($userid);
		$profile_code = find_profile_code($userid);				
		$design_view_id = "d";
		if(isset($_SESSION[$session_name_initital . "q_raddispresult"]) && $_SESSION[$session_name_initital . "q_raddispresult"]=='p'){
			$design_view_id = $_SESSION[$session_name_initital . "q_raddispresult"];
		}
		if ($design_view_id =="d"){
			
		display_search_grid_design_designview($classnm,$imagenm,$packimg,$userlink,$name,$profile_code,$zodiacsign,$userid,$mobile,$age,$genderid,$city,$state,$countryid,$religianid,$castid,$maritalstatusid,$lastlogin,$profileheadline,$imageonrequest,$ocupationid,$annual_income_id,$annual_income_currancyid,$educationid,$k,$heightid,$weightid,$modifydate);
		}else{
		if ($cnt == 3)
		{
			$cnt = 1; ?>
			<br><br><br>
		<? }
		display_search_grid_design_photoview($classnm,$imagenm,$packimg,$userlink,$name,$profile_code,$zodiacsign,$userid,$mobile,$age,$genderid,$city,$state,$countryid,$religianid,$castid,$maritalstatusid,$lastlogin,$profileheadline,$imageonrequest,$ocupationid,$annual_income_id,$annual_income_currancyid,$packageid,$educationid,$k,$heightid,$weightid);
	$cnt = $cnt +1;
	}
$k++;
} 
freeingresult($result);
?>

<? if($totalnorecord>0){?>
<? call_next_back() ?>
<? } ?>
<input type="hidden" name="current_displayed_userids" value="<?= $current_displayed_userids ?>" />
</form>




<script language="JavaScript">
function goforprivatemsging(user)
{
	var url = 'chatchecking.php?uid='+ user
  window.open(url,'PrivateMessage'+user,'toolbar=no,location=no,directories=no,status=no,menubar=no,width=500,height=500');
}
</script>
<script language="JavaScript">
function search_grid_submit(action)
{
	var submit_file_nm ="";
	if (action == "I")
		submit_file_nm = "express_intrest_add_all.php";
	if (action == "F")
		submit_file_nm ="favoriteadd_all.php";
	if (submit_file_nm !="")
	{
		document.frm_search_result.action = "<?= $sitepath ?>" + submit_file_nm;
		document.frm_search_result.submit();
	}
}

function select_all(val,id){
	for(var i=1; i<=val; i++){ 	
		if(document.getElementById(id+i).checked == true){
			document.getElementById(id+i).checked = false;
		} else{
			document.getElementById(id+i).checked = true;
			
		}
	}
}

</script>

 	
<? } ?>