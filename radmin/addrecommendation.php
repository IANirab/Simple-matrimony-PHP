<?
if($_GET['b']){
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host='mail.paroshi.com';
  $mail->Port=465;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='pronirab@paroshi.com';
  $mail->Password='nirabAB00$$';


    $curruserid = $_GET['b'];
    $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    $sql = "select * from tbldatingusermaster where userid='$curruserid'";
    $result = $db->query($sql);
        
    while($data = $result->fetch_object()){
        
    $email = $data->email;
    
  $mail->setFrom('pronirab@paroshi.com','paroshi Recommendation Matches');
  $mail->addAddress($email);
  $mail->addReplyTo($email);
}

  $mail->isHTML(true);
  $mail->Subject='Recommendation Matches :: Paroshi.com';
  
  
  $html_string ='

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title>MOSAICO Responsive Email Designer</title>
  
  <style type="text/css">
    body{ margin: 0; padding: 0; }
    img{ border: 0px; display: block; }

    .socialLinks{ font-size: 6px; }
    .socialLinks a{
      display: inline-block;
    }

    .long-text p{ margin: 1em 0px; }
    .long-text p:last-child{ margin-bottom: 0px; }
    .long-text p:first-child{ margin-top: 0px; }
  </style>
  <style type="text/css">
    /* yahoo, hotmail */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
    .yshortcuts a{ border-bottom: none !important; }
    .vb-outer{ min-width: 0 !important; }
    .RMsgBdy, .ExternalClass{
      width: 100%;
      background-color: #3f3f3f;
      background-color: #3f3f3f}

    [o365] button{ margin: 0 !important; }

    /* outlook */
    table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
    #outlook a{ padding: 0; }
    img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
    a img{ border: none; }

    @media screen and (max-width: 600px) {
      table.vb-container, table.vb-row{
        width: 95% !important;
      }

      .mobile-hide{ display: none !important; }
      .mobile-textcenter{ text-align: center !important; }

      .mobile-full{ 
        width: 100% !important;
        max-width: none !important;
      }
    }
    
  </style>
  <style type="text/css">
    
    #ko_sideArticleBlock_4 .links-color a, #ko_sideArticleBlock_4 .links-color a:link, #ko_sideArticleBlock_4 .links-color a:visited, #ko_sideArticleBlock_4 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_sideArticleBlock_7 .links-color a, #ko_sideArticleBlock_7 .links-color a:link, #ko_sideArticleBlock_7 .links-color a:visited, #ko_sideArticleBlock_7 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_sideArticleBlock_6 .links-color a, #ko_sideArticleBlock_6 .links-color a:link, #ko_sideArticleBlock_6 .links-color a:visited, #ko_sideArticleBlock_6 .links-color a:hover{
      color: #3f3f3f;
      color: #3f3f3f;
      text-decoration: underline
    }
    
    #ko_footerBlock_2 .links-color a, #ko_footerBlock_2 .links-color a:link, #ko_footerBlock_2 .links-color a:visited, #ko_footerBlock_2 .links-color a:hover{
      color: #cccccc;
      color: #cccccc;
      text-decoration: underline
    }
    </style>
  
</head>
<body bgcolor="#3f3f3f" text="#919191" alink="#cccccc" vlink="#cccccc" style="margin: 0; padding: 0; background-color: #3f3f3f; color: #919191;"><center>

  

  <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_logoBlock_3">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="vertical-align: top; width: 100%; max-width: 276px; -mru-width: 0px;"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="276" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;">
          
          <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 258px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="258" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #f3f3f3; font-size: 18px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 258px; height: auto;" src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        
        </tbody></table></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
      
    </td></tr>
    </tbody>
  </table>

';


        
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id = $_GET['b'];
        $sql1 = "select * from tbldatingusermaster where userid='$id'";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){
        
        
        
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster order by userid desc";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
        
    
$nnn = $data1->dob;
$birthday_timestamp = strtotime($nnn);  

$age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
  
  
$nnn1 = $data->dob;
$birthday_timestamp = strtotime($nnn1);  

$age1 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);


$gender = $data1->genderid;            
$gender1 = $data->genderid;            
    
$religion = $data1->religion_interest;            
$religion1 = $data->religianid;

