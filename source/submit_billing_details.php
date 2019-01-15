<? ob_start();
include("commonfile.php");
global $enable_tax_module;
global $International_selling;
$bill_name='';
$bill_address='';
$bill_pin='';
$bill_phone='';
$cmbcountryid='';
$cmbstateid='';
$cmbcityid='';

 $userid=$_SESSION[$session_name_initital."memberuserid"];

if(isset($_POST['bill_name']) && $_POST['bill_name']!='')
{
	$bill_name=$_POST['bill_name'];
}

if(isset($_POST['bill_address']) && $_POST['bill_address']!='')
{
	$bill_address=$_POST['bill_address'];
}

if(isset($_POST['cmbcountryid']) && $_POST['cmbcountryid']!='')
{
	$cmbcountryid=$_POST['cmbcountryid'];
}

if(isset($_POST['cmbstateid']) && $_POST['cmbstateid']!='')
{
	$cmbstateid=$_POST['cmbstateid'];
}

if(isset($_POST['cmbcityid']) && $_POST['cmbcityid']!='')
{
	$cmbcityid=$_POST['cmbcityid'];
}

if(isset($_POST['bill_pin']) && $_POST['bill_pin']!='')
{
	$bill_pin=$_POST['bill_pin'];
}

if(isset($_POST['bill_phone']) && $_POST['bill_phone']!='')
{
	$bill_phone=$_POST['bill_phone'];
}

