<?php
ob_start();
session_start();
require_once("commonfileadmin.php");
require_once("tcpdf/tcpdf_include1.php");
require_once("tcpdf/tcpdf.php");

$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$logo_image_nm = findsettingvalue("Logo_filenm");
$logo_sitename = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=6 AND fldnm='CompanyName'");
$sitelogo='<img src="../uploadfiles/site_'.$sitethemefolder.'/'.$logo_image_nm.'">';


if(isset($_GET['b'])){
	$b=$_GET['b'];
}



set_time_limit(1000);
$rand_file = time();


@chmod($rand_file.".html",777);



copy($sitepath."radmin/profile_data_print.php?b=".$b,"htmlpdf/".$rand_file.".html");	
//copy("http://90.0.0.8/work2015/DemoMatrimony/radmin/profile_data_print.php?b=".$b,"htmlpdf/".$rand_file.".html");	

$fcontent = file_get_contents("htmlpdf/".$rand_file.".html");

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);

define ('PDF_HEADER_LOGO_WIDTH1', '26');




$headerColour = array( 100, 100, 100 );

class MYPDF extends TCPDF {
    public function Header() {
        $headerData = $this->getHeaderData();
        $this->SetFont('helvetica', 'B', 10);
        $this->writeHTML($headerData['string']);
		//echo $headerData['string'];
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setHeaderData($ln='', $lw=0, $ht='', $sitelogo, $tc=array(0,0,0), $lc=array(0,0,0));

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


require_once(dirname(__FILE__).'/tcpdf/lang/eng.php');

$pdf->setLanguageArray($l);
// set font
$pdf->SetFont('helvetica', '', 10);
// add a page
$pdf->AddPage();
$pdf->writeHTML($fcontent, true, false, true, false, '');
ob_end_clean() ;
$pdf->Output('example_061.pdf', 'I');



?>
