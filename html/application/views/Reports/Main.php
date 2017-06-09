<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
      <h1>        
        <strong>Reports</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Reports</li>
      </ol>
      <br/>       
    </section> -->

 

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
							
		<div id="page-wrapper">
           <div class="col-md-12 graphs">

						<!--<div class="xs col-md-12">
					       <h3>Your live reports are listed below - View or Edit them under Actions</h3>
				        </div>-->
						 <div class="xs col-md-12">
						   <h3>My Products</h3>
						   </div>
							
							<div class="clearfix"> </div>
            
            <!--<div class="panel panel-warning bodr">
				<div class="panel-heading">
					<h2>TESTING SORE</h2>
					<div class="panel-ctrls" ><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>-->
				<div class="panel-body no-padding table-responsive" style="display: block;">
				
		  
		         <table class="tablev">
			   
			   
				<tbody>

					<tr ng-repeat="prodctitem in setupproducts ">
					  <th class="text-l  col-sm-2 ">{{prodctitem.report_name}}</th>
					  <td class=" col-sm-4 ">{{prodctitem.setup_date}}</td>
					  <td class=" col-sm-2 greene ">{{prodctitem.total_price | currency}}</td>
					  <td class="col-sm-4 ">		
						<a ng-if="prodctitem.total_price!=0" class="vibtn" style="" href="<?php echo base_url();?>index.php/reports/viewreport/{{prodctitem.id}}">View</a>
						<a ng-if="prodctitem.total_price==0" class="vibtn" style="" href="#">View</a>
						  <a class="edbtn" style="" href="<?php echo base_url();?>index.php/newproductadd/othercostedit/{{prodctitem.id}}">Edit</a>
						 <button class="dlbtn2" ng-click="delete(prodctitem.id)">Delete</button>
						 
					  </td>
					</tr>
					<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #ff99001a;"ng-show="!setupproducts.length">No Result Found!</div>

				</tbody>
			  </table>
		        </div>
		   <!-- </div>-->
	</div>
	</div>
 
		
    </section>
    <!-- /.content -->
  </div>
  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("reports", function($scope,$http,$timeout,$window) {
	
	 $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/reports/get_setup_productlist',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);
                 if(data=='null')
				 {
					 $scope.setupproducts =0;
				 }
				 else
				 {
					 $scope.setupproducts =data;
				 }
				 
				
			}); 
			
			
				   
			
	$scope.delete = function (str) 
       {
           
		   var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

		if (deleteUser) {
      
	 // alert(str);
		$http({
        method : 'POST',
				url : '<?php echo base_url();?>index.php/reports/report_delete',
				
						headers: {'Content-Type': 'application/x-www-form-urlencoded'},
						data :JSON.stringify({id:str})
					}).success(function(data) {
						 console.log(data);
						 //alert(data);
						if(data==1)
						 {
							  //$scope.validationESuccess = true;
							   window.location.href="<?php echo base_url();?>index.php/reports";
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