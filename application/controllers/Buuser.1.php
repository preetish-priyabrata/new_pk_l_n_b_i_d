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
            $this->load->model('bu_model', 'bumodal'); 
            $this->load->model('procurement_model', 'procurement_user');
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
        $Drg_submission_date="";
        if($send_button=='send'){
            $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id);
                $this->db->insert('master_tracking_tools',$insert_data);                   
                $this->session->set_flashdata('success_message', ' Successfully Tracking Tool Is Created & Saved ');
                redirect('user-bu-home');
                                
        }else{
             $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id);
                $this->db->insert('master_tracking_tools',$insert_data);   
                 $this->session->set_flashdata('success_message', ' Successfully Tracking Tool Is Created & Saved ');
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
       $this->session->set_flashdata('error_message', 'Something went wrong ');
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
        $Drg_submission_date='';
        if($send_button=='send'){
            $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id);
                $this->db->update('master_tracking_tools',$insert_data,$data_id);                   
                $this->session->set_flashdata('success_message', ' Successfully Tracking Tool Is Updated & Saved ');
                redirect('user-bu-home');
                                
        }else{
             $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id);
                $this->db->update('master_tracking_tools',$insert_data,$data_id);     
                 $this->session->set_flashdata('success_message', ' Successfully Tracking Tool Is Updated & Saved ');
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
           $this->session->set_flashdata('error_message', 'Something went wrong ');
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
                            $data_array = array('job_code_id'=>$job_code, 'file_name'=>$file_stored_name, 'upload_by'=>$email_id);
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
                                     $orginal_schedule_DATE =($worksheet->getCellByColumnAndRow(7, $row)->getValue());
                                    $orginal_schedule_DATE_st = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($orginal_schedule_DATE);
                                      $orginal_schedule= date('Y-m-d',$orginal_schedule_DATE_st);
                                    // echo $orginal_schedule = \PHPExcel_Style_NumberFormat::toFormattedString($orginal_schedule_DATE, 'YYYY-MM-DD');
                                    // Checking of data duplicate 
                                    if(!empty($dicipline) && !empty($pr_no) && !empty($item_name) && !empty($uom) &&   !empty($qty) && !empty($orginal_schedule_DATE) ){
                                        $data_check = array('pr_no' => $pr_no);
                                        $query=$this->db->get_where($table,$data_check);
                                        $num=$query->num_rows();
                                        if($num==0){
                                            // `discipline`, ``, `area`, `item`, `UOM`, `quantity`, `job_code`, `status`, `status_mr_used`
                                            $data = array('discipline'=>$dicipline,'pr_no'=>$pr_no,'area'=>  $area,'item'=>$item_name,'UOM'=> $uom,'quantity'=>$qty,'original_schedule'=>$orginal_schedule,'job_code'=>$job_code,'entry_user_id'=>$email_id,'status'=>1);
                            
                                            $query_ENTRY=$this->db->insert($table, $data);
                                        }
                                    }
                                }
                            }           
                        }
                        // exit;
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
                  $data_check = array('job_code' => $job_code,'status_bu_used'=>'0');
                $query=$this->db->get_where($table,$data_check);
               
                    // echo  $this->db->last_query();
                $output = '<div class="table-responsive">
                  <h3 align="center">Total Data - '.$query->num_rows().'</h3>
                  <table class="table table-striped table-bordered display example_buyer_bu" >
                  <thead>
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>
                      <th>Area</th>
                      <th>Item</th>
                      <th>UOM</th>
                      <th>Quantity</th>
                      <th>Original Schedule</th>
                      <th>PR Revised Schedule</th>
                      <th>Remark</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                ';
                foreach($query->result() as $row){
                    if(!empty($row->remark_design)){
                        $remark=$row->remark_design;
                    }else{
                        $remark= '<a href="'.base_url().'bu-mr-new-remark-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" > Remark  </a>';
                    }
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
                        <td>'.$remark.'</td>
                      
                       <td><a href="'.base_url().'bu-mr-new-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" target="_blank"> Create Tracking Tool  </a>
                      </td>
                    </tr>
                    ';
                }
                $output .= '</tbody>
                </table>
                </div>';
                // $output .= '';
                echo $output;
            break;    
             case 'bu_Views_total_old':
                  $data_check = array('job_code' => $job_code,'status_bu_used'=>'1');
                $query=$this->db->get_where($table,$data_check);
               
                    // echo  $this->db->last_query();
                $output = '<div class="table-responsive">
                  <h3 align="center">Total Data - '.$query->num_rows().'</h3>
                  <table class="table table-striped table-bordered display example_buyer_bu" >
                  <thead>
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>
                      <th>Area</th>
                      <th>Item</th>
                      <th>UOM</th>
                      <th>Quantity</th>
                      <th>Original Schedule</th>
                     
                       <th>PR Revised Schedule</th>
                      <th>Bu PR Revised Schedule</th>
                       <th>Remark</th>
                      <th>Drafted </th>
                      <th>Submitted </th>
                      
                    </tr>
                    </thead>
                    <tbody>
                ';
                foreach($query->result() as $row){
                    if(!empty($row->remark_design)){
                        $remark=$row->remark_design;
                    }else{
                        $remark='<a href="'.base_url().'bu-mr-new-remark-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" > Remark  </a>';
                    }
                    $slno=$row->slno;
                    $data_check_drafted = array('project_slno' => $job_code,'Status'=>'2','pr_no_slno' =>$row->slno);

                    $query_drafted=$this->db->get_where('master_tracking_tools_m',$data_check_drafted);

                    if($query_drafted->num_rows()!=0){
                        $result_drafted=$query_drafted->result();
                        $drafted='<a href="'.base_url().'bu-mr-drafted/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_drafted[0]->Slno_tracking.'" target="_blank"> Click Drafted  </a>';
                    }else{
                        $drafted='--';
                    }
                    $data_check_submit = array('project_slno' => $job_code,'Status'=>'1' ,'pr_no_slno'=>$row->slno);
                    $query_submit=$this->db->get_where('master_tracking_tools_m',$data_check_submit);
                    if($query_submit->num_rows()!=0){
                         $result_submit=$query_submit->result();
                         $submited='<a href="'.base_url().'bu-view-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'" target="_blank"> Click View  </a> ||  <a href="'.base_url().'bu-view-edit-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'" target="_blank"> Click Edit  </a> ';
                    }else{
                       $submited='--' ;
                    }
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
                      <td>'.$row->bu_revised_schedule.'</td>
                       <td>'.$remark.'</td>
                      <td>'.$drafted.'</td>
                      <td>'.$submited.' </td>
                    
                    </tr>
                    ';
                }
                $output .= '</tbody>
                </table>
                </div>';
                // $output .= '';
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
    /**
     * [bu_bu_create_tracking_new description] here new tracking tool working creatring
     * @param  string $value  [pr_no]
     * @param  string $value1 [slno]
     * @param  [type] $value2 [job_code]
     * @return [type]         [description]
     */
   public function bu_bu_create_tracking_new($value='',$value1="",$value2){
        if(!empty($value) && !empty($value1) && !empty($value2)){
             $scripts='<script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
                $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$value, 'slno_pr_no'=>$value1, 'job_code'=>$value2);
                $this->load->view('template/template_header',$data);
                $this->load->view('bu_user/template/template_top_head');
                $this->load->view('bu_user/template/template_side_bar',$data);
                $this->load->view('bu_user/new_create_bu_m/create_bu_tool',$data);
                $this->load->view('template/template_footer',$data);
       }else{
           $this->session->set_flashdata('error_message', 'Something went wrong ');
            redirect('user-bu-home');  
       }
   }
    
   public function bu_create_tracking_new_save_m($value=''){
    //    print_r($this->input->post());
    //    exit;
     $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){
            
            redirect('bu-logout-by-pass');
        }
        // print_r($this->input->post());
        // Array ( [Date_creation] => 2019-03-01 [Po_no] => 345434 [Bg_submission_date] => 2019-03-21 [Mfg_clear_date] => 2019-03-22 [Pr_NO] => O18191-950-E-K-30101-001 [Pr_NO_slno] => 1 [Job_code] => 0770 [ project 1 ] [Job_code_id] => 1 [Po_date] => 2019-03-27 [Advance_payment_date] => 2018-11-28 [pr_item] => TPD for 33KV HT Switch board [Inspection_call_date] => 2019-03-23 [Inspection_clearance_date] => [Dispatch_clearance_date] => [Inspection_call_remark] => [Inspection_clearance_remark] => [Dispatch_clearance_remark] => [Qty_receipt_at_site] => 1 [Supply_completion] => 2 [Qty_pending] => [Remark_process] => [ACE_Basic] => [Order_value] => [Invoice_value] => [Cost_saving] => [send_button] => save ) 
        // $Drg_submission_date='';
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
        $Drg_submission_date=$Drg_approval_date=$this->input->post('Drg_approval_date');
        $Pr_NO=$this->input->post('Pr_NO');
        $Pr_NO_slno=$this->input->post('Pr_NO_slno');
        $Job_code_id=$this->input->post('Job_code_id');
        $pr_item=$this->input->post('pr_item');
        $pr_slno_array = array('slno'=>$Pr_NO_slno,'status_bu_used'=>0);
        $pr_check=$this->db->get_where('master_pr_schedule',$pr_slno_array);
        $date_entry=date('Y-m-d');
        if($pr_check->num_rows() == 1){
            $result_pr_slno=$pr_check->result();
            $update_bu_revised_schedule_date=$result_pr_slno[0]->update_bu_revised_schedule_date;
            if(!empty($update_bu_revised_schedule_date)){
                $update_bu_revised_schedule_date_array=json_decode($update_bu_revised_schedule_date);
            }else{
                $update_bu_revised_schedule_date_array;
            }

            if($send_button=='send'){
                $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO);
                    $this->db->insert('master_tracking_tools_m',$insert_data);   
                    $last_id=$this->db->insert_id();
                     $insert_data_clone = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id ,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO,'master_id'=>$last_id);
                      $this->db->insert('master_tracking_tools_m_clone',$insert_data_clone);

                       $last_id_clone=$this->db->insert_id();
                       $data_pr_entry[] = array('slno_id' => $last_id_clone,'date_id'=>$date_entry );
                       if(!empty($update_bu_revised_schedule_date)){
                          $store_bu_date=array_push($update_bu_revised_schedule_date_array, $data_pr_entry);
                          $encode_date_value=json_encode($store_bu_date);
                        }else{
                              $encode_date_value=json_encode($data_pr_entry);
                        }
                        $date_update = array('update_bu_revised_schedule_date' => $encode_date_value,'bu_revised_schedule'=>$date_entry,'status_bu_used'=>1);
                        $update_pr_s=$this->db->update('master_pr_schedule',$date_update,$pr_slno_array);



                    $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Created  Saved ');
                    redirect('user-bu-home');
                                    
            }else{
                 $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id ,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO);


                    $this->db->insert('master_tracking_tools_m',$insert_data);  
                      $last_id=$this->db->insert_id();
                     $insert_data_clone = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id ,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO,'master_id'=>$last_id);
                     $this->db->insert('master_tracking_tools_m_clone',$insert_data_clone);  

                     $last_id_clone=$this->db->insert_id();
                       $data_pr_entry[] = array('slno_id' => $last_id_clone,'date_id'=>$date_entry );
                       if(!empty($update_bu_revised_schedule_date)){
                          $store_bu_date=array_push($update_bu_revised_schedule_date_array, $data_pr_entry);
                          $encode_date_value=json_encode($store_bu_date);
                        }else{
                              $encode_date_value=json_encode($data_pr_entry);
                        }
                         $date_update = array('update_bu_revised_schedule_date' => $encode_date_value,'bu_revised_schedule'=>$date_entry,'status_bu_used'=>1);
                        $update_pr_s=$this->db->update('master_pr_schedule',$date_update,$pr_slno_array);
                     $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Created  Saved ');
                    redirect('user-bu-home');
                    

            }
        }else{
             $this->session->set_flashdata('error_message', 'PR Is already Created' .$pr_item);
            redirect('user-bu-home');   
        }
   }
     public function bu_view_project_old($value=''){
         $scripts='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script><script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script><script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script> <script src="'.base_url().'file_css_admin/own_js.js"></script>';
            $data=array('title' =>"BU Pr Schedule",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'6','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/view_pr_schedule_old/view_schedule',$data);
            $this->load->view('template/template_footer',$data);
     }
    public function bu_edit_tracking_tool_m($value='',$value1='',$value2='',$value3=''){
        if(!empty($value) && !empty($value1) && !empty($value2)){
            $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
                $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value3,'pr_no'=>$value,'slno_pr_no'=>$value1,'job_code'=>$value2);
                $this->load->view('template/template_header',$data);
                $this->load->view('bu_user/template/template_top_head');
                $this->load->view('bu_user/template/template_side_bar',$data);
                $this->load->view('bu_user/drafted_bu_m/create_bu_tool',$data);
                $this->load->view('template/template_footer',$data);
           
        }else{
           $this->session->set_flashdata('error_message', 'Some thing went Wrong ');
                    redirect('user-bu-home');  
        }
   }
    public function bu_update_tracking_new_save_m($value=''){
        // print_r($this->input->post());
        // exit;
     $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){
            
            redirect('bu-logout-by-pass');
        }
        $Drg_submission_date=$this->input->post('Drg_approval_date');
        // Array ( [Slno_tracking] => 1 [Date_creation] => 2019-03-01 [Po_no] => 345434 [Bg_submission_date] => [Mfg_clear_date] => 2019-03-28 [Pr_NO] => O18191-950-E-K-30101-001 [Pr_NO_slno] => 1 [Job_code] => 0770 [ project 1 ] [Job_code_id] => 1 [Po_date] => 2019-03-26 [Advance_payment_date] => [Drg_approval_date] => [pr_item] => TPD for 33KV HT Switch board [Inspection_call_date] => [Inspection_clearance_date] => [Dispatch_clearance_date] => [Inspection_call_remark] => [Inspection_clearance_remark] => [Dispatch_clearance_remark] => [Qty_receipt_at_site] => [Supply_completion] => 2 [Qty_pending] => [Remark_process] => [ACE_Basic] => [Order_value] => [Invoice_value] => [Cost_saving] => [send_button] => save ) 
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

        $Pr_NO=$this->input->post('Pr_NO');
        $Pr_NO_slno=$this->input->post('Pr_NO_slno');
        $Job_code_id=$this->input->post('Job_code_id');
        $pr_item=$this->input->post('pr_item');
        $pr_slno_array = array('slno'=>$Pr_NO_slno,'status_bu_used'=>1);
        $pr_check=$this->db->get_where('master_pr_schedule',$pr_slno_array);
        $date_entry=date('Y-m-d');

         if($pr_check->num_rows() == 1){
            $result_pr_slno=$pr_check->result();
             $update_bu_revised_schedule_date=$result_pr_slno[0]->update_bu_revised_schedule_date;
            if(!empty($update_bu_revised_schedule_date)){
                $update_bu_revised_schedule_date_array=json_decode($update_bu_revised_schedule_date, TRUE);
            }else{
                $update_bu_revised_schedule_date_array;
            }
            if($send_button=='send'){
                $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id);
                    $this->db->update('master_tracking_tools_m',$insert_data,$data_id);   

                    $insert_data_clone = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id ,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO,'master_id'=>$Slno_tracking);
                      $this->db->insert('master_tracking_tools_m_clone',$insert_data_clone);

                       $last_id_clone=$this->db->insert_id();
                       $data_pr_entry[] = array('slno_id' => $last_id_clone,'date_id'=>$date_entry );
                       if(!empty($update_bu_revised_schedule_date)){
                          $store_bu_date=array_merge($update_bu_revised_schedule_date_array, $data_pr_entry);
                          $encode_date_value=json_encode($store_bu_date);
                        }else{
                              $encode_date_value=json_encode($data_pr_entry);
                        }
                        $date_update = array('update_bu_revised_schedule_date' => $encode_date_value,'bu_revised_schedule'=>$date_entry,'status_bu_used'=>1);
                        $update_pr_s=$this->db->update('master_pr_schedule',$date_update,$pr_slno_array);

                    $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Update  Saved ');
                    redirect('user-bu-home');
                                    
            }else{
                 $insert_data = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'2','submitted_by'=>$email_id);
                    $this->db->update('master_tracking_tools_m',$insert_data,$data_id);  

                      $insert_data_clone = array('Job_code'=>$Job_code, 'Po_no'=>$Po_no, 'Po_date'=>$Po_date, 'Date_creation'=>$Date_creation, 'Bg_submission_date'=>$Bg_submission_date, 'Drg_submission_date'=>$Drg_submission_date, 'Advance_payment_date'=>$Advance_payment_date, 'Drg_approval_date'=>$Drg_approval_date, 'Inspection_call_date'=>$Inspection_call_date, 'Inspection_call_remark'=>$Inspection_call_remark, 'Inspection_clearance_date'=>$Inspection_clearance_date, 'Inspection_clearance_remark'=>$Inspection_clearance_remark, 'Dispatch_clearance_date'=>$Dispatch_clearance_date, 'Dispatch_clearance_remark'=>$Dispatch_clearance_remark, 'Qty_receipt_at_site'=>$Qty_receipt_at_site, 'Qty_pending'=>$Qty_pending, 'Supply_completion'=>$Supply_completion, 'Remark_process'=>$Remark_process, 'ACE_Basic'=>$ACE_Basic, 'Invoice_value'=>$Invoice_value, 'Order_value'=>$Order_value, 'Cost_saving'=>$Cost_saving, 'Mfg_clear_date'=>$Mfg_clear_date, 'Status'=>'1','submitted_by'=>$email_id ,'project_slno '=>$Job_code_id,'item_name_pr'=>$pr_item,'pr_no_slno'=>$Pr_NO_slno,'pr_no'=>$Pr_NO,'master_id'=>$Slno_tracking);
                     $this->db->insert('master_tracking_tools_m_clone',$insert_data_clone);  

                     $last_id_clone=$this->db->insert_id();
                       $data_pr_entry [] = array('slno_id' => $last_id_clone,'date_id'=>$date_entry );
                       // print_r($update_bu_revised_schedule_date_array);
                       if(!empty($update_bu_revised_schedule_date)){
                          $store_bu_date=array_merge($update_bu_revised_schedule_date_array, $data_pr_entry);
                          
                          $encode_date_value=json_encode($store_bu_date);
                        }else{
                              $encode_date_value=json_encode($data_pr_entry);
                        }
                          $date_update = array('update_bu_revised_schedule_date' => $encode_date_value,'bu_revised_schedule'=>$date_entry,'status_bu_used'=>1);
                          // print_r($date_update);
                        $update_pr_s=$this->db->update('master_pr_schedule',$date_update,$pr_slno_array);

                     $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Update  Saved ');
                    redirect('user-bu-home');
                    

            }
        }else{
            $this->session->set_flashdata('error_message', 'PR Tracking is not create please create again' .$pr_item);
            redirect('user-bu-home');   
                    
        }
   }
   public function bu_view_edit_tracking_tool_m($value='',$value1='',$value2='',$value3=''){
        if(!empty($value)){
            $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
                $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value3,'pr_no'=>$value,'slno_pr_no'=>$value1,'job_code'=>$value2);
                $this->load->view('template/template_header',$data);
                $this->load->view('bu_user/template/template_top_head');
                $this->load->view('bu_user/template/template_side_bar',$data);
                $this->load->view('bu_user/submited_bu_m/edit_bu_tool',$data);
                $this->load->view('template/template_footer',$data);
           
        }else{
           $this->session->set_flashdata('error_message', 'Some thing went wrong ');
                    redirect('user-bu-home');  
        }
   }
   public function bu_view_tracking_tool_m($value='',$value1='',$value2='',$value3=''){   
        if(!empty($value)){
            $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu User Dashboard",'script_js'=>$scripts,'menu_status'=>'1','sub_menu'=>'1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','value'=>$value3,'pr_no'=>$value,'slno_pr_no'=>$value1,'job_code'=>$value2);
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/submited_bu_m/create_bu_tool',$data);
            $this->load->view('template/template_footer',$data);
       
        }else{
            $this->session->set_flashdata('error_message', 'Something went wrong ');
            redirect('user-bu-home');  
        }
   }
   public function bu_search_pr_no($value=''){
    // print_r($this->input->post());
    // Array ( [get_pr_no] => O18191-950-E-K-30101-001 ) 
    $get_pr_no=$this->input->post('get_pr_no');
    if(!empty($get_pr_no)){
            $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu Search Pr NO ".$get_pr_no,'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','get_pr_no'=>$get_pr_no);
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/bu_search_pr_no/index',$data);
            $this->load->view('template/template_footer',$data);
       
        }else{
            $this->session->set_flashdata('error_message', 'Something went wrong ');
            redirect('user-bu-home');  
        }
       # code...
   }
   public function bu_mr_new_remark_create($pr_no='',$slno='',$job_code){
           $scripts='</script> <script src="'.base_url().'file_css_admin/own_js_date_picker.js"></script>';
            $data=array('title' =>"Bu Remark PR  ".$pr_no,'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','get_pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code);
            $this->load->view('template/template_header',$data);
            $this->load->view('bu_user/template/template_top_head');
            $this->load->view('bu_user/template/template_side_bar',$data);
            $this->load->view('bu_user/bu_remark/index',$data);
            $this->load->view('template/template_footer',$data);
   }
   public function bu_mr_new_remark_create_save($value=''){
       $email_id=$this->session->userdata('bu_email_id');
        if(empty($email_id)){            
            redirect('bu-logout-by-pass');
        }
        $get_pr_no=$this->input->post('get_pr_no');
        $slno=$this->input->post('slno');
        $job_code=$this->input->post('job_code');
        $Remark=$this->input->post('Remark');

        $data_insert = array('pr_no' => $get_pr_no, 'slno_pr'=>$slno,'job_code'=>$job_code,'Comment_remark'=>$Remark,'email_id'=>$email_id,'level_user'=>1 ,'type_remark'=>'R','to_level_user'=>2);
        $query=$this->db->insert('master_bu_remark_pr',$data_insert);

        $remark_design_update = array('remark_design' => $Remark,'remark_entry_id'=>$email_id,'entry_date_remark'=>date('Y-m-d') );
        $data_check = array('job_code' => $job_code,'pr_no'=>$get_pr_no);
        $query_update=$this->db->update('master_pr_schedule',$remark_design_update,$data_check);

        $this->session->set_flashdata('success_message', ' Ssuccessfully Tracking Tool Is Update  Saved ');
        redirect('user-bu-home');
      
   }
   public function bu_view_project_old_remark(){
    $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
    $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
    $this->load->view('template/template_header',$data);
    $this->load->view('bu_user/template/template_top_head');
    $this->load->view('bu_user/template/template_side_bar',$data);
    $this->load->view('bu_user/remark_history/remark_index',$data);
    $this->load->view('template/template_footer',$data);
   }
   public function bu_pr_remark_history($pr_no='',$slno='',$job_code='',$id=''){
    $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
    $data=array('title' =>"Pr Schedule Remark History",'script_js'=>$scripts,'menu_status'=>'5','sub_menu'=>'56','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id);
    $this->load->view('template/template_header',$data);
    $this->load->view('bu_user/template/template_top_head');
    $this->load->view('bu_user/template/template_side_bar',$data);
    $this->load->view('bu_user/remark_history/remark_index_detail',$data);
    $this->load->view('template/template_footer',$data);

   }
    
   public function bu_change_password(){
           
                $scripts='<script src="https://cdnjs.cloudflare.com/ajax/libs/hideshowpassword/2.0.8/hideShowPassword.min.js"></script>';
            
                $data=array('title' =>"Admin Change Password for Users",'script_js'=>$scripts,'menu_status'=>'','sub_menu'=>'','sub_menu'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
                $this->load->view('template/template_header',$data);
                $this->load->view('bu_user/template/template_top_head');
                $this->load->view('bu_user/template/template_side_bar',$data);
                $this->load->view('bu_user/change_password',$data);
                $this->load->view('template/template_footer',$data);
            
        }
        public function bu_change_password_save1(){
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
                redirect('user-bu-home');

            }else{
                $this->session->set_flashdata('error_message', 'Something went wrong');
                // After that you need to used redirect function instead of load view such as                 
                redirect('user-bu-home');    
            }
            // Array ( [user_id_slno] => EBq6D9dEDSNHWJwsfBpyxu~Tv.jXe0EAizvq1LuUHVwc58gP.wknHjWDLrJllQ8ndtLCoeV6HFl.dn9hqLQ8xg-- [token_id] => 6 [password] => abcd!2345aA ) 
            # code...
        }
        public function bu_change_password_save($value=''){
           $email_id=$this->session->userdata('bu_email_id');
            if(empty($email_id)){
                
                redirect('bu-logout-by-pass');
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
                redirect('user-bu-home');
            }else{
                $this->session->set_flashdata('error_message',' Something went wrong');
                // After that you need to used redirect home
                redirect('user-bu-home');

            }
            # code...
        }
    public function bu_view_report_a(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"No Of Pr Planned For Release V/S Actual Release",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'66','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_a',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_b(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs which are delayed beyond schedule/ List of PR to be released for given month",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'67','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_b',$data);
        $this->load->view('template/template_footer',$data); 

    }
    public function bu_view_report_c(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of POs which are delayed beyond schedule/List of PO to be released for given month",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'68','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_c',$data);
        $this->load->view('template/template_footer',$data); 
    }

     public function bu_view_report_d(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_d',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_e(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.1','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_e',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_f(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_f',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_g(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_g',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_i(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.3','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_i',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_n(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"List of PRs/Items which are technically cleared but ordering is pending",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.5','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_n',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_o(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"Material Price trend (MPT)",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.6','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_o',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_p(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"Supplier Specific spend (SSS)",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.7','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_p',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_q(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"Design Dept. Productivity (DDP)",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.8','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_q',$data);
        $this->load->view('template/template_footer',$data); 
    }
    public function bu_view_report_l(){
        $scripts='<script type="text/javascript" src="'.base_url().'file_css_admin/DataTables/datatables.min.js"></script><script src="'.base_url().'file_css_admin/own_js.js"></script>';
   
        $data=array('title' =>"Project Financials",'script_js'=>$scripts,'menu_status'=>'6','sub_menu'=>'69.8','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'','sub_menu_1'=>'','sub_menu_2'=>'','sub_menu_3'=>'');
        $this->load->view('template/template_header',$data);
        $this->load->view('bu_user/template/template_top_head');
        $this->load->view('bu_user/template/template_side_bar',$data);
        $this->load->view('bu_user/report_section/report_l',$data);
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