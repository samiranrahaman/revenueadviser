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

	

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url();?>layout/css/style.css">

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<!--<div class="col-xs-12 col-sm-5 	col-md-5 col-lg-5">
					<div id="gtco-logo"><a href="#">COMPANY logo</a></div>
				</div>-->
				<div class="col-xs-12 col-sm-2 	col-md-2 col-lg-2">
					<div id="gtco-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logogg.png" height="50px;" ></a></div>
				</div>
				<div class=" col-sm-10	col-md-10	col-lg-10 text-right menu-1">
					<ul>
						<li><a href="<?php echo base_url();?>">Home</a></li>
                       <!-- <li><a href="#">Blog</a></li>-->
						<li><a href="<?php echo base_url();?>about">About</a></li>
						 <li class="active" ><a href="<?php echo base_url();?>subscription">Pricing</a></li>
						<li><a href="<?php echo base_url();?>contact">Contact</a></li>
						<li><a href="<?php echo base_url();?>index.php/login">Sign In</a></li>
						 <li ><a href="<?php echo base_url();?>howitwork">How It's Work ?</a></li>  
						<!--<li><a href="<?php echo base_url();?>index.php/feedback">Feedback</a></li>--> 
					</ul>
				</div>
				
			</div>
			
		</div>
	</nav>
	 <div class="container-fluid toppadd">
            
            <div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading gtco-heading-sm">
					<h2>Our Pricing Table</h2>
				</div>
			</div>
            
            
            
      <div class="col-md-1"></div>
         
          <div class="col-md-2 no-pad topmar">
             <form action="http://profitandloss.io/index.php/Affiliate/index" method="POST" id="payment-form">
			 <img class="top1" src="<?php echo base_url();?>images/1.png">
              <div  class="allbox box1" >
               
                <span class="rate1">
                <sup>$</sup> free
                </span>
                  
                <div class="frmtext1">
                Affiliate Accoun
                </div> 
                  <div class="txtlft">
                  <img src="<?php echo base_url();?>images/AM1.png" class="cstmbullet">  5 Store <br><br>
                  
                  <img src="<?php echo base_url();?>images/AM1.png" class="cstmbullet"> 5 FB Ads Account  <br><br>
                  
                  <img src="<?php echo base_url();?>images/AM1.png" class="cstmbullet">Affiliate Commission<br><br>
                  
                   </div>
                  
                  <select class="mypro1">
                    <option class="active">Free</option>
                    </select>
                  
                 <!-- <a href="#">
                     <img class="btn1" src="images/B1.png"> </a>-->
					 <input class="btn1" type="image" src="<?php echo base_url();?>images/B1.png" alt="Submit">
					 <!--<button type="submit" class="popup-with-zoom-anim">sign in</button>-->
												  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
              </div>
 
             </form> 
          </div>
          
           <div class="col-md-2 no-pad topmar">
              <form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
			  <img class="top1" src="<?php echo base_url();?>images/2.png">
              <div  class="allbox box2" >
                 <span class="rate2">
                <sup>$</sup> 29.97
                </span>
                  
                <div class="frmtext2">
                Basic Account
                </div> 
                  <div class="txtlft">
                  <img src="<?php echo base_url();?>images/BM1.png" class="cstmbullet"> 1 Store <br><br>
                  
                  <img src="<?php echo base_url();?>images/BM1.png" class="cstmbullet"> 1 FB Ads Account<br><br>
                  
                  <img src="<?php echo base_url();?>images/BM1.png" class="cstmbullet"> Simulator<br><br>
                 </div>
                  <select name="package" class="mypro1">
					<option  value="plan1A,29.97" class="active">1 Month - $29.97</option>
					<option  value="plan1B,497">1 Year - $497  </option>
				  </select>
                   <input class="btn1" type="image" src="<?php echo base_url();?>images/B2.png" alt="Submit">
					 <!--<button type="submit" class="popup-with-zoom-anim">sign in</button>-->
				  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                 
               </div>
			   </form> 
          </div>   

		    <div class="col-md-2 no-pad topmar">
              <form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
			  <img class="top1" src="<?php echo base_url();?>images/3.png">
              <div  class="allbox box2" >
                
                <span class="rate2">
                <sup>$</sup> 49.97
                </span>
                  
                <div class="frmtext2">
                Professional Account
                </div> 
                   <div class="txtlft">
                  <img src="<?php echo base_url();?>images/cM1.png"class="cstmbullet"> 3 Store <br><br>
                  
                  <img src="<?php echo base_url();?>images/cM1.png" class="cstmbullet">  3 FB Ads Account <br><br>
                  
                  <img src="<?php echo base_url();?>images/cM1.png" class="cstmbullet">Simulator <br><br>
				  </div>
                  <select name="package" class="mypro1">
					<option  value="plan2A,49.97" class="active">1 Month - $49.97</option>
					<option  value="plan2B,697">1 Year - $697  </option>
				  </select>
                   <input class="btn1" type="image" src="<?php echo base_url();?>images/B3.png" alt="Submit">
					 <!--<button type="submit" class="popup-with-zoom-anim">sign in</button>-->
				  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                 
               </div>
			   </form> 
          </div> 
		  
		    <div class="col-md-2 no-pad topmar">
              <form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
			  <img class="top1" src="<?php echo base_url();?>images/4.png">
              <div  class="allbox box2" >
                
                <span class="rate2">
                <sup>$</sup> 69.97
                </span>
                  
                <div class="frmtext2">
                Business Account
                </div> 
                   <div class="txtlft">
                  <img src="<?php echo base_url();?>images/dM1.png" class="cstmbullet"> 5 Store <br><br>
                  
                  <img src="<?php echo base_url();?>images/dM1.png" class="cstmbullet"> 5 FB Ads Account <br><br>
                  
                  <img src="<?php echo base_url();?>images/dM1.png" class="cstmbullet"> Simulator <br><br>
                  
                 </div>
                  <select name="package" class="mypro1">
					<option  value="plan3A,69.97" class="active">1 Month - $69.97</option>
					<option  value="plan3B,897">1 Year - $897  </option>
				  </select>
                   <input class="btn1" type="image" src="<?php echo base_url();?>images/B4.png" alt="Submit">
					 <!--<button type="submit" class="popup-with-zoom-anim">sign in</button>-->
				  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                 
               </div>
			   </form> 
          </div>
		  
		  <div class="col-md-2 no-pad topmar">
              <img class="top1" src="<?php echo base_url();?>images/5.png">
              <div  class="allbox box5 " >
              
                <span class="rate5">
                <sup>Custom </sup> Price
                </span>
                  
                <div class="frmtext5">
               Enterprise Account
                </div> 
                  <div class="txtlft">
                  <img src="<?php echo base_url();?>images/EM1.png" class="cstmbullet">Unlimited Store <br><br>
                  
                  <img src="<?php echo base_url();?>images/EM1.png" class="cstmbullet">Unlimited FB Ads Account <br><br>
                  
                  <img src="<?php echo base_url();?>images/EM1.png" class="cstmbullet"> Simulator <br><br>
                  
                  
                  </div>
                  
           
                 
                  
                <a href="<?php echo base_url();?>contact">
               <img class="btn1" src="<?php echo base_url();?>images/B5.png">
                  </a>
               </div>
          </div>  
           <!--<div class="col-md-2 no-pad topmar">
              <img class="top1" src="images/3.png">
              <div  class="allbox box3" >
                  
                           <span class="toptext"> LOREM IPSUM DOLOR </span> 
                  <br>
                <span class="rate3">
                <sup>$</sup> 29.97
                </span>
                  
                <div class="frmtext3">
                Lorem ipsum dolor sit amet, consectetur
                </div> 
                  
                  <img src="images/cM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/cM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/cM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/cM2.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  
                  <span class="stor3">
                  1 Store<br>
                      1 FB Ads Account
                  
                  </span>
                  
                  <select class="mypro1">
                    <option class="active">1 Month - $29.97</option>
                      
                      <option>1 Year - $497</option>
                    </select>
                  
                  
                  
                  
                  
               
               <a href="#">
               <img class="btn1" src="images/B3.png">
                   </a>
               </div>
          </div>   

           <div class="col-md-2 no-pad topmar">
              <form action="http://profitandloss.io/index.php/stripepayment/index" method="POST" id="payment-form">
			  <img class="top1" src="images/4.png">
              <div  class="allbox box4" >
                <span class="toptext"> LOREM IPSUM DOLOR </span> 
                  <br>
                <span class="rate4">
                <sup>$</sup> 49.97
                </span>
                  
                <div class="frmtext4">
                Lorem ipsum dolor sit amet, consectetur
                </div> 
                  
                  <img src="images/dM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/dM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/dM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/dM2.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  
                  <span class="stor4">
                  1 Store<br>
                      1 FB Ads Account
                  
                  </span>
                  
                  <select class="mypro1">
                    <option class="active">1 Month - $29.97</option>
                      
                      <option>1 Year - $497</option>
                    </select>
                  
                <a href="#">
               <img class="btn1" src="images/B4.png">
                  </a>
               </div>
          </div>   
          
          <div class="col-md-2 no-pad topmar">
              <img class="top1" src="images/5.png">
              <div  class="allbox box5 " >
              
                                <span class="toptext"> LOREM IPSUM DOLOR </span> 
                  <br>
                <span class="rate5">
                <sup>$</sup> 29.97
                </span>
                  
                <div class="frmtext5">
                Lorem ipsum dolor sit amet, consectetur
                </div> 
                  
                  <img src="images/eM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/eM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/eM1.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  <img src="images/eM2.png" height="20px" width="20px"> Lorem ipsum dolor <br><br>
                  
                  
                  <span class="stor5">
                  3 Store<br>
                      3 FB Ads Account
                  
                  </span>
                  
                  <select class="mypro1">
                    <option class="active">1 Month - $49.97</option>
                      
                      <option>1 Year - $697</option>
                    </select>
                  
                <a href="#">
               <img class="btn1" src="images/B5.png">
                  </a>
                  
                  
                  
                  
                  
                  
                  
                  
                  
    
              </div>
          </div>   -->

    

          
          <div class="col-md-1"></div>
      
      
      </div>
	<div class="gtco-section">
		
	 <div id="gtco-started">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="text-uppercase">Members Area</h2>                    
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-12">
					<form class="form-inline">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="password" class="sr-only">Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<button type="submit" class="btn btn-default btn-block">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
			<p style="margin-left: 50%;margin-top: 10%;"><a href="<?php echo base_url();?>index.php/registration" class="btn btn-default">Apply Now </a></p>
	</div>
   <footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-4 gtco-widget">
					<h3>Inubaan PNL</h3>
					<p><img src="http://profitandloss.io/images/logogg.png" height="100px;"></p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="<?php echo base_url();?>">Home</a></li>
                        <li><a href="<?php echo base_url();?>">Blog</a></li>
						<li><a href="<?php echo base_url();?>about">About Us</a></li>
						<li><a href="<?php echo base_url();?>contact">Contact US</a></li>
                        <!--<li><a href="#"> Customer Service</a></li>-->
				
						
					</ul>
				</div>


				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="#">FAQ</a></li>
                        <!--<li><a href="#">Meetups</a></li>
						<li><a href="#">Newsletter</a></li>-->
						<li><a href="<?php echo base_url();?>howitwork">How it Works</a></li>
                        <li><a href="<?php echo base_url();?>termandcondition">Terms and Conditions</a></li>
						
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="gtco-footer-links">
						<li><a href="<?php echo base_url();?>">Inubaan Softwares</a></li>
						<!--<li><a href="#">Notifications</a></li>-->
						<li><a href="<?php echo base_url();?>/login">Login/Sign up</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">Copyright © 2017 ProfitAndLoss.io - All Rights Reserved.</small> 
						<small class="block">Powered by <a href="#" >INUBAAN SOFTWARE.</a></small>
					</p>
					<span class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<!--<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>-->
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

