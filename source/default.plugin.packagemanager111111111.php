<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $packagemanagerpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
</div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
<? $package_limit=findsettingvalue('package_limit'); ?> 
<script>
 function show_detailC(detail,price)
{
		$("#dis_detailC").show();
		$("#dis_detailC").html(detail);
		$("#dis_priceC").show();
		$("#dis_priceC").html(price);
}

 function show_detailD(detail,price)
{
		$("#dis_detailD").show();
		$("#dis_detailD").html(detail);
		$("#dis_priceD").show();
		$("#dis_priceD").html(price);
}

 function show_detailE(detail,price,pckid)
{
	
	<? $select_pck = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=2 
			and currentstatus=0  order by 
		 PackageId desc limit ".$package_limit." "); 
		while($row1 = mysqli_fetch_array($select_pck))
		{  ?>
			$("#new_r<?=$row1[0]?>").removeClass("Active_Price");
		
		<? } ?>
	$("#new_r"+pckid).addClass('Active_Price');
	
		$("#dis_detailE").show();
		$("#dis_detailE").html(detail);
		$("#dis_priceE").show();
		$("#dis_priceE").html(price);
}

 function show_detailF(detail,price,pckid)
{
	
	<? $select_pck = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=1 
			and currentstatus=0  order by 
		 PackageId desc limit ".$package_limit." "); 
		while($row1 = mysqli_fetch_array($select_pck))
		{  ?>
			$("#new<?=$row1[0]?>").removeClass("Active_Price");
		<? } ?>
	$("#new"+pckid).addClass('Active_Price');
	
		$("#dis_detailF").show();
		$("#dis_detailF").html(detail);
		$("#dis_priceF").show();
		$("#dis_priceF").html(price);
}

 </script> 
  

       
		<!-- ********* CONTENT START HERE *********-->
		<!--< ?= //$contactustext ?>-->
<table border="0" cellspacing="0" cellpadding="0" class="package_table">
<tr>
<td align="justify" class="paymentterms"><?= $payment_terms ?></td>
</tr>
</table>
<form name="frmpackage" id="frmpackage" action="<?= $sitepath ?>packagemanangerinsert.php" method="post">
<? if(findsettingvalue('sp_offer_banner')!="") {
	if(file_exists("uploadfiles/site_".$sitethemefolder."/".findsettingvalue('sp_offer_banner'))){
 ?>
 
<table border="0" cellspacing="0" cellpadding="0" class="package_banner_table">
<tr>
	<td align="left"><img src="uploadfiles/site_<?=$sitethemefolder;?>/<?=findsettingvalue('sp_offer_banner');?>" /></td>
</tr>
</table>

<? }
}

$pkg_id=0;
$pkgtype_id =0;
if ($curruserid != "")
	{
		$pkg_id = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);
		if($pkg_id==''){
			execute("update tbldatingusermaster SET packageid=1 WHERE userid=".$curruserid);
			$pkg_id = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);
		}
		$pkgtype_id = getonefielddata("SELECT packagetypeid from tbldatingpackagemaster WHERE packageid=".$pkg_id." AND price>0");
		?>
		<? } ?>

<div>

<? if($curruserid!=0){?>
<div class="AllpackagesBlock_outer">
<a class="btn" href="javascript:void(0)" onclick="pckg_info_dash()"><i class="fa fa-cube" aria-hidden="true"></i>
<?=$dash_pck_info?></a>
<div id="pckg_info_dash" style="display:none">
           </div>
<? } ?>

<? 

