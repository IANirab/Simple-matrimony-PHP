<?
//error_reporting("E_ALL");
header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 24 * 3;
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);

require_once("conf.php");
require_once($abspath."/assets/$sitethemefolder/design_config.php");
function filetertext($text)
{
	return strip_tags($text);
}
function activecurrentstatus()
{
  return "0,1";
}
function getip(){
	$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($HTTP_ENV_VARS['REMOTE_ADDR']) ) ? $HTTP_ENV_VARS['REMOTE_ADDR'] : getenv('REMOTE_ADDR') );
	return $client_ip;
}
	
function findexpdate()
{
$expiredate =getonefielddata("SELECT date_add(curdate(),interval days day) FROM tbldatingpackagemaster t where packageid=1");
return $expiredate;
}
function connectDB()
{
	global $dbhostname,$dbusername,$dbpassword,$databasename;
	$conn = mysqli_connect($dbhostname,$dbusername,$dbpassword,$databasename);
	//$link = mysql_select_db($databasename,$conn);
	
	if (!$conn)
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	die("Could not connect to the database");
	}
	else
	{
	return $conn;
	}
}	

function getdata($sSql)
{
	$mysqli = connectDB();
	$result =mysqli_query($mysqli,$sSql);
	mysqli_close($mysqli);
	if (!$result)
		trigger_error("Could Not perform the specified query $sSql ");
		//trigger_error("Could Not perform the specified query : E_USER_ERROR ");
	else
		return $result;
}
function execute($sSQL)
{
	$mysqli = connectDB();
	$result = mysqli_query($mysqli,$sSQL);
	mysqli_close($mysqli);
	if (!$result)
		trigger_error("Could Not perform the specified query : $sSQL ");
//		trigger_error("Could Not perform the specified query : E_USER_ERROR ");
	
}
function freeingresult($result)
{
	mysqli_free_result($result);
	
}
function getonefielddata($sSql)
{
	$ans ="";
	if ($sSql != "")
	{
	$result = getdata($sSql);
	if (!$result)
		trigger_error("Could Not perform the specified query $sSql ");
		
	while ($row = mysqli_fetch_array($result))
	{
		if (!is_null($row[0]))
			$ans = $row[0];
	}
	freeingresult($result);
//	mysql_close($mysqli);
	}
	return $ans;
}

function findtaxvalue($fldnm,$id)
{
	return getonefielddata("select $fldnm from tbldatingtaxmaster where id='$id' and currentstatus=0 ");
	
}


function findsettingvalue($fldnm)
{
	$val='';
	$val=getonefielddata("select fldval from tbldatingsettingmaster where fldnm='$fldnm'");
	$val = str_replace("&#39;","'",$val);	
	return $val;
	
}
function sendtogeneratequery($action,$fldnm,$fldval,$needquote,$chkbadwords='Y')
{
	if ($fldval != "")
	{		
		$bad_word = findsettingvalue("bad_words");
		if ($bad_word != "" && $chkbadwords=='Y')
		{
			$bad_word_array = explode(",",$bad_word);
			$fldval_array = explode(" ",$fldval);
			str_replace($bad_word_array, "***", $fldval_array);
			$fldval=implode(" ",$fldval_array);
		}
		//echo $fldval; exit;
	}	
	if ($action==0)
		$que = sendtogenerateinsertque($fldval,$needquote);
	else
		$que = sendtogenerateupdateque($fldnm,$fldval,$needquote);
	return $que;
}	
function sendtogenerateinsertque($fldval,$needquote)
{
	if (!$fldval == "")
		if ($needquote == "Y")
			//$ans = ",'" . eregi_replace("'","''",$fldval) . "'";
			$ans = ",'" . str_replace("'"," ",$fldval) . "'";
		else
			$ans = "," . $fldval;
	else
			$ans = ",NULL";
	return $ans;
}
function sendtogenerateupdateque($fldnm,$fldval,$needquote)
{
	if (!$fldval == "")
		if ($needquote =="Y")
			//return ",$fldnm ='" . eregi_replace ( "'","''",$fldval) ."'";
			return ",$fldnm ='" . str_replace ( "'","&rsquo;",$fldval) ."'";
		else
			return ",$fldnm=". $fldval;
	else
			return  ",$fldnm = NULL";
}
function findcurrentdate()
{
	return gmdate("Y-m-d");
}
function sendemail($id,$userid,$extramessage,$email="")
{
	
	$username = "";
	$password = "";
	$name = "";	
	$lastlogin ='';
	$result = getdata("select subject,message from tbldatingemailmaster where emailid=$id");
	while ($row = mysqli_fetch_array($result))
	{
		$subject = $row[0];
		$message = $row[1];
	}
	freeingresult($result);
	if ($userid != "")
	{		
	$result = getdata("select email,password,email,name,lastlogin from tbldatingusermaster where userid=$userid");
	while ($row = mysqli_fetch_array($result))
	{
		$username = $row[0];
		$password = $row[1];
		$email = $row[2];
		$name = $row[3];
		$lastlogin = $row[4];
	}
	
	freeingresult($result);
	}
	global $sitepath;
	//newly added on 17th Mar start
	$loginpath = $sitepath."login.php";;
	$sitepath = $sitepath."index.php";	
	$sitelogin = $loginpath;
	//newly added on 17th Mar end
	$message = str_replace("[name]",$name,$message);
	$message = str_replace("[username]",$username,$message);
	$message = str_replace("[password]",$password,$message);
	$message = str_replace("[email]",$email,$message);
	$message = str_replace("[sitename]",$sitepath,$message);
	$message = str_replace("[lastlogin]",$lastlogin,$message);
	//newly added on 17th Mar
	$message = str_replace("[loginurl]",$sitelogin,$message);
	
	$subject = str_replace("[name]",$name,$subject);
	$subject = str_replace("[username]",$username,$subject);
	$subject = str_replace("[password]",$password,$subject);
	$subject = str_replace("[email]",$email,$subject);
	$subject = str_replace("[sitename]",$sitepath,$subject);
	
	if ($extramessage != "" && $id==1)
	{
		//echo $message .= "<br>" . $extramessage;	
		$message = str_replace("[extramessage]",$extramessage,$message);	
	} 
	else 
	{
		$message .= "<br>" . $extramessage;	
	}	
	
	
	sendemaildirect($email,$subject,$message);
}
function sendemaildirect($toemailaddress,$subject,$message,$fromadminemail ="")
{
		$smtp_module = findsettingvalue("smtp_enable");
		$fromadminemail = findsettingvalue("AdminMail");
		$fromadminname = findsettingvalue("adminname");
		$Email_Message_Design = findsettingvalue("Email_Message_Design");
		if ($Email_Message_Design != "")
		$message = str_replace("[email_message]",$message,$Email_Message_Design);
		
		if($smtp_module=='N')
		{
			$header = "MIME-Version: 1.0";
			$header .= "Content-Type: text/html";
			$header .= "Content-Transfer-Encoding: 7bit";
			$header = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
			$header .= "From: <".$fromadminemail.">"."\r\n";
			
		
			
			
			@mail($toemailaddress,$subject,$message,$header);
		}elseif($smtp_module=='Y')
		{
			$smtp_host = findsettingvalue("smtp_host");
			$smtp_password = findsettingvalue("smtp_password");
			$smtp_userid = findsettingvalue("smtp_userid");
			$smtp_ssl = findsettingvalue("smtp_ssl");
			require_once("class.phpmailer.php");
			
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $smtp_host;
			
			$mail->SMTPAuth = true;
			if($smtp_ssl=='Y'){$mail->SMTPSecure = "ssl";}
			$mail->Port = 587;
			$mail->Username = $smtp_userid;
			$mail->Password = $smtp_password;
			
			$mail->From = $fromadminemail;
			$mail->FromName = $fromadminname;
			$mail->AddAddress($toemailaddress); // to email address 
			//$mail->AddCC('admin@mobywebsite.com','neww'); // cc mail 
			//$mail->AddReplyTo("mail@mail.com");
			
			$mail->IsHTML(true);
			
			$mail->Subject = $subject;
			$mail->Body = $message;

			//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
			$mail->Send();
		}
		
		
}

