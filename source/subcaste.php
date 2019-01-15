<?php 
//echo "hi"; exit;
include("commonfile.php");
if(isset($_POST['subcaste']) && $_POST['subcaste']!='')
{
	$subcaste=$_POST['subcaste'];
}
$mool="";
//echo "select id from  tbldatingsubcastmaster where title='".$subcaste."'"; exit;
$subcastetitlename=getonefielddata("select id from  tbldatingsubcastmaster where title='".$subcaste."'");
//echo "select id from  tbldatingmool_master where currentstatus=0 and subcasteid=$subcastetitlename"; exit;
$data=getonefielddata("select id from  tbldatingmool_master where currentstatus=0 and subcasteid='".$subcastetitlename."' ")
?>
<?php if($data!=''){ ?>
<label>Mool</label>
<select name="mool" id="mool">
<?php  fillcombo("select id,title from  tbldatingmool_master where currentstatus=0 and subcasteid=$subcastetitlename",$mool,"") ?>
</select>
<?php }

?>