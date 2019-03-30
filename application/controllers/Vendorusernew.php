<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
                                $data_array = array('token_id'=>$token, 'master_bid_id'=>$master_bid_id, 'vendor_id'=>$Vendor_email_id, 'file_name'=>$file_names, 'file_attach'=>$file_stored_name, 'status'=>1, 'date_entry'=>$date, 'time_entry'=>$time_entry, 'bid_user_slno'=>$value_slno,'pr_no'=>$pr_no);
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
                    echo "<p class='text-center' style='color:red'><b>No File Attachment is found for this MR Request no</b></p>";
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
                      echo "<p class='text-center' style='color:red'><b>No File Attachment is found for this MR Request no</b></p>";
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
          $this->session->set_flashdata('error_message', 'No File is been Attached to Current bid submission please attach files');
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
              $this->session->set_flashdata('success_message', 'successfully Bid is submitted');
              redirect('user-vendor-home');
            }else{
              $this->session->set_flashdata('error_message', 'Some thing Went wrong');
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
            $this->session->set_flashdata('success_message', 'successfully Bid is submitted');
            redirect('user-vendor-home');
          }else{
               $this->session->set_flashdata('error_message', 'Some thing Went wrong');
                redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
          }
        }
      }else{
        $this->session->set_flashdata('error_message', 'No File is been Attached to Current bid submission please attach files');
        redirect('seller/user-vendor-tech-bid-submission-tokens-info/'.$value_slno.'/'.$token .'/'.$master_bid_id );
      }
    }else{
        $this->session->set_flashdata('success_message', 'successfully Bid is Drafted');
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
  public function view_commerical_details_pr_list($value='',$value1=''){
      if($value1==5){
        $data_update=array('status_view'=>6);
        $data_id=array('slno_vendor'=>$value);
        $query=$this->db->update('master_bid_Com_vendor_m',$data_update,$data_id);
      }
      $scripts='';
            $data=array('title' =>"Commerical Bid Information which will have detail",'script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','vendor_slno_id'=>$value,'value1'=>$value1);

            $page='vendors_user/commerical_bid_received/view_details_technical_bid_information';

            $this->load->view('vendors_user/vendor_template/v_template_header',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_head',$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_menu',$data);
            $this->load->view($page,$data);
            $this->load->view('vendors_user/vendor_template/v_template_top_footer',$data);
    # code...
  }
}
