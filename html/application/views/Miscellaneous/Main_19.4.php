<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="miscellaneous">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Miscellaneous Report</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Miscellaneous</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
	<div class="row row-centered">		
		<div class="col-xs-6 col-centered col-min">			
		<h3>Lets Get your Start!</h3>
					<form  id="miscellaneous" name="miscellaneous" ng-submit="miscellaneousform()" novalidate >
   
	    <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.title.$invalid && !miscellaneous.title.$pristine }">
        <label for="sel1">Miscellaneous Title:</label>
		<input type="text" class="form-control" placeholder="Report Name" id="title" name="title" ng-model="title" required> 
		<p ng-show="miscellaneous.title.$invalid && !miscellaneous.title.$pristine" class="help-block">Report name is required.</p>
        
      </div>
      
	  <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.cost.$invalid && !miscellaneous.cost.$pristine }">
        <label for="sel1">Miscellaneous Cost:</label>
		
		<input type="number" class="form-control" placeholder="Cost" id="cost" name="cost" ng-model="cost" required>    
		<p ng-show="miscellaneous.cost.$invalid && !miscellaneous.cost.$pristine" class="help-block">Cost is required.</p>
        
      </div>
   
     <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.datetime.$invalid && !miscellaneous.datetime.$pristine }">
        <label for="sel1">Miscellaneous Date:</label>
		
		<input type="date" class="form-control" placeholder="datetime" id="datetime" name="datetime" ng-model="datetime" required>    
		<p ng-show="miscellaneous.datetime.$invalid && !miscellaneous.datetime.$pristine" class="help-block">Date is required.</p>
        
      </div>
   
	  
	  
      <div class="form-group">
        <div class="col-xs-4 pull-right">
		        <button type="submit" class="btn btn-primary" ng-disabled="miscellaneous.$invalid">Set Miscellaneous</button>
       </div>
	  </div>
    </form>	
   
	</div>		
    </div>
	</div>
	<div class="content">
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">Miscellaneous Name</div>
											   <div class="col-sm-3">Miscellaneous Date</div>
												 <div class="col-sm-2">Miscellaneous cost</div>
												 <div class="col-sm-3">Action</div>
										         
										</div>
										<div class="row " ng-repeat="miscellaneousitem in miscellaneouslist " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">{{miscellaneousitem.title}}</div>
											   <div class="col-sm-3">{{miscellaneousitem.datetime}}</div>
												 <div class="col-sm-2">${{miscellaneousitem.cost}}</div>
												 <div class="col-sm-3"><button ng-click="delete(miscellaneousitem.id)">Delete</button>|<button>Edit</button></div>
										         
										</div>
										<!--<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;"ng-show="!suppliercost.length">No Result Found!</div>-->
									   
									   
									   
									   
									   
									   
											
	</div>
	
	<style>
/* 	tr th:first-child,
tr td:first-child, tr th:nth-child(3),
tr td:nth-child(3){
    background-color: #3C8DBC;
} */
tr th:first-child,
tr td:first-child{
    background-color: #3C8DBC;
} 
.table-bordered {
    border: 1px solid #64BB44;
}
	</style>

		
    </section>
    <!-- /.content -->
  </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("miscellaneous", function($scope,$http,$timeout,$window) {
	
	
 $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/miscellaneous/get_miscellaneous',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);

				 $scope.miscellaneouslist =data;
				 
				
			}); 
 
$scope.miscellaneousform=function()
{
	
	alert($scope.cost);
	 //alert($scope.productSelected.label);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/miscellaneous/post_miscellaneous',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({cost:$scope.cost, title:$scope.title,datetime:$scope.datetime})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/miscellaneous/";
				 }
				 /* else
				 {
					 $scope.validationError = true;
				 }  */
				
			});
}
 
$scope.delete = function (str) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/miscellaneous/miscellaneous_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/miscellaneous";
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