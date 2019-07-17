 <?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$pr_no=$pr_no;
$slno_pr_no=$slno_pr_no;
$job_code=$job_code;

$this->db->from('master_pr_bid_qoute_item_final_approve');
$this->db->where('master_pr_bid_qoute_item_final_approve.pr_no', $pr_no);
// $this->db->where('master_pr_bid_qoute_item_final_approve.pr_no', $Vendor_email_id);
$this->db->join('master_pr_bid_qoute_item_total', 'master_pr_bid_qoute_item_total.simple_id_slno_total = master_pr_bid_qoute_item_final_approve.Simple_id_slno');
$get_information=$this->db->get()->result();



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
	$key_job_code=$query_bu->result();

	$item_name=$this->bumodal->bu_pr_schedule_item($pr_no,$slno_pr_no,$job_code);
	if($item_name['status']!=1){
		redirect('user-bu-home');
	}
	// echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">Create New Tracking Tool</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Create New Tracking Tool
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
					<h4 class="panel-title">Create Tracking Tool</h4>
				</div>
				
					<div class="panel-body">
					<div class="alert alert-secondary">
                       	<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                    </div>	
                    <form action="<?=base_url()?>bu-create-tracking-save_m" method="POST" autocomplete="off">					
						<div id="accordion">
						    <div class="card">
						      <div class="card-header text-center">
						        <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">
						          Section I
						        </a>
						      </div>
						      <div id="collapseOne" class="collapse show" data-parent="#accordion">
						        <div class="card-body">
						        	<h4 class="text-center" style="color: lightblue">Section I</h4>
						        	<hr>
						         	<div class="row">
										<div class="col-md-6 col-lg-6">
										 	<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Date_creation">BU Date of creation PR's</label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Create of Date" name="Date_creation" id="Date_creation" type="Hidden" required="" readonly="" value="<?=date('Y-m-d')?>"><?=date('Y-m-d')?><br>
													<small class="f-s-12 text-grey-darker">BU Date of creation creation PR's</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Po_no"> PO No <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5" placeholder="Enter PO No" name="Po_no" id="Po_no" type="text" required="" autocomplete="off">
													<small class="f-s-12 text-grey-darker">Here enter PO No.</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Bg_submission_date"> BG Submission Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter BG Submission Date" name="Bg_submission_date" id="Bg_submission_date" type="text" autocomplete="off">
													<small class="f-s-12 text-grey-darker">Here enter BG Submission Date</small>
												</div>
											</div>
	                                        
	                                        <div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Mfg_clear_date"> Mfg Clearance Date <span style="color: red"></span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Mfg Clearance Date" name="Mfg_clear_date" id="Mfg_clear_date" type="text" autocomplete="off">
													<small class="f-s-12 text-grey-darker">Here enter Mfg Clearance Date</small>
												</div>
											</div>
											 <div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Pr_NO"> PR NO <span style="color: red"></span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5"  name="Pr_NO" id="Pr_NO" type="text" value="<?=$pr_no?>" readonly >
													<input class="form-control m-b-5"  name="Pr_NO_slno" id="Pr_NO_slno" type="hidden" value="<?=$slno_pr_no?>" readonly >
													<small class="f-s-12 text-grey-darker">PR NO</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="delivery_date_as_per_po">Delivery Date as per PO <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5 datepickers" placeholder="Enter Delivery Date as per PO" name="delivery_date_as_per_po" id="delivery_date_as_per_po" type="text" required="" autocomplete="off">
														<small class="f-s-12 text-grey-darker">Here enter Delivery Date as per PO</small>
													</div>
												</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Scheduled_draw_submission">Scheduled Drawing Submission Date <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Scheduled Drawing Submission Date" name="Scheduled_draw_submission" id="Scheduled_draw_submission" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Scheduled Drawing Submission Date </small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="schedule_delivery_date">Scheduled Delivery  Date <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Scheduled Delivery  Date" name="schedule_delivery_date" id="schedule_delivery_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Scheduled Drawing Submission Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="target_date_ordering">Target Date of ordering <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Target Date of ordering" name="target_date_ordering" id="target_date_ordering" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Target Date of ordering</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="scheduled_manufacturing_clearance_date">Scheduled Manufacturing Clearance Date<span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Scheduled Manufacturing Clearance Date" name="scheduled_manufacturing_clearance_date" id="scheduled_manufacturing_clearance_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Scheduled Manufacturing Clearance Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="remark_manufacturing_clearance">Remarks of Manufacturing Clearance </label>
												<div class="col-md-9">
													<textarea class="form-control m-b-5" name="remark_manufacturing_clearance" id="remark_manufacturing_clearance"></textarea>
													
													<small class="f-s-12 text-grey-darker">Here enter Remarks Manufacturing Clearance</small>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-6">
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Job_code"> Project Name <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5" placeholder="Enter Job Code" name="Job_code" id="Job_code" type="text" required="" value='<?=$key_job_code[0]->job_Code." [ ".$key_job_code[0]->Project_Name." ]";?>' readonly>
													<input class="form-control m-b-5" placeholder="Enter Job Code" name="Job_code_id" id="Job_code_id" type="hidden" required="" value='<?=$key_job_code[0]->Project_Slno;?>' readonly>
													<small class="f-s-12 text-grey-darker">Here enter Project Name</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Po_date"> PO Date <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Po Date" name="Po_date" id="Po_date" type="text" required="">
													<small class="f-s-12 text-grey-darker">Here enter PO Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Advance_payment_date"> Advance Payment Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Advance Date" name="Advance_payment_date" id="Advance_payment_date" type="text" >
													<small class="f-s-12 text-grey-darker">Here enter Advance Payment Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Drg_approval_date"> Drg Approval Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Drg Approval Date" name="Drg_approval_date" id="Drg_approval_date" type="text" >
													<small class="f-s-12 text-grey-darker">Here enter Drg Approval Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="pr_item"> PR Name </label>
												<div class="col-md-9">
													<input class="form-control m-b-5" placeholder="Enter Drg Approval Date" name="pr_item" id="pr_item" type="text" value="<?=$item_name['item_name']?>" readonly>
													<small class="f-s-12 text-grey-darker">PR Name</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="drg_submission_date">Drg submission date<span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Drg submission date" name="drg_submission_date" id="drg_submission_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Drg submission date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="actual_draw_submission_date">Actual Drawing Submission Date <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Actual Drawing Submission Date" name="actual_draw_submission_date" id="actual_draw_submission_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Actual Drawing Submission Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="actual_delivery_date">Actual Delivery  Date <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Actual Delivery  Date" name="actual_delivery_date" id="actual_delivery_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Actual Drawing Submission Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="final_drg_no">Final Drg NO <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 " placeholder="Enter Final Drg NO" name="final_drg_no" id="final_drg_no" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Final Drg NO</small>
												</div>
											</div>

											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="actual_manufacturing_clearance_date">Actual Manufacturing Clearance Date<span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Actual Manufacturing Clearance Date" name="actual_manufacturing_clearance_date" id="actual_manufacturing_clearance_date" type="text" required="" >
													<small class="f-s-12 text-grey-darker">Here enter Actual Manufacturing Clearance Date</small>
												</div>
											</div>
										 
										</div>
									</div>
						        </div>
						      </div>
						    </div>
						    <div class="card">
						      <div class="card-header text-center">
						        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
						       	Section II
						      </a>
						      </div>
						      <div id="collapseTwo" class="collapse" data-parent="#accordion">
						        <div class="card-body">
						        	<h4 class="text-center" style="color: lightblue">Section II</h4>
						        	<hr>
						        	<div class="row">
										<div class="col-md-6 col-lg-6">
										 	<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Inspection_call_date"> Inspection Call Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Inspection Call Date" name="Inspection_call_date" id="Inspection_call_date" type="text" >
													<small class="f-s-12 text-grey-darker">Here enter Inspection Call Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Inspection_clearance_date"> Inspection Clearance Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Inspection Clearance Date" name="Inspection_clearance_date" id="Inspection_clearance_date" type="text" >
													<small class="f-s-12 text-grey-darker">Here enter Inspection Clearance Date</small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="Dispatch_clearance_date">Dispatch Clearance Date </label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Dispatch Clearance Date" name="Dispatch_clearance_date" id="Dispatch_clearance_date" type="text" >
													<small class="f-s-12 text-grey-darker">Here enter Dispatch Clearance Date</small>
												</div>
											</div>
	                                        
	                                        
										</div>
										<div class="col-md-6 col-lg-6">
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3">Inspection Call Remarks  </label>
												<div class="col-md-9">
													<textarea class="form-control" rows="3" name="Inspection_call_remark" ></textarea>
													<small class="f-s-12 text-grey-darker"> Please enter Inspection Call Remarks  </small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3">Inspection Clearance Remarks  </label>
												<div class="col-md-9">
													<textarea class="form-control" rows="3" name="Inspection_clearance_remark" ></textarea>
													<small class="f-s-12 text-grey-darker"> Please enter Inspection Clearance Remarks  </small>
												</div>
											</div>
											<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3">Dispatch Clearance Remarks  </label>
												<div class="col-md-9">
													<textarea class="form-control" rows="3" name="Dispatch_clearance_remark" ></textarea>
													<small class="f-s-12 text-grey-darker"> Please enter Dispatch Clearance Remarks  </small>
												</div>
											</div>
										</div>
									</div>



						        </div>
						      </div>
						    </div>
						    <div class="card">
						      <div class="card-header text-center ">
						        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
						         Section III
						        </a>
						      </div>
						      <div id="collapseThree" class="collapse" data-parent="#accordion">
						        <div class="card-body">
						          	<h4 class="text-center" style="color: lightblue">Section III</h4>
						        	<hr>
						        		<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Qty_receipt_at_site">Qnty Receive At Site</label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Qnty Receive At Site" name="Qty_receipt_at_site" id="Qty_receipt_at_site" type="text" >
														<small class="f-s-12 text-grey-darker">Here enter Qnty Receive At Site </small>
													</div>
												</div>
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Supply_completion">Supply Completion</label>
													<div class="col-md-9">
														<!-- <input class="form-control m-b-5" placeholder="Enter Activity name" name="activity_name" id="activity_name" type="text" required=""> -->
														<select name="Supply_completion" class="form-control m-b-5" id="Supply_completion">
															<option value="2">No</option>
															<option value="1">Yes</option>
														</select>
														<small class="f-s-12 text-grey-darker">Select Supply Completion</small>
													</div>
												</div>

											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Qty_pending">Qnty Pending </label>
													<div class="col-md-9">
														<input class="form-control m-b-5 " placeholder="Enter Qnty Pending" name="Qty_pending" id="Qty_pending" type="text" >
														<small class="f-s-12 text-grey-darker">Here enter Qnty Pending</small>
													</div>
												</div>
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3">Remarks Process </label>
													<div class="col-md-9">
														<textarea class="form-control" rows="3" name="Remark_process" ></textarea>
														<small class="f-s-12 text-grey-darker"> Please enter Remarks Process  </small>
													</div>
												</div>
											</div>
										</div>

						        	
						        </div>
						      </div>
						    </div>
						    <div class="card">
						      <div class="card-header text-center">
						        <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
						           Section IV
						        </a>
						      </div>
						      <div id="collapse4" class="collapse" data-parent="#accordion">
						        <div class="card-body">
					         		<h4 class="text-center" style="color: lightblue">Section IV</h4>
					        		<hr>
					        		<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="ACE_Basic">ACE (Basic Value) <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter ACE (Basic Value)" name="ACE_Basic" id="ACE_Basic" type="text" value="0" required="" onkeydown="calculation_saving()">
														<small class="f-s-12 text-grey-darker">Here enter ACE (Basic Value) </small>
													</div>
												</div>
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Order_value">Order Basic Value  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Order Basic Value" name="Order_value" id="Order_value" type="text"  value="<?=$get_information[0]->total_price?>" readonly>
														<small class="f-s-12 text-grey-darker">Here enter Order Basic Value in Rs L</small>
													</div>
												</div>
												
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Invoice_value">Invoice Value Gross </label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Invoice Value Gross" name="Invoice_value" id="Invoice_value" type="text" >
														<small class="f-s-12 text-grey-darker">Here enter Invoice Value Gross in RS L</small>
													</div>
												</div>
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Cost_saving">Cost Saving  <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class="form-control m-b-5" placeholder="Enter Cost Saving" name="Cost_saving" id="Cost_saving" type="text" readonly="" required="">
														<small class="f-s-12 text-grey-darker">Here enter Cost Saving</small>
													</div>
												</div>
												
											</div>
										</div>
						        </div>
						      </div>
						    </div>
						</div>				
					
				  	<div class="form-group row pull-right">
                        <div class="col-md-12">
                            <!-- <button type="submit" class="btn btn-sm btn-primary m-r-5" name="send_button" value="save">Save as draft</button> -->
                           	 <button type="submit" class="btn btn-sm btn-info m-r-5" name="send_button" value="send">Submit</button>
                            <a  href="<?=base_url()?>user-bu-home" class="btn btn-sm btn-danger">Cancel</a> 
                        </div>
                    </div>
				</form>
					
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
		<script type="text/javascript">
			function calculation_saving() {
				var ACE_Basic=$('#ACE_Basic').val();
				var Order_value=$('#Order_value').val();
				if(ACE_Basic!=""){
					var saving = ACE_Basic - Order_value;
					 var ansD = document.getElementById("Cost_saving");
    				ansD.value = saving;
					// document.getElementById("Cost_saving").html() = z;
				}
				// body...
			}
		</script>