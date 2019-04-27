<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerusernew extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Loading my model which will use
        $this->load->model('user_model', 'user');
        $this->load->model('approver_model', 'approver_user');
        $this->load->model('design_model', 'design_user');
        $this->load->model('procurement_model', 'procurement_user');
        $this->load->model('buyer_model','buyer_user');
        $this->load->model('technicalevalutor_model','tech_eva_db');
        // imedate database link
        $this->load->database();

            //Load session library
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->library('encryption');
        $this->load->library('form_validation');
        
        $this->load->library('email');
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->load->library('cart');
        $this->load->helper('string');
        $this->load->library('cronfile');
        $this->cronfile->index_event();
        $this->load->helper('ckeditor_helper');
        $this->load->library('CKEditor');
        $this->load->library('CKFinder');
        $this->ckeditor->basePath = base_url().'asserts/ckeditor/';
 //          //Ckeditor's configuration
        $this->data['ckeditor'] = array(
            'id' => 'content',//ID of the textarea that will be replaced
            'path' => 'js/ckeditor', //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "550px", //Setting a custom width
                'height' => '100px', //Setting a custom height 
            ), //Replacing styles from the "Styles tool"
            'styles' => array( 
                //Creating a new style named "style 1"
                'style 1' => array (
                    'name' => 'Blue Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Blue',
                        'font-weight' => 'bold'
                    )
                ),  //Creating a new style named "style 2"
                'style 2' => array (
                    'name' => 'Red Title',
                    'element' => 'h2',
                    'styles' => array(
                        'color' => 'Red',
                        'font-weight' => 'bold',
                        'text-decoration' => 'underline'
                    )
                ) 
            )
        ); 
        $this->data['ckeditor_2'] = array( 
            //ID of the textarea that will be replaced
            'id' => 'content_2',
            'path' => 'js/ckeditor', 
                       //Optionnal values
            'config' => array(
                'width' => "100%", //Setting a custom width
                'height' => '100px', //Setting a custom height
                'toolbar' => array( //Setting a custom toolbar
                    array('Bold', 'Italic'),
                    array('Underline', 'Strike', 'FontSize'),
                    array('Smiley'),
                     '/'
                )
            ), 
                        //Replacing styles from the "Styles tool"
            'styles' => array( 
                //Creating a new style named "style 1"
                'style 3' => array (
                    'name' => 'Green Title',
                    'element' => 'h3',
                    'styles' => array(
                                'color' => 'Green',
                                'font-weight' => 'bold'
                    )
                ) 
            )
        ); 
        $this->ckfinder->SetupCKEditor($this->ckeditor,base_url('asserts/ckfinder/'));  

    }
     public function buyer_pr_receive($value=''){
        $this->load->library('cart');
        $this->cart->destroy();
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
          $data=array('title' =>"List of bid completed by commerical evulation ",'script_js'=>$scripts,'menu_status'=>'10','sub_menu'=>'10','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
          $this->load->view('template/template_header',$data);
          $this->load->view('buyer_user/template/template_top_head');
          $this->load->view('buyer_user/template/template_side_bar',$data);
          $this->load->view('buyer_user/buyer_pr_schedule/receiver_pr_schedule');
          $this->load->view('template/template_footer',$data);

        # code...
    }
   
     public function buyer_user_create_new_pr($value='',$value1='',$value2='',$value3=''){

        $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>  <script type="text/javascript" src="'.base_url().'asserts/ckeditor/ckeditor.js"></script><script type="text/javascript" src="'.base_url().'asserts/ckfinder/ckfinder.js"></script>';
        $data=array('title' =>"List of bid completed by commerical evulation ",'script_js'=>$scripts,'menu_status'=>'10','sub_menu'=>'10','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$value,'Pr_no_slno'=>$value1,'Project_slno'=>$value2,'redirect'=>$value3);
        $this->load->view('template/template_header',$data);
        $this->load->view('buyer_user/template/template_top_head');
        $this->load->view('buyer_user/template/template_side_bar',$data);
        if($value3==2){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_comm',$data);
        }else if($value3==1){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_tech_comm',$data);
        } 
        $this->load->view('template/template_footer',$data);

        # code...
    }
    public function buyer_user_create_new_pr_tech_comm($value='',$value1='',$value2='',$value3=''){

        $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>  <script type="text/javascript" src="'.base_url().'asserts/ckeditor/ckeditor.js"></script><script type="text/javascript" src="'.base_url().'asserts/ckfinder/ckfinder.js"></script>';
        $data=array('title' =>"List of bid completed by commerical evulation ",'script_js'=>$scripts,'menu_status'=>'10','sub_menu'=>'10','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$value,'Pr_no_slno'=>$value1,'Project_slno'=>$value2,'redirect'=>$value3);
        $this->load->view('template/template_header',$data);
        $this->load->view('buyer_user/template/template_top_head');
        $this->load->view('buyer_user/template/template_side_bar',$data);
        if($value3==2){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_comm',$data);
        }else if($value3==1){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_tech_comm',$data);
        } 
        $this->load->view('template/template_footer',$data);

    }
    public function Buyer_add_new_pr_tech_comm_save($value=''){  

        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        $pr_no_type=$this->input->post('pr_no_type');
        $edit_type=$this->input->post('edit_type');
        $tech_evalution=$this->input->post('tech_evalution');
        $tech_evalution_commer=$this->input->post('tech_evalution_commer');
        $tech_name_ids=$this->input->post('tech_name_ids');
        $required_date=$this->input->post('required_date');
        $approver_id=$this->input->post('approver_id');
        $Procurement=$this->input->post('Procurement');
        $buyer_id=$this->input->post('buyer_id');
        $mr_date_of_creation=$this->input->post('mr_date_of_creation');
        $Technical_ev=$this->input->post('Technical_ev');
        $Commerical=$this->input->post('Commerical');

        $date_create=$this->input->post('date_create');
        $bid_ref_no=$this->input->post('bid_ref_no');
        $bid_method=$this->input->post('bid_method');  // bid method  close simple rank
        $date_publish=$this->input->post('date_publish');
        $bid_Id=$this->input->post('bid_Id');
        $date_closing=$this->input->post('date_closing');
        $bid_title=$this->input->post('bid_title');
        $bid_period_work=$this->input->post('bid_period_work');
        $bid_work_description=$this->input->post('bid_work_description');
        $bid_location_work=$this->input->post('bid_location_work');
        $date_start_bid=$this->input->post('date_start_bid');
        $date_clearfication_bid=$this->input->post('date_clearfication_bid');
        $date_closed_bid=$this->input->post('date_closed_bid');
        $bid_detail_description=$this->input->post('bid_detail_description');
        $terms_condition=$this->input->post('terms_condition');
        $submission=$this->input->post('submission');

          $Ace_value_detail=$this->input->post('Ace_value_detail');

        
        
        $commercial_resubmit_status=$this->input->post('commercial_resubmit_status');
        // $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        if($commercial_resubmit_status==1){
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count')+1;
        }else{
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        }

        $edit_type_bid=$this->input->post('edit_type_bid')+1;

         $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){                
            redirect('buy-logout-by-pass');
        }

          if(empty($this->cart->contents())){
             $this->session->set_flashdata('error_message',  'Please choose atleast Vendor complete process of saving');
            redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
          }


        // technical bid information
            $data_bid_master = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing);
            $query_bid_master=$this->db->insert('master_bid_m',$data_bid_master);

            $insert_id = $this->db->insert_id();
        // commerical bid information
            $data_bid_master_comm = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing,'commercial_resubmit_count'=>$commercial_resubmit_count,'Ace_value_detail'=>$Ace_value_detail);
            $query_bid_master_comm=$this->db->insert('master_bid_Com_m',$data_bid_master_comm);

            $insert_id_comm = $this->db->insert_id();
         if($query_bid_master){ 
            // technical bid 
            // 
            $item_mateial_slno=$this->input->post('item_mateial_slno');
            $unit_price=$this->input->post('unit_price');
            
                foreach ($item_mateial_slno as $key_id_msterial => $value_id_msterial) {

                    $ids_material=$value_id_msterial;
                    $value_array = array('slno_item_mr' =>$ids_material);
                    $query_material=$this->db->get_where('master_mr_material_item_m',$value_array );

                    $reult_query_material=$query_material->result();
                    $value_olny=$reult_query_material[0];
                    $price=$unit_price[$ids_material];
                    $total_price=$price*$value_olny->material_quantity;

                    $date_store = array( 'mr_no_item'=>$value_olny->mr_no_item, 'slno_mr_id'=>$value_olny->slno_mr_id, 'material_item_id'=>$value_olny->material_item_id, 'material_name'=>$value_olny->material_name, 'material_quantity'=>$value_olny->material_quantity, 'material_unit'=>$value_olny->material_unit, 'material_id'=>$value_olny->material_id, 'edit_id'=>$value_olny->edit_id, 'parameter_tech'=>$value_olny->parameter_tech, 'Category_material'=>$value_olny->Category_material, 'unit_price'=>$price, 'total_price'=>$total_price, 'Resubmission_count_id'=>$commercial_resubmit_count, 'buyer_id'=>$email_id,'commercial_edit_id'=>$edit_type_bid, 'master_itme_slno_id'=>$value_olny->slno_item_mr,'master_bid_id_comm'=>$insert_id_comm);
                     $query_bid_master_item=$this->db->insert('master_mr_material_item_comm_m',$date_store);
                   
                }
                 // technical bid  master_bid_details_m
                $data_title = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_title_master=$this->db->insert('master_bid_details_m',$data_title);

                  // Commerical bid  master_bid_Com_details_m
                  $data_title_comm = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id_comm,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_title_master_comm=$this->db->insert('master_bid_Com_details_m',$data_title_comm);

               // technical master_bid_date_details_m
               
                $data_bid_date = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_bid_date_master=$this->db->insert('master_bid_date_details_m',$data_bid_date);

                 // Commerical master_bid_date_details_m
                 
                  $data_bid_date_comm = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id_comm,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_bid_date_master_comm=$this->db->insert('master_bid_Com_date_details_m',$data_bid_date_comm);

               // technical bid master_bid_technicalevaluation_m

                 $bid_technical = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'Technical_id_person'=>$Technical_ev, 'master_bid_id'=>$insert_id,'edit_id_bid'=>$edit_type_bid);
                $query_technical_master=$this->db->insert('master_bid_technicalevaluation_m',$bid_technical);

                //COMMERCIAL BID master_bid_Com_evaluation_m

                  $bid_technical_comm = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'commerical_id_person'=>$Commerical, 'master_bid_id'=>$insert_id_comm,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_technical_master_comm =$this->db->insert('master_bid_Com_evaluation_m',$bid_technical_comm);
                 $file_stored_name=date('Y-m-d')."-".$_FILES["terms_condition_file"]["name"];
                if(move_uploaded_file($_FILES["terms_condition_file"]["tmp_name"], 'upload_files/term_condition/' . $file_stored_name)){
                    $date_file = array('file_name' =>$file_stored_name , 'pr_no'=>$pr_no,'technical_bid_id'=>$insert_id,'commercial_bid_id'=>$insert_id_comm,'bid_reference'=>$bid_ref_no,'bid_reference_id'=>$bid_Id,'re_count_bid_com'=>$commercial_resubmit_count,'bid_type'=>$bid_method);
                    $query_files=$this->db->insert('master_technical_commercial_terms_conditions',$date_file);

                }
           
            $data_email_ids = array();
            $data_email_ids_comm = array();
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
            $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
            $results_id=$query->result();
            $key_vendor=$results_id[0]->Vendor_email_id;
            $data_email_ids[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);
            $data_email_ids_comm[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);


             // VENDOR TECHNICAL  INSERT

             $vendor_infom = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type );
            $query_vendor_inform_master=$this->db->insert('master_bid_vendor_m',$vendor_infom);

              // VENDOR COMMERCIAL INSERT

             $vendor_infom_comm = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id_comm,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type,'commercial_resubmit_count'=>$commercial_resubmit_count );
            $query_vendor_inform_master_COMM=$this->db->insert('master_bid_Com_vendor_m',$vendor_infom_comm);
               


        }

        $infom_tc = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition);
        $query_tec=$this->db->insert('master_bid_t_c_tech_m',$infom_tc);

        $infom_tc_comm = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition,'commercial_resubmit_count'=>$commercial_resubmit_count );
        $query_tec_COMM=$this->db->insert('master_bid_t_c_comm_m',$infom_tc_comm);

        $result_procuremnet=$this->buyer_user->get_technical_commerial_user_list($Technical_ev,9);
        $proc_details=$result_procuremnet['user_tech_comm'][0];
        $tech_email_id=$proc_details->email_id;
        $Procurement_name=$proc_details->Username;

        $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($Commerical,10);
        $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
        $tech_email_id_comm=$proc_details_comm->email_id;
        $commerical_name=$proc_details_comm->Username;
                    
        if($submission=='Save'){

            $date_processing = array('buyer_user_status' => 4,'buyer_date_comm'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$Technical_ev,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>3,'techno_commercial_status'=>5,'tech_bid'=>$insert_id);
            $process_id = array('pr_no' => $pr_no );
            $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

            $date_processing_comm = array('buyer_user_status' => 7,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id_comm, 'commercial_user_slno'=>$Commerical,'commercial_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_complete_status'=>3,'techno_commercial_status'=>6,'comm_bid'=>$insert_id_comm);
            $process_id_comm = array('pr_no' => $pr_no );
            $query_process_COMM=$this->db->update('master_pr_process_detail',$date_processing_comm,$process_id_comm);

            $this->session->set_flashdata('success_message', ' Successfully Bid Is Drafted ');
            redirect('user-buyer-home');
            exit();

        }else if($submission=='Send'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                  $date_date_status_vendor = array('status' => 1,'status_active'=>1);
                $this->db->update('master_bid_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_technicalevaluation_m',$update_status_master,$data_update_id);


                $this->db->update('master_bid_vendor_m',$date_date_status_vendor,$data_update_id);
                // print_r($data_email_ids);
                // master_vendor_notifications
                foreach ($data_email_ids as $key_id_vendor => $value_vendors) {
               
                    $vendor_id_bid=$value_vendors['Slno_vendor'];
                    $vendor_id=$value_vendors['vendor_email'];
                    $dates=date('d-m-Y');
$message= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Technical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
              
                    $data_notification = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message);
                    $bid_notification=$this->db->insert('master_vendor_notifications',$data_notification);
                  
                }
                $data_master_bid_comm = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master_comm = array('status_bid'=>'1');
                $this->db->update('master_bid_Com_m',$update_status_master_comm,$data_master_bid_comm);
                $data_update_id_comm = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                $date_date_status_vendor_comm = array('status' => 1,'status_active'=>1);

                $this->db->update('master_bid_Com_date_details_m',$date_date_status,$data_update_id_comm);
                $this->db->update('master_bid_Com_evaluation_m',$update_status_master_comm,$data_update_id_comm);

                $this->db->update('master_bid_Com_vendor_m',$date_date_status_vendor_comm,$data_update_id_comm);
                foreach ($data_email_ids_comm as $key_id_vendor => $value_vendors_comm) {

              
                    $vendor_id_bid=$value_vendors_comm['Slno_vendor'];
                    $vendor_id=$value_vendors_comm['vendor_email'];
                    $dates=date('d-m-Y');
$message_COMM= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Commerical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
              
                    $data_notification_comm = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message_COMM);
                    $bid_notification_COMM=$this->db->insert('master_vendor_notifications',$data_notification_comm);
                   
                }

                $date_processing = array('buyer_user_status' => 3,'buyer_date_tech'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$Technical_ev,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>2,'techno_commercial_status'=>3,'tech_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

                $date_processing_comm = array('buyer_user_status' => 6,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id_comm, 'commercial_user_slno'=>$Commerical,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_complete_status'=>2,'techno_commercial_status'=>2,'comm_bid'=>$insert_id_comm,'commercial_user_status'=>2);
                $process_id_comm = array('pr_no' => $pr_no );
                $query_process_COMM=$this->db->update('master_pr_process_detail',$date_processing_comm,$process_id_comm);

                $this->session->set_flashdata('success_message', ' Successfully Bid Is Published ');
                redirect('user-buyer-home');
                exit();
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
            }

        }else{
             $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
        }  
       
    }
    public function Buyer_add_new_pr_tech_comm_save_arr(){
        $Commerical=$this->input->post('Commerical');

        // print_r($this->input->post());
        // foreach($Commerical as $key_id_comm_user=>$value_comm_id):
        //     $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($value_comm_id,10);
        //     $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
        //     $tech_email_id_comm=$proc_details_comm->email_id;
        //     $comm_email[]=$tech_email_id_comm;
        //     $commerical_name=$proc_details_comm->Username;
        // endforeach;
        // echo $array_comm_email=serialize($comm_email);
        // echo $array_comm_slno=serialize($Commerical);
        // print_r(unserialize($array_comm_email));
        // exit;
        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        $pr_no_type=$this->input->post('pr_no_type');
        $edit_type=$this->input->post('edit_type');
        $tech_evalution=$this->input->post('tech_evalution');
        $tech_evalution_commer=$this->input->post('tech_evalution_commer');
        $tech_name_ids=$this->input->post('tech_name_ids');
        $required_date=$this->input->post('required_date');
        $approver_id=$this->input->post('approver_id');
        $Procurement=$this->input->post('Procurement');
        $buyer_id=$this->input->post('buyer_id');
        $mr_date_of_creation=$this->input->post('mr_date_of_creation');
        $Technical_ev=$this->input->post('Technical_ev');
        
        $date_create=$this->input->post('date_create');
        $bid_ref_no=$this->input->post('bid_ref_no');
        $bid_method=$this->input->post('bid_method');  // bid method  close simple rank
        $date_publish=$this->input->post('date_publish');
        $bid_Id=$this->input->post('bid_Id');
        $date_closing=$this->input->post('date_closing');
        $bid_title=$this->input->post('bid_title');
        $bid_period_work=$this->input->post('bid_period_work');
        $bid_work_description=$this->input->post('bid_work_description');
        $bid_location_work=$this->input->post('bid_location_work');
        $date_start_bid=$this->input->post('date_start_bid');
        $date_clearfication_bid=$this->input->post('date_clearfication_bid');
        $date_closed_bid=$this->input->post('date_closed_bid');
        $bid_detail_description=$this->input->post('bid_detail_description');
        $terms_condition=$this->input->post('terms_condition');
        $submission=$this->input->post('submission');

          $Ace_value_detail=$this->input->post('Ace_value_detail');

        
        
        $commercial_resubmit_status=$this->input->post('commercial_resubmit_status');
        // $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        if($commercial_resubmit_status==1){
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count')+1;
        }else{
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        }

        $edit_type_bid=$this->input->post('edit_type_bid')+1;

         $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){                
            redirect('buy-logout-by-pass');
        }

          if(empty($this->cart->contents())){
             $this->session->set_flashdata('error_message',  'Please choose atleast Vendor complete process of saving');
            redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
          }


        // technical bid information
            $data_bid_master = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing);
            $query_bid_master=$this->db->insert('master_bid_m',$data_bid_master);

            $insert_id = $this->db->insert_id();
        // commerical bid information
            $data_bid_master_comm = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing,'commercial_resubmit_count'=>$commercial_resubmit_count,'Ace_value_detail'=>$Ace_value_detail);
            $query_bid_master_comm=$this->db->insert('master_bid_Com_m',$data_bid_master_comm);

            $insert_id_comm = $this->db->insert_id();
         if($query_bid_master){ 
            // technical bid 
            // 
            $item_mateial_slno=$this->input->post('item_mateial_slno');
            $unit_price=$this->input->post('unit_price');
            
                foreach ($item_mateial_slno as $key_id_msterial => $value_id_msterial) {

                    $ids_material=$value_id_msterial;
                    $value_array = array('slno_item_mr' =>$ids_material);
                    $query_material=$this->db->get_where('master_mr_material_item_m',$value_array );

                    $reult_query_material=$query_material->result();
                    $value_olny=$reult_query_material[0];
                    $price=$unit_price[$ids_material];
                    $total_price=$price*$value_olny->material_quantity;

                    $date_store = array( 'mr_no_item'=>$value_olny->mr_no_item, 'slno_mr_id'=>$value_olny->slno_mr_id, 'material_item_id'=>$value_olny->material_item_id, 'material_name'=>$value_olny->material_name, 'material_quantity'=>$value_olny->material_quantity, 'material_unit'=>$value_olny->material_unit, 'material_id'=>$value_olny->material_id, 'edit_id'=>$value_olny->edit_id, 'parameter_tech'=>$value_olny->parameter_tech, 'Category_material'=>$value_olny->Category_material, 'unit_price'=>$price, 'total_price'=>$total_price, 'Resubmission_count_id'=>$commercial_resubmit_count, 'buyer_id'=>$email_id,'commercial_edit_id'=>$edit_type_bid, 'master_itme_slno_id'=>$value_olny->slno_item_mr,'master_bid_id_comm'=>$insert_id_comm);
                     $query_bid_master_item=$this->db->insert('master_mr_material_item_comm_m',$date_store);
                   
                }
                 // technical bid  master_bid_details_m
                $data_title = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_title_master=$this->db->insert('master_bid_details_m',$data_title);

                  // Commerical bid  master_bid_Com_details_m
                  $data_title_comm = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id_comm,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_title_master_comm=$this->db->insert('master_bid_Com_details_m',$data_title_comm);

               // technical master_bid_date_details_m
               
                $data_bid_date = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_bid_date_master=$this->db->insert('master_bid_date_details_m',$data_bid_date);

                 // Commerical master_bid_date_details_m
                 
                  $data_bid_date_comm = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id_comm,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_bid_date_master_comm=$this->db->insert('master_bid_Com_date_details_m',$data_bid_date_comm);

               // technical bid master_bid_technicalevaluation_m
               foreach($Technical_ev as $key_id_tech_user=>$value_tech_id):
                $tech_user_id=$value_tech_id;
                 $bid_technical = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'Technical_id_person'=>$value_tech_id, 'master_bid_id'=>$insert_id,'edit_id_bid'=>$edit_type_bid);
                $query_technical_master=$this->db->insert('master_bid_technicalevaluation_m',$bid_technical);
               endforeach;

                //COMMERCIAL BID master_bid_Com_evaluation_m
                foreach($Commerical as $key_id_comm_user=>$value_comm_id):
                    $commercial_user_id=$value_comm_id;
                    $bid_technical_comm = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'commerical_id_person'=>$value_comm_id, 'master_bid_id'=>$insert_id_comm,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                    $query_technical_master_comm =$this->db->insert('master_bid_Com_evaluation_m',$bid_technical_comm);
                endforeach;

                 $file_stored_name=date('Y-m-d')."-".$_FILES["terms_condition_file"]["name"];
                if(move_uploaded_file($_FILES["terms_condition_file"]["tmp_name"], 'upload_files/term_condition/' . $file_stored_name)){
                    $date_file = array('file_name' =>$file_stored_name , 'pr_no'=>$pr_no,'technical_bid_id'=>$insert_id,'commercial_bid_id'=>$insert_id_comm,'bid_reference'=>$bid_ref_no,'bid_reference_id'=>$bid_Id,'re_count_bid_com'=>$commercial_resubmit_count,'bid_type'=>$bid_method);
                    $query_files=$this->db->insert('master_technical_commercial_terms_conditions',$date_file);

                }
           
            $data_email_ids = array();
            $data_email_ids_comm = array();
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
            $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
            $results_id=$query->result();
            $key_vendor=$results_id[0]->Vendor_email_id;
            $data_email_ids[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);
            $data_email_ids_comm[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);


             // VENDOR TECHNICAL  INSERT

             $vendor_infom = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type );
            $query_vendor_inform_master=$this->db->insert('master_bid_vendor_m',$vendor_infom);

              // VENDOR COMMERCIAL INSERT

             $vendor_infom_comm = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id_comm,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type,'commercial_resubmit_count'=>$commercial_resubmit_count );
            $query_vendor_inform_master_COMM=$this->db->insert('master_bid_Com_vendor_m',$vendor_infom_comm);
               


        }

        $infom_tc = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition);
        $query_tec=$this->db->insert('master_bid_t_c_tech_m',$infom_tc);

        $infom_tc_comm = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition,'commercial_resubmit_count'=>$commercial_resubmit_count );
        $query_tec_COMM=$this->db->insert('master_bid_t_c_comm_m',$infom_tc_comm);

        $result_procuremnet=$this->buyer_user->get_technical_commerial_user_list($tech_user_id,9);
        $proc_details=$result_procuremnet['user_tech_comm'][0];
        $tech_email_id=$proc_details->email_id;
        $Procurement_name=$proc_details->Username;

        $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($commercial_user_id,10);
        $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
        $tech_email_id_comm=$proc_details_comm->email_id;
        $commerical_name=$proc_details_comm->Username;

        foreach($Technical_ev as $key_id_tech_user=>$value_tech_id):
            // $tech_user_id=$value_tech_id;
            $result_tech_comm=$this->buyer_user->get_technical_commerial_user_list($value_tech_id,9);
            $tech_details_comm=$result_tech_comm['user_tech_comm'][0];
            $tech_email_id_tech=$tech_details_comm->email_id;
            $tech_email[]=$tech_email_id_tech;
           
        endforeach;
        $array_tech_email=serialize($tech_email);
        $array_tech_slno=serialize($Technical_ev);

        // array
        foreach($Commerical as $key_id_comm_user=>$value_comm_id):
            $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($value_comm_id,10);
            $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
            $tech_email_id_comms=$proc_details_comm->email_id;
            $comm_email[]=$tech_email_id_comms;
            $commerical_name=$proc_details_comm->Username;
        endforeach;
        $array_comm_email=serialize($comm_email);
        $array_comm_slno=serialize($Commerical);
                    
        if($submission=='Save'){

            $date_processing = array('tech_user_id_array'=>$array_tech_email,'tech_user_slno_array'=>$array_tech_slno,'buyer_user_status' => 4,'buyer_date_comm'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$tech_user_id,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>3,'techno_commercial_status'=>5,'tech_bid'=>$insert_id);
            $process_id = array('pr_no' => $pr_no );
            $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

            $date_processing_comm = array('commercial_user_id_array'=>$array_comm_email,'commercial_user_slno_array'=>$array_comm_slno,'buyer_user_status' => 7,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id_comm, 'commercial_user_slno'=>$commercial_user_id,'commercial_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_complete_status'=>3,'techno_commercial_status'=>6,'comm_bid'=>$insert_id_comm);
            $process_id_comm = array('pr_no' => $pr_no );
            $query_process_COMM=$this->db->update('master_pr_process_detail',$date_processing_comm,$process_id_comm);

            $this->session->set_flashdata('success_message', ' Successfully Bid Is Drafted ');
            redirect('user-buyer-home');
            exit();

        }else if($submission=='Send'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                  $date_date_status_vendor = array('status' => 1,'status_active'=>1);
                $this->db->update('master_bid_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_technicalevaluation_m',$update_status_master,$data_update_id);


                $this->db->update('master_bid_vendor_m',$date_date_status_vendor,$data_update_id);
                // print_r($data_email_ids);
                // master_vendor_notifications
                foreach ($data_email_ids as $key_id_vendor => $value_vendors) {
               
                    $vendor_id_bid=$value_vendors['Slno_vendor'];
                    $vendor_id=$value_vendors['vendor_email'];
                    $dates=date('d-m-Y');
$message= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Technical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
              
                    $data_notification = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message);
                    $bid_notification=$this->db->insert('master_vendor_notifications',$data_notification);
                  
                }
                $data_master_bid_comm = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master_comm = array('status_bid'=>'1');
                $this->db->update('master_bid_Com_m',$update_status_master_comm,$data_master_bid_comm);
                $data_update_id_comm = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                $date_date_status_vendor_comm = array('status' => 1,'status_active'=>1);

                $this->db->update('master_bid_Com_date_details_m',$date_date_status,$data_update_id_comm);
                $this->db->update('master_bid_Com_evaluation_m',$update_status_master_comm,$data_update_id_comm);

                $this->db->update('master_bid_Com_vendor_m',$date_date_status_vendor_comm,$data_update_id_comm);
                foreach ($data_email_ids_comm as $key_id_vendor => $value_vendors_comm) {

              
                    $vendor_id_bid=$value_vendors_comm['Slno_vendor'];
                    $vendor_id=$value_vendors_comm['vendor_email'];
                    $dates=date('d-m-Y');
$message_COMM= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Commerical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
              
                    $data_notification_comm = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message_COMM);
                    $bid_notification_COMM=$this->db->insert('master_vendor_notifications',$data_notification_comm);
                   
                }

                $date_processing = array('tech_user_id_array'=>$array_tech_email,'tech_user_slno_array'=>$array_tech_slno,'buyer_user_status' => 3,'buyer_date_tech'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$tech_user_id,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>2,'techno_commercial_status'=>3,'tech_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

            // $commerical_name=$proc_details_comm->Username;
                $date_processing_comm = array('commercial_user_id_array'=>$array_comm_email,'commercial_user_slno_array'=>$array_comm_slno,'buyer_user_status' => 6,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id_comm, 'commercial_user_slno'=>$commercial_user_id,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_complete_status'=>2,'techno_commercial_status'=>2,'comm_bid'=>$insert_id_comm,'commercial_user_status'=>2);
                $process_id_comm = array('pr_no' => $pr_no );
                $query_process_COMM=$this->db->update('master_pr_process_detail',$date_processing_comm,$process_id_comm);

                $this->session->set_flashdata('success_message', ' Successfully Bid Is Published ');
                redirect('user-buyer-home');
                exit();
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
            }

        }else{
             $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
        }
    }
    public function buyer_vendor_search_informations($value=''){
        // print_r($this->input->post());
        // Array ( [employee_name] => ven ) 
        $vender_search=$this->input->post('employee_name');
        if(!empty($vender_search)){
            $this->db->like('Organisation_name',$vender_search);
            $query=$this->db->get('master_vendor_detail');
           
            $num_rows=$query->num_rows();
            if($num_rows==0){
                ?>
                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                    <thead>
                        <tr>
                            <th><strong>Organisation Name </strong></th>
                            <th><strong>Vendor View</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"> No Vendor Name is avaliable</td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }else{
                   
                   if(empty($this->cart->contents())){

                    // echo "string";
                   ?>
                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                    <thead>
                        <tr>
                            <th><strong>Organisation Name </strong></th>
                            <th><strong>Vendor Information</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                           foreach ($query->result() as $key_id_vender => $value_id_vender ):

                           ?>
                                <tr>
                                    <td><?=$value_id_vender->Organisation_name?></td>
                                    <td><p>Vendor Name :    <?=$value_id_vender->Vendor_name?></p>
                                        <p>Organisation Name : <?=$value_id_vender->Organisation_name?></p>
                                        <p>Vendor Mobile : <?=$value_id_vender->Mobile_no?></p>
                                        <p>Vendor Address : <?=$value_id_vender->Organisation_address?></p>
                                    </td>
                                    <td><button type="button" class="add_cart btn btn-success btn-block" data-productid="<?php echo $value_id_vender->Slno_vendor;?>" data-productprice="<?php echo $value_id_vender->Organisation_name;?>">Add To Cart</button></td>
                                </tr>
                                <?php 
                                 
                            endforeach;
                                ?>
                            </tbody>
                        </table>
                        <?php

                         }else{
                            foreach ($this->cart->contents() as $items) {
                                $data_id[]=$items['id'];
                                // print_r($items);

                            }
                            // in_array($row->slno_master_item,$data_id)
                        ?>
                            <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                                <thead>
                                    <tr>
                                        <th><strong>Organisation Name </strong></th>
                                        <th><strong>Vendor Information</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        foreach ($query->result() as $key_id_vender => $value_id_vender ):
                                            if(in_array($value_id_vender->Slno_vendor,$data_id)){
                                                $str= <<<EOT
<button type="button" class="btn btn-info btn-block" > Vendor Added</button>
EOT;
                                            }else{
                                                $str = <<<EOT
<button type="button" class="add_cart btn btn-success btn-block" data-productid="{$value_id_vender->Slno_vendor}" data-productprice="{$value_id_vender->Organisation_name}">Add Vendor</button>
EOT;
                                            }
                                       ?>
                                            <tr>
                                                <td><?=$value_id_vender->Organisation_name?></td>
                                                <td><p>Vendor Name :    <?=$value_id_vender->Vendor_name?></p>
                                                    <p>Organisation Name : <?=$value_id_vender->Organisation_name?></p>
                                                    <p>Vendor Mobile : <?=$value_id_vender->Mobile_no?></p>
                                                    <p>Vendor Address : <?=$value_id_vender->Organisation_address?></p>
                                                </td>
                                                <td><?=$str?></td>
                                            </tr>
                                            <?php 
                                             
                                        endforeach;
                                      
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                           
                         }
                        

            }
        }
        # code...
    }
    public function buyer_vendor_cart($value=''){
        $this->cart->product_name_rules = "\&\.\:\-_\"\' a-z0-9";
        // print_r($this->input->post());
        // Array ( [product_id] => 2 [Organisation_names] => vendor pvt ltd ) 
        $product_id=$this->input->post('product_id');
        $Organisation_names=$this->input->post('Organisation_names');
        if(!empty($product_id)){
            $data = array(
                'id' =>$product_id, 
                'name' => $Organisation_names, 
                'qty'     => 1,
                'price'   => 1,
                
            );
            $cart[]= $this->cart->insert($data);
          // echo 1;
          // exit;
           $this->buyer_vendor_cart_show();
        }   
       
    }
   public  function buyer_vendor_cart_show(){ 
        $output = '';
        $no = 0;
        $output ='<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Slno</th>
                            <th>Organiastion Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>';
     
        foreach ($this->cart->contents() as $items) {
            $no++;

            $output .='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$items['name'].'</td>
                   
                    <td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
                </tr>
            ';
        }
      
        echo  $output;
    }
    public function buyer_vendor_cart_delete_cart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        $this->buyer_vendor_cart_show();
    }




    public function Buyer_add_new_pr_save(){


        // print_r($this->input->post());
        // 
        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        $pr_no_type=$this->input->post('pr_no_type');
        $edit_type=$this->input->post('edit_type');
        $tech_evalution=$this->input->post('tech_evalution');
        $tech_evalution_commer=$this->input->post('tech_evalution_commer');
        $tech_name_ids=$this->input->post('tech_name_ids');
        $required_date=$this->input->post('required_date');
        $approver_id=$this->input->post('approver_id');
        $Procurement=$this->input->post('Procurement');
        $buyer_id=$this->input->post('buyer_id');
        $mr_date_of_creation=$this->input->post('mr_date_of_creation');
        $Technical_ev=$this->input->post('Technical_ev');
        $date_create=$this->input->post('date_create');
        $bid_ref_no=$this->input->post('bid_ref_no');
        $bid_method=$this->input->post('bid_method');  // bid method  close simple rank
        $date_publish=$this->input->post('date_publish');
        $bid_Id=$this->input->post('bid_Id');
        $date_closing=$this->input->post('date_closing');
        $bid_title=$this->input->post('bid_title');
        $bid_period_work=$this->input->post('bid_period_work');
        $bid_work_description=$this->input->post('bid_work_description');
        $bid_location_work=$this->input->post('bid_location_work');
        $date_start_bid=$this->input->post('date_start_bid');
        $date_clearfication_bid=$this->input->post('date_clearfication_bid');
        $date_closed_bid=$this->input->post('date_closed_bid');
        $bid_detail_description=$this->input->post('bid_detail_description');
        $terms_condition=$this->input->post('terms_condition');
        $submission=$this->input->post('submission');

        $edit_type_bid=$this->input->post('edit_type_bid')+1;

         $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){
                
            redirect('buy-logout-by-pass');
        }

          if(empty($this->cart->contents())){
             $this->session->set_flashdata('error_message',  'Please choose atleast Vendor complete process of saving');
            redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
          }


      
            $data_bid_master = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing);
            $query_bid_master=$this->db->insert('master_bid_m',$data_bid_master);

            $insert_id = $this->db->insert_id();
         if($query_bid_master){         
                $data_title = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_title_master=$this->db->insert('master_bid_details_m',$data_title);
               
                $data_bid_date = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $query_bid_date_master=$this->db->insert('master_bid_date_details_m',$data_bid_date);

               

                 $bid_technical = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'Technical_id_person'=>$Technical_ev, 'master_bid_id'=>$insert_id,'edit_id_bid'=>$edit_type_bid);
                $query_technical_master=$this->db->insert('master_bid_technicalevaluation_m',$bid_technical);

           
            $data_email_ids = array();
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
             $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
             $results_id=$query->result();
             $key_vendor=$results_id[0]->Vendor_email_id;
             $data_email_ids[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);

                    $vendor_infom = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type );
                    $query_vendor_inform_master=$this->db->insert('master_bid_vendor_m',$vendor_infom);
               


        }
          $infom_tc = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition);
        // `pr_no`, `pr_slno`, `edit_id_bid`, `t_c_detail`

          $query_tec=$this->db->insert('master_bid_t_c_tech_m',$infom_tc);


             $result_procuremnet=$this->buyer_user->get_technical_commerial_user_list($Technical_ev,9);
                    $proc_details=$result_procuremnet['user_tech_comm'][0];
                    $tech_email_id=$proc_details->email_id;
                    $Procurement_name=$proc_details->Username;
                    
            if($submission=='Save'){

                $date_processing = array('buyer_user_status' => 4,'buyer_date_comm'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$Technical_ev,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>3,'techno_commercial_status'=>5,'tech_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);
                 $this->session->set_flashdata('success_message', ' Successfully Bid Is Drafted ');
                redirect('user-buyer-home');
                exit();

            }else if($submission=='Send'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                  $date_date_status_vendor = array('status' => 1,'status_active'=>1);
                $this->db->update('master_bid_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_technicalevaluation_m',$update_status_master,$data_update_id);

                $this->db->update('master_bid_vendor_m',$date_date_status_vendor,$data_update_id);
                // print_r($data_email_ids);
                // master_vendor_notifications
               foreach ($data_email_ids as $key_id_vendor => $value_vendors) {
                // print($key_id_vendor);
                // print_r($value_vendors);
                $vendor_id_bid=$value_vendors['Slno_vendor'];
                $vendor_id=$value_vendors['vendor_email'];
                $dates=date('d-m-Y');
$message= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Technical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
                // `vendor_id_bid`, `vendor_id`, `date_entry`, `date_update`, `view_status`, `message`
                    $data_notification = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message);
                    $bid_notification=$this->db->insert('master_vendor_notifications',$data_notification);
                   # code...
               }

                $date_processing = array('buyer_user_status' => 3,'buyer_date_tech'=>date('Y-m-d'),'technical_user_id'=>$tech_email_id, 'technical_user_slno'=>$Technical_ev,'technical_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'technical_edit_id'=>$edit_type_bid,'technical_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'technical_user_status'=>2,'techno_commercial_status'=>3,'tech_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

                $this->session->set_flashdata('success_message', ' Successfully Bid Is Published ');
                redirect('user-buyer-home');
                exit();
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
            }

        }else{
             $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
        }   
    }
    public function buyer_add_new_pr_comm_save_arr(){
        $Commerical=$this->input->post('Commerical');
        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        $pr_no_type=$this->input->post('pr_no_type');
        $edit_type=$this->input->post('edit_type');
        $tech_evalution=$this->input->post('tech_evalution');
        $tech_evalution_commer=$this->input->post('tech_evalution_commer');
        $tech_name_ids=$this->input->post('tech_name_ids');
        $required_date=$this->input->post('required_date');
        $approver_id=$this->input->post('approver_id');
        $Procurement=$this->input->post('Procurement');
        $buyer_id=$this->input->post('buyer_id');
        $mr_date_of_creation=$this->input->post('mr_date_of_creation');
        // $Technical_ev=$this->input->post('Technical_ev');
        $date_create=$this->input->post('date_create');
        $bid_ref_no=$this->input->post('bid_ref_no');
        $bid_method=$this->input->post('bid_method');  // bid method  close simple rank
        $date_publish=$this->input->post('date_publish');
        $bid_Id=$this->input->post('bid_Id');
        $date_closing=$this->input->post('date_closing');
        $bid_title=$this->input->post('bid_title');
        $bid_period_work=$this->input->post('bid_period_work');
        $bid_work_description=$this->input->post('bid_work_description');
        $bid_location_work=$this->input->post('bid_location_work');
        $date_start_bid=$this->input->post('date_start_bid');
        $date_clearfication_bid=$this->input->post('date_clearfication_bid');
        $date_closed_bid=$this->input->post('date_closed_bid');
        $bid_detail_description=$this->input->post('bid_detail_description');
        $terms_condition=$this->input->post('terms_condition');
        $submission=$this->input->post('submission');
        $Ace_value_detail=$this->input->post('Ace_value_detail');

        $commercial_resubmit_status=$this->input->post('commercial_resubmit_status');
        // $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        if($commercial_resubmit_status==1){
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count')+1;
        }else{
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        }

        $edit_type_bid=$this->input->post('commercial_edit_id')+1; // here edit of save file is send 

       

        $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){                
            redirect('buy-logout-by-pass');
        }

        // here is item information which neeto load to commerical table
         
        $item_mateial_slno=$this->input->post('item_mateial_slno');
        $unit_price=$this->input->post('unit_price');




          if(empty($this->cart->contents())){
             $this->session->set_flashdata('error_message',  'Please choose atleast Vendor complete process of saving');
            redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
          }

           $data_bid_master = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing,'commercial_resubmit_count'=>$commercial_resubmit_count,'Ace_value_detail'=>$Ace_value_detail);
            $query_bid_master=$this->db->insert('master_bid_Com_m',$data_bid_master);

            $insert_id_comm=$insert_id = $this->db->insert_id();
         if($query_bid_master){   

                foreach ($item_mateial_slno as $key_id_msterial => $value_id_msterial) {

                    $ids_material=$value_id_msterial;
                    $value_array = array('slno_item_mr' =>$ids_material);
                    $query_material=$this->db->get_where('master_mr_material_item_m',$value_array );

                    $reult_query_material=$query_material->result();
                    $value_olny=$reult_query_material[0];
                    $price=$unit_price[$ids_material];
                    $total_price=$price*$value_olny->material_quantity;

                    $date_store = array( 'mr_no_item'=>$value_olny->mr_no_item, 'slno_mr_id'=>$value_olny->slno_mr_id, 'material_item_id'=>$value_olny->material_item_id, 'material_name'=>$value_olny->material_name, 'material_quantity'=>$value_olny->material_quantity, 'material_unit'=>$value_olny->material_unit, 'material_id'=>$value_olny->material_id, 'edit_id'=>$value_olny->edit_id, 'parameter_tech'=>$value_olny->parameter_tech, 'Category_material'=>$value_olny->Category_material, 'unit_price'=>$price, 'total_price'=>$total_price, 'Resubmission_count_id'=>$commercial_resubmit_count, 'buyer_id'=>$email_id,'commercial_edit_id'=>$edit_type_bid, 'master_itme_slno_id'=>$value_olny->slno_item_mr,'master_bid_id_comm'=>$insert_id);
                     $query_bid_master_item=$this->db->insert('master_mr_material_item_comm_m',$date_store);
                   
                }

                $data_title = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_title_master=$this->db->insert('master_bid_Com_details_m',$data_title);
               
                $data_bid_date = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_bid_date_master=$this->db->insert('master_bid_Com_date_details_m',$data_bid_date);

               
                foreach($Commerical as $key_id_comm_user=>$value_comm_id):
                    $commercial_user_id=$value_comm_id;
                 $bid_technical = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'commerical_id_person'=>$value_comm_id, 'master_bid_id'=>$insert_id,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_technical_master=$this->db->insert('master_bid_Com_evaluation_m',$bid_technical);
                endforeach;
                 $file_stored_name=date('Y-m-d')."-".$_FILES["terms_condition_file"]["name"];
                if(move_uploaded_file($_FILES["terms_condition_file"]["tmp_name"], 'upload_files/term_condition/' . $file_stored_name)){
                    $date_file = array('file_name' =>$file_stored_name , 'pr_no'=>$pr_no,'commercial_bid_id'=>$insert_id,'bid_reference'=>$bid_ref_no,'bid_reference_id'=>$bid_Id,'re_count_bid_com'=>$commercial_resubmit_count,'bid_type'=>$bid_method);
                    $query_files=$this->db->insert('master_technical_commercial_terms_conditions',$date_file);

                }

           
            $data_email_ids = array();
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
             $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
             $results_id=$query->result();
             $key_vendor=$results_id[0]->Vendor_email_id;
             $data_email_ids[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);

                    $vendor_infom = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type,'commercial_resubmit_count'=>$commercial_resubmit_count );
                    $query_vendor_inform_master=$this->db->insert('master_bid_Com_vendor_m',$vendor_infom);
               


        }
          $infom_tc = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition,'commercial_resubmit_count'=>$commercial_resubmit_count );
        // `pr_no`, `pr_slno`, `edit_id_bid`, `t_c_detail`

          $query_tec=$this->db->insert('master_bid_t_c_comm_m',$infom_tc);


             $result_procuremnet=$this->buyer_user->get_technical_commerial_user_list($commercial_user_id,10);
                    $proc_details=$result_procuremnet['user_tech_comm'][0];
                    $tech_email_id=$proc_details->email_id;
                    $Procurement_name=$proc_details->Username;
                    
            if($submission=='Save'){

                $date_processing = array('buyer_user_status' => 7,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id, 'commercial_user_slno'=>$commercial_user_id,'commercial_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_complete_status'=>3,'techno_commercial_status'=>6,'comm_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);
                 $this->session->set_flashdata('success_message', ' Successfully Commerical Bid Is Drafted ');
                redirect('user-buyer-home');
                exit();

            }else if($submission=='Send'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_Com_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                $date_date_status_vendor = array('status' => 1,'status_active'=>1);

                $this->db->update('master_bid_Com_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_Com_evaluation_m',$update_status_master,$data_update_id);
                 $data_update_idss = array('master_bid_id'=>$insert_id);
                $this->db->update('master_bid_Com_vendor_m',$date_date_status_vendor,$data_update_idss);
                // print_r($data_email_ids);
                // master_vendor_notifications
               foreach ($data_email_ids as $key_id_vendor => $value_vendors) {

                // print($key_id_vendor);
                // print_r($value_vendors);
                $vendor_id_bid=$value_vendors['Slno_vendor'];
                $vendor_id=$value_vendors['vendor_email'];
                $dates=date('d-m-Y');
$message= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Commerical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
                // `vendor_id_bid`, `vendor_id`, `date_entry`, `date_update`, `view_status`, `message`
                    $data_notification = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message);
                    $bid_notification=$this->db->insert('master_vendor_notifications',$data_notification);
                   # code...
               }
                $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($commercial_user_id,10);
                $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
                $tech_email_id_comm=$proc_details_comm->email_id;
                $commerical_name=$proc_details_comm->Username;

                // array
                foreach($Commerical as $key_id_comm_user=>$value_comm_id):
                    $result_procuremnet_comm=$this->buyer_user->get_technical_commerial_user_list($value_comm_id,10);
                    $proc_details_comm=$result_procuremnet_comm['user_tech_comm'][0];
                    $tech_email_id_comms=$proc_details_comm->email_id;
                    $comm_email[]=$tech_email_id_comms;
                    $commerical_name=$proc_details_comm->Username;
                endforeach;
                $array_comm_email=serialize($comm_email);
                $array_comm_slno=serialize($Commerical);
                $date_processing_comm = array('commercial_user_id_array'=>$array_comm_email,'commercial_user_slno_array'=>$array_comm_slno,'buyer_user_status' => 6,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id_comm, 'commercial_user_slno'=>$commercial_user_id,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_complete_status'=>2,'techno_commercial_status'=>2,'comm_bid'=>$insert_id_comm,'commercial_user_status'=>2);

                // $date_processing = array('buyer_user_status' => 6,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id, 'commercial_user_slno'=>$Technical_ev,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_complete_status'=>2,'techno_commercial_status'=>2,'comm_bid'=>$insert_id,'commercial_user_status'=>2);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

                $this->session->set_flashdata('success_message', ' Successfully Commerical Bid Is Published ');
                redirect('user-buyer-home');
                exit();
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
            }

        }else{
             $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
        } 
        # code...
    }
    public function buyer_add_new_pr_comm_save($value=''){

        // print_r($this->input->post());


        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        $pr_no_type=$this->input->post('pr_no_type');
        $edit_type=$this->input->post('edit_type');
        $tech_evalution=$this->input->post('tech_evalution');
        $tech_evalution_commer=$this->input->post('tech_evalution_commer');
        $tech_name_ids=$this->input->post('tech_name_ids');
        $required_date=$this->input->post('required_date');
        $approver_id=$this->input->post('approver_id');
        $Procurement=$this->input->post('Procurement');
        $buyer_id=$this->input->post('buyer_id');
        $mr_date_of_creation=$this->input->post('mr_date_of_creation');
        $Technical_ev=$this->input->post('Technical_ev');
        $date_create=$this->input->post('date_create');
        $bid_ref_no=$this->input->post('bid_ref_no');
        $bid_method=$this->input->post('bid_method');  // bid method  close simple rank
        $date_publish=$this->input->post('date_publish');
        $bid_Id=$this->input->post('bid_Id');
        $date_closing=$this->input->post('date_closing');
        $bid_title=$this->input->post('bid_title');
        $bid_period_work=$this->input->post('bid_period_work');
        $bid_work_description=$this->input->post('bid_work_description');
        $bid_location_work=$this->input->post('bid_location_work');
        $date_start_bid=$this->input->post('date_start_bid');
        $date_clearfication_bid=$this->input->post('date_clearfication_bid');
        $date_closed_bid=$this->input->post('date_closed_bid');
        $bid_detail_description=$this->input->post('bid_detail_description');
        $terms_condition=$this->input->post('terms_condition');
        $submission=$this->input->post('submission');
        $Ace_value_detail=$this->input->post('Ace_value_detail');

        $commercial_resubmit_status=$this->input->post('commercial_resubmit_status');
        // $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        if($commercial_resubmit_status==1){
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count')+1;
        }else{
            $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        }

        $edit_type_bid=$this->input->post('commercial_edit_id')+1; // here edit of save file is send 

       

        $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){                
            redirect('buy-logout-by-pass');
        }

        // here is item information which neeto load to commerical table
         
        $item_mateial_slno=$this->input->post('item_mateial_slno');
        $unit_price=$this->input->post('unit_price');




          if(empty($this->cart->contents())){
             $this->session->set_flashdata('error_message',  'Please choose atleast Vendor complete process of saving');
            redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
          }

           $data_bid_master = array('pr_slno'=>$slno_pr, 'bid_date_entry'=>$date_create, 'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id,'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'status_bid'=>'4', 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type_bid,'bid_title'=>$bid_title,'bid_description'=>$bid_work_description,'bid_creator_id'=>$email_id,'date_publish'=>$date_publish,'date_closing'=>$date_closing,'commercial_resubmit_count'=>$commercial_resubmit_count,'Ace_value_detail'=>$Ace_value_detail);
            $query_bid_master=$this->db->insert('master_bid_Com_m',$data_bid_master);

            $insert_id = $this->db->insert_id();
         if($query_bid_master){   

                foreach ($item_mateial_slno as $key_id_msterial => $value_id_msterial) {

                    $ids_material=$value_id_msterial;
                    $value_array = array('slno_item_mr' =>$ids_material);
                    $query_material=$this->db->get_where('master_mr_material_item_m',$value_array );

                    $reult_query_material=$query_material->result();
                    $value_olny=$reult_query_material[0];
                    $price=$unit_price[$ids_material];
                    $total_price=$price*$value_olny->material_quantity;

                    $date_store = array( 'mr_no_item'=>$value_olny->mr_no_item, 'slno_mr_id'=>$value_olny->slno_mr_id, 'material_item_id'=>$value_olny->material_item_id, 'material_name'=>$value_olny->material_name, 'material_quantity'=>$value_olny->material_quantity, 'material_unit'=>$value_olny->material_unit, 'material_id'=>$value_olny->material_id, 'edit_id'=>$value_olny->edit_id, 'parameter_tech'=>$value_olny->parameter_tech, 'Category_material'=>$value_olny->Category_material, 'unit_price'=>$price, 'total_price'=>$total_price, 'Resubmission_count_id'=>$commercial_resubmit_count, 'buyer_id'=>$email_id,'commercial_edit_id'=>$edit_type_bid, 'master_itme_slno_id'=>$value_olny->slno_item_mr,'master_bid_id_comm'=>$insert_id);
                     $query_bid_master_item=$this->db->insert('master_mr_material_item_comm_m',$date_store);
                   
                }

                $data_title = array('pr_slno'=>$slno_pr, 'Title_bid'=>$bid_title, 'work_detail_bid'=>$bid_work_description, 'period_work_detail'=>$bid_period_work, 'location_detail'=>$bid_location_work, 'master_bid_id'=>$insert_id,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_title_master=$this->db->insert('master_bid_Com_details_m',$data_title);
               
                $data_bid_date = array('pr_slno'=>$slno_pr, 'bid_start_date'=>$date_start_bid, 'bid_closed_date'=>$date_closed_bid, 'bid_query_closed_date'=>$date_clearfication_bid, 'status'=>'4', 'master_bid_id'=>$insert_id,'bid_detail_description'=>$bid_detail_description,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_bid_date_master=$this->db->insert('master_bid_Com_date_details_m',$data_bid_date);

               

                 $bid_technical = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'commerical_id_person'=>$Technical_ev, 'master_bid_id'=>$insert_id,'edit_id_bid'=>$edit_type_bid,'commercial_resubmit_count'=>$commercial_resubmit_count);
                $query_technical_master=$this->db->insert('master_bid_Com_evaluation_m',$bid_technical);
                 $file_stored_name=date('Y-m-d')."-".$_FILES["terms_condition_file"]["name"];
                if(move_uploaded_file($_FILES["terms_condition_file"]["tmp_name"], 'upload_files/term_condition/' . $file_stored_name)){
                    $date_file = array('file_name' =>$file_stored_name , 'pr_no'=>$pr_no,'commercial_bid_id'=>$insert_id,'bid_reference'=>$bid_ref_no,'bid_reference_id'=>$bid_Id,'re_count_bid_com'=>$commercial_resubmit_count,'bid_type'=>$bid_method);
                    $query_files=$this->db->insert('master_technical_commercial_terms_conditions',$date_file);

                }

           
            $data_email_ids = array();
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
             $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
             $results_id=$query->result();
             $key_vendor=$results_id[0]->Vendor_email_id;
             $data_email_ids[] = array('Slno_vendor'=>$ID_VENDORS,'vendor_email'=>$key_vendor);

                    $vendor_infom = array('edit_id_bid'=>$edit_type_bid, 'slno_vendor_id_master'=>$ID_VENDORS, 'vendor_id'=>$key_vendor, 'status'=>4, 'title'=>$bid_title, 'description'=>$bid_work_description, 'date_start'=>$date_start_bid, 'date_end'=>$date_closed_bid,'query_end_date'=>$date_clearfication_bid, 'master_bid_id'=>$insert_id,'bid_ref'=>$bid_ref_no, 'bid_id'=>$bid_Id, 'mode_bid'=>$bid_method, 'technical_bid_type'=>$tech_evalution, 'pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'job_code'=>$job_code, 'edit_id'=>$edit_type,'commercial_resubmit_count'=>$commercial_resubmit_count );
                    $query_vendor_inform_master=$this->db->insert('master_bid_Com_vendor_m',$vendor_infom);
               


        }
          $infom_tc = array('pr_no'=>$pr_no,'pr_slno'=>$slno_pr,'edit_id_bid'=>$edit_type_bid,'t_c_detail'=>$terms_condition,'commercial_resubmit_count'=>$commercial_resubmit_count );
        // `pr_no`, `pr_slno`, `edit_id_bid`, `t_c_detail`

          $query_tec=$this->db->insert('master_bid_t_c_comm_m',$infom_tc);


             $result_procuremnet=$this->buyer_user->get_technical_commerial_user_list($Technical_ev,10);
                    $proc_details=$result_procuremnet['user_tech_comm'][0];
                    $tech_email_id=$proc_details->email_id;
                    $Procurement_name=$proc_details->Username;
                    
            if($submission=='Save'){

                $date_processing = array('buyer_user_status' => 7,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id, 'commercial_user_slno'=>$Technical_ev,'commercial_bid_id'=>$bid_Id,'technical_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_complete_status'=>3,'techno_commercial_status'=>6,'comm_bid'=>$insert_id);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);
                 $this->session->set_flashdata('success_message', ' Successfully Commerical Bid Is Drafted ');
                redirect('user-buyer-home');
                exit();

            }else if($submission=='Send'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_Com_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                $date_date_status_vendor = array('status' => 1,'status_active'=>1);

                $this->db->update('master_bid_Com_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_Com_evaluation_m',$update_status_master,$data_update_id);
                 $data_update_idss = array('master_bid_id'=>$insert_id);
                $this->db->update('master_bid_Com_vendor_m',$date_date_status_vendor,$data_update_idss);
                // print_r($data_email_ids);
                // master_vendor_notifications
               foreach ($data_email_ids as $key_id_vendor => $value_vendors) {

                // print($key_id_vendor);
                // print_r($value_vendors);
                $vendor_id_bid=$value_vendors['Slno_vendor'];
                $vendor_id=$value_vendors['vendor_email'];
                $dates=date('d-m-Y');
$message= <<<EOT
New Bid Is been Publish on {$dates} Please Check Information Under Commerical New Bid Information Bid Reference Id is {$bid_ref_no} And Bid Type Is {$bid_method} Bid will Be Closed On Date {$date_closed_bid}

EOT;
                // `vendor_id_bid`, `vendor_id`, `date_entry`, `date_update`, `view_status`, `message`
                    $data_notification = array('vendor_id_bid' =>$vendor_id_bid ,'vendor_id'=>$vendor_id ,'message'=>$message);
                    $bid_notification=$this->db->insert('master_vendor_notifications',$data_notification);
                   # code...
               }

                $date_processing = array('buyer_user_status' => 6,'buyer_date_comm'=>date('Y-m-d'),'commercial_user_id'=>$tech_email_id, 'commercial_user_slno'=>$Technical_ev,'commercial_bid_id'=>$bid_Id,'commercial_bid_ref'=>$bid_ref_no,'commercial_edit_id'=>$edit_type_bid,'commercial_type_bid'=>$bid_method,'commercial_complete_status'=>2,'techno_commercial_status'=>2,'comm_bid'=>$insert_id,'commercial_user_status'=>2);
                $process_id = array('pr_no' => $pr_no );
                $query_process=$this->db->update('master_pr_process_detail',$date_processing,$process_id);

                $this->session->set_flashdata('success_message', ' Successfully Commerical Bid Is Published ');
                redirect('user-buyer-home');
                exit();
            }else{
                $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
            }

        }else{
             $this->session->set_flashdata('error_message',  'Some thing went wrong please Try Again');
                redirect('buyer-user-create-new-pr/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/'.$tech_evalution);
        }   

        # code...
    }
    public function buyer_view_vendors($value=''){
      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"View Vendors List",'script_js'=>$scripts ,'menu_status'=>'8','sub_menu'=>'8','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/vendor/view_vendor_list');
            $this->load->view('template/template_footer',$data);
      # code...
    }
    public function buyer_new_vendors($value=''){
        $scripts='';

            $data=array('title' =>"Create New Vendors ",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/vendor/create_new_vendor');
            $this->load->view('template/template_footer',$data); 
    }
    public function buyer_new_vendors_save($value=''){
        $data_brower['browser'] = $this->agent->browser();
        $data_brower['browserVersion'] = $this->agent->version();
        $data_brower['platform'] = $this->agent->platform();
        $data_brower['full_user_agent_string'] = $_SERVER['HTTP_USER_AGENT'];
        $ip = $this->input->ip_address();       
        $date_nrowser_json=json_encode($data_brower);
        $date_entry=date('Y-m-d');
        $time_entry=date('H:i:s');
        $this->load->helper('string');

        $table_insert="master_vendor_detail";
        while(1){
            $Vendor_email_id=random_string('numeric', 10);
            $date_insert_check = array( 'Vendor_email_id'=>$Vendor_email_id);
            $check_exe=$this->db->get_where($table_insert,$date_insert_check);
            if($check_exe->num_rows()==0){
                break;
            }
        }
        

        $Vendor_name=trim($this->input->post('Vendor_name'));
        $Vendor_email_id_multiple=trim($this->input->post('Vendor_email_id'));
        $Organisation_address=trim($this->input->post('Organisation_address'));
        $Mobile_no=trim($this->input->post('Mobile_no'));
        $Password=trim($this->input->post('Password'));
        $Vendor_desc=trim($this->input->post('Vendor_desc'));
        // $vendor_operational=($this->input->post('vendor_operational'));
        $Organisation_name=trim($this->input->post('Organisation_name'));
        $hash=md5($Password);
          
        $date_insert_checks = array( 'Vendor_email_id'=>$Vendor_email_id);
        $check_exes=$this->db->get_where($table_insert,$date_insert_checks);
        if($check_exes->num_rows()==0){
            $date_insert = array('Vendor_email'=>$Vendor_email_id_multiple,'Vendor_name'=>$Vendor_name, 'Vendor_email_id'=>$Vendor_email_id, 'Mobile_no'=>$Mobile_no, 'Organisation_name'=>$Organisation_name, 'Password'=>$Password, 'Password_hash'=>$hash, 'Status'=>1, 'Date_entry'=>$date_entry, 'Time_entry'=>$time_entry, 'Vendor_desc'=>$Vendor_desc, 'Organisation_address'=>$Organisation_address);

               

                $this->email->from('contact@innovadorslab.co.in', 'Ilab');
                $this->email->to($Vendor_email_id_multiple);
                // $this->email->cc('another@another-example.com');
                $this->email->bcc('ppriyabrata8888@gmail.com');

                $this->email->subject('Test Create Vendor id');
                $this->email->message('Dear <br>
                                     Greetings !<br>
                                    Please find your login credentials as mentioned below.<br>

                                    User id:'.$Vendor_email_id.'<br>
                                    Password'.$Password.'<br>
                                    ');

                $this->email->send();

            
          
            $entry_project = $this->user->common_insert_id($table_insert,$date_insert);
            $last_id=$entry_project;

            $date_insert_json=json_encode($date_insert);
            $table_log='pms_log_entries';
            $log_entry= array('Form_name'=>"Vendors Entery Form", 'Data_entry'=>$date_insert_json, 'status'=>1, 'Date'=>$date_entry, 'Time'=>$time_entry, 'Location_Id'=>$ip, 'browser_information'=>$date_nrowser_json);
            $result_log_entry = $this->user->common_insert($table_log,$log_entry);

            $this->session->set_flashdata('success_message', 'Information Has been updated successfully');
            // After that you need to used redirect home
            redirect('buyer-view-vendors');

        }else{
             $this->session->set_flashdata('error_message', 'vendor email id already exist " '.$Vendor_email_id .' "');
            // After that you need to used redirect home
            redirect('buyer-add-vendors');
            // error_message
        }
    }
    public function buyer_view_vendors_info_change_reset($value1='',$value2=''){
        $keys_id="preetishwebvendors";
            $value1_convered = strtr($value1,array('.' => '+', '-' => '=', '~' => '/'));
            
            $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
            if($value1_convered_id==$value2){
                $this->load->helper('string');
                $table_insert="master_vendor_detail";
                $update_id=array('Slno_vendor'=>$value1_convered_id);
                $get_email_info=$this->db->get_where($table_insert,$update_id);
                $result_email=$get_email_info->result();
                $Vendor_email_id=$result_email[0]->Vendor_email_id;
                $Password=trim(random_string('alnum', 16));
                $hash=md5($Password);
                $data_update=array('Password'=>$Password, 'Password_hash'=>$hash);
                $this->db->update($table_insert,$data_update,$update_id);

                $this->load->library('email');

                $this->email->from('contact@innovadorslab.co.in', 'Innovadors Lab ');
                $this->email->to($Vendor_email_id);
                // $this->email->cc('');
                $this->email->bcc('ppriyabrata8888@gmail.com');

                $this->email->subject('Reset Password For Vendor');
                $this->email->message('Here Is reset Password :'.$Password.' for Vendor Portal ');

                $this->email->send();

                $this->session->set_flashdata('success_message', 'Vendor Password Has been Reset And send to mail Please Check Mail');
                // After that you need to used redirect home
                redirect('buyer-view-vendors');

            }else{
                $this->session->set_flashdata('error_message', 'Some thing went Wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-buyer-home'); 
            }

    }
    public function buyer_view_vendors_info($value1='',$value2=''){
           $keys_id="preetishwebvendors";
            $value1_convered = strtr($value1,array('.' => '+', '-' => '=', '~' => '/'));
            
            $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
            if($value1_convered_id==$value2){
                $scripts='';

               $data=array('title' =>"View Vendor details Information ",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Slno_vendor'=>$value1,'token'=>$value2);  

                $this->load->view('template/template_header',$data);
                $this->load->view('buyer_user/template/template_top_head');
                $this->load->view('buyer_user/template/template_side_bar',$data);
                $this->load->view('buyer_user/vendor/view_vendor_deatils',$data);
                $this->load->view('template/template_footer',$data);
            }else{
                $this->session->set_flashdata('error_message', 'Some thing went Wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-buyer-home'); 
            }
        # code...
    }
    public function buyer_change_vendor_status($value1,$value2,$value){

        $keys_id="preetishwebvendors";
        $value1_convered = strtr($value1,array('.' => '+', '-' => '=', '~' => '/'));
        
        $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
        if($value1_convered_id==$value2){
            $data = array('Slno_vendor' =>$value1_convered_id);
            $table='master_vendor_detail';
            $query=$this->db->get_where($table,$data);
            $data_db=$query->result(); // here fetch information 
            $row = $data_db[0]; 
            if($value==1){

                $data_id = array('Slno_vendor' =>$value1_convered_id);
                $date_change= array('status' =>'2' );
                $table="master_vendor_detail";
                $result_history = $this->user->common_update($table,$date_change,$data_id);
                $this->session->set_flashdata('success_message', $row->Vendor_name.' successfully Inactivated ');
                // After that you need to used redirect home
                redirect('buyer-view-vendors');

            }else if($value==2){
                $data_id = array('Slno_vendor' =>$value1_convered_id);
                $date_change= array('status' =>'1' );
                $table="master_vendor_detail";
                $result_history = $this->user->common_update($table,$date_change,$data_id);
                $this->session->set_flashdata('success_message', $row->Vendor_name.' successfully Activated ');
                // After that you need to used redirect home
                  redirect('buyer-view-vendors');

             }else if($value==3){
                $data_id = array('Slno_vendor' =>$value1_convered_id);
                $date_change= array('status' =>'3' );
                $table="master_vendor_detail";
                $result_history = $this->user->common_update($table,$date_change,$data_id);
                $this->session->set_flashdata('success_message', $row->Vendor_name.' successfully Deleted ');
                // After that you need to used redirect home
                   redirect('buyer-view-vendors');

            }else{
                $this->session->set_flashdata('error_message', 'Some thing went Wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-buyer-home'); 
            }

        }else{
            $this->session->set_flashdata('error_message', 'Some thing went Wrong');
            // After that you need to used redirect function instead of load view such as                 
            redirect('user-buyer-home'); 
        }       
    }
    public function buyer_buyer_edit_vendor_details($value1,$value2){
            $keys_id="preetishwebvendors";
            $value1_convered = strtr($value1,array('.' => '+', '-' => '=', '~' => '/'));
            
            $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
            if($value1_convered_id==$value2){
                  $scripts='';

               $data=array('title' =>"View Vendor details Information ",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Slno_vendor'=>$value1,'token'=>$value2);  
                $this->load->view('template/template_header',$data);
                $this->load->view('buyer_user/template/template_top_head');
                $this->load->view('buyer_user/template/template_side_bar',$data);
                $this->load->view('buyer_user/vendor/edit_vendor_details',$data);
                $this->load->view('template/template_footer',$data);
            }else{
                $this->session->set_flashdata('error_message', 'Some thing went Wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-buyer-home'); 
            }
    }
    public function buyer_edit_vendor_save($value=''){
        $value1=$this->input->post('value1');
        $value2=$this->input->post('value2');
        $vendor_operational=$this->input->post('vendor_operational');
        
        $keys_id="preetishwebvendors";
        $value1_convered = strtr($value1,array('.' => '+', '-' => '=', '~' => '/'));
        
        $value1_convered_id=$this->encrypt->decode($value1_convered,$keys_id);
        if($value1_convered_id==$value2){
            

            $Vendor_name=$this->input->post('Vendor_name');
            $Vendor_email_id_multiple=$this->input->post('Vendor_email_id');
            $Organisation_name=$this->input->post('Organisation_name');
            $Organisation_address=$this->input->post('Organisation_address');
            $Mobile_no=$this->input->post('Mobile_no');
            $Vendor_desc=$this->input->post('Vendor_desc');
            
            $data_brower['browser'] = $this->agent->browser();
            $data_brower['browserVersion'] = $this->agent->version();
            $data_brower['platform'] = $this->agent->platform();
            $data_brower['full_user_agent_string'] = $_SERVER['HTTP_USER_AGENT'];
            $ip = $this->input->ip_address();       
            $date_nrowser_json=json_encode($data_brower);
            $date_entry=date('Y-m-d');
            $time_entry=date('H:i:s');

            
            $date_insert = array('Vendor_email'=>$Vendor_email_id_multiple,'Vendor_name'=>$Vendor_name, 'Mobile_no'=>$Mobile_no, 'Organisation_name'=>$Organisation_name, 'Status'=>1, 'Date_entry'=>$date_entry, 'Time_entry'=>$time_entry, 'Vendor_desc'=>$Vendor_desc, 'Organisation_address'=>$Organisation_address);
            
            $table_insert="master_vendor_detail";
            $dataid = array('Slno_vendor' => $value1_convered_id );
            $entry_project = $this->user->common_update($table_insert,$date_insert,$dataid);
            $last_id=$entry_project;
            $data_update = array('update_data' =>$date_insert ,'id'=>$dataid );
            $date_insert_json=json_encode($data_update);
            $table_log='pms_log_entries';
            $log_entry= array('Form_name'=>"Vendors update Form", 'Data_entry'=>$date_insert_json, 'status'=>1, 'Date'=>$date_entry, 'Time'=>$time_entry, 'Location_Id'=>$ip, 'browser_information'=>$date_nrowser_json);
            $result_log_entry = $this->user->common_insert($table_log,$log_entry);

            $this->session->set_flashdata('success_message', 'Information Has been updated successfully');
            // After that you need to used redirect home
            redirect('buyer-view-vendors');

        }else{
             $this->session->set_flashdata('error_message', 'Some thing went Wrong');
            // After that you need to used redirect function instead of load view such as                 
            redirect('user-buyer-home');  
        }
        # code...
    }
    public function buyer_pr_technical_ongoing($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/send_tech_pr_schedule');
            $this->load->view('template/template_footer',$data);
    }
     public function buyer_technical_query($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr'=>$value);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/Query_panel_tech',$data);
            $this->load->view('template/template_footer',$data);
    }
    public function buyer_technical_query_completed($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List of query from vendors for bid ",'script_js'=>$scripts ,'menu_status'=>'4','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr'=>$value);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/Query_panel_tech',$data);
            $this->load->view('template/template_footer',$data);
    }
   public function buyer_technical_query_view($value='',$values=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Slno_query'=>$value,'pr_no'=>$values);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/query_panel_view',$data);
            $this->load->view('template/template_footer',$data);
    }
     public function buyer_technical_query_view_save($value=''){
        $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){

            redirect('vendor-logout-pass');
        }
               print_r($this->input->post());
       // Array ( [pr_no] => O18191-950-E-K-30113-001 [Slno_query] => 3 [query_details] => date is 24 april 2019 will be the final submission date )
       $pr_no=$this->input->post('pr_no');
       $Slno_query=$this->input->post('Slno_query');
       $query_details=$this->input->post('query_details');
       
        $data_updated_info=array('response_detail'=>$query_details,'responser_id'=>$email_id,'status_responds'=>1);
        $data_updated_id=array('Slno_query'=>$Slno_query);
        $query_update=$this->db->update('master_bid_query_tech_m',$data_updated_info,$data_updated_id);
         $this->session->set_flashdata('success_message', 'Successfully notification is been replied ');
            // After that you need to used redirect home
            redirect('buyer-technical-query/'.$pr_no);


    }
    public function buyer_commercial_query($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr'=>$value);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/Query_panel_comm',$data);
            $this->load->view('template/template_footer',$data);
    }
     public function buyer_commercial_query_completed($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'4','sub_menu'=>'44','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr'=>$value);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/Query_panel_comm',$data);
            $this->load->view('template/template_footer',$data);
    }
    
    public function buyer_commercial_query_view($value='',$values=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Slno_query'=>$value,'pr_no'=>$values);  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/query_panel_view_comm',$data);
            $this->load->view('template/template_footer',$data);
    }
    public function buyer_commercial_query_view_save($value=''){
        $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){

            redirect('vendor-logout-pass');
        }
               
       // Array ( [pr_no] => O18191-950-E-K-30113-001 [Slno_query] => 3 [query_details] => date is 24 april 2019 will be the final submission date )
       $pr_no=$this->input->post('pr_no');
       $Slno_query=$this->input->post('Slno_query');
       $query_details=$this->input->post('query_details');
       
        $data_updated_info=array('response_detail'=>$query_details,'responser_id'=>$email_id,'status_responds'=>1);
        $data_updated_id=array('Slno_query'=>$Slno_query);
        $query_update=$this->db->update('master_bid_query_comm_m',$data_updated_info,$data_updated_id);
         $this->session->set_flashdata('success_message', 'Successfully notification is been replied ');
            // After that you need to used redirect home
            redirect('buyer-commercial-query/'.$pr_no);


    }
   
    public function buyer_technical_ongoing_bid_pr_info_details($pr_no='',$technical_bid_ref='',$technical_bid_id='',$tech_bid='',$id=''){
         $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'technical_bid_ref'=>$technical_bid_ref,'technical_bid_id'=>$technical_bid_id,'id'=>$id,'bid_id'=>$tech_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/tech_pr_bid_information_ongoing',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function buyer_technical_completed_bid_pr_info_details($pr_no='',$technical_bid_ref='',$technical_bid_id='',$tech_bid='',$id=''){
         $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'4','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'technical_bid_ref'=>$technical_bid_ref,'technical_bid_id'=>$technical_bid_id,'id'=>$id,'bid_id'=>$tech_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/tech_pr_bid_information_complete',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function buyer_technical_ongoing_bid_pr_notification_vendor($pr_no='',$technical_bid_ref='',$technical_bid_id='',$tech_bid='',$technical_edit_id=''){
        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'technical_bid_ref'=>$technical_bid_ref,'technical_bid_id'=>$technical_bid_id,'technical_edit_id'=>$technical_edit_id,'bid_id'=>$tech_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/Notification_tech',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function buyer_notification_tech_save_info($value=''){
        // Array ( [Pr_no] => O18191-950-E-K-30111-001 [technical_bid_ref] => 68009 [technical_bid_id] => 7779 [technical_edit_id] => 1 [bid_id] => 4 [Technical_notification_] => For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally. ) 
        $technical_edit_id=$this->input->post('technical_edit_id');
        $technical_bid_id=$this->input->post('technical_bid_id');
        $technical_bid_ref=$this->input->post('technical_bid_ref');
        $pr_no=$this->input->post('Pr_no');
        $tech_bid=$this->input->post('bid_id');
        $Technical_notification_=$this->input->post('Technical_notification_');
        // print_r($this->input->post());
        $data_array = array('edit_id_bid' =>$technical_edit_id,'bid_id'=>$technical_bid_id,'bid_ref'=> $technical_bid_ref,'pr_no'=>$pr_no,'master_bid_id'=>$tech_bid);

        $vendor_selected_id=$this->db->get_where('master_bid_vendor_m',$data_array);

        foreach ($vendor_selected_id->result() as $key_vendor => $value_vendor) {
            $slno_vendor_id_master=$value_vendor->slno_vendor_id_master;
            $vendor_id=$value_vendor->vendor_id;
            $date_entry = array('vendor_id_bid' =>$slno_vendor_id_master ,'vendor_id' =>$vendor_id,'message'=>$Technical_notification_);
            $this->db->insert('master_vendor_notifications',$date_entry);
            // `vendor_id_bid`, `vendor_id`, `message`


        }
        $this->session->set_flashdata('success_message', 'Notification For Techncial is been send');
            // After that you need to used redirect home
        redirect('user-buyer-home');
        # code...
    }
    public function buyer_pr_commercial_closed_simple_ongoing($value=''){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'34','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/send_comm_pr_schedule_c_s');
            $this->load->view('template/template_footer',$data);
    }
    public function buyer_pr_commercial_ranking_ongoing($value=''){
           $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'344','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/send_comm_pr_schedule_rank');
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function buyer_pr_commercial_closed_simple_completed($value=''){
        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Completed PR Bids",'script_js'=>$scripts ,'menu_status'=>'4','sub_menu'=>'44','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/send_comm_pr_schedule_c_s');
            $this->load->view('template/template_footer',$data);
    }
    public function buyer_s_c_Commerical_ongoing_bid_pr_info_details($pr_no='',$pr_slno='',$project_job_code='',$id='',$comm_bid=''){
        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'pr_slno'=>$pr_slno,'project_job_code'=>$project_job_code,'id'=>$id,'comm_bid_id'=>$comm_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/view_ongoing_c_s_bidcommercial_information',$data);
            $this->load->view('template/template_footer',$data);
       
    }
    public function buyer_s_c_Commerical_completed_bid_pr_info_details($pr_no='',$pr_slno='',$project_job_code='',$id='',$comm_bid=''){
        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'4','sub_menu'=>'44','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$pr_no,'pr_slno'=>$pr_slno,'project_job_code'=>$project_job_code,'id'=>$id,'comm_bid_id'=>$comm_bid);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/view_complete_c_s_bidcommercial_information',$data);
            $this->load->view('template/template_footer',$data);
       
    }
    public function buyer_commerical_c_s_r_ongoing_bid_pr_notification_vendor($pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count=''){

        $scripts='';
            $data=array('title' =>"Bid Detail Information",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'commercial_edit_id'=>$commercial_edit_id,'comm_bid_db'=>$comm_bid_db,'commercial_resubmit_count'=>$commercial_resubmit_count);
            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_ongoing/Notification_comm',$data);
            $this->load->view('template/template_footer',$data);
    
        # code...
    }
    public function buyer_notification_comm_save_info($value=''){
        // print_r($this->input->post());
        $Pr_no=$this->input->post('Pr_no');
        $commercial_bid_ref=$this->input->post('commercial_bid_ref');
        $commercial_bid_id=$this->input->post('commercial_bid_id');
        $commercial_edit_id=$this->input->post('commercial_edit_id');
        $comm_bid_db=$this->input->post('comm_bid_db');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
        $Technical_notification_=$this->input->post('Technical_notification_');

        $data_array = array('edit_id_bid' =>$commercial_edit_id,'bid_id'=>$commercial_bid_id,'bid_ref'=> $commercial_bid_ref,'pr_no'=>$Pr_no,'master_bid_id'=>$comm_bid_db,'commercial_resubmit_count'=>$commercial_resubmit_count);

        $vendor_selected_id=$this->db->get_where('master_bid_Com_vendor_m',$data_array);
        foreach ($vendor_selected_id->result() as $key_vendor => $value_vendor) {
            $slno_vendor_id_master=$value_vendor->slno_vendor_id_master;
                $vendor_id=$value_vendor->vendor_id;
                $date_entry = array('vendor_id_bid' =>$slno_vendor_id_master ,'vendor_id' =>$vendor_id,'message'=>$Technical_notification_);
                $this->db->insert('master_vendor_notifications',$date_entry);
            // `vendor_id_bid`, `vendor_id`, `message`
        }
        $this->session->set_flashdata('success_message', 'Notification For Commercial is been sendTo Vendor');
            // After that you need to used redirect home
        redirect('user-buyer-home');
     
    }
    public function buyer_pr_technical_completed($value=''){
          $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

           $data=array('title' =>"List Ongoing PR Bids",'script_js'=>$scripts ,'menu_status'=>'4','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('buyer_user/template/template_top_head');
            $this->load->view('buyer_user/template/template_side_bar',$data);
            $this->load->view('buyer_user/buyer_pr_complete/send_tech_pr_schedule');
            $this->load->view('template/template_footer',$data);
        # code...
    }

     public function buyer_bid_query_commerical_intimation_pr($pr_no='',$slno='',$job_code="",$id='',$comm_bid=''){
        $scripts='<script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-daterangepicker/moment.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script><script src="'.base_url().'file_css_admin/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script><script src="'.base_url().'file_css_admin/own_js_date_picker_new.js"></script>';
          $data=array('title' =>"Sending bid Information",'script_js'=>$scripts,'menu_status'=>'3','sub_menu'=>'344','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'' ,'pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id ,'comm_bid'=>$comm_bid );
          $this->load->view('template/template_header',$data);
          $this->load->view('buyer_user/template/template_top_head');
          $this->load->view('buyer_user/template/template_side_bar',$data);
          $this->load->view('buyer_user/send_invitation/invitation_commerical',$data);
          $this->load->view('template/template_footer',$data);

    }

     public function buyer_bid_rank_invitation_to_vendor_com_pr(){

      
        $pr_no=$this->input->post('pr_no');
        $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
          $slno=$this->input->post('slno');
          $job_code=$this->input->post('job_code');
          $comm_bid=$this->input->post('comm_bid');

        $url_auction='buyer-rank-start-Commerical-ongoing-bid-pr-info-details/'.$pr_no.'/'.$slno.'/'.$job_code.'/2/'.$comm_bid;  

        $data_process = array('pr_no' =>$pr_no);
        $query_process=$this->db->get_where('master_pr_process_detail',$data_process);
        $result_process=$query_process->result(); 
        $Technical_ev=$commercial_user_slno=$result_process[0]->commercial_user_slno;


        $master_bid_id=$this->input->post('master_bid_id');
        // $category=$this->input->post('category');
        $bid_ref=$this->input->post('bid_ref');
        $bid_id=$this->input->post('bid_id');
        $Starting=$this->input->post('Starting');
        $ending=$this->input->post('ending');
        // $timer=$this->input->post('timer');
        $no_of_entry=$this->input->post('no_of_entry');
        // $Technical_ev=$this->input->post('Technical_ev');
        $slno_vendor_approve=$this->input->post('slno_vendor_approve');
        $vendor_id_approve=$this->input->post('vendor_id_approve');
        $slno_vendor_not=$this->input->post('slno_vendor_not');
        $vendor_id_not=$this->input->post('vendor_id_not');
        if(!empty($vendor_id_approve)){
           
            $basic_invitation = array('master_bid_id'=>$master_bid_id, 'master_bid_start'=>$Starting, 'master_bid_end'=>$ending, 'ref_no'=>$bid_ref, 'ref_id'=>$bid_id, 'no_time_entry'=>$no_of_entry, 'commerical_user_id'=>$Technical_ev, 'status_process'=>'1','pr_slno'=>$pr_no,'commercial_resubmit_count'=>$commercial_resubmit_count);
            $query_invitation=$this->db->insert('master_bid_invitation_rank_pr', $basic_invitation);
            $laast_id=$this->db->insert_id();
            if($query_invitation){
                foreach ($slno_vendor_approve as $key_id_ven => $value_id_ven) {
                    // `slno_approve`, `master_bid_id`, `invi_slno_id`, `vendor_id_bid`, `vendor_id`, `status`, `date_entry`, `date_update`, `bid_ref`, `bid_id`, `start_date`, `end_date`, `no_of_times`, `pr_slno`, `commercial_resubmit_count`
                    $vendor_id_bid=$slno_vendor_approve[$key_id_ven];
                    $vendor_id=$vendor_id_approve[$key_id_ven];
                    $approve_vendor = array('master_bid_id'=>$master_bid_id, 'invi_slno_id'=>$laast_id, 'vendor_id_bid'=>$vendor_id_bid, 'vendor_id'=>$vendor_id, 'status'=>1,'bid_ref'=>$bid_ref, 'bid_id'=>$bid_id, 'start_date'=>$Starting, 'end_date'=>$ending, 'no_of_times'=>$no_of_entry,'pr_slno'=>$pr_no,'commercial_resubmit_count'=>$commercial_resubmit_count);
                    $this->db->insert('master_bid_invi_rank_approvals_pr',$approve_vendor);
                }
                foreach ($slno_vendor_approve as $key_id_ven => $value_id_ven) {
                    $message="A Rank order reverse auction shall be conducted for the bid no  ".$bid_ref." dated on ".$Starting." you are requested to participate. <br> <p>For any query send your queries accross ther application no " ;
                    
                    $vendor_id=$vendor_id_approve[$key_id_ven];

                    $this->db->where('Vendor_email_id',$vendor_id);
                    $query_vendor=$this->db->get('master_vendor_detail');
                    $query_vendor_result=$query_vendor->result();
                    $value_id_vender=$query_vendor_result[0];
                    $vendor_id_bid=$value_id_vender->Slno_vendor;
                    $approve_vendor = array('vendor_id_bid'=>$vendor_id_bid, 'vendor_id'=>$vendor_id, 'message'=>$message);
                    $this->db->insert('master_vendor_notifications',$approve_vendor);
                }
                if(!empty($vendor_id_not)){
                    foreach ($slno_vendor_not as $key_id_ven => $value_id_ven) {
                        $vendor_bid_id=$slno_vendor_not[$key_id_ven];
                        $vendor_id=$vendor_id_not[$key_id_ven];
                        $approve_vendor = array('master_bid_id'=>$master_bid_id, 'invi_slno_id'=>$laast_id, 'vendor_bid_id'=>$vendor_bid_id, 'vendor_id'=>$vendor_id);
                        $this->db->insert('master_bid_invi_rank_not_app',$approve_vendor);
                    }
                }
                $date_rank_entry=date('Y-m-d');
                $update_data_process = array('rank_status' =>1 , 'date_rank_entry'=>$date_rank_entry);
                $query_process_updaete=$this->db->update('master_pr_process_detail',$update_data_process,$data_process);
             

                 $this->session->set_flashdata('success_message', 'successfull Rank event is created '); // here is message is been toasted

                 redirect('user-buyer-home');
            }else{
                $this->session->set_flashdata('error_message', 'Something went worng!');
                redirect($url_auction);
            }

        }else{
            $this->session->set_flashdata('error_message', 'No Vendor has submitted commerical bid for this rank biding !');
            redirect($url_auction);
        }
    }
    public function buyer_otp_verification_success_view_pr(
        $type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
      $value3 = urldecode($commercial_type_bid);
       $scripts='';
        $data=array('title' =>"New Bid List",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','type_bid'=>$type_bid,'last_otp_id'=>$last_insert_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$value3);
        $this->load->view('buyer_user/complete_view_statement/commerical_get_list_vendor_moi_sci_c_o_view',$data);
    }
    
    public function buyer_view_project_old_remark(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
       
        $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('buyer_user/template/template_top_head');
        $this->load->view('buyer_user/template/template_side_bar',$data);
        $this->load->view('buyer_user/remark_history/remark_index',$data);
        $this->load->view('template/template_footer',$data);
       }
       public function buyer_pr_remark_history($pr_no='',$slno='',$job_code='',$id=''){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
       
        $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id);
        $this->load->view('template/template_header',$data);
        $this->load->view('buyer_user/template/template_top_head');
        $this->load->view('buyer_user/template/template_side_bar',$data);
        $this->load->view('buyer_user/remark_history/remark_index_detail',$data);
        $this->load->view('template/template_footer',$data);
    
       }


       public function buyer_otp_verification_success_view_pr_excel(
        $type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
        $value3 = urldecode($commercial_type_bid);
        // statement data is here
        #######################################################################################################
        $email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){
            
            redirect('buy-logout-by-pass');
        }
        // $type_bid=$type_bid;
        
        // $last_otp_id=$last_otp_id;
        
        // $pr_no=$pr_no;
        // $commercial_bid_ref=$commercial_bid_ref;
        // $commercial_bid_id=$commercial_bid_id;
        // 
        
        // $commercial_edit_id=$commercial_edit_id;
        // $commercial_resubmit_count=$commercial_resubmit_count;
        // $commercial_type_bid=$commercial_type_bid;
        
        
        // $url_buyer_commplete='<a href="'.base_url().'buyer-otp-verification-success-view-pr-excel/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid.'"
        //                                              >Comparative Statement Excel</a>';
        $data_process = array('pr_no' =>$pr_no);
        $query_process=$this->db->get_where('master_pr_process_detail',$data_process);
        $result_process=$query_process->result();
        $Slno_bid=$comm_bid_db=$comm_bid_db;
        // print_r($result_process);
        
        // project information
            $job_code=$result_process[0]->project_slno;
            $commercial_bid_ref_DB=$result_process[0]->commercial_bid_ref;
            $commercial_bid_id_DB=$result_process[0]->commercial_bid_id;
            $data_job_code = array('Project_Slno' =>$job_code);
            $query_job_code=$this->db->get_where('master_project',$data_job_code);
            $data_db_job_code=$query_job_code->result(); // here fetch information 
            $row_job_code = $data_db_job_code[0];
        // location 
            $data_table2 = array('pr_no' =>$pr_no,'master_bid_id'=>$comm_bid_db);
            $query_table2=$this->db->get_where('master_bid_Com_details_m',$data_table2);
            $result_table2=$query_table2->result();
        // commerical date
        $data_table1= array('pr_no' =>$pr_no,'master_bid_id'=>$comm_bid_db);
        $query_table1=$this->db->get_where('master_bid_Com_date_details_m',$data_table1);
        $result_table1=$query_table1->result();
        // master detail table
        $data_table3 = array('pr_no' =>$pr_no,'Slno_bid'=>$comm_bid_db);
        $query_table3=$this->db->get_where('master_bid_Com_m',$data_table3);
        $result_table3=$query_table3->result();
        
        $data_mr_no = array('pr_no' =>$pr_no);
            $query_mr_no=$this->db->get_where('master_mr_job_details_m',$data_mr_no);
            $data_db_jmr_no=$query_mr_no->result(); // here fetch information
            $row_mr_no = $data_db_jmr_no[0];
        
            $data=array('master_bid_id_com'=>$comm_bid_db);
                
            // $this->db->select_min('sub_total');
            $this->db->order_by('sub_total', 'asc');
            $this->db->order_by('date', 'asc');	
            $this->db->where('master_bid_id_com', $comm_bid_db);	
            $query_bid_sub=$this->db->get('master_pr_bid_qoute_item_total');
            // echo $this->db->last_query();
            foreach ($query_bid_sub->result() as $key_id) {
        // 	// print_r($key_id);
                $array_vedeor_id[]= ($key_id->Vendor_id);
            
        
            }
        if(!empty($array_vedeor_id)){
            $final_id_vendor=array_unique($array_vedeor_id); // will remove duplicate values
        }else{
              $this->session->set_flashdata('error_message',  'Sorry No vendor has Submitted Commerical information. Please Ask Buyer For looking to it . Here is bid id and bid reference no "' .$bid_info_buyer[0]->bid_id.'/'.$bid_info_buyer[0]->bid_ref.'"');
            // redirect('user-commerical-evalutor-home');
        }
        $data_table12= array('mr_no_item' =>$pr_no,'master_bid_id_comm'=>$comm_bid_db);
        $query_table12=$this->db->get_where('master_mr_material_item_comm_m',$data_table12);
        $query_get_list=$result_table12=$query_table1->result();
        
        $data_approved = array('pr_no' => $pr_no );
        $query_approved=$this->db->get_where("master_pr_bid_qoute_item_final_approve",$data_approved);

        $times_repeat=array_count_values($array_vedeor_id);
        $y=0;
        // echo "<pre>";
        foreach ($query_table12->result() as $key_value) {
            $slno_mat=$key_value->slno_item_mr;
            foreach ($final_id_vendor as $key_ven_id =>$userid_ven):
                
                $id_count=$times_repeat[$userid_ven];
                $date_im = array('Vendor_id' => $userid_ven,'Bid_master_id_com'=> $comm_bid_db,'comm_item_slno'=>$slno_mat);
                $data_ve_item=$this->db->get_where('master_pr_bid_qoute_item',$date_im);
                $price_item=$data_ve_item->result();
                // print_r($price_item);
                for($i_price=0; $i_price<$id_count ;$i_price++){
                    $material_data_price[$y][$userid_ven][]=array($price_item[$i_price]->Unit_price,$price_item[$i_price]->Unit_price,$price_item[$i_price]->Total_unitprice);
                }
               
               
                    

            endforeach;
            $y++;
        }
        // subtotal
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('','',$value_short[$i_total]->sub_total);
            }
        }
       
        // Packing and Forwarding
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('','',$value_short[$i_total]->package);
            }
        }
      
        //Transportation
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('','',$value_short[$i_total]->Trans);
            }
        }
        //Total Item 
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('','',$value_short[$i_total]->total_price);
            }
        }
        //Gst value 
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                
                if(!empty($value_short[$i_total]->CGST_percent)){
                    $percent=$value_short[$i_total]->CGST_percent." %";
                    $gst_value=$value_short[$i_total]->CGST_value;
                   
                }else{
                    $percent="0 %";
                    $gst_value=0;
                }	
                $material_data_price[$y][$userid_ven][]=array('',$percent,$gst_value);
            }
        }
        //Total Gst value 
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                if(!empty($value_short[$i_total]->total_gst_value)){
                    $gst_total=$value_short[$i_total]->total_gst_value;
                    
                   
                }else{
                    
                    $gst_total=0;
                }
                $material_data_price[$y][$userid_ven][]=array('',' ',$gst_total);
            }
        }
        //User Assumption Charges  
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
            $data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
            $value_short=$data_Short->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_short[$i_total]->user_assumption_charge);
            }
        }
        //price_basis 
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_price_basis= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'price_basis');
            $data_price_basis=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_price_basis);
            $value_price_basis=$data_price_basis->result();
            if($data_price_basis->num_rows!=0){
                for($i_total=0; $i_total<$id_count ;$i_total++){
                    $material_data_price[$y][$userid_ven][]=array('',' ',$value_price_basis[$i_total]->field_value);
                }
            }else{
                $material_data_price[$y][$userid_ven][]=array('',' ','--');
            }
        }
        // print_r($value_price_basis);
        // print_r($material_data_price);
        // exit;
        //   Place of Delivery
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_place_delivery= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'place_delivery');
            $data_place_delivery=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_place_delivery);
            $value_place_delivery=$data_place_delivery->result();
            if($data_place_delivery->num_rows!=0){
                for($i_total=0; $i_total<$id_count ;$i_total++){
                    $material_data_price[$y][$userid_ven][]=array('',' ',$value_place_delivery[$i_total]->field_value);
                }
            }else{
                $material_data_price[$y][$userid_ven][]=array('',' ','--');
            }
        }
        //   Delivery Schedule
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_delivery= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'delivery schedule');
            $data_delivery=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_delivery);
            $value_delivery=$data_delivery->result();
            // if($data_delivery->num_rows!=0){
                for($i_total=0; $i_total<$id_count ;$i_total++){
                    $material_data_price[$y][$userid_ven][]=array('',' ',$value_delivery[$i_total]->field_value);
                }
            // }else{
            //     $material_data_price[$y][$userid_ven][]=array('',' ','--');
            // }
        }
        //  Security BG
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'security BG');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
        //  Payment Terms
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'payment terms');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
        //  Liquidated Damages
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'liquidity damage');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
        //  Validity of Offer
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'validity of offer');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
        //  Guarantee / Warrantee Period
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'gaurantee warranty');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
        //  Remarks
        $y++;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
            $id_count=$times_repeat[$userid_ven];
            $date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'remarks');
            $data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
            $value_security=$data_security->result();
            for($i_total=0; $i_total<$id_count ;$i_total++){
                $material_data_price[$y][$userid_ven][]=array('',' ',$value_security[$i_total]->field_value);
            }
        }
 
         

           
            // foreach ($data_Short->result() as $key_short => $value_short) {

            // }
        // $material_data_price[$y][$userid_ven][]=array($price_item[$i_price]->Unit_price,$price_item[$i_price]->Unit_price,$price_item[$i_price]->Total_unitprice);
       