if($pkg_id!='' && $pkgtype_id==1 || $pkgtype_id==2) {?>
<!-------------------------------renew package start-------------------------------->
<script>
	
	function bigImg_r(id) 
	{
		if(document.getElementById("dis_detailE").style.display=='none')
		{
				
		
			<? $select_pck = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=2 
			and currentstatus=0  order by 
		 PackageId desc limit ".$package_limit." "); 
		while($row1 = mysqli_fetch_array($select_pck))
		{  ?>
			$("#new_r<?=$row1[0]?>").removeClass("Active_Price");
		
		<? } ?>
		}
		
	}

function bigImg_new_r()
	{
			
				if(document.getElementById("dis_detailE").style.display=='none')
				{
					
			<? $select_pck1 = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=2
			and currentstatus=0 order by 
		 	PackageId desc limit 1,1"); 
			while($row11 = mysqli_fetch_array($select_pck1))
			{  ?>
				$("#new_r<?=$row11[0]?>").addClass("Active_Price");
		
			<? } ?>
			
			}
		
	}
</script>
	<div class="Price_Table">	                  
    	<div class="container">
    <? 
	$i=1;
$CurrencySymbol=findsettingvalue("CurrencySymbol");

	 $select_pck = getdata("SELECT `PackageId`, `main_package_typeid`, `PackageTypeId`, `parentid`, `Description`, `Price`, `Days`, `sms_qty`, `formattypeid`, `default_type`,  `display_price`, `display_price_curr_code`, `no_of_contact_display`, `allow_messenger`, `note`, `order_by`, `package_feature`,`image`,`sms_qty`,`express_count`,`ecard_count` 
	 FROM `tbldatingpackagemaster` WHERE PackageTypeId=2 
	 and currentstatus=0  order by 
	 PackageId desc limit ".$package_limit.""); 
	while($row1 = mysqli_fetch_array($select_pck))
	{ 
		$PackageId=$row1[0];
		$Description=$row1[4];
		$Days=$row1[6];
		$price=$row1[5];
		$display_price=$row1[10];
		$package_feature=$row1[16];
		$no_of_contact_display=$row1[12];
		$image=$row1[17];
		$SMS=$row1[18];
	    $express_count=$row1['express_count'];
		$ecard_count=$row1['ecard_count'];	
		
		if($i==2)
		{$cls="class='Price_block Active_Price'";}else{$cls="class='Price_block'";}
		$i++;	
	?>
        <div class="Price_Outer" onMouseOut="bigImg_new_r()">
            <div <?=$cls?> id="new_r<?=$PackageId?>"  onMouseOver="bigImg_r('<?=$PackageId?>')">
            
            	
                <h2><?=$Description?>  </h2>
                <p class="ImagePrice"><img src="<?=$sitepath?>/uploadfiles/site_<?=$sitethemefolder;?>/<?=$image?>" style="width:50px;height:50px"></p>
                <h3><?=$CurrencySymbol?><?=$price?></h3>
                <h4>
                    <a href="javascript:void(0)"><?=$Days?> Days</a><br>
                	<a>
                      <? if($no_of_contact_display!="" || $no_of_contact_display!=0){?> 
					<?=$no_of_contact_display?> 
                    <? }else{?><i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>  <? }?>
                    Contacts</a><br>
                   <a>
                   <? if($express_count!="" || $express_count!=0){?> 
				   <?=$express_count?>
                    <? }else{?><i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>  <? }?>
                    Express Interst </a><br>
                    <a>
                   <? if($ecard_count!="" || $ecard_count!=0){?> 
					<?=$ecard_count?>
                      <? }else{?><i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>  <? }?>
                     Ecard Send</a><br>
                   <a>
				   <? if($SMS!="" || $SMS!=0){?><?=$SMS?>
				   <? }else{?><i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>  <? }?> SMS</a>
				   
                   
                </h4>
           		
           
                <ul>
				
                    
                   
                			<?
                 $select_pck_feat = getdata("SELECT `id`, `title`, `imgnm`, `help` FROM `tbldatingpackagefeaturedmaster` WHERE currentstatus=0 "); 
                while($row2 = mysqli_fetch_array($select_pck_feat))
                {   $Package_featid=$row2[0];
                    $feat_title=$row2[1];
                    $feat_img=$row2[2];
                    $feat_help=$row2[3];
                  ?>
                  	
                    <li>
					<? $package_feature1 = explode(",",$package_feature);
                    if(in_array($Package_featid,$package_feature1))
					{ ?>
					<i class="fa fa-check" aria-hidden="true"></i> 
					<? } ?> 
                    <? if(!in_array($Package_featid,$package_feature1))
					{ ?>
					<i class="fa fa-times" aria-hidden="true"></i> 
					<? } ?>
                    <?=$feat_title?> 
                    </li>
                <? } ?>
                    
                </ul>
            
                <div class="Puc_but">                	                                                           
                	<span class="Puc-but-in">
                   <input class="rabtn" type="radio" name="membershippackage" id="membershippackage" value="<?=$PackageId?>" onclick="show_detailE('<?= $Description ?>','<?= $CurrencySymbol." ".$price ?>','<?=$PackageId?>')"/>
                </span>			
                </div>
             </div>
        </div>
   <? } ?>     
    </div>
</div>
<!---------------------------------renew package end----------------------------------------------->
<? }else{ ?>
<!-------------------------------membership package start-------------------------------->
	<script>
	
	function bigImg(id) 
	{
		
		if(document.getElementById("dis_detailF").style.display=='none')
		{	
			<? $select_pck = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=1 
			and currentstatus=0  order by 
		 PackageId desc limit ".$package_limit.""); 
		while($row1 = mysqli_fetch_array($select_pck))
		{  ?>
			$("#new<?=$row1[0]?>").removeClass("Active_Price");
		
		<? } ?>
		}
		
	}

function bigImg_new()
	{
			
		if(document.getElementById("dis_detailF").style.display=='none')
		{
			<? $select_pck1 = getdata("SELECT `PackageId` FROM `tbldatingpackagemaster` WHERE PackageTypeId=1
			 and currentstatus=0  order by 
		     PackageId desc limit 1,1"); 
		     while($row11 = mysqli_fetch_array($select_pck1))
			{  ?>
			$("#new<?=$row11[0]?>").addClass("Active_Price");
			<? } ?>
		}
		
	}
	
	
	
</script>
	<div class="Price_Table">	                  
    	<div class="container">
    <? 

$CurrencySymbol=findsettingvalue("CurrencySymbol");

	 $select_pck = getdata("SELECT `PackageId`, `main_package_typeid`, `PackageTypeId`, `parentid`, `Description`, `Price`, `Days`, `sms_qty`, `formattypeid`, `default_type`,  `display_price`, `display_price_curr_code`, `no_of_contact_display`, `allow_messenger`, `note`, `order_by`, `package_feature`,`image`,`sms_qty`,`express_count`,`ecard_count`  FROM `tbldatingpackagemaster` WHERE PackageTypeId=1 
	 and currentstatus=0  order by 
	 PackageId desc limit ".$package_limit.""); 
	while($row1 = mysqli_fetch_array($select_pck))
	{ 
		$PackageId=$row1[0];
		$Description=$row1[4];
		$Days=$row1[6];
		$Price=$row1[5];
		$price=$Price;
		$display_price=$row1[10];
		$package_feature=$row1[16];
		$no_of_contact_display=$row1[12];
		$image=$row1[17];
		$SMS1=$row1[18];
	    $express_count=$row1['express_count'];
		$ecard_count=$row1['ecard_count'];
		
		if($i==2)
		{$cls="class='Price_block Active_Price'";}else{$cls="class='Price_block'";}
		$i++;	
	?>
        <div class="Price_Outer" onMouseOut="bigImg_new()">
            <div <?=$cls?> id="new<?=$PackageId?>"  onMouseOver="bigImg('<?=$PackageId?>')">
            
            	
                <h2><?=$Description?>  </h2>
                <p class="ImagePrice"><img src="<?=$sitepath?>/uploadfiles/site_<?=$sitethemefolder;?>/<?=$image?>" style="width:65px;height:65px"></p>
                <h3><?=$CurrencySymbol?><?=$Price?></h3>
                <h4>
                    <a href="javascript:void(0)"><?=$Days?> Days</a><br>
                    <a><? if($no_of_contact_display!=0 && $no_of_contact_display!=''){?>
					<?=$no_of_contact_display?>
                    <? }else{?>
					<i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>
					<? }?>
                     Contacts</a><br>
                    <a>
                    <? if($express_count!=0 && $express_count!=''){?>
					<?=$express_count?> 
                    <? }else{?>
					<i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>
					<? }?>
                    Express Interst </a>
                    <br>
                    <a><? if($ecard_count!=0 && $ecard_count!=''){?>
					<?=$ecard_count?>
					<? }else{?>
					<i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>
					<? }?> Ecard Send</a><br>
                   <a>
				   <? if($SMS1!="" || $SMS1!=0){?><?=$SMS1?>
				   <? }else{?><i class="fa fa-times" aria-hidden="true" style="color:#F00"></i>  <? }?> SMS</a>
                </h4>
           		
           
                <ul>
				                			<?
                 $select_pck_feat = getdata("SELECT `id`, `title`, `imgnm`, `help` FROM `tbldatingpackagefeaturedmaster` WHERE currentstatus=0 "); 
                while($row2 = mysqli_fetch_array($select_pck_feat))
                {   $Package_featid=$row2[0];
                    $feat_title=$row2[1];
                    $feat_img=$row2[2];
                    $feat_help=$row2[3];
                  ?>
                  	
                    <li>
					<? $package_feature1 = explode(",",$package_feature);
                    if(in_array($Package_featid,$package_feature1))
					{ ?>
					<i class="fa fa-check" aria-hidden="true"></i> 
					<? } ?> 
                    <? if(!in_array($Package_featid,$package_feature1))
					{ ?>
					<i class="fa fa-times" aria-hidden="true"></i> 
					<? } ?>
                    <?=$feat_title?> 
                    </li>
                <? } ?>
                    
                </ul>
            
                <div class="Puc_but">  
                <span class="Puc-but-in">              	                                                           
                   <input class="rabtn" type="radio" name="membershippackage" value="<?=$PackageId?>"
                     onclick="show_detailF('<?= $Description ?>','<?= $CurrencySymbol." ".$price ?>','<?=$PackageId?>')" />
                 </span>

                </div>
             </div>
        </div>
   <? } ?>     
    </div>
</div>
    <!-------------------------------membership package end-------------------------------->
<? } ?>   
</div>


<!--//start-->
<? 
$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code,default_type from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=9 and PackageId <> 1");
if(mysqli_num_rows($result)>0) { 	
?>
<div align="left">
		<table width="84%" border="0" cellspacing="0" cellpadding="0" class="packagetable membership_section pkgnew">
		<tr class="packageheads">
		<td colspan="2" class="packageshead"><p>
			<img src="<?= $siteimagepath ?>images/package-member.gif" alt="" border="0" align="absmiddle" class="packageicon" /> &nbsp;&nbsp;<?= $package_offline ?></p>
		</td>
		<td class="packagesheaddays"><?= $packagesdays ?></td><td class="packagesheadprice"><?= $packagesprice ?> </td></tr>
		
		<?
		//$result = getdata("select PackageId, Description,Price,Days from tbldatingpackagemaster where CurrentStatus=0 and LanguageId =$sitelanguageid and PackageTypeId=$packagetypeid and PackageId <> 1");
		
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];
		 $price = $rs[2];
		 $Days = $rs[3];
		 $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		 $default_type = $rs[6];
		 if($default_type==1){
		 	$chk = 'checked="checked"';
		 } else {
		 	$chk = "";
		 }
		?>
		<tr>
		<td class="packagestext" width="20px"><input type="radio" <?=$chk?> id="offline_package" name="offline_package" value="<?= $PackageId ?>"  onclick="show_detailD('<?= $Description ?>','<?= $curr." ".$price ?>')"/></td>
		<td class="packagestext"><?= $Description ?></td>
		<td width="15%" class="packagesdays"><?= $Days ?></td>
		<td width="20%" class="packagesprice"><?= $display_price_curr_code ?> <?= $price ?> </td>
		</tr>
		
		<? } 
			freeingresult($result);
		?>
		</table>
		</div>
		<? } ?>
<!--//end-->		
<br />


<? 
	$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=8 and PackageId <> 1");
	if(mysqli_num_rows($result)>0){
?>
	<div align="left">
	<table width="84%" border="0" cellspacing="0" cellpadding="0" class="packagetable membership_section pkgnew">
		<tr class="packageheads"><td colspan="2" class="packageshead">
		<p><img src="<?= $siteimagepath ?>images/package-seal.png" alt="" border="0" align="absmiddle"  class="packageicon" /> &nbsp;&nbsp;<?=$package_custom ?></p></td><td class="packagesheaddays"><?= $packagesdays ?></td><td class="packagesheadprice"><?= $packagesprice ?> </td></tr>
		<?
		
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];

		 $price = $rs[2];
		 $Days = $rs[3];
		  $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		?>
		<tr>
		<td width="20px" class="packagestext"><input type="radio" id="trustsealpackage" name="trustsealpackage" value="<?= $PackageId ?>" onclick="show_detailC('<?= $Description ?>','<?= $curr." ".$price ?>')"/></td>
		<td width="61%" class="packagestext"><?= $Description ?></td>
		<td class="packagesdays" width="15%"><?= $Days ?></td><td class="packagesprice" width="20%"><?= $display_price_curr_code ?> <?= $price ?></td>
		<? } 
			freeingresult($result);
		?>
        </tr>
		</table>
        </div>
	<? } ?>
	<br />
