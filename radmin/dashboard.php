<? 
session_start();
require_once("commonfileadmin.php");
execute("delete from tbldatingprofilehistorymaster where datediff(curdate(),CreateDate) >= 100 ");
$total_mail_sent=0;
checkadminlogin();
$dash_board_note = findsettingvalue("Dashboard_main_note");
$total_user = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid in (1,2) ");
$total_user_male = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid=1");
$total_user_female = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid=2");
//$sendmail = "N";
//$prefferedpartnermaildate = findsettingvalue("partnerprofilemailsenddate");
//$checksendmail = getonefielddata("select to_days(curdate()) - to_days('$prefferedpartnermaildate') from tbldatingsettingmaster where settingid=1");
//if ($checksendmail >= 1)
//	$sendmail = "Y";
//if ($sendmail == "Y")
//{
//	$total_mail_sent =0;	
//	$result = getdata("select userid from tbldatingusermaster where ". datinguserwhereque());
//	while($rs= mysqli_fetch_array($result))
//	{
//		$send_uid = $rs[0];				
//		$prefferedpartnermaildays = find_days_partner_mails($send_uid);		
//		//echo "<br><br>";
//		if ( $prefferedpartnermaildays!="")
//		{
//			$que = findpartnerprofilequery($prefferedpartnermaildays,"Y",$send_uid,"");			
//			
//			if ($que != "")
//			{
//				$ans = sendpartnermail($que,$send_uid);
//				$ans = "";
//				if ($ans == "Y")
//				$total_mail_sent = $total_mail_sent +1;
//			}	
//		}
//	}	
//	freeingresult($result);
//	//execute("update tbldatingsettingmaster set fldval=curdate() where fldnm='partnerprofilemailsenddate'");
//}
//// start profile updation mail 
//$profile_update_mail_days = findsettingvalue("profile_update_mail_days");
//if ($profile_update_mail_days != "")
//{
//	$profile_sendmail = "N";
//	$profile_update_mailsenddate = findsettingvalue("profile_update_mailsenddate");
//	if ($profile_update_mailsenddate != "")
//	{
//	$profile_checksendmail = getonefielddata("select to_days(curdate()) - to_days('$profile_update_mailsenddate') from tbldatingsettingmaster where settingid=1");
//	if ($profile_checksendmail >= $profile_update_mail_days)
//		$profile_sendmail = "Y";
//	}
//	else
//		$profile_sendmail = "Y";
//	if ($profile_sendmail == "Y")
//	{
//		$result = getdata("select userid from tbldatingusermaster where ". datinguserwhereque());
//		execute("update tbldatingsettingmaster set fldval=curdate() where fldnm='profile_update_mailsenddate'");
//		while($rs= mysqli_fetch_array($result))
//		{
//			sendemail(17,$rs[0],"","");
//		}
//		freeingresult($result);		
//	}
//}	
// end profile updation mail
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script src="../js/jquery.min3.js"></script>