function checkerror()
{ 
global $session_name_initital;
if (isset($_SESSION[$session_name_initital . "error"]))
{
	if (!$_SESSION[$session_name_initital . "error"] =="")
		echo($_SESSION[$session_name_initital . "error"]);
	$_SESSION[$session_name_initital . "error"] = "";
	
}
}
/* function checkerroradmin()
{ 
	if (!$_SESSION["adminerror"] =="")
		echo($_SESSION["adminerror"]);
	$_SESSION["adminerror"] = "";
}*/

function getusername()
{
global $session_name_initital;
 if (isset($_SESSION[$session_name_initital . "membername"]))
 	return $_SESSION[$session_name_initital . "membername"];
	else
	return "";

	// if (isset($_SESSION["memberusername"]))
 	//return $_SESSION["memberusername"];
	//else
	//return "";
}
function getuserid()
{
global $session_name_initital;
	 if (isset($_SESSION[$session_name_initital . "memberuserid"]))
	 	return $_SESSION[$session_name_initital . "memberuserid"];
	else
	return 0;
}
function findacutalfilenm()
{
	$filenm = strrev($_SERVER['SCRIPT_NAME']);
	if (strpos($filenm,"/") >0 )
	$filenm = substr($filenm,0,strpos($filenm,"/"));
	else
	$filenm = substr($filenm,0,strpos($filenm,"\\"));
	$filenm = strtolower(strrev($filenm));
	return $filenm;
}
function getfielnm()
{
	$filenm = findacutalfilenm();
	$b ="";
	if (isset($_GET["b"]))
	$b= "*b=". $_GET["b"];
	if (isset($_GET["uid"]))
	$b= "*uid=". $_GET["uid"];
	return $filenm .$b;
}	

function fillnumdata($startidx,$endidx,$dispstr,$selectval,$month_display="N")
{
  if ($dispstr !="")
  { ?>
	<option value="0.0"><?php echo($dispstr) ?></option>
  <?php }  
 
  for($i=$startidx;$i<=$endidx;$i++)
  {
		if ($i == $selectval)
			$s ="selected";
		else
			$s ="";
		if ($month_display == "Y")
		{
			 $timestamp = mktime(0, 0, 0, $i, 1, 2005);
  			 $disp_val = date("F", $timestamp);
		}
		else
			$disp_val = $i;
		?>
		<option value="<?php echo($i) ?>" <?php echo($s) ?>><?php echo($disp_val) ?></option>
		<?php
  }
}

