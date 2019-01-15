<? require_once("commonfileadmin.php");
	
if(isset($_POST['b']) && $_POST['b']!='')
{
	 $type=$_POST['b'];	

}else{

   $type='';

}



if(isset($_POST['title']) && $_POST['title']!='')
{
	 $title=$_POST['title'];	

}else{

   $title='';

}

if($title!='' && $type!=''){

$sSql="insert into  tbldating_doct_detail (type,title) values ('".$type."','".$title."')";
execute($sSql);

$mess="";

}else{
	
$mess="Not added";	

}


echo  $mess; exit;



?>
