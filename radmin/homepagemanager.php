<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$table_field_title ="Id,Title";
$table_field_title_arr = explode(",",$table_field_title);
$currentstatus=0;
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >

<script language="javascript">
	function select_parent(str)
	{
		$.ajax
		({
			type: "POST",
			url: "homepage_search.php",
			data:'page='+str,
			success: function(data)
			{
				location.reload();
			}
	
		});
	}
		
	
	
function popup_activedeactive(id,status){
	
	// 0 = active
	// 2 = Deactive
	
	var a=$("#status_new"+id).val();
    
	
	if(a==0){
	  var  new_status=2;	
	  var a=$("#status_new"+id).val(2);
	}
	
	if(a==2){
	  var  new_status=0;
	  var a=$("#status_new"+id).val(0);
	}
	
	
	 $.post('popup_activedeactive.php',{
			id:id,
			status:new_status	
			
		}, function (data){
			  
			   //location.reload();
		})	
	

	

}

</script>
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
			<h1 class="pagetitle">Page Manager</h1>
			<div class="addlink1"><div class="addlink"><a href="homepagemaster.php">Add new</a></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>


<div class="form-group singal_group">
		<form method="post">
			<select name="cmblocation" id="cmblocation"  class="form-control" onChange="select_parent(this.value);">
			<option value="">All page</option>
            <?
    		$result2 = getdata("select page_nm from tbl_homepage_type_master where page_nm!='' and currentstatus=0
			group by page_nm order by page_nm ");
			while($rs2= mysqli_fetch_array($result2))
			{        
			?>
            <option value="<?=$rs2[0]?>" 
            <? if(isset($_SESSION[$session_name_initital . "admin_home_image"]) && $_SESSION[$session_name_initital . "admin_home_image"]==$rs2[0]){?> selected<? }?>
            ><?=$rs2[0]?></option>
            <? } ?>
			</select>
         </form>
             </div>

<div class="table-responsive">
        <table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
        <thead>
        <tr>
  		<th  scope="col" width="5%">Id</th>
		<th scope="col" width="65%">Image</th>
		<th width="15%" scope="col">Type</th>	
     	<th scope="col" width="15%">Action</th></tr>
        </thead>
        <tbody>
        
		<? if(isset($_SESSION[$session_name_initital . "admin_home_image"]) && 
        $_SESSION[$session_name_initital . "admin_home_image"]!='')
        { 
            $frqry=" and page_nm='".$_SESSION[$session_name_initital . "admin_home_image"]."' ";
        } else{$frqry='';$cmblocation_sel='';}
        ?>
        
        <?
         $sql1="select id,page_nm,caption_title,extra_link,title,add_more
		 from tbl_homepage_type_master where currentstatus=0 $frqry order by order_ct  ";
        $result1 = getdata($sql1);
        while($rs1= mysqli_fetch_array($result1))
        {
			$caption_title= $rs1['caption_title'];
			?>
            <? if($caption_title!=''){?>
            <tr>
            	<td class="HomemnSome_bg" colspan="4" style="text-align:center">
				
				<div class="HomemnSome">
				
				<h4><?=$caption_title?> 
                <strong>&nbsp;
					<?
                    if($rs1['extra_link']!='')
                    { if($rs1['title']!=''){ echo '('.$rs1['title'].')'; } }
                    ?>
                </strong>
                </h4>
                
                
                <br>
                <?
            	if($rs1['extra_link']!='')
				{
				?>	
					<a target="_blank" href="<?=$rs1['extra_link']?>" class="actionbtn_m green">
                    Manage</a>
                <? 
				}else{
				?>	
            	      <? if($rs1['add_more']=='Y'){ ?>
                        <a target="_blank" href="homepagemaster.php?c=<?=$rs1['id']?>" class="actionbtn_m green">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
						Add</a>
                      <? } ?>  
                <? } ?>
                </div>
           </tr>
            <? } ?>
            
            
		<?
			$fromqry = " from tbl_homepage_images 
			 where tbl_homepage_images.currentstatus in (0,2) and pagenm='".$rs1[0]."'    ";
			$FileNm = "homepagemanager.php?";

			$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
			if ($Pgnm == "")
				$Pgnm = 1;
				
			$totalnorecord = getonefielddata( "select count(id) $fromqry ");
			$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
			$NoOfRecord = $arrval["NoOfRecord"];
			$BackStr = $arrval["BackStr"];
			$NextStr = $arrval["NextStr"];

			$sql="select id,title,link,description,pagenm,title1,currentstatus,display_content $fromqry  $NoOfRecord ";
			$result = getdata($sql);
			while($rs= mysqli_fetch_array($result))
			{
			$id=$rs[0];
			$title = $rs[1];
			$link = $rs[2];
			$description =$rs[3];
			$pagenm=$rs[4];
			$title1=$rs[5];
			$currentstatus=$rs[6];
			$display_content=$rs[7];

			?>
			
            <tr class="hmSecBg" valign="top">
<td ><?= $id ?></td>
<td>
<div class="hmSecFixd">

<? 
if($display_content=='Y')
{	$description2='';
	 $description2=str_replace('[siteimg]',$sitepath.'assets/'.$sitethemefolder.'/images/',$description);
	 $description2=str_replace('[imgpath]',$sitepath.'assets/'.$sitethemefolder.'/',$description);
	 echo $description2;
}
elseif($title!=''){?>
<img src="<?=$sitepath?>uploadfiles/site_<? echo $sitethemefolder ?>/<?=$title ?>" class="upHimages" />
<? }else{ echo str_replace('[siteimg]',$sitepath.'assets/'.$sitethemefolder.'/images/',$description); }?>
</div>
</td>
<td><? echo $page_title = getonefielddata( "select title from tbl_homepage_type_master where id='".$pagenm."'  "); ?></td>
<td>
<a href="homepagemaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
<a href="homepagedelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>



    <?
	    
		if ($currentstatus==0){
		   $Ap_status=2;
		   $chk='checked';
		}else{
		   $Ap_status=0;
		   $chk='';
		}
	  
	  ?>
     
   
         
     <input  type="hidden" value="<?=$currentstatus?>" id="status_new<?= $id ?>" name="status_new<?= $id ?>"/>
     <label class="switch">
    <input type="checkbox" onChange="popup_activedeactive(<?= $id ?>,<?=$Ap_status?>)"  <?=$chk?>>
        <div class="slider round"></div>
     </label>
                         
      
     


</td>
</tr>
			
			<?
            }
            freeingresult($result);
		}
            ?>
</tbody>
</table>
</div>
<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
</div>
</div>
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