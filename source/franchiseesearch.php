<? include("commonfile.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_franchisee_search")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_franchiseesearch raw">
    		<div class="pagetitle">
                 <div class="featured_title_div abtus">
                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 midle_title"><span>Search Nearest Franchisees</span></div>
                 <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4 hidden-xs trac_top">&nbsp;</div>
                </div>
            </div>
            <div class="wrapper_search">
                <div class="container">                       
                        <?php include("plugin.office_location_search.php") ?>
                    </div>
                </div>
            </div>

</div>



<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>