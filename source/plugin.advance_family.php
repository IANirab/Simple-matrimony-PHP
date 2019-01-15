
<div class="profilestoplinks">
		
		<? if ($Update_profile_Pages_design_setting == "D") { ?>
		<?php include("profilestoplinks.php") ?>
		<? } 
		else { ?>
		<?php include("smallprofilestoplinks.php") ?>
		<? } ?></div>
        	<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?=$new_atitle?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
         

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->


<?
$userid=0;
$pid='';
$name='';
$education='';
$occupation='';
$married_to='';
$ds_of='';
$type='';
$ftype='';
$no='';
$show_type1s='style="display:none"';
$show_type2s='style="display:none"';
$show_type3s='style="display:none"';
$show_type1d='';
$show_type2d='';
$show_type3d='';



$education1='';
$occupation1='';

if(isset($_GET['b']) && $_GET['b']!='')
{
	$userid=$_GET['b']; 
}

if(isset($_GET['c']) && $_GET['c']!='')
{
	 $pid=$_GET['c']; 
}

if($userid!='' && $pid!=''){
 $result1 = getdata("SELECT  `id`,`userid`,`name`, `education`, `occupation`, `married_to`, `d/s_of`, `type`, `ftype`, `no` FROM `tbldating_advancefamily` where userid =$curruserid and currentstatus='0' and id=$pid order by id desc ");
while ($rs = mysqli_fetch_array($result1))
{
		$id=$rs[0];
		$userid=$rs[1];
		$name=$rs[2];
		$education=$rs[3];
		$occupation=$rs[4];
		$married_to=$rs[5];
		$ds_of=$rs[6];
		$type=$rs[7];
		$ftype=$rs[8];
		$no=$rs[9];
		$education1=explode(",",$education);
		$occupation1=explode(",",$occupation);
		
}
}
?>	

    
    <div class="Family_Detals">
        <div class="DetalsBlock">
        <? if(isset($_GET['c']) && $_GET['c']!=''){?>
        <div class="Butten_outer">
        	<a href="<?=$sitepath?>advance_family.php" class="Addre" title="Add More">+</a>
    	</div>	
        <? } ?>
   
   <?
   if($pid!='')
   {$myform_s='style="display:block"';}else{$myform_s='style="display:block"';}
   ?>
   
    		
     <div id="myform_advancef" <?=$myform_s?>>
            <div id="errormsg"></div>    
                <form style="margin:0px" class="update_form editform_section" ENCTYPE="multipart/form-data" name ='myForm' id='myForm' method="post" action ="<?= $sitepath ?><?= $filename ?>.php" >
          <fieldset>
          <div class="fprofile table_whiter extends">



		<input type="hidden" name="uid" id="uid" value="<?=$userid?>">
        <input type="hidden" name="pid" id="pid" value="<?=$pid?>">
        <input type="hidden" name="no" id="no" <?=$no?>> 
		<input type="hidden" name="typeh" id="typeh" value="<?=$ftype?>">
 
		
     

              
      <div class="form-group">

 <label class="col-lg-4 control-label"><?=$profiletoplinkadvanceselecttype?> </label>
 		<div class="col-lg-8">
        <?
        if($ftype!=''){$ftype_d='disabled="disabled"';}else{$ftype_d='';}
		?>
    <select name="ftype" id="ftype"  onchange="get_main_value(this.value)" class="form-control"  <?=$ftype_d?>>
    <option value="0.0">Select</option>
    <option value="p" <? if($ftype=='p'){ echo "selected"; ?> disabled="disabled"<? }?> >PATERNAL FAMILY</option>
    <option value="m" <? if($ftype=='m'){ echo "selected"; }?>>MATERNAL FAMILY</option>
    <option value="f" <? if($ftype=='f'){ echo "selected";  }?> >FAMILY</option>
    </select>
		</div>
	</div>
 
 		<?
		
        if($ftype=='p')
		{
			$show_type1s='style="display:block"';
			$show_type2s='style="display:none"';
			$show_type3s='style="display:none"';
			$show_type1d='disabled="disabled"';
		}
		elseif($ftype=='m')
		{
			$show_type2s='style="display:block"';
			$show_type1s='style="display:none"';
			$show_type3s='style="display:none"';
			$show_type2d='disabled="disabled"';
		}
		elseif($ftype=='f')
		{
			$show_type3s='style="display:block"';
			$show_type1s='style="display:none"';
			$show_type2s='style="display:none"';
			$show_type3d='disabled="disabled"';
		}
		?>
 
                
 <div class="form-group" id="show_type1" <?=$show_type1s?>>
 <label class="col-lg-4 control-label"><?=$new_select?> </label>
 		<div class="col-lg-8">
    <select name="type1" id="type1"  onchange="get_value(this.value)" class="form-control" <?=$show_type1d?>>
    <?=fillcombo("select id,title from tbl_advance_family_type where currentstatus=0 and type='p' ",$type,"Select")?>
    </select>
		</div>
</div>
            
  <div class="form-group" id="show_type2" <?=$show_type2s?>>
 <label class="col-lg-4 control-label"><?=$new_select?> </label>
 		<div class="col-lg-8">
    <select name="type2" id="type2"  onchange="get_value(this.value)" class="form-control" <?=$show_type2d?> 
    data-placeholder="<?=$dropdown_placeholder?>">
    <?=fillcombo("select id,title from tbl_advance_family_type where currentstatus=0 and type='m' ",$type,"Select")?>
    </select>
		</div>
</div>              
        
     <div class="form-group" id="show_type3" <?=$show_type3s?>>
 <label class="col-lg-4 control-label"><?=$new_select?> </label>
 		<div class="col-lg-8">
    <select name="type3" id="type3"  onchange="get_value(this.value)" class="form-control" <?=$show_type3d?>
    data-placeholder="<?=$dropdown_placeholder?>">
    <?=fillcombo("select id,title from tbl_advance_family_type where currentstatus=0 and type='f' ",$type,"Select")?>
    </select>
		</div>
