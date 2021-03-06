<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Vendorusernew extends CI_Controller {
    public function __construct(){
            parent::__construct();
            // Loading my model which will use
            $this->load->model('user_model', 'user');
            $this->load->model('approver_model', 'approver_user');
            $this->load->model('design_model', 'design_user');
            $this->load->model('procurement_model', 'procurement_user');
            $this->load->model('buyer_model','buyer_user');
            $this->load->model('vendor_model','vendor_db_users');
            $this->load->model('vendor_modelnew','vendor_db_usersnew');
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
     public function vendor_new_notification_list($value=''){

      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
     $data=array('title' =>"Vendor Notification",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
     $this->load->view('vendors_user/vendor_template/v_template_header',$data);
     $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
     $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
     $this->load->view('vendors_user/vendor_notification/view_notification_list',$data);
     $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
  }
   public function vendor_bid_new_technical_list($value=''){
      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
        $data=array('title' =>"Vendor Dashboard",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('vendors_user/vendor_template/v_template_header',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
        $this->load->view('vendors_user/technical_bid_received/new_bid_information',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
   }
   public function vendor_bid_new_technical_details($value='',$value1=""){
      if($value1==5){
        $data_update=array('status_view'=>6);
        $data_id=array('slno_vendor'=>$value);
        $query=$this->db->update('master_bid_vendor_m',$data_update,$data_id);
      }
      $scripts='';
            $data=array('title' =>"Bid Information which will have detail",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','vendor_slno_id'=>$value,'value1'=>$value1);

            $page='vendors_user/technical_bid_received/view_details_technical_bid_information';

            $this->load->view('vendors_user/vendor_template/v_template_header',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
            $this->load->view($page,$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
   }
   public function vendor_bid_new_technical_details_pr($value=''){
          $Vendor_email_id=$this->session->userdata('Vendor_email_id');
          if(empty($Vendor_email_id)){

            redirect('vendor-logout-pass');
          }
          $date_created=date('Y-m-d');
          $result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_pr($value,$Vendor_email_id);
          $master_bid_id=$result_title['new_tech_list'][0]->master_bid_id;
          $pr_no=$result_title['new_tech_list'][0]->pr_no;
          $token=random_string('alnum', 8);
          $data_token_insert = array('token_no'=>$token, 'bid_id_vendor'=>$value, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id, 'submitted_status'=>0, 'date_creation'=>$date_created,'pr_no'=>$pr_no);
          $query_insert_token_id=$this->db->insert('master_vendor_tech_token_bid_c',$data_token_insert);
          redirect('seller/user-pr-vendor-tech-bid-submission-tokens/'.$value.'/'.$token.'/'.$master_bid_id);

       # code...
   }
   
   public function vendor_bid_new_technical_submission_pr($value='',$value1='',$value2=''){
        $scripts='';
           $data=array('title' =>"Vendor Bid Submission",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'token'=>$value1,'master_bid_id'=>$value2);
           $this->load->view('vendors_user/vendor_template/v_template_header',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
           $this->load->view('vendors_user/technical_bid_received/submission_bid',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
   }
    public function vendor_file_upload_data_pr_files($value=''){


      $actions_file=$this->input->post('actions_file');
      $master_bid_id=$this->input->post('master_bid_id');
      $token=$this->input->post('value_keys');
      $value_slno=$this->input->post('value_slno');
      $Vendor_email_id=$this->input->post('Vendor_email_id');
      $pr_no=$this->input->post('pr_no');
// Array ( [master_bid_id] => 1 [token] => ELXxTyY4 [value_slno] => 2 [file_name] => test [actions_file] => files_uploaded_details [Vendor_email_id] => ven121@gmail.com )
      switch ($actions_file) {
        case 'files_uploaded_details':
          $file_names=$this->input->post('file_name');
          $date=date('Y-m-d');
           $time_entry=date('H:i:s');
                if (isset($_FILES['file']) && !empty($_FILES['file'])) {
                    // $no_files = count($_FILES["file"]['name']);
                    $file_name=$_FILES["file"]["name"];
                    $file_stored_name=date('Y-m-d')."-".$_FILES["file"]["name"];
                    // for ($i = 0; $i < $no_files; $i++) {
                    if ($_FILES["file"]["error"] > 0) {
                        echo "3";
                    } else {
                        if (file_exists('upload_files/vendor_file_tech/' . $_FILES["file"]["name"])) {
                            echo '2';
                        } else {
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], 'upload_files/vendor_file_tech/' . $file_stored_name)){
                                if(!empty($file_names)){
                                  $file_names_up=$file_names;
                                }else{
                                  $file_names_up=$file_name;
                                }
                                $data_array = array('token_id'=>$token, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id, 'file_name'=>$file_names_up, 'file_attach'=>$file_stored_name, 'status'=>1, 'date_entry'=>$date, 'time_entry'=>$time_entry, 'bid_user_slno'=>$value_slno,'pr_no'=>$pr_no);
                                $query_files=$this->db->insert('master_vendor_file_token_c',$data_array);
                                echo '1' ;
                            }
                        }
                    }
                }
                break;
        case 'files_info_vendors':
              $data_array_check = array('token_id'=>$token, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id,  'bid_user_slno'=>$value_slno ,'pr_no'=>$pr_no);
                $result_file=$this->vendor_db_usersnew->get_vendors_tech_bid_file_list_pr($data_array_check);
                if($result_file['no_file_vendor']==2){
                    echo "<p class='text-center' style='color:red'><b>No File Attachment is found </b></p>";
                }else if($result_file['no_file_vendor']==1){
                    ?>
                      <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                        <thead>
                            <tr>
                                <th><strong>File Name</strong></th>
                                <th><strong>Click View</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result_file['file_vendors_list'] as $key_files){ ?>
                                <tr>
                                    <td><strong><?=$key_files->file_name?></strong></td>
                                    <td><strong><a target="_blank" href="<?=base_url()?>upload_files/vendor_file_tech/<?=$key_files->file_attach?>">Click View</a> </strong></td>
                                    <td><strong><span onclick="file_delete(<?=$key_files->slno_tech_file?>)" class="btn btn-sm btn-danger">Delete File</span></strong></td>
                                </tr>


                            <?php }?>

                        </tbody>
                    </table>
                    <?php

                }

                break;
                case 'files_info_vendors_view':
                $data_array_check = array('token_id'=>$token, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id,  'bid_user_slno'=>$value_slno,'pr_no'=>$pr_no);
                  $result_file=$this->vendor_db_usersnew->get_vendors_tech_bid_file_list_pr($data_array_check);
                  if($result_file['no_file_vendor']==2){
                      echo "<p class='text-center' style='color:red'><b>No File Attachment is found </b></p>";
                  }else if($result_file['no_file_vendor']==1){
                      ?>
                        <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                          <thead>
                              <tr>
                                  <th><strong>File Name</strong></th>
                                  <th><strong>Click View</strong></th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach($result_file['file_vendors_list'] as $key_files){ ?>
                                  <tr>
                                      <td><strong><?=$key_files->file_name?></strong></td>
                                      <td><strong><a target="_blank" href="<?=base_url()?>upload_files/vendor_file_tech/<?=$key_files->file_attach?>">Click View</a> </strong></td>
                                      
                                  </tr>
  
  
                              <?php }?>
  
                          </tbody>
                      </table>
                      <?php
  
                  }
  
                  break;
            case 'files_info_delete':
                $file_id=$this->input->post('file_id');
                $this->db->where('slno_tech_file', $file_id);
                $query_result=$this->db->get('master_vendor_file_token_c');

                $data_result=$query_result->result();
                $data_details=$data_result[0];

                $path_to_file = 'upload_files/vendor_file_tech/'.$data_details->file_attach;
                if(unlink($path_to_file)) {
                    $this->db->where('slno_tech_file', $file_id);
                    $query=$this->db->delete('master_vendor_file_token_c');
                    if($query){
                        echo "1";
                    }else{
                        echo "2";
                    }
                     // echo 'deleted successfully';
                }else {
                     echo '2';
                }

                break;
        default:
          # code...
          break;
      }
    }
    // here edit information will wbe show here
     public function vendor_tech_bid_submission_tokens_edit($value='',$value1='',$value2=''){
      $scripts='';
           $data=array('title' =>"Vendor Bid Submission",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'token'=>$value1,'master_bid_id'=>$value2);
           $this->load->view('vendors_user/vendor_template/v_template_header',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
           $this->load->view('vendors_user/technical_bid_received/submission_bid',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
    }
    public function vendor_tech_file_new_bid_submission_pr($value=''){
      // print_r($this->input->post());
      // Array ( [value_slno] => 3 [key_values_slno] => eEPklcrI [master_bid_id] => 1 [Vendor_email_id] => ven121@gmail.com [pr_no] => O18191-950-E-K-30108-001 [file_name] => [new_file] => [submission] => sent ) 
      $value_slno=$this->input->post('value_slno');
      $token=$this->input->post('key_values_slno');
      $master_bid_id=$this->input->post('master_bid_id');
      $Vendor_email_id=$this->input->post('Vendor_email_id');
      $pr_no=$this->input->post('pr_no');
      $submission=$this->input->post('submission');
      if($submission=="sent"){      
        $data_array_check = array('token_id'=>$token, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id,  'bid_user_slno'=>$value_slno );
        $result_file=$this->vendor_db_usersnew->get_vendors_tech_bid_file_list_pr($data_array_check);
        if($result_file['no_file_vendor']==2){
          $this->session->set_flashdata('error_message', 'No File has been Attached to Current bid submission please attach files');
          redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
        }else if($result_file['no_file_vendor']==1){
          $data_values = array('bid_id_vendor' =>$value_slno , 'master_bid_id'=>$master_bid_id,'vendor_id'=>$Vendor_email_id,'submitted_status'=>1);
          $check_file_submitted=$this->db->get_where('master_vendor_tech_token_bid_c',$data_values);
          if($check_file_submitted->num_rows()==0){
            $data_valuea_token = array('token_no' => $token );
            $data_updates = array('submitted_status' => 1);
            $update_query=$this->db->update('master_vendor_tech_token_bid_c',$data_updates,$data_valuea_token);                    
            if($update_query){
              $data_values_vendor = array('slno_vendor' => $value_slno);
              $vendor_sub = array('submission_status' => 1,'status_view'=>7);
              $update_query_vendor=$this->db->update('master_bid_vendor_m',$vendor_sub,$data_values_vendor);
              $this->session->set_flashdata('success_message', 'Successfully bid is submitted');
              redirect('user-vendor-home');
            }else{
              $this->session->set_flashdata('error_message', 'Something went wrong');
              redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
           }
          }else{
            foreach ($check_file_submitted->result() as $key_datavalue) {
              $data_update_id = array('Slno_token' => $key_datavalue->Slno_token );
              $data_update = array('submitted_status' => 5);
              $update_querys=$this->db->update('master_vendor_tech_token_bid_c',$data_update,$data_update_id);
            }
            $data_valuea  =array('token_no' => $token);;
            $data_updates = array('submitted_status' => 1);
            $update_query=$this->db->update('master_vendor_tech_token_bid_c',$data_updates,$data_valuea);
          // echo $this->db->last_query();
          // exit();
          if($update_query){
            $data_values_vendor = array('slno_vendor' => $value_slno);
            $vendor_sub = array('submission_status' => 1,'status_view'=>7);
            $update_query_vendor=$this->db->update('master_bid_vendor_m',$vendor_sub,$data_values_vendor);
            $this->session->set_flashdata('success_message', 'Successfully bid is submitted');
            redirect('user-vendor-home');
          }else{
               $this->session->set_flashdata('error_message', 'Something went wrong');
                redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
          }
        }
      }else{
        $this->session->set_flashdata('error_message', 'No File has been Attached to Current bid submission please attach files');
        redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
      }
    }else{
        $this->session->set_flashdata('success_message', 'Successfully Bid is drafted');
        redirect('user-vendor-home');
    }
  }
  public function vendor_tech_file_new_bid_submission_pr_view($value='',$value1='',$value2=''){
   $scripts='';
           $data=array('title' =>"Vendor Bid Submission",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value,'token'=>$value1,'master_bid_id'=>$value2);
           $this->load->view('vendors_user/vendor_template/v_template_header',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
           $this->load->view('vendors_user/technical_bid_received/submission_bid_view',$data);
           $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
  }

#############################################################################################################################
#
#
#         Commerical information working
#
#
##############################################################################################################################
  public function vendor_bid_new_commerical_list($value=''){
    $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
        $data=array('title' =>"Vendor Dashboard",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('vendors_user/vendor_template/v_template_header',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
        $this->load->view('vendors_user/commerical_bid_received/new_bid_information',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
  }
  public function vendor_bid_view_commerical_details_pr_details($value='',$value1=''){
      if($value1==5){
        $data_update=array('status_view'=>6);
        $data_id=array('slno_vendor'=>$value);
        $query=$this->db->update('master_bid_Com_vendor_m',$data_update,$data_id);
      }
      $scripts='';
      $data=array('title' =>"Commerical Bid Information which will have detail",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','vendor_slno_id'=>$value,'value1'=>$value1);
      $page='vendors_user/commerical_bid_received/view_details_commerical_bid_information';
      $this->load->view('vendors_user/vendor_template/v_template_header',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
      $this->load->view($page,$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);   
  }

  public function vendor_bid_view_commerical_details_pr_details_com($value='',$value1=''){
    $scripts='';
      $data=array('title' =>"Commerical Bid Information which will have detail",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','vendor_slno_id'=>$value,'type_bid'=>$value1);
      $page='vendors_user/commerical_bid_received/submission_commerical_page1';
      $this->load->view('vendors_user/vendor_template/v_template_header',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
      $this->load->view($page,$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);   

    # code...
  }
  public function vendor_bid_submission_commerical_save_pr($value=''){   
    // print_r($this->input->post());
    // exit;
    
    
    $mode_bid_id=$this->input->post('mode_bid_id'); // here will check if it close ranhk or simple
      $Category=$this->input->post('Category');

      $master_bid_id=$this->input->post('master_bid_id');
      $vendor_bid_id=$this->input->post('vendor_bid_id');
      $vendor_id=$this->input->post('vendor_id');
      $mode_bid=$this->input->post('mode_bid');

      $sub_total=$this->input->post('sub_total');
      $total_tax=1;
      $package=$this->input->post('package');
      $Trans=$this->input->post('Trans');
      $gst_type=1;
      // $gst_type=$this->input->post('gst_type');
      $CGST=$this->input->post('GST');
      $SGST=$this->input->post('GST');
      $IGST=$this->input->post('GST');
      $CGST_percent=$this->input->post('GST_percent');
      $SGST_percent=$this->input->post('GST_percent');
      $IGST_percent=$this->input->post('GST_percent');     
      $CGST_value=$this->input->post('GST_value');
      $SGST_value=$this->input->post('GST_value');       
      $IGST_value=$this->input->post('GST_value');

      
      $Total_GST_value=$this->input->post('Total_GST_value');

      // $total_tax=$this->input->post('total_tax');
      $total_landed=$this->input->post('total_landed');
      $user_assumption=$this->input->post('user_assumption');
      
      $price_basis=$this->input->post('price_basis');      
      $place_delivery=$this->input->post('place_delivery');
      $delivery_schedule=$this->input->post('delivery_schedule');
      $security_BG=$this->input->post('security_BG');
      $payment_terms=$this->input->post('payment_terms');
      $liquidity_damage=$this->input->post('liquidity_damage');
      $validity_of_offer=$this->input->post('validity_of_offer');
      $gaurantee_warranty=$this->input->post('gaurantee_warranty');        
      $remarks=$this->input->post('remarks');
      // $delivery_basis="Ilab_product";
         $delivery_basis=$this->input->post('delivery_basis');     
      $bid_ref=$this->input->post('bid_ref');
      $slno_mat=$this->input->post('slno_mat');
      $item_name=$this->input->post('item_name');
      $item_id=$this->input->post('item_id');
      $item_qnt=$this->input->post('item_qnt');
      $item_uom=$this->input->post('item_uom');
      $cost=$this->input->post('cost');
      $price=$this->input->post('price');
      $Resubmission_count_id=$this->input->post('Resubmission_count_id');
      $edit_id=$this->input->post('edit_id');
      $parameter_tech=$this->input->post('parameter_tech');
      $get_secher_value = array('slno_vendor' =>$vendor_bid_id );
      $get_bid_vendor=$this->db->get_where('master_bid_Com_vendor_m',$get_secher_value);
      $result_vendors=$get_bid_vendor->result();
      $commercial_resubmit_count=$result_vendors[0]->commercial_resubmit_count;
      $pr_no=$result_vendors[0]->pr_no;
      $i_accept=$this->input->post('i_accept');
       // basic information
    
             $basic_insert = array('Bid_master_id_comm'=>$master_bid_id, 'Bid_ref_no'=>$bid_ref, 'Bid_vendor_id'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id, 'type_of_bid'=>$mode_bid, 'type_bid_id'=>$mode_bid_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'i_accept'=>$i_accept);
              $query_insert=$this->db->insert('master_pr_bid_qoute',$basic_insert);
              $last_bid_insert=$this->db->insert_id();


        
            foreach ($slno_mat as $key_id => $value_ids) {
              $slno_mat_single=$slno_mat[$key_id];
              $item_name_single=$item_name[$key_id];
              $item_id_single=$item_id[$key_id];
              $item_qnt_single=$item_qnt[$key_id];
              $item_uom_single=$item_uom[$key_id];
              $cost_single=$cost[$key_id];
              $price_single=$price[$key_id];
              $parameter_tech_single=$parameter_tech[$key_id];
              $Resubmission_count_id_single=$Resubmission_count_id[$key_id];

              $get_mater_mater_id=$this->db->get_where('master_mr_material_item_comm_m',array('slno_item_mr' =>  $slno_mat_single));

              $get_item_information=$get_mater_mater_id->result();
              $Category_material=$get_item_information[0]->Category_material;
              $material_item_id=$get_item_information[0]->material_item_id;

              $item_data = array('Simple_id_slno'=>$last_bid_insert, 'Bid_master_id_com'=>$master_bid_id, 'Item_name'=>$item_name_single, 'Item_id'=>$item_id_single, 'Quantity'=>$item_qnt_single, 'Uom_unit'=>$item_uom_single, 'Unit_price'=>$cost_single, 'Total_unitprice'=>$price_single, 'Comm_item_slno'=>$slno_mat_single,  'bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'parameter_tech'=>$parameter_tech_single,'master_item_slno_material'=>$material_item_id,'Category_material'=>$Category_material,'pr_no'=>$pr_no,'Resubmission_count_id'=>$Resubmission_count_id_single);
              
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item',$item_data);

            }           
              // MISC INFORMATIO STORED ACCOIND TO BASIC INFORMATION
              $misc_insert1= array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'delivery basis','field_value'=>$delivery_basis);
              $misc_insert2 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'gaurantee warranty','field_value'=>$gaurantee_warranty);
              $misc_insert3 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'delivery schedule','field_value'=>$delivery_schedule);
              $misc_insert4 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'payment terms','field_value'=>$payment_terms);
              $misc_insert5 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'validity of offer','field_value'=>$validity_of_offer);
              $misc_insert6 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'security BG','field_value'=>$security_BG);
              $misc_insert7= array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'liquidity damage','field_value'=>$liquidity_damage);
              $misc_insert8 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'remarks','field_value'=>$remarks);
              $misc_insert9 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'price_basis','field_value'=>$price_basis);
               $misc_insert10 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'place_delivery','field_value'=>$place_delivery);
              // $query_vendor_insert=$this->db->insert('master_closed_bid_logistics',$vechile_insert);
              $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert1);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert2);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert3);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert4);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert5);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert6);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert7);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert8);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert9);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert10);  

               
               // TOTOAL PRICE ACCORDING TO BASIC INFORMATION
               $total_query = array('master_bid_id_com'=>$master_bid_id, 'simple_id_slno_total'=>$last_bid_insert, 'sub_total'=>$sub_total, 'total_tax'=>$total_tax, 'total_price'=>$total_landed, 'user_assumption_charge'=>$user_assumption, 'vendor_Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id ,'commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'package'=>$package, 'Trans'=>$Trans, 'gst_type'=>$gst_type, 'CGST'=>$CGST, 'CGST_value'=>$CGST_value, 'CGST_percent'=>$CGST_percent, 'SGST'=>$SGST, 'SGST_value'=>$SGST_value, 'SGST_percent'=>$SGST_percent, 'IGST'=>$IGST, 'IGST_value'=>$IGST_value, 'IGST_percent'=>$IGST_percent, 'total_gst_value'=>$Total_GST_value);
               $query_total_insert=$this->db->insert('master_pr_bid_qoute_item_total',$total_query);

               $data_update = array('status_view'=>7,'submission_status'=>'1','submission_count'=>1);
               $data_update_id = array('slno_vendor' => $vendor_bid_id );  
                $query_update_exe=$this->db->update('master_bid_Com_vendor_m',$data_update,$data_update_id);  

                 $this->session->set_flashdata('success_message', ' Successfully Commerical Bid is submitted');

                redirect('seller/user-vendor-home');
      
  }

  public function vendor_bid_submission_commerical_save_pr_rank($value=''){
    
    // 
    $url=$this->input->post('url');

    $mode_bid_id=$this->input->post('mode_bid_id'); // here will check if it close ranhk or simple
      $Category=$this->input->post('Category');

      $master_bid_id=$this->input->post('master_bid_id');
      $vendor_bid_id=$this->input->post('vendor_bid_id');
      $vendor_id=$this->input->post('vendor_id');
      $mode_bid=$this->input->post('mode_bid');

      $sub_total=$this->input->post('sub_total');
      // $total_tax=$this->input->post('total_tax');
      $total_tax=1;
      $package=$this->input->post('package');
      $Trans=$this->input->post('Trans');
       $gst_type=1;
      // $gst_type=$this->input->post('gst_type');
      $CGST=$this->input->post('GST');
      $SGST=$this->input->post('GST');
      $IGST=$this->input->post('GST');
      $CGST_percent=$this->input->post('GST_percent');
      $SGST_percent=$this->input->post('GST_percent');
      $IGST_percent=$this->input->post('GST_percent');     
      $CGST_value=$this->input->post('GST_value');
      $SGST_value=$this->input->post('GST_value');       
      $IGST_value=$this->input->post('GST_value');
      // $gst_type=$this->input->post('gst_type');
      // $CGST=$this->input->post('CGST');
      // $SGST=$this->input->post('SGST');
      // $IGST=$this->input->post('IGST');
      // $CGST_percent=$this->input->post('CGST')*100;
      // $SGST_percent=$this->input->post('SGST')*100;
      // $IGST_percent=$this->input->post('IGST')*100;
     
      
      // if($gst_type==1){
      //   $CGST_value=$this->input->post('CGST_value');
      //   $SGST_value=$this->input->post('SGST_value');
      //   $IGST_value='0.00';
      // }else{
      //   $CGST_value='0.00';
      //   $SGST_value='0.00';
      //   $IGST_value=$this->input->post('IGST_value');

      // }
      $Total_GST_value=$this->input->post('Total_GST_value');

      $total_landed=$this->input->post('total_landed');
      $user_assumption=$this->input->post('user_assumption');

      $price_basis=$this->input->post('price_basis');
      $place_delivery=$this->input->post('place_delivery');      
      $delivery_basis=$this->input->post('delivery_basis');
      $gaurantee_warranty=$this->input->post('gaurantee_warranty');
      $delivery_schedule=$this->input->post('delivery_schedule');
      $payment_terms=$this->input->post('payment_terms');
      $validity_of_offer=$this->input->post('validity_of_offer');
      $security_BG=$this->input->post('security_BG');
      $liquidity_damage=$this->input->post('liquidity_damage');
      $remarks=$this->input->post('remarks');
     
      $bid_ref=$this->input->post('bid_ref');


      $slno_mat=$this->input->post('slno_mat');
      $item_name=$this->input->post('item_name');
      $item_id=$this->input->post('item_id');
      $item_qnt=$this->input->post('item_qnt');
      $item_uom=$this->input->post('item_uom');
      $cost=$this->input->post('cost');
      $price=$this->input->post('price');
      $Resubmission_count_id=$this->input->post('Resubmission_count_id');
      $edit_id=$this->input->post('edit_id');
      $parameter_tech=$this->input->post('parameter_tech');
      $get_secher_value = array('slno_vendor' =>$vendor_bid_id );
      $get_bid_vendor=$this->db->get_where('master_bid_Com_vendor_m',$get_secher_value);
      $result_vendors=$get_bid_vendor->result();
      $commercial_resubmit_count=$result_vendors[0]->commercial_resubmit_count;
      $pr_no=$result_vendors[0]->pr_no;
      $i_accept=$this->input->post('i_accept');

      // $delivery_basis="Ilab_product";
       // basic information
    
             $basic_insert = array('Bid_master_id_comm'=>$master_bid_id, 'Bid_ref_no'=>$bid_ref, 'Bid_vendor_id'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id, 'type_of_bid'=>$mode_bid, 'type_bid_id'=>$mode_bid_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'i_accept'=>$i_accept);
              $query_insert=$this->db->insert('master_pr_bid_qoute',$basic_insert);
              $last_bid_insert=$this->db->insert_id();


        
            foreach ($slno_mat as $key_id => $value_ids) {
              $slno_mat_single=$slno_mat[$key_id];
              $item_name_single=$item_name[$key_id];
              $item_id_single=$item_id[$key_id];
              $item_qnt_single=$item_qnt[$key_id];
              $item_uom_single=$item_uom[$key_id];
              $cost_single=$cost[$key_id];
              $price_single=$price[$key_id];
              $parameter_tech_single=$parameter_tech[$key_id];
              $Resubmission_count_id_single=$Resubmission_count_id[$key_id];

              $get_mater_mater_id=$this->db->get_where('master_mr_material_item_comm_m',array('slno_item_mr' =>  $slno_mat_single));

              $get_item_information=$get_mater_mater_id->result();
              $Category_material=$get_item_information[0]->Category_material;
              $material_item_id=$get_item_information[0]->material_item_id;

              $item_data = array('Simple_id_slno'=>$last_bid_insert, 'Bid_master_id_com'=>$master_bid_id, 'Item_name'=>$item_name_single, 'Item_id'=>$item_id_single, 'Quantity'=>$item_qnt_single, 'Uom_unit'=>$item_uom_single, 'Unit_price'=>$cost_single, 'Total_unitprice'=>$price_single, 'Comm_item_slno'=>$slno_mat_single,  'bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'parameter_tech'=>$parameter_tech_single,'master_item_slno_material'=>$material_item_id,'Category_material'=>$Category_material,'pr_no'=>$pr_no,'Resubmission_count_id'=>$Resubmission_count_id_single);
              
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item',$item_data);

            }           
              // MISC INFORMATIO STORED ACCOIND TO BASIC INFORMATION
              $misc_insert1= array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'delivery basis','field_value'=>$delivery_basis);
              $misc_insert2 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'gaurantee warranty','field_value'=>$gaurantee_warranty);
              $misc_insert3 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'delivery schedule','field_value'=>$delivery_schedule);
              $misc_insert4 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'payment terms','field_value'=>$payment_terms);
              $misc_insert5 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'validity of offer','field_value'=>$validity_of_offer);
              $misc_insert6 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'security BG','field_value'=>$security_BG);
              $misc_insert7= array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'liquidity damage','field_value'=>$liquidity_damage);
              $misc_insert8 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'remarks','field_value'=>$remarks);
               $misc_insert9 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'price_basis','field_value'=>$price_basis);
               $misc_insert10 = array('commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'master_bid_id_com'=>$master_bid_id, 'simple_id_slno_misc'=>$last_bid_insert, 'Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id,'field_name'=>'place_delivery','field_value'=>$place_delivery);
              // $query_vendor_insert=$this->db->insert('master_closed_bid_logistics',$vechile_insert);
              $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert1);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert2);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert3);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert4);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert5);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert6);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert7);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert8);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert9);
               $query_vendor_insert=$this->db->insert('master_pr_bid_qoute_item_misc',$misc_insert10);  

               
               // TOTOAL PRICE ACCORDING TO BASIC INFORMATION
               $total_query = array('master_bid_id_com'=>$master_bid_id, 'simple_id_slno_total'=>$last_bid_insert, 'sub_total'=>$sub_total, 'total_tax'=>$total_tax, 'total_price'=>$total_landed, 'user_assumption_charge'=>$user_assumption, 'vendor_Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id ,'commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no,'package'=>$package, 'Trans'=>$Trans, 'gst_type'=>$gst_type, 'CGST'=>$CGST, 'CGST_value'=>$CGST_value, 'CGST_percent'=>$CGST_percent, 'SGST'=>$SGST, 'SGST_value'=>$SGST_value, 'SGST_percent'=>$SGST_percent, 'IGST'=>$IGST, 'IGST_value'=>$IGST_value, 'IGST_percent'=>$IGST_percent, 'total_gst_value'=>$Total_GST_value);
               $query_total_insert=$this->db->insert('master_pr_bid_qoute_item_total',$total_query);
               // $total_query = array('master_bid_id_com'=>$master_bid_id, 'simple_id_slno_total'=>$last_bid_insert, 'sub_total'=>$sub_total, 'total_tax'=>$total_tax, 'total_price'=>$total_landed, 'user_assumption_charge'=>$user_assumption, 'vendor_Bid_slno'=>$vendor_bid_id, 'Vendor_id'=>$vendor_id ,'commercial_resubmit_count'=>$commercial_resubmit_count,'pr_no'=>$pr_no);
               // $query_total_insert=$this->db->insert('master_pr_bid_qoute_item_total',$total_query);

               $data_update = array('status_view'=>7,'submission_status'=>'1','submission_count'=>1);
               $data_update_id = array('slno_vendor' => $vendor_bid_id );  
                $query_update_exe=$this->db->update('master_bid_Com_vendor_m',$data_update,$data_update_id);  

                 $this->session->set_flashdata('success_message', 'Successfully bid is submitted');

                redirect($url);
   

  
  }
  public function user_vendor_bid_commerical_submission_bid_view($vendor_slno_id='',$bid_type_id='',$Slno_simple=''){
     $scripts='';
      $data=array('title' =>"Commerical Bid Information which will have detail",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','vendor_slno_id'=>$vendor_slno_id,'type_bid'=>$bid_type_id,'Slno_simple'=>$Slno_simple);
      $page='vendors_user/commerical_bid_received/view_commerical_page1';
      $this->load->view('vendors_user/vendor_template/v_template_header',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
      $this->load->view($page,$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data); 
  }

public function vendor_commerical_query_panel($value=''){

     $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Vendor Dashboard",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value);
            $this->load->view('vendors_user/vendor_template/v_template_header',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);

            $this->load->view('vendors_user/commerical_bid_received/query_panel_commercial',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);



    }
     public function vendor_new_auction_list_pr($value=''){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
        $data=array('title' =>"Vendor Notification",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','slno_approve'=>$value);
         $this->load->view('vendors_user/vendor_template/v_template_header',$data);
         $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
         $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
         $this->load->view('vendors_user/vendor_bid_details_rank/vendor_bid_details_list',$data);
         $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
    }
    public function vendor_rank_bid_order_pr($pr_slno='',$vendor_id_bid='',$master_bid_id='',$slno_approve=''){
      if(($pr_slno!="") && ($vendor_id_bid!="") &&($master_bid_id!="")&&($slno_approve!="")){
        // if($value==3){
        //    $page="vendors_user/RANK_ENTRY/rank_page2_logistic";
        // }else if(($value==2) || ($value==1)){
        //   $page="vendors_user/RANK_ENTRY/rank_page1_mo_sci";
        // }else{
        //   $this->session->set_flashdata('error_message', 'something went worng');
        //   redirect('user-vendor-home'); 
        // }
          $PAGE="vendors_user/vendor_bid_details_rank/submission_commerical_page1";
        $scripts='<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script> <script src="'.base_url().'file_css_admin/clocl.js"></script><script type="text/javascript"  src="'.base_url().'file_css_admin/counter/jquery.countdownTimer.js"></script>';
        $data=array('title' =>"Vendor Notification",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_slno'=>$pr_slno,'vendor_id_bid'=>$vendor_id_bid,'master_bid_id'=>$master_bid_id,'slno_approve'=>$slno_approve);
        $this->load->view('vendors_user/vendor_template/v_template_header',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
        $this->load->view($PAGE,$data);
        $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
      }else{
        $this->session->set_flashdata('error_message', 'Something went wrong');
        redirect('user-vendor-home'); 
      }
    }
    public function vendor_commerical_attachment_panel($value=''){
      $scripts='';
      $data=array('title' =>"Vendor Attachment Upload",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value);
      $this->load->view('vendors_user/vendor_template/v_template_header',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);

      $this->load->view('vendors_user/term_condition/attach_files',$data);
      $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
    }
    public function vendor_bid_term_attach_files(){
      $Vendor_email_id=$this->session->userdata('Vendor_email_id');
    if(empty($Vendor_email_id)){
      
      redirect('vendor-logout-pass');
    }
      // Array ( [bid_ref] => 6687 [slno_vendor_id_master] => 5 [bid_id] => 9963 [pr_no] => O18191-950-E-K-30111-001 [commercial_resubmit_count] => 0 [comm_vendor_slno] => 10 ) 
      print_r($this->input->post());
      $comm_vendor_slno=$this->input->post('comm_vendor_slno');
      $bid_ref=$this->input->post('bid_ref');
      $slno_vendor_id_master=$this->input->post('slno_vendor_id_master');
      $bid_id=$this->input->post('bid_id');
      $pr_no=$this->input->post('pr_no');
      $commercial_resubmit_count=$this->input->post('commercial_resubmit_count');
      $master_bid_id=$this->input->post('master_bid_id');
      if (isset($_FILES['term_file']) && !empty($_FILES['term_file'])) {
        // $no_files = count($_FILES["file"]['name']);
        $file_name=$_FILES["term_file"]["name"];
        $file_stored_name=date('hisHis').date('Y-m-d')."-".$_FILES["term_file"]["name"];
        // for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["term_file"]["error"] > 0) {
          $this->session->set_flashdata('error_message', 'Please attach File ');
          redirect('seller/user-vendor-commerical-attachment-panel/'.$comm_vendor_slno); 
        } else {
            if (file_exists('upload_files/vendor_file_tech/' . $file_stored_name)) {
              $this->session->set_flashdata('error_message', 'File is already in our record, please try to upload in other file name');
              redirect('seller/user-vendor-commerical-attachment-panel/'.$comm_vendor_slno); 
            } else {
                if(move_uploaded_file($_FILES["term_file"]["tmp_name"], 'upload_files/vendor_term_file/' . $file_stored_name)){
                    // `comm_vendor_slno`, `bid_ref`, `slno_vendor_id_master`, `bid_id`, `pr_no`, `file_name_stored`, `status_file`, `date_upload`, `vendor_id`, `date_update`
                  $data_array = array('vendor_id'=>$Vendor_email_id, 'file_name'=>$file_name, 'file_name_stored'=>$file_stored_name, 'status_file'=>1,'comm_vendor_slno'=>$comm_vendor_slno,'bid_ref'=>$bid_ref,'slno_vendor_id_master'=>$slno_vendor_id_master,'bid_id'=>$bid_id,'pr_no'=>$pr_no,'commercial_resubmit_count'=>$commercial_resubmit_count ,'master_bid_id'=>$master_bid_id);
                    $query_files=$this->db->insert('master_bid_Com_vendor_term_m ',$data_array);
                    $this->session->set_flashdata('success_message', 'Successfully Uploaded');
                    redirect('seller/user-vendor-home');
                }
            }
        }
      }else{
        $this->session->set_flashdata('error_message', 'Please attach File ');
        redirect('seller/user-vendor-commerical-attachment-panel/'.$comm_vendor_slno);
      }

    }
    public function get_user_ranks(){

      // print_r($this->input->post());
       $bid_id=$this->input->post('bid_id');
       $project=$this->input->post('project');
      
      $ranks=$this->vendor_db_usersnew->vendor_new_commerical_rank_calculation_pr($bid_id,$project);
      // print_r($ranks);
      // $rank=$ranks['rank'];
      // $sub_total=$ranks['sub_total'];
      // $data = array('rank'=>$rank,'sub_total'=>$sub_total);
      echo json_encode($ranks);
     
    }
  }