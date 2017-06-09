<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="supplier">
    <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
      <h1>        
        <strong>Edit Report</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Edit report</li>
      </ol>
      <br/>       
    </section>--> 

 

    <!-- Main content -->
    <section class="content">
	
	<div id="page-wrapper">
		<div class="col-md-12 graphs">
				
			<div class="xs col-md-12">
			   <h3>Edit Report's Data</h3>
		   </div>
			 <div class="clearfix"> </div>   
				
			   <div class="hr-divider m-t m-b-md">
					<h3 class="hr-divider-content hr-divider-heading">LETS GET!</h3>
			  </div>
            <div class="clearfix"> </div>
			
		<div class="well1 white">
            
			
   <!--<form method="post" id="loginForm" name="loginForm" action="<?php echo base_url();?>index.php/Dashboard">-->
   <form  id="suppliercost" name="suppliercost" ng-submit="suppliercostform()" novalidate >
   <fieldset>
    <input style="display: none;" ng-init="reportid='<?php echo $reportID;?>'" type="text" name="reportid" ng-model="reportid"  ng-value="<?php echo $reportID;?>"/>
	
	<div class="form-group" ng-class="{ 'has-error' : suppliercost.dist_cost.$invalid && !suppliercost.dist_cost.$pristine }">
        <label for="control-label">Product cost from Distributor:</label>
		<input type="text" class="form-control1" placeholder="Distributor Cost" id="dist_cost" name="dist_cost" ng-model="dist_cost" required> 
		
		<!--<input type="text" class="form-control" placeholder="Report Name" id="reportname" name="reportname" ng-model="suppliercost.reportname" required> -->   
		<p ng-show="suppliercost.dist_cost.$invalid && !suppliercost.dist_cost.$pristine" class="help-block">Distributor Cost is required.</p>
       </div>
	   <div class="form-group " ng-class="{ 'has-error' : suppliercost.dist_shippingcost.$invalid && !suppliercost.dist_shippingcost.$pristine }">
        <label for="control-label">Distributor  Shipping Costs:</label>
		<input type="text" class="form-control1" placeholder="Distributor Shipping Cost" id="dist_shippingcost" name="dist_shippingcost" ng-model="dist_shippingcost" required> 
		
		<!--<input type="text" class="form-control" placeholder="Report Name" id="reportname" name="reportname" ng-model="suppliercost.reportname" required> -->   
		<p ng-show="suppliercost.dist_shippingcost.$invalid && !suppliercost.dist_shippingcost.$pristine" class="help-block">Distributor Cost is required.</p>
       </div>
	   
	     
		 <div class="form-group " ng-class="{ 'has-error' : suppliercost.packaging.$invalid && !suppliercost.packaging.$pristine }">
        <label for="control-label">Packaging Costs:</label>
		<input type="text" class="form-control1" placeholder="Packaging Shipping Cost" id="packaging" name="packaging" ng-model="packaging" required> 
		<p ng-show="suppliercost.packaging.$invalid && !suppliercost.packaging.$pristine" class="help-block">Packaging Cost is required.</p>
       </div>
	  <div class="form-group " ng-class="{ 'has-error' : suppliercost.ship_delevery.$invalid && !suppliercost.ship_delevery.$pristine }">
        <label for="control-label">Shipping/delevery Costs:</label>
		<input type="text" class="form-control1" placeholder="Shipping/delevery Cost" id="ship_delevery" name="ship_delevery" ng-model="ship_delevery" required> 
		<p ng-show="suppliercost.ship_delevery.$invalid && !suppliercost.ship_delevery.$pristine" class="help-block">Shipping/delevery Cost is required.</p>
       </div>
	  
	    <div class="form-group " >
        <label for="control-label">Gateway Fixed Charges:</label>
	
	<input type="text" class="form-control1" placeholder="Gateway Charges in persent" id="gate_charge_fix" name="gate_charge_fix" ng-model="gate_charge_fix" > 	
       </div>
	  
	  <div class="form-group " >
        <label for="control-label">Gateway percentage Charges:</label>
	
	<input type="text" class="form-control1" placeholder="Gateway Charges in persent" id="gate_charge_percent" name="gate_charge_percent" ng-model="gate_charge_percent" > 	
       </div>
	   
	   
	   <div class="form-group " >
        <label for="control-label">Apply Facebook Conversion? <input type="checkbox" ng-true-value="1" ng-false-value="0"  ng-model="myVar"></label>
	                       <div ng-show="myVar">
							 <select class="form-control1"  id="fb_ads_campaign" name="fb_ads_campaign"  ng-model="fb_ads_campaign"
                ng-options="opt.ads_id as opt.label for opt in campaignlist">
            </select>
							</div>
	   
	   </div>
	   
	  	  <div class="progress-box" ng-app>
		  <div class="percentage-cur" ng-init="selectedRange=0">
			Desire Product Margin <span class="num">{{ selectedRange }}%</span>
		  </div>
		  <div class="progress-bar progress-bar-slider">
			<input class="progress-slider" type="range" min="0" max="100" ng-model="selectedRange">
			<div class="inner" ng-style="{ width: selectedRange + '%' || '0%' }"></div>
		  </div>
		</div>
	  
	   <div class="clearfix"> </div>
	  
	  
      <div class="form-group">
        <div class="col-xs-4 pull-right">
		        <button type="submit" class="btn btn-dange" ng-disabled="suppliercost.$invalid">Complete Report</button>
       </div>
	   </div>
	     </fieldset>
    </form>	
			
    </div>
	</div>
	</div>
	</section>
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

 
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("supplier", function($scope,$http,$timeout,$window) {
  $scope.init=function()
  {
	  $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/suppliercost/get_campaignlist',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							//data :JSON.stringify({datevalue:'2015'})
							 }).success(function(data) {
								$scope.campaignlist=data;
						});
	  $timeout(function ()
			   {
					//	alert($scope.reportid);	
						 
							$http({
							method : 'POST',
							url : '<?php echo base_url();?>index.php/suppliercost/get_suppliercost_other',
							
									headers: {'Content-Type': 'application/x-www-form-urlencoded'},
									data :JSON.stringify({reportid:$scope.reportid,
							})
							}).success(function(data) {
								 console.log(data);
								 console.log(data[0].dist_cost);
								 $scope.dist_cost=data[0].dist_cost; 
								 
								 $scope.dist_shippingcost=data[0].dist_shippingcost;
								 $scope.gate_charge_fix=data[0].gate_charge_fix;
								 $scope.gate_charge_percent=data[0].gate_charge_percent;
								 $scope.packaging=data[0].packaging_cost;
								 
								 
								 $scope.desire_margin=data[0].desire_margin;
								 $scope.ship_delevery=data[0].shipping_cost;
								 $scope.selectedRange=data[0].desire_margin;
								  $scope.fb_ads_campaign=data[0].ads_id;
								 if(data[0].ads_id>0)
								 {
									 $scope.myVar=1;
								 }
								
								//alert(data);
								 /* if(data==1)
								 {
									  //$scope.validationESuccess = true;
									  window.location.href="<?php echo base_url();?>index.php/newproductadd/complete";
								 }
								 else
								 {
									 $scope.validationError = true;
								 } */ 
								
							});
						
						
						
						
						
									
				}, 2000); 
	  
	    

	  
	 
  }
