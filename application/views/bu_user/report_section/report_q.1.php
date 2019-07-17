<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_project = $this->db->get('master_project');
$query_array_design = $this->db->get_where('master_admin',array('role_id' =>2));
$query_array_design_all= $this->db->get_where('master_admin');
?>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Report</a></li> 
				<li class="breadcrumb-item active">Report Q</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Design Dept. Productivity (DDP)<small></small></h3>
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
						
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Search Filter</h4>
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
										<label class="col-form-label col-md-3" for="job_code"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
													foreach ($query_project->result() as $key_job_code) {
														echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>
									</div>
									<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="job_code_design"> Design User Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code_design" id="job_code_design" required="">
												<option value="">--Select Design user name---</option>
												<?php
												foreach ($query_array_design->result() as $key_design) {
													
													echo "<option value='".$key_design->email_id."'>".$key_design->Username." [ ".$key_design->email_id." ]</option>";
												}
												?>
												
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Design user name</small>
										</div>
									</div>
									<div class="form-group row  m-b-15">
										<label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
										<div class="col-md-9">
									    	<div class="row row-space-10">
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5"  name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" />
												</div>
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" />
												</div>
											</div>
										</div>
                                	</div>
									

													
								</div>
								<div class="col-md-6 col-lg-6"><!-- part g start -->									
									<div class="form-group row pull-right">
					                    <div class="form-group row pull-right">
					                        <div class="col-md-12">
					                            <button type="Submit" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="find">Search</button>
					                            
					                        </div>
					                    </div>
					                </div>
					            </div>					            
					        </div>
					    </div>
				</form>
					
				</div>
			</div>
			<!-- end panel -->
	
        
        <?php 
			$send_button=$this->input->post('send_button');
			if($send_button=="find"){
				// print_r($this->input->post());
				// Array ( [job_code] => 1 [job_code_design] => sam@ilab.com [Starting] => 05/01/2019 [ending] => 05/27/2019 [send_button] => find ) 
				// $table="master_pr_schedule"; 
                $job_code=$this->input->post('job_code');
                // ,'status'=>1, 'mr_status'=>1
				// $data_check = array('job_code' => $job_code);               
                foreach ($query_project->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
				}

				
				$job_code_design=$this->input->post('job_code_design');
				
				foreach ($query_array_design->result() as $key_design) {
					if($key_design->email_id==$job_code_design){
						$design_user=$key_design->Username." [ ".$key_design->email_id." ]";
					}

				}

				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));

				$this->db->from('master_pr_process_detail');
				$this->db->where('master_pr_process_detail.design_date >=', $Starting_query);
				$this->db->where('master_pr_process_detail.design_date <=', $ending_query);
				$this->db->where('master_pr_process_detail.design_user_id', $job_code_design);
				$this->db->where('master_pr_process_detail.project_slno', $job_code);
			
				// $this->db->join('master_pr_process_detail', 'master_pr_process_detail.pr_no = master_pr_bid_qoute_item_total.pr_no');
				$this->db->join('master_pr_schedule', 'master_pr_schedule.pr_no = master_pr_process_detail.pr_no');
				
			$query_supplyer_wise_info=$this->db->get();

                
				
               
				?>
       		<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title">Project Name :- <?=$project_details_info?> || Design User :- <?=$design_user?> </h4>

				</div>

				<div class="panel-body">
				<div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Start Date </label>
                            <div class="col-md-9">
                                <?=$Starting?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> End Date </label>
                            <div class="col-md-9">
                             <?=$ending?>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-md-12 col-lg-12">
						<div class="table-responsive">
                        	<table id="table1bu" class="table table-bordered" border="1">
                            	<thead>
                                	<tr>
										<th>Project Name</th>
										<th>Design User Name</th>
										<th>Approved By(design approver's name)</th>
										<th>Item Name</th>
										<th>Scheduled PR date</th>
										<th>Actual PR released date</th>
										<th>Delay in PR release(in days)</th>
										<th>Scheduled Technical Clearance (TC)date</th>
										<th>Actual Technical Clearance(TC)date</th>
										<th>Delay in technical clearance(in days)</th>
										<th>Post order Actual drawing / datasheet submission date</th>
										<!-- <th>Final Drg. No.</th>
										<th>Scheduled manufacturing date</th>
										<th>Actual manufacturing clearance date</th>
										<th>Delay in giving manufacturing clearance</th>
										<th>Remarks(issues faced)</th> -->
									</tr>
                            	</thead>
                            	<tbody>
									<?php
										// print_r($query_supplyer_wise_info->result());
										foreach($query_supplyer_wise_info->result() as $row_project):
											$Project_Name_id=$row_project->project_slno;
											foreach ($query_project->result() as $key_job_code) {
												if($key_job_code->Project_Slno==$Project_Name_id){
													$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
													$job_Code=$key_job_code->job_Code;
													$project_Description=$key_job_code->project_Description;
													$Project_Name_new=ucwords($key_job_code->Project_Name);
												}
											}
											$design_user_id=$row_project->design_user_id;
											foreach ($query_array_design->result() as $key_design) {
												if($key_design->email_id==$design_user_id){
													// $design_user=$key_design->Username." [ ".$key_design->email_id." ]";
													$Username=ucwords($key_design->Username);
												}
							
											}
											$approver_user_id=$row_project->approver_user_id;
											if(!empty($approver_user_id)){
												foreach ($query_array_design_all->result() as $key_design) {
													if($key_design->email_id==$approver_user_id){
														// $design_user=$key_design->Username." [ ".$key_design->email_id." ]";
														$approver_user_Username=ucwords($key_design->Username);
													}
								
												}
												$design_date=$row_project->design_date;
												$original_schedule=$row_project->original_schedule;
												$date1_orginal = date('Y-m-d',strtotime($original_schedule));  
												$date1=date_create($date1_orginal);
												$date2=date_create($design_date);
												$diff=date_diff($date1,$date2);
												// echo $diff->format("%R%a days");
												$value_delay=$diff->format("%R%a days");

												$planned_technical_clearance_date=$row_project->planned_technical_clearance_date;
												if($row_project->technical_user_status==1){
													$technical_date=$row_project->technical_date;
													$technical_date_tech=date('d-m-Y',strtotime($technical_date));
													$planned_technical_clearance_date_new = date('Y-m-d',strtotime($planned_technical_clearance_date));  
													$date1_new=date_create($planned_technical_clearance_date_new);
													$date2_new=date_create($technical_date);
													$diff=date_diff($date1_new,$date2_new);
													// echo $diff->format("%R%a days");
													$value_delay_new_tech=$diff->format("%R%a days");

												}else{
													$technical_date_tech=$value_delay_new_tech="--";
												}
												$drg_submission_date=$row_project->drg_submission_date;
												if(!empty($drg_submission_date)){
													$drg_submission_date_new=date('d-m-Y',strtotime($drg_submission_date));
												}else{
													$drg_submission_date_new="--";
													
												}
											}else{
												$value_delay=$approver_user_Username="--";
											}
									?>
									<tr>
										<td><?=$Project_Name_new?></td>
										<td><?=$Username?></td>
										<td><?=$approver_user_Username?></td>
										<td><?=$row_project->item?></td>
										<td><?= date('d-m-Y',strtotime($original_schedule)); ?></td>
										<td><?= date('d-m-Y',strtotime($design_date)); ?></td>
										<td><?=$value_delay?></td>
										<td><?= date('d-m-Y',strtotime($planned_technical_clearance_date)); ?></td>
										<td><?= $technical_date_tech; ?></td>
										<td><?=$value_delay_new_tech?></td>
										<td><?=$drg_submission_date_new?></td>
										<!-- <td>Not Found</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td> -->
									</tr>
										<?php endforeach; ?>
                            	</tbody>
							</table>
						</div>
                    </div>

                </div>

					
				</div>
			</div>
		<?php }?>
        </div>
        <!-- end #content -->			
					        		        
					    
					