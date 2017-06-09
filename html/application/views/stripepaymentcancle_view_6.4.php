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
/* $params = array(
	"testmode"   => "off",
	"private_live_key" => "sk_live_10UmHHIJqlF0XEzUoTeQfAjr",
	"public_live_key"  => "pk_live_JxJrNlUO5kw7kFl4jEmbjgp1",
	"private_test_key" => "sk_test_TraugUWdAu5GTVV3Q57T5wIv",
	"public_test_key"  => "pk_test_KHhBdUd59kSju6gGR56n5Nxy"
); */

$params = array(
	"testmode"   => "on",
	"private_live_key" => "sk_live_10UmHHIJqlF0XEzUoTeQfAjr",
	"public_live_key"  => "pk_live_JxJrNlUO5kw7kFl4jEmbjgp1",
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

if(isset($user_id)&&isset($str_customer_id))
{
	echo $user_id; 
	echo $str_customer_id;
	//exit;
				  
				 	try {
                   //echo $amount1;
					/*  $customer = Stripe_Customer::create(array(
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
						   ); */
						   
						   
						   //done
						   
						  /*  $customer = Stripe_Customer::retrieve($str_customer_id);
							$customer -> description = "Plan Change";
							$customer -> updateSubscription(array('plan' => 'plan1A'));
							$customer -> save();   
							
							 /* $customer = Stripe_Customer::retrieve("cus_AlfLMpAyCj3c4i");	
                    $customer->subscriptions->retrieve("sub_AltthXJcFEYEVP")->cancel(); 
							 
							 */
							
							$customer = Stripe_Customer::retrieve($str_customer_id);
							
							
							
							$result="success";
					  
					  
					  
					

				} catch(Stripe_CardError $e) {			

				$error = $e->getMessage();
					$result = "declined";

				} 
				
				// echo "<BR>Stripe Payment Status : ".$result;
				
				echo "<BR>Stripe Response : ";
				echo $customer->subscriptions['data'][0]->id;
				 echo "<pre>";print_r($customer);  
				/*echo "<pre>";print_r($charge); */
				

	
	}
	else
	{
		$result= "User not Exist!";
	}
	
 

?>

