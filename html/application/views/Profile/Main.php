<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="profile">
    <!-- Content Header (Page header) -->
     
  
    <!-- Main content -->
     <!-- Main content -->
    <section class="content" style="min-height: 500px;">
	
	
	                    <div modal="showModalprofile"  class="modal-content" style="display: block;background-color: #fff;">
							      <div class="alert alert-danger alert-dismissible" ng-show="validationError">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
									 <strong>Info not successfuly uploaded.</strong>
									 </div>
									<form  id="profileform" name="profileform"  novalidate >
									<div class="modal-header">
										<h4>Edit Profile  </h4>
									</div>
									<div class="modal-body"> 
										
										<div class="form-group"  ng-class="{ 'has-error' : profileform.first_name.$invalid && !profileform.first_name.$pristine }">
											<input type="text" class="form-control1" id="first_name" name="first_name" ng-model="first_name" required >
												<p ng-show="profileform.first_name.$invalid && !profileform.first_name.$pristine" class="help-block">First Name is required.</p>
										 </div>
										
									</div>
									<div class="modal-body"> 
										
										<div class="form-group"   ng-class="{ 'has-error' : profileform.user_last_name.$invalid && !profileform.user_last_name.$pristine }">
											<input type="text" class="form-control1" id="user_last_name" name="user_last_name" ng-model="user_last_name" required >
												<p ng-show="profileform.user_last_name.$invalid && !profileform.user_last_name.$pristine" class="help-block">Last Name is required.</p>
										 </div>
										
									</div>
									<div class="modal-body"> 
										
										<div class="form-group" ng-init="user_mobile_number=<?php echo $user_info->user_mobile_number;?>" ng-class="{ 'has-error' : profileform.user_mobile_number.$invalid && !profileform.user_mobile_number.$pristine }">
											<input type="number" class="form-control1" id="user_mobile_number" name="user_mobile_number" ng-model="user_mobile_number" required >
												<p ng-show="profileform.user_mobile_number.$invalid && !profileform.user_mobile_number.$pristine" class="help-block">Mobile Number is required.</p>
										 </div>
										
									</div>
									<div class="modal-footer">
									  <!--<button class="btn btn-success" ng-disabled="profileform.$invalid" ng-click="ok()">Okay</button>-->
									  <button class="btn btn-success" ng-disabled="profileform.$invalid" ng-click="updateprofile()">Update</button>
									  <button class="btn" ng-click="cancelprofiledit()">Cancel</button>
									</div>
									<input type="hidden" class="form-control1" id="user_interanal_id" name="user_interanal_id" ng-model="user_interanal_id" required >
									</form>
						</div>
	
	
	
	                      <?php if(!empty($subscription)) :?>
	                        <div modal="showModal" close="cancel()" class="modal-content" style="display: block;background-color: #fff;">
							      
									<div class="modal-header">
										<h4>Our Pricing Table</h4>
									</div>
									<div class="modal-body" style="min-height: 403px;"> 
										
										<!--<div class="col-md-2 no-pad topmar" style="width: 16.66667%;">
											 <form action="http://profitandloss.io/index.php/Affiliate/index" method="POST" id="payment-form">
											 <img class="top1" src="http://profitandloss.io/images/1.png" style="width: 116%;margin: 2px 0px 0px -11px;display: block;">
											  <div class="allbox box1" style="border: 4px #005e5e solid;">
											   
												<span class="rate1" style="font-size: 30px;color: #005e5e;">
												<sup>$</sup> free
												</span>
												  
												<div class="frmtext1" style="background: #005e5e;width: 100%;margin: 10px 0;padding: 5px 10px;color: white;font-size: 10px;">
												Affiliate Accoun
												</div> 
												  <div class="txtlft">
												  <img src="http://profitandloss.io/images/AM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">  5 Store <br><br>
												  
												  <img src="http://profitandloss.io/images/AM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;"> 5 FB Ads Account  <br><br>
												  
												  <img src="http://profitandloss.io/images/AM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">Affiliate Commission<br><br>
												  
												   </div>
												  
												  <select class="mypro1" style="margin: 0px 0px 0px 37px;">
													<option class="active">Free</option>
													</select>
												  <input class="btn1" src="http://profitandloss.io/images/B1.png" alt="Submit" style="width: 80%;margin: auto;position: relative;bottom: -21px;" type="image">
												  <input name="user_id" value="" type="hidden">
											  </div>
								 
											 </form> 
                                        </div>-->
										
										<div class="col-md-2 no-pad topmar" style="width: 18.667%;margin: 14px 0 0 107px;">
											 <form action="http://profitandloss.io/stripepaymentupgrade" method="POST" id="payment-form">
											 <img class="top1" src="http://profitandloss.io/images/2.png" style="width: 116%;margin: 2px 0px 0px -11px;display: block;">
											  <div class="allbox box1" style="border: 4px #602d91 solid;">
											   
												<span class="rate2" style="font-size: 30px;color: #602d91;">
												<sup>$</sup> 29.97
												</span>
												  
												<div class="frmtext1" style="background: #602d91;width: 100%;margin: 10px 0;padding: 5px 10px;color: white;font-size: 10px;">
												 Basic Account
												</div> 
												  <div class="txtlft">
												  <img src="http://profitandloss.io/images/BM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">  1 Store <br><br>
												  
												  <img src="http://profitandloss.io/images/BM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;"> 1 FB Ads Account  <br><br>
												  
												  <img src="http://profitandloss.io/images/BM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">Simulator<br><br>
												  
												   </div>
												  
												  <select class="mypro1" name="package" style="margin: 0px 0px 0px 1px;width: 136px;">
													<option  value="plan1A,29.97" class="active">1 Month - $29.97</option>
													<option  value="plan1B,497">1 Year - $497  </option>
													</select>
												  <input class="btn1" src="http://profitandloss.io/images/B2.png" alt="Submit" style="width: 80%;margin: auto;position: relative;bottom: -21px;" type="image">
												  <input name="user_id" value="<?php echo $subscription[0]->user_id;?>" type="hidden">
												  <input name="str_customer_id" value="<?php echo $subscription[0]->str_id;?>" type="hidden">
												   <input name="stripe_payment_history_id" value="<?php echo $subscription[0]->id;?>" type="hidden">
												 
											  </div>
								 
											 </form> 
                                        </div>
										
										<div class="col-md-2 no-pad topmar" style="width: 18.667%;margin: 14px 0 0 107px;">
											 <form action="http://profitandloss.io/stripepaymentupgrade" method="POST" id="payment-form">
											 <img class="top1" src="http://profitandloss.io/images/3.png" style="width: 116%;margin: 2px 0px 0px -11px;display: block;">
											  <div class="allbox box1" style="border: 4px #2e3192 solid;">
											   
												<span class="rate2" style="font-size: 30px;color: #2e3192;">
												<sup>$</sup> 49.97
												</span>
												  
												<div class="frmtext1" style="background: #2e3192;width: 100%;margin: 10px 0;padding: 5px 10px;color: white;font-size: 10px;">
												 Basic Account
												</div> 
												  <div class="txtlft">
												  <img src="http://profitandloss.io/images/cM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">  3 Store <br><br>
												  
												  <img src="http://profitandloss.io/images/cM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;"> 3 FB Ads Account  <br><br>
												  
												  <img src="http://profitandloss.io/images/cM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">Simulator<br><br>
												  
												   </div>
												  
												  <select class="mypro1" name="package" style="margin: 0px 0px 0px 1px;width: 136px;">
													<option  value="plan2A,49.97" class="active">1 Month - $49.97</option>
													<option  value="plan2B,697">1 Year - $697  </option>
													</select>
												  <input class="btn1" src="http://profitandloss.io/images/B3.png" alt="Submit" style="width: 80%;margin: auto;position: relative;bottom: -21px;" type="image">
												  <input name="user_id" value="<?php echo $subscription[0]->user_id;?>" type="hidden">
												  <input name="str_customer_id" value="<?php echo $subscription[0]->str_id;?>" type="hidden">
												   <input name="stripe_payment_history_id" value="<?php echo $subscription[0]->id;?>" type="hidden">
												 
											  </div>
								 
											 </form> 
                                        </div>
										
										<div class="col-md-2 no-pad topmar" style="width: 18.667%; margin: 14px 0 0 107px;">
											 <form action="http://profitandloss.io/stripepaymentupgrade" method="POST" id="payment-form">
											 <img class="top1" src="http://profitandloss.io/images/4.png" style="width: 116%;margin: 2px 0px 0px -11px;display: block;">
											  <div class="allbox box1" style="border: 4px #00aaad solid;">
											   
												<span class="rate2" style="font-size: 30px;color: #00aaad;">
												<sup>$</sup> 69.97
												</span>
												  
												<div class="frmtext1" style="background: #00aaad;width: 100%;margin: 10px 0;padding: 5px 10px;color: white;font-size: 10px;">
												 Basic Account
												</div> 
												  <div class="txtlft">
												  <img src="http://profitandloss.io/images/dM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">  5 Store <br><br>
												  
												  <img src="http://profitandloss.io/images/dM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;"> 5 FB Ads Account  <br><br>
												  
												  <img src="http://profitandloss.io/images/dM1.png" class="cstmbullet" style="height: 20px;width: 20px;float: left;margin: 5px;">Simulator<br><br>
												  
												   </div>
												  
												  <select class="mypro1" name="package" style="margin: 0px 0px 0px 1px;width: 136px;">
													<option  value="plan3A,69.97" class="active">1 Month - $69.97</option>
													<option  value="plan3B,897">1 Year - $897  </option>
													</select>
												  <input class="btn1" src="http://profitandloss.io/images/B4.png" alt="Submit" style="width: 80%;margin: auto;position: relative;bottom: -21px;" type="image">
												  <input name="user_id" value="<?php echo $subscription[0]->user_id;?>" type="hidden">
												  <input name="str_customer_id" value="<?php echo $subscription[0]->str_id;?>" type="hidden">
												   <input name="stripe_payment_history_id" value="<?php echo $subscription[0]->id;?>" type="hidden">
												 
											  </div>
								 
											 </form> 
                                        </div>
									</div>
									<div class="modal-footer">
									  <!--<button class="btn btn-success" ng-disabled="profileform.$invalid" ng-click="ok()">Okay</button>-->
									  <button class="btn btn-success" ng-disabled="profileform.$invalid" ng-click="ok()">Okay</button>
									  <button class="btn" ng-click="cancel()">Cancel</button>
									</div>
									
						    </div>
							<?php endif;?>
							<?php //echo "<pre>"; print_r($user_info);?>
							<?php //echo "<pre>"; print_r($subscription);?>
							<div id="page-wrapper">
								<div class="col-md-12 graphs">

									<div class="xs col-md-12">  
								     <!-- <h3>View Report</h3>-->
									 <h3>Profile (<a href="javascript:void(0);" ng-click="editprofile();">Edit</a>)</h3>
							        </div>
									 <?php if(isset($_GET['status'])) {?>  
						   <?php if($_GET['status']==1) { ?> 
						       <div class="xs col-md-12" style="background-color: green;padding: 10px 0px 10px 14px;color: #fff;">Subscription Package Upgraded Successfully!</div>
						   <?php } ?>
						   <?php if($_GET['status']==0) { ?> 
						          <div class="xs col-md-12"style="background-color: #dc363d;padding: 10px 0px 10px 14px;color: #fff;">Subscription Package Upgradation Error!</div>
						   <?php } ?>
						   <?php } ?>
									<table class="table table-striped"> 
       
       
										<thead>
											<tr class="rpttext">
											  <th class="col-sm-2 tittex">Subscription</th>
											  <th class="col-sm-2 tittex">Info</th>
											  <th class=" col-sm-2 tittex">Date</th>
											  <th class=" col-sm-2 tittex">Status</th>
											  <th class="col-sm-2 tittex">Price</th>
											  <th class="col-sm-2 tittex">Action</th>
											</tr> 
									   </thead>
									   <?php 
									     if(!empty($subscription)) 
										 { 
									        $subscriptionname=$subscription[0]->subscription;
									     }
										 else
										 {
											  $subscriptionname=$user_info->subscription;
										 }
										 
										
											 if($subscriptionname=='affiliate')
											 {
												 //echo "Affiliate";
												 ?>
												 <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2" style="color: red !important;">Affiliate</th>
													  <th class="col-sm-2 greene">5 Store/5 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $user_info->user_account_created_on ;?></th>
													  <th class="col-sm-2" style="color: red !important;">Active</th>
													  <th class="col-sm-2 greene">Free</th>
													  <th class="col-sm-2 greene">Cancle/
													  <a href="http://profitandloss.io/subscription/index/<?php echo $user_info->user_interanal_id;?>/zgQl2Knc" target="_blank">Upgrade</a></th>
													</tr>
											  
												</tbody>
												 <?php
											 }
											 if($subscriptionname=='plan1A')
											 {
												// echo "Basic Monthly ";
												?>
												 
												<tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Basic Monthly</th>
													  <th class="col-sm-2 greene">1 Store/1 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$29.97/Month</th>
													    <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
											 if($subscriptionname=='plan1B')
											 {
												  //echo "Basic Yearly ";
												  ?>
												 
												  <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Basic Yearly</th>
													  <th class="col-sm-2 greene">1 Store/1 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$497/Year</th>
													   <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
											 if($subscriptionname=='plan2A')
											 {
												 //echo "Professional Monthly";
												 ?>
												 
												  <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Professional Monthly</th>
													  <th class="col-sm-2 greene">3 Store/3 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$49.97/Month</th>
													  <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
											 if($subscriptionname=='plan2B')
											 {
												// echo "Professional Yearly";
												?>
												 
												  <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Professional Yearly</th>
													  <th class="col-sm-2 greene">3 Store/3 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$697/Year</th>
													   <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
											 if($subscriptionname=='plan3A')
											 {
												// echo "Business Monthly";
												?>
												 
												  <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Business Monthly</th>
													  <th class="col-sm-2 greene">5 Store/5 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$69.97/Month</th>
													   <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
											 if($subscriptionname=='plan3B')
											 {
												// echo "Business Yearly";
												?>
												 
												  <tbody>
													<tr  class="rpttext2">
													  <th class="col-sm-2 greene">Business Yearly</th>
													  <th class="col-sm-2 greene">5 Store/5 FB Ads</th>
													  <th class="col-sm-2 greene"><?php echo $subscription[0]->created_at;?></th>
													   <th class="col-sm-2 greene">
													   <?php 
													    $currentdate=date('Y-m-d H:i:s');
													    $sub_date=$subscription[0]->created_at;
													   
														 $date1=date_create($currentdate);
														$date2=date_create($sub_date);
													   //echo $diff=date_diff($date1,$date2); 
													   //$date1=date_create("2013-03-15");
														//$date2=date_create("2013-12-12");
														$diff=date_diff($date1,$date2);
														$noofday=$diff->format("%a");
														if($noofday<=7)
														{
															echo "Trial Period";
														}
														if($noofday>7)
														{
															echo 'Active';
														}
													   ?>
													   </th>
													   <th class="col-sm-2 greene">$897/Year</th>
													   <th class="col-sm-2 greene">
													   <a href="javascript:void(0);" 
													   ng-click="canclesubscription(<?php echo $subscription[0]->user_id;?>,'<?php echo $subscription[0]->str_id;?>','<?php echo $subscription[0]->str_sub_id;?>')">Cancle</a>
													   /<a href="javascript:void(0);" ng-click="showupgrade()">Upgrade</a></th>
													</tr>
											  
												</tbody>
												<?php
											 }
										?>
										
									  </table>
									<div class="clearfix"> </div>
							
							         <table class="tablev">
									   
									
											<tbody>
											<tr>
											  <td class="col-sm-6 text-l padleftt">Name : </td>
											  <td class=" col-sm-6 text-l"><?php echo $user_info->user_first_name; ?> <?php echo $user_info->user_last_name; ?></td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt">Mobile Number : </td>
											  <td class=" col-sm-6 text-l"><?php 
											    echo $user_info->user_mobile_number;
											   ?></td>
											</tr>
											<tr>
											  <td class="col-sm-6 text-l padleftt">Email : </td>
											  <td class=" col-sm-6 text-l"><?php 
											    echo $user_info->user_email_id;
											   ?></td>
											</tr>
											<tr>
											  <td class="col-sm-6 text-l padleftt">User Name : </td>
											  <td class=" col-sm-6 text-l"><?php 
											    echo $user_info->user_username;
											   ?></td>
											</tr>
											<tr>
											  <td class="col-sm-6 text-l padleftt">Account Created At: </td>
											  <td class=" col-sm-6 text-l"><?php 
											    echo $user_info->user_account_created_on;
											   ?></td>
											</tr>
											
										</tbody> 
									  </table>	
							
					
		
    </section>
                            
   <!-- /.content -->
	                           </div>
							</div>
   </section>
  </div>

  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("profile", function($scope,$http,$timeout,$window) {
  
  	$scope.first_name='<?php echo $user_info->user_first_name;?>';
		$scope.user_interanal_id='<?php echo $user_info->user_interanal_id;?>';
	$scope.user_last_name='<?php echo $user_info->user_last_name;?>';
	$scope.showupgrade = function () {
	  $scope.showModal = true;
  }
  $scope.cancel = function() {
  $scope.showModal = false;
  };

  $scope.editprofile = function () {
	  $scope.showModalprofile = true;
  }
  $scope.cancelprofiledit = function() {
  $scope.showModalprofile = false;
  };
 $scope.updateprofile=function()
 {
	 
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Registration/profileupdate',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({user_first_name:$scope.first_name,user_interanal_id:$scope.user_interanal_id,
				user_last_name:$scope.user_last_name,user_mobile_number:$scope.user_mobile_number
				})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                   if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>profile";
				 }
				
			});
	 
 }
	$scope.canclesubscription = function (str,str2,str3) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to Cancle Subscription?');

    if (deleteUser) {
      
	  //alert(str);
	  //alert(str2);
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Stripepaymentcancle',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({user_id:str,str_customer_id:str2,str_sub_id:str3})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                 if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>Login";
				 }
				 else
				 {
					 //$scope.validationError = true;
				 }  
				
			}); 
	  
      }   
			   
    }
			
});
</script>
  <style>
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
   /* text-align:left;*/
    /* inline-block space fix */
   /* margin-right:-4px;*/
       margin-right: 16%;
}
.item {
    width:100%;
    height:100%;
	/*border:1px solid #cecece;*/
    padding:16px 8px;
	/*background:#ededed;
	background:-webkit-gradient(linear, left top, left bottom,color-stop(0%, #f4f4f4), color-stop(100%, #ededed));
	background:-moz-linear-gradient(top, #f4f4f4 0%, #ededed 100%);
	background:-ms-linear-gradient(top, #f4f4f4 0%, #ededed 100%);*/
}

/* content styles */
.item {
	display:table;
}


  </style>