<script type="text/javascript" src="../js/graph.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php 
//echo "start dashboard";exit;
include("admintop.php") ?>
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
			<h1 class="pagetitle" > <i class="fa fa-tachometer"></i> Dashboard
			<?
			$unapproved_count = getonefielddata("select count(tbldatingusermaster.userid) from tbldatingusermaster where tbldatingusermaster.currentstatus in (1)");
			$unapproved_albums = 0;
			$albumdata=getdata("select DISTINCT(CreateBy) from tbldatingalbummaster where currentstatus=1");
			$albumcreateby="";
			while($album=mysqli_fetch_array($albumdata)){
				$albumcreateby .=$album[0].",";
			}if($albumcreateby!=''){
				$albumcreateby=substr($albumcreateby,0,-1);
			}
			if($albumcreateby!=''){
				$album_create_arr = explode(",",$albumcreateby);
				$unapproved_albums = count($album_create_arr);
			}
				$loginid =""; 
				$who_login = "";
				$rs_who = "";
				$emp_role = "";
				$loginid = $_SESSION[$session_name_initital . 'adminlogin'];				
				$who_login = getdata("SELECT emp_role_id,EmailAddress from tbldatingadminloginmaster WHERE LoginId=".$loginid);
				$rs_who = mysqli_fetch_array($who_login);
				$emp_role = $rs_who["emp_role_id"];
				if($emp_role!="0") {				
				
			 ?>
			    <span style="margin-left:500px;">
                	<a target="_blank" href="<?=$sitepath?>registration.php?agt=<?=$loginid?>" style=" text-decoration:none; color:#11449E">Register</a>
                </span>
                <? }
			
                $unclear_invoices = getonefielddata("select count(paymentid) from tbldatingpaymentmaster,tbldatingusermaster where tbldatingpaymentmaster.currentstatus in (0) and clear='N' and tbldatingusermaster.userid=tbldatingpaymentmaster.CreateBy and tbldatingpaymentmaster.paymenttypeid!=''
				order by paymentid desc");
                 ?>            
              
             </h1>            
           
			          
			<!--<h1 align="right" style="padding-top:25px;">Register</h1>-->
		
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common_dashboard">
<!-- ********* CONTENT START HERE *********-->
<?php /*?>Billing stats monthly
user registration monthly
religion monthly<?php */?>
<?=checkerroradmin()?>
<? if ($total_mail_sent >0) { ?>
<?= $total_mail_sent ?> partner matching mails has been sent successfully
<? } ?>
<!-- ********* CONTENT END HERE *********-->
<?
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id != "0"){
	$dashboard_db_4 = dashboard_db_4();
	$dashboard_db_5 = dashboard_db_5();
	$dashboard_db_1 = dashboard_db_1();
	$dashboard_db_2 = dashboard_db_2();
	$dashboard_db_3 = dashboard_db_3();
	$dashboard_db_6 = dashboard_db_6();
	$dashboard_db_7 = dashboard_db_7();
} else {
	$dashboard_db_1 = "N";
	$dashboard_db_2 = "N";
	$dashboard_db_3 = "N";
	$dashboard_db_4 = "N";
	$dashboard_db_5 = "N";
	$dashboard_db_6 = "N";
	$dashboard_db_7 = "N";	
}?>
<?php /*?><table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
<tr>
<th scope="col">
<form name="frm_search_profile"  method="post">
search by profile id : 
<input type="text" name="txtprofileid" class="usersearch1">
<? if($dashboard_db_4 == 'Y' || $dashboard_db_4 == 'N' ) { ?>
<input type="button" value="Search in user manager" class="usersearch1btn" onClick="submit_for_profile_id_user()">
<? } ?>
<? //if (check_employee_module_enabled() == "Y") { ?>
<? if($dashboard_db_5 == 'Y' || $dashboard_db_5 == 'N' ) { ?>
<input type="button" value="Search in invoice manager" class="usersearch1btn" onClick="submit_for_profile_id_invoice()">
<? } ?>
<? //} ?>
</form></th></tr></table><?php */?>
<div class="graph" align="center"><h3>USER STATS</h3>
<ul>
<li>
<div class="admin_block">
<img src="images/users.png"/>

<strong> <?= $total_user ?></strong><span>Total User </span>
</div>
</li> <li>
<div class="admin_block">
<img src="images/male.png"/>
<strong>  <?= $total_user_male ?></strong> <span>Total Male</span> </div></li>
<li style=" margin-right:0;"> 
<div class="admin_block">
<img src="images/female.png"/>
<strong> <?= $total_user_female ?></strong><span>Total Female </span> </div></li></ul></div>
<br>
<br>
<div class="main_graph_outer">
<div class="main_graph_iner_r">
<div class="admin_block">
<h3>IMPORTANT LINKS</h3>
<span><ul>
<li>

<a href="usermanager.php?b=1">Unapproved Users</a></li>
<li><a href="invoicemager.php?b=N&b1=-1">Unclear Invoice Manager</a></li>
<li> <a href="directorymanager.php">Directory Manager</a></li>
<li><a href="testimonialnamager.php">Testimonial Manager</a></li></ul>



