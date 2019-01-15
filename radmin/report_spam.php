<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}

if(isset($_POST['userid']) && $_POST['userid']!='')
{
	$userid=$_POST['userid'];
}


$sSql = "update tbldatingusermaster set currentstatus='8' where userid='".$userid."' ";
execute($sSql);


			



if($type==1)
{
	$type_nm='pass';
	$title = getonefielddata("SELECT password from tbldatingusermaster WHERE userid='".$userid."' ");	
}
if($type==2)
{
	$title = getonefielddata("SELECT createip from tbldatingusermaster WHERE userid='".$userid."' ");	
	$type_nm='ip';
}

if($type==5)
{
	$title = getonefielddata("SELECT email from tbldatingusermaster WHERE userid='".$userid."' ");
	$title=explode('@',$title);
	$title="@".$title[1];
	$type_nm='email';
}
			if($type==1 || $type==2 || $type==5)
			{
				$chk = getonefielddata("SELECT count(id) from tbl_spam_master
				 WHERE title='".$title."' and type='".$type_nm."' and currentstatus=0 ");	
				
				if($chk==0)
				{
					$sSql = "insert into tbl_spam_master (title,type,createby,createip,createdate)
					values('".$title."','".$type_nm."','1','".$_SERVER['REMOTE_ADDR']."',curdate())";  
					execute($sSql);	
				}
			}
			
			
	if($type==4)
{
	execute("DELETE FROM `tbldatingusermaster` WHERE  userid='".$userid."' ");
}		
			
?>