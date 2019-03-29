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
?>

<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
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
					
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="<?=base_url()?>procurement-add-new-pr-save" method="POST" >
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
										<input type="hidden"  name="tech_evalution"  value="<?=$result_table[0]->techinal_evalution?>">
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
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" name="mr_date_of_creation" value="<?=$result_table[0]->date_creation?>"  id="mr_date_of_creation" type="text" required="" readonly>
										<small class="f-s-12 text-grey-darker">Date Of Creating MR</small>
									</div>
								</div>
								

							</div>
             

						 </div>
						 <div class="row">
							<div class="col-lg-12">
								<div id="cart-item-files"></div>
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
															<th>Ace Value</th>
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
													<label class="col-form-label col-md-3" for="date_clearfication_bid">Bid Clarfication Date <span style="color: red">*</span></label>
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
											<!-- part g -->
											<div class="col-md-6 col-lg-6">

												<!-- part g start -->
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="job_code">Attach Files <span style="color: red">*</span></label>
													<div class="col-md-9">
														<input class=" m-b-5" placeholder="Enter Activity name" name="job_files" id="job_files" type="file"  >	<span class="btn btn-sm btn-info" id="sub">Upload</span>	<br>								
														<small class="f-s-12 text-grey-darker">Job Attachment</small>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12">
														<div id="cart-item-files"></div>
													</div>
												</div>
												<!-- part g end -->
											</div>
											<!-- part g end here -->
											<!-- part h -->
											<div class="col-md-6 col-lg-6">
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
							<!-- part Accordion 4 End -->

							 <div class="card">
							    <div class="card-header text-center">
							      	<a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
							       		Technical Evaluator / Vendor Selection
							      	</a>
							    </div>
							    <div id="collapseFive" class="collapse" data-parent="#accordion">
							      	<div class="card-body">
							       		<h5 class="text-left">Technical Evaluator / Vendor Selection</h5>
										<hr style="background: lightblue">
										<!-- row Start -->
										<div class="row">
											<!-- part g -->
											<div class="col-md-6 col-lg-6">
												<div class="form-group row m-b-15">
													<label class="col-form-label col-md-3" for="Technical_ev" >Technical Evaluator Name <span style="color: red">*</span></label>
													<div class="col-md-9">
														<?php
														$data_array_approver=$this->buyer_user->get_user_generic_list('1','0','0','9','','');	
															
														?>
														
														<select name="Technical_ev"  class="form-control m-b-5" id="Technical_ev" required="" >
															<?php 
															if($data_array_approver['no_user']==2){?>
																<option value="">--No Technical Evaluator Is found--</option>
																<?php
															}else if($data_array_approver['no_user']==1){
																?>
																<option value="">--Select Technical Evaluator--</option>
															<?php
																foreach ($data_array_approver['user_approver'] as $key_approver) {
																	echo "<option value='".$key_approver->slno."'>".$key_approver->Username." [ ".$key_approver->email_id." ]</option>";
																}
															
																
															}	
															?>										
															
														</select>
														<small class="f-s-12 text-grey-darker">Select Technical Evaluator </small>
													</div>
												</div>

											</div>
											<!-- part g -->
											<div class="col-md-6 col-lg-6">
												
												<div class="row">
													<div class="col-lg-12">
														<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
									                        <thead>
									                            <tr>
									                                <th><strong>Check </strong></th>
									                                <th><strong>Vendor View</strong></th>                                
									                               
									                            </tr>
									                        </thead>
									                        <tbody>

									                            <?php 
									                            if($get_list_vendors['No_vendors']==1){
										                            foreach($get_list_vendors['vendors_lists'] as $key_vendors){ ?>
										                                <tr>
										                                    <td><input type="checkbox" name="vendor_array[]" value="<?=$key_vendors->Vendor_email_id?>"></td>   
										                                    <td>
										                                    	<p>Vendor Name : <?=$key_vendors->Vendor_name?></p>
										                                    		<p>Organisation Name : <?=$key_vendors->Organisation_name?></p>
										                                    	<p>Vendor Mobile : <?=$key_vendors->Mobile_no?></p>
										                                    	<p>Vendor Address : <?=$key_vendors->Organisation_address?></p>
										                                    </td>                           
										                                   
										                                </tr> 


									                         	 <?php
									                         	 	 }

									                        	}
									                        ?>

									                        </tbody>
									                    </table>
													</div>
												</div>
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
                               <!--  <button type="submit" class="btn btn-sm btn-primary m-r-5" >Next</button> -->
                               <!-- <input type="submit" name="submission" value="Save" class="btn btn-success btn-sm"> -->
                               <!--<input type="submit" name="submission" value="Sent" class="btn btn-info btn-sm">-->
                               <a  href="<?=base_url()?>procurement-new-pr-complete-requisition" class="btn btn-sm btn-danger">Back</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
<script type="text/javascript">

</script>
				
