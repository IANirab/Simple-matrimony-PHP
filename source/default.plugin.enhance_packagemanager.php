<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>
      <?= $enhance_title ?>
      </span></div>
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
  
  <!-- ********* CONTENT START HERE *********--> 
  <!--< ?= //$contactustext ?>--> 
  
  <script>
  
  
  function show_preview(id)
  {
  			$.ajax({
			type: "POST",
			url: "show_preview.php",
			data:'b='+id,
			success: function(data){
				$("#preview_data").show();
				$("#preview_data").html(data);
			}
			});
  }
  
  
  
function show_detail(detail,price,id,val)
{
	
	if(val=='Y')
	{
		$("#enhancementpackage"+id).val("N");	
		$("#write_loader"+id).show();
		$("#dis_detail"+id).show();
		$("#dis_detail"+id).html(detail);
		$("#dis_price"+id).show();
		$("#dis_price"+id).html(price);
	}
	
	if(val=='N')
	{	
		$("#enhancementpackage"+id).val("Y");	
		$("#write_loader"+id).hide();
		$("#dis_detail"+id).hide();
	//	$("#dis_detail"+id).html(detail);
		$("#dis_price"+id).hide();
		//$("#dis_price"+id).html(price);
	}	
		
}

function show_detailA(detail,price)
{
		$("#dis_detailA").show();
		$("#dis_detailA").html(detail);
		$("#dis_priceA").show();
		$("#dis_priceA").html(price);
	
}

function show_detailB(detail,price)
{
		$("#dis_detailB").show();
		$("#dis_detailB").html(detail);
		$("#dis_priceB").show();
		$("#dis_priceB").html(price);
}


</script>

        
      <form name="frmpackage" id="frmpackage" action="<?= $sitepath ?>packagemanangerinsert.php" method="post">
        <? if(findsettingvalue('sp_offer_banner')!="") {
	if(file_exists("uploadfiles/site_".$sitethemefolder."/".findsettingvalue('sp_offer_banner'))){
 ?>
        <? } } ?>
        <input type="hidden" name="packagetypeid" value="<?= $packagetypeid ?>"  />
        <div class="mager_taber">
        
     <!---------------------------  enhancement package start ------------------------------------->
        <? if (($curruserid != "") && ($disp_enh=="Y"))
		{ 
	$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code,small_note,smallimg from tbldatingpackagemaster where CurrentStatus=0  and PackageTypeId=3");
	if(mysqli_num_rows($result)>0) 
	{
	?>
        
          <h3 class="TitleEM"><img src="<?= $siteimagepath ?>images/package-enhance.gif" alt="" border="0" align="absmiddle" class="packageicon" /> &nbsp;&nbsp;
                  
                </h3>
          <div class="check_visart">
            <?
				while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];
		 $Price = $rs[2];
		 $Days = $rs[3];
		 $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		 $small_note = $rs[6];
		 $smallimg= $rs[7];
		?>
            
          	  <div class="check_visart_1 check_visart_2">              
            
              	<figure> <a href="javascript:void(0)" data-toggle="modal" data-target="#preview_enh"  onclick="show_preview('<?=$PackageId?>')">  <figure>
                <? if($smallimg!=''){?>
                <img src="<?= $siteuploadfilepath_new ?><?=$smallimg?>" />
                <? } ?>
                </figure></a> </figure>
                <div class="right_Loader" id="write_loader<?= $PackageId ?>" style="display:none">
                    <div class="loading rotate-y">
                      <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                      <div class="circle"></div>
                    </div>
                  </div>
      
     			 
                  
                 <span class="checkRp">                  
                    <span class="switch_outer">
                        <label class="switch">
                          <input type="checkbox" id="enhancementpackage<?= $PackageId ?>" name="enhancementpackage<?= $PackageId ?>" value="Y" onclick="show_detail('<?= $Description ?>','<?= $curr." ".$Price ?>','<?=$PackageId?>',this.value)" />
                          <span class="slider round"></span> 
                        </label>
                    </span> 
                 </span>
                
                <h3> <?= $Description ?> </h3>
                <p><?=substr($small_note,0,80)?></p>
               <strong><?= $curr ?><?= $Price ?></strong>&nbsp;|&nbsp;<?= $Days ?> <?=$dashboard_preffered_partner_1?> 
               

               <span class="prvOuter"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#preview_enh"  onclick="show_preview('<?=$PackageId?>')"><?=$pck_preview_btn?></button></span>
           
              <div class="modal fade" id="preview_enh" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-body" id="preview_data" style="display:none">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><?=$search_txt5?></button>
                    </div>
                  </div>
                  
                </div>
              </div>
           </div>
               
              <? } 
			freeingresult($result);
		?>
        </div> 
          <style type="text/css">
        .enhance-grid h3{
			
		}
		.enhance-grid img{
			
		}
		.enhance-grid h3{
			    font-size: 16px;
    font-weight: 600;
    margin: 5px 0;
    color: #525050;
		}
		.enhance-grid .col-lg-3{
			background-color: #ffecec;
    padding: 19px 5px;
    border-radius: 5px;
    font-size: 16px;
		}
		.enhance-grid .col-lg-3 p strong{
		    color: #fd5f19;
    font-size: 19px;	
		}
        
        </style>
<? } ?>
	     <!---------------------------  enhancement package end ------------------------------------->
        
        <!------------------------ trust seal start ---------------------------------------------->
        <?  
