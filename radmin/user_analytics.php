<? 
if(isset($_POST['b']) && $_POST['b']!='')
{
	require_once("commonfileadmin.php");
	$userid=$_POST['b'];
	$curruserid=$_POST['b'];
}else{$userid=0;$curruserid=0;}




$name1=getonefielddata("SELECT name from  tbldatingusermaster WHERE userid='".$userid."' ");
$email1=getonefielddata("SELECT email from  tbldatingusermaster WHERE userid='".$userid."' ");
$phone1=getonefielddata("SELECT phno from  tbldatingusermaster WHERE userid='".$userid."' ");
$packageid1=getonefielddata("SELECT packageid from  tbldatingusermaster WHERE userid='".$userid."' ");

/////coding by mayank////

 $countryid='';
 $stateid='';
 $cityid='';
 $area='';
 $postcode='';

 $resultnew = getdata("select countryid,state,city,area,postcode FROM tbldatingusermaster WHERE userid='".$userid."'  ");
 $rsn= mysqli_fetch_array($resultnew);
 $countryid=$rsn['countryid'];
 $stateid=$rsn['state'];
 $cityid=$rsn['city'];
 $area=$rsn['area'];
 $postcode=$rsn['postcode'];


	if($stateid!="" && $stateid!='0.0' && is_numeric($stateid)){
		$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$stateid);	
	} else {
		$state = "";	
	}
	
	
	if($cityid!="" && $cityid!='0.0' && is_numeric($cityid)){
		$city = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$cityid);	
	} else {
		$city = "";	
	}
	
	
	if($countryid!=''){
		if(is_numeric($countryid)){
			$country= getonefielddata("SELECT title from tbldatingcountrymaster WHERE id=".$countryid);	
		} else {
			$country = $countryid;
		}
	} else {
		$country = '';
	}
	

/////coding by mayank////







$expirdate1=getonefielddata("SELECT date_format(expiredate,'$date_format') from  tbldatingusermaster WHERE userid='".$userid."' ");
$package1 = getonefielddata("select Description from tbldatingpackagemaster where PackageId='".$packageid1."' ");
$expire_in_day ='';
	if($expirdate1!='')
	{

		$newDate1 = date("Y-m-d", strtotime($expirdate1)); 
		$date31=date_create($newDate1);
		$date21=date("Y-m-d");
		$date41=date_create($date21);
		if($date31>=$date41)
		{
			$diff1=date_diff($date31,$date41);
		$expire_in_day=$diff1->format("%a days");
		}
		else{$expire_in_day='Expired';}
		
		
	}

?>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h4><strong>Name : </strong><?=$name1?></h4>
    <h4><strong>Email : </strong><?=$email1?></h4>




<h4><strong>Address : </strong>

<? if($area!=''){?><?=$area?><? } ?>

<? if($city!=''){?><br><?=$city?><? } ?>

<? if($state!=''){?>,<?=$state?><? } ?>

<? if($country!=''){?>,<?=$country?><? } ?>

<? if($postcode!=''){?>-<?=$postcode?><? } ?>

</h4>
</div>


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <h4><strong>Phone : </strong><? if($phone1!=''){?><?=$phone1?><? } else{?>-<? } ?></h4>
    <h4><strong>Membership : </strong>
	<?=$package1?> 
    <? if($package1!=''){?>
    <? if($expire_in_day=='Expired'){ echo ",".$expire_in_day; } else {?>
    <br>Expire in (Days) <?=$expire_in_day?> <? } ?>
    <? }else{echo "-";} ?>
    </h4>
</div>

<?

 $profile_percentage = find_profile_fill_percentage($userid);
$lastlogin_day=0;
 $lastlogin=getonefielddata("SELECT lastlogin from  tbldatingusermaster WHERE userid='".$userid."' ");
	if( $lastlogin!='')
	{
		$lastlogindate_arr=explode(" ",$lastlogin);
		$lastlogindate=$lastlogindate_arr[0];
		
		$newDate = date("Y-m-d", strtotime($lastlogindate)); 
		$date2=date("Y-m-d");
		$date3=date_create($newDate);
		$date4=date_create($date2);
		$diff=date_diff($date3,$date4);
		$lastlogin_day=$diff->format("%a days ago ");
	}
	$genid = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$curruserid);
	



$intrest_received = getonefielddata("SELECT count(Pmbid) from tbldatingpmbmaster WHERE currentstatus in (0) and touserid=$curruserid and currentstatus=0 and type=1");





$intrest_sent = getonefielddata("SELECT count(Pmbid) from tbldatingpmbmaster WHERE currentstatus in (0) and fromuserid=$curruserid and currentstatus=0 and type=1");





