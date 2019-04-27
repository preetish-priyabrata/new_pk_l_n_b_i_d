<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
$pr_no=$Pr_no;
$slno_pr=$Pr_no_slno;
$job_code=$Project_slno;

$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();

//Project_Slno
$data_table=array('pr_no'=>$pr_no,'mr_forword_status'=>1);
$query_data=$this->db->get_where('master_mr_job_details_m',$data_table);
if($query_data->num_rows()!=1){
	$this->session->set_flashdata('error_message', ' Something went wrong ');
	// redirect('user-procurement-home');
	// exit();
}
$result_table=$query_data->result();

	$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$this->db->where('master_project.Project_Slno', $job_code); 	
	$query_bu = $this->db->get();

	$this->db->distinct();
	$this->db->select('category_name');
	$this->db->where('status', '1'); 
	$query_category = $this->db->get('master_category_item');
    
    $data_array_procurement=$this->approver_user->get_approver_procurement_list();
	   $result_file=$this->design_user->get_design_mr_file_list_m($pr_no,$slno_pr,$job_code);
	   $url_remark='<a target="_blank" class="btn btn-sm btn-success" href="'.base_url().'buyer-pr-remark-history/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/1"> Click View Remark</a>';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-procurement-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">PR</a></li>
				<li class="breadcrumb-item active"> Forward to buyer complete details </li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> Create Bid For PR  </h1>
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
			 // print_r($this->session->userdata());
			 ?>
			 <?php if(!empty($this->session->flashdata('error_message'))){?>
			<div class="alert alert-danger fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>Error!</strong>
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
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title"> Create Bid For PR </h4>
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
					<form action="<?=base_url()?>buyer-add-new-pr-comm-arr-save" method="POST" enctype='multipart/form-data'>
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
										<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>

										<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="<?=$edit_id=$result_table[0]->edit_id?>"required="" readonly>

										<input class="form-control m-b-5"  name="commercial_edit_id" id="commercial_edit_id" type="hidden" value="<?=$commercial_edit_id=$result_process[0]->commercial_edit_id?>"required="" readonly>

										<input class="form-control m-b-5"  name="commercial_resubmit_count" id="commercial_resubmit_count" type="hidden" value="<?=$commercial_resubmit_count=$result_process[0]->commercial_resubmit_count?>"required="" readonly>

										<input class="form-control m-b-5"  name="commercial_resubmit_status" id="commercial_resubmit_status" type="hidden" value="<?=$commercial_resubmit_status=$result_process[0]->commercial_resubmit_status?>"required="" readonly>

										<input type="hidden"  name="tech_evalution"  value="<?=$result_table[0]->techinal_evalution?>">
										
										<input type="hidden"  name="tcomm_evalution_commer"  value="Coomerical_start">
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
									<label class="col-form-label col-md-3" for="tech_evalution">Technical Evaluation </label>
									<div class="col-md-9">
										
									
										<?php 
											if($result_table[0]->techinal_evalution==2){
												$tech= "NO";
											}elseif($result_table[0]->techinal_evalution==1){
												$tech= "YES";} ?>
										<input class="form-control m-b-5" placeholder="Enter" name="tech_name_ids" id="tech_name_ids" type="text" required=""value="<?=$tech?>" readonly>
									</div>
								</div>

								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Date Required <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 datepickers" placeholder="Enter Date Required " name="required_date" id="required_date" type="text" required=""value="<?=$result_table[0]->date_required?>" readonly>
										<small class="f-s-12 text-grey-darker">Please enter Date Required</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Ace_value_detail">ACE Value<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 " placeholder="Enter ACE Value  " name="Ace_value_detail" id="Ace_value_detail" type="text" value="0" >
										<small class="f-s-12 text-grey-darker">Please enter ACE Value (optional)</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="terms_condition_file">Terms and Conditions<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input name="terms_condition_file" id="terms_condition_file" type="file" required="">
										<small class="f-s-12 text-grey-darker">Please  Upload Files Of Terms and Conditions</small>
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
													if($result_process[0]->approver_user_id==$key_approver->email_id){
													?>
														<option value='<?=$key_approver->slno?>' <?php if($result_table[0]->approver_id_slno==$key_approver->slno){echo "selected";} ?>><?=$key_approver->Username." [ ".$key_approver->email_id." ]

														"?></option>
														<?php
													}
												}
											
												
											}	
											?>		
										</select>
										<small class="f-s-12 text-grey-darker">Select Approver</small>
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
												
												<?php
												foreach ($data_array_procurement['user_approver'] as $key_procurement) {
													if($result_process[0]->procurement_user_id==$key_procurement->email_id){
													echo "<option value='".$key_procurement->slno."'>".$key_procurement->Username." [ ".$key_procurement->email_id." ]</option>";
												}
											}
											}	
											?>											
										</select>
										<small class="f-s-12 text-grey-darker">Select Procurement </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="buyer_id">Buyer Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_buyer=$this->procurement_user->get_procurement_buyer_list();	
											
										?>
										
										<select name="buyer_id" class="form-control m-b-5" id="buyer_id"  required="" >
											<?php 
											if($data_array_buyer['no_user']==2){?>
												<option value="">--No Buyer Is found--</option>
												<?php
											}else if($data_array_buyer['no_user']==1){
												?>
															
											<?php
												foreach ($data_array_buyer['user_buyer_list'] as $key_buyer) {
													if($result_process[0]->buyer_user_id==$key_buyer->email_id){
													echo "<option value='".$key_buyer->slno."'>".$key_buyer->Username." [ ".$key_buyer->email_id." ]</option>";
												}

											}
												
											}	
											?>										
																
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Buyer </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Technical_ev" >Commercial Evaluator Name <span style="color: red">*</span></label>
													<div class="col-md-9">
														<?php
														$data_array_approver=$this->buyer_user->get_user_generic_list('1','0','0','10','','');	
															
														?>
														
														<select name="Commerical"  class="form-control m-b-5" id="Commerical" required="" multiple>
															<?php 
															if($data_array_approver['no_user']==2){?>
																<option value="">--No Commercial Evaluator Is found--</option>
																<?php
															}else if($data_array_approver['no_user']==1){
																?>
																<!-- <option value="">--Select Commercial Evaluator--</option> -->
															<?php
																foreach ($data_array_approver['user_approver'] as $key_approver) {
																	echo "<option value='".$key_approver->slno."'>".$key_approver->Username." [ ".$key_approver->email_id." ]</option>";
																}
															
																
															}	
															?>										
															
														</select>
														<small class="f-s-12 text-grey-darker">Select Commerical Evaluator </small>
													</div>
												</div>

								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" name="mr_date_of_creation" value="<?=$result_table[0]->date_creation?>"  id="mr_date_of_creation" type="text" required="" readonly>
										<small class="f-s-12 text-grey-darker">Date Of Creating PR</small>
									</div>
								</div>
								

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
								
							</div>
						</div>
						<div class="row">
					<div class="col-md-12 col-lg-12">
						<div id="accordion">
							<div class="card">
								<div class="card-header text-center">
									<a class="card-link" data-toggle="collapse" href="#collapseOne">
										Basic Details
									</a>
								</div>
								<div id="collapseOne" class="collapse show" data-parent="#accordion">
									<div class="card-body">
										<h5 class="text-left">Basic Details</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part A -->
											<div class="col-md-6 col-lg-6">
												<!-- Part A Start  -->

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_create">Date </label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="" name="date_create" id="date_create" type="text" value="<?=date('Y-m-d')?>" required="" readonly style='opacity: 1'>
															<small class="f-s-12 text-grey-darker">---</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_ref_no">Bid Ref No. <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" onkeyup="get_bid_ref(1)" placeholder="Enter Bid Ref No" name="bid_ref_no" id="bid_ref_no" type="text" required="" >
														<span id="job_code_error1"></span><br>	
														<small class="f-s-12 text-grey-darker">Here enter Bid Ref No. Should Be Unique</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_method">Mode Of Selection <span style="color: red">*</span></label>
													<div class="col-md-9">
												  		<select class="form-control" id="bid_method"  name="bid_method" required="">
												    		<option value="">--Please Select Mode Of Selection--</option>
												    		<option value="Closed Bid">Closed Bid </option>
												    		<option value="Rank Order Bid">Rank Order Bid </option>
												    		<option value="Simple Bid">Simple Bid </option>
												  		</select>
												  		<small class="f-s-12 text-grey-darker">Please Select Mode Of Selection</small>
												  	</div>
												</div> 

												<!-- part A end -->
											</div>

											<!-- Part B -->
											<div class="col-md-6 col-lg-6">
												<!-- part B Start -->

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_publish">Bid Publish Date <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="Enter Activity name" name="date_publish" id="date_publish" type="text" required="" >
														<small class="f-s-12 text-grey-darker">Please Select Bid Publish Date</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_Id">Bid Id <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Bid Id " onkeyup="get_bid_ref(2)" name="bid_Id" id="bid_Id" type="text" required="" >
														<span id="job_code_error2"></span><br>	
														<small class="f-s-12 text-grey-darker">Here enter Bid Id Should Be Unique</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_closing">Date Of Closing <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="Enter Date Of Closing" name="date_closing" id="date_closing" type="text" required="" >
														<small class="f-s-12 text-grey-darker">Please Select Date Of Closing</small>
													</div>
												</div>


												<!-- part B End -->
											</div>
											<!-- part B  -->
										</div>
									</div>
								</div>
							</div>
							<!-- part Accordion 1 End -->
							<!-- Part Accordion 2 Start -->
							<div class="card">
								<div class="card-header text-center">
									<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
										Work Item Details
									</a>
								</div>
								<div id="collapseTwo" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<h5 class="text-left">Work Item Details</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part c -->
											<div class="col-md-6 col-lg-6">
												<!-- part c start -->

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_title">Bid Title  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Bid Title" name="bid_title" id="bid_title" type="text" required="">
														<small class="f-s-12 text-grey-darker">Here enter Bid Title</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_period_work">Period Of Work  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Period Of Work" name="bid_period_work" id="bid_period_work" type="text" required="">
														<small class="f-s-12 text-grey-darker">Here enter Period Of Work</small>
													</div>
												</div>

												<!-- part c end -->
											</div>
											<!-- part c end here -->
											<!-- part d -->
											<div class="col-md-6 col-lg-6">
												<!-- part d start -->

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3">Work Description  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<textarea class="form-control" rows="3" name="bid_work_description" required=""></textarea>
														<small class="f-s-12 text-grey-darker"> Please enter Work Description  </small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="bid_location_work">Location Of Work  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Location Of Work" name="bid_location_work" id="bid_location_work" type="text" required="">
														<small class="f-s-12 text-grey-darker">Here enter Location Of Work</small>
													</div>
												</div>


												<!-- part d end -->
											</div>
											<!-- part d end here -->
										</div>
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
															<th>suggested Price</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($result_material as $key_material => $value_material): 
															
														?>
															
												
														<tr>
															<input type="hidden" name="item_mateial_slno[]" Value="<?=$value_material->slno_item_mr?>" required>
															<td><?=$value_material->material_name?></td>
															<td><?=$value_material->material_unit?></td>
															<td><?=$value_material->parameter_tech?></td>
															<td><?=$value_material->material_quantity?></td>
															<td><input type="text" name="unit_price[<?=$value_material->slno_item_mr?>]" required></td>
														</tr>
															<?php endforeach ?>
													</tbody>

												</table>
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- part Accordion 2 End -->
							<!-- Part Accordion 3 Start -->
							<div class="card">
								<div class="card-header text-center">
									<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
										Critical Date
									</a>
								</div>
								<div id="collapseThree" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<h5 class="text-left">Work Item Details</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part e -->
											<div class="col-md-6 col-lg-6">
												<!-- part e start -->

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_start_bid">Bid Start Date <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="EnterBid Start Date" name="date_start_bid" id="date_start_bid" type="text" required="" >
														<small class="f-s-12 text-grey-darker">Please Select Bid Start Date</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_clearfication_bid">Bid Clarification Date <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="EnterBid Clearfication Date" name="date_clearfication_bid" id="date_clearfication_bid" type="text" required="" >
														<small class="f-s-12 text-grey-darker">Please Select Bid Clarification Date</small>
													</div>
												</div>
												<!-- part e end -->
											</div>
											<!-- part e end Here -->
											<!-- part f -->
											<div class="col-md-6 col-lg-6">
												<!-- part f start -->
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="date_closed_bid">Bid Closed Date <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="EnterBid Closed Date" name="date_closed_bid" id="date_closed_bid" type="text" required="" >
														<small class="f-s-12 text-grey-darker">Please Select Bid Closed Date</small>
													</div>
												</div>

												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3">Detail Description  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<textarea class="form-control" rows="3" name="bid_detail_description" required=""></textarea>
														<small class="f-s-12 text-grey-darker"> Please enter Detail Description  </small>
													</div>
												</div>
												<!-- part f end -->
											</div>
											<!-- part f end Here -->
										</div>
										<!-- row end here -->
									</div>
								</div>
							</div>
							<!-- part Accordion 3 End -->

							<!-- Part Accordion 4 Start -->
							<div class="card">
								<div class="card-header text-center">
									<a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
										Attach Files
									</a>
								</div>
								<div id="collapseFour" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<h5 class="text-left">Attach Files Details</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part h -->
											<div class="col-md-12 col-lg-12">
												<!-- part h start -->
												<div class="row">
													<div class="col-lg-12">
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

												<!-- part h end -->
											</div>
											<!-- part h end here -->
										</div>
										<!-- row end here -->
									</div>
								</div>
							</div>


							<!-- Part Accordion 5 Start -->
							<div class="card">
								<div class="card-header text-center">
									<a class="collapsed card-link" data-toggle="collapse" href="#collapsesix">
										Remark To Vendors
									</a>
								</div>
								<div id="collapsesix" class="collapse" data-parent="#accordion">
									<div class="card-body">
										<h5 class="text-left">Remark To Vendor</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part g -->
											
											<!-- part g end here -->
											<!-- part h -->
											<div class="col-md-12 col-lg-12">
												<!-- part h start -->
												<div class="row">
													<div class="col-lg-12">
												    
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3">Remark To Vendor <span style="color: red">*</span></label>
													<div class="col-md-9">
														<textarea class="form-control" rows="3" name="terms_condition" required=""></textarea>
														<!-- <?php echo $this->ckeditor->editor("terms_condition","default textarea value"); ?> -->
														
														
													</div>
												</div>		
                                                  


													</div>
												</div>

												<!-- part h end -->
											</div>
											<!-- part h end here -->
										</div>
										<!-- row end here -->
									</div>
								</div>
							</div>
							<!-- part Accordion 5 End -->

							 <div class="card">
							    <div class="card-header text-center">
							      	<a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
							       		 Vendor Selection
							      	</a>
							    </div>
							    <div id="collapseFive" class="collapse" data-parent="#accordion">
							      	<div class="card-body">
							       		<h5 class="text-left"> Vendor Selection</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part g -->
											<div class="col-md-5 col-lg-5">
												<div class="row">
													<div class="col-lg-12">										       
                                                		<div class="form-group row m-b-15">
														<label class="col-form-label col-md-3" for="mr_date_of_creation">Search Vendor<span style="color: red">*</span></label>
															<div class="col-md-6">
																<input type="text" class="form-control m-b-5" id="employee_name">
															</div>
															<div class="col-md-3">
																<span id="search" onclick="get_vender()" class="btn btn-sm btn-success">Filter</span>
															</div>					                               
														</div>

														<div id="result_vendor"></div>
													</div>
												</div>
											</div>
											<!-- end part g -->
											<!-- part h -->
											<div class="col-md-7 col-lg-7">
												
												
												<div class="row">
													<div class="col-lg-12">
														<div id="detail_cart_vendor"></div>
													</div>
												</div>
											</div>
											<!-- end part h -->
										</div>
											

							      	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
						
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                           		<span id="spl"> 
	                               
	                               <!-- <input type="submit" name="submission" value="Save" class="btn btn-success btn-sm"> -->
	                               <input type="submit" name="submission" value="Send" class="btn btn-info btn-sm">
                           		</span>
                               <a  href="<?=base_url()?>buyer-pr-receive" class="btn btn-sm btn-primary">Back</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">