<? if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){ ?>
<?

$pkg_id9 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=9 and PackageId <> 1");

$pkg_id8 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=8 and PackageId <> 1");

$pkg_id1 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=1 ");

$pkg_id2 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=2 ");



?>
	<?
	if($pkg_id==28 || $pkg_id==1 || $pkg_id=='' && $pkg_id1!=0 )
	{?>
    
    <div class="member_crasher">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


<div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

<ul class="ULdis_detailC">
<li>
    <span id="dis_detailC" style="display:none"></span>
    <span id="dis_priceC" style="display:none"></span>
</li>
<li>
    <span id="dis_detailD" style="display:none"></span>
    <span id="dis_priceD" style="display:none"></span>
</li>
<li>
    <span id="dis_detailE" style="display:none"></span>
    <span id="dis_priceE" style="display:none"></span>
</li>
<li>
    <span id="dis_detailF" style="display:none"></span>
    <span id="dis_priceF" style="display:none"></span>
</li>

</ul>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 butner payplemg">

<button type="submit" class="sumiter_links"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?=$packagemanagerClick?> <?= $packagemanagersubmit ?></button>

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Subscribe_Section">
    	<ul>
        	<li>
           	 	<a href="#"><img src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("bottom_card_image") ?>" alt="" border="0" /></a>
            </li>
        	<li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img1.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img2.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img3.png"></a>
            </li>
           </ul>	
</div>


</div>
</div>
	<? }else if($pkg_id2!=0 &&  $pkgtype_id==1 )
	{ ?>
	<div class="member_crasher">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

<ul class="ULdis_detailC">
<li>
    <span id="dis_detailC" style="display:none"></span>
    <span id="dis_priceC" style="display:none"></span>
</li>
<li>
    <span id="dis_detailD" style="display:none"></span>
    <span id="dis_priceD" style="display:none"></span>
</li>
<li>
    <span id="dis_detailE" style="display:none"></span>
    <span id="dis_priceE" style="display:none"></span>
</li>
<li>
    <span id="dis_detailF" style="display:none"></span>
    <span id="dis_priceF" style="display:none"></span>
</li>

</ul>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 butner payplemg">

<button type="submit" class="sumiter_links"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?=$packagemanagerClick?> <?= $packagemanagersubmit ?></button>

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Subscribe_Section">
    	<ul>
        	<li>
           	 	<a href="#"><img src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("bottom_card_image") ?>" alt="" border="0" /></a>
            </li>
        	<li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img1.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img2.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img3.png"></a>
            </li>
           </ul>	
</div>


</div>
</div>
	<? }else if($pkg_id2!=0 &&  $pkgtype_id==2 )
	{ ?>
    <div class="member_crasher">
<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



<div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

<ul class="ULdis_detailC">
<li>
    <span id="dis_detailC" style="display:none"></span>
    <span id="dis_priceC" style="display:none"></span>
</li>
<li>
    <span id="dis_detailD" style="display:none"></span>
    <span id="dis_priceD" style="display:none"></span>
</li>
<li>
    <span id="dis_detailE" style="display:none"></span>
    <span id="dis_priceE" style="display:none"></span>
</li>
<li>
    <span id="dis_detailF" style="display:none"></span>
    <span id="dis_priceF" style="display:none"></span>
</li>

</ul>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 butner payplemg">

<button type="submit" class="sumiter_links"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?=$packagemanagerClick?> <?= $packagemanagersubmit ?></button>

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Subscribe_Section">
    	<ul>
        	<li>
           	 	<a href="#"><img src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("bottom_card_image") ?>" alt="" border="0" /></a>
            </li>
        	<li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img1.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img2.png"></a>
            </li>
            <li>
           	 	<a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img3.png"></a>
            </li>
           </ul>	
</div>


</div>
</div>
    <? 
	}else{ ?>
      <div class="album_nodata">    
         <h3><?=$no_pckg_mess?></h3> 
	   </div>
    <? } ?>
<? } else {?>
<div class="login_membership">
         <div class="send_frnd">
<div class="sendtofriend" align="center" >
<figure><img src="<?= $siteimagepath ?>images/AlertIconP.png" /></figure>
<a href="login.php"> <?=$pckg_login?></a>
</div>
</div>

<?php /*?><script>
function change_url()
{
		document.getElementById("url1").value = "packagemanager.php";
}
</script>

<div class="container">

  <!-- Trigger the modal with a button -->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal_new" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <? include("login_popup1.php");?>
          </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php */?>

         </div>
         
<? } ?>
</form>    

<?
function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
?>