function fillcombo($sSql,$selectval,$dispstr)
{
  if ($dispstr !="")
  { ?>
	<option value="0.0"><?php echo($dispstr) ?></option>
  <?php }  
 
  $result = getdata($sSql);
  while($rs = mysqli_fetch_array($result))
	{
		if ($rs[0] == $selectval)
			$s ="selected";
		else
			$s ="";
		?>
		<option value="<?php echo($rs[0]) ?>" <?php echo($s) ?>><?php echo($rs[1]) ?></option>
		<?php
	}
	freeingresult($result);
}
function checkloginmember($username,$password,$filenm)
{
  
}

function sendemailwithattachment($filenm,$path,$emailmessage ,$emailsubject,$toemailaddress)
{
$FromEmail = 
$boundry = 'sitename'.time();
	$emailmessage = "This is a multi-part message in MIME format.\n\n"."--{$boundry}\n"."Content-Type: text/html; charset=\"iso-8859-9\" \r\n " ."Content-Transfer-Encoding: 7-bit \r\n". $emailmessage ."\r\n";

	if(file_exists("$path".$filenm) && !is_dir("$path".$filenm))
	{
	$fr = fopen("$path".$filenm,"r");  
	$buffer = fread($fr,filesize("$path".$filenm));
	fclose($fr);
	$data = chunk_split(base64_encode($buffer));
	$emailmessage .= "--{$boundry}\n" .
				"Content-Type: application/octet-stream;\n" .
				" name=\"{$filenm}\"\r\n" .
				"Content-Disposition: attachment;\n" .
				" filename=\"{$filenm}\"\r\n" .
				"Content-Transfer-Encoding: base64\n\n" .
				$data . "\n\n" 	;
	}
	$fromadminemail = findsettingvalue("adminemailaddress");
	$emailmessage .="--{$boundry}--\n";
	$header = "MIME-Version: 1.0\n";
	$header .="Content-Type: multipart/mixed; boundary=\"{$boundry}\" \r\n";
	$header .="From: $fromadminemail \r\n";
	mail($toemailaddress,$emailsubject,$emailmessage,"$header","From : $fromadminemail\r\n");
}

function getuploadpath()
{
	return "uploadfiles";
}
function limitcharsremovehtml($strtolimit,$limit,$endconcat)
{
	$strtolimit = str_replace(array(chr(13),chr(10)),'',$strtolimit);
	$strtolimit = preg_replace('|<.*?>|',"",$strtolimit);  
	if(strlen($strtolimit)> $limit) 
    {
		 $str1 = strrev(substr($strtolimit,0,$limit));
		 $str = strstr($str1," ");
		 $str = strrev($str);
		 $str .= $endconcat;
	}
	else
	{
	 	$str = $strtolimit;  
	 	$str .= $endconcat;
	}
	return $str;
}

function setpaging($Pgnm,$RowNum,$FileNm,$nexttext,$backtext,$searchengine="N"){
	
	global $totalrecordperpageuserside;
	$totreordperpage = $totalrecordperpageuserside;
	$total_search_records = $RowNum;
    $curr_page = $Pgnm;
	if ($Pgnm == 1 )
	{	
		$NoOfRecord = "Limit ". $totreordperpage;
		$BackStr ="";
	}
	else
	{
		$BackPg = $Pgnm - 1;
		//$BackStr = "<a class = 'nextback' href ='$FileNm" . "pgnm=$BackPg'>« $backtext</a>";
		$BackStr = setnexbacklink($searchengine,$backtext,$BackPg,$FileNm) . "</a>&nbsp;";
		$NoOfRecord = (intval($Pgnm)  * intval($totreordperpage)) - intval($totreordperpage);
        if ($NoOfRecord <= 0)
            $NoOfRecord = 1;
		$NoOfRecord = "Limit ". $NoOfRecord. "," . $totreordperpage;
	}
	$RowNum = ceil(intval($RowNum)/intval($totreordperpage));
	if (intval($Pgnm) < intval($RowNum))
	{
		$nextPg =$Pgnm + 1;
		$NextStr = setnexbacklink($searchengine,$nexttext,$nextPg,$FileNm) . "</a>";
	}
	else
		$NextStr ="";
	$page_nos_str = "";

	$page_nos_str = generate_paging_with_pagenos($FileNm,$RowNum,$totreordperpage,$Pgnm,$searchengine,$total_search_records);

	/* for($i = 1;$i<= $RowNum ;$i++)
	{
		if ($page_nos_str != "")
			$page_nos_str .= " &nbsp;&nbsp; ";
        if ($i == $curr_page)
           $clsnm = "class='search_grid_currpage'";
        else
           $clsnm = "class='search_grid_otherpage'";

		$page_nos_str .= setnexbacklink($searchengine,$i,$i,$FileNm,$clsnm);
	} */
	$ret['NoOfRecord'] = $NoOfRecord;
	$ret['BackStr'] = $BackStr;
	$ret['NextStr'] = $NextStr;
	$ret['PageStr'] = $page_nos_str;
	return $ret;
}
function generate_paging_with_pagenos($filenm,$total_pages,$per_page,$curr_page,$searchengine,$total_search_records)
{ 
   //
   global $paging_page_no_First,$paging_page_no_page_of_txt,$paging_page_no_page_records_txt,$paging_page_no_page_Last,$paging_page_no_page_txt;
   $page_nos_str ="";

    $thispage = $filenm ;
    $num = $total_search_records; // number of items in list
    $per_page = $per_page; // Number of items to show per page
    $showeachside = 10; //  Number of items to show either side of selected page
	$start= $curr_page;
    
	if(empty($start))$start=0;  // Current start position
    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

if ($curr_page >1)
{ 
	$link = setnexbacklink($searchengine,"&laquo; $paging_page_no_First",1,$thispage,"");
	$page_nos_str .="$link";
}





if($start < $total_pages && $curr_page>1)$page_nos_str .="..";

if ($start >= $total_pages)
{
	$start=1;
}
$end_idx =($start-1) + $showeachside;
if($end_idx >=$total_pages)
{
	$end_idx =$total_pages;
}

for($y=$start;$y<=$end_idx;$y+=1)
{
    $class=($y==$start)?"search_grid_currpage":"search_grid_otherpage";
		$link = setnexbacklink($searchengine,$y,$y,$thispage,$class);
	 $page_nos_str .="&nbsp;$link&nbsp;";
}$eitherside = ($showeachside * $per_page);
if ($num >0)

	//$page_nos_str .="&nbsp;&nbsp;&nbsp; $paging_page_no_page_txt $curr_page $paging_page_no_page_of_txt $max_pages pages &nbsp; ( $num $paging_page_no_page_records_txt) &nbsp;&nbsp;&nbsp;";
	$page_nos_str .="&nbsp; $paging_page_no_page_txt $curr_page $paging_page_no_page_of_txt $max_pages pages &nbsp; &nbsp;";

if ($curr_page < $total_pages)
{
	$link = setnexbacklink($searchengine,"$paging_page_no_page_Last &raquo;",$total_pages,$thispage,"");
	$page_nos_str .="$link";
}


if(($start+$eitherside)<$num)$page_nos_str .=" .. ";
return $page_nos_str;
//
}
function setnexbacklink($searchengine,$linknm,$pgno,$filenm,$clsnm='')
{
	
	if ($searchengine == "Y")
	return "<a $clsnm href ='$filenm" . "/$pgno'><span>$linknm</span></a>";
	else
	//return "<a $clsnm href ='$filenm" . "pgnm=$pgno'><span>$linknm</span></a>";
	$chk_filenm = strstr($filenm,"adminsearchdetail");
	if($chk_filenm!=""){
		return "<a $clsnm href ='$filenm" . "&pgnm=$pgno'><span>$linknm</span></a>";
	} else {
		//return "<a $clsnm href ='$filenm" . ".php?pgnm=$pgno'><span>$linknm</span></a>";
		return "<a $clsnm href ='$filenm" . "pgnm=$pgno'><span>$linknm</span></a>";
	}
}

