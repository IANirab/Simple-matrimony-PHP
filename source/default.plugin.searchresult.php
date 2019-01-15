
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inside_search"> 
<?  include("searchinclude.php");?>
</div>

 <h2><?= $searchresulttitle ?></h2> 

    
    <!-- ********* TITLE START HERE *********-->
            <!-- ********* TITLE END HERE *********-->
            <div class="pagecontent">         
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <!-- ********* CONTENT START HERE *********-->
            
            <?
            
            
                if ($searchque != "")
                {
                    $FileNm = $sitepath . "searchresult";
                    $design_view_id = $_SESSION[$session_name_initital . "search_grid_design_display"];				
                    include("plugin.searchgrid.php");
                }
                ?>
    
<br class="clearside" />		
<br />
</div>

		<!-- ********* CONTENT END HERE *********-->
		