$image_on_request_sent = getonefielddata("SELECT count(Pmbid) from tbldatingpmbmaster WHERE currentstatus in (0) and fromuserid=$curruserid and currentstatus=0 and type=4");





$image_on_request_received = getonefielddata("SELECT count(Pmbid) from tbldatingpmbmaster WHERE currentstatus in (0) and touserid=$curruserid and currentstatus=0 and type=4");


$total_favorite_member =total_shortlist_member($curruserid);
$total_preffered_partner = total_partner_profile_match($curruserid);

$total_blocked_ignore = getonefielddata("select count(black_list_id) from tbl_user_blacklist_master where currentstatus=0 and from_user_id=$curruserid");




$view_my_contct = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.touserid=$curruserid AND tblphonerequestmaster.fromuserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");
 
 $viwed_byme_contcact = getonefielddata("SELECT count(tblphonerequestmaster.id) from tblphonerequestmaster,tbldatingusermaster WHERE tblphonerequestmaster.fromuserid=$curruserid AND tblphonerequestmaster.touserid=tbldatingusermaster.userid and tbldatingusermaster.currentstatus in (0,1) AND tblphonerequestmaster.currentstatus=0");
 
 $msg_3_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where  tbldatingprofilehistorymaster.touserid=$curruserid and  tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.fromuserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=".$genid."  group by touserid order by historyid DESC");
$member_view_myprofile = mysqli_num_rows($msg_3_result);

$msg_4_result = getdata("select historyid from tbldatingprofilehistorymaster,tbldatingusermaster where tbldatingprofilehistorymaster.fromuserid=$curruserid and tbldatingprofilehistorymaster.currentstatus =0 and tbldatingusermaster.currentstatus in (0,1) and tbldatingprofilehistorymaster.touserid = tbldatingusermaster.userid AND tbldatingusermaster.genderid!=$genid group by touserid order by historyid");
$member_view_byme = mysqli_num_rows($msg_4_result);

 
?>

<div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="<?=$profile_percentage?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=$profile_percentage?>%">
    <?=$profile_percentage?>% Profile Completed
  </div>
</div>



		<ul class="list-group">
        	
            <li class="list-group-item">
       <span class="icon"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                <span class="lable"> Last Login </span>
            	<span class="badge badge-default badge-pill"><?=$lastlogin_day?></span>
                
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
           <span class="lable"> Interset Received</span>
            	<span class="badge badge-default badge-pill"><?=$intrest_received?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
           		<span class="lable"> Interset Sent</span>
            	<span class="badge badge-default badge-pill"><?=$intrest_sent?></span>
                <span></span>
            </li>
            
             <li class="list-group-item">
             <span class="icon"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
           		<span class="lable"> Image Request Sent</span>
            	<span class="badge badge-default badge-pill"><?=$image_on_request_sent?></span>
                <span></span>
            </li>
            
             <li class="list-group-item">
             <span class="icon"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
           		<span class="lable"> Image Request Received</span>
            	<span class="badge badge-default badge-pill"><?=$image_on_request_received?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
           		<span class="lable"> Favorite</span>
            	<span class="badge badge-default badge-pill"><?=$total_favorite_member?></span>
                <span></span>
            </li>           
     	</ul>

        <ul class="list-group"> 
        <li class="list-group-item">
             <span class="icon"><i class="fa fa-gratipay" aria-hidden="true"></i></span>
           		<span class="lable"> Prefer Partner</span>
            	<span class="badge badge-default badge-pill"><?=$total_preffered_partner?></span>
                <span></span>
            </li>      
             <li class="list-group-item">
             <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
           		<span class="lable"> Block  Contact</span>
            	<span class="badge badge-default badge-pill"><?=$total_blocked_ignore?></span>
                <span></span>
            </li>
            
             <li class="list-group-item">
             <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
           		<span class="lable"> View My Contact</span>
            	<span class="badge badge-default badge-pill"><?=$view_my_contct?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
           		<span class="lable"> View By Me Contact</span>
            	<span class="badge badge-default badge-pill"><?=$viwed_byme_contcact?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
           		<span class="lable"> View My Profile</span>
            	<span class="badge badge-default badge-pill"><?=$member_view_myprofile?></span>
                <span></span>
            </li>
            
            <li class="list-group-item">
             <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
           		<span class="lable"> Viewed Profile</span>
            	<span class="badge badge-default badge-pill"><?=$member_view_byme?></span>
                <span></span>
            </li>
           </ul> 

            
	
