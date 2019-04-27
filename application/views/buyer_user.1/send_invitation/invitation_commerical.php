<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
// $value=$value; //Slno_bid
// $value1=$value1; //category
// 'pr_no'=>$pr_no,'slno'=>$slno,'job_code'=>$job_code,'id'=>$id ,'comm_bid'=>$comm_bid );

$pr_no=$pr_no;
$slno=$slno;
$job_code=$job_code;
$id=$id;
$comm_bid=$comm_bid;
$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();


$comm_bid_db=$result_process[0]->comm_bid;  // bid id information
$commercial_bid_id=$result_process[0]->commercial_bid_id;  // technical bid ind information 
$commercial_bid_ref=$result_process[0]->commercial_bid_ref; // technical bid referenced infromtion
$commercial_edit_id=$result_process[0]->commercial_edit_id; // no of time bid is been edit infromation
$commercial_resubmit_count=$result_process[0]->commercial_resubmit_count;

$technical_user_slno=$result_process[0]->technical_user_slno;
// `technical_user_slno`, `technical_user_id`
$technical_user_id=$result_process[0]->technical_user_id;

$data_array = array('edit_id_bid' =>$commercial_edit_id,'bid_id'=>$commercial_bid_id,'bid_ref'=> $commercial_bid_ref,'pr_no'=>$pr_no,'master_bid_id'=>$comm_bid_db,'commercial_resubmit_count'=>$commercial_resubmit_count);

$vendor_selected_id=$this->db->get_where('master_bid_Com_vendor_m',$data_array);

// $result_vendor_list=$this->buyer_user->buyer_get_vendor_information($value);// vendor information
?>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