</span>
</div>
</div>
<div class="main_graph_iner_r">
<div class="admin_block">
<h3>SEARCH PROFILE ID</h3>
<span>
<form name="frm_search_profile"  method="post">
<input name="txtprofileid" type="text" class="dash_usersearch1 form-control" size="25">
<? if($dashboard_db_4 == 'Y' || $dashboard_db_4 == 'N' ) { ?>
<input type="button" value="Search in user manager" class="dash_usersearch1btn" onClick="submit_for_profile_id_user()">
<? } ?>
<? //if (check_employee_module_enabled() == "Y") { ?>
<? if($dashboard_db_5 == 'Y' || $dashboard_db_5 == 'N' ) { ?>
<input type="button" value="Search in invoice manager" class="dash_usersearch1btn" onClick="submit_for_profile_id_invoice()">
<? } ?>
<? //} ?>
</form>
</span>
</div>
</div>
<div class="main_graph_iner_r">
<div class="admin_block">
<h3>delete stats</h3>
<span>
<br>
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=b">
	<input type="submit" value="Delete Banner Stats Data" class="dash_usersearch1btn">
</form>
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=p">
	<input type="submit" value="Delete PMB Messages" class="dash_usersearch1btn">
</form>
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=c">
	<input type="submit" value="Delete Chat Data" class="dash_usersearch1btn">
</form>
</span>
</div></div>
</div>

<div class="main_graph_outer main_graph_outer_one">
	
    <div class="main_graph_iner_r">
    <div class="admin_block">
    	
    	<h3>Monthly Reports</h3>
        <span>
        <ul>
    	<li>
        	<a href="salessearch.php" target="_blank">Monthly Sales Report</a>
        </li>
        <li>
        	<a href="malesearch.php?b=1" target="_blank">Monthly Male Registration</a>
        </li>
         <li>
        	<a href="femalesearch.php?b=2" target="_blank">Monthly Female Registration</a>
        </li>
        </ul>
       </span>
        </div>
        </div>
      

    <div class="main_graph_iner_r">
    <div class="admin_block">
    <h3>Top 10 Repeors</h3>
    <span>
    <ul>
    	<li>
        	<a href="toppackage.php" target="_blank">Top 10 Pakages of last 12 months</a>
        </li>
        <li>
        	<a href="toppromocode" target="_blank">Top 10 Promocodes of last 12 months</a>
        </li>
        </ul>
        </span>
        </div>
        </div>
         

     <div class="main_graph_iner_r">
    <div class="admin_block">
    <span>
    <h3>TOP REPORTS</h3>
     <ul>
             <li>
        	<a href="topreligions" target="_blank">Top Religion of the months</a>
        </li>
         <li>
        	<a href="topcast" target="_blank">Top Cast of the months</a>
        </li>
        </ul>
        </span>
        </div>
     </div>  


</div>


<?
for($i=12; $i>=0; $i--){
	$m = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
	$y = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
	//$months[] = "'<br>".date("m-Y", strtotime( date( 'Y-m-01' )." -$i months"))."'";
	$months[] = date("m-Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$user_count[] = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE currentstatus=0 AND month(createdate)=".$m." AND year(createdate)=".$y."");	
	$billing_count[] = getonefielddata("SELECT count(paymentid) from tbldatingpaymentmaster WHERE currentstatus=0 AND month(cleardate)=".$m." AND year(cleardate)=".$y."");	
}
//$mnths = implode(",",$months);
//$users = implode(",",$user_count);
$mnths = implode("",$months);
$users = implode("",$user_count);


$billing = implode(",",$billing_count);
//print_r($months);
$relig = getdata("SELECT id,title from tbldatingreligianmaster WHERE currentstatus=0");
while($rs = mysqli_fetch_array($relig)){
	$rs[1] = str_replace(" ","<br>",$rs[1]);
	$religions[] = "'<br>".$rs[1]."'";
	$reluser_count[] = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE currentstatus=0 AND religianid=".$rs[0]);
}
 	$rels = implode(",",$religions);
