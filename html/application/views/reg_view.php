
<!DOCTYPE html>
<html>
<head>
 <title>Profit and Loss | Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
<meta name="description" content="A INUBAAN Software Product" />
	<meta name="keywords" content="Profit,loss,revenue,adviser" />
	<meta name="author" content="Inubaan Software" />  
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
        
        <li class="tab "><a href="<?php echo base_url();?>">Home</a></li>
		<li class="tab "><a href="<?php echo base_url();?>index.php/login">Sign In</a></li>
		<li class="tab active"><a href="<?php echo base_url();?>index.php/registration">Join Us</a></li>        
    </ul>
    <div class="tab-content1">
        
    
        <div id="signup-agile">   
		   <div class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Registration Failed! User name Exist ! Try Again...</strong>  
		 </div>
          <form  id="regform" name="regform" ng-submit="regformsubmit()" novalidate >
   
      
   
      <div class="form-group"  ng-class="{ 'has-error' : regform.user_first_name.$invalid && !regform.user_first_name.$pristine }">
        <input type="text" class="form-control" placeholder="First name" id="user_first_name" name="user_first_name" ng-model="user.user_first_name" required >
		    <p ng-show="regform.user_first_name.$invalid && !regform.user_first_name.$pristine" class="help-block">First Name is required.</p>
        
      </div> 
      <div class="form-group"  ng-class="{ 'has-error' : regform.user_last_name.$invalid && !regform.user_last_name.$pristine }">
        <input type="text" class="form-control" placeholder="Last name" id="user_last_name" name="user_last_name" ng-model="user.user_last_name" required >
		    <p ng-show="regform.user_last_name.$invalid && !regform.user_last_name.$pristine" class="help-block">Last Name is required.</p>
        
      </div> 
	   <div class="form-group"  ng-class="{ 'has-error' : regform.user_mobile_number.$invalid && !regform.user_mobile_number.$pristine }">
        <input type="number" class="form-control" placeholder="Mobile Number" id="user_mobile_number" name="user_mobile_number" ng-model="user.user_mobile_number" required >
		    <p ng-show="regform.user_mobile_number.$invalid && !regform.user_mobile_number.$pristine" class="help-block">Mobile Number is required.</p>
        
      </div>
	   <div class="form-group"  ng-class="{ 'has-error' : regform.user_email_id.$invalid && !regform.user_email_id.$pristine }">
        <input type="email" class="form-control" placeholder="Email" id="user_email_id" name="user_email_id" ng-model="user.user_email_id" required >
		    <p ng-show="regform.user_email_id.$invalid && !regform.user_email_id.$pristine" class="help-block">Email Id is required.</p>
        
      </div>
	  
	   <div class="form-group"  ng-class="{ 'has-error' : regform.user_username.$invalid && !regform.user_username.$pristine }">
        <input type="text" class="form-control" placeholder="Username" id="user_username" name="user_username" ng-model="user.user_username" required >
		    <p ng-show="regform.user_username.$invalid && !regform.user_username.$pristine" class="help-block">Username is required.</p>
        
      </div>
	  
	   <div class="form-group"  ng-class="{ 'has-error' : regform.user_password.$invalid && !regform.user_password.$pristine }">
        <input type="password" class="form-control" placeholder="Password" id="user_password" name="user_password" ng-model="user.user_password" required >
		    <p ng-show="regform.user_password.$invalid && !regform.user_password.$pristine" class="help-block"> Password is required.</p>
        
      </div>
	  
	   <div class="form-group" ng-class="{ 'has-error' : regform.termandcontion.$invalid && !regform.termandcontion.$pristine }">
        <input type="checkbox" class="form-control" name="termandcontion" ng-model="user.termandcontion" required >
		<a href="<?php echo base_url();?>termandcondition" target="_blank">I agree to <b>Terms and Conditions</b></a>
		   
      </div>
	  
	  
      <div class="row">
       
        
        <div class="col-xs-4 pull-right">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="regform.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="btn btn-primary register" ng-disabled="regform.$invalid">Create</button>
        
        
        <!-- /.col -->
      </div>
    </form>
	
	
	
 </div>
  </div>
    </div>
	
	</div> <!-- /form -->	  
<p class="copyright">Copyright © 2017- All rights reserved -Powered by INUBAAN SOFTWARE.</p>

<script>
var app = angular.module("myApp", []);
app.controller("formCtrl", function($scope,$http) {
  
  $scope.regformsubmit = function () {
	  // check to make sure the form is completely valid
			if ($scope.regform.$valid) {
				
					$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/Registration/registration_data',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        //headers: {'Content-Type': 'application/json'},
			//data :{"myformdata" :JSON.stringify({username:$scope.user.username, passwrd:$scope.user.passwrd})}
			data :JSON.stringify({user_first_name:$scope.user.user_first_name, user_last_name:$scope.user.user_last_name,
			                      user_mobile_number:$scope.user.user_mobile_number,user_email_id:$scope.user.user_email_id,
                                  user_username:$scope.user.user_username,user_password:$scope.user.user_password								  })
			}).success(function(data) {
				 console.log(data);
				 //alert(data.status);
                 if(data>0)
				 {
					  //window.location.href="<?php echo base_url();?>index.php/Login";
					  //window.location.href="<?php echo base_url();?>index.php/stripepayment/index/"+data;
					  window.location.href="<?php echo base_url();?>index.php/subscription/index/"+data;
				 }
				 else
				 {
					 $scope.validationError = true;
				 }
				
				

			});
					
					
					
			}
  }
  
  
  $scope.ShowHide = function () {
                //If DIV is hidden it will be visible and vice versa.
                $scope.validationError = $scope.validationError ? false : true;
            }
  
  
  
  
  
  
});
</script>
</body>
</html>
