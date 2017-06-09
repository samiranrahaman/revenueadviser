<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Reports</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Reports</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
							
							
							<div class="container">
									<div class="row row-centered">
									   
									   <div class="col-xs-12 col-centered col-min">
									   <h3>Your live reports are listed below.View or Edit them under Actions</h3>
									   <div class="content">
									   <div class="row " >
							 <div class="col-sm-12" style="text-align: left;background-color: #3c8dbc;padding: 16px 8px 19px 16px;color: #fff;">Testing Sore</div></div>
										<div class="row " ng-repeat="prodctitem in setupproducts " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-2">{{prodctitem.report_name}}</div>
											   <div class="col-sm-3">{{prodctitem.setup_date}}</div>
												 <div class="col-sm-2">{{prodctitem.total_price | currency}}</div>
												 <div class="col-sm-4">
												 <a class="btn btn-info" style="padding: 0px 15px 5px 9px;" href="<?php echo base_url();?>index.php/reports/viewreport/{{prodctitem.id}}">View</a>|
												 <button class="btn-danger" ng-click="delete(prodctitem.id)">Delete</button>|
												 <button class="btn-info" ng-click="edit(prodctitem.id)" >Edit</button></div>
										         
										
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!setupproducts.length">No Result Found!</div>
									   
									   
									   
									   
									   
									   
											
									   </div>
									   
									   </div>
									   
									   
									   
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

				 $scope.setupproducts =data;
				 
				
			}); 
			
			
				   
			
	$scope.delete = function (str) 
       {
           
		   var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

		if (deleteUser) {
      
	  
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