<?php 
// $email_id=$this->session->userdata('bu_email_id');
// if(empty($email_id)){
	
// 	redirect('bu-logout-by-pass');
// }
	$this->db->select('*');
	$this->db->from('master_project');
		
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
				<li class="breadcrumb-item active">PR Schedule Remarks</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project PR Schedule Remarks
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
					<h4 class="panel-title"> PR Schedule Remarks </h4>
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
											<select class="form-control" name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
													foreach ($query_design->result() as $key_job_code) {
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
				$data_check = array('job_code' => $job_code,'status'=>1);
				 foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
                $query=$this->db->get_where($table,$data_check);
                    // echo  $this->db->last_query();
               
               
                // $output .= '</table>';
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title">  Project Name :- <?=$project_details_info?> </h4>
				</div>
				<div class="panel-body">

					<table id="table1bu" class="table" style="width:100%">
						<thead>
                    <tr>
                      <th>Discipline</th>
                      <th>PR No</th>   
                       <th>PR Details</th>                      
                      <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
					<?php
					 foreach($query->result() as $row){
					 	$pr_no=$row->pr_no;
                        $url='<a href="'.base_url().'bu-pr-remark-history/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/1"> Click to View Remarks</a>';
		                    echo '
		                    <tr>
		                      <td>'.$row->discipline.'</td>
		                      <td>'.$row->pr_no.'</td>	
		                       <td>'.$row->item.'</td>		                     
		                      <td>'.$url.'</td>
		                    </tr>
		                    ';
		                }
		          
					?>
				</tbody>
				</table>
					<!-- table -->
					<div class="form-group row pull-right">
                            <div class="col-md-12">
                             
                                <a  href="<?=base_url()?>user-bu-home" class="btn btn-sm btn-default btn-success">Back</a> 
                            </div>
                        </div>
				</div>
			</div>
		<?php }?>
		</div>
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
					