$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code,image from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=4  and PackageId <> 1");
if(mysqli_num_rows($result) > 0) {
?>
        <div class="check_visart">
            <h3 class="TitleEM">
            <img src="<?= $siteimagepath ?>images/package-seal.png" alt="" border="0" align="absmiddle"  class="packageicon" /> &nbsp;&nbsp;
                  <?= $packagemanagertrustsealpackage ?>
                </h3>
           <?
		
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];
		 $Price = $rs[2];
		 $Days = $rs[3];
		  $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		 $image= $rs[6];
		?>
            <div class="check_visart_1 check_visart_2">
				<figure><img src=<?=$siteuploadfilepath_new.$image?>></figure>            	
                
                 <div class="right_Loader" id="write_loader_new" style="display:none">
                    <div class="loading rotate-y">
                      <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                      <div class="circle"></div>
                    </div>
                  </div>
      
                
            	<span class="checkRp"> 
                    <span class="switch_outer">
                        <label class="switch">
                          <input type="radio" id="trustsealpackage" name="trustsealpackage" value="<?= $PackageId ?>" 
        onclick="show_detailA('<?= $Description ?>','<?= $curr." ".$Price ?>')"/>
                          <span class="slider round"></span> 
                        </label>
                    </span> 
                 </span>

              
              <h3> <?= $Description ?> </h3>
             <!-- <p>/p>    -->   
              <strong><?= $curr ?><?= $Price ?></strong>&nbsp;|&nbsp;<?= $Days ?> <?=$dashboard_preffered_partner_1?> 
              
                </div>
        <? } 
			freeingresult($result);
		?>
            
        </div>
<? } ?>
        

     <!------------------------ trust seal end ------------------------------------------------>
        
        
  	<!------------------------ Offline assisting start ---------------------------------------------->
 <?php /*?>       <?  
$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code,image from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=9  and PackageId <> 1");
if(mysqli_num_rows($result) > 0) {
?>
        <div class="check_visart">
            <h3 class="TitleEM">
            <img src="<?= $siteimagepath ?>images/package-seal.png" alt="" border="0" align="absmiddle"  class="packageicon" /> &nbsp;&nbsp;
                  <?= $package_offline ?>
                </h3>
           <?
		
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
		 $Description = $rs[1];
		 $Price = $rs[2];
		 $Days = $rs[3];
		  $display_price = $rs[4];
		 $display_price_curr_code = $rs[5];
		 $image= $rs[6];
		?>
            <div class="check_visart_1 check_visart_2">
				<figure><img src=<?=$siteuploadfilepath_new.$image?>></figure>            	
                
                 <div class="right_Loader" id="write_loader_new" style="display:none">
                    <div class="loading rotate-y">
                      <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                      <div class="circle"></div>
                    </div>
                  </div>
      
                
            	<span class="checkRp"> 
                    <span class="switch_outer">
                        <label class="switch">
                          <input type="radio" id="trustsealpackage" name="trustsealpackage" value="<?= $PackageId ?>" 
        onclick="show_detailA('<?= $Description ?>','<?= $curr." ".$Price ?>')"/>
                          <span class="slider round"></span> 
                        </label>
                    </span> 
                 </span>

              <p><?= $Description ?></p>             
              <strong>(<?= $packagesprice ?>) $ <?= $display_price_curr_code ?>
                <?= $Price ?>
                [
                <?= $curr  ?>
                <?= $Price ?>
                ]</strong> &nbsp;&nbsp; (<?= $Days ?> <?= $packagesdays ?>)
                </div>
        <? } 
			freeingresult($result);
		?>
            
        </div>
<? } ?><?php */?>
        

     <!------------------------ Offline assisting end ------------------------------------------------>
<? } ?>	


<?
$pkg_id4 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=4 ");

$pkg_id3 = getonefielddata(" select count(PackageId) from tbldatingpackagemaster where 
CurrentStatus=0 and PackageTypeId=3 ");
?>
	<? if($pkg_id4!=0 && $pkg_id3!=0){?>
     <div class="member_crasher kamh">
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <ul class="ULdis_detailC">
            <? if (($curruserid != "") && ($disp_enh=="Y"))
{ 
	$result = getdata("select PackageId, Description,Price,Days,display_price,display_price_curr_code from tbldatingpackagemaster where CurrentStatus=0 and PackageTypeId=3");
	if(mysqli_num_rows($result)>0) {
		while($rs= mysqli_fetch_array($result))
		{
		 $PackageId = $rs[0] ;
?>
            <li> <span id="dis_detail<?=$PackageId?>" style="display:none"></span> <span id="dis_price<?=$PackageId?>" style="display:none"></span> </li>
            <li> <span id="dis_detailA" style="display:none"></span> <span id="dis_priceA" style="display:none"></span> </li>
            <li> <span id="dis_detailB" style="display:none"></span> <span id="dis_priceB" style="display:none"></span> </li>
            <? }}} ?>
          </ul>
        </div>
        <div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12 butner payplemg"> 
          <!--<input type="submit" value="<?= $packagemanagersubmit ?>" class="sumiter_links" />-->
          
          <button type="submit" class="sumiter_links"><i class="fa fa-arrow-right" aria-hidden="true"></i> 
          <?=$packagemanagerClick?> <?= $packagemanagersubmit ?>
          </button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Subscribe_Section">
          <ul>
            <li> <a href="#"><img src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("bottom_card_image") ?>" alt="" border="0" /></a> </li>
            <li> <a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img1.png"></a> </li>
            <li> <a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img2.png"></a> </li>
            <li> <a href="#"><img src="<?= $siteimagepath ?>images/Subscr_img3.png"></a> </li>
          </ul>
        </div>
      
      
      
    </div>
  </div>
  <? }else{ ?>
  <div class="album_nodata">    
         <h3><?=$no_pckg_mess?></h3> 
   </div>
  
  <? } ?>
  
</div>
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