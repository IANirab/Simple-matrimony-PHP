<!-- ********* TITLE START HERE *********-->
		<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-10 midle_title"><span><?= $viewedothercontacts_list ?> </span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
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
			$FileNm = $sitepath . "viewedothercontacts.php";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
				
			$fromqry = "from tblphonerequestmaster,tbldatingusermaster where  tblphonerequestmaster.fromuserid=$curruserid and  tblphonerequestmaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tblphonerequestmaster.touserid = tbldatingusermaster.userid order by id DESC ";
		
		$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$express_intrest_sentmngrltnext,$express_intrest_sentmngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];	
			

		$result = getdata("select id, name,userid,imagenm,accepted,received_delete,date_format(response_received_date,'$date_format'),concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state, city,countryid,mobile,landline,callingtime,country_code,city_code,address,email,tblphonerequestmaster.createdate,response_received_date,heightid,maritalstatusid,educationid,ocupationid $fromqry $NoOfRecord");

		
		while($rs= mysqli_fetch_array($result))
		{
		 $id = $rs['id'];
		 $name = $rs['name'];
		 $userid = $rs['userid'];
		 $check_private = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$userid);
		 $imagenm = $rs['imagenm'];
		 $accepted = $rs['accepted'];
		 $response_received_date = $rs['response_received_date'];
		 if($rs[6]!=""){
		 	$CreateDate = $rs[6];
		} else {
			$CreateDate = "";	
		}	
		 $contact = $rs[7];
		 $age = $rs['age'];
		 $religionid = $rs[9];
		 if ($religionid != "")
		 	$religionid = getonefielddata("select title from tbldatingreligianmaster where id=$religionid"); 
		 $castid = $rs[10];
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
		 $area = $rs[11];
		 $state = $rs[12];
		 if($rs[13]!="" && $rs[13]!='0.0' && is_numeric($rs[13])){
			 $city = findtitleofprofilefld($rs[13],"tbldating_city_master");
		 } else {
			$city = "";
		 }
		 $countryid = findcountryid($rs[14]);		 
		 $mobile = $rs[15];
		 $landline = $rs[16];
		 $callingtime = $rs[17];
		 $countrycode = $rs[18];
		 $city_code = $rs[19];
		 $address = $rs[20];
		 $email = $rs[21];
		 
		 if($countrycode!="" && $mobile){
			$mobile = $countrycode."-".$mobile;			
		 }
		 
		 if($countrycode!='' && $city_code!="" && $landline!=""){
			$landline = $countrycode."-".$city_code."-".$landline;
		 }
		 $profile_code = display_profile_code($userid);
		 //if($check_private=='Y'){
		 	$intrest_img = express_intrest_find_status($accepted,$deleted="");	 
		 /*} else {
			$intrest_img = '';	 
		 }*/
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
		$imagenm = find_user_image($userid,"","","");
		$dt = $rs[22];
			?>
            	<tr>
                	<td colspan="3" height="35">
                  
					<?	if($name != ''){ ?>
				      <? if(findsettingvalue('display_user_name')=='Y'){?>
					  <?=$name?> &nbsp;
                       <?  }else{?> 
                       <?=display_name_roundc($name)?>		
                       <? } ?> 
                        <i>[<?= $profile_code ?>]</i>
                	<? } ?>	
                    </td>
                </tr>
				<tr>
				<td align="center" class="gritem" valign="top"><div class="gridimage">
				<?=setdisplayprofilelink($userid,$imagenm); ?>
				</div>
				</td>
				<td class="gritem" valign="top">
                <div class="viewedothercontacts_detail">
                <div class="gritem_l">                 	
				<? 				
				if($age != '' && $heightid!= ''){?>
					<strong><?= $express_intrest_receivedhead02age ?> / <?= $express_intrest_receivedhead02height ?> : </strong> <?= $age ?> <?= $heightid ?>
                <? } else if($age!= '' ){ ?>
					<br /><strong><?= $express_intrest_receivedhead02age ?> : </strong> <?= $age ?> <?= $castid ?>
         		<? } else if($heightid!= '' ){ ?>
					<br /><strong><?= $express_intrest_receivedhead02height ?> : </strong> <?= $heightid ?> <?= $castid ?>
				<? }if($maritalstatusid != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatusid ?>
                <? } if($castid != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?>
                <? } if($religionid != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religionid ?></div><div class="gritem_r"> 	
                <? } if($city != ''){?>
					<br /><strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?>
                <? } if($countryid != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?>
                <? } if($education != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead08 ?></strong> <?= $education ?>
                <? } if($occupation != ''){?>
                	<br /><strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupation ?>
                <? } if($response_received_date!=''){ ?>
                	<br /><strong>Date : </strong><?=$response_received_date?>
                <? } //if($accepted=='A' || $check_private=='N') {   ?>                
                <? if($accepted=='A') { ?>                
					<?php /*?><?= $area ?> <?= $state ?>  <?= $countryid ?><br /><?php */?>
                <? 
				$view_contact_packageid = user_can_see_contact_detail($curruserid);
				if($view_contact_packageid!="")	{
				if($mobile!="") { ?>
                <br /><strong><?= $viewedothercontacts_mobile?></strong> : <?=$mobile?>
                <? } if($landline!="") { ?>
                <br /><strong><?= $viewedothercontacts_landline?> </strong>: <?=$landline?>
                <? } if($address!="") {  ?>
                <br /><strong><?= $viewedothercontacts_address?></strong> : <?=$address?>
                <? } if($email!="") { ?>
                <br /><strong><?= $viewedothercontacts_email?></strong> : <?=$email?>
                <? } 
				}
				}
				?>
				</div>		
			
                    </div>
				</td>
				
			
                <? if(enable_communication=='Y'){ ?>
                <td class="gritem" valign="top">
                	<img align="absmiddle" src="<?= $siteimagepath ?>images/displayprofileicon.png" border="0" alt="" /><?= setdisplayprofilelink($userid,$image_on_request_receivedaction2) ?>
                    
                    </td><? } ?>
				</tr>
			<?
			}
				freeingresult($result);
			?>
            </tbody>
			</table>	
</div>
<div class="nextback">
<div class="backtext"><?= $BackStr ?></div>
<!-- < ?= $objapp->NoofPages ?>-->
<div class="nexttext"><?= $NextStr ?></div>
</div>

		</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>