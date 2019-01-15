
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? //echo $_SERVER['HTTP_HOST'];

$curr_url=$_SERVER['PHP_SELF'];

if(findsettingvalue('redirect_ssl')=='Y')
{
	if($_SERVER['HTTPS']=='')
	{
		header("location:".findsettingvalue('redirect_right')."$curr_url");
	}
}

if($_SERVER['HTTP_HOST']==findsettingvalue('redirect_false'))
{
    header("location:".findsettingvalue('redirect_right')."$curr_url");
}

	?>
    
    <?
 $currentFile = $_SERVER["PHP_SELF"];
 $pagenm_arr = Explode('/', $currentFile);
 $pagenm=$pagenm_arr[count($pagenm_arr) - 1];
if($registration_sms_verification=='Y' && $pagenm!='verifysms.php' && $pagenm!='message.php' )
{
	$smsverified=getonefielddata("select smsverified from  tbldatingusermaster where userid='".$curruserid."' ");
	if($smsverified=='N')
	{
		$_SESSION[$session_name_initital . "error"] = "First, You have to verify with us";    
		header("location:verifysms.php");	
		exit;
	}
	
}
?>
    
   			
   			 <!----------------------popup start--------------------------------->
             <? if($curruserid==0){?>
<? $popid=get_popup_id($_SERVER['PHP_SELF']);?> 
<? if($popid>0){?>

		<div class="container_poup">
        <?  $pop_content=get_popup_property($popid,3);?>
		<? $pop_info=get_popup_info($popid);?>
        <? $trigger=get_popup_property($popid,2);?>
        <? if($trigger=='onload'){?>
         	<script>
			$(document).ready(function(){
				setTimeout(function(){ 
					   document.getElementById('popup_modal_id').click();
				}, 5000);
			});
			
            </script>

        <? }elseif($trigger=='timeout'){?>
        	<script>
			setTimeout(function(){ 
				   document.getElementById('popup_modal_id').click();
			}, 10000);
            </script>

        <? }elseif($trigger=='scrolldown'){?>
        	<script>
			var scroll_check = 0;
			window.onscroll = function() { myFunction() };

				function myFunction() 
				{
					if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500 && scroll_check==0)  
					{
						document.getElementById('popup_modal_id').click();
						scroll_check=1;
					} 
				}
			
			</script>
        <? }elseif($trigger=='onexit'){ ?>
        <script>
var hook = true;
      window.onbeforeunload = function() {
        if (hook) {
          return "Wait! Have you claimed Your FREE CD Yet?"
        }
      }
      function unhook() {
        hook=false;
      }

		</script>
        <? } ?>
    
        

 			 <span style="display:none"> 
  <button type="button" id="popup_modal_id" class="btn btn-info btn-lg" data-toggle="modal" data-target="#popup_modal">
  </button>
  </span>
  
  <div class="UpgradePopupAll modal fade" id="popup_modal" role="dialog">
    <div class="modal-dialog animated <?=get_popup_property($popid,1)?>">    
      <!-- Modal content-->
      <div class="modal-content">
      <? if($pop_info[6]==1){?>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <? } ?>
      <div class="modal-body" style="background:<?=$pop_info[4]?>;">
        <h2 class="popuph2" style="color:<?=$pop_info[5]?>;"><?=$pop_info[3]?></h2>            
            <h4 class="popuph4" style="color:<?=$pop_info[5]?>;"><?=$pop_info[2]?></h4>   
            <div class="Upgrade_imgblock">          
          <img src="<?=$siteuploadfilepath_new?><?=$pop_info[0]?>">
		</div>     
        <?=$pop_info[1]?>
      </div>      
    </div>

  </div>
  
 	
		</div>
<? } ?>
			 <!----------------------popup end--------------------------------->
			<? } ?>

 <!-----------------------------	Notify script strat ------------------------>
        
                    <script>
                
                    function show_demo_messanger()
                    { 
                        
                        if(document.getElementById("demo_messanger").className=='MessangerUser_bt'
                        && document.getElementById("notify_message_data").style.display!='none')
                        {
                            
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt mess_popup_animate'
                        && document.getElementById("notify_message_data").style.display!='none')
                        {
                            $("#demo_messanger").hide();
                            $("#demo_messanger").removeClass("mess_popup_animate");
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt')
                        {
                            $("#demo_messanger").show();
                            $("#demo_messanger").addClass("mess_popup_animate");
                        }
                        else if(document.getElementById("demo_messanger").className=='MessangerUser_bt mess_popup_animate')
                        {
                            $("#demo_messanger").removeClass("mess_popup_animate");
                        }
                        $("#notify_message_data").hide();
                        
                    }
                
                    
                    function auto_refresh()
                        {
                                    var pmbid=$("#last_PmbId").val();
                                    var touserid=$("#to_PmbId").val();
                                    
                                    $.ajax({
                                    type: "POST",
                                    url: "<?=$sitepath?>check_messanger_data.php",
                                    data:'touserid='+touserid+'&pmbid='+pmbid,
                                    success: function(data)
                                    {
                                        var find_data = data.split("LASTPMB_");
                                        var pmb_data=find_data[0].trim();
                                        var res_data = find_data[1].replace("LASTPMB_", "");
                                        $("#get_new_msg").append(res_data);
                                        $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                        $("#last_PmbId").val(pmb_data);
                                        
                                    }
                                    
                                    });
                        }
                    
                    
                         function closeNav() 
                         {
                             $("#notify_message_data").hide();
                         }
                         function close_chat()
                         {
                             $("#notify_message_data").hide();
                         }
                         
                        
                        function close_ecard()
                        {
                            $("#notify_ecard_panel").hide();	
                        }
                        
        function notify_send(type,touserid)
        {
                $.ajax({
                type: "POST",
                url: "<?=$sitepath?>notify_send.php",
                data:'touserid='+touserid+'&type='+type,
                success: function(data)
                {
                    
                    if(type==1 || type==5 || type==4)
                    {
                        var find_fail = data.search("fail_");
                        if(find_fail>0)
                        {
                            var fail_msg = data.split("fail_");
                            error_notify_add('notify_warning',fail_msg[1],'','');
                            error_notify_remove('notify_warning',5000);
                        }
                        var find_suc = data.search("sucess_");
                        if(find_suc>0)
                        {
                            var suc_msg = data.split("sucess_");
                            error_notify_add('notify_sucess',suc_msg[1],'','');
                            error_notify_remove('notify_sucess',5000);
                        }
                        
                    }
                    
                    if(type==2)
                    {
                        var find_fail = data.search("fail_");
                        if(find_fail>0)
                        {
                            var fail_msg = data.split("fail_");
                            error_notify_add('notify_warning',fail_msg[1],'','');
                            error_notify_remove('notify_warning',5000);
                        }
                        
                        var messanger_clsnm=document.getElementById("demo_messanger").className;
                        $("#demo_messanger").show();
                        $("#notify_message_data").show();
                        $("#notify_message_data").html(data);
                        $("#notify_chat_loader").show();
                        $("#notify_chat_loader").html('<i class="fa fa-circle-o faa-burst animated " style="font-size:50px"></i>');
                        
                        setTimeout(function(){ 
                        $("#notify_chat_loader").hide();
                        $("#get_new_msg").show();
                        $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                        }, 3000);
                    }
                    if(type==3)
                    {
                        $("#notify_ecard_panel").toggle();
                        $("#notify_ecard_panel").html(data);
                    }
                        if(type==13 || type==14)
                        {
                            var find_fail = data.search("fail_");
                            if(find_fail>0)
                            {
                                var fail_msg = data.split("fail_");
                                error_notify_add('notify_warning',fail_msg[1],'','');
                                error_notify_remove('notify_warning',5000);
                            }
                            var find_suc = data.search("sucess_");
                            if(find_suc>0)
                            {
                                var suc_msg = data.split("sucess_");
                                error_notify_add('notify_info',suc_msg[1],'','');
                                error_notify_remove('notify_info',5000);
                            }
                        }
                }
                });	
        }
        
        
        
        
                function send_message1(touserid,type,imageid)
                {
                    if(type==2)
                    {
                        var mess=$("#message_txt").val();
                    }
                    if(type==3)
                    {
                        $('#notify_ecard'+imageid).addClass('active');
                    }
                    if(mess=='' && type==2)
                    {
                        $("#message_txt_error").show();
                        $("#message_txt_error").html('please enter message');
                        setTimeout(function(){
                            $("#message_txt_error").hide(); 
                         }, 4000);
                        return false;
                    }else{ 
                            $.ajax({
                            type: "POST",
                            url: "<?=$sitepath?>notify_send_message.php",
                            data:'touserid='+touserid+'&mess='+mess+'&imageid='+imageid+'&type='+type,
                            success: function(data)
                            {	
                                if(type==2){
                                    $("#message_txt").val('');
                                }
                                
                                    var find_fail = data.search("membuy_");
                                    if(find_fail>0)
                                    {
                                        document.getElementById('notify_membersip_id').click();
                                        var fail_msg = data.split("membuy_");
                                        $("#notify_membersip_txt").show();
                                        $("#notify_membersip_txt").html(fail_msg[1]);	
                                        if(type==3)
                                        {
                                            $('#notify_ecard'+imageid).removeClass('active');
                                        }
                                    }
                                    else
                                    {
                                        if(type==3)
                                        {
                                            
                                            $("#get_new_msg").append('<li class="right-chatA notify_li" id="notify_loader_id'+imageid+'"><div class="notify_loader"></div></li>');
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                            
                                            setTimeout(function() {
                                            $('#notify_ecard'+imageid).removeClass('active');
                                            $("#notify_loader_id"+imageid).remove();
                                            $("#get_new_msg").append(data);
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                            }, 3000);
                                            
                                            
                                        }
                                        else if(type==2)
                                        {
                                            $("#get_new_msg").append(data);
                                            $('#get_new_msg').scrollTop($('#get_new_msg')[0].scrollHeight);
                                        }
                                    }
                            }
                            });
                        }
                    return false;
                }
        
        </script>
            <!----------------------------	Notify script end -------------------------->


	<!--------------------------------- new error msg start --------------------------------->    


<script>
function error_notify_add(divid,msg,focusid,focuscolor)
{
	if(focusid!='')
	{
		$('#'+focusid).addClass(focuscolor);
	}
	if(focuscolor!='')
	{
		document.getElementById(focusid).focus();
	}
	
	
	$('#'+divid).addClass('alertPozition');
	$('#'+divid+'_txt').html(msg);
	
	setTimeout(function() {
    			$('#'+focusid).removeClass(focuscolor);
		}, 5000);
		
}

function error_notify_remove(divid,seconds)
{
		setTimeout(function() {
    	$("#"+divid).removeClass('alertPozition');
		}, seconds);	
	
}

</script>

<div class="alert alert-success"  id="notify_sucess" > 
<i class="fa fa-check" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
<span id="notify_sucess_txt"> </span></strong>
<a  class="close" onclick="error_notify_remove('notify_sucess',100);" title="close">x</a>
</div>



<div class="alert alert-danger"  id="notify_danger">
 <i class="fa fa-close" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
 <span id="notify_danger_txt"> </span></strong>
  <a class="close" onclick="error_notify_remove('notify_danger',100);" title="close">x</a> 
 </div>


<div class="alert alert-info"  id="notify_info" >
  <i class="fa fa-life-ring" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_info_txt"> </span></strong>
   <a class="close" onclick="error_notify_remove('notify_info',100);" title="close">x</a> 
</div>

<div class="alert alert-warning"  id="notify_warning" >
  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;&nbsp;<strong>
   <span id="notify_warning_txt"> </span></strong>
  <a class="close" onclick="error_notify_remove('notify_warning',100);" title="close">x</a> 
</div>


	<!--------------------------------- new error msg end --------------------------------->     


            <? if($enable_Recaptcha=='Y'){?>
<script src='https://www.google.com/recaptcha/api.js'></script> 
<? } ?>

	<script type="text/javascript">
function timeout(divid,seconds){
	setTimeout(function() {
    	$("#"+divid).hide('slow');
	}, seconds);	
}
</script>

 <? if($curruserid==0){?>
	<script>
$(document).mouseup(function(e) 
{
    var container = $("#registermenu");
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});

$(document).mouseup(function(e) 
{
    var container = $("#loginmenu");
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});

</script>
	<? } ?>

<script type="text/javascript">
function register_data(val)
{

if(document.getElementById("loginmenu").style.display!='none')
{
	$("#loginmenu").hide();
}
	
	if(val=="")
	{
		$("#registermenu").toggle();
	}
	else
	{
		$("#registermenu").hide();
	}
}
function close_form(){
	$("#registermenu").hide();
}


function login_data(val)
{
	if(document.getElementById("registermenu").style.display!='none')
	{
		$("#registermenu").hide();
	}
	
	if(val=="")
	{
		
		$("#loginmenu").toggle();
		
	}
	else
	{
		$("#loginmenu").hide();
		
	}
}
function close_form1(){
	$("#loginmenu").hide();
}
</script>

<? if($enable_language=='Y'){ ?>
<script>
function set_language(val)
{
	if(val!=0.0)
	{
			$.ajax({
			type: "POST",
			url: "set_language.php",
			data:'lang='+val,
			success: function(data){
				location.reload();
				//$("#city").html(data);
			}
			});	
	}
}
</script>
<? } ?>



<div class="SocialPanal">
	<div class="container">
    	<div class="SocialFollow">
            <ul>
                <li><a href="<?=findsettingvalue("fblink")?>"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                <li><a href="<?=findsettingvalue("twitter_link")?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="<?=findsettingvalue("gplus_link")?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="<?=findsettingvalue("linkedin_link")?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>  
        </div>	
    </div>
</div>
<div class="top_wrpper">

<div class="container">


                    	
<div class="row top_space">
<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">

<!--matrimonial_logo Start  -->

<div class="matrimonial_logo">

<a href="<?= $sitepath ?>index.php"><img src="<?= $sitepath ?>uploadfiles/site_<?=$sitethemefolder?>/<?= findsettingvalue("Logo_filenm") ?>" alt="" border="0" /></a>
<div class="matrimonial_logo_slogan"><?=findsettingvalue("logo_slogan");?></div>
</div>

<!--matrimonial_logo End  -->
</div>
<div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
	

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 login_topbg pull-right">
            <div class="top-login">
            
			<?
			$user ='';

if(isset($_SESSION[$session_name_initital . "memberuserid"])!='') 
{
	$user = $_SESSION[$session_name_initital . "memberuserid"];

}

			if($user!='')
{
			?>
            <a href="<?= $sitepath ?>signout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
               <a  href="<?= $sitepath ?>dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
            <?
}else
{
	?>
    <a  onclick="login_data(this.id)"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
    	<?
		$arr = explode("/",$_SERVER['REQUEST_URI']);
$path =  $sitepath.end($arr);
$path1 = $sitepath."login.php?fnm=dashboard.php&b=0";		
		
		if($path=="$path1")
		{
				$login = '';
		}
		else
		{
			$login = 'style="display:none;"';
		}
		
		?>
    <div class="infomenu plugin_loginft" <?=$login?> id="loginmenu">
             <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/delete.gif" alt="" onclick="close_form1();" class="right_cross" />
               	<? include("login_popup.php");?>
               </div>
               <?
if(file_exists("source/".$sitethemefolder.".home_plugin.php"))	
{
}
else
{
			   ?>
    <a  onclick="register_data(this.id)"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Sign Up</a>
    <?
}
?>
    
    	<?
		$path2 = $sitepath."index.php?b=1";
		//echo $_SESSION[$session_name_initital . 'error1']; exit;
		if($path=="$path2")
		{
				$reg = '';
		}
		else
		{
			$reg = 'style="display:none;"';
		}
		?>
             <div class="infomenu" <?=$reg?>  id="registermenu">
             <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/delete.gif" alt="" onclick="close_form();" class="right_cross" />
               	<? 
				if(file_exists("source/".$sitethemefolder.".home_plugin.php"))	
				{
					
				}
				else
				{
				include("homeregister.php");
				}
				?>
               </div> 
    <?
}?>
               
                
            </div>
             
       
</div>

        <div class="MainNavigtion">
        
            <!--matrimonal_navigation Start  -->
            <div class="navbar-header">
                                 <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                                 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span>
                                 <span class="icon-bar"></span></button> 
                               
                            </div>
            
            
            <div class="navbar-collapse navbar-ex1-collapse collapse matrimonal_navigation" style="height:1px;">
            
            
            
                <ul class="nav nav-tabs">
                 <? include("navigation.php");?>
                 </ul>
            
            </div>
            <!--matrimonal_navigation End  -->
        </div>


<!--matrimonal_top_banner End  -->
</div>
</div>
</div>
</div>

            


<? require_once("community_finder_common.php") ?>

