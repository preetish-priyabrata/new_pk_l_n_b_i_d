<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designusernew extends CI_Controller {
    public function __construct(){
            parent::__construct();
            // Loading my model which will use
            $this->load->model('user_model', 'user'); 
            $this->load->model('design_model', 'design_user');
             
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

         $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }

    }
    /**
     * [design_project_pr_schedule description] here project module is done here 
     * @param  string $value [here no value is done ]
     * @return [type]        [description]
     */
    public function design_project_pr_schedule($value=''){
          $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }
          $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';

        $data=array('title' =>"View Project Mr Schedule list",'script_js'=>$scripts ,'menu_status'=>'3','sub_menu'=>'6','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');  

            $this->load->view('template/template_header',$data);
            $this->load->view('design_user/template/template_top_head');
            $this->load->view('design_user/template/template_side_bar',$data);
            $this->load->view('design_user/new_pr_schedule_design/project_pr_schedule');
            $this->load->view('template/template_footer',$data);
    }
    public function design_project_pr_schedule_api($value=''){
       $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
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
    public function design_new_mr_pr_list($value='', $value1="" ,$value2=""){
         $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }
        $_SESSION["cart_item"]="";
        $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';

        $data=array('title' =>"Create New Material Requisition",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$value,'slno_pr'=>$value1,'job_code'=>$value2);  

            $this->load->view('template/template_header',$data);
            $this->load->view('design_user/template/template_top_head');
            $this->load->view('design_user/template/template_side_bar',$data);
            $this->load->view('design_user/new_mr_requisition/Create_material_requisition_form',$data);
            $this->load->view('template/template_footer',$data);
        # code...
    }
    public function design_new_material_search_get($value=''){
      // print_r($this->input->post());
      // Array ( [name] => test [type] => electrical ) 
      $type=$this->input->post('type');
      $name=$this->input->post('name');
      $data = array('category_name' => $type ,'status'=>1);
      # code...
        if(!empty($name)){
          $this->db->like('material_item_name', $name);
        }
        $query=$this->db->get_where('master_category_item',$data);

        $output = '
                  <h3 align="center">Total Data - '.$query->num_rows().'</h3>
                  <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>                        
                        <th>Technical Parameter </th>
                        <th>UOM</th>
                         <th>Quantity</th>
                        <th>Action</th> 
                    </tr>
                ';
                 if(!empty($_SESSION["cart_item"])) {
                   $session_code_arrays = ($_SESSION["cart_item"]);
                  foreach ($session_code_arrays as $key) {
                    $session_code_arrays_id[]=$key['code'];
                 }
               }
                foreach($query->result() as $row){
                    $in_session = "0";
                      if(!empty($_SESSION["cart_item"])) {
                        $session_code_array = array_keys($_SESSION["cart_item"]);
                        // print_r($session_code_array);
                        // print_r($_SESSION["cart_item"]);
                       
                        foreach ($session_code_arrays as $key) {
                          // print_r($key);
                          if(in_array($row->slno_master_item,$session_code_arrays_id)) {
                          // $in_session = "1";
$str= <<<EOT
<input type="button" id="added_{$row->slno_master_item}" value="Added" class="btnAdded" />
EOT;
                          }else{
$str = <<<EOT
<input type="button" id="add_{$row->slno_master_item}" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','{$row->slno_master_item}')"/>
                          
EOT;
                          }
                        }
                          
                      }else{
$str = <<<EOT
<input type="button" id="add_{$row->slno_master_item}" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','{$row->slno_master_item}')"/>
                          
EOT;
                      }

                    $output .= ' 

                    <tr>
                      <td>'.$row->material_item_name.'</td>
                      <td>'.$row->technical_details.'</td>
                      <td>'.$row->uom .'</td>
                      <td><input type="text" id="qty_'.$row->slno_master_item .'" name="quantity" value="1" size="2" /></td>
                      
                      <td>
                        '.$str.'
                      </td>
                    </tr>
                    ';
                }
                $output .= '</table>';
                echo $output;
                exit;
        
    }
    public function design_new_material_search_reset($value=''){
       $_SESSION["cart_item"]="";
        unset($_SESSION['cart_item']);
        $_SESSION["cart_item"]="";
       echo 1;
      
    }
    // public function design_new_item_required_session($value=''){
    //   print_r($this->input->post());
    // }
   public function design_new_cart_services($value=''){
     // print_r($this->input->post());
      $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }   

        // $Mr_no=$this->input->post('Mr_no');
        // $slno_Mr_no=$this->input->post('slno_Mr_no');

        if(!empty($this->input->post('action'))) {
          switch ($this->input->post('action')) {
            case 'add':
              $data = array('slno_master_item' => $this->input->post('code'));              
              $query=$this->db->get_where('master_category_item',$data);   
               $material_quantity=$this->input->post('quantity');
               $code=$this->input->post('code');
               foreach ($query->result() as $row) {
                   $itemArray = array($code=>array('name'=>$row->material_item_name, 'technical_details'=>$row->technical_details , 'quantity'=>$material_quantity, 'item_uom'=>$row->uom ,'code'=>$code));
                      if(!empty($this->session->userdata('cart_item'))) {
                          $_SESSION["cart_item"] = array_merge($this->session->userdata('cart_item'),$itemArray);
                          // print_r($_SESSION["cart_item"]);
                      } else {
                          $_SESSION["cart_item"] = $itemArray;
                           // print_r($_SESSION["cart_item"]);
                      }
                 # code...
               }
      
              if(!empty($_SESSION["cart_item"])){
                $sess_cart_item=$_SESSION["cart_item"];
                // $cart_item_tech_sess=$_SESSION["cart_item_tech"];
                // print_r($sess_cart_item);
                $item_total = 0;
                $id=0;
               
              
                ?>
                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                  <thead>
                      <tr>
                          <th><strong>Name</strong></th>
                          <th><strong>Technical Paramete</strong></th>
                          <th><strong>UOM</strong></th>
                          <th><strong>Quantity</strong></th>           
                          <th><strong>Action</strong></th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                   foreach($sess_cart_item as $item){
echo <<<EOD
<tr>
<td><strong><input type="hidden" name="material_name[{$id}]" value="{$item['name']}">
<input type="hidden" name="codes[{$id}]" value="{$item['code']}">{$item['name']}</strong></td>
<td><strong><input type="hidden" name="technical_details[{$id}]" value="{$item['technical_details']}">{$item['technical_details']}</strong></td>
<td><strong><input type="hidden" name="item_uom[{$id}]" value="{$item['item_uom']}">{$item['item_uom']}</strong></td>
<td><strong><input type="hidden" name="quantitys[{$id}]" value="{$item['quantity']}">{$item['quantity']}</strong></td>
<td><strong><a onClick="cartAction('remove',{$item['code']},'{$id}')" class=" btn btnRemoveAction cart-action">Remove Item</a></strong></td>
</tr>
EOD;
$id++;
           }   
                 ?>
               </tbody>
             </table>
               <?php 

              }
              break;
            case 'remove':
            // print_r($this->input->post());
               $code=$this->input->post('code');
                     $codes_value=$this->input->post('codes_value');               
                        if(!empty($_SESSION["cart_item"])) {
                            // foreach($_SESSION["cart_item"] as $k =>$value) {
                             $session_code_array = array_keys($_SESSION["cart_item"]);
                                if(in_array($codes_value,$session_code_array)) {
                                    unset($_SESSION["cart_item"][$codes_value]);
                                }   
                            $_SESSION["cart_item"] = array_values($_SESSION["cart_item"]);
                             // $_SESSION["cart_item"] = array_map('array_values', $arr);
                            // }
                            
                        } 
                      if(!empty($_SESSION["cart_item"])){
                $sess_cart_item=$_SESSION["cart_item"];
                // $cart_item_tech_sess=$_SESSION["cart_item_tech"];
                // print_r($sess_cart_item);
                $item_total = 0;
                $id=0;
               
              
                ?>
                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                  <thead>
                      <tr>
                          <th><strong>Name</strong></th>
                          <th><strong>Technical Paramete</strong></th>
                          <th><strong>UOM</strong></th>
                          <th><strong>Quantity</strong></th>           
                          <th><strong>Action</strong></th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                   foreach($sess_cart_item as $item){
echo <<<EOD
<tr>
<td><strong><input type="hidden" name="material_name[{$id}]" value="{$item['name']}">
<input type="hidden" name="codes[{$id}]" value="{$item['code']}">{$item['name']}</strong></td>
<td><strong><input type="hidden" name="technical_details[{$id}]" value="{$item['technical_details']}">{$item['technical_details']}</strong></td>
<td><strong><input type="hidden" name="item_uom[{$id}]" value="{$item['item_uom']}">{$item['item_uom']}</strong></td>
<td><strong><input type="hidden" name="quantitys[{$id}]" value="{$item['quantity']}">{$item['quantity']}</strong></td>
<td><strong><a onClick="cartAction('remove',{$item['code']},'{$id}')" class=" btn btnRemoveAction cart-action">Remove Item</a></strong></td>
</tr>
EOD;
$id++;
           }   
                 ?>
               </tbody>
             </table>
               <?php 

              }

                    break;

          }
        }
   }
   public function design_file_upload_data_m($value=''){
    // print_r($this->input->post());
    //   print_r($_FILES);
      // Array ( [pr_no] => O18191-950-E-K-30101-001 [slno_pr] => 1 [job_code] => 1 [edit_type] => 1 [job_files_name] => new file [actions_file] => files_uploaded_details ) Array ( [file] => Array ( [name] => 3.png [type] => image/png [tmp_name] => /tmp/phpbnLVt6 [error] => 0 [size] => 584805 ) ) 
      // iles_info [pr_no] => O18191-950-E-K-30101-001 [slno_pr] => 1 [job_code] => 1 ) Array ( ) 
      $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }
        $actions_file=$this->input->post('actions_file');
        $pr_no=$this->input->post('pr_no');
        $slno_pr=$this->input->post('slno_pr');
        $job_code=$this->input->post('job_code');
        switch ($actions_file) {
            case 'files_uploaded_details':
              $edit_type=$this->input->post('edit_type');
              $job_files_name=$this->input->post('job_files_name');
                if (isset($_FILES['file']) && !empty($_FILES['file'])) {
                    // $no_files = count($_FILES["file"]['name']);
                    $file_name=$_FILES["file"]["name"];
                    $file_stored_name=date('Y-m-d')."-".$_FILES["file"]["name"];
                    // for ($i = 0; $i < $no_files; $i++) {
                    if ($_FILES["file"]["error"] > 0) {
                        echo "3";
                    } else {
                        if (file_exists('upload_files/design_upload/' . $_FILES["file"]["name"])) {
                            echo '2';
                        } else {
                          // `pr_no`, `pr_no_slno`, `file_title`, `edit_id`, `attach_name`, `file_name_actucal`job_code_slno
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], 'upload_files/design_upload/' . $file_stored_name)){
                                $data_array = array('pr_no'=>$pr_no, 'pr_no_slno'=>$slno_pr, 'attach_name'=>$file_stored_name, 'file_name_actucal'=>$file_name,'job_code_slno'=>$job_code,'edit_id'=>$edit_type,'file_title'=>$job_files_name,'attach_by'=>$email_id);
                                $query_files=$this->db->insert('master_mr_file_upload_m',$data_array);
                                echo '1' ;  
                            }
                        }                
                    }            
                } 
                break;
             case 'files_info':
                $result_file=$this->design_user->get_design_mr_file_list_m($pr_no,$slno_pr,$job_code);
                if($result_file['no_files']==2){
                    echo "<p class='text-center' style='color:red'><b>No File Attachment is found for this MR Request no</b></p>";
                }else if($result_file['no_files']==1){
                    ?>
                      <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                        <thead>
                            <tr>
                                <th><strong>File Title Name</strong></th>
                                <th><strong>Click View</strong></th>                                
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result_file['files_list'] as $key_files){ ?>
                                <tr>
                                    <td><strong><?=$key_files->file_title?></strong></td>
                                    <td><strong><a target="_blank" href="<?=base_url()?>upload_files/design_upload/<?=$key_files->attach_name?>">Click View</a> </strong></td>                                
                                    <td><strong><span onclick="file_delete(<?=$key_files->slno_file?>)" class="btn btn-sm btn-danger">Delete File</span></strong></td>
                                </tr> 


                            <?php }?>

                        </tbody>
                    </table>
                    <?php

                }

                break;
            case 'files_info_delete':
                $file_id=$this->input->post('file_id');
                $this->db->where('slno_file', $file_id);
                $query_result=$this->db->get('master_mr_file_upload_m');

                $data_result=$query_result->result();
                $data_details=$data_result[0];

                $path_to_file = 'upload_files/design_upload/'.$data_details->attach_name;
                if(unlink($path_to_file)) {
                    $this->db->where('slno_file', $file_id);
                    $query=$this->db->delete('master_mr_file_upload_m');
                    if($query){
                        echo "1";
                    }else{
                        echo "2";
                    }
                     // echo 'deleted successfully';
                }
                else {
                     echo '2';
                }                

                break;
             
            default:
                # code...
                break;
        }      

     
   }
   public function design_add_new_pr_save($value=''){    
      $email_id=$this->session->userdata('design_email_id');
      if(empty($email_id)){            
          redirect('design-logout-by-pass');
      }
      //  if session of user is expired
      
      $pr_no=$this->input->post('pr_no');
      $slno_pr=$this->input->post('slno_pr');
      $job_code=$this->input->post('job_code');
      $pr_no_type=$this->input->post('pr_no_type');
      $edit_type=$this->input->post('edit_type');
      $tech_evalution=$this->input->post('tech_evalution');
      $required_date=$this->input->post('required_date');
      $approver_id=$this->input->post('approver_id');
      $material_category_name=$materials_id=$this->input->post('materials_id');
      $mr_date_of_creation=$this->input->post('mr_date_of_creation');
      $job_files_name=$this->input->post('job_files_name');
      $job_files=$this->input->post('job_files');
      $quantity=$this->input->post('quantity');
      $material_name=$this->input->post('material_name');
      $codes=$this->input->post('codes');
      $technical_details=$this->input->post('technical_details');
      $item_uom=$this->input->post('item_uom');
      $quantitys=$this->input->post('quantitys');
      $submission=$this->input->post('submission');

      $date_submition=$date_entry=date('Y-m-d');
      $time_submition=$time_entry=date('H:i:s');
      #######################################################################
      $resut=$this->design_user->get_design_mr_file_list_check_m($pr_no,$slno_pr,$job_code);
      if($resut['no_files']==2){ // here its check where appliaction having file uploaded or not
        $this->session->set_flashdata('error_message', 'No file has been uploaded. Kindly upload at least one file to proceed further ');
        redirect('design-mr-new-create/'.$pr_no.'/'.$slno_pr.'/'.$job_code);
      } 
      // if file is not found
      #####################################################################
      $get_check_mr=$this->design_user->get_design_mr_no_check_m($pr_no);

      $job_code_detail=$this->design_user->get_design_job_single($job_code,$email_id);    // Job code details
        if($job_code_detail['no_job_code']==1){
          $job_code_id_slno=$job_code_detail['job_code_list'][0]->Project_Slno;
          $job_Code_nos=$job_code_detail['job_code_list'][0]->job_Code;    
          $Project_Name=$job_code_detail['job_code_list'][0]->Project_Name;
          
        }else{
          $this->session->set_flashdata('error_message', 'Unable to find Project Information please Contact Admin');
          redirect('design-mr-new-create/'.$pr_no.'/'.$slno_pr.'/'.$job_code);
        }
        $approver_id_detail=$this->design_user->get_design_approver_single($approver_id);// Approver details
          if($approver_id_detail['no_user']==1){
            $approver_name=$approver_id_detail['user_approver'][0]->Username;
            $approver_email_id=$approver_id_detail['user_approver'][0]->email_id;                       

          }else{
            $this->session->set_flashdata('error_message', 'Unable to find Approver Information please Contact Admin');
            redirect('design-mr-new-create/'.$pr_no.'/'.$slno_pr.'/'.$job_code);
          }
      if($pr_no_type=='new_pr_creater'){
        $edit_type_id=$edit_type+0;
      }else{
        $edit_type_id=$edit_type+0;
      }
      
      if($get_check_mr==1){ // here it si check where application of pr no is present in uerrent able
        if(is_array($codes)){ // here it check whether amateial is present or not
            $data_inserted = array('pr_no'=>$pr_no, 'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name, 'job_code_id_slno'=>$job_code_id_slno, 'job_code_id'=>$job_Code_nos,  'material_category_name'=>$material_category_name, 'techinal_evalution'=>$tech_evalution, 'status'=>'4', 'date_creation'=>$date_entry, 'time_creation'=>$time_entry,'edit_id'=>$edit_type_id,  'date_required'=>$required_date, 'creators_id'=>$email_id);
              $table_mr_create="master_mr_job_details_m";
              $query_id=$this->user->common_insert_id($table_mr_create,$data_inserted);
              $last_id=$query_id;

              $data_inserted_clone = array('pr_no'=>$pr_no, 'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name, 'job_code_id_slno'=>$job_code_id_slno, 'job_code_id'=>$job_Code_nos,  'material_category_name'=>$material_category_name, 'techinal_evalution'=>$tech_evalution, 'status'=>'4', 'date_creation'=>$date_entry, 'time_creation'=>$time_entry,  'date_required'=>$required_date, 'creators_id'=>$email_id,'last_id'=>$last_id,'edit_id'=>$edit_type_id);
              $table_mr_create_clone="master_mr_job_details_m_clone";
              $query_id_clone=$this->user->common_insert_id($table_mr_create_clone,$data_inserted_clone);
              $last_id_clone=$query_id_clone;
// `category_name`, `material_item_name`, `material_item_id`, `technical_details`, `uom`, `status`, `entry_date`, `update_date`, `entry_id`
              foreach ($codes as $key_value => $ids) {
                  $query_item_details=$this->design_user->get_design_master_items_material_single_m($ids);
                  $quantity_single=$quantitys[$key_value];
                  $data_material = array('mr_no_item'=>$pr_no, 'slno_mr_id'=>$last_id, 'material_item_id'=>$query_item_details['materials_list'][0]->slno_master_item, 'material_name'=>$query_item_details['materials_list'][0]->material_item_name, 'material_quantity'=>$quantity_single, 'material_unit'=>$query_item_details['materials_list'][0]->uom, 'material_id'=>$query_item_details['materials_list'][0]->material_item_id, 'edit_id'=>$edit_type_id,'parameter_tech'=>$query_item_details['materials_list'][0]->technical_details,'Category_material'=>$query_item_details['materials_list'][0]->category_name);
                        // print_r($data_material);
                  $last_id=$this->design_user->design_common_insert_id_m($data_material);

              }
              $data_infromation = array('id_master' =>$last_id, 'id_clone'=>$last_id_clone,'date_entry'=>$date_entry);
            if($submission=='Sent'){
              
              $id= array('slno_mr' =>$last_id );
                // `status`,`edit_id`,`date_submition`, `time_submition`
                $data_send = array('status'=>'1','date_submition'=>$date_submition, 'time_submition'=>$time_submition,'date_required'=>$required_date,'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name);
                // print_r($data_send);
                // exit;
                $query_details=$this->design_user->master_mr_job_details_value_m($data_send,$id);
                $approver_id_details=$this->design_user->get_design_user_single($approver_email_id);// Approver details
                  $approver_slno=$approver_id_details['user_approver'][0]->slno;
                  $approver_email=$approver_id_details['user_approver'][0]->email_id;  
                  

                $design_id_details=$this->design_user->get_design_user_single($email_id);// Approver details    

                    $design_slno=$design_id_details['user_approver'][0]->slno;
                  $design_email=$design_id_details['user_approver'][0]->email_id;   
                // 'slno'=>$data_id
                $date_process = array('pr_no' => $pr_no,'project_slno'=> $job_code_id_slno , 'pr_no_slno'=>$slno_pr ,'design_user_id'=>$design_email ,'design_user_id_slno'=> $design_slno,'design_user_status'=>3 ,'design_date'=>$date_entry , 'approver_user_id'=> $approver_email,'approver_user_slno'=>$approver_slno ,'approver_user_status'=>2 ,'type_bidding_technical'=>$tech_evalution ,'project_name'=>$Project_Name);
                $this->db->insert('master_pr_process_detail',$date_process);
                // echo  $this->db->last_query();

                $data_pr_update_id = array('slno' => $slno_pr );
                $pr_get_information=$this->db->get_where('master_pr_schedule',$data_pr_update_id);
                $result_id=$pr_get_information->result();
                $update_revised_schedule_date=$result_id[0]->update_revised_schedule_date;
                if(!empty($update_revised_schedule_date)){
                  $array_update_revised_schedule_date=unserialize($update_revised_schedule_date);
                  $array_merge=array_merge($array_update_revised_schedule_date,$data_infromation);
                  $array_update_revised_data=serialize($array_merge);
                }else{
                    $array_update_revised_data=serialize($data_infromation);
                }

                $date_update_pr = array('mr_status' =>1 ,'revised_schedule'=> $date_entry ,'update_revised_schedule_date'=>$array_update_revised_data);
                $pr_get_information=$this->db->update('master_pr_schedule',$date_update_pr,$data_pr_update_id);
                echo  $this->db->last_query();

                
                $this->session->set_flashdata('success_message', ' successfully PR Is Created And submited to approver ');
                redirect('user-design-home');
                exit;
                // `pr_no`, `project_slno`, `pr_no_slno`, `design_user_id`, `design_user_id_slno`, `design_user_status`, `design_date`, `approver_user_id`, `approver_user_slno`, `approver_user_status`,technical_user_status



            }else if($submission=='save'){
                $data_send = array('status'=>'5','edit_id'=>$edit_type_id,'date_required'=>$required_date,'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name);
                $query_details=$this->design_user->master_mr_job_details_value($data_send,$id);

                $date_process = array('pr_no' => $pr_no,'project_slno'=> $job_code_id_slno , 'pr_no_slno'=>$slno_pr ,'design_user_id'=>$design_email ,'design_user_id_slno'=> $design_slno,'design_user_status'=>2 ,'design_date'=>$date_entry , 'approver_user_id'=> $approver_email,'approver_user_slno'=>$approver_slno ,'approver_user_status'=>0 ,'type_bidding_technical'=>$tech_evalution  ,'project_name'=>$Project_Name);
                $this->db->insert('master_pr_process_detail',$date_process);

                $data_pr_update_id = array('slno' => $slno_pr );
                $pr_get_information=$this->db->get_where('master_pr_schedule',$data_pr_update_id);
                $result_id=$pr_get_information->result();
                $update_revised_schedule_date=$result_id[0]->update_revised_schedule_date;
                if(!empty($update_revised_schedule_date)){
                  $array_update_revised_schedule_date=unserialize($update_revised_schedule_date);
                  $array_merge=array_merge($array_update_revised_schedule_date,$data_infromation);
                  $array_update_revised_data=serialize($array_merge);
                }else{
                    $array_update_revised_data=serialize($data_infromation);
                }

                $date_update_pr = array('mr_status' =>1 ,'revised_schedule'=> $date_entry ,'update_revised_schedule_date'=>$array_update_revised_data);
                $pr_get_information=$this->db->update('master_pr_schedule',$date_update_pr,$data_pr_update_id);
                $this->session->set_flashdata('success_message', ' Ssuccessfully PR Is Created  Saved ');
                redirect('user-design-home');
                exit;

                // `pr_no`, `project_slno`, `pr_no_slno`, `design_user_id`, `design_user_id_slno`, `design_user_status`, `design_date`, `approver_user_id`, `approver_user_slno`, `approver_user_status` technical_user_status


            }
          
        

        }else{
            $this->session->set_flashdata('error_message', 'Please Select Material for Saving ');
            redirect('design-mr-new-create/'.$pr_no.'/'.$slno_pr.'/'.$job_code);
          
        }
      }else{ // edit information will be done here  and resubmission
          // echo "resubmission";
          // echo "<pre>";
           $data_check_get = array('pr_no'=>$pr_no);
          $query_pr=$this->db->get_where('master_mr_job_details_m',$data_check_get);
          $result_pr=$query_pr->result();
          $last_id=$slno_mr=$result_pr[0]->slno_mr;
          $id= array('slno_mr' =>$last_id );
          // print_r($result_pr);
          // print_r($this->input->post());
          // exit;
         $data_inserted = array('pr_no'=>$pr_no, 'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name, 'job_code_id_slno'=>$job_code_id_slno, 'job_code_id'=>$job_Code_nos,  'material_category_name'=>$material_category_name, 'techinal_evalution'=>$tech_evalution, 'status'=>'4', 'date_creation'=>$date_entry, 'time_creation'=>$time_entry,'edit_id'=>$edit_type_id,  'date_required'=>$required_date, 'creators_id'=>$email_id);
              $table_mr_create="master_mr_job_details_m";
              $query_id=$this->db->update($table_mr_create,$data_inserted,$id);
              // $last_id=$query_id;

              $data_inserted_clone = array('pr_no'=>$pr_no, 'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name, 'job_code_id_slno'=>$job_code_id_slno, 'job_code_id'=>$job_Code_nos,  'material_category_name'=>$material_category_name, 'techinal_evalution'=>$tech_evalution, 'status'=>'4', 'date_creation'=>$date_entry, 'time_creation'=>$time_entry,  'date_required'=>$required_date, 'creators_id'=>$email_id,'last_id'=>$last_id,'edit_id'=>$edit_type_id);
              $table_mr_create_clone="master_mr_job_details_m_clone";
              $query_id_clone=$this->user->common_insert_id($table_mr_create_clone,$data_inserted_clone);
              $last_id_clone=$query_id_clone;
// `category_name`, `material_item_name`, `material_item_id`, `technical_details`, `uom`, `status`, `entry_date`, `update_date`, `entry_id`
              foreach ($codes as $key_value => $ids) {
                  $query_item_details=$this->design_user->get_design_master_items_material_single_m($ids);
                  $quantity_single=$quantitys[$key_value];
                  $data_material = array('mr_no_item'=>$pr_no, 'slno_mr_id'=>$last_id, 'material_item_id'=>$query_item_details['materials_list'][0]->slno_master_item, 'material_name'=>$query_item_details['materials_list'][0]->material_item_name, 'material_quantity'=>$quantity_single, 'material_unit'=>$query_item_details['materials_list'][0]->uom, 'material_id'=>$query_item_details['materials_list'][0]->material_item_id, 'edit_id'=>$edit_type_id,'parameter_tech'=>$query_item_details['materials_list'][0]->technical_details,'Category_material'=>$query_item_details['materials_list'][0]->category_name);
                        // print_r($data_material);
                  $last_id_s=$this->design_user->design_common_insert_id_m($data_material);

              }
              $data_infromation = array('id_master' =>$last_id, 'id_clone'=>$last_id_clone,'date_entry'=>$date_entry);
            if($submission=='Sent'){
              
              
                // `status`,`edit_id`,`date_submition`, `time_submition`
                $data_send = array('status'=>'1','date_submition'=>$date_submition, 'time_submition'=>$time_submition,'date_required'=>$required_date,'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name);
                // print_r($data_send);
                // exit;
                $query_details=$this->design_user->master_mr_job_details_value_m($data_send,$id);
                $approver_id_details=$this->design_user->get_design_user_single($approver_email_id);// Approver details
                  $approver_slno=$approver_id_details['user_approver'][0]->slno;
                  $approver_email=$approver_id_details['user_approver'][0]->email_id;  
                  

                $design_id_details=$this->design_user->get_design_user_single($email_id);// Approver details    

                    $design_slno=$design_id_details['user_approver'][0]->slno;
                  $design_email=$design_id_details['user_approver'][0]->email_id;   
                // 'slno'=>$data_id
                $date_process_id = array('pr_no' => $pr_no);
                $date_process = array('project_slno'=> $job_code_id_slno , 'pr_no_slno'=>$slno_pr ,'design_user_id'=>$design_email ,'design_user_id_slno'=> $design_slno,'design_user_status'=>3 ,'design_date'=>$date_entry , 'approver_user_id'=> $approver_email,'approver_user_slno'=>$approver_slno ,'approver_user_status'=>2 ,'technical_user_status'=>$tech_evalution ,'project_name'=>$Project_Name);
                $this->db->update('master_pr_process_detail',$date_process,$date_process_id);
                // echo  $this->db->last_query();

                $data_pr_update_id = array('slno' => $slno_pr );
                $pr_get_information=$this->db->get_where('master_pr_schedule',$data_pr_update_id);
                $result_id=$pr_get_information->result();
                $update_revised_schedule_date=$result_id[0]->update_revised_schedule_date;
                if(!empty($update_revised_schedule_date)){
                  $array_update_revised_schedule_date=unserialize($update_revised_schedule_date);
                  $array_merge=array_merge($array_update_revised_schedule_date,$data_infromation);
                  $array_update_revised_data=serialize($array_merge);
                }else{
                    $array_update_revised_data=serialize($data_infromation);
                }

                $date_update_pr = array('mr_status' =>1 ,'revised_schedule'=> $date_entry ,'update_revised_schedule_date'=>$array_update_revised_data);
                $pr_get_information=$this->db->update('master_pr_schedule',$date_update_pr,$data_pr_update_id);
                echo  $this->db->last_query();

                if($pr_no_type="resubmission_pr_type"){
                  $this->session->set_flashdata('success_message', ' successfully PR Is Resumitted And submited to approver ');
                  redirect('user-design-home');
                  exit;
                }else{
                   $this->session->set_flashdata('success_message', ' successfully PR Is Created And submited to approver ');
                  redirect('user-design-home');
                  exit;
                }
                // `pr_no`, `project_slno`, `pr_no_slno`, `design_user_id`, `design_user_id_slno`, `design_user_status`, `design_date`, `approver_user_id`, `approver_user_slno`, `approver_user_status`,technical_user_status



            }else if($submission=='save'){
                $data_send = array('status'=>'5','edit_id'=>$edit_type_id,'date_required'=>$required_date,'approver_id_slno'=>$approver_id, 'approver_id'=>$approver_email_id, 'approver_name'=>$approver_name);
                $query_details=$this->design_user->master_mr_job_details_value($data_send,$id);

                 $date_process_id = array('pr_no' => $pr_no);
                $date_process = array('project_slno'=> $job_code_id_slno , 'pr_no_slno'=>$slno_pr ,'design_user_id'=>$design_email ,'design_user_id_slno'=> $design_slno,'design_user_status'=>2 ,'design_date'=>$date_entry , 'approver_user_id'=> $approver_email,'approver_user_slno'=>$approver_slno ,'approver_user_status'=>0 ,'technical_user_status'=>$tech_evalution ,'project_name'=>$Project_Name);
                $this->db->update('master_pr_process_detail',$date_process,$date_process_id);

                $data_pr_update_id = array('slno' => $slno_pr );
                $pr_get_information=$this->db->get_where('master_pr_schedule',$data_pr_update_id);
                $result_id=$pr_get_information->result();
                $update_revised_schedule_date=$result_id[0]->update_revised_schedule_date;
                if(!empty($update_revised_schedule_date)){
                  $array_update_revised_schedule_date=unserialize($update_revised_schedule_date);
                  $array_merge=array_merge($array_update_revised_schedule_date,$data_infromation);
                  $array_update_revised_data=serialize($array_merge);
                }else{
                    $array_update_revised_data=serialize($data_infromation);
                }

                $date_update_pr = array('mr_status' =>1 ,'revised_schedule'=> $date_entry ,'update_revised_schedule_date'=>$array_update_revised_data);
                $pr_get_information=$this->db->update('master_pr_schedule',$date_update_pr,$data_pr_update_id);
                $this->session->set_flashdata('success_message', ' Ssuccessfully PR Is Created  Saved ');
                redirect('user-design-home');
                exit;

                // `pr_no`, `project_slno`, `pr_no_slno`, `design_user_id`, `design_user_id_slno`, `design_user_status`, `design_date`, `approver_user_id`, `approver_user_slno`, `approver_user_status` technical_user_status


            }
          




      }
   }
   public function design_project_pr_schedule_comment($value=''){
     // $_SESSION["cart_item"]="";
    $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>'PR Received List Designer User','script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

      $this->load->view('template/template_header',$data);
      $this->load->view('design_user/template/template_top_head');
      $this->load->view('design_user/template/template_side_bar',$data);
      $this->load->view('design_user/design_comment_information/pr_comment_list',$data);
      $this->load->view('template/template_footer',$data);
   }
   public function design_user_new_resubmission_cart($value=''){
    $_SESSION["cart_item"]="";
    // print_r($this->input->post());
    // Array ( [pr_no] => O18191-950-E-K-30101-001 [edit_type] => 1 ) 
    // 
      $pr_no=$this->input->post('pr_no');
      $edit_type=$this->input->post('edit_type');
      $data = array('mr_no_item' => $pr_no,'edit_id'=>$edit_type);              
      $query=$this->db->get_where('master_mr_material_item_m',$data); 
      foreach ($query->result() as $row) {
         $itemArray = array($row->slno_item_mr=>array('name'=>$row->material_name, 'technical_details'=>$row->parameter_tech , 'quantity'=>$row->material_quantity, 'item_uom'=>$row->material_unit ,'code'=>$row->material_item_id));
            if(!empty($this->session->userdata('cart_item'))) {
                $_SESSION["cart_item"] = array_merge($this->session->userdata('cart_item'),$itemArray);
                // print_r($_SESSION["cart_item"]);
            } else {
                $_SESSION["cart_item"] = $itemArray;
                 // print_r($_SESSION["cart_item"]);
            }
       # code...
     }
      if(!empty($_SESSION["cart_item"])){
                $sess_cart_item=$_SESSION["cart_item"];
                // $cart_item_tech_sess=$_SESSION["cart_item_tech"];
                // print_r($sess_cart_item);
                $item_total = 0;
                $id=0;
               
              
                ?>
                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
                  <thead>
                      <tr>
                          <th><strong>Name</strong></th>
                          <th><strong>Technical Paramete</strong></th>
                          <th><strong>UOM</strong></th>
                          <th><strong>Quantity</strong></th>           
                          <th><strong>Action</strong></th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                   foreach($sess_cart_item as $item){
echo <<<EOD
<tr>
<td><strong><input type="hidden" name="material_name[{$id}]" value="{$item['name']}">
<input type="hidden" name="codes[{$id}]" value="{$item['code']}">{$item['name']}</strong></td>
<td><strong><input type="hidden" name="technical_details[{$id}]" value="{$item['technical_details']}">{$item['technical_details']}</strong></td>
<td><strong><input type="hidden" name="item_uom[{$id}]" value="{$item['item_uom']}">{$item['item_uom']}</strong></td>
<td><strong><input type="hidden" name="quantitys[{$id}]" value="{$item['quantity']}">{$item['quantity']}</strong></td>
<td><strong><a onClick="cartAction('remove',{$item['code']},'{$id}')" class=" btn btnRemoveAction cart-action">Remove Item</a></strong></td>
</tr>
EOD;
$id++;
           }   
                 ?>
               </tbody>
             </table>
               <?php 

              }
     # code...
   }
    public function design_mr_view_pr_details($value='',$value1='',$value2='',$value3=''){
        $email_id=$this->session->userdata('design_email_id');
        if(empty($email_id)){
            
            redirect('design-logout-by-pass');
        }
          $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';

        $data=array('title' =>"View Resubmission Of MR List",'script_js'=>$scripts ,'menu_status'=>'1','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','Pr_no'=>$value,'Pr_no_slno'=>$value1,'Project_slno'=>$value2,'redirect'=>$value3); 
        switch ($value3) {
            case '1':
            $url_id='design_user/design_pr_detail_m/complete_pr_detail';
                # code...
                break;
            case '2':
            $url_id='design_user/design_pr_detail_m/drafted_pr_detail';
                # code...
                break;
            case '4':
            // if(!empty($_SESSION["cart_item"])){
            //   $_SESSION["cart_item"]="";
            // }else{
            //   $_SESSION["cart_item"]=""; 
            // }
            $url_id='design_user/design_pr_detail_m/resubmission_pr_detail';
                # code...
                break;
            case '3':
            $url_id='design_user/design_pr_detail_m/waiting_pr_detail';
                # code...
                break;
            
            default:
                # code...
                break;
        }

            $this->load->view('template/template_header',$data);
            $this->load->view('design_user/template/template_top_head');
            $this->load->view('design_user/template/template_side_bar',$data);
            $this->load->view($url_id,$data);
            $this->load->view('template/template_footer',$data);
        # code...

        # code...
    }
    public function design_project_pr_schedule_status($value=''){

      $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>'PR Received List Designer User','script_js'=>$scripts ,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');

      $this->load->view('template/template_header',$data);
      $this->load->view('design_user/template/template_top_head');
      $this->load->view('design_user/template/template_side_bar',$data);
      $this->load->view('design_user/pr_status_information/index_pr_schedule_information',$data);
      $this->load->view('template/template_footer',$data);
    }

}