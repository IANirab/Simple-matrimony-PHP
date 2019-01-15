
<div class="row padding_space">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
<? 
$objbottombanner = new banner();
echo ($objbottombanner->Showbanner1(4));
?>

</div>
<div style="background:none;" class="mainfooter">
<div class="row padding_space"> 
    
    


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bee5c6070ff5a5a3a726c82/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->




    
    
<!-- footer-top -->	
	<div class="footer-top">
		<div class="container">
		    <div class="row">
			<div class="col-sm-4 foot-left">
				<h3><?=findsettingvalue("notice_title"); ?></h3>
			
				<p><?=findsettingvalue("notice_desc1"); ?></p>
			</div>
			<div class="col-sm-4 foot-left">
					<h3>Get In Touch</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
				
						<div class="contact-btm">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							<p><?=findsettingvalue("CompanyName"); ?>
<?=findsettingvalue("CompanyAddress"); ?></p>
						</div>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<p><?=findsettingvalue("HeaderPhoneno"); ?></p>
						<div class="contact-btm">
						</div>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<p><a href="mailto:<?=findsettingvalue("AdminMail"); ?>"><?=findsettingvalue("AdminMail"); ?></a></p>
						</div>
						<div class="clearfix"></div>

			</div>
			<div class="col-sm-4 foot-left">
				<h3>Our Links</h3>
				<ul>
					<li><? echo getcmslinks(3); ?></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			</div>
			
			
				<div class="clearfix"></div>
		</div>
	</div>
<!-- /footer-top -->							

<!-- footer -->
			<div class="copy-right">
				<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
						<div class="copy-left">
						<p>&copy; 2018 Events. All rights reserved | Design by <a href="http://Paroshi.com/">Paroshi.Com</a></p>
						</div>
					</div>
				<div class="col-md-6 col-sm-6 col-xs-6 top-middle">
						<ul>
							<li><a href="<?=findsettingvalue("fblink")?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?=findsettingvalue("twitter_link")?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?=findsettingvalue ("gplus_link")?>"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="<?=findsettingvalue("skype_link")?>"><i class="fa fa-vimeo"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					</div>
			</div>
			
<!-- //footer -->
<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Events
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/g8.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
</div>






                     
            

	
<span class="webstatscode"><?= findsettingvalue("Webstats_code"); ?></span></div>

<!-----------------notify buy membership start--------------------->
                        <div class=" UpgradePopupAll modal fade" id="notify_membersip" role="dialog">
                            <div class="modal-dialog">
                              
                              <div class="modal-content">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="modal-body" id="notify_membersip_txt" style="display:none">
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
<!-----------------notify buy membership end--------------------->

<? $username = getusername();
$chkalbum = strstr($_SERVER['REQUEST_URI'],"album");
$chkislamic = strstr($_SERVER['REQUEST_URI'],"islamicsearch");
?> 








<!-- //bootstrap-modal-pop-up --> 
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-2.2.3.min.js"></script> 
	
<!-- skills -->

						<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

<!-- start-smoth-scrolling -->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--flexiselDemo1 -->
 <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});
								
							});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!--//flexiselDemo1 -->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>