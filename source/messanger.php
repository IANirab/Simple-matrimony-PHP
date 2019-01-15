<? ob_start();
include("commonfile.php");
checklogin($sitepath);
?>


	<style type="text/css">
.chat-wrapper{
	float: left;
	width:360px;
	background-color: #f9f7f7;
	color: #dedede;
	padding:10px;
}
.chat-wrapper h2{
	font-size: 20px;
    float: left;
    width: 100%;
    color: #3e3d3d;
    margin: 15px 0 25px;
    font-weight: 600;
    text-align: left;
    padding: 0;
	    text-transform: initial;
}
.chat-wrapper h2 i{
	color: #03A9F4;
    line-height: 22px;
}	
.chat-row{
	float: left;
	width: 100%;
}
.chat-grid{
    float: left;
    width: 100%;
    padding: 7px;
    cursor: pointer;
	position: relative;
}
.chat-grid:hover{
	background-color: #ececec;
}
.chat-section-left{
	float: left;
	width:15%;
}
.chat-section-left img{
	float:left;
	width: 40px;
	height: 40px;
	border-radius: 50%;
}
.chat-section-left i{
    float: left;
    color: #3fb144;
    margin-top: 23px;
    margin-left: -11px;
    background-color: #fff;
    border-radius: 50%;
    padding: 2px;
    font-size: 14px;
}
.chat-section-left .offline{
	color: #F44336;
}
.chat-section-left .offline_g{
	color: #ccc7c7;
}

.chat-section-right{
	float: right;
	width: 83%;
}
.chat-section-right h4{
	color: #000;
    font-size: 15px;
    font-weight: 500;
    float: left;
    width: 80%;
    margin: 0;
}
.chat-section-right span.individual_count{
	 float: right;
    color: #fffefe;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    background-color:#3182c8;
    text-align: center;
    font-size: 11px;
    line-height: 20px;
	position: absolute;
    right: 10px;
    top: 50%;
    margin: -9px 0 0 0;
}
.chat-section-right span.notify_lastlogin{
       float: right;
    height: 18px;
    text-align: left;
    font-size: 11px;
    line-height: 20px;
    position: absolute;
    right: 30px;
    top: 50%;
    margin: -9px 0 0 0;
    padding: 0 5px;}
.chat-section-right p{
	float: left;
    width: 100%;
    color: #828282;
    font-size: 11px;
}

</style>

<div class="chat-wrapper">
	<h2><img class="msgIMg" src="<?= $siteimagepath ?>images/Messenger_icon.png" border="0"/> <?=$messangermessage?> 
    	<span class="EditCsec">       
               <a href="<?= $sitepath ?>favoritemanager.php"><img src="<?= $siteimagepath ?>images/medit_icon.png" border="0"/></a>
            <a onclick="show_demo_messanger();" href="javascript:void(0)"><img src="<?= $siteimagepath ?>images/mclose_icon.png" border="0"/></a>
        </span>
     </h2>
     <div class="chat-row">
		<?
     $sql_mess="select distinct(tbl_activity_log.UserId),tbldatingshortlistmaster.list_status
	from tbldatingshortlistmaster 
	join tbl_activity_log
	on  tbl_activity_log.userid=tbldatingshortlistmaster.UserId 
	where tbldatingshortlistmaster.CreateBy='".$curruserid."' and tbldatingshortlistmaster.currentstatus=0 
	and tbl_activity_log.currentstatus=0 and tbl_activity_log.type=1 order by tbl_activity_log.id desc,tbl_activity_log.type ";
    $result_mess = getdata($sql_mess);
	$result_mess_cnt=mysqli_num_rows($result_mess);
	if($result_mess_cnt>0)
	{
        while($rs_mess= mysqli_fetch_array($result_mess))
        {
			$ShortlistId = $rs_mess[0];
			$fav_status = $rs_mess[1];
		?>		
        <a href="javascript:void(0);" onclick="notify_send(2,'<?=$ShortlistId?>')">
            <div class="chat-grid">
                <div class="chat-section-left">
                    <?=display_name_roundc(findnameuser($ShortlistId))?>
                   <? if(find_lastlogin($ShortlistId)=='Online'){?>
                    <i class="fa fa-circle online" aria-hidden="true"></i>
                    <? }else{ ?>
                    <i class="fa fa-circle offline_g" aria-hidden="true"></i>
                   <? } ?> 
                </div>
                
                <div class="chat-section-right">
                    <h4><?=find_profile_code($ShortlistId)?></h4> 
                    <p>
                    <?
                    $mess_Message=getonefielddata("select Message from tbldatingpmbmaster where CurrentStatus=0 and 
			(FromUserId='".$curruserid."' or ToUserId='".$curruserid."') and
			(FromUserId='".$ShortlistId."' or ToUserId='".$ShortlistId."') and
		     type in (2)  order by PmbId desc LIMIT 1  ");
			 if($mess_Message!='')
			 {
				echo substr($mess_Message,0,25);	
			 }else{ echo $messenger_txt1;} 
			 
					?>
                    
                    
                    
                   <? 
				   
				   if(notify_mess_count($curruserid,$ShortlistId)>0){?>
                   <span class="individual_count"><?=notify_mess_count($curruserid,$ShortlistId)?></span>
                     <? } ?>
                   	 
                     <span class="notify_lastlogin">
                     <?
                    if($fav_status=='W')
					{ ?>
						<span class="FavourSec_btn">
                        <button class="btn" title="Add to Favourite" onclick="notify_send(5,<?=$ShortlistId?>)"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </span>
					<? }?>
                      
                       <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <? $mess_last_time=find_lastlogin($ShortlistId);	?>
                     <? if($mess_last_time!='Online'){?>  
					 <?  $mess_last_time=str_replace('Last login : ','',$mess_last_time); ?>
                     <?  $mess_last_time=str_replace(' day ago',' d',$mess_last_time); ?>
                     <?  $mess_last_time=str_replace(' days ago',' d',$mess_last_time); ?>
                     <?  $mess_last_time=str_replace(' m ago',' m',$mess_last_time); ?>
                       
                      <? echo $mess_last_time ;
					  }else
					  {
						  echo 'Now';
					  }
					  ?>
                      </span> 
                    
                    </p>	
                </div>
                
            </div>
        </a>    
        
     <? }?>
     </div>
 <? }else{?>
 		<h1><img align="absmiddle" src="<?= $siteimagepath ?>images/Messenger_iconG.png" border="0" alt="" /> 
        <?=$messenger_txt9?> </h1>
 <? } ?>
</div>