$relusers = implode(",",$reluser_count);
?>
<!-- <script language="javascript" type="text/javascript" src="jqplot/jquery.min.js"></script>
<script type="text/javascript" src="jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="jqplot/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="jqplot/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="jqplot/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="jqplot/jqplot.pointLabels.min.js"></script>
<link rel="stylesheet" type="text/css" hrf="jqplot/jquery.jqplot.min.css" /> -->
<script language="javascript" type="text/javascript">
/* $(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?=$relusers?>];
        var ticks = [<?=$rels?>];
         
        plot1 = $.jqplot('chart3', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            //extra starts
            grid:{shadow:false, borderWidth:1.0},
            series:[{},{color:"#33ff66"}],
            //extra end
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {                   
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
     
        $('#chart3').bind('jqplotDataClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
 */</script>






       
 <!----------------------------------graph 1 start-------------------------------------------------->  
    
 
 <script>
google.setOnLoadCallback(drawChart1);
function drawChart1() {

  var data = google.visualization.arrayToDataTable([
    ['Month','User'],
			
			
			 <?
		  for($i=12; $i>=0; $i--){
	$m = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
	$y = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));

	$months = date("M Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$user_count = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE currentstatus=0 AND month(createdate)=".$m." AND year(createdate)=".$y."");	
	
		  ?>
		  ['<?=$months?>', <?=$user_count?>],
		  <? } ?>  
		  
			
	
   
  ]);

  var options = {
	 
    title: 'USER REGISTRATION',    
	hAxis: {title: 'Year', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 12}, titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:20}},	
	backgroundColor: {fill: '#a080e5'},
	legendTextStyle: { color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 16 },
    titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 24},
	colors: ['#434a54','green'],
	
	vAxis: {baselineColor: '#fff', gridlines: {color: '#adc9de'}, format: 'short', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:16}},
	animation: {startup : true, duration: 1000, easing: 'out'},
	
   // series: { 1: {color: 'lightgray'} } // series: [ {}, {color: 'lightgray'} ]
    
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart1'));

  chart.draw(data, options);

}
$(window).resize(function(){
  drawChart1();
});
</script>

  <!----------------------------------graph 1 end-------------------------------------------------->
 
 
 



       
 <!----------------------------------graph 2 start-------------------------------------------------->  
   
<script>
google.setOnLoadCallback(drawChart2);
function drawChart2() {

  var data = google.visualization.arrayToDataTable([
    ['Month','User'],
			
			
		<?
		  for($i=12; $i>=0; $i--){
	$m = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
	$y = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
	
	$months = date("M Y", strtotime( date( 'Y-m-01' )." -$i months"));
	
	$billing_count = getonefielddata("SELECT count(paymentid) from tbldatingpaymentmaster WHERE currentstatus=0 AND month(cleardate)=".$m." AND year(cleardate)=".$y."");	
	  ?>
		  ['<?=$months?>', <?=$billing_count?>],
		  <? } ?>
	
   
  ]);

  var options = {
	 
    title: 'BILLING COUNT',    
	hAxis: {title: 'Year', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 12}, titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:20}},	
	backgroundColor: {fill: '#14b9d5'},
	legendTextStyle: { color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 16 },
    titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 24},
	colors: ['#c8f2ff','green'],
	
	vAxis: {baselineColor: '#fff', gridlines: {color: '#adc9de'}, format: 'short', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:16}},
	animation: {startup : true, duration: 1000, easing: 'out'},
	
   // series: { 1: {color: 'lightgray'} } // series: [ {}, {color: 'lightgray'} ]
    
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart2'));

  chart.draw(data, options);

}
$(window).resize(function(){
  drawChart2();
});
</script>



 <!----------------------------------graph 2 end-------------------------------------------------->








       
 <!----------------------------------graph 3 start-------------------------------------------------->  
   
