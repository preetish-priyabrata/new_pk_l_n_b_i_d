<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
  
  redirect('bu-logout-by-pass');
}
// $this->db->select('*');
//   $this->db->from('master_project');
  // $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );         
  // $this->db->where('assign_project_user.email_id', $email_id);  
  $query_design=$query_bu = $this->db->get('master_project');

  $job_code_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $job_code_id=$this->input->post('job_code');
  // $Starting_id=($this->input->post('Starting'));
  // $ending_id=($this->input->post('ending'));
}else{
  $job_code_id=$ending_id=$Starting_id="";
}

?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>
<div class="sidebar-bg"></div>
    <!-- end #sidebar -->
    
    <!-- begin #content -->
    <div id="content" class="content">
      <!-- begin breadcrumb -->
      <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
        <!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
        <li class="breadcrumb-item active">View Project PR Schedule Tracking Tool </li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header"> View Project PR Schedule Tracking Tool 
       <!-- <small>header small text goes here...</small> -->
      </h1>
      <!-- end page-header -->
      <?php if(!empty($this->session->flashdata('success_message'))){?>
      <div class="alert alert-success fade show">
        <span class="close" data-dismiss="alert">×</span>
        <strong>Success!</strong>
        <?=$this->session->flashdata('success_message')?> 
        <!-- <a href="#" class="alert-link">an example link</a>.  -->
      </div>
      <?php 
      } if(!empty($this->session->flashdata('error_message'))){?>
      <div class="alert alert-danger fade show">
        <span class="close" data-dismiss="alert">×</span>
        <strong>Error !</strong>
        <?=$this->session->flashdata('error_message')?> 
        <!-- <a href="#" class="alert-link">an example link</a>.  -->
      </div>
      <?php 
      }
       // print_r($this->session->userdata());
       ?>

      <!-- begin panel -->
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <div class="panel-heading-btn">
          <!--  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
          <h4 class="panel-title">Project </h4>
        </div>
        
          <div class="panel-body">            
            <div class="card-body"> 
             <form action="" method="POST" enctype="multipart/form-data"  >              
                  <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3" for="project"> Project  <span style="color: red">*</span></label>
                    <div class="col-md-9">
                      <select class="form-control" name="job_code" id="job_code" required="">
                      <option value="">--Select Project---</option>
                     <?php
                          foreach ($query_design->result() as $key_job_code) {
                            ?>

                            <option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
                        <?php }
                        ?>
                      </select>
                      <!-- <input class="form-control m-b-5 datepickers" placeholder="Enter Project PR schedule" name="Date_creation" id="Date_creation" type="text" value="" required=""> -->
                      <small class="f-s-12 text-grey-darker">Please Select Project </small>
                    </div>                      
                  </div>
                </div>  
                    <div class="col-md-6 col-lg-6"><!-- part g start -->                 
                  <div class="form-group row pull-right">
                              <div class="form-group row pull-right">
                                  <div class="col-md-12">
                                      <button type="Submit" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="find">Get Info</button>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>        
              </div>
            </form>

            

<!-- 
              <div class="row">
                <br />
                <div class="col-lg-12" id="customer_data">
                <div  id="customer_data"> 

                </div>
              </div>
            </div> -->

          </div>
        </div>
                  
                  
          <?php 
      $send_button=$this->input->post('send_button');
      if($send_button=="find"){
        $table="master_pr_schedule"; 
        $job_code=$this->input->post('job_code');
          $data_check = array('job_code' => $job_code,'status_bu_used'=>'1');
                $query=$this->db->get_where($table,$data_check);
                foreach ($query_bu->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                       
                    }
                }
                // $output .= '</table>';
               
        ?>
      <div class="panel panel-inverse">
        <div class="panel-heading">         
          <h4 class="panel-title"> Project Name :- <?=$project_details_info?></h4>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped" id="table1bu" >
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
                       <th>Remarks</th>
                      <th>Drafted </th>
                      <th>Submitted </th>
                      
                    </tr>
                    </thead>
                    <tbody>
          <?php
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
                         $submited='<a href="'.base_url().'bu-view-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'"> Click View  </a> ||  <a href="'.base_url().'bu-view-edit-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'" > Click Edit  </a> ';
                    }else{
                       $submited='--' ;
                    }
                   echo $output = '
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
                
          ?>
       </tbody> </table>
      </div>

          <!-- table -->

        </div>
      </div>
    <?php }?>
            
                              
              
          
      </div>
      
<script type="text/javascript">

function load_data(){
  var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    ((''+day).length<2 ? '0' : '') + day;

// alert(output);
  var date = new Date();
  var actions_file='bu_Views_total_old';
    var Mr_no = $('#job_code').val();
    queryString_id = 'actions_file='+actions_file+'&job_code='+ Mr_no;
      if(Mr_no!=""){
        
      $.ajax({
        url:"<?php echo base_url(); ?>excel-upload/entry",
        data:queryString_id,
        method:"POST",
        success:function(data){
          $("#customer_data").html(data);
          $('.example_buyer_bu').DataTable( {
            scrollX: true,
              dom: 'Bfrtip',
              buttons: [
                  {
                      extend: 'copyHtml5',
                       title: ' PR Schedule List Tracking on  - '+date,
                      exportOptions: {
                          columns: [ 0, ':visible' ]
                      }
                  },
                  {
                      extend: 'excelHtml5',
                      title: 'PR Schedule List Tracking on  - '+output,
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  {
                      extend: 'pdfHtml5',
                      orientation:'landscape',
                      title: 'PR Schedule List Tracking on - '+output,
                      exportOptions: {
                          columns: ':visible'
                      },
                      // customize: function(doc) {
                     //            console.log(doc.content)
                     //            doc.content.splice(0, 0, {
                     //                margin: [12, 0, 0, 12],
                     //                alignment: "center",
                     //            });

                     //            doc.content[2].table.widths = ["*", "*", "*"];
                     //        }
                      // exportOptions: {
                      //     columns: [ 0, 1, 2, 5 ]
                      // }
                  },
                  'colvis'
              ]
          } );
        }
      });
    }else{
      alert('Please Select Project'); 
      $('#customer_data').html('');
    }
  }
</script>