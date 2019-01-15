


<div class="searchlink_tabs">
	<div  class="container">
    
     <ul class="nav nav-tabs">
		<?
		$tab_i=1;
        $result = getdata("select id,title,note FROM  tbldatingadminsearchsetting where currentstatus=0 ");
        while($rs= mysqli_fetch_array($result))
        {	
        	
			$tab_id = $rs[0];
			$tab_title = $rs[1];
			$tab_note = $rs[2];
			if($tab_i==1)
			{
				$tabactive_cls='active';
			}else{ $tabactive_cls=''; }
        ?>
			<li class="<?=$tabactive_cls?>"><a data-toggle="tab" href="#searchtab<?=$tab_id?>"><?=$tab_note?></a></li>
            
     	 <? 
		 $tab_i++;
		 } 
			
		 ?>	
     </ul>

      <div class="tab-content">
		
		<?
		$tab_j=1;
        $result = getdata("select id,title FROM  tbldatingadminsearchsetting where currentstatus=0 ");
        while($rs= mysqli_fetch_array($result))
        {	
        	
			$tab_id = $rs[0];
			$tab_title = $rs[1];
			if($tab_j==1)
			{
				$tabactive_cls='in active';
			}else{ $tabactive_cls=''; }
		?>	
        <div id="searchtab<?=$tab_id?>" class="tab-pane fade <?=$tabactive_cls?>">
          <ul class="SimpalLink">
      		
            
			<?
		
            $result1 = getdata("select title,searchid FROM tbldatingadminsearchmaster where currentstatus=0 and languageid=$sitelanguageid AND sectionid=3 and searchbase1='".$tab_title."' order by title");
			while($rs1= mysqli_fetch_array($result1))
            {
				$title = $rs1[0];
				$searchid = $rs1[1];
				$urltitle = $searchid . "_" . makeurlsearchengine($title);
			?>    	
            <li>
            <a href='<?= $sitepath ?>populardetail/<?= $urltitle ?>'>
            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i><?=$title ?></a>
            </li>          	
            <? } ?>
            
          </ul>
        </div>
		
         <? 
		 $tab_j++;
		 } 
		 ?>

      </div>
      
  </div>
</div>







<?php /*?><div>

<?
$rsearch = '';
$result = getdata("select title,searchid FROM tbldatingadminsearchmaster where ".$rsearch." currentstatus=0 and languageid=$sitelanguageid AND sectionid=3 order by title");
if(mysqli_num_rows($result)) { ?>
<div class="homeadminlink_in">
<?
$j=1;
while($rs= mysqli_fetch_array($result))
{
	$title = $rs[0];
	$searchid = $rs[1];
	$urltitle = $searchid . "_" . makeurlsearchengine($title);
?>
<a href='<?= $sitepath ?>searchdetail/<?= $urltitle ?>'><?=$title ?></a><? if($j!=mysqli_num_rows($result)) { ?>
<span><br /></span> <? } ?>
<? 
$j++;
} ?></div> <? 
}
freeingresult($result); ?>
</div><?php */?>