<script>
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Religions','User'],
			
			
		<?

		$relig = getdata("SELECT id,title from tbldatingreligianmaster WHERE currentstatus=0");
		while($rs = mysqli_fetch_array($relig)){
			$rs[1] = str_replace(" ","<br>",$rs[1]);
			$religions = $rs[1];
			$reluser_count = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE currentstatus=0 AND religianid=".$rs[0]);
		
		?>

		  ['<?=$religions?>', <?=$reluser_count?>],
		<? } ?>
   
  ]);

  var options = {
	 
    title: 'RELIGION COUNT',    
	hAxis: {title: 'Religion', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 12}, titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:20}},	
	backgroundColor: {fill: '#fd6d52'},
	legendTextStyle: { color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 16 },
    titleTextStyle: {color: '#fff', fontName: '"Play",sans-serif,arial', fontSize: 24},
	colors: ['#842d1e','green'],
	
	vAxis: {baselineColor: '#fff', gridlines: {color: '#adc9de'}, format: 'short', textStyle:{color: '#fff', fontName: '"Play",sans-serif,arial', fontSize:16}},
	animation: {startup : true, duration: 1000, easing: 'out'},
	
   // series: { 1: {color: 'lightgray'} } // series: [ {}, {color: 'lightgray'} ]
    
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));

  chart.draw(data, options);

}
$(window).resize(function(){
  drawChart();
});
</script>



 <!----------------------------------graph 3 end-------------------------------------------------->










































<script language="javascript" type="text/javascript">
/* $(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = [<?=$users?>];
        var ticks = [<?=$mnths?>];
         
        plot1 = $.jqplot('chart1', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            //extra starts
            grid:{shadow:false, borderWidth:1.0},
            series:[{},{color:"#33ff66"}],
            //extra end
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {                   
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
     
        $('#chart1').bind('jqplotDataClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
 */</script>
<script language="javascript" type="text/javascript">
/*$(document).ready(function(){
         $.jqplot.config.enablePlugins = true;
        var s1 = [<?=$billing?>];
        var ticks = [<?=$mnths?>];
         
        plot1 = $.jqplot('chart2', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            //extra starts
            grid:{shadow:false, borderWidth:1.0},
            series:[{},{color:"#33ff66"}],
            //extra end
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {                   
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
     
        $('#chart2').bind('jqplotDataClick',
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    }); */
</script>



	 <div class="form-wrapper csv_down" align="center">
	<h3>USER REGISTRATION - MONTHLY STATS</h3>
	        	<div class="Daschart" id="chart1" ></div>
	</div>
    
 <div class="form-wrapper csv_down" align="center">
	<h3>BILLING Count- MONTHLY STATS</h3>
        	<div class="Daschart" id="chart2"></div>  
 </div>

 <div class="form-wrapper csv_down" align="center">
        	<h3>Religion Count - USER STATS</h3>
        	<div class="Daschart" id="chart3"></div>            
        </div>   


<div class="form-wrapper csv_down" align="center">

<h3 >Download CSV</h3>
	<form name="form_download" action="user_download.php" class="form_second" method="post">
		<div class="form-group">
<label>User ID From</label>
<input type="text" name="txt_uid_from" size="15" class="form-control">
</div>
<div class="form-group">
<label> User ID To </label>
<input type="text" name="txt_uid_to" class="form-control" size="15"> </div>
        <input type="submit"  value="Download in CSV Format" class=" btn">
	</form>
</div>
<table class="dashbord_grafblock" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr valign="top">
	<td width="40%" class="data_section"  valign="top">
    <div class="dashboardblock1">
	<h3>MONTHLY STATS</h3>
	<br>
