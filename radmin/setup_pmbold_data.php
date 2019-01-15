<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();


	$result=getdata("select fromuserid,touserid,accepted,createdate,createby,createip 
	from tbldatingexpressintrestmaster where currentstatus=0 ");
	while($rs=mysqli_fetch_array($result))
	{
			$fromuserid=$rs[0];
			$touserid=$rs[1];
			$accepted=$rs[2];
			$createdate=$rs[3];
			$createby=$rs[4];
			$createip=$rs[5];
			
		$sSql = "insert into  tbldatingpmbmaster (ToUserId,FromUserId,type,status,create_date,createby,CreateIP,CreateDate)
		values('".$touserid."','".$fromuserid."','1','".$accepted."','".$createdate."','".$createby."','".$createip."'
		,'".$createdate."')";				
		execute($sSql); 
		
	}
	
	$result=getdata("select fromuserid,touserid,accepted,createdate,createby,createip 
	from tbldatingimagerequestmaster where currentstatus=0 ");
	while($rs=mysqli_fetch_array($result))
	{
			$fromuserid=$rs[0];
			$touserid=$rs[1];
			$accepted=$rs[2];
			$createdate=$rs[3];
			$createby=$rs[4];
			$createip=$rs[5];
			
		$sSql = "insert into  tbldatingpmbmaster (ToUserId,FromUserId,type,status,create_date,createby,CreateIP,CreateDate)
		values('".$touserid."','".$fromuserid."','4','".$accepted."','".$createdate."','".$createby."','".$createip."'
		,'".$createdate."')";				
		execute($sSql); 
		
	}
	
	

echo '<h1>Data Inserted sucessfully</h1>';
?>