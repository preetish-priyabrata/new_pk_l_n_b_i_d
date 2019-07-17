<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$query_bu = $this->db->get();

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">PR Schedule View</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> View PR Schedule
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
					<!-- 	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">View PR Schedule</h4>
				</div>
				
					<div class="panel-body">						
						<div class="card-body">
						<form action="" method="POST" enctype="multipart/form-data"  > 					    	
					        <div class="row">
								<div class="col-md-6 col-lg-6">
								 	<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="project"> Project  <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code" id="job_code" required="">
											<option value="">--Select Project---</option>
											<?php
												foreach ($query_bu->result() as $key_job_code) {
													echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
												}
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
						
					</div>

					<?php 
      $send_button=$this->input->post('send_button');
      if($send_button=="find"){
        $table="master_pr_schedule"; 
        $job_code=$this->input->post('job_code');
          $data_check = array('job_code' => $job_code,'status_bu_used'=>'0');
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
          <?php
          foreach($query->result() as $row){
			$pr_no=$row->pr_no;
			$data_check=array('pr_no'=>$pr_no,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1,'commercial_complete_status'=>1);
			$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
			$num_rows_check=$query_check->num_rows();
				if($num_rows_check==1){
                    if(!empty($row->remark_design)){
                        $remark=$row->remark_design;
                    }else{
                        $remark= '<a href="'.base_url().'bu-mr-new-remark-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" > Remark  </a>';
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
                        <td>'.$remark.'</td>
                      
                       <td><a href="'.base_url().'bu-mr-new-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" target="_blank"> Create Tracking Tool  </a>
                      </td>
                    </tr>
					';
				}
			}
                
          ?>
	   </tbody> </table>
		</div>
          <!-- table -->

        </div>
      </div>
    <?php }?>
            
                              
              
          
      
                
		
<script type="text/javascript">

function load_data(){
	var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    ((''+day).length<2 ? '0' : '') + day;

	var date = new Date();
	var actions_file='bu_Views_total';
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
					             title: ' PR Schedule List on  - '+date,
					            exportOptions: {
					                columns: [ 0, ':visible' ]
					            }
					        },
					        {
					            extend: 'excelHtml5',
					            title: 'PR Schedule List on  - '+output,
					            exportOptions: {
					                columns: ':visible'
					            }
					        },
					        {
					            extend: 'pdfHtml5',
					            orientation:'landscape',
					            title: 'PR Schedule List on - '+output,
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

		$(document).ready(function() {
    $('#table1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
} );
		
					
</script>