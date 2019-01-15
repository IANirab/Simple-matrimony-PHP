<?
function fillage($sel)
{
	for($i=18;$i<=65;$i++)
	{
    	if($i == $sel)
	  		$s = 'selected';
		else
			$s='';
	  echo "<option value=$i $s>$i</option>"; //code commented by Nishit
	  //echo "<option value=$i >$i</option>"; // added by Nishit
	}
}
function filllookingfor($sel,$dispstr)
{
	global $sitelanguageid;
	fillcombo("select lookingforid,lookingfor from tbldatinglookingformaster where currentstatus=0 and languageid=$sitelanguageid",$sel,$dispstr);
}

function fillmobileage($sel,$text)
{
	echo "<option selected='selected'>".$text."</option>";
	for($i=18;$i<=65;$i++)
	{
    	if($i == $sel){
	  		$s = 'selected';
			$s = '';
		} else {
			$s='';
		}
	  echo "<option value=$i $s>$i</option>"; //code commented by Nishit
	  //echo "<option value=$i >$i</option>"; // added by Nishit
	}
}

function fillcountry($sel,$dispstr)
{
	global $sitelanguageid;
	fillcombo("select id , title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid order by countryname",$sel,$dispstr);
}
function find_user_name($uid)
{
	if ($uid != "")
	return getonefielddata("select email from tbldatingusermaster where  userid=$uid ");
}
function findnameuser($uid)
{
	return getonefielddata("select name from tbldatingusermaster where currentstatus=0 and userid=$uid ");
}
function finduservalidity($uid)
{
	$dbuid = getonefielddata("select userid from tbldatingusermaster where currentstatus=0 and userid=$uid ");
	if ($dbuid == "")
		$dbuid = 0;
	return $dbuid;
}
function setdisplayprofilelink($uid,$dispstr="")
{
	global $sitepath;
	if ($dispstr == "")
		$dispstr = findnameuser($uid);
	$userlink = displayprofilelink($uid);
	return "<a class='bluelink' href='$userlink'>". $dispstr ."</a>";
}

function updateprofile($query,$curruserid)
{
	$action = $curruserid;
	$ipfldnm = "ModifyIP";
	$fldby = 'ModifyBy';
	$flddate = 'ModifyDate';
	$ip = getip();
	
	$AutoApproval = findsettingvalue("AutoApprovalProfileUpdate");
	if ($AutoApproval == "Y")
		$currentstatus ="0.0";
	else
		$currentstatus = 1;

	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query .= sendtogeneratequery($action,"$fldby",$curruserid,"Y");
	$query .= sendtogeneratequery($action,"currentstatus",$currentstatus,"Y");
	$query = substr($query,1);

	  $sSql = "update tbldatingusermaster set " . $query .",$flddate=now() where userid=$curruserid";	  	
	execute($sSql);
}
function datinguserwhereque()
{
	//return " tbldatingusermaster.currentstatus =0 and to_days(tbldatingusermaster.expiredate)-to_days(curdate()) >= 0";
	return " tbldatingusermaster.currentstatus in (0,1) ";
}
function checkselfcontact($uid,$curruid)
{
	if ($uid == $curruid)
	{
		header("location:message.php?b=20");
		exit();
	}
}
/* function findgroupids($curruserid)
{
	$groupid =0;
	if ($curruserid != "")
		if ($curruserid != 0)
		{
	 		$result = getdata("select groupid from tbldatingusergroupdetail where CreateBy=$curruserid and currentstatus=0");
 			while($rs= mysqli_fetch_array($result))
 			{ 
				 $groupid .= "," . $rs[0];
 			}
			freeingresult($result);
 		}
return $groupid;
} */
function findagefld()
{
return " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) ";
}
function findage()
{
return  findagefld() . " as age "; 
}
function findgender($genderid)
{
if ($genderid != "")
	return getonefielddata("select gender from tbldatingendermaster where genderid=" . $genderid);
}
function findcountryid($countryid)
{
if ($countryid != "")
return getonefielddata("select title from tbldatingcountrymaster where id=" . $countryid);
}
/* function grouptitlefind($touserid,$curruserid)
{
	$grouptitle ="";
	$result = getdata("select title,tbldatingusergroupdetail.groupid from tbldatingusergroupdetail,tbldatingusergroupmaster where tbldatingusergroupmaster.groupid = tbldatingusergroupdetail.groupid and tbldatingusergroupdetail.CreateBy=$curruserid and tbldatingusergroupdetail.touserid=$touserid and tbldatingusergroupdetail.currentstatus=0");
 			while($rs= mysqli_fetch_array($result))
 			{ 
				 if ($grouptitle != "")
				 	$grouptitle .= ",";
				 $grouptitle .= $rs[0];
 			}
return $grouptitle;
} */
function displayprofilelinkmobile($uid)
 {
 	$nickname = getonefielddata("select nickname from tbldatingusermaster where userid=$uid");
	if ($nickname != "")
	{
		global $msitepath;
		$nickname =  replace_chars_from_link($nickname);		
		return $msitepath . "displayprofile/$uid". "_$nickname";		
	}
 }

function find_user_imagemobile($userid,$show_big_image_only="N",$numm,$cat){
global $sitepath,$user_uploaded_images_for_mobile,$curruserid,$msitepath;
$imagenm = "";
$result = getdata("select imagenm,thumbnil_image,image_password_protect from tbldatingusermaster where userid=$userid");
	
	while ($rs = mysqli_fetch_array($result))
	{
		if($rs[0]!="" && file_exists("../uploadfiles/".$rs[0])){
			$imagenm =$rs[0];
			$big_imagenm =$rs[0];		
		} else {
			$imagenm = "noimageprofile.gif";	
			$big_imagenm ="noimageprofile.gif";
		}
		if($rs[1]!="" && file_exists("../uploadfiles/".$rs[1])){
			$thumbnil_image=$rs[1];	
		} else {
			$thumbnil_image="noimageprofile.gif";	
		}		
		$imageonrequest=$rs[2];				
		if ($thumbnil_image != "")
			$imagenm = $thumbnil_image;
		$userlink = displayprofilelinkmobile($userid);
		
	
		$accepted=find_image_on_request_or_not($curruserid,$userid);
		if ($accepted == "N")
		{
		$imagenm = "image_on_request.gif";
		$big_imagenm ="image_on_request.gif";
		$thumbnil_image="image_on_request.gif";
		}
		
		
	}
	freeingresult($result);
if ($imagenm == ""){
	 $imagenm = "noimageprofile.gif";
	 $big_imagenm = $imagenm;
}
if ($show_big_image_only =="Y")
$imagenm=$big_imagenm;
/*************** NON FLASH START HERE **********************/

if ($user_uploaded_images_for_mobile == "") {
	
$big_imagenm = $sitepath . "uploadfiles/" . $big_imagenm;

$img_arr = @getimagesize($big_imagenm);
$img_w = $img_arr[0];
$img_h = $img_arr[1];
$default_width = findsettingvalue('img_width');
$default_height = findsettingvalue('img_height');
$req_width = "";
$req_height = "";
if($img_w>$default_width || $img_h>$default_height){
	$target = "250";	
	$size = imageResize($img_w,$img_h,$target);
	$size_arr = explode("*",$size);	
	$req_width = $size_arr[0];
	$req_height = $size_arr[1];
	$div_width = $req_width + 10;
} else {
	$req_width = $img_w;
	$req_height = $img_h;
	$div_width = $img_w + 10;
}
$imagenm = "<img src='". $sitepath . "uploadfiles/" . $thumbnil_image . "' height='90' width='67' border='0'>";

//$imagenm ="<a class='thumbnail' href='$userlink'>$imagenm</a>";
$imagenm = '<a class="thumbnail" href="'.$userlink.'" rel="external">'.$imagenm.'</a>';
}
else
$imagenm = "<a href='$userlink'><img src='". $user_uploaded_images_for_mobile . $imagenm . "' border=0></a>";


/*************** NON FLASH END HERE **********************/


return  $imagenm;
}

function findchatuserid($userid)
{
if ($userid != "")
return getonefielddata("select UserId from tblchatuserdetail where MainUserId=" . $userid);
}

function findfriendrelationship($touserid,$curruserid)
{
return getonefielddata("select relationtypetitle from tbldatingusergroupdetail,tbldatingfriendshiprelationmaster where tbldatingusergroupdetail.relationtypeid=tbldatingfriendshiprelationmaster.relationtypeid and tbldatingusergroupdetail.touserid=$touserid and CreateBy =$curruserid");
}

function checkweatherblacklist($touserid,$fromuserid)
{
	if (($touserid != "") && ($fromuserid != ""))
	{
	$blacklistid = getonefielddata("select black_list_id from tbl_user_blacklist_master where currentstatus in(0) and from_user_id=$fromuserid and to_userid =$touserid");
	if ($blacklistid != "")
	{
		header("location : message.php?b=29");
		exit();
	}
	}
}	
function checkuserexpireddeactive($curruserid)
{
return getonefielddata("select count(userid) from tbldatingusermaster where userid=$curruserid and packageid <> 1 and ". datinguserwhereque());
}

function finduserexpireddeactive($CreateBy)
{
$userid = checkuserexpireddeactive($CreateBy);
if ($userid ==0)
{
	header("location :message.php?b=33");
	exit();
}
}
function findverificationsealmember($userid)
{
global $sitepath;
global $siteimagepath;
//echo "select max(id) from tbldatingusertrustsealmaster where  tbldatingusertrustsealmaster.currentstatus=0 and tbldatingusertrustsealmaster.userid =$userid and to_days(tbldatingusertrustsealmaster.expiredate)-to_days(curdate()) >=0 ";
$id = getonefielddata("select max(id) from tbldatingusertrustsealmaster where  tbldatingusertrustsealmaster.currentstatus=0 and tbldatingusertrustsealmaster.userid =$userid and to_days(tbldatingusertrustsealmaster.expiredate)-to_days(curdate()) >=0 ");
if ($id != ""){
	//return "<a href='". $sitepath ."trustsealdisplay.php?b=$id&b1=$userid'><img src='". $siteimagepath . "images/sealbig.gif' border='0' alt=''></a>";
	return "<a href='". $sitepath ."trustsealdisplay.php?b=$id&b1=$userid'><img src='". $siteimagepath . "images/badge1.png' border='0' alt=''></a>";
} else {
	return "";
}
}
function findzodiacsign($birdd,$birmm)
{
    if ($birmm == 1 )
    if ($birdd >= 1 && $birdd <= 19 )
	    return "CAPRICORN";
	elseif ($birdd >= 20 && $birdd <= 31 )
        return "AQUARIUS";

    if ($birmm == 2 )
       if ($birdd  >= 1 && $birdd  <= 18 )
             return "AQUARIUS";
       elseif ($birdd  >=19 && $birdd  <= 29 )
         return "PISCES";



    if ($birmm ==3 )
       if ($birdd  >=1 && $birdd  <= 20 )
         return "PISCES";
       elseif ($birdd  >= 21 && $birdd  <= 31 )
         return "ARIES";
  
   if ($birmm ==4 )
      if ($birdd  >= 1  && $birdd  <= 19 )
         return "ARIES";
      elseif ($birdd  >= 20 && $birdd  <= 30 )
         return "TAURUS";
  
   if ($birmm ==5 )
      if ($birdd  >= 1 && $birdd  <= 20 )
         return "TAURUS";
     elseif ($birdd  >= 21 && $birdd  <= 31 )
         return "GEMINI";
  
   if ($birmm ==6 )
     if ($birdd  >= 1 && $birdd  <= 21 )
         return "GEMINI";
     elseif ($birdd  >= 22 && $birdd  <= 30 )
         return "CANCER";
  
   if ($birmm ==7 )
    if ($birdd  >= 1 && $birdd  <= 22 )
         return "CANCER";
     elseif ($birdd  >= 23 && $birdd  <= 31 )
         return "LEO";
  
   if ($birmm ==8 )
        if ($birdd  >= 1 && $birdd  <= 22 )
            return "LEO";
        elseif ($birdd  >= 23 && $birdd  <= 31 )
            return "VIRGO";
  
   if ($birmm ==9 )
     if ($birdd  >= 1 && $birdd  <= 22 )
         return "VIRGO";
     elseif ($birdd  >= 23 && $birdd  <= 30 )
         return "LIBRA";
  
   if ($birmm ==10 )
    if ($birdd  >= 1 && $birdd  <= 22 )
         return "LIBRA";
     elseif ($birdd  >= 23 && $birdd  <= 31 )
         return "SCORPIO";
  
   if ($birmm ==11 )
     if ($birdd  >= 1 && $birdd  <= 21 )
         return "SCORPIO";
     elseif ($birdd  >= 22 && $birdd  <= 30 )
         return "SAGITTARIUS";
  
   if ($birmm ==12 )
    if ($birdd  >= 1 && $birdd  <= 21 )
         return "SAGITTARIUS";
     elseif ($birdd  >= 22 && $birdd  >= 31 )
         return "CAPRICORN";
  
 }
 function replace_chars_from_link($title)
 {
 	$title = str_replace(" ","_",$title);
		$title = str_replace("&","_",$title);
		$title = str_replace("\\","_",$title);
		$title = str_replace("/","_",$title);
		$title = str_replace("'","_",$title);
		$title = str_replace("\"","_",$title);
		return $title;
}
function displayprofilelink11($uid)
 {
	 global $sitepath;	
 	//$nickname = getonefielddata("select nickname from tbldatingusermaster where userid=$uid");	
	$userdata = getdata("SELECT nickname,countryid,genderid,religianid from tbldatingusermaster WHERE userid=$uid");
	$user_rs = mysqli_fetch_array($userdata);
	$nickname = $user_rs[0];
	$genderid = $user_rs[2];
	if($user_rs[3]!='' && $user_rs[3]!='0.0' && is_numeric($user_rs[3])){
		$religion = getonefielddata("SELECT title from tbldatingreligianmaster WHERE id=".$user_rs[3]);		
	} else {
		$religion = '';	
	}	
	if($genderid==1){
		$findergender = "Bride";	
	} else {
		$findergender = "Groom";		
	}
	if($user_rs[1]!='' && $user_rs[1]!='0.0' && is_numeric($user_rs[1])){
		$country = getonefielddata("SELECT title from tbldatingcountrymaster WHERE id=".$user_rs[1]);		
	} else {
		$country = '';	
	}
	if ($nickname != ""){		
		$nickname =  replace_chars_from_link($nickname);
		/*$nickname = str_replace(" ","_",$nickname);
		$nickname = str_replace("&","_",$nickname);
		$nickname = str_replace("\\","_",$nickname);
		$nickname = str_replace("/","_",$nickname);
		$nickname = str_replace("'","_",$nickname);
		$nickname = str_replace("\"","_",$nickname); */
		return $sitepath . "displayprofile/$uid". "_".$nickname."_from_".$country."_is_looking_for_".$religion."_".$findergender;		
		//return $sitepath . "displayprofile.php?b=$uid";
	} else {
		return $sitepath . "displayprofile.php?b=$uid";
	}
 }
 function displayprofilelink($uid)
 {
	 global $sitepath;	
 	$nickname = getonefielddata("select nickname from tbldatingusermaster where userid=$uid");
	if ($nickname != "")
	{
		
		$nickname =  replace_chars_from_link($nickname);
		/*$nickname = str_replace(" ","_",$nickname);
		$nickname = str_replace("&","_",$nickname);
		$nickname = str_replace("\\","_",$nickname);
		$nickname = str_replace("/","_",$nickname);
		$nickname = str_replace("'","_",$nickname);
		$nickname = str_replace("\"","_",$nickname); */
		//return $sitepath . "displayprofile/$uid". "_$nickname";
		return $sitepath . "displayprofile.php?b=$uid";
	} else {
		return $sitepath . "displayprofile.php?b=$uid";
	}
 }/*<div style="border:solid 3px #ffcc99; background-color:#c04d0a; padding:10px"><div align="center" style="background-color:#FFF"></div></div>*/
