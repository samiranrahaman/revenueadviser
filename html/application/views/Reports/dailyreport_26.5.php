<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>        
        <strong>Daily Reports</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">DailyReport</li>
      </ol>
      <br/>       
    </section>--> 

 

    <!-- Main content -->
     <section class="container">
	  <div id="page-wrapper">
        <div class="col-md-12 graphs">
	
           <div class="panel panel-warning bodr">
				<div class="panel-heading">
					<h2>DAILY REPORTS</h2>
					<div class="panel-ctrls" ><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>          
            
            
            <div class="panel-body no-padding table-responsive" style="display: block;">
        
					<table class="table table-striped">
			<!--<table class="table table-bordered firsttable table-striped">-->
			<thead>
			  <tr class="tblma"> 
				<th class="orng">Date</th>
				<th class="orng">Sales</th>
				<th class="orng">Orders</th>
				<th class="orng" title="{{item.product}}" ng-repeat="item in items">{{item.product |limitTo: 8}}</th>
			   <th class="orng">Ads</th>
			   <th class="orng" title="Supplier Cost">Supplier</th>
			   <th class="orng">Fulfillment</th>
			   <th class="orng" title="Gateway Cost">Gateway</th>
			   <th class="orng">Miscellaneous</th>
			   
			   <th class="orng" title="Net sales">NetSales</th>
			   <th class="orng">Net</th>
			   <th class="orng" title="Net AOV" >NetAOV</th>
			    <th class="orng">CPA</th>
			  </tr>
			</thead>
			<tbody>
			  <tr ng-if="value.orders!=0" ng-repeat="value in dailyreports">
				<td>{{value.date}}</td> 
				<td>{{value.sales | currency}}</td> 
				<td>{{value.orders}}</td> 
				<td ng-repeat="item2 in value.products">{{item2.order}}</td> 
				<td>{{value.fb_conversion_inner | currency}}</td> 
				<td>{{value.suppliertotal_cost | currency}}</td> 
				<td>{{value.fulfillment | currency}}</td> 
				<td>{{value.stripe_order | currency}}</td> 
				
				<td>{{value.mis_inner | currency}}</td> 
				
				
				<td>{{value.sales - value.stripe_order | currency}}	</td> 
				
			    <td>{{value.sales-value.stripe_order - (value.fulfillment * value.orders) - value.suppliertotal_cost - value.mis_inner- value.fb_conversion_inner| currency}}</td> 
				
				<td>{{(value.sales-value.stripe_order - (value.fulfillment * value.orders)- value.suppliertotal_cost - value.mis_inner - value.fb_conversion_inner)/value.orders| currency}}</td>
			  <td>{{value.fb_conversion_inner/value.orders | currency}}</td>
			  </tr>
			  <tr ng-if="dailyreports[0].orders=='0'"><td colspan="12">No Result Found!</td></tr>
			</tbody>
		  </table>
 <!-- </div>
  </div>-->
  </div>
	   </div>
    </div>
	</div>
	</section>
    <!-- /.content -->
  </div>
   <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("reports", function($scope,$http,$timeout) { 
	$scope.init=function()
	  {
		 $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/reports/get_dailyreports_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue:0})
							 }).success(function(data) { 
							 console.log(data);
							 $scope.res=data;
							 $scope.items=$scope.res[0].products;
							 console.log($scope.res[0].products);
							  $scope.dailyreports=data;
							 });
	  }
 }); 
</script>
  <style>

  </style>