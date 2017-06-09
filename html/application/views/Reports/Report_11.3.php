<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <strong>View Report</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>  
        <li class="active">ViewReports</li>
      </ol>
      <br/>       
    </section> 
  
 

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
							
							
							<div class="container">
									<div class="row row-centered">
									   
									   <div class="col-xs-12 col-centered col-min">
									   <h3><?php //echo print_r($resultview); ?>
									   <?php echo $resultview[0]['report_name']; ?></h3>
									   <div class="content">
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-3"><?php echo $resultview[0]['order']; ?></div>
											   <div class="col-sm-3"><?php echo $resultview[0]['total_price']; ?></div>
												 <div class="col-sm-3"><?php echo $resultview[0]['netsales']; ?></div>
												 <div class="col-sm-3">
												 <?php echo $resultview[0]['net']; ?>
												 </div>
										         
										
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-3">Total Sales</div>
											   <div class="col-sm-3">Gross Revenue</div>
												 <div class="col-sm-3">Net Sales</div>
												 <div class="col-sm-3">
												Net
												 </div>
										           
										
										</div> 
									   
									   <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Product :</div>
											   <div class="col-sm-8" style="text-align: left;"><?php echo $resultview[0]['product_name']; ?></div>
										</div>
									   <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Store :</div>
											   <div class="col-sm-8" style="text-align: left;"><?php echo $resultview[0]['store_name']; ?></div>
										</div>
									   <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Distributor unit cost :</div>
											   <div class="col-sm-8" style="text-align: left;"><?php echo $resultview[0]['dist_cost']; ?></div>
										</div>
									   
									   <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Distributor Shipping cost :</div>
											   <div class="col-sm-6" style="text-align: left;"><?php echo $resultview[0]['dist_shippingcost']; ?></div>
										</div>
										
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Packaging cost :</div>
											   <div class="col-sm-6" style="text-align: left;"><?php echo $resultview[0]['packaging_cost']; ?></div>
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Dalevery/Shipping cost :</div>
											   <div class="col-sm-6" style="text-align: left;"><?php echo $resultview[0]['shipping_cost']; ?></div>
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Gateway cost :</div>
											   <div class="col-sm-6" style="text-align: left;">
											   <?php  if($resultview[0]['gate_charge_fix'] >0)
											   {
												   echo "$".' '.$resultview[0]['gate_charge_fix'];
											   } else 
											   { 
										     echo $resultview[0]['gate_charge_percent'].' %';
											   }
											   ?></div>
										</div>
										
											
									   </div>
									   
									   </div>
									   
									   
									   
									</div>
							</div>
	
	
 
		
    </section>
    <!-- /.content -->
  </div>

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