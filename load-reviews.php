        <?
        $commentsNewCount = $_POST['commentsNewCount'];
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbl_consultant_list where id='$commentsNewCount'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){

        ?> 
        
        <div class="card">
            <div class="card-header">
                <div class="card-header-menu">
                    <i class="fa fa-bars"></i>
                </div>
                <div style="background-image: url('uploadfiles/<? echo $data->img; ?>');" class="card-header-headshot"></div>
            </div>
            <div class="card-content">
                <div class="card-content-member">
                    <h4 class="m-t-0"><? echo $data->name; ?></h4>
                <p class="m-0"><i class="pe-7s-map-marker"></i><? echo $data1->office; ?></p>
                </div>
                <div class="card-content-languages">
                    <div class="card-content-languages-group">
                        <div>
                            <h4>Speaks:</h4>
                        </div>
                        <div>
                            <ul>
                <li><? echo $data->speaks; ?>

                                    <div class="fluency fluency-4"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                <div class="col-sm-9">
                        <div class="review-block-rate">
                        <?
                        $treview = $data->totalreview / $data->gotreview;
                        for($review = 1; $review <= $treview; $review++){
                        ?>
                        <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <? } ?>
                        
                        <?
                        if($treview < 5){
                            
                            $minreview = 5 - $treview;
                            for($review = 1; $review <= $minreview; $review++){
                        ?>
                        
                        <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                           <i class="fas fa-star"></i>
                        </button>
                       <? } } ?>
                    </div>
                    </div>
                    </div>
                 
<hr>
<b style="width:100%;text-align:center;">Reviews By User's</b>
<hr>
                    
                <div class="row">
<div class="col-sm-3">
    
</div>
                    
                <div class="col-sm-9">
                    
                    
                    
<?
        
        $conid = $data->id;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbl_consultant_reviews where conid='$conid' ORDER BY id desc Limit 2";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){

?>
<?

        $id = $data1->userid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid='$id'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){

?>

<h6><? echo $data2->name; ?></h6>
<? } ?>


                        <div class="review-block-rate">
                        <?
                        $treview1 = $data1->rating;
                         for($review = 1; $review <= $treview1; $review++){
                        ?>
                        <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <? } ?>
                        <?
                        if($treview1 < 5){
                            
                            $minreview1 = 5 - $treview1;
                            for($review = 1; $review <= $minreview1; $review++){
                        ?>
                        
                        <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                           <i class="fas fa-star"></i>
                        </button>
                       <? } } ?>
                    </div>
                    <p><? echo $data1->comments; ?></p>  <hr>
<? } ?>                    
                  
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  see more reviews
</button>                
                    
                    </div>
                    </div>
                    
                    
    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> All Reviews </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        <?
        
        $conid = $data->id;
        $db1 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql1 = "select * from tbl_consultant_reviews where conid='$conid' ORDER BY id desc";
        $result1 = $db1->query($sql1);
        
        while($data1 = $result1->fetch_object()){

?>
<?

        $id = $data1->userid;
        $db2 = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql2 = "select * from tbldatingusermaster where userid='$id'";
        $result2 = $db2->query($sql2);
        
        while($data2 = $result2->fetch_object()){

?>

<h6><? echo $data2->name; ?></h6>
<? } ?>


                        <div class="review-block-rate">
                        <?
                        $treview1 = $data1->rating;
                         for($review = 1; $review <= $treview1; $review++){
                        ?>
                        <button type="button" class="btn btn-success btn-xs" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <? } ?>
                        <?
                        if($treview1 < 5){
                            
                            $minreview1 = 5 - $treview1;
                            for($review = 1; $review <= $minreview1; $review++){
                        ?>
                        
                        <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                           <i class="fas fa-star"></i>
                        </button>
                       <? } } ?>
                    </div>
                    <p><? echo $data1->comments; ?></p>  <hr>
<? } ?>
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>                
                    
                    
                    
                <div class="card-content-summary">
                    <p id="table"></p>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="card-footer-stats">
                    <div>
                        <p>PROJECTS:</p><i class="fa fa-users"></i><span style="    margin-left: 4px;"><? echo $data->gotreview; ?></span>
                    </div>
                    <!--<div>-->
                    <!--    <p>INTERESTS:</p><i class="fa fa-coffee"></i><span></span>-->
                    <!--</div>-->
                    <div>
                        <p>STATUS</p><span class="stats-small"><?
                        echo $data->ability;
                        ?></span>
                    </div>
                </div>
                <div class="card-footer-message">
                    <a href="add_consultant.php?id=<? echo $data->id; ?>"><h4><i class="fa fa-comments"></i> Contact with me</h4></a>
                </div>
            </div>
        </div>
       <? } ?>  