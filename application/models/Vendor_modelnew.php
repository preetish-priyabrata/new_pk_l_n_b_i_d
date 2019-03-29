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
	
		
   
}
