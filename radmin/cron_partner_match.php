<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$country_code = '';
$curruserid = '';
$Horoscope ='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
	$user_mnager_um_9 = user_mnager_um_9();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
	$user_mnager_um_9 = "N";
}
$status  = "0,1,2,4";
$quer_st = "";
$ex_quer_st="";
if (isset($_GET["b"]))
if ($_GET["b"] != "")
{
	$status = $_GET["b"];
	$quer_st = $status;
	$ex_quer_st ="*b=$status";
}
$exque ="";
if (isset($_GET["b2"]))
if ($_GET["b2"] != "")
{
	if ($_GET["b2"] =="e"){
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) < 0 and ";
	} else {
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) > 0 and tbldatingusermaster.packageid<>1 and ";
	}
	$status =0;
	$quer_st = $status ."&b2=" . $_GET["b2"];
	$ex_quer_st .="*b2=".$_GET["b2"];
}
$remove_query = "";
if (isset($_GET["b1"]))
if ($_GET["b1"] != "")
	$remove_query = $_GET["b1"];
if ($remove_query == "-1")
	$_SESSION[$session_name_initital . "admin_user_search"]="";
if($user_mnager_um_9=='Y' || $user_mnager_um_9=='N')	{
?>
<?


// alter qry partnerprofile master  partner_match_send
$send_again=20;  // send again email after how many days
$limit=200; // no of mail send at once

$cur=date("Y-m-d");
$date=date_create($cur);
$month=date_format($date,"m");

if($month%2==0)
{
	//echo "even"; 
	$orderby="desc";

}
else
{
	//echo "odd";
	$orderby="asc";
}
$matchlimit=6;


//  set partner_match_send to createdate
		$sql_new = getdata("select userid,DATE_FORMAT(	CreateDate, '%Y-%m-%d') as date from tbldatingpartnerprofilemaster where  partner_match_send=0 ");		
		while($rs_new= mysqli_fetch_array($sql_new))
{
	$userid_new= $rs_new[0];
	$date_new=$rs_new[1]; 
	
	$sql_upd_new="UPDATE tbldatingpartnerprofilemaster SET partner_match_send='".$date_new."' where 
	userid='".$userid_new."' ";
	execute($sql_upd_new);
}



$a='';
$b='';
$c='';
$d='';
$data='';
$e='';
$f='';	




/// fetch details of user for match
		$result1 = getdata("SELECT tbldatingpartnerprofilemaster.userid,tbldatingpartnerprofilemaster.genderid,
		tbldatingpartnerprofilemaster.agefrom,tbldatingpartnerprofilemaster.ageto,
		tbldatingpartnerprofilemaster.states,tbldatingpartnerprofilemaster.religianid,tbldatingpartnerprofilemaster.castid
		 from tbldatingpartnerprofilemaster join  tbldatingusermaster
		 on tbldatingpartnerprofilemaster.userid=tbldatingusermaster.userid
		 where tbldatingpartnerprofilemaster.genderid!='' and tbldatingpartnerprofilemaster.agefrom!='' 
		 and tbldatingpartnerprofilemaster.ageto!='' and tbldatingusermaster.currentstatus=0 and
		  to_days(curdate()) - to_days(partner_match_send) > ".$send_again." 
		 order by tbldatingpartnerprofilemaster.userid desc limit ".$limit." ");		

		while($rs= mysqli_fetch_array($result1))
{
	     	$touserid=$rs[0];
			 $genderid=$rs[1]; 
			$agefrom=$rs[2]; 
			$ageto=$rs[3]; 
			$states=$rs[4];
			$religianid=$rs[5];
			$castid=$rs[6];
	
		if($genderid!=''){
			 $a = " AND genderid=".$genderid;	
		}else{$a='';}
		
		$states_arr = explode(",",$states);	
		if($states!=''){
			$b .= " AND (";
			for($s=0; $s<count($states_arr); $s++){			
				$b .= "state=".$states_arr[$s]." OR ";
				
			}		
			$b = substr($b,0,-4);
			$b .= ")";		
		}else{$b='';}
		
		
		
		if($agefrom!='' && $agefrom!='0.0' && is_numeric($agefrom)){
			 $c = " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= ".$agefrom."  " ;
		}else{$c='';}
		
		if($ageto!='' && $ageto!='0.0' && is_numeric($ageto)){	
			$d = " AND round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" .$ageto. "  " ;
		}else{$d='';}
		
		if($religianid!=''){
			$e = " AND religianid=".$religianid;	
		}else{$e='';}
		
		
		$castid_arr = explode(",",$castid);	
		if($castid!=''){
			$f .= " AND (";
			for($x=0; $x<count($castid_arr); $x++){			
				$f .= "castid=".$castid_arr[$x]." OR ";
				
			}		
			$f = substr($f,0,-4);
			$f .= ")";		
		}else{$f='';}
		

	
		
		 $fromque ="from tbldatingusermaster where currentstatus=0 ".$a.$b.$c.$d.$e.$f; 

// find match and insert into tbl_cron_master_new and `tbl_cron_partner_match`

//echo "select 
//		tbldatingusermaster.userid 
//	 $fromque order by userid ".$orderby." "; exit;
	$toemail1 = getonefielddata("SELECT email from tbldatingusermaster WHERE userid='".$touserid."' ");
$userid_arr='';		
	$result = getdata("select 
		tbldatingusermaster.userid 
	 $fromque order by userid ".$orderby." ");
	while($rw = mysqli_fetch_array($result))
	{	
	 	 $rowcount=mysqli_num_rows($result);
	
	 	if($rowcount<=6)
		{
		$userid=$rw[0];
		$userid_arr .=$userid.",";
		
			$sql_ins2="INSERT INTO `tbl_cron_partner_match`
			( `touserid`, `matchid`, `crondate`) 
			VALUES ('".$touserid."','".$userid."','".date("Y-m-d")."')";
			execute($sql_ins2);
		
		}
	}
	$userid_arr = substr($userid_arr,0,-1);
		$sql_ins="INSERT INTO tbl_cron_master_new(`userid`, `message`, `createdate`,`type`,`templateid`,`email`)
		 VALUES ('".$touserid."','".$userid_arr.".matched userid',curdate(),'3','9','".$toemail1."')";
		execute($sql_ins);

			$sql_upd3="UPDATE tbldatingpartnerprofilemaster SET partner_match_send='".date("Y-m-d")."' where 
			userid='".$touserid."' "; 
			 execute($sql_upd3);
}






// fetch data and send email


$sql1=getdata("SELECT distinct(`touserid`) FROM `tbl_cron_partner_match` WHERE currentstatus=0  ");
while($rw1 = mysqli_fetch_array($sql1))
	{
		$touserid=$rw1[0];
		



$sql=getdata("SELECT matchid,name,genderid,educationid,ocupationid,heightid,weightid,religianid,age,imagenm ,profile_code
			FROM tbl_cron_partner_match
			join tbldatingusermaster on
			tbl_cron_partner_match.matchid=tbldatingusermaster.userid
			WHERE tbl_cron_partner_match.currentstatus=0 and tbl_cron_partner_match.touserid='".$rw1[0]."'
			and tbldatingusermaster.currentstatus=0 order by tbldatingusermaster.userid desc ");
while($rw = mysqli_fetch_array($sql))
	{
		
	
		$name=$rw[1];
		$genderid=$rw[2];
		$educationid=$rw[3];
		$ocupationid=$rw[4];
		$heightid=$rw[5];
		$weightid=$rw[6];
		$religianid=$rw[7];
		$age=$rw[8];
		$imagenm=$rw[9];
		$profile_code=$rw[10];
		
		if($genderid==1)
		{$gender= "Male";}
		if($genderid==2)
		{$gender= "Female";}

		$height=getonefielddata("select title from tbldatingheightmaster where id='".$heightid."' ");
     $weight=getonefielddata("select title from tbldatingweightmaster where id='".$weightid."' ");
     $religian=getonefielddata("select title from tbldatingreligianmaster where id='".$religianid."' ");
   $education=getonefielddata("select title from tbl_education_master where id='".$educationid."' ");
   $ocupation=getonefielddata("select title from tbldatingoccupationmaster where id='".$ocupationid."' ");

		if($imagenm!='') 
		{ 
          $imgpath="<span><img src='../uploadfiles/".$imagenm."' style='width:150px;height:150px'></span>";
        }
		else
		{ 
           $imgpath='<img src="../uploadfiles/noimageprofile.gif" style="width:200px;height:200px">';
        } 
		
		
		

		
		$data .="<tr><td>
		".$imgpath."</td><td>"."PID:".$profile_code."<br>".$name."<br>".$gender."<br>".$height."<br>".$weight."<br>".$education."<br>".$ocupation."<br>".
		$religian.
		"</td></tr>";
		

	}
	
		
	
		$verify_msg= "
		<style>body{ font-size:15px; font-family:Arial, Helvetica, sans-serif;}
a{color:#c00023; text-decoration:none;}
.tittle{ font-size:18px; text-align:right; color:#c00023;}
.Head_MAin{ text-align:left;}
.mainFtlink{ font-size:18px; font-weight:normal; text-align:left;}
.TittleHead th{font-size:18px; text-align:center; color:#fff; background-color:#c00023; padding:10px 0;}
table td{ padding:10px;}
.BorderBlk{border-top:1px solid #888484; border-right:1px solid #888484;}
.BorderBlk td{ border-left:1px solid #888484; border-bottom:1px solid #888484;}
h3{ text-align:center; margin:0; padding:5px 0;}</style>
		<table border='1' class='BorderBlk' cellpadding='10' cellspacing='0'  style='width:600px; margin:0 auto;'>
		<tr class='TittleHead' ><th colspan='2'>Partner Matching List</th></tr>
		 <tr>
		 <td width='33.3%'><strong>Images</strong></td>
         <td width='33.3%'><strong>Details</strong></td>
         </tr>  
         ".$data."</table><hr><hr>";
		 
		 
		 
		 $subject = getonefielddata("SELECT subject from tbldatingemailmaster WHERE emailid=9");
		$message = getonefielddata("SELECT message from tbldatingemailmaster WHERE emailid=9");
		
		 $toname = getonefielddata("SELECT name from tbldatingusermaster WHERE userid='".$touserid."' ");
		$toemail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid='".$touserid."' ");
		 
		 	$subject = str_replace("[sitename]",$sitename,$subject);
			$message = str_replace("[name]",$toname,$message);
			$message = str_replace("[extramsg]",$verify_msg,$message);
			$message = str_replace("[sitename]",$sitename,$message);
		//	echo $message; 
				//$message = str_replace("[extramessage]",$verify_msg,$message);
			sendemaildirect($toemail,$subject,$message);		
			
			// delete data , after send email
				$sql_del="DELETE FROM `tbl_cron_partner_match` WHERE touserid=".$touserid." "; 
			 execute($sql_del);
		
	}





?>

<h1>Email Sent Successfully</h1>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>