function generatewatermarkimagetextimage($imgnm ,$savefilenm,$ext)
{
$text = findsettingvalue("WaterMarkImageText");
//echo $text;exit;
$imagepath = "uploadfiles/";
@header("Content-type: image/jpeg");
// Create the image
if ($ext == "jpg" || $ext == "jpeg")
$im = @imagecreatefromjpeg($imagepath . $imgnm);

elseif ($ext == "gif")
$im = @imagecreatefromgif($imagepath . $imgnm);
elseif ($ext == "png")
$im = @imagecreatefrompng($imagepath . $imgnm);

$r=255;
$g=255;
$b=255;
	
$colornm = @imagecolorallocate($im, $r, $g, $b);
// Create some colors
$white = @imagecolorallocate($im, 255, 255, 255);
//$grey = imagecolorallocate($im, 128, 128, 128);
//$black = imagecolorallocate($im, 0, 0, 0);
//imagefilledrectangle($im, 0, 0, 399, 29, $white);
// The text to draw
// Replace path by your own font path
//$font = '../font/ENGLISHT.TTF';
$font = 'uploadfiles/font/trebuc.ttf';

// Add some shadow to the text
//imagettftext  ( resource $image  , float $size  , float $angle  , int $x  , int $y  , int $color  , string $fontfile  , string $text  )

$get_img_info = @getimagesize($imagepath . $imgnm);

//$get_x = $get_img_info[0]/17; big img

$get_y = $get_img_info[1];
if($get_y == 100 || $get_y < 140){
	$get_x = $get_img_info[0]/12;
} else {
	$get_x = $get_img_info[0]/17;
}

//echo $get_y."<br>";
//imagettftext($im, 25, 90, 25, 185, $colornm, $font, $text);
//imagettftext($im, 10, 90, 10, 85, $colornm, $font, $text); nishit
@imagettftext($im, $get_x, 90, $get_x, $get_y, $colornm, $font, $text);

// Add the text
//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
// Using imagepng() results in clearer text compared with imagejpeg()
//imagejpeg($im);
$savefilenm1 = $imagepath . $savefilenm;
if ($ext == "jpg" || $ext == "jpe")
@imagejpeg($im,$savefilenm1);
elseif ($ext == "gif")
@imagegif($im,$savefilenm1);
elseif ($ext == "png")
@imagepng($im,$savefilenm1);
@imagedestroy($im);
return $savefilenm;
} 
function generatexmlfeed($rsstotuser,$exque)
{
	global $sitepath;
	$xmldata = "";
	$fromqry = "from tbldatingusermaster where ". $exque . datinguserwhereque() . " order by tbldatingusermaster.ModifyDate desc ";

if ($rsstotuser != "")
	$limit_que = "limit 0,$rsstotuser";
else
	$limit_que ="";
	
$result =getdata("select userid, name,genderid," . findage(). ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,heightid,religianid,castid,subcast,motherthoungid,lookingforid,educationid,ocupationid $fromqry $limit_que ");
		while($rs= mysqli_fetch_array($result))
		{
		 $userid = $rs[0] ;
		 $name = $rs[1] ;
		 $genderid = "";
		 if ($rs[2] !="")
		 {
		 $genderid = findgender($rs[2]);
		 if ($rs[2] == 1)
		 $genderown = "Groom";
		 else
		 $genderown = "Bride";
		 }
		 $age = $rs[3];
		 $countryid = "";
		 if ($rs[4] !="")
		 $countryid = findcountryid($rs[4]);
		 $state = $rs[5];
		 $area = $rs[6];
		 $imagenm = $rs[7];
		 $profileheadline = $rs[8];
		 $city = $rs[9];
		
		 $heightid = $rs[10];
		 $religianid = $rs[11];
		 $castid = $rs[12];
		 $subcast = $rs[13];
		 
		 $motherthoungid = $rs[14];
		 $lookingforid  = $rs[15];
		 $educationid = $rs[16];
		 $ocupationid = $rs[17];
		 
		 if ($heightid != "")
		 	$heightid = getonefielddata("select title from tbldatingheightmaster where id =$heightid");
		 
		 if ($religianid != "")
		 	$religianid = getonefielddata("select title from tbldatingreligianmaster where id =$religianid");
		 
		 if ($castid != "")
		 	$castid = getonefielddata("select title from tbldatingcastmaster where id =$castid");
		
		if ($motherthoungid != "")
		 	$motherthoungid = getonefielddata("select title from tbldatingmothertonguemaster where id =$motherthoungid");
		if ($lookingforid != "")
		 	$lookingforid = getonefielddata("select title from tbldatinglookingformaster where id =$lookingforid");
		if ($educationid != "")
		 	$educationid = getonefielddata("select title from tbl_education_master where id =$educationid");
			if ($ocupationid != "")
		 $ocupationid = getonefielddata("select title from tbldatingoccupationmaster where id =$ocupationid");
	 	//$imagenm = "<img src='../uploadfiles/" . $imagenm . "'>";
		$xmldata .= "<item>";
		//$xmldata .= "<title>$age Yrs, $genderid, $heightid, $religianid, $castid, $subcast, $countryid</title>";
		$xmldata .= "<title>$religianid, $castid, $subcast, $countryid</title>";
		$xmldata .= "<link>" . $sitepath ."displayprofile/". $userid . "</link>";
//$xmldata .= "<pubDate>$pudate</pubDate>";
//$xmldata .= "<category><![CDATA[$RssCategoryText]]></category>";
$xmldata .= "<description><![CDATA[$motherthoungid speaking $genderown seeks $lookingforid. Education:  $educationid. Occupation:  $ocupationid. $profileheadline ...]]></description>";
$xmldata .= "<guid>" . $sitepath ."displayprofile/". $userid . "</guid>";
$xmldata .= "</item>";
} 
freeingresult($result);
return $xmldata;
}
function searchresultsortby($sortsearchresult)
{
global $session_name_initital;
if(!isset($_SESSION[$session_name_initital . "searchordby"]))
//if (!session_is_registered($session_name_initital . "searchordby"))
{
	//session_register($session_name_initital . "searchordby");
	$_SESSION[$session_name_initital . "searchordby"] = "";
}
$ordby = "";
if ($sortsearchresult != "")
{
if ($sortsearchresult == "p")
	$ordby .=" tbldatingusermaster.totalview desc ";
elseif ($sortsearchresult == "a")
	$ordby .=" tbldatingusermaster.lastlogin desc ";
elseif ($sortsearchresult == "n")
	$ordby .=" tbldatingusermaster.userid desc ";
elseif ($sortsearchresult == "r")
	$ordby .=" tbldatingusermaster.religianid,tbldatingusermaster.castid,tbldatingusermaster.subcast  ";
}
$_SESSION[$session_name_initital . "searchordby"] = $ordby;

}
function searchresultfilenm($dispresult)
{
if ($dispresult != "")
		$resdisplay = $dispresult;
	else
		$resdisplay ="d";
	if ($resdisplay == "d")
		return "searchresult.php";
	else
		return "searchresultphoto.php";
}
function findpartnerprofilequery($days,$daysreq,$profileuserid,$withphoto)
{
global $preffered_partner_match_default_days;
if ($days != "")
	if (!is_numeric($days))
		$days ="";
$que = "";
//commented on 12th July because of partnerprofilematch finds same gender alson in guyana
//$genderid = getonefielddata("select genderid from tbldatingusermaster where userid =$profileuserid");

$result = getdata("select genderid,agefrom,ageto,castid, subcast,gotra,occupation,education,maritalstatus,location,religianid,heightfrom,heightto,dietids,smokeids,drinkids,states,pg_education,industry,functional_area,religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id from tbldatingpartnerprofilemaster where userid =$profileuserid");
while ($rs = mysqli_fetch_array($result))
{
	if ($rs[0] != 0){
	if ($rs[0] == 1)
		$genderid = 2;
	else
		$genderid = 1;
	$genderid =$rs[0];
	$que .= " tbldatingusermaster.genderid=" . $genderid . " and";
	} 
	//commented on 12th July because of partnerprofilematch finds same gender alson in guyana
	//$que .= " tbldatingusermaster.genderid <> " . $genderid . " and";
	if($withphoto!=""){
		$que .= " tbldatingusermaster.imagenm != '' and";
	}

	if ($rs[1] != "")
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $rs[1] . " and";
	if ($rs[2] != "")
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <= " . $rs[2] . " and";
	if ($rs[3] != 0){
		$cast_arr = explode(",",$rs[3]);
		$cqry = ' (';
		for($i=0; $i<count($cast_arr); $i++){
			$cqry .= "tbldatingusermaster.castid = ".$cast_arr[0]." OR ";
		}
		$cqry = substr($cqry,0,-4);
		
		$que .= $cqry.") and ";
				
		//$que .= " tbldatingusermaster.castid IN (". $rs[3] .") and "; // use in instead of = on 14th may as per new project changes 
	}if ($rs[4] != ""){
		$subcastdata = getdata("SELECT title from tbldatingsubcastmaster WHERE currentstatus=0 AND id IN (".$rs[4].")");
		$nmrows = mysqli_num_rows($subcastdata);
		$que .= "(";
		$subcqry = '';
		$s = 1;
		while($subcastrs = mysqli_fetch_array($subcastdata)){
			$subcqry .= "tbldatingusermaster.subcast like '%".$subcastrs[0]."%'";	
			if($s!=$nmrows){
				$subcqry .= " OR ";	
			}
			$s++;
		}
		$que .= $subcqry.") and ";		
		//$que .= " tbldatingusermaster.subcast like '%". $rs[4] . "%' and ";
		
	}if ($rs[5] != "")
	$que .= " tbldatingusermaster.gotra like '%". $rs[5] . "%' and ";
	if ($rs[6] != ""){
		$occ_arr = explode(",",$rs[6]);
		$oqry = " (";
		for($i=0; $i<count($occ_arr); $i++){
			$oqry .= " tbldatingusermaster.ocupationid =".$occ_arr[$i]." OR ";
		}
		$oqry = substr($oqry,0,-4);
		$que .= $oqry.") and ";
		//$que .= " tbldatingusermaster.ocupationid in ($rs[6]) and ";
	}
	if ($rs[7] != ""){
		$edu_arr = explode(",",$rs[7]);
		$eqry = " (";
		for($i=0; $i<count($edu_arr); $i++){
			$eqry .= " tbldatingusermaster.educationid=".$edu_arr[$i]." OR ";	
		}
		$eqry = substr($eqry,0,-4);
		$que .= $eqry.") and";
		//$que .= " tbldatingusermaster.educationid in ($rs[7]) and ";
	}if ($rs[8] != ""){
		$mar_arr = explode(",",$rs[8]);
		$mqry = " (";
		for($i=0; $i<count($mar_arr); $i++){
			$mqry .= " tbldatingusermaster.maritalstatusid = ".$mar_arr[$i]." OR ";	
		}
		$mqry = substr($mqry,0,-4);
		$que .= $mqry.") and";
		//$que .= " tbldatingusermaster.maritalstatusid in ($rs[8]) and  ";
	}
	
	if ($rs[9] != ""){
		$cntry_arr = explode(",",$rs[9]);
		$cnqry = " (";
		for($i=0; $i<count($cntry_arr); $i++){
			$cnqry .= " tbldatingusermaster.countryid = ".$cntry_arr[$i]." OR ";
		}
		$cnqry = substr($cnqry,0,-4);
		$que .= $cnqry.") and";
		//$que .= " tbldatingusermaster.countryid in($rs[9]) and  ";
	}
	if ($rs[10] != "")
	if ($rs[10] != "0")
	$que .= " tbldatingusermaster.religianid in($rs[10]) and  ";
	if ($rs[11] != "")
	if ($rs[11] != "0")
	$que .= " tbldatingusermaster.heightid >= " . $rs[11] . " and";
	if ($rs[12] != "")
	if ($rs[12] != "0")
	$que .= " tbldatingusermaster.heightid <= " . $rs[12] . " and";
	
	if ($rs[13] != "")
	if ($rs[13] != "0"){
		$diet_arr = explode(",",$rs[13]); 
		$dqry = " (";
		for($i=0; $i<count($diet_arr); $i++){
			$dqry .= "tbldatingusermaster.dietid = ".$diet_arr[$i]." OR ";
		}
		$dqry = substr($dqry,0,-4);
		$que .= $dqry.") and";
		//$que .= " tbldatingusermaster.dietid in($rs[13]) and  ";
	}
	if ($rs[14] != "")
	if ($rs[14] != "0"){
		$smoke_arr = explode(",",$rs[14]);
		$smqry =" (";
		for($i=0; $i<count($smoke_arr); $i++){
			$smqry .= "tbldatingusermaster.smokerstatusid = ".$smoke_arr[$i]." OR ";	
		}
		$smqry = substr($smqry,0,-4);
		$que .= $smqry.") and";
		//$que .= " tbldatingusermaster.smokerstatusid in($rs[14]) and ";
	}
	if ($rs[15] != "")
	if ($rs[15] != "0"){
		$drink_arr = explode(",",$rs[15]);
		$drqry = " (";
		for($i=0; $i<count($drink_arr); $i++){
			$drqry .= "tbldatingusermaster.drinkerstatusid = ".$drink_arr[$i]." OR ";	
		}
		$drqry = substr($drqry,0,-4);
		$que .= $drqry.") and";
	}
	//$que .= " tbldatingusermaster.drinkerstatusid in($rs[15]) and ";
	
	if ($rs[16] != "")
	{
	$states = $rs[16];
	$states_arr = explode(",",$states);
	$statque = "";
	foreach ($states_arr as $val)
	{
	if ($statque != "")
		$statque .= " or ";
	//$statque .= " tbldatingusermaster.state like '%$val%' ";
	$statque .= " tbldatingusermaster.state IN ('$val') ";
	}
	if ($statque != "")
	{
		$statque = "($statque) and ";
		$que .= $statque;
	}
	}
	if ($rs[17] != "")
	if ($rs[17] != "0")
	$que .= " tbldatingusermaster.edu_pg_id in($rs[17]) and ";
	if ($rs[18] != "")
	if ($rs[18] != "0")
  $que .= " tbldatingusermaster.industry_id in($rs[18]) and ";
	if ($rs[19] != "")
	if ($rs[19] != "0")
$que .= " tbldatingusermaster.work_function_id in($rs[19]) and ";

if ($rs[20] != "")
	if ($rs[20] != "0")
$que .= " tbldatingusermaster.religiosness_id in($rs[20]) and ";

if (findsettingvalue("Religion_field_display") == "M")
{
if ($rs[21] != "")
	if ($rs[21] != "0")
$que .= " tbldatingusermaster.hijab_id in($rs[21]) and ";

if ($rs[22] != "")
	if ($rs[22] != "0")
$que .= " tbldatingusermaster.beard_id in($rs[22]) and ";


if ($rs[23] != "")
	if ($rs[23] != "0")
$que .= " tbldatingusermaster.revert_islam_id in($rs[23]) and ";

if ($rs[24] != "")
	if ($rs[24] != "0")
$que .= " tbldatingusermaster.halal_strict_id in($rs[24]) and ";

if ($rs[25] != "")
	if ($rs[25] != "0")
$que .= " tbldatingusermaster.salah_perform_id in($rs[25]) and ";
}

}
if ($que != ""){
	if ($daysreq == "Y"){
	if ($days == "")
	$days = $preffered_partner_match_default_days;
	//$que .= " to_days(curdate()) - to_days(tbldatingusermaster.createdate)  <= " . $days . " and ";
	$que .= " to_days(curdate()) - to_days(tbldatingusermaster.lastlogin)  <= " . $days . " and ";
	}
}


freeingresult($result);
if ($que == "")
	$que = " tbldatingusermaster.userid in (0) and ";	
return $que;
}
function findonline_users_userid()
{
	$useid =0;	
	$result = getdata(checkuserisonlinefromquery("tbldatingusermaster.userid",""));
	while($rs= mysqli_fetch_array($result))
	{
		$useid = $useid . "," . $rs[0];
	}
	freeingresult($result);
	if ($useid != "")
	
	return $useid;
}
function find_user_gendor($userid)
{
	$genderid = "";
	if ($userid != "")
		$genderid = getonefielddata("select genderid from tbldatingusermaster where userid=$userid");
	if ($genderid == "")
		$genderid =0;
return $genderid;
}
function lookingfor_query($userid)
{
	$genderid = find_user_gendor($userid);
	return "select id,title from tbldatinglookingformaster where currentstatus=0 and id not in($genderid) order by title";
}
function express_intrest_find_status($accepted,$deleted="")
{
	$filenm ="";
	$alt='';
	global $express_intrest_waiting,$express_intrest_accpted,$express_intrest_declined,$siteimagepath,$express_interest;
	if ($accepted == "W")
	{
		$filenm = "express_waiting.png";
		$alt = "Express Interest Waiting";
	}
	elseif ($accepted == "A")
	{
		$filenm = "express_accepted.png";
		$alt = "Express Interest Accepted";
	}
	elseif ($accepted == "D")
	{
		$filenm = "express_declined.png";
		$alt = "Express Interest Declined";
	}
	if ($filenm != "")
	/*return "<a href=#><img border=0 align=absmiddle src='" . $siteimagepath . "images/$filenm' alt=''> 
	$express_interest $alt</a>";*/
	
	return "<a href=#><img border=0 align=absmiddle src='" . $siteimagepath . "images/$filenm' alt=''>
	$alt 
	</a>";
}
function find_express_inrest_image($fromuid,$touid)
{
	global $sitepath,$searchgridexpress_intrest,$siteimagepath ;
	$accepted = "";	
	if ($fromuid != 0)
	//$accepted = getonefielddata("select accepted from tbldatingexpressintrestmaster where currentstatus=0 and touserid=$touid and createby=$fromuid AND createdate=curdate()");	
	$accepted = getonefielddata("select accepted from tbldatingexpressintrestmaster where currentstatus=0 and touserid=$touid and createby=$fromuid");
	if ($accepted != "")
		$image_tag = express_intrest_find_status($accepted);
	else
		/*$image_tag = "<a href='" . $sitepath. "express_intrest_add.php?b=$touid' class='express_intresticon'><img align='absmiddle' src='" . $siteimagepath . "images/express_intresticon.gif' border='0' alt=''/> $searchgridexpress_intrest</a>";*/
		$image_tag = "<a href='" . $sitepath. "express_intrest_add.php?b=$touid' class='express_intresticon'><img align='absmiddle' src='" . $siteimagepath . "images/express_intresticon.png' border='0' alt=''/> Express Interest</a>";
		
	return 	$image_tag;	
}
function pmb_new_message($curruserid)
{
	return getonefielddata("select count(PmbId) from tbldatingpmbmaster,tbldatingusermaster where tbldatingusermaster.currentstatus=0 and ToUserId='$curruserid' and tbldatingusermaster.userid=FromUserId and tbldatingpmbmaster.CurrentStatus not in(1,2,4) and tbldatingpmbmaster.MessageStatus = 1");
}
function express_intrest_pending($curruserid)
{
return getonefielddata( "select count(id) from tbldatingexpressintrestmaster where currentstatus=0 and touserid=$curruserid and accepted ='W'");
}
function profile_id_code($curruserid)
{
$nicknm = findsettingvalue("ProfileIdInitials");
$result = getdata("select substr(name,1,1),emailverificationcode from tbldatingusermaster where userid=$curruserid");
while ($rs = mysqli_fetch_array($result))
{
	//$nicknm = strtoupper($rs[0]);
	$emailverificationcode = $rs[1];
	$tot_len_id = strlen($curruserid);
	$tot_len_verificationcode = strlen($emailverificationcode);
	$tot_len = $tot_len_id + $tot_len_verificationcode;

	if ($tot_len == 7 )
		$code = $emailverificationcode."0".$curruserid;
	elseif ($tot_len <= 7 )
	{
		$reqlen = 7- $tot_len;
		$newcode = "";
		for($i = 1;$i<=$reqlen;$i++)
			$newcode = $newcode .$i;
		$code = $newcode . $emailverificationcode."0".$curruserid;
	}
	elseif ($tot_len > 7 )
	{
		$reqlen = $tot_len - 7;
		$newcode = "";

		
		for($i = $reqlen;$i<=$tot_len_verificationcode;$i++)
			$newcode = $newcode. substr($emailverificationcode,$i,1);
		$code = $newcode ."0". $curruserid;
	}
	
}
freeingresult($result);
//return $nicknm ."-". $code;
return $code;
}
function find_profile_code($userid)
{
	/* $nicknm = "";
	$profile_code ="";
	$result = getdata("select substr(name,1,1),profile_code from tbldatingusermaster where userid=$userid");
while ($rs = mysqli_fetch_array($result))
{
	$nicknm = strtoupper($rs[0]);
	$profile_code = $rs[1];
}
return $nicknm . "-" . $profile_code;*/
return display_profile_code($userid);
}
function check_paid_member($userid)
{
if ($userid == "")
	$userid =0;
	
$uid = getonefielddata( "select userid from tbldatingusermaster where currentstatus=0 and to_days(tbldatingusermaster.expiredate)-to_days(curdate()) >= 0 and userid=$userid and packageid >1");
if ($uid != "")
	return "Y";
else
	return "N";
}
function init_login_session()
{
global $session_name_initital;
unset($_SESSION[$session_name_initital . "memberuserid"]);
unset($_SESSION[$session_name_initital . "memberusername"]);
unset($_SESSION[$session_name_initital . "membername"]);
/*  if (!session_is_registered($session_name_initital . "memberuserid"))
session_is_registered($session_name_initital . "memberuserid");
if (!session_is_registered($session_name_initital . "memberusername"))
session_is_registered($session_name_initital . "memberusername");
if (!session_is_registered($session_name_initital . "membername"))
session_is_registered($session_name_initital . "membername");*/

//if (!session_is_registered("SESSION_CHAT_USER_ID"))
//session_is_registered("SESSION_CHAT_USER_ID");

$_SESSION[$session_name_initital . "memberuserid"]="";
$_SESSION[$session_name_initital . "memberusername"]="";
//$_SESSION["SESSION_CHAT_USER_ID"]="";
}
function payment_amount($paymentid,$CreateBy)
{
	$result = getdata("select totalpaymentamount from tbldatingpaymentmaster where currentstatus in(0) and paymentid=$paymentid and CreateBy=$CreateBy and clear='N'");
	while ($rs = mysqli_fetch_array($result))
	{
		$totalpaymentamount = $rs[0];
	}
	freeingresult($result);
	return $totalpaymentamount;
}
function findcheckedornot($arrtofind,$valuetofind)
{	
	$chk ="";
	if (is_array($arrtofind))
	{	
		//echo("<br>$arrtofind" . $chk); exit;
		if (in_array($valuetofind,$arrtofind))
		$chk = "checked";
	}	
	
	return $chk;
}
function getcheckboxids($tablenm,$fldnm)
{	
	$id ="";
	//lines added by Nishit start
	if($tablenm=='tbldating_education_pg_master'){ 		
		$status = '1'; 
	} else if($tablenm=='tbl_education_master') {
		$status = '9';	
	} else {
		$status = '0';
	}	
	//end	
	$result = getdata("select id,title from $tablenm where currentstatus='".$status."' order by title ");
	while ($rs = mysqli_fetch_array($result))
	{ 
		if (isset($_POST[$fldnm .$rs[0]]))
		{
			if ($id != "")
				$id .= ",";
		$id .= $rs[0];
		}
	}
	freeingresult($result);
	return $id;
}
function eventwhereque()
{
	return "tbl_event_master.currentstatus=0";
}
function generatelink($title,$id,$filenm)
{
	global $sitepath;
	if ($title != "")
	{
	$title = substr($title,0,100);
	$title = str_replace(" ","_",$title);
	$title = str_replace("&","_",$title);
	$title = str_replace("/","_",$title);
	$title = str_replace("\\","_",$title);
	$title = str_replace("\"","_",$title);
	$title = str_replace("'","_",$title);
	$title = str_replace(",","_",$title);
	$title = str_replace("-","_",$title);
	
	}
	return $sitepath . "$filenm/" . $id . "_$title";
}
function directorywhereque()
{
	return "tbl_directory_master.currentstatus=0 and tbl_directory_master.deactive='N'";
}
function add_to_messager($uid,$curuserid)
{
	$messangerid = getonefielddata("select messangerid from tbldatingmessangermaster where touserid=$uid and fromuserid=$curuserid and currentstatus=0");
	if ($messangerid  == "")
	{
	$action =0;
	$query = sendtogeneratequery($action,"touserid",$uid,"Y");
	$query .= sendtogeneratequery($action,"fromuserid",$curuserid,"Y");
	$query .= sendtogeneratequery($action,"CreateBy",$curuserid,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
	$query = substr($query,1);
	execute("insert into tbldatingmessangermaster (touserid,fromuserid,CreateBy,CreateIP,CreateDate) values(" . $query .",now())");
	}
	
	$messangerid = getonefielddata("select messangerid from tbldatingmessangermaster where touserid=$curuserid and fromuserid=$uid and currentstatus=0");
	if ($messangerid  == "")
	{
	$query = sendtogeneratequery($action,"touserid",$curuserid,"Y");
	$query .= sendtogeneratequery($action,"fromuserid",$uid,"Y");
	$query .= sendtogeneratequery($action,"CreateBy",$uid,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
	$query = substr($query,1);
	execute("insert into tbldatingmessangermaster (touserid,fromuserid,CreateBy,CreateIP,CreateDate) values(" . $query .",now())");
}
}
function display_profile_code($userid)
{
	$profile_code ="";
	if ($userid != "")
	{
	$nicknm_init = '';
	$result = getdata("select substr(name,1,1),profile_code from tbldatingusermaster where userid=$userid");
while ($rs = mysqli_fetch_array($result))
{
	$nicknm_init = strtoupper($rs[0]);
	$profile_code = $rs[1];
}
freeingresult($result);
if (findsettingvalue("ProfileIdInitials_method") == "S")
	$init = findsettingvalue("ProfileIdInitials");
	else
	$init = $nicknm_init;
	
if ($profile_code != "")
	return $init . "-" . $profile_code;
}
}
function check_lalid_length_input($input,$input_type="T")
{

if ($input != "")
{
	global $textbox_character_max_length,$memo_character_max_length;
	if ($input_type == "T")
	{
		if (strlen($input) > $textbox_character_max_length)
			$input = substr($input,0,$textbox_character_max_length);
	}
	else
	{
		if (strlen($input) > $memo_character_max_length)
			$input = substr($input,0,$memo_character_max_length);
	}	
	return strip_tags($input);
}
}
function scale_image($filenm,$small_img)
{
$uploaddir_admin ="uploadfiles";
$ext = strrev(substr(strrev($filenm),0,3));
$ext = strtolower($ext);
$img = "$uploaddir_admin/$filenm";
list($original_width, $original_height, $type, $attr) = getimagesize($img);


//$small_img = "productsmall" . $productid . ".$ext";
$small_img_with_path = "$uploaddir_admin/$small_img";
//$h_temp = findsettingvalue("Small_Image_Height");
$w = findsettingvalue("Thumbnil_Image_Width");

if ($w > $original_width)
	$w = $original_width;

// get image size of img
$x = getimagesize($img);
// image width
$sw = $x[0];
// image height
$sh = $x[1];

$w_gen = ($w * 100)/$sw;

$h = ($w_gen * $sh)/100;

$height_setting = findsettingvalue("Thumbnil_Image_Height");
if ($h > $height_setting)
	$h= $height_setting;

if (($ext == "jpg") || ($ext == "jpe") || ($ext == "jpeg"))
$im = imagecreatefromjpeg ($img); // Read JPEG Image
elseif ($ext == "png")
$im = imagecreatefrompng ($img); // or PNG Image
elseif ($ext == "gif")
$im = imagecreatefromgif ($img); // or GIF Image
else
$im = false; // If image is not JPEG, PNG, or GIF

if (!$im) {
	// We get errors from PHP's ImageCreate functions...
	// So let's echo back the contents of the actual image.
	readfile ($img);
} else {
	// Create the resized image destination
	$thumb = imagecreatetruecolor ($w, $h);
	//$bg = ImageColorAllocateAlpha($thumb, 255, 255, 255, 127); 
	//imagefill($thumb, 0, 0 , $bg);

	// Copy from image source, resize it, and paste to image destination
	imagecopyresampled ($thumb, $im, 0, 0, 0, 0, $w, $h, $sw, $sh);
	// Output resized image
	//imagejpeg($dst_r,$savefilenm_path,$jpeg_quality);
	if ($ext == "png")
		$quality =9;
	else
		$quality =70;
	//imagejpeg ($thumb,$small_img_with_path,$quality);
	if (($ext == "jpg") || ($ext == "jpe") || ($ext == "jpeg"))
imagejpeg ($thumb,$small_img_with_path,$quality);
elseif ($ext == "png")
imagepng ($thumb,$small_img_with_path,$quality);
elseif ($ext == "gif")
imagegif ($thumb,$small_img_with_path,$quality);

	return $small_img;
	}
}
function find_image_on_request_or_not($fromuserid,$touserid)
{
$accepted="Y";


$image_password_protect = getonefielddata("select image_password_protect from tbldatingusermaster where userid=$touserid");
if ($image_password_protect == "Y")
{
$accepted="N";
//echo $touserid; exit;
if ($touserid != 0  && $fromuserid!='')
{
 $accepted = getonefielddata("select accepted from tbldatingimagerequestmaster where touserid=$touserid and fromuserid=$fromuserid and currentstatus=0"); 
if (($accepted == "") || ($accepted == "D"))
$accepted="N";
if ($accepted == "A")
	$accepted="Y";
}
}
//echo $accepted; exit;
return $accepted;
}

function find_user_image($userid,$show_big_image_only="N",$numm="",$cat=""){
	global $sitepath,$user_uploaded_images_for_mobile,$curruserid,$session_name_initital,$curruserid;
$imagenm = "";
$result = getdata("select imagenm,thumbnil_image,image_password_protect,genderid from tbldatingusermaster where userid=$userid");	
	while ($rs = mysqli_fetch_array($result))
	{
		$rgenderid = $rs[3];
		if($rs[0]!="" && file_exists("uploadfiles/".$rs[0])){
			$imagenm = $rs[1];
			$big_imagenm = $rs[0];		
		} else {
			if($rgenderid==1){
				$imagenm = "maleimage.png";
				$big_imagenm ="maleimage.png";
			} else if($rgenderid==2){
				$imagenm = "femalenoimage.png";
				$big_imagenm ="femalenoimage.png";
			} else {
				$imagenm = "noimageprofile.png";
				$big_imagenm ="noimageprofile.png";
			}
		}		
		if($imagenm!="" && file_exists("uploadfiles/".$imagenm)){
			$thumbnil_image = $imagenm;	
		} else {
			$thumbnil_image = "noimageprofile.png";	
		}
		$imageonrequest=$rs[2];				
		if ($thumbnil_image != "")
			$imagenm = $thumbnil_image;
		$userlink = displayprofilelink($userid);
		$accepted=find_image_on_request_or_not($curruserid,$userid);
		
	}
	freeingresult($result);
if ($imagenm == "")
{
	 $imagenm = "noimageprofile.png";
	 $big_imagenm = $imagenm;
	 
}
if ($show_big_image_only =="Y")
$imagenm=$big_imagenm;

/*************** FLASH START HERE **********************/

/*************** FLASH END HERE **********************/


/*************** NON FLASH START HERE **********************/
$imagenm = '<img src="'.$sitepath.'uploadfiles/'.$thumbnil_image.'" id="srsimg'.$userid.'"  border="0" onmousedown="checkrightclick('.$userid.')">';
$imagenm ="<a class='thumbnail' href='$userlink'>$imagenm</a>";

/*************** NON FLASH END HERE **********************/

return  $imagenm;
}

function find_user_images($userid,$show_big_image_only="N",$numm,$cat){
global $sitepath,$user_uploaded_images_for_mobile,$curruserid,$session_name_initital;
/*if(!isset($_SESSION[$session_name_initital."memberuserid"])){
	$imagenm = '<img src="'.$sitepath.'../uploadfiles/noimageprofile.gif" height="133" width="100" border="0">';
	return $imagenm;	
}*/

$imagenm = "";
$result = getdata("select imagenm,thumbnil_image,image_password_protect from tbldatingusermaster where userid=$userid");
	
	while ($rs = mysqli_fetch_array($result))
	{
		if($rs[0]!="" && file_exists("uploadfiles/".$rs[0])){
			$imagenm =$rs[0];
			$big_imagenm =$rs[0];		
		} else {
			$imagenm = "noimageprofile.gif";	
			$big_imagenm ="noimageprofile.gif";
		}
		if($rs[1]!="" && file_exists("uploadfiles/".$rs[1])){
			$thumbnil_image=$rs[1];	
		} else {
			$thumbnil_image="noimageprofile.gif";	
		}		
		$imageonrequest=$rs[2];				
		if ($thumbnil_image != "")
			$imagenm = $thumbnil_image;
		$userlink = displayprofilelink($userid);
		$accepted=find_image_on_request_or_not($curruserid,$userid);
		if ($accepted == "N")
		{
		$imagenm = "image_on_request.gif";
		$big_imagenm ="image_on_request.gif";
		$thumbnil_image="image_on_request.gif";
		}
	}
	freeingresult($result);
//new added on 26th mar start
//if($imagenm!="" && file_exists("../uploadfiles/".$imagenm))	{
//	$big_imagenm = $imagenm;	 
//} else {
//	$imagenm = "noimageprofile.gif";
//	$big_imagenm = $imagenm;
//}
//new added on 26th mar end
if ($imagenm == "")
{
	 $imagenm = "noimageprofile.gif";
	 $big_imagenm = $imagenm;
	 
}
if ($show_big_image_only =="Y")
$imagenm=$big_imagenm;

/*************** FLASH START HERE **********************/

/* $imagenm ="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='100' height='100'>
<param name='movie' value=". $sitepath."thumb.swf>
<param name='quality' value='high'>
<param name='wmode' value='transparent' />
<PARAM NAME=FlashVars VALUE='imgpath=$imagenm'>
<embed src=".$sitepath."thumb.swf quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' FlashVars='imgpath=$imagenm' width='100' height='100' wmode='transparent'></embed>
</object>"; */

/*************** FLASH END HERE **********************/


/*************** NON FLASH START HERE **********************/

if ($user_uploaded_images_for_mobile == "") {
	
$big_imagenm = $sitepath . "uploadfiles/".$big_imagenm;

$img_arr = @getimagesize($big_imagenm);
$img_w = $img_arr[0];
$img_h = $img_arr[1];
$default_width = findsettingvalue('img_width');
$default_height = findsettingvalue('img_height');
$req_width = "";
$req_height = "";
if($img_w>$default_width || $img_h>$default_height){
	$target = "250";	
	$size = imageResize($img_w,$img_h,$target);
	$size_arr = explode("*",$size);	
	$req_width = $size_arr[0];
	$req_height = $size_arr[1];
	$div_width = $req_width + 10;
} else {
	$req_width = $img_w;
	$req_height = $img_h;
	$div_width = $img_w + 10;
}
//new added on 26th mar start
//if($thumbnil_image!="" && file_exists("../uploadfiles/".$thumbnil_image)){
//	$thumbnil_image = $thumbnil_image;
//} else {
//	$imagenm = "noimageprofile.gif";
//	$thumbnil_image = $imagenm;
//}
/*if(!file_exists($big_imagenm)){
	$big_imagenm = "noimageprofile.gif";	
}*/
//new added on 26th mar start
//$imagenm = "<img src='". $sitepath . "uploadfiles/" . $thumbnil_image . "' height='133' width='100' border='0' onMouseOut=\"hidetrail();\" onMouseOver=\"showtrail('". $big_imagenm. "','&nbsp;','&nbsp;','10',50, '".$req_width."', '".$req_height."', '".$div_width."','".$numm."','".$cat."');\" >";

$imagenm = '<img src="'.$sitepath.'uploadfiles/'.$thumbnil_image.'" id="srsimg'.$userid.'" height="133" width="100" border="0" onmousedown="checkrightclick('.$userid.')">';
//$imagenm = "<img src='". $sitepath . "../uploadfiles/" . $imagenm . "' border='0' onMouseOut=\"hidetrail();\" onClick=\"showtrail('". $big_imagenm. "','&nbsp;','&nbsp;','10',50, '".$req_width."', '".$req_height."', '".$div_width."','".$numm."','".$cat."');\" >";

//$imagenm = "<img src='". $sitepath . "../uploadfiles/" . $thumbnil_image . "' height='133' width='100' border='0');\" >";


//$imagenm ="<a class='thumbnail' href='$userlink'>$imagenm</a>";
$imagenm ="<a class='thumbnail' href='$userlink'>$imagenm</a>";
}
else
$imagenm = "<a href='$userlink'><img src='". $user_uploaded_images_for_mobile . $imagenm . "' border=0></a>";


/*************** NON FLASH END HERE **********************/

return  $imagenm;
}

function imageResize($width, $height, $target) {
	//takes the larger size of the width and height and applies the  
	//formula accordingly...this is so this script will work  
	//dynamically with any size image
	
	if ($width > $height) {
	$percentage = ($target / $width);
	} else {
	$percentage = ($target / $height);
	}
	
	
	//gets the new value and applies the percentage, then rounds the value
	$width = round($width * $percentage);
	$height = round($height * $percentage);
	
	//returns the new sizes in html image tag format...this is so you
	//can plug this function inside an image tag and just get the
	
	//return "width=\"$width\" height=\"$height\"";
	return $width."*".$height;

}


function user_can_see_contact_detail($userid,$return_total="N")
{

	$allow ="N";
	$total_contact_can_view_remain=0;
	//echo("select min(featureid) from tbldating_view_conact_package_user_master where currentstatus=0 and userid =$userid and to_days(expiredate)-to_days(curdate()) >=0 ");
	
	//$featureid = getonefielddata("select min(featureid) from tbldating_view_conact_package_user_master where currentstatus=0 and userid =$userid and to_days(expiredate)-to_days(curdate()) >=0 ");	

	$featureid = getonefielddata("select max(featureid) from tbldating_view_conact_package_user_master where currentstatus=0 and userid =$userid and to_days(expiredate)-to_days(curdate()) >=0 ");
	if ($featureid != "")
	{
		
		
	$result = getdata("select ifnull(total_contact_can_view,0),ifnull(total_contact_can_view,0)-ifnull(total_contact_already_viewd,0) from tbldating_view_conact_package_user_master where featureid=$featureid");
	while ($rs = mysqli_fetch_array($result))
	{
		$total_contact_can_view=$rs[0];
		$total_contact_can_view_remain =$rs[1];
		
		
		if ($total_contact_can_view > 0)
		{
			if ($total_contact_can_view_remain >0)
				$allow ="Y";
		}
		else
				$allow ="Y";
	}
	freeingresult($result);
	}
	
	if ($return_total == "N")	{
		if ($allow == "Y") {
			return $featureid;
		}
	} else {
		if($total_contact_can_view_remain<0){
			$total_contact_can_view_remain = 0;
		}
		return $total_contact_can_view_remain;
	}
}
function update_view_contact_detail_package($view_contact_packageid,$userid,$touserid)
{
$phnerequestid=0;
$phnerequestid = getonefielddata("select id from tblphonerequestmaster where touserid=$touserid and fromuserid=$userid and currentstatus=0");


if ($phnerequestid ==0)
{
execute("update tbldating_view_conact_package_user_master set total_contact_already_viewd=ifnull(total_contact_already_viewd,0)+1 where featureid=$view_contact_packageid and userid=$userid");

execute("INSERT INTO `tblphonerequestmaster`(`touserid`, `fromuserid`,`CreateDate`,`CreateBy`, `CreateIP`) VALUES ('".$touserid."','".$userid."',curdate(),'".$userid."','".$_SERVER['REMOTE_ADDR']."')");

}

}
function upload_user_picture($ctrlnm,$userid)
{
if(isset($_FILES[$ctrlnm]['tmp_name']))
{
	global $siteuploadfilepath;
	$ext = strtolower(substr(strrchr($_FILES[$ctrlnm]['name'],"."),1));
	if (($ext == "jpg") || ($ext =="jpe") || ($ext == "gif") || ($ext == "png"))
	{
	if ($_FILES[$ctrlnm]["size"] / 1024 < findsettingvalue("File_upload_size"))
	{
	$filenm = "userpicture_temp" . $userid . ".$ext";
	$filenm_temp = "userpicture_temp" . $userid . ".$ext";
	copy($_FILES[$ctrlnm]['tmp_name'],"$siteuploadfilepath" . "/" .$filenm);
	$filenmsave = "userpicture" . $userid . ".$ext";
	$filenm = generatewatermarkimagetextimage($filenm ,$filenmsave,$ext);	
	
	$filenm_temp_thumb = "userpicture_thumbnil_temp" . $userid . ".$ext";
	$filenm_thumb = "userpicture_thumbnil" . $userid . ".$ext";
	$filenm_temp_thumb = scale_image($filenm_temp,$filenm_temp_thumb);
	$filenm_thumb = generatewatermarkimagetextimage($filenm_temp_thumb ,$filenm_thumb,$ext);
	$action = $userid;
	$query = sendtogeneratequery($action,"imagenm",$filenm,"Y");
	$query .= sendtogeneratequery($action,"thumbnil_image",$filenm_thumb,"Y");
	updateprofile($query,$userid);
	if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp))
	unlink("$siteuploadfilepath" . "/" . $filenm_temp);
	if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp_thumb))
	unlink("$siteuploadfilepath" . "/" . $filenm_temp_thumb);
	}
	}
}
}
function findtitleofprofilefld($fldval,$tablenm)
{
	if ($fldval != ""){
		//return getonefielddata("select title from $tablenm where id=" . $fldval);
		//return getonefielddata("select title from $tablenm where id IN (".$fldval.")");
		$res = getdata("select title from $tablenm where id IN (".$fldval.")");
		$ret = "";
		while($rs = mysqli_fetch_array($res)){
			$ret .= $rs[0].", ";
		} 
		$ret = substr($ret,0,-2);
		return $ret;
	}	else {
		return "";
	}
}
function findfeatureddetail($userid)
{
	$classcode = "";
	$Imgpath = "";
	$classnm =  "";
	
	$result = getdata("select classcode,Imgpath,featureid from tbldatingpackageformattypemaster,tbldatingpackagemaster,tbldatingfeaturedusermaster where tbldatingpackageformattypemaster.FormatTypeId=tbldatingpackagemaster.formattypeid and tbldatingfeaturedusermaster.packageid =tbldatingpackagemaster.PackageId and  tbldatingfeaturedusermaster.currentstatus=0 and tbldatingfeaturedusermaster.userid =$userid and to_days(tbldatingfeaturedusermaster.expiredate)-to_days(curdate()) >=0 ");
	while($rs= mysqli_fetch_array($result))
	{
		$classcode .= $rs[0];
		$Imgpath .= $rs[1];
		$classnm .=  $rs[2];
	}
	freeingresult($result);
	global $sitepath;
	if ($Imgpath != "")
	$Imgpath = str_replace("[sitepath]",$sitepath,$Imgpath);
	$stylesheetcode = "";
	if ($classcode != "")
	{
		$classnm = "FeaturedCls" . $classnm;
        $stylesheetcode  = "<style>" . chr(13) .
                          "." . $classnm . " {" . chr(13) . $classcode . chr(13) .
                          "}" . chr(13) .
                         "</style>";
	}
	$packagearr["packageclassnm"] = $classnm;
	$packagearr["packageimage"] = $Imgpath;
	$packagearr["stylesheetcode"] = $stylesheetcode;
	
	return $packagearr;
}




