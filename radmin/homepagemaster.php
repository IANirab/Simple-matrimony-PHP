<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if(isset($_GET['c']) && $_GET['c']!='')
{
	$pagenm=$_GET['c'];
}else{$pagenm = '';}

$action = 0;
$title="";

$description ='';
$Homepage_Divider_2='';
$Homepage_Blurp1='';
$Homepage_Blurp2='';
$Homepage_Blurp3='';
$Homepage_Blurp4='';
$filename ="homepageinsert";
$link ='';
$transition = '';
$trigger =  '';
$content_type =  '';
$page_type =  '';
$popup_block_display='none';
$en_exit =1;
$chk ='checked' ;
$title1='';
$bg_colour = '';
$colour = '';
$currentstatus=0;

$loc = '';
if(isset($_GET['c'])){
$loc=$_GET['c'];
}


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select title,pagenm,link,description,transition,trigger_name,content_type,page_type,bg_colour,colour,en_exit,title1 ,currentstatus from tbl_homepage_images where id=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$title=$rs[0];
		$pagenm = $rs[1];
		$link = $rs[2];
		$description = $rs[3];
		$transition = $rs['transition'];
		$trigger = $rs['trigger_name'];
		$content_type = $rs['content_type'];
		$page_type = $rs['page_type'];
		$bg_colour = $rs['bg_colour'];
		$colour = $rs['colour'];
		$en_exit = $rs['en_exit'];
		$title1 = $rs['title1'];
	    $currentstatus = $rs['currentstatus'];
		
		
		if($en_exit == 1){
		   $chk ='checked' ;
		}else{
		   $chk ='';
		}
		
		 if($pagenm==24){
			$popup_block_display='block'; 
			 
		 }else{
			 $popup_block_display='none';
		 }
		 
		 
		
						
		
		
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById("").value==""){alert("Plese Enter "); document.getElementById("").focus(); return false;}else {return true;}	
}
</script>

<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src="../tinymce/js/tinymce/tinymce.min.js"></script>
  <script>
  
  
  
  tinymce.init({
  selector: 'textarea.desc',
  width:700,
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: 'jquery/tinymce/js/css/codepen.min.css'
 });
  
//  tinymce.init({
//  selector: 'textarea.desc',
//  height: 300,
//  width:700,
//  menubar: false,
//  plugins: [
//    'advlist autolink lists link image charmap print preview anchor',
//    'searchreplace visualblocks code fullscreen',
//    'insertdatetime media table contextmenu paste code'
//  ],
//  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//  content_css: 'jquery/tinymce/js/css/codepen.min.css'
//});
  </script>
<script>
function  update_homepagesection(val){

  if(val==24){
	   
	   $("#popup_block").show();
	   
  }else{
	  
	   $("#popup_block").hide();
  }

}
</script>

<script>


function package_activedeactive(status){
	
	// 1 = active
	// 2 = Deactive
	
	var a=$("#status").val();
    
	
	if(a==1){
	  var  new_status=2;	
	  var a=$("#status").val(2);
	}
	
	if(a==2){
	  var  new_status=1;
	  var a=$("#status").val(1);
	}
	

	

}




</script>

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
			<h1 class="pagetitle">Add Page</h1>
			<!-- ********* TITLE END HERE *********-->
				<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<?php /*?><div class="errorbox"><?= checkerroradmin()?></div><?php */?>
     <form name=frmdocument method=post action ="<?= $filename ?>.php?b=<?= $action ?>&c=<?=$loc?>"  ENCTYPE="multipart/form-data" class="form-horizontal" onSubmit="return validate();">
     
     
     
                <div class="form-group">
                        
                        
                        <div class="widhtsetr"><label>Language</label>
              <select name="cmblanguage" class="form-control">
<? fillcombo("select languageid,language from tbldatingsitelanguagemaster where currentstatus=0 order by language ",$languageid,""); ?>
</select>
              </div>
              
                         <div class="widhtsetr  control-label_25"><label>Page Name</label>
                               
                            <select name="pagenm" id="pagenm" class="form-control" onChange="update_homepagesection(this.value);">
                            <? fillcombo("select id,title from tbl_homepage_type_master where currentstatus=0 and id<100 ",$pagenm,"Select"); ?> 
                            </select>
                      
                          </div> 
                          
                             
                    
                        
                   
                   </div>
                   
                   
     
     <div class="form-group">

                 <label>Tilte</label>
   <input type="text" name="newtitle" class="form-control" id="newtitle" value="<?=$title1?>">
   </div>

      
     
       <div class="form-group">
                        
                         <div class="widhtsetr"><label>Image</label>
                               
                          <input type="file" name="title" class="form-control" id="title" >
                           <note>(Width:641 Height:263)</note>
                      
                          </div> 
                    
                       <div class="widhtsetr control-label_25 ">
                                     <label>&nbsp;</label>
      <? if ($title!="") { ?> <img src="../uploadfiles/site_<? echo $sitethemefolder ?>/<?= $title?>" height=100 width=100> <? } ?>
                       </div> 
                   
                   </div>
      
      
      
      
  
     
     
     
     
     
     <div class="form-group"><label>Link</label>
    
     <textarea  name="link" id="link"  class="form-control" rows="4" cols="20"><?=$link?></textarea>
     </div>
     
     
      <div class="form-group"><label>Description</label>
     <textarea name="description" rows="5" cols="20" class="form-control desc"><?=$description?></textarea>
     </div>
     
     
     
     <!--------------------For POPUP Type------------------------------>

     <div id="popup_block" style="display:<?=$popup_block_display?>">
     
      
                   <div class="form-group">
                    
                       <div class="widhtsetr"><label>Transition</label>
                                <select name="transition" id="transition" class="form-control">
                                <? fillcombo("select id,title from tbl_popup_tag_master where currentstatus=0 and type='1' order by title ",$transition,"select"); ?>
                                </select>
                       </div>
                       
                       <div class="widhtsetr control-label_25 "> <label>Trigger</label>
                                <select name="trigger" id="trigger" class="form-control">
                                <? fillcombo("select id,title from tbl_popup_tag_master where currentstatus=0 and type='2' order by title ",$trigger,"select"); ?>
                                </select>
                        </div>        
                    
                   </div>
                    
                    
                    
                  <div class="form-group">
                        
                      <div class="widhtsetr"><label>Page Type</label>
                            <select name="page_type" id="page_type" class="form-control">
                           <? fillcombo("select id,title from tbl_popup_tag_master where currentstatus=0 and type='4' order by title ",$page_type,"select"); ?>
                            </select>
                       </div> 

                        <input  type="hidden" value="<?=$en_exit?>" id="status" name="status" >
                         <div class="widhtsetr control-label_25 "><label>Enable Exit</label>
                                <label class="switch">
                                <input type="checkbox" onChange="package_activedeactive(<?=$en_exit?>)" <?=$chk?>>
                                <span class="slider round"></span>
                                </label>
                         </div> 
                         
                    </div>
                   <input type="hidden" name="content_type" id="content_type" value="12">
                   
                   
                    <div class="form-group">
                        
                         <div class="widhtsetr"><label>Background Colour</label>
                             <input type="color" name="bgclr" class="form-control" id="bgclr" value="<?=$bg_colour?>" >
                          </div> 
                    
                       <div class="widhtsetr control-label_25 "><label>Colour</label>
                             <input type="color" name="clr" class="form-control" id="clr" value="<?=$colour?>">
                       </div> 
                   
                   </div>
                   
     
     </div>
  
  <!--------------------For POPUP Type------------------------------>
      
      
     
     
     
     

    <div class="form-group common_button">
    <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
     <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
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