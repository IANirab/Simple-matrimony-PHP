<?
if(isset($_GET['t']) && $_GET['t']!='')
{
	$tabid=$_GET['t'];
}else{$tabid=2;}


?>


<!--Notification inbox-->
<? $notify_cnt1=notify_count(1,$curruserid)?>
 <? $notify_cnt2=getonefielddata("select count(PmbId) from tbldatingpmbmaster
	where currentstatus=0 and type in (2,3) and ToUserId='".$curruserid."' and m_read='N' ");
?>
<? $notify_cnt3=notify_count(3,$curruserid)?>
<? $notify_cnt4=notify_count(4,$curruserid)?>


<div class="ManagerBox">
  <ul class="nav nav-tabs">
    
    <li <? if($tabid==2){?>class="active" <? }?>><a data-toggle="tab" href="#notify_tab2"> 
	<?=$notifyexpressintrest?> &nbsp;<i class="<?=notify_icon(1)?>" aria-hidden='true'></i> 
    <? if($notify_cnt1>0){?><span class="count"><?=$notify_cnt1?></span><? } ?>
    </a></li>
    
    <li <? if($tabid==3){?>class="active" <? }?>><a data-toggle="tab" href="#notify_tab3">
    <?=$notifymessage?> &nbsp;
    <i class="<?=notify_icon(2)?>" aria-hidden='true'></i>
    <? if($notify_cnt2>0){?><span class="count"><?=$notify_cnt2?></span><? } ?>
    </a></li>
    

    
    <li <? if($tabid==5){?>class="active" <? }?>><a data-toggle="tab" href="#notify_tab5"> <?=$notifyImagerequest?> &nbsp;
    <i class="<?=notify_icon(4)?>" aria-hidden='true'></i>
    <? if($notify_cnt4>0){?><span class="count"><?=$notify_cnt4?></span><? } ?>
    </a></li>
  </ul>
  
  
  
  
  
  
 
  
  
  
  
  
  
  
  
  
  <script>
	function notify_submit(type,id,tabv)
	{
		if(id!=0)
		{
			$.ajax({
			type: "POST",
			url: "notify_sort.php",
			data:'type='+type+'&id='+id+'&tabv='+tabv,
			success: function(data)
			{
				window.location='notify.php?t='+tabv;
			}
			});
		}
	}

	</script>
  
  <div class="tab-content"> 
    <!-------------------notify tab1 start ------------------------------>
    
    <div id="notify_tab1" class="tab-pane fade <? if($tabid==1){?>in active <? }?>">
      <div class="table-responsive"> </div>
    </div>
    <!-------------------notify tab1 end ------------------------------> 
    
    <!-------------------notify tab2 start ------------------------------>
	<div id="notify_tab2" class="tab-pane fade <? if($tabid==2){?>in active <? }?>">
      <div class="table-responsive">
      <?
      	
		if(isset($_SESSION[$session_name_initital . "notify_sort2"]) && $_SESSION[$session_name_initital . "notify_sort2"]!='')
		{
			$orderbyid=$_SESSION[$session_name_initital . "notify_sort2"];
		}
		elseif($notify_cnt1>0)
		{
			$orderbyid=5;
		}
		else{$orderbyid=3;}
		
		if($orderbyid==1){$orderby='order by PmbId desc';}
		elseif($orderbyid==2){$orderby='order by PmbId asc';}
		else{$orderby='order by PmbId desc';}
		     
			 if($orderbyid==3){$notify_search=" and FromUserId='".$curruserid."' ";}	
			 elseif($orderbyid==4){$notify_search=" and ToUserId='".$curruserid."' ";}	
			 elseif($orderbyid==5)
	{$notify_search=" and  ToUserId='".$curruserid."' and m_read='N' ";}	
			else{$notify_search=" and (FromUserId='".$curruserid."' or ToUserId='".$curruserid."' )";}
				
				$FileNm = $sitepath."notify.php?t=2";
				$fromqry=" from tbldatingpmbmaster where CurrentStatus='0' and type='1' ".$notify_search." ";
				$totalnorecord = getonefielddata( "select count(PmbId) $fromqry ");
				
		if(isset($_SESSION[$session_name_initital . "notify_item2"]) && $_SESSION[$session_name_initital . "notify_item2"]!='')
		{
			$item_per_page=$_SESSION[$session_name_initital . "notify_item2"];
		}else{$item_per_page=10;}
		
		
	  ?>
      <form method="post" action="notify_sort.php">
      		<div class="msortby text-right">
    <div class="col-sm-2 d-inline-block">
      <div class="form-group">
        <select class="form-control" name="notify_sort" id="notify_sort" onchange="notify_submit('s',this.value,2)">
          <option value="0">Sort by</option>
          <option value="3" <? if($orderbyid==3){?> selected <? }?>><?=$search_txt6?></option>
          <option value="4" <? if($orderbyid==4){?> selected <? }?>><?=$search_txt7?></option>
           <option value="5" <? if($orderbyid==5){?> selected <? }?>><?=$search_txt8?></option>
        </select>
      </div>
    </div>
    <div class="col-sm-2 d-inline-block">
      <div class="form-group">
      
        <select class="form-control" name="notify_item" id="notify_item" onchange="notify_submit('p',this.value,2)">
         <option value="0">Total Records</option>
          <option value="10" <? if($item_per_page==10){ ?> selected<? } ?>>10</option>
          <option value="20"  <? if($item_per_page==20){ ?> selected<? } ?>>20</option>
          <option value="50"  <? if($item_per_page==50){ ?> selected<? } ?>>50</option>
        </select>
      </div>
    </div>
  </div>
		  
      </form>
        <?
				if(isset($_GET["page"])){ //Get page number from $_GET["page"]
					$page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
					if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
				
		
				
				$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
				$total_pages=ceil($totalnorecord/$item_per_page);
				
				if($page_number==1)
		 		{ 
					$primary_id=1; 
				}
		 		else
		 		{ 
					$pg_min=$page_number*$item_per_page;   
		 			$a=$pg_min-$item_per_page;
		 			$primary_id=$a+1; 
		 		}

                
				?>
        <table border="0" width="100%" align="center" class="table table-hover" cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th width="10%"><?=$notify_mng_head1?></th>
              <?php /*?><th width="18%">From</th>
              <th width="18%">To</th><?php */?>
              <th width="20%"><?=$notify_mng_head2?></th>
              <th width="35%"><?=$notify_mng_head3?></th>
              <th width="15%"><?=$notify_mng_head4?></th>
              <th width="15%"><?=$notify_mng_head5?></th>
            </tr>
          </thead>
          <tbody>
            <?
				 $sql="select ToUserId,Subject,Message,type,status,m_read,CreateDate,create_date,create_time,FromUserId,PmbId
				 ".$fromqry." ".$orderby." LIMIT ".$page_position.", ".$item_per_page."  ";
                $result = getdata($sql); 
				while($rs= mysqli_fetch_array($result))
				{ 
					$ToUserId=$rs[0];
					$Subject=$rs[1];
					$Message=$rs[2];
					$type=$rs[3];
					$status=$rs[4];
					$m_read=$rs[5];
					$CreateDate=$rs[6];
					$create_date=$rs[7];
					$create_time=$rs[8];
					$FromUserId=$rs[9];
					$PmbId=$rs[10];
					
					$from_uname=getonefielddata("select name from tbldatingusermaster where userid='".$FromUserId."' ");
					$to_uname=getonefielddata("select name from tbldatingusermaster where userid='".$ToUserId."' ");
					
				?>
            <tr id="notifyrow<?=$PmbId?>">
              <td><? echo $primary_id;?> 
                      <span class="mail_inout"> 
                      <? if($FromUserId==$curruserid){ ?>
                    <i class="fa fa-reply" aria-hidden="true"></i> 
                      <? } ?>
                      <? if($FromUserId!=$curruserid){ ?>
                          <i class="fa fa-share" aria-hidden="true"></i>
                      <? } ?>  
                     </span>
                </td>
              <?php /*?><td class="profile-name"><?=display_name_roundc($from_uname)?>
                <nice><?=find_profile_code($FromUserId)?> </nice></td>
              <td class="profile-name"><?=display_name_roundc($to_uname)?>
                <nice> <?=find_profile_code($ToUserId)?></nice></td><?php */?>
              <td><? if($FromUserId==$curruserid)
			  { ?>
	                <? if(findsettingvalue('display_user_name')=='Y'){?>
                    <?=$to_uname?><br>
                    <? }else{ ?>
					<?=display_name_roundc($to_uname)?>
                    <? } ?>
              		<nice>
                    <?=find_profile_code($ToUserId)?>
                    </nice>	
			 <? }else
			 { ?>
			  		<? if(findsettingvalue('display_user_name')=='Y'){?>
                    <?=$from_uname?><br>
                    <? }else{ ?>
					<?=display_name_roundc($from_uname)?>
                    <? } ?>
					
					<nice><?=find_profile_code($FromUserId)?></nice>
             <? } ?>
             <? if($FromUserId==$curruserid)
			  { ?>
             <a href="displayprofile.php?b=<?=$ToUserId?>">
             <img src="<?= $siteimagepath ?>images/external-link-square-alt-icon.png">
             </a>
             <? }else{ ?>
             <a href="displayprofile.php?b=<?=$FromUserId?>">
             <img src="<?= $siteimagepath ?>images/external-link-square-alt-icon.png">
             </a>
             <? } ?>
              </td> 
              
              
    
              
              
              
              
              <td><?=notify_msg($type)?>
               <? if($FromUserId==$curruserid)
			   	 { 
               		echo 'sent';
					if($status=='W')
					{
					 	echo '<br> <span class="badge"> Waiting for accept express interest </span>';
					}
					else if($status=='Y')
					{
					 	echo '<br> <span class="badge">accepted express interest </span> ';
					}
			     } 
			   	 else{echo 'recived';} ?>
              <? if($m_read=='N' && $FromUserId!=$curruserid){?>                
                <span class="notify_unread"><i class="fa fa-heart faa-pulse animated"></i></span>
                <? } ?>
              <br />
               <? if($FromUserId!=$curruserid){ ?>
              <div class="switch_outer">
               <? if($status=='Y'){?> 
                You have conform by accepting  express interest 
                <? }else{ ?>
                Reply by accepting express interest
                <? } ?>&nbsp;&nbsp;
                
                
                <label class="switch">
                    
                    <input type="checkbox" value="Y" <? if($status=='Y'){?> checked="checked" disabled="disabled" <? } ?>
                     onclick="notify_send(12,'<?=$FromUserId?>')" >
                    <span class="slider round"></span>
                    
                </label>
                </div>
                <? } ?>
              </td>
              <td><? //display_notify_time($create_time)?>
                <?=display_notify_date($create_date)?></td>
              <td>
               <a href="javascript:void(0)" onclick="notify_del('<?=$PmbId?>')"
                class="btn btn-danger btn-xs"> <b class="fa fa-trash" aria-hidden="true"></b></a>
              
              
                
                </td>
            </tr>
            <? $primary_id++; ?>
            <? } ?>
          </tbody>
        </table>
      </div>
      <div class="paginationOuter">
    <?=notify_paginate($item_per_page,$page_number,$totalnorecord,$total_pages,$FileNm)?>
  </div>
    </div>
    <!-------------------notify tab2 end ------------------------------> 
    
    
    <!-------------------notify tab3 start ------------------------------>
	<div id="notify_tab3" class="tab-pane fade <? if($tabid==3){?>in active <? }?>">



          <table class="table table-bordered">
            <thead>
              <tr>
                <th></th>
                <th> Name </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                
         
    <?
      if(isset($_POST['friendshipID'])){
          $idff = $_POST['friendshipID'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $id=$_GET['b'];
        $sql = "delete from friendships where id='$idff'";
        $result = $db->query($sql);
          
      }
      ?>
      
        

<?

        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from friendships where id_user_1='$curruserid' order by id desc";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
            
           $userid = $data1->id_user_2;
          
          
           
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid='$userid'";
        $result2 = $db2->query($sql2);
        
        if($result2){
        while($data2 = $result2->fetch_object()){
            

?>

              <tr>
                  
                <? if($data2->imagenm != NULL){ ?>
                <td style="text-align: center;width:30%;"><img style="width:43%;" src="uploadfiles/<? echo $data2->imagenm; ?>" /></td>
                <? }else{ ?>
                <td style="text-align: center;width:30%;"><img style="width:43%;" src="https://cdn.wccftech.com/images/default_avatar.png" /></td>
                <? } ?>
                
                
                <td><? echo $data2->name; ?></td>
                <td>
                <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>">
                <button type="button" class="btn btn-lg btn-primary">View Profile</button></a><br><br>
                
                <form action="" method="post">
                    <input type="hidden" name="friendshipID" value="<? echo $data1->id; ?>" />
                <button type="submit" class="btn btn-lg btn-danger">Remove</button>
                </form>
                </td>
              </tr>
<? } } } } ?>

             
             
             
             
             

<?

        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from friendships where id_user_2='$curruserid' order by id desc";
        $result1 = $db1->query($sql1);
        
        if($result1){
        while($data1 = $result1->fetch_object()){
            
           $userid = $data1->id_user_1;
          
          
           
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid='$userid'";
        $result2 = $db2->query($sql2);
        
        if($result2){
        while($data2 = $result2->fetch_object()){
            

?>

              <tr>
                  
                <? if($data2->imagenm != NULL){ ?>
                <td style="text-align: center;width:30%;"><img style="width:43%;" src="uploadfiles/<? echo $data2->imagenm; ?>" /></td>
                <? }else{ ?>
                <td style="text-align: center;width:30%;"><img style="width:43%;" src="https://cdn.wccftech.com/images/default_avatar.png" /></td>
                <? } ?>
                
                <td><? echo $data2->name; ?></td>
                <td>
                <a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data2->userid; ?>">
                <button type="button" class="btn btn-lg btn-primary">View Profile</button></a><br><br>
                
                <form action="" method="post">
                    <input type="hidden" name="friendshipID" value="<? echo $data1->id; ?>" />
                <button type="submit" class="btn btn-lg btn-danger">Remove</button>
                </form>
                </td>
              </tr>
<? } } } } ?>
             
             
             
             
             
             
             
              
            </tbody>
          </table>








    </div>
    <!-------------------notify tab3 end ------------------------------> 
    
    
    
    
      <!-------------------notify tab5 start ------------------------------>
	<div id="notify_tab5" class="tab-pane fade <? if($tabid==5){?>in active <? }?>">
      <div class="table-responsive">
      <?
      	
		if(isset($_SESSION[$session_name_initital . "notify_sort5"]) && $_SESSION[$session_name_initital . "notify_sort5"]!='')
		{
			$orderbyid=$_SESSION[$session_name_initital . "notify_sort5"];
		}
		elseif($notify_cnt4>0)
		{
			$orderbyid=5;
		}
		else{$orderbyid=3;}
		
		if($orderbyid==1){$orderby='order by PmbId desc';}
		elseif($orderbyid==2){$orderby='order by PmbId asc';}
		else{$orderby='order by PmbId desc';}
		     
			 if($orderbyid==3){$notify_search=" and FromUserId='".$curruserid."' ";}	
			 elseif($orderbyid==4){$notify_search=" and ToUserId='".$curruserid."' ";}	
			 elseif($orderbyid==5)
	{$notify_search=" and  ToUserId='".$curruserid."' and m_read='N' ";}	
			else{$notify_search=" and (FromUserId='".$curruserid."' or ToUserId='".$curruserid."' )";}
				
				$FileNm = $sitepath."notify.php?t=2";
				$fromqry=" from tbldatingpmbmaster where CurrentStatus='0' and type='4' ".$notify_search." ";
				$totalnorecord = getonefielddata( "select count(PmbId) $fromqry ");
				
		if(isset($_SESSION[$session_name_initital . "notify_item5"]) && $_SESSION[$session_name_initital . "notify_item5"]!='')
		{
			$item_per_page=$_SESSION[$session_name_initital . "notify_item5"];
		}else{$item_per_page=10;}
		
		
	  ?>
      <form method="post" action="notify_sort.php">
      		<div class="msortby text-right">
    <div class="col-sm-2 d-inline-block">
      <div class="form-group">
        <select class="form-control" name="notify_sort" id="notify_sort" onchange="notify_submit('s',this.value,5)">
        <option value="0">Sort by</option>
          <option value="3" <? if($orderbyid==3){?> selected <? }?>><?=$search_txt6?></option>
          <option value="4" <? if($orderbyid==4){?> selected <? }?>><?=$search_txt7?></option>
           <option value="5" <? if($orderbyid==5){?> selected <? }?>><?=$search_txt8?></option>
        </select>
      </div>
    </div>
    <div class="col-sm-2 d-inline-block">
      <div class="form-group">
        <select class="form-control" name="notify_item" id="notify_item" onchange="notify_submit('p',this.value,5)">
       <option value="0">Total Records</option>
          <option value="10" <? if($item_per_page==10){ ?> selected<? } ?>>10</option>
          <option value="20"  <? if($item_per_page==20){ ?> selected<? } ?>>20</option>
          <option value="50"  <? if($item_per_page==50){ ?> selected<? } ?>>50</option>
        </select>
      </div>
    </div>
  </div>
		  
      </form>
        <?
				if(isset($_GET["page"])){ //Get page number from $_GET["page"]
					$page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
					if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
				
		
				
				$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
				$total_pages=ceil($totalnorecord/$item_per_page);
				
				if($page_number==1)
		 		{ 
					$primary_id=1; 
				}
		 		else
		 		{ 
					$pg_min=$page_number*$item_per_page;   
		 			$a=$pg_min-$item_per_page;
		 			$primary_id=$a+1; 
		 		}

                
				?>
        <table border="0" width="100%" align="center" class="table table-hover" cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th width="10%"><?=$notify_mng_head1?></th>
              <th width="20%"><?=$notify_mng_head2?></th>
              <th width="35%"><?=$notify_mng_head3?></th>
              <th width="15%"><?=$notify_mng_head4?></th>
              <th width="15%"><?=$notify_mng_head5?></th>
            </tr>
          </thead>
          <tbody>
            <?
				 $sql="select ToUserId,Subject,Message,type,status,m_read,CreateDate,create_date,create_time,FromUserId,PmbId
				 ".$fromqry." ".$orderby." LIMIT ".$page_position.", ".$item_per_page."  ";
                $result = getdata($sql); 
				while($rs= mysqli_fetch_array($result))
				{ 
					$ToUserId=$rs[0];
					$Subject=$rs[1];
					$Message=$rs[2];
					$type=$rs[3];
					$status=$rs[4];
					$m_read=$rs[5];
					$CreateDate=$rs[6];
					$create_date=$rs[7];
					$create_time=$rs[8];
					$FromUserId=$rs[9];
					$PmbId=$rs[10];
					
					$from_uname=getonefielddata("select name from tbldatingusermaster where userid='".$FromUserId."' ");
					$to_uname=getonefielddata("select name from tbldatingusermaster where userid='".$ToUserId."' ");
					
				?>
            <tr id="notifyrow<?=$PmbId?>">
              <td><? echo $primary_id;?> 
                      <span class="mail_inout"> 
                      <? if($FromUserId==$curruserid){ ?>
                    <i class="fa fa-reply" aria-hidden="true"></i> 
                      <? } ?>
                      <? if($FromUserId!=$curruserid){ ?>
                          <i class="fa fa-share" aria-hidden="true"></i>
                      <? } ?>  
                     </span>
                </td>
                  <td><? if($FromUserId==$curruserid){ ?>
                  <? if(findsettingvalue('display_user_name')=='Y'){?>
	              <?=$to_uname?><br>
                  <? }else{?>
                  	<?=display_name_roundc($to_uname)?>
                  <? } ?>  
              		<nice><?=find_profile_code($ToUserId)?></nice>	
			  		<? }else{ ?>
							  <? if(findsettingvalue('display_user_name')=='Y'){?>
                          <?=$from_uname?><br>
                          <? }else{?>
                            <?=display_name_roundc($from_uname)?>
                          <? } ?> 

					<nice><?=find_profile_code($FromUserId)?></nice>
                    <? } ?>
                    <? if($FromUserId==$curruserid)
			  { ?>
             <a href="displayprofile.php?b=<?=$ToUserId?>">
             <img src="<?= $siteimagepath ?>images/external-link-square-alt-icon.png">
             </a>
             <? }else{ ?>
             <a href="displayprofile.php?b=<?=$FromUserId?>">
             <img src="<?= $siteimagepath ?>images/external-link-square-alt-icon.png">
             </a>
             <? } ?>
              </td>
              <td><?=notify_msg($type)?>
               <? 
			   //if($FromUserId==$curruserid){ 
               //echo 'sent';}else{echo 'recived';}
			    ?>
                  <? if($FromUserId==$curruserid)
			   	 { 
               		echo 'sent';
					if($status=='W')
					{
					 	echo '<br> <span class="badge"> Waiting for accept album request </span>';
					}
					else if($status=='Y')
					{
					 	echo '<br> <span class="badge"> accepted album request</span>';
					}
			     } 
			   	 else{echo 'recived';} ?>
               <? if($m_read=='N' && $FromUserId!=$curruserid){?>                
                <span class="notify_unread"><i class="fa fa-envelope faa-shake animated"></i></span>
                <? } ?><br>
              <? if($FromUserId!=$curruserid){ ?>
              <div class="switch_outer">
              <? if($status=='Y'){?> 
                You have conform by accepting  album request 
                <? }else{ ?>
                Reply by accepting album request
                <? } ?>
                &nbsp;&nbsp;
                <label class="switch">
                    
                    <input type="checkbox" value="Y" <? if($status=='Y'){ ?> checked="checked" disabled="disabled" <? } ?>
                    onclick="notify_send(11,'<?=$FromUserId?>')">
                    
                    <span class="slider round"></span>
                </label>
                </div>
                <? } ?>
              </td>
              <td><? //display_notify_time($create_time)?>
                <?=display_notify_date($create_date)?></td>
              <td>
              <a href="javascript:void(0)" onclick="notify_del('<?=$PmbId?>')"
                class="btn btn-danger btn-xs"> <b class="fa fa-trash" aria-hidden="true"></b></a>
              </td>
            </tr>
            <? $primary_id++; ?>
            <? } ?>
          </tbody>
        </table>
      </div>
      <div class="paginationOuter">
    <?=notify_paginate($item_per_page,$page_number,$totalnorecord,$total_pages,$FileNm)?>
  </div>
    </div>
    <!-------------------notify tab5 end ------------------------------> 
    
  </div>
  
</div>


<script>


function notify_del(pmbid)
{
	$.ajax({
				type: "POST",
				url: "notify_send.php",
				data:'pmbid='+pmbid+'&type=d',
				success: function(data)
				{
					$("#notifyrow"+pmbid).hide()	
					return false;
				}
			});	
		return false;
}

</script>
