<?php
/*
    Description : Model for Dashboard
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Dashboard_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    public function get_shipping_analysis($user_id)
    {
         $sql1="SELECT count( * ) 'ordercount', sum( a.total_price ) 'totalsales', a.order_id, a.sh_province, a.sh_province_code
		FROM `rev_orders` a, rev_setup_productlist b, rev_storinfo c
		WHERE a.line_items_variant_id = b.product_id
		AND b.store_id = c.id
		AND c.user_id =".$user_id."
		GROUP BY a.sh_province_code
		ORDER BY a.order_id";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
    } 
	 public function get_order_analysis($countrycode)
    {
				$data['user_info'] =$this->session->userdata('user_info');
		   $user_interanal_id=$data['user_info']->user_interanal_id;
			//$currentdate=date('Y-m-d');
			//$daysbefore =date('Y-m-d', strtotime("-30 days"));
			
			/*  $sql="SELECT SUM( a.`total_discounts` ) 'total_discounts',a.name 'order_id_name',a.order_id,SUM( a.`total_price` )  'sales', YEAR( a.`updated_at` )  'years', SUM( a.`line_items_quantity` ) orders, DATE(  `updated_at` )  'dates'  
			FROM  `rev_orders` a, rev_setup_productlist b
			WHERE 
			DATE(  `updated_at` )  
			BETWEEN  '".$daysbefore."'
			AND  '".$currentdate."'
			AND a.line_items_variant_id = b.product_id
			GROUP BY  a.`order_id` "; */
			
			if($countrycode=='0')
			{
				
			  $sql="SELECT a.`total_discounts`  'total_discounts',a.name 'order_id_name',a.order_id, a.`total_price`  'sales', YEAR( a.`updated_at` )  'years', a.`line_items_quantity`  orders, DATE(  `updated_at` )  'dates'  ,
			b.ads_id
			FROM  `rev_orders` a, rev_setup_productlist b ,rev_storinfo c
			WHERE 
			a.line_items_variant_id = b.product_id
			and b.store_id=c.id and c.user_id=".$user_interanal_id."
			GROUP BY  a.`order_id` ";
			}
			else
			{
				 $sql="SELECT a.`total_discounts`  'total_discounts',a.name 'order_id_name',a.order_id, a.`total_price`   'sales', YEAR( a.`updated_at` )  'years', a.`line_items_quantity`  orders, DATE(  `updated_at` )  'dates'  ,
			b.ads_id
			FROM  `rev_orders` a, rev_setup_productlist b ,rev_storinfo c
			WHERE 
			a.line_items_variant_id = b.product_id
			and b.store_id=c.id and c.user_id=".$user_interanal_id."
			and a.sh_province_code='".$countrycode."'
			GROUP BY  a.`order_id` ";
			}
			
			$query= $this->db->query($sql);
			$query_res=$query->result();
			$dailyreport='';
			$query_res_sam='';
			$productandorder2='';
			if(!empty($query_res)):
			
		     foreach($query_res as $data)
			{
				 $dates=$data->dates; 
				 $order_id=$data->order_id; 
				 
			 $sql1="SELECT b.report_name,a.variants_id
			 FROM `rev_shopify_product` a , rev_setup_productlist b , rev_storinfo c where a.variants_id=b.product_id 
			 and b.store_id=c.id and c.user_id=".$user_interanal_id." "; 
			$query_items= $this->db->query($sql1);
			$query_res_items=$query_items->result();
			 
			$orderno=0;
			$productandorder2=''; 
			foreach($query_res_items as $k=>$product_data)	 
				 
				 {
					 /* $sql12="SELECT SUM(  `line_items_quantity` ) orders
					 FROM rev_orders where  line_items_variant_id=".$product_data->variants_id."
					 and DATE( `updated_at` )='".$dates."'
					"; */ 
					if($countrycode==0)
			{
					  $sql12="SELECT SUM(  `line_items_quantity` ) orders
					 FROM rev_orders where  line_items_variant_id=".$product_data->variants_id."
					 and user_id=".$user_interanal_id."
					 and order_id='".$order_id."'";
			}
			else
			{
				 $sql12="SELECT SUM(  `line_items_quantity` ) orders
					 FROM rev_orders where  line_items_variant_id=".$product_data->variants_id."
					 and order_id='".$order_id."'
					 and user_id=".$user_interanal_id."
					 and sh_province_code='".$countrycode."'
					";
			}
			
					
					$query_items2= $this->db->query($sql12);
					$query_res_items2=$query_items2->result();
					if(!empty($query_res_items2))
					{   $orderno=$query_items2->row()->orders;
						   $productandorder2[$k]['product']=$product_data->report_name;
							$productandorder2[$k]['order']=$orderno;
					}
					else
					{
						$productandorder2[$k]['product']=$product_data->report_name;
							$productandorder2[$k]['order']=0;
					}
					 
				 }					 
				 /* $sql_sam="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders ,
				  DATE(  a.`updated_at` )  'dates',
				  b.product_id,
				  b.report_name,
				   b.dist_cost,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
				  
					FROM  `rev_orders` a,rev_setup_productlist b where 
					a.line_items_variant_id=b.product_id
					and   DATE(  a.`updated_at` )='".$dates."'
					group by b.id";  */
						if($countrycode==0)
			{
				$sql_sam="SELECT 
				 SUM( a.`total_discounts` ) 'total_discounts',a.name 'order_id_name',a.order_id,
				 SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', 
				 SUM(  a.`line_items_quantity` ) orders ,
				  DATE(  a.`updated_at` )  'dates',
				  b.product_id,
				  b.report_name,
				   b.dist_cost,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
				  
					FROM  `rev_orders` a,rev_setup_productlist b ,rev_storinfo c  where 
					a.line_items_variant_id=b.product_id
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
				    and a.order_id='".$order_id."'";
			}
			else
			{
				$sql_sam="SELECT 
				 SUM( a.`total_discounts` ) 'total_discounts',a.name 'order_id_name',a.order_id,
				 SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', 
				 SUM(  a.`line_items_quantity` ) orders ,
				  DATE(  a.`updated_at` )  'dates',
				  b.product_id,
				  b.report_name,
				   b.dist_cost,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
				  
					FROM  `rev_orders` a,rev_setup_productlist b , rev_storinfo c where 
					a.line_items_variant_id=b.product_id
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
				    and a.order_id='".$order_id."'
					and a.sh_province_code='".$countrycode."'";
			}
			$query_sam= $this->db->query($sql_sam);
			
			$suppliertotal_cost_inner=0;
			$dist_cost=0;
			$dist_shippingcost=0;
			$suppliertotal_cost12=0;
			$fulfillment_inner=0;
			$stripe_charges_inner=0;
			$fulfillment1=0;
			$fulfillment2=0;
			
			foreach($query_sam->result() as $datainner)
			{
				
				 $dist_cost=$datainner->dist_cost;
				$dist_shippingcost=$datainner->dist_shippingcost;
				$suppliertotal_cost12=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost_inner= $suppliertotal_cost_inner+$suppliertotal_cost12; 
			    
				
			   $shipping_cost=$datainner->shipping_cost;
				$packaging_cost=$datainner->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$datainner->orders;
			   $fulfillment_inner=$fulfillment_inner+$fulfillment2;  
			
			
			
			         $sql_stripe="SELECT SUM(  `line_items_quantity` ) gatewayorders
												FROM  `rev_orders` 
												where line_items_variant_id=".$datainner->product_id."
												and user_id=".$user_interanal_id."
												and `gateway` =  'stripe' ";
									$query_stripe= $this->db->query($sql_stripe);
									$query_res_stripe=$query_stripe->result();
									
							       $gate_charge_fix=$datainner->gate_charge_fix;
				                    $gate_charge_percent=$datainner->gate_charge_percent;
									if(!empty($query_res_stripe))
									{
										 if($gate_charge_fix>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge1=$total_stripe_order*$gate_charge_fix;
										$stripe_charges_inner=$stripe_charges_inner+$stripecharge1;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge2=((($total_stripe_order*$suppliertotal_cost12)*$gate_charge_percent)/100);
										$stripe_charges_inner=$stripe_charges_inner+$stripecharge2;
										} 
									}
					
			
			
			}  
							$sql_mis_inner="SELECT SUM(cost)  'costs' 
										FROM  rev_miscellaneous where 
 										user_id=".$user_interanal_id."
										and DATE(  `datetime` ) ='".$dates."'"; 
								$query_mis_inner= $this->db->query($sql_mis_inner);
								$query_res_mis_inner=$query_mis_inner->result();  


                               $ads_id=$data->ads_id;
				if($ads_id>0)
				{
					$sql_fb="SELECT * FROM  `rev_facebook_ads_campain` 
								  where ads_id=".$ads_id;
									$query_fb= $this->db->query($sql_fb);
									$query_res_fb=$query_fb->result();
						             $cost_per_inline_post_engagement=$query_fb->row()->cost_per_inline_post_engagement;
				}
				else
				{
					$cost_per_inline_post_engagement=0;
				}



								
			
			
			$dailyreport[] = (object) array('fb_conversation' => $cost_per_inline_post_engagement,'order_id_name' => $data->order_id_name,'total_discounts' => $data->total_discounts,'date' => $data->dates,'sales' =>$data->sales,'orders' =>$data->orders,'products'=>$productandorder2,'suppliertotal_cost'=>$suppliertotal_cost_inner,
			'fulfillment'=>$fulfillment_inner,'stripeorder'=>$stripe_charges_inner,
			'mis_inner'=>floatval($query_mis_inner->row()->costs));
			
			}
			
			return $dailyreport;
			else: 
			$dailyreport[] = (object) array('orders' => '0');
			//print_r($dailyreport);
		     return $dailyreport;
            endif;		
			
			
			
		//return $dailyreport;
	}
   

}
