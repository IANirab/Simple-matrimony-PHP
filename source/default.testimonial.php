

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


<h2><?= $testimonialhead ?></h2>
<div class="commemt_section">
<ul class="bxslider1 owl-carousel" id="owlHtestimonial">


<?

$displaytype = findsettingvalue("DisplayTestimonialType");

if ($displaytype == "S")
	$sSql = "select max(testimonialid) from tbldatingtestimonialmaster where currentstatus=0 and languageid=$sitelanguageid";
else
	 $sSql = getdata("select testimonialid from tbldatingtestimonialmaster where currentstatus=0  and languageid=$sitelanguageid order by rand() limit 0,3 ");
	 while($res= mysqli_fetch_array($sSql))
	{	 $testimonialid=$res[0];
//$testimonialid = getonefielddata($sSql);
?><li class="item"><?
if ($testimonialid != "") {
	
$result = getdata("select title,description,image FROM tbldatingtestimonialmaster where  testimonialid=$testimonialid");
while($rs= mysqli_fetch_array($result))
{	
	 $title = $rs[0];
	$description = $rs[1];
	$description2 = substr($rs[1],0,150);
	$image = $rs[2];
	if ($image == "")
		$image = "noimagetestimonial.gif";
	?>
	
	

<div class="testimonial_image">
<div class="code_paath">&nbsp;</div>    
	
	<span>
	<? 

	$desc_tit=(explode(" ",$description2));
	$cont=count($desc_tit);
	$desc_tit2='';
	for($i=0;$i<$cont-1;$i++)
	 {
		$desc_tit2.=$desc_tit[$i]." ";
	 }
	 if(strlen($description) > 150 )
	 {
		$desc_txt='....';	
	 }else{ $desc_txt=''; }
		echo $desc_tit2.$desc_txt ;	 
	 ?>
	
    </span>
  <? }

freeingresult($result);
}
if($testimonialid!=''){
?>

<?
}
?> 
<i class="midtitle"><?=$title ?></i>  
<div class="code_paath2">&nbsp;</div> 
   
</div>
<? if($image!=''){?>

 <img src='<?= $sitepath ?>uploadfiles/<?=$image ?>'>
 <? }else{?>
  <img src='<?= $sitepath ?>uploadfiles/noimagetestimonial.gif'>
	<? } ?>
 </li>
  <? } ?>
 </ul>
  <a href='<?= $sitepath ?>testimonialdetail.php' class="more_comment"><?= $testimonial_all_link ?></a>
 
</div> 
  
</div>
