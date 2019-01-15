<? ob_start();
include("commonfile.php");
//checklogin($sitepath);

	if(isset($_SESSION[$session_name_initital . "memberuserid"]) && 
	$_SESSION[$session_name_initital . "memberuserid"] != "")
	{
 	}else
 	{  echo "fail_".$notify_send_txt1; exit;
		//include("login_popup1.php");
		//exit(); 
 	}	


$touserid=0;
if(isset($_POST['touserid']) && $_POST['touserid']!='')
{
	$touserid=$_POST['touserid'];
}
	
$currgender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE
 userid='".$curruserid."' ");

$displaygender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid='".$touserid."' ");

if($currgender==$displaygender)
{
 	 echo "fail_".$messageerrmess78; exit;	
}

	
	



if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}


if($type!=2 && $type!=3 && $type!=11 && $type!=12 && $type!='d')
{
	if ($touserid == $curruserid)
	{
		echo "fail_".$notify_send_txt2; exit;
	}
}

if($type!='d')
{
	if ($touserid =='')
	{
		echo "fail_".$notify_send_txt3; exit;
	}
}




// express interst start
if($type==1)
{
	
	$exp_cnt = getonefielddata("SELECT express_count from tbldatingusermaster WHERE 
	  userid=".$curruserid." and expiredate>=curdate() ");	
		
		
		if($exp_cnt>0) 
		{
		
			$chk=getonefielddata("select count(PmbId) from tbldatingpmbmaster where FromUserId='".$curruserid."' 
			and ToUserId='".$touserid."' and type='".$type."' and CurrentStatus=0 ");
			
			if($chk==0)
			{
				$sql_ins="insert into  tbldatingpmbmaster(ToUserId,FromUserId,type,create_date,create_time,CreateIP,createby) 
				values('".$touserid."','".$curruserid."','".$type."','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."','".$curruserid."')";
				execute($sql_ins);
					
				if($exp_cnt!='' && $exp_cnt>0)
				{
					$exp_cnt=$exp_cnt-1;
					execute("UPDATE  tbldatingusermaster set express_count='".$exp_cnt."' where userid='".$curruserid."' ");
					
					
					
					
					
		$db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from users where id='$curruserid'";
        $result2 = $db2->query($sql2);
        
        // if($result2){
        while($data2 = $result2->fetch_object()){
           $ide = $data2->id;
            
        }
        if($ide == $curruserid){
        
        
        } else {		
					
					
					
					
					
		$db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tbldatingusermaster where userid='$curruserid'";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
           
           $nameperson = $data1->name;
          
           if($data1->imagenm == NULL){
               
               $imgperson = "https://cdn.wccftech.com/images/default_avatar.png";
               
           }else {
           
           $imgperson = "https://www.paroshi.com/uploadfiles/".$data1->imagenm;
            
           }
          
          
            
        }
        }
          
           
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $sql = "INSERT INTO users (id,identifier, name, picture)
VALUES ('$curruserid','$nameperson', '$nameperson', '$imgperson')";
        $result = $db->query($sql);
					
					
					
        }			
					
					
					
					
				}
			
				echo 'sucess_'.$notify_send_txt4;
				notify_email($curruserid,$touserid,30,1);
				exit;
			}else
			{
				echo 'fail_'.$notify_send_txt5; exit;
			}
			
		}
		else
		{
					echo 'fail_'.$notify_send_txt6; exit;
		}

}
// express interst end


// favourite add start 
if($type==5)
{
	
	$chk_ShortlistId_2 = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
	UserId='".$touserid."' and CreateBy='".$curruserid."' and CurrentStatus=0 and list_status!='Y' ");	
	if($chk_ShortlistId_2>0)
	{
		 $sql_upd=" UPDATE `tbldatingshortlistmaster` SET   list_status='Y' 
		where UserId='".$touserid."' and CreateBy='".$curruserid."' ";
		execute($sql_upd);
		
			echo 'sucess_'.$notify_send_txt7; 
			exit;
	}
	
	$chk_ShortlistId = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
	UserId='".$touserid."' and CreateBy='".$curruserid."' and CurrentStatus=0 ");	
	if($chk_ShortlistId==0)
	{
		$sql_ins="insert into  tbldatingshortlistmaster(UserId,CreateBy,sel_id,create_date,create_time,CreateIP,list_status) 
		values('".$touserid."','".$curruserid."','Pending for Request','".date('Y-m-d')."','".date('h:i:s')."',
		'".$_SERVER['REMOTE_ADDR']."','Y')";
		execute($sql_ins);
		
		// for non fav user add into messanger list
		$chk_ShortlistId_1 = getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
	UserId='".$curruserid."' and CreateBy='".$touserid."' and CurrentStatus=0 ");	
		if($chk_ShortlistId_1==0)
		{
			$sql_ins="insert into  tbldatingshortlistmaster(UserId,CreateBy,sel_id,create_date,create_time,CreateIP) 
		values('".$curruserid."','".$touserid."','Pending for Request','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."')";
		execute($sql_ins);
		}
		
			echo 'sucess_'.$notify_send_txt7; 
			notify_email($curruserid,$touserid,30,5);
			exit;
	}
	else
	{
		echo 'fail_'.$notify_send_txt8; exit;
	}
	
}
// favourite add end


