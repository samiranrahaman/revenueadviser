<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="userlist">
 
    <section class="content">
							
		<div id="page-wrapper">
           <div class="col-md-12 graphs">

						<!--<div class="xs col-md-12">
					       <h3>Your live reports are listed below - View or Edit them under Actions</h3>
				        </div>-->
						 <div class="xs col-md-12">
						   <h3>User List</h3>
						   </div>
							
							<div class="clearfix"> </div>
            
				<div class="panel-body no-padding table-responsive" style="display: block;">
				
		  
		         <table class="tablev">
			   <thead>
			   <tr style="background-color: #0f75bc;height: 52px;">
					  <th class="text-l  col-sm-2 ">Name</th>
					   <th class="text-l  col-sm-1 ">Mobile No</th>
						 <th class="text-l  col-sm-2 ">Email</th>
						 <th class="text-l  col-sm-1 ">Username</th>
						 <th class="text-l  col-sm-1 ">Subscription</th>
						  <th class="text-l  col-sm-4 ">Action</th>
						  
					 
					</tr>
			   <thead>
			   
				<tbody>

					<tr ng-repeat="user in users ">
					  <th class="text-l  col-sm-2 ">{{user.user_first_name}} {{user.user_last_name}}</th>
					   <th class="text-l  col-sm-1 ">{{user.user_mobile_number}}</th>
						 <th class="text-l  col-sm-2 ">{{user.user_email_id}}</th>
						 <th class="text-l  col-sm-1 ">{{user.user_username}}</th>
						 <th class="text-l  col-sm-1 ">{{user.subscription}}</th>
						  
					  <th class="col-sm-4 ">		
						<a class="edbtn" style="" href="<?php echo base_url();?>index.php/newproductadd/othercostedit/{{user.user_interanal_id">Edit</a>
						 <button class="dlbtn2" ng-click="delete(user.user_interanal_id)">Delete</button>
						 
					  </th>
					</tr>
					<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #ff99001a;"ng-show="!users.length">No Result Found!</div>

				</tbody>
			  </table>
		        </div>
		   <!-- </div>-->
	</div>
	</div>
 
		
    </section>
    <!-- /.content -->
  </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("userlist", function($scope,$http,$timeout,$window) {
	
				$http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/admin/getuserlist',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);
                 if(data=='null')
				 {
					 $scope.users =0;
				 }
				 else
				 {
					 $scope.users =data;
				 }
				 
				
			}); 
			
			
				   
			
	$scope.delete = function (str) 
       {
           
		   var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

		if (deleteUser) {
      
	 // alert(str);
		$http({
        method : 'POST',
				url : '<?php echo base_url();?>index.php/reports/report_delete',
				
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						data :JSON.stringify({id:str})
					}).success(function(data) {
						 console.log(data);
						 //alert(data);
						if(data==1)
						 {
							  //$scope.validationESuccess = true;
							   window.location.href="<?php echo base_url();?>index.php/reports";
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
  