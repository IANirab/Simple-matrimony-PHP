<? include("commonfile.php");?>
<? include("formjs.php"); ?>
<? 
if(isset($_POST['religionid']) && $_POST['religionid']!=""){
	$religionid = $_POST['religionid'];
}
?>

<label class="col-lg-4 control-label"><?= $searchquick_caste ?></label>
<div class="col-lg-8">   	
	<div class="select2-wrapper MYseletion">
    <select data-placeholder="Select Types" class="form-control select2-multiple" multiple tabindex="4" name="cast_arr[]">
          <option value="0.0" disabled>Select </option>
          <?	
		$qry = getdata("select id,title from tbldatingcastmaster where currentstatus =0 and religianid=$religionid and 
	languageid=$sitelanguageid order by title"); 
		  while($rs = mysqli_fetch_array($qry)){ ?>	 
                    <option value="<?=$rs[0]?>" >
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>    
    </div>
</div>



