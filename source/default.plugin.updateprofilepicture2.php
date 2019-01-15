
<div class="profilestoplinks">
  <? if ($Update_profile_Pages_design_setting == "D") { ?>
  <?php include("profilestoplinks.php") ?>
  <? } ?>
</div>


<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>
      <?= $updatepictureprofilepgtitle ?>
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
  </div>
  
  <!-- ********* TITLE END HERE *********-->
  <div class="pagecontent editform_section_2">
    <div class="errorbox"><span>
      <?php checkerror(); ?>
      </span></div>

    
    
      <div class="fprofile">
      <!-- ********* CONTENT START HERE *********-->
      <div class="updatepicture">
      
      <div class="Userpicture">
      
      
      <div class="container" id="crop-avatar">
<div class="upd-form-cropper">
    <!-- Current avatar -->
    <div class="avatar-view" >
    
	<? 
		$get_thumbnil_image=getonefielddata("Select thumbnil_image 
		from  tbldatingusermaster where userid='".$curruserid."' ");
	if($get_thumbnil_image!=''){?>
        <img src="<?= $sitepath ?>uploadfiles/<?=$get_thumbnil_image?>"  border="0" onclick="hide_img_loader();" >
        <? }else{ ?>
                <?
                 $genid=find_user_gendor($curruserid);
                 if($genid==1)
                 { ?>
                 <img src="<?= $sitepath ?>uploadfiles/maleimage.png"  border="0" onclick="hide_img_loader();">
                <? } ?>	 
                <? if($genid==2)
                 { ?>
                 <img src="<?= $sitepath ?>uploadfiles/femalenoimage.png" border="0" onclick="hide_img_loader();">
                <? } ?>	 
        <? } ?>

      <h6><?=$updateprofilepicture2upload?></h6>
    </div>
   <div class="form-group">
     <a class="btn deletebut" href="image_delete.php?a=delete"><?=$albummngrltdelete?></a>
   </div>

<script>
function show_img_loader()
{
	$("#show_img_loader_div").show();
	return true;
}

function hide_img_loader()
{
	$("#show_img_loader_div").hide();
	return true;
}

</script>
    <!-- Cropping modal -->
    <div class="Cropping_allsame  modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" 
    tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post"
          onsubmit="return show_img_loader();">
            
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                	<div class="form-group">
                     
                          <label><?=$update_pict_txt1?></label>
                     
                          <input type="hidden" class="avatar-src" name="avatar_src">
                          <input type="hidden" class="avatar-data" name="avatar_data">
                          <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                     
                  </div>
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">                  	
                    <div class="avatar-preview preview-lg"></div>
                    <h4><?=$pck_preview_btn?> </h4>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-12">
                  	<div class="form-group">
	                    <button type="submit" class="btn btn-primary btn-block avatar-save"><?=$update_pict_txt2?></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          
          <div id="show_img_loader_div" class="imageUPloder" style="display:none">
           <i class="fa fa-spinner faa-spin animated"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    </div>
  </div>
      
      
      </div>
      
      
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          	
          <div class="UserImg_block">
          	<h3><?=$update_pic_allow?></h3>
            <div class="UserImg">
              <figure> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/userimage.png"/> </figure>
              <strong> <a href="#"> <i class="fa fa-check" aria-hidden="true"></i> </a> </strong> </div>
            <div class="List_uselist">
              <h4><?=$update_pic_txt1?></h4>
              <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i><?=$update_pic_txt2?></li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> <?=$update_pic_txt3?></li>
                <li> <i class="fa fa-check" aria-hidden="true"></i><?=$update_pic_txt4?></li>
                <li> <i class="fa fa-check" aria-hidden="true"></i><?=$update_pic_txt5?></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="principalSection">
            <h3><?=$update_pic_not_allow?></h3>
            <div class="container">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/blur_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt6?> </p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/distance_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt7?></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/cartoon_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt8?></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/group_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt9?></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/block_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt10?></p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="Semp_block">
                  <figure> <a href="#"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/scenic_image.png"/> </a> <strong> <span> <i class="fa fa-times" aria-hidden="true"></i> </span> </strong> </figure>
                  <p><?=$update_pic_txt11?></p>
                </div>
              </div>
            </div>
          </div>
      </div>
      
      
		
          </div>
        </div>
         
      </div>
    
    <!-- ********* CONTENT END HERE *********--> 
  </div>
</div>


