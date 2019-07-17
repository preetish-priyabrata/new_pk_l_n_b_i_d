<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
	$this->db->select('*');
	$this->db->from('master_project');
	$this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	$this->db->where('assign_project_user.email_id', $email_id); 	
	$query_design = $this->db->get();

?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">Project PR Schedule</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project PR Schedule
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
					<h4 class="panel-title"> PR Schedule </h4>
				</div>	
				<div class="panel-body">
					<form  	action="" method="POST">						   
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
														echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project For Upload PR Schedule</small>
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


					<div class="row">
						<br />
						<div class="table-responsive" id="customer_data">

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>	
<script type="text/javascript">

function load_data(){
	var actions_file='bu_Views_total';
    var Mr_no = $('#job_code').val();
    queryString_id = 'actions_file='+actions_file+'&job_code='+ Mr_no;
	    if(Mr_no!=""){
	    	$('#sub').show();
			// jQuery.ajax({
			// 	url: "<?php echo base_url(); ?>file-upload-data",
			// 	data:queryString_id,
			// 	type: "POST",
			// 	success:function(data){
			// 		$("#cart-item-files").html(data);
			// 	}
			// });
			$.ajax({
				url:"<?php echo base_url(); ?>design-pr-schedule-api",
				data:queryString_id,
				method:"POST",
				success:function(data){
					$('#customer_data').html(data);
				}
			});
		}else{
			alert('Please Select Project');	
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
