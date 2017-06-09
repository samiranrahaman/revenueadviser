<?php
/*
    Description : Model for Suppliercost
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Suppliercost_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	
	public function post_suppliercost($reportname,$pvalue,$plabel,$svalue,$slabel)
	{
		 $data = array(
        'report_name' => $reportname,
        'store_name' =>$slabel,
        'product_id' =>$pvalue,
		'product_name' => $plabel,
		'store_id'=>$svalue,
		);

		$this->db->insert('rev_setup_productlist', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return $id;
		}
		else
		{
			return 0;
		}
		
	}
	public function post_suppliercost_other($dist_cost,$dist_shippingcost,$reportid,$packaging,$ship_delevery,$gate_charge_fix,$gate_charge_percent,$desire_margin,$fb_ads_campaign)
	{
		 $data = array(
        'dist_cost' => $dist_cost,
        'dist_shippingcost' =>$dist_shippingcost,
		'packaging_cost' =>$packaging,
		'shipping_cost' =>$ship_delevery,
		'gate_charge_fix' =>$gate_charge_fix,
		'gate_charge_percent' =>$gate_charge_percent,
		'desire_margin' =>$desire_margin,
		'ads_id' =>$fb_ads_campaign,
        );
        $this->db->where('id', $reportid);
		$this->db->update('rev_setup_productlist', $data);
		 
		return 1;
		
		
	}
	public function supplierproduct_cost_list()
	{
		 $sql1="SELECT 	* FROM  `rev_supplier_orders` ";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function supplierproduct_delete($id)
	{
		  $sql1="delete FROM  `rev_supplier_orders` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	/* public function edit_report_data($id)
	{
		  $sql1="select * FROM  `rev_setup_productlist` where id=".$id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	} */
    public function get_suppliercost_otherlist($id)
	{
		  $sql1="select * FROM  `rev_setup_productlist` where id=".$id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	   
	}
}

