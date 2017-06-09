<?php
/*
    Description : Model for Reports
    Author      : samiran
    Date        : 6/2/2017
*/
class Reports_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	public function get_productlist()
    {
		
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
		$sql1="SELECT 	concat(	title,' ',variants_title) 'label' ,variants_id 'value' FROM  `rev_shopify_product` where user_id=".$user_interanal_id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_storelist()
    {
		
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
		$sql1="SELECT id 'value' ,store_name 'label' FROM  `rev_storinfo` where user_id=".$user_interanal_id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_campaignlist($user_id)
    {
		$sql1="SELECT 	ads_id  ,concat(cam_name , ' - ' ,ads_name) 'label' FROM  `rev_facebook_ads_campain` where status='ACTIVE' and user_id=$user_id";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function get_setup_productlist()
    {
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
       
		  $sql1="SELECT a.id,a.report_name,a.store_name,a.product_id,a.product_name,
                     a.setup_date,
					 a.store_id,
					 a.dist_cost,
					 a.dist_shippingcost,
					 a.packaging_cost,
					 a.shipping_cost,
					 a.gate_charge_fix,
					 a.gate_charge_percent,
					 a.desire_margin,
					 a.ads_id
					 FROM  rev_setup_productlist a inner join rev_storinfo b on a.store_id=b.id and b.user_id=".$user_interanal_id;
		$query1= $this->db->query($sql1);
	   $query_res1=$query1->result();
	  $orderno=0;
	  $supplier_cost=0;
	  $fulfillment=0;
	  $gatewaycharge=0;
	  if(!empty($query_res1)):
	  foreach($query_res1 as $k=>$product)
			{
				 $variants_id=$product->product_id;
				  $id=$product->id;
				//$report_name=$product->report_name;
				 $dist_cost=$product->dist_cost;
				 $dist_shippingcost=$product->dist_shippingcost;
				 
				 $packaging_cost=$product->packaging_cost;
				 $shipping_cost=$product->shipping_cost;
				 $gate_charge_fix=$product->gate_charge_fix;
				 $gate_charge_percent=$product->gate_charge_percent;
				 
				 
				 
				 
				 
				 
				 
				  $sql12="SELECT SUM(  `line_items_quantity` ) orders,SUM( `total_price` ) 'sales'
					    FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id."";
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			
						if(!empty($query_res1_p))  
						{
							
							 $productandorder[$k]['report_name']=$product->report_name;
							$productandorder[$k]['setup_date']=$product->setup_date;
							// $productandorder[$k]['total_price']=$query12->row()->sales;
							if($query12->row()->sales>0)
							{
								$productandorder[$k]['total_price']=$query12->row()->sales;
							
							}
							else
							{
								$productandorder[$k]['total_price']=0;
							
							}
							/* $orderno=$query12->row()->orders;
							
							
							$supplier_cost=$dist_cost+$dist_shippingcost;
							$supplier_cost=$supplier_cost*$orderno;
							
							$fulfillment=$packaging_cost+$shipping_cost;
							$fulfillment=$fulfillment*$orderno;
							
							
							
							$productandorder[$k]['report_name']=$report_name;
							$productandorder[$k]['report_name']=$product->setup_date;
							$productandorder[$k]['order']=$orderno;
										
										$sql_stripe="SELECT SUM(  `line_items_quantity` ) gatewayorders
												FROM  `rev_orders` 
												where line_items_variant_id=".$variants_id." and `gateway` =  'stripe' ";
									$query_stripe= $this->db->query($sql_stripe);
									$query_res_stripe=$query_stripe->result();
									 */
									
									/* if(!empty($query_res_stripe))  
									{
										
										if($gate_charge_fix>0)
										{
											$total_stripe_order=$query_stripe->row()->total_stripe_order;
										$stripecharge=(($total_stripe_order*$gate_charge_fix;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->total_stripe_order;
										$charge=((($total_stripe_order*$supplier_cost)*$gate_charge_percent)/100);
										$stripe_order=$stripe_order+$charge;
										
										}
										 
										
									}
							
							 */
						}
						else
						{
							$productandorder[$k]['report_name']=$product->report_name;
							$productandorder[$k]['setup_date']=$product->setup_date;
							if($query12->row()->sales>0)
							{
								$productandorder[$k]['total_price']=$query12->row()->sales;
							
							}
							else
							{
								$productandorder[$k]['total_price']=0;
							
							}
							 
						}
						
						$productandorder[$k]['id']=$id;
				
			}
			 return $productandorder;
	     endif;
	 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	}
	
	public function view_setup_product($reportID)
    {
		 
	  $sql1="SELECT *  FROM  `rev_setup_productlist` where id=".$reportID;
	  $query1= $this->db->query($sql1);
	  $query_res1=$query1->result();
	  $orderno=0;
	  $supplier_cost=0;
	  $fulfillment=0;
	  $gatewaycharge=0;
	  $stripecharge=0;
	  $totalsales=0;
	  //print_r($query_res1);exit;
	  foreach($query_res1 as $k=>$product)
			{
				 $variants_id=$product->product_id;
				  $id=$product->id;
				$report_name=$product->report_name;
				 $dist_cost=$product->dist_cost;
				 $dist_shippingcost=$product->dist_shippingcost;
				 
				 $packaging_cost=$product->packaging_cost;
				 $shipping_cost=$product->shipping_cost;
				 $gate_charge_fix=$product->gate_charge_fix;
				 $gate_charge_percent=$product->gate_charge_percent;
				 
				 
				 
				 
				 
				 
				 
				  $sql12="SELECT SUM(  `line_items_quantity` ) orders,SUM( `total_price` ) 'sales'
					    FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id."";
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			
						if(!empty($query_res1_p))  
						{
							
							$orderno=$query12->row()->orders;
							if($orderno<=0)
							{
								$orderno=0;
							}
							$totalsales=$query12->row()->sales;
							if($totalsales<=0)
							{
								$totalsales=0;
							}
							
							
							
							$supplier_cost=$dist_cost+$dist_shippingcost;
							$supplier_cost=$supplier_cost*$orderno;
							
							$fulfillment=$packaging_cost+$shipping_cost;
							$fulfillment=$fulfillment*$orderno;
							$sql_stripe="SELECT SUM(  `line_items_quantity` ) gatewayorders
												FROM  `rev_orders` 
												where line_items_variant_id=".$variants_id." and `gateway` =  'stripe' ";
									$query_stripe= $this->db->query($sql_stripe);
									$query_res_stripe=$query_stripe->result();
									
							 if(!empty($query_res_stripe))  
									{
										
										 if($gate_charge_fix>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge=$total_stripe_order*$gate_charge_fix;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge=((($total_stripe_order*$supplier_cost)*$gate_charge_percent)/100);
										} 
										 
										
									}
							
							$productandorder[$k]['report_name']=$report_name;
							$productandorder[$k]['setup_date']=$product->setup_date;
							$productandorder[$k]['order']=$orderno;
							$productandorder[$k]['total_price']=$totalsales;
										
							
						 $productandorder[$k]['supplier_cost']=$supplier_cost;							
						$productandorder[$k]['fulfillment']=$fulfillment;	
						$productandorder[$k]['stripecharge']=$stripecharge;	 	

                        $totalsales=$query12->row()->sales;
						$productandorder[$k]['netsales']= $totalsales - $stripecharge;	
						$productandorder[$k]['net']=$totalsales - $stripecharge - $fulfillment - $supplier_cost;
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
						
						    $productandorder[$k]['report_name']=$report_name;
							$productandorder[$k]['setup_date']=$product->setup_date;
							$productandorder[$k]['order']=$orderno;
							$productandorder[$k]['total_price']=$query12->row()->sales;
										
							
							$productandorder[$k]['supplier_cost']=0;						
							$productandorder[$k]['fulfillment']=0;	
							$productandorder[$k]['stripecharge']=0;	
						
							
						}
						//print_r($productandorder);exit;
						$productandorder[$k]['id']=$id;
						if($product->ads_id>0)
						{
							        $sql_fb="SELECT * FROM  `rev_facebook_ads_campain` 
								     where ads_id=".$product->ads_id;
									$query_fb= $this->db->query($sql_fb);
									$query_res_fb=$query_fb->result();
						             $cost_per_inline_post_engagement=$query_fb->row()->cost_per_inline_post_engagement;
						
						}
						else
						{
							$cost_per_inline_post_engagement=0;
						}
						         
						
						
						$productandorder[$k]['product_name']=$product->product_name;
						$productandorder[$k]['store_name']=$product->store_name;
						$productandorder[$k]['dist_cost']=$product->dist_cost;
						$productandorder[$k]['dist_shippingcost']=$product->dist_shippingcost;
				       $productandorder[$k]['packaging_cost']=$product->packaging_cost;
					   $productandorder[$k]['shipping_cost']=$product->shipping_cost;
					   $productandorder[$k]['gate_charge_fix']=$product->gate_charge_fix;
					   $productandorder[$k]['gate_charge_percent']=$product->gate_charge_percent;
					   $productandorder[$k]['fb_conversion'] =$cost_per_inline_post_engagement;
					   $productandorder[$k]['desire_margin'] =$product->desire_margin;
			}
	  
	  return $productandorder;
	  
	  
	  
	  
	}
	
	public function report_delete($id)
	{
		  $sql1="delete FROM  `rev_setup_productlist` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	
	public function get_reports_data($datevalue)
    {
		        $data['user_info'] =$this->session->userdata('user_info');
		        $user_interanal_id=$data['user_info']->user_interanal_id;
			/* $sql="SELECT * FROM `rev_orders`";
			$query= $this->db->query($sql);
			$query_res=$query->result();
			echo "<pre>";print_r($query_res); 
			return 1; */
			 /* $sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id FROM `rev_shopify_product` a , rev_setup_productlist b where a.variants_id=b.product_id "; */ 
			  $sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			 b.dist_cost,
			 b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where
             a.variants_id=b.product_id 
			 and b.store_id=c.id and c.user_id=".$user_interanal_id."
			
			 "; 
			$query1= $this->db->query($sql1);
			$query_res1=$query1->result();
             //if(!empty($query_res1))
			//$productlist=json_encode($query_res1);
			 $productandorder='';
			 $suppliertotal_cost=0;
			 $stripe_order=0;
			 $fulfillment=0;
			 $stripecharge=0;
			 $fb_conversion=0;
			 if(!empty($query_res1)):
			foreach($query_res1 as $k=>$product)
			{
				  $variants_id=$product->variants_id;
				 $product_title=$product->product;
				 
				 /*  $id=$product->id;
				  $report_name=$product->report_name;
				 $dist_cost=$product->dist_cost;
				 $dist_shippingcost=$product->dist_shippingcost;
				 
				 $packaging_cost=$product->packaging_cost;
				 $shipping_cost=$product->shipping_cost;
				 $gate_charge_fix=$product->gate_charge_fix;
				 $gate_charge_percent=$product->gate_charge_percent;
				 
				  */
				 
				 
				 //echo "<br>";
				       $sql12="SELECT SUM(  `line_items_quantity` ) orders
					    FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." and YEAR(  `updated_at` )='".$datevalue."'
					    GROUP BY YEAR(  `updated_at` ) "; 
						/* echo  $sql12="SELECT SUM(  `line_items_quantity` ) orders
					    FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." and YEAR(  `updated_at` )='".$datevalue."'"; */
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			//echo "<pre>";print_r($query_res1_p);
			
			if(!empty($query_res1_p))  
			{
				$orderno=$query12->row()->orders;
				
				$productandorder[$k]['product']=$product_title;
				$productandorder[$k]['order']=$orderno;
				
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
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
				
				
				
				
				
				
			}
			else
			{
				$productandorder[$k]['product']=$product_title;
				$productandorder[$k]['order']=0;
			}  

			
			
			  
			}
            endif;

			
			 /* $sql="SELECT SUM(  `total_price` )  'sales', YEAR(  `updated_at` )  'years', SUM(  `line_items_quantity` ) orders 
					FROM  `rev_orders` where  YEAR(  `updated_at` )='".$datevalue."' 
					GROUP BY YEAR(  `updated_at` ) "; */
					
			 $sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where  
					YEAR(  `updated_at` )='".$datevalue."' 
					and a.line_items_variant_id=b.product_id
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					GROUP BY YEAR(  `updated_at` ) "; 
					
					
					
			$query= $this->db->query($sql);
			$query_res=$query->result(); 
			/* foreach($query_res as $k=>$data)
			{
				array_push($query_res[$k],$query_res1);  
			} */
			
			//echo "<pre>";print_r($suppliertotal_cost); 
			
			
			
			$sql_mis="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
					FROM  rev_miscellaneous where  
					user_id=".$user_interanal_id."
					and YEAR(  `datetime` )='".$datevalue."' ";
			$query_mis= $this->db->query($sql_mis);
			$query_res_mis=$query_mis->result(); 
			
			
			
			
			
			
			if(!empty($query_res))
			{
				array_push($query_res,$productandorder);
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));

			
			
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
				
			 array_push($query_res,$productandorder);
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge)); 
			array_push($query_res,array('mislan'=>$query_res_mis));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));	
			}
			
			//echo "<pre>";print_r($query_res);exit;
			
			         $productandorder2='';
					 
					 $stripe_order=0;
					 $orderno=0;
					 $orderno_stripe=0;
			         $total_stripe_order=0;
						$fulfillment_inner=0;
				   $stripe_charges_inner=0;
			for($i=1;$i<=12;$i++) 
			{
				  $sql_sam="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders ,
				   b.dist_cost,
				   b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
				  
					FROM  `rev_orders` a,rev_setup_productlist b,rev_storinfo c where 
					YEAR(  `updated_at` )='".$datevalue."' 
					and  a.line_items_variant_id=b.product_id
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					AND MONTH(  `updated_at` ) =".$i;
			$query_sam= $this->db->query($sql_sam);
			$query_res_sam=$query_sam->result(); 
			//echo "<pre>";print_r($query_res_sam);
		    //$res="s".$datevalue.'_'.$i;
			$res="data";
			//$res="datavalue";
			  
			
			$suppliertotal_cost_inner=0;
			$productandorder2='';
					 
					 $stripe_order=0;
					 $orderno=0;
					 $orderno_stripe=0;
			         $total_stripe_order=0;
						$fulfillment_inner=0;
				   $stripe_charges_inner=0;
				   $query_res_mis_inner=0;
				   $fb_conversion_inner=0;
					foreach($query_res1 as $k=>$product)
					{
							  $variants_id=$product->variants_id;
							 //echo "<br>";
							 $product_title=$product->product;
							 //echo "<br>";
							       $sql12_inner="SELECT SUM(  `line_items_quantity` ) orders
									FROM  `rev_orders` 
									where line_items_variant_id=".$variants_id." and YEAR(  `updated_at` )='".$datevalue."' 
									 AND MONTH(  `updated_at` ) =".$i;
						$query12_inner= $this->db->query($sql12_inner);
						$query_res1_mont_p=$query12_inner->result();
						if(!empty($query_res1_mont_p))  
						{
							$orderno=$query12_inner->row()->orders;
							
							$productandorder2[$k]['product']=$product_title;
							if($orderno>0)
							{
								$productandorder2[$k]['order']=$orderno;
								$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost12=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost_inner= $suppliertotal_cost_inner+$suppliertotal_cost12;//supplier cost
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment_inner=$fulfillment_inner+$fulfillment2;
				
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
										$stripe_charges_inner=$stripe_charges_inner+$stripecharge1;
										
										}
										if($gate_charge_percent>0)
										{
											$total_stripe_order=$query_stripe->row()->gatewayorders;
										$stripecharge2=((($total_stripe_order*$suppliertotal_cost1)*$gate_charge_percent)/100);
										$stripe_charges_inner=$stripe_charges_inner+$stripecharge2;
										} 
										 
										
									}
									
									
									
								$sql_mis_inner="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
										FROM  rev_miscellaneous where  
										YEAR(  `datetime` )='".$datevalue."' 
										and user_id=".$user_interanal_id."
										AND MONTH(  `datetime` ) =".$i;
								$query_mis_inner= $this->db->query($sql_mis_inner);
								$query_res_mis_inner=$query_mis_inner->result();
								
								
								$ads_id=$product->ads_id;
								if($ads_id>0)
								{
								$sql_fb_inner="SELECT * FROM  `rev_facebook_ads_campain` 
								  where ads_id=".$ads_id;
									$query_fb_inner= $this->db->query($sql_fb_inner);
									$query_res_fb_inner=$query_fb_inner->result();
						             $cost_per_inline_post_engagement2=$query_fb_inner->row()->cost_per_inline_post_engagement;
						
				                $fb_conversion_inner=$fb_conversion_inner+$cost_per_inline_post_engagement2;
								}
								else
								{
									$fb_conversion_inner=0;
								}
								
								
								
							}
							else
							{
								$productandorder2[$k]['order']=0;
							}
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
						}
						else
						{
							$productandorder2[$k]['product']=$product_title;
							$productandorder2[$k]['order']=0;
						}
						
						

						/* 
		                         $sql_suppliercost_inner="SELECT SUM(  `cost` ) cost,SUM(  `quantity` ) quantity
									FROM  `rev_supplier_orders` 
									where product_id=".$variants_id." 
									and YEAR(`date`)='".$datevalue."'
									AND MONTH(  `date` ) =".$i;
				
						$query_suppliercost_inner= $this->db->query($sql_suppliercost_inner);
						$query_res1_m_supp_inner=$query_suppliercost_inner->result();
						if(!empty($query_res1_m_supp_inner))  
						{
					$suppliertotal_cost_inner=$suppliertotal_cost_inner+$query_suppliercost_inner->row()->cost;
						}
						
						
						  
						
						 $sql_stripe="SELECT SUM(  `line_items_quantity` ) orders,SUM(  `total_price` ) 'total_stripe_order'
									FROM  `rev_orders` 
									where line_items_variant_id=".$variants_id." and YEAR(  `updated_at` )='".$datevalue."' 
									and `gateway` =  'stripe'
									AND MONTH(  `updated_at` ) =".$i;
									
									
						$query_stripe= $this->db->query($sql_stripe);
						$query_res_stripe=$query_stripe->result();
						
						
						if(!empty($query_res_stripe))  
						{
							$total_stripe_order=$query_stripe->row()->total_stripe_order;
							if($total_stripe_order>0)
							{
								$charge=(($total_stripe_order*2.6)/100)+0.30;
							$stripe_order=$stripe_order+$charge;
							}
							
							
						}  */
			
			
			  
					}
			
			
			 //echo "<pre>";print_r($query_res_sam);exit;
			
				 array_push($query_res_sam,$productandorder2);
				//array_push($query_res_sam,array('suppliertotal_cost'=>$suppliertotal_cost));
				array_push($query_res_sam,array('suppliertotal_cost'=>$suppliertotal_cost_inner));
				
				
				array_push($query_res_sam,array('fulfillment'=>$fulfillment_inner));
				array_push($query_res_sam,array('stripeorder'=>$stripe_charges_inner));
				
			   array_push($query_res_sam,array('mis_inner'=>$query_res_mis_inner));
			   array_push($query_res_sam,array('fb_conversion_inner'=>$fb_conversion_inner*$orderno));
			   
			   
			    
				 
				if(!empty($query_res_sam))
					{
						array_push($query_res,array($res=>$query_res_sam));
						//array_push($query_res,array('fulfillment'=>3.10));
					} 
					 else
					{
						array_push($query_res,array($res=>'0'));
					}
			
			    
			}
			
			
			return $query_res; 
		
    }
	
    public function get_dailyreports_data($datevalue)
    {
				$data['user_info'] =$this->session->userdata('user_info');
		        $user_interanal_id=$data['user_info']->user_interanal_id;
       
			 /* $sql="SELECT SUM( a.`total_price` )  'sales', YEAR( a.`updated_at` )  'years', SUM( a.`line_items_quantity` ) orders, DATE(  `updated_at` )  'dates'
			FROM  `rev_orders` a, rev_setup_productlist b
			WHERE YEAR(  `updated_at` ) =  '2017'
			AND DATE(  `updated_at` ) 
			BETWEEN  '2016-11-01'
			AND  '2017-03-23'
			AND a.line_items_variant_id = b.product_id
			GROUP BY DATE(  `updated_at` )"; */ 
			$currentdate=date('Y-m-d');
			$daysbefore =date('Y-m-d', strtotime("-30 days"));
			
			 $sql="SELECT SUM( a.`total_price` )  'sales', YEAR( a.`updated_at` )  'years', SUM( a.`line_items_quantity` ) orders, DATE(  `updated_at` )  'dates'
			FROM  `rev_orders` a, rev_setup_productlist b,rev_storinfo c
			WHERE 
			DATE(  `updated_at` ) 
			BETWEEN  '".$daysbefore."'
			AND  '".$currentdate."'
			AND a.line_items_variant_id = b.product_id
			and b.store_id=c.id and c.user_id=".$user_interanal_id."
			GROUP BY DATE(  `updated_at` )";
			$query= $this->db->query($sql);
			$query_res=$query->result();
			$dailyreport='';
			$query_res_sam='';
			$productandorder2='';
			if(!empty($query_res)):
			
		     foreach($query_res as $data)
			{
				 $dates=$data->dates; 
				 
				 
			 $sql1="SELECT b.report_name,a.variants_id
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where a.variants_id=b.product_id 
			 and b.store_id=c.id and c.user_id=".$user_interanal_id."
			"; 
			$query_items= $this->db->query($sql1);
			$query_res_items=$query_items->result();
			
			$orderno=0;
			$productandorder2=''; 
			foreach($query_res_items as $k=>$product_data)	 
				 
				 {
					 $sql12="SELECT SUM(  `line_items_quantity` ) orders
					 FROM rev_orders where  line_items_variant_id=".$product_data->variants_id."
					 and DATE( `updated_at` )='".$dates."'
					"; 
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
				 
				/* $dailyreport[]=(object)array('date'=>'Date','sale'=>'Sales','order'=>'Orders','items'=>$query_res_items); */
		 
				 
				 $sql_sam="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders ,
				  DATE(  a.`updated_at` )  'dates',
				  b.product_id,
				  b.report_name,
				   b.dist_cost,
				   b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
				  
					FROM  `rev_orders` a,rev_setup_productlist b ,rev_storinfo c where 
					a.line_items_variant_id=b.product_id
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and   DATE(  a.`updated_at` )='".$dates."'
					group by b.id"; 
				 
				 
				 
				 
				 
				 
				 

				 /*  $sql_sam="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders ,
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
					YEAR(  a.`updated_at` )='".$datevalue."' 
					and  a.line_items_variant_id=b.product_id
					and   DATE(  a.`updated_at` )='".$dates."'
					group by b.id";  */
					
			//echo "</br>";		
			$query_sam= $this->db->query($sql_sam);
			//$query_res_sam[]=$query_sam->result();
			//array_push($query_res,$query_res_sam);
			/* array_push($query_res_sam,array('sales'=>$data->sales));
			array_push($query_res_sam,array('years'=>$data->years));
			array_push($query_res_sam,array('orders'=>$data->orders));
			array_push($query_res_sam,array('dates'=>$data->dates)); */
			
			
			
			
			//array_push($dailyreport,$query_sam->result());
			$suppliertotal_cost_inner=0;
			$dist_cost=0;
			$dist_shippingcost=0;
			$suppliertotal_cost12=0;
			$fulfillment_inner=0;
			$stripe_charges_inner=0;
			$fulfillment1=0;
			$fulfillment2=0;
			$cost_per_inline_post_engagement=0;
			
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
												where line_items_variant_id=".$datainner->product_id." and `gateway` =  'stripe' ";
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
					
					
					
					
					
					               $ads_id=$datainner->ads_id;
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
			
			
			}  
			 /* $sql_mis_inner="SELECT SUM(cost)  'costs' 
										FROM  rev_miscellaneous where  
										YEAR(  `datetime` )='".$datevalue."' 
										AND DATE(  `datetime` ) ='".$dates."'"; */
							 $sql_mis_inner="SELECT SUM(cost)  'costs' 
										FROM  rev_miscellaneous where  
										user_id=".$user_interanal_id."
										and DATE(  `datetime` ) ='".$dates."'"; 
								$query_mis_inner= $this->db->query($sql_mis_inner);
								$query_res_mis_inner=$query_mis_inner->result();     
			
			/* $dailyreport[] = (object) array('date' => $data->dates,'sales' =>$data->sales,'orders' =>$data->orders,'products'=>$query_sam->result(),'suppliertotal_cost'=>$suppliertotal_cost_inner,
			'fulfillment'=>$fulfillment_inner,'stripeorder'=>$stripe_charges_inner,
			'mis_inner'=>$query_res_mis_inner); */
			$dailyreport[] = (object) array('date' => $data->dates,'sales' =>$data->sales,'orders' =>$data->orders,'products'=>$productandorder2,'suppliertotal_cost'=>$suppliertotal_cost_inner,
			'fulfillment'=>$fulfillment_inner,'stripeorder'=>$stripe_charges_inner,
			'mis_inner'=>$query_mis_inner->row()->costs,
			'fb_conversion_inner'=>floatval($cost_per_inline_post_engagement)); 
			// array_push($dailyreport,array('suppliertotal_cost'=>$suppliertotal_cost_inner));
			}
			
			
			
			
			
			else:
			$dailyreport[] = (object) array('orders' => '0');
		     
            endif;			
			
			
			
		return $dailyreport;
	}
	public function get_analysis_data($datevalue1,$datevalue2,$report_id) 
	{
		// $currentyear=date('Y');
		// $currentmonth=date('m');
		  // $currentyear='2017';
		  // $currentmonth='03';
		  $data['user_info'] =$this->session->userdata('user_info');
		   $user_interanal_id=$data['user_info']->user_interanal_id;
		if($report_id>0)
		{
			$sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where a.variants_id=b.product_id  and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 and b.id=".$report_id;
		}
		else
		{
			$sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where a.variants_id=b.product_id 
			and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 
			 ";
		}
		   
			$query1= $this->db->query($sql1);
			$query_res1=$query1->result();
			//print_r($query_res1);
             $productandorder='';
			 $suppliertotal_cost=0;
			 $stripe_order=0;
			 $fulfillment=0;
			 $stripecharge=0;
			 $totalsales=0;
			 
			 $grossprofit=0;
			$expenses=0;
			$fb_conversion=0;
			$total_discounts=0;
			 if(!empty($query_res1)):
			foreach($query_res1 as $k=>$product)
			{
				  $variants_id=$product->variants_id;
				 $product_title=$product->report_name;
				 
				
				       $sql12="SELECT 
					   SUM(  `line_items_quantity` ) orders,
					   SUM( `total_price` ) 'sales',
					   SUM( `total_tax` ) 'total_tax',
					   SUM( `total_discounts` ) 'total_discounts'
					   FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." 
						and updated_at between '".$datevalue1."' and '".$datevalue2."'
					    GROUP BY YEAR(  `updated_at` ) "; 
						
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			//echo "<pre>";print_r($query_res1_p);
			
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
				
				
				$total_discounts1=$query12->row()->total_discounts;
				$total_discounts=$total_discounts+$total_discounts1;
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
				
				
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
				
				$grossprofit1=$total_unit_price*$orderno;
				$grossprofit=$grossprofit+$grossprofit1;
				 
				 //$grossprofit=$totalsales;
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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
				
				$total_discounts1=0;
				$total_discounts=$total_discounts+$total_discounts1;
				
				
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
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
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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

			
			if($report_id > 0 )
			{
				    $sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where 
                    updated_at between '".$datevalue1."' and '".$datevalue2."'
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id and b.id=".$report_id; 
			}
			else
			{
				    $sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where 
                    updated_at between '".$datevalue1."' and '".$datevalue2."'
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id"; 
			}
			
					
					
					
			$query= $this->db->query($sql);
			$query_res=$query->result(); 
			
			$sql_mis="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
					FROM  rev_miscellaneous where  
					user_id=".$user_interanal_id."
					and  datetime between '".$datevalue1."' and '".$datevalue2."'
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
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts));  
			
			
			
			
			
			}
			else
			{
				/* $b= new Object();
				$b->orders = '0';
				  $b->sales = '0';
				   $b->years = $datevalue; */
				   $obj = (object) array('orders' => '0','sales' => '0','years' => $datevalue1);
				$query_res=array();
				array_push($query_res,$obj);
				
			
			
			  array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts)); 
				
			}
			
			return $query_res; 
			
	}
	
	
	public function get_analysis_graph_data($datevalue1,$datevalue2,$report_id) 
	{
		// $currentyear=date('Y'); 
		// $currentmonth=date('m');
		  // $currentyear='2017';
		  // $currentmonth='03';
		  $data['user_info'] =$this->session->userdata('user_info');
		   $user_interanal_id=$data['user_info']->user_interanal_id;
		   $aryRange=array();

					$iDateFrom=mktime(1,0,0,substr($datevalue1,5,2), substr($datevalue1,8,2),substr($datevalue1,0,4));
					$iDateTo=mktime(1,0,0,substr($datevalue2,5,2),substr($datevalue2,8,2),substr($datevalue2,0,4));

					if ($iDateTo>=$iDateFrom)
					{
						array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
						while ($iDateFrom<$iDateTo)
						{
							$iDateFrom+=86400; // add 24 hours
							array_push($aryRange,date('Y-m-d',$iDateFrom));
						}
					}
					//echo "<pre>";print_r($aryRange);
		  $query_res_total[]=''; 
		  $datearray='';
		  $grossprofitarray='';
		  $revenuearray='';
		  $grosmarginarray='';
		  $fb_conversionarray='';
		  $netmarginarray='';
		  $netprofitarray='';
		  
		  foreach($aryRange as $singledate)
		  {
			  $datevalue1=$singledate;
			  $datevalue2=$singledate;
			  if($report_id>0)
		{
			 $sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where a.variants_id=b.product_id  
			 and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 and  b.id=".$report_id;
		}
		else
		{
			$sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b , rev_storinfo c where a.variants_id=b.product_id 
			and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 ";
		}
		   
			$query1= $this->db->query($sql1);
			$query_res1=$query1->result();
			//print_r($query_res1);
             $productandorder='';
			 $suppliertotal_cost=0;
			 $stripe_order=0;
			 $fulfillment=0;
			 $stripecharge=0;
			 $totalsales=0;
			 
			 $grossprofit=0;
			$expenses=0;
			$fb_conversion=0;
			$total_discounts=0;
			 if(!empty($query_res1)):
			foreach($query_res1 as $k=>$product)
			{
				  $variants_id=$product->variants_id;
				 $product_title=$product->report_name;
				 
				
				      $sql12="SELECT 
					   SUM(  `line_items_quantity` ) orders,
					   SUM( `total_price` ) 'sales',
					   SUM( `total_tax` ) 'total_tax',
					   SUM( `total_discounts` ) 'total_discounts'
					   FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." 
						and DATE(updated_at) = '".$datevalue1."' 
					    GROUP BY YEAR(  `updated_at` ) "; 
						
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			//echo "<pre>";print_r($query_res1_p);
			
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
				
				
				$total_discounts1=$query12->row()->total_discounts;
				$total_discounts=$total_discounts+$total_discounts1;
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
				
				
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
				
				$grossprofit1=$total_unit_price*$orderno;
				$grossprofit=$grossprofit+$grossprofit1;
				 
				 //$grossprofit=$totalsales;
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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
				
				$total_discounts1=0;
				$total_discounts=$total_discounts+$total_discounts1;
				
				
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
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
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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

			
			if($report_id > 0 )
			{
				     $sql="SELECT SUM(  a.`total_price` )  'sales', DATE(  a.`updated_at` ) 'dates',YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where 
                    DATE(updated_at) = '".$datevalue1."' 
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id and b.id=".$report_id; 
			}
			else
			{
				    $sql="SELECT SUM(  a.`total_price` )  'sales',DATE(  a.`updated_at` ) 'dates', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b , rev_storinfo c where 
                    DATE(updated_at) = '".$datevalue1."' 
					and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id"; 
			}
			
					
					
					
			$query= $this->db->query($sql);
			$query_res=$query->result(); 
			
			$sql_mis="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
					FROM  rev_miscellaneous where  
					user_id=".$user_interanal_id."
					and DATE( datetime )='".$datevalue1."'
					";
					
			$query_mis= $this->db->query($sql_mis);
			$query_res_mis=$query_mis->result(); 
			
			
			
			
			
			//echo "<pre>";print_r($query_res);
			if(!empty($query_res))
			{
				array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts));  
			array_push($query_res,array('dates'=>$datevalue1));
			
			 $sales_of_theday=$query->row()->sales;
			//echo "<br>";
			
			  $cogs=$suppliertotal_cost+$fulfillment+$stripecharge+$query_res_mis[0]->costs+$expenses;
			//echo "<br>";
			//$grossprofitarray[]=$sales_of_theday - $cogs;
			if(($sales_of_theday - $cogs)>0)
			{
			 $grossprofitarray[]=$sales_of_theday - $cogs;
			}
			else
			{
			 	$grossprofitarray[]=0; 
			}
			
			
		    $revenuearray[]=floatval($sales_of_theday);
			$datearray[]=$datevalue1;
			
			if($sales_of_theday>0)
			{
				$temp=(($sales_of_theday - $cogs)/$sales_of_theday)*100;
				if($temp>0)
				{
					$grosmarginarray[]=round($temp);
				}
				else
				{
					$grosmarginarray[]=0;
				}
				
			
			}
			else
			{
				$grosmarginarray[]=0;
			
			}				
			
			$fb_conversionarray[]=$fb_conversion;
			if($sales_of_theday>0)
			{
				$temp=(($sales_of_theday - $cogs-$fb_conversion)/$sales_of_theday)*100;
				if($temp>0)
				{
					$netmarginarray[]=round($temp);
				}
				else
				{
					$netmarginarray[]=0;
				}
			
			}
			else
			{
				$netmarginarray[]=0;
			
			}
			
			$netprofitarray1=$sales_of_theday - $cogs-$fb_conversion;
			if($netprofitarray1>0)
			{
				$netprofitarray[]=$sales_of_theday - $cogs-$fb_conversion;
			}
			else
			{
				$netprofitarray[]=0;
			}
			
			}
			else
			{
				/* $b= new Object();
				$b->orders = '0';
				  $b->sales = '0';
				   $b->years = $datevalue; */
				   $obj = (object) array('orders' => '0','sales' => '0','years' => $datevalue1);
				$query_res=array();
				array_push($query_res,$obj);
				
			
			
			  array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts)); 
			array_push($query_res,array('dates'=>$datevalue1));
				
			$sales_of_theday=0;
		    $cogs=$suppliertotal_cost+$fulfillment+$stripecharge+$query_res_mis[0]->costs+$expenses;
			//echo "<br>";
			//$grossprofitarray[]=$sales_of_theday - $cogs;
			if(($sales_of_theday - $cogs)>0)
			{
			 $grossprofitarray[]=$sales_of_theday - $cogs;
			}
			else
			{
			 $grossprofitarray[]=0; 
			}
			//echo "<br>";
			
		    $revenuearray[]=floatval($sales_of_theday);
			$datearray[]=$datevalue1;
			
			if($sales_of_theday>0)
			{
				$temp=(($sales_of_theday - $cogs)/$sales_of_theday)*100;
				if($temp>0)
				{
					$grosmarginarray[]=round($temp);
				}
				else
				{
					$grosmarginarray[]=0;
				}
				
			
			}
			else
			{
				$grosmarginarray[]=0;
			
			}				
			
			$fb_conversionarray[]=$fb_conversion;
			if($sales_of_theday>0)
			{
				$temp=(($sales_of_theday - $cogs-$fb_conversion)/$sales_of_theday)*100;
				if($temp>0)
				{
					$netmarginarray[]=round($temp);
				}
				else
				{
					$netmarginarray[]=0;
				}
			
			}
			else
			{
				$netmarginarray[]=0;
			
			}
			
			
			$netprofitarray1=$sales_of_theday - $cogs-$fb_conversion;
			if($netprofitarray1>0)
			{
				$netprofitarray[]=$sales_of_theday - $cogs-$fb_conversion;
			}
			else
			{
				$netprofitarray[]=0;
			}
				
				
			}
			//array_push($query_res_total,array('analysofday'=>$query_res));
			
			  
		  }
		 // print_r($netprofitarray);
		  array_push($query_res_total,array('daterange'=>$datearray));
		  array_push($query_res_total,array('grossprofitarray'=>$grossprofitarray));
		  array_push($query_res_total,array('revenuearray'=>$revenuearray)); 
		  array_push($query_res_total,array('grosmarginarray'=>$grosmarginarray)); 
          array_push($query_res_total,array('fb_conversionarray'=>$fb_conversionarray)); 
		  array_push($query_res_total,array('netprofitarray'=>$netprofitarray));
          array_push($query_res_total,array('netmarginarray'=>$netmarginarray));
          	
        //print_r($grossprofitarray);			
			
		//exit;  
		return $query_res_total; 
			
	}
	
	public function get_prev_analysis_data($datevalue1,$datevalue2,$report_id) 
	{
		    $datetime1 = new DateTime($datevalue1);

			$datetime2 = new DateTime($datevalue2);
			$difference = $datetime1->diff($datetime2);
			$datediff=$difference->days;
		   $days_ago = date('Y-m-d', strtotime('-'.$datediff.' days', strtotime($datevalue1)));
			//echo "<pre>"; print_r($difference);
			
			 $datevalue2=$datevalue1;
			 $datevalue1=$days_ago; 
		        $data['user_info'] =$this->session->userdata('user_info');
		        $user_interanal_id=$data['user_info']->user_interanal_id;

		if($report_id>0)
		{
			$sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c  where a.variants_id=b.product_id   and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 and b.id=".$report_id;
		}
		else
		{
			$sql1="SELECT concat(	a.title,' ',a.variants_title) 'product' ,a.variants_id ,
			  b.report_name,
			  b.dist_cost,
			  b.ads_id,
			 b.dist_shippingcost,
			 b.dist_shippingcost,
			 b.packaging_cost,
			 b.shipping_cost,
			 b.gate_charge_fix,
			 b.gate_charge_percent
			 FROM `rev_shopify_product` a , rev_setup_productlist b ,rev_storinfo c where a.variants_id=b.product_id 
			 and b.store_id=c.id and c.user_id=".$user_interanal_id."
			 ";
		}
		   
			$query1= $this->db->query($sql1);
			$query_res1=$query1->result();
			//print_r($query_res1);
             $productandorder='';
			 $suppliertotal_cost=0;
			 $stripe_order=0;
			 $fulfillment=0;
			 $stripecharge=0;
			 $totalsales=0;
			 
			 $grossprofit=0;
			$expenses=0;
			$fb_conversion=0;
			$total_discounts=0;
			 if(!empty($query_res1)):
			foreach($query_res1 as $k=>$product)
			{
				  $variants_id=$product->variants_id;
				 $product_title=$product->report_name;
				 
				
				       $sql12="SELECT 
					   SUM(  `line_items_quantity` ) orders,
					   SUM( `total_price` ) 'sales',
					   SUM( `total_tax` ) 'total_tax',
					   SUM( `total_discounts` ) 'total_discounts'
					   FROM  `rev_orders` 
						where line_items_variant_id=".$variants_id." 
						and updated_at between '".$datevalue1."' and '".$datevalue2."'
					    GROUP BY YEAR(  `updated_at` ) "; 
						
			$query12= $this->db->query($sql12);
			$query_res1_p=$query12->result();
			//echo "<pre>";print_r($query_res1_p);
			
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
				
				
				$total_discounts1=$query12->row()->total_discounts;
				$total_discounts=$total_discounts+$total_discounts1;
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
				
				
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
				
				$grossprofit1=$total_unit_price*$orderno;
				$grossprofit=$grossprofit+$grossprofit1;
				 
				 //$grossprofit=$totalsales;
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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
				
				$total_discounts1=0;
				$total_discounts=$total_discounts+$total_discounts1;
				
				
				$dist_cost=$product->dist_cost;
				$dist_shippingcost=$product->dist_shippingcost;
				$suppliertotal_cost1=$dist_cost+$dist_shippingcost;
				$suppliertotal_cost= $suppliertotal_cost+$suppliertotal_cost1;
				
				$shipping_cost=$product->shipping_cost;
				$packaging_cost=$product->packaging_cost;
				
				
				$fulfillment1=$packaging_cost+$shipping_cost;
				$fulfillment2=$fulfillment1*$orderno;
				$fulfillment=$fulfillment+$fulfillment2;
				
				
				 $ads_id=$product->ads_id;
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
				//exit;		
				$fb_conversion=$fb_conversion+$cost_per_inline_post_engagement;
				$fb_conversion=$fb_conversion*$orderno;
				
				
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
				$expenses1=$stripecharge + $fulfillment + $suppliertotal_cost;
				$expenses=$expenses+$expenses1;
				
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

			
			if($report_id > 0 )
			{
				    $sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where 
                    updated_at between '".$datevalue1."' and '".$datevalue2."'
					 and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id and b.id=".$report_id; 
			}
			else
			{
				    $sql="SELECT SUM(  a.`total_price` )  'sales', YEAR(  a.`updated_at` )  'years', SUM(  a.`line_items_quantity` ) orders 
					FROM  `rev_orders` a ,rev_setup_productlist b ,rev_storinfo c where 
                    updated_at between '".$datevalue1."' and '".$datevalue2."'
					 and b.store_id=c.id and c.user_id=".$user_interanal_id."
					and a.line_items_variant_id=b.product_id"; 
			}
			
					
					
					
			$query= $this->db->query($sql);
			$query_res=$query->result(); 
			
			$sql_mis="SELECT SUM(cost)  'costs', YEAR( datetime )  'years' 
					FROM  rev_miscellaneous where  
					user_id=".$user_interanal_id."
					and  datetime between '".$datevalue1."' and '".$datevalue2."'
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
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts));  
			
			
			
			
			
			}
			else
			{
				/* $b= new Object();
				$b->orders = '0';
				  $b->sales = '0';
				   $b->years = $datevalue; */
				   $obj = (object) array('orders' => '0','sales' => '0','years' => $datevalue1);
				$query_res=array();
				array_push($query_res,$obj);
				
			
			
			  array_push($query_res,array('cost'=>$productandorder));
			array_push($query_res,array('suppliertotal_cost'=>$suppliertotal_cost));
			
			
			array_push($query_res,array('fulfillment'=>$fulfillment));
			array_push($query_res,array('stripeorder'=>$stripecharge));
			array_push($query_res,array('mislan'=>$query_res_mis[0]->costs));
			
			array_push($query_res,array('grossprofit'=>$grossprofit));
			array_push($query_res,array('expenses'=>$expenses));
			array_push($query_res,array('fb_conversion'=>$fb_conversion));  
			array_push($query_res,array('total_discounts'=>$total_discounts)); 
				
			}
			
			return $query_res; 
			
	}
}

