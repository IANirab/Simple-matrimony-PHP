<?php
include("commonfileadmin.php");
//echo $_POST['caste']; exit; 
$subcasteid="";
if(isset($_POST['subcaste']) && $_POST['subcaste']!='')
{
	$subcaste=$_POST['subcaste'];
?>
<?php $datasubcaste=getonefielddata("select id from tbldatingsubcastmaster where currentstatus=0 and castid=$subcaste"); ?>
<?php if($datasubcaste!=''){ ?>
<select name="subcasteid" <?= admindropdownclass ?>>
<? fillcombo("select title,title from  tbldatingsubcastmaster where currentstatus=0 and castid=$subcaste order by id ",$subcasteid,""); ?>
</select>
<?php } else{ ?>
 <select name="subcasteid" <?= admindropdownclass ?>>
<? fillcombo("select title,title from  tbldatingsubcastmaster where currentstatus=0 order by id ",$subcasteid,"Select"); ?>
</select>
<?php } ?>
<?	
}
?>