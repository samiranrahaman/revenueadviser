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
								     <!-- <h3>View Report</h3>-->
									 <h3><?php echo $resultview[0]['report_name']; ?></h3>
							        </div>
									
									<div class="clearfix"> </div>
							
							
							<table class="table table-striped">
       
       
										<thead>
											<tr class="rpttext">
											  <th class="col-sm-3 tittex">Total Sales</th>
											  <th class=" col-sm-3 tittex">Gross Revenue</th>
											  <th class=" col-sm-3 tittex">Net Sales</th>
											  <th class="col-sm-3 tittex">Net</th>
									   </thead>
											<tbody>
											<tr  class="rpttext2">
											  <th class="col-sm-3 greene"><?php echo $resultview[0]['order']; ?></th>
											  <th class=" col-sm-3 greene">$<?php 
											  $grossrevenue=$resultview[0]['total_price']; 
											   echo number_format($grossrevenue, 2, '.', '');
											  ?></th>
											  <th class=" col-sm-3 greene">$<?php
											  //echo $resultview[0]['netsales']; 
											  echo number_format($resultview[0]['netsales'], 2, '.', '');
											  ?></th>
											  <th class="col-sm-3 greene">$<?php 
											 // echo $resultview[0]['net'];
											  echo number_format($resultview[0]['net'], 2, '.', '');
											  ?></th>
											</tr>
											  
										</tbody>
									  </table>


											
											<table class="tablev">
									   
									
											<tbody>
											<tr>
											  <td class="col-sm-6 text-l padleftt">Product  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l"><?php echo $resultview[0]['product_name']; ?></td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt">Total Unit Price  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$<?php 
											    $total_unit_price=$resultview[0]['total_price']/$resultview[0]['order'];
											   echo number_format($total_unit_price, 2, '.', '');
											   ?></td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt">Total Unit cost  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l ">$<?php 
									$total1=$resultview[0]['dist_cost']+ $resultview[0]['dist_shippingcost']+$resultview[0]['packaging_cost']+$resultview[0]['shipping_cost']+$resultview[0]['gate_charge_fix'] + $resultview[0]['fb_conversion']* $resultview[0]['order'];
											   
										 $total1=$total1+($total1*$resultview[0]['gate_charge_percent'])/100;
										echo number_format($total1, 2, '.', '');
										$total_unit_cost=$total1;									
											   ?> </td>
											</tr>
												
											 <tr>
											  <td class="col-sm-6 text-l padleftt">Total Gateway Charges &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$<?php 
											   $totalgatewaycharge=$resultview[0]['gate_charge_fix'] + ($total1*$resultview[0]['gate_charge_percent'])/100; 
											  echo number_format($totalgatewaycharge, 2, '.', '');
											  ?></td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt ">Total Cost Per Conversion  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$<?php echo $resultview[0]['fb_conversion']; ?></td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt">Current Margins(Dollars)  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l">$<?php
											   $current_margins=$total_unit_price-$total_unit_cost; 
											   echo number_format($current_margins, 2, '.', '');
											  ?></td>
											</tr>
												  
											 <tr>
											  <td class="col-sm-6 text-l padleftt ">Current Margins(%) &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l"><?php
											    $current_margins_percent= ($current_margins /$total_unit_price )*100; 
											  echo number_format($current_margins_percent, 2, '.', '');
											  ?>%</td>
											</tr>
												
											<tr>
											  <td class="col-sm-6 text-l padleftt ">Markup(%)  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l"> <?php    $markup=($current_margins /$total_unit_cost )*100;
														echo	number_format($markup, 2, '.', '');
											   ?>%</td>
											</tr>
											   
												
												
											 <tr>
											  <td class="col-sm-6 text-l padleftt ">Based on your desire margin of <?php echo $resultview[0]['desire_margin'] ?>(%) ,you need to  &nbsp; &nbsp; : </td>
											  <td class=" col-sm-6 text-l "><?php 
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
												   ?></td>
											</tr>   
												   
												
												
												
											  
										</tbody>
									  </table>	
							
					
		
    </section>
                            
   <!-- /.content -->
	                           </div>
							</div>
   </section>
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