function setpagingmydesk($Pgnm,$RowNum,$FileNm,$nexttext,$backtext,$searchengine="N"){
	global $totalrecordperpageuserside;
	$totreordperpage = $totalrecordperpageuserside;
	$total_search_records = $RowNum;
    $curr_page = $Pgnm;
	if ($Pgnm == 1 )
	{	
		$NoOfRecord = "Limit ". $totreordperpage;
		$BackStr ="";
	}
	else
	{
		$BackPg = $Pgnm - 1;
		//$BackStr = "<a class = 'nextback' href ='$FileNm" . "pgnm=$BackPg'>« $backtext</a>";
		$BackStr = setnexbacklinkmydesk($searchengine,$backtext,$BackPg,$FileNm) . "</a>&nbsp;";
		$NoOfRecord = (intval($Pgnm)  * intval($totreordperpage)) - intval($totreordperpage);
        if ($NoOfRecord <= 0)
            $NoOfRecord = 1;
		$NoOfRecord = "Limit ". $NoOfRecord. "," . $totreordperpage;
	}
	$RowNum = ceil(intval($RowNum)/intval($totreordperpage));
	if (intval($Pgnm) < intval($RowNum))
	{
		$nextPg =$Pgnm + 1;
		$NextStr = setnexbacklinkmydesk($searchengine,$nexttext,$nextPg,$FileNm) . "</a>";
	}
	else
		$NextStr ="";
	$page_nos_str = "";

	$page_nos_str = generate_paging_with_pagenosmydesk($FileNm,$RowNum,$totreordperpage,$Pgnm,$searchengine,$total_search_records);

	/* for($i = 1;$i<= $RowNum ;$i++)
	{
		if ($page_nos_str != "")
			$page_nos_str .= " &nbsp;&nbsp; ";
        if ($i == $curr_page)
           $clsnm = "class='search_grid_currpage'";
        else
           $clsnm = "class='search_grid_otherpage'";

		$page_nos_str .= setnexbacklink($searchengine,$i,$i,$FileNm,$clsnm);
	} */
	$ret['NoOfRecord'] = $NoOfRecord;
	$ret['BackStr'] = $BackStr;
	$ret['NextStr'] = $NextStr;
	$ret['PageStr'] = $page_nos_str;
	return $ret;
}
function generate_paging_with_pagenosmydesk($filenm,$total_pages,$per_page,$curr_page,$searchengine,$total_search_records)
{
   //
   global $paging_page_no_First,$paging_page_no_page_of_txt,$paging_page_no_page_records_txt,$paging_page_no_page_Last,$paging_page_no_page_txt;
   $page_nos_str ="";

    $thispage = $filenm ;
    $num = $total_search_records; // number of items in list
    $per_page = $per_page; // Number of items to show per page
    $showeachside = 10; //  Number of items to show either side of selected page
	$start= $curr_page;
    
	if(empty($start))$start=0;  // Current start position
    $max_pages = ceil($num / $per_page); // Number of pages
    $cur = ceil($start / $per_page)+1; // Current page number

if ($curr_page >1)
{
	$link = setnexbacklinkmydesk($searchengine,"&laquo; $paging_page_no_First",1,$thispage,"");
	$page_nos_str .="$link";
}





if($start < $total_pages && $curr_page>1)$page_nos_str .="..";

if ($start >= $total_pages)
{
	$start=1;
}
$end_idx =($start-1) + $showeachside;
if($end_idx >=$total_pages)
{
	$end_idx =$total_pages;
}

for($y=$start;$y<=$end_idx;$y+=1)
{
    $class=($y==$start)?"search_grid_currpage":"search_grid_otherpage";
	$link = setnexbacklinkmydesk($searchengine,$y,$y,$thispage,$class);
	$page_nos_str .="&nbsp;$link&nbsp;";
}$eitherside = ($showeachside * $per_page);
if ($num >0)

	//$page_nos_str .="&nbsp;&nbsp;&nbsp; $paging_page_no_page_txt $curr_page $paging_page_no_page_of_txt $max_pages pages &nbsp; ( $num $paging_page_no_page_records_txt) &nbsp;&nbsp;&nbsp;";
	$page_nos_str .="&nbsp; $paging_page_no_page_txt $curr_page $paging_page_no_page_of_txt of $max_pages pages &nbsp; &nbsp;";

if ($curr_page < $total_pages)
{
	$link = setnexbacklinkmydesk($searchengine,"$paging_page_no_page_Last &raquo;",$total_pages,$thispage,"");
	$page_nos_str .="$link";
}


if(($start+$eitherside)<$num)$page_nos_str .=" .. ";
return $page_nos_str;
//
}
function setnexbacklinkmydesk($searchengine,$linknm,$pgno,$filenm,$clsnm="")
{
	if ($searchengine == "Y")
	return "<li><a $clsnm href ='$filenm" . "/$pgno'>$linknm</a></li>";
	else
	//return "<a $clsnm href ='$filenm" . "pgnm=$pgno'><span>$linknm</span></a>";
	$chk_filenm = strstr($filenm,"adminsearchdetail");
	if($chk_filenm!=""){
		return "<li><a $clsnm href ='$filenm" . "&pgnm=$pgno'>$linknm</a></li>";
	} else {
		//return "<a $clsnm href ='$filenm" . ".php?pgnm=$pgno'><span>$linknm</span></a>";
		return "<li><a $clsnm href ='$filenm" . "pgnm=$pgno'>$linknm</a></li>";
	}
}



