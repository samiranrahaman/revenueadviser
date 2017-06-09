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
	 $user_id; 
	 $str_customer_id;
	 $str_sub_id;
	//exit;
				  
				 	try {
                  
						   //done
						   
						  /*  $customer = Stripe_Customer::retrieve($str_customer_id);
							$customer -> description = "Plan Change";
							$customer -> updateSubscription(array('plan' => 'plan1A'));
							$customer -> save();   
							*/
							 $customer = Stripe_Customer::retrieve($str_customer_id);	
                             $customer->subscriptions->retrieve($str_sub_id)->cancel(); 
							 
							//$result="success";
							
							 $sql = "select * from rev_user where user_interanal_id=".$user_id;
					$result=$conn->query($sql);
					if ($result->num_rows > 0) 
					{
				     $user=$result->fetch_assoc();
		             $email=$user['user_email_id'];
					 $to = "samiran1109@gmail.com,".$email;
						$subject = "Inubaan Software Product - Subscription Cancle Mail ";
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
							<p>Your Subscription canceled successfully.Your account is Now Inactive.</p>
							<p><a href="http://profitandloss.io/index.php/subscription/index/'.$user_id.'/active">Please click on this link to Active your Login.</a></p>
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
					}
				
                $sql1="update `rev_user` set user_status=0 where `user_interanal_id`='$user_id'"; 
		
		        $conn->query($sql1);
				//header('Location: http://profitandloss.io/Login');
							
							
							
					  echo  1;
					  
					  
					

				} catch(Stripe_CardError $e) {			

				$error = $e->getMessage();
					//$result = "declined";
					echo  0;

				} 
				
				// echo "<BR>Stripe Payment Status : ".$result;
				
				/* echo "<BR>Stripe Response : ";
				echo $customer->subscriptions['data'][0]->id;
				 echo "<pre>";print_r($customer); */  
				/*echo "<pre>";print_r($charge); */
					
	
	}
	else
	{
		//$result= "User not Exist!";
		echo 0;
	}
	
 

?>

