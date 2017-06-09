<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profit and Loss</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A INUBAAN Software Product" />
	<meta name="keywords" content="Profit,loss,revenue,adviser" />
	<meta name="author" content="Inubaan Software" />
        <!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lily+Script+One|Raleway:400,300,500,600,200,700' rel='stylesheet' type='text/css'>
<!--webfont-->

	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url();?>layout/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>layout/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-12 col-sm-5 	col-md-5 col-lg-5">
					<div id="gtco-logo"><a href="#">COMPANY logo</a></div>
				</div>
				<div class=" col-sm-7	col-md-7 	col-lg-7 text-right menu-1">
					<ul>
						<li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="<?php echo base_url();?>index.php/login">Sign In</a></li>
						<!--<li><a href="<?php echo base_url();?>index.php/feedback">Feedback</a></li>--> 
					</ul>
				</div>
				
			</div>
			
		</div>
	</nav>
	<div class="gtco-section">
		<div class="gtco-container">
		
            
            
            
            <!--header start here-->
					<div class="priceing-table w3l">
						<div class="wrap">
								<h1>Our Pricing Tables</h1>
							<div class="priceing-table-main">
								
								<div class="price-grid">
									<form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
										<div class="price-block agile">
											<div class="price-gd-top pric-basic">
												<h4>Basic</h4>
												<h3>$29.97</h3>
												<h5>per month</h5>
											</div>
											<div class="price-gd-bottom">
												<div class="price-list">
													<ul>
														<li>1 Store</li>
														<li>1 FB Ads Account</li>
														<li>
															<select name="package" class="mypro1">
																<option  value="plan1A,29.97" class="active">1 Month - $29.97</option>
																<option  value="plan1B,497">1 Year - $497  </option>
															</select>
													</ul>
												</div>
											</div>
											<div class="price-selet pric-pric-basicsclr2">
												<button type="submit" class="popup-with-zoom-anim" >Choose Plan</button> 
											</div>
										</div>
										 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
										 <!-- <input type="hidden" name="verificationcode" value="<?php echo $verificationcode; ?>"/>-->
										</form>
									</div>
						
								
								
								<div class="price-grid ">
							<form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
		
		                                  <div class=" actv">
											<div class="price-gd-top pric-Professional">
												<h4>Professional</h4>
												<h3>$49.97</h3>
												<h5>per month</h5>
											</div>
											<div class="price-gd-bottom">
												<div class="price-list">
													<ul>
														<li>3 Store</li>
														<li>3 FB Ads Account</li>
														<li>
														
														<select name="package" class="mypro1">
															<option value="plan2A,49.97" class="active">1 Month - $49.97</option>
															<option value="plan2B,697" >1 Year - $697  </option>
														</select>
														
														</li>
													</ul>
												</div>
											</div>
											<div class="price-selet pric-Professionalsclr">		    			   
												  <button type="submit" class="popup-with-zoom-anim" >Choose Plan</button>
											</div>
										</div>
										 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
										<!-- <input type="hidden" name="verificationcode" value="<?php echo $verificationcode; ?>"/>-->
										</form>
									</div>
								

								
								
									<div class="price-grid ">
										<form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
										<div class="price-block">
											<div class="price-gd-top pric-Business">
												<h4>Business</h4>
												<h3>$69.97</h3>
												<h5>per month</h5>
											</div>
											<div class="price-gd-bottom">
												<div class="price-list">
													<ul>
														<li>5 Store</li>
														<li>5 FB Ads Account</li>
														<li>
														
														<select name="package"  class="mypro1">
															<option value="plan3A,69.97" class="active">1 Month - $69.97</option>
															<option value="plan3B,897" >1 Year - $897   </option>
														</select>
														
														</li>
													</ul>
												</div>
											</div>
											<div class="price-selet pric-Businesssclr">
												<button type="submit" class="popup-with-zoom-anim">Choose Plan</button>
											</div>
										</div>
										 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
										  <!-- <input type="hidden" name="verificationcode" value="<?php echo $verificationcode; ?>"/>-->
										</form>
								   </div>
								<div class="price-grid">
									  <form action="http://profitandloss.io/index.php/Affiliate/index" method="POST" id="payment-form">
									  <div class="price-block">
											<div class="price-gd-top pric-Enterprise">
												<h4>Affiliate User</h4>
												<h3>Free</h3>
												<h5>business plan</h5>
											</div>
											<div class="price-gd-bottom">
												<div class="price-list">
													<ul>
														<li>5 Store</li>
														<li>5 FB Ads Account</li>
														<li>
														
														<!--<select class="  mypro1">
															<option class="active">1 Month - $ 39.97</option>
															<option>1 Year - $ 497  </option>
														</select>
														-->
														</li>
													</ul>
												</div>
											</div>
											<div class="price-selet pric-Enterprisesclr">		    			   
												  <button type="submit" class="popup-with-zoom-anim">sign in</button>
												  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
											</div>
										</div>
										</form>
									</div>
							  <!--<div class="price-grid">
									   <div class="price-block">
											<div class="price-gd-top pric-Enterprise">
												<h4>Enterprise</h4>
												<h3>$39.97</h3>
												<h5>per month</h5>
											</div>
											<div class="price-gd-bottom">
												<div class="price-list">
													<ul>
														<li>3 Store</li>
														<li>3 FB Ads Account</li>
														<li>
														
														<select class="  mypro1">
															<option class="active">1 Month - $ 39.97</option>
															<option>1 Year - $ 497  </option>
														</select>
														
														</li>
													</ul>
												</div>
											</div>
											<div class="price-selet pric-Enterprisesclr">		    			   
												  <a class="popup-with-zoom-anim" href="#small-dialog">Contact Us</a>
											</div>
										</div>
									</div>-->
								
								<div class="clear"> </div>
							</div>
						</div>
					</div>
					<!--header end here-->
								
				</div>
	</div>
  

	 
     <footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-4 gtco-widget">
					<h3>Inubaan PNL</h3>
					<p>some text goes here some text goes here some text goes here some text goes here some text goes here some text goes here</p>
					<p><a href="#">Learn More</a></p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact US</a></li>
                        <li><a href="#"> Customer Service</a></li>
				
						
					</ul>
				</div>


				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="#">FAQ</a></li>
                        <li><a href="#">Meetups</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">How it Works</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
						
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="#">Aaaa</a></li>
						<li><a href="#">Bbbbbb</a></li>
						<li><a href="#">Ccccccccc</a></li>
						<li><a href="#">Notifications</a></li>
						<li><a href="#">Login/Sign up</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">Copyright © 2017- All Rights Reserved.</small> 
						<small class="block">Powered by <a href="#" >INUBAAN SOFTWARE.</a></small>
					</p>
					<span class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</span>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo base_url();?>layout/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url();?>layout/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url();?>layout/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url();?>layout/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="<?php echo base_url();?>layout/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="<?php echo base_url();?><?php echo base_url();?>layout/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo base_url();?>layout/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url();?>layout/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="<?php echo base_url();?>layout/js/main.js"></script>

	</body>
</html>