function changedateformatfordisplay($mydate)
{
	list($yy,$dd,$mm)=explode("-",$mydate);
    if (is_numeric($yy) && is_numeric($mm) && is_numeric($dd))
    return "$mm/$dd/$yy";
}
function changedateformatfordatabase($mydate)
{
	list($mm,$dd,$yy)=explode("/",$mydate);
    if (is_numeric($yy) && is_numeric($mm) && is_numeric($dd))
    return "$yy-$mm-$dd";

}
function findstatusofrecord($CurrentStatus)
{
	if ($CurrentStatus == 0)
		return "Active";
	else
		return "Deactive";
}
function findids($querystringnm)
{
	if ((isset($_GET[$querystringnm])) )
		$tempid= $_GET[$querystringnm];
	else
		$tempid = 0; 
	$pos = strpos($tempid,"/");
	$pgnm = "";
    if ($pos > 0)
	{	
		//echo $tempid."asdf";	
		//$id = substr($tempid,0,strlen($pos));
		//$pgnm = substr($tempid,-strlen($pos));
		$tempid_arr = explode("/",$tempid);
		$id = $tempid_arr[0];
		$pgnm = $tempid_arr[1];
	}	
	else {		
		$id = $tempid;
	}
	if ($pgnm == "")
		$pgnm = 1;
	$ret['pgno'] = $pgnm;
	$ret['id'] = $id;
	
	return $ret;
}
function getsimpleid($val)
{
  if ((isset($_GET[$val])) )
		{
		  $id= $_GET[$val];
		$len =strlen(strstr($id,'/'));
		if ($len > 0)
		$id = substr($id,0,-$len);
		}
	else
		$id = 0;  
	return $id;
}
function findidsthree($querystringnm)
{
	if ((isset($_GET[$querystringnm])) )
		$tempid= $_GET[$querystringnm];
	else
		$tempid = 0; 
	$pos = strpos($tempid,"/");

	$middleid = "";
	$pgnm = "";
    if ($pos > 0)
	{
		$id = substr($tempid,0,strlen($pos));
		$nexttempid = substr($tempid,strlen($pos)+1);

		
		$pos = strpos($nexttempid ,"/");
		if ($pos > 0)
		{
			$middleid = substr($nexttempid,0,strlen($pos));
			$pgnm = substr($nexttempid,-strlen($pos));
		}
	}	
	else
		$id = $tempid;
		
		
	if ($pgnm == "")
		$pgnm = 1;
	$ret['pgno'] = $pgnm;
	$ret['id'] = $id;
	$ret['middleid'] = $middleid;
	
	return $ret;
}
function isValidURL($url) 
{ 
 return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url); 
}  
function makeurlsearchengine($str)
{
	$find =array("/ /","/'/","/\"/","/&/"); 
	return preg_replace($find,"_",$str);
}
function find_querystr_array_id($idnm)
{
if (isset($_GET[$idnm]))
	{
		$idname = $_GET[$idnm];
		$arridname = explode("_",$idname);
		return $arridname[0];
	}	
	return 0;
}
/* */

