<!-- ********* TITLE START HERE *********-->

<div class="pagetitle">
  <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span>
      <?= $albumpagetitle ?>
      </span></div>
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
  </div>
</div>

<!-- ********* TITLE END HERE *********-->

<div class="pagecontent"> 
  <!-- ********* CONTENT START HERE *********-->
  
      <div class="Album_allImages">      
      <ul>
      <?
                        $chk_album_req=getonefielddata("select image_password_protect from tbldatingusermaster 
                         where userid='".$uid."' ");
                         
                         if($chk_album_req=='Y')
                         { 
                            $chk_alb='';
    
                          $chk_alb = getonefielddata("select status from  tbldatingpmbmaster where 
        FromUserId='".$curruserid."' and ToUserId='".$uid."' and CurrentStatus=0 and type=4 order by PmbId desc limit 1 ");
                         if($chk_alb!='Y')
                            { ?>
                            
      <div class="imageprotectionnote">
        <?= $album_image_message1  ?> 
      </div>
      <? 
                            exit; } 
                                }  ?>
      <?
    //require_once("userdetail.php");
    if ($uid != "")
    {
     
     if(isset($_GET['act']) && $_GET['act']=='admin'){
        $wh = "";	 
     } else {
         $wh = "currentstatus=0 and ";
     } 
    $result1 = getdata("select imagenm,substr(description,0,100),albumid from tbldatingalbummaster where ".$wh." CreateBy =$dispayuserid order by ordno");
    $albm_cnt=mysqli_num_rows($result1);
    if($albm_cnt>0)
    {
         while($rs1= mysqli_fetch_array($result1))
         { 
             $imagenm = $rs1[0];
             $description = $rs1[1];
             $albumid = $rs1[2];
             if ($imagenm == "")
                $imagenm = "noimage.gif";
           ?>
      <li>
        <div class='albIMG-block'>   
        <a data-fancybox="gallery" href="<?= $sitepath ?>uploadfiles/album<?= $imagenm ?>">
        <img src='<?= $sitepath ?>uploadfiles/thumbalbum<?= $imagenm ?>' id="myImg<?=$albumid?>" />
     
        </a>                         
        </div>
      </li>
      
      <? } ?>
      </ul>
      </div>
  </div>
      <? }else{ ?>
      <div class="album_nodata">    
      	<figure><a href="javascript:void(0)" title="No images"><i class="fa fa-file-image-o faa-tada animated" aria-hidden="true"></i></a></figure>  	
        <h3><?=$noalbumimageMessage?></h3> 
        <p></p>
      </div>      
  
  <? } ?>
  <? }?>

  <br style="clear:both" />
  &nbsp; 
  <!-- ********* CONTENT END HERE *********--> 
</div>

