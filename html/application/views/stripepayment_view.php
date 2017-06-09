<?php
$conn = mysqli_connect("localhost","root","Jafar786#","revenue");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 /* $sql = "INSERT INTO rev_stripe_payment_history set user_id=1,str_id='sssss'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */ 

?> 
<?php
/**
 * Stripe - Payment Gateway integration example
 * ==============================================================================
 * 
 * @version v1.0: stripe_pay_demo.php 2016/09/29
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * You are free to use, distribute, and modify this software
 * ==============================================================================
 *
 */

// Stripe library
require './stripe/stripe/Stripe.php';

/* $params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
	"public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
	"private_test_key" => "sk_test_xxxxxxxxxxxxxxxxxxxxx",
	"public_test_key"  => "pk_test_xxxxxxxxxxxxxxxxxxxxx"
); */
 $params = array(
	"testmode"   => "off",
	"private_live_key" => "sk_live_10UmHHIJqlF0XEzUoTeQfAjr",
	"public_live_key"  => "pk_live_JxJrNlUO5kw7kFl4jEmbjgp1",
	"private_test_key" => "sk_test_TraugUWdAu5GTVV3Q57T5wIv",
	"public_test_key"  => "pk_test_KHhBdUd59kSju6gGR56n5Nxy"
); 

