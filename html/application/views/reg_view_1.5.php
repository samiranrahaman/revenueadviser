
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Revenue Advizer| Sign in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>fonts/ionicons.min.css">
  <!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
<!--<link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/square/blue.css">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body class="hold-transition login-page" ng-app="myApp" ng-controller="formCtrl">
<div class="login-box" >
  <!--<div class="login-logo">
    <a href="http://www.zulekhahospitals.com" target="_blank"><img width="100px" src="<?php echo base_url();?>images/hims_logo.png" title="HIMS" alt="HIMS"/></a>
  </div>-->
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Revenue Advizer User </br>Registration</p>
    
    <!--<div id="failureAlert" name="failureAlert" class="alert alert-danger alert-dismissible" role="alert" style="display:block;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Login failed! Try Again...</strong>
          </div>-->
		<div class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Registration Failed! User name Exist ! Try Again...</strong>
		 </div>
   <!--<form method="post" id="regform" name="regform" action="<?php echo base_url();?>index.php/Dashboard">-->
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
	  
	  
	  
	  
      <div class="row">
       
        <div class="col-xs-6 pull-left">
           <a href="<?php echo base_url();?>index.php/Login" id="forgot_password" name="forgot_password"> Login
           </a>
        </div>
        <div class="col-xs-4 pull-right">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="regform.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="btn btn-primary" ng-disabled="regform.$invalid">Create</button>
        
        
        <!-- /.col -->
      </div>
    </form>
	
	
	
 </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
					  window.location.href="<?php echo base_url();?>index.php/Login";
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
<!-- /Forgot Password -->

</body>
</html>
