<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>
      <?= $albumpgtitle ?>
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
  </div>
</div>

<!-- ********* TITLE END HERE *********-->
<div class="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<div class="albummasterPage">
<form style="margin:0px" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post >
<div class="errorbox"><span>
  <?php checkerror(); ?>
  </span></div>
<? if(enable_default_imgrequest=='N'){ ?>
<div class="imageprotectionnote">
  <?= $image_protection_message ?>
</div>
<? } ?>
<span class="reload1"><a onClick="window.location.reload( true );"><img src="<?= $siteimagepath ?>images/reload.gif" alt="" border="0" /></a></span>
<div align="center" class="noteery">
  <?= $albumnote  ?>
  .
  <?= $album_size_allowed ?>
  <?= findsettingvalue("File_upload_size") ?>
</div>
<form class="update_form saperate">
  <fieldset>
    <div class="client_siteRes">
    <div class="Adminrequest">

    <ul>
 
    
    
    <? 
	for($i=1;$i<=$totalallowed;$i++)
	{
		 $imgnm = getonefielddata("select imagenm from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
					 
					   $albumid = getonefielddata("select albumid from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
					 
					 
					  $currentstatus = getonefielddata("select currentstatus from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
?>
		<? if($imgnm==''){ ?>
        <li>
          <div class="form-group">
            <?php /*?><label class="col-lg-4 control-label"><?= $albumselectpicture ?> <?= $i ?> :</label><?php */?>
            <div class="pic_icon">
              <input type='file' name="uploadimage<?= $i ?>"  class="file form-control" size="30" id='uploadimage<?= $i ?>'>
              <br />
              <span class="UpIcon"> <a href="#"> <i class="fa fa-camera" aria-hidden="true"></i> </a> </span> </div>
          </div>
          <h4 id="display_imgnm<?=$i?>">Choose File</h4>
        </li>
        
        <script>
	 $('input[id=uploadimage<?=$i?>]').change(function() {
        
        var mainValue = $(this).val();
        if(mainValue == ""){
            document.getElementById("display_imgnm<?=$i?>").innerHTML = "Choose File";
        }else{
            document.getElementById("display_imgnm<?=$i?>").innerHTML = mainValue.replace("C:\\fakepath\\", "");
        }
    });
	</script>
        <? } ?>

		<? if($imgnm!=''){?>
        <li>
          <div class="identity_block">
            <div class="APD_blk">
                <? if($currentstatus==0){?>Approved <? } ?>
                 <? if($currentstatus==1){?>Pending <? } ?>
            </div>
            <div class='albumthumb1'> <img src='<?= $sitepath ?>uploadfiles/thumbalbum<?= $imgnm  ?>' /></div>
            <div class="Remove_blk"> <a class="btn btn-danger" title="<?= $albumremove ?>" href='albumdelete.php?b=<?= $albumid ?>'><i class="fa fa-times" aria-hidden="true"></i></a> </div>
          </div>
        </li>
        <? } ?>
		
        
        
    <? } ?>
    <ul>
    </div>
    </div>
    

    	

    <div class="form-group">
    	 <label class="col-lg-4 control-label">&nbsp;</label>
        <div class="para">
        <input type="hidden" name="getid" id="getid" value="<?=$getid?>" />                            
        	<spna class="switch_outer">
                <label class="switch">
                  <input type="checkbox" id="chkaccept" />
                  <span class="slider round"></span>
                </label> <?= $albumcheck ?>
            </spna>
        </div>
    </div>
    
    <div class="form-group">
      
      <div class="col-lg-12"> 
      <div class="formbtn_outer">       
        <div  class="para">
          <input name="Submit" type="submit"  class='formbtn' value="<?= $albumsubmit ?>" onclick="return submitform()">
          <input name="Reset" type="reset"  class='resetbtn'  value="<?= $albumreset ?>">
        </div>
        </div>
      </div>
    </div>
  </fieldset>
</form>
</div>