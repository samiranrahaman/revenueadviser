  
<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>
<!--<script src="lib/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url();?>js/angular-chart.js"></script>-->
<script src="<?php echo base_url();?>js/chart.js"></script>
<script src="http://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"></script>
<!--http://jtblin.github.io/angular-chart.js/-->
  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>        
        <strong>Dashboard</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Dashboard</li>
      </ol>
      <br/>       
    </section> 
   -->
 

    <!-- Main content -->
    <section class="content">
	 
	
		<div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs col-md-3">
           <h3>Profit Analysis</h3>
       </div>
            
         <div class="xs col-md-9 no-pad-mar">
             
             <div class="dropdown no-pad-mar col-sm-6 col-lg-6">
                <button class="btn btn-default mypro dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Products
                <span class="caret"></span>
                </button>
                 
                 
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#"> Ladies Clutch Puppy Wallet</a></li>
                <li><a href="#"> Magnetic Charging Cable for Android Charger Cord for iPhone 7 6 s 5 5s 6s Plus Samsung Mobile Phone</a></li>
 
            </ul>
            </div>
            
            <div class="no-pad-mar col-sm-2 col-lg-2">   
                <input class="dtpkr" type="text" id="datepicker" placeholder="From">
            </div>
            
            <div class="no-pad-mar col-sm-2 col-lg-2">
                <input class="dtpkr" type="text" id="datepicker2" placeholder="To">       
            </div>
             
             <div class="no-pad-mar col-sm-2 col-lg-2">
                 
                 <button type="button" class="btn dtpkr btn-sm btn-danger">Apply</button>
                 
                 
                 
                 
                 
     
            </div>
             
             
             
       </div>   
            
         <div class="clearfix"> </div>   
            
            
            
            
            
            
            
            
      
            
          <div class="hr-divider m-t m-b-md">
                <h3 class="hr-divider-content hr-divider-heading">SELECTED DATE RANGE</h3>
          </div>
            
            
            <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-trello  icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{number_order}}</strong><small class="labela label-success">+120%</small></h5>
                      <span>Number of Orders</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ticket icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>{{revenue | currency}} </strong><small class="labela label-success">+260%</small></h5>
                      <span>Revenue</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ total_cog | currency}} </strong> <small class="labela label-danger">+251%</small></h5>
                      <span>COGS</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar  icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{total_discounts | currency }} </strong><small class="labela label-success">+301%</small></h5>
                      <span>Discounts</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
            
             
            <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$0</strong></h5>
                      <span>Shipping Cost</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>$0 </strong></h5>
                      <span>Shipping Charged</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosmargin }}% </strong> <small class="labela label-success">+3%</small></h5>
                      <span>Gross Margin</span>
                    </div>  
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit | currency}}  </strong><small class="labela label-success">+271%</small></h5>
                      <span>Gross Profit</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
            
            
             
            <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-trello user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{fb_conversion | currency}}</strong></h5>
                      <span>Ad Spend</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ticket user2 icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>{{fb_conversion / number_order | currency}} </strong></h5>
                      <span>Ad Spend Per Order</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ netmargin }}%</strong> <small class="labela label-success"> +3%</small></h5>
                      <span>Net Margin</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit - fb_conversion | currency}} </strong><small class="labela label-success"> +271%</small></h5>
                      <span>Net Profit</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
            
   
            
             <div class="clearfix"> </div>   
                
           <!--  <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-trello user3 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$0 </strong><small class="labela label-success">-100%</small></h5>
                      <span>Taxes</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ticket user3 icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>$10 </strong><small class="labela label-danger">+244% </small></h5>
                      <span>Transaction Fees</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user3 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$0 </strong></h5>
                      <span>Handling Cost</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar user3 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>$0  </strong><small class="labela label-success">-100%</small></h5>
                      <span>Refunds</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>-->
 
               <div class="clearfix"> </div>
                <div class="xs">
           
            
               <!-- <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Filter Ad Spend 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">HTML</a></li>
      <li><a tabindex="-1" href="#">CSS</a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>-->
                
                
            </div>     
            
   <!--          
