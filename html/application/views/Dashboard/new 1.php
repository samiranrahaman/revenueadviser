  
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
                      <h5><strong>{{number_order}}</strong>
					  <small ng-if="number_order2!=' '" class="labela label-success">{{((number_order-number_order2)/number_order2)*100 | number:0}}%
					  </small>
					   <small ng-if="number_order2==' '" class="labela label-success">100%
					  </small>
					  </h5>
                      <span>Number of Orders</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ticket icon-rounded" ></i>
                    <div class="stats">
                      <h5><strong>{{revenue | currency}} </strong>
					  <small ng-if="revenue2!=' '" class="labela label-success">{{((revenue-revenue2)/revenue2)*100 | number:0}}%</small>
					  <small ng-if="number_order2==' '" class="labela label-success">100%</small>
					  </h5>
                      <span>Revenue</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ total_cog | currency}} </strong> 
					  <small ng-if="total_cog2!=' '" class="labela label-danger">{{((total_cog-total_cog2)/total_cog2)*100 | number:0}}%
					  </small>
					  <small ng-if="total_cog2==' '"  class="labela label-danger">100%</small></h5>
                      <span>COGS</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar  icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{total_discounts | currency }} </strong>
					  <small ng-if="total_discounts2!=' '" class="labela label-success">{{((total_discounts-total_discounts2)/total_discounts2)*100 | number:0}}%</small>
					  <small ng-if="total_discounts2==' '" class="labela label-success">100%</small>
					  </h5>
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
                      <h5><strong>{{ grosmargin }}% </strong> 
					  <small ng-if="grosmargin2!=' '" class="labela label-success">{{((grosmargin-grosmargin2)/grosmargin2)*100 | number:0}}%</small>
					  <small ng-if="grosmargin2==' '" class="labela label-success">100%</small>
					  </h5>
                      <span>Gross Margin</span>
                    </div>  
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit | currency}}  </strong>
					  <small ng-if="grosprofit2>0" class="labela label-success">{{((grosprofit-grosprofit2)/grosprofit2)*100 | number:0}}%</small>
					   <small ng-if="grosprofit2<=0" class="labela label-success">100%</small>
					  </h5>
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
                      <h5><strong>{{ netmargin }}%</strong> 
					  <small ng-if="netmargin2>0" class="labela label-success"> {{((netmargin-netmargin2)/netmargin2)*100 | number:0}}%</small>
					  <small ng-if="netmargin2<=0" class="labela label-success"> 100%</small>
					  </h5>
                      <span>Net Margin</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{ grosprofit - fb_conversion | currency}} </strong>
					  <small ng-if="(grosprofit2 - fb_conversion2)>0" class="labela label-success"> {{(((grosprofit - fb_conversion)-(grosprofit2 - fb_conversion2))/(grosprofit2 - fb_conversion2))*100 | number:0}}%</small>
					  <small ng-if="(grosprofit2 - fb_conversion2)<=0" class="labela label-success"> 100%</small>
					  </h5>
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
	  <!--<div class="col-md-12 graphs">
	     <div class="clearfix"> </div>   
	  </div>-->
            
   <!--<canvas id="buyers" width="75" height="25"></canvas>--> 
       <div class="hr-divider m-t m-b-md">
                <h3 class="hr-divider-content hr-divider-heading">PROFIT/REVENUE</h3>
          </div>
    	<canvas id="line" class="chart chart-line" chart-data="data"
		chart-labels="labels" chart-series="series" chart-options="options"
		chart-dataset-override="datasetOverride" chart-click="onClick" >
		</canvas>  
		<div class="clearfix"> </div>  
		<div class="hr-divider m-t m-b-md">
                <h3 class="hr-divider-content hr-divider-heading">Shipping Analysis</h3>
          </div>
		  <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-bars user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{number_order}}</strong></h5>
                      <span>Total Shipping</span>
                    </div>
                </div>
        	</div>
		  
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
        	
        	<div class="clearfix"> </div>
      </div>
		<!--<div  ng-include="'<?php echo base_url();?>svgmap.html'"></div>-->
		<div class="row">
	         <div  ng-include="'<?php echo base_url();?>usasvg.html'"></div> 
		 </div>
		  <div class="clearfix"> </div>
					   <div class="panel panel-warning bodr">
							<div class="panel-heading">
								<h2>ORDER DATA</h2>
								<div class="panel-ctrls" ><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding table-responsive" style="display: block;">
							
							   <table class="table table-striped">
										<!--<table class="table table-bordered firsttable table-striped">-->
										<thead>
										  <tr class="warning"> 
										  <th>Order Number</th>
											<th>Order Date</th>
											<th>Revenue</th>
											<th>Cogs</th>
											<th>Shipping Charges</th>
											<th>Shipping Cost</th>
											<th>Discount</th>
											<!--<th ng-if="item.order >=1" title="{{item.product}}" ng-repeat="item in items">{{item.product |limitTo: 8}}</th>-->
											<th>Products</th>
										   <th>Ads</th>
										   <th>Profit</th> 
										  </tr>
										</thead>
										<tbody>
										  <tr ng-if="value.orders!=0" ng-repeat="value in orderreports">
											<td>{{value.order_id_name}}</td> 
											<td>{{value.date}}</td> 
											<td>{{value.sales | currency}}</td> 
											
											<!--<td> {{ suppliertotal_cost + fulfillment + stripeorder + mis_inner | number:2 }}
											</td>-->
											<td> {{ value.suppliertotal_cost + value.fulfillment + value.stripeorder + value.mis_inner | currency }}
											</td>
											<td>$0</td>
											<td>$0</td>
											<td>{{value.total_discounts | currency}}</td>
											<td ng-if="item2.order >=1"  ng-repeat="item2 in value.products">{{item2.product}}</td> 
											<td>{{value.fb_conversation | currency }}</td> 
											
											<td>{{value.sales-value.stripe_order - (value.fulfillment * value.orders) - value.suppliertotal_cost - value.mis_inner - value.fb_conversation | currency}}</td> 
											
											
										  </tr>
										  <tr ng-if="orderreports[0].orders=='0'"><td colspan="12">No Result Found!</td></tr>
										</tbody>
									  </table>
							
							
								
							</div>
						</div>   
 </div>
      </div>
      <!-- /#page-wrapper -->
	  
