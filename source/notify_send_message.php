<? ob_start();
include("commonfile.php");
checklogin($sitepath);
$mess='';
$touserid=0;
$imageid='';
$type='';
if(isset($_POST['touserid']) && $_POST['touserid']!='')
{
	$touserid=$_POST['touserid'];
}

if(isset($_POST['mess']) && $_POST['mess']!='')
{
	$mess=$_POST['mess'];
}

if(isset($_POST['imageid']) && $_POST['imageid']!='')
{
	$imageid=$_POST['imageid'];
}

if(isset($_POST['type']) && $_POST['type']!='')
{
	$type=$_POST['type'];
}



// check user is paid start
if($type==2)
{
		$pkgprice = getonefielddata("SELECT tbldatingpackagemaster.price from tbldatingpackagemaster,tbldatingusermaster WHERE tbldatingusermaster.packageid=tbldatingpackagemaster.packageid AND datediff(tbldatingusermaster.expiredate,curdate())>0 AND userid=".$curruserid);	
		
		if($pkgprice>0) 
		{ 
		
		}
		else
		{
			$messageerrmess105=str_replace('[sitepath]',$sitepath,$messageerrmess105);
			echo 'membuy_'.$messageerrmess105; 
			exit;
		}
		
}
// check user is paid end


	
	if($type==3)
	{
		$ecard_count = getonefielddata("SELECT ecard_count from tbldatingusermaster WHERE 
	  userid=".$curruserid." and expiredate>=curdate() ");	
		
		if($ecard_count>0) 
		{
			
		$sql_ins="insert into  tbldatingpmbmaster(ToUserId,FromUserId,type,create_date,create_time,CreateIP,createby,imageid) 
	values('".$touserid."','".$curruserid."','".$type."','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."','".$curruserid."','".$imageid."')";
	execute($sql_ins);
	
	notify_email($curruserid,$touserid,30,3);
			if($ecard_count!='' && $ecard_count>0)
			{
				$ecard_count=$ecard_count-1;
				execute("UPDATE  tbldatingusermaster set ecard_count='".$ecard_count."' where userid='".$curruserid."' ");
			}
		}else
		{
			$messageerrmess106=str_replace('[sitepath]',$sitepath,$messageerrmess106);
			echo 'membuy_'.$messageerrmess106; 
			exit;
		}
	}else
	{	
		$mess=strip_tags($mess);
		$mess=str_replace("'","",$mess);
		$mess=str_replace("$","",$mess);
		$mess=str_replace("#","",$mess);
		$mess=preg_replace('/(\d{5,})/', '', $mess);
		if (filter_var($mess, FILTER_VALIDATE_EMAIL))
		{
			$mess='';
		}
			
		$sql_ins="insert into  tbldatingpmbmaster(ToUserId,FromUserId,type,Message,create_date,create_time,CreateIP,createby) 
		values('".$touserid."','".$curruserid."','".$type."','".$mess."','".date('Y-m-d')."','".date('h:i:s')."','".$_SERVER['REMOTE_ADDR']."','".$curruserid."')";
		execute($sql_ins);
			
	}
	
	
		
	if($type==2)
	{
		
	$data3='';
	 $sql="select Subject,Message,FromUserId,ToUserId,create_date,create_time,m_read
		    from tbldatingpmbmaster where CurrentStatus=0
		   and (FromUserId='".$curruserid."' or ToUserId='".$curruserid."')
		   and(FromUserId='".$touserid."' or ToUserId='".$touserid."') and type=2 order by PmbId desc limit 1 ";
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
		   	
				if($from_userid==$curruserid)
				{
					$li_cls='right-chatA';
				}else{$li_cls='';}
				
		   
			   if($create_date==date('Y-m-d'))
				{
					$show_time=display_notify_time($create_time);
				}else{$show_time= date("d M", strtotime($create_date));}
				
				if($seen_msgid=='N')
				{$seen_msg='<span class="notify_unseen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				elseif($seen_msgid=='Y'){$seen_msg='<span class="notify_seen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				
			  $data3 .='<li class="'.$li_cls.'">
						<p>
						  <span>'.$message.'</span>
						</p>
					   <div class="H-rtext">
							'.$seen_msg.'
						</div>
						</li>';
		}
		echo $data3; exit;			
	
	}
	if($type==3)
	{
				$data4='';
	 $sql="select Subject,Message,FromUserId,ToUserId,create_date,create_time,m_read,imageid
		    from tbldatingpmbmaster where CurrentStatus=0
		    and (FromUserId='".$curruserid."' or ToUserId='".$curruserid."')
		   and(FromUserId='".$touserid."' or ToUserId='".$touserid."') and type=3 order by PmbId desc limit 1 ";
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
				if($imageid!='')
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
				{$seen_msg='<span class="notify_unseen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				elseif($seen_msgid=='Y'){$seen_msg='<span class="notify_seen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				
			  $data4 .='<li class="'.$li_cls.'">
			  			<span class="card_b"><figure>
						<img src="'.$siteimagepath.'images/'.$imagenm.' ">
						</figure></span>
						<div class="H-rtext">
						<span class="notify_unseen">'.$show_time.'  &nbsp;&nbsp;
				      <i class="fa fa-check" aria-hidden="true"></i></span>
						</div>';
		}
		echo $data4; exit;	
	}

?>