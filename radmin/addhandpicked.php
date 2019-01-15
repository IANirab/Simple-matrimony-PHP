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


<style type="text/css">
input[type="submit"] {
    width: 160px;
    height: 30px;
    border: none;
    background: #ff1493;
    color: white;
}
input[type="submit"]:hover {
    width: 160px;
    height: 30px;
    border: none;
    background: #3f51b5;
    color: white;
}
</style>

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
			<h1 class="pagetitle" > <i class="fas fa-american-sign-language-interpreting"></i> Handpick List
		<!-- CENTER END ######################## -->
	</div>	
	
	
	
	
				<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Userid</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?
      if(isset($_POST['remove'])){
          $idff = $_POST['delete'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        $sql = "delete from tbl_handpick where userid='$id' AND profileid='$idff'";
        $result = $db->query($sql);
          
      }
      ?>
<? 
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        $sql = "select * from tbl_handpick where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            
            
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id1=$data->profileid;
        $sql1 = "select * from tbldatingusermaster where userid='$id1' order by userid desc";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
            
            
        ?>   
    <tr>
      <td><a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data1->userid; ?>"><? echo $data1->name; ?></a></td>
      <td><? echo $data1->userid; ?></td>
      <td>
          <form action="" method="post">
          <input type="hidden" name="delete" value="<? echo $data1->userid; ?>"> 
          <input type="submit" name="remove" value="remove">
          </form>
      </td>
    </tr>
<? } } ?>
    <tr>
        <td></td>
        <td>
            
            <?
            if(isset($_POST['sendmails'])){

  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host='mail.paroshi.com';
  $mail->Port=465;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='info@paroshi.com';
  $mail->Password='nirabAB00$$';


        
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        $sql5 = "select * from tbldatingusermaster where userid='$id'";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){  
            $mail5 = $data5->email;
            
  $mail->setFrom('info@paroshi.com','Paroshi Hand Picked');
  $mail->addAddress($mail5);
  $mail->addReplyTo('info@paroshi.com');

}


  $mail->isHTML(true);
  $mail->Subject='Hand Picked Matches By Paroshi';
  
  
        
        
$html_string = ' 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title></title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        
        .ReadMsgBody {
            width: 100%;
        }
        
        .ExternalClass {
            width: 100%;
        }
        
        .ExternalClass * {
            line-height: 100%;
        }
        
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        
        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }
            @viewport {
                width: 320px;
            }
        }
    </style>
    <!--<![endif]-->
    <!--[if mso]><xml>  <o:OfficeDocumentSettings>    <o:AllowPNG/>    <o:PixelsPerInch>96</o:PixelsPerInch>  </o:OfficeDocumentSettings></xml><![endif]-->
    <!--[if lte mso 11]><style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style><![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
        @import url(https://fonts.googleapis.com/css?family=Cabin);
    </style>
    <!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100%!important;
            }
            .mj-column-per-50 {
                width: 50%!important;
            }
        }
    </style>
</head>

<body style="background: #FFFFFF;">
    <div class="mj-container" style="background-color:#FFFFFF;">
        <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 10px 10px 10px;" align="center">
                                                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width:63px;"><img alt="" title="" height="auto" src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5bba450211024/1538934093.jpg" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" width="63"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
        <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:4px 20px 4px 20px;" align="center">
                                                                <div style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                                                    <p><strong>Hand Picked Matched By Paroshi</strong></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
        <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->