function checklogin($sitepath="",$checkguestlogin="",$dispuserid="")
{
global $session_name_initital;
 $filenm = getfielnm();
 if ($filenm == "packagemanangerinsert.php")
 	$filenm  ="packagemanager.php";

//echo $session_name_initital; exit;
 if(!isset($_SESSION[$session_name_initital . "memberuserid"]) && 
 $_SESSION[$session_name_initital . "memberuserid"] == "")
 //if (!session_is_registered($session_name_initital . "memberuserid"))
 {
	 //echo "12311"; exit;
	//header("location:login.php?fnm=$filenm");
	header("location:login.php");
	exit();
 }
 //if ($_SESSION[$session_name_initital . "memberuserid"] == "")
 //{
  	//header("location:login.php?fnm=$filenm");
	//header("location:login.php");
	//exit();
 //}
 $filenm = findacutalfilenm();
 global $sitepath;
 
 
 
 if ($filenm != "")
 {
 	$checkfeatured = getonefielddata("select pageid from tbldatingpagemaster where pagename='$filenm' and currentstatus=0");
	if ($checkfeatured != "")
	{
		$expdays = check_user_is_paid_member($_SESSION[$session_name_initital . "memberuserid"]);		
		if ($expdays < 0)
		{
			/* if (($filenm == "autorespondermanager.php") || ($filenm =="autoresponderinsert.php"))
			{
 			$Auto_responder_allowed_to = findsettingvalue("Auto_responder_allowed_to");
			if ($Auto_responder_allowed_to == "P")
			{
				header("location:" . $sitepath . "message.php?b=37");
				exit();
			}
			}
			else
			{
			header("location:" . $sitepath . "message.php?b=37");
			exit();
			} */
			if (($filenm == "messanger.php"))
			{
				header("location:" . $sitepath . "message_popup.php?b=3");
				exit();
			}
			else
			{
			header("location:" . $sitepath . "message.php?b=37");
			exit();
			}
		}
		if ($dispuserid != "")
		if ($filenm != "pmbdisplay.php")
		check_for_cast_religian($dispuserid,$_SESSION[$session_name_initital . "memberuserid"]);
	}
	if (($filenm == "winksend.php") || ($filenm == "winkinsert.php"))
		check_for_cast_religian($dispuserid,$_SESSION[$session_name_initital . "memberuserid"]);
}
} 
function check_for_cast_religian($dispuserid,$curuid)
{
global $Enable_cast_subcast_design_setting;
	$selected_religion_can_contact = "N";
	$selected_cast_contact_me = "N";
	$partner_religianid = "";
	$partner_castid ="";
	
	$result = getdata("select selected_religion_can_contact,selected_cast_contact_me,religianid,castid  from tbldatingpartnerprofilemaster where userid =$dispuserid");
	while ($rs = mysqli_fetch_array($result))
	{
		$selected_religion_can_contact = $rs[0];
		$selected_cast_contact_me = $rs[1];
		$partner_religianid = $rs[2];
		$partner_castid  = $rs[3];
	}
	freeingresult($result);
	if (($selected_religion_can_contact == "Y") && ($partner_religianid != ""))
	{
		$own_religion_id = getonefielddata("select religianid from tbldatingusermaster where 
userid=$curuid");
		if ($own_religion_id != $partner_religianid)
		{
			header("location:message.php?b=65");
			exit();
		}
	}
	if ($Enable_cast_subcast_design_setting == "Y") 
	{
	if (($selected_cast_contact_me == "Y") && ($partner_castid != ""))
	{
		$own_cast_id = getonefielddata("select castid from tbldatingusermaster where 
userid=$curuid");
		if ($own_cast_id != $partner_castid)
		{
			header("location:message.php?b=65");
			exit();
		}
	}
	}
}
function check_user_is_paid_member($userid)
{
if ($userid == "")
$userid =0;
if (findsettingvalue("check_free_user_for_package") == "N")
	$exque =" and packageid <> 1 ";
else
	$exque ="";
		
$expdays = getonefielddata("select to_days(expiredate)-to_days(curdate()) from tbldatingusermaster where userid=" . $userid . " $exque ");
	if ($expdays == "")
		$expdays = -1;
	return $expdays;
}  	
function generateinvoice($invoiceid)
{ 
 	global $sitepath;
	$logo = findsettingvalue("invLogo_filenm");
    $curr = findsettingvalue("CurrencySymbol");
    $companyname = findsettingvalue("CompanyName");
	$companyaddress = findsettingvalue("CompanyAddress");
    
    $InvoiceVar = "<style>";
    $InvoiceVar .= ".tableborder1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px solid #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .=".boldtext1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".parabig1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".topbottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px solid #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext2 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 18px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext3 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".bottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px none #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".small {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 10px;";
    $InvoiceVar .= "color: #333333;";
    $InvoiceVar .= "}";
    $InvoiceVar .= "</style>";
    $InvoiceVar .= "<table cellspacing='7' cellpadding='5' width='670' border='0'>";
    $InvoiceVar .= "<tbody>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='tableborder1' align='middle' colspan='2'>";
	$InvoiceVar .= "<table width='100%' cellpadding='0' cellspacing='0' border='0'>";
	$InvoiceVar .= "<tr><td width='50'><img src=".$sitepath."uploadfiles/".$logo ." border='0' align='absmiddle' />&nbsp;</td>";
	$InvoiceVar .= "<td class='parabig1'><span class='boldtext2'>" . $companyname . "</span>";
    $InvoiceVar .="<br />";
    $InvoiceVar .= $companyaddress . "</td></tr></table></td>";
    $InvoiceVar .="</tr>";
    $InvoiceVar .="<tr valign='top'>";
    $InvoiceVar .="<td class='tableborder1' width='331'>";
    $InvoiceVar .="<span class='boldtext1'>Bill / Ship To :</span>";
    $InvoiceVar .="<br />";
 
    //$result = getdata("select date_format(paymentdate, '%m-%d-%Y'),totalpaymentamount,paidamount,name,address,city,area,countryid,postcode,state from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	global $date_format;
	//$result = getdata("select date_format(tbldatingpaymentmaster.CreateDate, '$date_format'),totalpaymentamount,paidamount,name,city,area,countryid,postcode,state,profile_code,email,mobile from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	$result = getdata("select date_format(tbldatingpaymentmaster.CreateDate, '$date_format'),totalpaymentamount,paidamount,name,city_id,area,countryid,postcode,state,profile_code,email,mobile from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	while ($rs = mysqli_fetch_array($result))
	{
		$invoicedate = $rs[0];
	  	$invoiceamount = $rs[1];
	  	$paidinvoiceamount = $rs[2];
		$name = $rs[3];
		if($rs[4]!='0.0' && $rs[4]!="" && is_numeric($rs[4])){		
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[4]);			
		} else {
			$city = "";
		}	  	
	  	$area = $rs[5];
	  	$country ="";
	  	if ($rs[6] != "" && $rs[6]!='0.0' && is_numeric($rs[6])){
	  		$country = getonefielddata("select title from tbldatingcountrymaster where id=$rs[6]");
		} else {
			$country = '';	
		}
			$pin ="";
	  	if ($rs[7] !="")
	  	$pin = "pin : " . $rs[7];
		$state = $rs[8];
		$profile_code = $rs[9];
		$email = $rs[10];
		$phone = $rs[11];
    }  
	freeingresult($result);       
    $InvoiceVar .=  "Mr/Ms." . $name . "<br />";
	$InvoiceVar .=  "Profile Code. - " . $profile_code . "<br />";
	$InvoiceVar .=  "Email. - " . $email . "<br />";
	$InvoiceVar .=  "Contact No. - " . $phone . "<br />";
    //$InvoiceVar  .= $address . "<br>";
	$InvoiceVar  .= $area . "<br>";
	$InvoiceVar  .= $city . "<br>";
    $InvoiceVar  .= $state . "<br>";
    $InvoiceVar  .= $country . "<br>";
    $InvoiceVar  .= $pin . "<br>";
    $InvoiceVar  .= "</td>";
    $InvoiceVar  .= "<td class='tableborder1' width='298'>";
    $InvoiceVar  .= "<span class='boldtext3'>Invoice ID : " . $invoiceid . "</span>";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<span class='boldtext3'>Date : " . $invoicedate . "</span>";
    $InvoiceVar  .= "<br/>";
    $InvoiceVar  .= "<br/>";
             
	$InvoiceVar       .= "</tr>";
    $InvoiceVar       .= "<tr valign='top'>";
    $InvoiceVar       .= "<td class='tableborder1' colspan='2'>";
    $InvoiceVar       .= "<table cellspacing='0' cellpadding='3' width='100%' border='0'>";
    $InvoiceVar       .= "<tbody>";
    $InvoiceVar       .= "<tr valign='top'>";
    $InvoiceVar       .= "<td class='bottomborder' width='39%'>";
    $InvoiceVar       .= "Transactions Details</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='10%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='10%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='center' width='14%'>";
    $InvoiceVar       .= "Days</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='right' width='27%'>";
    $InvoiceVar       .= "Amount ( ". $curr ." )</td>";
    $InvoiceVar       .= "</tr>";
  	 
    $totqty =0;
	$result = getdata("select tbldatingpackagemaster.Description,tbldatingpaymentdetail.days,tbldatingpaymentdetail.price from tbldatingpaymentdetail,tbldatingpackagemaster where tbldatingpaymentdetail.packageid=tbldatingpackagemaster.PackageId and paymentid =$invoiceid");
	while ($rs = mysqli_fetch_array($result))
	{
		$packagename = $rs[0];
		$days = $rs[1];
		$price = $rs[2];
		
    $InvoiceVar  .= "<tr valign='top'>";
    $InvoiceVar  .= "<td class='parabig1'>$packagename</td>";
    $InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	$InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	$InvoiceVar  .= "<td class='parabig1' align='center'>$days</d>";
    $InvoiceVar  .= "<td class='parabig1' align='right'>$price</td>";
    $InvoiceVar  .= "</tr>";
	}
	freeingresult($result);
    //$InvoiceVar .="<tr valign='top'>";
//    $InvoiceVar .= "<td class='boldtext1' align='right'>";
//    $InvoiceVar .= "Others :</td>";
//    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='middle'>";
//    $InvoiceVar .= "</td>";
//    $InvoiceVar .= "<td class='boldtext1' align='right'>";
//    $InvoiceVar .= "&nbsp;</td></tr>";
	
	global $agent_module_enable;
	if ($agent_module_enable == "Y") 
	{ 
	$discount = getonefielddata("select agent_discount_per from tbldatingpaymentmaster where currentstatus =0 and paymentid=$invoiceid");
	if($discount>0){
		$InvoiceVar .= "<tr valign='top'>";
		$InvoiceVar .= "<td class='boldtext1' align='right'>";
		$InvoiceVar .= "agent discount :</td>";
		$InvoiceVar .= "<td class='boldtext1' align='middle'>";
		$InvoiceVar .= "&nbsp;</td>";
		$InvoiceVar .= "<td class='boldtext1' colspan=3 align='right'>";
		$InvoiceVar .= $discount . "%</td>";
		$InvoiceVar .= "</tr>";
	}
	}	 
 	$InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "Invoice Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='middle'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= $curr . $invoiceamount . "</td>";
    $InvoiceVar .= "</tr>";
	
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "Paid Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='middle'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=3 align='right'>";
    $InvoiceVar .= $curr . $paidinvoiceamount . "</td>";
    $InvoiceVar .= "</tr>";
    $InvoiceVar .= "</tbody>";
    $InvoiceVar .= "</table>";
    $InvoiceVar .= "</td>";
    $InvoiceVar .= "</tr>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='small' colspan='2'>";
    $InvoiceVar .= findsettingvalue("InvoiceFooter") . "</td>";
    $InvoiceVar .= "</tr>";
	return $InvoiceVar;
}
function sendforclearance($paymentid)
{

  $userid = getonefielddata("select CreateBy from tbldatingpaymentmaster where paymentid =$paymentid and currentstatus=0 and clear='N'");
  if ($userid != "")
  {
	    $result = getdata("select p.packageid,p.days,p.price,PackageTypeId,DATE_ADD(curdate(), INTERVAL p.days DAY) ,p.total_contact_can_view,p.package_for_uid,p.paymentdetailid from tbldatingpaymentdetail p,tbldatingpackagemaster pk where p.packageid=pk.PackageId and paymentid =$paymentid");
		while ($rs = mysqli_fetch_array($result))
	    {
		  $packageid = $rs[0];
		  $days= $rs[1];
		  $price= $rs[2];
		  $packagetypeid= $rs[3];
		  $expdate = $rs[4];
		  $total_contact_can_view= $rs[5];
		  $package_for_uid= $rs[6];
		  $paymentdetailid= $rs[7];
		

		  if ($packagetypeid == 1 || $packagetypeid == 2)
		  {
			extentmembership($packageid,$days,$userid,$expdate,$paymentid);
			if ($total_contact_can_view != "")
			view_conact_detail_package($packageid,$days,$userid,$expdate,$total_contact_can_view);
		  }
		  if ($packagetypeid == 3)
		  {
				$chk = getonefielddata("select count(balanceid) 
			from  tbl_agent_commision_unpaid_master
			where userid='".$userid."' and currentstatus=0 and invoiceid='".$paymentid."' ");
			if($chk > 0)
			{
				 execute("update tbl_agent_commision_unpaid_master set clear='Y', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'  where userid='".$userid."' and invoiceid='".$paymentid."' ");
			}
			
			enhancementpackage($packageid,$days,$userid,$expdate);
		  }
		if ($packagetypeid == 4)
		{ 
		  
			$chk = getonefielddata("select count(balanceid) 
			from  tbl_agent_commision_unpaid_master
			where userid='".$userid."' and currentstatus=0 and invoiceid='".$paymentid."' ");
			if($chk > 0)
			{
				 execute("update tbl_agent_commision_unpaid_master set clear='Y', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'  where userid='".$userid."' and invoiceid='".$paymentid."' ");
			}
		
		
		
			trustsealpackage($packageid,$days,$userid,$expdate);
			
		}
		if ($packagetypeid == 6)
		{
			manyata_package($packageid,$days,$userid,$package_for_uid,$paymentdetailid);			
			sendemaildirect($mail,$subj,$msg);
		}
			
			
		if ($packagetypeid == 7 || $packagetypeid == 8 || $packagetypeid == 9)
		{
				$chk = getonefielddata("select count(balanceid) 
			from  tbl_agent_commision_unpaid_master
			where userid='".$userid."' and currentstatus=0 and invoiceid='".$paymentid."' ");
			if($chk > 0)
			{
				 execute("update tbl_agent_commision_unpaid_master set clear='Y', createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'  where userid='".$userid."' and invoiceid='".$paymentid."' ");
			}
		
		
		
		}
			
			
			
		/*if($packagetypeid == 8)	
			custom_service_package($packageid,$days,$userid,$expdate);*/
		//if ($packagetypeid == 5)
		//	view_conact_detail_package($packageid,$days,$userid,$expdate,$total_contact_can_view);
		}
		freeingresult($result);
		execute("update tbldatingpaymentmaster set clear='Y',cleardate=now() where paymentid =$paymentid");
		//sendemail(4,$userid,generateinvoice($paymentid));
		sendemail(4,$userid,generateshubhlabhinvoicedisplay($paymentid));
 }	
}
//function made by Nishit for custom service package start
function custom_service_package($packageid,$days,$userid,$expiredate)
{
	/*$action = getonefielddata("select 
id from tbldatingusertrustsealmaster where userid=$userid and currentstatus=0");
	if ($action == "")
		$action =0;*/
	$action = $userid;	
		
	$query  ="";
	$query .= sendtogeneratequery($action,"packageid",$packageid,"Y");
	//$query .= sendtogeneratequery($action,"userid",$userid,"Y");
	$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
	//$query .= sendtogeneratequery($action,"days",$days,"Y");
	$query = substr($query,1);
	
	execute("UPDATE tbldatingusermaster SET ".$query." WHERE userid=$userid");
	
	/*if ($action ==0)
	execute("insert into tbldatingusertrustsealmaster(packageid,userid,expiredate,days,createdate) values (" . $query .",now())");
   else
execute("update tbldatingusertrustsealmaster set " . $query .",createdate=now() where id=$action");*/

}
//function end

function extentmembership($packageid,$days,$userid,$expdate,$paymentid)
{
 
  execute("update tbldatingusermaster set expiredate='$expdate',packageid=$packageid where userid =$userid");
  global $agent_module_enable;
  global $referal_module_enable;
 // if ($agent_module_enable == "Y") 
 
 	$franchisee_code = getonefielddata("select franchisee_code from  tbldatingpaymentmaster 
		where  paymentid='".$paymentid."' ");
  
if ($agent_module_enable == "Y")
{
	 update_agent_commision(3,$userid,$paymentid,$franchisee_code);
}
  
  if ($referal_module_enable == "Y")
  update_referal_commision($userid,1);

}


function trustsealpackage($packageid,$days,$userid,$expiredate)
{
	$action = getonefielddata("select 
id from tbldatingusertrustsealmaster where userid=$userid and currentstatus=0");
	if ($action == "")
		$action =0;
		
	$query  ="";
	$query .= sendtogeneratequery($action,"packageid",$packageid,"Y");
	$query .= sendtogeneratequery($action,"userid",$userid,"Y");
	$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
	$query .= sendtogeneratequery($action,"days",$days,"Y");
	$query = substr($query,1);
	if ($action ==0)
	execute("insert into tbldatingusertrustsealmaster(packageid,userid,expiredate,days,createdate) values (" . $query .",now())");
   else
execute("update tbldatingusertrustsealmaster set " . $query .",createdate=now() where id=$action");

}
function view_conact_detail_package($packageid,$days,$userid,$expiredate,$total_contact_can_view)
{
	if ($total_contact_can_view == "0")
	$total_contact_can_view ="0.0";
	
	$action = 0;
	$query  ="";
	$query .= sendtogeneratequery($action,"packageid",$packageid,"Y");
	$query .= sendtogeneratequery($action,"userid",$userid,"Y");
	$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
	$query .= sendtogeneratequery($action,"days",$days,"Y");
	
	$query .= sendtogeneratequery($action,"total_contact_can_view",$total_contact_can_view,"Y");
	$query = substr($query,1);
	execute("insert into tbldating_view_conact_package_user_master(packageid,userid,expiredate,days,total_contact_can_view,createdate) values (" . $query .",now())");
}
function enhancementpackage($packageid,$days,$userid,$expiredate)
{
	$action = 0;
	$query  ="";
	$query .= sendtogeneratequery($action,"packageid",$packageid,"Y");
	$query .= sendtogeneratequery($action,"userid",$userid,"Y");
	$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
	$query .= sendtogeneratequery($action,"days",$days,"Y");
	$query = substr($query,1);
	execute("insert into tbldatingfeaturedusermaster(packageid,userid,expiredate,days,createdate) values (" . $query .",now())");

}
function check_employee_module_enabled()
{
global $session_name_initital;
$ans ="Y";
if (findsettingvalue("Employee_module_admin_side") == "Y")
if ($_SESSION[$session_name_initital . "adminlogin_group"] != 1)
$ans ="N";
return $ans;
}
function checkadminlogin($admin_access="N")
{
global $session_name_initital;


  if (!isset($_SESSION[$session_name_initital . "adminlogin"]))
	header("location:login.php");
  elseif ($_SESSION[$session_name_initital . "adminlogin"] == "")
  	header("location:login.php");
  if (findsettingvalue("Employee_module_admin_side") == "Y")
  if ($admin_access == "Y")
  {
  	if ($_SESSION[$session_name_initital . "adminlogin_group"] != 1)
	{
		header("location:dashboard.php");
		exit();
	}
  }
  


//global $session_name_initital;
//
//  if (isset($_SESSION[$session_name_initital . "adminlogin"]) && $_SESSION[$session_name_initital . "adminlogin"]!='')
//{
////  echo $_SESSION[$session_name_initital . "adminlogin"]; exit;	
//	header("location:dashboard.php");
//
//	//exit();
//}  
////elseif($_SESSION[$session_name_initital . "adminlogin_group"] != 1 && findsettingvalue("Employee_module_admin_side") == "Y"
////&& $admin_access == "Y")
////{
////	header("location:dashboard.php");
////	 exit;
////	//	exit();
////}
//else
//{
//	  	header("location:login.php");
//		 
//	//	exit();
//}
//
//  	 exit;
}

function checkdesklogin()
{
	global $session_name_initital;
  if (!isset($_SESSION[$session_name_initital . "desklogin"]))
	header("location:login.php");
  elseif ($_SESSION[$session_name_initital . "desklogin"] == "")
  	header("location:login.php");
 /* else 
  	header("location:dashboard.php");*/
}

function image_on_request_find_status($accepted)
{
	global $image_on_request_receivedstatus1,$image_on_request_receivedstatus2,$image_on_request_receivedstatus3;
	if ($accepted == "N")
		//return $image_on_request_receivedstatus1;
		return $filenm = "express_waiting_manager.png";
	elseif ($accepted == "A")
		//return $image_on_request_receivedstatus2;
		return $filenm = "express_accepted_manager.png"; 
	elseif ($accepted == "D")
		//return $image_on_request_receivedstatus3;
		return $filenm = "express_declined_manager.png";
}
function invoiceinsert($userid,$arr_package_ids,$package_for_uid="")
{
	global $agent_module_enable;
	$action = 0;
	$ipfldnm = "CreateIP";
	$fldby = 'CreateBy';
	$flddate = 'CreateDate';
	$ip = getip();
	
	$query  ="";
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query .= sendtogeneratequery($action,"$fldby",$userid,"Y");
	
	$query = substr($query,1);
	$sSql = "insert into tbldatingpaymentmaster ($ipfldnm,$fldby,$flddate) values(" . $query .",now())"; 
	execute($sSql);
	
	$paymentid = getonefielddata("select max(paymentid) from tbldatingpaymentmaster");
	for($i=0;$i<count($arr_package_ids);$i++)
	{
		insertinvoice_packagedetail($arr_package_ids[$i],$paymentid,$package_for_uid);
	}
	$discount_percentage ="";
	if ($agent_module_enable == "Y")
		$discount_percentage = getonefielddata("select discount_percentage from tbl_agent_user_master where userid=$userid and currentstatus=0 and membership_commission_calculated='N'");
	if ($discount_percentage == "")
		$discount_percentage =0;
	
	
	$totalamount= getonefielddata("select sum(ifnull(price,0)) from tbldatingpaymentdetail where paymentid=$paymentid");
	if ($agent_module_enable == "Y")
		if ($discount_percentage >0)
		{
			$discount_percentage_amt = ($totalamount * $discount_percentage)/100;
			$totalamount = $totalamount - $discount_percentage_amt;
		}
	$action = $paymentid;
	$query  ="";
	$query .= sendtogeneratequery($action,"totalpaymentamount",$totalamount,"Y");
	$query .= sendtogeneratequery($action,"subtotal",$totalamount,"Y");
	if ($agent_module_enable == "Y")
	$query .= sendtogeneratequery($action,"agent_discount_per",$discount_percentage,"Y");
	$query = substr($query,1);
	execute("update tbldatingpaymentmaster set " . $query ." where paymentid=$paymentid");
	$refilenm  = "payment.php?b=$paymentid";
	
	//sendemail(16,"",generateinvoice($paymentid),findsettingvalue("AdminMail"));
	return $refilenm;
}

function insertinvoice_packagedetail($PackageId,$paymentid,$package_for_uid="")
{
	global $enable_tax_module;
	 
	$result = getdata("select Price,Days,no_of_contact_display,display_price,hsncode from tbldatingpackagemaster where PackageId=$PackageId");
	while($rs= mysqli_fetch_array($result))
	{
		$Price=$rs[0];
		$Days =$rs[1];
		$no_of_contact_display= $rs[2];
		$totalamount = $Price;
		$display_price = $rs[3];
		$hsncode=$rs[4]; 
	}
	freeingresult($result);
		
   $action =0;
   $query = "";
   $query .= sendtogeneratequery($action,"paymentid",$paymentid,"Y");
   $query .= sendtogeneratequery($action,"packageid",$PackageId,"Y");
   $query .= sendtogeneratequery($action,"price",$Price,"Y");
   $query .= sendtogeneratequery($action,"orignal_price",$Price,"Y");
   $query .= sendtogeneratequery($action,"days",$Days,"Y");
   $query .= sendtogeneratequery($action,"display_price",$display_price,"Y");
   
   if ($no_of_contact_display == "0")
   	$no_of_contact_display ="0.0";
   $query .= sendtogeneratequery($action,"total_contact_can_view",$no_of_contact_display,"Y");
   $query .= sendtogeneratequery($action,"package_for_uid",$package_for_uid,"Y");
   $query = substr($query,1);
  $sSql = "insert into tbldatingpaymentdetail (paymentid,packageid,price,orignal_price,days,display_price,total_contact_can_view,package_for_uid) values(".$query.")";
  execute($sSql);

}

function total_shortlist_member($CreateBy)
{	
return getonefielddata("select count(shortlistid) from tbldatingshortlistmaster,tbldatingusermaster WHERE tbldatingusermaster.currentstatus in (0,1) and tbldatingshortlistmaster.currentstatus=0 and tbldatingshortlistmaster.userid=tbldatingusermaster.userid and tbldatingshortlistmaster.createby=".$CreateBy);
}
function total_partner_profile_match($userid)
{
global $preffered_partner_match_default_days;
	$patner_query = findpartnerprofilequery($preffered_partner_match_default_days,"Y",$userid,"");
	return getonefielddata("select count(userid) from tbldatingusermaster where ".$patner_query." ". datinguserwhereque());
}


function find_profile_fill_percentage($userid)
{
	$main_image_per = 10;
	$album_create_per =10;
	$partner_profile_per =10;
	$main_profile_per =70;
	
	$image_percentage = 0;
	$album_percentage =0;
		
	$image = getonefielddata("select imagenm from tbldatingusermaster where userid=$userid");	
	if ($image != "")
		$image_percentage = $main_image_per;
	$album = getonefielddata("select count(albumid) from tbldatingalbummaster where currentstatus=0 and CreateBy=$userid");
	if ($album >0)
		$album_percentage = $album_create_per;
	
	$Religion_field_display = findsettingvalue("Religion_field_display");
	$exclude_fld="";
	if ($Religion_field_display == "H")
		$exclude_fld ="religiosness_id,hijab_id,beard_id,revert_islam_id,
halal_strict_id,salah_perform_id,gotra";
	if ($Religion_field_display == "M")
		$exclude_fld ="grahid,gotra";
	$exclude_fld_arr = explode(",",$exclude_fld);

	$partner_profile_non_blank =0;	
	$toal_partner_required_fld =0;
	$result = getdata("select * from tbldatingpartnerprofilemaster where userid =$userid");	
	$total_fields = mysqli_num_fields($result);
	while ($rs = mysqli_fetch_array($result))
	{
		for($i=0;$i<$total_fields;$i++)
		{
			$fldnm = mysqli_field_seek($result,$i);
			
		
			if (!in_array($rs,$exclude_fld_arr))
			{
				//echo $rs[$i]."<br/>";
				if (($rs[$i] != "") && ($rs[$i] != "0"))
				$partner_profile_non_blank = $partner_profile_non_blank+1;
			$toal_partner_required_fld = $toal_partner_required_fld+1;
			
			}
		}
	}
	
//	echo $partner_profile_non_blank."<br/>";
	
	
	if ($toal_partner_required_fld >0)
	$partner_percentage = ($partner_profile_non_blank * $partner_profile_per)/$toal_partner_required_fld;
	else
	$partner_percentage =0;
	
	//
	$exclude_fld="total_view_anonymous,total_view_registered_user,admin_disable_address_phone_no,imagenm,nickname,lastlogin,tabborderstyle,tabbordersize,tabbordercolor,fontname,fontsize,fontcolor,pgbackcolor,pgbackimage,tabbackcolor,thumbnil_image,annualincome,socialbookmarkcode,feedurl,,externalvideourl,externalbioprofile,totalview,private_email,private_phone_no,news_letter_subscribe,moonsign,hearaboutusid,image_password,image_password_protect,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,,instituteid,institute_other,wantchildrenid";
	
	if ($Religion_field_display == "H")
		$exclude_fld .=",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id";
	if ($Religion_field_display == "M")
		$exclude_fld .=",gotra,grahid,moonsignid,sunsignid";
		
	global $Enable_HIV_thelesima_illiness_blood_group_design_setting;
	
	if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "N")
		$exclude_fld .=",hiv,thelisimia,illiness,blood_group";
	
	global $Update_profile_Pages_design_setting;
	if ($Update_profile_Pages_design_setting == "S")
		$exclude_fld .=",service_area,contact_person_on_phone,service_location,birthtime,birthplace,callingtime,talkpreference,countryofgrewup,area,altemail,city,postcode,brother_married1,brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2,sister_unmarried1,sister_unmarried2";


	$exclude_fld_arr = explode(",",$exclude_fld);
	
	$profile_non_blank =0;	
	$toal_profile_required_fld =0;
	$result = getdata("select * from tbldatingusermaster where userid =$userid");	
	$total_fields = mysqli_num_fields($result);
	while ($rs = mysqli_fetch_array($result))
	{
		for($i=0;$i<$total_fields;$i++)
		{
			$fldnm = mysqli_field_seek($result,$i);
			
			if (!in_array($rs[$i],$exclude_fld_arr)){
				if (($rs[$i] != "") && ($rs[$i] != "0"))
					$profile_non_blank = $profile_non_blank+1;
			$toal_profile_required_fld = $toal_profile_required_fld+1;
			}
			
		}
	}
	if ($toal_profile_required_fld >0)
	$profile_percentage = ($profile_non_blank * $main_profile_per)/$toal_profile_required_fld;
	else
	$profile_percentage =0;
	
	$total_percentage = round($image_percentage + $album_percentage + $partner_percentage +$profile_percentage);
	
	//$total_percentage =100;
	return $total_percentage;

}

function find_profile_fill_percentage_bkp($userid){
/* Explanation
The profile progress bar is divided into 4 parts 

	main_image_per = 10
	album_create_per =10
	partner_profile_per =10
	main_profile_per =70

Main Profile Per : takes account profile fields in update profile and are equally 
divided into the the (70%) 
	*/
	$main_image_per = 10;
	$album_create_per =10;
	$partner_profile_per =10;
	$main_profile_per =70;
	$image_percentage = 0;
	$album_percentage =0;
		
	$image = getonefielddata("select imagenm from tbldatingusermaster where userid=$userid");
	if ($image != "")
		$image_percentage = $main_image_per;
		
	$album = getonefielddata("select count(albumid) from tbldatingalbummaster where currentstatus=0 and CreateBy=$userid");
	if ($album >0)
		$album_percentage = $album_create_per;
	
	$Religion_field_display = findsettingvalue("Religion_field_display");
	$exclude_fld="";
	if ($Religion_field_display == "H")
		$exclude_fld ="religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,gotra";
	if ($Religion_field_display == "M")
		$exclude_fld ="grahid,gotra";
	$exclude_fld_arr = explode(",",$exclude_fld);

	//echo $exclude_fld_arr; exit;


	$partner_profile_non_blank =0;	
	$toal_partner_required_fld =0;
	$result = getdata("select * from tbldatingpartnerprofilemaster where userid =$userid");	
	$total_fields = mysqli_num_fields($result);

	while ($rs = mysqli_fetch_array($result))
	{
		for($i=0;$i<$total_fields;$i++)
		{
		$fldnm = mysqli_field_seek($result,$i);		
			
			if (!in_array($fldnm,$exclude_fld_arr)){
				
			if (($rs[$i] != "") && ($rs[$i] != "0"))
			$partner_profile_non_blank = $partner_profile_non_blank+1;
			$toal_partner_required_fld = $toal_partner_required_fld+1;
			}
			}
		
	}
//	echo $partner_profile_per; exit;
	if ($toal_partner_required_fld >0)
	$partner_percentage = ($partner_profile_non_blank * $partner_profile_per)/$toal_partner_required_fld;
	else
	$partner_percentage =0;
	
	//
	$exclude_fld="total_view_anonymous,total_view_registered_user,admin_disable_address_phone_no,imagenm,nickname,lastlogin,tabborderstyle,tabbordersize,tabbordercolor,fontname,fontsize,fontcolor,pgbackcolor,pgbackimage,tabbackcolor,thumbnil_image,annualincome,socialbookmarkcode,feedurl,,externalvideourl,externalbioprofile,totalview,private_email,private_phone_no,news_letter_subscribe,moonsign,hearaboutusid,image_password,image_password_protect,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,instituteid,institute_other,wantchildrenid";
	
	if ($Religion_field_display == "M")
		$exclude_fld .=",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,denominationid,islamic_education,spiritual_order";
	if ($Religion_field_display == "H")
		$exclude_fld .=",gotra,grahid,moonsignid,sunsignid";
		
	global $Enable_HIV_thelesima_illiness_blood_group_design_setting;
	
	if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "N")
		$exclude_fld .=",hiv,thelisimia,illiness,blood_group";
	
	global $Update_profile_Pages_design_setting;
	if ($Update_profile_Pages_design_setting == "S")
		$exclude_fld .=",service_area,contact_person_on_phone,service_location,birthtime,birthplace,callingtime,talkpreference,countryofgrewup,area,altemail,city,postcode,brother_married1,brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2,sister_unmarried1,sister_unmarried2";


	$exclude_fld_arr = explode(",",$exclude_fld);
	
	$profile_non_blank =0;	
	$toal_profile_required_fld =0;
	$result = getdata("select * from tbldatingusermaster where userid =$userid");	
	$total_fields = mysqli_num_fields($result);
	while ($rs = mysqli_fetch_array($result))
	{
		for($i=0;$i<$total_fields;$i++)
		{
			$fldnm = mysqli_field_seek($result,$i);
			if (!in_array($fldnm,$exclude_fld_arr))
			{
				if (($rs[$i] != "") && ($rs[$i] != "0"))
					$profile_non_blank = $profile_non_blank+1;
			$toal_profile_required_fld = $toal_profile_required_fld+1;
			}

		}
	}
	if ($toal_profile_required_fld >0)
	$profile_percentage = ($profile_non_blank * $main_profile_per)/$toal_profile_required_fld;
	else
	$profile_percentage =0;
	
	$total_percentage = round($image_percentage + $album_percentage + $partner_percentage +$profile_percentage);	
	return $total_percentage;
}

function express_intrest_insertmydesk($touserid,$fromuserid,$createby){
	if (($touserid != "") && ($fromuserid != "")){
	global $sitepath;
	$ip =  getip();	
	$id = getonefielddata("select id from tbldatingexpressintrestmaster where touserid=$touserid and fromuserid=$fromuserid and currentstatus=0");
	if ($id == "")
	{
	$action =0;
	$query = sendtogeneratequery($action,"fromuserid",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"touserid",$touserid,"Y");
	$query .= sendtogeneratequery($action,"createby",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"createip",$ip ,"Y");
	$query = substr($query,1);
	execute("insert into tbldatingexpressintrestmaster(fromuserid,touserid,createby,createip,createdate) values(".$query.",now())");
	$id = getonefielddata("select max(id) from tbldatingexpressintrestmaster");	
	$result = getdata("select subject,message from tbldatingemailmaster where emailid =13");
	while($rs= mysqli_fetch_array($result)){ 
		$subject = $rs[0];
		$message = $rs[1];
	}
	freeingresult($result);
	$result = getdata("select name,imagenm,userid from tbldatingusermaster where userid =$fromuserid");
	while($rs= mysqli_fetch_array($result))
	{
		 $sendername = $rs[0];
		 if(enable_name_display=='N'){
				$sendername = find_profile_code($rs[2]);
		 }
		 $senderimage =find_user_image($fromuserid,"","","");
		 $senderlink = displayprofilelink($fromuserid);
	}
	freeingresult($result);
	$acceptlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=A";
	$declinlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=D";

	$receivername = getonefielddata("select name from tbldatingusermaster where userid =$touserid");
	
	if(enable_name_display=='N'){
		$receivername = find_profile_code($touserid);
	}

	$subject = str_replace("[sendername]",$sendername,$subject);
	$subject = str_replace("[senderimage]",$senderimage,$subject);
	$subject = str_replace("[senderlink]",$senderlink,$subject);
	$subject = str_replace("[receivername]",$receivername,$subject);
	$subject = str_replace("[sitename]",$sitepath,$subject);

	/*$subject = str_replace("[acceptlink]",$acceptlink,$subject);
	$subject = str_replace("[declinedlink]",$declinlink,$subject);
	*/
	$subject = str_replace("%5Bacceptlink%5D",$acceptlink,$subject);
	$subject = str_replace("%5Bdeclinedlink%5D",$declinlink,$subject);
	
	$message = str_replace("[sendername]",$sendername,$message);
	$message = str_replace("[senderimage]",$senderimage,$message);
	
	//$message = str_replace("[senderlink]",$senderlink,$message);
	$message = str_replace("%5Bsenderlink%5D",$senderlink,$message);
	$message = str_replace("[receivername]",$receivername,$message);
	
	/*$message = str_replace("[acceptlink]",$acceptlink,$message);
	$message = str_replace("[declinedlink]",$declinlink,$message);*/
	
	$message = str_replace("%5Bacceptlink%5D",$acceptlink,$message);
	$message = str_replace("%5Bdeclinedlink%5D",$declinlink,$message);
	
	$message = str_replace("[sitename]",$sitepath,$message);

	$toemailaddress = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$touserid);
	$tousernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$touserid);
	$fromnm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);
	
	$receivedemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=31");	
	$receivedemailrs = mysqli_fetch_array($receivedemaildata);
	$receiver_subj = $receivedemailrs[0];
	$receiver_msg = $receivedemailrs[1];
	
	$receiver_msg = str_replace("[name]",$tousernm,$receiver_msg);
	$receiver_msg = str_replace("[receivername]",$fromnm,$receiver_msg);
	
	sendemaildirect($toemailaddress,$receiver_subj,$receiver_msg);
	//email sent to receiver start
	$fromemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=30");
	$fromemailrs = mysqli_fetch_array($fromemaildata);
	$fromemailsubj = $fromemailrs[0];
	$fromemailmsg = $fromemailrs[1];

	$fromuseremail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernick='';
	$fromusernick = getonefielddata("SELECT nickname from tbldatingusermaster WHERE userid=".$fromuserid);

	$fromemailmsg = str_replace("[name]",$fromusernm,$fromemailmsg);
	$fromemailmsg = str_replace("[receivername]",$tousernm,$fromemailmsg);
	
	sendemaildirect($fromuseremail,$fromemailsubj,$fromemailmsg);
	//email sent to receiver end

	
	$query = sendtogeneratequery($action,"FromUserId",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"ToUserId",$touserid,"Y");
	$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
	$query .= sendtogeneratequery($action,"Message",$message,"Y");
	$query .= sendtogeneratequery($action,"ParentId",0,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
	$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");	  
	$query = substr($query,1);
   	$sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";
	execute($sSql);
	}
	}
}


function express_intrest_insert($touserid,$fromuserid,$match=''){
	if (($touserid != "") && ($fromuserid != "")){
	global $sitepath;
	$ip =  getip();	
	$id = getonefielddata("select id from tbldatingexpressintrestmaster where touserid=$touserid and fromuserid=$fromuserid and currentstatus=0");
	if ($id == "")
	{
	$action =0;
	$query = sendtogeneratequery($action,"fromuserid",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"touserid",$touserid,"Y");
	$query .= sendtogeneratequery($action,"createby",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"createip",$ip ,"Y");
	$query = substr($query,1);
	execute("insert into tbldatingexpressintrestmaster(fromuserid,touserid,createby,createip,createdate) values(".$query.",now())");
	$id = getonefielddata("select max(id) from tbldatingexpressintrestmaster");	
	$result = getdata("select subject,message from tbldatingemailmaster where emailid =13");
	while($rs= mysqli_fetch_array($result)){ 
		$subject = $rs[0];
		$message = $rs[1];
	}
	freeingresult($result);
	$result = getdata("select name,imagenm from tbldatingusermaster where userid =$fromuserid");
	while($rs= mysqli_fetch_array($result))
	{
		 $sendername = $rs[0] ;	 
		 $senderimage =find_user_image($fromuserid,"","","");
		 $senderlink = displayprofilelink($fromuserid);
	}
	freeingresult($result);
	$acceptlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=A";
	$declinlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=D";

	$receivername = getonefielddata("select name from tbldatingusermaster where userid =$touserid");

	$subject = str_replace("[sendername]",$sendername,$subject);
	$subject = str_replace("[senderimage]",$senderimage,$subject);
	$subject = str_replace("[senderlink]",$senderlink,$subject);
	$subject = str_replace("[receivername]",$receivername,$subject);
	$subject = str_replace("[sitename]",$sitepath,$subject);

	/*$subject = str_replace("[acceptlink]",$acceptlink,$subject);
	$subject = str_replace("[declinedlink]",$declinlink,$subject);
	*/
	$subject = str_replace("%5Bacceptlink%5D",$acceptlink,$subject);
	$subject = str_replace("%5Bdeclinedlink%5D",$declinlink,$subject);
	
	$message = str_replace("[sendername]",$sendername,$message);
	$message = str_replace("[senderimage]",$senderimage,$message);
	
	//$message = str_replace("[senderlink]",$senderlink,$message);
	$message = str_replace("%5Bsenderlink%5D",$senderlink,$message);
	$message = str_replace("[receivername]",$receivername,$message);
	
	/*$message = str_replace("[acceptlink]",$acceptlink,$message);
	$message = str_replace("[declinedlink]",$declinlink,$message);*/
	
	$message = str_replace("%5Bacceptlink%5D",$acceptlink,$message);
	$message = str_replace("%5Bdeclinedlink%5D",$declinlink,$message);
	
	$message = str_replace("[sitename]",$sitepath,$message);
	
	if($match=='N'){
		$match_msg = "the member ".$fromusernick." tried to contact you, but does not meet your partner criteria.";
	} else {
		$match_msg = '';	
	}

	$toemailaddress = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$touserid);
	$tousernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$touserid);
	$fromnm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);
	
	if(enable_name_display=='N'){
		$fromnm = find_profile_code($fromuserid);
		$tousernm = find_profile_code($touserid);
	}
	
	$receivedemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=31");	
	$receivedemailrs = mysqli_fetch_array($receivedemaildata);
	$receiver_subj = $receivedemailrs[0];
	$receiver_msg = $receivedemailrs[1];
	if($match_msg!=''){
		$receiver_msg = $match_msg.$receiver_msg;	
	}
	$receiver_msg = str_replace("[name]",$tousernm,$receiver_msg);
	$receiver_msg = str_replace("[receivername]",$fromnm,$receiver_msg);
	
	sendemaildirect($toemailaddress,$receiver_subj,$receiver_msg);
	//email sent to receiver start
	$fromemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=30");
	$fromemailrs = mysqli_fetch_array($fromemaildata);
	$fromemailsubj = $fromemailrs[0];
	$fromemailmsg = $fromemailrs[1];

	$fromuseremail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernick = getonefielddata("SELECT nickname from tbldatingusermaster WHERE userid=".$fromuserid);

	$fromemailmsg = str_replace("[name]",$fromusernm,$fromemailmsg);
	$fromemailmsg = str_replace("[receivername]",$tousernm,$fromemailmsg);
	
	sendemaildirect($fromuseremail,$fromemailsubj,$fromemailmsg);
	//email sent to receiver end

	$message = $match_msg.$message;
	$query = sendtogeneratequery($action,"FromUserId",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"ToUserId",$touserid,"Y");
	$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
	$query .= sendtogeneratequery($action,"Message",$message,"Y");
	$query .= sendtogeneratequery($action,"ParentId",0,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
	$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");	  
	$query = substr($query,1);
   	$sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";
	execute($sSql);
	}
	}
}
function favorite_insert($touserid,$fromuserid)
{
	if (($touserid != "") && ($fromuserid != ""))
	{
		$ShortlistId = getonefielddata("select ShortlistId from tbldatingshortlistmaster where UserId=$touserid and CreateBy=$fromuserid and CurrentStatus=0");
		if ($ShortlistId == "")
		{
			$action =0;
			$query = sendtogeneratequery($action,"UserId",$touserid,"Y");
			$query .= sendtogeneratequery($action,"CreateBy",$fromuserid,"Y");
			$query .= sendtogeneratequery($action,"sel_id","Pending for Request","Y");
			$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
			$query = substr($query,1);
			execute("insert into tbldatingshortlistmaster (UserId,CreateBy,sel_id,CreateIP,CreateDate) values(" . $query .",now())");
		}
	}
}
function user_search_query_keywod($keyword)
{
	return " (email like '%$keyword%' or password like '%$keyword%' or name like '%$keyword%' or state like '%$keyword%' or altemail like '%$keyword%' or mobile like '%$keyword%' or city like '%$keyword%' or postcode like '%$keyword%' or nickname like '%$keyword%' or subcast like '%$keyword%' or annualincome like '%$keyword%' or area like '%$keyword%' or personality like '%$keyword%' or familybackground like '%$keyword%' or profileheadline like '%$keyword%' or hobbiesintrest like '%$keyword%' or zodiacsign like '%$keyword%' or gotra like '%$keyword%' or birthplace like '%$keyword%' or moonsign like '%$keyword%' or phno like '%$keyword%' or callingtime like '%$keyword%' or father_occupation like '%$keyword%' or mother_occupation like '%$keyword%' or brother_married1 like '%$keyword%' or brother_married2 like '%$keyword%' or brother_unmarried1 like '%$keyword%' or brother_unmarried2 like '%$keyword%' or sister_married1 like '%$keyword%' or sister_married2 like '%$keyword%' or sister_unmarried1 like '%$keyword%' or sister_unmarried2 like '%$keyword%' or hiv like '%$keyword%' or thelisimia like '%$keyword%' or illiness like '%$keyword%' or education_detail like '%$keyword%' or occupation_detail like '%$keyword%') and ";
}
function make_profile_search_query($from_user_id,$searchque)
{
		$blocked_userid ="";
if ($from_user_id !=0)
{
	$result = getdata("select to_userid from tbl_user_blacklist_master where currentstatus =0 and from_user_id=$from_user_id ");
	while($rs= mysqli_fetch_array($result))
	{
		if ($blocked_userid != "")
			$blocked_userid = $blocked_userid .",";
		$blocked_userid = $blocked_userid . $rs[0];
	}
}
if ($blocked_userid != "")
	$searchque = " tbldatingusermaster.userid not in ($blocked_userid) and " . $searchque;
	return $searchque;
}
function from_que_search_result($searchque,$ordby,$userid)
{		
		$searchque = make_profile_search_query($userid,$searchque);
		$ret_que = "from tbldatingusermaster where $searchque ". datinguserwhereque();
		if ($ordby != "")
			$ret_que .= " order by $ordby ";
		return  $ret_que;
}


