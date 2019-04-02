<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}
$value=$vendor_slno_id;
$value1=$value1;
$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_pr($value,$Vendor_email_id);
// print_r($result_title);
$date1=date('d-m-Y');

if($result_title['no_new_tech']!=1){
	$this->session->set_flashdata('error_message', 'Unable find Bid');
	redirect('seller/user-vendor-home');
	
}
$edit_id=$result_title['new_tech_list'][0]->edit_id;
// $mr_slno=$result_title['new_tech_list'][0]->mr_slno;
$pr_no=$result_title['new_tech_list'][0]->pr_no;


$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();

$slno_pr=$result_process[0]->pr_no_slno;
$job_code=$result_process[0]->project_slno;

$data_table=array('pr_no'=>$pr_no,'mr_forword_status'=>1);
$query_data=$this->db->get_where('master_mr_job_details_m',$data_table);
// print_r($result_process);
// 
$result_table=$query_data->result();

$approval_status=$result_title['new_tech_list'][0]->approval_status;
// $query_item_details_list=$this->design_user->get_design_master_mr_items_material_single($edit_id,$mr_no,$mr_slno); /// item Details
 // $result_file=$this->design_user->get_design_mr_file_list($mr_slno,$mr_no); // file information
	$date_file_sub = array('bid_id_vendor' => $value );
 	$get_no_file=$this->db->get_where('master_vendor_tech_token_bid_c',$date_file_sub);
?>
	<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
	<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
	<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
	<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="<?=$edit_id=$result_table[0]->edit_id?>"required="" readonly>
	<input class="form-control m-b-5"  name="edit_type_bid" id="edit_type" type="hidden" value="<?=$edit_id_bid=$result_process[0]->technical_edit_id?>"required="" readonly>
	<input type="hidden"  name="tech_evalution"  value="<?=$result_table[0]->techinal_evalution?>">
<?php
	$data_material = array('mr_no_item' => $pr_no, 'edit_id'=>$edit_id);
	$table_material="master_mr_material_item_m";
	$query_table_material=$this->db->get_where($table_material,$data_material);
	// echo $this->db->last_query();
	$result_material=$query_table_material->result(); 
	$result_file=$this->design_user->get_design_mr_file_list_m($pr_no,$slno_pr,$job_code);

	$status_view=$result_title['new_tech_list'][0]->status_view;
?>
<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-home">Home</a></li>
			<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-bid-new-technical">New Technical Bid</a></li>
			<li class="breadcrumb-item active">Technical Bid Information</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Technical Bid View Details<small></small></h1>
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
				<h4 class="panel-title">Panel Title here</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Date_creation"> Bid Ref <span style="color: red"></span></label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->bid_ref?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Po_no">Start Date <span style="color: red"></span></label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->date_start?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Bg_submission_date">Title </label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->title?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Mfg_clear_date">Description <span style="color: red"></span></label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->description?>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Job_code"> Bid Id<span style="color: red"></span></label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->bid_id?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Po_date"> End Date <span style="color: red"></span></label>
							<div class="col-md-9">
								<?=$date_end=$result_title['new_tech_list'][0]->date_end?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Advance_payment_date">Date of Query End </label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->query_end_date?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Advance_payment_date"> Type of Bid </label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->mode_bid?>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<h5 class="text-center">Material Information</h5>
						<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
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
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h5 class="text-center">Attached File Information</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
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
			<div class="row">				
				<div class="col-md-12 col-lg-12">
					<h5 class="text-center">Submission Created</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
					<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
						<thead>
								<tr>
										<th><strong>Date  Creation</strong></th>
										<th><strong>Status</strong></th>
										<th><strong>Comment</strong></th>										
										<th><strong>Click View</strong></th>

								</tr>
						</thead>
						<tbody>
							<?php foreach($get_no_file->result() as $submission){ ?>
										<tr>
												<td><strong><?=$submission->date_creation?></strong></td>
												<td><strong><?php $submitted_status=$submission->submitted_status;
													if($submitted_status==0){
														echo  "<p style='color: orange'>Drafted</p>"; 
													}if($submitted_status==1){
														echo  "<p style='color: green'>Submitted</p>"; 
													}
													if($submitted_status==5){
														echo  "<p style='color: blue'>Archived</p>"; 
													}
												?></strong></td>
												<td><?php 
													if(!empty($submission->comment)){
														echo $submission->comment;
													}else{
														echo "--";
													}
												?></td>
												<td>
													<strong>
														<?php 
														if($approval_status==1){
																if($submitted_status==1){  echo "<b style='color:green'>Approved<?b>"; 
															}else{
																echo "<b>--</b>";
															}
														
														}else{

															$today=date('Y-m-d');
          	 												if($date_end < $today) {
																
                											?> <a href="<?=base_url().'seller/vendor-tech-file-new-bid-submission-info/'.$value.'/'.$submission->token_no .'/'.$submission->master_bid_id ?>">View Send </a><?php
															}else{
																if($submitted_status==1){ ?> <a href="<?=base_url().'seller/vendor-tech-file-new-bid-submission-info/'.$value.'/'.$submission->token_no .'/'.$submission->master_bid_id ?>">View Send </a><?php  }else{?> <a href="<?=base_url().'seller/user-vendor-tech-bid-submission-tokens-info/'.$value.'/'.$submission->token_no .'/'.$submission->master_bid_id ?>">Click View</a><?php }
																

															}
														}
														?>
												 	</strong>
												</td>

										</tr>
								<?php }?>
								
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group row pull-right">
          <div class="col-md-12">
          	<?php if($approval_status==1){
          		echo "<p style='color:green'><strong> BId Is been Approved </strong></p>";
          	 }else{
          	 	$today=date('Y-m-d');
          	 	if($date_end < $today) {

          	 	}else{
          	 			if($status_view!=8){ 


				?>
				 <a href="<?=base_url()?>seller/user-vendor-bid-submission-bid/<?=$value?>" class="btn btn-sm btn-success m-r-5"><i class="fas fa-envelope-open-text"></i>   Click To Submit Bid </a>
			<?php }else{

			}
					}
				}
				?>
              <a href="<?=base_url()?>seller/user-vendor-query-panel/<?=$value?>" class="btn btn-sm btn-warning m-r-5"><i class="fa fa-question-circle" aria-hidden="true"></i>  Query </a>
              <a  href="<?=base_url()?>user-vendor-home" class="btn btn-sm btn-default">Back</a>
          </div>
      </div>

        </div>
    </div>
</div>