<div class="hr-divider m-t m-b-md">
<h3 class="hr-divider-content hr-divider-heading">YEAR TO DATE</h3>
</div>        
            
             <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <h5><strong>$349 </strong></h5>
                      <span>YOY REVENUE CHANGE</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <h5><strong>$163</strong></h5>
                      <span>YOY PROFIT CHANGE</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <h5><strong>47% </strong></h5>
                      <span>GROSS MARGIN</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <div class="stats">
                      <h5><strong>$19.37 </strong></h5>
                      <span>AVG. ORDER VALUE</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>-->
<div class="clearfix"> </div>   

            
   <!--<canvas id="buyers" width="75" height="25"></canvas>-->
    	<canvas id="line" class="chart chart-line" chart-data="data"
		chart-labels="labels" chart-series="series" chart-options="options"
		chart-dataset-override="datasetOverride" chart-click="onClick">
		</canvas>      
          <script>
		     
			   var datevalue1='2017-03-01';
			   var datevalue2='2017-04-01';
			 angular.module("myApp", ["chart.js","ui.bootstrap.modal"]).controller("reports", function ($scope,$http,$timeout,$window) {

			  $scope.labels = ["Mar 16,2017", "Mar 17,2017", "Mar 17,2017", "Mar 19,2017", "Mar 20,2017", "Mar 21,2017", "Mar 22,2017"];
			  $scope.series = ['Gross Profit', 'Revenue','Gross Margin','Ad Spend','Net Profit','Net Margin'];
			  $scope.data = [
				[65, 59, 80, 81, 56, 55, 40],
				[28, 20, 40, 19, 86, 27, 90],
				[28, 48, 40, 19, 86, 27, 90],
				[28, 30, 40, 19, 86, 27, 90],
				[28, 10, 40, 19, 86, 27, 90],
				[28, 60, 40, 19, 86, 27, 90]
			  ];
			  $scope.onClick = function (points, evt) {
				console.log(points, evt);
			  };
			  $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
			  $scope.options = {
				scales: {
				  yAxes: [
					{
					  id: 'y-axis-1',
					  type: 'linear',
					  display: true,
					  position: 'left',
					   ticks: {
						       stepSize:30,
							   callback: function(value, index, values) {
								 return value.toLocaleString("en-US",{style:"currency", currency:"USD"});
							   }
							 }
					},
					{
					  id: 'y-axis-2',
					  type: 'linear',
					  display: true,
					  position: 'right',
					  ticks: {
						       stepSize:10,
							   callback: function(value, index, values) {
								 return  value+'%';;
							   }
							 }
					}
				  ]
				},
				legend: { display: true }    
			  };
			  
			        $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/reports/get_analysis_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue1:datevalue1, datevalue2:datevalue2})
						}).success(function(data) {
							 console.log(data);
							 $scope.number_order=Math.round(data[0].orders);
							 $scope.revenue=Math.round(data[0].sales);
							 $scope.suppliertotal_cost=Math.round(data[2].suppliertotal_cost);
							 $scope.fulfillment=Math.round(data[3].fulfillment);
							 $scope.stripeorder=Math.round(data[4].stripeorder);
							 $scope.mislan=Math.round(data[5].mislan);
							 $scope.expenses=Math.round(data[7].expenses);  
				            $scope.fb_conversion=Math.round(data[8].fb_conversion); 	
							$scope.total_discounts=Math.round(data[9].total_discounts); 

							 $scope.total_cog=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan )+ Math.round(data[7].expenses  );
							
							 $scope.grosprofit=Math.round(data[0].sales) - $scope.total_cog;
							 /* $scope.grosmargin=Math.round(((Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan) + Math.round(data[7].expenses))/Math.round(data[0].sales))*100); */ 
							$scope.grosmargin=Math.round(($scope.grosprofit/Math.round(data[0].sales))*100);
							$scope.netmargin=Math.round((($scope.grosprofit - $scope.fb_conversion)/ $scope.revenue)*100);
							
						});
			  
			  
			  
			});
              
			  //$scope.options = {scales:{yAxes:[{type: "linear",ticks:{max:100,min:0,stepSize:10}}]}};});
		</script>   
            
         
   </div>
      </div>
      <!-- /#page-wrapper -->
	  
</section>
    <!-- /.content -->
  </div>