//function create by Nishit for horoscope
function upload_user_horoscope($ctrlnm,$userid)
{
if(isset($_FILES[$ctrlnm]['tmp_name']))
{
	global $siteuploadfilepath;
	$ext = strtolower(substr(strrchr($_FILES[$ctrlnm]['name'],"."),1));
	
	
	if (($ext == "jpg") || ($ext =="jpe") || ($ext == "gif") || ($ext == "png") || $ext = "pdf")
	{
	if ($_FILES[$ctrlnm]["size"] / 1024 < findsettingvalue("File_upload_size"))
	{		
	$filenm = "userhoroscope" . $userid . ".$ext";	
	$filenm_temp = "userhoroscope" . $userid . ".$ext";
	if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp))
	unlink("$siteuploadfilepath" . "/" . $filenm_temp);	
	copy($_FILES[$ctrlnm]['tmp_name'],"$siteuploadfilepath" . "/" .$filenm);
	$filenmsave = "userhoroscope" . $userid . ".$ext";	
	//$filenm = generatewatermarkimagetextimage($filenm ,$filenmsave,$ext);	
	//$filenm_temp_thumb = "userpicture_thumbnil_temp" . $userid . ".$ext";
	//$filenm_thumb = "userpicture_thumbnil" . $userid . ".$ext";
	//$filenm_temp_thumb = scale_image($filenm_temp,$filenm_temp_thumb);
	//$filenm_thumb = generatewatermarkimagetextimage($filenm_temp_thumb ,$filenm_thumb,$ext);
	$action = $userid;
	$query = sendtogeneratequery($action,"horoscope",$filenm,"Y");
	//$query .= sendtogeneratequery($action,"thumbnil_image",$filenm_thumb,"Y");
	updateprofile($query,$userid);
	
	//if (file_exists("$siteuploadfilepath" . "/" . $filenm_temp_thumb))
	//unlink("$siteuploadfilepath" . "/" . $filenm_temp_thumb);
	} /*else {
		echo "higher";
		exit;
	}*/
	}
}
}

