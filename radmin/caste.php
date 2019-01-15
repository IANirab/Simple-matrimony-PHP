<?php
include("commonfileadmin.php");
//echo $_POST['caste']; exit; 
$castid="";
if(isset($_POST['caste']) && $_POST['caste']!='')
{
	$caste=$_POST['caste'];
?>

<?php $datacaste=getonefielddata("select id from tbldatingcastmaster where currentstatus=0 and religianid=$caste"); ?>
<?php if($datacaste!=''){ ?>
<select name="castid" <?= admindropdownclass ?> onChange="changecaste(this.value)">
<? fillcombo("select id,title from   tbldatingcastmaster where currentstatus=0 and religianid=$caste order by id ",$castid,""); ?>
</select>
<?php } else { ?>
<select name="castid" <?= admindropdownclass ?> onChange="changecaste(this.value)">
<? fillcombo("select id,title from  tbldatingcastmaster where currentstatus=0 order by id ",$castid,"Select"); ?>
</select>
<?php } ?>
<?	
}
?>