';



        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        $sql = "select * from tbl_handpick where userid='$id'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){


        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id1=$data->profileid;
        $sql1 = "select * from tbldatingusermaster where userid='$id1' order by userid desc";
        $result1 = $db1->query($sql1);
        while($data1 = $result1->fetch_object()){
            
        $curruserid2 = $data1->ocupationid;
        $db3 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql3 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result3 = $db3->query($sql3);
        
        while($data3 = $result3->fetch_object()){
     if($data3->title != NULL){
         $title = $data3->title;
     } else {
         $title ="";
     }
   
  
        }
   
   
   if($data1->company_name != NULL){
      $company = "At ".$data1->company;
   }else{
       $company = "";
   }
   
if($data1->address != NULL) {
     $address = "From ".$data1->address;
} else {
    $address = "";
}


if($data1->imagenm == NULL){
$img = "https://cdn.wccftech.com/images/default_avatar.png";
} else {
    $img = "https://paroshi.com/uploadfiles/".$data1->imagenm;
} 


            
    $html_string .= '

        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:300px;">      <![endif]-->
                                            <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;" align="center">
                                                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width:300px;"><img alt="" title="" height="auto" src="'.$img.'" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;margin:15px 0px;" width="300"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td><td style="vertical-align:top;width:300px;">      <![endif]-->
                                            <div class="mj-column-per-50 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:24px 31px 24px 31px;" align="left">
                                                                <div style="cursor:auto;color:#000000;font-family:Cabin, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                                <a style="text-decoration: none;" href="https://www.paroshi.com/displayprofile.php?b='.$data1->userid.'">
                                <h2 style="color: #F05D22; line-height: 100%;text-decoration: none;">
                                           '.$data1->name.'</h2></a>
                                        <p>'.$title.' '.$company.'<br>
                                        '.$address.'<br><br><a style="    background: #ff1492;
    padding: 9px;
    margin: 20px 0px;
    color: white !important;
    text-decoration: none;
    border-radius: 3px;" href="https://www.paroshi.com/displayprofile.php?b='.$data1->userid.'">Connect</a>
                                        </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    
    ';
  
  
}
}

// this will add the closing tags and now html_string has your built email
$html_string .= '
 <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:38px;padding-bottom:38px;padding-right:29px;padding-left:29px;">
                                                                <p style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;"></p>
                                                                <!--[if mso | IE]><table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;" width="600"><tr><td style="height:0;line-height:0;"> </td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;" align="center">
                                                                <div>
                                                                    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="undefined"><tr><td>      <![endif]-->
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://www.facebook.com/PROFILE"><img alt="facebook" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/facebook.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://www.facebook.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td><td>      <![endif]-->
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://www.twitter.com/PROFILE"><img alt="twitter" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/twitter.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://www.twitter.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td><td>      <![endif]-->
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://plus.google.com/PROFILE"><img alt="google" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/google-plus.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://plus.google.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:20px;padding-bottom:10px;padding-right:22px;padding-left:25px;">
                                                                <p style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;"></p>
                                                                <!--[if mso | IE]><table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;" width="600"><tr><td style="height:0;line-height:0;"> </td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
        <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;">
                                            <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="left">
                                                                <div style="cursor:auto;color:#949494;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                                                                    <p><span style="font-size:12px;">Copyright &#xA9; 2018 . Paroshi.com , All rights reserved.&#xA0;</span></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
    </div>
</body>
</html
';
 
        
        
        

        
  $mail->Body= $html_string ;

  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }
  echo $result1;

}
?>
            
            <form action="" method="post">
            <input type="submit" name="sendmails" value="Send By Mails">
            </form>
        </td>
        <td></td>
    </tr>
  </tbody>
</table>
	
	
	<!-- User Start ######################## -->
	
	<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
<h1 class="pagetitle" > <i class="fas fa-american-sign-language-interpreting"></i> All User List
	</div>
	
	
	
	
	
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Userid</th>
      <th scope="col">Action</th>
    </tr>
  </thead>



<tbody>
    
    <?
      if(isset($_POST['add'])){
          $idff = $_POST['add1'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        
        $sql = "INSERT INTO tbl_handpick (userid, profileid)
VALUES ('$id', '$idff')";
        $result = $db->query($sql);
          
      }
      ?>
      

        <? 
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbldatingusermaster order by userid desc";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){   

      
        ?>   
    <tr>
      <td><a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data1->userid; ?>"><? echo $data1->name; ?></a></td>
      <td><? echo $data1->userid; ?></td>
      <td>
          <form action="" method="post">
          <input type="hidden" name="add1" value="<? echo $data1->userid; ?>"> 
          <input type="submit" name="add" value="ADD">
          </form>
      </td>
    </tr>
    
    
    
    
<? } ?>
    
  </tbody>






</table>
	
	
	
	
	
	
	
	
	
	
	
	
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