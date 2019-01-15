<script language="javascript" type="text/javascript">
function checkrightclick(userid){
	$('#srsimg'+userid).bind('contextmenu', function(e) {
    return false;
});
}
</script>
<?
$email = "";
$name ="";
$imagenm='';
if ($dispayuserid !=""){	
$result = getdata("select name,thumbnil_image,email,imagenm,image_password_protect from tbldatingusermaster where ". datinguserwhereque() . " and userid=$dispayuserid ");
	while($rs= mysqli_fetch_array($result))
	{
		$name=$rs[0];
		//$imagenm = find_user_image($dispayuserid,"","","");
		$imagenm .= $rs[1];
		$email=$rs[2];
		$original_img = $rs[3];
		$chkprotect = $rs[4];
		
		if($chkprotect=='Y' && $curruserid!=$dispayuserid){			
			$chkreqaccepted = getonefielddata("SELECT accepted from tbldatingimagerequestmaster WHERE touserid=$dispayuserid AND fromuserid=".$curruserid);
			if($chkreqaccepted=='A'){
				$imagenm = $rs[1];
			} else {
				$imagenm = "image_on_request.gif";	
				$original_img = "image_on_request.gif";	
			}
		}
	}
	freeingresult($result);
?>
<div class="userdetail album_zoom">
<?
 if($imagenm!='') { ?>
<a href="<?= $sitepath ?>uploadfiles/<?= $original_img ?>" rel="example_group" title="" class="album_zoom_1">
	<img id="srsimg<?=$dispayuserid?>" src="<?=$sitepath?>uploadfiles/<?=$imagenm?>" onmousedown="checkrightclick('<?=$dispayuserid?>')" /></a>
<? } ?>
<? if(enable_communication=='Y'){  ?>
<?= $dashboardtoprofileid ?>  <?= display_profile_code($dispayuserid)?>
<? } ?>
<a href="javascript:void(0);" onclick="notify_send(2,'<?= $dispayuserid ?>')" title="Send Message">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $userdetailsendemail1 ?></a>

</div>
<? } ?>