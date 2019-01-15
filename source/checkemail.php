<? include("commonfile.php");

if(isset($_POST['email']) && $_POST['email']!=''){
  
    $checkalreadyregistered_email = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$_POST['email']."'");
    if($checkalreadyregistered_email >0)
	{   
	 	 echo $validation_txt15."<i class='fa fa-times' aria-hidden='true'></i>"; exit;
	}else{
		echo $validation_txt18."<i class='fa fa-check' aria-hidden='true'></i>"; exit;
	}	
   
}
?>