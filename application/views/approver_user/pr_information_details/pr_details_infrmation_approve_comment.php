<?php 
$email_id=$this->session->userdata('approver_email_id');
if(empty($email_id)){
	
	redirect('approve-logout-by-pass');
}
$pr_no=$Pr_no;
$slno_pr=$Pr_no_slno;
$job_code=$Project_slno; 
$data_process = array('pr_no' => $pr_no,'approver_user_id'=>$email_id);
$result_table_process=$this->db->get_where('master_pr_process_detail',$data_process)->result();
$result_table_process_id=$this->db->get_where('master_pr_process_detail',$data_process);
if($result_table_process_id->num_rows()!=1){
	$this->session->set_flashdata('error_message', ' Invalid Link ');
	redirect('user-approver-home');

}
$result_pr_approver=$result_table_process_id->result();
if($result_pr_approver[0]->approver_user_status==0){
	$this->session->set_flashdata('error_message', ' Pr No '.$pr_no.' Is submitted to design user for resubmitting again');
	redirect('user-approver-home');
}
if($result_pr_approver[0]->approver_user_status==1){
	$this->session->set_flashdata('success_message', ' Pr No '.$pr_no.' Is approved please check inside Project PRs Approved');
	redirect('user-approver-home');
}
// ,'approver_user_status'=>2


