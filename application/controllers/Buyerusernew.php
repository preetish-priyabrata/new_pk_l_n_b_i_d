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

        $query=$this->db->get('master_vendor_detail');
        print_r($this->cart->contents());
        foreach ($this->cart->contents() as $items) {
            $ID_VENDORS=$items['id'];
             $query=$this->db->get_where('master_vendor_detail', array('Slno_vendor' => $ID_VENDORS));
             $results_id=$query->result();

        }
                            // 

        // $items['id'];
        // Array ( [a87ff679a2f3e71d9181a67b7542122c] => Array ( [id] => 4 [name] => INFOLEX METAMORF BUSINESS SOLUTIONS PRIVATE LIMITED [qty] => 1 [price] => 1 [rowid] => a87ff679a2f3e71d9181a67b7542122c [subtotal] => 1 ) [c81e728d9d4c2f636f067f89cc14862c] => Array ( [id] => 2 [name] => vendor pvt ltd [qty] => 1 [price] => 1 [rowid] => c81e728d9d4c2f636f067f89cc14862c [subtotal] => 1 ) [c20ad4d76fe97759aa27a0c99bff6710] => Array ( [id] => 12 [name] => TTS [qty] => 1 [price] => 1 [rowid] => c20ad4d76fe97759aa27a0c99bff6710 [subtotal] => 1 ) ) 

        if($submission=='Save'){

        }else if($submission=='Sent'){

        }else{

        }
    }

}