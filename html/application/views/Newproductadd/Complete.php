<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="supplier">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Create Report</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Complete</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
	<div class="row row-centered">		
		<div class="col-xs-6 col-centered col-min">			
		<h3>Ok, Great! your Product Report Setup Successful!</h3>
		 <div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
			  100%
			</div>
		  </div>
         
		</div>	
        <div class="col-xs-6 col-centered col-min">			
		<a href="<?php echo base_url();?>index.php/Dashboard">Return Home<a>
		</div>


		
    </div>
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
app.controller("supplier", function($scope,$http,$timeout,$window) {
  $scope.init=function()
  {
	    
	
	  
	 
  }
$scope.suppliercostform=function()
{
	
	// alert($scope.productSelected.value);
	//alert($scope.reportid);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/suppliercost/post_suppliercost_other',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		data :JSON.stringify({dist_cost:$scope.dist_cost, dist_shippingcost:$scope.dist_shippingcost,reportid:$scope.reportid})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                 if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/newproductadd/complete";
				 }
				 else
				 {
					 $scope.validationError = true;
				 } 
				
			});
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