</section>
    <!-- /.content -->
  </div>
          <script>
		     
			 angular.module("myApp", ["chart.js","ui.bootstrap.modal"]).controller("reports", function ($scope,$http,$timeout,$window) {
				 
				 $scope.init=function()
				  {
					  $scope.orderanalysis(0)
					    $scope.report_id=0;
					   var d = new Date();
					   //alert(d);
					   var m1=d.getMonth()+1;
					    if(m1<10)
						{
							var m1='0'+m1;
						}
						//var d1=d.getDate();
						var d1=d.getDate();
						 if(d.getDate()<10)
						{
							var d1='0'+d.getDate();
						}
						var d_custom=d.getDate()-20;
					    if(d_custom<10)
						{
							var d_custom='0'+d_custom;
						}
						
						//var m2=d.getMonth()-1;
						var m2=d.getMonth();
					    if(m2<10)
						{
							var m2='0'+m2;
						}
						
						
					  // console.log(m1);
					   //console.log(d.getFullYear());
					  // console.log(d1);
					   
					  // console.log(m2);
					  // console.log(d.getFullYear());
					  // console.log(d1);
					   
					   //$scope.enddate1=d.getFullYear()+'-'+m1+'-'+d1;
					   $scope.enddate1=d.getFullYear()+'-'+m1+'-'+d_custom;
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
							// console.log(data);

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
										
									$(document).ready(function(){	
									         $("path").removeAttr("data-info");
											  $("path").css("fill", 'rgb(204, 204, 204)'); 
											  
											  
											  $http({
												method : 'get',
												url : '<?php echo base_url();?>index.php/dashboard/get_shipping_analysis',
											    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
													 }).success(function(data) {
													     //console.log(data); 
                                                       //console.log(data.length);
													 for(var i=0 ;i<data.length;i++)
													 {
														 //console.log(data[i].sh_province_code);
														 $("."+data[i].sh_province_code+"").attr("data-id", data[i].sh_province_code); 
														 $("."+data[i].sh_province_code+"").css("fill", 'green'); 
							                  $("."+data[i].sh_province_code+"").attr("data-info",'<p><b>'+data[i].sh_province+'</b></p><p><b>Total no of Orders : </b>'+data[i].ordercount+'</p><p><b>Total Sale : $ </b>'+Math.round(data[i].totalsales)+'</p><p><b>Shipments : </b>'+data[i].ordercount+'</p>');
											  
													 }
													
												});
											  
											  $("path").click(function(e)
											  {
												  var id=$(this).data('id');
												  $scope.orderanalysis(id)
											     // alert(id); 
											   });
											  
											$("path").hover(function(e) {
												//alert();
											 
											 //$('#info-box').html('4444');
											 var info=$(this).data('info');
											 //alert(info.length);
											 if(info.length>0)
											 {
											 $('#info-box').css('display','block');
											 $('#info-box').html('');
											 $('#info-box').html($(this).data('info')); 
											 }
											});
											
											
											
											$("path").mouseleave(function(e) {
											  $('#info-box').css('display','none');
											}); 
											  $(document).mousemove(function(e) {
											   $('#info-box').css('top',e.pageY-$('#info-box').height()-10);
											   $('#info-box').css('left',e.pageX-($('#info-box').width())/2);
											 }).mouseover();	
											 

													 
											});			  
										 
												
							}, 2000);
							
					
							
							
				  }

				  $scope.orderanalysis=function(countrycode)
					{
						//alert(countrycode);
					$http({
						method : 'POST',
						url : '<?php echo base_url();?>index.php/dashboard/get_order_analysis',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({countrycode:countrycode})
							 }).success(function(data) {
								// alert(data.status);
							 //console.log(data);
                            $scope.res=data;
							 $scope.items=$scope.res[0].products; 
							$scope.orderreports=data;
							 
							
						});		
							
					}
				  
				  $scope.creategraph = function (datevalue1,datevalue2,report_id)
			  {
				  //alert(datevalue2);
				       $http({
					       method : 'POST',
					       url : '<?php echo base_url();?>index.php/reports/get_analysis_graph_data',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue1:datevalue1, datevalue2:datevalue2,report_id:report_id})
						    }).success(function(data2) {
							  console.log(data2);
							   $scope.series = ['Gross Profit', 'Revenue','Gross Margin','Net Margin','Ad Spend','Net Profit'];
							   //$scope.series = ['Gross Profit', 'Revenue','Ad Spend','Net Profit'];
			                  // $scope.colors = ['#45b7cd', '#ff6384', '#ff8e72'];
							   $scope.labels =data2[1].daterange;
							   $scope.data = [
												data2[2].grossprofitarray,
												data2[3].revenuearray,
												data2[4].grosmarginarray,
												data2[7].netmarginarray,
												data2[5].fb_conversionarray,
												data2[6].netprofitarray,
												
											  ];
								$scope.datasetOverride = [
											  { yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' },
											  {
												  label: "Gross Profit",
												  borderColor: ['rgb(68, 218, 53)'],
											  },
											  {
												  label: "Revenue",
												  borderColor: ['rgb(68, 218, 53)'],
											  }
											  ,
											  {
												label: "Gross Margin(%)",
												//data:[28, 48, 40, 19, 86, 27, 90],
												data:data2[4].grosmarginarray,
												//borderWidth: 3,
												//hoverBackgroundColor: "rgba(255,99,132,0.4)",
												//hoverBorderColor: "rgba(255,99,132,1)",
												//backgroundColor: ['rgb(68, 218, 53)'],
												//borderColor: ['rgb(68, 218, 53)'],
												
												type: 'line',
												yAxisID: "y-axis-2"
											  },
											  {
												label: "Net Margin(%)",
												//data:[28, 48, 40, 19, 86, 27, 90],
												data:data2[7].netmarginarray,
												//borderWidth: 3,
												//hoverBackgroundColor: "rgba(255,99,132,0.4)",
												//hoverBorderColor: "rgba(255,99,132,1)",
												type: 'line',
												yAxisID: "y-axis-2"
											  },
											  ,
											  {
												  label: "Ad Spend",
												  borderColor: ['rgb(68, 218, 53)'],
											  },
											  {
												  label: "Net Profit",
												  borderColor: ['rgb(68, 218, 53)'],
											  }
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
			  
			  /*$scope.datasets={
						label: 'Gross Profit',
						data: [65, 59, 80, 81, 56, 55, 40],
						fill: true,
						yAxisID: "y-axis-2"
			  };*/
			  
			  $scope.onClick = function (points, evt) {
				console.log(points, evt);
			  };
			 // $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
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
						       stepSize:20,
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
							// console.log(data);
							 $scope.number_order=Math.round(data[0].orders);
							 //$scope.revenue=Math.round(data[0].sales);
							 $scope.revenue=data[0].sales;
							 $scope.suppliertotal_cost=Math.round(data[2].suppliertotal_cost);
							 $scope.fulfillment=Math.round(data[3].fulfillment);
							 $scope.stripeorder=Math.round(data[4].stripeorder);
							 //$scope.mislan=Math.round(data[5].mislan);
							 $scope.mislan=parseInt(data[5].mislan);
							 $scope.expenses=Math.round(data[7].expenses);  
				            //$scope.fb_conversion=Math.round(data[8].fb_conversion); 
							$scope.fb_conversion=data[8].fb_conversion; 
							//$scope.total_discounts=Math.round(data[9].total_discounts); 
							$scope.total_discounts=data[9].total_discounts; 
							 /* $scope.total_cog=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan )+ Math.round(data[7].expenses  ); */
							 
							 /* $scope.total_cog=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan );  */
							  
							  $scope.total_cog=data[2].suppliertotal_cost+data[3].fulfillment+data[4].stripeorder+data[5].mislan;
							
							
							// $scope.grosprofit=Math.round(data[0].sales) - $scope.total_cog;
							 $scope.grosprofit=data[0].sales - $scope.total_cog;
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
							 //console.log(data);
							 $scope.number_order2=Math.round(data[0].orders);
							 $scope.revenue2=Math.round(data[0].sales);
							 $scope.suppliertotal_cost2=Math.round(data[2].suppliertotal_cost);
							 $scope.fulfillment2=Math.round(data[3].fulfillment);
							 $scope.stripeorder2=Math.round(data[4].stripeorder);
							 $scope.mislan2=parseInt(data[5].mislan);
							 $scope.expenses2=Math.round(data[7].expenses);  
				            $scope.fb_conversion2=Math.round(data[8].fb_conversion); 	
							$scope.total_discounts2=Math.round(data[9].total_discounts); 
							/* 
							 $scope.total_cog2=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+Math.round(data[5].mislan )+ Math.round(data[7].expenses  ); */
							 /* $scope.total_cog2=Math.round(data[2].suppliertotal_cost)+Math.round(data[3].fulfillment)+Math.round(data[4].stripeorder)+$scope.mislan2; */
							 $scope.total_cog2=data[2].suppliertotal_cost+data[3].fulfillment+data[4].stripeorder+data[5].mislan;
							
							 
							 
							 
							
							 $scope.grosprofit2=Math.round(data[0].sales) - $scope.total_cog2; 
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
			
		</script>   
            
         
   
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
  border: 2px solid #fff;
  border-radius: 5px;
  padding: 5px;
  font-family: arial;
  background-color: rgb(14, 13, 12); 
  color: white;
  width: 30%;
  padding: 5px 5px 5px 10px;
border-radius: 20px;
}
</style>