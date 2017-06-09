<script src="<?php echo base_url();?>css/angular-ui-bootstrap-modal.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div ng-init='init()'class="content-wrapper" ng-controller="reports">
    <!-- Content Header (Page header) -->
     
  
    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
							
							<div id="page-wrapper">
								<div class="col-md-12 graphs">

									<div class="xs col-md-12">
								      <h3>View Report</h3>
							        </div>
									
									<div class="clearfix"> </div>
									
								     <div class="hr-divider m-t m-b-md">
										<h3 class="hr-divider-content hr-divider-heading">PUPPY</h3>
								     </div>
							
							    </div>
							</div>
							
							<table class="table table-striped">
       
       
										<thead>
											<tr class="warning">
											  <th class="col-sm-3 ">Total Sales</th>
											  <th class=" col-sm-3 ">Gross Revenue</th>
											  <th class=" col-sm-3 ">Net Sales</th>
											  <th class="col-sm-3 ">Net</th>
									   </thead>
											<tbody>
											<tr>
											  <td class="col-sm-3 ">4</td>
											  <td class=" col-sm-3 ">$77.96999999999998</td>
											  <td class=" col-sm-3 ">$77.97</td>
											  <td class="col-sm-3 ">$ 75.57</td>
											</tr>
											  
										</tbody>
									  </table>


											
											<table class="table table-striped">
									   
									
											<tbody>
											<tr>
											  <td class="col-sm-6 text-r ">Product  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">Ladies Clutch Puppy Wallet apricot</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Total Unit Price  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$19.4925</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Total Unit cost  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$5.522 </td>
											</tr>
												
											 <tr>
											  <td class="col-sm-6 text-r ">Total Gateway Charges &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$0.8822</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Total Cost Per Conversion  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$1.0225</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Current Margins(Dollars)  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$13.9705</td>
											</tr>
												  
											 <tr>
											  <td class="col-sm-6 text-r ">Current Margins(%) &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">71.671155572656%</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Markup(%)  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">253.00%</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-r ">Product  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">Ladies Clutch Puppy Wallet apricot</td>
											</tr>   
												
												
											 <tr>
											  <td class="col-sm-6 text-r ">Based on your desire margin of 75(%) ,you need to  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">Increase Price to $0.648875</td>
											</tr>   
												   
												
												
												
											  
										</tbody>
									  </table>	
							
							
							
							
							
							
							
							<div class="container">
									<div class="row row-centered">
									   
									   <div class="col-xs-12 col-centered col-min">
									   <h3><?php //echo print_r($resultview); ?>
									   <?php echo $resultview[0]['report_name']; ?></h3>
									   <div class="content">
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-3"><?php echo $resultview[0]['order']; ?></div>
											   <div class="col-sm-3">$<?php echo $resultview[0]['total_price']; ?></div>
												 <div class="col-sm-3">$<?php echo $resultview[0]['netsales']; ?></div>
												 <div class="col-sm-3">$
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
									 <!--  <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Store :</div>
											   <div class="col-sm-8" style="text-align: left;"><?php echo $resultview[0]['store_name']; ?></div>
										</div>-->
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Total Unit Price :</div>
											   <div class="col-sm-8" style="text-align: left;">$
											   <?php 
											   echo $total_unit_price=$resultview[0]['total_price']/$resultview[0]['order'];
											   ?>
											   </div>
										</div>
									  <!-- <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Distributor unit cost :</div>
											   <div class="col-sm-8" style="text-align: left;"><?php echo $resultview[0]['dist_cost']; ?></div>
										</div>-->
									   <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Total Unit cost :</div>
											   <div class="col-sm-8" style="text-align: left;">$
											   <?php 
									$total1=$resultview[0]['dist_cost']+ $resultview[0]['dist_shippingcost']+$resultview[0]['packaging_cost']+$resultview[0]['shipping_cost']+$resultview[0]['gate_charge_fix'] + $resultview[0]['fb_conversion']* $resultview[0]['order'];
											   
										echo $total1=$total1+($total1*$resultview[0]['gate_charge_percent'])/100;
										$total_unit_cost=$total1;									
											   ?>
											   
											   </div>
										</div>
										 <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Total Gateway Charges :</div>
											   <div class="col-sm-8" style="text-align: left;">$
											   <?php echo $resultview[0]['gate_charge_fix'] + ($total1*$resultview[0]['gate_charge_percent'])/100; ?>
											   
											   </div>
										</div>
										
										 <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Total Cost Per Conversion :</div>
											   <div class="col-sm-8" style="text-align: left;">$
											   <?php echo $resultview[0]['fb_conversion']; ?>
											   
											   </div>
										</div>
										
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Current Margins(Dollars) :</div>
											   <div class="col-sm-6" style="text-align: left;">$
											   <?php echo $current_margins=$total_unit_price-$total_unit_cost; ?>
											   
											   </div>
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Current Margins(%) :</div>
											   <div class="col-sm-6" style="text-align: left;">
											   <?php echo  $current_margins_percent= ($current_margins /$total_unit_price )*100; ?>%
											   
											   </div>
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Markup(%) :</div>
											   <div class="col-sm-6" style="text-align: left;">
											   <?php    $markup=($current_margins /$total_unit_cost )*100;
														echo	number_format($markup, 2, '.', '');
											   ?>%
											   
											   </div>
										</div>
										<div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
											  <div class="col-sm-4" style="text-align: right;">Based on your desire margin of <?php echo $resultview[0]['desire_margin'] ?>(%) ,you need to: </div>
											   <div class="col-sm-6" style="text-align: left;">
											   <?php 
											   if($current_margins_percent > $resultview[0]['desire_margin'])
											   {
												   echo "<b style='color:green'>Congratulations!You have an Optimized Campaign already based on your desire Margins</b>";
											   }
											   else
												   
												   {
													   
													    $require_margins=($resultview[0]['desire_margin'] *$total_unit_price)/100;
													   
													    $current_margins;
													   echo "<b style='color:red'>Increase Price to $".($require_margins - $current_margins).'</b>';
													  // echo "Reduced Conversion Cost by $0.00";
												   }
												   ?>
											   
											  </div>
										</div>
										
									  <!-- <div class="row " style="border: 1px solid #ecf0f5;padding: 11px 5px 17px 20px;background: #d1d7de;">
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
										</div>-->
										
											
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