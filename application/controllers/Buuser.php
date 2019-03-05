<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Buuser extends CI_Controller {
    public function __construct(){
            parent::__construct();
            // Loading my model which will use
            $this->load->model('user_model', 'user'); 
             $this->load->model('approver_model', 'approver_user'); 
            // imedate database link
            $this->load->database(); 
            // $this->load->library('excel');   
            
            //Load session library 
         $this->load->library('session');
         $this->load->library('user_agent');
         $this->load->library('encryption');
         $this->load->library('form_validation');
         $this->load->library('cronfile');
         $this->cronfile->index_event();


    }

    public function home(){
         $scripts='';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/user_dashboard');
            $this->load->view('template/template_footer',$data);
        # code...
    }
   public function bu_create_tracking_new($value=''){ // CREATING mR
          $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/create_bu/create_bu_tool');
            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function bu_create_tracking_new_save($value=''){
     $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){
            
            redirect('bu-logout-by-pass');
        }
        $Date_creation=$this->input->post('Date_creation');
        $Po_no=$this->input->post('Po_no');
        $Bg_submission_date=$this->input->post('Bg_submission_date');
        $Mfg_clear_date=$this->input->post('Mfg_clear_date');
        $Job_code=$this->input->post('Job_code');
        $Po_date=$this->input->post('Po_date');
        $Advance_payment_date=$this->input->post('Advance_payment_date');
        $Inspection_call_date=$this->input->post('Inspection_call_date');
        $Inspection_clearance_date=$this->input->post('Inspection_clearance_date');
        $Dispatch_clearance_date=$this->input->post('Dispatch_clearance_date');
        $Inspection_call_remark=$this->input->post('Inspection_call_remark');
        $Inspection_clearance_remark=$this->input->post('Inspection_clearance_remark');
        $Dispatch_clearance_remark=$this->input->post('Dispatch_clearance_remark');
        $Qty_receipt_at_site=$this->input->post('Qty_receipt_at_site');
        $Supply_completion=$this->input->post('Supply_completion');
        $Qty_pending=$this->input->post('Qty_pending');
        $Remark_process=$this->input->post('Remark_process');
        $ACE_Basic=$this->input->post('ACE_Basic');
        $Order_value=$this->input->post('Order_value');
        $Invoice_value=$this->input->post('Invoice_value');
        $Cost_saving=$this->input->post('Cost_saving');
        $send_button=$this->input->post('send_button');
        $Drg_approval_date=$this->input->post('Drg_approval_date');
        if($send_button=='send'){
            $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id);
                $this->db->insert('master_tracking_tools',$insert_data);                   
                $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Created  Saved ');
                redirect('user-bu-home');
                                
        }else{
             $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id);
                $this->db->insert('master_tracking_tools',$insert_data);   
                 $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Created  Saved ');
                redirect('user-bu-home');
                

        }
   }
   public function bu_edit_tracking_tool($value=''){
    if(!empty($value)){
        $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value);
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/drafted_bu/create_bu_tool',$data);
            $this->load->view('template/template_footer',$data);
       
    }else{
       $this->session->set_flashdata('error_message', 'Some thing went wro0000000000ng ');
                redirect('user-bu-home');  
    }
   }
    public function bu_view_tracking_tool($value=''){
    if(!empty($value)){
        $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value);
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/submited_bu/create_bu_tool',$data);
            $this->load->view('template/template_footer',$data);
       
    }else{
       $this->session->set_flashdata('error_message', 'Something went wrong ');
                redirect('user-bu-home');  
    }
   }
   public function bu_drafted_tracking_new(){
   
          $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'2','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/drafted_bu/view_drafted_tracking_tool');
            $this->load->view('template/template_footer',$data);
   }
    public function bu_update_tracking_new_save($value=''){
     $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){
            
            redirect('bu-logout-by-pass');
        }
        $Date_creation=$this->input->post('Date_creation');
        $Po_no=$this->input->post('Po_no');
        $Bg_submission_date=$this->input->post('Bg_submission_date');
        $Mfg_clear_date=$this->input->post('Mfg_clear_date');
        $Job_code=$this->input->post('Job_code');
        $Po_date=$this->input->post('Po_date');
        $Advance_payment_date=$this->input->post('Advance_payment_date');
        $Inspection_call_date=$this->input->post('Inspection_call_date');
        $Inspection_clearance_date=$this->input->post('Inspection_clearance_date');
        $Dispatch_clearance_date=$this->input->post('Dispatch_clearance_date');
        $Inspection_call_remark=$this->input->post('Inspection_call_remark');
        $Inspection_clearance_remark=$this->input->post('Inspection_clearance_remark');
        $Dispatch_clearance_remark=$this->input->post('Dispatch_clearance_remark');
        $Qty_receipt_at_site=$this->input->post('Qty_receipt_at_site');
        $Supply_completion=$this->input->post('Supply_completion');
        $Qty_pending=$this->input->post('Qty_pending');
        $Remark_process=$this->input->post('Remark_process');
        $ACE_Basic=$this->input->post('ACE_Basic');
        $Order_value=$this->input->post('Order_value');
        $Invoice_value=$this->input->post('Invoice_value');
        $Cost_saving=$this->input->post('Cost_saving');
        $send_button=$this->input->post('send_button');
        $Slno_tracking=$this->input->post('Slno_tracking');
        $data_id = array('Slno_tracking' => $Slno_tracking );
        $Drg_approval_date=$this->input->post('Drg_approval_date');
        if($send_button=='send'){
            $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id);
                $this->db->update('master_tracking_tools',$insert_data,$data_id);                   
                $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Update  Saved ');
                redirect('user-bu-home');
                                
        }else{
             $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id);
                $this->db->update('master_tracking_tools',$insert_data,$data_id);     
                 $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Update  Saved ');
                redirect('user-bu-home');
                

        }
   }
   public function bu_view_edit_tracking_tool($value=''){
        if(!empty($value)){
            $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
                $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value);
                $this->load->view('template/template_header',$data);
                $this->load->view('bu_user/template/template_top_head');
                $this->load->view('bu_user/template/template_side_bar',$data);
                $this->load->view('bu_user/submited_bu/edit_bu_tool',$data);
                $this->load->view('template/template_footer',$data);
           
        }else{
           $this->session->set_flashdata('error_message', 'Some thing went wrong ');
                    redirect('user-bu-home');  
        }
   }
   public function bu_submited_tracking_new($value=''){
     $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/submited_bu/view_submitted_tracking_tool');
            $this->load->view('template/template_footer',$data);
       # code...
   }

   public function bu_create_pr_schedule_new($value=''){ // CREATING mR
          $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"BU Pr Schedule",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/entry_pr_schedule/pr_schedule',$data);

            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function bu_view_pr_schedule_new($value=''){ // CREATING mR
          $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"BU Pr Schedule",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'4','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/bu_view_pr_schedule_new/view_schedule',$data);

            $this->load->view('template/template_footer',$data);
       # code...
   }
   public function bu_excel_uploads_save(){
        $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){
          
          redirect('bu-logout-by-pass');
        }
        $table="master_pr_schedule";    
        $actions_file=$this->input->post('actions_file');
        $job_code=$this->input->post('job_code');
        switch ($actions_file) {
            case 'bu_files_uploaded_details':

                if(isset($_FILES["file"]["name"])){
                    $file_name=$_FILES["file"]["name"];
                    $file_stored_name=date('Y-m-d')."-".date('His')."-".$_FILES["file"]["name"];
                    $path = $_FILES["file"]["tmp_name"];
          // 
                    if ($_FILES["file"]["error"] > 0) {
                        echo "3";
                        exit();
                    } else {
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], 'upload_files/pr_sch/' . $file_stored_name)){
                            $data_array = array('job_code_id'=>$job_code, 'file_name'=>$file_stored_name, 'upload_by'=>$job_code);
                            $query_files=$this->db->insert('master_pr_schedule_file',$data_array);
                            $path_excel="upload_files/pr_sch/".$file_stored_name;
                            $arr_file = explode('.', $_FILES['file']['name']);
                            $extension =strtolower(end($arr_file));
                            switch ($extension) {
                                case 'xls':
                                 $inputFileType = 'Xls';
                                break;
                                case 'xlsx':
                                 $inputFileType = 'Xlsx';
                                break;                  
                                case 'xml':
                                 $inputFileType = 'Xml';
                                break;
                                case 'ods':
                                 $inputFileType = 'Ods';
                                break;
                                case 'slk':
                                 $inputFileType = 'Slk';
                                break;                  
                                case 'gnumeric':
                                 $inputFileType = 'Gnumeric';
                                break;
                                case 'csv':
                                 $inputFileType = 'Csv';
                                break;

                                default:
                                # code...
                                break;
                            }

                            $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                            $objReader->setReadDataOnly(true);
                            //FileName and Sheet Name
                            $objPHPExcel = $objReader->load($path_excel);
               
                            foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row=2; $row<=$highestRow; $row++){                    
                                    $dicipline = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                                    $pr_no = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                                    $area = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                                    $item_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                                    $uom = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                                    $qty = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                                    $orginal_schedule = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                                    // Checking of data duplicate 
                                    $data_check = array('pr_no' => $pr_no);
                                    $query=$this->db->get_where($table,$data_check);
                                    $num=$query->num_rows();
                                    if($num==0){
                                        // `discipline`, ``, `area`, `item`, `UOM`, `quantity`, `job_code`, `status`, `status_mr_used`
                                        $data = array('discipline'=>$dicipline,'pr_no'=>$pr_no,'area'=>  $area,'item'=>$item_name,'UOM'=> $uom,'quantity'=>$qty,'original_schedule'=>$orginal_schedule,'job_code'=>$job_code,'entry_user_id'=>$email_id);
                        
                                        $query_ENTRY=$this->db->insert($table, $data);
                                    }
                                }
                            }           
                        }
                        echo "1"; 
                        exit(); 
                    }
                }        
            break;
            case 'bu_Views':
                $data_check = array('job_code' => $job_code);
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
                      <th>Revised Schedule</th>
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
                      <td>'.$row->revised_schedule.'</td>
                    </tr>
                    ';
                }
                $output .= '</table>';
                echo $output;
                exit();         
            break;  
            case 'bu_Views_total':
                  $data_check = array('job_code' => $job_code);
                $query=$this->db->get_where($table,$data_check);
                    // echo  $this->db->last_query();
                $output = '
                  <h3 align="center">Total Data - '.$query->num_rows().'</h3>
                  <table id="example" class="table table-striped table-bordered display">
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>
                      <th>Area</th>
                      <th>Item</th>
                      <th>UOM</th>
                      <th>Quantity</th>
                      <th>Original Schedule</th>
                      <th>Revised Schedule</th>
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
                      <td>'.$row->revised_schedule.'</td>
                    </tr>
                    ';
                }
                $output .= '</table>';
                echo $output;
            break;    
            default:
       
            break;
        }
    }
    public function bu_project_view(){
       $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"BU Pr Schedule",'script_js'=>$scripts,'menu_status'=>'2','sub_menu'=>'5','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/view_pr_schedule/view_schedule',$data);

            $this->load->view('template/template_footer',$data);
    }
   


















    public function bu_logout(){
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
                        $this->session->set_flashdata('success_message', 'Signout from BU User panel');
                        redirect('home');

                }else{

                        $user_data = array('logout_date'=>$date, 'logout_time'=>$time, 'status'=>'2');
                        $id=array('session_id'=>$session_id);
                        $user_hstory_table="master_session_history";
                        $result_history = $this->user->common_update($user_hstory_table,$user_data,$id); 
                        session_destroy();
                        session_start();                        
                        $this->session->set_flashdata('success_message', 'Sign-out from BU User Panel');
                        redirect('home');     
                }

    }

     public function bu_logout_bypass(){
        $this->session->set_flashdata('error_msg', 'Invalid entry to Bu User panel');
        redirect('home');     
                
    }

}