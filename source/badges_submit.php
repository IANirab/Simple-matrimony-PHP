<? include_once("commonfile.php");
checklogin($sitepath);
$userid=$_SESSION[$session_name_initital."memberuserid"];
$type='';


		if(isset($_POST['badge_type']) && $_POST['badge_type']!='') 
		{
			 $type=$_POST['badge_type']; 
		}

		 $doctype_post='doc_type'.$type; 

		if(isset($_POST[$doctype_post]) && $_POST[$doctype_post]!=0.0) 
		{
			 $doc_type=$_POST[$doctype_post];
		}else{$doc_type='';}

		$refno_post='refno'.$type;
		if(isset($_POST[$refno_post]) && $_POST[$refno_post]!='') 
		{
			 $refno=$_POST[$refno_post];
		}else{$refno='';}

		$sql = "INSERT INTO `tbldating_userdoc`(`userid`, `docid`, `typeid`, `refno`,  `createby`, `createip`, `createdate`) VALUES ('".$userid."','".$type."','".$doc_type."','".$refno."','".$userid."','".$_SERVER["REMOTE_ADDR"]."',
		'".date("Y-m-d")."')";
		execute($sql); 
		$action = getonefielddata("select id from tbldating_userdoc order by id desc limit 1 ");

		$img_post='image'.$type;
		if(isset($_FILES[$img_post]["tmp_name"]) && $_FILES[$img_post]["tmp_name"] != "")
		{
			$checkcmsimage=Validiate_image_badge($img_post);  
			if($checkcmsimage=='Y')
			{
				$ext_arr=explode(".",$_FILES[$img_post]['name']);
				$ext=$ext_arr[1];
				$imgnm=$userid.time().$type.".".$ext; 
				copy($_FILES[$img_post]["tmp_name"],$securepath.$imgnm);
				$sSql = "update  tbldating_userdoc set image='".$imgnm."' where id=$action";
				execute($sSql);	
			}	
			else
			{
				echo $checkcmsimage; exit;
			}

		}

		
	
	$badge_info='<ul>';
	$result2 = getdata("SELECT typeid,id,currentstatus FROM  tbldating_userdoc WHERE currentstatus in (0,1,2)
		and userid='".$_SESSION[$session_name_initital."memberuserid"]."' and docid='".$type."' ");
		$ij=1;
		while ($rs2 = mysqli_fetch_array($result2))
		{

			$typeid=$rs2[0];			
			$user_docid=$rs2[1];			
			$currentstatus=$rs2[2];			
			
			
		
			
			$docname=getonefielddata("select title from tbldating_doct_detail
			where currentstatus=0 and id='".$typeid."' and type='".$type."' ");
			
			if($docname=='')
			{
				$docname=' Reference Letter '.$ij;
			}
			
			$badge_info .='<li id="badge_list'.$user_docid.'">';
			$badge_info .='<div class="identity_block">';
			$badge_info .='<span class="identity_Icon"><i class="fa fa-id-card" aria-hidden="true"></i></span>';
			$badge_info .='<h3>'.$docname.'</h3>';
			$badge_info .='<figure class="identity_Right">';
			
			if($currentstatus==0)
			{
			$badge_info .='<i title="Approve" class="fa fa-check" aria-hidden="true"></i> ';
			}elseif($currentstatus==1)
			{
				$badge_info .=' <i title="Pending" class="fa fa-hourglass" aria-hidden="true"></i> ';
			}
			elseif($currentstatus==2)
			{
				$badge_info .='<i title="Disapprove" class="fa fa-ban" aria-hidden="true"></i> ';

			}

			$badge_info .='</figure>';
			$fun='onclick="del_badge'.$type.'('.$user_docid.')"';
			$badge_info .="<span class='Remove_blk'><a ".$fun.">
			<i class='fa fa-times' aria-hidden='true'></i></a></spna>";	
			$badge_info .='</div>';	
			$badge_info .='</li>';	
			$ij++;
		}
								
	$badge_info .='</ul>';
	echo $badge_info; exit;
	
	
		?>
