<? 
if(isset($_POST['b']) && $_POST['b']!='')
{
	require_once("commonfileadmin.php");
	$userid=$_POST['b'];
	$curruserid=$_POST['b'];
}else{$userid=0;$curruserid=0;}


$sql="select dob,birthtime,birthplace,moonsign,horoscope,name,email,phno,city from tbldatingusermaster where userid='".$userid."' ";
$result=getdata($sql);
while($rs=mysqli_fetch_array($result))
{
	$date_of_birth=$rs[0];
	$bith_time=$rs[1];
	$bith_place=$rs[2];
	$moon_sign=$rs[3];
	$horoscope=$rs[4];
	$name=$rs[5];
	$email=$rs[6];
	$phone=$rs[7];
	$cityid=$rs[8];
	
	$date_of_birth=date_create($date_of_birth);
	$date_of_birth=date_format($date_of_birth,'d M, Y');
	
	
	if($cityid!="" && $cityid!='0.0' && is_numeric($cityid))
	{
		$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$cityid);	
	}else{$city='';} 
	
}

?>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h4><strong>Name : </strong><?=$name?></h4>
    <h4><strong>Email : </strong><?=$email?></h4>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h4><strong>Phone : </strong>
	<? if($phone!=''){echo $phone; }else{echo "-";} ?>
    </h4>
    <h4><strong>City : </strong>
	<? if($city!=''){echo $city; }else{echo "-";} ?>
    </h4>
</div>

		<ul class="list-group">
           
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong>Name </strong></span>
                <span class="astro_val">: <? if($name!=''){ echo $name; }else{echo "-";}?></span>
			</li>
            
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong>Date Of Birth </strong></span>
                <span class="astro_val">:<? if($date_of_birth!=''){ echo $date_of_birth; }else{echo "-";}?></span>
			</li>
            
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong>Birth Time </strong></span>
                <span class="astro_val">:<? if($bith_time!=''){ echo $bith_time; }else{echo "-";}?> </span>
			</li>
            
       </ul>
       
       <ul class="list-group">     
            
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong>Birth Place </strong></span>
                <span class="astro_val">: <? if($bith_place!=''){ echo $bith_place; }else{echo "-";}?> </span>
			</li>
            
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong>Moon Sign </strong></span>
                <span class="astro_val">:<? if($moon_sign!=''){ echo $moon_sign; }else{echo "-";}?> </span>
			</li>
            
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
                <span class="lable"> <strong> Horoscope </strong></span>
                <span class="astro_val">: <? if($horoscope!=''){ 
				echo "<a href='../uploadfiles/".$horoscope."' target='_blank'>".$horoscope."</a>"; 
				}else{echo "-";}?> </span>
			</li>
            
         </ul> 

            
	