//function create by Nishit for horoscope


//function added by Nishit for Education
function filleducombo($selectval){
	$result = getdata("SELECT id,title from tbl_education_category_master WHERE currentstatus=0;"); ?>
	<option value="">Select</option>
	<?
	while($rs = mysqli_fetch_array($result)){ ?>
	<optgroup label="<?=$rs['title']?>" sytle="font-weight:normal">
	<?
	$resu = getdata("SELECT id,title from tbl_education_master WHERE currentstatus=0 AND cat_id=".$rs['id']);
	while($r = mysqli_fetch_array($resu)){ 
		if($selectval==$r['id']){
			$sel = 'selected="selected"';
		} else {
			$sel = "";
		}
	?>
		<option value="<?=$r['id']?>" <?=$sel?>><?=$r['title']?></option>
	<?	
	}
	 ?>
	 </optgroup>
<?	
}	
}

function filleducombo_title($selectval){
	$result = getdata("SELECT id,title from tbl_education_category_master WHERE currentstatus=0;"); ?>
	<option value="">Select</option>
	<?
	while($rs = mysqli_fetch_array($result)){ ?>
	<optgroup label="<?=$rs['title']?>" sytle="font-weight:normal">
	<?
	$resu = getdata("SELECT title,title from tbl_education_master WHERE currentstatus=0 AND cat_id=".$rs['id']);
	while($r = mysqli_fetch_array($resu)){ 
		if($selectval==$r['title']){
			$sel = 'selected="selected"';
		} else {
			$sel = "";
		}
	?>
		<option value="<?=$r['title']?>" <?=$sel?>><?=$r['title']?></option>
	<?	
	}
	 ?>
	 </optgroup>
<?	
}	
}
?>
<?php /*?>function filloccupationcombo($selectval){
 ?>
	<option value="">Select</option>
	
	
	<?
	$resu = getdata("SELECT id,title from tbl_occupation_master WHERE currentstatus=0 ");
	while($r = mysqli_fetch_array($resu)){ 
		if($selectval==$r['id']){
			$sel = 'selected="selected"';
		} else {
			$sel = "";
		}
	?>
		<option value="<?=$r['id']?>" <?=$sel?>><?=$r['title']?></option>
	<? } ?>
    
<?	
}<?php */?>