/* $params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_10UmHHIJqlF0XEzUoTeQfAjr",
	"public_live_key"  => "pk_live_JxJrNlUO5kw7kFl4jEmbjgp1",
	"private_test_key" => "sk_test_TraugUWdAu5GTVV3Q57T5wIv",
	"public_test_key"  => "pk_test_KHhBdUd59kSju6gGR56n5Nxy"
); */
if ($params['testmode'] == "on") {
	Stripe::setApiKey($params['private_test_key']);
	$pubkey = $params['public_test_key'];
} else {
	Stripe::setApiKey($params['private_live_key']);
	$pubkey = $params['public_live_key'];
}
if(isset($_POST['stripeToken']))
{
	//print_r($_POST);exit;
	
	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$email_checkout=$_POST['email'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$address=$_POST['address'];
	
	$user_info = array("Name" => $name, "Phone" => $phno, "Email" => $email_checkout, "City" => $city, "Country" => $country,"Address" => $address);
	
	
	
	
	
	$user_id=$_POST['user_id'];
	$amount=$_POST['amount'];
	/* $package=$_POST['package'];
	$data=explode(",",$package);
	$plan_id=$data[0];
	$amount=$data[1]; */
	 $sql = "select * from rev_user where user_interanal_id=".$_POST['user_id'];
	$result=$conn->query($sql);
	if ($result->num_rows > 0) 
	{
		 $user=$result->fetch_assoc();
		 $email=$user['user_email_id'];
		 $token = $_POST['stripeToken'];
	
	   $plan_id = strip_tags(trim($_POST['plan_id']));	
       $invoiceid = "14526321";                      // Invoice ID
	   $description = "Invoice #" . $invoiceid . " - " . $invoiceid; 
	
	//$_POST['email']='samiran1109@gmail.com';
	//echo $amount = base64_decode($_POST['amount']) * 100;
	 $amount1 = $amount*100;
	$using_discount=false; 
	//$amount_cents = str_replace(".","","20.52");  // Chargeble amount
	
	// check for a discount code and make sure it is valid if present
		 
		 
		    if(isset($_POST['discount']) && strlen(trim($_POST['discount'])) > 0)
			 {
				 
				 if($plan_id=='plan1B' and $_POST['discount']=='showmethemoney1')
				 {
								 $using_discount = true;
								 try {
			 
							$coupon = Stripe_Coupon::retrieve( trim( $_POST['discount'] ) );
							
							 if($using_discount !== false)
								 {				
										// calculate the discounted price
										//$amount = $amount - ( $amount * ( $coupon->percent_off / 100 ) );
										$amount1 = $amount1 - $coupon->amount_off;
								 }
								try {

									 $customer = Stripe_Customer::create(array(
													'source' => $_POST['stripeToken'],
													'plan' => $plan_id,
													'email' => strip_tags(trim($email)),
													//'account_balance' => $amount1,
													'coupon' => trim($_POST['discount']),
													'description' => "Recurring Stripe Payment",
													'metadata' => $user_info
												)
											);	
									$charge = Stripe_Charge::create(array(
						  'customer'    => $customer->id,				
						  "amount" => 100,
						  "currency" => "usd",
						  //"source" => $_POST['stripeToken'],
						  "description" => "Charge with one time setup fee")			  
						   );
								   $str_id=$customer->id;
								   $account_balance= $customer-> account_balance;
									$created=$customer->created;
								   $currency= $customer->currency;
									$description= $customer->description;
									$discount= $customer->discount;
									$email=$customer->email;
									$reg_discount=$coupon->amount_off;
									$str_sub_id=$customer->subscriptions['data'][0]->id;
									 $sql2= "INSERT INTO rev_stripe_payment_history set 
										user_id=$user_id,
										 str_id='".$str_id."',
										 account_balance='".$account_balance."' ,
										 created='".$created."' ,
										 currency='".$currency."' ,
										 description='".$description."' ,
										 subscription='$plan_id',
										 discount='300',
										 str_sub_id='".$str_sub_id."',
										 reg_discount='".$reg_discount."'";
									$conn->query($sql2);
									
									$result = "success";

								} catch(Stripe_CardError $e) {			

								$error = $e->getMessage();
									$result = "declined";

								} catch (Stripe_InvalidRequestError $e) {
									$result = "declined";		  
								} catch (Stripe_AuthenticationError $e) {
									$result = "declined";
								} catch (Stripe_ApiConnectionError $e) {
									$result = "declined";
								} catch (Stripe_Error $e) {
									$result = "declined";
								} catch (Exception $e) {

									if ($e->getMessage() == "zip_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "address_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "cvc_check_invalid") {
										$result = "declined";
									} else {
										$result = "declined";
									}		  
								}
								
								
								//echo "<BR>Stripe Payment Status with coupon: ".$result;
								
								//echo "<BR>Stripe Response with coupon : ";
								//echo "<pre>";print_r($customer); 
								//echo "<pre>";print_r($charge);
			 
						} catch (Exception $e) {
			 
							$result= "The coupon code you entered is invalid. Please click back and enter a valid code, or leave it blank for no discount.";
			 
						}
					 
				 }
              
			    else if($plan_id=='plan2B' and $_POST['discount']=='showmethemoney2')
				 {
					 $using_discount = true;
					 $using_discount = true;
								 try {
			 
							$coupon = Stripe_Coupon::retrieve( trim( $_POST['discount'] ) );
							
							 if($using_discount !== false)
								 {				
										// calculate the discounted price
										//$amount = $amount - ( $amount * ( $coupon->percent_off / 100 ) );
										$amount = $amount - $coupon->amount_off;
								 }
								try {

									 $customer = Stripe_Customer::create(array(
													'source' => $_POST['stripeToken'],
													'plan' => $plan_id,
													'email' => strip_tags(trim($email)),
													//'account_balance' => $amount1,
													'coupon' => trim($_POST['discount']),
													'description' => "Recurring Stripe Payment",
													'metadata' => $user_info
												)
											);	
									$charge = Stripe_Charge::create(array(
						  'customer'    => $customer->id,				
						  "amount" => 100,
						  "currency" => "usd",
						  //"source" => $_POST['stripeToken'],
						  "description" => "Charge with one time setup fee")			  
						   );
								   $str_id=$customer->id;
								   $account_balance= $customer-> account_balance;
									$created=$customer->created;
								   $currency= $customer->currency;
									$description= $customer->description;
									$discount= $customer->discount;
									$email=$customer->email;
									$reg_discount=$coupon->amount_off;
									$str_sub_id=$customer->subscriptions['data'][0]->id;
									 $sql2= "INSERT INTO rev_stripe_payment_history set 
										user_id=$user_id,
										 str_id='".$str_id."',
										 account_balance='".$account_balance."' ,
										 created='".$created."' ,
										 currency='".$currency."' ,
										 description='".$description."' ,
										 subscription='$plan_id',
										 discount='300',
										 str_sub_id='".$str_sub_id."',
										 reg_discount='".$reg_discount."'";
									$conn->query($sql2);
									
									$result = "success";

								} catch(Stripe_CardError $e) {			

								$error = $e->getMessage();
									$result = "declined";

								} catch (Stripe_InvalidRequestError $e) {
									$result = "declined";		  
								} catch (Stripe_AuthenticationError $e) {
									$result = "declined";
								} catch (Stripe_ApiConnectionError $e) {
									$result = "declined";
								} catch (Stripe_Error $e) {
									$result = "declined";
								} catch (Exception $e) {

									if ($e->getMessage() == "zip_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "address_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "cvc_check_invalid") {
										$result = "declined";
									} else {
										$result = "declined";
									}		  
								}
								
								
								//echo "<BR>Stripe Payment Status with coupon: ".$result;
								
								//echo "<BR>Stripe Response with coupon : ";
								//echo "<pre>";print_r($customer); 
								//echo "<pre>";print_r($charge);
			 
						} catch (Exception $e) {
			 
							$result= "The coupon code you entered is invalid. Please click back and enter a valid code, or leave it blank for no discount.";
			 
						}
				 }
				 
				else  if($plan_id=='plan3B' and $_POST['discount']=='showmethemoney3')
				 {
					 $using_discount = true;
					 $using_discount = true;
								 try {
			 
							$coupon = Stripe_Coupon::retrieve( trim( $_POST['discount'] ) );
							
							 if($using_discount !== false)
								 {				
										// calculate the discounted price
										//$amount = $amount - ( $amount * ( $coupon->percent_off / 100 ) );
										$amount = $amount - $coupon->amount_off;
								 }
								try {

									 $customer = Stripe_Customer::create(array(
													'source' => $_POST['stripeToken'],
													'plan' => $plan_id,
													'email' => strip_tags(trim($email)),
													//'account_balance' => $amount1,
													'coupon' => trim($_POST['discount']),
													'description' => "Recurring Stripe Payment",
													'metadata' => $user_info
												)
											);	
									$charge = Stripe_Charge::create(array(
						  'customer'    => $customer->id,				
						  "amount" => 100,
						  "currency" => "usd",
						  //"source" => $_POST['stripeToken'],
						  "description" => "Charge with one time setup fee")			  
						   );
								   $str_id=$customer->id;
								   $account_balance= $customer-> account_balance;
									$created=$customer->created;
								   $currency= $customer->currency;
									$description= $customer->description;
									$discount= $customer->discount;
									$email=$customer->email;
									$reg_discount=$coupon->amount_off;
									$str_sub_id=$customer->subscriptions['data'][0]->id;
									 $sql2= "INSERT INTO rev_stripe_payment_history set 
										user_id=$user_id,
										 str_id='".$str_id."',
										 account_balance='".$account_balance."' ,
										 created='".$created."' ,
										 currency='".$currency."' ,
										 description='".$description."' ,
										 subscription='$plan_id',
										 discount='300',
										 str_sub_id='".$str_sub_id."',
										 reg_discount='".$reg_discount."'";
									$conn->query($sql2);
									
									$result = "success";

								} catch(Stripe_CardError $e) {			

								$error = $e->getMessage();
									$result = "declined";

								} catch (Stripe_InvalidRequestError $e) {
									$result = "declined";		  
								} catch (Stripe_AuthenticationError $e) {
									$result = "declined";
								} catch (Stripe_ApiConnectionError $e) {
									$result = "declined";
								} catch (Stripe_Error $e) {
									$result = "declined";
								} catch (Exception $e) {

									if ($e->getMessage() == "zip_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "address_check_invalid") {
										$result = "declined";
									} else if ($e->getMessage() == "cvc_check_invalid") {
										$result = "declined";
									} else {
										$result = "declined";
									}		  
								}
								
								
								//echo "<BR>Stripe Payment Status with coupon: ".$result;
								
								//echo "<BR>Stripe Response with coupon : ";
								//echo "<pre>";print_r($customer); 
								//echo "<pre>";print_r($charge);
			 
						} catch (Exception $e) {
			 
							$result= "The coupon code you entered is invalid. Please click back and enter a valid code, or leave it blank for no discount.";
			 
						}
				 }
				 else
				 {
					 $result= "The coupon code you entered is invalid.Not Matched with subscription Plan ";
				 }
			
           
		   
 
		  }
		  else
			  
			  {
				  
				 	try {
                   //echo $amount1;
					 $customer = Stripe_Customer::create(array(
									'source' => $_POST['stripeToken'],
									'plan' => $plan_id,
									'email' => strip_tags(trim($email)),
									//'account_balance' => $amount1,
									'description' => "Recurring Stripe Payment",
									 'metadata' => $user_info
								)
							);

					$charge = Stripe_Charge::create(array(
						  'customer'    => $customer->id,				
						  "amount" => 100,
						  "currency" => "usd",
						  //"source" => $_POST['stripeToken'],
						  "description" => "Charge with one time setup fee")			  
						   );
			   
						
				   $str_id=$customer->id;
					   $account_balance= $customer-> account_balance;
						$created=$customer->created;
					   $currency= $customer->currency;
						$description= $customer->description;
						$discount= $customer->discount;
						$email=$customer->email;
						$str_sub_id=$customer->subscriptions['data'][0]->id;
						 $sql2 = "INSERT INTO rev_stripe_payment_history set user_id=$user_id,str_id='$str_id',
						     account_balance='$account_balance' ,
							 created='$created' , 
							 currency='$currency' ,
							 description='$description' ,
							 discount='',
							 subscription='$plan_id',
							 str_sub_id='".$str_sub_id."',
							 reg_discount=0";
						$conn->query($sql2);
						
					$result = "success";

				} catch(Stripe_CardError $e) {			

				$error = $e->getMessage();
					$result = "declined";

				} catch (Stripe_InvalidRequestError $e) {
					$result = "declined";		  
				} catch (Stripe_AuthenticationError $e) {
					$result = "declined";
				} catch (Stripe_ApiConnectionError $e) {
					$result = "declined";
				} catch (Stripe_Error $e) {
					$result = "declined";
				} catch (Exception $e) {

					if ($e->getMessage() == "zip_check_invalid") {
						$result = "declined";
					} else if ($e->getMessage() == "address_check_invalid") {
						$result = "declined";
					} else if ($e->getMessage() == "cvc_check_invalid") {
						$result = "declined";
					} else {
						$result = "declined";
					}		  
				}
				
				/* echo "<BR>Stripe Payment Status : ".$result;
				
				echo "<BR>Stripe Response : ";*/
				/* echo "<pre>";print_r($customer);  
				echo "<pre>";print_r($charge); */
				  
				  
				  
			  }
		 
		 
		 
	

	
	}
	else
	{
		$result= "User not Exist!";
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
		 $sql1="update `rev_user` set mail_verfication_code='', user_status=1 ,subscription='$plan_id' where `user_interanal_id`='$user_id'"; 
		
		        $conn->query($sql1);
				header('Location: http://profitandloss.io/index.php/paymentsuccess');
               // exit;
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

	
	<div class="container toppadd">
         <span class="chkouttitle"><i>Check Out </i></span>  
          <hr>
           <span class="billingintx"> Billing Info </span>
        <?php if(isset($result))
		{
			?>
			 <p style="background-color: red;padding: 8px 7px 7px 9px;">
			 <?php
			if($result=='success')
			{
				
			}
			else
			{
				echo $result;
			}
			
		}?>
		</p>
		<?php
		?>
		
        <!--  <form action="http://profitandloss.io/index.php/stripepayment/stripe_data" method="POST" id="payment-form">-->
		<form action="" method="POST" id="payment-form">
		  <span class="payment-errors"></span>
		</br>  
       <div class="row ">
            <div class="col-md-4">
                <label class='control-label'>Name</label>
                <input autocomplete='off' class='form-control' type='text' name="name" required  >
            </div>
            <div class="col-md-4">
                <label class='control-label'>Phone No.</label>
                <input autocomplete='off' class='form-control' type="number" name="phno" required >    
            </div>
             <div class="col-md-4">
                <label class='control-label'>Email</label>
                <input autocomplete='off' class='form-control' type="email" name="email" required >  
            </div>
  
      </div>
            
          <div class="row">
            <div class="col-md-4">
                <label class='control-label'>City</label>
                <input autocomplete='off' class='form-control' type='text' name="city" required>
            </div>
            <div class="col-md-4">
                <label class='control-label'>Country</label>
                <input autocomplete='off' class='form-control' type="tel"  name="country" required >    
            </div>
              
              
              
             <div class="col-md-4"></div>
  
      </div>
            
           <div class="row">
            <div class="col-md-8">
                <label class='control-label'>Address</label>
                <input autocomplete='off' class='form-control' type='text' name="address" required>
            </div>
            <div class="col-md-4">
                  
            </div>
           </div>
        <hr>
            
          <span class="billingintx"> Chose your payment method  </span>
           <div class="clearfix"></div>
            
            <div class=" vissab row">
            
                <div class="col-md-8">
                    
                    <div class="radio">
                        <label class="vistxt">
                            <input type="radio" checked ><b>Stripe</b>
                        </label>
                    </div>
                    
                    
                Stripe is the faster, safer way to send money, make an online payment, receive money. Account not needed.
                
                
                
                </div>
                
                <div class="col-md-4">
                    <center>
                <img src="<?php echo base_url();?>layout/images/visaa.png">
                        </center>
                </div>
            
            
            
            </div>
            
            
            <div class='row'>
        <div class='col-md-3'></div>
        <div class='col-md-6'>
          
          
              
             
              <!--
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>SECERT CODE</label>
                <input class='form-control'   type='text'>
              </div>
            </div>
              -->
               <?php if($plan_id=='plan1B' || $plan_id=='plan2B' || $plan_id=='plan3B')
				  {
					  ?>
					  <div class='form-row'>
					  <div class='col-xs-12 form-group required'>
						<label class='control-label'>SECRET CODE</label>
						<input class='form-control'   type='text' name="discount">
					  </div>
					</div>
				
				  <?php
					}
				  ?>
              <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>CARD NUMBER</label>
                <input  class='form-control ' placeholder='ex. 1213 1458 2536 8788' type='text' data-stripe="number">
              </div>
            </div> 
              
              
           
              
            <div class='form-row'>
              <div class='col-xs-4 form-group  required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' data-stripe="cvc">
              </div>
                
                
                
              <div class='col-xs-4 form-grouprequired'>
                <label class='control-label'>Expiration</label>
                <input class='form-control' placeholder='MM' size='2' type='text' data-stripe="exp_month">
              </div>
              <div class='col-xs-4 form-group required'>
                <label class='control-label'></label>
                <input class='form-control ' placeholder='YYYY' size='4' type='text' data-stripe="exp_year">
              </div>
            </div>
            
              <!--<div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>NAME ON CARD</label>
                <input  class='form-control ' type='text'>
              </div>
            </div> -->
               
              
              
        
         
        </div>
        <div class='col-md-3'></div>
    </div>
    <hr>
          
          <span class="billingintx"> Order Summary</span>
          <div class="clearfix"></div>
    
            
            
            <table >
                <tbody> 
<tr  >
  <td class="odrdtl">Price</td>
  <td class="odrdtr" >$<?php echo $amount;?></td>
</tr>
                
<tr >
  <td class="odrdtl">Secert Code Discount</td>
  <?php if($plan_id=='plan1B' || $plan_id=='plan2B' || $plan_id=='plan3B'){ ?>
			  
					  <td class="odrdtr">$300</td>
	<?php } else { ?>
	<td class="odrdtr">$0</td>
	   <?php }?>
</tr>
                
<tr >
  <td class="odrdtl">Estimated Tax</td>
  <td class="odrdtr">$0</td>
</tr>
      
                
<tr >
  <td class="odrdtl billingintx"> Order Total : </td>
   <?php if($plan_id=='plan1B' || $plan_id=='plan2B' || $plan_id=='plan3B'){ ?>
			  
					  <td class="odrdtr billingintx">$<?php echo $amount - 300 ;?></td>
	<?php } else { ?>
	<td class="odrdtr billingintx">$<?php echo $amount;?></td>
	   <?php }?>
  
</tr>
<tr><td colspan="2" style="min-width: 60px;padding: 0 30px;color: red;">***You will be billed above amount after 7 Days!</td></tr>
</tbody>       
            
            </table>
            
            
           
              <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
   <input type="hidden" name="plan_id" value="<?php echo $plan_id; ?>"/>
    <input type="hidden" name="amount" value="<?php echo $amount; ?>"/>
	 <input type="hidden" name="package" value="<?php echo $package; ?>"/>
            
		<input type="submit"  value="CHECK OUT" class="ckoutbtn">
          </form>   
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
<script type="text/javascript">
	Stripe.setPublishableKey('<?php echo $params['public_test_key']; ?>');
  
	$(function() {
	  var $form = $('#payment-form');
	  $form.submit(function(event) {
		// Disable the submit button to prevent repeated clicks:
		$form.find('.submit').prop('disabled', true);
	
		// Request a token from Stripe:
		Stripe.card.createToken($form, stripeResponseHandler);
	
		// Prevent the form from being submitted:
		return false;
	  });
	});

	function stripeResponseHandler(status, response) {
	  // Grab the form:
	  var $form = $('#payment-form');
	
	  if (response.error) { // Problem!
	
		// Show the errors on the form:
		$form.find('.payment-errors').text(response.error.message);
		$form.find('.submit').prop('disabled', false); // Re-enable submission
	
	  } else { // Token was created!
	
		// Get the token ID:
		var token = response.id;

		// Insert the token ID into the form so it gets submitted to the server:
		$form.append($('<input type="hidden" name="stripeToken">').val(token));
	
		// Submit the form:
		$form.get(0).submit();
	  }
	};
</script>
	</body>
</html>
