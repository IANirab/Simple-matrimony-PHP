<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="marc_sec">
<div class="advanced_links">
<?
$page_url=$_SERVER['REQUEST_URI'];
$last_val=strrpos ($page_url,'/');
$page_name=substr($page_url,$last_val+1);
?>

	<ul>
    	<? if(file_exists("searchquick.php")) { ?>
       <li <? if($page_name=='searchquick.php'){?> class="active" <? } ?>>
       	<a href='<?= $sitepath ?>searchquick.php' <?=$basic_clr_code?> ><?=$leftlinkquicksearch?></a>
        </li>
        <? } if(file_exists("advancesearch.php")){ ?> 
        <li <? if($page_name=='advancesearch.php'){?> class="active" <? } ?>>
        	<a href='<?= $sitepath ?>advancesearch.php' <?=$adv_clr_code?>><?=$leftlinksearch?></a>
        </li>
        <? } if(file_exists("special_search.php")) { ?> 
        <li <? if($page_name=='special_search.php'){?> class="active" <? } ?>>
        	<a href='<?= $sitepath ?>special_search.php' <?=$spl_clr_code?>> <?=$leftsearchSpecialSearch?></a>
        </li>
        <? } if(file_exists("astrosearch.php")) { ?>
        <li <? if($page_name=='astrosearch.php'){?> class="active" <? } ?>>
        	<a href='<?= $sitepath ?>astrosearch.php' <?=$astro_clr_code?>><?=$astrosearchpgtitle?></a>
        </li>
       <? } if(file_exists("islamicsearch.php")) {
		   if(findsettingvalue('islamic_search_allow')=='Y'){ ?>
        <li <? if($page_name=='islamicsearch.php'){?> class="active" <? } ?>>
        	<a href='<?= $sitepath ?>islamicsearch.php' <?=$astro_clr_code?>><?=$leftsearchIslamicSearch?></a>
        </li>
        <? } ?>
       <? } if(file_exists("professional.php")){ ?> 
        <li <? if($page_name=='professional.php'){?> class="active" <? } ?>>
        	<a href='<?= $sitepath ?>professional.php' <?=$adv_clr_code?>> <?=$leftsearchIProfessionalSearch?></a>
        </li>
        <? }  
	   ?> 
    </ul>
</div>
</div>

</div>

