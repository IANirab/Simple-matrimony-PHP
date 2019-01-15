<? require_once("../translation.php");
require_once("../dbinclude/function.php");
require_once("../dbinclude/configuration.php");
include_once("../dbinclude/datingcommonfunction.php");
checkadminlogin();
include_once('../assets/'.$sitethemefolder.'/design_config.php');


function remove_numbers($string) {
	$vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  	$string = str_replace($vowels, '*', $string);
  	return $string;
}

 
//include("reg_include.php");
$curruserid='';
if(isset($_GET['b']) && $_GET['b'] != "") {
	$curruserid = $_GET['b'];
}
$getid=$curruserid;



if(isset($_GET['cmd'])) {
	$cmd = $_GET['cmd'];
	if($cmd == 'off') {
		$cmd = 'N';
	} else if($cmd == 'on') {
		$cmd = 'Y';
	}
	execute("UPDATE tbldatingusermaster SET image_password_protect='".$cmd."' WHERE userid=".$curruserid);
	header("Location:albummaster.php?b=".$curruserid);
exit();
}
include("jquery_include.php");
$filename ="radmin/albummasterinsert";
$title = "";
$action = 0;
if($getid!=''){
	$action = $getid;	
}
$groupid =0;
$imagenm = "";
$picdescription ="";
$image_protection_message="";
$totalallowed = findsettingvalue("AlbumTotalPhotoAllowed");
$imageonrequest = getonefielddata("select image_password_protect from tbldatingusermaster where userid =$curruserid");
if ($imageonrequest == "Y"){
	$image_protection_message = $album_image_protection_message_on;
	$cmd = 'off';
} else {
	$image_protection_message = $album_image_protection_message_off;
	$cmd = 'on';
}
$image_protection_message = $image_protection_message . "<br><a href='albummaster.php?cmd=$cmd&b=$curruserid'>$album_image_protection_change</a>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
<? include('../source/fancyboxjs.php'); ?>
<script language="javascript">
function submitform()
{
	if (document.form1.chkaccept.checked == false)
	{
		alert("<?= $albumcheckterms ?>");
		return false;
	}
		document.form1.action ="<?= $sitepath ?><?=$filename?>.php?b=<?=$action ?>";
		document.form1.submit();
		return true;
}
</script>


</head>

<body>
<?php include("admintop.php") ?>
<div class="pagewrapper ProfileType">
	<div class="container">
    <? //include("plugin.albummaster.php");?>
    	<div class="TabLInk">
        
        	<div class="center_right">
            	<div class="center-in">
                	<h1 class="pagetitle"><?= $albumpgtitle ?></h1>
                    
                    <div class="pagecontent common-form">
                        <!-- ********* CONTENT START HERE *********-->
                        
                        <form style="margin:0px" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post >
                        
                        <div class="errorbox"><span><?php checkerror(); ?></span></div>
                        
                        <? if(enable_default_imgrequest=='N'){ ?>
                            <div class="imageprotectionnote"><?= $image_protection_message ?></div>
                        <? } ?>
                        
                        
                        <br />
                        <div align="center" class="noteery"><?= $albumnote  ?>.<?= $album_size_allowed ?> <?= findsettingvalue("File_upload_size") ?></div>
                        
                      
                        
						<form class="update_form saperate">
                        
                        <fieldset>
                        
						 <div class="Adminrequest">
                        	<ul>
					<? 
					for($i=1;$i<=$totalallowed;$i++)
					{ 
					
					 $imgnm = getonefielddata("select imagenm from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
					 
					 
					 
					   $albumid = getonefielddata("select albumid from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
					 
					 $currentstatus = getonefielddata("select currentstatus from 
					 tbldatingalbummaster where currentstatus in(0,1) and  CreateBy='".$curruserid."' 
					 and ordno='".$i."' ");
					
                  	if($imgnm=='' && $enable_admin_search=='Y'){?>
                       <li> 
                           <div class="form-group">
                               <div class="pic_icon">
               <input type='file' name="uploadimage<?= $i ?>"  class="file form-control"  id='uploadimage<?= $i ?>'>		
                                <span class="UpIcon"> 
                                	<a href="#">
                                    	<i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>                               
                               </span>
                                </div>
                            </div> 
                            <h4 id="display_imgnm<?=$i?>">Choose File</h4> 
                        </li>
                        
     <script>
	 $('input[id=uploadimage<?=$i?>]').change(function() {

        var mainValue = $(this).val();
        if(mainValue == ""){
            document.getElementById("display_imgnm<?=$i?>").innerHTML = "Choose File";
        }else{
            document.getElementById("display_imgnm<?=$i?>").innerHTML = mainValue.replace("C:\\fakepath\\", "");
        }
    });
	</script>
                        
                        <? } ?>
                       
				  <? if($imgnm!=''){?>
                    <li>                    
                        <div class="identity_block">
                        	<div class="APD_blk">
								<? if($currentstatus==0){ echo "Approved"; } ?>
                                <? if($currentstatus==1){ echo "Pending"; } ?>
                            </div>
                            <div class='albumthumb1'>
         <a data-fancybox="gallery" href="<?= $sitepath ?>uploadfiles/album<?= $imgnm ?>">
        <img src='<?= $sitepath ?>uploadfiles/thumbalbum<?= $imgnm ?>' id="myImg<?=$albumid?>" />
     </a> 
                            </div>
                           <div class="Remove_blk">
                               <? if($currentstatus==1){  ?>
                                  <a class="btn btn-success" href="albumaction.php?b=<?=$albumid?>&b1=0" title="<?=$img_approve?>"><i class="fa fa-check" aria-hidden="true"></i></a>
								  <? } ?>
                                 
                                 <? if($currentstatus==0){  ?>
                                <a class="btn btn-warning" href="albumaction.php?b=<?=$albumid?>&b1=1" title="<?=$img_disapprove?> "><i class="fa fa-ban" aria-hidden="true"></i></a>
                                <? } ?>
                                 <a class="btn btn-danger"
                                 href='albumdelete.php?c=<?= $albumid ?>&b=<?=$curruserid?>' title="<?= $albumremove ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                         </div>
                    </li>
                    <? } ?>
                        
                 <? } ?>
                        </ul>
                        </div>
                        
                        
                    <? if($enable_admin_search=='Y'){?> 
                    <div class="form-group">
                        	<div  class="para">
                            <input type="hidden" name="getid" id="getid" value="<?=$getid?>" />                            <checkbox>
                                    <label class="switch">
                                      <input type="checkbox" id="chkaccept" />
                                      <span class="slider round"></span>
                                    </label> <?= $albumcheck ?>
                                </checkbox>
                            </div>
                        </div>
                     <div class="form-group common_button">
                            
                                        <input name="Submit" type="submit"  class='btn' value="<?= $albumsubmit ?>" onclick="return submitform()"> <input name="Reset" type="reset"  class='btn'  value="<?= $albumreset ?>">
                                 
                         </div>
                    <? } ?>
                    </fieldset>
                  </form>
                                
                                
                                
                           
                           
                        </div>
                    
                </div>
             </div>
        </div>
     </div>
</div>   
<!--matrimonal_footer Start  -->
<?php include("adminbottom.php") ?>

</body>
</html>