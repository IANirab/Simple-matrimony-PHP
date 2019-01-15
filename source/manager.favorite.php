


 <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $favoritepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div>   
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
        <?
                 $pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);
				?>

        
        
		<form method='post' name='frmmodify'><input type='hidden' name='hidid'></form>

<div class="errorbox"><span><?php checkerror(); ?></span></div>
<div class="table-responsive grlink">
<table border=0 width="100%" align="center" cellpadding="0" cellspacing="0"  class="grborder">
<thead>
<tr>

<th  class="grhead"><?= $favoritehead0 ?></th>
<th class="grhead"><?= $favoritehead1 ?></th>
<?php /*?><td width="25%" class="grhead"></td><?php */?>
<?php /*?><td width="15%" class="grhead"><?= $favoritemanager_comment ?></td><?php */?>
<th class="grhead"  align="center"><?= $favoritehead3 ?></th>
</tr>
</thead>
 <tbody>
<?
			$FileNm = $sitepath . "favoritemanager.php";
			if (isset($_GET["pgnm"]))
				$Pgnm = $_GET["pgnm"];
			else
				$Pgnm = 1;
				
			$fromqry = "from tbldatingshortlistmaster,tbldatingusermaster where tbldatingshortlistmaster.UserId=tbldatingusermaster.userid and  tbldatingshortlistmaster.CurrentStatus in (0,1) and tbldatingusermaster.currentstatus in (0,1) and tbldatingshortlistmaster.CreateBy=$curruserid 
			and tbldatingshortlistmaster.list_status='Y'
			order by ShortlistId DESC ";			
		$totalnorecord = getonefielddata( "select count(ShortlistId) $fromqry ");		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$favoritemngrltnext,$favoritemngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];

		$result = getdata("select ShortlistId, name,date_format(tbldatingshortlistmaster.CreateDate,'$date_format'),tbldatingshortlistmaster.UserId,imagenm,concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state,
city,countryid,sel_id,comment,heightid,maritalstatusid,educationid,ocupationid,tbldatingshortlistmaster.CurrentStatus 
$fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $ShortlistId = $rs[0] ;
		 $name = findnameuser($rs[3]);
		 if ($rs[2] != "")
		 $CreateDate =$rs[2];
		 else
		 $CreateDate = "";
		 $UserId= $rs[3];
		 $imagenm = $rs[4];
		// $profile_code = $rs[5];
		$profile_code = display_profile_code($UserId);
		 $age = $rs[6];
		 $religianid= $rs[7];
		 if ($religianid != "")
		 	$religianid = getonefielddata("select title from tbldatingreligianmaster where id=$religianid");
		 $castid= $rs[8];
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id=$castid");
		 $area= $rs[9];
		 $state= $rs[10];
		 
		 if($rs[10]!=''  && $rs[10]!='0.0' && is_numeric($rs[10]) ){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[10]);	 
		 } else {
			$state = '';	 
		 }		 
		 $city= $rs[11];
		 if($rs[11]!='' && $rs[11]!='0.0' && is_numeric($rs[11])){
		 	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[11]);
		 } else {
			$city = '';	 
		 }	
		 $countryid= findcountryid($rs[12]);
		 $sel_id = $rs[13];
		 $comment = $rs[14];
		 $height = $rs['heightid'];
		 if($height != '' && is_numeric($height)){
			$con = " / ";
			$height = getonefielddata("select title from tbldatingheightmaster where id=$height and currentstatus=0");
			//$height = $con . $height;
			$height = $height;
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
		 $CurrentStatus=$rs['CurrentStatus'];
			?>
           
            	<tr>
                	<td class="fav_bg" height="35" colspan="5" align="left" valign="top">&nbsp;&nbsp;  <? if(enable_name_display=='Y' && $name != ''){ ?>
					 <strong><?= $name?></strong> 
                <? } ?><i>[ <?= $profile_code ?> ]</i>
                </td>
                </tr>
				<tr>
				<td align="center" class="gritem" valign="top"><div class="gridimage">
					<?=setdisplayprofilelink($UserId,$imagenm) ?> <?= $CreateDate?></div>
                </td>
				<td align="left" class="gritem">
                <div class="gritem_l"> 
				<? if($age!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02age ?></strong> <?= $age ?> <?= $castid ?><br />
         		<? } if($height!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02height ?></strong> <?= $height ?><br />
                <? } if($maritalstatus != ''){?>
                	<strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatus ?><br />
                <? } ?><? if($castid != ''){?>
                	<strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?><br />
                <? } ?><? if($religianid != ''){?>
                	<strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religianid ?><br /><? } ?></div> 
                    
                    <div class="gritem_r">  <? if($city != ''){?>
					<strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?><br />
                <? } ?><? if($countryid != ''){?>
                	<strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?><br />
                <? } ?><? if($educationid != ''){?>
                	<strong><?= $express_intrest_receivedhead08 ?></strong> <?= $educationid ?><br />
                <? } ?><? if($occupationid != ''){?>
                	<strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupationid ?><br />
                <? } ?>	 </div>
                <div class="gritem_comment">             
                <p><span style="display:inline">
                		<div id="exist<?=$ShortlistId?>" style="display:inline"><?=$sel_id?><br></div>
					  <?=$comment ?>
					  </span></p>
					<p><img src="uploadfiles/add_comment.png" title="Add Comment" onClick="enable_comment('<?=$ShortlistId?>','open');" border="0">
					  </p>
					
		<div id="show<?=$ShortlistId?>" style="display:none;"></div>
		<div id="<?=$ShortlistId?>" style="display:none;" class="Profile_commentBox">
        	<div class="form-group">
			<textarea name="comment<?=$ShortlistId?>" id="comment<?=$ShortlistId?>" class="form-control" ></textarea>
            </div>
            
		<? 
			$dd_val = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=130");
			$dd_val_arr = explode(",",$dd_val);
		?><div class="form-group">
			<select class="form-control" id="sel<?=$ShortlistId?>">
				<option value="">Select</option>
		<? 
			for($i=0; $i<count($dd_val_arr); $i++){ ?>
				<option value="<?=$dd_val_arr[$i]?>"><?=$dd_val_arr[$i]?></option>
		<?		
			}
		?>		
			</select>
            </div>
            <div class="butOuter">
            	<img src="uploadfiles/save_comment.png" title="Save Comment" onClick="save_comment('<?=$ShortlistId?>');">
			<img src="uploadfiles/close_comment.png" title="Close Comment" onClick="enable_comment('<?=$ShortlistId?>','close');">
            </div>
			
		</div></div>
				</td>								
			
			
        
         		                
				<td align="center" class="gritem existing_dummy" valign="top">
                <?php /*?><?=setdisplayprofilelink($UserId,$favoriteaction2) ?><?php */?>                
                <a class="bluelink" href="<?=$sitepath?>displayprofile.php?b=<?=$UserId?>">
			    <div class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/displayprofileicon.png" border="0" alt="" /></div>
                <span><?=$favoriteaction2?></span></a> <br />
                <? if(enable_communication=='Y' && $pkgprice>0 ){ ?>
               <?
				}if(enable_communication=='Y'){
               ?>
               	<a onclick="send_contactreq(<?= $UserId ?>);" href="javascript:void(0);" 
                    data-toggle="modal" data-target="#myModal">
                    <div class="mrcrg">
                    <img align="absmiddle" src="<?= $siteimagepath ?>images/requestphoneicon.png" border="0" alt="" />
                    </div>
                    <span class=""><?= $searchgridrequestphonelink ?></span></a><br />
               <? } ?>
                    
					<a href='<?= $sitepath ?>favoritedelete.php?b=<?= $ShortlistId?>'><div class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/deleteicon.png" border="0" alt="" /></div><span class="deletelink"><?= $favoriteaction1 ?></span></a>
                    
                    <span id="error_notify_top" style="display:none"></span>
                    <? if($CurrentStatus==0){?> 
                    <a href="javascript:void(0)" onclick="notify_send(13,<?=$UserId?>);">
                    <span class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/MBlock_icon.png" border="0" alt="" /></span><?=$notify_block?> </a>
                    <? }?>
                    <? if($CurrentStatus==1){?> 
                    <a href="javascript:void(0)" onclick="notify_send(14,<?=$UserId?>);"><span class="mrcrg"><img align="absmiddle" src="<?= $siteimagepath ?>images/MUnblock_icon.png" border="0" alt="" /></span> <?=$notify_unblock?></a>
                    <? }?>
                    	
					</td>
                </tr>
               
			<?
			}
				freeingresult($result);
			?> </tbody>
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
		</div>