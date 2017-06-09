
<!DOCTYPE html>
<html>
<head>
 <title>PNL | Feedback</title>
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
         <center> <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logogg.png" height="80px;"></a></center>
    <ul class="tab-group cl-effect-4">
        
         <li class="tab "><a href="<?php echo base_url();?>">Home</a></li>
		<li class="tab active "><a href="<?php echo base_url();?>index.php/login">Feedback Form</a></li>        
    </ul>
    <div class="tab-content1">
        <br>
    <p>Please help us to serve you better by taking a couple of minutes. </p>
    
        
        <div id="signup-agile"> 
           <div style="background-color:green;"class="alert alert-danger alert-dismissible" ng-show="validationsuccess">
		<!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>-->
		 <strong >Feedback Submitted Successfully! </strong>  
		 </div>		
		   <div style="background-color: red;" class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Feedback Not Submitted Successfully! Try Again...</strong>  
		 </div>
          <form  id="regform" name="regform" ng-submit="regformsubmit()" novalidate >
                    <br>
					<p>If you have specific feedback, please write to us...</p>   </br>
                
              <div class="form-group"  ng-class="{ 'has-error' : regform.subject.$invalid && !regform.subject.$pristine }">
			   <p>Select Subject:</p>
				 <select class="form-control1"  id="subject" name="subject"  required ng-model="subject"
					ng-options="opt for opt in feedbacksubject" style="margin: 10px 0 10px 0;">
				</select>
				
				<p ng-show="regform.subject.$invalid && !regform.subject.$pristine" class="help-block">Subject is required.</p>
				</div>
		  
       <div class="form-group"  ng-class="{ 'has-error' : regform.user_feedback.$invalid && !regform.user_feedback.$pristine }" style="margin-top: 24px;">
         <p>Feedback:</p>
		 <textarea id="user_feedback" name="user_feedback" ng-model="user_feedback" required  style="height:150px; width: 100%;background-color: #dadee7;margin: 10px 0 10px 0" ></textarea>
		  <p ng-show="regform.user_feedback.$invalid && !regform.user_feedback.$pristine" class="help-block">Feedback is required.</p>
        
      </div>
      <div class="form-group"  ng-class="{ 'has-error' : regform.user_first_name.$invalid && !regform.user_first_name.$pristine }" style="margin-top: 24px;">
         <p>Your Name:</p>
		 <input type="text" class="form-control" placeholder="Name" id="user_first_name" name="user_first_name" ng-model="user.user_first_name" required style="margin: 10px 0 10px 0;">
		    <p ng-show="regform.user_first_name.$invalid && !regform.user_first_name.$pristine" class="help-block">Name is required.</p>
        
      </div> 
      
	   <div class="form-group"  ng-class="{ 'has-error' : regform.user_email_id.$invalid && !regform.user_email_id.$pristine }" style="margin-top: 24px;">
        <p>Your Email:</p>
		<input type="email" class="form-control" placeholder="Email" id="user_email_id" name="user_email_id" ng-model="user.user_email_id" required style="margin: 10px 0 10px 0;" >
		    <p ng-show="regform.user_email_id.$invalid && !regform.user_email_id.$pristine" class="help-block">Email Id is required.</p>
        
      </div>
	  
	   
      <div class="row">
       
        
        <div class="col-xs-4 pull-right">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="regform.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="btn btn-primary register" ng-disabled="regform.$invalid">Submit Feedback</button>
        
        
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
  $scope.feedbacksubject=['Login Page','Registration Page','Welcome Page','Profit Analysis','Shipping Analysis',
							'Daily Reports','Yearly Reports','MyProduct Page','View Report Page','Create Report',
							'Simulator','Miscellaneous Report','Intregation Shopify','Intregation Fb Account'];
  $scope.regformsubmit = function () {
	 
			if ($scope.regform.$valid) {
				
					$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/feedback/feedback_data',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        //headers: {'Content-Type': 'application/json'},
			//data :{"myformdata" :JSON.stringify({username:$scope.user.username, passwrd:$scope.user.passwrd})}
			data :JSON.stringify({user_first_name:$scope.user.user_first_name, 
			                      user_feedback:$scope.user_feedback,
			                      user_email_id:$scope.user.user_email_id,
								  subject:$scope.subject})
			     }).success(function(data) {
				 console.log(data);
				 //alert(data.status);
                 if(data>0)
				 {
					 // window.location.href="<?php echo base_url();?>index.php/Login";
					  $scope.validationsuccess = true;
					  $scope.user.user_first_name='';
					  $scope.user_feedback='';
					  $scope.user.user_email_id='';
					  $scope.subject='';
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
