<? ob_start();
include("commonfile.php");
checklogin($sitepath);

if(isset($_POST['touserid']) && $_POST['touserid']!='')
{
	$touserid=$_POST['touserid'];
}

if(isset($_POST['pmbid']) && $_POST['pmbid']!='')
{
	$pmbid=$_POST['pmbid'];
}

$last_PmbId=getonefielddata("select PmbId from tbldatingpmbmaster where CurrentStatus=0 and 
		(FromUserId='".$curruserid."' or ToUserId='".$curruserid."') and
		(FromUserId='".$touserid."' or ToUserId='".$touserid."') and
		 type in (2,3)  order by PmbId desc LIMIT 1  ");

$data2='';
	 $sql="select Subject,Message,FromUserId,ToUserId,create_date,create_time,m_read,imageid
		    from tbldatingpmbmaster where CurrentStatus=0
		   and (FromUserId='".$curruserid."' or ToUserId='".$curruserid."')
		   and(FromUserId='".$touserid."' or ToUserId='".$touserid."') and type in (2,3) and PmbId>".$pmbid."
		   and createby!='".$curruserid."' order by PmbId asc limit 15 ";
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
				{$seen_msg='<span class="notify_unseen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				elseif($seen_msgid=='Y'){$seen_msg='<span class="notify_seen">'.$show_time.'&nbsp;&nbsp;
				<i class="fa fa-check" aria-hidden="true"></i></span>';}
				
		    
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
          <? echo $last_PmbId."LASTPMB_".$data2; exit; ?>
		
