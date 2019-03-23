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

    }
     public function buyer_user_create_new_pr($value='',$value1='',$value2='',$value3=''){

        $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
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
                                    <td><button class="add_cart btn btn-success btn-block" data-productid="<?php echo $value_id_vender->Slno_vendor;?>" data-productprice="<?php echo $value_id_vender->Organisation_name;?>">Add To Cart</button></td>
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

}