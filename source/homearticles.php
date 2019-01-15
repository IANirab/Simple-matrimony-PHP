<?php 
	if($enable_home_articles=='Y') {
		?>

<div class="homebanners">
	<div class="homearticlebanner"><a href="<?= $sitepath ?>articleall.php" target="_self"><img src="<?= $siteimagepath ?>images/home_article_banner.jpg" alt="" border="0" /></a></div>
	<div class="homedirectorybanner"><a href="<?= $sitepath ?>directory.php" target="_self"><img src="<?= $siteimagepath ?>images/directory.jpg" alt="" border="0" /></a></div>
	<div class="homeeventbanner"><a href="<?= $sitepath ?>events.php" target="_self"><img src="<?= $siteimagepath ?>images/event.jpg" alt="" border="0" /></a></div>
	</div>
    <? } ?>