function get_vender() {
	var employee_name=$('#employee_name').val();
	if(employee_name!=""){
		queryString_id ='employee_name='+ employee_name;

		jQuery.ajax({
			url: "<?php echo base_url(); ?>buyer-vendor-search-informations",
			data:queryString_id,
			type: "POST",
			success:function(data){
				$("#result_vendor").html(data);
			}
		});
	}

}
$(document).ready(function(){
	$('#spl').hide();
	get_vender();
		// $('.add_cart').click(function(){
		$(document).on('click','.add_cart',function(){
			  // var productId = $(this).attr('data-productId');
			var product_id    = $(this).data("productid");
			// alert(product_id);
			// var Organisation_names  = $(this).data("Organisationname");
			var product_price = $(this).data("productprice");
			// var quantity   	  = $('#' + product_id).val();
			$.ajax({
				url : "<?=base_url()?>buyer-vendor-cart",
				method : "POST",
				data : {product_id: product_id, Organisation_names: product_price },
				success: function(data){
					$('#detail_cart_vendor').html(data);
					get_vender();
				}
			});
		});

		
		$('#detail_cart_vendor').load("<?=base_url()?>buyer-vendor-cart-show");

		
		$(document).on('click','.romove_cart',function(){
			var row_id=$(this).attr("id"); 
			$.ajax({
				url : "<?=base_url()?>buyer-vendor-cart-delete-cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart_vendor').html(data);
					get_vender();
				}
			});
		});
	});
	function get_bid_ref(id) {
		if(id==1){
			var job_code=document.getElementById('bid_ref_no').value;
			var pass1 = document.getElementById('bid_ref_no');
			var message = document.getElementById('job_code_error1');
			
			var goodColor = "#0C6";
			var badColor = "#FF9B37";    				
			var results;
			if(job_code!=""){
				$.ajax({
			  		url:'<?=base_url()?>get-buyer-bid-check-pr',
			    	method: 'post',
			    	data: {field_id:'3',job_codes:job_code},
			    	// dataType: 'json',
			    	success: function(response){
			    		if(response==1){
							pass1.style.backgroundColor = goodColor;
					        message.style.color = goodColor;
					        message.innerHTML = "valid Bid Ref code";
					        $('#spl').show();
					        results=1;
					        return 1;
					    }else{
					    	pass1.style.backgroundColor = badColor;
							message.style.color = badColor;
							message.innerHTML = "invalid Bid Ref code";
							results=2;
							// $('#bid_ref_no').val('');
							$('#spl').hide();
							return false;
					    }
				    }
				});

			}else{
				pass1.style.backgroundColor = badColor;
				message.style.color = badColor;
				message.innerHTML = "Should not left blank";
				return false;
			}

		}else if(id==2){
			var bid_Id=document.getElementById('bid_Id').value;
			var pass1 = document.getElementById('bid_Id');
			var message = document.getElementById('job_code_error2');
					
   			var goodColor = "#0C6";
    		var badColor = "#FF9B37";				
			if(bid_Id!=""){
				 $.ajax({
					url:'<?=base_url()?>get-buyer-bid-check-pr',
					method: 'post',
					data: {field_id:'4',job_codes:bid_Id},
					    // dataType: 'json',
					success: function(response){						   
					    if(response==1){
							pass1.style.backgroundColor = goodColor;
					        message.style.color = goodColor;
					        message.innerHTML = "valid Bid id code";
					        $('#spl').show();
					        // return 	get_bid_ref(true);						       
					        // return "preetish";

						        
						}else if(response==2){
							pass1.style.backgroundColor = badColor;
					        message.style.color = badColor;
					        message.innerHTML = "invalid Bid id code";									      
					        // $('#bid_Id').val('');
					        $('#spl').hide();
					         return false;							         
					         
						}

					}
				});

			}else{
				pass1.style.backgroundColor = badColor;
				message.style.color = badColor;
				message.innerHTML = "Should not left blank";
				 return false;
			}

		}
	}
	$(document).ready(function() {
		$('#Commerical').multiselect({
			nonSelectedText: 'Select Commercial Approver'
		});
	});
</script>
				

				
