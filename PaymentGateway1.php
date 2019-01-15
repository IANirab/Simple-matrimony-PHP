<?
require_once("translation.php");

$type=0;
if(isset($_GET['t']) && $_GET['t']!=''){
  $type=$_GET['t'];
}

$paymentid=0;
if(isset($_GET['b']) && $_GET['b']!=''){
  $paymentid=$_GET['b'];
}


if($type==15){

require_once($sourcepath."insta.php");	

}else if($type==14){

require_once($sourcepath."paytm.php");
	
}else if($type==13){

require_once($sourcepath."payumoney.php");

}else if($type==16){
require_once($sourcepath."razerpay.php");
}
else{
 	
 //do nothing	
 
}

?>