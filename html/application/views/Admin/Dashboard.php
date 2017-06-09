<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
 
    <section class="content">
							
		<div id="page-wrapper">
           <div class="col-md-12 graphs">

						<!--<div class="xs col-md-12">
					       <h3>Your live reports are listed below - View or Edit them under Actions</h3>
				        </div>-->
						 <div class="xs col-md-12">
						   <h3>Admin Dashboard</h3>
						   </div>
							
							<div class="clearfix"> </div>
            
				<div class="panel-body no-padding table-responsive" style="display: block;">
				
		  
		        </div>
		   <!-- </div>-->
	</div>
	</div>
 
		
    </section>
    <!-- /.content -->
  </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("reports", function($scope,$http,$timeout,$window) {
	
	 $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/reports/get_setup_productlist',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);
                 if(data=='null')
				 {
					 $scope.setupproducts =0;
				 }
				 else
				 {
					 $scope.setupproducts =data;
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
  