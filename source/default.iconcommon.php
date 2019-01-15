
<div class="UpgradePopupAll modal fade" id="myModal" role="dialog">
    <div class="modal-dialog animated">    
      <!-- Modal content-->
      <div class="modal-content">
      <button type="button" class="close" id="close_contact_popup" data-dismiss="modal">&times;</button>           
          <div class="modal-body" id="show_contact_info" style="display:none">                 
          </div>      
      </div>
  </div>
</div>
    
	<!-----------------contact detail, buy membership start--------------------->
      <!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      	<div class="modal-body" id="show_contact_info" style="display:none">                     	
        </div>
      </div>
      </div>
  </div>-->
      	<!-----------------contact detail, buy membership end--------------------->
<div class="searchgridicons">



				<!---------- global decleration start--------------->
<?

global $searchgriddisplayprofilelink,$searchgridemaillink,$searchgridrequestsendwink,$searchgridaddtofavoritelink,$searchgridaddtochatlink,$chatrimgalt,$searchgridrequestphonelink,$searchgridrequestaddtomessanger,$searchgridimagerequest,$searchgridrequest_send_intrest_emails,$PhoneRequestDisplay_design_setting,$enable_astrological_module,$session_name_initital,$abspath,$default_searchgrid_design_viewhoroscope,$enable_chat,$sitethemefolder,$enable_parichay,$searchgridalbumlink,$displaysendexpressinterst,$notifyexpressintrest,$displaysendalbumrequest;
?>
			<!---------- global decleration end--------------->
<?		
if($curruserid!='')
{
$pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);

}
else
{
	$pkgprice =  0;
}
?>

			  	<!-------------- expres interst start------------------->

	<?
    $chk_exp=getonefielddata("select status from tbldatingpmbmaster where FromUserId='".$curruserid."' 
            and ToUserId='".$userid."' and type='1' and CurrentStatus=0 order by PmbId desc limit 1 ");
    ?>
    <? if($chk_exp=='Y'){ ?>
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');" title="<?=$notifyexpressintrest?>"><i class="fa fa-check" aria-hidden="true"></i> 
     <?=$notifyexpressintrest?></a>
    <? }  elseif($chk_exp=='D'){ ?>
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');" t
    <?=$notifyexpressintrest?>><i class="fa fa-times" aria-hidden="true"></i>
     <?=$notifyexpressintrest?></a>
    <? } elseif($chk_exp=='W'){ ?>
    <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');" title="<?=$notifyexpressintrest?>"><i class="fa fa-hourglass-half" aria-hidden="true"></i>
     <?=$notifyexpressintrest?></a>
    <? }else{ ?>
        <a href="javascript:void(0);" onclick="notify_send(1,'<?=$userid?>');" title="<?=$displaysendexpressinterst?>"><i class="fa fa-heart" aria-hidden="true"></i> <?=$displaysendexpressinterst?></a>
    <? } ?>
	

				<!-------------- expres interst end------------------->



					<!-------------- contact detail  start------------------->

<button type="button" class="btn" data-toggle="modal" data-target="#myModal"
  onclick="send_contactreq('<?= $userid ?>');" title="<?= $searchgridrequestphonelink ?>"> <i class="fa fa-file-text-o" aria-hidden="true"></i> <?= $searchgridrequestphonelink ?></button>

<script>
function send_contactreq(id)
{
			$.ajax({
			type: "GET",
			url: "<?=$sitepath?>phonerequest.php",
			data:'b='+id,
			success: function(data)
			{
				 	$("#show_contact_info").show(); 
					$("#show_contact_info").html(data); 
			}
			});

}
</script>

					<!-------------- contact detail  end------------------->



					<!-------------- IMG requrst start------------------->
                    
                  
                    <?
                    $chk_album_req=getonefielddata("select image_password_protect from tbldatingusermaster 
					 where userid='".$userid."' ");
					 
					 if($chk_album_req=='Y')
					 { 
					 	$chk_alb='';

					  $chk_alb = getonefielddata("select status from  tbldatingpmbmaster where 
	FromUserId='".$curruserid."' and ToUserId='".$userid."' and CurrentStatus=0 and type=4 order by PmbId desc limit 1 ");
					 ?>	
						
						<? if($chk_alb=='Y')
						{
					 	?>
						<a href='<?= $sitepath ?>albums/<?= $userid ?>' title="<?=$searchgridalbumlink?>"><i class="fa fa-envelope-o" aria-hidden="true"></i>  <?=$searchgridalbumlink?>  </a>
                        <? }else{?>
                        <a href="javascript:void(0);" onclick="notify_send(4,'<?= $userid ?>')" title="<?=$displaysendalbumrequest?>">
                       <i class="fa fa-lock" aria-hidden="true"></i>
                        <?=$displaysendalbumrequest?></a>	
                        <? } ?>
                	<? }else{ ?>
                   <a href='<?= $sitepath ?>albums/<?= $userid ?>' title="<?=$searchgridalbumlink?>"><i class="fa fa-picture-o" aria-hidden="true"></i>  <?=$searchgridalbumlink?>  </a>
                    <? } ?>
                    
                  
                    
					<!-------------- IMG requrst end------------------->

						
                        	<!-------------- message start------------------->
                            <? if($curruserid!=$userid){?>
			 <a href="javascript:void(0);" onclick="notify_send(2,'<?=$userid?>')" title="<?= $searchgridemaillink ?>">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> <?= $searchgridemaillink ?></a>
                <? } ?>
               <!-------------- message end------------------->
               
              <?php /*?>  <!-------------- wink start------------------->
                <? if($curruserid!=$userid){?>
               <a href="javascript:void(0);" onclick="notify_send(2,'<?=$userid?>')">
               <img align="absmiddle" src="<?= $siteimagepath ?>images/winkicon1.png" border="0" alt="" /> <?= $searchgridrequestsendwink ?>
               </a>
               <? } ?>
                 	 <!-------------- wink end-------------------><?php */?>
                 
				<!-------------- favourite start------------------->

            <?    $chk_ShortlistId = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
	UserId='".$userid."' and CreateBy='".$curruserid."' and CurrentStatus=0 and list_status='Y' limit 1 ");	 ?>
				<? if($chk_ShortlistId>0){ ?>
                <a class="already_Fav" href="javascript:void(0);" onclick="notify_send(5,'<?=$userid?>');" title="Favorite">
                <i class="fa fa-star" aria-hidden="true"></i>
                 Favorite 
                </a>
                <? }else{ ?>
                <a onclick="notify_send(5,'<?=$userid?>');" href="javascript:void(0);" title="<?= $searchgridaddtofavoritelink ?>">
               <i class="fa fa-star" aria-hidden="true"></i> <?= $searchgridaddtofavoritelink ?>
                </a>

         <? } ?>
				<!-------------- favourite end------------------->



</div>


<script language="JavaScript">
function popup_window(url)
{

  window.open(url,'newwin','toolbar=no,location=no,directories=no,status=no,menubar=no,width=500,height=500,scrollbars=yes');
}
</script>