</div>     
        
                
                
  <div class="form-group">
                    <label class="col-lg-4 control-label"><?=$new_name ?></label>
                    <div class="col-lg-8">
<input type="text" name="name" id="name" value="<?=$name?>" size="35" class="form-control" maxlength="" /></p>
					</div>
	</div>              
                
 
 
 <div class="form-group">
<label class="col-lg-4 control-label"><?= $new_edu ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="edu_arr[]" id="edu1"
data-placeholder="<?=$dropdown_placeholder?>">
                  
          <?  $qry = getdata("select id,title from tbl_education_master where currentstatus=0 order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($education1!=''){
					if(in_array($rs[0],$education1)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    
    </div></div>




<div class="form-group">
<label class="col-lg-4 control-label"><?= $new_occ ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select class="form-control select2-multiple" multiple tabindex="4" name="occ_arr[]" id="occ1"
data-placeholder="<?=$dropdown_placeholder?>">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>"
                    <? if($occupation1!=''){
						if(in_array($rs[0],$occupation1)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>


 
 
 
 
 
   
    <div class="form-group">
                    <label class="col-lg-4 control-label"><?=$new_mt ?></label>
                    <div class="col-lg-8">
<input type="text" name="married_to" id="married_to" value="<?=$married_to?>" size="35" class="form-control" maxlength="" /></p>
					</div>
	</div>  
    
    <?
    if($type==1 || $type==3 || $type==5)
	{
		$chng_lable1s='style="display:block"';
		$chng_lable2s='style="display:none"';
		$show_txts='style="display:block"';
	}
	if($type==2 || $type==4 || $type==6)
	{
		$chng_lable2s='style="display:block"';
		$chng_lable1s='style="display:none"';	
		$show_txts='style="display:block"';	
	}
		$chng_lable2s='style="display:none"';
		$chng_lable1s='style="display:none"';
		$show_txts='style="display:none"';		
	
	
	?>
    
    
    
    
    		 <div class="form-group">
                    <label class="col-lg-4 control-label" id="change_lable1" <?=$chng_lable1s?> >
					<?=$new_do ?></label>
                    <label class="col-lg-4 control-label" id="change_lable2" <?=$chng_lable2s?>>
					<?=$new_so ?></label>
                   
                    <div class="col-lg-8" <?=$show_txts?> id="show_txt">
<input type="text" name="ds_of" id="ds_of" value="<?=$ds_of?>" size="35" class="form-control" maxlength="" /></p>
					</div>
	</div>               
                
                
         <div class="form-group">
	
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"> 
<div class="formbtn_outer">
<input name="Submit" type="submit"  class='formbtn' value="<?= $new_sub ?>" onClick="return validate_form()">
 <input name="Reset" type="reset"  class='resetbtn'  value="<?= $new_res ?>">
 </div>
</div>
</div>
       
               
               </div> 
                </fieldset>
                </form>
                
                </div>           
    
  
  				<!-----------------------	display data start-------------------->
  
  
  
	<ul>
    <?  $i = getonefielddata("select count(id) from 
	`tbldating_advancefamily` where currentstatus=0 and userid='".$curruserid."' "); ?>  
 <? $result = getdata("SELECT `id`, `userid`, `name`, `education`, `occupation`, `married_to`, `d/s_of`, `type`, `ftype`, `no` FROM `tbldating_advancefamily` where userid =$curruserid and currentstatus='0' order by id desc ");
while ($rs = mysqli_fetch_array($result))
{
		$id=$rs[0];
		$userid=$rs[1];
		$name=$rs[2];
		$education=$rs[3];
		$occupation=$rs[4];
		$married_to=$rs[5];
		$ds_of=$rs[6];
		$type=$rs[7];
		$ftype=$rs[8];
		$no=$rs[9];
?>		


  <li class="LineDetail">
  <div class="Butten_outer">

		<a href="<?=$sitepath?>advance_family.php?b=<?=$userid?>&c=<?=$id?>" class="Addre">M</a>
      
       <form method="post" action="advance_family_delete.php">
       <input type="hidden" name="userid_d" value="<?=$userid?>">
       <input type="hidden" name="type_d" value="<?=$type?>">
       <input type="hidden" name="ftype_d" value="<?=$ftype?>">
       <input type="hidden" name="no_d" value="<?=$no?>">
       <input class="Addre" type="submit" value="x">   
       </form>
   </div>
  
  
  <strong><?=$i--?></strong>
  <? if($ftype=="p"){echo $advancefamily_PATERNALfamilytype;} elseif($ftype=="m"){echo $advancefamily_MATERNALfamilytype;}
  elseif($ftype=="f"){echo $advancefamily_familytype;} ?><br>
  <? echo $t_type = getonefielddata("select title from tbl_advance_family_type where currentstatus=0
  and id='".$type."' "); ?><br>
  <strong><?=$name?></strong><br>
  
   
  </li>
  
<? } ?>
  </ul>
  </div>
  
  				<!-----------------------	display data end-------------------->  
                
          <div class="form-group">
          	<label class="col-lg-4 control-label">&nbsp;</label>
          	<div class="col-lg-8">
            <div class="formbtn_outer">
            	<!---<input name="Submit" class="formbtn" value="Save Complete Profile" type="button">--->
                <a  href="dashboard.php" class="formbtn"><?=$savecompleteprofilelable?></a>
                </div>
            </div>
          </div>      
  
 <!-- ********* CONTENT END HERE *********-->
		</div>
		</div>
    </div>   

        
