<?
if($_GET['id']){
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host='mail.paroshi.com';
  $mail->Port=465;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='pronirab@paroshi.com';
  $mail->Password='nirabAB00$$';



  $mail->setFrom('pronirab@paroshi.com','from paroshi');
  $mail->addAddress('kingb5861@gmail.com');
  $mail->addReplyTo('pronirab@paroshi.com');


  $mail->isHTML(true);
  $mail->Subject='Form Submission';
  $mail->Body= '
  
  
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
  
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

    /* outlook/office365 add buttons outside not-linked images and safari have 2px margin */
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
          
          <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 258px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="258" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #f3f3f3; font-size: 18px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 258px; height: auto;" src="https://mosaico.io/srv/f-8p7eyk9/img?method=placeholder&amp;params=258%2C150"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        
        </tbody></table></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
      
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_sideArticleBlock_4">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" bgcolor="#ffffff" width="570" class="vb-row" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
        --><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="184"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 184px; -mru-width: 0px; min-width: calc(33.333333333333336%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="184" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 166px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="166" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 166px; height: auto;" src="https://mosaico.io/srv/f-8p7eyk9/img?method=placeholder&amp;params=166%2C130"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="368"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 368px; -mru-width: 0px; min-width: calc(66.66666666666667%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="368" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr>
      <td width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: left;"><span style="font-weight: normal;">Title</span></td>
    </tr>
            <tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-bottom: 0px; margin-top: 0px;">Far far away, behind the word mountains, far from the countries <a href="" style="color: #3f3f3f; color: #3f3f3f; text-decoration: underline;">Vokalia and Consonantia</a>, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p></td></tr>
            <tr>
      <td valign="top" align="left"><table role="presentation" cellpadding="6" border="0" align="left" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 6px 6px 6px 6px; padding-top: 4px;"><tbody><tr>
        <td width="auto" valign="middle" align="left" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 6px; padding-left: 18px; padding-right: 18px; background-color: #bfbfbf; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="">BUTTON</a></td>
      </tr></tbody></table></td>
    </tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--
        --><!--
      --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_sideArticleBlock_7">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" bgcolor="#ffffff" width="570" class="vb-row" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
        --><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="184"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 184px; -mru-width: 0px; min-width: calc(33.333333333333336%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="184" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 166px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="166" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 166px; height: auto;" src="https://mosaico.io/srv/f-8p7eyk9/img?method=placeholder&amp;params=166%2C130"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="368"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 368px; -mru-width: 0px; min-width: calc(66.66666666666667%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="368" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr>
      <td width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: left;"><span style="font-weight: normal;">Title</span></td>
    </tr>
            <tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-bottom: 0px; margin-top: 0px;">Far far away, behind the word mountains, far from the countries <a href="" style="color: #3f3f3f; color: #3f3f3f; text-decoration: underline;">Vokalia and Consonantia</a>, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p></td></tr>
            <tr>
      <td valign="top" align="left"><table role="presentation" cellpadding="6" border="0" align="left" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 6px 6px 6px 6px; padding-top: 4px;"><tbody><tr>
        <td width="auto" valign="middle" align="left" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 6px; padding-left: 18px; padding-right: 18px; background-color: #bfbfbf; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="">BUTTON</a></td>
      </tr></tbody></table></td>
    </tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--
        --><!--
      --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table><table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_sideArticleBlock_6">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
      <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="9" bgcolor="#ffffff" width="570" class="vb-row" style="border-collapse: separate; width: 100%; background-color: #ffffff; mso-cellspacing: 9px; border-spacing: 9px; max-width: 570px; -mru-width: 0px;">
        
        <tbody><tr>
      <td align="center" valign="top" style="font-size: 0;"><div style="width: 100%; max-width: 552px; -mru-width: 0px;"><!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--
        --><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="184"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 184px; -mru-width: 0px; min-width: calc(33.333333333333336%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="184" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr><td width="100%" valign="top" align="center" class="links-color"><!--[if (lte ie 8)]><div style="display: inline-block; width: 166px; -mru-width: 0px;"><![endif]--><img alt="" border="0" hspace="0" align="center" vspace="0" width="166" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 166px; height: auto;" src="https://mosaico.io/srv/f-8p7eyk9/img?method=placeholder&amp;params=166%2C130"><!--[if (lte ie 8)]></div><![endif]--></td></tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="368"><![endif]--><!--
      --><div class="mobile-full" style="display: inline-block; vertical-align: top; width: 100%; max-width: 368px; -mru-width: 0px; min-width: calc(66.66666666666667%); max-width: calc(100%); width: calc(304704px - 55200%);"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" width="368" align="left" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px; -yandex-p: calc(2px - 3%);">
          
            <tbody><tr>
      <td width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 18px; font-family: Arial, Helvetica, sans-serif; text-align: left;"><span style="font-weight: normal;">Title</span></td>
    </tr>
            <tr><td class="long-text links-color" width="100%" valign="top" align="left" style="font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height: normal;"><p style="margin: 1em 0px; margin-bottom: 0px; margin-top: 0px;">Far far away, behind the word mountains, far from the countries <a href="" style="color: #3f3f3f; color: #3f3f3f; text-decoration: underline;">Vokalia and Consonantia</a>, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p></td></tr>
            <tr>
      <td valign="top" align="left"><table role="presentation" cellpadding="6" border="0" align="left" cellspacing="0" style="border-spacing: 0; mso-padding-alt: 6px 6px 6px 6px; padding-top: 4px;"><tbody><tr>
        <td width="auto" valign="middle" align="left" bgcolor="#bfbfbf" style="text-align: center; font-weight: normal; padding: 6px; padding-left: 18px; padding-right: 18px; background-color: #bfbfbf; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; border-radius: 4px;"><a style="text-decoration: none; font-weight: normal; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif;" target="_new" href="">BUTTON</a></td>
      </tr></tbody></table></td>
    </tr>
          
        </tbody></table><!--
      --></div><!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--
          --><!--
        --><!--
      --><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></div></td>
    </tr>
      
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
    </td></tr>
    </tbody></table>

  
    <!-- footerBlock -->
    <table role="presentation" class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#3f3f3f" style="background-color: #3f3f3f;" id="ko_footerBlock_2">
      <tbody><tr><td class="vb-outer" align="center" valign="top" style="padding-left: 9px; padding-right: 9px; font-size: 0;">
    <!--[if (gte mso 9)|(lte ie 8)]><table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]--><!--
      --><div style="margin: 0 auto; max-width: 570px; -mru-width: 0px;"><table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 0px; border-spacing: 0px; max-width: 570px; -mru-width: 0px;" width="570" class="vb-row">
        
      <tbody><tr>
      <td align="center" valign="top" style="font-size: 0; padding: 0 9px;"><div style="vertical-align: top; width: 100%; max-width: 552px; -mru-width: 0px;"><!--
        --><table role="presentation" class="vb-content" border="0" cellspacing="9" cellpadding="0" style="border-collapse: separate; width: 100%; mso-cellspacing: 9px; border-spacing: 9px;" width="552">
          
        <tbody><tr><td class="long-text links-color" width="100%" valign="top" align="center" style="font-weight: normal; color: #919191; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"></td></tr>
        <tr><td width="100%" valign="top" align="center" style="font-weight: normal; color: #ffffff; font-size: 13px; font-family: Arial, Helvetica, sans-serif; text-align: center;"><a href="[unsubscribe_link]" style="color: #ffffff; text-decoration: underline;" target="_new"></a></td></tr>
        <tr style="text-align: center;"><td width="100%" valign="top" align="center" class="links-color" style="text-align: center;"><!--[if (lte ie 8)]><div style="display: inline-block; width: 170px; -mru-width: 0px;"><![endif]--><a target="_new" href="https://mosaico.io/?footerbadge" style="color: #cccccc; color: #cccccc; text-decoration: underline;"><img alt="MOSAICO Responsive Email Designer" border="0" hspace="0" align="center" vspace="0" width="170" src="https://mosaico.io/img/mosaico-badge.gif" style="border: 0px; display: block; vertical-align: top; height: auto; margin: 0 auto; color: #3f3f3f; font-size: 13px; font-family: Arial, Helvetica, sans-serif; width: 100%; max-width: 170px;"></a><!--[if (lte ie 8)]></div><![endif]--></td></tr>
        </tbody></table></div></td>
    </tr>
    
      </tbody></table></div><!--
    --><!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
  </td></tr>
    </tbody></table>
    <!-- /footerBlock -->
    
</center></body></html>
  
  ';

  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }
  echo $result1;
  
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Payment :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style-(payment).css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>Paroshi Checkout Zone</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						<span>P</span>aroshi
						.<span>C</span>om
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			
			
			

			
			
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->



	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li>
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="dashboard.php">Dashboard</a>
								</li>
								<li>
									<a class="" href="contact.php">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="dashboard.php">Dashboard</a>
						<i>|</i>
					</li>
					<li>
						<a href="userpackagemanager.php">Membership Packages</a>
						<i>|</i>
					</li>
					<li>Payment</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Payment
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Cash on delivery (COD)</li>
						<li>Credit/Debit</li>
						<li>Net Banking</li>
						<li>Paypal Account</li>
					</ul>
					<div class="resp-tabs-container hor_1">

						<div>
							<div class="vertical_post check_box_agile">
								<h5>COD</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											<input type="checkbox" class="checkbox">
											<span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
										</label>
									</div>

								</div>
							</div>
						</div>
						<div>
							<form action="#" method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<div class="controls">
												<label class="control-label">Name on Card</label>
												<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
											</div>
											<div class="w3_agileits_card_number_grids">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">Card Number</label>
														<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
														    autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right">
													<div class="controls">
														<label class="control-label">CVV</label>
														<input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
													</div>
												</div>
												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">Expiration Date</label>
												<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
											</div>
										</div>
										<button class="submit">
											<span>Make a payment </span>
										</button>
									</div>
								</div>
							</form>

						</div>
						<div>
							<div class="vertical_post">
								<form action="#" method="post">
									<h5>Select From Popular Banks</h5>
									<div class="swit-radio">
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio" checked="">
													<i></i>Syndicate Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>Bank of Baroda</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>Canara Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>ICICI Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>State Bank Of India</label>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<h5>Or Select Other Bank</h5>
									<div class="section_room_pay">
										<select class="year">
											<option value="">=== Other Banks ===</option>
											<option value="ALB-NA">Allahabad Bank NetBanking</option>
											<option value="ADB-NA">Andhra Bank</option>
											<option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option>
											<option value="BBC-NA">Bank of Baroda Corporate NetBanking</option>
											<option value="BBR-NA">Bank of Baroda Retail NetBanking</option>
											<option value="BOI-NA">Bank of India NetBanking</option>
											<option value="BOM-NA">Bank of Maharashtra NetBanking</option>
											<option value="CSB-NA">Catholic Syrian Bank NetBanking</option>
											<option value="CBI-NA">Central Bank of India</option>
											<option value="CUB-NA">City Union Bank NetBanking</option>
											<option value="CRP-NA">Corporation Bank</option>
											<option value="DBK-NA">Deutsche Bank NetBanking</option>
											<option value="DCB-NA">Development Credit Bank</option>
											<option value="DC2-NA">Development Credit Bank - Corporate</option>
											<option value="DLB-NA">Dhanlaxmi Bank NetBanking</option>
											<option value="FBK-NA">Federal Bank NetBanking</option>
											<option value="IDS-NA">Indusind Bank NetBanking</option>
											<option value="IOB-NA">Indian Overseas Bank</option>
											<option value="ING-NA">ING Vysya Bank (now Kotak)</option>
											<option value="JKB-NA">Jammu and Kashmir NetBanking</option>
											<option value="JSB-NA">Janata Sahakari Bank Limited</option>
											<option value="KBL-NA">Karnataka Bank NetBanking</option>
											<option value="KVB-NA">Karur Vysya Bank NetBanking</option>
											<option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option>
											<option value="OBC-NA">Oriental Bank of Commerce NetBanking</option>
											<option value="CPN-NA">PNB Corporate NetBanking</option>
											<option value="PNB-NA">PNB NetBanking</option>
											<option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option>
											<option value="RBS-NA">RBS (The Royal Bank of Scotland)</option>
											<option value="SWB-NA">Saraswat Bank NetBanking</option>
											<option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option>
											<option value="SBH-NA">SB Hyderabad NetBanking</option>
											<option value="SBM-NA">SB Mysore NetBanking</option>
											<option value="SBT-NA">SB Travancore NetBanking</option>
											<option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option>
											<option value="SIB-NA">South Indian Bank NetBanking</option>
											<option value="SBP-NA">State Bank of Patiala NetBanking</option>
											<option value="SYD-NA">Syndicate Bank NetBanking</option>
											<option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option>
											<option value="UCO-NA">UCO Bank NetBanking</option>
											<option value="UBI-NA">Union Bank NetBanking</option>
											<option value="UNI-NA">United Bank of India NetBanking</option>
											<option value="VJB-NA">Vijaya Bank NetBanking</option>
										</select>
									</div>
									<input type="submit" value="PAY NOW">
								</form>
							</div>
						</div>
						<div>
							<div id="tab4" class="tab-grid" style="display: block;">
								<div class="row">
									<div class="col-md-6">
										<img class="pp-img" src="images/paypal.png" alt="Image Alternative text" title="Image Title">
										<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
										<a class="btn btn-primary">Checkout via Paypal</a>
									</div>
									<div class="col-md-6 number-paymk">
										<form class="cc-form">
											<div class="clearfix">
												<div class="form-group form-group-cc-number">
													<label>Card Number</label>
													<input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text">
													<span class="cc-card-icon"></span>
												</div>
												<div class="form-group form-group-cc-cvc">
													<label>CVV</label>
													<input class="form-control" placeholder="xxxx" type="text">
												</div>
											</div>
											<div class="clearfix">
												<div class="form-group form-group-cc-name">
													<label>Card Holder Name</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group form-group-cc-date">
													<label>Valid Thru</label>
													<input class="form-control" placeholder="mm/yy" type="text">
												</div>
											</div>
											<div class="checkbox checkbox-small">
												<label>
													<input class="i-check" type="checkbox" checked="">Add to My Cards</label>
											</div>
											<input type="submit" class="submit" value="Proceed Payment">
										</form>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
	<!-- //payment page -->

	<!-- newsletter -->

	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Track Your Order</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Free & Easy Returns</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Online cancellation </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Payment Method</h3>


				<!-- payment -->
				<div class="sub-some child-momu">
					<ul>
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay5.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay4.png" alt="">
						</li>
						<li>
							<img src="images/pay6.png" alt="">
						</li>
						<li>
							<img src="images/pay3.png" alt="">
						</li>
						<li>
							<img src="images/pay7.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						<li>
							<img src="images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->



					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Get in Touch</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 123 Sebastian, USA.</li>
							<li>
								<i class="fa fa-mobile"></i> 333 222 3333 </li>
							<li>
								<i class="fa fa-phone"></i> +222 11 4444 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:example@mail.com"> mail@example.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-2 footer-grids  w3l-socialmk">
					<h3>Follow Us on</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- easy-responsive-tabs -->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- //easy-responsive-tabs -->

	<!-- credit-card -->
	<script src="js/creditly.js"></script>
	<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

	<script>
		$(function () {
			var creditly = Creditly.initialize(
				'.creditly-wrapper .expiration-month-and-year',
				'.creditly-wrapper .credit-card-number',
				'.creditly-wrapper .security-code',
				'.creditly-wrapper .card-type');

			$(".creditly-card-form .submit").click(function (e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
					// Your validated credit card output
					console.log(output);
				}
			});
		});
	</script>
	<!-- //credit-card -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>