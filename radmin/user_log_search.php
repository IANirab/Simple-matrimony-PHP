<? 
session_start();
require_once("commonfileadmin.php");
$_SESSION[$session_name_initital . "admin_user_log_search"]="";
if(isset($_POST['b']) && $_POST['b']!='')
{
	$userid=$_POST['b'];
	$curruserid=$_POST['b'];
}
else{$userid=0;$curruserid=0;}

$sdate=date('Y-m-d');
if(isset($_POST['sdate']) && $_POST['sdate']!='')
{
	$sdate=$_POST['sdate'];
	$sdate=date_create($sdate);
 	$sdate=date_format($sdate,"Y-m-d");
}
$tdate=date('Y-m-d');
if(isset($_POST['tdate']) && $_POST['tdate']!='')
{
	$tdate=$_POST['tdate'];
	$tdate=date_create($tdate);
 	$tdate=date_format($tdate,"Y-m-d");
}

 $chk = getonefielddata("SELECT count(id) from  tbl_activity_log WHERE userid='".$userid."' 
 and sdate between '".$sdate."' and '".$tdate."' "); 
	if($chk==0)
	{
		echo '<h4 class="no_log">No activity log found</h2>';	
		exit;
	}

$table='<div id="show_log">';
$table .='<table class="table table-striped">';
$table .='<thead><tr><th>No</th><th>IP</th><th>Session</th><th>Date & Time</th><th>Activity</th><th>Info</th></tr></thead>';
$table .='<tbody>';

   $searchqry=" and sdate between '".$sdate."' and '".$tdate."' ";
   $orderby=' order by id asc  ';
   $frmqry=" FROM `tbl_activity_log` WHERE userid='".$userid."' $searchqry $orderby ";
   $i=1;
   
   $sql=getdata(" SELECT `sessionid`, `sdate`, `stime`, `type`, `note`,`createip` $frmqry ");
	while($rs=mysqli_fetch_array($sql))
	{
		$session_info=$rs[0];
		$sdate=$rs[1];
		$stime=$rs[2];
		$type=$rs[3];
		$note=$rs[4];
		$createip=$rs[5];
		
		$sdate=date_create($sdate);
	 	$sdate=date_format($sdate,"M d, Y");
		
		if($type==1)
		{
			$activity='<button class="btn btn-info" type="button">Login</button>';
		}
		if($type==2)
		{
			$activity='<button class="btn btn-danger" type="button">logout</button>';
		}

	
$table .='<tr>';
$table .='<th scope="row" width="5%">'.$i++.'</th>';
$table .='<td width="10%">'.$createip.'</td>';
$table .='<td width="28%">'.$session_info.'</td>';
$table .='<td width="20%">'.$sdate." ".$stime.'</td>';
$table .='<td width="10%">'.$activity.'</td>';
$table .='<td width="30%">'.$note.'</td>';
$table .='</tr>';
	}
$table .='</tbody>';
$table .='</table>';
$table .='</div>';

echo $table; 
exit;
?>



    
    
      
      
      
      
      
    
  
  

