
<?
$NoofPages  = "";
$ordby ="typeid desc";
	
$fromqry = "from tbl_directory_master where $searchque ". directorywhereque() . " order by $ordby ";

if ($Pgnm == "")
	$Pgnm = 1;
	
	$totalnorecord = getonefielddata( "select count(directoryid) $fromqry ");
	$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,$searchgridtnext,$searchgridback,"Y");
	$NoOfRecord = $arrval["NoOfRecord"];
	$BackStr = $arrval["BackStr"];
	$NextStr = $arrval["NextStr"];
	$page_no_str = $arrval['PageStr'];
	
	if ($disp_total != "")
	{
		$NoOfRecord = "limit $disp_total";
		$BackStr = "";
		$NextStr = "";
		$page_no_str = "";
	}
	$result = getdata("select directoryid, title,substring(description,1,200) as description,image_nm,link,categoryid,typeid,payment_completed,mobile $fromqry $NoOfRecord");
		while($rs= mysqli_fetch_array($result))
		{
		 $directoryid = $rs[0];
		 $title = $rs[1];
		 $description = $rs[2];
		 $image_nm = $rs[3];
		 $mobile=$rs['mobile'];
		 if ($image_nm == "")
		 	$image_nm ="noimage.gif";
		//$gen_link = generatelink($title,$directoryid,"directory_detail");
		$link = $rs[4];
		$categoryid = $rs[5];
		$typeid = $rs[6];
		$payment_completed = $rs[7];
		if (($typeid == 2) && ($payment_completed=="Y"))
			$class_nm = "paidad";
		else
			$class_nm = "freead";
		$cattitle = getonefielddata("select title from tbl_directory_category_master where categoryid=$categoryid");
		$cat_link = generatelink($cattitle,$categoryid,"directory_category_que");
		$cat_link ="<a href='$cat_link'>$cattitle</a>";
		?>
		
<div class="wrapper_directory"> 
      <div class="uploaded_user"><img src='<?= $sitepath ?>uploadfiles/<?= $image_nm ?>' /></div>
      <div class="rside_head">
      <h3>
          <a href="<?=$sitepath?>directory_detail.php?b=<?=$directoryid?>"><?= $title?></a>
        </h3>
         <span>[ 
        <?=$cat_link ?>
        ] </span>
        <p>
          <?= $description ?>
        </p>
         <a href="<?= $link ?>" target="_blank" class="sepretor">
        <?= $link ?>
        </a> 
         <p><a href="tel:<?=$mobile?>"><?=$mobile?></a></p>
     <div class="directoryinquirybtn"><a href='<?= $sitepath ?>directory_detail.php?b=<?= $directoryid ?>'><?= $directory_search_grid_inquirynow ?></a></div>
    
</div>
</div>


<br />
<? }
	freeingresult($result);
 ?>
		</div>
   
   
         
       	

