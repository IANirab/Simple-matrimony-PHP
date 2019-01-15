<script type="text/javascript">
function change_captcha1(){
	
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){	
									
					//var newdata = data.split('#');	
					//alert(newdata)
					var arrs = data.split("#");
					var data1 = arrs[0];
					var data2 = arrs[1];										
					document.getElementById('imagenmcaptcha1').src = '<?=$sitepath?>uploadfiles/captcha/'+data1.trim();	
					//alert(document.getElementById('imagenmcaptcha1').src)					
					document.getElementById('hiddencaptcha1').value = data2;
				}
			);
}
</script>
 <div class="pagetitle">
 	<div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span><?= $contactuspagetitle ?></span></div>
     <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
    </div>
            </div>
            <!-- ********* TITLE END HERE *********-->
            
            <? $support3=get_homepage_images(22);?>
            
            <div class="pagecontent leftpadds ContactPAge"> 
              <!-- ********* CONTENT START HERE *********--> 
              
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
              	<div class="faq_ContactDetail faq_Offi">
                	<div class="in_Details btn-info hvr-outline-in">
                    	<figure><a href="#">
                            <img src="<?= $siteimagepath ?>images/ContactD_icon.png" /></a></figure>
                         <?
$address = findsettingvalue("contact");
?>

                  <?=$address?>
                    </div>
                </div>              	                             
              	<div class="faq_ContactDetail faq_Offi">
                	<div class="in_Details btn-warning hvr-outline-in">
                    	<figure><a href="<?=$support3[1];?>">
                            <img src="<?=$siteuploadfilepath_new?>/<?=$support3[0];?>" /></a></figure>
                         <? $support3[2]=str_replace("[grievance_contact_person]",findsettingvalue("grievance_officer"),$support3[2])?>
                            <? $support3[2]=str_replace("[grievance_address]",findsettingvalue("grievance_officer_info"),$support3[2])?>
                            <? $support3[2]=str_replace("[grievance_phone]",findsettingvalue("grievance_officer_mobile"),$support3[2])?>
                            <? $support3[2]=str_replace("[grievance_email]",findsettingvalue("grievance_officer_email"),$support3[2])?>    
                       
					   <?=$support3[2];?>
                    </div>
                </div>
                
                
               <? $contactus_blurp=get_homepage_images(23);?>
                
                <div class="faq_ContactDetail faq_Offi">
                	<div class="in_Details btn-success hvr-outline-in">
                    	<figure><a href="<?=$contactus_blurp[1];?>">
                            <img src="<?=$siteuploadfilepath_new?>/<?=$contactus_blurp[0];?>" /></a></figure>
                            <?=$contactus_blurp[2];?>
                            </div>
                </div>              	
              </div>
              
              
              
              <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
              <!--< ?= //$contactustext ?>-->
              <? 
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
$_SESSION[$session_name_initital."contactcaptcha"] = $captch_no;
?>

              <div class="errorbox"><span>
                <?php checkerror(); ?>
                </span></div>
         
              <form ENCTYPE="multipart/form-data" class="login Conat_Form" name ='frmdocument' id='form1' method='post' action ="<?= $filename ?>.php" onSubmit="return validateForm()">
                <fieldset>
                  
                  <div class="fieldset div">
                  <a class="detail_cntc"><?=$contactus_filldetails ?></a></div>
                  <div class="form-group">
                 
                    <label class="col-lg-4 control-label">
                      <?= $contactustype ?>
                    </label>
                   <div class="col-lg-8">
                    <select name='inquiry_type' class="form-control ">
                      <? fillcombo("select id,title from tbl_dating_inquiry_subject_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$act,""); ?>*
                    </select>
                    </div>
                   
                  </div>  
                  <div class="form-group">
                    <label class="col-lg-4 control-label">
                      <?= $contactussubject ?>
                    </label>
                      <div class="col-lg-8">
                    <input type="text" name="subject" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>">
                    *</div>
                    </div>
                   <div class="form-group">
                   <label class="col-lg-4 control-label">
                      <?= $contactusname ?>
                    </label>
                     <div class="col-lg-8">
                    <input type="text" name="name" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>">
                    *</div>
                    </div>
                  <div class="form-group">
                   <label class="col-lg-4 control-label">
                      <?= $contactusemail ?>
                    </label>
                    <div class="col-lg-8">
                    <input type="text" name="email" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>">
                    *</div>
                    </div>
                  <div class="form-group">
                    <label class="col-lg-4 control-label">
                      <?= $contactusphone ?>
                    </label>
                     <div class="col-lg-8">
                    <input type="text" name="phone" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>">
                  </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-4 control-label">
                      <?= $contactusmessage ?>
                    </label>
                     <div class="col-lg-8">
                    <textarea name="message" id="message" rows="5" cols="50"class="form-control"></textarea>
                  </div>
                  </div>
                  
                  <div class="form-group">
                   <label class="col-lg-4 control-label">
                      <?= $registercaptcha ?>
                    </label>
                     <div class="col-lg-8">
                    <img style="vertical-align:middle" id="imagenmcaptcha1" class="captcher"
                     src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'>
                   <?php ?> <input type="hidden" class="form-control" name="hiddencaptcha" id="hiddencaptcha1" value="<?=$captch_no?>" /><?php ?>
                    <input type="text" name="captcha" id="captcha" class="form-control captcha" value="" />
                    * <img src="uploadfiles/refresh1.png"   onclick="change_captcha1();"/> <?=$contactus_clicktochange?> 
                    </div>
                    </div>
                   <div class="form-group button_section">
                   <label class="col-lg-4 control-label">
                     &nbsp;
                    </label>
                    <div class="col-lg-8">                    
                    <input type="hidden" name="pagename" id="pagename" value="<?= $pagename ?>" />
                    <label>&nbsp;</label>
                    <div class="formbtn_outer">
                    <input name="submitcontact" type="submit" class="formbtn"  value="<?= $contactussubmit ?>">
                    </div>
                  </div>
                  </div>
                  <!-- ********* CONTENT END HERE *********-->
                 
                </fieldset>
              </form>
               </div>
            </div>