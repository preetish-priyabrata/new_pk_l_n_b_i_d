<?php 
$commerical_email_id=$this->session->userdata('commerical_email_id');
if(empty($commerical_email_id)){
	
	redirect('comm-evalutor-logout-by-pass');
}

// 'type_bid'=>$type_bid,'last_otp_id'=>$last_otp_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$value3,'vendor_notification'=>$vendor_notification);
$type_bid=$type_bid;
$last_otp_id=$last_otp_id;
$vendor_notification=$vendor_notification;
$commercial_type_bid=$commercial_type_bid;

$pr_no=$pr_no;
$commercial_bid_ref=$commercial_bid_ref;
$commercial_bid_id=$commercial_bid_id;
$comm_bid_db=$comm_bid_db;

$commercial_resubmit_count=$commercial_resubmit_count;
$commercial_edit_id=$commercial_edit_id;



// $get_list_vendors=$this->buyer_user->get_buyer_vendors_list($pr_no);
$query_vendor = $this->db->get('master_vendor_detail');
?>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Transparent Sidebar</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!-- <h1 class="page-header">Page with Transparent Sidebar <small>header small text goes here...</small></h1> -->
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
						
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Send Notification To Vendors</h4>
				</div>
				<div class="panel-body">
					<form action="<?=base_url()?>commerical-user-send-approve-nofication-pr" method="POST">
						<input type="hidden" name="type_bid" value="<?=$type_bid?>">
						<!-- <input type="hidden" name="master_bid_id" value="<?=$master_bid_id?>"> -->
						<input type="hidden" name="pr_no" value="<?=$pr_no?>">
						<input type="hidden" name="commercial_bid_ref" value="<?=$commercial_bid_ref?>">
						<input type="hidden" name="commercial_bid_id" value="<?=$commercial_bid_id?>">
						<input type="hidden" name="last_otp_id" value="<?=$last_otp_id?>">
						<input type="hidden" name="commercial_type_bid" value="<?=$commercial_type_bid?>">
						<input type="hidden" name="comm_bid_db" value="<?=$comm_bid_db?>">
						<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>">
						<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>">

						<div class="row">
							<div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="end_dete_submitio">Submission End Date <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" id="datepicker" placeholder="Enter Date" name="end_dete_submitio" id="end_dete_submitio" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Submission End Date</small>
									</div>
								</div>
								
							</div>
							<!-- <div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Message  <span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control" rows="3" name="Message" required=""></textarea>
										<small class="f-s-12 text-grey-darker"> Please enter Message To vendor  </small>
									</div>
								</div>
							</div> -->
						</div>
						<div class="row">
							<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
	                        	<thead>
		                            <tr>
		                                <th><strong>Vendor Name </strong></th>
																		 <th><strong>Vendor View</strong></th>
																		 <th>Message</th>
		                            </tr>
		                        </thead>
		                        <tbody>
							<?php
									
										foreach($query_vendor->result() as $key_vendors){
											$Vendor_email_id=$key_vendors->Vendor_email_id;
							?>
									<tr>
								<?php
									if (in_array($Vendor_email_id, $vendor_notification,true)){
										// `vendor_id`, `master_bid_id`
										$data_get_id_array = array('vendor_id' => $Vendor_email_id,'master_bid_id'=>$comm_bid_db);
										$querY_id=$this->db->get_where('master_bid_Com_vendor_m',$data_get_id_array);
										$result_data=$querY_id->result();

								?>
										<input type="hidden" name="Vendor_email_id[]" value="<?=$Vendor_email_id?>">
										<td><?=$key_vendors->Vendor_name?><input type="hidden" name="slno_vendor[]" value="<?=$result_data[0]->slno_vendor?>">
											<input type="hidden" name="Slno_vendor_id[]" value="<?=$key_vendors->Slno_vendor?>">
										</td>
										<td>
											<p>Organisation Name : <?=$key_vendors->Organisation_name?></p>
											<p>Vendor Mobile : <?=$key_vendors->Mobile_no?></p>
											<p>Vendor Address : <?=$key_vendors->Organisation_address?></p>
										</td>
										<td><textarea class="form-control" rows="3" name="Message[]" required=""></textarea></td>
								<?php
									}
								?>
                                </tr>
			                <?php
                         	 	 }
                        	
				                        ?>

				                </tbody>
							</table>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Notification</button>
                                <a  href="<?=base_url()?>user-commerical-evalutor-home" class="btn btn-sm btn-default">Cancel</a> 
                            </div>
                        </div>


					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->