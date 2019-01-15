	<!-- ********* TITLE START HERE *********-->
<div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-10 midle_title"><span><?= $viewmycontact_listwhoviewedmycontact ?></span></div>
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
<th class="grhead" align="center"><?= $express_intrest_senthead3 ?></th>
<? } ?>
</tr>
</thead>
<tbody>
<?
	  $FileNm = $sitepath . "viewedmycontact.php";
	  if (isset($_GET["pgnm"]))
		  $Pgnm = $_GET["pgnm"];
	  else
		  $Pgnm = 1;
				
			$fromqry = "from tblphonerequestmaster,tbldatingusermaster where  tblphonerequestmaster.touserid=$curruserid and  tblphonerequestmaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tblphonerequestmaster.fromuserid = tbldatingusermaster.userid order by id DESC ";
		
		$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
		$arrval = setpaging($Pgnm,$totalnorecord,$FileNm ."?",$express_intrest_sentmngrltnext,$express_intrest_sentmngrltback);
		$NoOfRecord = $arrval["NoOfRecord"];
		$BackStr = $arrval["BackStr"];
		$NextStr = $arrval["NextStr"];		
		$result = getdata("select id, name,userid,imagenm,accepted,received_delete,date_format(response_received_date,'$date_format'),concat(substr(name,1,1),'-',profile_code)," . findage() . ",religianid,castid,area,state, city,countryid,response_received_date,heightid,maritalstatusid,educationid,ocupationid $fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $id = $rs['id'];
		 $name = $rs['name'];
		 $userid = $rs['userid'];
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
		 if($rs[12]!=''  && $rs[12]!='0.0' && is_numeric($rs[12]) ){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[12]);	 
		 } else {
			$state = '';	 
		 }		 
		 if($rs[13]!='' && $rs[13]!='0.0' && is_numeric($rs[13])){
		 	$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[13]);
		 } else {
			$city = '';	 
		 }
		 $countryid = findcountryid($rs[14]);
		 $heightid = $rs[16];
		 if($heightid != "" && is_numeric($heightid)){
			$con = " / ";
			$heightid = getonefielddata("select title from  tbldatingheightmaster where id=$heightid and currentstatus=0"); 
			$heightid = $con . $heightid;
		 }
		 $maritalstatusid = $rs[17];
		 if($maritalstatusid!= '' && is_numeric($maritalstatusid)){
			$maritalstatusid = getonefielddata("select title from  tbldatingmaritalstatusmaster where id=$maritalstatusid and currentstatus=0"); 
		 }
		 $education = $rs[18];
		 if($education!='' && is_numeric($education)){
			 $education = getonefielddata("select title from tbl_education_master where id=$education and currentstatus=0");
		 }
		 $occupation = $rs[19];
		 if($occupation!='' && is_numeric($occupation)){
			$occupation = getonefielddata("select title from  tbldatingoccupationmaster where id=$occupation and currentstatus=0"); 
		 }
		 
		 $profile_code = display_profile_code($userid);
		 $intrest_img = express_intrest_find_status($accepted,$deleted="");	 
		
		$imagenm = find_user_image($userid,"","","");
			?>
            	<tr>
                	<td class="fav_bg" colspan="4" height="35">
                    <? if($name != ''){ ?>
							  <? if(findsettingvalue('display_user_name')=='Y'){?>
					  <?=$name?> &nbsp;
                       <?  }else{?> 
                       <?=display_name_roundc($name)?>		
                       <? } ?> 	
                            <i>&nbsp;[<?= $profile_code ?>]</i>
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
				<? if($age != '' && $heightid!= ''){?>
                
	<strong><?= $express_intrest_receivedhead02age ?> / 
	<?= $express_intrest_receivedhead02height ?> : </strong> 
	<?= $age ?> <?= $heightid ?> <br />
                
				<? } else if($age!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02age ?> : </strong> <?= $age ?><br />
         		
				<? } else if($heightid!= '' ){ ?>
					<strong><?= $express_intrest_receivedhead02height ?> : </strong> <?= $heightid ?> <?= $castid ?><br />
				
				<? }if($maritalstatusid != ''){?>
                	<strong><?= $express_intrest_receivedhead03 ?></strong> <?= $maritalstatusid ?><br />
                <? } if($castid != ''){?>
                	<strong><?= $express_intrest_receivedhead04 ?></strong> <?= $castid ?><br />
                <? } if($religionid != ''){?>
                	<strong><?= $express_intrest_receivedhead05 ?></strong> <?= $religionid ?>
                <? } ?></div><div class="gritem_r"> 	 <? if($city != ''){?>
					<strong><?= $express_intrest_receivedhead06 ?></strong> <?= $city ?><br />
                <? } if($countryid != ''){?>
                	<strong><?= $express_intrest_receivedhead07 ?></strong> <?= $countryid ?><br />
                <? } if($education != ''){?>
                	<strong><?= $express_intrest_receivedhead08 ?></strong> <?= $education ?><br />
                <? } if($occupation != ''){?>
                	<strong><?= $express_intrest_receivedhead09 ?></strong> <?= $occupation ?><br />
                <? } if($response_received_date!=''){ ?>
                	<strong>Response Date : </strong> <?= $response_received_date ?><br />
                <? } ?></div>

</td>
				
                <? if(enable_communication=='Y'){ ?>
                <td class="gritem"><img align="absmiddle" src="<?= $siteimagepath ?>images/displayprofileicon.png" border="0" alt="" />&nbsp;&nbsp;<?= setdisplayprofilelink($userid,$image_on_request_receivedaction2) ?>
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