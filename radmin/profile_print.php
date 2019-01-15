<?php
ob_start();
session_start();
$touserid='';
if(isset($_GET['b'])){
	$b=$_GET['b'];
}

if(isset($_GET['c'])){
	$c=$_GET['c'];
}

if(isset($_GET['t']) && $_GET['t']!='')
{
	 $touserid=$_GET['t'];  
}

require_once("commonfileadmin.php");
require_once('tcpdf/tcpdf_include1.php');
require_once("tcpdf/tcpdf.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$logo_image_nm = findsettingvalue("Logo_filenm");
$logo_sitename = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=6 AND fldnm='CompanyName'");
$sitelogo='<img src="../uploadfiles/site_'.$sitethemefolder.'/'.$logo_image_nm.'">'; 

	$profile_code = find_profile_code($touserid);

$sSql = "INSERT INTO `tbldatingactivity_logmaster`(`empid`, `userid`, `description`, `work_date`,`CreateDate`, 		        `CreateBy`, `CreateIP`)values ('".$_SESSION[$session_name_initital.'adminlogin']."','".$touserid."',
		' email profile profile id -  for ".$profile_code."',curdate(),curdate(),
		'".$_SESSION[$session_name_initital.'adminlogin']."','".$_SERVER['REMOTE_ADDR']."')";
		execute($sSql);


set_time_limit(1000);
$rand_file = time();

@chmod($rand_file.".html",777);

copy($sitepath."radmin/profile_data_print.php?c=".$c."&b=".$b,"htmlpdf/".$rand_file.".html");	
$fcontent = file_get_contents("htmlpdf/".$rand_file.".html");




// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	
	//Page header
    public function Header() {

        // Logo
        $image_file = K_PATH_IMAGES.PDF_HEADER_LOGO;  
		$this->Image($image_file, 10, 10, 35, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 0, USER_NAME, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		
		//apply title colour
		/*$this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 0)));
		$this->SetFillColor(0,0,255);
		$this->SetTextColor(255,255,0);
		$this->MultiCell(0, 4, USER_NAME, 'TB', 'C', 1, 0);*/
		
		
		
		
		
		$this->writeHTMLCell($w='', $h='', $x='', $y='', $this->header, $border=0, $ln=0, $fill=0, $reseth=true, $align='L', $autopadding=true);
       $this->SetLineStyle( array( 'width' => 0.40, 'color' => array(153, 204, 0)));

       $this->Line(5, 5, $this->getPageWidth()-5, 5); 

       $this->Line($this->getPageWidth()-5, 5, $this->getPageWidth()-5,  $this->getPageHeight()-5);
       $this->Line(5, $this->getPageHeight()-5, $this->getPageWidth()-5, $this->getPageHeight()-5);
       $this->Line(5, 5, 5, $this->getPageHeight()-5);
		
		
    }

    // Page footer
    public function Footer() {
		
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle(USER_NAME);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}



 // define some HTML content with style
$fcontent .= <<<EOF
<!--- EXAMPLE OF CSS STYLE -->
<style>
th{font-size:14px;}
td{font-size:14px;}
.colorW {background-color: #fff;}
.colorWd {background-color: #f2f2f2;}
.colorG {background-color: #4caf50; font-size:12px;}
.colorR {background-color: #d8f1fb;}
.TextH {color: #888686; line-height: 25px; padding:10px; width: 100%;}
th{text-transform: capitalize;}
td{text-transform: capitalize;}
strong.scolor{color:#29a7da;}
</style>
EOF;
// ---------------------------------------------------------



// ---------------------------------------------------------

// set font
//$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->writeHTML($fcontent, true, false, true, false, '');
// ---------------------------------------------------------

//Close and output PDF document
ob_end_clean() ;
$pdf->Output(USER_NAME.'.pdf', 'I');




if($touserid!='' && isset($touserid))
{ 
$user_pdf = getonefielddata("SELECT name from tbldatingusermaster WHERE userid='".$b."' ");

$no=rand();
	$abspath = $_SERVER['DOCUMENT_ROOT']."radmin/pdf/";
$pdf->Output($abspath.$user_pdf.$no.'.pdf', 'F');
	
	$uname = getonefielddata("SELECT name from tbldatingusermaster WHERE userid='".$touserid."' ");
	$uemail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid='".$touserid."' ");

	$pdfname=$user_pdf.$no;

	$admin_mail = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE fldnm='AdminMail' ");
		////////////////////////email code start/////////////////////////////
		

		$result11 = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=37");
while($rs11= mysqli_fetch_array($result11))
{
		  	$subject=$rs11[0];
			$message1=$rs11[1];
			
			$subject1 = str_replace("[sitename]","rishteyparopkar",$subject);
			$message1 = str_replace("[sitename]","rishteyparopkar",$message1);			
			$message1 = str_replace("[name]",$uname,$message1);
			$message1 = str_replace("[extramessage]",$verify_msg,$message1);
		 
		
}
		
		
		
		
		
$name        = $uname;
$email       = $uemail;

$to          = "$name <$email>";
$from        = $admin_mail;
$subject     = $subject1;
 $mainMessage = $message1;
$fileatt     = $abspath.$pdfname.".pdf";
$fileatttype = "application/pdf";
$fileattname = $pdfname."pdf";
$headers = "From: $from";
// File
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);
// This attaches the file
$semi_rand     = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers      .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";

 $message = "This is a multi-part message in MIME format.\n\n" .

"--{$mime_boundary}\n" .

"Content-Type: text/html; charset=\"iso-8859-1\n" .

"Content-Transfer-Encoding: 7bit\n\n" .

$mainMessage . "\n\n"; 

$data = chunk_split(base64_encode($data));
$message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatttype};\n" .
" name=\"{$fileattname}\"\n" .
"Content-Disposition: attachment;\n" .
" filename=\"{$fileattname}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"-{$mime_boundary}-\n";

// Send the email

if(mail($to, $subject, $message, $headers)) {
    echo "The email was sent.";
}
else {
    echo "There was an error sending the mail.";
}
$t=time();
$filehtml= $_SERVER['DOCUMENT_ROOT']."radmin/htmlpdf/".$t.".html";

unlink($filehtml);	
unlink($fileatt);	
		
		////////////////////////email code end/////////////////////////////



}



//============================================================+
// END OF FILE
//============================================================+