<?
for ($i = 12; $i >= 0; $i--) {
	$m = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
	$y = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$month_year = date("M - Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$user_count= getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE currentstatus=0 AND month(createdate)=".$m." AND year(createdate)=".$y.""); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
        <td class="monthname"><?=$month_year ?> :</td>
        <td class="monthdata"><?=$user_count ?></td>
	</tr>
	</table>
<?	
}
?>
<?php /*?><?
$result = getdata("select count(userid),monthname(createdate) from tbldatingusermaster where currentstatus=0 and createdate >= date_add(curdate(),interval -1 year) and createdate <= curdate() group by monthname(createdate) ");
while($rs= mysqli_fetch_array($result))
{
	$tot_user = $rs[0];
	$month = $rs[1]; ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
        <td class="monthname"><?= $month ?> :</td>
        <td class="monthdata"><?= $tot_user ?></td>
	</tr>
	</table>
	<?
}
freeingresult($result);
?><?php */?>
</div>
	</td>
	<td width="40%"  class="data_section" valign="top">
    <div class="dashboardblock1">
	<? //if (check_employee_module_enabled() == "Y") { 
	 if($dashboard_db_1 == 'Y' || $dashboard_db_1 == 'N' ) { ?>	
	<h3>BILLING STATS</h3>
<br>
<?
$curr = findsettingvalue("CurrencySymbol");
for ($i = 12; $i >= 0; $i--) {
	$m = date("m", strtotime( date( 'Y-m-01' )." -$i months"));
	$y = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$month_year = date("M - Y", strtotime( date( 'Y-m-01' )." -$i months"));
	$billing_sum = getonefielddata("SELECT sum(ifnull(totalpaymentamount,0)) from tbldatingpaymentmaster WHERE currentstatus=0 AND clear='Y' AND month(createdate)=".$m." AND year(createdate)=".$y.""); 
	if($billing_sum==''){
		$billing_sum = 0;	
	}
	$billing_sum = $curr.number_format($billing_sum,2);
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
        <td class="monthname"><?=$month_year ?> :</td>
        <td class="monthdata"><?=$billing_sum?></td>
	</tr>
	</table>
<?	
}
?>
<? } ?></div></td>
</tr>
<tr>
<?
if ($Enable_cast_subcast_design_setting == "Y") { ?>

<td width="40%"  class="data_section"  valign="top">
<?
$res = getdata("SELECT tbldatingcastmaster.id,tbldatingcastmaster.title,count(*) from tbldatingcastmaster INNER JOIN tbldatingusermaster on tbldatingusermaster.castid=tbldatingcastmaster.id AND tbldatingusermaster.currentstatus=0 group by tbldatingcastmaster.title order by count(*) desc limit 12"); ?>
<div class="dashboardblock1">
<h3>CASTE WISE ACTIVE MEMBERS</h3><br>
<? 
while($cast_rs = mysqli_fetch_array($res)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td class="monthname"><?=$cast_rs[1] ?> :</td>
    <td class="monthdata"><?=$cast_rs[2]?></td>
</tr>
</table>
<? } ?>
</div>
<? } ?></td>


<td width="40%" class="data_section" valign="top">
<? 
$mot_res = getdata("SELECT tbldatingmothertonguemaster.id,tbldatingmothertonguemaster.title,count(*) from tbldatingmothertonguemaster INNER JOIN tbldatingusermaster on tbldatingusermaster.motherthoungid=tbldatingmothertonguemaster.id AND tbldatingusermaster.currentstatus=0 group by tbldatingmothertonguemaster.title order by count(*) desc limit 12");
?>
<div class="dashboardblock1">
<h3>MOTHERTONGUE WISE ACTIVE MEMBERS</h3><br>
<? 
while($mot_rs = mysqli_fetch_array($mot_res)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td class="monthname"><?=$mot_rs[1] ?> :</td>
    <td class="monthdata"><?=$mot_rs[2]?></td>
</tr>
</table>
<? } ?>
</div>

	</td>	
</tr>	
	</table>
<?php /*?><br>
<br>
<? if($dashboard_db_2 == 'Y' || $dashboard_db_2 == 'N' ) { ?>
<div class="csvblock" align="center" style="width:95%"><form name="form_download" action="user_download.php" method="post">
User ID From : <input type="text" name="txt_uid_from" size="15" class="usersearch1"> &nbsp;&nbsp;&nbsp; User ID To : 
<input type="text" name="txt_uid_to" class="usersearch1" size="15"> &nbsp;&nbsp;&nbsp; <input type="submit"  value="Download in CSV Format" class="usersearch1btn">
</form>
</div>
<? } ?>
<br><?php */?>

