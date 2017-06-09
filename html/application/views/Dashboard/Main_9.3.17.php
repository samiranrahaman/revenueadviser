<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>Dashboard</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Dashboard</li>
      </ol>
      <br/>       
    </section> 

 

    <!-- Main content -->
    <section class="content">
        
	<!--<div class="container">
			<div class="row row-centered">
			   <div class="col-xs-6 col-centered col-min">
			   <div class="item"> 
			   <div class="content">
			   <h1 style="text-align: center;"><b><span>welcome,</span></br>Watch this video to get started.</b></h1>
			   <iframe width="650" height="315" src="https://www.youtube.com/embed/v9QXDSk6jFo" frameborder="0" allowfullscreen>
			   </iframe>
			   </div>
			   </div>
			   </div>
			</div>-->
			
			
			
			<div class="row" >		
				<div class="col-sm-3">		   
			  <table class="table table-bordered firsttable">
				<thead>
				  <tr>
					<th >Year</th>
					<th>
					
				       <select ng-init="selecteddate=options[2]" ng-change="update()" class="form-control"  id="selecteddate" name="selecteddate"  required ng-model="selecteddate"
                          ng-options="opt as opt.label for opt in options">
                        </select>
	
					</th>
				 </tr>
				</thead>
				<tbody>
				 <tr>
					<td>Sales</td><td >{{sales | currency}}</td>
				  </tr>
				  <tr>
					<td>Orders</td><td>{{orders}}</td>
				  </tr>
				 <tr ng-repeat="value in products">
				   <td title="{{value.product}}" tooltip-placement="left">{{value.product|limitTo: 10}}...</td><td>{{value.order}}</td>
				  </tr>
				  
				  <tr>
					<td>Ads</td><td>$0</td>
				  </tr>
				  <tr>
					<td>Supplier Cost</td><td>{{suppliertotal_cost | currency}}</td>
					
				  </tr>
				  <tr>
					<td>Fulfillment</td><td>{{fulfillment * orders | currency}}</td>
					
				  </tr>
				  <tr>
					<td>Stripe Cost</td><td>{{stripe_order | currency}}</td>
					
					
				  </tr>
				  <tr>
					<td>  Net sales</td>
					<td>{{sales - stripe_order | currency}}</td>
					
					
				  </tr>
				   <tr>
					<td>Net</td>
					<td>{{sales-stripe_order - fulfillment * orders - suppliertotal_cost | currency}}</td>
					
				  </tr>
				    <tr>
					<td>Net AOV</td>
					<td>{{sales/orders | currency}}</td>
					
				  </tr>
				   <tr>
					<td>CPA</td>
					<td>{{0/orders | currency}}</td>
					
				  </tr>
				
				  
				  	
						
				</tbody>
			  </table>
			  </div>
			 <div class="col-sm-3">
			  <table class="table table-bordered firsttable">
				<thead>
				  <tr> 
				       <th>Year-month</th>
					   <th>{{year}}-01</th>
				  </tr>
				</thead>
				<tbody>
				 <tr>
					<td>Sales</td><td >{{sales1 | currency}}</td>
				  </tr>
				  <tr>
					<td>Orders</td><td>{{orders1}}</td>
				  </tr>
				 <tr ng-repeat="value1 in products1">
				   <td title="{{value1.product}}" tooltip-placement="left">{{value1.product|limitTo: 10}}</td><td>{{value1.order}}</td>
				  </tr>
				  
				  <tr>
					<td>Ads</td><td>$0</td>
				  </tr>
				  <tr>
					<td>Supplier Cost</td><td>{{suppliertotal_cost1 | currency}}</td>
					
				  </tr>
				  <tr>
					<td>Fulfillment</td><td>{{fulfillment1 * orders1 | currency}}</td>
					
				  </tr>
				  <tr>
					<td>Stripe Cost</td><td>{{stripe_order1 | currency}}</td>
					
					
				  </tr>
				  <tr>
					<td>  Net sales</td>
					<td>{{sales1 - stripe_order1 | currency}}</td>
					
					
				  </tr>
				   <tr>
					<td>Net</td>
					<td>{{sales1-stripe_order1 - fulfillment1 * orders1 - suppliertotal_cost1 | currency}}</td>
					
				  </tr>
				    <tr>
					<td>Net AOV</td>
					<td>{{netaov1 | currency}}</td>
					
				  </tr>
				   <tr>
					<td>CPA</td>
					<td>{{0/orders | currency}}</td>
					
				  </tr>
				
				  
				  	
						
				</tbody>
			  </table>
			</div>
			<div class="col-sm-7" style="width:43em;overflow-x: auto;white-space: nowrap;margin-left: -53px;">
			<!--<div class="col-sm-1" data-ng-repeat="i in [2,3,4,5,6,7,8,9,10,11,12]">--> 
			<div class="col-sm-1" data-ng-repeat="i in [2,3,4,5,6]">
			  <table class="table table-bordered">
				<thead>
				  <tr> 
				       <th>{{year}}-{{i}}</th>
					   
				  </tr>
				</thead>
				<tbody>
				 <tr>
					<td ng-if="i==2" >{{sales2| currency}}</td>
					<td ng-if="i==3" >{{sales3| currency}}</td>
					<td ng-if="i==4" >{{sales4| currency}}</td>
					<td ng-if="i==5" >{{sales5| currency}}</td>
					<td ng-if="i==6" >{{sales6| currency}}</td>
					
					
				 </tr>
				  <tr>
					<td ng-if="i==2">{{orders2}}</td>
					<td ng-if="i==3">{{orders3}}</td>
					<td ng-if="i==4">{{orders4}}</td>
					<td ng-if="i==5">{{orders5}}</td>
					<td ng-if="i==6">{{orders6}}</td>
				  </tr>
				 
				  <tr  ng-if="i==2" ng-repeat="value2 in products2">
				  <td>{{value2.order}}</td>
				  </tr>
				  <tr  ng-if="i==3" ng-repeat="value3 in products3">
				  <td>{{value3.order}}</td>
				  </tr>
				 <tr  ng-if="i==4" ng-repeat="value4 in products4">
				  <td>{{value4.order}}</td>
				 </tr>
				<tr  ng-if="i==5" ng-repeat="value5 in products5">
				  <td>{{value5.order}}</td>
				 </tr>
				 <tr  ng-if="i==6" ng-repeat="value6 in products6">
				  <td>{{value6.order}}</td>
				 </tr>
				 <tr>
					<td>$0</td>
				  </tr>
				  <tr>
					<td ng-if="i==2">{{suppliertotal_cost2 | currency}}</td>
					<td ng-if="i==3">{{suppliertotal_cost3 | currency}}</td>
					<td ng-if="i==4">{{suppliertotal_cost4 | currency}}</td>
					<td ng-if="i==5">{{suppliertotal_cost5 | currency}}</td>
					<td ng-if="i==6">{{suppliertotal_cost6 | currency}}</td>
					
				  </tr>
				  <tr>
					<td ng-if="i==2" >{{fulfillment2 * orders2| currency}}</td>
					<td ng-if="i==3" >{{fulfillment3 * orders3| currency}}</td>
					<td ng-if="i==4" >{{fulfillment4 * orders4| currency}}</td>
					<td ng-if="i==5" >{{fulfillment5 * orders5| currency}}</td>
					<td ng-if="i==6" >{{fulfillment6 * orders6| currency}}</td>
					
				  </tr>
				  <tr>
					<td ng-if="i==2">{{stripe_order2 | currency}}</td>
					<td ng-if="i==3">{{stripe_order3 | currency}}</td>
					<td ng-if="i==4">{{stripe_order4 | currency}}</td>
					<td ng-if="i==5">{{stripe_order5 | currency}}</td>
					<td ng-if="i==6">{{stripe_order6 | currency}}</td>
					
				  </tr>
				  <tr>
					
					<td ng-if="i==2">{{sales2 - stripe_order2 | currency}}</td>
					<td ng-if="i==3">{{sales3 - stripe_order3 | currency}}</td>
					<td ng-if="i==4">{{sales4 - stripe_order4 | currency}}</td>
					<td ng-if="i==5">{{sales5 - stripe_order5 | currency}}</td>
					<td ng-if="i==6">{{sales6 - stripe_order6 | currency}}</td>
					
					
				  </tr>
				   <tr>
				
					<td ng-if="i==2" >
					{{sales2-stripe_order2 - fulfillment2 * orders2 - suppliertotal_cost2 | currency}}
					</td>
					<td ng-if="i==3" >
					{{sales3-stripe_order3 - fulfillment3 * orders3 - suppliertotal_cost3 | currency}}
					</td>
					<td ng-if="i==4" >
					{{sales4-stripe_order4 - fulfillment4 * orders4 - suppliertotal_cost4 | currency}}
					</td>
					<td ng-if="i==5" >
					{{sales5-stripe_order5 - fulfillment5 * orders5 - suppliertotal_cost5 | currency}}
					</td>
					<td ng-if="i==6" >
					{{sales6-stripe_order6 - fulfillment6 * orders6 - suppliertotal_cost6 | currency}}
					</td>
				  </tr>
				    <tr>
					
					<td ng-if="i==2">{{netaov2 | currency}}</td>
					<td ng-if="i==3">{{netaov3 | currency}}</td>
					<td ng-if="i==4">{{netaov4 | currency}}</td>
					<td ng-if="i==5">{{netaov5 | currency}}</td>
					<td ng-if="i==6">{{netaov6 | currency}}</td>
					
					
				  </tr>
				   <tr>
					<td ng-if="i==2">{{0/orders | currency}}</td>
					<td ng-if="i==3">{{0/orders | currency}}</td>
					<td ng-if="i==4">{{0/orders | currency}}</td>
					<td ng-if="i==5">{{0/orders | currency}}</td>
					<td ng-if="i==6">{{0/orders | currency}}</td>
					
					
				  </tr>
				
				  
				  	
						
				</tbody>
			  </table>
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
 $scope.options = [
          { value: '2015', label:'2015' },
          { value: '2016', label:'2016' },
          { value: '2017', label:'2017' }
      ] 
               

			   $timeout(function ()
			   {
							//alert($scope.selecteddate.value);
							var datevalue=$scope.selecteddate.value;
							
							$scope.update();   
							
								
							
									
				}, 2000);  			
	       
          
		    		   
					   
					   
  }
  $scope.update = function () {
	  //alert($scope.selecteddate.value);
	  var datevalue=$scope.selecteddate.value;
	  alert(datevalue);
	   $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/reports/get_reports_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue:datevalue})
							 }).success(function(data) {
								
									$scope.res=data;
									 console.log(data); 
									// console.log($scope.res[0].years);
											$scope.sales=$scope.res[0].sales;
											$scope.orders=$scope.res[0].orders;
											$scope.year=$scope.res[0].years;
											
											
											$scope.suppliertotal_cost=$scope.res[2].suppliertotal_cost;
											$scope.fulfillment=$scope.res[3].fulfillment;
											$scope.stripe_order=$scope.res[4].stripeorder;
											
										 	
											
										/* for (var i = 0, l = $scope.res[1].length; i < l; i++) 
										{
											console.log($scope.res[1][i].product);
											console.log($scope.res[1][i].order);
											
										} */
										
									$scope.products=$scope.res[1]; 
									//$scope.array=data; 
									
									//alert($scope.res[6].s2017_2.length);
								//	$scope.month_dates=$scope.res[6].s2017_2; 
								      for (var i = 0, l = $scope.res[5].s2017_1.length; i < l; i++) 
										{
											 if(i==0)
											{
												if($scope.res[5].s2017_1[i].sales>0)
												{
													$scope.sales1=$scope.res[5].s2017_1[i].sales;
												}
												else
												{
													$scope.sales1=0;
												}
											
											 if($scope.res[5].s2017_1[i].orders>0)
											 {
												 $scope.orders1=$scope.res[5].s2017_1[i].orders;
											 }
											 else
											 {
												 $scope.orders1=0;
											 }
											 
											 if($scope.res[5].s2017_1[i].years>0)
												 
												 {
													 $scope.year1=$scope.res[5].s2017_1[i].years;
												 }
												 else
												 {
													 $scope.year1=0;
												 }
											
											
											
											}
											if(i==1)
											{
												$scope.products1=$scope.res[5].s2017_1[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost1= $scope.res[5].s2017_1[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment1= $scope.res[5].s2017_1[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order1=$scope.res[5].s2017_1[i].stripeorder;
										
											}
											 
											 var sami1=$scope.sales1/$scope.orders1;
											 if(sami1>0)
											 {
												 $scope.netaov1=sami1;
											 }
											 else
											 {
												 $scope.netaov1=0;
											 }
										}
										 for (var i = 0, l = $scope.res[6].s2017_2.length; i < l; i++) 
										{
											 if(i==0)
											{
											
												if($scope.res[6].s2017_2[i].sales>0)
												{
													$scope.sales2=$scope.res[6].s2017_2[i].sales;
												}
												else
												{
													$scope.sales2=0; 
												}
												if($scope.res[6].s2017_2[i].orders>0)
												{
													$scope.orders2=$scope.res[6].s2017_2[i].orders;
												}
												else
												{
													$scope.orders2=0;
												}
												if($scope.res[6].s2017_2[i].years>0)
												{
													$scope.years2=$scope.res[6].s2017_2[i].years;
												}
												else
												{
													$scope.years2=0;
												}
												
											
											}
											if(i==1)
											{
												$scope.products2=$scope.res[6].s2017_2[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost2= $scope.res[6].s2017_2[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment2= $scope.res[6].s2017_2[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order2=$scope.res[6].s2017_2[i].stripeorder;
										
											}
											 var sami2=$scope.sales2/$scope.orders2;
											 if(sami2>0)
											 {
												 $scope.netaov2=sami2;
											 }
											 else
											 {
												 $scope.netaov2=0;
											 }
											
										} 	 
									 
									  for (var i = 0, l = $scope.res[7].s2017_3.length; i < l; i++) 
										{
											 if(i==0)
											{
											
											if($scope.res[7].s2017_3[i].sales>0)
											{
												$scope.sales3=$scope.res[7].s2017_3[i].sales;
											}
											else
											{
												$scope.sales3=0; 
											}
											if($scope.res[7].s2017_3[i].orders>0)
											{
												$scope.orders3=$scope.res[7].s2017_3[i].orders;
											}
											else
											{
												$scope.orders3=0;
											}
											if($scope.res[7].s2017_3[i].years>0)
											{
												$scope.years3=$scope.res[7].s2017_3[i].years;
											}
											else
											{
												$scope.years3=0;
											}
											
											
											}
											if(i==1)
											{
												$scope.products3=$scope.res[7].s2017_3[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost3= $scope.res[7].s2017_3[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment3= $scope.res[7].s2017_3[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order3=$scope.res[7].s2017_3[i].stripeorder;
										
											}
											
											var sami3=$scope.sales3/$scope.orders3;
											 if(sami3>0)
											 {
												 $scope.netaov3=sami3;
											 }
											 else
											 {
												 $scope.netaov3=0;
											 }
											 
											
										} 	 
									 for (var i = 0, l = $scope.res[8].s2017_4.length; i < l; i++) 
										{
											 if(i==0)
											{
												if($scope.res[8].s2017_4[i].sales>0)
												{
													$scope.sales4=$scope.res[8].s2017_4[i].sales;
												}
												else
												{
													$scope.sales4=0;
												}
											
											if($scope.res[8].s2017_4[i].orders>0)
												{
													$scope.orders4=$scope.res[8].s2017_4[i].orders;
												}
												else
												{
													$scope.orders4=0;
												}
												if($scope.res[8].s2017_4[i].years>0)
												{
													$scope.year4=$scope.res[8].s2017_4[i].years;
												}
												else
												{
													$scope.year4=0;
												}
											
											
											}
											if(i==1)
											{
												$scope.products4=$scope.res[8].s2017_4[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost4= $scope.res[8].s2017_4[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment4= $scope.res[8].s2017_4[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order4=$scope.res[8].s2017_4[i].stripeorder;
										
											}
											 
											var sami4=$scope.sales4/$scope.orders4;
											 if(sami4>0)
											 {
												 $scope.netaov4=sami4;
											 }
											 else
											 {
												 $scope.netaov4=0;
											 } 
										} 
									
								    for (var i = 0, l = $scope.res[9].s2017_5.length; i < l; i++) 
										{
											 if(i==0)
											{
												if($scope.res[9].s2017_5[i].sales>0)
												{
													$scope.sales5=$scope.res[9].s2017_5[i].sales;
												}
												else
												{
													$scope.sales5=0;
												}
											
											if($scope.res[9].s2017_5[i].orders>0)
												{
													$scope.orders5=$scope.res[9].s2017_5[i].orders;
												}
												else
												{
													$scope.orders5=0;
												}
												if($scope.res[9].s2017_5[i].years>0)
												{
													$scope.year5=$scope.res[9].s2017_5[i].years;
												}
												else
												{
													$scope.year5=0;
												}
											
											
											}
											if(i==1)
											{
												$scope.products5=$scope.res[9].s2017_5[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost5= $scope.res[9].s2017_5[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment5= $scope.res[9].s2017_5[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order5=$scope.res[9].s2017_5[i].stripeorder;
										
											}
											var sami5=$scope.sales5/$scope.orders5;
											 if(sami5>0)
											 {
												 $scope.netaov5=sami5;
											 }
											 else
											 {
												 $scope.netaov5=0;
											 } 
											
										}
										
								for (var i = 0, l = $scope.res[10].s2017_6.length; i < l; i++) 
										{
											 if(i==0)
											{
												if($scope.res[10].s2017_6[i].sales>0)
												{
													$scope.sales6=$scope.res[10].s2017_6[i].sales;
												}
												else
												{
													$scope.sales6=0;
												}
											
											if($scope.res[10].s2017_6[i].orders>0)
												{
													$scope.orders6=$scope.res[10].s2017_6[i].orders;
												}
												else
												{
													$scope.orders6=0;
												}
												if($scope.res[10].s2017_6[i].years>0)
												{
													$scope.year6=$scope.res[10].s2017_6[i].years;
												}
												else
												{
													$scope.year6=0;
												}
											
											
											}
											if(i==1)
											{
												$scope.products6=$scope.res[10].s2017_6[i];
											}
											 if(i==2)
											{
											$scope.suppliertotal_cost6= $scope.res[10].s2017_6[i].suppliertotal_cost
										
											} 
											if(i==3)
											{
												//console.log($scope.res[6].s2017_2[i].fulfillment);
												$scope.fulfillment6= $scope.res[10].s2017_6[i].fulfillment
										
										
											}
											if(i==4)
											{
									          $scope.stripe_order6=$scope.res[10].s2017_6[i].stripeorder;
										
											}
											var sami6=$scope.sales6/$scope.orders6;
											 if(sami6>0)
											 {
												 $scope.netaov6=sami6;
											 }
											 else
											 {
												 $scope.netaov6=0;
											 }
											//console.log($scope.sales2/$scope.orders2);
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