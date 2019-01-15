 	





<h2><?= $homefeaturedmember ?></h2>

<div class="homefeatured ">
    <style type="text/css">
.cs-team-stylish.team-grid figure.cs-effect-oscar figcaption:before,.cs-team-stylish.team-grid figure.cs-effect-oscar p{ opacity: 0; transform: scale(0); -webkit-transform: scale(0);}
.cs-team-stylish.team-grid:hover figure.cs-effect-oscar .caption-text{ opacity: 1; transform: translate3d(0,0,0); visibility: visible; -webkit-transform: translate3d(0,0,0);}
.cs-team-stylish.team-grid:hover figure.cs-effect-oscar figcaption:before,.cs-team-stylish.team-grid figure.cs-effect-oscar:hover p{ opacity: 1; transform: scale(1); -webkit-transform: scale(1);}
.cs-team-stylish.team-grid:hover figure.cs-effect-oscar figcaption{ background-color: rgba(0, 0, 0, 0.78);}
.cs-team-stylish.team-grid:hover figure.cs-effect-oscar img{ opacity: 0.4;}

</style>
    
  <?  $chk_userid_count = getonefielddata(" select count(tbldatingusermaster.userid) from tbldatingusermaster,tbldatindatigadminfeaturedusermaster where tbldatingusermaster.userid= tbldatindatigadminfeaturedusermaster.userid  and tbldatindatigadminfeaturedusermaster.
section='FM' and ". datinguserwhereque() . " ");

	 ?>  
    
    <ul id="owlticker" class="newsticker owl-carousel">    
<?
//echo "select tbldatingusermaster.userid, name," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname from tbldatingusermaster,tbldatindatigadminfeaturedusermaster where tbldatingusermaster.userid= tbldatindatigadminfeaturedusermaster.userid  and tbldatindatigadminfeaturedusermaster.
//section='FM' and ". datinguserwhereque() . " group by tbldatingusermaster.userid order by featureid ";

$result = getdata("select tbldatingusermaster.userid, name," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname from tbldatingusermaster,tbldatindatigadminfeaturedusermaster where tbldatingusermaster.userid= tbldatindatigadminfeaturedusermaster.userid  and tbldatindatigadminfeaturedusermaster.
section='FM' and ". datinguserwhereque() . " group by tbldatingusermaster.userid order by featureid ");
$i=1;
while ($rs = mysqli_fetch_array($result))
{
	$userid = $rs[0] ;
	$name = $rs[1] ;
	$age = $rs[2];
	$countryid = "";
	if ($rs[3] !="")
	 $countryid = findcountryid($rs[3]);
	if($rs[4]!='') {
		if(is_numeric($rs[4])){
			$state = getonefielddata("SELECT title from tbldating_state_master WHERE id=".$rs[4]);	
		} else {
			$state = $rs[4];
		}
	} else {
		$state = '';	
	}
	//$state = $rs[4];
	$area = $rs[5];
	$imagenm = $rs[6];
	$profileheadline = $rs[7];
	if($rs[8]!=''){
		if(is_numeric($rs[8])){
			$citynm = getonefielddata("SELECT title from tbldating_city_master WHERE id=".$rs[8]);
		} else {
			$citynm = $rs[8]	;
		}
	} else {
		$citynm = '';	
	}
	//$city = $rs[8];
	$zodiacsign = $rs[9];
	if ($zodiacsign != "")
	 	$zodiacsign ="<img src ='". $siteimagepath . "images/zodiac-$zodiacsign.gif' alt='". $zodiacsign ."'>";
	$nickname = $rs[10];
		
	/* if ($imagenm == "")
	 $imagenm = "noimageprofile.gif";
	 $imagenm = "<img src='". $sitepath ."uploadfiles/" . $imagenm . "'>"; */
	 $imagenm = find_user_image($userid,"",$i,"fm");
 	 $userlink = displayprofilelink($userid);
	?>


<li>
<span>
<p align="center">
<a href="<?= $userlink ?>"><?= $imagenm ?></a></p>





<a href='<?= $userlink ?>'>
<i>
<h2 class="thumbnail-text"><strong class="homefeaturedinfo">  
<? if(findsettingvalue('display_user_name')=='Y'){?>
<?= $name?>
<? } else{?>
<?=find_profile_code($userid)?>
<? } ?>
</strong></h2>
<? $area1 =  substr($area,0,15); ?>
<h3><?= $age ?>, <?= $searchgriddisplayprofilefromtext ?> <?= $area1 ?> <?= $citynm  ?></h3>
</i>
</a>
</span>
</li>
<? $i++;
} 
	freeingresult($result);
?>
</ul>
</div>
