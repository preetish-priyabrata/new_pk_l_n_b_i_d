<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technicalevalutor extends CI_Controller {
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
            // imedate database link
            $this->load->database();

            //Load session library
         $this->load->library('session');
         $this->load->library('user_agent');
         $this->load->library('encryption');
         $this->load->library('form_validation');
         $this->load->library('cronfile');
         $this->load->helper('string');
         $this->cronfile->index_event();


    }
    public function tech_evalutor_home($value=''){
      $scripts='';
            $data=array('title' =>"Technical Evalutor User Dashboard",'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/user_dashboard');
            $this->load->view('template/template_footer',$data);
    }

    public function technical_evaluator_bid_new_list($value=''){
      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
          $data=array('title' =>"Technical bid list",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/technical_bid_new/tech_evaluator_technical_bid_new_lists',$data);
            $this->load->view('template/template_footer',$data);
    }
    public function technical_evaluator_bid_old_list(){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
          $data=array('title' =>"Technical bid list Of Approved Completed",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/technical_bid_old/tech_evaluator_technical_bid_old_lists',$data);
            $this->load->view('template/template_footer',$data);
        
    }
    /**
     * [technical_evaluator_view_details_technical_bid_new description]
     * @param  string $value [Slno_bid it contain bid master id which will leaD OTHER WORK]
     * @return [type]        [description]
     */
    public function technical_evaluator_view_details_technical_bid_new($value='',$value1=''){
      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
          $data=array('title' =>"Detail Information Of bid",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1);
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            if($value1==3){
                 $this->load->view('tech_evalutor_user/technical_bid_new/view_details_technical_bid_new_logistic',$data);
            }else if(($value1==2) || ($value1==1)){
                $this->load->view('tech_evalutor_user/technical_bid_new/view_details_technical_bid_new',$data);
                 
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went worng Try Again!!!!');
                redirect('user-technical-evalutor-home');
            }
           
            $this->load->view('template/template_footer',$data);
    }
    /**
     * [technical_evaluator_view_details_technical_bid_new_complete_view description]
     * @param  string $value  [Slno_bid]
     * @param  string $value1 [categoru]
     * @param  string $value2 [0 ->approve view  1-> update apporved view 2-> completed view only]
     * @return [type]         [description]
     */
    public function technical_evaluator_view_details_technical_bid_new_complete_view($value='',$value1='',$value2=''){
        if($value2==0){
            $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Detail Information Of bid",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1 ,'access'=>$value2);
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            if($value1==3){
                $this->load->view('tech_evalutor_user/conform_closed_process/view_details_technical_bid_new_logistic',$data);
            }else if(($value1==2) || ($value1==1)){
                $this->load->view('tech_evalutor_user/conform_closed_process/view_details_technical_bid_new',$data);
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went worng Try Again!!!!');
                redirect('user-technical-evalutor-home');
            }
            $this->load->view('template/template_footer',$data);
        }else if($value2==1){
            $update_state = array('status_bid' => 6 );
            $tech_slno = array('master_bid_id' => $value);
            $bid_slno = array('Slno_bid' => $value);
            $update_status_Technical_query=$this->db->update('master_bid_technicalevaluation',$update_state,$tech_slno);
            $update_status__master_bid_query=$this->db->update('master_bid',$update_state,$bid_slno);
             $this->session->set_flashdata('success_message',  'Bid Is completed Evaluted successfull');
                redirect('user-technical-evalutor-home');
           

        }else if($value2==2){
             $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"View Detail Information Of bid",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1 ,'access'=>$value2);
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            if($value1==3){
                $this->load->view('tech_evalutor_user/conform_closed_process/view_details_technical_bid_new_logistic',$data);
            }else if(($value1==2) || ($value1==1)){
                $this->load->view('tech_evalutor_user/conform_closed_process/view_details_technical_bid_new',$data);
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went worng Try Again!!!!');
                redirect('user-technical-evalutor-home');
            }
            $this->load->view('template/template_footer',$data);
        }
    }
    /**
     * [technical_evalutor_get_approved_reject description]
     * @param  string $value  [slno_vendor]
     * @param  string $value1 [master_bid_id / serial no]
     * @param  string $value2 [category ]
     * @return [type]         [description]
     */
    public function technical_evalutor_get_approved_reject($value='',$value1='',$value2=''){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
        $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1,'value2'=>$value2 );

            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/tech_approve_reject_bid_vendor/approve_reject_bid',$data);
            $this->load->view('template/template_footer',$data);

        # code...
    }
     public function user_technical_evalutor_pr_receive($value=''){ // will show mr in mr received
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Buyer List Of Mr Received",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/pr_create/create_view_new_bids',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }



public function technical_user_bid_pr_new_material($value='',$value1='',$value2='',$value3='',$value4=''){ // will show mr in mr received
        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$value,'Pr_no_slno'=>$value1,'Project_slno'=>$value2,'edit_type'=>$value3,'bid_id'=>$value4);
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/pr_details/view_details_create_view_new_bids',$data);
            $this->load->view('template/template_footer',$data);
       # code...
   }
   //public function technical_evalutor_pr_create_save(){
    //print_r($this->input->post());

     //$pr_no=$this->input->post('pr_no');
     //$bid_ref_no=$this->input->post('bid_ref_no');    
     //$bid_Id=$this->input->post('bid_Id');
   //}


    public function technical_evalutor_get_approved_reject_save($value=''){
        $value=$this->input->post('value');  // venderor serial id request
        $value1=$this->input->post('value1'); // bid serial no
        $value2=$this->input->post('value2'); // category
        $Slno_token=$this->input->post('Slno_token'); // tooken no 
        $token_no=$this->input->post('token_no'); // token id
        $vendor_id=$this->input->post('vendor_id'); // vendor emaiol id
        $comment=$this->input->post('comment'); //comment
        $data_id = array('slno_vendor' => $value );
        if(($this->input->post('switcher_checkbox_1'))){ /// if approved
            $array_resubission = array('approval_status' => 1, 'comment'=>$comment,'view_status_approve'=>1);
            $query_upade=$this->db->update('master_bid_vendor',$array_resubission,$data_id);
            if($query_upade){
                $data_token_comment = array('comment' => $comment);
                $update_id = array('Slno_token' => $Slno_token);
                $updae_token_tab=$this->db->update('master_vendor_tech_token_bid',$data_token_comment,$update_id);
                if($updae_token_tab){
                    $data_inserted = array('master_bid'=>$value1, 'vendor_bid_id'=>$value, 'comment'=>$comment, 'status'=>'P', 'active_status'=>1, 'token_no'=>$token_no, 'token_id'=>$Slno_token);
                    $data_inserted=$this->db->insert('master_tech_bid_comment',$data_inserted);
                    if($data_inserted){
                         $this->session->set_flashdata('success_message',  'Sucessfully Approval Of Technical bid ');
                        redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2);
                    }else{
                         $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!!!');
                        redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2);
                    }
                }else{
                    $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!!');
                    redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2); 
                }
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!');
                redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value1); 
            }
        }else{ // if resubmission
          // `````token_no`
            $array_resubission = array('submission_status'=>'0','comment'=>$comment,'status_view'=>'8');
            $query_upade=$this->db->update('master_bid_vendor',$array_resubission,$data_id);

            if($query_upade){
                $data_token_comment = array('comment' => $comment);
                $update_id = array('Slno_token' => $Slno_token);
                $updae_token_tab=$this->db->update('master_vendor_tech_token_bid',$data_token_comment,$update_id);
                if($updae_token_tab){
                    $data_inserted = array('master_bid'=>$value1, 'vendor_bid_id'=>$value, 'comment'=>$comment, 'status'=>'N', 'active_status'=>3, 'token_no'=>$token_no, 'token_id'=>$Slno_token);
                    $data_inserted=$this->db->insert('master_tech_bid_comment',$data_inserted);
                    if($data_inserted){
                         $this->session->set_flashdata('success_message',  'Sucessfully Resubmission Request for bid to vendor is been send ');
                        redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2);
                    }else{
                         $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!');
                        redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2);
                    }
                }else{
                   $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!');
                    redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2);  
                }
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!');
                redirect('user-technical-evaluator-view-details-technical-bid-new/'.$value1.'/'.$value2); 
            }
        }
        
        // 
    }

    public function technical_view_vendor_sumission_info_pr($slno_vendor='',$master_bid_id='',$bid_id='',$pr_no=''){
        $date_file_sub = array('bid_id_vendor' => $slno_vendor ); 
        $get_no_file=$this->db->get_where('master_vendor_tech_token_bid_c',$date_file_sub);
   
        $row_vendor=$get_no_file->result() ;
        $submission=$row_vendor[0];
    // <a href="<?=base_url().'seller/vendor-tech-file-new-bid-submission-info/'.$value.'/'.$submission->token_no .'/'.$submission->master_bid_id 

        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'master_bid_id'=>$master_bid_id,'slno_vendor'=>$slno_vendor,'bid_id'=>$bid_id,'tech_master_bid_id'=>$submission->master_bid_id ,'token_no'=>$submission->token_no );
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/pr_details/tech_vendor_approve_reject',$data);
            $this->load->view('template/template_footer',$data);
    }
    public function technical_appro_reject_save_pr($value=''){
        $slno_vendor=$this->input->post("slno_vendor");
        $master_bid_id=$this->input->post("master_bid_id");
        $Slno_token=$this->input->post("Slno_token");
        $token_no=$this->input->post("token_no");
        $vendor_id=$this->input->post("vendor_id");
        $switcher_checkbox_1=$this->input->post("switcher_checkbox_1");
        $comment=$this->input->post("comment");
        $slno_vendor_url=$this->input->post('slno_vendor_url');
        $pr_no=$this->input->post('pr_no');
        $master_bid_id_url=$this->input->post('master_bid_id_url');
        $tech_master_bid_idurl=$this->input->post('tech_master_bid_idurl');
        $token_no_url=$this->input->post('token_no_url');
        $bid_id=$this->input->post('bid_id');

        $data_process = array('pr_no' =>$pr_no);
        $query_process=$this->db->get_where('master_pr_process_detail',$data_process);
        $result_process=$query_process->result();
        $technical_bid_id=$result_process[0]->technical_bid_id;  // technical bid ind information 
        $technical_bid_ref=$result_process[0]->technical_bid_ref; // technical bid referenced infromtion
        $technical_edit_id=$result_process[0]->technical_edit_id; // no of time bid is been edit infromation
        $slno_pr=$result_process[0]->pr_no_slno;
        $job_code=$result_process[0]->project_slno;
        $tech_bid=$result_process[0]->tech_bid;  // bid id information

        $data_id = array('slno_vendor' => $slno_vendor );

        $url='technical-user-bid-pr-new-material/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/3/'. $tech_bid;
        if(($this->input->post('switcher_checkbox_1'))){ /// if approved
            $array_resubission = array('approval_status' => 1, 'submission_status'=>1,'comment'=>$comment,'view_status_approve'=>1,'status_view'=>'7');
            
            $check_id=$this->db->get_where('master_bid_vendor_m',$data_id);
            if($check_id->num_rows()==1){
                $query_upade=$this->db->update('master_bid_vendor_m',$array_resubission,$data_id);
                if($query_upade){
                     $data_token_comment = array('comment' => $comment);
                    $update_id = array('token_no' => $token_no);
                    $updae_token_tab=$this->db->update('master_vendor_tech_token_bid_c',$data_token_comment,$update_id);
                    if($updae_token_tab){
                         $data_inserted = array('master_bid'=>$tech_bid, 'vendor_bid_id'=>$slno_vendor, 'comment'=>$comment, 'status'=>'P', 'active_status'=>1, 'token_no'=>$token_no, 'token_id'=>$Slno_token);
                            $data_inserted=$this->db->insert('master_tech_bid_comment',$data_inserted);
                            $this->session->set_flashdata('success_message',  'Sucessfully Approval Of Technical bid ');
                            redirect($url); 
                    }else{
                        $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!!');
                        redirect($url); 
                    }
                
                }else{                
                $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!');
                redirect($url); 
                }
            }else{ // if user is not found 
                  $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!!');
                redirect($url); 
            }
          }else{
            $array_resubission = array('submission_status'=>'0','comment'=>$comment,'status_view'=>'8');
            $query_upade=$this->db->update('master_bid_vendor_m',$array_resubission,$data_id);
            // echo $this->db->last_query();
            // exit;
            if($query_upade){
                $data_token_comment = array('comment' => $comment);
                $update_id = array('Slno_token' => $Slno_token);
                $updae_token_tab=$this->db->update('master_vendor_tech_token_bid_c',$data_token_comment,$update_id);
                if($updae_token_tab){
                    $data_inserted = array('master_bid'=>$tech_bid, 'vendor_bid_id'=>$slno_vendor, 'comment'=>$comment, 'status'=>'N', 'active_status'=>3, 'token_no'=>$token_no, 'token_id'=>$Slno_token);
                    $data_inserted=$this->db->insert('master_tech_bid_comment',$data_inserted);
                    if($data_inserted){
                         $this->session->set_flashdata('success_message',  'Sucessfully Resubmission Request for bid to vendor is been send ');
                        redirect($url); 
                    }else{
                         $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!');
                       redirect($url); 
                    }
                }else{
                   $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!');
                    redirect($url); 
                }
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!');
               redirect($url); 
            }

          }

        // Array ( [slno_vendor] => 3 [master_bid_id] => 1 [Slno_token] => 1 [token_no] => eEPklcrI [vendor_id] => ven121@gmail.com [slno_vendor_url] => 3 [pr_no] => O18191-950-E-K-30108-001 [master_bid_id_url] => 1 [tech_master_bid_idurl] => 1 [token_no_url] => eEPklcrI [bid_id] => 1 [switcher_checkbox_1] => 1 [comment] => ) 
        // Array ( [slno_vendor] => 3 [master_bid_id] => 1 [Slno_token] => 1 [token_no] => eEPklcrI [vendor_id] => ven121@gmail.com [switcher_checkbox_1] => 1 [comment] => ) 
       
        # code...
    }
    public function technical_evaluator_view_details_technical_bid_new_complete_view_pr($pr_no='',$technical_bid_ref='',$technical_bid_id='',$tech_bid='',$id=''){
        if($id==1){ // will view list of itme
             $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'technical_bid_ref'=>$technical_bid_ref,'technical_bid_id'=>$technical_bid_id,'id'=>$id,'bid_id'=>$tech_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('tech_evalutor_user/template/template_top_head');
            $this->load->view('tech_evalutor_user/template/template_side_bar',$data);
            $this->load->view('tech_evalutor_user/pr_details/view_details_create_view_new_bids_pr',$data);
            $this->load->view('template/template_footer',$data);
        }else if($id==2){ // here  technical user will submit
              print_r($this->input->post());

        }else if($id==3){

        }else{

        }
        # code...
    }
   
    




















    //
     public function tech_evalutor_logout($value=''){
         $session_id=session_id();
                // print_r($this->session->userdata());
                $created_session_id=$this->session->userdata('session_id');
                $date=date('Y-m-d');
                $time=date('H:i:s');
                if($session_id==$created_session_id){
                        $user_data = array('logout_date'=>$date, 'logout_time'=>$time, 'status'=>'2');
                        $id=array('session_id'=>$session_id);
                        $user_hstory_table="master_session_history_vendors";
                        $result_history = $this->user->common_update($user_hstory_table,$user_data,$id);
                        session_destroy();
                        session_start();
                        $this->session->set_flashdata('success_message', 'Signout from Technical Evalutors User Portal');
                        redirect('home');

                }else{

                        $user_data = array('logout_date'=>$date, 'logout_time'=>$time, 'status'=>'2');
                        $id=array('session_id'=>$session_id);
                        $user_hstory_table="master_session_history_vendors";
                        $result_history = $this->user->common_update($user_hstory_table,$user_data,$id);
                        session_destroy();
                        session_start();
                        $this->session->set_flashdata('success_message', 'Sign-out from Technical Evalutors User Portal');
                        redirect('home');
                }
        # code...
    }
    public function tech_evalutor_logout_bypass(){
        $this->session->set_flashdata('error_msg', 'Invalid entry to Technical Evalutors User Portal');
        redirect('home');

    }


}
