<?php

class Vendor_modelnew extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->database();
    }
		/**
		 * [vendor_new_technical_bid_list here is the list new technical bid]
		 * @param  string $value [description]
		 * @return [type]        [description]
		 */
    
     public function vendor_new_technical_bid_list_pr($value=''){
			$data=array('vendor_id'=>$value,'status_active'=>1);
			$query=$this->db->get_where('master_bid_vendor_m',$data);
    	if($query->num_rows()==0){
				$data_return = array('no_new_tech' =>2 );
				return $data_return;
			}else{
				$result_data_new_tech=$query->result();
				$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
				return $data_return;
			}
    }
		
	public function vendor_new_query_tech_title_pr($value='',$value2){
		$data=array('slno_vendor'=>$value,'status_active'=>1,'vendor_id'=>$value2);
		$query=$this->db->get_where('master_bid_vendor_m',$data);
	if($query->num_rows()==0){
			$data_return = array('no_new_tech' =>2 );
			return $data_return;
		}else{
			$result_data_new_tech=$query->result();
			$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
			return $data_return;
		}
		// code...
	}
	/**
	 * [get_vendors_tech_bid_file_list_pr description] here file information which is fetch and given information
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function get_vendors_tech_bid_file_list_pr($data){		
		
		$query=$this->db->get_where('master_vendor_file_token_c',$data);
		if($query->num_rows()==0){
			$data_return = array('no_file_vendor' =>2 );
			return $data_return;
		}else{
			$result_data_new_tech=$query->result();
			$data_return = array('no_file_vendor' => 1,'file_vendors_list'=>$result_data_new_tech );
			return $data_return;
		}

	}
######################################################################################################################
#
#
#	Commerical bid information goes here
#
#
#######################################################################################################################
	/**
	 * [vendor_new_commerical_bid_list_pr description] commercial inforion of actived going on
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function vendor_new_commerical_bid_list_pr($value=''){

		$data=array('vendor_id'=>$value,'status_active'=>1);
			$query=$this->db->get_where('master_bid_Com_vendor_m',$data);
    	if($query->num_rows()==0){
			$data_return = array('no_new_tech' =>2 );
			return $data_return;
		}else{
			$result_data_new_tech=$query->result();
			$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
			return $data_return;
		}	
	}
	public function vendor_new_query_commerical_title_pr($value='',$value2){
		$data=array('slno_vendor'=>$value,'status_active'=>1,'vendor_id'=>$value2);
		$query=$this->db->get_where('master_bid_Com_vendor_m',$data);
	if($query->num_rows()==0){
			$data_return = array('no_new_tech' =>2 );
			return $data_return;
		}else{
			$result_data_new_tech=$query->result();
			$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
			return $data_return;
		}
		// code...
	}
	    public function vendor_new_query_tech_title_commerical_pr($value='',$value2){
			$data=array('slno_vendor'=>$value,'status_active'=>1,'vendor_id'=>$value2);
			$query=$this->db->get_where('master_bid_Com_vendor_m',$data);
    	if($query->num_rows()==0){
				$data_return = array('no_new_tech' =>2 );
				return $data_return;
			}else{
				$result_data_new_tech=$query->result();
				$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
				return $data_return;
			}
			// code...
}
public function vendor_new_commerical_rank_bid_pr($value=''){
			$data=array('vendor_id'=>$value,'status'=>1);
			$query=$this->db->get_where('master_bid_invi_rank_approvals_pr',$data);
    	if($query->num_rows()==0){
				$data_return = array('no_new_tech' =>2 );
				return $data_return;
			}else{
				$result_data_new_tech=$query->result();
				$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
				return $data_return;
			}
    }
    public function vendor_new_commerical_rank_bid_id_pr($value='',$value1=''){
			$data=array('vendor_id'=>$value,'status'=>1,'slno_approve'=>$value1);
			$query=$this->db->get_where('master_bid_invi_rank_approvals_pr',$data);
    	if($query->num_rows()==0){
				$data_return = array('no_new_tech' =>2 );
				return $data_return;
			}else{
				$result_data_new_tech=$query->result();
				$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
				return $data_return;
			}
    }
		
		public function vendor_new_commerical_rank_calculation_pr($value='',$value1){
    		$get_rank=array();
			$data=array('master_bid_id_com'=>$value);
			// $this->db->order_by('sub_total', "asc");
			$this->db->order_by('sub_total', 'ASC');
			// $this->db->order_by('date', "asc");			
			$query=$this->db->get_where('master_pr_bid_qoute_item_total',$data);
			// echo $this->db->last_query();
			// print_r($query->result());
			$data_id=array('master_bid_id_com'=>$value,'Vendor_id'=>$value1);
			$this->db->order_by('sub_total', 'ASC');
			$this->db->order_by('Slno_simple_item_total', "desc");
			
			$query_rode=$this->db->get_where('master_pr_bid_qoute_item_total',$data_id);
			// echo $this->db->last_query();
			$resutt=$query_rode->result();
			 $id=$resutt[0]->Slno_simple_item_total;
			// print_r($data_id);
			// print_r($query->result());
			// Array ( [0] => stdClass Object ( [Slno_rankorder_item_total] => 1 [master_bid_id_com] => 22 [rankorder_id_slno_total] => 1 [sub_total] => 1253177.09 [total_tax] => 3.56 [total_price] => 1968.56 [user_assumption_charge] => 0.00 [date] => 2018-12-31 19:42:29 [currency_rate] => [Bid_slno] => 132 [currency_name] => [Vendor_id] => ven121@gmail.com ) [1] => stdClass Object ( [Slno_rankorder_item_total] => 2 [master_bid_id_com] => 22 [rankorder_id_slno_total] => 2 [sub_total] => 1253177.11 [total_tax] => 6755 [total_price] => 1259932.00 [user_assumption_charge] => 0.00 [date] => 2018-12-31 19:43:11 [currency_rate] => [Bid_slno] => 131 [currency_name] => [Vendor_id] => vender@ilab.com ) ) 
			$x=0;
			foreach ($query->result() as $key_id) {
				$x++;
				if($key_id->Slno_simple_item_total==$id){
					$rank=$x;
					$sub_total=$key_id->sub_total;
				}
				// $get_rank[] = array('Slno_total' => $key_id->Slno_rankorder_item_total,'date_id'=> $key_id->date, 'sub_total'=>$key_id->sub_total);
			}
			$data_return = array('rank' => $rank,'sub_total'=>$sub_total );
			return $data_return;
			 // $rank;
   //  	if($query->num_rows()==0){
			// 	$data_return = array('no_new_tech' =>2 );
			// 	return $data_return;
			// }else{
			// 	$result_data_new_tech=$query->result();
			// 	$data_return = array('no_new_tech' => 1,'new_tech_list'=>$result_data_new_tech );
			// 	return $data_return;
			// }
    }
   
}