/* */
function checkerroradmin()
{ 

global $session_name_initital;
	if (!isset($_SESSION[$session_name_initital . "adminerror"]) =="")
		echo ('<div class="errorbox">');
		//echo ("<span class=errorbox1><div id=timedText>");
		echo($_SESSION[$session_name_initital . "adminerror"]);
		echo ('</div>');
		//echo ("</div></span>");
	$_SESSION[$session_name_initital . "adminerror"] = "";
}

function checkerroradmin1()
{ 
global $session_name_initital;
	if (!$_SESSION[$session_name_initital . "adminerror1"] =="")
		echo ('<div class="errorbox">');
		//echo ("<span class=errorbox1><div id=timedText>");
		echo($_SESSION[$session_name_initital . "adminerror1"]); 
		echo ('</div>');
		//echo ("</div></span>");
	$_SESSION[$session_name_initital . "adminerror1"] = "";
}


function checkerrorlogin(){ 
global $session_name_initital;
	if (!$_SESSION[$session_name_initital . "adminerror"] =="")
		echo ('<span class="errorbox">');
		//echo ("<span class=errorbox1><div id=timedText>");
		echo($_SESSION[$session_name_initital . "adminerror"]);
		echo ('</span>');
		//echo ("</div></span>");
	$_SESSION[$session_name_initital . "adminerror"] = "";
}

function checkdeskerrorlogin(){ 
global $session_name_initital;
	if (!$_SESSION[$session_name_initital . "deskerror"] =="")
		echo ('<span class="errorbox" style="display:block;">');
		//echo ("<span class=errorbox1><div id=timedText>");
		echo($_SESSION[$session_name_initital . "deskerror"]);
		echo ('</span>');
		//echo ("</div></span>");
	$_SESSION[$session_name_initital . "deskerror"] = "";
}


function find_table_name()
{
if (isset($_GET["tab"]))
$table_name = $_GET["tab"];
if ($table_name == "")
	$table_name = "tbldatingprofilecreatedbymaster";

	return $table_name;
}
function find_house_keeping_title_field_of_table($tablenm,$id_val)
{
	if ($id_val != "")
	return getonefielddata("select title from $tablenm where id=$id_val");
}


function Validiate_image($imagename)
{
	   
	    // 2 Mb Size = 2 * 1024 * 1024
		// 5 Mb Size = 5 * 1024 * 1024
	    $maxsize =2 * 1024 ;
	    $imagetype = $_FILES[$imagename]['type'];
	    $imagesize = $_FILES[$imagename]['size']; 
		
	 
		
			if($imagesize < $maxsize)
			{	
				 return  "Document size should be less than 2 MB";
			}
			
			if($imagetype=='image/png' ||  $imagetype=='image/jpeg' || $imagetype=='image/jpg' || $imagetype=='image/gif' )
			{	
				return "Y";
			}
			else
			{
				 return  "Please upload Image in png, jpeg, jpg or gif format";
			}
		
	  

}


function Validiate_image_badge($imagename)
{	
	     $imagetype = $_FILES[$imagename]['type'];
		
			if($imagetype=='image/png' ||  $imagetype=='image/jpeg' || $imagetype=='image/jpg' || $imagetype=='image/gif' || $imagetype=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $imagetype=='application/pdf' || $imagetype=='text/plain'	)
			{	
				return "Y";
			}
			else
			{
				 return  "<div class='errorbox'><span>Please upload Image in png, jpeg, jpg,gif,pdf,txt or docx format</span></div>";
			}
}

function activity_log($uid,$type,$type1)
{  
	if($type1==1)
	{
		$sql="INSERT INTO `tbl_activity_log`(`userid`, `sessionid`, `sdate`, `stime`, `type`,`note`,`createby`, `createip`, `createdate`,`modifyby`,`modifyip`,`modifydate`,`mdate`,`mtime`)
		 VALUES ('".$uid."','".session_id()."','".date('Y-m-d')."','".date('H:i:s')."','".$type."',
	'".$_SERVER['HTTP_USER_AGENT']."','".$uid."','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."',
	'".$uid."','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','".date('Y-m-d')."','".date('H:i:s')."')";
	}
	if($type1==2)
	{
		$get_last_loginid='';
		$sql1="select id from tbl_activity_log where userid='".$uid."' and type='".$type."' order by id desc
		limit 1 ";
		$get_last_loginid=getonefielddata($sql1);
		
		$sql="UPDATE `tbl_activity_log` set sessionid='".session_id()."',modifyby='".$uid."',
		modifyip='".$_SERVER['REMOTE_ADDR']."',modifydate='".date('Y-m-d')."',mdate='".date('Y-m-d')."',
		mtime='".date('H:i:s')."'
		where id='".$get_last_loginid."' ";
		
	}
	execute($sql);
	
}

