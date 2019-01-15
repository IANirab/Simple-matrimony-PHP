<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-8 midle_title"><span><?= $viewedotherprofiles_list ?> </span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-2 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div>

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>

<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="table-responsive grlink">
<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0"  class="grborder">
<thead>
<tr>
<th class="grhead"><?= $express_intrest_senthead0 ?></th>
<th class="grhead"><?= $express_intrest_senthead1 ?></th>
<? if(enable_communication=='Y'){ ?>	
<th class="grhead" align="center"><?= $express_intrest_senthead3 ?></th><? } ?>
</tr>
</thead>
<tbody>
<?
			//tbldatingprofilehistorymaster
			$FileNm = $sitepath . "viewedotherprofiles.php";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
				
			$fromqry = "from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.fromuserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid." group by touserid order by historyid DESC ";		
		$totalnorecord = getonefielddata( "select count(historyid) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$express_intrest_sentmngrltnext,$express_intrest_sentmngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];
		/*echo "select historyid, name,userid,imagenm,concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state, city,countryid $fromqry $NoOfRecord";
		exit;*/		
		$result = getdata("select historyid, name,userid,imagenm,concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state, city,countryid,date_format(tbldatingprofilehistorymaster.CreateDate,'$date_format') as CreateDate,heightid,maritalstatusid,educationid,ocupationid $fromqry $NoOfRecord");
		$row = mysqli_num_rows($result);
		while($rs= mysqli_fetch_array($result))
		{
		 $id = $rs['historyid'];
		 $name = $rs['name'];
		 $userid = $rs['userid'];
		 $imagenm = $rs['imagenm'];
		 $CreateDate = $rs['CreateDate'];
		 $contact = $rs[7];
		 $age = $rs['age'];
		 $religionid = $rs['religianid'];
		 if ($religionid != "")
		 	$religionid = getonefielddata("select title from tbldatingreligianmaster where id=$religionid"); 
		 $castid = $rs['castid'];
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
		 $area = $rs['area'];
		 $state = $rs['state'];
		 if($rs['city'] != '0.0' && $rs['city']!='' && is_numeric($rs['city'])) {
		 	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs['city']);
		} else {
			$city = "";
		}
		$heightid = $rs['heightid'];
		 if($heightid != "" && is_numeric($heightid)){
			$con = " / ";
			$heightid = getonefielddata("select title from  tbldatingheightmaster where id=$heightid and currentstatus=0"); 
			$heightid = $con . $heightid;
		 }
		 $maritalstatusid = $rs['maritalstatusid'];
		 if($maritalstatusid!= '' && is_numeric($maritalstatusid)){
			$maritalstatusid = getonefielddata("select title from  tbldatingmaritalstatusmaster where id=$maritalstatusid and currentstatus=0"); 
		 }
		 $education = $rs['educationid'];
		 if($education!='' && is_numeric($education)){
			 $education = getonefielddata("select title from tbl_education_master where id=$education and currentstatus=0");
		 }
		 $occupation = $rs['ocupationid'];
		 if($occupation!='' && is_numeric($occupation)){
			$occupation = getonefielddata("select title from  tbldatingoccupationmaster where id=$occupation and currentstatus=0"); 
		 }
		 $countryid = findcountryid($rs['countryid']);
		 $profile_code = display_profile_code($userid);
		 $intrest_img = express_intrest_find_status($accepted,$deleted="");	 
		
		$imagenm = find_user_image($userid,"","","");
			?>
            	<tr>
                	<td class="fav_bg" colspan="4" height="35">
                   
           
					<?	if($name != ''){ ?>
						  <? if(findsettingvalue('display_user_name')=='Y'){?>
					  <?=$name?> &nbsp;
                       <?  }else{?> 
                       <?=display_name_roundc($name)?>		
                       <? } ?>
                        <i>[ <?= $profile_code ?> ]</i>
                	<? } ?> 	
                    </td>
                </tr>
				<tr>
				<td align="center" class="gritem" valign="top"><div class="gridimage">
				<?=setdisplayprofilelink($userid,$imagenm); ?>
				</div>
				</td>
				<td class="gritem">
                <div class="gritem_l"> 	
				<? if($name != ''){ ?>
					<strong><?= $express_intrest_receivedhead01 ?></strong> <?= $name?> [ <?= $profile_code ?> ]<br />
                <? } if($age != '' && $heightid!= ''){?>
					<strong><?= $express_intrest_receivedhead02age ?> / <?= $express_intrest_receivedhead02height ?> : </strong> <?= $age ?> <?= $heightid ?> <br />
                <? } else if($age!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02age ?> : </strong> <?= $age ?> <?= $castid ?><br />
         		<? } else if($heightid!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02height ?> : </strong> <?= $heightid ?> <?= $castid ?><br />
				<? }if($maritalstatusid != ''){?>
                	<strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatusid ?><br />
                <? } if($castid != ''){?>
                	<strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?><br />
                <? } if($religionid != ''){?>
                	<strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religionid ?></div><div class="gritem_r"> 	
                <? } if($city != ''){?>
					<strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?><br />
                <? } if($countryid != ''){?>
                	<strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?><br />
                <? } if($education != ''){?>
                	<strong><?= $express_intrest_receivedhead08 ?></strong> <?= $education ?><br />
                <? } if($occupation != ''){?>
                	<strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupation ?><br />
                <? } if($CreateDate != ''){ ?>
                	<strong>Date : </strong> <?= $CreateDate ?><br />
                <? } ?>    
                </div>

</td>
				<?php /*?><td class="gritem"><?= $intrest_img ?></td><?php */?>
				<?php /*?><td class="gritem"><?=$CreateDate?></td><?php */?>
                <? if(enable_communication=='Y'){ ?>
                <td class="gritem"><img align="absmiddle" src="<?= $siteimagepath ?>images/displayprofileicon.png" border="0" alt="" /><?= setdisplayprofilelink($userid,$image_on_request_receivedaction2) ?>
                
                </td><? } ?>
				</tr>
			<?
			}
				freeingresult($result);
			?>
            </tbody>
			</table>	
</div>
<?
if($row > 20) {
?>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>
<?
}
?>
		</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>