if(isset($_POST['paymentid']) && $_POST['paymentid']!='')
{
	$paymentid=$_POST['paymentid'];
}


	execute("update tbldatingpaymentmaster set 
	bill_name='".$bill_name."',bill_address='".$bill_address."',bill_pin='".$bill_pin."',bill_phone='".$bill_phone."',
	bill_country='".$cmbcountryid."',bill_state='".$cmbstateid."',bill_city='".$cmbcityid."',
	ModifyDate='".date('Y-m-d')."', ModifyBy='".$userid."', ModifyIP='".$_SERVER['REMOTE_ADDR']."' 
	where paymentid='".$paymentid."' ");

$admin_state=findsettingvalue("tax_state");
$user_state=$cmbstateid;

if($International_selling=='Y')
{
	$taxtype2='cess2';
}
else
{
		if($enable_tax_module=='Y' && $admin_state==$user_state)
		{
			$taxtype2='cgst';
		}
		elseif($enable_tax_module=='Y' && $admin_state!=$user_state)
		{
			$taxtype2='igst';
		}else{$taxtype2='xyz';}

}


$result = getdata("select paymentdetailid,packageid,price,orignal_price from tbldatingpaymentdetail where paymentid='".$paymentid."' and tax_calc='N' ");
	while ($rs = mysqli_fetch_array($result))
	{
		
		$paymentdetailid=$rs[0];	
		$packageid=$rs[1];	
		$price=$rs[2];	
		$orignal_price=$rs[3];	
		
		$taxid = getonefielddata("select hsncode from tbldatingpackagemaster where packageid='".$packageid."' ");
		$packagename = getonefielddata("select Description from tbldatingpackagemaster where packageid='".$packageid."' ");
		$hsncode = getonefielddata("select hsncode from tbldatingtaxmaster where id='".$taxid."' ");
		$cess1=findtaxvalue("cess1",$taxid);	
		$cess2=findtaxvalue("cess2",$taxid);	

		if($admin_state==$user_state && $enable_tax_module=='Y' && $International_selling=='N')
		{
			$cgst=findtaxvalue("cgst",$taxid);	
			$sgst=findtaxvalue("sgst",$taxid);	
			
				if($cgst!='' && $cgst!=0)
				{
					$cgst_val=$price*$cgst/100;
				}else{$cgst_val=0;}

				if($sgst!='' && $sgst!=0)
				{
					$sgst_val=$price*$sgst/100;
				}else{$sgst_val=0;}	

				if($cess1!='' && $cess1!=0)
				{
					$cess1_val=$price*$cess1/100;
				}else{$cess1_val=0;}

				if($cess2!='' && $cess2!=0)
				{
					$cess2_val=$price*$cess2/100;
				}else{$cess2_val=0;}


				$price=$price+$cgst_val+$sgst_val+$cess1_val+$cess2_val;

				execute("update tbldatingpaymentdetail set price='".$price."',display_price='".$price."',
				hsncode='".$hsncode."',cgst_p='".$cgst."',cgst_v='".$cgst_val."',sgst_p='".$sgst."',
				sgst_v='".$sgst_val."',cess1_p='".$cess1."',cess1_v='".$cess1_val."',cess2_p='".$cess2."',
				cess2_v='".$cess2_val."',tax_calc='Y' where paymentdetailid='".$paymentdetailid."' ");
		}

		elseif($admin_state!=$user_state && $enable_tax_module=='Y' && $International_selling=='N')
		{
				$igst=findtaxvalue("igst",$taxid);	
	
				if($igst!='' && $igst!=0)
				{
					$igst_val=$price*$igst/100;
					//$igst_val=number_format($igst_val,2);	
				}else{$igst_val=0;}	

				if($cess1!='' && $cess1!=0)
				{
					$cess1_val=$price*$cess1/100;
				//	$cess1=number_format($cess1,2);	
				}else{$cess1_val=0;}

				if($cess2!='' && $cess2!=0)
				{
					$cess2_val=$price*$cess2/100;
					//$cess2_val=number_format($cess2_val,2);	
				}else{$cess2_val=0;}

				$price=$price+$igst_val+$cess1_val+$cess2_val;
			//	$price=number_format($price,2);	


				execute("update tbldatingpaymentdetail set price='".$price."',display_price='".$price."',
				hsncode='".$hsncode."',igst_p='".$igst."',igst_v='".$igst_val."',
				cess1_p='".$cess1."',cess1_v='".$cess1_val."',cess2_p='".$cess2."',
				cess2_v='".$cess2_val."',tax_calc='Y' where paymentdetailid='".$paymentdetailid."' ");
				
		}	
		elseif($International_selling=='Y')
		{
				
	
				if($cess2!='' && $cess2!=0)
				{
					$cess2_val=$price*$cess2/100;
					//$cess2_val=number_format($cess2_val,2);	
				}else{$cess2_val=0;}

				$price=$price+$cess2_val;
			//	$price=number_format($price,2);	
				
				execute("update tbldatingpaymentdetail set price='".$price."',display_price='".$price."',
				hsncode='".$hsncode."',cess2_p='".$cess2."',
				cess2_v='".$cess2_val."',tax_calc='Y' where paymentdetailid='".$paymentdetailid."' ");
				
		}
		
		

	}

	$tot_price_arr=array();
	$tot_price_final='';
$result1 = getdata("select price from tbldatingpaymentdetail where paymentid='".$paymentid."' ");
	while ($rs1 = mysqli_fetch_array($result1))
	{
		$price1=$rs1[0];
		array_push($tot_price_arr,$price1);
		
		
	}
	
	for($i=0;$i<count($tot_price_arr);$i++)
	{
	
		 $tot_price_final=$tot_price_final+$tot_price_arr[$i];
	}

	
	execute("update tbldatingpaymentmaster set totalpaymentamount='".$tot_price_final."',subtotal='".$tot_price_final."',
	ModifyDate='".date('Y-m-d')."', ModifyBy='".$userid."', ModifyIP='".$_SERVER['REMOTE_ADDR']."' 
	where paymentid='".$paymentid."' ");
	

?>
<?=display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."~"?>
	
   <? $result = getdata("select bill_name,bill_address,bill_country,bill_state,bill_city,bill_pin,bill_phone
				 from tbldatingpaymentmaster where currentstatus in(0) and paymentid=$paymentid  ");
				while ($rs = mysqli_fetch_array($result))
				{
					$bill_name=$rs[0];
					$bill_address=$rs[1];
					$bill_country=$rs[2];
					$bill_state=$rs[3];
					$bill_city=$rs[4];
					$bill_pin=$rs[5];
					$bill_phone=$rs[6];
				}
		$info ='<div class="billing_info"><h3 class="billig_head">'.$payment_title_txt.'</h3><a href="payment.php?b='.$paymentid.'" class="update_billing">'.$search_txt4.'</a><ul>'; 		
		$info .='<li><strong><i class="fa fa-user" aria-hidden="true"></i> '.$contactusname.'</strong> '.$bill_name.'</li>'; 		
		$info .='<li><strong><i class="fa fa-map-marker" aria-hidden="true"></i> '.$updatecontactprofileaddress.'</strong>'.$bill_address; 

		if($bill_city!='' && $bill_city!=0.0)
		{
			$city_name=getonefielddata("select title from tbldating_city_master where id='".$bill_city."' ");
			$info .=',<br />'.$city_name;
		}
		
		if($bill_state!='' && $bill_state!=0.0)
		{
			$state_name=getonefielddata("select title from tbldating_state_master where id='".$bill_state."' ");
			$info .=' ,'.$state_name;
		}
		
		if($bill_country!='' && $bill_country!=0.0)
		{
			$country_name=getonefielddata("select title from tbldatingcountrymaster where id='".$bill_country."' ");
			$info .='<br>'.$country_name;
		}
		
		if($bill_pin!='')
		{
			$info .='-'.$bill_pin; 			
		}	
		


		if($bill_phone!='')
		{
			$info .='<li><strong><i class="fa fa-phone" aria-hidden="true"></i> '.$directory_detail_phone.' :</strong>'.$bill_phone.'</li>'; 			
		}	
		

		$info .='</ul></div>'; 		
		echo $info;
		exit;
	?>