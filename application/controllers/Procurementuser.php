<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procurementuser extends CI_Controller {
	public function __construct(){
            parent::__construct();
            // Loading my model which will use
            $this->load->model('user_model', 'user');
            $this->load->model('approver_model', 'approver_user');
            $this->load->model('design_model', 'design_user');
            $this->load->model('procurement_model', 'procurement_user');

            // imedate database link
            $this->load->database();

            //Load session library
         $this->load->library('session');
         $this->load->library('user_agent');
         $this->load->library('encryption');
         $this->load->library('form_validation');
         $this->load->helper('string');
         $this->load->library('upload');
         $this->load->library('cronfile');
         $this->cronfile->index_event();
     }
      public function home(){
         $scripts='';
            $data=array('title' =>"Procurement User Dashboard",'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/user_dashboard');
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function procurement_new_pr_receive($value=''){
    	$scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

        $data=array('title' =>"PR Requisition Receive list",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/new_pr_schedule_procurement/project_pr_schedule');
            $this->load->view('template/template_footer',$data);
    }
    public function procurement_new_mr_receive($value=''){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

        $data=array('title' =>"Material Requisition Receive list",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/receive_material_requisition/view_receive_mr_list');
            $this->load->view('template/template_footer',$data);
    }
    public function procurement_new_pr_schedule_complete($value=''){ // CREATING mR
          $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Project Detail Information",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/new_pr_schedule_complete/pr_schedule_complete',$data);

            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function procurement_new_pr_complete_requisition($value='', $value1="" ,$value2="",$value3=""){ // CREATING mR
          $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Project Detail Information",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$value,'slno_pr'=>$value1,'job_code'=>$value2);
            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/new_pr_complete_requisition/create_pr_complete',$data);

            $this->load->view('template/template_footer',$data);
       # code...
   }
    public function procurement_user_create_new_material($value='', $value1="" ,$value2="",$value3=""){
         $email_id=$this->session->userdata('procurement_email_id');
        if(empty($email_id)){

            redirect('procurement-logout-by-pass');
        }
        $_SESSION["cart_item"]="";
        $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';

        $data=array('title' =>"Create New Material Requisition",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$value,'slno_pr'=>$value1,'job_code'=>$value2);

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/new_mr_requisition/create_material_requisition_form',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }

    public function procurement_project_pr_schedule_api($value=''){
       $email_id=$this->session->userdata('procurement_email_id');
        if(empty($email_id)){

            redirect('procurement-logout-by-pass');
        }
        $table="master_pr_schedule";
        $actions_file=$this->input->post('actions_file');
        $job_code=$this->input->post('job_code');
        switch ($actions_file) {

             case 'bu_Views_total':
                $data_check = array('job_code' => $job_code,'status'=>1, 'mr_status'=>0);
                $query=$this->db->get_where($table,$data_check);
                    // echo  $this->db->last_query();
                $output = '
                  <h3 align="center">Total Data - '.$query->num_rows().'</h3>
                  <table class="table table-striped table-bordered">
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>
                      <th>Area</th>
                      <th>Item</th>
                      <th>UOM</th>
                      <th>Quantity</th>
                      <th>Original Schedule</th>
                      <th>Action</th>
                    </tr>
                ';
                foreach($query->result() as $row){
                    $output .= '
                    <tr>
                      <td>'.$row->discipline.'</td>
                      <td>'.$row->pr_no.'</td>
                      <td>'.$row->area.'</td>
                      <td>'.$row->item.'</td>
                      <td>'.$row->UOM.'</td>
                      <td>'.$row->quantity.'</td>
                      <td>'.$row->original_schedule.'</td>
                      <td><a href="'.base_url().'design-mr-new-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" target="_blank"> Click to Generated PR </a></td>
                    </tr>
                    ';
                }
                $output .= '</table>';
                echo $output;
                exit();
            break;

            default:
                # code...
                break;
        }
    }
    /**
     * [design_new_mr_pr_list description] here new mr is created which will work form now
     * @param  string $value  [pr_no]
     * @param  string $value1 [slno]
     * @param  string $value2 [job_code]
     * @return here view ill develop for mr creation which will be displayed         [description]
     */
    public function procurement_new_mr_order_receive_view($value,$value1,$value2){

    	 switch ($value1) {
                case '1':
                    $title="View detail of standard catalogued item";
                    $view_page="view_mr_order_first";
                    break;
                case '2':
                    $title="View detail of make to order items";
                    $view_page="view_mr_order_second";
                    break;
                case '3':
                    $title="View detail of logistics";
                    $view_page="view_mr_order_third";
                    break;

                default:
                    # code...
                    break;
            }
            $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>$title,'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1,'value2'=>$value2);

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/receive_material_requisition/view_detail_submitted_mr/'.$view_page,$data);
            $this->load->view('template/template_footer',$data);
    	# code...
    }
    public function procurement_assigned_buyer($value=''){
        // print_r($this->input->post());
        // exit();
        $email_id=$this->session->userdata('procurement_email_id');
        if(empty($email_id)){

            redirect('procurement-logout-by-pass');
        }
        $date=date('Y-m-d');
        $slno_Mr_no=$this->input->post('slno_Mr_no');
        $Slno_approver=$this->input->post('Slno_approver');
        $buyer_id=$this->input->post('buyer_id');
        $Mr_no=$this->input->post('Mr_no');
        $edit_id=$this->input->post('edit_id');
        $tech_evalution=$this->input->post('tech_evalution');
        $job_code_id=$this->input->post('job_code_id');
        $data_array_buyer=$this->procurement_user->get_procurement_buyer_list($buyer_id);
        // Array ( [no_user] => 1 [user_buyer_list] => Array ( [0] => stdClass Object ( [slno] => 15 [email_id] => buy1@ilab.com [Username] => buyer 1 [Password] => 1234567890Ab [password_hash] => c0d7659e35f9e7b793c4257d565e7390 [Status] => 1 [role_id] => 7 [user_mobile] => 8978564210 [user_degination] => buyser ) ) )
        if($data_array_buyer['no_user']==1){
            $buyer_id =$data_array_buyer['user_buyer_list'][0]->email_id;
            $buyer_name=$data_array_buyer['user_buyer_list'][0]->Username;
            $data_insert = array('buyer_name' =>$buyer_name ,'buyer_id'=>$buyer_id ,'Forward_status'=>'1','Forward_date'=>$date);
            $data_update_id = array('Slno_mr_id' =>$slno_Mr_no);
            $query_table1=$this->db->update('master_procurement_MR',$data_insert,$data_update_id);
            if($query_table1){
                 $query_table2=$this->db->update('master_mr_approver_order',$data_insert,$data_update_id);
                   if($query_table2){
                        $data_buyer_insert = array('Mr_id'=>$Mr_no, 'Slno_mr_id'=>$slno_Mr_no, 'Job_code'=>$job_code_id, 'Slno_procurement_id'=>$Slno_approver, 'Buyer_id'=>$buyer_id, 'Status'=>1, 'Technical_type'=>$tech_evalution, 'Edit_id'=>$edit_id,'procurement_id'=>$email_id);
                        $query_table3=$this->db->insert('master_buyer_MR',$data_buyer_insert);
                        if($query_table3){
                             $this->session->set_flashdata('success_message', 'Information Has been successfully assigned');
                             // After that you need to used r
                            redirect('user-procurement-home');
                        }else{
                              $this->session->set_flashdata('error_message',  'Some thing went worng Try Again!!!!');
                             // After that you need to used r
                            redirect('user-procurement-home');
                        }
                   }else{
                        $this->session->set_flashdata('error_message',  'Some thing went wrong Try Again!!!');
                             // After that you need to used r
                        redirect('user-procurement-home');
                   }
            }else{
                 $this->session->set_flashdata('error_message', 'Some thing went wrong Try Again!!');
                    // After that you need to used r
            redirect('user-procurement-home');
            }
        }else{
             $this->session->set_flashdata('error_message', 'Some thing went wrong Try Again!');
                    // After that you need to used r
            redirect('user-procurement-home');
        }


    }


    public function procurement_new_mr_conform($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

        $data=array('title' =>"Histroy of Assign Buyer to Material Requisition",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/assign_material_requisition/view_assigned_mr_list');
            $this->load->view('template/template_footer',$data);
    }



    public function procurement_assign_mr_order_receive_view($value,$value1,$value2){

         switch ($value1) {
                case '1':
                    $title="View detail of standard catalogued item";
                    $view_page="view_mr_order_first";
                    break;
                case '2':
                    $title="View detail of make to order items";
                    $view_page="view_mr_order_second";
                    break;
                case '3':
                    $title="View detail of logistics";
                    $view_page="view_mr_order_third";
                    break;

                default:
                    # code...
                    break;
            }
            $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>$title,'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'value1'=>$value1,'value2'=>$value2);

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/assign_material_requisition/view_detail_submitted_mr/'.$view_page,$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function procurement_logout($value=''){
    	 $session_id=session_id();
                // print_r($this->session->userdata());
                $created_session_id=$this->session->userdata('session_id');
                $date=date('Y-m-d');
                $time=date('H:i:s');
                if($session_id==$created_session_id){
                        $user_data = array('logout_date'=>$date, 'logout_time'=>$time, 'status'=>'2');
                        $id=array('session_id'=>$session_id);
                        $user_hstory_table="master_session_history";
                        $result_history = $this->user->common_update($user_hstory_table,$user_data,$id);
                        session_destroy();
                        session_start();
                        $this->session->set_flashdata('success_message', 'Signout from Procurement User panel');
                        redirect('home');

                }else{

                        $user_data = array('logout_date'=>$date, 'logout_time'=>$time, 'status'=>'2');
                        $id=array('session_id'=>$session_id);
                        $user_hstory_table="master_session_history";
                        $result_history = $this->user->common_update($user_hstory_table,$user_data,$id);
                        session_destroy();
                        session_start();
                        $this->session->set_flashdata('success_message', 'Sign-out from Procurement User Panel');
                }
    	# code...
    }
    public function procurement_logout_bypass(){
        $this->session->set_flashdata('error_msg', 'Invalid entry to Procurement User panel');
        redirect('home');

    }
    public function procurement_add_new_pr_save($value=''){
        $email_id=$this->session->userdata('procurement_email_id');
        if(empty($email_id)){
            
            redirect('procurement-logout-by-pass');
        }
      // print_r($this->input->post());
      // Array ( [pr_no] => O18191-950-E-K-30102-001 [slno_pr] => 2 [job_code] => 1 [pr_no_type] => new_pr_creater [edit_type] => 1 [tech_evalution] => 2 [required_date] => 2019-03-28 [approver_id] => 18 [Procurement] => 13 [buyer_id] => 15 [materials_id] => semiconductors [mr_date_of_creation] => 2019-03-16 [submission] => Sent )
      $remark_buyer=$this->input->post('remark_buyer');
      $pr_no=$this->input->post('pr_no');
      $slno_pr=$this->input->post('slno_pr');
      $job_code=$this->input->post('job_code');
      $tech_evalution=$this->input->post('tech_evalution');
      $buyer_id=$this->input->post('buyer_id');
      $date_system=date('Y-m-d');
      
        $data_array_buyer=$this->procurement_user->get_procurement_buyer_list($buyer_id);
        if($data_array_buyer['no_user']==1){
            $buyer_id_email_id =$data_array_buyer['user_buyer_list'][0]->email_id;
            $buyer_name=$data_array_buyer['user_buyer_list'][0]->Username;

            $data_forword=array('procurement_user_status'=>1,'procurement_date'=>$date_system,'buyer_user_id'=>$buyer_id_email_id,'buyer_user_slno'=>$buyer_id,'buyer_user_status'=>2,'procurement_user_remark'=>$remark_buyer);
            $data_id = array('pr_no' =>$pr_no ,'pr_no_slno'=>$slno_pr );
            $update=$this->db->update('master_pr_process_detail',$data_forword,$data_id);
            $data_insert = array('pr_no' => $pr_no, 'slno_pr'=>$slno_pr,'job_code'=>$job_code,'Comment_remark'=>$remark_buyer,'email_id'=>$email_id,'level_user'=>4 ,'type_remark'=>'R','to_level_user'=>5);
            $query=$this->db->insert('master_bu_remark_pr',$data_insert);
            if($update){

                #####################################################################################################
                #
                #                     Email integration section will start 
                #
                #####################################################################################################

                $this->load->library('email');
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $this->email->from('contact@innovadorslab.co.in,'.$email_id , 'Lnt Bid Management System');
                $this->email->to($buyer_id_email_id);
                $this->email->cc('siprah@gmail.com');              
                $this->email->bcc('ppriyabrata8888@gmail.com');

                $this->email->subject('You have Received a new notification for PR No  '.$pr_no.' From Procurement User To Buyer User');
                if($tech_evalution==1){
                    $url_passing_email='<a href="'.base_url().'buyer-user-create-new-pr-tech-comm/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution.'" > Click to View  </a>';
                }else{
                    $url_passing_email='<a href="'.base_url().'buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution.'" > Click to View </a>';	
                }
                // $url_passing_email='<a href="'.base_url().'procurement-user-create-new-material/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/4" > Click to View </a>';
                $msg=' Remark :- ' .$remark_buyer.'. <br /> Please click link here '.$url_passing_email;
                $this->email->message($msg);


                $this->email->send();


                #######################################################################################################



              $this->session->set_flashdata('success_message', 'Information Has been successfully Send To Buyer :- '.$buyer_name);
                             // After that you need to used r
               redirect('user-procurement-home');
            }else{
                 $this->session->set_flashdata('error_message', 'Something went wrong Try Again! A');
                    // After that you need to used r
            redirect('user-procurement-home');
            }
        }else{
              $this->session->set_flashdata('error_message', 'Something went wrong Try Again! And Please Check Buyeruser selected');
                    // After that you need to used r
            redirect('user-procurement-home');
        }
    }

    public function proc_view_project_old_remark(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
       
        $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('procurement_user/template/template_top_head');
        $this->load->view('procurement_user/template/template_side_bar',$data);
        $this->load->view('procurement_user/remark_history/remark_index',$data);
        $this->load->view('template/template_footer',$data);
       }
        public function procurement_change_password(){
           
                $scripts='<script src="https://cdnjs.cloudflare.com/ajax/libs/hideshowpassword/2.0.8/hideShowPassword.min.js"></script>';
            
                $data=array('title' =>"Admin Change Password for Users",'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
                $this->load->view('template/template_header',$data);
                $this->load->view('procurement_user/template/template_top_head');
                $this->load->view('procurement_user/template/template_side_bar',$data);
                $this->load->view('procurement_user/change_password',$data);
                $this->load->view('template/template_footer',$data);
            
        }
        public function procurement_change_password_save1(){
            $data_brower['browser'] = $this->agent->browser();
            $data_brower['browserVersion'] = $this->agent->version();
            $data_brower['platform'] = $this->agent->platform();
            $data_brower['full_user_agent_string'] = $_SERVER['HTTP_USER_AGENT'];
            $ip = $this->input->ip_address();       
            $date_nrowser_json=json_encode($data_brower);
            $date_entry=date('Y-m-d');
            $time_entry=date('H:i:s');
            $user_id_slno=$this->input->post('user_id_slno');
            $token_id=$this->input->post('token_id');
            $password=$this->input->post('password');
            $keys_id="preetishweb";
            $value1_convered = strtr($user_id_slno,array('.' => '+', '-' => '=', '~' => '/'));
            
            $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
            if($value1_convered_id==$token_id){
                $table='master_admin';
                $data_insert = array('Password'=>$password, 'password_hash'=>md5($password));
                $id=array('slno'=>$value1_convered_id);      
                $result_insert = $this->user->common_update($table,$data_insert,$id);

                $data_json=json_encode($data_insert);
                $data_id_json=json_encode($id);
                $date_insert_array = array('data_insert' => $data_json,'update_id'=>$data_id_json );
                $date_insert_json=json_encode($date_insert_array);

                $table_log='pms_log_entries';

                $log_entry= array('Form_name'=>"update users password", 'Data_entry'=>$date_insert_json, 'status'=>1, 'Date'=>$date_entry, 'Time'=>$time_entry, 'Location_Id'=>$ip, 'browser_information'=>$date_nrowser_json);

                $result_log_entry = $this->user->common_insert($table_log,$log_entry);
                $this->session->set_flashdata('success_message', 'Password successfully Change');
                // After that you need to used r
                redirect('user-procurement-home');

            }else{
                $this->session->set_flashdata('error_message', 'Something went wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-procurement-home');    
            }
            // Array ( [user_id_slno] => EBq6D9dEDSNHWJwsfBpyxu~Tv.jXe0EAizvq1LuUHVwc58gP.wknHjWDLrJllQ8ndtLCoeV6HFl.dn9hqLQ8xg-- [token_id] => 6 [password] => abcd!2345aA ) 
            # code...
        }
        public function procurement_change_password_save($value=''){
           $email_id=$this->session->userdata('procurement_email_id');
            if(empty($email_id)){
                
                redirect('procurement-logout-by-pass');
            }
            $c_password=$this->input->post('c_password');
            $new_password=$this->input->post('new_password');
            $data_check=array('email_id'=>$email_id,'password_hash'=>md5($c_password),'Status'=>1);
            $query_check=$this->db->get_where('master_admin',$data_check);
            if($query_check->num_rows()==1){
                $data_id_update=array('email_id'=>$email_id);
                $data_update_information=array('password_hash'=>md5($new_password),'Password'=>$new_password);
                $query_check=$this->db->update('master_admin',$data_update_information,$data_id_update);

                $this->session->set_flashdata('success_message',' password changed successfull');
                // After that you need to used redirect home
                redirect('user-procurement-home');
            }else{
                $this->session->set_flashdata('error_message',' Something went wrong');
                // After that you need to used redirect home
                redirect('user-procurement-home');

            }
            # code...
        }




       public function proc_pr_remark_history($pr_no='',$slno='',$job_code='',$id=''){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
       
        $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id);
        $this->load->view('template/template_header',$data);
        $this->load->view('procurement_user/template/template_top_head');
        $this->load->view('procurement_user/template/template_side_bar',$data);
        $this->load->view('procurement_user/remark_history/remark_index_detail',$data);
        $this->load->view('template/template_footer',$data);
    
       }

       public function proc_pr_orginal_project_pr($value=''){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>'Project Detail Information','script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

            $this->load->view('template/template_header',$data);
            $this->load->view('procurement_user/template/template_top_head');
            $this->load->view('procurement_user/template/template_side_bar',$data);
            $this->load->view('procurement_user/pr_schedule_m/Pr_schudele_index',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }



}
