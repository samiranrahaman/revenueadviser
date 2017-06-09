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
require 'stripe/Stripe.php';

/* $params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
	"public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
	"private_test_key" => "sk_test_xxxxxxxxxxxxxxxxxxxxx",
	"public_test_key"  => "pk_test_xxxxxxxxxxxxxxxxxxxxx"
); */
$params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_xxxxxxxxxxxxxxxxxxxxx",
	"public_live_key"  => "pk_live_xxxxxxxxxxxxxxxxxxxxx",
	"private_test_key" => "sk_test_TraugUWdAu5GTVV3Q57T5wIv",
	"public_test_key"  => "pk_test_KHhBdUd59kSju6gGR56n5Nxy"
);

if ($params['testmode'] == "on") {
	Stripe::setApiKey($params['private_test_key']);
	$pubkey = $params['public_test_key'];
} else {
	Stripe::setApiKey($params['private_live_key']);
	$pubkey = $params['public_live_key'];
}

if(isset($_POST['stripeToken']))
{
	
	
	echo $_POST['discount'];
	echo $_POST['plan_id'];
	//$_POST['discount']='plan1';
	$_POST['amount']=100;
	
	//$_POST['plan_id']='package2';
	$token = $_POST['stripeToken'];
	
	echo $plan_id = strip_tags(trim($_POST['plan_id']));	
    $invoiceid = "14526321";                      // Invoice ID
	$description = "Invoice #" . $invoiceid . " - " . $invoiceid;
	
	$_POST['email']='samiran1109@gmail.com';
	//echo $amount = base64_decode($_POST['amount']) * 100;
	echo $amount = $_POST['amount']*100;
	$using_discount=false;
	//$amount_cents = str_replace(".","","20.52");  // Chargeble amount
	
	// check for a discount code and make sure it is valid if present
		 if(isset($_POST['discount']) && strlen(trim($_POST['discount'])) > 0) {
 
			$using_discount = true;
 
			// we have a discount code, now check that it is valid			
 
			try {
 
				$coupon = Stripe_Coupon::retrieve( trim( $_POST['discount'] ) );
				// if we got here, the coupon is valid
 
			} catch (Exception $e) {
 
				echo "The coupon code you entered is invalid. Please click back and enter a valid code, or leave it blank for no discount.";
 
			}
 
		} 
	 if($using_discount !== false) {				
					// calculate the discounted price
					//$amount = $amount - ( $amount * ( $coupon->percent_off / 100 ) );
					$amount = $amount - $coupon->amount_off;
				} 
				echo $coupon->amount_off;
				echo $amount ;
	
	try {

		/*  $charge = Stripe_Charge::create(array(		 
			  "amount" => $amount,
			  "currency" => "usd",
			  "source" => $_POST['stripeToken'],
			  "description" => $description)			  
		);  */


		/* $customer = Stripe_Customer::create(array(
							'card' =>$_POST['stripeToken'],
							'plan' => 'plan1B',
							'email' => strip_tags(trim($_POST['email'])),
							//'email' => '',
							'coupon' => trim($_POST['discount'])
						)
					); */
				/*  $customer = Stripe_Customer::create(array(
							'card' => $_POST['stripeToken'],
							'plan' => $_POST['plan_id'],
							'email' => strip_tags(trim($_POST['email'])) 
						)
					); */ 

					/* $customer = \Stripe\Customer::create(array(
            'source'   => $token,
            'email'    => $billing_email,
            'plan'     => $stripePlan,
            'account_balance' => $setupFee,
            'description' => "Charge with one time setup fee"
            )); */
					
					 $customer = Stripe_Customer::create(array(
							'source' => $_POST['stripeToken'],
							'plan' => $_POST['plan_id'],
							'email' => strip_tags(trim($_POST['email'])),
							'account_balance' => $amount,
                            'description' => "Charge with one time setup fee"
						)
					);
					
               /*  $charge = Stripe_Charge::create(array(
              'customer'    => $customer->id,				
			  "amount" => $amount,
			  "currency" => "usd",
			  //"source" => $_POST['stripeToken'],
			  "description" => $description)			  
		       ); */
					
					
		/* if ($charge->card->address_zip_check == "fail") {
			throw new Exception("zip_check_invalid");
		} else if ($charge->card->address_line1_check == "fail") {
			throw new Exception("address_check_invalid");
		} else if ($charge->card->cvc_check == "fail") {
			throw new Exception("cvc_check_invalid");
		} */
		// Payment has succeeded, no exceptions were thrown or otherwise caught				

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
	
	echo "<BR>Stripe Payment Status : ".$result;
	
	echo "<BR>Stripe Response : ";
	echo "<pre>";print_r($customer); 
	//echo "<pre>";print_r($charge);
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Stripe Pay Custom Integration Demo</title>
</head>
<body>
<link href="style.css" type="text/css" rel="stylesheet" />
<h1 class="bt_title">Stripe Pay Demo</h1>
<div class="dropin-page">
  <form action="" method="POST" id="payment-form">
  <span class="payment-errors"></span>

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input type="text" size="20" data-stripe="number">
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YY)</span>
      <input type="text" size="2" data-stripe="exp_month">
    </label>
    <span> / </span>
    <input type="text" size="2" data-stripe="exp_year">
  </div>

  <div class="form-row">
    <label>
      <span>CVC</span>
      <input type="text" size="4" data-stripe="cvc">
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Plan</span>
	 <select class="form-control1" id="subject" name="plan_id" >
	 <option value="?" selected="selected"></option>
	 <option label="Login Page" value="pack1">package1</option>
	 <option label="Login Page" value="package2">package2</option>
	 </select>
    </label>
  </div>
  <div class="form-row">
    <label>
      <span>Coupon code</span>
      <input type="text" size="4" name="discount">
    </label>
  </div>
  <input type="submit" class="submit" value="Submit Payment">
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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