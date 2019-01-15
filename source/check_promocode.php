<? ob_start();
include("commonfile.php");

global $enable_tax_module;
global $International_selling;
$admin_state=findsettingvalue("tax_state");

if(isset($_POST['paymentid']) && $_POST['paymentid']!="")
  {
	$paymentid = $_POST['paymentid'];
  }
  
$user_state = getonefielddata("select bill_state from tbldatingpaymentmaster 
where paymentid='".$paymentid."' ");


if($user_state!='' && $user_state!=0.0)
{

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

}else{$taxtype2='xyz';}
  
  
  
  
  if(isset($_POST['promo_code']) && $_POST['promo_code']!=""){
	$code = $_POST['promo_code'];
  
$get_promoid = getonefielddata("SELECT specialofferid from tblscspecialoffermaster WHERE specialoffercode='".$code."' AND active='Y' AND currentstatus='0'");


	if($get_promoid!="")
	{
			$promo_details = getdata("SELECT specialoffertype, specialsffervalue,specialsffervaluedisplay from tblscspecialoffermaster WHERE specialofferid=".$get_promoid);
				$rs_promo = mysqli_fetch_array($promo_details);
			{	
				
				$type = $rs_promo['specialoffertype'];
				$value = $rs_promo['specialsffervalue'];
				$valuedisplay = $rs_promo['specialsffervaluedisplay'];
	
			
				$sql = getdata("SELECT price,discount_p,discount_v from tbldatingpaymentdetail where paymentid='".$paymentid."'
				and discount_promo='N' ");
				$rowcnt=mysqli_num_rows($sql);
				if($rowcnt>0)
				{
				$rs = mysqli_fetch_array($sql);
				{
					 
						$price=$rs[0];
						$old_discount_p=$rs[1];
						$old_discount_v=$rs[2];
						
						//for display price end			
						if($type=='p')
						{
							
							$disc_amt = ($price*$value)/100; 
							$final_amt = $price - $disc_amt;
							$final_amt = round($final_amt);
							
							$new_discount_p=$value+$old_discount_p;
							$new_discount_v=$disc_amt+$old_discount_v;
							
			execute("update tbldatingpaymentdetail set 	discount_p='".$new_discount_p."',	discount_v='".$new_discount_v."',
			price='".$final_amt."',display_price='".$final_amt."',discount_promo='Y'
			where paymentid='".$paymentid."' ");	
			
			execute("update  tbldatingpaymentmaster set totalpaymentamount='".$final_amt."',
							subtotal='".$final_amt."' where paymentid='".$paymentid."' ");	
				
						} else {				
							$final_amt = $price - $value;
							$final_amt = round($final_amt);
							
							$value_p=100*$value/$price;
							$new_discount_p=$value_p+$old_discount_p;
							$new_discount_v=$value+$old_discount_v;
							
							execute("update tbldatingpaymentdetail set discount_p='".$new_discount_p."',
							discount_v='".$new_discount_v."',price='".$final_amt."',
							display_price='".$final_amt."',discount_promo='Y' where paymentid='".$paymentid."' ");		
							
							execute("update  tbldatingpaymentmaster set totalpaymentamount='".$final_amt."',
							subtotal='".$final_amt."' where paymentid='".$paymentid."' ");		
							
						}
				echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__Promocode Validate Succesfully"; exit;		
				}
				}
			echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__Already use Promocode"; exit;
			}
				
	}
		
echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__Wrong Promocode"; exit;
}


    	if(isset($_POST['franchisee_code']) && $_POST['franchisee_code']!='')
		{
				$franchisee_code = $_POST['franchisee_code'];	
			$chk_frnchcode=0;	
			$chk_frnchcode = getonefielddata("SELECT count(agentid) from  tbl_agent_master WHERE 
				agent_code='".$franchisee_code."' AND  currentstatus='0'");
			
			$get_agntdisc = getonefielddata("SELECT discount_percentage from tbl_agent_master
			 WHERE agent_code='".$franchisee_code."' AND  currentstatus='0' ");
			
			if($get_agntdisc!='')
			{
				
				$sql = getdata("SELECT price,discount_p,discount_v from tbldatingpaymentdetail where paymentid='".$paymentid."'
				and discount_agent='N' ");
				$rowcnt=mysqli_num_rows($sql);
				if($rowcnt>0)
				{
					$rs = mysqli_fetch_array($sql);
					{
					 
						$price=$rs[0];
						$old_discount_p=$rs[1];
						$old_discount_v=$rs[2];
						
				
							$disc_amt = ($price*$get_agntdisc)/100; 
							$final_amt = $price - $disc_amt;
							$final_amt = round($final_amt);
							
							$new_discount_p=$old_discount_p+$get_agntdisc;
							$new_discount_v=$old_discount_v+$disc_amt;
							
			execute("update tbldatingpaymentdetail set 	discount_p='".$new_discount_p."',	discount_v='".$new_discount_v."',
			price='".$final_amt."',display_price='".$final_amt."',discount_agent='Y'
			where paymentid='".$paymentid."' ");		
			execute("update tbldatingpaymentmaster SET franchisee_code='".$franchisee_code."' WHERE paymentid=".$paymentid);
			execute("update  tbldatingpaymentmaster set totalpaymentamount='".$final_amt."',
							subtotal='".$final_amt."' where paymentid='".$paymentid."' ");		
			
							echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__".$validation_txt23."~"; exit;		
					}
				}
				else
				{
					echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__".$validation_txt24."~"; exit;
				}
				
			}
			else
			{
				echo display_billing_info($paymentid,$_SESSION[$session_name_initital . "memberuserid"],$taxtype2,'0','0')."__".$validation_txt25."~"; exit;		
			}	

		
		
		}
		
		
			
		
	
		

?>