<?
function filloccupationcombo_title($selectval){

	?>
    
	<option value="">Select</option>
	<?
	$resu = getdata("SELECT title,title from tbldatingoccupationmaster WHERE currentstatus=0 ");
	while($r = mysqli_fetch_array($resu)){ 
		if($selectval==$r['title']){
			$sel = 'selected="selected"';
		} else {
			$sel = "";
		}
	?>
		<option value="<?=$r['title']?>" <?=$sel?>><?=$r['title']?></option>
	<?	
}	
}

function findihtitle($field,$tablename){	

	$qry = getdata("SELECT title from $tablename WHERE id IN ('".$field."')");
	$ret = "";
	while($rs = mysqli_fetch_array($qry)){
		$ret .= $rs['title'].",";	
	}
	$ret = substr($ret,0,-1);
	return $ret;
	
}
function generateshubhlabhinvoicedisplay($invoiceid)
{
 	global $sitepath;
	$logo = findsettingvalue("Logo_filenm");
    $curr = findsettingvalue("CurrencySymbol");
    $companyname = findsettingvalue("CompanyName");
	$companyaddress = findsettingvalue("CompanyAddress");    
    $InvoiceVar = "<style>";
    $InvoiceVar .= ".tableborder1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px solid #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .=".boldtext1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".parabig1 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #000000;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".topbottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px solid #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext2 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 18px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".boldtext3 {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "border: 1px none #666666;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".bottomborder {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 12px;";
    $InvoiceVar .= "color: #222222;";
    $InvoiceVar .= "font-weight: bold;";
    $InvoiceVar .= "border-top: 1px none #666666;";
    $InvoiceVar .= "border-right: 1px none #666666;";
    $InvoiceVar .= "border-bottom: 1px solid #666666;";
    $InvoiceVar .= "border-left: 1px none #666666;";
    $InvoiceVar .= "}";
    $InvoiceVar .= ".small {";
    $InvoiceVar .= "font-family: Arial, Helvetica, sans-serif;";
    $InvoiceVar .= "font-size: 10px;";
    $InvoiceVar .= "color: #333333;";
    $InvoiceVar .= "}";
    $InvoiceVar .= "</style>";
    $InvoiceVar .= "<table cellspacing='7' cellpadding='5' width='670' border='0'>";
    $InvoiceVar .= "<tbody>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='tableborder1' align='middle' colspan='2'>";
	$InvoiceVar .= "<table width='100%' cellpadding='0' cellspacing='0' border='0'>";
	$InvoiceVar .= "<tr><td width='50'><img src=".$sitepath."uploadfiles/".$logo ." border='0' align='absmiddle' />&nbsp;</td>";
	$InvoiceVar .= "<td class='parabig1'><span class='boldtext2'>" . $companyname . "</span>";
    $InvoiceVar .="<br />";
    $InvoiceVar .= $companyaddress . "</td></tr></table></td>";
    $InvoiceVar .="</tr>";
    $InvoiceVar .="<tr valign='top'>";
    $InvoiceVar .="<td class='tableborder1' width='331'>";
    $InvoiceVar .="<span class='boldtext1'>Bill / Ship To : </span>";
    //$InvoiceVar .="<br />";
 
    //$result = getdata("select date_format(paymentdate, '%m-%d-%Y'),totalpaymentamount,paidamount,name,address,city,area,countryid,postcode,state from tbldatingpaymentmaster,tbldatingusermaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid and paymentid =$invoiceid");
	global $date_format;	
	$result = getdata("select date_format(tbldatingpaymentmaster.CreateDate, '$date_format'),totalpaymentamount,paidamount,name,city,area,countryid,postcode,state,profile_code,email,mobile,tbldatingpaymentmaster.CreateBy,address,date_format(tbldatingusermaster.createdate,'$date_format'),date_format(tbldatingusermaster.expiredate,'$date_format'),postcode,tbldatingpackagemaster.display_price,tbldatingpaymentmaster.promo_code,tbldatingpackagemaster.display_price_curr_code,tbldatingpaymentmaster.display_amount from tbldatingpaymentmaster,tbldatingusermaster,tbldatingpaymentdetail,tbldatingpackagemaster  where tbldatingpaymentmaster.CreateBy=tbldatingusermaster.userid AND tbldatingpaymentmaster.paymentid=tbldatingpaymentdetail.paymentid AND tbldatingpaymentdetail.packageid=tbldatingpackagemaster.packageid and tbldatingpaymentmaster.paymentid =$invoiceid");
	while ($rs = mysqli_fetch_array($result))
	{
		$invoicedate = $rs[0];
	  	$invoiceamount = $rs[1];
	  	//$paidinvoiceamount = $rs[2];
		$paidinvoiceamount = $rs['display_amount'];
		$name = $rs[3];
		if($rs[4]!="0.0" && $rs[4]!='' && is_numeric($rs[4])){
			$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[4]);
		} else {
			$city = "";
		}		
	  	$area = $rs[5];
	  	$country ="";
	  	if ($rs[6] != "")
	  		$country = getonefielddata("select title from tbldatingcountrymaster where id=".$rs[6]);
			$pin ="";
	  	if ($rs[7] !="")
	  	$pin = "pin : " . $rs[7];
		if($rs[8]!=""){
			if($rs[8]!="0.0"){
				$state = getonefielddata("SELECt title from tbldating_state_master WHERE id=".$rs[8]);	
			} else {
				$state = "";	
			}
		} else {
			$state = "";	
		}
		
		$profile_code = $rs[9];
		$email = $rs[10];
		$phone = $rs[11];
		$profile_code = find_profile_code($rs[12]);
		$address = $rs[13];
		$createdate = $rs[14];
		$expiredate = $rs[15];
		$curr = $rs['display_price_curr_code'];
    }  
	freeingresult($result);       
    /*$InvoiceVar .=  "Mr/Ms." . $name . "<br />";
	$InvoiceVar .=  "Profile Code. - " . $profile_code . "<br />";*/
	$InvoiceVar .=  $profile_code."<br>";
	$InvoiceVar .=  "<b>Email Id :</b> - " . $email . "<br />";
	$InvoiceVar .=  "<b>Mobile No. : </b> - " . $phone . "<br />";
    $InvoiceVar  .= "<b>Address </b>- ".$address;
	$InvoiceVar  .= $area . "<br>";
	$InvoiceVar  .= $city . "<br>";
    $InvoiceVar  .= $state . ",";
    $InvoiceVar  .= $country . "<br>";
    $InvoiceVar  .= "<b>PIN :</b> ".substr($pin,6)."<br>";
    $InvoiceVar  .= "</td>";
    $InvoiceVar  .= "<td class='tableborder1' width='298'>";
    $InvoiceVar  .= "<span class='boldtext3'>Invoice ID : " . $invoiceid . "</span>";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<br />";
    $InvoiceVar  .= "<span class='boldtext3'>Date : " . $invoicedate . "</span>";
    $InvoiceVar  .= "<br/>";
    $InvoiceVar  .= "<br/>";
	$InvoiceVar  .= "<span class='boldtext3'>Membership Start Date : " . $createdate . "</span>";
    $InvoiceVar  .= "<br/>";
    $InvoiceVar  .= "<br/>";
	$InvoiceVar  .= "<span class='boldtext3'>Membership Exp. Date : " . $expiredate . "</span>";
    $InvoiceVar  .= "<br/>";
    $InvoiceVar  .= "<br/>";             
	$InvoiceVar       .= "</tr>";
    $InvoiceVar       .= "<tr valign='top'>";
    $InvoiceVar       .= "<td class='tableborder1' colspan='2'>";
    $InvoiceVar       .= "<table cellspacing='0' cellpadding='3' width='100%' border='0'>";
    $InvoiceVar       .= "<tbody>";
    $InvoiceVar       .= "<tr valign='top'>";
	$InvoiceVar       .= "<td class='bottomborder' width='13%'>";
    $InvoiceVar       .= "No.</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='33%'>";
    $InvoiceVar       .= "Transactions Details</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='8%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' width='8%'>";
    $InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='center' width='9%'>";
    //$InvoiceVar       .= "Days</td>";
	$InvoiceVar       .= "&nbsp;</td>";
    $InvoiceVar       .= "<td class='bottomborder' align='right' width='28%'>";
    $InvoiceVar       .= "Amount ( ". $curr ." )</td>";
    $InvoiceVar       .= "</tr>";
  	 
    $totqty =0;
	
	
	$result = getdata("select tbldatingpackagemaster.Description,tbldatingpaymentdetail.days,tbldatingpaymentdetail.Price from tbldatingpaymentdetail,tbldatingpackagemaster where tbldatingpaymentdetail.packageid=tbldatingpackagemaster.PackageId and paymentid =$invoiceid");
	$i =1;	
	while ($rs = mysqli_fetch_array($result))
	{
		$packagename = $rs[0];
		$days = $rs[1];
		$price = $rs[2];
		
		
    $InvoiceVar  .= "<tr valign='top'>";
	$InvoiceVar  .= "<td class='parabig1'>$i</td>";
    $InvoiceVar  .= "<td class='parabig1'>$packagename</td>";
    $InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	$InvoiceVar  .= "<td class='parabig1'>&nbsp;</d>";
	//$InvoiceVar  .= "<td class='parabig1' align='center'>$days</d>";
	$InvoiceVar  .= "<td class='parabig1' align='center'></d>";
    $InvoiceVar  .= "<td class='parabig1' align='right'>".number_format($price,2)."</td>";
    $InvoiceVar  .= "</tr>";
	$i++;
	}
	freeingresult($result);
	$totalamount = getonefielddata("SELECT sum(price) from tbldatingpaymentdetail WHERE paymentid=".$invoiceid);
	$discount_v = getonefielddata("SELECT sum(discount_v) from tbldatingpaymentdetail WHERE paymentid=".$invoiceid);
	$InvoiceVar .="<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=4 align='right'>";
    $InvoiceVar .= "Total :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right' colspan=4>";
    $InvoiceVar .= " ".number_format($totalamount,2)." </td></tr>";
	
	/*$InvoiceVar .="<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=4 align='right'>";
    $InvoiceVar .= "Others :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td></tr>";*/
	
	global $agent_module_enable;
	if ($agent_module_enable == "Y") 
	{ 
		$discount = getonefielddata("select agent_discount_per from tbldatingpaymentmaster where currentstatus =0 and paymentid=$invoiceid");
	if($discount==""){
		$get_promo = getonefielddata("SELECT promo_code from tbldatingpaymentmaster WHERE paymentid=$invoiceid");
		if($get_promo!=""){
			$pkg_amnt = getonefielddata("SELECT sum(price) from tbldatingpaymentdetail WHERE paymentid=".$invoiceid);
			$totalpaymentamount = getonefielddata("SELECT sum(totalpaymentamount) from tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
			$discount = $pkg_amnt - $totalpaymentamount;
		}
	}
    $InvoiceVar .= "<tr valign='top'>";		
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=4 align='right'>";
    $InvoiceVar .= "Discount : </td>";
    $InvoiceVar .= "<td class='boldtext1'  align='right'>";
	if($discount_v!=""){
    	//$InvoiceVar .= $curr . " " . $discount . "</td>";
		$InvoiceVar .= number_format($discount_v,2) . "</td>";
	} else {
		$InvoiceVar .= "&nbsp;</td>";
	}
    $InvoiceVar .= "</tr>";
	}
	if($paidinvoiceamount=="")	 {
		$paidinvoiceamount = $totalamount;	
	}
 	$InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=4 align='right'>";
    $InvoiceVar .= "Invoice Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    //$InvoiceVar .= $curr . $invoiceamount . "</td>";
	$InvoiceVar .= $curr . number_format($paidinvoiceamount,2) . "</td>";
    $InvoiceVar .= "</tr>";
	
	$cleared = getonefielddata("SELECT clear from tbldatingpaymentmaster WHERE paymentid=".$invoiceid);
	if($cleared=='Y'){	
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";
    $InvoiceVar .= "&nbsp;</td>";
    $InvoiceVar .= "<td class='boldtext1' colspan=4 align='right'>";
    $InvoiceVar .= "Paid Amount :</td>";
    $InvoiceVar .= "<td class='boldtext1' align='right'>";	
    $InvoiceVar .= $curr . $paidinvoiceamount . "</td>";
    $InvoiceVar .= "</tr>";
	}
    $InvoiceVar .= "</tbody>";
    $InvoiceVar .= "</table>";
    $InvoiceVar .= "</td>";
    $InvoiceVar .= "</tr>";
    $InvoiceVar .= "<tr valign='top'>";
    $InvoiceVar .= "<td class='small' colspan='2'>";
    $InvoiceVar .= findsettingvalue("InvoiceFooter") . "</td>";
    $InvoiceVar .= "</tr>";
	return $InvoiceVar;
}
function pmbmessage($uid,$subject){
	$toemail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$uid);
	$msg = "Dear, <br>You have message in your inbox, plesae check it.<br> <br>Thanks";
	sendemaildirect($toemail,$subject,$msg);	
}
function calculateage($birthday){   
    	return floor((time() - strtotime($birthday))/31556926);   
}
function insertintomessanger($uid,$curruserid){
	$chkchatexist = getonefielddata("SELECT messangerid from tbldatingmessangermaster WHERE currentstatus=0 AND fromuserid=".$uid." AND touserid=".$curruserid);
	if($chkchatexist==''){
		execute("INSERT into tbldatingmessangermaster SET fromuserid=".$uid.", touserid=".$curruserid.", block='N', createdate='".date('Y-m-d')."', createip='".$_SERVER['REMOTE_ADDR']."', createby=".$uid);

		execute("INSERT into tbldatingmessangermaster SET fromuserid=".$curruserid.", touserid=".$uid.", block='N', createdate='".date('Y-m-d')."', createip='".$_SERVER['REMOTE_ADDR']."', createby=".$curruserid);
	}
}

