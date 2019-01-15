<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_3 = web_setting_wss_3();
	$web_setting_wss_4 = web_setting_wss_4();
} else {	
	$web_setting_wss_3 = "N";
	$web_setting_wss_4 = "N";
}
if($web_setting_wss_3 == 'Y' || $web_setting_wss_3 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>

div.tabs {
  font-size: 80%;
  float:left;
  width:100%;
}

a.tab { float:left;
  background-color: #FF5639;
  border:0;
  border-bottom:none;
  padding: 2px 1em 2px 1em;
  text-decoration: none;
   color: #fff;
  margin:0 3px 0px 0; font-size:12px; 
   cursor:pointer;
      float: left;
    margin: 0px 2px 6px;
	font-size:15px;
}

a.tab:hover, a.tab:focus, a.tab.active{
  color: #fff; background-color: #000;
}



/*
 * note that by default all tab content areas
 * have display set to 'none'
 */
div.tabContent { 
display: none;
    float: left;
    width: 100%;
}
</style>
<!--<link rel="stylesheet" href="../jquery/tooltip/bubble-tooltip.css" type="text/css" />
<script type='text/javascript' src='../jquery/tooltip/bubble-tooltip.js'></script>-->
<?
if(isset($_GET['c']) && $_GET['c']!=''){
	$active_tab =$_GET['c'];
}else{$active_tab=0;}



$tblnm = 'tbldatingsettingmaster';
if(isset($_GET['t']) && $_GET['t']=='m'){
	$tblnm = 'tbldatingmobsettingmaster';
}
$result = getdata("SELECT category from ".$tblnm." WHERE category!='' AND currentstatus=0 GROUP BY category");
$num = mysqli_num_rows($result);

$str = "";
for($i=1; $i<=$num; $i++){
	$str .= "*tab".$i."*".",";
}
$str = substr($str,0,-1);
$str = str_replace("*",'"',$str);

?>
<script>

	  var tabs = [<?=$str?>];

      function showTab( tab ){

        // first make sure all the tabs are hidden
        for(i=0; i < tabs.length; i++)
		{
			$("#"+tabs[i]).hide();
			$("#link"+tabs[i]).removeClass("active");
        }
        // show the tab we're interested in
		$("#link"+tab).addClass("active");
		$("#"+tab).show();
       
      }
</script>

<script>
function change_setvalue(val,id)
{
	
	 $.post('setting_insert_ajax.php',{
			id:id,
			status:val
			
		}, function (data){
				
				
				$("#hide_val"+id).hide();
				$("#show_val"+id).show();
				
				if(val=='Y')		  
				{
					$("#chkbx"+id).val("N");
					$("#show_val"+id).html("Y");
				}
				
				if(val=='N')		  
				{
					$("#chkbx"+id).val("Y");   
					$("#show_val"+id).html("N");
				}
				
				
				
		})	
	
	

	
	
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
			<h1 class="pagetitle"><i class="fa fa-cog"></i> <? if(isset($_GET['t']) && $_GET['t']=='m'){ ?>Mobile <? } ?>Site Settings</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="tabs">
<? 
	if($enable_developer_setting=='Y')
	{
		$sql2="SELECT category from ".$tblnm." WHERE category!='' AND currentstatus=0 GROUP BY category";
	}else
	{
		 $sql2="SELECT category from ".$tblnm." WHERE category!='Z-Developer' AND currentstatus=0 GROUP BY category
		 limit 1,40 ";
	}

	$result = getdata($sql2);
	$i=1;
	$cat="";
	while($rs =mysqli_fetch_array($result)){ 
	$cat .= $rs['category'].",";
	?>
    <a class="tab<? if($active_tab>0 && $active_tab==$i){ echo ' active ';} elseif($i==1 && $active_tab==0){ echo ' active ';} ?>" id="linktab<?=$i?>" onClick="showTab('tab<?=$i?>')"><?=$rs['category']?></a>
    
<?	
$i++;
	}
?>
    		</div>
<?			
$cat = substr($cat,0,-1);
$arr = explode(",",$cat);
$k=1;
for($m=0; $m<count($arr); $m++){
if($active_tab>0 && $active_tab==$k)
{
		$style = 'style="display:block"';
}
elseif($k==1 && $active_tab==0){
	$style = 'style="display:block"';
} else {
	$style = "";
}
?>
<div id="tab<?=$k?>" class="tabContent" <?=$style?> >
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col" width="10%">Id</th>
	    <th scope="col" width="30%">Setting Title</th>
		<th scope="col" width="45%">Current Set Value</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from ".$tblnm." where category = '$arr[$m]' and currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "settingmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(settingid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","N");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$sql="select settingid,displaytext,fldval,help_text,switch ". $fromqry ." order by displaytext ";
$result = getdata($sql);
$i=1;
while($rs= mysqli_fetch_array($result))
{
		  	$settingid=$rs[0];
			$displaytext=$rs[1];
			//$fldval=htmlentities($rs[2]);
			$fldval=$rs[2];
			$fldval = str_replace("&#39;","'",$fldval);
			$help = $rs[3];
			$switch = $rs[4];

		 ?>
            <tr valign="top">
           	<td <?= admintdclass ?>><?=$settingid?></td>
          	<td <?= admintdclass ?>>				
           <?=$displaytext?>

			
            <? if($help!='') { ?>
                
               <a href="#" class="Mytooltipa" data-toggle="tooltip" title="<?=$help?>"> <img   src="images/help.png" ></a>
			
			
			<? } ?> 
            
            
                        
			</td>
          	<td id="hide_val<?=$settingid?>" <?= admintdclass ?>><?=$fldval?></td>
            <td id="show_val<?=$settingid?>" <?= admintdclass ?> style="display:none"></td>
            
            <td <?= admintdclass ?>>
			
			<? if($web_setting_wss_4 == 'Y' || $web_setting_wss_4 == 'N') 
			{ 
					if(isset($_GET['t']) && $_GET['t']=='m')
					{
					?>
            	<a href="settingmaster.php?b=<?= $settingid ?>&t=m" class="actionbtn_m green">Modify</a>
                <? }
				 else { ?>
					 <? if($switch=='Y'){?>
                            <label class="switch">
                            <input type="checkbox" <? if($fldval=='Y'){ ?> checked value="N" <? }else{ ?>
                            value="Y" <? } ?> onClick="change_setvalue(this.value,'<?=$settingid?>')"
                            id="chkbx<?=$settingid?>">
                            <span class="slider round"></span>
                            </label>
                    <? } ?>	 
                     <? if($switch=='N'){?>
                    <a href="settingmaster.php?b=<?= $settingid ?>" class="actionbtn_m green">Modify</a>
                     <? } ?>
                     
                <? } ?>
                
		<? } ?>
            	</td>
            </tr>
		<?
		$i++;
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
    </div>
      </div>
<? 
$k++;
} ?>	  
	
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $settingmanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
<div id="bubble_tooltip" class="settingm">
    <div class="bubble_top"><span></span></div>
    <div class="bubble_middle"><span id="bubble_tooltip_content">&nbsp;</span></div>
    <div class="bubble_bottom"></div>
  </div>
</body>
</html>
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>