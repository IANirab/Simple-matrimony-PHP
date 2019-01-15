<? ob_start();
include("commonfile.php");
$action ="";
$searchque ="";

if ((isset($_POST["action"])) && ($_POST["action"] != ""))
	 $action =$_POST["action"]; 
if ((isset($_POST["result_ids"])) && ($_POST["result_ids"] != ""))
	$result_ids =$_POST["result_ids"];
if ((isset($_POST["searchque"])) && ($_POST["searchque"] != ""))
	$searchque =$_POST["searchque"];

if($action=='P'){
	if(isset($_POST['with_photo']) && $_POST['with_photo']=='with'){
		$query = "tbldatingusermaster.thumbnil_image!=''";	
	} if(isset($_POST['with_photo']) && $_POST['with_photo']=='without'){
		$query = "tbldatingusermaster.thumbnil_image is NULL";	
	}
	$_SESSION[$session_name_initital . "accordian_option"]=$action;		
	$searchque .= " $query and ";
	$_SESSION[$session_name_initital . "searchquery"] = $searchque;
	header("location:searchresult.php");
	exit();		
}

if($action=='RJ'){
	if(isset($_POST['recently_joined']) && $_POST['recently_joined']>0)	{
		$recently_joined = $_POST['recently_joined'];
		$query = "datediff(curdate(),tbldatingusermaster.createdate)<=".$recently_joined."";			
	}
	$_SESSION[$session_name_initital . "accordian_option"]=$action;		
	if($query!=''){
		$searchque .= " $query and ";
	}
	$_SESSION[$session_name_initital . "searchquery"] = $searchque;
	header("location:searchresult.php");
	exit();	
}

// new code start

// religian start
		$filter_religion='';
  $query = "select tbldatingusermaster.religianid from tbldatingusermaster,tbldatingreligianmaster where  ". make_profile_search_query($curruserid,datinguserwhereque()) . " and tbldatingusermaster.religianid=tbldatingreligianmaster.id group by tbldatingusermaster.religianid order by tbldatingreligianmaster.title ";
            $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_religion'.$id]) && $_POST['filter_religion'.$id])
				{
					 $filter_religion.=$_POST['filter_religion'.$id].",";
				}
			}
			$filter_religion=substr($filter_religion,0,-1);

// religian end

// subcat start
		$filter_subcast='';
   $query = "select tbldatingusermaster.castid from tbldatingusermaster,tbldatingcastmaster where tbldatingcastmaster.currentstatus=0 and  ". make_profile_search_query($curruserid,datinguserwhereque()) . " and tbldatingusermaster.castid=tbldatingcastmaster.id group by tbldatingusermaster.castid order by tbldatingcastmaster.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_subcast'.$id]) && $_POST['filter_subcast'.$id])
				{
					 $filter_subcast.=$_POST['filter_subcast'.$id].",";
				}
			}
			 $filter_subcast=substr($filter_subcast,0,-1);

// subcat end

// maritual status start
	$filter_ms='';
        	$query = "SELECT tbldatingusermaster.maritalstatusid from tbldatingusermaster,tbldatingmaritalstatusmaster WHERE ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.maritalstatusid=tbldatingmaritalstatusmaster.id group by tbldatingusermaster.maritalstatusid order by tbldatingmaritalstatusmaster.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_ms'.$id]) && $_POST['filter_ms'.$id])
				{
					 $filter_ms.=$_POST['filter_ms'.$id].",";
				}
			}
			 $filter_ms=substr($filter_ms,0,-1);
// maritual status end

// education start
	$filter_edu='';
        	$query = "select tbldatingusermaster.educationid from tbldatingusermaster,tbl_education_master where  ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.educationid=tbl_education_master.id group by tbldatingusermaster.educationid order by tbl_education_master.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_edu'.$id]) && $_POST['filter_edu'.$id])
				{
					 $filter_edu.=$_POST['filter_edu'.$id].",";
				}
			}
			 $filter_edu=substr($filter_edu,0,-1);
// education end

// ocuupation start
	$filter_occ='';
        $query = "SELECT tbldatingusermaster.occupationstatusid from tbldatingusermaster,tbldating_education_pg_master WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.occupationstatusid=tbldating_education_pg_master.id group by tbldatingusermaster.occupationstatusid order by tbldating_education_pg_master.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_occ'.$id]) && $_POST['filter_occ'.$id])
				{
					 $filter_occ.=$_POST['filter_occ'.$id].",";
				}
			}
			 $filter_occ=substr($filter_occ,0,-1);
// ocuupation end

// income start 
$filter_income='';
       	$query = "select tbldatingusermaster.annual_income_id from tbldatingusermaster,tbldating_annual_income_master where  ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.annual_income_id=tbldating_annual_income_master.id group by tbldatingusermaster.annual_income_id order by tbldating_annual_income_master.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_income'.$id]) && $_POST['filter_income'.$id])
				{
					 $filter_income.=$_POST['filter_income'.$id].",";
				}
			}
			 $filter_income=substr($filter_income,0,-1);
// income end

// mother toung start 
$filter_mothert='';
  $query = "select tbldatingusermaster.motherthoungid from tbldatingusermaster,tbldatingmothertonguemaster where $searchque1 ". make_profile_search_query($curruserid,datinguserwhereque()) . "  and tbldatingusermaster.motherthoungid=tbldatingmothertonguemaster.id group by tbldatingusermaster.motherthoungid order by tbldatingmothertonguemaster.title ";
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_mothert'.$id]) && $_POST['filter_mothert'.$id])
				{
					 $filter_mothert.=$_POST['filter_mothert'.$id].",";
				}
			}
			 $filter_mothert=substr($filter_mothert,0,-1);
// mother toung end