if($age > $age1) {  
    if($gender != $gender1){ 
        if($religion == $religion1){

           
        $userid = $data->userid;
        $annual_income_id = $data->annual_income_id;
        $annual_income = " ";
        
        $db5 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql5 = "select * from tbldating_annual_income_master where id ='$annual_income_id' ";
        $result5 = $db5->query($sql5);
        
        while($data5 = $result5->fetch_object()){
        
        $annual_income = $data5->title;
        
        }
        
        
        
        $annual_income_currancyid = $data->annual_income_currancyid;
        $annual_income_currancy = " ";
        
        $db6 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql6 = "select * from tbldating_annual_income_currancy_master where id ='$annual_income_currancyid' ";
        $result6 = $db6->query($sql6);
        
        while($data6 = $result6->fetch_object()){
        
        $annual_income_currancy = $data6->title;
        
        }
        
        $annualincome = "Annual Income : ".$annual_income." ".$annual_income_currancy;
        
        
        $nnn1 = $data->dob;
        $birthday_timestamp = strtotime($nnn1);  

        $age2 = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);
        
        $age3 = "Age : ".$age2." Yrs";
        
        $dd = $data1->packageid;
        if($dd > 28){ 
       
        $name = $data->name;
         } else { 
        $myvalue = $data->name;
        $arr = explode(' ',trim($myvalue));
        
        $name = $arr[0];
        
        }
           
           
           
    $imgst = $data->imagenm;
    if($imgst == NULL){
        $img1 = "https://cdn.wccftech.com/images/default_avatar.png";
    }else{
        $img1 = "paroshi.com/uploadfiles/".$data->imagenm;
    }
    
    if($data->address !=NULL){
        $address = "From ".$data->address;
    } else {
        $address = " ";
    }
    
        
        $curruserid2 = $data->ocupationid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from  tbldatingoccupationmaster where id='$curruserid2'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){
    
         $occ = $data2->title;
         
        if($data->company_name != NULL){
        $company_name = "at ".$data->company_name; 
       } else {
           $company_name = " ";
       }


 } 


$html_string .= '

    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_sideArticleBlock_4">
      <tbody>
      <tr>
      <td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      
      <!--[if (gte mso 9)|(lte ie 8)]>
      
      <table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" bgcolor="#ffffff" width="570" class="vb-row" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
        --><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="184"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 184px; -mru-width: 0px; min-width: calc(33.333333333333336%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="184" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 166px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="166" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 166px; height: auto;" src="'.$img1.'"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
          
        </tbody>
        </table>
        </div>
      <div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 368px; -mru-width: 0px; min-width: calc(66.66666666666667%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="368" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr>
      <td width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: left;"><span style="font-weight: normal;">
      '.$name.'
      </span></td>
    </tr>
            <tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-bottom: 0px; margin-top: 0px;">
            
            '.$age3.'<br>
            '.$annualincome.'<br>
            '.$company.'<br>
            '.$address.'<br>
            
            </p></td></tr>
            <tr>
      <td valign="top" align="left"><table role="presentation" cellpadding="6" border="0" align="left" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 6px 6px 6px 6px; padding-top: 4px;"><tbody><tr>
        <td width="auto" valign="middle" align="left" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 6px; padding-left: 18px; padding-right: 18px; background-color: #bfbfbf; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="https://www.paroshi.com/displayprofile.php?b='.$userid.'">Read More</a></td>
      </tr></tbody></table></td>
    </tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--
        --><!--
      --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
      
      </tbody>
    </table>
      </div>
      <!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody>
  </table>
';

} } } } } 



   $html_string.='<!-- footerBlock -->
    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#3f3f3f" style="background-color: #3f3f3f;" id="ko_footerBlock_2">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 0px; border-spacing: 0px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
        
      <tbody><tr>
      <td align="center" valign="top" style="font-size: 0; padding: 0 9px;"><div style="vertical-align: top; width: 100%; max-width: 552px; -mru-width: 0px;"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;" width="552">
          
        <tbody><tr><td class="long-text links-color" width="100%" valign="top" align="center" style="font-weight: normal; color: #919191; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"></td></tr>
        <tr><td width="100%" valign="top" align="center" style="font-weight: normal; color: #ffffff; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"><a href="[unsubscribe_link]" style="color: #ffffff; text-decoration: underline;" target="_new"></a></td></tr>
        <tr style="text-align: center;"><td width="100%" valign="top" align="center" class="links-color" style="text-align: center;"><!--[if (lte ie 8)]><div style="display: inline-block; width: 170px; -mru-width: 0px;"><![endif]--><a target="_new" href="https://mosaico.io/?footerbadge" style="color: #cccccc; color: #cccccc; text-decoration: underline;"><img alt="MOSAICO Responsive Email Designer" border="0" hspace="0" align="center" vspace="0" width="170" src="https://www.paroshi.com/uploadfiles/site_default5/sitelogo.png" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 170px;"></a><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        </tbody></table></div></td>
    </tr>
    
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
  </td></tr>
    </tbody></table>
    <!-- /footerBlock -->
    
</center></body></html>';

  
  
  $mail->Body= $html_string;

  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }
  echo $result1;
  
}
?>
