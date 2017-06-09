<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="miscellaneous">
    <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
      <h1>        
        <strong>Miscellaneous Report</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">Miscellaneous</li>
      </ol>
      <br/>       
    </section> -->

 

    <!-- Main content -->
    <section class="content">
	
	 <div id="page-wrapper">
        <div class="col-md-12 graphs">
            
            <div class="xs col-md-12">
           <h3>Miscellaneous Report</h3>
           </div>
         <div class="clearfix"> </div>   
            
        <div class="well1 white">			
		<form  id="miscellaneous" name="miscellaneous" ng-submit="miscellaneousform()" novalidate >
         <fieldset>
	    <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.title.$invalid && !miscellaneous.title.$pristine }">
        <label for="control-label">Miscellaneous Title:</label>
		<input type="text" class="form-control1" placeholder="Report Name" id="title" name="title" ng-model="title" required> 
		<p ng-show="miscellaneous.title.$invalid && !miscellaneous.title.$pristine" class="help-block">Report name is required.</p>
        
      </div>
      
	  <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.cost.$invalid && !miscellaneous.cost.$pristine }">
        <label for="control-label">Miscellaneous Cost:</label>
		
		<input type="number" class="form-control1" placeholder="Cost" id="cost" name="cost" ng-model="cost" required>    
		<p ng-show="miscellaneous.cost.$invalid && !miscellaneous.cost.$pristine" class="help-block">Cost is required.</p>
        
      </div>
   
     <div class="form-group has-feedback" ng-class="{ 'has-error' : miscellaneous.datetime.$invalid && !miscellaneous.datetime.$pristine }">
        <label for="control-label">Miscellaneous Date:</label>
		
		<input type="date" class="form-control1" placeholder="datetime" id="datetime" name="datetime" ng-model="datetime" required>    
		<p ng-show="miscellaneous.datetime.$invalid && !miscellaneous.datetime.$pristine" class="help-block">Date is required.</p>
        
      </div>
   
	  
	  
      <div class="form-group">
       
		        <button type="submit" class="sfbtn" ng-disabled="miscellaneous.$invalid">Set Miscellaneous</button>
       
	  </div>
	   </fieldset>
    </form>	
	
	
	  <hr/>
            
            
            
                   <table class="table table-striped">
       <thead>
          <tr class="tblma">
            <th class="mistbl">Miscellaneous Name</th>
            <th class="mistbl">Miscellaneous Date</th>
            <th class="mistbl">Miscellaneous cost</th>
            <th class="mistbl">Action</th>
          
              
              
            </tr>
            
            
        </thead>
       
        <tbody>

            <tr ng-repeat="miscellaneousitem in miscellaneouslist ">
              <th class="text-l  col-sm-2 ">{{miscellaneousitem.title}}</th>
              <td class=" col-sm-4 ">{{miscellaneousitem.datetime}}</td>
              <td class=" col-sm-2 ">{{miscellaneousitem.cost | currency }}</td>
              <td class="col-sm-4 ">		
        
                <button class="btn-dange">Edit</button>
				<button class="btn-red" ng-click="delete(miscellaneousitem.id)">Delete</button>
               
              </td>
            </tr>
            
        </tbody>
      </table>
	
	
	
	
   
	</div>		
    
	  
	 </div>
	</div>
	</section>
    <!-- /.content -->
  </div>

  <script>
var app = angular.module("myApp", ["ui.bootstrap.modal"]);
app.controller("miscellaneous", function($scope,$http,$timeout,$window) {
	
	
 $http({
						method : 'get',
						url : '<?php echo base_url();?>index.php/miscellaneous/get_miscellaneous',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                //data :JSON.stringify({account_name:$scope.store.account_name, apikey:$scope.store.apikey,password:$scope.store.password,url:$scope.store.url})
			     }).success(function(data) {
					// alert(data.status);
				 console.log(data);

				 $scope.miscellaneouslist =data;
				 
				
			}); 
 
$scope.miscellaneousform=function()
{
	 
	//alert($scope.cost);
	 //alert($scope.productSelected.label);
		$http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/miscellaneous/post_miscellaneous',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({cost:$scope.cost, title:$scope.title,datetime:$scope.datetime})
			}).success(function(data) {
				 console.log(data);
				// alert(data);
                if(data>0)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/miscellaneous/";
				 }
				 /* else
				 {
					 $scope.validationError = true;
				 }  */
				
			});
}
 
$scope.delete = function (str) 
       {
            var deleteUser = $window.confirm('Are you absolutely sure you want to delete?');

    if (deleteUser) {
      
	  
	  $http({
        method : 'POST',
        url : '<?php echo base_url();?>index.php/miscellaneous/miscellaneous_delete',
		
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data :JSON.stringify({id:str})
			}).success(function(data) {
				 console.log(data);
				 //alert(data);
                if(data==1)
 				 {
					  //$scope.validationESuccess = true;
					   window.location.href="<?php echo base_url();?>index.php/miscellaneous";
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