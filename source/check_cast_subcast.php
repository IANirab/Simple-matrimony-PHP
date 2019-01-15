<? include("commonfile.php"); ?>
<? include("formjs.php"); ?>
<?
$searchqy = '';
if(isset($_POST['religionid']) && $_POST['religionid']!=""){
	$religionid = $_POST['religionid'];
	$searchqy .= " religianid=".$religionid; 
}
$qry = getdata("select id,title from tbldatingcastmaster where currentstatus =0 and $searchqy and languageid=$sitelanguageid order by title");
$num = mysqli_num_rows($qry);
if($num>0){
?>

<div class="form-group" >
<label class="col-lg-4 control-label"><?= $searchquick_caste ?></label>
<div class="col-lg-8">   	
	<div class="select2-wrapper MYseletion">

    <select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="cast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingcastmaster where currentstatus =0 and religianid=$religionid and 
	languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){
			  $cast2 .= $rs[0].","; ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>    
    </div>
    </div>
</div>
	
<div class="form-group" >
	<?  $cast2=substr($cast2,0,-1);?>
<label class="col-lg-4 control-label"><?= $check_cast_subcast_subcast ?></label>
<div class="col-lg-8">   	
<div class="select2-wrapper MYseletion">

    <select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="subcast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingsubcastmaster where currentstatus =0 and castid IN ('".$cast2."') AND languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>    
    </div>
</div>


<? } ?>    
