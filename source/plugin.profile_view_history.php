	<div class="center-in">
		<!-- ********* TITLE START HERE *********-->
         <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $profile_viewpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>
        
        
		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>

<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="grlink">

<div class="stats1"><span><?= $profile_view_total_view_anonymous ?></span> <?= $total_view_anonymous ?> 
&nbsp;&nbsp;&nbsp;&nbsp;
<span><?= $profile_view_total_view_registered_user ?></span> <?= $total_view_registered_user ?></div>

<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0"  class="grborder">
<tr>
<td class="grhead"><?= $profile_viewhead0 ?></td>
<td class="grhead"><?= $profile_viewhead1 ?></td>
<td class="grhead" style="text-align:center"><?= $profile_viewhead2 ?></td>
<td class="grhead" width="20%" align="center"><?= $profile_viewhead3 ?></td>
</tr>
<?
			$FileNm = $sitepath . "profile_view_history.php";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
			$fromqry = "from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=tbldatingusermaster.userid and  tbldatingprofilehistorymaster.currentstatus In (0,1) and tbldatingusermaster.currentstatus=0 and tbldatingprofilehistorymaster.touserid=$curruserid";
			if($gender!=''){
				$fromqry .= " AND tbldatingusermaster.genderid!=$gender";
			}
			
		$totalnorecord = getonefielddata( "select count(historyid) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$profile_viewmngrltnext,$profile_viewmngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];						
		$result = getdata("select count(historyid), tbldatingprofilehistorymaster.fromuserid," . findage() . ",religianid,castid,state,city,countryid,heightid,maritalstatusid,educationid,ocupationid $fromqry group by tbldatingprofilehistorymaster.fromuserid,age,religianid,castid,state,city,countryid $NoOfRecord");
		
		while($rs= mysqli_fetch_array($result))
		{
		 $total_view = $rs[0] ;
		 $name = findnameuser($rs[1]);
		 $UserId= $rs[1];
		$profile_code = display_profile_code($UserId);
		 $age = $rs[2];
		 $religianid= $rs[3];
		 if ($religianid != "")
		 	$religianid = getonefielddata("select title from tbldatingreligianmaster where id=$religianid");
		 $castid= $rs[4];
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
		 $state= $rs[5];
		 if($rs[6]!="" && $rs[6]!="0.0" && is_numeric($rs[6])){
		 	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[6]);
		 } else {
			$city = '';	 
		 }
		 $countryid= findcountryid($rs[7]);
		 $height = $rs['heightid'];
		 if($height != '' && is_numeric($height)){
			$con = " / ";
			$height = getonefielddata("select title from tbldatingheightmaster where id=$height and currentstatus=0");
			$height = $con . $height;
		 }
		 $maritalstatus = $rs['maritalstatusid'];
		 if($maritalstatus!='' && is_numeric($maritalstatus)){
			$maritalstatus = getonefielddata("select title from tbldatingmaritalstatusmaster where id=$maritalstatus and currentstatus=0"); 
		 }
		 $educationid = $rs['educationid'];
		 if($educationid != '' && is_numeric($educationid)){
			$educationid = getonefielddata("select title from tbl_education_master where id=$educationid and currentstatus=0"); 
		 }
		 $occupationid = $rs['ocupationid'];
		 if($occupationid != '' && is_numeric($occupationid)){
			$occupationid = getonefielddata("select title from tbldatingoccupationmaster where id=$occupationid and currentstatus=0");		 	
		 }	 
$imagenm = find_user_image($UserId,"","","");
			?>
            	<tr valign="top">
                	<td class="fav_bg" colspan="4" height="35">
                    	<? if(enable_name_display=='Y' && $name != ''){ ?>
					<strong><?= $name?></strong><? } ?><i>[<?= $profile_code ?>]</i>
                
                    </td>
                </tr>
				<tr valign="top">
				<td class="gritem1"><div class="gridimage">
                
				<?= setdisplayprofilelink($UserId,$imagenm) ?></div>&nbsp;</td>
				<td class="gritem1" height="80px">
                <div class="gritem_l">
				<? if($age != '' && $height!= ''){?>
					<strong><?= $express_intrest_receivedhead02age ?> / <?= $express_intrest_receivedhead02height ?></strong> <?= $age ?> <?= $height ?> <?= $castid ?><br />
                <? } else if($age!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02age ?></strong> <?= $age ?> <?= $castid ?><br />
         		<? } else if($height!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02height ?></strong> <?= $height ?> <?= $castid ?><br />
				<? } ?><? if($maritalstatus != ''){?>
                	<strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatus ?><br />
                <? } ?><? if($castid != ''){?>
                	<strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?><br />
                <? } ?><? if($religianid != ''){?>
                	<strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religianid ?><br />
                <? } ?></div><div class="gritem_r"><? if($city != ''){?>
					<strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?><br />
                <? } ?><? if($countryid != ''){?>
                	<strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?><br />
                <? } ?><? if($educationid != ''){?>
                	<strong><?= $express_intrest_receivedhead08 ?></strong> <?= $educationid ?><br />
                <? } ?><? if($occupationid != ''){?>
                	<strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupationid ?><br />
                <? } ?></div>
				</td>								
				<td class="gritem1" style="text-align:center"><?= $total_view?></td>
				<td class="gritem1">
			    <img align="absmiddle" src="<?= $siteimagepath ?>images/displayprofileicon.gif" border="0" alt="" /><?= setdisplayprofilelink($UserId,$favoriteaction2) ?><? if (enable_communication=='Y'){ ?><br />
<? } ?>
				</td></tr>
			<?
			}
			freeingresult($result);
			?>
			</table>	
</div>
<br />
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>

		</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>