<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
 
  <script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" ng-controller="inregation">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Intregation</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Intregation</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
	<?php
     //print_r($user_info);
	?>
							<div modal="showModal" close="cancel()" class="modal-content">
							      <div class="alert alert-danger alert-dismissible" ng-show="validationError">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
									 <strong>Info not successfuly uploaded.</strong>
									 </div>
									<form  id="loginForm" name="loginForm" ng-submit="loginformsubmit()" novalidate >
									<div class="modal-header">
										<h4>Fulfillment Accounts  </h4>
									</div>
									<div class="modal-body">
										
										<div class="form-group"  ng-class="{ 'has-error' : loginForm.username.$invalid && !loginForm.username.$pristine }">
											<input type="text" class="form-control" placeholder="Store Name" id="account_name" name="account_name" ng-model="store.account_name" required >
												<p ng-show="loginForm.account_name.$invalid && !loginForm.account_name.$pristine" class="help-block">Store Name is required.</p>
										 </div>
										<div class="form-group"  ng-class="{ 'has-error' : loginForm.username.$invalid && !loginForm.username.$pristine }">
											<input type="text" class="form-control" placeholder="Apikey" id="account_name" name="account_name" ng-model="store.apikey" required >
												<p ng-show="loginForm.account_name.$invalid && !loginForm.account_name.$pristine" class="help-block">Private app Apikey is required.</p>
										 </div>	
										 <div class="form-group"  ng-class="{ 'has-error' : loginForm.password.$invalid && !loginForm.password.$pristine }">
											<input type="text" class="form-control" placeholder="Private app Password" id="password" name="password" ng-model="store.password" required >
												<p ng-show="loginForm.password.$invalid && !loginForm.password.$pristine" class="help-block">Private app Password is required.</p>
										 </div>	
										 <div class="form-group"  ng-class="{ 'has-error' : loginForm.Url.$invalid && !loginForm.Url.$pristine }">
											<input type="text" class="form-control" placeholder="Store Url" id="account_name" name="account_name" ng-model="store.url" required >
												<p ng-show="loginForm.url.$invalid && !loginForm.url.$pristine" class="help-block">Store Url is required.</p>
										 </div>
										  <!--<div class="col-xs-4 pull-right">
													 <button type="submit" class="btn btn-primary" ng-disabled="loginForm.$invalid">Sign In</button>
										   </div>-->
										
									</div>
									<div class="modal-footer">
									  <!--<button class="btn btn-success" ng-disabled="loginForm.$invalid" ng-click="ok()">Okay</button>-->
									  <button class="btn btn-success" ng-disabled="loginForm.$invalid" ng-click="ok()">Okay</button>
									  <button class="btn" ng-click="cancel()">Cancel</button>
									</div>
									</form>
						    </div>
							
							<div modal="showModal_fb" close="cancel_fb()" class="modal-content">
							      <div class="alert alert-danger alert-dismissible" ng-show="validationError">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
									 <strong>Info not successfuly uploaded.</strong>
									 </div>
									<form  id="fbloginForm" name="fbloginForm" ng-submit="fbloginformsubmit()" novalidate >
									<div class="modal-header">
										<h4>Facebook Account Info  </h4>
									</div>
									<div class="modal-body">
										<!--<input type="hidden" class="form-control"ng-int="user_id=<?php echo $user_info->user_interanal_id?>" id="user_id" name="user_id" ng-model="user_id" required >-->
										<!--<div class="form-group"  ng-class="{ 'has-error' : fbloginForm.app_id.$invalid && !fbloginForm.app_id.$pristine }">
											<input type="text" class="form-control" placeholder="FB App ID" id="app_id" name="app_id" ng-model="app_id" required >
												<p ng-show="fbloginForm.app_id.$invalid && !fbloginForm.app_id.$pristine" class="help-block">FB App ID is required.</p>
										 </div>
										
										 <div class="form-group"  ng-class="{ 'has-error' : fbloginForm.app_secret.$invalid && !fbloginForm.app_secret.$pristine }">
											<input type="text" class="form-control" placeholder="FB App Secret" id="app_secret" name="app_secret" ng-model="app_secret" required >
												<p ng-show="fbloginForm.app_secret.$invalid && !fbloginForm.app_secret.$pristine" class="help-block">FB App ID Secret required.</p>
										 </div>-->
										<div class="form-group"  ng-class="{ 'has-error' : fbloginForm.ads_act.$invalid && !fbloginForm.ads_act.$pristine }">
											<input type="text" class="form-control" placeholder="FB Ads Account Id" id="ads_act" name="ads_act" ng-model="ads_act" required >
												<p ng-show="fbloginForm.ads_act.$invalid && !fbloginForm.ads_act.$pristine" class="help-block">FB Ads Account Id required.</p>
										 </div>
									</div>
									<div class="modal-footer">
									  <!--<button class="btn btn-success" ng-disabled="loginForm.$invalid" ng-click="ok()">Okay</button>-->
									  <button class="btn btn-success" ng-disabled="fbloginForm.$invalid" ng-click="ok_fb()">Okay</button>
									  <button class="btn" ng-click="cancel_fb()">Cancel</button>
									</div>
									</form>
						    </div>
							
							<div class="container">
									<div class="row row-centered">
									   
									  
									   <div class="col-xs-12 col-centered col-min">
									   <h3>Connect account with Revenue advizer</h3>
									   <div class="content">
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-2"><i class="fa fa-shopping-cart fa-2x"></i></div>
											  <div class="col-sm-4">Shopify Store</div>
											  <div class="col-sm-6"><button ng-click="showComplex()">Connect Shopify Store</button></div>
											</div>
										  <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-2"><i class="fa fa-facebook-official fa-2x"></i></div>
											  <div class="col-sm-4">Facebook Account</div>
											  <div class="col-sm-6"><button ng-click="addfacebookapi()">Connect Facebook Account</button></div>
									   </div>
											
									   </div>
									   
									   </div>
									   <div modal="showModal2" close="cancel()" class="modal-content">
							               <div class="modal-body"> <h3>Please Wait......</h3></div>
						                </div>
									   <div class="col-xs-12 col-centered col-min">
									   <h3>Currently Intregated Account with Revenue advizer</h3>
									   <div class="content">
										<div class="row " ng-repeat="x in stores " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-1"><i class="fa fa-shopping-cart fa-2x"></i></div>
											  <div class="col-sm-2">{{x.store_name}}</div>
											   <!--<div class="col-sm-2">{{x.store_apikey}}</div>
											    <div class="col-sm-2">{{x.store_app_password}}</div>-->
												 <div class="col-sm-3">{{x.store_url}}</div>
												 <div class="col-sm-2">{{x.create_time}}</div>
												 <div class="col-sm-4"><button ng-click="delete_store(x.id)">Delete</button></div>
										         <div class="row">
												 <div class="col-sm-6"><button class="btn btn-primary btn-block" ng-click="setupdata(x.store_name,x.store_apikey,x.store_app_password);">Setup my Revenue Reports</button></div>
												 </div>
										
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!stores.length">No Result Found!</div>
									   </div>
									   
									   </div>
									   
									   <div class="col-xs-12 col-centered col-min">
									   <h3>Currently Intregated Facebook Account with Revenue advizer</h3>
									   <div class="content">
										<div class="row " ng-repeat="fb in fb_accounts " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-1"><i class="fa fa-shopping-cart fa-2x"></i></div>
											    <!-- <div class="col-sm-2">{{fb.app_id}}</div>
												 <div class="col-sm-2">{{fb.app_secret}}</div>-->
												 <div class="col-sm-4">{{fb.ads_act}}</div>
											      <div class="col-sm-2">{{fb.created_at}}</div>
												 <div class="col-sm-4"><button ng-click="delete_fb(fb.id)">Delete</button></div>
										         <div class="row">
												 <div class="col-sm-6"><button class="btn btn-primary btn-block" ng-click="fb_setupdata(fb.ads_act);">Setup my Revenue Reports</button></div>
												 </div>
												 <!--<div class="col-sm-6"><button class="btn btn-primary btn-block" ng-click="fb_setupdata(fb.app_id,fb.app_secret);">Setup my Revenue Reports</button></div>
												 </div>-->
										
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!stores.length">No Result Found!</div>
									   </div>
									   
									   </div>
									   
									   
									   
									</div>
							</div>
	
	<?php
