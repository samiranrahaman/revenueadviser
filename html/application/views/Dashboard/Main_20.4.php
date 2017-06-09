  
<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>
<!--<script src="lib/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url();?>js/angular-chart.js"></script>-->
<script src="<?php echo base_url();?>js/chart.js"></script>
<script src="http://cdn.jsdelivr.net/angular.chartjs/latest/angular-chart.min.js"></script>
<!--date range-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<!--http://jtblin.github.io/angular-chart.js/-->
  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
  <input type="text"  style="display:none" class="form-control"   name="stardate1" id="stardate1" ng-model="stardate1" required> 
  <input type="text"  style="display:none" class="form-control"   name="enddate1" id="enddate1" ng-model="enddate1" required> 
  
  
  <input type="text"  style="display:none" class="form-control"   name="report_id" id="report_id" ng-model="report_id" required> 
  <input type="text"  style="display:none" class="form-control"   name="report_name" id="report_name" ng-model="report_name" required> 
  
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
                <button ng-init="report_selected='Products'" class="btn btn-default mypro dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{report_selected}}
                <span class="caret"></span>
                </button>
                 
                 
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li ng-click="chooseproduct(0,'All')"><a> All</a></li>
				<li ng-click="chooseproduct(prodctitem.id,prodctitem.report_name)" ng-repeat="prodctitem in setupproducts "><a> {{prodctitem.report_name}}</a></li>
                </ul>
            </div>
            
            <div class="no-pad-mar col-sm-4 col-lg-4" style="float: right;">  
				<span class="fa fa-calendar"></span>				
				<input type="text" name="daterange"   value="" />

				<script type="text/javascript">
				var userprefs = { 
				 goal: 'all',};
				</script>

					
            </div>
            
           <!-- <div class="no-pad-mar col-sm-2 col-lg-2">
                <input class="dtpkr" type="text" id="datepicker2" placeholder="To">       
            </div>
             
             <div class="no-pad-mar col-sm-2 col-lg-2">
                 
                 <button type="button" class="btn dtpkr btn-sm btn-danger">Apply</button>
                 
            </div>-->
             
             
             
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
                      <h5><strong>{{number_order}}</strong><small class="labela label-success">{{((number_order-number_order2)/number_order2)*100 | number:0}}%</small></h5>
                      <span>Number of Orders</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ticket icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>{{revenue | currency}} </strong><small class="labela label-success">{{((revenue-revenue2)/revenue2)*100 | number:0}}%</small></h5>
                      <span>Revenue</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ total_cog | currency}} </strong> <small class="labela label-danger">{{((total_cog-total_cog2)/total_cog2)*100 | number:0}}%</small></h5>
                      <span>COGS</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar  icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{total_discounts | currency }} </strong><small class="labela label-success">{{((total_discounts-total_discounts2)/total_discounts2)*100 | number:0}}%</small></h5>
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
                      <h5><strong>{{ grosmargin }}% </strong> <small class="labela label-success">{{((grosmargin-grosmargin2)/grosmargin2)*100 | number:0}}%</small></h5>
                      <span>Gross Margin</span>
                    </div>  
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit | currency}}  </strong><small class="labela label-success">{{((grosprofit-grosprofit2)/grosprofit2)*100 | number:0}}%</small></h5>
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
                      <h5 ng-if="number_order>0"><strong>{{fb_conversion / number_order | currency}} </strong></h5>
					   <h5 ng-if="number_order==0"><strong>$0 </strong></h5>
                     
                      <span>Ad Spend Per Order</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ netmargin }}%</strong> <small class="labela label-success"> {{((netmargin-netmargin2)/netmargin2)*100 | number:0}}%</small></h5>
                      <span>Net Margin</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit - fb_conversion | currency}} </strong><small class="labela label-success"> {{(((grosprofit - fb_conversion)-(grosprofit2 - fb_conversion2))/(grosprofit2 - fb_conversion2))*100 | number:0}}%</small></h5>
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
	  <div class="col-md-12 graphs">
	     <div class="clearfix"> </div>   
	  </div>
            
   <!--<canvas id="buyers" width="75" height="25"></canvas>--> 
    	<canvas id="line" class="chart chart-line" chart-data="data"
		chart-labels="labels" chart-series="series" chart-options="options"
		chart-dataset-override="datasetOverride" chart-click="onClick" >
		</canvas>  
