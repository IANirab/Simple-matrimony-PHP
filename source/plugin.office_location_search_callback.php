<?

ob_start();
include("commonfile.php");
	
$search_keyword = '';

if(isset($_POST['search_keyword']) && $_POST['search_keyword']!=''){
	$search_keyword = $_POST['search_keyword'];
}
//echo "<button id='show'>Show</button><button id='hide'>Close</button>";

//echo "<a id='hide' onclick='btnclose();'>Close</a>";
$data2='';
$data2.="<a id='hide' class='close' onclick='btnclose();'>×</a><div class='form_edit'>"; 
if($search_keyword!='')
{
 $sSql = "
SELECT ol.city, ol.state,ol.countryid, ol.contact_person, ol.address, ol.street1,ol.street2,ol.postcode,ol.email,ol.mobile, tbldating_city_master.title, tbldating_state_master.title, tbldatingcountrymaster.title ,tbldating_district_master.title,tbldating_panchayat_master.title
FROM  tbl_agent_master as ol 
Inner Join tbldating_city_master ON tbldating_city_master.id = ol.city 
Inner Join tbldating_state_master ON tbldating_state_master.id = ol.state 
Inner Join tbldatingcountrymaster ON tbldatingcountrymaster.id = ol.countryid 
Inner Join tbldating_district_master ON tbldating_district_master.id = ol.districtid
Inner Join tbldating_panchayat_master ON tbldating_panchayat_master.id = ol.panchayatid
WHERE 
ol.	contact_person LIKE '%".$search_keyword."%' 
OR ol.street1 LIKE '%".$search_keyword."%'
OR ol.street2 LIKE '%".$search_keyword."%'
OR ol.address LIKE '%".$search_keyword."%'
OR ol.postcode LIKE '%".$search_keyword."%'
OR ol.email LIKE '%".$search_keyword."%'
OR ol.mobile LIKE '%".$search_keyword."%'
OR tbldating_city_master.title LIKE '%".$search_keyword."%'
OR tbldating_state_master.title LIKE '%".$search_keyword."%'
OR tbldatingcountrymaster.title LIKE '%".$search_keyword."%'
OR tbldating_district_master.title LIKE '%".$search_keyword."%'
OR tbldating_panchayat_master.title LIKE '%".$search_keyword."%'
";

$result = getdata($sSql);
while ($rs = mysqli_fetch_array($result)){ 
$contactPerson = $rs['contact_person'];
$NameOfOffice = $rs['street1'];

$StreetAdd = $rs['street2'];
$LandAdd = $rs['address'];
$Postcode = $rs['postcode'];
$Email = $rs['email'];
$Phone =  $rs['mobile'];
$Country_name = $rs['12'];
$State_name = $rs['11'];
$City_name = $rs['10'];
$district_name = $rs['13'];
$munciple_name = $rs['14'];

$data2.="<div class='franchisee_searc_name'><strong>".$contactPerson."</br>" .$NameOfOffice.  "</strong>".
"<p>".$StreetAdd ."&nbsp;,&nbsp;".$LandAdd ."&nbsp;,&nbsp;" .$Postcode ."</br>".$munciple_name."&nbsp;,"
.$City_name."&nbsp;,".$district_name ."&nbsp;,&nbsp;".
"&nbsp;,&nbsp;".$Country_name."</p></div>";

}freeingresult($result);

}
else{
	
	//$qry='';
	//$result = getdata($qry);
}
$data2.='</div>';
echo $data2; 

?>






      
      
      
   