<? //if (check_employee_module_enabled() == "Y") { 
if($dashboard_db_3 == 'Y' || $dashboard_db_3 == 'N' ) {
?>
<?php /*?><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="33%" align="center">
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=b">
<input type="submit" value="Delete Banner Stats Data" class="actionbtndel" style="font-size:12px; font-weight:bold;">
</form>
</td>
<td width="33%" align="center">
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=p">
<input type="submit" value="Delete PMB Messages" class="actionbtndel" style="font-size:12px; font-weight:bold;">
</form>
</td>
<td width="33%" align="center">
<form name="frm_delete_banner_data" method="post" action="delete_stats.php?b=c">
<input type="submit" value="Delete Chat Data" class="actionbtndel" style="font-size:12px; font-weight:bold;">
</form>
</td>
</tr>
</table><?php */?>
<br>
<? } ?>
<br>
<br>
<?php /*?><? if (check_employee_module_enabled() == "Y") { ?>
<div align="center">
<table width="407px" align="center" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="407px" align="center">
<form name =frmdocument method=post action="dashboard_notepad_submit.php">
<table width="407px" align="center" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="bottom" style="text-align:center; background-image:url(images/notebg.gif); width:407px; height:181px; background-repeat:no-repeat; background-position:top left;">
<textarea name="txt_dash_board_note" rows="4" cols="40" style="background-color:#fffeef; width:350px; height:90px; margin-bottom:35px; font-family:Arial, Helvetica, sans-serif; border:none"><?= $dash_board_note ?></textarea>
<div style="position:relative; width:407px;">
<div style="position:absolute; left:150px; top:0px;"><input type="submit" value="&nbsp;" style="width:124px; height:38px; background-image:url(images/save.gif); background-repeat:no-repeat; background-position:top; border:none; cursor:pointer; cursor:hand; background-color:transparent"></div>
</div>
<? } ?>
</td>
</tr>
</table>
</form>
</td>
</tr>
</table><?php */?>
<br>
<br>
<br>
<br>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td style="padding:10px;"><h3>Banner Help</h3></td>
</tr>
<tr>
<td style="padding:10px;" class="para">[--height--]
[--width--]
[--alt--]
[--filenm--] - uploaded file nm 
[--TopX--]
[--MoveTo--]
[--StartSec--]
[--popupStartSec--]
[--Title--]

[--Description--] -- text or flash banner
[--fontfamily--]
[--fontsize--]
[--backcolor--]
[--border--]

[--padding--]
[--morefontcolor--]</td>
</tr>




<tr>
<td style="padding:10px;"><h3>Image Help</h3></td>
</tr>
<tr>
<td style="padding:10px;" class="para">
<a href="homepagemanager.php" style="color:#000">[Home page Image]</a>
height : 370px ,
width :1002px
<br/>
<br/>

<a href="website_settingmaster.php" style="color:#000">[Home page logo]</a>
height : 70px, 
width :270px


</td>
</tr>


</table>
</div>






<br>
<br>
<br>
<br>
<br><br><br><br><br>
</div>
</div><br style="clear:both">
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
<? 
function find_days_partner_mails($userid)
{
	$send_days ="";
	if ($userid != "")
	{
		$result = getdata("select sendmeemail,to_days(curdate()) - to_days(preferred_mail_send_date),profileid from tbldatingpartnerprofilemaster where userid=$userid and sendmeemail != 'N'");
		while($rs= mysqli_fetch_array($result))
		{
			$sendmeemail = $rs[0];
			$last_mail_send_before_days = $rs[1];
			$profileid = $rs[2];
			if (strlen($last_mail_send_before_days) == 0)
			{
			if ($sendmeemail == "M")
				$send_days =30;
			else
				$send_days =7;
			}
			if ($last_mail_send_before_days != "")
			{
			if ($sendmeemail == "M")
				if ($last_mail_send_before_days > 30)
					$send_days =30;
			if ($sendmeemail == "W")
				if ($last_mail_send_before_days > 7)
					$send_days=7;
			}
		}
		freeingresult($result);
	}
	
	return $send_days;
}

