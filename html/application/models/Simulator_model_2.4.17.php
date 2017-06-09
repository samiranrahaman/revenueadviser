<?php
/*
    Description : Model for Simulator
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Simulator_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	public function get_champain_reports()
	{
		// $currentyear=date('Y');
		// $currentmonth=date('m');
		   $currentyear='2017';
		   $currentmonth='03';
		
		  $sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b where a.variants_id=b.product_id 
			
			 "; 
			$query1= $this->db->query($sql1);
			$query_res1=$query1->result();
             $productandorder='';
			 $suppliertotal_cost=0;
			 $stripe_order=0;
			 $fulfillment=0;
			 $stripecharge=0;
			 $totalsales=0;
			 if(!empty($query_res1)):
			foreach($query_res1 as $k=>$product)
			{
				  $variants_id=$product->variants_id;
				 $product_title=$product->report_name;
				 
				
				       $sql12="SELECT 
					   SUM(  `line_items_quantity` ) orders,
					   SUM( `total_price` ) 'sales'
					   FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." 
						and YEAR(  `updated_at` )='".$currentyear."'
						and MONTH(  `updated_at` )='".$currentmonth."'
					    GROUP BY YEAR(  `updated_at` ) "; 
						
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			//echo "<pre>";print_r($query_res1_p);
			$grossprofit=0;
			$expenses=0;
			 if(!empty($query_res1_p))  
			{
				$orderno=$query12->row()->orders;
				//$totalsales=$query12->row()->sales;
							 if($orderno<=0)
							{
								$orderno=0;
							}
							$totalsales=$query12->row()->sales;
							if($totalsales<=0)
							{
								$totalsales=0;
							} 
				
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				$sql_stripe="SELECT SUM(  `line_items_quantity` ) gatewayorders
												FROM  `rev_orders` 
												where line_items_variant_id=".$variants_id." and `gateway` =  'stripe' ";
									$query_stripe= $this->db->query($sql_stripe);
									$query_res_stripe=$query_stripe->result();
									
									$gate_charge_fix=$product->gate_charge_fix;
				                    $gate_charge_percent=$product->gate_charge_percent;
							 if(!empty($query_res_stripe))  
									{
										
										 if($gate_charge_fix>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge1=$total_stripe_order*$gate_charge_fix;
										$stripecharge=$stripecharge+$stripecharge1;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge2=((($total_stripe_order*$suppliertotal_cost1)*$gate_charge_percent)/100);
										$stripecharge=$stripecharge+$stripecharge2;
										} 
										 
										
									}
				
				
				
				
				$total1=$dist_cost+ $dist_shippingcost+$packaging_cost+$shipping_cost+$gate_charge_fix;
											   
				$total1=$total1+($total1*$gate_charge_percent)/100;
				$total_unit_cost=$total1;
				
				$total_unit_price=$totalsales/$orderno;
				
				
				
				
				$productandorder[$k]['product']=$product_title;
				$productandorder[$k]['unit_cost']=$total_unit_cost;
				$productandorder[$k]['unit_price']=$total_unit_price;
				$productandorder[$k]['order']=$orderno;
				
				/* $grossprofit1=$total_unit_price*$orderno;
				$grossprofit=$grossprofit+$grossprofit1;
				 */
				 $grossprofit=$totalsales;
				$expenses=$stripecharge + $fulfillment + $suppliertotal_cost;
				
				
				//$productandorder[$k]['unit_price']=$total_unit_price;
				
				$productandorder[$k]['stripecharge']=$stripecharge;
				$productandorder[$k]['fulfillment']=$fulfillment;
				
				$productandorder[$k]['gate_charge_fix']=$gate_charge_fix;
				$productandorder[$k]['gate_charge_percent']=$gate_charge_percent;
				$productandorder[$k]['ads']=0;
				
				//$totalsales=$query12->row()->sales;
						$productandorder[$k]['netsales']= $totalsales - $stripecharge;	
						$productandorder[$k]['net']=$totalsales - $stripecharge - $fulfillment - $suppliertotal_cost;
						if($totalsales>0)
						{
							$productandorder[$k]['netaov']=$totalsales/$orderno;
						}
						else
						{
							$productandorder[$k]['netaov']=0;
						}
						
						$productandorder[$k]['cpa']=0;
				
				
				
				
				
				
				
				
				
			}
			else
			{
				$orderno=0;
				$totalsales=0;
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				$sql_stripe="SELECT SUM(  `line_items_quantity` ) gatewayorders
												FROM  `rev_orders` 
												where line_items_variant_id=".$variants_id." and `gateway` =  'stripe' ";
									$query_stripe= $this->db->query($sql_stripe);
									$query_res_stripe=$query_stripe->result();
									
									$gate_charge_fix=$product->gate_charge_fix;
				                    $gate_charge_percent=$product->gate_charge_percent;
							 if(!empty($query_res_stripe))  
									{
										
										 if($gate_charge_fix>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge1=$total_stripe_order*$gate_charge_fix;
										$stripecharge=$stripecharge+$stripecharge1;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge2=((($total_stripe_order*$suppliertotal_cost1)*$gate_charge_percent)/100);
										$stripecharge=$stripecharge+$stripecharge2;
										} 
										 
										
									}
				
				
				
				
				$total1=$dist_cost+ $dist_shippingcost+$packaging_cost+$shipping_cost+$gate_charge_fix;
											   
				$total1=$total1+($total1*$gate_charge_percent)/100;
				$total_unit_cost=$total1;
				
				//$total_unit_price=$totalsales/$orderno;
				$total_unit_price=0;
				
				
				$productandorder[$k]['product']=$product_title;
				$productandorder[$k]['unit_cost']=$total_unit_cost;
				$productandorder[$k]['unit_price']=$total_unit_price;
				$productandorder[$k]['order']=$orderno;
				$grossprofit1=$total_unit_price*$orderno;
				$grossprofit=$grossprofit+$grossprofit1;
				$expenses=$stripecharge + $fulfillment + $suppliertotal_cost;
				
				
				//$productandorder[$k]['unit_price']=$total_unit_price;
				
				$productandorder[$k]['stripecharge']=$stripecharge;
				$productandorder[$k]['fulfillment']=$fulfillment;
				
				$productandorder[$k]['gate_charge_fix']=$gate_charge_fix;
				$productandorder[$k]['gate_charge_percent']=$gate_charge_percent;
				$productandorder[$k]['ads']=0;
				
				//$totalsales=$query12->row()->sales;
						$productandorder[$k]['netsales']= $totalsales - $stripecharge;	
						$productandorder[$k]['net']=$totalsales - $stripecharge - $fulfillment - $suppliertotal_cost;
						if($totalsales>0)
						{
							$productandorder[$k]['netaov']=$totalsales/$orderno;
						}
						else
						{
							$productandorder[$k]['netaov']=0;
						}
						
						$productandorder[$k]['cpa']=0;
			}  

			
			
			  
			}
            endif;

			$sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b where  
					YEAR(  `updated_at` )='".$currentyear."'
					and MONTH(  `updated_at` )='".$currentmonth."'
					and a.line_items_variant_id=b.product_id
					GROUP BY YEAR(  `updated_at` ) "; 
					
					
					
			$query= $this->db->query($sql);
			$query_res=$query->result(); 
			
			$sql_mis="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
					FROM  rev_miscellaneous where  
					YEAR(  `datetime` )='".$currentyear."'
					and 
					MONTH(  `datetime` )='".$currentmonth."'
					";
					
			$query_mis= $this->db->query($sql_mis);
			$query_res_mis=$query_mis->result(); 
			
			
			
			
			
			
			if(!empty($query_res))
			{
				array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			
			
			array_push($query_res,array('cost2'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost2'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment2'=>$fulfillment));
			array_push($query_res,array('stripeorder2'=>$stripecharge));
			array_push($query_res,array('mislan2'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit2'=>$grossprofit));
			array_push($query_res,array('expenses2'=>$expenses));
			
			
			}
			else
			{
				/* $b= new Object();
				$b->orders = '0';
				  $b->sales = '0';
				   $b->years = $datevalue; */
				   $obj = (object) array('orders' => '0','sales' => '0','years' => $datevalue);
				$query_res=array();
				array_push($query_res,$obj);
				
			/*  array_push($query_res,$productandorder);
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge)); 
			array_push($query_res,array('mislan'=>$query_res_mis)); */
			
			
			  array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			
			
			array_push($query_res,array('cost2'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost2'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment2'=>$fulfillment));
			array_push($query_res,array('stripeorder2'=>$stripecharge));
			array_push($query_res,array('mislan2'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit2'=>$grossprofit));
			array_push($query_res,array('expenses2'=>$expenses));
				
			}
			
			return $query_res;
			
	}
	
	
	
}

