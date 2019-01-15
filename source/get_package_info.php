<? include("commonfile.php"); ?>
<div class="AllpackagesBlock" >
    <ul class="plist">    	
        <!--package info mem|re start-->
        <li>
            <? $user_pck_info=user_package_info($curruserid,1)?>
            <span><?=$user_pck_info[0]?></span>
            <strong><em><?=$pck_detail_exp?></em> : <?=$user_pck_info[1]?></strong>
            <strong><em><?=$pck_detail_day_left?></em> : <?=$user_pck_info[2]?> </strong>
            <strong class="swIcon">
                <em><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/viewedBYcontact_icon.png"/></em>  <?=user_can_see_contact_detail($curruserid,"Y")?>&nbsp;&nbsp;&nbsp;
                <em>
                <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/Express_interst_count_icon.png" title="Express interest Remaing"/></em> <?=$user_pck_info[3]?> &nbsp;&nbsp;&nbsp;
                <em><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/das_ecard_icon.png"
                title='Ecard Remaing' /></em> 
                 <?=$user_pck_info[4]?> 
            </strong>
        </li>
        <!--package info mem|re end-->
            
    
        <!--package info trust start-->
        <? $user_pck_trust_info=user_package_info($curruserid,4)?>
        <? if($user_pck_trust_info[0]!=''){?>
        <li>
            <span><?=$user_pck_trust_info[0]?></span>
            <strong><em><?=$pck_detail_exp?></em> : <?=$user_pck_trust_info[1]?></strong>
            <strong><em><?=$pck_detail_day_left?></em> : <?=$user_pck_trust_info[2]?></strong>
        </li>
        <? } ?>
        <!--package info trust end-->
    
        <!--package info elite start-->
        <? $user_pck_elite_info=user_package_info($curruserid,8)?>
        <? if($user_pck_elite_info[0]!=''){?>
        <li>
            <span><?=$user_pck_elite_info[0]?></span>
            <strong><em><?=$pck_detail_exp?></em> : <?=$user_pck_elite_info[1]?></strong>
            <strong><em><?=$pck_detail_day_left?></em> : <?=$user_pck_elite_info[2]?></strong>
        </li>
       <? } ?> 
        <!--package info elite end-->
    
    </ul>

	<? $user_pck_enh_info=user_package_info($curruserid,3)?>
    
     <? if( isset($user_pck_enh_info[0][0]) && $user_pck_enh_info[0][0]!=''){?>
    <div class="textpk">
    <!--package info enh start-->
        
        <? $enh_pack_name=$user_pck_enh_info[0]?>
        <? $enh_pack_exp=$user_pck_enh_info[1]?>
        <? $enh_pack_left=$user_pck_enh_info[2]?>
        <?
        for($pack_i=0;$pack_i<count($enh_pack_name);$pack_i++)
        {
            echo '<div class="membership-enh-dash"><em>'.$enh_pack_name[$pack_i].''.$pck_detail_exp.' : </em>';
            echo '<strong>'.$enh_pack_exp[$pack_i].'</strong>';
            echo '<em>'.$pck_detail_day_left.' :</em> <strong>'.$enh_pack_left[$pack_i].'</strong></div>';
            
        }
        ?>
   <!--package info enh end-->             
    </div>
	<? } ?>

</div>