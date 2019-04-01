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
     public function buyer_user_create_new_pr($value='',$value1='',$value2='',$value3=''){

        $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>  <script type="text/javascript" src="'.base_url().'asserts/ckeditor/ckeditor.js"></script><script type="text/javascript" src="'.base_url().'asserts/ckfinder/ckfinder.js"></script>';
        $data=array('title' =>"List of bid completed by commerical evulation ",'script_js'=>$scripts,'menu_status'=>'10','sub_menu'=>'10','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$value,'Pr_no_slno'=>$value1,'Project_slno'=>$value2,'redirect'=>$value3);
        $this->load->view('template/template_header',$data);
        $this->load->view('buyer_user/template/template_top_head');
        $this->load->view('buyer_user/template/template_side_bar',$data);
        if($value3==2){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_comm',$data);
        }else if($value3==1){
            $this->load->view('buyer_user/buyer_pr_schedule/create_bid_pr_infromation_form_tech',$data);
        } 
        $this->load->view('template/template_footer',$data);

        # code...
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

            }else if($submission=='Sent'){
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

            }else if($submission=='Sent'){
                $data_master_bid = array('pr_slno'=>$slno_pr, 'pr_no'=>$pr_no, 'edit_id'=>$edit_type_bid);
                $update_status_master = array('status_bid'=>'1');
                $this->db->update('master_bid_Com_m',$update_status_master,$data_master_bid);
                $data_update_id = array('pr_slno'=>$slno_pr,'pr_no'=>$pr_no,'edit_id_bid'=>$edit_type_bid);
                $date_date_status = array('status' => 1);
                $date_date_status_vendor = array('status' => 1,'status_active'=>1);

                $this->db->update('master_bid_Com_date_details_m',$date_date_status,$data_update_id);
                $this->db->update('master_bid_Com_evaluation_m',$update_status_master,$data_update_id);

                $this->db->update('master_bid_Com_vendor_m',$date_date_status_vendor,$data_update_id);
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

}