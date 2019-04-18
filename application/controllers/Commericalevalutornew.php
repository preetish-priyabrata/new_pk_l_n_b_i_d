<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commericalevalutornew extends CI_Controller {
    public function __construct(){
            parent::__construct();
            // Loading my model which will use
            $this->load->model('user_model', 'user');
            $this->load->model('approver_model', 'approver_user');
            $this->load->model('design_model', 'design_user');
            $this->load->model('procurement_model', 'procurement_user');
            $this->load->model('buyer_model','buyer_user');
            $this->load->model('vendor_model','vendor_db_users');
            $this->load->model('technicalevalutor_model','tech_eva_db');
            $this->load->model('commericalevaluator_model','comm_eva_db');
            // imedate database link
            $this->load->database();

            //Load session library
         $this->load->library('session');
         $this->load->library('user_agent');
         $this->load->library('encryption');
         $this->load->library('form_validation');
         $this->load->helper('string');
         $this->load->library('cronfile');
         $this->cronfile->index_event();


    }
    public function user_commerical_evalutor_pr_create($value=''){ // will show mr in mr received
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Bid Received List",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('comm_evalutor_user/template/template_top_head');
            $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
            $this->load->view('comm_evalutor_user/pr_create/create_view',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function user_commerical_evalutor_pr_create_rank($value=''){ // will show mr in mr received
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Bid Received List",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('comm_evalutor_user/template/template_top_head');
            $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
            $this->load->view('comm_evalutor_user/pr_create_rank/create_view',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function commerical_user_received_pr_info($pr_no='',$slno='',$job_code='',$id='',$comm_bid=''){
       $scripts='';
            $data=array('title' =>"Commerical Bid Information ",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'Pr_no_slno'=>$slno,'Project_slno'=>$job_code,'edit_type'=>$id,'comm_bid'=>$comm_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('comm_evalutor_user/template/template_top_head');
            $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
            $this->load->view('comm_evalutor_user/pr_details/view_details_create_view_new_bids',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function Commercila_otp_c_s_r_ongoing_bid_pr_notification_vendor($pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
    $commerical_email_id=$this->session->userdata('commerical_email_id');
         if(empty($commerical_email_id)){

            redirect('comm-evalutor-logout-by-pass');
        }
        $this->load->helper('string');
        $otp=date('Y-m-d')."-".random_string('alnum', 5);
         $value3 = urldecode($commercial_type_bid);


        switch ($value3) {
            case 'Closed Bid':
                $value='2';
                break;
            case 'Simple Bid':
                 $value='1';
                break;
            case 'Rank Order Bid':
                 $value='3';
                break;
        }
        // `master_bid_id`, `bid_ref`, `bid_id`, `re_bid_count_id`, `pr_no`, `type_bid`, `otp`, `bid_name`, `user_id_process`, `status`, `match_status`, `date_entry`, `date_update`, `match_bid_id_user`
        $bid_serial_insert = array('master_bid_id'=>$comm_bid_db, 'bid_ref'=>$commercial_bid_ref, 'bid_id'=>$commercial_bid_id, 'pr_no'=>$pr_no,  're_bid_count_id'=>$commercial_resubmit_count,'type_bid'=>$value, 'otp'=>$otp, 'bid_name'=>$value3, 'user_id_process'=>$commerical_email_id, 'status'=>1, 'match_status'=>2);
                    $query_otp_insert=$this->db->insert('master_bid_otp_commerical_m',$bid_serial_insert);
                    $last_insert_id=$this->db->insert_id();
                    if($query_otp_insert){
                       redirect('Commercial-get-otp-commerical/'.$value.'/'.$last_insert_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                    }else{
                          $this->session->set_flashdata('error_message', 'Something went wrong ');
                    redirect('user-buyer-home');
                    }
       # code...
   }
   public function commerical_otp_verification_pr($value=''){
    
        $commerical_email_id=$this->session->userdata('commerical_email_id');
        if(empty($commerical_email_id)){

            redirect('comm-evalutor-logout-by-pass');
        }
        // Array ( [type_bid] => 1 [pr_no] => O900-102-A-C-40101-003 [commercial_bid_ref] => 66400 [commercial_bid_id] => 7701 [comm_bid_db] => 4 [last_otp_id] => 3 [commercial_edit_id] => 1 [commercial_resubmit_count] => 0 [commercial_type_bid] => Simple Bid [OTP] => 2019-04-09-ZOV9w ) 
        $type_bid=$this->input->post('type_bid');
        $pr_no=$this->input->post('pr_no');

        $commercial_bid_ref=$this->input->post('commercial_bid_ref');
        $commercial_bid_id=$this->input->post('commercial_bid_id');

        $comm_bid_db=$this->input->post('comm_bid_db');
        $commercial_edit_id=$this->input->post('commercial_edit_id');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        $commercial_type_bid=$this->input->post('commercial_type_bid');
        $last_otp_id=$this->input->post('last_otp_id');
        $OTP=$this->input->post('OTP');

        $get_check = array('slno_comm' =>$last_otp_id,'status'=>1,'match_status'=>2);
        $query_check=$this->db->get_where('master_bid_otp_commerical_m',$get_check);
        if($query_check->num_rows() == 0){
            $this->session->set_flashdata('error_message',  'Something went wrong Try Again!!!!');
            redirect('user-commerical-evalutor-home');
           # code...
        }else{
            $fetch_data=$query_check->result();
            $db_otp=$fetch_data[0]->otp;
            if($db_otp==$OTP){
                $update_status = array('match_status' => 1 ,'match_bid_id_user'=>$commerical_email_id);
                $data_update_id= array('slno_comm' =>$last_otp_id);
                $query_update_otp=$this->db->update('master_bid_otp_commerical_m',$update_status,$data_update_id);
                if($query_update_otp){
                     $this->session->set_flashdata('success_message',  'Otp Is been match and view commerical Information');
                      redirect('commerical-otp-verification-success-pr/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                    
                }else{
                     $this->session->set_flashdata('error_message',  'Something went wrong');
                     redirect('Commercial-get-otp-commerical/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                }
            }else{
                $this->session->set_flashdata('error_message',  'Entered Otp Is not matching some portion of otp is missing ');
                 redirect('Commercial-get-otp-commerical/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
            }
        }
    
       # code...
   }
   public function get_otp_commerical($type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
     $value3 = urldecode($commercial_type_bid);
     $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
                        $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'last_otp_id'=>$last_insert_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,
                            'commercial_type_bid'=>$value3);

                        $this->load->view('template/template_header',$data);
                        $this->load->view('comm_evalutor_user/template/template_top_head');
                        $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
                        $this->load->view('comm_evalutor_user/pr_details/otp',$data);
                        $this->load->view('template/template_footer',$data);
       # code...
   }
   public function commerical_otp_verification_success_pr($type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
      $value3 = urldecode($commercial_type_bid);
       $scripts='';
        $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'last_otp_id'=>$last_insert_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$value3);
        $this->load->view('comm_evalutor_user/pr_details/commerical_get_list_vendor_moi_sci_c_o',$data);
       # code...
   }

   public function commerrical_user_send_approve_nofication_pr($value=''){

    // Array ( [type_bid] => 1 [last_otp_id] => 3 [pr_no] => O900-102-A-C-40101-003 [commercial_bid_ref] => 66400 [commercial_bid_id] => 7701 [comm_bid_db] => 4 [commercial_edit_id] => 1 [commercial_resubmit_count] => 0 [commercial_type_bid] => Simple Bid [Project_Name] => project 1 [activity_name] => O900-102-A-C-40101-003 [location_detail] => rklsss [bid_id] => 7701 [bid_start_date] => 2019-04-27 [bid_closed_date] => 2019-04-26 [mode_bid] => 333 [time_date_creation] => 2019-03-30 12:16:32 [creators_id] => design2@ilab.com [slno_mat_mateial] => Array ( [0] => 9 [1] => 10 [2] => 11 ) [vendor_apporved] => Array ( [9] => vender@ilab.com [10] => vender@ilab.com [11] => vender@ilab.com ) [vendor_notification] => Array ( [0] => [1] => [2] => ) [Submit_btn] => Notification )
    
$type_bid=$this->input->post('type_bid');
$last_otp_id=$this->input->post('last_otp_id');
$pr_no=$this->input->post('pr_no');
$commercial_bid_ref=$this->input->post('commercial_bid_ref');
$commercial_bid_id=$this->input->post('commercial_bid_id');
$comm_bid_db=$this->input->post('comm_bid_db');
$commercial_edit_id=$this->input->post('commercial_edit_id');
$commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
$commercial_type_bid=$this->input->post('commercial_type_bid');
$Submit_btn=$this->input->post('Submit_btn');
$vendor_notification=$this->input->post('vendor_notification');
$vendor_apporved=$this->input->post('vendor_apporved');
    

       $data_not=$this->input->post();
        switch ($Submit_btn) {
            case 'Notification':
                if(!empty(array_filter($vendor_notification))){

                    // redirect('commerrical-user-send-nofication-vendor');
                    $this->commerrical_user_send_approve_nofication_vendor_pr($data_not);
                }else{
                       $this->session->set_flashdata('error_message',  'No Vendor Is been Assign to notifiy please Select vendor and Send again');
                    redirect('commerical-otp-verification-success-pr/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                }
                break;
            case 'Approved And Complete':
                if(!empty(array_filter($vendor_apporved))){

                    // redirect('commerrical-user-send-nofication-vendor');
                    $this->commerrical_user_send_approve_vendor_pr($data_not);
                }else{
                    $this->session->set_flashdata('error_message',  'No Vendor Is been Assign to notifiy please Select vendor and Send again');
                    redirect('commerical-otp-verification-success-pr/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                }
                # code...
                break;

            default:
                # code...
                break;
        }

       # code...
   }
   public function commerrical_user_send_approve_nofication_vendor_pr($value=''){
        $type_bid=$this->input->post('type_bid');
        $last_otp_id=$this->input->post('last_otp_id');
        $pr_no=$this->input->post('pr_no');
        $commercial_bid_ref=$this->input->post('commercial_bid_ref');
        $commercial_bid_id=$this->input->post('commercial_bid_id');
        $comm_bid_db=$this->input->post('comm_bid_db');
        $commercial_edit_id=$this->input->post('commercial_edit_id');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        $commercial_type_bid=$this->input->post('commercial_type_bid');
        $Submit_btn=$this->input->post('Submit_btn');
        $vendor_notification=$this->input->post('vendor_notification');
        $vendor_apporved=$this->input->post('vendor_apporved');
        $value3 = urldecode($commercial_type_bid);

        // $type_bid=$this->input->post('type_bid');
        // $master_bid_id=$this->input->post('master_bid_id');
        // $category_id=$this->input->post('category_id');
        // $bid_name=$this->input->post('bid_name');
        // $buyer_bid=$this->input->post('buyer_bid');
        // $last_otp_id=$this->input->post('last_otp_id');
        // $bid_name_url = urldecode($commercial_type_bid);
        // $vendor_notification=$this->input->post('vendor_notification');

        if(!empty($this->input->post())){
           $scripts='<script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-daterangepicker/moment.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script><script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            // $data=array('title' =>"Here otp is been verified",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'master_bid_id'=>$master_bid_id,'category_id'=>$category_id,'bid_name'=>$bid_name_url,'buyer_bid'=>$buyer_bid,'last_otp_id'=>$last_otp_id,'vendor_notification'=>$vendor_notification);
             $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'last_otp_id'=>$last_otp_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$value3,'vendor_notification'=>$vendor_notification);

            $this->load->view('template/template_header',$data);
            $this->load->view('comm_evalutor_user/template/template_top_head');
            $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
            $this->load->view('comm_evalutor_user/commerical_notification/index',$data);
            $this->load->view('template/template_footer',$data);

        }else{
            $this->session->set_flashdata('error_message',  'Some thing went worng');
            redirect('user-commerical-evalutor-home');
            exit;
        }
       # code...
   }
   public function commerrical_user_send_approve_vendor_pr($value=''){
    // print_r($this->input->post());
    // Array ( [type_bid] => 1 [last_otp_id] => 4 [pr_no] => O900-102-A-C-40101-003 [commercial_bid_ref] => 66400 [commercial_bid_id] => 7701 [comm_bid_db] => 4 [commercial_edit_id] => 1 [commercial_resubmit_count] => 0 [commercial_type_bid] => Simple Bid [Project_Name] => project 1 [activity_name] => O900-102-A-C-40101-003 [location_detail] => rklsss [bid_id] => 7701 [bid_start_date] => 2019-04-27 [bid_closed_date] => 2019-04-26 [mode_bid] => 333 [time_date_creation] => 2019-03-30 12:16:32 [creators_id] => design2@ilab.com [slno_mat_mateial] => Array ( [0] => 9 [1] => 10 [2] => 11 ) [vendor_apporved] => Array ( [9] => ven121@gmail.com [10] => ven121@gmail.com [11] => vender@ilab.com ) [vendor_notification] => Array ( [0] => [1] => [2] => ) [Submit_btn] => Approved And Complete ) 
     $commerical_email_id=$this->session->userdata('commerical_email_id');
        if(empty($commerical_email_id)){

            redirect('comm-evalutor-logout-by-pass');
        }
        $type_bid=$this->input->post('type_bid');
        $last_otp_id=$this->input->post('last_otp_id');
        $pr_no=$this->input->post('pr_no');
        $commercial_bid_ref=$this->input->post('commercial_bid_ref');
        $commercial_bid_id=$this->input->post('commercial_bid_id');
        $comm_bid_db=$this->input->post('comm_bid_db');
        $commercial_edit_id=$this->input->post('commercial_edit_id');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        $commercial_type_bid=$this->input->post('commercial_type_bid');
        $Submit_btn=$this->input->post('Submit_btn');
        $vendor_notification=$this->input->post('vendor_notification');
        $vendor_apporved=$this->input->post('vendor_apporved');
        $value3 = urldecode($commercial_type_bid);

        // $type_bid=$this->input->post('type_bid');
        // $master_bid_id=$this->input->post('master_bid_id');
        // $category_id=$this->input->post('category_id');
        // $bid_name=$this->input->post('bid_name');
        // $buyer_bid=$this->input->post('buyer_bid');
        // $last_otp_id=$this->input->post('last_otp_id');
        $Project_Name=$this->input->post('Project_Name');    
        $slno_mat_mateial=$this->input->post('slno_mat_mateial');
        foreach ($slno_mat_mateial as $key_id => $value_slno) {
                     // `Slno_simple_item`, `Simple_id_slno`, `Bid_master_id_com`, `Item_name`, `Item_id`, `Quantity`, `Uom_unit`, `Unit_price`, `Total_unitprice`, `date_entry`, `Comm_item_slno`, `Mr_item_slno`, `bid_slno`, `Vendor_id`
            $single_vendor=$vendor_apporved[$value_slno];
                     // echo "<br>";
                     // echo "<pre>";
            $data_indety = array('Bid_master_id_com' => $comm_bid_db,'Vendor_id'=>$single_vendor,'comm_item_slno'=>$value_slno);
                     $this->db->order_by('date_entry','DESC');
                     $this->db->limit(1);
                     $query_get_item=$this->db->get_where('master_pr_bid_qoute_item',$data_indety);
                     // echo $this->db->last_query();
                     // echo "<pre>";
                     $vend_info=$query_get_item->result();
                     // print_r($query_get_item->result());
                     // `Slno_simple_item`, `Simple_id_slno`, `Bid_master_id_com`, `Item_name`, `parameter_tech`, `Item_id`, `Quantity`, `Uom_unit`, `Unit_price`, `Total_unitprice`, `date_entry`, `Comm_item_slno`, `Mr_item_slno`, `bid_slno`, `Vendor_id`, `master_item_slno_material`, `Category_material`, `pr_no`, `Resubmission_count_id`, `Slno_simple_item_slno`
                     //  echo "<br>";
                       $array_insert_bid = array('Simple_id_slno' =>$vend_info[0]->Simple_id_slno,'Bid_master_id_com' => $vend_info[0]->Bid_master_id_com,'Item_name' =>$vend_info[0]->Item_name,'parameter_tech' =>$vend_info[0]->parameter_tech ,'Quantity' => $vend_info[0]->Quantity,'Uom_unit' =>$vend_info[0]->Uom_unit ,'Unit_price' =>$vend_info[0]->Unit_price ,'Total_unitprice' =>$vend_info[0]->Total_unitprice ,'date_entry' => $vend_info[0]->date_entry,'Comm_item_slno' =>$vend_info[0]->Comm_item_slno,'Mr_item_slno' =>$vend_info[0]->Mr_item_slno ,'Item_id' =>$vend_info[0]->Item_id,'bid_slno' =>$vend_info[0]->bid_slno ,'Vendor_id' =>$vend_info[0]->Vendor_id,'commerical_entry_name'=>$commerical_email_id,'Slno_simple_item_slno'=>$vend_info[0]->Slno_simple_item,'master_item_slno_material'=>$vend_info[0]->master_item_slno_material,'Category_material'=>$vend_info[0]->Category_material,'pr_no'=>$vend_info[0]->pr_no,'Resubmission_count_id'=>$vend_info[0]->Resubmission_count_id);
                       $this->db->insert('master_pr_bid_qoute_item_final_approve',$array_insert_bid);

                 }
                 $data_update_master = array('status_bid' => 6);
                 $data_master_id = array('Slno_bid' => $comm_bid_db );

                 $data__master_bid_ids = array('master_bid_id' => $comm_bid_db );
                $this->db->update('master_bid_Com_m',$data_update_master,$data_master_id);
                $this->db->update('master_bid_Com_evaluation_m',$data_update_master,$data__master_bid_ids);

                // $this->db->update('master_bid_Com_evaluation_m',$data_update_master,$data__master_bid_ids);

                $data_vendor_id = array('status_active' => 2 );
                $data_vendor_bid_ids = array('master_bid_id' => $comm_bid_db );
                 $this->db->update('master_bid_Com_vendor_m',$data_vendor_id,$data_vendor_bid_ids);

                 $date_process_pr = array('pr_no' => $pr_no);
              $date_update_process = array('techno_commercial_status' =>1 ,'commercial_date'=>date('y-m-d') ,'commercial_user_status'=>1,'commercial_complete_status'=>1);
                $this->db->update('master_pr_process_detail',$date_update_process,$date_process_pr);
              // 

                $this->session->set_flashdata('success_message',  'Bid Approved vendor successfully Has been Completed');
                 redirect('commerical-otp-verification-success-view-pr/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid);
                 // redirect('commerical-otp-verification-success-view/'.$type_bid.'/'.$master_bid_id.'/'.$category_id.'/'.$bid_name_url.'/'.$buyer_bid.'/'.$last_otp_id);
      
       # code...
   }

   public function commerical_user_send_approve_nofication_pr($value=''){
      // print_r($this->input->post());
      // exit;
      // Array ( [type_bid] => 1 [pr_no] => O900-102-A-C-40101-003 [commercial_bid_ref] => 66400 [commercial_bid_id] => 7701 [last_otp_id] => 3 [commercial_type_bid] => Simple Bid [comm_bid_db] => 4 [commercial_resubmit_count] => 0 [commercial_edit_id] => 1 [end_dete_submitio] => 04/18/2018 [Message] => Query grouping allows you to create groups of WHERE clauses by enclosing them in parentheses. This will allow you to create queries with complex WHERE clauses. Nested groups are supported. Example: [Vendor_email_id] => Array ( [0] => vender@ilab.com [1] => ven121@gmail.com ) [slno_vendor] => Array ( [0] => 15 [1] => 16 ) ) 
      // 
        $type_bid=$this->input->post('type_bid');
        $pr_no=$this->input->post('pr_no');
        $commercial_bid_ref=$this->input->post('commercial_bid_ref');
        $commercial_bid_id=$this->input->post('commercial_bid_id');
        $last_otp_id=$this->input->post('last_otp_id');
        $commercial_type_bid=$this->input->post('commercial_type_bid');
        $comm_bid_db=$this->input->post('comm_bid_db');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        $commercial_edit_id=$this->input->post('commercial_edit_id');
        $end_dete_submitio=$this->input->post('end_dete_submitio');
        $Message=$this->input->post('Message');
        $slno_vendor=$this->input->post('slno_vendor');
        $Vendor_email_id=$this->input->post('Vendor_email_id');
        $Slno_vendor_id=$this->input->post('Slno_vendor_id');

       // $type_bid=$this->input->post('type_bid');
       //  $master_bid_id=$this->input->post('master_bid_id');
       //  $category_id=$this->input->post('category_id');
       //  $bid_name=$this->input->post('bid_name');
       //  $buyer_bid=$this->input->post('buyer_bid');
       //  $last_otp_id=$this->input->post('last_otp_id');
       //  $end_dete_submitio=$this->input->post('end_dete_submitio');
       //  $Message=$this->input->post('Message');
       //  $Vendor_email_id=$this->input->post('Vendor_email_id');
       //  $slno_vendor=$this->input->post('slno_vendor');
      // print_r($this->input->post());
      // $data_get = array('master_bid_id' =>$value ,'category'=>$value1 );
      //  $query= $this->db->get_where('master_bid_invi_rank_approvals',$data_get);

            foreach ($Vendor_email_id as $key_id => $value_id) {
                $slno_vendor_id=$slno_vendor[$key_id];
                $vender_slno_id=$Slno_vendor_id[$key_id];
                $approve_vendor = array('vendor_id_bid'=>$slno_vendor_id, 'vendor_id'=>$vender_slno_id, 'message'=>$Message);
                $this->db->insert('master_vendor_notifications',$approve_vendor);
                $update_status = array('status_view' =>8 , 'negotiable_date'=>$end_dete_submitio);
                $update_id = array('slno_vendor' => $slno_vendor_id,'vendor_id'=> $value_id);
                $this->db->update('master_bid_Com_vendor_m',$update_status,$update_id);

           }
           // `master_bid_id`, `messsage`, `vendor_send_id`, `end_submission_date`
           $data_insert = array('master_bid_id' => $comm_bid_db,'messsage'=>$Message,'vendor_send_id'=>json_encode($Vendor_email_id) ,'end_submission_date'=>$end_dete_submitio);
             $this->db->insert('master_commercial_notifications',$data_insert);
             $this->session->set_flashdata('success_message', 'Successfull notification is send bid '.$commercial_bid_ref); // here is message is been toasted

             redirect('user-commerical-evalutor-home');
   }
   public function commerical_otp_verification_success_view_pr($type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
      $value3 = urldecode($commercial_type_bid);
       $scripts='';
        $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'last_otp_id'=>$last_insert_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$value3);
        $this->load->view('comm_evalutor_user/pr_complete_view/commerical_get_list_vendor_moi_sci_c_o_view',$data);
       # code...
   
       # code...
   }

     public function user_commerical_evalutor_pr_view_list($value=''){ // will show mr in mr received
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Bid Received List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'24','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('comm_evalutor_user/template/template_top_head');
            $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
            $this->load->view('comm_evalutor_user/pr_complete_view/create_view',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }

   public function comm_view_project_old_remark(){
    $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
    $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
    $this->load->view('template/template_header',$data);
    $this->load->view('comm_evalutor_user/template/template_top_head');
    $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
    $this->load->view('comm_evalutor_user/remark_history/remark_index',$data);
    $this->load->view('template/template_footer',$data);
   }
   public function comm_pr_remark_history($pr_no='',$slno='',$job_code='',$id=''){
    $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
    $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id);
    $this->load->view('template/template_header',$data);
    $this->load->view('comm_evalutor_user/template/template_top_head');
    $this->load->view('comm_evalutor_user/template/template_side_bar',$data);
    $this->load->view('comm_evalutor_user/remark_history/remark_index_detail',$data);
    $this->load->view('template/template_footer',$data);

   }
}
