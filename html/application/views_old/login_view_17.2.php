
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
    <p class="login-box-msg">Revenue Advizer User Console</br>Sign in</p>
    
    <div id="failureAlert" name="failureAlert" class="alert alert-danger alert-dismissible" role="alert" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Login failed! Try Again...</strong>
          </div>

   <!--<form method="post" id="loginForm" name="loginForm" action="<?php echo base_url();?>index.php/Dashboard">-->
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
           <a href="#" id="forgot_password" name="forgot_password" data-toggle="modal" data-target="#DeleteMenu"> Forgot Password
           </a>
        </div>
        <div class="col-xs-4 pull-right">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="loginForm.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="btn btn-primary" ng-disabled="loginForm.$invalid">Sign In</button>
        
        
        <!-- /.col -->
      </div>
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
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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

				//$scope.authorized = data; 

				//if ($scope.authorized) { $location.path("memberArea"); };        

			});
					
					
					
			}
  }
  
  
  /*
  $http({
        method : 'POST',
        url : 'http://127.0.0.1/api/main/login',
        headers: {'Content-Type': 'application/json'},
        data : JSON.stringify({email:$scope.user.email, password:$scope.user.password})
    }).success(function(data) {
         console.log(data);

        $scope.authorized = data; 

        if ($scope.authorized) { $location.path("memberArea"); };        

    });
*/
  
  /*
  // process the form
$scope.processForm = function() {
  $http({
  method  : 'POST',
  url     : 'process.php',
  data    : $.param($scope.formData),  // pass in data as strings
  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
 })
  .success(function(data) {
    console.log(data);

    if (!data.success) {
      // if not successful, bind errors to error variables
      $scope.errorName = data.errors.name;
      $scope.errorSuperhero = data.errors.superheroAlias;
    } else {
      // if successful, bind success message to message
      $scope.message = data.message;
    }
  });
};*/
  
  
  
  
  
  
  
  
  
  
  
  
  
});
</script>
<!-- /Forgot Password -->

      <div class="example-modal">
        <div class="modal fade" tabindex="-1" id="DeleteMenu" name="DeleteMenu">
          <div class="modal-dialog modal-sm ui-corner-all">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forgot Password</h4>
                
                <div class="modal-body">
                <div id="alert" name="alert" role="alert" style="display:none;" >                    
                </div>
                  <form name="forgotForm" id="forgotForm">
                    <div class="form-group" id="div1">  
                        <label for="recipient-name" class="form-control-label">User Name/ Email</label>       
                        <input type="text" class="form-control" id="user_name" name="user_name"/> 
                    </div>  
                                            
                   <div id="loading-div"></div>                          
                  </form>
                </div>
               <div class="modal-footer">
                <button type="button" id="closemodel1" name="closemodel1" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary has-spinner" onclick="forgotPassword()" id="createPassword"><span  id="hide_name">Submit</span> <span id="spin" style="display:none;"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i>Loading</span></button>
              </div>
            </div>
          <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
     <!-- /Forgot Password -->
    </div>

<?php


/* // Set variables for our request
$shop = "alldayfreeshipping";
$api_key = "2eac3486958d276e3a41dd6a6d50456a";
$scopes = "read_orders,write_products"; 
$redirect_uri = "<?php echo base_url();?>index.php/Dashboard";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die(); */



 //https:2eac3486958d276e3a41dd6a6d50456a:4f7087ae3a73c2ebf2f76782ec9260c2@alldayfreeshipping.myshopify.com/admin/orders.xml




/* 
  $api_key = "deca518b2c5181bb52090e5b9a52d256";
  $shared_secret = "45830e1c06dc87b184d5b6c808f48c73";
  $refresh_token = "053ca9509ec5208751db229eddcee29f-1487157945";
  $access_token = "access-token-to-refresh";

  $post_data = array(
    "client_id" => $api_key,
    "client_secret" => $shared_secret,
    "refresh_token" => $refresh_token,
    "access_token" => $access_token,
  );
  $data_string = json_encode($post_data);

  $headers = array(
    "Content-Type: application/json",
    "Accept: application/json",
    "Content-Length:" . strlen($data_string)
  );

  $handler = curl_init('https://shop.myshopify.com/admin/oauth/access_token.json');
  curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($handler, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handler, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($handler); */
?>

<?php //echo($response) ?>
	
<?php
/*   $api_key = "deca518b2c5181bb52090e5b9a52d256";
  $shared_secret = "45830e1c06dc87b184d5b6c808f48c73";
  $refresh_token = "053ca9509ec5208751db229eddcee29f-1487157945";
  $access_token = "access-token-to-refresh";

  $post_data = array(
    "client_id" => $api_key,
    "client_secret" => $shared_secret,
    "refresh_token" => $refresh_token,
    "access_token" => $access_token,
  );
  $data_string = json_encode($post_data); */

 /*  $headers = array(
    "Content-Type: application/json",
    "Accept: application/json",
    "Content-Length:" . strlen($data_string)
  );

  $handler = curl_init('https:2eac3486958d276e3a41dd6a6d50456a:4f7087ae3a73c2ebf2f76782ec9260c2@alldayfreeshipping.myshopify.com/admin/products.json?since_id=632910392');
  curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
 // curl_setopt($handler, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($handler, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($handler, CURLOPT_HTTPHEADER, $headers);
//  curl_setopt($handler, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($handler, CURLOPT_SSL_VERIFYPEER, 0);

  $response = curl_exec($handler);  */
?>

<?php //echo($response) ?>

<?php
//https://alldayfreeshipping.myshopify.com/admin/orders.json 
/* $url='https://2eac3486958d276e3a41dd6a6d50456a:4f7087ae3a73c2ebf2f76782ec9260c2@alldayfreeshipping.myshopify.com/admin/products.json';
 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// Set so curl_exec returns the result instead of outputting it.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Get the response and close the channel.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//echo curl_errno($ch);
echo $response = curl_exec($ch);
curl_close($ch); */
?>

</body>
</html>
