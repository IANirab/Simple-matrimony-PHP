<? 
include("commonfile.php");
$religionid = '';
if(isset($_POST['religonid']) && $_POST['religonid']!='' && is_numeric($_POST['religonid'])) {
	$religionid = $_POST['religonid'];
}
if($religionid!=''){ ?>
	<label class="col-lg-4 control-label"><?= $updateprofile2cast ?></label>
     <div class="col-lg-8">
	<select name="cmbcast" id="cmbcast" class="form-control">
    	<? fillcombo("SELECT id,title from tbldatingcastmaster WHERE currentstatus=0 AND languageid=".$sitelanguageid." AND religianid=".$religionid,"","Select"); ?>
    </select>
    </div>
<?	
}
?>