<!--  <link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="<?=base_url()?>file_css_admin/assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" /> -->
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Send Bid Information</a></li>
				<li class="breadcrumb-item active">Setting Rank Order Date and Time</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Setting Rank Order Date and Time </h1>
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
					<h4 class="panel-title">Setting Rank Order Date and Time</h4>
				</div>
				<div class="panel-body">
					<div class="alert alert-secondary">
                        <span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                    </div>
					<form action="<?=base_url()?>buyer-bid-rank-invitation-to-vendor-com-pr" method="POST" >
						<input type="hidden" name="master_bid_id" value="<?=$comm_bid_db?>">
						<input type="hidden" name="pr_no" value="<?=$pr_no?>">
						<input type="hidden" name="bid_ref" value="<?=$commercial_bid_ref?>">
						<input type="hidden" name="bid_id" value="<?=$commercial_bid_id?>">
						<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>">

						<input type="hidden" name="slno" value="<?=$slno?>">
						<input type="hidden" name="job_code" value="<?=$job_code?>">
						<input type="hidden" name="id" value="<?=$id?>">
						<input type="hidden" name="comm_bid" value="<?=$comm_bid?>">
						
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<!-- <div class="form-group row  m-b-15">
									<label class="col-md-4 col-form-label">Default Date Time</label>
									<div class="col-md-8">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input type="text" class="form-control" />
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
									</div>
								</div> -->
								<div class="form-group row  m-b-15">
									<label class="col-md-3 col-form-label">Date Time <span style="color: red">*</span></label>
									<div class="col-md-9">
									    <div class="row row-space-10">
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5"  name="Starting" id="datetimepicker3" placeholder="Starting Date/Time" required="" />
                                            </div>
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker4" placeholder="Ending  Date/Time" required="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">Timer <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Timer in minutes" name="timer" id="timer" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Timer in minutes </small>
									</div>
								</div> -->
							 	
								
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">Bid Max Entry <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Activity name" name="no_of_entry" id="no_of_entry" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Bid Max no. of Entry </small>
									</div>
								</div>
								<!-- <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Technical_ev" >Commercial Evaluator Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_approver=$this->buyer_user->get_user_generic_list('1','0','0','10','','');

										?>

										<select name="Technical_ev"  class="form-control m-b-5" id="Technical_ev" required="" >
											<?php
											if($data_array_approver['no_user']==2){?>
												<option value="">--No Commerical Evaluator Is found--</option>
												<?php
											}else if($data_array_approver['no_user']==1){
												?>
												<option value="">--Select Commerical Evaluator--</option>
											<?php
												foreach ($data_array_approver['user_approver'] as $key_approver) {
													echo "<option value='".$key_approver->slno."'>".$key_approver->Username." [ ".$key_approver->email_id." ]</option>";
												}


											}
											?>

										</select>
										<small class="f-s-12 text-grey-darker">Select Commercial Evaluator </small>
									</div>
								</div>
							  -->
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<h4 class="text-center">  Submited Bid</h4>
								<hr style="border: 1px solid lightblue">
								<table class="table table-bordered" width="100%">
									<thead>
										<tr>
											<th width="10%">Organisation Name</th>
											<th width="40%">Detail</th>
										
											

										</tr>
									</thead>
									<tbody>
										<?php 
										$check_approve=0;
										foreach ($vendor_selected_id->result() as $key_vendor => $value_vendor) {
											// print_r($value_vendor);
											if($value_vendor->submission_status==1){
												$vendor_id=$value_vendor->vendor_id;
												$this->db->where('Vendor_email_id',$vendor_id);
												$query_vendor=$this->db->get('master_vendor_detail');
												$query_vendor_result=$query_vendor->result();
												$value_id_vender=$query_vendor_result[0];
											?>
											<input type="hidden" name="slno_vendor_approve[]" value="<?=$value_vendor->slno_vendor?>">
											<input type="hidden" name="vendor_id_approve[]" value="<?=$value_vendor->vendor_id?>">
											<tr>
												 <td width="10%"><?=$value_id_vender->Organisation_name?></td>
			                                    <td width="40%"><p>Vendor Name :    <?=$value_id_vender->Vendor_name?></p>
			                                        <p>Organisation Name : <?=$value_id_vender->Organisation_name?></p>
			                                        <p>Vendor Mobile : <?=$value_id_vender->Mobile_no?></p>
			                                        <p>Vendor Address : <?=$value_id_vender->Organisation_address?></p>
			                                    </td>
												
												
											</tr>
									<?php 	}

										}
									?>
									</tbody>

								</table>
			                </div>
			                <div class="col-lg-6">
								<h4 class="text-center"> Not Submited Bid</h4>
								<hr style="border: 1px solid lightblue">
								<table class="table table-bordered" width="100%">
									<thead>
										<tr>
											<th width="10%">Organisation Name</th>
											<th width="40%">Detail</th>
										
											

										</tr>
									</thead>
									<tbody>
										<?php 
										$check_approve=0;
										foreach ($vendor_selected_id->result() as $key_vendor => $value_vendor) {
											// print_r($value_vendor);
											if($value_vendor->submission_status==0){
												$vendor_id=$value_vendor->vendor_id;
												$this->db->where('Vendor_email_id',$vendor_id);
												$query_vendor=$this->db->get('master_vendor_detail');
												$query_vendor_result=$query_vendor->result();
												$value_id_vender=$query_vendor_result[0];
											?>
											<tr>
												 <td width="10%"><?=$value_id_vender->Organisation_name?></td>
			                                    <td width="40%"><p>Vendor Name :    <?=$value_id_vender->Vendor_name?></p>
			                                        <p>Organisation Name : <?=$value_id_vender->Organisation_name?></p>
			                                        <p>Vendor Mobile : <?=$value_id_vender->Mobile_no?></p>
			                                        <p>Vendor Address : <?=$value_id_vender->Organisation_address?></p>
			                                    </td>
												
												
											</tr>
									<?php 	}

										}
									?>
									</tbody>

								</table>
			                </div>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
                                <a  href="user-admin-home" class="btn btn-sm btn-default">Cancel</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->

		<script type="text/javascript">
			   
		</script>