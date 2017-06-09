<?php
$conn = mysqli_connect("localhost","root","Jafar786#","revenue");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 
?> 
<?php
/* if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '9LuDh9kyetYYYYdT0jsVckScsH8Ks3KA';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';
            
            $to = 'contact@codexworld.com';
            $subject = 'New contact form have been submitted';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            
            $succMsg = 'Your contact request have submitted successfully.';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif; */
?>
<?php

if(isset($_POST['contact_submit']))
{
	 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
	    $secret = '6LeUFSQUAAAAAGccSgSFfv-G_DZwlLo3rdBOxNIY';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
	//print_r($_POST);exit;
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
		                $to = "register@profitandloss.io,samiran1109@gmail.com,".$email;
						$subject = "Inubaan Software Product - Contact Mail ";
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
<p><b>From :</b><a style="color:black;text-decoration:none" rel="noreferrer">'.$fname.'  '.$lname.'</a>,</p>
<p><b>Email:</b> '.$email.'</p>
<p><b>Subject:</b> '.$subject.'</p>

<p><b>Message:</b> '.$message.'</p>

<p>This mail is sent via Contact Form on <a href="http://profitandloss.io">http://profitandloss.io</a></p>
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
						$headers .= 'From: '.$fname.'  '.$lname.'<'.$email.'>' . "\r\n";
						//$headers .= 'Cc: myboss@example.com' . "\r\n";

						mail($to,$subject,$message,$headers);
						
					$result= "success";
					else:
					$result= "notverified";
					endif;
				else:
				$result= "notget";
				endif;
	
}
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
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

	
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-6 animate-box">
					<h3>Get In Touch</h3>
					<?php if(isset($result)){ ?>
					 
					 <?php
					if($result=='success')
					{
						echo '<p style="background-color: green;padding: 8px 7px 7px 9px;">Contact form Submitted Successfully</p>';
					}
					else
					{
						echo '<p style="background-color: red;padding: 8px 7px 7px 9px;">Contact form Not Submitted Successfully</p>';
					}
					?>
					
					<?php } ?>
					 <form action="" method="POST" id="contact-form">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="fname" required class="form-control" placeholder="Your firstname">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="lname" required class="form-control" placeholder="Your lastname">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" required class="form-control" placeholder="Your email address">
							</div>
						</div>

						<!--<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject" required class="form-control" placeholder="Your subject of this message">
							</div>
						</div>-->
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<select class="form-control"  id="subject" name="subject"  required >
								<option value="Sales">sales</option>
								<option value="Technical Support">Technical Support</option>
								<option value="Billing">Billing</option>
								<option value="Customer Care">Customer Care</option>
								<option value="Marketing">Marketing</option>
								<option value="Media">Media</option>
								</select>
				</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something" required ></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
						<div class="g-recaptcha" data-sitekey="6LeUFSQUAAAAAKdFC31Eb1fluB8McKj0DHE6cfyz" ></div>
						</div>
						</div>
						
						<div class="form-group">
							<input type="submit" name="contact_submit"value="Send Message" class="btn btn-primary">
						</div>

					</form>		
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="gtco-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li>
						</ul>
					</div>

				</div>
			</div>
			
		</div>
	</div>



