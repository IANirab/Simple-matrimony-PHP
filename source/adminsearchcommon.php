<? 
function findsearchquery($searchbase,$keyword)
{ 

	$searchquery ="";
	if ($searchbase != "")
	{
		if ($keyword != "")
		{
			$tablenm = findtablename($searchbase);
			$id=$keyword;
			//$id = getonefielddata("select id from $tablenm where title like '%$keyword%'"); 
			$fldnm = findfieldname($searchbase);
			if ($id != "")
			 $searchquery = "tbldatingusermaster." . "$fldnm = $id and "; 
		}
	}
	return $searchquery;
}
function findfieldname($searchbase)
{
	if ($searchbase == "R")
		return "religianid";
	elseif ($searchbase == "L")
		return "countryid";
	elseif ($searchbase == "C")
		return "castid";
	elseif ($searchbase == "O")
		return "ocupationid";
	elseif ($searchbase == "M")
		return "maritalstatusid";
	elseif ($searchbase == "S")
		return "specialcasesid";
	elseif ($searchbase == "MT")
		return "motherthoungid";
	elseif ($searchbase == "EDU")
		return "educationid";	
}

function findtablename($searchbase)
{
	if ($searchbase == "R")
		return "tbldatingreligianmaster";
	elseif ($searchbase == "L")
		return "tbldatingcountrymaster";
	elseif ($searchbase == "C")
		return "tbldatingcastmaster";
	elseif ($searchbase == "O")
		return "tbldatingoccupationmaster";
	elseif ($searchbase == "M")
		return "tbldatingmaritalstatusmaster";
	elseif ($searchbase == "S")
		return "tbldatingspecialcasemaster";
	elseif ($searchbase == "MT")
		return "tbldatingmothertonguemaster";
	elseif ($searchbase == "EDU")
		return "tbl_education_master";	
}
function findadminsearchquery($searchid)
{ 
	$searchquery  = "";
	$result = getdata("select searchbase1,keyword1,gender,agefrom,ageto,searchbase2,keyword2,keyword FROM tbldatingadminsearchmaster where  currentstatus=0 and searchid=$searchid");
while($rs= mysqli_fetch_array($result))
{
	$searchbase1 = $rs[0];
	$keyword1 = $rs[1];
	$gender = $rs[2];
	$agefrom = $rs[3];
	$ageto = $rs[4];
	$searchbase2 = $rs[5];
	$keyword2 = $rs[6];
	$keyword = $rs[7];
	$searchquery .= findsearchquery($searchbase1,$keyword1);
	$searchquery .= findsearchquery($searchbase2,$keyword2);
	if ($gender != "")
		$searchquery .= " tbldatingusermaster.genderid=$gender and ";
	if ($agefrom != "")
		$searchquery .= findagefld() . ">= $agefrom and ";
	if ($ageto != "")
		$searchquery .= findagefld() . "<= $ageto and ";
	if ($keyword != "")
		$searchquery .= " (tbldatingusermaster.name like '%$keyword%' or tbldatingusermaster.city like '%$keyword%' or tbldatingusermaster.postcode  like '%$keyword%' or tbldatingusermaster.subcast  like '%$keyword%' or tbldatingusermaster.annualincome like '%$keyword%' or tbldatingusermaster.area like '%$keyword%' or tbldatingusermaster.personality like '%$keyword%' or tbldatingusermaster.familybackground like '%$keyword%' or tbldatingusermaster.profileheadline like '%$keyword%' or tbldatingusermaster.hobbiesintrest like '%$keyword%') and ";
	}
	freeingresult($result);
	return $searchquery;
}
?>