//         print_r($material_data_price);
// exit;

        #######################################################################################################
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Pr No bid');
        //set cell A1 content with some text
        $title="LARSEN & TOUBRO LIMITED
        Center Procurement Dept , MMH SBG , 
        Godrej Waterside Tower -2 , 11th Floor , DP-5  
        Sector V , Salt Lake  City . Kolkata :- 700091

        [ COMPARATIVE STATEMENT ]";
        $this->excel->getActiveSheet()->setCellValue('A1', $title);
        $this->excel->getActiveSheet()->mergeCells('A1:G8');
    
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');

        $this->excel->getActiveSheet()->setCellValue('A10', 'Project Name / Project Code');
        $this->excel->getActiveSheet()->setCellValue('B10', $row_job_code->Project_Name."[".$row_job_code->job_Code."]");
        $this->excel->getActiveSheet()->setCellValue('A11', 'PR NO');
        $this->excel->getActiveSheet()->setCellValue('B11', $pr_no);
        $this->excel->getActiveSheet()->setCellValue('A12', 'Location Name');
        $this->excel->getActiveSheet()->setCellValue('B12', $result_table2[0]->location_detail);
        $this->excel->getActiveSheet()->setCellValue('A13', 'Bid No');
        $this->excel->getActiveSheet()->setCellValue('B13', $commercial_bid_id_DB);
        $this->excel->getActiveSheet()->setCellValue('A14', 'Bid Ref');
        $this->excel->getActiveSheet()->setCellValue('B14', $commercial_bid_ref_DB);
        $this->excel->getActiveSheet()->setCellValue('A15', 'Bid Start Date / Bid Closed Date');
        $this->excel->getActiveSheet()->setCellValue('B15', $result_table1[0]->bid_start_date.'/'.$result_table1[0]->bid_closed_date);
        $this->excel->getActiveSheet()->setCellValue('A16', 'Bid Type');
        $this->excel->getActiveSheet()->setCellValue('B16', $result_table3[0]->mode_bid);
        $this->excel->getActiveSheet()->setCellValue('A17', 'ACE Value');
        $this->excel->getActiveSheet()->setCellValue('B17', $result_table3[0]->Ace_value_detail);

        $this->excel->getActiveSheet()->setCellValue('A20', "Currency");
        $this->excel->getActiveSheet()->mergeCells('A20:G20');
    
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A20')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A20')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->getStyle('A20')->getFill()->getStartColor()->setARGB('#333');

        $this->excel->getActiveSheet()->setCellValue('A22', 'SRL');
        $this->excel->getActiveSheet()->setCellValue('A23', 'Currency');
        $this->excel->getActiveSheet()->setCellValue('A24', 'Rate');
        $this->excel->getActiveSheet()->setCellValue('B22', "1");
        $this->excel->getActiveSheet()->setCellValue('B23', 'INR');
        $this->excel->getActiveSheet()->setCellValue('B24', "1.00");

        $this->excel->getActiveSheet()->getStyle('A10:A24')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('A10:A24')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A10:A24')->getFont()->setSize(12);
        $this->excel->getActiveSheet()->getStyle('A10:A24')->getFill()->getStartColor()->setARGB('#39c091');
        $this->excel->getActiveSheet()->getStyle('A10:A24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B10:B24')->getFont()->setBold(false);
        $this->excel->getActiveSheet()->getStyle('B10:B24')->getFont()->setSize(10);
        $this->excel->getActiveSheet()->getStyle('B10:B24')->getFill()->getStartColor()->setARGB('#333');
        $this->excel->getActiveSheet()->getStyle('B10:B24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B10:B24')->getAlignment()->setWrapText(true);


        $this->excel->getActiveSheet()->setCellValue('A26', "Bid Summary Statement");
        $this->excel->getActiveSheet()->mergeCells('A26:G28');
    
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle('A26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A26')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A26')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('A26')->getFill()->getStartColor()->setARGB('#333');

        $this->excel->getActiveSheet()->setCellValue('A30', 'SRL');
        $this->excel->getActiveSheet()->setCellValue('B30', 'Item Name');
        $this->excel->getActiveSheet()->setCellValue('C30', 'Qnty');
        $this->excel->getActiveSheet()->setCellValue('D30', 'Unit Price');
        $this->excel->getActiveSheet()->setCellValue('E30', 'Basic Price');
        $this->excel->getActiveSheet()->setCellValue('F30', 'Vendor');

        $x=0;
		foreach ($query_approved->result() as $key_summary => $value_summary):
		    $x++;
            $summary_data[]=array($x,$value_summary->Item_name,$value_summary->Quantity,$value_summary->Unit_price,$value_summary->Total_unitprice,$value_summary->Vendor_id);
        endforeach;
        $this->excel->getActiveSheet()->fromArray($summary_data, null, 'A31');
                 
        $this->excel->getActiveSheet()->getStyle('A30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                     
        $this->excel->getActiveSheet()->getStyle('D30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('F30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // $colIndex=$this->excel->getActiveSheet();
        $highestRow = $this->excel->getActiveSheet()->getHighestRow();
        $id=$highestRow+3;
        $new_id=$id+5;
        $value1_row='A'.$id;
        $value2_row='G'.$new_id;

        $this->excel->getActiveSheet()->setCellValue($value1_row, "Bid Information");
        
        $this->excel->getActiveSheet()->mergeCells($value1_row.':'.$value2_row);
    
        //set aligment to center for that merged cell (A1 to C1)
        $this->excel->getActiveSheet()->getStyle($value1_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle($value1_row)->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle($value1_row)->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle($value1_row)->getFill()->getStartColor()->setARGB('#333');

        $highestRow_new = $this->excel->getActiveSheet()->getHighestRow();
        $new_id_bid=$highestRow_new+2;
        $value3_row='A'.$new_id_bid;
        // $colIndex = PHPExcel_Cell::columnIndexFromString($this->excel->getActiveSheet()->getColumn());

        $this->excel->getActiveSheet()->setCellValue('A'.$new_id_bid, '#');

        // $this->excel->getActiveSheet()->setCellValue('B'.$new_id_bid.'', 'Vendor T');
        $this->excel->getActiveSheet()->setCellValue('B'.$new_id_bid, 'Item Name');
        // $this->excel->getActiveSheet()->setCellValue('C'.$new_id_bid, 'Qnty');
        $this->excel->getActiveSheet()->setCellValue('C'.$new_id_bid, 'UOM');
        $this->excel->getActiveSheet()->setCellValue('D'.$new_id_bid, 'Quantity');
        $this->excel->getActiveSheet()->setCellValue('E'.$new_id_bid, 'Currency');
        // $this->excel->getActiveSheet()->setCellValue('G'.$new_id_bid, 'Unit Rate');
        // $this->excel->getActiveSheet()->setCellValue('H'.$new_id_bid, 'Converted Rate');
        // $this->excel->getActiveSheet()->setCellValue('I'.$new_id_bid, 'Total Rate');

        $highestRow_new_bid = $this->excel->getActiveSheet()->getHighestRow();

        $new_id_bid_row=$highestRow_new_bid+3;

        $x=0;
        foreach ($query_table12->result() as $key_value):
            $x++;
            $material_data[]=array($x,$key_value->material_name,$key_value->material_unit,$key_value->material_quantity,'INR');
        endforeach;
        $material_data[]=array('','Sub total (A)','','','');
        $material_data[]=array('','Packing and Forwarding (P&F) Charges (B)','','','');
        $material_data[]=array('','Transportation Charges (C)','','','');
        $material_data[]=array('','Total Item Value (A+B+C)','','','');
        $material_data[]=array('','GST IGST / CGST + SGST %','','','');
        $material_data[]=array('','Total Item Value with GST','','','');
        $material_data[]=array('','User Assumption Charges','','','');
        $material_data[]=array('','Price Basis','','','');
        $material_data[]=array('','Place of Delivery','','','');
        $material_data[]=array('','Delivery Schedule','','','');
        $material_data[]=array('','Security BG','','','');
        $material_data[]=array('','Payment Terms','','','');
        $material_data[]=array('','Liquidated Damages','','','');
        $material_data[]=array('','Validity of Offer','','','');
        $material_data[]=array('','Guarantee / Warrantee Period','','','');
        $material_data[]=array('','Remarks','','','');

        $this->excel->getActiveSheet()->fromArray($material_data, null, 'A'.$new_id_bid_row);
        $this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setWrapText(true);
        $this->excel->getActiveSheet()->getStyle('A'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('B'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                     
        $this->excel->getActiveSheet()->getStyle('D'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->getStyle('D'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('E'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->getStyle('F'.$new_id_bid)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        

        function cellsToMergeByColsRow($start = NULL, $end = NULL, $row = NULL){
            $merge = 'A1:A1';
            if($start && $end && $row){
                $start = PHPExcel_Cell::stringFromColumnIndex($start);
                $end = PHPExcel_Cell::stringFromColumnIndex($end);
                $merge = "$start{$row}:$end{$row}";
        
            }
        
            return $merge;
        }
        $column =5;
        $column1 =5;
        foreach ($final_id_vendor as $key_ven_id =>$userid_ven):
            $id_count=$times_repeat[$userid_ven];
            $new_column_vendor=($id_count*3)+$column;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($column, $new_id_bid, $userid_ven);
            $this->excel->getActiveSheet()->mergeCells(cellsToMergeByColsRow($column,($new_column_vendor-1),$new_id_bid));

            // $this->excel->getActiveSheet()->setCellValueByColumnAndRow(($column), ($new_id_bid+1), 'Quoted Price(INR)');
            // $this->excel->getActiveSheet()->mergeCells(cellsToMergeByColsRow($column,($column+3),($new_id_bid+1)));
            
                // $column1=$new_column_vendor1+1;
                for ($i=0; $i <$id_count ; $i++) {
                    if($i==0){

                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($column+$i)), ($new_id_bid+1), 'Quoted Price(INR)');
                        $this->excel->getActiveSheet()->mergeCells(cellsToMergeByColsRow((($column+$i)),(($column+$i)+2),($new_id_bid+1)));
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($column+$i)), ($new_id_bid+2), 'Unit Rate');
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($column+$i+1)), ($new_id_bid+2), 'Converted Rate');
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($column+$i+2)), ($new_id_bid+2), 'Total Price');

                       
                        $new_col=($column+$i)+3; 
                    }else{
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($new_col)), ($new_id_bid+1), ' Negotiated Price'.$i);
                        $this->excel->getActiveSheet()->mergeCells(cellsToMergeByColsRow((($new_col)),(($new_col)+2),($new_id_bid+1)));
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($new_col)), ($new_id_bid+2), 'Unit Rate');
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($new_col+1)), ($new_id_bid+2), 'Converted Rate');
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow((($new_col+2)), ($new_id_bid+2), 'Total Price');
                        $new_col=($new_col)+3;
                    }
                }            
            $column=$new_col;
        endforeach;
        $column =5;
        
        
        for($i=0;$i<count($material_data_price);$i++){
            $column =5;
            foreach ($final_id_vendor as $key_ven_id =>$userid_ven):
                for($j=0;$j<count($material_data_price[$i][$userid_ven]);$j++){
                    for($k=0;$k<count($material_data_price[$i][$userid_ven][$j]);$k++){
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($column, ($new_id_bid_row),$material_data_price[$i][$userid_ven][$j][$k] );
                        $column++;
                    }
                }
            endforeach;
            $new_id_bid_row++;
        }
       
        $filename='Pr No '.$pr_no.'__'.$highestRow.'__'.$highestRow_new.'__'.$highestRow_new_bid.'___.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
       






    }
}