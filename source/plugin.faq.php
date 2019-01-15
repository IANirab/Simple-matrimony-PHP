<!-- ********* TITLE START HERE *********-->
            <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-5 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-2 midle_title"><span><?=$faq_title?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-5 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 
       
           
           <? $support1=get_homepage_images(20);?>
           <? $support2=get_homepage_images(21);?>
           <? $support3=get_homepage_images(22);?>
           
            <!-- ********* TITLE END HERE *********-->
            <div class="pagecontent alignments row">             
              <!-- ********* CONTENT START HERE *********-->
              <div class="col-sm-4">
              	<div class="faq_ContactDetail">
                	<div class="in_Details btn-success hvr-outline-in">
                    	<figure><a href="<?=$support1[1];?>">
                 <img src="<?=$siteuploadfilepath_new?>/<?=$support1[0];?>" /></a></figure>
                        <h3><a href="<?=$support1[1];?>"> <?=$support1[2];?></a></h3>
                    </div>
                </div>              	
              </div>
              
              <div class="col-sm-4">
              	<div class="faq_ContactDetail">
                	<div class="in_Details btn-info hvr-outline-in">
                    	<figure><a href="<?=$support2[1];?>">
                 <img src="<?=$siteuploadfilepath_new?>/<?=$support2[0];?>" /></a></figure>
                        <h3><a href="<?=$support2[1];?>"><?=$support2[2];?></a></h3>
                    </div>
                </div>              	
              </div>
              <div class="col-sm-6">
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
              </div>
              
              
              
              
              
              <div class="errorbox"><span>
                <? checkerror(); ?>
                </span></div>
              <div class="faq_main_page">
              
              <ol style="list-style:none;">
				<? 
                $j=1;
            
                $result=getdata("select cmsid,categoryid,privacyid,Title,Description,thumb_up,thumb_down,email,
				date_format(CreateDate,'%b%e'),meta_keywords,Meta_desc,ImgNm  from tblkb_quemaster where currentstatus=0 
				order by cmsid desc Limit 25");
            $cnt = mysqli_num_rows($result); 	
            //echo $cnt; exit; 
            while($rs=mysqli_fetch_array($result))
            {
                $cmsid=$rs[0];
                $categoryid=$rs[1];
                $privacyid=$rs[2];
                $Title=$rs[3];
                $Description=$rs[4];
                $thumb_up=$rs[5];
                $thumb_down=$rs[6];
                $email=$rs[7];
                $date=$rs[8];
                $meta_keywords=$rs[9];
                $Meta_desc=$rs[10];
                $ImgNm=$rs[11];
                $ans_description = str_replace("<p>","",$Description);
                $des_exp = explode(" ",$ans_description);
                $len_des = count($des_exp);
                //echo $len_des; exit;
                if($len_des>100){
                $len_des = 100; 
                }
                 ?>
                     
                     <li style="font-family:Verdana, Geneva, sans-serif;" class="faqlibg">
                        <em>                	
                            <a href="javascript:void(0);"  onclick="opensubcat1('<?=$j?>','<?=$cnt?>')"><span><?=$j?>.&nbsp;&nbsp;</span> <?=$Title?></a>
                            <?php /*?><span class="open_image"><img id="m1<?=$j?>" src="../images/arow_bg_2.png"  onclick="opensubcat1('<?=$j?>','<?=$cnt?>')"/></span><?php */?>
                       </em>
        
                           <div class="li_div_m_p" id="ch1<?=$j?>" style="display:none;"><?=$Description?></div>
                           
                        
                    </li>            
            <?	
            $j++;
            }
            
            ?>
            </ol>
       
            </div> 
            </div>