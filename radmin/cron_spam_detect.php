<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>Spam Detect</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
			<?= checkerroradmin()?>
    		<?
	$arr_pass=array();
	$arr_createip=array(); 
	$arr_email=array(); 
	$sql="select userid,password,name,createdate,createip from tbldatingusermaster 
	where emailverified='N' and currentstatus!=8  order by userid desc  ";
			$result=getdata($sql);
			while($rs=mysqli_fetch_array($result))
			{
				$userid=$rs[0];
				$password=$rs[1];
				$name=$rs[2];
				$createdate=$rs[3];
				$createip=$rs[4];
				array_push($arr_pass,$password);
				array_push($arr_createip,$createip);
				
				
			}
				// 30 password found
				$counts = array_count_values($arr_pass);
				$filtered_pass = array_filter($arr_pass, function ($value) use ($counts) {
				return $counts[$value] > 30;
				});
				
				// old pass
				$find_pass='';
				$filtered_pass_old_arr=array();
				$result12 = getdata("SELECT title from tbl_spam_master WHERE 
					type='pass' and currentstatus=0 ");
				while($rs12=mysqli_fetch_array($result12))
				{
						array_push($filtered_pass_old_arr,$rs12[0]);
						$find_pass .= " or password like '%".$rs12[0]."%'";
				}
				$find_pass=substr($find_pass,4);
				
				
				// get one uniqe value
				$filtered_pass=array_unique($filtered_pass);
				$filtered_pass=array_values($filtered_pass);
				for($ij=0;$ij<=count($filtered_pass)-1;$ij++)
				{
					$filterpass_new=$filtered_pass[$ij];
					
					if (in_array($filterpass_new, $filtered_pass_old_arr))
				    {
				 	
					}else
					{
						$sSql = "insert into tbl_spam_master (title,type,createby,createip,createdate)
						values('".$filterpass_new."','pass','1','".$_SERVER['REMOTE_ADDR']."',curdate())";  
						execute($sSql);	
					}
				}
	
	
				
				// ip 		
				$counts = array_count_values($arr_createip);
				$filtered_ip = array_filter($arr_createip, function ($value) use ($counts) {
				return $counts[$value] > 30;
				});		
				
				// old ip
				$find_ip='';
				$filtered_ip_old_arr=array();
				$result13 = getdata("SELECT title from tbl_spam_master WHERE 
					type='ip' and currentstatus=0 ");
				while($rs13=mysqli_fetch_array($result13))
				{
						array_push($filtered_ip_old_arr,$rs13[0]);
						$find_ip .= " or createip like '%".$rs13[0]."%'";
				}
				
				// get one uniqe value
				$filtered_ip=array_unique($filtered_ip);
				$filtered_ip=array_values($filtered_ip);
				for($jk=0;$jk<=count($filtered_ip)-1;$jk++)
				{
					$filtered_ip_new=$filtered_ip[$jk];
					
					if (in_array($filtered_ip_new, $filtered_ip_old_arr))
				    {
				 	
					}else
					{
						$sSql = "insert into tbl_spam_master (title,type,createby,createip,createdate)
						values('".$filtered_ip_new."','ip','1','".$_SERVER['REMOTE_ADDR']."',curdate())";  
						execute($sSql);	
					}
				}
			
			
				// email 		
				$countse = array_count_values($arr_email);
				$filtered_email = array_filter($arr_email, function ($value) use ($countse) {
				return $countse[$value] > 5;
				});		
				
				// old email
				$find_email='';
				$filtered_email_old_arr=array();
				$result14 = getdata("SELECT title from tbl_spam_master WHERE 
					type='email' and currentstatus=0 ");
				while($rs14=mysqli_fetch_array($result14))
				{
						array_push($filtered_email_old_arr,$rs14[0]);
						$find_email .= " or email like '%".$rs14[0]."%'";
				}
				
				// get one uniqe value
				$filtered_email=array_unique($filtered_email);
				$filtered_email=array_values($filtered_email);
				for($kl=0;$kl<=count($filtered_email)-1;$kl++)
				{
					$filtered_email_new=$filtered_email[$kl];
					
					if (in_array($filtered_email_new, $filtered_email_old_arr))
				    {
				 	
					}else
					{
						$sSql = "insert into tbl_spam_master (title,type,createby,createip,createdate)
						values('".$filtered_email_new."','email','1','".$_SERVER['REMOTE_ADDR']."',curdate())";  
						execute($sSql);	
					}
				}
			
			
			/// now check in user table who has spam ip & pass 
	if($find_pass!='' || $find_ip!='')
	{
		$search="and (".$find_pass." ".$find_ip." ".$find_email.")";
	}else{$search="";}


 	$sql2="select userid from tbldatingusermaster 
	where emailverified='N' and currentstatus!=8 ".$search." order by userid desc  ";  
			$result2=getdata($sql2);
			while($rs2=mysqli_fetch_array($result2))
			{
				$userid=$rs2[0];
				$sSql = "update tbldatingusermaster set currentstatus='8' where userid='".$userid."'
				and emailverified='N' ";  
				execute($sSql);
			}
			
			?>
      
       
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