<?
session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
$action = 0;
$subject="";
$title="";
$message="";
//$filename ="tbl_crmlead_emails_master_insert";
if(isset($_SESSION["subject"]) && $_SESSION["subject"] != "") {
	$subject = $_SESSION["subject"];
}if(isset($_SESSION["title"]) && $_SESSION["title"] != "") {
	$title = $_SESSION["title"];
}if(isset($_SESSION["message"]) && $_SESSION["message"] != "") {
	$message = $_SESSION["message"];
}
$filename ="template_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select subject,title,message from tbldatingtemplatemaster where emailid=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$subject=$rs[0];
$title=$rs[1];
$message=$rs[2];

	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function changetransfee(filenm,id)
{
	document.frmmodify.action = filenm;
	document.frmmodify.submit();
}
function search_cast(val){
		if(val!=''){
			document.getElementById('indicator').style.display = 'inline';
			$.post("search_cast.php",{
				religionid:val},
				function (data){
					if(data!=''){
						document.getElementById('indicator').style.display = 'none';
						document.getElementById('span_cast').innerHTML = data;
					}	
				
				}
				)
		}
	
	}
</script>
<script language="javascript" type="text/javascript">
function update_fav(id){
	var favlist = document.getElementById('fav'+id).value;
	if(favlist!=''){
		$.post("update_fav.php",{
			favlist:favlist,
			userid:id	
		}, function (data){
			alert(data);
		})
	}
}
function enable_favourite(id){
	if(document.getElementById('spfav'+id).style.display=='none'){
		document.getElementById('spfav'+id).style.display = 'block';
	} else {
		document.getElementById('spfav'+id).style.display = 'none';
	}
}

function removeimage(userid,imagenm,tname,id){
	$.post("removeimage.php",{
	 userid:userid,
	 imagenm:imagenm,
	 tname:tname
	},
		function(data){			
			if(data!=''){
				document.getElementById(id).style.display='none';
			}
			//alert(data)
		}
	)
}
function approveimage(userid,id){
	$.post("removeimage.php",{
		type:"approve",
		userid:userid
	}, function (data){
		if(data!='')	{
			document.getElementById(id).style.display = 'none';	
		}
	})	
}
</script>
</head>
<body onLoad="start()">

    <!-- TOP START ######################## -->

<!--header start-->    
          <?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>  
        <div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">Template master</h1>
       
          <!-- ********* TITLE END HERE *********-->
         <div id="pagecontent" class="common-form">
            <!-- ********* CONTENT START HERE *********-->
            
              <?php if(isset($_SESSION["adminerror"]) && $_SESSION["adminerror"]!=''){ ?>
              <?php echo $_SESSION["adminerror"]; ?>
              <?php unset($_SESSION["adminerror"]); ?>
              <?php } ?>
            
            <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data"
             onSubmit="return validate();" class="form-horizontal">
              <div class="form-group"><label>subject</label>
              <input type="text" name="subject" class="form-control" id="subject" value="<?=$subject?>"></div>
                <div class="form-group"><label>title</label>
                <input type="text" name="title" id="title"  class="form-control" value="<?=$title?>"></div>
                
                <div class="form-group"><label>message</label>
                <textarea name="message" class="form-control" rows="9" cols="45" id="message"><?=$message?>
</textarea></div>
                <div class="form-group common_button">
                <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
                    <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset"></td>
                </div>
            </form>
            <!-- ********* CONTENT END HERE *********--> 
          </div>
        </div>
        <br style="clear:both">
      </div>
      <!-- CENTER END ######################## --> 
    </div>
    </div>
    <!-- FOOTER START ######################## -->
    <?php include("adminbottom.php") ?>
    <!-- FOOTER END ######################## --> 
  </div>
</div>
</body>
</html>
