<? 
$searchque='';
if (isset($_SESSION[$session_name_initital . "searchquery"]) && $_SESSION[$session_name_initital . "searchquery"] != "")
{
$searchque = $_SESSION[$session_name_initital . "searchquery"];

}
if ($searchque != "")
{
$fromqry = from_que_search_result($searchque,"",$curruserid);
 $totalnorecord = getonefielddata( "select count(userid) $fromqry "); 


if ($totalnorecord  >0) {
$display_religion ="Y";
if (isset($_SESSION[$session_name_initital . "searchincludereligian"]))
   if ($_SESSION[$session_name_initital . "searchincludereligian"] != "")
   	$display_religion ="N";
if ($display_religion == "Y")
	$first_action ="R";
else
	$first_action ="C";
if (!isset($_SESSION[$session_name_initital . "accordian_option"]))
	$_SESSION[$session_name_initital . "accordian_option"]='';	
?>



<h2><?=$search_filter_title?></h2>  
  <div class="accordion-panel"> 

  
  
    <script>
		function send_form_filter()
		{
			document.getElementById('filter_submit').click();
		}
		</script>
        
        
    <form action="searchgid_accordian_set_search_query.php" name='frm_accordian_data' method='post' >
      <input type="hidden" name="searchque" id="searchque" value="<?= $searchque ?>" />
      <input type="hidden" name="action" id="action" value="1" />
      
      <? if ($display_religion == "Y") { ?>
      <!------------------------   Religion Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory" aria-expanded="true" aria-controls="collapseOne">
          <?=$default_searchresult_religion?>
        </h3>
        <div id="Lcategory" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Leftcategory">
          <div id="CATEGORY_Left" class="MYScrollbar">
            <?
            
            if(isset($_SESSION[$session_name_initital . "filter_religion_id"]) && 
            $_SESSION[$session_name_initital . "filter_religion_id"]!='')
            {
            $sel_filter_religion=explode(',',$_SESSION[$session_name_initital . "filter_religion_id"]);
            }else{$sel_filter_religion='';}
            ?>
            <ul class="CheckList">
              <?
            $query = "select count(userid),tbldatingreligianmaster.title,tbldatingusermaster.religianid from tbldatingusermaster,tbldatingreligianmaster where  ". make_profile_search_query($curruserid,datinguserwhereque()) . " and tbldatingusermaster.religianid=tbldatingreligianmaster.id group by tbldatingusermaster.religianid order by tbldatingreligianmaster.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>                       
              <li>                            
              <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" id="filter_religion<?=$id?>" name="filter_religion<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_religion!='' &&  in_array($id,$sel_filter_religion))
            { ?> checked="checked"<? }?>>
               
                    <label for="filter_religion<?=$id?>"></label>
                </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------    Religion End------------------------------------>
      <? }else{?>
      <!--------------------------- subcaste Start------------------------------>
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory1" aria-expanded="true" aria-controls="collapseOne">
          <?=$default_searchresult_castsubcast?>
        </h3>
        <div id="Lcategory1" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory1">
          <div id="Lcategory1" class="MYScrollbar">
            <?
            
            if(isset($_SESSION[$session_name_initital . "filter_subcast_id"]) && 
            $_SESSION[$session_name_initital . "filter_subcast_id"]!='')
            {
            $sel_filter_subcast=explode(',',$_SESSION[$session_name_initital . "filter_subcast_id"]);
            }else{$sel_filter_subcast='';}
            ?>
            <ul class="CheckList">
              <?
            $query = "select count(userid),tbldatingcastmaster.title,tbldatingusermaster.castid from tbldatingusermaster,tbldatingcastmaster where tbldatingcastmaster.currentstatus=0 and  ". make_profile_search_query($curruserid,datinguserwhereque()) . " and tbldatingusermaster.castid=tbldatingcastmaster.id group by tbldatingusermaster.castid order by tbldatingcastmaster.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
              <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_subcast<?=$id?>" id="filter_subcast<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_subcast!='' &&  in_array($id,$sel_filter_subcast))
            { ?> checked="checked"<? }?>>
            <label for="filter_subcast<?=$id?>"></label>                
                </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!----------------------- subcaste End------------------------------------>
      <? }?>
      
      <!------------------------   maritual status Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory2" aria-expanded="true" aria-controls="collapseOne">
          <?=$leftsearchMaritalstatus?>
        </h3>
        <?
            
            if(isset($_SESSION[$session_name_initital . "filter_ms_id"]) && 
            $_SESSION[$session_name_initital . "filter_ms_id"]!='')
            {
            $sel_filter_ms=explode(',',$_SESSION[$session_name_initital . "filter_ms_id"]);
            }else{$sel_filter_ms='';}
            ?>
        <div id="Lcategory2" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory2">
          <div id="Lcategory2">
            <ul class="CheckList Oneline_list">
              <?
         	$query = "SELECT count(userid),tbldatingmaritalstatusmaster.title,tbldatingusermaster.maritalstatusid from tbldatingusermaster,tbldatingmaritalstatusmaster WHERE ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.maritalstatusid=tbldatingmaritalstatusmaster.id group by tbldatingusermaster.maritalstatusid order by tbldatingmaritalstatusmaster.id ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
	              <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_ms<?=$id?>" id="filter_ms<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_ms!='' &&  in_array($id,$sel_filter_ms))
            { ?> checked="checked"<? }?>>
	            <label for="filter_ms<?=$id?>"></label>               
                </span>
                 <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------    maritual status End------------------------------------> 
      
      <!------------------------   Education status Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory3" aria-expanded="true" aria-controls="collapseOne">
          <?=$default_searchresult_education?>
        </h3>
        <?
            
            if(isset($_SESSION[$session_name_initital . "filter_edu_id"]) && 
            $_SESSION[$session_name_initital . "filter_edu_id"]!='')
            {
            $sel_filter_edu=explode(',',$_SESSION[$session_name_initital . "filter_edu_id"]);
            }else{$sel_filter_edu='';}
            ?>
        <div id="Lcategory3" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory3">
          <div id="Lcategory3" class="MYScrollbar">
            <ul class="CheckList">
              <?
         	$query = "select count(userid),tbl_education_master.title,tbldatingusermaster.educationid from tbldatingusermaster,tbl_education_master where  ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.educationid=tbl_education_master.id group by tbldatingusermaster.educationid order by tbl_education_master.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
              <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_edu<?=$id?>" id="filter_edu<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_edu!='' &&  in_array($id,$sel_filter_edu))
            { ?> checked="checked"<? }?>>
            <label for="filter_edu<?=$id?>"></label>                
                </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------    Education status End------------------------------------> 
      
      <!------------------------   Occupation  Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory5" aria-expanded="true" aria-controls="collapseOne">
          <?=$updateprofile3occupation_status?>
        </h3>
        <?
            
            if(isset($_SESSION[$session_name_initital . "filter_occ_id"]) && 
            $_SESSION[$session_name_initital . "filter_occ_id"]!='')
            {
            $sel_filter_occ=explode(',',$_SESSION[$session_name_initital . "filter_occ_id"]);
            }else{$sel_filter_occ='';}
            ?>
        <div id="Lcategory5" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory5">
          <div id="Lcategory5" class="MYScrollbar">
            <ul class="CheckList">
              <?
         	$query = "SELECT count(userid),tbldating_education_pg_master.title,tbldatingusermaster.occupationstatusid from tbldatingusermaster,tbldating_education_pg_master WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.occupationstatusid=tbldating_education_pg_master.id group by tbldatingusermaster.occupationstatusid order by tbldating_education_pg_master.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
              <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_occ<?=$id?>" id="filter_occ<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_occ!='' &&  in_array($id,$sel_filter_occ))
            { ?> checked="checked"<? }?>>
                <label for="filter_occ<?=$id?>"></label>                
                </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------    Occupation  End------------------------------------> 
     
     
      <!------------------------  Photop setting  Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory4" aria-expanded="true" aria-controls="collapseOne">
          <?=$leftsearchPhotoSetting?>
        </h3>
        <?

			 if(isset($_SESSION[$session_name_initital . "filter_photo_id"]) && 
            $_SESSION[$session_name_initital . "filter_photo_id"]!='')
            {
            $sel_filter_photoid=$_SESSION[$session_name_initital . "filter_photo_id"];
            }else{$sel_filter_photoid='';}
            ?>
        <div id="Lcategory4" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory4">
          <div id="Lcategory4">
           <ul class="CheckList Oneline_list">
            <?
                                              $query1 = "SELECT count(userid) from tbldatingusermaster WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.thumbnil_image!=''";	
		$query2 = "SELECT count(userid) from tbldatingusermaster WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.thumbnil_image is NULL";	
			$withphoto = getonefielddata($query1);
		$withoutphoto = getonefielddata($query2);	
											  ?>
            <li>	
            <span class="squaredFour roundFour">
              <input type="radio" name="filter_with_photo" id="filter_with_photoy" value="Y"
                                              <? if($sel_filter_photoid=='Y'){ ?> checked="checked" <? } ?> onclick="send_form_filter();">
              <label for="filter_with_photoy"></label>
              </span>
              <?=$search_filter_with_photo_title?>
              <?php /*?>(
              <?=$withphoto?>
              ) <?php */?>
              </li>
              <li>
	           <span class="squaredFour roundFour">
              <input type="radio" name="filter_with_photo" id="filter_with_photon" value="N"
                                              <? if($sel_filter_photoid=='N'){ ?> checked="checked" <? } ?> onclick="send_form_filter();">
              <label for="filter_with_photon"></label>
              </span>
              <?=$search_filter_without_photo_title?>
             <?php /*?> (
              <?=$withoutphoto?>
              )<?php */?>
             </li>
              </ul>
          </div> 
        </div>
      </div>
      <!-----------------------   Photop setting End------------------------------------> 
      
      
      <!------------------------   Income  Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory6" aria-expanded="true" aria-controls="collapseOne">
          <?=$default_searchresult_annualincome?>
        </h3>
        <?
            if(isset($_SESSION[$session_name_initital . "filter_income_id"]) && 
            $_SESSION[$session_name_initital . "filter_income_id"]!='')
            {
            $sel_filter_income=explode(',',$_SESSION[$session_name_initital . "filter_income_id"]);
            }else{$sel_filter_income='';}
            ?>
        <div id="Lcategory6" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory6">
          <div id="Lcategory6">
            <ul class="CheckList">
              <?
         	$query = "select count(userid),tbldating_annual_income_master.title,tbldatingusermaster.annual_income_id from tbldatingusermaster,tbldating_annual_income_master where  ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.annual_income_id=tbldating_annual_income_master.id group by tbldatingusermaster.annual_income_id order by tbldating_annual_income_master.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
               <span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_income<?=$id?>" id="filter_income<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_income!='' &&  in_array($id,$sel_filter_income))
            { ?> checked="checked"<? }?>>
               <label for="filter_income<?=$id?>"></label>  
               </span>  
               <?=$title?>            
              </li>
              
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------  Income  End------------------------------------>
      
      <!------------------------   mother toung  Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory7" aria-expanded="true" aria-controls="collapseOne">
          <?=$leftsearchMothertongue?>
        </h3>
        <?
            if(isset($_SESSION[$session_name_initital . "filter_mothert_id"]) && 
            $_SESSION[$session_name_initital . "filter_mothert_id"]!='')
            {
            $sel_filter_mothert=explode(',',$_SESSION[$session_name_initital . "filter_mothert_id"]);
            }else{$sel_filter_mothert='';}
            ?>
        <div id="Lcategory7" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory7">
          <div id="Lcategory7" class="MYScrollbar">
            <ul class="CheckList">
              <?
         $query = "select count(userid),tbldatingmothertonguemaster.title,tbldatingusermaster.motherthoungid from tbldatingusermaster,tbldatingmothertonguemaster where  ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.motherthoungid=tbldatingmothertonguemaster.id group by tbldatingusermaster.motherthoungid order by tbldatingmothertonguemaster.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
              	<span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_mothert<?=$id?>" id="filter_mothert<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_mothert!='' &&  in_array($id,$sel_filter_mothert))
            { ?> checked="checked"<? }?>>
                <label for="filter_mothert<?=$id?>"></label>
               </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------  mother toung  End------------------------------------>
      
      <!------------------------   country  Start--------------------------------->
      <div class="LeftList">
        <h3 class="card-title" data-toggle="collapse" data-parent="#accordion" href="#Lcategory8" aria-expanded="true" aria-controls="collapseOne">
          <?=$leftsearchCountry?>
        </h3>
        <?
            if(isset($_SESSION[$session_name_initital . "filter_country_id"]) && 
            $_SESSION[$session_name_initital . "filter_country_id"]!='')
            {
            $sel_filter_country=explode(',',$_SESSION[$session_name_initital . "filter_country_id"]);
            }else{$sel_filter_country='';}
            ?>
        <div id="Lcategory8" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="Lcategory8">
          <div id="Lcategory8" class="MYScrollbar">
            <ul class="CheckList">
              <?
        $query = "SELECT count(userid), tbldatingcountrymaster.title,tbldatingusermaster.countryid from tbldatingusermaster,tbldatingcountrymaster WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.countryid=tbldatingcountrymaster.id group by tbldatingusermaster.countryid order by tbldatingcountrymaster.title  ";	
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
            $cnt = $rs[0];
            if ($cnt >0)
            {
            $title = $rs[1];
            $id = $rs[2];
            
            ?>
              <li>
              	<span class="squaredFour">
                <input type="checkbox" value="<?=$id?>" name="filter_country<?=$id?>" id="filter_country<?=$id?>" onclick="send_form_filter();"
            <?   if($sel_filter_country!='' &&  in_array($id,$sel_filter_country))
            { ?> checked="checked"<? }?>>
            <label for="filter_country<?=$id?>"></label>
            </span>
                <?=$title?>
              </li>
              <? }} ?>
            </ul>
          </div>
        </div>
      </div>
      <!-----------------------  country  End------------------------------------>
      
      <div class="form-group btn_outer">
       <div class="formbtn_outer"><span style="display:none"> <input type="submit" value="submit" id="filter_submit" class="formbtn" /></span></div>
      </div>
    </form>
    
    
    
  </div>


</div>
<? } ?>
<? } ?>
