<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
	$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$query_design = $this->db->get();
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
				<li class="breadcrumb-item active">PR Schedule Approved</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project PR Schedule Approved
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
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
					<!-- 	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title"> PR Schedule Approved</h4>
				</div>	
				<div class="panel-body">
					<form action="" method="POST" enctype="multipart/form-data"	>
						<div class="alert alert-secondary">
	                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
	                    </div>	   
	                    <div class="card-body">						        	
							<hr>
						    <div class="row">
								<div class="col-md-6 col-lg-6">
								 	<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control" onchange="load_data()" name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php foreach ($query_design->result() as $key_job_code) {
														?>

														<option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
												<?php	}
												?>
											</select>
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
					    </div>
					</form>
				</div>
			</div>
			<?php 
			$send_button=$this->input->post('send_button');
			if($send_button=="find"){
				$table="master_pr_schedule"; 
				$job_code=$this->input->post('job_code');
				$data_check = array('job_code' => $job_code,'status'=>1, 'mr_status'=>1);
                $query=$this->db->get_where($table,$data_check);
                foreach ($query_design->result() as $key_job_code) {
					if($key_job_code->Project_Slno==$job_code){
						$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";

					}
				}

?>
<div class="panel panel-inverse">
<div class="panel-heading">					
	<h4 class="panel-title"> Project Name :- <?=$project_details_info?></h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">

					<table id="table1" class="table" style="width:100%">
						<thead>
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>
                      <th>Comment from Bu User</th>
                      <th>Area</th>
                      <th>Item</th>
                      <th>UOM</th>
                      <th>Schedule PR Quantity</th>
                      <th>Original Schedule</th>
                      <th>Revised Schedule</th>
                      <th>Status</th>
                      <th>Remarks To Approver</th>
                      <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
					<?php
					 foreach($query->result() as $row){
					 	$pr_no=$row->pr_no;
					 	$data_check=array('pr_no'=>$pr_no,'design_user_id'=>$email_id);
					 	$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
					 	$num_rows_check=$query_check->num_rows();
					 	if($num_rows_check!=0){
					 		$result_id=$query_check->result();
					 		if(!empty($result_id[0]->design_user_remark)){
		                        $remark=$result_id[0]->design_user_remark;
		                    }else{
		                        $remark= 'No Remarks';
		                    }
					 		
					 		$design_user_status=$result_id[0]->design_user_status;
					 		switch ($design_user_status) {
					 			case '1': // completed
					 				$status_detai="Approved";
					 				$url='<a href="'.base_url().'design-mr-view-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/1" target="_blank"> Click to View </a>';
					 				break;
					 			case '2': //drafted
					 					$status_detai="Drafted";
					 					$url='#';
					 					// $url='<a href="'.base_url().'design-mr-view-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" target="_blank"> Click to View </a>';
					 				break;
					 			case '3': //waiting for approval
					 				$status_detai="waiting for approval";
					 					$url='<a href="'.base_url().'design-mr-view-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/3" target="_blank"> Click to View </a>';
					 				break;
					 			case '4': // resubmission
					 				$status_detai="Resubmitted";
					 					$url='<a href="'.base_url().'design-mr-view-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/4" target="_blank"> Click to Resubmit </a>';
					 				break;
					 			
					 			default:
					 				# code...
					 				break;
					 		}
		                    echo '
		                    <tr>
		                      <td>'.$row->discipline.'</td>
		                      <td>'.$row->pr_no.'</td>
		                      <td>'.$row->comment.'</td>
		                      <td>'.$row->area.'</td>
		                      <td>'.$row->item.'</td>
		                      <td>'.$row->UOM.'</td>
		                      <td>'.$row->quantity.'</td>
		                      <td>'.date('d-m-Y',strtotime($row->original_schedule)).'</td> 
		                      <td>'.date('d-m-Y',strtotime($row->revised_schedule)).'</td> 
		                      <td>'.$status_detai.'</td>
		                      <td>'.$remark.'</td>
		                      <td>'.$url.'</td>
		                    </tr>
		                    ';
		                }
		            }
					?>
				</tbody>
				</table>
					<!-- table -->
				</div>

				</div>
			</div>
		<?php }?>
		<script>
		$(document).ready(function() {
    $('#table1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
    } );
} );
		</script>						
					        		        
					    
					