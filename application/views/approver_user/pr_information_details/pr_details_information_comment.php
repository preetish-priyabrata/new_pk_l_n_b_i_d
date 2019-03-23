<?php 
$email_id=$this->session->userdata('approver_email_id');
if(empty($email_id)){
	
	redirect('approve-logout-by-pass');
}
$pr_no=$Pr_no;
$slno_pr=$Pr_no_slno;
$job_code=$Project_slno; 

	$data_check_comment=array('pr_no'=>$pr_no);
	$this->db->order_by('slno', 'DESC');
	$this->db->limit('1');
	$query_comment=$this->db->get_where('master_pr_comments_c',$data_check_comment);
	$result_comm=$query_comment->result();

	$data_table=array('pr_no'=>$pr_no,'mr_forword_status'=>0);
	$query_data=$this->db->get_where('master_mr_job_details_m',$data_table);
	if($query_data->num_rows()!=1){
		$this->session->set_flashdata('error_message', ' Something went wrong ');
		redirect('user-approver-home');
		exit();
	}
$result_table=$query_data->result();

	$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$this->db->where('master_project.Project_Slno', $job_code); 	
	$query_bu = $this->db->get();

// material infromation
	$this->db->distinct();
	$this->db->select('category_name');
	$this->db->where('status', '1'); 
	$query_category = $this->db->get('master_category_item');

	$data_array_procurement=$this->approver_user->get_approver_procurement_list();
	   $result_file=$this->design_user->get_design_mr_file_list_m($pr_no,$slno_pr,$job_code);
