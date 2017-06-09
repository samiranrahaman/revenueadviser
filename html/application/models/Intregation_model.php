<?php
/*
    Description : Model for Intregation
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Intregation_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    public function post_store_info($account_name,$apikey,$password,$url)
    {
        //$sql="insert into `rev_storinfo` set store_name='$account_name',store_apikey='$apikey',store_app_password='$password',store_url='$url',user_id=1";
		//$query_insert = $this->db->query($sql);
		$data['user_info'] =$this->session->userdata('user_info');
		 $user_interanal_id=$data['user_info']->user_interanal_id;
		 $data = array(
        'store_name' => $account_name,
        'store_apikey' => $apikey,
        'store_app_password' =>$password,
		'store_url' => $url,
		'user_id'=>$user_interanal_id,
		);

		$this->db->insert('rev_storinfo', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
    }
	//public function fb_fulfillment($app_id,$app_secret,$user_id)
	public function fb_fulfillment($ads_act,$user_id)
    {
		
       $data = array(
       // 'app_id' => '',
       // 'app_secret' => $app_secret,
        'ads_act' =>$ads_act,
		'user_id' => $user_id,
		);

		$this->db->insert('rev_facebook_info', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
    }
	public function get_store_list()
    {
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
        $sql='select * from  rev_storinfo where user_id='.$user_interanal_id;
       // $query = $this->db->get_where('rev_storinfo',array('user_id' => $user_interanal_id));
	   $query = $this->db->query($sql);
		return $query->result();
		
    }
	public function fb_account_list()
    {
		$data['user_info'] =$this->session->userdata('user_info');
		 $user_interanal_id=$data['user_info']->user_interanal_id;
        $sql='select * from  rev_facebook_info where user_id='.$user_interanal_id;
       // $query = $this->db->get('rev_facebook_info',array('user_id' => $user_interanal_id));
	    $query = $this->db->query($sql);
		return $query->result();
		
    }
	public function store_setup_apicall($storename,$key,$password,$store_id)
    {
             $url='https://'.$key.':'.$password.'@'.$storename.'.myshopify.com/admin/products.json';
			 $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Get the response and close the channel.
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			//echo curl_errno($ch);
			 $response = curl_exec($ch);
			$response_array=json_decode($response);
			$res_products=$response_array->products;
			$id=0;
			$flag=0;
			$user_info=$this->session->userdata('user_info');
		    $user_interanal_id=$user_info->user_interanal_id;
			
			 foreach($res_products as $product)
			{
				$varient=$product->variants;
				
				if(is_array($varient))
				{
					foreach($varient as $product_varient)
					{
						
						$this->db->delete('rev_shopify_product', array('product_id' =>$product->id,'user_id'=>$user_info->user_interanal_id,'variants_id'=>$product_varient->id)); 
						$data = array(
							'product_id' =>$product->id,
							'title' =>$product->title,
							 'body_html' =>$product->body_html,
							'vendor' =>$product->vendor,
							'created_at' =>$product->created_at,
							'handle' =>$product->handle,
							'updated_at' =>$product->updated_at,
							// 'published_at' =>$product->published_at,
							//'template_suffix' =>$product->template_suffix,
							//'published_scope' =>$product->published_scope,
							//'tags' =>$product->tags,  
							'user_id'=>$user_info->user_interanal_id,
							'store_id'=>$store_id,
							'variants_id'=>$product_varient->id,
							'variants_title'=>$product_varient->title,
							'variants_price'=>$product_varient->price,
							'variants_sku'=>$product_varient->sku,
							 'variants_position'=>$product_varient->position,
							'variants_grams'=>$product_varient->grams,
							'variants_inventory_policy'=>$product_varient->inventory_policy,
							//'variants_compare_at_price'=>$product_varient->compare_at_price,
							'variants_fulfillment_service'=>$product_varient->fulfillment_service,
							//'variants_inventory_management'=>$product_varient->inventory_management,
							/* 'variants_option1'=>$product_varient->option1,
							'variants_created_at'=>$product_varient->created_at,
							'variants_updated_at'=>$product_varient->updated_at,
							'variants_taxable'=>$product_varient->taxable,
							'variants_inventory_quantity'=>$product_varient->inventory_quantity,
							'variants_weight'=>$product_varient->weight,
							'variants_weight_unit'=>$product_varient->weight_unit, */
							//'variants_old_inventory_quantity'=>$product_varient->old_inventory_quantity,
							'variants_requires_shipping'=>$product_varient->requires_shipping 
						);

						$sql = $this->db->set($data)->get_compiled_insert('rev_shopify_product'); 
						//echo $sql;
						$this->db->query($sql);
			           $id=$this->db->insert_id() ;
				       if($id){ $flag=1; } 
						
						
						
						
					}
					
					
				}
				
				
			} 
			
			
			 $url='https://'.$key.':'.$password.'@'.$storename.'.myshopify.com/admin/orders.json';
			 $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Get the response and close the channel.
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			//echo curl_errno($ch);
			 $response = curl_exec($ch);
			$response_array=json_decode($response);
			//echo "<pre>"; print_r($response_array);
			$res_products_order=$response_array->orders;
			$id=0;
			$flag=0;
			$user_info=$this->session->userdata('user_info');
		    $user_interanal_id=$user_info->user_interanal_id;
			
			foreach($res_products_order as $orders)
			{
				 $fulfillments=$orders->fulfillments;
				 //echo "<pre>"; print_r($fulfillments);
				if(is_array($fulfillments))
				{

					 foreach($fulfillments as $fulfillments_data)
					{
						
						 $fulfillments_id=$fulfillments_data->id;
						 $fulfillments_id=$fulfillments_data->status;
						 $line_items=$fulfillments_data->line_items;
						if(is_array($line_items))
				        {
							//echo "<pre>"; print_r($line_items);
							
							foreach($line_items as $line_item)
							{
							$this->db->delete('rev_orders', array('order_id' =>$orders->id,'user_id'=>$user_info->user_interanal_id,'line_items_id'=>$line_item->id)); 
							
							$shipping_address=$orders->shipping_address;
							//echo $shipping_address->province_code;
							
							
						    $data = array(
							'order_id' =>$orders->id,
					 		'user_id'=>$user_info->user_interanal_id,
							'store_id'=>$store_id,
							 'email' =>$orders->email,
							'created_at' =>$orders->created_at,
							 'updated_at' =>$orders->updated_at,
							 'number' =>$orders->number,
							//'note' =>$orders->note,
							'token' =>$orders->token,
							'gateway' =>$orders->gateway,
							//'test' =>$orders->test ,
							'total_price' =>$orders->total_price,
							'subtotal_price' =>$orders->subtotal_price,
							'total_weight' =>$orders->total_weight,
							'total_tax' =>$orders->total_tax,
							'taxes_included' =>$orders->taxes_included,
							'currency' =>$orders->currency,
							'financial_status' =>$orders->financial_status,
							'confirmed' =>$orders->confirmed,
							'total_discounts' =>$orders->total_discounts,
							'total_line_items_price' =>$orders->total_line_items_price,
							'cart_token' =>$orders->cart_token,
							'buyer_accepts_marketing' =>$orders->buyer_accepts_marketing,
							'name' =>$orders->name,
							'payment_gateway_names' =>json_encode($orders->payment_gateway_names),
							'processing_method' =>$orders->processing_method,
							'fulfillment_status' =>$orders->fulfillment_status ,
							'fulfillments_id' =>$fulfillments_data->id,
							'fulfillments_created_at' =>$fulfillments_data->created_at,
							'contact_email' =>$orders->contact_email,
							'line_items_id' =>$line_item->id,
							'line_items_variant_id' =>$line_item->variant_id, 
							'line_items_title' =>$line_item->title,
							'line_items_quantity' =>$line_item->quantity,
							'line_items_price' =>$line_item->price,
							'line_items_sku' =>$line_item->sku,
							'line_items_vendor' =>$line_item->vendor,
							'line_items_fulfillment_service' =>$line_item->fulfillment_service,
							'line_items_product_id' =>$line_item->product_id,
							'line_items_requires_shipping' =>$line_item->requires_shipping,
							'line_items_taxable' =>$line_item->taxable,
							'line_items_gift_card' =>$line_item->gift_card,
							
							'line_items_name' =>$line_item->name,
							'line_items_variant_inventory_management' =>$line_item->variant_inventory_management,
							'line_items_tax_lines' =>json_encode($line_item->tax_lines),
							'shipping_lines' =>json_encode($orders->shipping_lines) ,
							'sh_first_name'=>$shipping_address->first_name,
							'sh_last_name'=>$shipping_address->last_name,
							'sh_city'=>$shipping_address->city,
							'sh_zip'=>$shipping_address->zip,
							'sh_province'=>$shipping_address->province,
							'sh_country'=>$shipping_address->country,
							'sh_country_code'=>$shipping_address->country_code, 
							'sh_province_code'=>$shipping_address->province_code 
							
								
							);

							$sql = $this->db->set($data)->get_compiled_insert('rev_orders'); 
							//echo $sql;
							$this->db->query($sql);
						    $id=$this->db->insert_id() ;
						    if($id){ $flag=1; } 
								
							}
							
							
							
							
							
							
						}
					} 
					
				}
			
				
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			return  $flag;
				
			
			
			curl_close($ch);
		
    }
    
	//public function fb_setup($app_id,$app_secret,$user_id)
	public function fb_setup($ads_act,$user_id,$fb_account_id)
	{
		
		
		//act_10154710589527380/adsets?fields=account_id,daily_budget,name,campaign_id,ads{adset,adset_id,name,insights{ad_name,clicks,cpc,cpm,cpp,ctr,impressions,spend}},budget_remaining
	/* 	 $url='https://graph.facebook.com/v2.8/act_10154710589527380/adsets?fields=account_id,name,campaign,campaign_id,budget_remaining,adset_schedule,daily_budget,start_time,status,ads{adset_id,name,status},insights{ad_id,ad_name,adset_name}&access_token=EAADFZBIxwBE0BALos3j0EwgBaASmdG00ImEW0npcXRSu3ZCIX0ZAnY6vgKx9q3DeJicTUg3jPLJCBIi181KjuEZAUBxzXpOe5HC0g6ZBkRYy79yHfmN93LnlVddbGHefhDt8ZAp0UAmg73OeCbjmGVISZB4NUTmyZCAZD'; */
	$url='https://graph.facebook.com/v2.8/act_'.$ads_act.'/adsets?fields=account_id,daily_budget,name,campaign_id,budget_remaining,optimization_goal,created_time,end_time,start_time,status,ads{adset,adset_id,name,insights{ad_name,clicks,cpc,cpm,cpp,ctr,impressions,spend,cost_per_10_sec_video_view,cost_per_inline_link_click,cost_per_inline_post_engagement,cost_per_unique_click,cost_per_unique_inline_link_click,cost_per_action_type,cost_per_estimated_ad_recallers,cost_per_total_action,cost_per_unique_action_type}}&access_token=EAADFZBIxwBE0BALos3j0EwgBaASmdG00ImEW0npcXRSu3ZCIX0ZAnY6vgKx9q3DeJicTUg3jPLJCBIi181KjuEZAUBxzXpOe5HC0g6ZBkRYy79yHfmN93LnlVddbGHefhDt8ZAp0UAmg73OeCbjmGVISZB4NUTmyZCAZD';
			 $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Get the response and close the channel.
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			//echo curl_errno($ch);
			  $response = curl_exec($ch);
			$response_array=json_decode($response);
			//echo "<pre>";print_r($response_array);  
			
			//exit;
			if(is_array($response_array->data)):
			foreach($response_array->data as $fbads)  
			{
				$adslist=''; 
				$adsidlist='';
				if(is_array($fbads->ads->data))
				{
					foreach($fbads->ads->data as $ads)
					{
						 /* $adslist.=$ads->name.'/';
						 $adsidlist.=$ads->id.'/'; */
						// echo "<pre>";print_r($ads);
						if (array_key_exists("insights",$ads)) :
						/* {
							echo "ddddd";
						}
						else
						{
							echo "nnnn";
						} */
						 if(is_array($ads->insights->data))
							{
								
								foreach($ads->insights->data as $adsinner)
								{
									
									//echo "<pre>";print_r($adsinner);
									$this->db->delete('rev_facebook_ads_campain', array('account_id' =>$fbads->account_id,'campaign_id'=>$fbads->campaign_id,'ads_id'=>$ads->id)); 
				
								 $data = array(
									'account_id' =>$fbads->account_id,
									'cam_name' =>$fbads->name,
									'campaign_id' =>$fbads->campaign_id,
									'budget_remaining' =>$fbads->budget_remaining,
									'daily_budget' =>$fbads->daily_budget,
									//'start_time' =>$fbads->start_time,
									'status' =>$fbads->status,
									'ads_name'=>$adsinner->ad_name,
									'clicks'=>$adsinner->clicks,
									'cpc'=>$adsinner->cpc,
									'cpm'=>$adsinner->cpm,
									'cpp'=>$adsinner->cpp,
									'ctr'=>$adsinner->ctr,
									'impressions'=>$adsinner->impressions,
									'cost_per_inline_link_click'=>$adsinner->cost_per_inline_link_click,
									'cost_per_inline_post_engagement'=>$adsinner->cost_per_inline_post_engagement,
									'cost_per_unique_click'=>$adsinner->cost_per_unique_click,
									'cost_per_unique_inline_link_click'=>$adsinner->cost_per_unique_inline_link_click,
									'date_start'=>$adsinner->date_start,
									'date_stop'=>$adsinner->date_stop,
									 'ads_id'=>$ads->id,
									'user_id' =>$user_id,
									'fb_account_id' =>$fb_account_id,
									'created_time' =>$fbads->created_time,
									//'end_time' =>$fbads->end_time,
									//'start_time' =>$fbads->start_time,
									'optimization_goal'=>$fbads->optimization_goal,
									);
								$sql = $this->db->set($data)->get_compiled_insert('rev_facebook_ads_campain'); 
									//echo $sql;
									$this->db->query($sql);
									$id=$this->db->insert_id() ;
										
								}
							}
						 
						 endif;
						
						 
						
					}
				}
				
				
			}
            endif;
		return 1;
			
	}
	public function delete_store($id)
	{
		  $sql1="delete FROM  `rev_storinfo` where id=".$id;
		$query1= $this->db->query($sql1);
		
		$sql2="delete FROM  `rev_orders` where store_id=".$id;
		$query= $this->db->query($sql2);
		
		$sql3="delete FROM  `rev_setup_productlist` where store_id=".$id;
		$query3= $this->db->query($sql3);
		
		$sql4="delete FROM  `rev_shopify_product` where store_id=".$id;
		$query4= $this->db->query($sql4);
		
		
	   return 1;
	}
	public function delete_fb($id)
	{
		
		 $sql3='select a.id from rev_setup_productlist a, rev_facebook_ads_campain b where b.ads_id=a.ads_id and b.fb_account_id='.$id;
		$query3= $this->db->query($sql3);
		
		$result3=$query3->result();
		if(!empty($result3))
		{
		foreach($result3 as $setupid)
		{
			 $sql12="update rev_setup_productlist set ads_id=0 where id=".$setupid; 
		$query1= $this->db->query($sql12);
		}
		} 
		 
		  
		$sql1="delete FROM  `rev_facebook_info` where id=".$id;
		$query1= $this->db->query($sql1);
		$sql2="delete FROM  `rev_facebook_ads_campain` where fb_account_id=".$id;
		$query2= $this->db->query($sql2); 
		
		
	   return 1;
	}
}

