<?
class banner
{
 var $ClickCal_Page = "redirectbanner.php";
function findbannersetting($FldNm)
{
	return getonefielddata("select FldVal from tblbannersetting where FldNm='$FldNm'");
}
/*************
Purpose: To Get Banner According to Location And size
Input: The ID of tbllocsizemaster table According to location and size
Outout:The Code of banner To Be shown for this id ordered randomly
*************/
function Showbanner1($LocSizeId)
{
	global $sitepath;
	$bannerid = 0;
	$bannercode = ''; 
	$res = getdata("select Bannerid,BannerCode,OnClickURL,TextOrFlashBannerCode 
	from tblbannermaster where DATE_ADD(CreateDate, interval expiryDays DAY)>now() and LSId=$LocSizeId and CurrentStatus=0 and ifnull(BannerCode,'') <>'' order by  rand() limit 1");
	while($rs= mysqli_fetch_array($res))
	{
	  $bannerid = $rs[0];
	   $bannercode = $rs[1];
	   $flashcode = $rs[3];
	}
	freeingresult($res);
	$referer = '';
	if(isset($_SERVER['HTTP_REFERER']))
		$referer = $_SERVER['HTTP_REFERER'];
	$ip = $_SERVER["REMOTE_ADDR"]; 
	$uagent = $_SERVER["HTTP_USER_AGENT"]."<br />"; 
	$sub_uagent= substr($uagent,strpos($uagent,'(')); 
	$iarr = explode(";",$sub_uagent);	
	 $pos = @strpos($iarr[2],')'); 
	if($pos != '')
		$iarr[2] = substr($iarr[2],0,$pos);
	if($bannerid !='')
	{
    $query = "'$bannerid',CURDATE(),CURTIME(),Hit+1,'".@$iarr[2]."','$uagent','$ip','$referer',CURDATE()";
 	$sSql = "insert into tblbannerstatsmaster (BannerId,VisitedDate,VisitedTime,Hit,OperatingSystem,UserAgentString,Ip,Referer,CreateDate) values($query)";
	$statid = execute($sSql);
	$statid =getonefielddata("select max(StatsId) from tblbannerstatsmaster");
	//$url = $this->findbannersetting("WebsiteURL");
	$url = $sitepath;
	 $url .= $this->ClickCal_Page."?statid=".$statid; 
	 $bannercode = str_replace("[sitepath]",$sitepath,$bannercode); 
	$bannercode= str_replace("{--URL--}",$url,$bannercode);
	
	
	$this->uploadsts("HIT",$bannerid);
		if($bannercode!='')
		{
			return $bannercode;   
		}else
		{
			return $flashcode;   
		}
//echo $bannercode;
	}
 }
/*************
Purpose: To Show banner
Input: None
Outout:The banner According to Function Name
*************/  

 function topBannerDisplay()
 { //id 3  
 return $this->Showbanner1(2);
 }
  function bottomBannerDisplay()
 { //id 4  
 return $this->Showbanner1(4); 
 }
 
 function leftBannerDisplay()
 { //id 5  
 return $this->Showbanner1(1); 
 }
 
 function bigBannerDisplay()
 { //id 6  
 return $this->Showbanner1(3); 
 }
 
/*************
Purpose: To update Hit Click And Conversion As it Occurs in database 
Input: Which Should be updated(HIT,CLICK,CONVERSION),The Primary key id for which some action has been done
Outout:Updated No Of (HIT,CLICK,CONVERSION) in database
*************/ 
function uploadsts($for,$id)
{
	if($for  == "HIT")
		execute("update tblbannermaster set TotalHits=TotalHits+1 where Bannerid=$id");
	elseif($for == "CLICK")
  		execute("update tblbannermaster set TotalClicks=TotalClicks+1 where Bannerid=$id");	  
	elseif($for == "CONVERSION")
	  execute("update tblbannermaster set TotalConversion=TotalConversion+1 where Bannerid=$id");	  
}

/*************
Purpose: To Find CTR
Input: Hit And Click Of aselected record
Outout:CTR
*************/
function findCTR($Hits,$Clicks)
{
if ($Hits > 0)
    return round(100 * $Clicks / $Hits,2);
else
	return 0;    
}

}//banner class end 
?>