function express_intrest_insert_reminder($touserid,$fromuserid,$id){
	$action=$id;
	
	if (($touserid != "") && ($fromuserid != "")){
	global $sitepath;
	$ip =  getip();
	
	$result = getdata("select subject,message from tbldatingemailmaster where emailid =13");
	while($rs= mysqli_fetch_array($result)){ 
		$subject = $rs[0];
		$message = $rs[1];
	}
	freeingresult($result);
	$result = getdata("select name,imagenm from tbldatingusermaster where userid =$fromuserid");
	while($rs= mysqli_fetch_array($result))
	{
	 $sendername = $rs[0] ;
	 $senderimage =find_user_image($fromuserid,"","","");
	 $senderlink = displayprofilelink($fromuserid);
	}
	freeingresult($result);
	$acceptlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=A";
	$declinlink = $sitepath . "express_intrest_received_action.php?b=$id&b1=D";

	$receivername = getonefielddata("select name from tbldatingusermaster where userid =$touserid");

	$subject = str_replace("[sendername]",$sendername,$subject);
	$subject = str_replace("[senderimage]",$senderimage,$subject);
	$subject = str_replace("[senderlink]",$senderlink,$subject);
	$subject = str_replace("[receivername]",$receivername,$subject);
	$subject = str_replace("[sitename]",$sitepath,$subject);

	$subject = str_replace("%5Bacceptlink%5D",$acceptlink,$subject);
	$subject = str_replace("%5Bdeclinedlink%5D",$declinlink,$subject);

	$message = str_replace("[sendername]",$sendername,$message);
	$message = str_replace("[senderimage]",$senderimage,$message);

	$message = str_replace("%5Bsenderlink%5D",$senderlink,$message);
	$message = str_replace("[receivername]",$receivername,$message);

	$message = str_replace("%5Bacceptlink%5D",$acceptlink,$message);
	$message = str_replace("%5Bdeclinedlink%5D",$declinlink,$message);

	$message = str_replace("[sitename]",$sitepath,$message);

	$toemailaddress = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$touserid);
	$tousernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$touserid);
	$fromnm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);

	$receivedemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=35");
	$receivedemailrs = mysqli_fetch_array($receivedemaildata);
	$receiver_subj = $receivedemailrs[0];
	$receiver_msg = $receivedemailrs[1];
	
	if(enable_name_display=='Y'){
		$fromnm = find_profile_code($fromuserid);
		$tousernm = find_profile_code($touserid);
	}
	
	$receiver_msg = str_replace("[name]",$tousernm,$receiver_msg);
	$receiver_msg = str_replace("[receivername]",$fromnm,$receiver_msg);
	
	sendemaildirect($toemailaddress,$receiver_subj,$receiver_msg);

	$fromemaildata = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=34");
	$fromemailrs = mysqli_fetch_array($fromemaildata);
	$fromemailsubj = $fromemailrs[0];
	$fromemailmsg = $fromemailrs[1];

	$fromuseremail = getonefielddata("SELECT email from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernm = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$fromuserid);
	$fromusernick = getonefielddata("SELECT nickname from tbldatingusermaster WHERE userid=".$fromuserid);

	$fromemailmsg = str_replace("[name]",$fromusernm,$fromemailmsg);
	$fromemailmsg = str_replace("[receivername]",$tousernm,$fromemailmsg);
	sendemaildirect($fromuseremail,$fromemailsubj,$fromemailmsg);
	
	$query = sendtogeneratequery($action,"FromUserId",$fromuserid,"Y");
	$query .= sendtogeneratequery($action,"ToUserId",$touserid,"Y");
	$query .= sendtogeneratequery($action,"Subject",$subject,"Y");
	$query .= sendtogeneratequery($action,"Message",$message,"Y");
	$query .= sendtogeneratequery($action,"ParentId",0,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
	$query .= sendtogeneratequery($action,"MessageStatus",1,"Y");
	  
      $query = substr($query,1);
   	  $sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,ParentId,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";
	  execute($sSql);	
	}
}
function pmp_insert_message_common($Fromuser,$touserid,$Subject,$Message)
{
	$action = 0;
	 $ip = getip(); 
	  $query = sendtogeneratequery($action,"FromUserId",$Fromuser,"Y");
	  $query .= sendtogeneratequery($action,"ToUserId",$touserid,"Y");
	  $query .= sendtogeneratequery($action,"Subject",$Subject,"Y");
	  $query .= sendtogeneratequery($action,"Message",$Message,"Y");
	  $query .= sendtogeneratequery($action,"CreateIP",$ip,"Y");
      $query .= sendtogeneratequery($action,"MessageStatus",1,"Y");
	  
      $query = substr($query,1);
   	  $sSql = "insert into tbldatingpmbmaster(FromUserId,ToUserId,Subject,Message,CreateIP,MessageStatus,CreateDate) values(" . $query .",now())";	  	  
	  execute($sSql);
	  
	  pmbmessage($touserid,$Subject);
}

/*if (isset($_GET["b"]) && $_GET["b"] != "" && is_numeric($_GET["b"]))
{
	$invoiceid = $_GET["b"];
	$chekvalidpaymentid = getonefielddata("select paymentid from tbldatingpaymentmaster where paymentid=$invoiceid and CreateBy=$curruserid and currentstatus=0");
	if ($chekvalidpaymentid != ""){
		if($same_currency_code=="N"){
			$invoice = generateshubhlabhinvoicedisplay($invoiceid);
		} else {
			$invoice = generateshubhlabhinvoice($invoiceid);
		}
	}
}*/
function percentage($int1, $int2){
     $per = $int1 / $int2;
     $res = round($per * 100);
     return $res;
}
function resizeimage($imagenm,$type,$max_width,$max_height,$target_file){
	switch(strtolower($type)){
		case 'image/jpeg':
			$image = imagecreatefromjpeg($imagenm);
			break;
		case 'image/png':
			$image = imagecreatefrompng($imagenm);
			break;
		case 'image/gif':
			$image = imagecreatefromgif($imagenm);
			break;
		default:
			exit('Unsupported type: '.$_FILES['image']['type']);
	}
	
	// Get current dimensions
	$old_width  = imagesx($image);
	$old_height = imagesy($image);
	
	// Calculate the scaling we need to do to fit the image inside our frame
	$scale      = min($max_width/$old_width, $max_height/$old_height);
	
	// Get the new dimensions
	$new_width  = ceil($scale*$old_width);
	$new_height = ceil($scale*$old_height);
	
	// Create new empty image
	$new = imagecreatetruecolor($new_width, $new_height);
	
	// Resize old image into new
	imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		
	// Catch the imagedata
	ob_start();
	//imagejpeg($new, NULL, 90);
	imagejpeg($new, $target_file, 90);
	return $data = ob_get_clean();		
}
function fillcombomul($sSql,$selectval,$dispstr)
{
  if ($dispstr !="")
  { ?>
	<option value="0.0"><?php echo($dispstr) ?></option>
  <?php }  
  $result = getdata($sSql);
  while ($rs = mysqli_fetch_array($result))
	{		
		$val=strrpos($selectval,$rs[0]);
		if ($val>='-1')
			$s ="selected";
		else
			$s ="";
		?>
		<option value="<?php echo($rs[0]) ?>" <?php echo($s) ?>><?php echo($rs[1]) ?></option>
		<?php
	}
	freeingresult($result);
}
function worklogentry($empid,$touserid,$fromuserid,$description){
	global $session_name_initital;
	$desklogin = 0;
	if(isset($_SESSION[$session_name_initital.'desklogin']) && $_SESSION[$session_name_initital.'desklogin']!=''){
		$desklogin = $_SESSION[$session_name_initital.'desklogin'];
	}
	$logintype = '';
	if($empid==1){
		$logintype = 'Admin';	
	} else {
		$logintype = 'Employee';	
	}
	$sql = "INSERT into tbldatingwork_master SET empid='".$empid."', logintype='".$logintype."', touserid='".$touserid."', userid='".$fromuserid."', description='".$description."', currentstatus=7, loginid=".$desklogin.", work_date=curdate()";
	execute($sql);
}
function activitylogentry($empid,$fromuserid,$description){
	$sql = "INSERT into tbldatingactivity_logmaster SET empid='".$empid."', userid=".$fromuserid.", description='".$description."', work_date=now(), createdate=curdate(), createby=".$empid.", createip='".$_SERVER['REMOTE_ADDR']."'";
	execute($sql);
}



function get_homepage_images($pgnm)
{


$get_homepageimg = getdata("SELECT title,link,description,title1 from tbl_homepage_images WHERE currentstatus=0 AND pagenm='".$pgnm."'");
$get_rs = mysqli_fetch_array($get_homepageimg);
        $image=$get_rs[0];
		$link = $get_rs[1];
	    $description = $get_rs[2];
		$title1 = $get_rs[3];
		return array($image, $link, $description,$title1);

}