function sendpartnermail($searchque,$profileuserid)
{
	global $sitepath,$mainfoldernm;
	$profilelink ="";	
	$result = getdata("select userid, name,genderid," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname from tbldatingusermaster where $searchque ". datinguserwhereque() . " order by userid desc ");
		while($rs= mysqli_fetch_array($result))
		{
			$userid = $rs[0];
			$name = $rs[1];
			if ($rs[2] !="")
		 	$genderid = findgender($rs[2]);
		 	$age = $rs[3];
		 	$countryid = "";
		 	if ($rs[4] !="")
		 	$countryid = findcountryid($rs[4]);
			//$profilelink .= "<br><a href='" .$sitepath . $mainfoldernm ."/displayprofile/$userid'>$name ,$genderid,$age,$countryid</a>";
			$profilelink .= "<br><a href='" .displayprofilelink($userid)."'>$name ,$genderid,$age,$countryid</a>";
			//$profilelink = displayprofilelink($curruserid);
			
		}
		freeingresult($result);
	if ($profilelink != "")
	{	
		sendemail(9,$profileuserid,$profilelink);		
		//send_sms(104,$profileuserid); // added by Nishit to send sms for matching profile
		return "Y";
	}
	execute("update tbldatingpartnerprofilemaster set preferred_mail_send_date=curdate() where userid=$profileuserid");
	return "N";
}

function send_sms($txtid,$userid){
	$userid = "103";
	$sms_text = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=".$txtid);		
	$get_sms_pkg_details = getdata("SELECT name,sms_package_id, sms_exp_date, sms_sent, sms_can_send, mobile from tbldatingusermaster WHERE userid IN ($userid)");
	while($rs_sms = mysqli_fetch_array($get_sms_pkg_details)){
		$sms_package_id = $rs_sms['sms_package_id'];
		$sms_exp_date = $rs_sms['sms_exp_date'];
		$sms_sent = $rs_sms['sms_sent'];
		$sms_can_send = $rs_sms['sms_can_send'];
		$name = $rs_sms['name'];
		$mobile = $rs_sms['mobile'];
		if($sms_text!=""){
			$sms_text = str_replace("[username]",$name,$sms_text);
		}		
		
		$days = (strtotime($sms_exp_date) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);	
		if($days>0){
			if($sms_can_send>0){
				$sms_text = rawurlencode($sms_text);
				 execute("INSERT into tbl_sms_master SET userid=".$userid.", mobile=".$mobile.", sms_text='".$sms_text."'");
				 $max_sms_id = getonefielddata("SELECT max(id) from tbl_sms_master");
				 
				 /*$obj = new sms($mobile,$sms_text);
				 $result= "";
				 $result = $obj->send();*/
				 //if(file_exists("../dbinclude/routesmsfunction.php")){
				 if($sms_module_enable=="Y") {
				 	$result = sms_to_send($mobile,$sms_text,0,1);
				 	$result_arr = explode("|",$result);
				 	$results = $result_arr[0]; 
				} else {
					$result = "";
				}	
				 execute("UPDATE tbl_sms_master SET sms_response = ".$results." WHERE id=$max_sms_id");
				 $sms_hv_sent = $sms_sent + 1;
				 $sms_cn_send = $sms_can_send - 1;
				 execute("UPDATE tbldatingusermaster SET sms_sent = ".$sms_hv_sent.", sms_can_send = ".$sms_cn_send." WHERE userid=".$userid);
			}
		}
	}	
}

function find_active_members($exque)
{
	return getonefielddata("select count(userid) from tbldatingusermaster where $exque currentstatus=0 ");
}


// gst invoice code , for change tax date 

$invoice_end= findsettingvalue("invoice_end"); 
if(date('Y-m-d') > $invoice_end)
{
 	
	$invoice_start= findsettingvalue("invoice_start"); 
	$startdatenew=date('Y-m-d', strtotime($invoice_start. ' + 1 years'));
	execute( "UPDATE  tbldatingsettingmaster SET fldval = '".$startdatenew."'
	WHERE fldnm='invoice_start' " );
	
	
	$enddatenew=date('Y-m-d', strtotime($invoice_end. ' + 1 years'));
	execute( "UPDATE  tbldatingsettingmaster SET fldval = '".$enddatenew."'
	WHERE fldnm='invoice_end' " );
	
	
	
}

?>
<script language="javascript">
function submit_for_profile_id_user()
{
 document.frm_search_profile.action="user_search_profileid.php";
 document.frm_search_profile.submit();
}
function submit_for_profile_id_invoice()
{
 document.frm_search_profile.action="invoice_search_profileid.php";
  document.frm_search_profile.submit();
}

</script>