<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
<div class="pagetitle">
<div class="featured_title_div abtus">
<div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
<div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updateprofile4_interesthobbies ?></span></div>
<div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
</div>  
		<!-- ********* TITLE END HERE *********-->
        <div class="errorbox"><span><?php checkerror(); ?></span></div>
        <div class="pagecontent2 Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->
	<div class="fprofile">
<form class="update_form editform_section"  ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php">



<input type="hidden" name="getid" id="getid" value="<?=$getid?>" />
<?
$hobbies = "";
$music = "";
$interest = "";
$fav_read = "";
$fav_movies = "";
$fav_cuisines = "";
$dress_styles = "";
$fitness = "";
$skill = "";
$indoor = "";
$outdoor = "";
$other_activity = "";
$result = getdata("SELECT hobbies, music, interest, fav_read, fav_movies, fav_cuisines, dress_styles, fitness from tbldatingusermaster WHERE userid=".$curruserid);
$rs = mysqli_fetch_array($result);	
  $hobbies = explode(",",$rs['hobbies']);
  $music = explode(",",$rs['music']);
  $interest = explode(",",$rs['interest']);
  $fav_read = explode(",",$rs['fav_read']);
  $fav_movies = explode(",",$rs['fav_movies']);
  $fav_cuisines = explode(",",$rs['fav_cuisines']);
  $dress_styles = explode(",",$rs['dress_styles']);
  $fitness = explode(",",$rs['fitness']);
?>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_hobbies ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="hobbies_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_hobbies_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$hobbies)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div>
    </div>

  <br /><br />
    
    
<!--Interest SEgment started-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_interest ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="interest_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_interest_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$interest)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
</div></div>
<!--Interest SEgment completed-->
<br /><br />    

<!--Music Division started-->

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_music ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

	<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="music_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_music_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$music)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
</div>
</div>
<!--Music SEgment completed-->
<br><br>

<!--Favourite Read started-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_favoriteread ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="read_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_favourite_read_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$fav_read)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<!--Favourite Read completed-->
<br /><br />


<!--Cuisine started-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_favoritecuisines ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="cuisine_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_favourite_cuisines_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$fav_cuisines)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<!--Cuisine completed-->
<br /><br />

<!--Fitness started-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_favoritesport ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="fitness_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_fitness_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$fitness)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<!--Fitness completed-->
<br /><br />
<!--Dress started-->
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofile4_favoritedressstyle ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="dress_arr[]">
                      
                   <option value="0.0" disabled>Select </option>
          <?  $qry = getdata("SELECT id, title from tbl_favourite_dress_master");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"  <? if(in_array($rs[0],$dress_styles)){ echo "selected"; } ?> >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    
</div></div>

<!--Dress completed-->	
<br /><br />
<div class="form-group">
<label class="col-lg-4 control-label"> </label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input type="submit" name="submit" value="<?= $updateprofile4_btn_submit ?>" onClick="sub()" class="formbtn" />
<input class="resetbtn" type="reset" value="<?= $updateprofile4_btn_reset ?>" name="Reset">
</div>
</div>
</div>


                
                

</fieldset>
</form>
<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>
        
