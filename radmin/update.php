<? 
session_start();
require_once("commonfileadmin.php");
$state = "Lakshadweep,Chandigarh,Dadra and Nagar Haveli,Daman and Diu";
$state_arr = explode(",",$state);
for($i=0; $i<count($state_arr); $i++){	
	execute("INSERT INTO tbldating_city_master SET state_id=28, title='".$state_arr[$i]."', currentstatus=0, languageid=1");
}
?>