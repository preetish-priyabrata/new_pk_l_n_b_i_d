<?php

class Buyer_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function buyer_mr_receive_list($email='',$type='',$slno=''){
      // complete_status_bid
      $this->db->where('complete_status_bid','0');
    	if(!empty($email)){
    		$this->db->where('Buyer_id',$email);
    	}
      if(!empty($type)){
        $this->db->where('status_bid',$type);
      }
      if(!empty($slno)){
        $this->db->where('Slno_bid',$slno);
      }

    	$query_buyer=$this->db->get('master_buyer_MR');
    	if($query_buyer->num_rows() == 0){
	        $data_send = array('no_received' =>2 );
	        return $data_send;
	        exit;
	    }else{
	        $results=$query_buyer->result();
	        $data_send = array('no_received' =>1, 'received_list'=>$results);
	        return $data_send;
	        exit;
	    }
    	# code...
    }
    public function get_buyer_mr_file_list($value,$value1){
      // master_items_material
      $data_array_mr_files = array('bid_buyer_slno' =>$value1,'bid_slno'=>$value);
      $query_mr_files =$this->db->get_where('master_bid_file_technical',$data_array_mr_files);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_files' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_files' =>1, 'files_list'=>$results);
        return $data_send;
        exit;
      }
    }
    public function get_buyer_mr_file_list_commerical($value,$value1){
        $data_array_mr_files = array('bid_buyer_slno' =>$value1,'bid_slno'=>$value);
        $query_mr_files =$this->db->get_where('master_bid_file_commerical',$data_array_mr_files);
        if($query_mr_files->num_rows() == 0){
          $data_send = array('no_files' =>2 );
          return $data_send;
          exit;
        }else{
          $results=$query_mr_files->result();
          $data_send = array('no_files' =>1, 'files_list'=>$results);
          return $data_send;
          exit;
        }
    }
    public function get_user_generic_list($value='',$value1='',$value2='',$role_id='',$slno='',$email_id=''){
      $value_mix=$value.$value1.$value2;
      switch ($value_mix) {
        case '111':  // role ,slno, email
          $data_array_approver = array('Status' => 1,'role_id'=>$role_id,'slno'=>$slno,'email_id'=>$email_id);
          break;
        case '110':  // role ,slno
        $data_array_approver = array('Status' => 1,'role_id'=>$role_id,'slno'=>$slno);
          break;
        case '101':  // role , email
          $data_array_approver = array('Status' => 1,'role_id'=>$role_id,'email_id'=>$email_id);
          break;
        case '100':  // role
          $data_array_approver = array('Status' => 1,'role_id'=>$role_id);
          break;
        case '011':  // slno, email
           $data_array_approver = array('Status' => 1,'slno'=>$slno,'email_id'=>$email_id);
          break;
        case '010':  // slno
          $data_array_approver = array('Status' => 1,'slno'=>$slno);
          break;
        case '001':  //  email
          $data_array_approver = array('Status' => 1,'email_id'=>$email_id);
          break;
        case '000': // all
           $data_array_approver = array('Status' => 1);
           break;
        default:
          $data_array_approver = array('Status' => 1);
          break;
      }

       $query_approver=$this->db->get_where('master_admin',$data_array_approver);
          if($query_approver->num_rows() == 0){
            $data_send = array('no_user' =>2 );
            return $data_send;
            exit;
          }else{
            $results=$query_approver->result();
            $data_send = array('no_user' =>1, 'user_approver'=>$results);
            return $data_send;
            exit;
          }
    }
    public function get_buyer_vendors_list($value=''){
      $this->db->select('*');
      $this->db->from('master_vendor_detail');
      $this->db->join('Vendor_operation_detail', ' (Vendor_operation_detail.Slno_id_Vendor_slno = master_vendor_detail.Slno_vendor AND master_vendor_detail.Status=1 ) ', 'right outer' );
            // $this->db->join('city', 'city.user_id = users.id','left');
      $this->db->where('Vendor_operation_detail.Operation_slno', $value);
      // $this->db->where('master_vendor_detail.bu_status', 0);
      $query_vendor = $this->db->get();
      if($query_vendor->num_rows()==0){
         $data_send = array('No_vendors' =>2 );
            return $data_send;

      }else{
         $results=$query_vendor->result();
            $data_send = array('No_vendors' =>1, 'vendors_lists'=>$results);
            return $data_send;
            exit;
      }
      # code...
    }

    /**
     * [drafted_bid_information genal save send list of bid of technical bill send to vendor or technical information will hold]
     * @param  string $value  [EMAIL ID]
     * @param  string $value1 [status]
     * @return [type]         [data_send]
     * @return [data_send[no_bid]] [1->have list of data 2-> not having list of data]
     * @return [data_send[bid_list]] [List Of array of table which will contain Bid is been send or saved]
     */
    public function drafted_bid_information($value='',$value1='',$value2=''){ // HeRE VALUE ->  , VALUE1->status
      
      $data_id = array('status_bid'=>$value1,'bid_creator_id'=>$value);
      if(!empty($value2)){
        $data_id= array('Slno_bid' => $value2,'status_bid'=>$value1,'bid_creator_id'=>$value);
      }
      $query_mr_files =$this->db->get_where('master_bid',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid' =>1, 'bid_list'=>$results);
        return $data_send;
        exit;
      }
    }
    /**
     * [drafted_bid_information_commerical description]
     * @param  string $value  [EMAIL ID]
     * @param  string $value1 [status]
     * @return [type]         [data_send]
     * @return [data_send[no_bid]] [1->have list of data 2-> not having list of data]
     * @return [data_send[bid_list]] [List Of array of table which will contain Bid is been send or saved]
     */
    public function drafted_bid_information_commerical($value='',$value1='',$value2=''){ // HeRE VALUE ->  , VALUE1->status
      
      $data_id = array('status_bid'=>$value1,'bid_creator_id'=>$value);
      if(!empty($value2)){
        $data_id= array('Slno_bid' => $value2,'status_bid'=>$value1,'bid_creator_id'=>$value);
      }
      $query_mr_files =$this->db->get_where('master_bid_commerical',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid' =>1, 'bid_list'=>$results);
        return $data_send;
        exit;
      }
    }
    /**
     * [drafted_bid_information_commerical_completed description]
     * @param  string $value  [EMAIL ID]
     * @param  string $value1 [status]
     * @return [type]         [data_send]
     * @return [data_send[no_bid]] [1->have list of data 2-> not having list of data]
     * @return [data_send[bid_list]] [List Of array of table which will contain Bid is been send or saved]
     */
    public function drafted_bid_information_commerical_completed($value='',$value1='',$value2=''){ 
    // HeRE VALUE ->  , VALUE1->status
      
      $data_id = array('status_bid'=>$value1,'bid_creator_id'=>$value);
      if(!empty($value2)){
        $data_id= array('Slno_bid' => $value2,'status_bid'=>$value1,'bid_creator_id'=>$value);
      }
      $query_mr_files =$this->db->get_where('master_bid_commerical',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid' =>1, 'bid_list'=>$results);
        return $data_send;
        exit;
      }
    }
		/**
		 * [drafted_bid_information_DATE Here Date infromation section will be shown]
		 * @param  string $value  [description]
		 * @param  [type] $value1 [description]
		 * @return [type]         [description]
		 */
    public function drafted_bid_information_DATE($value='',$value1){
      $data_id = array('status'=>$value1,'master_bid_id'=>$value);
      $query_mr_files =$this->db->get_where('master_bid_date_details',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid_date' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid_date' =>1, 'bid_date_list'=>$results);
        return $data_send;
        exit;
      }
    }
    public function drafted_bid_information_DATE_commerical($value='',$value1){
      $data_id = array('status'=>$value1,'master_bid_id'=>$value);
      $query_mr_files =$this->db->get_where('master_bid_date_details_commerical',$data_id);
     
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid_date' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid_date' =>1, 'bid_date_list'=>$results);
        return $data_send;
        exit;
      }
    }
		/**
		 * [drafted_bid_information_details description]
		 * @param  string $value  [master_bid_id =>Serial No of master_bid table]
		 * @param  [type] $value1 [it is not required now]
		 * @return [data_send ->1]         [no_bid_details value is empty or 0 will send  value is 2 remaind no data is send]
		 * @return [data_send ->2]         [no_bid_details value is not empty or not 0  will send  value is 1 remaind data is send]
		 *
		 */
    public function drafted_bid_information_details($value='',$value1){
      $data_id = array('master_bid_id'=>$value);
      $query_mr_files =$this->db->get_where('master_bid_details',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid_details' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid_details' =>1, 'bid_details_list'=>$results);
        return $data_send;
        exit;
      }
    }
    /**
     * [drafted_bid_information_details_commerical description]
      * @param  string $value  [master_bid_id =>Serial No of master_bid table]
     * @param  [type] $value1 [it is not required now]
     * @return [data_send ->1]         [no_bid_details value is empty or 0 will send  value is 2 remaind no data is send]
     * @return [data_send ->2]         [no_bid_details value is not empty or not 0  will send  value is 1 remaind data is send]
     *
     */
    
    public function drafted_bid_information_details_commerical($value='',$value1){
      $data_id = array('master_bid_id'=>$value);
      $query_mr_files =$this->db->get_where('master_bid_details_commerical',$data_id);
      if($query_mr_files->num_rows() == 0){
        $data_send = array('no_bid_details' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query_mr_files->result();
        $data_send = array('no_bid_details' =>1, 'bid_details_list'=>$results);
        return $data_send;
        exit;
      }
    }
		public function drafted_bid_vendor_information_details($value='',$value1=''){
			$data_array_vend = array('master_bid_id' => $value, 'status'=>$value1);
			$this->db->select('vendor_id');
			$query = $this->db->get_where('master_bid_vendor',$data_array_vend);
			if($query->num_rows() == 0){
        $data_send = array('no_bid_vendors' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_vendors' =>1, 'bid_vendors_list'=>$results);
        return $data_send;
        exit;
      }
		}
    /**
     * [drafted_bid_vendor_information_details description]
     * @param  string $value  [description]
     * @param  string $value1 [description]
     * @return [type]         [description]
     */
    public function drafted_bid_vendor_information_details_commerical($value='',$value1=''){
      $data_array_vend = array('master_bid_id' => $value);
      $this->db->select('vendor_id');
      $query = $this->db->get_where('master_bid_vendor_commerical',$data_array_vend);
      if($query->num_rows() == 0){
        $data_send = array('no_bid_vendors' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_vendors' =>1, 'bid_vendors_list'=>$results);
        return $data_send;
        exit;
      }
    }
		/**
		 * [buyer_queries_new_bid this section belong for buyer queries for technical bid]
		 * @param  string $value  [bid serial no which need to identify bid which we need]
		 * @param  string $value1 [value1 which contained status ]
		 * @return [type]         [list of serial or queries]
		 */
		public function buyer_queries_new_bid($value='',$value1=''){
			$data_array_query = array('bid_slno' => $value, 'status_responds'=>$value1);

      $query = $this->db->get_where('master_bid_query',$data_array_query);
      if($query->num_rows() == 0){
        $data_send = array('no_bid_query' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_query' =>1, 'bid_query_list'=>$results);
        return $data_send;
        exit;

    // code...
		}
}
public function buyer_get_vendor_information($value=''){
      $this->db->select('*');
    $this->db->from('master_bid_vendor_commerical');
      $this->db->join('master_vendor_detail', ' (master_vendor_detail.Vendor_email_id = master_bid_vendor_commerical.vendor_id  AND master_vendor_detail.Status=1 ) ', 'right outer' );
                // $this->db->join('city', 'city.user_id = users.id','left');
      // $this->db->where('master_bid.status_bid', $status); 
      $this->db->where('master_bid_vendor_commerical.master_bid_id', $value); 
      $query = $this->db->get();  
      // echo $this->db->last_query();
      //   $data_array_vend = array('master_bid_id' => $value, 'status'=>$value1);
      // $this->db->select('vendor_id');
      // $query = $this->db->get_where('master_bid_vendor',$data_array_vend);
      if($query->num_rows() == 0){
        $data_send = array('no_bid_vendors' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_vendors' =>1, 'bid_vendors_list'=>$results);
        return $data_send;
        exit;
      }
      # code...
    }
public function query_panel_buyer_commerical($value='',$value1=''){
      $data_array_query = array('bid_slno' => $value, 'status_responds'=>$value1);

      $query = $this->db->get_where('master_bid_query',$data_array_query);
      if($query->num_rows() == 0){
        $data_send = array('no_bid_query' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_query' =>1, 'bid_query_list'=>$results);
        return $data_send;
        exit;

    // code...
    }
}
public function vendor_approved_buyer_technical($value=''){
  $data_array_query = array('mr_no' => $value, 'approval_status '=>1, 'submission_status'=>1);
   $query = $this->db->get_where('master_bid_vendor',$data_array_query);
      if($query->num_rows() == 0){
        $data_send = array('no_bid_query' =>2 );
        return $data_send;
        exit;
      }else{
        $results=$query->result();
        $data_send = array('no_bid_query' =>1, 'bid_query_list'=>$results);
        return $data_send;
        exit;

    // code...
    }

}





}
