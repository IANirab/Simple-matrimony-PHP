<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$action = 0;
if(isset($_GET['b']) && $_GET['b']!=""){
	$action = $_GET['b'];	
	$userid=$action;
}

$userdata = getdata("SELECT thumbnil_image,imagenm,image_approval from tbldatingusermaster WHERE userid=".$action);
$user_rs = mysqli_fetch_array($userdata);
$thumbimg = $user_rs[0];
$imgnm = $user_rs[1];
$image_approval = $user_rs[2];
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<script>
function removeimage(userid,imagenm,tname,id){
	$.post("removeimage.php",{
	 userid:userid,
	 imagenm:imagenm,
	 tname:tname
	},
		function(data){			
			if(data!=''){
			//document.getElementById("display_error").style.display='block';
			//document.getElementById("display_error").innerHTML = data;
			location.reload();
			}
		}
	)
}

function approveimage(userid,id){
	$.post("removeimage.php",{
		type:"approve",
		userid:userid
	}, function (data){
		if(data!='')	{
			location.reload();
		}
	})	
}


</script>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Upload Image</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=post action ="updatepictureinsert.php?b=<?= $action ?>" enctype="multipart/form-data"
      class="form-horizontal common-form">
      <div class="updatepicture_page">
          <div class="Adminrequest"> 
          	<ul> 
            	<? if($thumbimg!='') { ?>  
                <li>
                	<div class="identity_block">
        
                        <div class="APD_blk">
                         <? if($image_approval=='Y'){?>Approved <? } ?>
                         <? if($image_approval=='N'){?>Pending <? } ?>
                         </div>
                         
                         
                        <div class="albumthumb1">
                        	<img src="../uploadfiles/<?=$thumbimg?>">
                        </div>
                       
                        
                         <? //if($image_approval=='Y'){ ?>
            				<div class="Remove_blk">
                        	<a class="btn btn-danger" href="javascript:void(0);" onClick="removeimage('<?=$userid?>','<?=$thumbimg?>','u','<?=$userid?>u')" title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a> 
                                <? //} ?>  
                            <? if($image_approval=='N'){ ?>
      <a class="btn btn-success" href="javascript:void(0);" onClick="approveimage('<?=$userid?>','<?=$userid?>u')"
      title="Approve" ><i class="fa fa-check" aria-hidden="true"></i></a>
  							    <? } ?>  
                        </div>
		                  
                        
                    </div>
                </li>
     				<? } ?>            
                
		     <? if($thumbimg=='') { ?>           
                <li>
                	<div class="form-group">
                	<div class="pic_icon">                        
                        <input type="file" name="uploadimage" id="uploadimage" value="" class="file form-control">
                        <span class="UpIcon"> 
                            <a href="#">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </a>                               
                       </span>
                    </div>
                    </div>
                     <h4 id="display_imgnm">Choose File</h4>
                </li>
     <script>
	 $('input[id=uploadimage]').change(function() {
        
        var mainValue = $(this).val();
        if(mainValue == ""){
            document.getElementById("display_imgnm").innerHTML = "Choose File";
        }else{
            document.getElementById("display_imgnm").innerHTML = mainValue.replace("C:\\fakepath\\", "");
        }
    });
	</script>
		     <? } ?>           
                
            </ul>
          </div>
      </div>
      
		 <? if($thumbimg=='') { ?>
		  <div class="form-group common_button">
            <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
         <? } ?>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $passwordchange_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>