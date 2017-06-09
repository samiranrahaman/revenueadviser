<?php
$conn = mysqli_connect("localhost","root","Jafar786#","revenue");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 
?> 
<?php

if(isset($_POST['affiliate_submit']))
{
	$user_id=$_POST['user_id'];
	$sql = "select * from rev_user where user_interanal_id=".$_POST['user_id'];
	$result=$conn->query($sql);
	if ($result->num_rows > 0) 
	{
		 $user=$result->fetch_assoc();
		 $email=$user['user_email_id'];
	if(isset($_POST['discount']) && strlen(trim($_POST['discount'])) > 0)
			 {
				 
				 if($_POST['discount']=='pilottester10')
				 {
					 $result = "success";
				 }
				 else
				 {
					 $result = "The coupon code you entered is invalid.";
				 }
	
	         }
			 else
			 {
				 $result = "The coupon code you entered is invalid.";
			 }
	
	
	
	
	
       if($result=='success')
	   {
		                $to = "samiran1109@gmail.com,".$email;
						$subject = "Inubaan Software Product - Payment Successful Mail ";
		   $message ='<table width="480" cellspacing="0" cellpadding="0" border="0">
							<tbody><tr>
							<td valign="top" align="center">
							<table style="border-bottom:1px solid #eee;padding:0 16px" width="480" height="50" cellspacing="0" cellpadding="24" border="0">
							<tbody><tr>
							<td style="background-color:#ffffff" valign="top">
							<h1><span style="color:#f0b41c">Inubaan</span><span style="color:#002745">Software</span><sup><small style="color:#f0b41c;">™</small></sup>
							</span></a></h1>
							</td>
							<td style="text-align:right">
							</td>
							</tr>
							</tbody></table>
							</td>
							</tr>
							<tr>
							<td valign="top" align="center">
							<table style="padding:0 16px 10px" width="480" cellspacing="0" cellpadding="24" border="0">
							<tbody><tr>
							<td style="background-color:#ffffff" valign="top">
							<font style="font-size:16px;color:#444;">
							<p>Hi <a style="color:black;text-decoration:none" rel="noreferrer">'.$email.'</a>,</p>
							<p>Thank you for your Payment.Your account is Active. Please login through below link.</p>
							<p><a href="http://profitandloss.io/index.php/login">Please click on this link to Login.</a></p>
							<br>

							<p>Kind regards,<br>Inubaan Software Team</p>
							</font>
							</td>
							</tr>
							</tbody></table>
							</td>
							</tr>
							</tbody></table>';

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: Inubaan Software<register@profitandloss.io>' . "\r\n";
						//$headers .= 'Cc: myboss@example.com' . "\r\n";

						mail($to,$subject,$message,$headers);
						
						
        /* $sql1="update `rev_user` set mail_verfication_code='', user_status=1 where `user_interanal_id`='$user_id' and and `mail_verfication_code`='$verificationcode'"; */
		        $sql1="update `rev_user` set mail_verfication_code='', user_status=1,affiliate_account=1,subscription='affiliate' where `user_interanal_id`='$user_id'"; 
		
		        $conn->query($sql1);
				
				
				header('Location: http://profitandloss.io/index.php/paymentsuccess');
                exit;
	   }
	} 
	   else
	{
		$result= "User not Exist!";
	}
	
}
?>
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
						 <li ><a href="<?php echo base_url();?>subscription">Pricing</a></li>
						<li  class="active" ><a href="<?php echo base_url();?>contact">Contact</a></li>
						<li><a href="<?php echo base_url();?>index.php/login">Sign In</a></li>
						 <li><a href="<?php echo base_url();?>howitwork">How It's Work ?</a></li>  
						<!--<li><a href="<?php echo base_url();?>index.php/feedback">Feedback</a></li>--> 
					</ul>
				</div>
				
			</div>
			
		</div>
	</nav>

	
	<div class="landingbg">
            
        <div class="container-fluid nomarpad toppadd">
            
            
            <div class="whtdiv">
                <div class="col-md-4"> </div>
            <div class="col-md-4 form-group">
                <?php if(isset($result)){ ?>
			 <p style="background-color: red;padding: 8px 7px 7px 9px;">
			 <?php
			if($result=='success')
			{
				
			}
			else
			{
				echo $result;
			}
			?>
			</p>
			<?php } ?>
		
      <form action="" method="POST" id="payment-form">
                <input  class="form-control input-placeholderr " placeholder="Secert Code" type="text"  name="discount" required >
				 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
		 
		  <input type="submit" name="affiliate_submit" class="sign-in btn btn-primary" value="Submit Payment" style="padding: 10px;
background-color: rgba(0, 126,235, 0.7);
width: 100%;
border: none;
cursor: pointer;
color: #fff;
outline: none;
letter-spacing: 1px;
font-family: 'Raleway', sans-serif;
font-weight: 600;
font-size: 20px;
margin-top: 30px;
text-transform: uppercase;
transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
-moz-transition: all 0.5s ease-in-out;
-o-transition: all 0.5s ease-in-out;
">
		</form>
              </div>
           
            <div class="col-md-4"> </div>
            </div>
            
        
            
            
        </div>
     
            
         </div> 
	 
	
 </div>
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
	<script src="<?php echo base_url();?>layout/js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo base_url();?>layout/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url();?>layout/js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="<?php echo base_url();?>layout/js/main.js"></script>
	
	
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->

	</body>
</html>

	

