<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if(isset($_POST['val']) && $_POST['val']!='')
{
	$searchbase=$_POST['val'];
}

if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}


if ($searchbase == "R")
		$tblnm= "tbldatingreligianmaster";
	elseif ($searchbase == "L")
		$tblnm= "tbldatingcountrymaster";
	elseif ($searchbase == "C")
		$tblnm= "tbldatingcastmaster";
	elseif ($searchbase == "O")
		$tblnm= "tbldatingoccupationmaster";
	elseif ($searchbase == "M")
		$tblnm= "tbldatingmaritalstatusmaster";
	elseif ($searchbase == "S")
		$tblnm= "tbldatingspecialcasemaster";
	elseif ($searchbase == "MT")
		$tblnm= "tbldatingmothertonguemaster";
	elseif ($searchbase == "EDU")
		$tblnm= "tbl_education_master";	
	
	$data='';
	if($type==1)
	{
		$data.='<select name="keyword1" class="form-control">';
	}
	if($type==2)
	{
		$data.='<select name="keyword2" class="form-control">';
	}
	
	
	$result = getdata("select id,title FROM ".$tblnm." where currentstatus=0 and title!='' order by title asc ");
	while($rs= mysqli_fetch_array($result))
	{
		$data.='<option value='.$rs[0].'>'.$rs[1].'</option>';
		
	}
	$data.='</select>';
	echo $data; exit;
	
?>