// country start 
$filter_country='';
   $query = "SELECT tbldatingusermaster.countryid from tbldatingusermaster,tbldatingcountrymaster WHERE  ".make_profile_search_query($curruserid,datinguserwhereque())." and tbldatingusermaster.countryid=tbldatingcountrymaster.id group by tbldatingusermaster.countryid order by tbldatingcountrymaster.title  ";	
       $result = getdata($query);
            while($rs= mysqli_fetch_array($result))
            {
				$id=$rs[0];
					if(isset($_POST['filter_country'.$id]) && $_POST['filter_country'.$id])
				{
					 $filter_country.=$_POST['filter_country'.$id].",";
				}
			}
			 $filter_country=substr($filter_country,0,-1);
// country end



$query='';
$search_ids='';
if (($action !="") && ($searchque !=""))
{	
		if($filter_religion!='')
		{
			$search_ids=$filter_religion;
			$query .= " and tbldatingusermaster.religianid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_religion_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_religion_id"]='';}
		
		
		if($filter_subcast!='')
		{
			$search_ids=$filter_subcast;
			$query .= " and tbldatingusermaster.castid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_subcast_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_subcast_id"]='';}
		
		if($filter_edu!='')
		{
			$search_ids=$filter_edu;
			$query .= " and tbldatingusermaster.educationid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_edu_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_edu_id"]='';}
		
		if(isset($_POST['filter_with_photo']) && $_POST['filter_with_photo']!='')
		{
					$search_ids=$_POST['filter_with_photo'];
					if($search_ids=='Y'){
						$query .= " and tbldatingusermaster.thumbnil_image!='' ";
					} 
					if($search_ids=='N'){
						$query .= " and tbldatingusermaster.thumbnil_image is NULL ";	
					}	
			$_SESSION[$session_name_initital . "filter_photo_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_photo_id"]='';}
		
		if($filter_income!='')
		{
			$search_ids=$filter_income;
			$query .= " and tbldatingusermaster.annual_income_id in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_income_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_income_id"]='';}
		
		if($filter_occ!='')
		{
			$search_ids=$filter_occ;
			$query .= " and tbldatingusermaster.occupationstatusid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_occ_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_occ_id"]='';}
		
		if($filter_ms!='')
		{
			$search_ids=$filter_ms;
			$query .= " and tbldatingusermaster.maritalstatusid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_ms_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_ms_id"]='';}
		
		if($filter_mothert!='')
		{
			$search_ids=$filter_mothert;
			$query .= " and tbldatingusermaster.motherthoungid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_mothert_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_mothert_id"]='';}

		if($filter_country!='')
		{
			$search_ids=$filter_country;
			$query .= " and tbldatingusermaster.countryid in (".$search_ids.") ";
			$_SESSION[$session_name_initital . "filter_country_id"]=$search_ids;
		}else{$_SESSION[$session_name_initital . "filter_country_id"]='';}

		
		
		$_SESSION[$session_name_initital . "accordian_option"]=$action;		
		$filter_searchque =$query ;
		$_SESSION[$session_name_initital . "filter_searchquery"] = $filter_searchque.' and ';
		header("location:searchresult.php");
		exit();
		
			
}
else
{
	header("location:".$_SERVER['HTTP_REFERER']);
	exit;
}
// new end start
exit;

if (($action !="") && ($result_ids !="") && ($searchque !=""))
{	
	$result_ids_arr = explode(",",$result_ids);
	$search_ids = "";

	$search_ids=implode(",",$_POST['chk_id_new']); 
	
	if ($search_ids != "")
	{
			if ($action =="R")
				$query = "tbldatingusermaster.religianid ";
			elseif ($action =="C")
				$query = "tbldatingusermaster.castid";
			elseif ($action =="E")
				$query = "tbldatingusermaster.educationid";
			elseif ($action =="A")
				$query = "tbldatingusermaster.annual_income_id";
			elseif ($action =="M")
				$query = "tbldatingusermaster.motherthoungid";
			elseif ($action =="MS")
				$query = "tbldatingusermaster.maritalstatusid";	
			elseif ($action =="CT")
				$query = "tbldatingusermaster.countryid";
			elseif ($action =="S")
				$query = "tbldatingusermaster.smokerstatusid";
			elseif ($action =="D")
				$query = "tbldatingusermaster.drinkerstatusid";
			elseif ($action =="D")
				$query = "tbldatingusermaster.drinkerstatusid";
			elseif ($action =="DT")
				$query = "tbldatingusermaster.dietid";
			elseif ($action =="W")
				$query = "tbldatingusermaster.occupationstatusid";						
			elseif($action=='P'){
					if(isset($_POST['with_photo']) && $_POST['with_photo']=='with'){
						$query = "tbldatingusermaster.thumbnil_image!=''";	
					} 
					if(isset($_POST['with_photo']) && $_POST['with_photo']=='without'){
						$query = "tbldatingusermaster.thumbnil_image is NULL";	
					}	
			} else if($action=='RJ'){
					if(isset($_POST['recently_joined']) && $_POST['recently_joined']>0)	{
						$recently_joined = $_POST['recently_joined'];
						$query = "datediff(curdate(),tbldatingusermaster.createdate)<=".$recently_joined."";			
					}
			}	
			
			$_SESSION[$session_name_initital . "accordian_option"]=$action;		
			$searchque .= " $query in ($search_ids) and ";
			$_SESSION[$session_name_initital . "searchquery"] = $searchque;
			header("location:searchresult.php");
			exit();
			
			} else {
			header("location:".$_SERVER['HTTP_REFERER']);
			exit;
			}
			
   
   	} else {
		header("location:".$_SERVER['HTTP_REFERER']);	
		exit;
	}
ob_flush();