/* 	
$shop = "alldayfreeshipping";
$api_key = "deca518b2c5181bb52090e5b9a52d256";
$scopes = "read_orders,write_products";
$redirect_uri = "http://localhost/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
  */
 
	?>
 
		
    </section>
    <!-- /.content -->
  </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("inregation", function($scope,$http,$timeout,$window) {
  
  $scope.showComplex = function () {
	  $scope.showModal = true;
  }
 /*  $scope.ok = function() {
  $scope.showModal = false;
}; */
	$scope.addfacebookapi = function () {
	  $scope.showModal_fb = true;
	}




$scope.cancel = function() {
  $scope.showModal = false;
};
$scope.cancel_fb = function() {
  $scope.showModal_fb = false;
};
  
 $scope.loginformsubmit = function ()
 {
	  if ($scope.loginForm.$valid) {
		  /* alert($scope.store.account_name);
		  alert($scope.store.apikey);
		  alert($scope.store.password);
		  alert($scope.store.url) */;
				 $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/intregation/store_fulfillment',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data.status);
				    if(data.status==1)
				 {
					  window.location.href="<?php echo base_url();?>index.php/Intregation";
				 }
				 else
				 {
					 $scope.validationError = true;
				 }  
				
			}); 
			}
  }
  
  $scope.fbloginformsubmit=function()
  {
	  
	  if ($scope.fbloginForm.$valid) {
		  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/intregation/fb_fulfillment',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({app_id:$scope.app_id, app_secret:$scope.app_secret,user_id:<?php echo $user_info->user_interanal_id ;?>})
				data :JSON.stringify({ads_act:$scope.ads_act,user_id:<?php echo $user_info->user_interanal_id ;?>})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data.status);
				   if(data.status==1)
				 {
					  window.location.href="<?php echo base_url();?>index.php/Intregation";
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
	  $scope.ShowHide_fb = function () {
                //If DIV is hidden it will be visible and vice versa.
                $scope.validationError = $scope.validationError ? false : true;
            }		
			
       $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/intregation/store_list',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);

				 $scope.stores =data;
				 
				
			}); 

        
		$http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/intregation/fb_account_list',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                 }).success(function(data) {
				console.log(data);

				 $scope.fb_accounts =data;
				 
				
			});
			
  $scope.setupdata = function (storename,key,password)
           {
                //If DIV is hidden it will be visible and vice versa.
                //$scope.validationError = $scope.validationError ? false : true;
				//alert(storename);
				 $scope.showModal2 = true;
				 $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/intregation/store_setup',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({storename:storename, key:key,password:password})
							 }).success(function(data) {
								 //alert(data);
							     console.log(data);
								 $timeout(function () {
										$scope.showModal2 = false;
									}, 2000);
								
							
						}); 
            }
			
			
   // $scope.fb_setupdata = function (app_id,app_secret)
    $scope.fb_setupdata = function (ads_act)
           {
                //If DIV is hidden it will be visible and vice versa.
                //$scope.validationError = $scope.validationError ? false : true;
				//alert(storename);
				 $scope.showModal2 = true;
				 $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/intregation/fb_setup',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							//data :JSON.stringify({app_id:app_id,app_secret:app_secret})
							data :JSON.stringify({ads_act:ads_act})
							 }).success(function(data) {
								 //alert(data);
							     console.log(data);
								  $timeout(function () {
										$scope.showModal2 = false;
									}, 2000); 
								
							
						}); 
            }
			
			
		$scope.delete_store = function (str) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/intregation/delete_store',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/intregation";
				 }
				 else
				 {
					 //$scope.validationError = true;
				 } 
				
			});
	  
      }   
			   
    }	
	
	$scope.delete_fb = function (str) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/intregation/delete_fb',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/intregation";
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