// imag req start
if($type==4)
{
	$chk=getonefielddata("select count(PmbId) from tbldatingpmbmaster where FromUserId='".$curruserid."' 
		and ToUserId='".$touserid."' and type='".$type."' and CurrentStatus=0 ");
		
		if($chk==0)
		{
			$sql_ins="insert into tbldatingpmbmaster(ToUserId,FromUserId,type,create_date,create_time,CreateIP,createby) 
			values('".$touserid."','".$curruserid."','".$type."','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."','".$curruserid."')";
			execute($sql_ins);
			echo 'sucess_'.$notify_send_txt9; 
			notify_email($curruserid,$touserid,30,4);
			exit;
		}else
		{
			echo 'fail_'.$notify_send_txt10; exit;
		}
}

// imag req end


?>

	
		
<?
// message start
if($type==2)
{ ?>
	  <?
		$last_PmbId=getonefielddata("select PmbId from tbldatingpmbmaster where CurrentStatus=0 and 
		(FromUserId='".$curruserid."' or ToUserId='".$curruserid."') and
		(FromUserId='".$touserid."' or ToUserId='".$touserid."') and
		 type in (2,3)  order by PmbId desc LIMIT 1  ");
	  ?>
      <input type="hidden" id="last_PmbId" name="last_PmbId" value="<?=$last_PmbId?>">
      <input type="hidden" id="to_PmbId" name="to_PmbId" value="<?=$touserid?>">
      	<?
        $pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);	
		
		if($pkgprice>0) 
		{
			$chat_refresh_module=findsettingvalue('chat_refresh');
            $chat_refresh_time=findsettingvalue('chat_refresh_time');
            if($chat_refresh_module=='Y')
            {	
             ?>
				  <? if(find_lastlogin($touserid)=='Online')
                  { ?>
                    <script>
					
                        setInterval(function()
                        { 
                            auto_refresh();		
					    },<?=$chat_refresh_time?>);
                        </script>
                 <? } ?> 
                   
	      <? } 
	  } ?>
                    
	<? $data2='';
		$data2 .='
		<div class="ChatBlock">
    <div class="chat-bar">        
    	
        <div class="chat-text">                            
		
           <h2><a class="BackButCat" href="javascript:void(0)" onclick="close_chat();"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>'.display_name_round(findnameuser($touserid)).'<strong>'.find_profile_code($touserid).'</strong><br>
             <span>'.find_lastlogin($touserid).'</span>
			 <span class="Two-icon-block">';
			 
			 $chk_fav=getonefielddata("select count(ShortlistId) from tbldatingshortlistmaster where 
		UserId='".$touserid."' and CreateBy='".$curruserid."' and CurrentStatus=0");
				if($chk_fav==0)
				{
					$data2 .='<a href="javascript:void(0)" title="Favourite" onclick="notify_send(5,'.$touserid.')">
					<i class="fa fa-heart-o" aria-hidden="true"></i></a>';
				}
			 $data2 .='<a onclick="auto_refresh();" title="Refresh"><img src="'.$siteimagepath.'images/refresh_icon.png"></a> <a onclick="notify_send(13,'.$touserid.')" title="Block"><img src="'.$siteimagepath.'images/Block_icon.png"></a>
			 <a href="javascript:void(0)" title="Close" onclick="closeNav()"> <img src="'.$siteimagepath.'images/mclose_icon.png"></a></span>
			 <span id="error_notify_top" style="display:none"></span>
               </h2></div>';
			   ?>
              
          <? $data2 .='<div class="live-chat">'; ?>
          
          <?
		  $notify_frmqry=" from tbldatingpmbmaster where CurrentStatus=0 and 
			(FromUserId='".$curruserid."' or ToUserId='".$curruserid."') and
			(FromUserId='".$touserid."' or ToUserId='".$touserid."') and
		     type in (2,3)" ;
          $chk_old_mess=getonefielddata("select count(PmbId)  $notify_frmqry ");
		  ?>
          
			<? //if($chk_old_mess>0){?>          
            
          <?  $chk_cnt=getonefielddata("select count(PmbId) $notify_frmqry "); 
		   if($chk_cnt>40)
		   {
				$limit_n=$chk_cnt-40;
				$limit=' limit '.$limit_n.",".$chk_cnt;
		   }else{$limit='';  }
		   
		   ?>
           <? $data2 .='<div id="notify_chat_loader" class="notify_chat_loadero" style="display:none">
		   </div>';?>
            
           <? $data2 .='<ul id="get_new_msg" style="display:none">'; ?>
           <?   $sql="select Subject,Message,FromUserId,ToUserId,create_date,create_time,m_read,imageid
		   		$notify_frmqry order by PmbId asc ".$limit."  "; 
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
				
		    
            $data2 .='<li class="'.$li_cls.'">';
					if($imageid>0)
					{
						$data2 .='<span class="card_b"><figure>
						<img src="'.$siteimagepath.'images/'.$imagenm.' ">
						</figure></span>';
					}else
					{
						$data2 .='<p><span>'.$message.'</span></p>';
					}
					
				   
				$data2 .='<div class="H-rtext">'.$seen_msg.'</div>';
				$data2 .='</li>';
					
			
				
					
					
			} ?> 
          <? $data2 .='</ul>'; ?>
          <? // }else{?>
          
           <? //$data2 .='<div class="no-data-chat">
          	    // <span class="no_data_l1"> No older message found</span> <br><br>  You can start messaging , Now
          //</div>' ?>
          <? //} ?> 
          
           
          <? $data2 .="<form onsubmit='return send_message1(".$touserid.",2,0);'>         
             <div class='form-group'>
			 <div id='message_txt_error' class='message_txt_error' style='display:none'></div> 
              <input type='text' id='message_txt' autocomplete='off' class='form-control' placeholder='".$messenger_txt5."'>
			  <input type='submit' class='btn'>
			 
			  
			  </div>
			   <div class='notify_send_tab'>
				  <span>
					  <a href='javascript:void(0);' title='ecard' onclick='notify_send(3,".$touserid.")'>
					  	 <img src='".$siteimagepath."images/ecard_icon.png'>							 
					  </a>
				  </span>
			  </div>
			  <span style='display:none'>
			  <a id='notify_membersip_id' data-toggle='modal' data-target='#notify_membersip'></a>
			  </span>
           </form></div><div id='notify_ecard_panel' style='display:none'></div>"; ?>
        
       <? $data2 .='</div></div>'; ?>
<?
	echo $data2; 
	
	// for message read ,remove new message count
	$sql_upd="UPDATE `tbldatingpmbmaster` SET `m_read`='Y' 
	where `CurrentStatus`=0 and `ToUserId`='".$curruserid."' and `FromUserId`='".$touserid."' and type in (2,3) ";
	execute($sql_upd);
	
	
}
// message end

// ecard start
if($type==3)
{
	$data3='';
	$data3 .='<a href="javascript:void(0)" class="OVclosebtn" onclick="close_ecard()">&times;</a>
	<div class="ChatBlock EcardsBlock">
    	<div class="chat-bar">';
	?>

         
          <? $data3 .="<div class='live-chat'><form>         
             <div class='form-group'>
			 <div id='message_txt_error' class='message_txt_error' style='display:none'></div> 
			 <label>".$messenger_txt6."</label>
			 </div>
			 <div class='ListEcards'>"; ?> 
           
           <?   $sql_wink="select id,title,image,message
		    from  tbldatingwinkmaster where CurrentStatus=0
		   and winktype='NW'  order by id asc  ";
		   $result_wink = getdata($sql_wink); 
			while($rs_wink= mysqli_fetch_array($result_wink))
			{
			?>
		   
		   <?
		   $data3 .='              	
                <span class="card_s" id="notify_ecard'.$rs_wink[0].'" onclick="send_message1('.$touserid.',3,'.$rs_wink[0].');">
				<figure><img src="'.$siteimagepath.'images/'.$rs_wink[2].'"/></figure>
				</span>';			  
		   ?>
           
          <? } ?> 
         
          <? $data3 .="</div>
		  <span style='display:none'>
			  <a id='notify_membersip_id' data-toggle='modal' data-target='#notify_membersip'></a>
			  </span>
		  </form></div>"; ?>
        		   
	<?		   	   
	$data3 .='</div></div>';
	
	echo $data3; exit;
}
// ecard end


// image request accept on click start
if($type==11)
{
	
	 $chk_Id = getonefielddata("select PmbId from  tbldatingpmbmaster where 
	FromUserId='".$touserid."' and ToUserId='".$curruserid."' and CurrentStatus=0 and type=4 order by PmbId desc limit 1 ");	
	
	if($chk_Id>0)
	{
		 $sql_ins="UPDATE `tbldatingpmbmaster` SET status='Y',m_read='Y' where PmbId='".$chk_Id."' ";
		execute($sql_ins);
	}
}
// image request accept on click end


// express intesrt accept on click start
if($type==12)
{
	 $chk_Id = getonefielddata("select PmbId from  tbldatingpmbmaster where 
	FromUserId='".$touserid."' and ToUserId='".$curruserid."' and CurrentStatus=0 and type=1 order by PmbId desc limit 1 ");	
	
	if($chk_Id>0)
	{
		 $sql_ins="UPDATE `tbldatingpmbmaster` SET status='Y',m_read='Y' where PmbId='".$chk_Id."' ";
		$accept = execute($sql_ins);
		
		
		$db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from users where id='$curruserid'";
        $result2 = $db2->query($sql2);
        
        // if($result2){
        while($data2 = $result2->fetch_object()){
           $ide = $data2->id;
            
        }
        if($ide == $curruserid){
            
            $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $sql = "INSERT INTO friendships (id_user_1, id_user_2)
VALUES ('$curruserid', '$touserid')";
        $result = $db->query($sql);
            
        } else {
		
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $sql = "INSERT INTO friendships (id_user_1, id_user_2)
VALUES ('$curruserid', '$touserid')";
        $result = $db->query($sql);
        
        if($result){
         
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=0;
        $sql1 = "select * from tbldatingusermaster where userid='$curruserid'";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
           
           $nameperson = $data1->name;
           
           if($data1->imagenm == NULL){
               
               $imgperson = "https://cdn.wccftech.com/images/default_avatar.png";
               
           }else {
           
           $imgperson = "https://www.paroshi.com/uploadfiles/".$data1->imagenm;
            
           }  
        }
        }
          
           
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        
        $sql = "INSERT INTO users (id,identifier, name, picture)
VALUES ('$curruserid','$nameperson', '$nameperson', '$imgperson')";
        $result = $db->query($sql);
            
            
            
        }
        
        } 
        
		    
		
	}
}
// express intesrt accept on click end


// block user start
if($type==13)
{
	
	 $chk_Id = getonefielddata("select ShortlistId from  tbldatingshortlistmaster where 
	CreateBy='".$curruserid."' and UserId='".$touserid."' and CurrentStatus=0  order by ShortlistId desc limit 1 ");	
	
	if($chk_Id>0)
	{
		 $sql_ins="UPDATE tbldatingshortlistmaster SET CurrentStatus=1,m_read='Y' where ShortlistId='".$chk_Id."' ";
		 execute($sql_ins);
		 echo 'sucess_'.$notify_send_txt11; exit;
	}else
	{
		 echo 'fail_'.$notify_send_txt12; exit;
	}
}
// block user end


// Unblock user start
if($type==14)
{
	
	 $chk_Id = getonefielddata("select ShortlistId from  tbldatingshortlistmaster where 
	CreateBy='".$curruserid."' and UserId='".$touserid."' and CurrentStatus=1  order by ShortlistId desc limit 1 ");	
	
	if($chk_Id>0)
	{
		 $sql_ins="UPDATE tbldatingshortlistmaster SET CurrentStatus=0 where ShortlistId='".$chk_Id."' ";
		execute($sql_ins);
		echo 'sucess_'.$notify_send_txt11; exit;
	}else
	{
		 echo 'fail_'.$notify_send_txt12; exit;
	}
}
// Unblock user end





// delete manager row start
if($type=='d')
{
		if(isset($_POST['pmbid']) && $_POST['pmbid']!='')
		{
			$pmbid=$_POST['pmbid'];
		}
		
		
		$chk_Id = getonefielddata("select count(PmbId) from  tbldatingpmbmaster where 
	 (createby='".$curruserid."' or ToUserId='".$curruserid."') and CurrentStatus=0 and PmbId='".$pmbid."'  ");	
	
		if($chk_Id>0)
		{
			 $sql_ins="UPDATE `tbldatingpmbmaster` SET CurrentStatus='3' where PmbId='".$pmbid."' ";
			execute($sql_ins);
		
			
		}
}

// delete manager row start




	if($sms_module_enable=='Y' && $enable_express_int_sms=='Y' )
	{
		$chkstopsms = getonefielddata("SELECT stopsms from tbldatingusermaster WHERE userid=".$touserid);
		if($chkstopsms!='Y'){
			$tomobileno = getonefielddata("SELECT mobile from tbldatingusermaster WHERE userid=".$touserid);	
			$username = getonefielddata("SELECT name from tbldatingusermaster WHERE userid=".$touserid);
			$type_message='';
			if($type==1)
			{$type_message="express interest";}
			elseif($type==5)
			{$type_message="favorite";}
			
			$default_message="&";	
			$smsmessage = findsettingvalue("sms_send_text_message");
			$smsmessage = str_replace("[username]",$username,$smsmessage);
			$smsmessage = str_replace("[type]",$type_message,$smsmessage);
			$smsmessage = str_replace("[default]",$default_message,$smsmessage);
			//echo $smsmessage;exit;
			sms_to_send($tomobileno,$smsmessage,$curruserid,2);	
		}
	}
	
	
	

?>