function find_lastlogin($userid)
{ 	
	global $messenger_txt2,$displayprofilelastlogin,$messenger_txt2,$messenger_txt3,$messenger_txt4,$searchgridonline;

	$active_day=$messenger_txt2;
	$lastlogin = getonefielddata("SELECT lastlogin from tbldatingusermaster
	where userid=".$userid." ");
	 
	 $lastlogin=date_create($lastlogin);
	 $lastlogin=date_format($lastlogin,"Y-m-d");
	 $currdate=date('Y-m-d');
	 
	$date1=date_create($lastlogin);
	$date2=date_create($currdate);
	 
	$diff=date_diff($date1,$date2);
	
		$dayactive=$diff->format("%a");
	// check user is online in 24 h 
	if($dayactive==0)
	{
		
		$lastlogin_type = getonefielddata("SELECT type from tbl_activity_log where userid=".$userid." 
		 order by id desc limit 1 ");
		 
		 // if user logout , find last login time
		if($lastlogin_type==2)
		{
				$lastlogintime = getonefielddata("SELECT mtime from tbl_activity_log where userid=".$userid." 
				and type=2 order by id desc limit 1 "); 
		
				$date1=date_create($lastlogintime);
				$currtime=date("H:i:s");
				$date2=date_create($currtime);
				
				$diff=date_diff($date1,$date2);
				$login_time_hour=$diff->format("%h");
				$login_time_min=$diff->format("%i");
				if($login_time_hour==0)
				{
					$active_day=''.$displayprofilelastlogin.' : '.$login_time_min." ".$messenger_txt4." ";
				}else
				{
					$active_day=''.$displayprofilelastlogin.' : '.$login_time_hour." h ".$login_time_min."
					".$messenger_txt4." ";
				}
		}
		elseif($lastlogin_type==1)
		{
			// if user login & not logout find its last login time
			 $lastlogintime = getonefielddata("SELECT mtime from tbl_activity_log where userid=".$userid." 
				and type=1 order by id desc limit 1 "); 
				$date1=date_create($lastlogintime);
				$currtime=date("H:i:s");
				$date2=date_create($currtime);
				
				$diff=date_diff($date1,$date2);
				$login_time_hour=$diff->format("%h");
				$login_time_min=$diff->format("%i");
				
				if($login_time_min<=5)
				{
					$active_day=''.$searchgridonline.'';
				}else
				{
					if($login_time_hour==0)
					{
						$active_day=''.$displayprofilelastlogin.' : '.$login_time_min." ".$messenger_txt4." ";
					}else
					{
						$active_day=''.$displayprofilelastlogin.' : '.$login_time_hour." h ".$login_time_min."
						".$messenger_txt4." ";
					}
				}
				
			
		}

	}elseif($dayactive==1)
	{
		$active_day=''.$displayprofilelastlogin.' : '.$dayactive.' '.$messenger_txt3.' ';
	}
	else
	{
		$active_day=''.$displayprofilelastlogin.' : '.$dayactive.' '.$messenger_txt3.'';
	}
	return $active_day;

}



function getplanetname($planetid,$type,$userid)
{  
  	
		$planetname = '';
		$platname_qry = getdata("select planetname from tbldatingusergrahmaster where planethome ='".$planetid."' and userid='".$userid."' and type='".$type."'");
		$nmrows = mysqli_num_rows($platname_qry);
		$i=1;
		while($planet_rs = mysqli_fetch_array($platname_qry)){
			if($i==$nmrows){
				$planetname .= $planet_rs[0];
			} else {
				$planetname .= $planet_rs[0].", ";	
			}	
			
			$i++;
		}
	
	   return $planetname;
}

function get_popup_id($url)
{
	$found_cms=strpos($url,"/cms/");	

	if($found_cms>1)
	{
		$page_name='cmsdisplay';		
	}
	else
	{ 
		$url_arr=explode("/",$url);
		$arr_val=count($url_arr)-1;
		$page_name_arr=$url_arr[$arr_val];
		$page_name_arr=explode(".",$page_name_arr);
		$page_name=$page_name_arr[0];
	}	

	$chk_page_id=0;
	
	$chk_page_id = getonefielddata("SELECT id from tbl_popup_tag_master
	where type in (4) and title='".$page_name."' and currentstatus=0 
	order by id desc limit 1 ");
	
	if($chk_page_id>0)
	{
		$chk_pop_id = getonefielddata("SELECT id from tbl_homepage_images
		where page_type in (".$chk_page_id.") and currentstatus=0 order by RAND() limit 1 ");
		return $chk_pop_id;
	}
	
	
}

function get_popup_info($id)
{
			$get_homepageimg = getdata("SELECT title,link,description,title1,bg_colour,colour,en_exit 
			from tbl_homepage_images 
			WHERE currentstatus=0 AND id='".$id."' ");
			$get_rs = mysqli_fetch_array($get_homepageimg);
	        $image=$get_rs[0];
			$link = $get_rs[1];
		    $description = $get_rs[2];
			$title = $get_rs[3];
			$bg_colour = $get_rs[4];
			$colour = $get_rs[5];
			$en_exit = $get_rs[6];
			return array($image, $link, $description,$title,$bg_colour,$colour,$en_exit);
		
}

function get_popup_property($popid,$type)
{
	$title='';
	$id='';
	
	if($type==2)
	{
		$id = getonefielddata("SELECT trigger_name from tbl_homepage_images 
		WHERE currentstatus=0 AND id='".$popid."' ");
	}
	if($type==1)
	{
		$id = getonefielddata("SELECT transition from tbl_homepage_images 
		WHERE currentstatus=0 AND id='".$popid."' ");
	}
	if($type==3)
	{
		 $id = getonefielddata("SELECT content_type from tbl_homepage_images 
		WHERE currentstatus=0 AND id='".$popid."' ");
	}
		$title = getonefielddata("SELECT title from tbl_popup_tag_master
		where type in (".$type.") and id='".$id."' and currentstatus=0 ");
		return $title;
		
}


function user_package_info($userid,$package_type)
{
	if($package_type==1 || $package_type==2)
	{
		$sql = getdata("SELECT packageid,expiredate,express_count,ecard_count 
		from tbldatingusermaster WHERE  userid='".$userid."' ");
		$rs = mysqli_fetch_array($sql);
        $packageid=$rs[0];
		$expiredate = $rs[1];
	    $express_count = $rs[2];
		$ecard_count = $rs[3];
		
		$currdate=date('Y-m-d'); 
		$date1=date_create($expiredate);
		$date2=date_create($currdate);
		$diff=date_diff($date1,$date2);
		//$day_left=$diff->format("%a"); //Commented by@A
		$day_left=$diff->format('%R%a days');//new code 
		$intervalDataStore=$day_left;
		
if($intervalDataStore >= 0){
	$day_left_message = "<i >expired</i>";
	//$day_left_message;
	}else{
$day_left_message=str_replace('-','', $intervalDataStore);
$day_left_message." to expire";
};
		
		$pack_name=getonefielddata("select Description from tbldatingpackagemaster 
		where PackageId='".$packageid."'");
		
		return array($pack_name,$expiredate,$day_left_message,$express_count,$ecard_count);
	}
	if($package_type==8)
	{
		$sql = getdata("SELECT custom_pkg_id,custom_exp_date
		from tbldatingusermaster WHERE  userid='".$userid."' ");
		$rs = mysqli_fetch_array($sql);
        $custom_pkg_id=$rs[0];
		$custom_exp_date = $rs[1];
		
		$currdate=date('Y-m-d'); 
		$date1=date_create($custom_exp_date);
		$date2=date_create($currdate);
		$diff=date_diff($date1,$date2);
		$day_left=$diff->format("%a");
		
		$pack_name=getonefielddata("select Description from tbldatingpackagemaster 
		where PackageId='".$custom_pkg_id."'");
		
		
		$day_left=$diff->format('%R%a days');//new code 
		$intervalDataStore=$day_left;
		
if($intervalDataStore >= 0){
	$day_left_message = "<i >expired</i>";
	//$day_left_message;
	}else{
$day_left_message=str_replace('-','', $intervalDataStore);
$day_left_message." to expire";
};


		
		
		
		
		
		return array($pack_name,$custom_exp_date,$day_left_message);
	}
	elseif($package_type==4)
	{
		$sql = getdata("SELECT packageid,expiredate 
		from tbldatingusertrustsealmaster WHERE  userid='".$userid."' ");
		$rs = mysqli_fetch_array($sql);
        $packageid=$rs[0];
		$expiredate = $rs[1];

		$currdate=date('Y-m-d'); 
		$date1=date_create($expiredate);
		$date2=date_create($currdate);
		$diff=date_diff($date1,$date2);
		$day_left=$diff->format("%a");
		
		$pack_name=getonefielddata("select Description from tbldatingpackagemaster 
		where PackageId='".$packageid."'");
		
		$day_left=$diff->format('%R%a days');//new code 
		$intervalDataStore=$day_left;
		
if($intervalDataStore >= 0){
	$day_left_message = "<i >expired</i>";
	//$day_left_message;
	}else{
$day_left_message=str_replace('-','', $intervalDataStore);
$day_left_message." to expire";
};
		
		
		
		
		
		return array($pack_name,$expiredate,$day_left_message);
	}
	
	elseif($package_type==3)
	{
		$enh_packnm_arr=array();
		$enh_packexp_arr=array();
		$enh_packleft_arr=array();
		
		$sql = getdata("SELECT packageid,expiredate
		from tbldatingfeaturedusermaster WHERE  userid='".$userid."' ");
		while($rs = mysqli_fetch_array($sql))
		{
			$packageid=$rs[0];
			$expiredate = $rs[1];
			$pack_name=getonefielddata("select Description from tbldatingpackagemaster 
			where PackageId='".$packageid."'");
			
			$currdate=date('Y-m-d'); 
			$date1=date_create($expiredate);
			$date2=date_create($currdate);
			$diff=date_diff($date1,$date2);
			$day_left=$diff->format("%a");
			
			
			$day_left=$diff->format('%R%a days');//new code 
		$intervalDataStore=$day_left;
		
if($intervalDataStore >= 0){
	$day_left_message = "<i >expired</i>";
	//$day_left_message;
	}else{
$day_left_message=str_replace('-','', $intervalDataStore);
$day_left_message." to expire";
};


			
			
			array_push($enh_packnm_arr,$pack_name);
			array_push($enh_packexp_arr,$expiredate);
			array_push($enh_packleft_arr,$day_left_message);
		}
		return array($enh_packnm_arr,$enh_packexp_arr,$enh_packleft_arr);
	}
	
	
}

function get_form_data($data,$type)
{
	// $type=1 for null
	// $type=2 for 0.0
	if(isset($data) && $data!='' && $type==1)
	{
		return $data;
	}
	elseif(isset($data) && $data!=0.0 && $type==2)
	{ 
		return $data;
	}
	else
	{
		$data='';
		return $data;
	}
	
}

?>