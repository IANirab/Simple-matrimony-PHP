<!-- ********* TITLE START HERE *********-->
		 <div class="pagetitle">
        
        <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $paymentaddtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div>     
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		<div class="section-payment">
        	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left-section">
            
            
            	<div id="validate_code" class="paymentDForm">
                <? if($agent_module_enable=='Y'){ ?>
                
                <div class="col-lg-6"> 
                	<div class="promoCode">
                        <div class="form-group">
                        <div class="col-lg-12 error1" id="frnc_code" style="display:none"></div>
                            <label class="col-lg-12 col-md-12 control-label"><?=$payment_franchcode?></label>
                            <div class="col-lg-5 col-md-5">
                            <?
                            	$get_agentid = getonefielddata("SELECT agentid from 
								 tbl_agent_user_master where userid='".$_SESSION[$session_name_initital . "memberuserid"]."' ");
								
								
								if($get_agentid!='')
								{
									$get_agent_code = getonefielddata("SELECT agent_code from 
									tbl_agent_master where agentid='".$get_agentid."' ");
								}else{$get_agent_code='';}
								
							?>
                            
                              <input type="text" name="franchisee_code" id="franchisee_code" class="form-control" 
                              placeholder="Enter Code" value="<?=$get_agent_code?>"/>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <a class="btn" onclick="check_promocode('frnch_loader')"><?=$promo_btn?> <i class="fa fa-play-circle-o" aria-hidden="true"></i></a>  
                            </div>
                             <span class="loaderp" id="frnch_loader" style="display: none;">
                                <img src="<?= $siteimagepath ?>images/loaderp.gif" class="img-responsive"> 
                            </span>
                        </div>
                    </div>
                </div>               
                <? } ?>				
                <div class="col-lg-6"> 
                	<div class="promoCode">
                        <div class="form-group">
                		<div class="col-lg-12 error1" id="dis_codeerror" style="display:none"></div>
                    	<label class="col-lg-12 col-md-12 control-label"><?= $payment_promocode ?></label>
                    	<div class="col-lg-5 col-md-5">
                  	  		<input type="text" name="promo_code" id="promo_code" class="form-control"  
                          placeholder="Enter Code" />
                   		</div>
                        <div class="col-lg-7 col-md-7">
                            <a class="btn" onclick="check_promocode('promo_loader')"><?=$promo_btn?> <i class="fa fa-play-circle-o" aria-hidden="true"></i> </a> 
                        </div>
                        <span class="loaderp" id="promo_loader" style="display: none;">
	                        <img src="<?= $siteimagepath ?>images/loaderp.gif" class="img-responsive"> 
                        </span>
                    </div>
                    </div>
                </div>
                
               
            </div>

            <div id="bill_info_form">
               

            <?
            	$userprofile_name=''; $userprofile_address=''; $userprofile_countryid=''; $userprofile_state='';
				$userprofile_city=''; $userprofile_postcode=''; $userprofile_mobile='';
				$result12 = getdata("select name,address,countryid,state,city,postcode,mobile from tbldatingusermaster
				where currentstatus in(0,1) and userid=$curruserid ");
				while ($rs12 = mysqli_fetch_array($result12))
				{
					$userprofile_name=$rs12[0];
					$userprofile_address=$rs12[1];
					$userprofile_countryid=$rs12[2];
					$userprofile_state=$rs12[3];
					$userprofile_city=$rs12[4];
					$userprofile_postcode=$rs12[5];
					$userprofile_mobile=$rs12[6];
					
				}
			
			?>
            <h3 class="billig_head"><?=$chkot_lable?></h3>
            <span class="switch_outer">
             <label class="switch">
                <input type="checkbox" onclick="update_checkout('<?=$userprofile_name?>','<?=$userprofile_address?>','<?=$userprofile_countryid?>','<?=$userprofile_state?>','<?=$userprofile_city?>','<?=$userprofile_postcode?>','<?=$userprofile_mobile?>');">
                <span class="slider round"></span>
                </label>
             </span>
            
            <script>
			function update_checkout(name,address,county,state,city,postcode,mobile)
			{
				$("#bill_name").val(name);
				$("#bill_address").val(address);
				$("#cmbcountryid").val(county);
				$("#cmbstateid").val(state);
				$("#cmbcityid").val(city);
				$("#bill_pin").val(postcode);
				$("#bill_phone").val(mobile);
			}
			</script>
            
            
            <?
			
					$bill_name='';
					$bill_address='';
					$bill_country='';
					$bill_state='';
					$bill_city='';
					$bill_pin='';
					$bill_phone='';
            	$result = getdata("select bill_name,bill_address,bill_country,bill_state,bill_city,bill_pin,bill_phone
				 from tbldatingpaymentmaster where currentstatus in(0) and paymentid=$action and CreateBy=$curruserid ");
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
			?>
            
            	
            	<form class="paymentDForm payment_secd_BG" onsubmit="return submit_billing_details();">
                  	
                            
                    <div id="error_bill" style="display: none;" name="error_bill" class="error1"></div>
                    
                    <div class="form-group">
							<label class="col-lg-12 control-label"><?=$updatecontactprofilename?></label>
                            
                            <div class="col-lg-12">
                            <nice>
                            <input name="bill_name" id="bill_name" value="<?=$bill_name?>" size="35" class="form-control" maxlength="255" type="text">
                            <span class="requiredStar">*</span></nice>
                            
                    </div>
                    </div>
                    
                    <div class="form-group">
                            <label class="col-lg-12 control-label"><?=$directorydisplay_print_detail_address?>:</label>
                             
                            <div class="col-lg-12">
                            <nice>
        <input name="bill_address" id="bill_address" value="<?=$bill_address?>" size="35" class="form-control" maxlength="255" type="text"><span class="requiredStar">*</span></nice>
                            </div>
                </div>
                <? 
				if($bill_country!='')
				{
					$countryid=$bill_country;
					$con_dis='disabled="disabled"';
				}else{$countryid='113';$con_dis='';}?>
                <div class="form-group">
                            <label class="col-lg-12 control-label"><?=$default_displayprofile_country?>:</label>
                      
                            <div class="col-lg-12">
                            <nice>
              <select name="cmbcountryid" id="cmbcountryid" class="form-control" onchange="get_state(this.value)" 
			  <?=$con_dis?>>
        <? fillcombo("select id,title from tbldatingcountrymaster where currentstatus IN (0) and languageid=$sitelanguageid order by title",$countryid,$updatepersonalprofiledprofileselect_sel); ?>
                <option value="0.0" >Other</option>
                </select> 
                <? if($International_selling=='Y'  || $enable_tax_module=='Y' )		
                 { ?> <span class="requiredStar">*</span></nice> <? } ?>
				  
                </div>
                </div>
                
                <? 
				if($bill_state!='')
				{
					$bill_dis='disabled="disabled"';
				}else{$bill_dis='';}?>
                <div id="state_indicator" style="display:none" ></div>
        
                <div class="form-group" id="exist_state">
              <label class="col-lg-12 control-label"><?=$default_displayprofile_state?>:</label>
           
                         <div class="col-lg-12">
                           <nice>
                    <select name="cmbstateid" id="cmbstateid" class="form-control form_state" style="min-width:171px;" 
                    onchange="get_city(this.value)" <?=$bill_dis?>>
                        <? fillcombo("select id,title from tbldating_state_master where currentstatus IN (0) and country_id=".$countryid." and languageid=$sitelanguageid order by title",$bill_state,$updatepersonalprofiledprofileselect_sel); ?>
                        
                    <option value="0.0" >Other</option>
                    </select> 
                    <input type="text" name="state_other" id="state_other" class="form" size="13" 
                    value="<? $state_other ?>" maxlength="" style="display:none;" />
                   <? if($International_selling=='Y'  || $enable_tax_module=='Y' )		
					{ ?>  <span class="requiredStar">*</span><? }?>
                    </nice>
        
            </div>
                    </div>
                
               
              <div id="city_indicator" style="display:none"></div> 
              
               <div class="form-group" id="exist_city" >
              <label class="col-lg-12 control-label"> <?=$displayprofilecontactdetail_city?></label>
                     <div class="col-lg-12">  
                    <select name="cmbcityid" id="cmbcityid" class="form-control form_city" style="min-width:171px; <?=$cmb_st?>" 
                    onchange="get_values(this.value)">
                    <? if($bill_city!='' && $bill_city!=0.0){ ?>
                    <? fillcombo("select id,title from  tbldating_city_master where currentstatus In (0) AND 
                    state_id=".$bill_state." and languageid=$sitelanguageid order by title",$bill_city,
                    $updatepersonalprofiledprofileselect_sel); ?>
                    <? }else{ ?>
                    <? fillcombo("select id,title from  tbldating_city_master where currentstatus In (0) AND state_id=".$state." and languageid=$sitelanguageid order by title",$bill_city,$updatepersonalprofiledprofileselect_sel); ?>
                    <? } ?>
                    <option value="0.0" >Other</option>
                    </select> 
                    </div>
            </div>
            
              
                
               <div class="form-group">
                            <label class="col-lg-12 control-label"><?=$franchiseeregistration_zipcode?>: </label>
                            <div class="col-lg-12">
        <input name="bill_pin" id="bill_pin" value="<?=$bill_pin?>" size="35" class="form-control" maxlength="255" type="text">
                            </div>
                </div>
        
                <div class="form-group">
                            <label class="col-lg-12 control-label"><?=$contactusphone?></label>
                            <div class="col-lg-12">
        <input name="bill_phone" id="bill_phone" value="<?=$bill_phone?>" size="35" class="form-control" maxlength="255" type="text">
                            </div>
                </div>
                
            
                <input type="hidden" value="<?=$action?>" id="paymentid" name="paymentid">			
                <div class="form-group">
        
        <div class="col-lg-12">
        <div class="formbtn_outer">
        <input name="Submit" type="submit"  class='formbtn formbtn_p' value="<?= $paymentaddhead5 ?>"> 
        </div>
        </div>
        </div>
        
                  </form>
            </div>      
            
            
               
               
               
                  
               
               <div id="show_billing_info" style="display:none"></div>
               
               
               <div id="show_paymentgateway" style="display:none">    
				<form class="paymentDForm payment_secd_BG"  ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php?b=<?= $action ?>" onsubmit="return validat_payment();">
<h3 class="billig_head"><?=$payment_title_txt2?></h3>
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<? 
	$defaultpymnttype = "";
	$defaultpymnttype = getonefielddata("SELECT paymenttypeid from tbldatingpaymenttypemaster WHERE default_type=1 AND currentstatus=0");
?>
<fieldset>


<div class="form-group">
<label class="col-lg-12 control-label"><?= $paymentaddhead3 ?></label>
<div class="col-lg-6">
<select name="cmbpaymentmode" onchange="find_details(this.value)" class="form-control">
<? fillcombo("select paymenttypeid,paymenttype from tbldatingpaymenttypemaster where currentstatus=0 and languageid=$sitelanguageid  order by paymenttype ",$defaultpymnttype,""); ?>
</select>
</div>
</div>
<?php
$one = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=1");
$two = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=2");
$three = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=3");
$four = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=4");
$five = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=5");
$six = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=6");
$seven = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=7");
$eight = getonefielddata("SELECT description from tbldatingpaymenttypemaster WHERE paymenttypeid=8");
?>
<? 
	$st1 = '';
	$st2 = '';
	$st3 = '';
	$st4 = '';
	$st6 = '';
	$st7 = '';
	$st8 = '';
	
	if($one!=''){
		$st1 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($two!=''){
		$st2 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($three!=''){
		$st3 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($four!=''){
		$st4 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($six!=''){
		$st6 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($seven!=''){
		$st7 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	} if($eight!=''){

		$st8 = 'margin:10px; background-color:#fef2e6; border:solid #000000 1px;';
	}
?>

<p id="1" style="display:none; <?=$st1?>"><? if($one!='') { ?><?=$one?><? } ?></p>

<p id="2" style="display:none; <?=$st2?>"><? if($two!='') { ?><?=$two?><? } ?></p>

<p id="3" style="display:none; <?=$st3?>"><? if($three!='') { ?><?=$three?><? } ?></p>

<p id="4" style="display:none; <?=$st4?>"><? if($four!='') { ?><?=$four?><? } ?></p>
<div class="form-group">
	<div class="col-lg-6">
		<div class="bank_Details" id="5">
         <?php /*?><img src="<?= $siteimagepath ?>images/paypal_Img.png" class="bankImg img-responsive"><?php */?>
          <? if($five!='') { ?><?=$five?> <? } ?> </div>
    </div>
</div>

<p id="6" style="display:none; <?=$st6?>"><? if($six!='') { ?><?=$six?><? } ?></p>

<p id="7" style="display:none; <?=$st7?>"><? if($seven!='') { ?><?=$seven?> <? } ?> </p>

<p id="8" style="display:none; <?=$st8?>"><? if($eight!='') { ?><?=$eight?><? } ?></p>
	
				</div>
               
               
                  <div id="show_billing_tbl"  style="display:none"></div>

               <div id="show_paymentgateway1" style="display:none">  
                  	<? if(findsettingvalue('payment_policy')=='Y'){?>
				  <div class="payment-policy">
                  <input type="checkbox" name="policy" id="policy">
                  	<?=findsettingvalue('payment_policy_txt')?>
                  </div>
					<? } ?>
                  <div class="form-group Center_but">
    <div class="col-lg-12">
    <div class="formbtn_outer">
    <input name="Submit" type="submit"  class='formbtn' value="<?= $paymentaddhead5 ?>"> 
    </div>
    </div>
</div>
				
				</fieldset>
				</form>
				</div>	
                  
                  <div id="hide_billing_tbl" >
                  <?
				  $taxigst=0;
				  $taxcgst=0;
				  $taxcess2=0;
                  	$taxigst = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$action."' and igst_v!='' ");
					
					     	$taxcgst = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$action."' and cgst_v!='' ");
							
					if($taxigst>0)
					{
						$taxtype1='igst';
					}elseif($taxcgst>0)
					{
						$taxtype1='cgst';
					}else{$taxtype1='xyz';}
					
					if($International_selling=='Y')		
					{
							$taxcess2 = getonefielddata("SELECT count(paymentdetailid) from  tbldatingpaymentdetail WHERE paymentid='".$action."' and cess2_v!='' ");
							if($taxcess2>0)
							{
								$taxtype1='cess2';
							}else{$taxtype1='xyz';}
					}
						
				  ?>
                  
                <?=display_billing_info($action,$_SESSION[$session_name_initital . "memberuserid"],$taxtype1,'0','0')?>
                  </div>
               
                  
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right-section">
				<div class="point-text">  

					<ul>
                    	<li> <i class=""><img src="<?= $siteimagepath ?>images/infoP.png" class="img-responsive">
                        </i> 
                        <h3><?=$pck_note?></h3>
                        <p>
                        	<font color="#CC0000"><?=$dashboardipaddress?> <?= getip() ?></font>
                            </p>
                        </li>
					   <? $chkout_detail=get_homepage_images(19);?>
                       <? echo str_replace("[imgpath]",$siteimagepath,$chkout_detail[2]);?>
					</ul>
				</div>
			</div>        	
        
        
        
        
        </div>



    
    

    

		
		<!-- ********* CONTENT END HERE *********-->
		</div>