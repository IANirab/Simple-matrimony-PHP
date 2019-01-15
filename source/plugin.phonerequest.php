

<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>
      Contact Details    
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
  </div>
</div>
<br />
<div class="ContMOre col-lg-12 col-md-12 col-sm-12 col-xs-12">Now You can see <?=user_can_see_contact_detail($curruserid,"Y");?> contacts more.</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
  <h4><strong>
    <?=$registername1_title?>
    : </strong>
    <?=$name?>
    	   <? if($curruserid!=$uid){?>
			 <a class="btn" href="javascript:void(0);" onclick="notify_send(2,'<?=$uid?>')" id='contact_detail_msg' title="<?= $searchgridemaillink ?>">
             	<i class="fa fa-envelope-o" aria-hidden="true"></i>
             </a>
            <? } ?>
  </h4>
  <p><strong>
    <?=$franchiseeregistration_email?>
    : </strong>
    <?=$email?>
  </p>
  <p><strong>
    <?=$updatecontactprofileaddress?>
    </strong>
    <?=$address?>&nbsp;<?=$district_name?>&nbsp;<?=$panchayat_name?>
  </p>
  <? if($horoscope!=''){?>
  <p><strong>
    <?=$updateprofile2horoscope?>
    </strong>
    <u><a download><?=$horoscope?></a></u>
  </p>
  <? } ?>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
  <p><strong>
    <?=$updatecontactprofilemobileno?>
    </strong>

    <? if($check_phone_private_or_not=='Y'){?>
    <?=$check_email_private_mess?>
    <? }else{ ?>
    <?=$mobile?>
    <? } ?>
  </p>
  <p><strong>
    <?=$updatecontactprofilephno?>
    </strong>
     <? if($check_phone_private_or_not=='Y'){?>
      <?=$check_email_private_mess?>
    <? }else{ ?>
  <?=$phone?>
    <? } ?>
  </p>
  <? if(findsettingvalue('display_nri_status')=='Y'){?>
  <p><strong>
    <?=$nri?> :
    </strong>
      <? if($nristatus!=''){ echo 'Yes'; }else{ echo 'No'; }?>
  </p>
   <? } ?>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
  <ul class="list-group">
    <li class="list-group-item"> 
     <span class="lable">
      <?=$profile_block_profile_code?>
      <?=display_profile_code($uid)?></span>
       </li>
    <li class="list-group-item"> <span class="lable">
      <?=$updatecontactprofilecallingtime?> :
      <?=$callingtime?>
      </span> </li>
    <li class="list-group-item"> <span class="lable">
      <?=$updateprofilecontact_remarks?>
      <?=$remarks?>
      </span> </li>
    <li class="list-group-item"> <span class="lable">
      <?=$updateinterestmothername?>
      <?=$mother_name?>
      </span> </li>
    <?php /*?><li class="list-group-item"> <span class="lable">
      <?=$cndistrict?>
      :
      <?=$district_name?>
      </span> </li><?php */?>
  </ul>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<ul class="list-group">
  <li class="list-group-item"> <span class="lable">
    <?=$updatecontactprofile_contact_person?>
    :
    <?=$contact_person_on_phone?>
    </span> </li>
  <li class="list-group-item"> <span class="lable">
    <?=$newrelation?>
    :
    <?=$relation?>
    </span> </li>
  <li class="list-group-item"> <span class="lable">
    <?=$updatecontactprofileemail?>
    <?=$altemail?>
    </span> </li>
  <li class="list-group-item"> <span class="lable">
    <?=$updateinterestfathername?>
    <?=$father_name?>
    </span> </li>
  <?php /*?><li class="list-group-item"> <span class="lable">
    <?=$cnpanchayat?>
    :
    <?=$panchayat_name?>
    </span> </li><?php */?>
   
    
    
</ul>
            

</div>
</div>