// 
$data_table=array('pr_no'=>$pr_no,'mr_forword_status'=>0);
$query_data=$this->db->get_where('master_mr_job_details_m',$data_table);
// echo  $this->db->last_query();
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
		$url_remark='<a target="_blank" class="btn btn-sm btn-success" href="'.base_url().'approver-pr-remark-history/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/1"> Click to View Remarks</a>';
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">PR</a></li>
				<li class="breadcrumb-item active"> View  Approve And Comment PR Schedule</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">PR Information  </h1>
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
					<h4 class="panel-title">PR details Information</h4>
				</div>
				<div class="panel-body">
					<div class="row pull-right">
								<div class="col-md-12">        
								<?=$url_remark?>
								</div>
						</div>
						<br>
						<br>
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="<?=base_url()?>approver-add-new-pr-save" method="POST" >
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
										<select name="job_code" class="form-control-plaintext m-b-5" id="job_code">
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
										 
										<select name="tech_evalution" class="form-control-plaintext m-b-5" id="tech_evalution">
											<option value="2" <?php if($result_table[0]->techinal_evalution==2){echo "selected";} ?>>No</option>
											<option value="1" <?php if($result_table[0]->techinal_evalution==1){echo "selected";} ?>>Yes</option>
										</select>
										<small class="f-s-12 text-grey-darker">Select Technical Evaluation</small>
									</div>
								</div>

								<input class="form-control m-b-5 datepickers" placeholder="Enter Date Required " name="required_date" id="required_date" type="hidden" required="" value="<?=$result_table[0]->date_required?>">
								<!-- <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Date Required <span style="color: red">*</span></label>
									<div class="col-md-9">
										
										
										<small class="f-s-12 text-grey-darker">Please enter Date Required</small>
									</div>
								</div> -->
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="date_clearfication_bid">Planned Technical Date <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 datepickers" placeholder="Enter Planned Technical Date" name="planned_technical_clearance_date" id="planned_technical_clearance_date" type="text" required="" value="<?=$result_table_process[0]->planned_technical_clearance_date?>">
										<small class="f-s-12 text-grey-darker">Please Select Planned Technical Date</small>
									</div>
								</div>
								
								<div class="form-group row m-b-15" id="remark_ids">
									<label class="col-form-label col-md-3">Remark<span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control" rows="3" name="Remark" id="remark" required=""></textarea>
										<small class="f-s-12 text-grey-darker"> Please enter Remark To Procurement </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="job_code">Action 
										<span style="color: red">*</span></label>
									<div class="col-md-9">
										<div class="radio radio-css radio-inline">
										  <input type="radio" id="inlineCssRadio2" name="type_action"  value="1"  required="" />
										  <label for="inlineCssRadio2">Approved</label>
										</div>
										<div class="radio radio-css radio-inline">
										  <input type="radio" id="inlineCssRadio1" name="type_action" value="2" required="" />
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
										
										<select name="approver_id" class="form-control-plaintext m-b-5" id="approver_id">
											<?php 
											if($data_array_approver['no_user']==2){?>
												<option value="">--No Approver Is found--</option>
												<?php
											}else if($data_array_approver['no_user']==1){
												?>
												
											<?php
												foreach ($data_array_approver['user_approver'] as $key_approver) {
													if($result_table[0]->approver_id_slno==$key_approver->slno){
													?>
					<option value='<?=$key_approver->slno?>' <?php if($result_table[0]->approver_id_slno==$key_approver->slno){echo "selected";} ?>><?=$key_approver->Username." [ ".$key_approver->email_id." ]

					"?></option>
					<?php
							}
												}
											
												
											}	
											?>										
										</select>
										<small class="f-s-12 text-grey-darker">Select Approver </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<!--<label class="col-form-label col-md-3" for="materials_id">Material Category <span style="color: red">*</span></label>-->
									<!--<div class="col-md-9">
										<?php
										$data_array_materials=$this->design_user->get_design_material_category_list();	
										
										?>
										
										<select name="materials_id" onchange="set_ccategory()" class="form-control-plaintext m-b-5" id="materials_id">
											
												<option value="">--Select Material Category--</option>
											<?php
												foreach ($query_category->result() as $value_category) {
													if($result_table[0]->material_category_name==$value_category->category_name){
													?>
				<option value="<?=$value_category->category_name?>" <?php if($result_table[0]->material_category_name==$value_category->category_name){echo "selected";} ?>><?=ucfirst($value_category->category_name)?></option>
													<?php
												}
											}
											
												
											
											?>										
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>-->
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" name="mr_date_of_creation" value="<?=$result_table[0]->date_creation?>" id="mr_date_of_creation" type="text" required="" readonly>
										<small class="f-s-12 text-grey-darker">Date Of Creating PR</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Procurement">Procurement Name 
										<span style="color: red">*</span>
									</label>
									<div class="col-md-9">															
										<select name="Procurement" class="form-control m-b-5" id="Procurement" required="" >
											<?php 
											if($data_array_procurement['no_user']==2){?>
												<option value="">--No Procurement Is found--</option>
												<?php
											}else if($data_array_procurement['no_user']==1){
												?>
												<option value="">--Select Procurement--</option>
												<?php
												foreach ($data_array_procurement['user_approver'] as $key_procurement) {
													
													echo "<option value='".$key_procurement->slno."'>".$key_procurement->Username." [ ".$key_procurement->email_id." ]</option>";
												}
											}	
											?>											
										</select>
										<small class="f-s-12 text-grey-darker">Select Procurement </small>
									</div>
								</div>
								<div class="form-group row m-b-15" id="comment_view">
									<label class="col-form-label col-md-3" for="comment">comment 
										<span style="color: red">*</span>
									</label>
									<div class="col-md-9">															
											<textarea  name="comment" class='text_areas form-control m-b-5' id='comment'></textarea>
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
			                                <th><strong>Click to View</strong></th>                                
			                              
			                            </tr>
			                        </thead>
			                        <tbody>
			                            <?php foreach($result_file['files_list'] as $key_files){ ?>
			                                <tr>
			                                    <td><strong><?=$key_files->file_title?></strong></td>
			                                    <td><strong><a target="_blank" href="<?=base_url()?>upload_files/design_upload/<?=$key_files->attach_name?>">Click to View</a> </strong></td>                                
			                                  
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
											<th>Technical Parameters</th>
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
                               <!--  <button type="submit" class="btn btn-sm btn-primary m-r-5" >Next</button> -->
                               <!-- <input type="submit" name="submission" value="Save" class="btn btn-success btn-sm"> -->
                               <input type="submit" name="submission"   onclick="return submitCheck()" value="Send" class="btn btn-info btn-sm">
                               <a  href="<?=base_url()?>user-approver-home" class="btn btn-sm btn-danger">Cancel</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
<script type="text/javascript">
	function submitCheck(){
		var radioValue = $("input[name='type_action']:checked").val();
		// alert(radioValue);
        if(radioValue==2){
					var textboxes = $('[id=comment]');
					var emptytextboxes = textboxes.filter(function(){
						return this.value == "";
					});
					if(textboxes.length == emptytextboxes.length){
						alert('Comment should be filled');  
						return false;
					} 
					$('#remark').prop('required',false); 
					$('#Procurement').prop('required',false);
						// $('#Procurement').removeAttr('required');​​​​​
						return true;
				}else{
						$('#remark').prop('required',true);
						$('#Procurement').prop('required',true);
						return true;
        }	    
	}
	$(document).ready(function() {
		$('#comment_view').hide();
		$('#remark_ids').hide();
		$("input:radio[name='type_action']:checked").change(function () {
			// alert();
			var radioValue = $("input[name='type_action']:checked").val();
			if(radioValue==2){
				$('#comment_view').show();
				$('#remark_ids').hide();
			}else{
				$('#comment_view').hide();
				$('#remark_ids').show();
			}
		});
	});
	$(document).ready(function() {
    $('input:radio[name=type_action]').change(function() {
        if (this.value == 2) {
					$('#comment_view').show();
					$('#remark_ids').hide();
					$('#comment').prop('required',true);
					$('#remark').prop('required',false); 
					$('#Procurement').prop('required',false);
        }else if (this.value == 1) {
					
					$('#comment_view').hide();
					$('#remark_ids').show();
					$('#comment').prop('required',false);
					$('#remark').prop('required',true);
					$('#Procurement').prop('required',true);
        }
    });
});
</script>