

<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>
      <?=$dashboardpremiumbadges?>
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
  </div>
</div>
<ul class="nav-tabs baDgesTabs">
  <?
	$j=1;
	$result = getdata("SELECT `id`, `title` FROM `tbldating_docmaster` WHERE currentstatus=0 ");
	while ($rs = mysqli_fetch_array($result))
	{
		$tabid=$rs[0];
		$tabtitle=$rs[1];
		if($j==1)
		{	$cnm='active';
		}else{$cnm='';}
	?>
  <li class="<?=$cnm?>"><a data-toggle="tab" href="#badge<?=$tabid?>">
    <?=$tabtitle?>
    </a></li>
  <? $j++; } ?>
</ul>
<div class="tab-content baDges_content">
  <?
  $i=1;
	$result = getdata("SELECT `id`, `title`, `description`, `image`,`note`,`refno`,`uploadbx`,`selectbx`,`bagde_assoc` FROM `tbldating_docmaster` WHERE currentstatus=0 ");
	while ($rs = mysqli_fetch_array($result))
	{
		$id=$rs[0];
		$title=$rs[1];
		$description=$rs[2];
		$image=$rs[3];
		$note=$rs[4];
		
		$refno_arr=$rs[5];
		$uploadbx_arr=$rs[6];
		$selectbx_arr=$rs[7];
		
		$refno_arr=explode(",",$refno_arr);
		$refno=$refno_arr[0];
		if($refno=='Y'){$refno_text=$refno_arr[1];}
		
		$uploadbx_arr=explode(",",$uploadbx_arr);
		$uploadbx=$uploadbx_arr[0];
		if($uploadbx=='Y'){$uploadbx_text=$uploadbx_arr[1];}
		
		$selectbx_arr=explode(",",$selectbx_arr);
		$selectbx=$selectbx_arr[0];
		if($selectbx=='Y'){$selectbx_text=$selectbx_arr[1];}
		
		
		$bagde_assoc=$rs[8];

		
		if($i==1)
		{
			$cls='tab-pane fade in active';
		}
		else{$cls='tab-pane fade';}
		
		$i++;
	?>
  <div id="badge<?=$id?>" class="<?=$cls?>">  
    <script>
					
				$(document).ready(function (e) 
				{
					$("#badge_form<?=$id?>").on('submit',(function(e) 
					{
							
							var id=<?=$id?>;
							
								
							 <? if($selectbx=='Y') {?>
							var sel_type = document.forms["badge_form<?=$id?>"]["doc_type<?=$id?>"].value;
							if(sel_type==0.0)
							{
								$("#error_badge<?=$id?>").show();
								$("#error_badge<?=$id?>").html("<?=$validation_txt26?>");
								document.getElementById("doc_type<?=$id?>").focus(); 
								setTimeout(function(){ 
											$("#error_badge<?=$id?>").hide();
										}, 4000);
								return false;
							}
							<? } ?>
							 <? if($refno=='Y') {?>
							 var refno = document.forms["badge_form<?=$id?>"]["refno<?=$id?>"].value;
							 if(refno=="")
							{
								
								$("#error_badge<?=$id?>").show();
								if(id==5){$("#error_badge<?=$id?>").html("Enter URL");}else{
								$("#error_badge<?=$id?>").html("<?=$validation_txt27?>");}
								document.getElementById("refno<?=$id?>").focus(); 
								setTimeout(function(){ 
											$("#error_badge<?=$id?>").hide();
										}, 4000);
								return false;
							}
							<? } ?>
					
							 <? if($uploadbx=='Y') {?>
							var image = document.forms["badge_form<?=$id?>"]["image<?=$id?>"].value;
							 if(image=="")
							{
								
								$("#error_badge<?=$id?>").show();
								$("#error_badge<?=$id?>").html("<?=$validation_txt28?>");
								document.getElementById("image<?=$id?>").focus(); 
								setTimeout(function(){ 
											$("#error_badge<?=$id?>").hide();
										}, 4000);
								return false;
							}
							
							<? } ?>		
							
								$("#show_badgeinfo<?=$id?>").hide();
								$("#hide_badgeinfo<?=$id?>").hide();
								$("#loader_badge<?=$id?>").show();
								e.preventDefault();
								$.ajax
								({
										url: "badges_submit.php",
										type: "POST",
										data:  new FormData(this),
										contentType: false,
										cache: false,
										processData:false,
										success: function(data)
										{
											setTimeout(function(){ 
											document.getElementById("badge_form<?=$id?>").reset(); 
												$("#show_badgeinfo<?=$id?>").show();
												$("#show_badgeinfo<?=$id?>").html(data);
												$("#loader_badge<?=$id?>").hide();
											 }, 3000);
											
										},
										error: function() 
										{
											
										} 	        
								});
								return false;
							
					}));
				});
                </script> 
    <script>
				function  del_badge<?=$id?>(id)
				{
						$.ajax({
						type: "POST",
						url: "del_badges.php",
						data:'id='+id,
						success: function(data)
						{ 
							
							$("#badge_list"+id).hide();
							$("#error_delbadge<?=$id?>").show();
							$("#error_delbadge<?=$id?>").html(data);
								setTimeout(function()
											{ 
												$("#error_delbadge<?=$id?>").hide();
											 }, 3000);
						}
						});
				}
				</script>
    <div class="col-lg-12 col-sm-12 col-xs-12">
    
      <div class="badge_outer">
        <div class="badge_block">
       <?
        $badge_ckh = getonefielddata("SELECT count(id) from tbldating_userdoc where 
	   userid='".$_SESSION[$session_name_initital."memberuserid"]."' and docid='".$id."' and currentstatus=0 ");
	   ?>
       <? if($bagde_assoc=='free')
			{ 
            	$display_badge_frm='Y';
			}
			elseif($bagde_assoc=='tru')
			{ 
         	
           		$trust_chk=getonefielddata("select count(id) from  tbldatingusertrustsealmaster
				where userid='".$_SESSION[$session_name_initital."memberuserid"]."' and currentstatus=0
				and expiredate>=curdate() ");
				if($trust_chk>0)
				{
					$display_badge_frm='Y';
				}else
				{
					$display_badge_frm='N';
					$display_bad_message='<a class="mem_sendbut" href="membership.php">'.$click.' '.$here.'</a>';
				}
			}
			elseif($bagde_assoc=='mem')
			{ 
         		$trialpckg=findsettingvalue("trialpackageid");
           		$mem_chk=getonefielddata("select count(userid) from  tbldatingusermaster
				where userid='".$_SESSION[$session_name_initital."memberuserid"]."' and currentstatus in (0,1)
				and expiredate>=curdate() and packageid!=".$trialpckg." ");				
				if($mem_chk>0)
				{
					$display_badge_frm='Y';
				}
				else{
					$display_badge_frm='N';
					$display_bad_message='<a class="mem_sendbut" href="membership.php">'.$click.' '.$here.'</a>';
				}
			}
			else{$display_badge_frm='N';$display_bad_message='';}
			 ?>
       
       
       <? if($badge_ckh>=2){?>
         
           
           <div class="othersBadge">
           <? 
		   if($display_badge_frm=='N'){
			   $imgpath=$sitepath.'assets/'.$sitethemefolder.'/images/';
			   $bagge_con_expire=str_replace("[image]",$imgpath,$bagge_con_expire);
         	echo $bagge_con_expire;
            }
			elseif($display_badge_frm=='Y')
			{ ?>
			<div class="cong_div"><?=$badge_cong?></div>	
			<? } ?>
            </div>
           
	   <? } ?>
       
       
          <div class="col-lg-4 col-sm-12 col-xs-12">
            <h4>
              <?=$description?>
              <figure class="bigBadgeImg"><img src="<?= $siteimagepath ?>images/<?=$image?>" width="200" height="200"></figure>
            </h4>
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="form_badge">
            
         <? if($display_badge_frm=='Y'){?>
            	<form name="badge_form<?=$id?>" id="badge_form<?=$id?>"  ENCTYPE="multipart/form-data" method="POST"  >
                <p>
                  <?=$note?>
                </p>
                <div id="error_badge<?=$id?>" class="errorbox"></div>
                <input class="form-control" type="hidden" value="<?=$id?>" name="badge_type" id="badge_type">
                
                <? if($selectbx=='Y') {?>
                	<div class="form-group">
                  <label class="control-label">
                    <?=$selectbx_text?>
                  </label>
                  <select class="form-control" name="doc_type<?=$id?>" id="doc_type<?=$id?>">
                    <option value="0.0">select</option>
                 <?
			   	$result15 = getdata("select id,title from tbldating_doct_detail where currentstatus=0 
			   and type=$id order by id");
                while ($rs15 = mysqli_fetch_array($result15))
                {
                    $id15=$rs15[0];
                    $title=$rs15[1];
				?>               
                      <option value=<?=$id15?>><?=$title?></option>
                <? } ?>
                  </select>
                </div>
                <? } ?>
				
				<? if($refno=='Y') {?>
           	    	 <div class="form-group">
                  <label class="control-label">
                    <?=$refno_text?>
                  </label>
                  <input class="form-control" type="text" name="refno<?=$id?>" id="refno<?=$id?>">
                </div>
                <? } ?>
                
                <? if($uploadbx=='Y') {?>
            	    <div class="form-group">
                  <label class="control-label">
                    <?=$uploadbx_text?>
                  </label>
                  <input class="form-control" type="file" name="image<?=$id?>" id="image<?=$id?>">
                  <br>
                </div>
                 <? } ?>
                 
                <div class="form-group btn_outer">
                  <input class="btn" type="submit" value="<?=$badgesSave?>" name="badge_submit<?=$id?>"
                                   id="badge_submit<?=$id?>">
                  <br>
                </div>
              </form>
             <? }else{?> 
             <?=$badge_dismes.$display_bad_message?>
              <? } ?>
            </div>
            
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12">
          	<div class="form_badge">
            <div class="Outer_Document">
              <div id="loader_badge<?=$id?>" style="display:none"><img src="<?= $siteimagepath ?>images/Flickr.gif"></div>
              <div id="error_delbadge<?=$id?>" style="display:none"></div>
              <div id="show_badgeinfo<?=$id?>" style="display:none" class="badge_listDelet"></div>
              <div class="badge_listDelet" id="hide_badgeinfo<?=$id?>">
                <ul>
                  <?
                    
					  
                        $result2 = getdata("SELECT typeid,currentstatus,id FROM  tbldating_userdoc WHERE currentstatus in (0,1,2) and userid='".$_SESSION[$session_name_initital."memberuserid"]."' and docid='".$id."' ");
						$ij=1;
                        while ($rs2 = mysqli_fetch_array($result2))
                        { 
							$typeid=$rs2[0];
							$currentstatus=$rs2[1];
							$user_docid=$rs2[2];
							
						
							$docname=getonefielddata("select title from tbldating_doct_detail
							where currentstatus=0 and id='".$typeid."' and type='".$id."' ");
							
							
							
							if($docname=='')
							{
								$docname=' Reference Letter '.$ij;
							}
							
						?>
                  <li id="badge_list<?=$user_docid?>">
                    <div class="identity_block">
                     <span class="identity_Icon"> <i class="fa fa-id-card" aria-hidden="true"></i> </span>
                      <h3>
                        <?=$docname?>
                      </h3>
                      
                      <figure class="identity_Right">
					  <? if($currentstatus==0){?>
                     <i title="Approve" class="fa fa-check" aria-hidden="true"></i> 
                      <? } elseif($currentstatus==1){?>
                       <i title="Pending" class="fa fa-hourglass" aria-hidden="true"></i> 
                      <? } else if($currentstatus==2){?>
                      <i title="Disapprove" class="fa fa-ban" aria-hidden="true"></i> 
                      <? } ?>
                       </figure>
                       
                      <span class="Remove_blk"> <a onclick="del_badge<?=$id?>('<?=$user_docid?>')"> <i class="fa fa-times" aria-hidden="true"></i> </a> </span> </div>
                  </li>
                  <? $ij++;
				   } ?>
                </ul>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
   
  </div>
</div>
<? } ?>
</div>
