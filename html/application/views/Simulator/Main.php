<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>        
        <strong>Simulator</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Simulator</li>
      </ol>
      <br/>       
    </section> -->

 

    <!-- Main content -->
    <section class="container">
	   <div id="page-wrapper">
        <div class="col-md-12 graphs">
            
            <div class="clearfix"> </div>
            <div class="xs col-md-12">
            <h3>Simulator</h3>
            </div>
            
            <div class="clearfix"> </div>
            
			
			 <div class="row" style="width:100%" ng-show="simulatornorecord" >	
             
			 
			    <div class="col-md-12"> 
            
					<!--<div class="hr-divider m-t m-b-md col-sm-6">
						<h3 class="hr-divider-content hr-divider-heading">CHAMPION</h3>
				  </div>
				   <div class="hr-divider m-t m-b-md col-sm-6">
						<h3 class="hr-divider-content hr-divider-heading">Challenger</h3>
				  </div>-->
				   <div class="col-sm-6 simtit greene">
						CHAMPION
					</div>
					<div class=" col-sm-6 simtit bluehead">
					CHALLENGER
					</div>
				</div>
				<div class="col-sm-12" >
					No Results Found!
				</div>
			 </div>
	
        <div class="row" style="width:100%" ng-show="recordfound">	 
             
			 <div class="col-md-6"> 
                    <div class="simtit greene">
						CHAMPION
					</div>
					<!--<div class="hr-divider m-t m-b-md">
						<h3 class="hr-divider-content hr-divider-heading">CHAMPION</h3>
				  </div>-->
			 <!-- chanpion cost start-->
			
			<div class="col-sm-6" >      
		<table class="tablev">
			<thead>
           
           <tr class="rpttext"> 
			  <th  class="rpttext" colspan="2">Cost</th>
			</tr>
			<tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
			</tr>
           
        
          </thead>
			<tbody class="neogreen">
			  <tr ng-repeat="data in costlist ">
				<td>{{data.product}}</td> 
				<td>{{data.unit_cost | currency}}</td> 
				
			  </tr>
			   <tr>
				<td>Supplier cost</td> 
				<td>{{suppliertotal_cost | currency}}</td> 
			  </tr>
			  <tr>
				<td>Fulfillment</td> 
				<td>{{fulfillment | currency}}</td> 
			  </tr>
			  <tr>
				<td>Gateway cost</td> 
				<td>{{stripeorder | currency}}</td> 
			  </tr>
			  <tr>
				<td>Miscellaneous</td> 
				<td>{{mislan | currency}}</td> 
			  </tr>
			 
			</tbody>
		  </table>
				
			</div>
			<!-- chanpion cost end-->
			<!-- chanpion revenues start-->
			<div class="col-md-6"> 
            
			    <table class="tablev">
			<thead>
			    <tr class="rpttext">
				 <th class="rpttext" colspan="2">Revenues</th>
			    </tr>
			  <tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
				
			  </tr>
			</thead>
			<tbody class="neogreen"> 
			  <tr ng-repeat="data in costlist ">
				<td>{{data.product}}</td> 
				<td>{{data.unit_price | currency}}</td> 
				
			  </tr>
			  <tr ng-repeat="data2 in costlist ">
				<td>{{data2.product}}-Quantity</td> 
				<td>{{data2.order}}</td> 
				
			  </tr>
			  
			</tbody>
		  </table>
				
			</div>
		<!-- chanpion revenue end-->
		<!-- Chalanges cost start-->
		  </div>
		<div class="col-md-6"> 
           <!--<div class="hr-divider m-t m-b-md">
						<h3 class="hr-divider-content hr-divider-heading">Challenger</h3>
				  </div>-->	
            <div class="simtit bluehead">
					CHALLENGER
			</div>				  
		  <div class="col-sm-6">
			    <table class="tableb">
			<thead>
			    <tr class="rpttext">
				 <th class="rpttext" colspan="2" >Cost</th>
			    </tr>
			  <tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
				
			  </tr>
			</thead>
			<tbody class="blues">
			  <tr ng-repeat="data_ch in costlist2 ">
				<td>{{data_ch.product}}</td> 
				<td>{{data_ch.unit_cost | currency}}</td> 
				
			  </tr>
			   <tr>
				<td>Supplier cost</td> 
				<td>{{suppliertotal_cost2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Fulfillment</td> 
				<td>{{fulfillment2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Gateway cost</td> 
				<td>{{stripeorder2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Miscellaneous</td> 
				<td>{{mislan2 | currency}}</td> 
			  </tr>
			 
			</tbody>
		  </table>
				
			</div>
			<!-- Chanlanges cost end-->
			<!-- Chanlanges revenue start-->
			<div class="col-sm-6" >
			    <table class="tableb">
			<thead>
			    <tr class="rpttext">
				 <th class="rpttext" colspan="2" >Revenues</th>
			    </tr>
			  <tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
				
			  </tr>
			</thead>
			<tbody class="blues">
			  <tr ng-repeat="data2 in costlist2 ">
				<td>{{data2.product}}</td> 
				<td>{{data2.unit_price | currency}}</td> 
				
			  </tr>
			  <tr ng-repeat="data_ch2 in costlist2 ">
				<td>{{data_ch2.product}}-Quantity</td> 
				<td>
				<input ng-model="data_ch2.order">
				<!--<input ng-keyup="change($event,grossprofit2 =grossprofit2+data_ch2.unit_price * data_ch2.order)" ng-init="grossprofit2=grossprofit2" ng-model="data_ch2.order">
				{{grossprofit2}}-->
				<!--<td><input ng-keyup="grossprofit2 = data_ch2.unit_price * data_ch2.order" ng-init="grossprofit2=grossprofit2" ng-model="data_ch2.order">{{grossprofit2}}</td>-->
				
				</td> 
			  </tr>
			  
			</tbody>
		  </table>
				
			</div>
		<!-- chalanges revenue end-->
		</div>
		
		</div>
		 <hr/>
		 <div class="row" style="width:100%"  ng-show="recordfound2" >
			 
			 <!-- champaion automation start-->
			 
			 <div class="col-md-6"> 
           
			<div class="col-sm-6">
			    <table class="tablev">
			<thead>
			    <tr class="tblma">
				 <th class="rpttext" colspan="2">Automated</th>
			    </tr>
			    <tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
			</tr>
			</thead>
			<tbody  class="neogreen">
			  <tr ng-repeat="data in costlist ">
				<td>{{data.product}}</td> 
				<td>{{data.unit_cost * data.order | currency}}</td> 
				
			  </tr>
			   <tr>
				<td>Supplier cost</td> 
				<td>{{suppliertotal_cost | currency}}</td> 
			  </tr>
			  <tr>
				<td>Fulfillment</td> 
				<td>{{fulfillment | currency}}</td> 
			  </tr>
			  <tr>
				<td>Gateway cost</td> 
				<td>{{stripeorder | currency}}</td> 
			  </tr>
			  <tr>
				<td>Miscellaneous</td> 
				<td>{{mislan | currency}}</td> 
			  </tr>
			 
			</tbody> 
		  </table>
				
			</div>
			
			<div class="col-sm-6" >
			    <table class="tablev">
			<thead>
			    <tr class="tblma">
				 <th class="rpttext" colspan="2" >Results</th>
			    </tr>
			    <tr class="tblma">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
			</tr>
			</thead>
			<tbody class="neogreen">
			  <tr ng-repeat="data in costlist ">
				<td>{{data.product}}</td> 
				<td>{{data.unit_price * data.order | currency}}</td> 
				
			  </tr>
			  <!--<tr style="background-color: bisque;">
				<td>Gross Profits</td> 
				<td>{{grossprofit | currency}}</td> 
			  </tr>-->
			   <tr style="background-color: bisque;">
				<td>Gross Profits</td> 
				<td>{{totalprofit() | currency}}</td> 
			  </tr>
			  
			  
			  <tr style="background-color: bisque;">
				<td>Expenses</td> 
				<td>{{expenses + mislan | currency}}</td> 
			  </tr style="background-color: bisque;"> 
			  <tr style="background-color: bisque;">
				<td>Net Profit</td> 
				<td>{{grossprofit - (expenses + mislan) | currency}}</td> 
			  </tr>
			</tbody>
		  </table>
				
			</div>
		    </div>
		    <!-- champaion automation end-->
		    
			 <!-- chalange automation start-->
			 <div class="col-sm-6" >
			<div class="col-sm-6">
			    <table class="tableb">
			<thead>
			    <tr class="rpttext">
				 <th colspan="2" class="rpttext">Automated</th>
			    </tr>
			   <tr class="rpttext">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
			</tr>
			</thead>
			<tbody class="blues">
			  <tr ng-repeat="data_ch in costlist2 ">
				<td>{{data_ch.product}}</td> 
				<td>{{data_ch.unit_cost * data_ch.order | currency}}</td> 
				
			  </tr>
			   <tr>
				<td>Supplier cost</td> 
				<td>{{suppliertotal_cost2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Fulfillment</td> 
				<td>{{fulfillment2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Gateway cost</td> 
				<td>{{stripeorder2 | currency}}</td> 
			  </tr>
			  <tr>
				<td>Miscellaneous</td> 
				<td>{{mislan2 | currency}}</td> 
			  </tr>
			 
			</tbody>
		  </table>
				
			</div>
			
			<div class="col-sm-6" >
			    <table class="tableb">
			<thead>
			    <tr class="rpttext">
				 <th colspan="2" class="rpttext"  >Results</th>
			    </tr>
			    <tr class="rpttext">
				<th class="rpttext blctex">Descriptions</th>
				<th class="rpttext blctex">Values</th>
			</tr>
			</thead>
			<tbody class="blues">
			  <tr ng-repeat="data in costlist2 ">
				<td>{{data.product}}</td> 
				<td>{{data.unit_price * data.order | currency}}</td> 
				
			  </tr>
			  <!--<tr style="background-color: bisque;">
				<td>Gross Profits</td> 
				<td>{{grossprofit2 | currency}}</td> 
			  </tr>-->
			  <tr style="background-color: bisque;">
				<td>Gross Profits</td> 
				<!--<td><input ng-keyup="grossprofit2 = data_ch.unit_price * data_ch.order" ng-init="grossprofit2=grossprofit2" ng-model="data_ch.order">{{grossprofit2}}</td>-->
					<!--<td>{{grossprofit2 | currency}}</td> -->
			    	<td>
					{{totalprofit2() | currency}}
					
                   <!-- $ <input style="width: 113px;" ng-keyup="change($event,grossprofit_calculation)" ng-model="grossprofit_calculation">	-->
				    $ <input style="width: 113px;" ng-keyup="change($event,grossprofit_calculation)" ng-model="grossprofit_calculation">
					 </td>				
			  </tr>
			  <tr style="background-color: bisque;">
				<td>Expenses</td> 
				<td>{{expenses2 + mislan2 | currency}}</td> 
			  </tr style="background-color: bisque;"> 
			  <tr style="background-color: bisque;">
				<td>Net Profit</td> 
				<td>{{grossprofit_calculation - (expenses2 + mislan2) | currency}}</td> 
			  </tr>
			</tbody>
		  </table>
				
			</div>
		   </div>
		    <!-- chalange automation end-->
		
		
		</div>
		 <hr/>
	    <!--<div class="row fulwid" ng-repeat="p in percentagearray">
			 <div class="col-sm-6 ">
					What's the actual share of {{p.product}} sales
			</div>
			<div class="col-sm-2">{{p.percentage}}%</div>
		</div>-->
	       <div class="row" ng-repeat="p in percentagearray" >
                <div class="col-sm-8 fulwid" style="color: #2c7ea1; font-weight: bold;">
                <div class="col-sm-10 ng-binding">
					What's the actual share of {{p.product}} sales
			    </div>
                 <div class="col-sm-2 ng-binding">{{p.percentage}}%</div> 
                
                </div>
                <div class="col-sm-4"></div>
            </div>
    
    <!-- /.content -->
    </div>
       </div>
  
     </section>
   
    </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("reports", function($scope,$http,$timeout) { 



	$scope.init=function()
	  {
		  $scope.totalprofit = function(){
			    if($scope.costlist.length>0){
				var total = 0;
				for(var i = 0; i < $scope.costlist.length; i++){
					var order = $scope.costlist[i].order;
					//console.log(order);
					var unit_price = $scope.costlist[i].unit_price;
					total += (order * unit_price);
				}
				//return Math.round(total);
				return total;
				}
			}
			$scope.totalprofit2 = function(){
				var total2 = 0;
				for(var i = 0; i < $scope.costlist2.length; i++){
					var order = $scope.costlist2[i].order;
					//console.log(order);
					var unit_price = $scope.costlist2[i].unit_price;
					total2 += (order * unit_price);
				}
				//$scope.grossprofit_calculation=Math.round(total2);
				//return Math.round(total2);
				return total2;
			} 
		 $http({
					method : 'POST',
					url : '<?php echo base_url();?>index.php/simulator/get_champain_reports',
					
							headers: {'Content-Type': 'application/x-www-form-urlencoded'},
							data :JSON.stringify({datevalue:0})
							 }).success(function(data) {
								 if(data.length>0)
								 {
									 $scope.recordfound=true;
									 $scope.recordfound2=true;
							 console.log(data);
							 $scope.costlist=data[1].cost;
							 $scope.suppliertotal_cost=data[2].suppliertotal_cost;
							 $scope.fulfillment=data[3].fulfillment;
							 $scope.stripeorder=data[4].stripeorder;
							 $scope.mislan=parseInt(data[5].mislan);
							 $scope.grossprofit=data[6].grossprofit;
							 $scope.expenses=data[7].expenses;
							 
							 
							  $scope.costlist2=data[8].cost2;
							 $scope.suppliertotal_cost2=data[9].suppliertotal_cost2;
							 $scope.fulfillment2=data[10].fulfillment2;
							 $scope.stripeorder2=data[11].stripeorder2;
							 $scope.mislan2=parseInt(data[12].mislan2);
							 $scope.grossprofit2=data[13].grossprofit2;
							 $scope.expenses2=data[14].expenses2;
										 
										 
							var total2 = 0;			 
							for(var i = 0; i < $scope.costlist2.length; i++){
								var order = $scope.costlist2[i].order;
								//console.log(order);
								var unit_price = $scope.costlist2[i].unit_price;
								total2 += (order * unit_price);
							}
							$scope.grossprofit_calculation=Math.round(total2);
							//$scope.grossprofit_calculation=totalprofit2();
							
							
							var percentagearraydata = new Array();
							for(var i = 0; i < $scope.costlist.length; i++){
									var order2 = $scope.costlist[i].order;
									//console.log(order2);
									var unit_price2 = $scope.costlist[i].unit_price;
									var subtotal=(order2 * unit_price2)
									console.log(subtotal);
									//total += (order * unit_price);
									var percentage=Math.round((subtotal/total2)*100);
									console.log(percentage);
									
									//$scope.percentagearray[i]['percentage']=percentage;
									//console.log(percentagearray);
									percentagearraydata.push({ 
											"product" :$scope.costlist[i].product,
											"percentage"  :percentage
										});
										
									
								}
								$scope.percentagearray=percentagearraydata;
								console.log(percentagearraydata);
							
								 }
								 else
									 {
										 $scope.costlist2=0;
										 $scope.costlist=0;
										 $scope.simulatornorecord=true;
									 }
							
							
							
							
							
							 
							 
							 });
							 
							 
		
		$scope.change = function (e, myValue) {
         var charCode = (e.which) ? e.which : e.keyCode; 
        //console.log(myValue);
		//alert(myValue);
		//$scope.grossprofit2=myValue;
		    
			if($scope.costlist.length>0){
			var total = 0;
				for(var i = 0; i < $scope.costlist.length; i++){
					var order = $scope.costlist[i].order;
					//console.log(order);
					var unit_price = $scope.costlist[i].unit_price;
					total += (order * unit_price);
					
				}
				for(var i = 0; i < $scope.costlist.length; i++){
					var order2 = $scope.costlist[i].order;
					//console.log(order2);
					var unit_price2 = $scope.costlist[i].unit_price;
					var subtotal=(order2 * unit_price2)
					//total += (order * unit_price);
					var percentage=Math.round((subtotal/total)*100);
					console.log(percentage);
					//var amounofitem=Math.round(((total*percentage)/100)/unit_price2);
					var amounofitem=Math.round((myValue*percentage/100)/unit_price2);
					console.log(myValue);
					console.log(amounofitem);
			        $scope.costlist2[i].order=amounofitem;
					
				}
				//return Math.round(total);
				return total;
		
			}
		
		
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