<div class="clearfix"> </div>   
<div ng-include="'<?php echo base_url();?>svgmap.html'"></div>		
          <script>
		     
			 angular.module("myApp", ["chart.js","ui.bootstrap.modal"]).controller("reports", function ($scope,$http,$timeout,$window) {
				 
				 $scope.init=function()
				  {
					  
					    $scope.report_id=0;
					   var d = new Date();
					   //alert(d);
					   var m1=d.getMonth()+1;
					    if(m1<10)
						{
							var m1='0'+m1;
						}
						var d1=d.getDate();
					    if(d.getDate()<10)
						{
							var d1='0'+d.getDate();
						}
						
						var m2=d.getMonth()-1;
					    if(m2<10)
						{
							var m2='0'+m2;
						}
						
						
					   console.log(m1);
					   console.log(d.getFullYear());
					   console.log(d1);
					   
					   console.log(m2);
					   console.log(d.getFullYear());
					   console.log(d1);
					   
					   $scope.enddate1=d.getFullYear()+'-'+m1+'-'+d1;
					   
					   $scope.stardate1=d.getFullYear()+'-'+m2+'-'+d1;
					   $scope.analysis($scope.stardate1,$scope.enddate1,$scope.report_id);
					   $scope.creategraph($scope.stardate1,$scope.enddate1,$scope.report_id);
					   
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
					   
					   
					   
					   
					   
					   
					   
					   
					   $timeout(function ()
						   {              
						                //alert($("#enddate1").val());
										 $('input[name="daterange"]').daterangepicker(
											{
												locale: {
												  format: 'YYYY-MM-DD'
												},
												startDate: $("#stardate1").val(),
												endDate: $("#enddate1").val(), 
												 ranges: {
														 'Today': [moment(), moment()],
														 'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
														 'Last 7 Days': [moment().subtract('days', 6), moment()],
														 'Last 30 Days': [moment().subtract('days', 29), moment()],
														 'This Month': [moment().startOf('month'), moment().endOf('month')],
														 'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
													  },
													  opens: 'left',
													  buttonClasses: ['btn btn-default'],
													  applyClass: 'btn-small btn-primary',
													  cancelClass: 'btn-small',
													 // format: 'DD/MM/YYYY',
													  //separator: ' to ',
													 /// startDate: moment().subtract('days', 29),
													  //endDate: moment(),
													  //minDate: '01/01/2012',
													  //maxDate: '12/31/2014',
													  dateLimit: { days: 60 },
													  showDropdowns: true,
													  showWeekNumbers: true,
													  timePicker: false,
													  timePickerIncrement: 1,
													  timePicker12Hour: true,
											}, 
											function(start, end, label) {
												 //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')); 
												 //alert(end.format('YYYY-MM-DD'));
												 $("#enddate1").val(end.format('YYYY-MM-DD'))
												$("#stardate1").val(start.format('YYYY-MM-DD')) 
												//alert(start.format('YYYY-MM-DD'))
												//$scope.enddate1=end.format('YYYY-MM-DD');
												// $scope.stardate1=start.format('YYYY-MM-DD');
												 $scope.analysis(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'), $("#report_id").val());
												 $scope.creategraph(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'), $("#report_id").val());
												 
												
											});	
										
											
										
												
							}, 2000);
				  }

				  $scope.creategraph = function (datevalue1,datevalue2,report_id)
			  {
				  //alert(datevalue2);
				       $http({
					       method : 'POST',
					       url : '<?php echo base_url();?>index.php/reports/get_analysis_graph_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue1:datevalue1, datevalue2:datevalue2,report_id:report_id})
						    }).success(function(data) {
							  console.log(data);
							   $scope.series = ['Gross Profit', 'Revenue','Gross Margin','Ad Spend','Net Profit','Net Margin'];
			                  // $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
							   $scope.labels =data[1].daterange;
							   $scope.data = [
												data[2].grossprofitarray,
												data[3].revenuearray,
												data[4].grosmarginarray,
												data[5].fb_conversionarray,
												data[6].netprofitarray,
												data[7].netmarginarray,
											  ];
						    }); 
				  
			  }
			 // $scope.labels = ["Mar 16,2017", "Mar 17,2017", "Mar 17,2017", "Mar 19,2017", "Mar 20,2017", "Mar 21,2017", "Mar 22,2017"];
			 // $scope.series = ['Gross Profit', 'Revenue','Gross Margin','Ad Spend','Net Profit','Net Margin'];
			  /* $scope.data = [
				[65, 59, 80, 81, 56, 55, 40],
				[28, 20, 40, 19, 86, 27, 90],
				[28, 48, 40, 19, 86, 27, 90],
				[28, 30, 40, 19, 86, 27, 90],
				[28, 10, 40, 19, 86, 27, 90],
				[28, 60, 40, 19, 86, 27, 90]
			  ]; */
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
						       stepSize:5,
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
						       stepSize:5,
							   callback: function(value, index, values) {
								 return  value+'%';;
							   }
							 }
					}
				  ]
				},
				legend: { display: true }    
			  };
			  
			  $scope.analysis = function (datevalue1,datevalue2,report_id)
			  {
			   //var datevalue1=$scope.stardate1;
			   //var datevalue2=$scope.enddate1;
			    //alert(report_id);
			   
			        $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/reports/get_analysis_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue1:datevalue1, datevalue2:datevalue2,report_id:report_id})
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
							 if(Math.round(data[0].sales) >0)
							 {
								 $scope.grosmargin=Math.round(($scope.grosprofit/Math.round(data[0].sales))*100);
							
							 }
							 else
							 {
								 $scope.grosmargin=0;
							 }
							 
							if($scope.revenue>0)
							 {
								 $scope.netmargin=Math.round((($scope.grosprofit - $scope.fb_conversion)/ $scope.revenue)*100);
							
							 }
							 else
							 {
								 $scope.netmargin=0;
							
							 }
							
						});
						
						
						
						
						$http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/reports/get_prev_analysis_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue1:datevalue1, datevalue2:datevalue2,report_id:report_id})
						}).success(function(data) {
							 console.log(data);
							 $scope.number_order2=Math.round(data[0].orders);
							 $scope.revenue2=Math.round(data[0].sales);
							 $scope.suppliertotal_cost2=Math.round(data[2].suppliertotal_cost);
							 $scope.fulfillment2=Math.round(data[3].fulfillment);
							 $scope.stripeorder2=Math.round(data[4].stripeorder);
							 $scope.mislan2=Math.round(data[5].mislan);
							 $scope.expenses2=Math.round(data[7].expenses);  
				            $scope.fb_conversion2=Math.round(data[8].fb_conversion); 	
							$scope.total_discounts2=Math.round(data[9].total_discounts); 

							 $scope.total_cog2=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan )+ Math.round(data[7].expenses  );
							
							 $scope.grosprofit2=Math.round(data[0].sales) - $scope.total_cog;
							 /* $scope.grosmargin=Math.round(((Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan) + Math.round(data[7].expenses))/Math.round(data[0].sales))*100); */ 
							 if(Math.round(data[0].sales) >0)
							 {
								 $scope.grosmargin2=Math.round(($scope.grosprofit2/Math.round(data[0].sales))*100);
							
							 }
							 else
							 {
								 $scope.grosmargin2=0;
							 }
							 
							if($scope.revenue2>0)
							 {
								 $scope.netmargin2=Math.round((($scope.grosprofit2 - $scope.fb_conversion2)/ $scope.revenue2)*100);
							
							 }
							 else
							 {
								 $scope.netmargin2=0;
							
							 }
							
						});
						
			  }		
					
               $scope.chooseproduct=function(report_id,report_name)
			   {
				//alert($("#stardate1").val());
               // alert($("#enddate1").val()); 	
                $scope.report_id=report_id;	
                $scope.report_name=report_name;		
                $scope.report_selected=report_name;
				
				var enddate1=$("#enddate1").val();
				var stardate1=$("#stardate1").val();
				$scope.analysis(stardate1,enddate1,report_id); 

				$scope.creategraph(stardate1,enddate1,report_id); 				
				
					   
				
			   }				   
			
			});
              
			  //$scope.options = {scales:{yAxes:[{type: "linear",ticks:{max:100,min:0,stepSize:10}}]}};});
			  
			  $(document).ready(function(){
				  $('.dropdown-submenu a.test').on("click", function(e){
					$(this).next('ul').toggle();
					e.stopPropagation();
					e.preventDefault();
				  });
				});
			$(document).ready(function(){	
			/* $("path").hover(function(e) {
				alert();
			  $('#info-box').css('display','block');
			  $('#info-box').html('sssss');
			});
			$("path").mouseleave(function(e) {
			  $('#info-box').css('display','none');
			}); */
			/* $(document).mousemove(function(e) {
			  $('#info-box').css('top',e.pageY-$('#info-box').height()-30);
			  $('#info-box').css('left',e.pageX-($('#info-box').width())/2);
			}).mouseover();	
			$('.field').hover(function () {
				//console.log('using prop(): ' + $(this).attr('data-fullText'));
				//console.log('using data(): ' + $(this).data('fullText'));
				alert();
			}); */
			/* $('.field').mousemove(function (e) {
					alert();
				}) */
				
				$(document).mousemove(function(e) {
			  $('#info-box').css('top',e.pageY-$('#info-box').height()-30);
			  $('#info-box').css('left',e.pageX-($('#info-box').width())/2);
				  //alert();
				 // $('#info-box').css('display','block');
                 // $('#info-box').html('dddddddddddddd');
				}).mouseover();
				
				$("path").hover(function(e) {
				alert();
			  //$('#info-box').css('display','block');
			  //$('#info-box').html('sssss');
			});
					
			});	
		</script>   
            
         
   </div>
      </div>
      <!-- /#page-wrapper -->
	  
</section>
    <!-- /.content -->
  </div>
  <style>
  path:hover, circle:hover {
  stroke: #002868 !important;
  stroke-width:2px;
  stroke-linejoin: round;
  fill: #002868 !important;
  cursor: pointer;
}
#info-box {
  display: none;
  position: absolute;
  top: 0px;
  left: 0px;
  z-index: 1;
  background-color: #ffffff;
  border: 2px solid #BF0A30;
  border-radius: 5px;
  padding: 5px;
  font-family: arial;
}
</style>