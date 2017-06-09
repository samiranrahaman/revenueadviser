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
<!DOCTYPE html>
<html>
<head>
 <title>PNL | Stripe</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<meta name="keywords" content="PNL" />

    
<!-- font files -->

<!-- /font files -->
    
    
<!-- css files -->
<link href="<?php echo base_url();?>css/style_l.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body class="hold-transition login-page" ng-app="myApp" ng-controller="formCtrl">
<div class="form-w3ls">
        <center> <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logogg.png" height="80px;"></a> </center>
    <ul class="tab-group cl-effect-4">
      <li class="tab active "><a href="<?php echo base_url();?>index.php/login">Payment Info</a></li>        
    </ul>
    <div class="tab-content1 signin-agile">
       <br>
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

		 
		  <div class="form-row">
			<label>
			  <span>Secret Code</span>
			  <input type="text" size="4" name="discount" required style="margin: 10px 0 10px 0;">
			</label>
		  </div>
		  
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
  </div>
    </div>
	
	</div> <!-- /form -->	  
<p class="copyright">Copyright © 2017- All rights reserved -Powered by INUBAAN SOFTWARE.</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- TO DO : Place below JS code in js file and include that JS file -->

</body>
</html>
