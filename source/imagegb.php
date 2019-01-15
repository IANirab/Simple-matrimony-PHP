<?
@
include("commonfile.php");
$action=0;
if(isset($_GET['b']) && $_GET['b']!="" && is_numeric($_GET['b'])){
	$action = $_GET['b'];	
}
function find_user_image_wo_link($userid,$show_big_image_only="N",$numm,$cat)
{
global $sitepath,$user_uploaded_images_for_mobile,$curruserid,$session_name_initital;

$imagenm = "";
$result = getdata("select imagenm,thumbnil_image,image_password_protect from tbldatingusermaster where userid=$userid");
	
	while ($rs = mysqli_fetch_array($result))
	{
		if($rs[0]!="" && file_exists("uploadfiles/".$rs[0])){
			$imagenm =$rs[0];
			$big_imagenm =$rs[0];		
		} else {
			$imagenm = "noimageprofile.gif";	
			$big_imagenm ="noimageprofile.gif";
		}
		if($rs[1]!="" && file_exists("uploadfiles/".$rs[1])){
			$thumbnil_image=$rs[1];	
		} else {
			$thumbnil_image="noimageprofile.gif";	
		}		
		$imageonrequest=$rs[2];				
		if ($thumbnil_image != "")
			$imagenm = $thumbnil_image;
		$userlink = displayprofilelink($userid);
		$accepted=find_image_on_request_or_not($curruserid,$userid);
		if ($accepted == "N")
		{
		$imagenm = "image_on_request.gif";
		$big_imagenm ="image_on_request.gif";
		$thumbnil_image="image_on_request.gif";
		}
	}
	freeingresult($result);
//new added on 26th mar start

//new added on 26th mar end
if ($imagenm == "")
{
	 $imagenm = "noimageprofile.gif";
	 $big_imagenm = $imagenm;
	 
}
if ($show_big_image_only =="Y")
$imagenm=$big_imagenm;

/*************** FLASH START HERE **********************/

/*************** FLASH END HERE **********************/


/*************** NON FLASH START HERE **********************/

if ($user_uploaded_images_for_mobile == "") {
$bigimgnm = $big_imagenm;	
$big_imagenm = $sitepath . "uploadfiles/" . $big_imagenm;

$imagenm = '<img src="'.$sitepath.'uploadfiles/'.$bigimgnm.'" border="0">';
$imagenm ="$imagenm";
}
else
$imagenm = "<img src='". $user_uploaded_images_for_mobile . $bigimgnm . "' border=0>";


/*************** NON FLASH END HERE **********************/

return  $imagenm;
}
?>
<div class="zoom_photos">
<div style="background-color: #FFFFFF; border:1px solid #bf547e; float: right; height: auto; padding: 0px; text-align: right;
width: 80px; -moz-border-radius:8px; -webkit-border-radius:8px; z-index:1; position:relative; margin-top:0px; width:62px; margin-bottom:5px; color:#85294e">
<input type="button" value="Close" onClick="parent.parent.GB_hide();" style="background-color: transparent; background-image:url(assets/theme2/images/skip_icon.png); background-position: left center;
background-repeat: no-repeat; border: 0 none; color: #02487D; font-family: Arial,Helvetica,sans-serif; font-size: 12px; font-weight: bold; margin-bottom: 3px; margin-left: 3px; margin-top: 4px; padding-left: 15px; cursor:pointer; ">
</div>

<?
echo $img = find_user_image_wo_link($action,"","","");
?></div>