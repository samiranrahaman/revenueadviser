
<!DOCTYPE html>
<html>
<head>
 <title>Profit and Loss | Login</title>
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
        <li class="tab active"><a href="<?php echo base_url();?>index.php/login">Sign In</a></li>
		<li class="tab"><a href="<?php echo base_url();?>index.php/registration">Join Us</a></li>        
    </ul>
    <div class="tab-content1">
        
    
        <div id="signin-agile">   
		   <div class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Wrong Username/Password or Account not Active!</strong>
		 </div>
          <form  id="loginForm" name="loginForm" ng-submit="loginformsubmit()" novalidate >
   
      
   
      <div class="form-group"  ng-class="{ 'has-error' : loginForm.username.$invalid && !loginForm.username.$pristine }">
        <input type="text" class="form-control" placeholder="User Name" id="username" name="username" ng-model="user.username" required >
		    <p ng-show="loginForm.username.$invalid && !loginForm.username.$pristine" class="help-block">Username is required.</p>
        
      </div> 
      <div class="form-group has-feedback" ng-class="{ 'has-error' : loginForm.passwrd.$invalid && !loginForm.passwrd.$pristine }">
        <input type="password" class="form-control" placeholder="Password" id="passwrd" name="passwrd" ng-model="user.passwrd" required>    
		<p ng-show="loginForm.passwrd.$invalid && !loginForm.passwrd.$pristine" class="help-block">Passwrd is required.</p>
        
      </div>
      <div class="row">
        <!--div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div-->
        <!-- /.col -->
       <div class="col-xs-6 pull-left">
           <a href="<?php echo base_url();?>forgotpassword" id="forgot_password" name="forgot_password" data-toggle="modal" data-target="#DeleteMenu"> Forgot Password
           </a>
        </div>
        <div class="col-xs-2 pull-left">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="loginForm.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="sign-in btn btn-primary" ng-disabled="loginForm.$invalid">Sign In</button>
				
      </div>
	 
	  <ul class="links">
					<li class="pass-w3ls"><a href="#">Forgot Password</a></li>
	   </ul>
    </form>
	
	<!--<form name="userForm" ng-submit="submitForm()" novalidate>

        <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid && !userForm.name.$pristine }">
            <label>Name</label>
            <input type="text" name="name" class="form-control" ng-model="user.name" required>
            <p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">You name is required.</p>
        </div>
      
        <div class="form-group" ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.username.$pristine }">
            <label>Username</label>
            <input type="text" name="username" class="form-control" ng-model="user.username" ng-minlength="3" ng-maxlength="8">
            <p ng-show="userForm.username.$error.minlength" class="help-block">Username is too short.</p>
            <p ng-show="userForm.username.$error.maxlength" class="help-block">Username is too long.</p>
        </div>
        
        <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine }">
            <label>Email</label>
            <input type="email" name="email" class="form-control" ng-model="user.email">
            <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Enter a valid email.</p>
        </div>
        
        <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Submit</button>
        
    </form>-->
	
	
 </div>
            
       </div>
    </div>
	
	</div> <!-- /form -->	  
<p class="copyright">Copyright © 2017- All rights reserved -Powered by INUBAAN SOFTWARE.</p>


<script>
var app = angular.module("myApp", []);
app.controller("formCtrl", function($scope,$http) {
  
  $scope.loginformsubmit = function () {
	  // check to make sure the form is completely valid
			if ($scope.loginForm.$valid) {
				//alert($scope.user.username);
				//alert($scope.user.passwrd);
				/*  $http.get('<?php //echo site_url('Login/verify_login')?><?php echo base_url();?>login/verify_login',{username: $scope.user.username,passwrd: $scope.user.passwrd})
					.then(function(response) {
						//$scope.myWelcome = response.data;
						alert(response.data);
					}); */
					
					
					$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/login/verify_login',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        //headers: {'Content-Type': 'application/json'},
			//data :{"myformdata" :JSON.stringify({username:$scope.user.username, passwrd:$scope.user.passwrd})}
			data :JSON.stringify({username:$scope.user.username, passwrd:$scope.user.passwrd})
			}).success(function(data) {
				console.log(data);
				 //console.log(data.status);
				 //alert(data.status);
                  if(data.status=='1')
				 {
					 window.location.href="<?php echo base_url();?>index.php/Dashboard";
				 }
				 else
				 {
					 //console.log('sami');
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


     