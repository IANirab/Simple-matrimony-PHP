<? require_once("commonfile.php");
checklogin($sitepath);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? include('topjs.php');?>
<?=findsettingvalue("Webstats_code"); ?>

</head>

<body onload="setTimeout_notify_mng()">
<div id="notify_loading_overlay_id" class="notify_loading_overlay">
     <div class="loading_icone">
         <span>
            <i class="fa fa-spinner faa-spin animated"></i>
         </span>
         <p><?=$notify_loading?></p>
     </div>     
</div>



<div id="OVmain">
<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
			<!-- ********* TITLE START HERE *********-->
<div class="pagetitle">        
   <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-10 midle_title"><span><?=$messenger_txt7?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-1 hidden-md trac_top">&nbsp;</div>
    </div> 
 </div> 


		<!-- ********* TITLE END HERE *********-->
            
<?
if(isset($_GET['b']) && $_GET['b']!='')
{
	$touserid=$_GET['b'];
}

		
	  ?>
      
        <div class="all_message_page">      
	 
		<div class="ChatBlock">
		    <div class="chat-bar">        
    			<div class="live-chat">
                <ul id="get_new_msg">
        	<?
		  $notify_frmqry=" from tbldatingpmbmaster where CurrentStatus=0 and 
			(FromUserId='".$curruserid."' or ToUserId='".$curruserid."') and
			(FromUserId='".$touserid."' or ToUserId='".$touserid."') and
		     type in (2,3)" ;
         
		  ?>
          
            
          
           <?   $sql="select Subject,Message,FromUserId,ToUserId,create_date,create_time,m_read,imageid
		   		$notify_frmqry order by PmbId asc  "; 
		   $result = getdata($sql); 
			while($rs= mysqli_fetch_array($result))
			{ 
				$subject=$rs[0];
				$message=$rs[1];
				$from_userid=$rs[2];
				$to_userid=$rs[3];
				$create_date=$rs[4];
				$create_time=$rs[5];
				$seen_msgid=$rs[6];
				$imageid=$rs[7];
				
				$imagenm='';
				if($imageid>0)
				{$imagenm=getonefielddata('select image from tbldatingwinkmaster where id='.$imageid.'
				and currentstatus=0 and winktype="NW" ');
				}
				
				if($from_userid==$curruserid)
				{
					$li_cls='right-chatA';
				}else{$li_cls='';}
				
				if($create_date==date('Y-m-d'))
				{
					$show_time=display_notify_time($create_time);
				}else{$show_time= date("d M", strtotime($create_date));}
				
				if($seen_msgid=='N')
				{
					if($li_cls=='right-chatA')
					{$seen_msg='<span class="notify_unseen">'.$show_time.'
					&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>';
					}else
					{
						$seen_msg='<span class="notify_unseen">'.$show_time.'</span>';
					}
					
				}
				elseif($seen_msgid=='Y')
				{	
					if($li_cls=='right-chatA')
					{
						$seen_msg='<span class="notify_seen">'.$show_time.'&nbsp;&nbsp;
						<i class="fa fa-check" aria-hidden="true"></i></span>';
					}else
					{
						$seen_msg='<span class="notify_seen">'.$show_time.'</span>';
					}
				}
				
		    ?>
            		<li class="<?=$li_cls?>">
					<? if($imageid>0)
					{ ?>
						<span class="card_b"><figure>
						<img src="<?=$siteimagepath.'images/'.$imagenm?>">
						</figure></span>
					<? }else{ ?>
                    
					<p><span><?=$message?></span></p>
					<?	} ?>
					
				   
				<div class="H-rtext"><?=$seen_msg?></div>
				</li>
			<? } ?> 
         	 </ul>
          </div>
         </div>
      </div>
      </div>
		 
    	
    </div>
   
</div>

<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>
<script>
	function setTimeout_notify_mng()
	{
		setTimeout(function(){
			$('#notify_loading_overlay_id').fadeOut();	 
		}, 1500);
	}
</script>
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</div>
</body>
</html>


