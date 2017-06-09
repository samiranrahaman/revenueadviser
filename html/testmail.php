<?php
$to = "samiran1109@gmail.com";
$subject = "HTML email";

$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mail Template</title>
</head>

<body bgcolor="#ffffff" style="margin:0 auto; padding:0;width:600px;">
<table width="100%" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
	<tr>
		<td>
		<!--[if (gte mso 9)|(IE)]>
		<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
		<tr>
		  <td>
		<![endif]-->
			<table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
				<tr>
					<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerImageCurve" style="min-height:15px;">
							<tr>
								<td bgcolor="#1b82d2" valign="top" class="bodyContentImageFull" mc:edit="body_content_01">
									<p style="font-size: 14px;margin-bottom: 0;color: #fff;padding: 10px 10px;text-align: left;">
										Success....
									</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainerMiddle" style="border-left:1px solid #e2e2e2;border-right:1px solid #e2e2e2;border-bottom:1px solid #e2e2e2;">
							<tr>
								<td align="center" valign="top" class="bodyContent" mc:edit="body_content">
									<img src="icon.png" />
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Thank you for using aman.</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">This is your receipt</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Transaction Type</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Give</p>									
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Receipt No</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">APT676</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">From</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">9876543210</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">To</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">5418908651</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Number of Points</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">10</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Current Balance</p>
									<p style="color:#1b82d2;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">88</p>
									<p style="color:#545454;display:block;font-family:Helvetica;font-size:15px;line-height:1em;font-style:normal;font-weight:normal;letter-spacing:normal;margin:0 0 10px 0;text-align:center;">Points</p>
									<p>09-mar-17 02:35PM</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		<!--[if (gte mso 9)|(IE)]>
		  </td>
		</tr>
		</table>
		<![endif]-->
		</td>
	</tr>
</table>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <samiran1109@gmail.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>