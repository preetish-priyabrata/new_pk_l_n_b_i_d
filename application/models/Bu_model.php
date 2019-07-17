<?php

class Bu_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function bu_pr_schedule_item($value='',$value1='',$value2=''){
    	$table="master_pr_schedule";    
    	// pr_no slno_pr_no job_code
    	if(!empty($value) && !empty($value1) && !empty($value2)){
    		$data_check = array('job_code' => $value2,'pr_no'=>$value,'slno'=>$value1);
            $query=$this->db->get_where($table,$data_check);
             if($query->num_rows() == 0){
             	$data_send = array('status' =>3 );
	        	return $data_send;
             }elseif($query->num_rows() == 1){
             	foreach($query->result() as $row){
					$item=$row->item;
          $scheduled_order=$row->scheduled_order;
				}
				$data_send = array('status' =>1, 'item_name'=>$item,'scheduled_order'=>$scheduled_order );
	       		return $data_send;
             }else{
             	$data_send = array('status' =>3 );
	        	return $data_send;
             }
		
			$data_send = array('status' =>3 );
	        return $data_send;
    	}else{
    		 $data_send = array('status' =>2 );
	        return $data_send;
	        exit;
    	}
    	
    }
     public function get_bu_tracking_m($value2,$slno){
      // echo $value2;
      
        if(!empty($slno)){
          $this->db->where('Slno_tracking', $slno); 
        }
      if(!empty($value2)){
        if($value2==1){
           $this->db->where('Status', 1); 
          
        }else if($value2==2){
           $this->db->where('Status', 2); 
           
        }
      }else{
         $this->db->where('Status', 2); 
        
      }
     
     
              
      $query = $this->db->get('master_tracking_tools_m');
      // echo $this->db->last_query();
      // exit;
        if($query->num_rows() == 0){
        $data_send = array('no_received' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_received' =>1, 'received_list'=>$results);
        return $data_send;
        exit;
      }  
    }
    public function get_user_information_admin($user_email){
      $query_user=$this->db->get_where('master_admin',array('email_id'=>$user_email));
      $result_email=$query_user->result();
      return $result_email[0];
      exit;
    }
}
