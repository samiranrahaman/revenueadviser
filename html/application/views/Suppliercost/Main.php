<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="supplier">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Supplier Cost</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Suppliercost</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<div class="container">
	<div class="row">		
		<div class="col-sm-6">			
		<div class="alert alert-danger alert-dismissible" ng-show="validationError">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Form submit failed! Try Again...</strong>
		 </div>
		 <div class="alert alert-danger alert-dismissible" ng-show="validationESuccess">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="ShowHide()"   >×</button>
		 <strong>Form submit Successful.</strong>
		 </div>
   <!--<form method="post" id="loginForm" name="loginForm" action="<?php echo base_url();?>index.php/Dashboard">-->
   <form  id="suppliercost" name="suppliercost" ng-submit="suppliercostform()" novalidate >
   
      <div class="form-group"  ng-class="{ 'has-error' : suppliercost.productlist.$invalid && !suppliercost.productlist.$pristine }">
	  
				<label for="sel1">Select Product:</label>
				<!--<select  class="form-control"  id="productlist" name="productlist" ng-model="supplier.productlist" required >
	               
					 <option ng-repeat="item in products" value="{{item.variants_id}}">
                        {{item.product}}
					</option>
				</select>-->
			 <select class="form-control"  id="productlist" name="productlist"  required ng-model="productSelected"
                ng-options="opt as opt.label for opt in options">
            </select>
        	
		<p ng-show="suppliercost.productlist.$invalid && !suppliercost.productlist.$pristine" class="help-block">Product is required.</p>
	  </div>
   
      <div class="form-group"  ng-class="{ 'has-error' : suppliercost.quantity.$invalid && !suppliercost.quantity.$pristine }">
        <label for="sel1">Product Supplier Quantity:</label>
		<input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity" ng-model="suppliercost.quantity" required >
		    <p ng-show="suppliercost.quantity.$invalid && !suppliercost.quantity.$pristine" class="help-block">Quantity  is required.</p>
        
      </div> 
      <div class="form-group has-feedback" ng-class="{ 'has-error' : suppliercost.cost.$invalid && !suppliercost.cost.$pristine }">
        <label for="sel1">Product Supplier Cost:</label>
		
		<input type="number" class="form-control" placeholder="Cost" id="cost" name="cost" ng-model="suppliercost.cost" required>    
		<p ng-show="suppliercost.cost.$invalid && !suppliercost.cost.$pristine" class="help-block">Cost is required.</p>
        
      </div>
	  
	   <div class="form-group has-feedback" ng-class="{ 'has-error' : suppliercost.date.$invalid && !suppliercost.date.$pristine }">
        <label for="sel1">Supply Date:</label>
		
		<input type="date" class="form-control" placeholder="date" id="date" name="date" ng-model="suppliercost.date" required>    
		<p ng-show="suppliercost.date.$invalid && !suppliercost.date.$pristine" class="help-block">Date is required.</p>
        
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
        
        <div class="col-xs-4 pull-right">
		         <!-- <input type="submit" id="submit" name="submit" value="Sign In" ng-disabled="loginForm.$invalid" class="btn btn-primary btn-block btn-flat"/>-->
				  <button type="submit" class="btn btn-primary" ng-disabled="suppliercost.$invalid">Submit</button>
        
        
        <!-- /.col -->
      </div>
    </form>	
	</div>		
    </div>
	</div>
	
	
	<div class="content">
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">Product Name</div>
											   <div class="col-sm-3">Quantity</div>
												 <div class="col-sm-2">cost</div>
												 <div class="col-sm-3">Action</div>
										         
										</div>
										<div class="row " ng-repeat="supcost in suppliercost " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											
											  <div class="col-sm-4">{{supcost.product_name}}</div>
											   <div class="col-sm-3">{{supcost.quantity}}</div>
												 <div class="col-sm-2">{{supcost.cost}}</div>
												 <div class="col-sm-3"><button ng-click="delete(supcost.id)">Delete</button>|<button>Edit</button></div>
										         
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
app.controller("supplier", function($scope,$http,$timeout,$window) {
  $scope.init=function()
  {
	    /* $scope.operators = [
        {value: 'eq', displayName: 'equals'},
        {value: 'neq', displayName: 'not equal'}
     ] ; */ 
	  /* $scope.options = [
          { value: '1', label:'hosting1' },
          { value: '2', label:'hosting2' },
          { value: '3', label:'hosting3' }
      ] */
	
	 $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/suppliercost/get_productlist',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							//data :JSON.stringify({datevalue:'2015'})
							 }).success(function(data) {
								//alert(data);
								//$scope.products=data;
									$scope.options=data;
								//console.log(data);
									//for(var i=0; l=data.leangth); l<1 ;i++)
								/* for (var i = 0, l = $scope.products.length; i < l; i++) 	
									{
										console.log(data[i].product);
										
									} */
								 
						});
	 
	 
	 $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/suppliercost/supplierproduct_cost_list',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);

				 $scope.suppliercost =data;
				 
				
			}); 
	 
  }
$scope.suppliercostform=function()
{
	
	// alert($scope.productSelected.value);
	 //alert($scope.productSelected.label);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/suppliercost/post_suppliercost',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({quantity:$scope.suppliercost.quantity, cost:$scope.suppliercost.cost,value:$scope.productSelected.value,label:$scope.productSelected.label,datevalue:$scope.suppliercost.date})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/Suppliercost";
				 }
				 else
				 {
					 $scope.validationError = true;
				 } 
				
			});
}
 
$scope.delete = function (str) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/suppliercost/supplierproduct_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/Suppliercost";
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