?>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Material Requisition</a></li>
				<li class="breadcrumb-item active"> View  Comment PR Schedule</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Pr Information Comment  </h1>
			<!-- end page-header -->
			<?php if(!empty($this->session->flashdata('success_message'))){?>
			<div class="alert alert-success fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>Success!</strong>
			  <?=$this->session->flashdata('success_message')?> 
			  <!-- <a href="#" class="alert-link">an example link</a>.  -->
			</div>
			<?php 
			}
			// print_r($result_table);
			 // print_r($this->session->userdata());
			 ?>

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Comment PR details Information</h4>
				</div>
				<div class="panel-body">
					
					
					<form action="#" >
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">PR No. <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$get_mr_id=$this->design_user->get_design_mr_no();	

										?>
										<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="text" value="<?=$pr_no?>" required="" readonly>
										<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
										<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
										<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_update_approved" required="" readonly>
										<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="<?=$edit_id=$result_table[0]->edit_id?>" required="" readonly>
										<small class="f-s-12 text-grey-darker">PR No.</small>
									</div>
								</div>
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="job_code">Job Code <span style="color: red">*</span></label>
									<div class="col-md-9">
										<!-- <input class="form-control m-b-5" placeholder="Enter Activity name" name="activity_name" id="activity_name" type="text" required=""> -->
										<select name="job_code" class="form-control m-b-5" id="job_code">
											<!-- <option value="">--Select Job Code--</option> -->
											<?php
												foreach ($query_bu->result() as $key_job_code) {

													echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
												}
											?>
										</select>
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="tech_evalution">Technical Evaluation <span style="color: red">*</span></label>
									<div class="col-md-9">
										 
										<select name="tech_evalution" class="form-control m-b-5" id="tech_evalution">
											<option value="2" <?php if($result_table[0]->techinal_evalution==2){echo "selected";} ?>>No</option>
											<option value="1" <?php if($result_table[0]->techinal_evalution==1){echo "selected";} ?>>Yes</option>
										</select>
										<small class="f-s-12 text-grey-darker">Select Technical Evaluation</small>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Date Required <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 datepickers" placeholder="Enter Date Required " name="required_date" id="required_date" type="text" required="" value="<?=$result_table[0]->date_required?>">
										<small class="f-s-12 text-grey-darker">Please enter Date Required</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="job_code">Action 
										<span style="color: red">*</span></label>
									<div class="col-md-9">
										<div class="radio radio-css radio-inline">
										  <input type="radio" id="inlineCssRadio2" name="type_action"  value="1"  required=""  />
										  <label for="inlineCssRadio2">Approved</label>
										</div>
										<div class="radio radio-css radio-inline">
										  <input type="radio" id="inlineCssRadio1"  checked="" name="type_action" value="2" required="" />
										  <label for="inlineCssRadio1">Comment</label>
										</div>							
										
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="approver_id">Approver Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_approver=$this->design_user->get_design_approver_list();	
											
										?>
										
										<select name="approver_id" class="form-control m-b-5" id="approver_id">
											<?php 
											if($data_array_approver['no_user']==2){?>
												<option value="">--No Approver Is found--</option>
												<?php
											}else if($data_array_approver['no_user']==1){
												?>
												
											<?php
												foreach ($data_array_approver['user_approver'] as $key_approver) {
													?>
					<option value='<?=$key_approver->slno?>' <?php if($result_table[0]->approver_id_slno==$key_approver->slno){echo "selected";} ?>><?=$key_approver->Username." [ ".$key_approver->email_id." ]

					"?></option>
					<?php
												}
											
												
											}	
											?>										
										</select>
										<small class="f-s-12 text-grey-darker">Select Approver </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="materials_id">Material Category <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_materials=$this->design_user->get_design_material_category_list();	
										
										?>
										
										<select name="materials_id" onchange="set_ccategory()" class="form-control m-b-5" id="materials_id">
											
												<option value="">--Select Material Category--</option>
											<?php
												foreach ($query_category->result() as $value_category) {
													?>
				<option value="<?=$value_category->category_name?>" <?php if($result_table[0]->material_category_name==$value_category->category_name){echo "selected";} ?>><?=ucfirst($value_category->category_name)?></option>
													<?php
												}
											
												
											
											?>										
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" name="mr_date_of_creation" value="<?=$result_table[0]->date_creation?>" id="mr_date_of_creation" type="text" required="" readonly>
										<small class="f-s-12 text-grey-darker">Date Of Creating MR</small>
									</div>
								</div>
								
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="comment">comment 
										<span style="color: red">*</span>
									</label>
									<div class="col-md-9">															
											
												<?=$result_comm[0]->comment?>
											
										<small class="f-s-12 text-grey-darker">comment Optional </small>
									</div>
								</div>
								
							
							</div>
						 </div>
						 <div class="row">
							<div class="col-lg-12">
								<div id="cart-item-files"></div>

								<table class="table table-bordered">
									<thead>									
			                            <tr>
			                                <th><strong>File Title Name</strong></th>
			                                <th><strong>Click View</strong></th>                                
			                              
			                            </tr>
			                        </thead>
			                        <tbody>
			                            <?php foreach($result_file['files_list'] as $key_files){ ?>
			                                <tr>
			                                    <td><strong><?=$key_files->file_title?></strong></td>
			                                    <td><strong><a target="_blank" href="<?=base_url()?>upload_files/design_upload/<?=$key_files->attach_name?>">Click View</a> </strong></td>                                
			                                  
			                                </tr> 


			                            <?php }?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
						$data_material = array('mr_no_item' => $pr_no, 'edit_id'=>$edit_id);
						$table_material="master_mr_material_item_m";
						$query_table_material=$this->db->get_where($table_material,$data_material);
						// echo $this->db->last_query();
						$result_material=$query_table_material->result(); 
						?>
						 <br>
						<hr>
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Material Name</th>
											<th>UOM</th>
											<th>Technical Parameter</th>
											<th>Qnty</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result_material as $key_material => $value_material): 
											
										?>
											
									
										<tr>
											<td><?=$value_material->material_name?></td>
											<td><?=$value_material->material_unit?></td>
											<td><?=$value_material->parameter_tech?></td>
											<td><?=$value_material->material_quantity?></td>
										</tr>
											<?php endforeach ?>
									</tbody>

								</table>
							</div>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                             
                               <p><input type="button" value="Close" class="btn btn-sm btn-danger" onclick="closeCurrentTab()"</p>
                              <!--  <a  href="<?=base_url()?>user-approver-home" class="btn btn-sm btn-danger">Cancel</a>  -->
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
			<script type="text/javascript">
				function closeCurrentTab(){
				var conf=confirm("Are you sure, you want to close this tab?");
				if(conf==true){
					close();
				}
			}
			</script>