function get_payment_settings_key($id)
{
   
                $paymenttypeid= ''; 
				$description= ''; 
				$imgnm= ''; 
			    $merchant_key= '';          
				$authentication_key= '';    
				$link= '';                   
				$owner_key= ''; 
   
   $sql = getdata("select paymenttypeid,description,imgnm,key1,key2,key3,key4 from tbldatingpaymenttypemaster where currentstatus =0 and paymenttypeid='".$id."'");
		
		while ($rs = mysqli_fetch_array($sql))
		{ 
		        $paymenttypeid= $rs['paymenttypeid']; 
				$description= $rs['description']; 
				$imgnm= $rs['imgnm']; 
			    $merchant_key= $rs['key1'];            //MERCHANT_KEY 
			    $authentication_key= $rs['key2'];         //Authentication KEY
			    $link= $rs['key3'];   //link
			    $owner_name= $rs['key4'];            //owner_name  
				      		
		return array( $paymenttypeid, $description, $imgnm, $merchant_key,$authentication_key,$link,$owner_name);
		}
  
  
  
}

	function display_billing_info($invoiceid,$curruserid,$taxtype,$promocode,$franchiseecode)
	{
		global $enable_tax_module,$siteuploadfilepath_new,$sitepath;
		$discountchk = getonefielddata("select discount_v from tbldatingpaymentdetail where paymentid='".$invoiceid."' ");		
		
		$CreateBy = getonefielddata("select CreateBy from tbldatingpaymentmaster where paymentid='".$invoiceid."' ");		
		$totalpaymentamount = getonefielddata("select totalpaymentamount from tbldatingpaymentmaster where paymentid='".$invoiceid."' ");		



			$logo = findsettingvalue("invLogo_filenm");
			$curr = findsettingvalue("CurrencySymbol");
			$companyname = findsettingvalue("CompanyName");
			$companyaddress = findsettingvalue("CompanyAddress");
			$companyPAN = findsettingvalue("tax_pan");
			$companyGST = findsettingvalue("tax_gstno");
			$CreateDate = getonefielddata("select CreateDate from tbldatingpaymentmaster where paymentid='".$invoiceid."' ");		
	
	$new_paymetid='';		
	$new_paymetid2 = getonefielddata("select new_paymetid2 from tbldatingpaymentmaster where  paymentid='".$invoiceid."' ");		
	$new_paymetid1 = $invoiceid;
	
	
	if($new_paymetid2!='')
	{
	$prefix_invid = getonefielddata("select new_paymetid from tbldatingpaymentmaster where  paymentid='".$invoiceid."' ");		
		$new_paymetid=$prefix_invid.$new_paymetid2;		
	}
	else if($new_paymetid1!='')
	{
		$new_paymetid=$new_paymetid1;		
	}
	
		

		if($curruserid==0)
		{
		
		}
		elseif($CreateBy!=$curruserid)
		{
			header("location:message.php?b=104");
			exit;
		}
		
		
		if($taxtype=='cgst')
		{ 
			$tbl_th  ='<th width="30%">Services</th>';
			$tbl_th .='<th width="10%">Qty</th>';
			$tbl_th .='<th width="15%">Price</th>';
			if($discountchk!='')
			{
				$tbl_th .='<th width="15%">Discount</th>';
			}
			$tbl_th .='<th width="15%">CGST</th>';
			$tbl_th .='<th width="15%">SGST</th>';
		}
		elseif($taxtype=='cess2')
		{ 
			$tbl_th  ='<th width="30%">Services</th>';
			$tbl_th .='<th width="10%">Qty</th>';
			$tbl_th .='<th width="15%">Price</th>';
			if($discountchk!='')
			{
				$tbl_th .='<th width="15%">Discount</th>';
			}
			$tbl_th .='<th width="15%">Tax</th>';
		}
		elseif($taxtype=='igst')
		{ 
			$tbl_th  ='<th width="30%">Services</th>';
			$tbl_th .='<th width="10%">Qty</th>';
			$tbl_th .='<th width="15%">Price</th>';
			if($discountchk!='')
			{
				$tbl_th .='<th width="15%">Discount</th>';
			}
			$tbl_th .='<th width="15%">IGST</th>';
		}
		else
		{
			$tbl_th  ='<th width="40%">Services</th>';
			$tbl_th .='<th width="10%">Qty</th>';
			$tbl_th .='<th width="20%">Price</th>';
			if($discountchk!='')
			{
				$tbl_th .='<th width="15%">Discount</th>';
			}
		}
		
		if($discountchk!='' && $taxtype=='cgst')
		{
			$tbl_last1  ='<tr><td colspan="6"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td></tr>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="7"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="7">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
			
		}elseif($discountchk!='' && $taxtype=='igst')
		{ 
			$tbl_last1  ='<td colspan="5"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="6"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="6">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		elseif($discountchk!='' && $taxtype=='cess2')
		{ 
			$tbl_last1  ='<td colspan="5"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="6"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="6">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		elseif($taxtype=='cgst')
		{	$tbl_last1  ='<td colspan="5"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="6"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr class="SigBorderone"><td style="text-align:right" colspan="6">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		elseif($taxtype=='igst')
		{	$tbl_last1  ='<td colspan="4"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="5"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="5">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		elseif($taxtype=='cess2')
		{   $tbl_last1  ='<tr><td colspan="4"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td></tr>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="5"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="5">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		elseif($discountchk!='')
		{
			$tbl_last1  ='<td colspan="4"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';			
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="5"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="5">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		else
		{
			$tbl_last1  ='<td colspan="3"><strong>Total ('.$curr.')</strong></td>';
			$tbl_last1 .='<td>'.number_format($totalpaymentamount,2).'</td>';
			if($franchiseecode=='invoice')
			{
			$tbl_last1 .='<tr><td colspan="5"><strong>Total (In words)</strong>';
			$tbl_last1 .='<span class="cur_word">'.numberTowords($totalpaymentamount).'</span></td></tr>';
			$tbl_last1 .='<tr><td style="text-align:right" colspan="5">'.findsettingvalue('tax_footer').'</td></tr>';	
			}
		}
		
		$table='';
		
		$table .='<style>';
		$table .='.printTable{ float:left; width:100%; font-family:Arial, Helvetica, sans-serif;}
.printTable .PT1{ margin:0 auto; box-sizing: border-box; display:inline-block; width:670px;} 
.PT1 tbody{}
.paddingTDpt{ padding:5px;}
.borderSPpt{padding: 15px; box-sizing: border-box; display:block; width: 100%; border: 1px solid #000; min-height:175px; margin:1px 0; font-size:16px;}
.inv_companylogo{text-align:left; border-bottom: 3px solid #eee;}
.inv_companyname{text-align:right; border-bottom: 3px solid #eee;}
.inv_companylogo .borderSPpt, .inv_companyname .borderSPpt{ border:none; padding:0 0 15px 0; min-height:inherit;}
.inv_companyinfo .inv_nameC{ font-weight:bold; font-size:18px;}
.panGstNoC{min-height:inherit;}
h3.tittlep, h5.billig_head{ margin:10px 0; font-size:18px; }
h3.tittlep{text-align:center; width:720px;}
h5.billig_head{margin-bottom:5px;  display: block;}
.user_Detailpt{min-height: auto; border: none; padding:15px 0;    border-bottom: 3px solid #eee;}
.paddingTDpt.Ptpricestable{ padding:0;}
.paddingTDpt .table-responsive{ float:left; width:100%; padding-top:15px;}
.paddingTDpt .paymentDshow{border-top:1px solid #000; border-left:1px solid #000; width:100%;}
.paddingTDpt .paymentDshow thead{background-color:#eee; }
.paddingTDpt .paymentDshow th, .paddingTDpt .paymentDshow td { border-bottom:1px solid #000; border-right:1px solid #000; padding:10px; font-size:16px; text-align:left; box-sizing: border-box;}
.printPageBreak {page-break-before:always;}
.termspt h3{font-size: 18px; text-align: center; margin: 0 0 15px 0; width:680px;}
.cur_word{ float:right;}
.paddingTDpt .paymentDshow th:last-child, .paddingTDpt .paymentDshow td:last-child{ text-align:right;}
.paddingTDpt .paymentDshow th:last-child strong, .paddingTDpt .paymentDshow td:last-child strong{ float:left;}';
		$table .='</style>';
		
		
		
		
		if($franchiseecode=='invoice')
		{
			if($taxtype=='cgst' || $taxtype=='cess2' || $taxtype=='igst')
			{
				$inv_head='Tax Invoice';
			}else{$inv_head='Invoice';}
			
			$table .='<div class="printTable"><h3 class="tittlep">'.$inv_head.'</h3><table class="PT1">';
			$table .='<tr><td colspan="2"><h3 class="tittlep"></h3></td></tr>';
			$table .='<tr><td width="50%" class="inv_companylogo paddingTDpt"><span class="inv_logoC borderSPpt"><img src="'.$siteuploadfilepath_new.$logo .'" width="200" height="100" />';
			if($enable_tax_module=='Y')
			{
				$table .='<br><strong>PAN No : </strong>'.$companyPAN.'<br> <strong>GST No : </strong>'.$companyGST.'</span>';
			}
			$table .='</td>';
			
			$table .='<td width="50%" class="inv_companyname paddingTDpt"><span class="inv_companyinfo borderSPpt"><span class="inv_nameC">'.$companyname.'</span><br><br>'.$companyaddress.'<br><strong>Invoice Id : </strong>'.$new_paymetid.'<br><strong>Invoice Date : </strong>'.$CreateDate.'</span></td>';
			$table .='</tr>';
			
		
		
			
			
			$result2 = getdata("select bill_name,bill_address,	bill_country,bill_state,bill_city,bill_pin,bill_phone,createby
			 from  tbldatingpaymentmaster where paymentid='".$invoiceid."' ");
		while ($rs2 = mysqli_fetch_array($result2))
		{
			$bill_name=$rs2[0];
			$bill_address=$rs2[1];
			$bill_country=$rs2[2];
			$bill_state=$rs2[3];
			$bill_city=$rs2[4];
			$bill_pin=$rs2[5];
			$bill_phone=$rs2[6];
			$bill_createby=$rs2[7];
			
			
			if($bill_pin!='')
			{
				$bill_pin=' -'.$bill_pin;
			}
			
			$user_name = getonefielddata("select name from tbldatingusermaster where userid='".$bill_createby."' ");		
			$pcode = find_profile_code($bill_createby);		
			
			
			$country='';
			$state='';
			$city='';
			if($bill_country>0)
			{
				$country = getonefielddata("select title from tbldatingcountrymaster where id='".$bill_country."' 
				and currentstatus IN (0,5) ");		
				$country=' ,'.$country;
			}
			
			if($bill_state>0)
			{
				$state = getonefielddata("select title from tbldating_state_master where id='".$bill_state."' 
				and currentstatus IN (0,5) ");
			}
			if($bill_city>0)
			{
				$city = getonefielddata("select title from tbldating_city_master where id='".$bill_city."' 
				and currentstatus IN (0,5) ");
				$city='<br>'.$city;
			}
			
			if($pcode!='')
			{
				$pcode=' ('.$pcode.')';
			}else{$pcode='';}
			
			$table .='<tr><td class="paddingTDpt" colspan="2">
			<span class="borderSPpt user_Detailpt"><strong>Billing Details </strong><br><br>'.$user_name.$pcode.'
			<br>'.$bill_address.''.$city.''.$country.''.$bill_pin.'</span></td></tr>';			

		}
			
			$table .='</tr>';
			
			
			
			
			
			
			$table .='<tr><td colspan="2" class="paddingTDpt Ptpricestable">';
			
		}
		
		
		$table .='<div class="table-responsive">';
		$table .='<table class="table table-inverse paymentDshow" cellpadding="0" cellspacing="0">';
		$table .='<thead>';
		$table .='<tr>';
		$table .=$tbl_th;
		
		
		$table .='<th width="20%">Total ('.findsettingvalue('CurrencySymbol').')</th>';
		$table .='</tr>';
		$table .='</thead>';
		$table .='<tbody>';
		
		$result = getdata("select paymentdetailid,packageid,price,igst_p,igst_v,cgst_p,cgst_v,sgst_p,sgst_v,orignal_price
		,discount_p,discount_v,cess2_p,cess2_v
		 from tbldatingpaymentdetail where paymentid='".$invoiceid."' ");
		while ($rs = mysqli_fetch_array($result))
		{
			$paymentdetailid = $rs[0];
			$packageid = $rs[1];
			$price = $rs[2];
			
			$igst_p = $rs[3];
			$igst_v = $rs[4];
			$cgst_p = $rs[5];
			$cgst_v = $rs[6];
			$sgst_p = $rs[7];
			$sgst_v = $rs[8];
			$orignal_price = $rs[9];
			$discount_p = $rs[10];
			$discount_v = $rs[11];
			$cess2_p = $rs[12];
			$cess2_v = $rs[13];
			
			$pkg_name = getonefielddata("select Description from  tbldatingpackagemaster where PackageId='".$packageid."' ");		
			$hsnid = getonefielddata("select hsncode from  tbldatingpackagemaster where PackageId='".$packageid."' ");		
			$hsncode = getonefielddata("select hsncode from  tbldatingtaxmaster where id='".$hsnid."' ");		
		
		$table .='<tr>';
		$table .='<td><strong class="darkT"> '.$pkg_name.'</strong>'; 
		if($enable_tax_module=="Y")
		{
			$table .='<br />HSN/SAC Code : <span class="lightT">'.$hsncode.'</span>';
		}
		$table .='</td>';
		$table .='<td>1</td>';
		$table .='<td>'.number_format($orignal_price,2).'</td>';
		
		if($discountchk!='')
		{
			$table .='<td>'.$discount_v.'<br>'.$discount_p.'%</td>';
		}
		
		if($taxtype=='cess2')
		{
			$table .='<td>'.$cess2_v.'<br>'.$cess2_p.'%</td>';
		}
		if($taxtype=='igst')
		{
			$table .='<td>'.$igst_v.'<br>'.$igst_p.'%</td>';
		}
		
		if($taxtype=='cgst')
		{
			$table .='<td>'.$cgst_v.'<br>'.$cgst_p.'%</td>';
			$table .='<td>'.$sgst_v.'<br>'.$sgst_p.'%</td>';
		}
		
		
		$table .='<td>'.number_format($price,2).'</td>';
		$table .='</tr>';
		}
		freeingresult($result);	
		
		$table .=$tbl_last1; 
		
		$table .='</tbody>';
		$table .='</table>';
		$table .='</div>';
		
		if($franchiseecode=='invoice')
		{
			
			$table .='</tr></td></table><br />';
			$table .='<div style="page-break-affter: always;">&nbsp;</div><div class="printTable printPageBreak" style="page-break-affter: always;"><table class="PT1">';
			$table .='<tr><td colspan="2"><h3 class="tittlep">'.$inv_head.'</h3></td></tr>';
			$table .='<tr><td width="50%" class="inv_companylogo paddingTDpt"><span class="inv_logoC borderSPpt">
			<img src="'.$siteuploadfilepath_new.$logo .'" width="200" height="100" />';
			if($enable_tax_module=='Y')
			{
				$table .='<br><strong>PAN No : </strong>'.$companyPAN.'<br> <strong>GST No : </strong>'.$companyGST.'</span>';
			}
			$table .='</td>';
			
			
			$table .='<td width="50%" class="inv_companyname paddingTDpt"><span class="inv_companyinfo borderSPpt"><span class="inv_nameC">'.$companyname.'</span><br><br>'.$companyaddress.'<br><strong>Invoice Id : </strong>'.$new_paymetid.'<br><strong>Invoice Date : </strong>'.$CreateDate.'</span></td>';
			$table .='</tr>';
		$table .='<tr><td class="paddingTDpt" colspan="2"><span class="borderSPpt termspt"><h3>Terms & Condition</h3>'.findsettingvalue('tax_term').'</span></td>';
			$table .='</tr></table></div>';
		}
		
		echo $table;
		
	}


//	function numberTowords($no) 
//	{
//	}
function numberTowords($num)
{
    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 )
            {
                $tens   = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
            }
            else
            {
                $tens   = ( int ) ( $tens / 10 );
                $tens   = ' ' . $list2[$tens] . ' ';
                $singles    = ( int ) ( $num_part % 10 );
                $singles    = ' ' . $list1[$singles] . ' ';
            }
            $words[]    = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        }
       
        $commas = count( $words );
       
        if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim( str_replace( ' ,' , ',' , trim_all( ucwords( $words ) ) ) , ', ' );
        if( $commas )
        {
            $words  = str_replace_last( ',' , ' and' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}

function trim_all( $str , $what = NULL , $with = ' ' )
{
    if( $what === NULL )
    {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space
       
        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }
   
    return trim( preg_replace( "/[".$what."]+/" , $with , $str ) , $what );
}

function str_replace_last( $search , $replace , $str ) {
    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
        $search_length  = strlen( $search );
        $str    = substr_replace( $str , $replace , $pos , $search_length );
    }
    return $str;
}

function remove_4digno_from_name($name)
{
   $new_name = preg_replace("/(\d{5,})/", "", $name);
   return $new_name;
}


function display_name_roundc($name)
{
	  			 $arr_name = explode(" ",$name);
                
                if(count($arr_name)>=2)
                {
                    $name=substr($arr_name[0],0,1).substr($arr_name[1],0,1);
                }
                elseif(count($arr_name)==1)
                {
                    $name=substr($arr_name[0],0,1);
                }else{$name='A';}
				
	return  '<span class="resultRoundName">'.$name.'</span>';			
}

function display_name_round($name)
{
	  			 $arr_name = explode(" ",$name);
                
                if(count($arr_name)>=2)
                {
                    $name=substr($arr_name[0],0,1).substr($arr_name[1],0,1);
                }
                elseif(count($arr_name)==1)
                {
                    $name=substr($arr_name[0],0,1);
                }else{$name='A';}
				
	return  '<span class="resultRoundName resultRoundName_c">'.$name.'</span>';			
}

function display_notify_time($time)
{
	return date('h:i A', strtotime($time));
}
function display_notify_date($date)
{
	return  date("F d, Y", strtotime($date));
}


function messanger_count($uid)
{
	
	$getcount=getonefielddata("select count(PmbId) from tbldatingpmbmaster
	join tbldatingshortlistmaster
	on tbldatingpmbmaster.FromUserId=tbldatingshortlistmaster.UserId
	where tbldatingpmbmaster.currentstatus=0 and tbldatingpmbmaster.type in (2,3) 
	and tbldatingpmbmaster.ToUserId='".$uid."' and tbldatingpmbmaster.m_read='N' 
	and tbldatingshortlistmaster.currentstatus=0 and tbldatingshortlistmaster.createby='".$uid."' ");
	return $getcount;
}

function notify_count($type,$uid)
{
	
	$getcount=getonefielddata("select count(PmbId) from tbldatingpmbmaster
	where currentstatus=0 and type='".$type."' and ToUserId='".$uid."' and m_read='N' ");
	return $getcount;
}

function notify_count_individual($type,$uid,$toid)
{

	$getcount=getonefielddata("select count(PmbId) from  
	tbldatingpmbmaster where currentstatus=0 and type='".$type."'
	and ToUserId='".$uid."' and FromUserId='".$toid."' and m_read='N' ");
	return $getcount;
}

function notify_mess_count($uid,$toid)
{
	$getcount=getonefielddata("select count(PmbId) from  
	tbldatingpmbmaster where currentstatus=0 and type in (2,3)
	and ToUserId='".$uid."' and FromUserId='".$toid."' and m_read='N' ");
	return $getcount;
}

function notify_icon($type)
{
	$image=getonefielddata("select image from  tbldatingpmbmaster_type where id='".$type."' ");
	return $image;
}

function notify_msg($type)
{
	$image=getonefielddata("select note from  tbldatingpmbmaster_type where id='".$type."' ");
	return $image;
}


function notify_paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
       
        $right_links    = $current_page + 3;
        $previous       = $current_page - 1; //previous link
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
       
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'&page=1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'&page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
                    }
                }  
            $first_link = false; //set first link to false
        }
       
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active"><a>'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active"><a>'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a>'.$current_page.'</a></li>';
        }
               
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'&page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="'.$page_url.'&page='.$next_link.'" >&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'&page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
       
        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}

function notify_analytics($type,$userid)
{
	$sql="select count(PmbId) from tbldatingpmbmaster where currentstatus=0 and type='".$type."' and
ToUserId='".$userid."' ";
	return $res=getonefielddata($sql);
}


function notify_email($fromid,$toid,$emailid,$type)
{    
      global $sitepath;
	  global $sitename;
      $receivername=findnameuser($toid);
	  $receiveremail=find_user_name($toid);
      $sendername=findnameuser($fromid); 
      $senderprofileid=find_profile_code($fromid);     
		  
	  if($type==1){ //Express Interest Receive 
	     $extramessage =' you have received express interst from  '.$senderprofileid.', Reply by accepting express interest <br/>Click <a href="'.$sitepath.'notify.php?t=2">here</a>'; 
		 $subject='Express interest received';		  
	  }else if($type==5){//Make favourite 
		$extramessage =''.$senderprofileid.' Add you in favourite list<br/>Click <a href="'.$sitepath.'notify.php?t='.$type.'">here</a>';	
		$subject=' Add you in favourite list';	 
	  }else if($type==4){//imag req receive
		$extramessage ='you have received album request  From '.$senderprofileid.', Reply by accepting album request <br/>Click <a href="'.$sitepath.'notify.php?t=4">here</a>';	
		$subject='Album request received';	
	   }else if($type==3){//ecard receive
		$extramessage ='You have receive ecard From '.$senderprofileid.', to view click below<br/>Click <a href="'.$sitepath.'notify.php?t=3">here</a>';	
		$subject='Ecard received'; 
	   }else{
		 $extramessage='';
		 $subject=getonefielddata("select subject from tbldatingemailmaster where  emailid='".$emailid."' and CurrentStatus=0 ");
	    }
		$message=getonefielddata("select message from tbldatingemailmaster where  emailid='".$emailid."' and CurrentStatus=0 "); 
		$subject = str_replace("[sitename]",$sitename,$subject);
		$message = str_replace("[sitename]",$sitename,$message);
		$message = str_replace("[name]",$receivername,$message);
		$message = str_replace("[extramessage]",$extramessage,$message);
		sendemaildirect($receiveremail,$subject,$message,"");
}



?>



















