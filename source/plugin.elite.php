  <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $packageelitepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
</div>


		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
        <div class="AllpackagesBlock_outer">
<a class="btn" href="javascript:void(0)" onclick="pckg_info_dash()"><i class="fa fa-cube" aria-hidden="true"></i>
<?=$dash_pck_info?></a>
<div id="pckg_info_dash" style="display:none">
        </div>
 
 <script>
 function show_detailC(detail,price,pckid)
{

		$("#dis_detailC").show();
		$("#dis_detailC").html(detail);
		$("#dis_priceC").show();
		$("#dis_priceC").html(price);
		$("#trustsealpackage").val(pckid);
		document.getElementById("trustsealpackage").checked=true;
		
}

 function show_detailD(detail,price)
{
		$("#dis_detailD").show();
		$("#dis_detailD").html(detail);
		$("#dis_priceD").show();
		$("#dis_priceD").html(price);
}

 function show_detailE(detail,price)
{
		$("#dis_detailE").show();
		$("#dis_detailE").html(detail);
		$("#dis_priceE").show();
		$("#dis_priceE").html(price);
}

 function show_detailF(detail,price)
{
		$("#dis_detailF").show();
		$("#dis_detailF").html(detail);
		$("#dis_priceF").show();
		$("#dis_priceF").html(price);
}

 </script>
 
       
		<!-- ********* CONTENT START HERE *********-->
		<!--< ?= //$contactustext ?>-->

<form name="frmpackage" id="frmpackage" action="<?= $sitepath ?>packagemanangerinsert.php" method="post">






<? $elite_main=get_homepage_images(15);?>

		<div class="member-hg-profile">
	<div class="hg-banner">
        <img src="<?=$siteuploadfilepath_new?>/<?=$elite_main[0];?>" />
        <div class="content-wrap">
             <?=$elite_main[2];?>
        </div>
    </div>
    <div class="row icon-colom">
    
      <? $elite_blurp1=get_homepage_images(16);?>
      <? $elite_blurp2=get_homepage_images(17);?>
      <? $elite_blurp3=get_homepage_images(18);?>
     
    
    
    	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
        	<div class="vip-grid">
                <img src="<?=$siteuploadfilepath_new?>/<?=$elite_blurp1[0];?>" />
                  <?=$elite_blurp1[2];?>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
        	<div class="vip-grid">
                <img src="<?=$siteuploadfilepath_new?>/<?=$elite_blurp2[0];?>" />
                <?=$elite_blurp2[2];?>
            </div> 
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
        	<div class="vip-grid">
                <img src="<?=$siteuploadfilepath_new?>/<?=$elite_blurp3[0];?>" />
               <?=$elite_blurp3[2];?>
            </div> 
        </div>
    </div>
    
</div>

		
        <? 
	$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=8 and PackageId <> 1");
	if(mysqli_num_rows($result)>0){
?>
	<div align="left">
	
		<?
		
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];

		 $Price = $rs[2];
		 $Days = $rs[3];
		  $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		?>
        
        	<div class="connected">
    			<div class="row buy-left">
        	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h4><?= $Description ?></h4>
                <p>
                    <?= $Days ?> <?=$dashboard_preffered_partner_1?>
                </p>
                <button class="btn btn-danger"><?= $curr." ".$Price ?></button>
            </div>
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"> 
            <a class="btn btn-success buy-right"
            onclick="show_detailC('<?= $Description ?>','<?= $curr." ".$Price ?>','<?= $PackageId ?>')"><?=$pck_buy_txt?></a>
            <span style="display:none"><input type="radio" id="trustsealpackage" name="trustsealpackage" value="" /></span>
           </div>
        </div>
        	</div>
        
        </div>
	<? } } ?>


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
<!--<input type="submit" value="Click Here To <?= $packagemanagersubmit ?>" class="sumiter_links" />-->
<button type="submit" class="sumiter_links"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?=$packagemanagerClick?> <?= $packagemanagersubmit ?></button>
</form>    
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
function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
?>