$scope.suppliercostform=function()
{
	
	// alert($scope.productSelected.value);
     //alert($scope.myVar);
	 var adsid='';
	    if($scope.myVar==0)
		{
			adsid=0;
			
		}
		else
		{
			adsid=$scope.fb_ads_campaign;
			
		} 
	// alert(adsid);
		 $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/suppliercost/post_suppliercost_other',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		data :JSON.stringify({dist_cost:$scope.dist_cost, dist_shippingcost:$scope.dist_shippingcost,reportid:$scope.reportid,
		packaging:$scope.packaging,
		ship_delevery:$scope.ship_delevery,
		gate_charge_fix:$scope.gate_charge_fix,
		gate_charge_percent:$scope.gate_charge_percent,
		desire_margin:$scope.selectedRange,
		fb_ads_campaign:adsid,
		})
			}).success(function(data) {
				 console.log(data);
				//alert(data);
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
  
  <!--desire bar-->
  
  
  	.progress-box {
	width: 100%;
	margin: 20px 0;
}

.progress-box .percentage-cur .num {
	margin-right: 5px;
}

.progress-box .progress-bar {
	width: 100%;
	height: 12px;
	background: #f2f1f1;
	margin-bottom: 3px;
	border: 1px solid #dfdfdf;
	box-shadow: 0 0 2px #D5D4D4 inset;
  position: relative;
}

.progress-box .progress-bar .inner {
  position: relative;
	width: 0;
	height:100%;
	background: #239bd6; 
}

.progress-bar .inner {
	height: 0;
	width: 0;
	transition: all 1s ease-out;
}

.progress-bar-slider .inner {
  transition: none;
}

.progress-bar-slider .inner:after {
  content: " ";
  width: 5px;
  height: 14px;;
  background-color:#ccc;
  position: absolute;
  right: -2px;
  top: -2px;
  border: 1px solid #bbb;
  border-radius: 2px;
  box-shadow: 0px 0px 2px rgba(0,0,0,0.3);
  margin: 0px;
}

.progress-slider {
  opacity: 0;
  width: 100%;
  height: 15px;
  position: absolute;
  top: 0px;
  left: 0px;
  cursor: pointer;
  z-index: 1;
}
  
  
  
  
  
  
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