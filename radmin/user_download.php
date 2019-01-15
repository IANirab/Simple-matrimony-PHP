<?
error_reporting("E_ALL");
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$userid_from = $_POST["txt_uid_from"];
$userid_to = $_POST["txt_uid_to"];
$que ="";
if (($userid_from != "") && is_numeric($userid_from))
	$que ="userid>=$userid_from and ";
	
if (($userid_to != "") && is_numeric($userid_to))
	$que .="userid<=$userid_to and ";

$column_title = "userid,email,password,name,createdate,packageid,expiredate,";
$column_title .= "emailverified,genderid,dob,countryid,state,altemail,";
$column_title .= "mobile,city,postcode,imagenm ,nickname,lastlogin,";
$column_title .= "profilecreatebyid,lookingforid,maritalstatusid ,kidsid,";
$column_title .= "heightid,weightid,eyecolorid,bodytypeid,complexionid,";
$column_title .= "specialcasesid,religianid,castid,subcast,motherthoungid,";
$column_title .= "familyvalueid,educationid,ocupationid,annualincome,dietid,";
$column_title .= "smokerstatusid, drinkerstatusid,area,residancystatusid,"; 
$column_title .= "countryofbirth,countryofgrewup,personality,familybackground,";
$column_title .= "profileheadline,hobbiesintrest,personalvalueid,wantchildrenid,";
$column_title .= "hearaboutusid,totalview,zodiacsign,socialbookmarkcode,feedurl,";
$column_title .= "externalvideourl,externalbioprofile,gotra,grahid,birthtime,";
$column_title .= "birthplace,phno,callingtime,";
$column_title .= "talkpreference,father_occupation,mother_occupation,";
$column_title .= "brother_married1,brother_married2,brother_unmarried1,";
$column_title .= "brother_unmarried2,sister_married1,sister_married2,";
$column_title .= "sister_unmarried1,sister_unmarried2,hiv,thelisimia,";
$column_title .= "illiness,father_status_id,mother_status_id,profile_code,";
$column_title .= "moonsignid,education_detail,occupation_detail,";
$column_title .= "image_password,image_password_protect,CreateIP,address,";
$column_title .= "edu_pg_id,edu_pg_other,industry_id,industry_other,";
$column_title .= "work_function_id, work_function_other,instituteid,";
$column_title .= "institute_other,thumbnil_image,user_status,paid/unpaid/due\r\n";
$status  = "0,1,2,4";
$data = "";
$result = getdata("select userid,email,password,name,createdate,packageid,expiredate,emailverified,genderid ,date_format(dob,'$date_format'),countryid,state,altemail,mobile,city,postcode,imagenm ,nickname,date_format(lastlogin,'$date_format'),profilecreatebyid,lookingforid,maritalstatusid ,kidsid,heightid ,weightid,eyecolorid,bodytypeid,complexionid,specialcasesid,religianid,castid,subcast,motherthoungid, familyvalueid,educationid,ocupationid,annualincome,dietid,smokerstatusid, drinkerstatusid,area,residancystatusid, countryofbirth, countryofgrewup,personality,familybackground,profileheadline,hobbiesintrest,personalvalueid,wantchildrenid,hearaboutusid,totalview,zodiacsign,socialbookmarkcode,feedurl ,externalvideourl,externalbioprofile,gotra,grahid,birthtime,birthplace,moonsign,phno ,callingtime,talkpreference,father_occupation,mother_occupation,brother_married1,brother_married2,brother_unmarried1,brother_unmarried2,sister_married1,sister_married2,sister_unmarried1,sister_unmarried2,hiv,thelisimia,illiness,father_status_id,mother_status_id,profile_code,moonsignid,education_detail,occupation_detail,image_password,image_password_protect,CreateIP,address,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id, work_function_other,instituteid,institute_other,thumbnil_image,currentstatus  from tbldatingusermaster where $que  currentstatus IN ($status)");
while($rs= mysqli_fetch_array($result))
{
	$userid='"'.$rs[0].'"';
	$email='"'.$rs[1].'"';
	$password='"'.$rs[2].'"';
	$name='"'.$rs[3].'"';
	$createdate='"'.$rs[4].'"';
	$packageid=$rs[5];
	$packageid1=$rs[5];
	if ($packageid != "")
		$packageid = '"'.getonefielddata("select Description from tbldatingpackagemaster where PackageId=$packageid").'"';
	$expiredate='"'.$rs[6].'"';
	$emailverified='"'.$rs[7].'"';
	$genderid ='"'.findgender($rs[8]).'"';
	$dob='"'.$rs[9].'"';
	$countryid='"'.findcountryid($rs[10]).'"';
	if($rs[11]!=''&& $rs[11]!='0.0' && is_numeric($rs[11])){
		$state = getonefielddata("select title from tbldating_state_master where id=" . $rs[11]);
	}else{
		$state = '""';	
	}
	$altemail='"'.$rs[12].'"';
	$mobile='"'.$rs[13].'"';
	if($rs[14]!='' && $rs[14]!='0.0' && is_numeric($rs[14])){
		$city = getonefielddata("select title from tbldating_city_master where id=" . $rs[14]);	
	}else{
		$city = '""';	
	}
	//$city='"'.$rs[14].'"';
	$postcode='"'.$rs[15].'"';
	$imagenm ='"'.$rs[16].'"';
	$nickname='"'.$rs[17].'"';
	$lastlogin='"'.$rs[18].'"';
	
	$profilecreatebyid='"'.findtitleofprofilefld($rs[19],"tbldatingprofilecreatedbymaster").'"';
	$lookingforid='"'.findtitleofprofilefld($rs[20],"tbldatinglookingformaster").'"';
	$maritalstatusid ='"'.findtitleofprofilefld($rs[21],"tbldatingmaritalstatusmaster").'"';
	$kidsid='"'.findtitleofprofilefld($rs[22],"tbldatingkidsmaster").'"';
	$heightid ='"'.findtitleofprofilefld($rs[23],"tbldatingheightmaster").'"';
	$weightid ='"'.findtitleofprofilefld($rs[24],"tbldatingweightmaster").'"';
	$eyecolorid='"'.findtitleofprofilefld($rs[25],"tbldatingeyemaster").'"';
	$bodytypeid='"'.findtitleofprofilefld($rs[26],"tbldatingbodymaster").'"';
	$complexionid='"'.findtitleofprofilefld($rs[27],"tbldatingcomplexionmaster").'"';
	$specialcasesid='"'.findtitleofprofilefld($rs[28],"tbldatingspecialcasemaster").'"';
	
	$religianid='"'.findtitleofprofilefld($rs[29],"tbldatingreligianmaster").'"';
	$castid='"'.findtitleofprofilefld($rs[30],"tbldatingcastmaster").'"';
	$subcast='"'.$rs[31].'"';
	$motherthoungid='"'.findtitleofprofilefld($rs[32],"tbldatingmothertonguemaster").'"';
	$familyvalueid='"'.findtitleofprofilefld($rs[33],"tbldatingfamilyvaluemaster").'"';
	
	$educationid='"'.findtitleofprofilefld($rs[34],"tbl_education_master").'"';
	$ocupationid='"'.findtitleofprofilefld($rs[35],"tbldatingoccupationmaster").'"';
	$annualincome='"'.$rs[36].'"';
	$dietid= ''; 
	$smokerstatusid = ''; 
	$drinkerstatusid= ''; 
	$dietid='"'.findtitleofprofilefld($rs[37],"tbldatingdietmaster").'"';
	$smokerstatusid   ='"'.findtitleofprofilefld($rs[38],"tbldatingsmokerstatusmaster").'"';
	$drinkerstatusid  ='"'.findtitleofprofilefld($rs[39],"tbldatingdrinkerstatusmaster").'"';	
	$area ='"'.$rs[40].'"';
	$residancystatusid='"'.findtitleofprofilefld($rs[41],"tbldatingresidencystatusmaster").'"';
	$countryofbirth   ='"'.findcountryid($rs[42]).'"';
	$countryofgrewup  ='"'.findcountryid($rs[43]).'"';
	$personality='"'.$rs[44].'"';
	$familybackground='"'.$rs[45].'"';
	$profileheadline ='"'.$rs[46].'"';
	$hobbiesintrest  ='"'.$rs[47].'"';
	$personalvalueid  ='"'.findtitleofprofilefld($rs[48],"tbldatingpersonalvaluemaster").'"';
	$wantchildrenid   ='"'.findtitleofprofilefld($rs[49],"tbldatingwantchildrenmaster").'"';
	$hearaboutusid    ='"'.findtitleofprofilefld($rs[50],"tbldatinghearaboutusmaster").'"';
	$totalview    	='"'.$rs[51].'"';
	$zodiacsign           ='"'.$rs[52].'"';
	$socialbookmarkcode   ='"'.$rs[53].'"';
	$feedurl ='"'.$rs[54].'"';
	$externalvideourl     ='"'.$rs[55].'"';
	$externalbioprofile   ='"'.$rs[56].'"';
	$gotra='"'.$rs[57].'"';
	$grahid   = '"'.findtitleofprofilefld($rs[58],"tbldatinggrahmaster").'"';
	$birthtime            ='"'.$rs[59].'"';
	$birthplace           ='"'.$rs[60].'"';
	//$moonsign=findtitleofprofilefld($rs[61],"tbldatingmoonsignmaster");
	$phno =$rs[62];
	$callingtime          ='"'.$rs[63].'"';
	$talkpreference   	='"'.findtitleofprofilefld($rs[64],"tbldatingtaklingpreferencemaster").'"';	
	$father_occupation    ='"'.$rs[65].'"';
	$mother_occupation    ='"'.$rs[66].'"';
	$brother_married1     ='"'.$rs[67].'"';
	$brother_married2     ='"'.$rs[68].'"';
	$brother_unmarried1   ='"'.$rs[69].'"';
	$brother_unmarried2   ='"'.$rs[70].'"';
	$sister_married1      ='"'.$rs[71].'"';
	$sister_married2      ='"'.$rs[72].'"';
	$sister_unmarried1    ='"'.$rs[73].'"';
	$sister_unmarried2    ='"'.$rs[74].'"';
	$hiv          ='"'.$rs[75].'"';
	$thelisimia   ='"'.$rs[76].'"';
	$illiness='"'.$rs[77].'"';
	$father_status_id='"'.findtitleofprofilefld($rs[78],"tbldatingfathermotherstatusmaster").'"';
	$mother_status_id='"'.findtitleofprofilefld($rs[79],"tbldatingfathermotherstatusmaster").'"';
	$profile_code         ='"'.$rs[80].'"';
	$moonsignid      ='"'.findtitleofprofilefld($rs[81],"tbldatingmoonsignmaster").'"';
	$education_detail     ='"'.$rs[82].'"';	
	$occupation_detail    ='"'.$rs[83].'"';	
	$image_password       ='"'.$rs[84].'"';
	$image_password_protect='"'.$rs[85].'"';
	$CreateIP='"'.$rs[86].'"';
	$address='"'.$rs[87].'"';
	$edu_pg_id       = '"'.findtitleofprofilefld($rs[88],"tbldating_education_pg_master").'"';
	$edu_pg_other         ='"'.$rs[89].'"';
	$industry_id     ='"'.findtitleofprofilefld($rs[90],"tbl_dating_industry_master").'"';
	$industry_other       ='"'.$rs[91].'"';
	$work_function_id='"'.findtitleofprofilefld($rs[92],"tbl_dating_work_function_area_master").'"';
	$work_function_other  ='"'.$rs[93].'"';
	$instituteid = '"'.findtitleofprofilefld($rs[94],"tbl_dating_institute_master").'"';
	$institute_other      ='"'.$rs[95].'"';
	$thumbnil_image       ='"'.$rs[96].'"';
	if(isset($rs[97]) && $rs[97]!=''){
		$cstatus = $rs[97];		
		if($cstatus == 0)
			$cst = 'Active';
		elseif($cstatus == 1)
			$cst = 'Pendig approval';
		elseif($cstatus==3)	
			$cst = 'Deleted';	
		else
			$cst = 'Deactive';
	}
	$lateinvclear = getonefielddata("SELECT clear from tbldatingpaymentmaster WHERE createby=".$userid." AND totalpaymentamount>0 order by paymentid desc ");
	/*if($packageid>1 && $expiredate>=date("Y-m-d")){*/
	//echo $packageid1."Hello	"; exit;
	
	if($packageid1!='28'){
		$paidunpaid = "Paid";	
	} else if($lateinvclear=='N'){
		$paidunpaid = "Due";	
	} else if($packageid1==28){
		$paidunpaid = "Free";	
	} else {
		$paidunpaid = "Free";	
	}	
	$data .= "$userid,$email,$password,$name,$createdate,$packageid,$expiredate,$emailverified,$genderid ,$dob,$countryid,$state,$altemail,$mobile,$city,$postcode,$imagenm ,$nickname,$lastlogin,$profilecreatebyid,$lookingforid,$maritalstatusid,$kidsid,$heightid ,$weightid,$eyecolorid,$bodytypeid,$complexionid,$specialcasesid,$religianid,$castid,$subcast,$motherthoungid,$familyvalueid,$educationid,$ocupationid,$annualincome,$dietid,$smokerstatusid,$drinkerstatusid,$area,$residancystatusid,$countryofbirth,$countryofgrewup,$personality,$familybackground,$profileheadline,$hobbiesintrest,$personalvalueid,$wantchildrenid,$hearaboutusid,$totalview,$zodiacsign,$socialbookmarkcode,$feedurl ,$externalvideourl,$externalbioprofile,$gotra,$grahid,$birthtime,$birthplace,$phno ,$callingtime,$talkpreference,$father_occupation,$mother_occupation    ,$brother_married1,$brother_married2,$brother_unmarried1,$brother_unmarried2   ,$sister_married1,$sister_married2,$sister_unmarried1,$sister_unmarried2,$hiv,$thelisimia,$illiness,$father_status_id,$mother_status_id,$profile_code,$moonsignid,$education_detail,$occupation_detail,$image_password,$image_password_protect,$CreateIP,$address,$edu_pg_id,$edu_pg_other         ,$industry_id,$industry_other,$work_function_id,$work_function_other,$instituteid,$institute_other,$thumbnil_image,$cst,$paidunpaid\r\n";
}
freeingresult($result);
if ($data != "")
$data = $column_title.$data; 

$filenm ="user_csv.csv";
$filenm_path ="../uploadfiles/$filenm";
$fp = fopen($filenm_path, "w");
fwrite($fp, $data);
fclose($fp);

header("Content-type: application/force-download");
header('Content-Disposition: inline; filename="' . $filenm_path . '"');
header("Content-Transfer-Encoding: Binary");
header("Content-length: ".filesize($filenm_path));
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filenm . '"');
readfile("$filenm_path"); 
?>