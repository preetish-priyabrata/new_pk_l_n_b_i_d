<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}
$value=$vendor_slno_id;
$value1=$value1;
$result_title=$this->vendor_db_usersnew->vendor_new_query_commerical_title_pr($value,$Vendor_email_id);
// print_r($result_title);


if($result_title['no_new_tech']!=1){
	$this->session->set_flashdata('error_message', 'Unable find Bid');
	redirect('seller/user-vendor-home');
	
}
$edit_id=$result_title['new_tech_list'][0]->edit_id;
// $mr_slno=$result_title['new_tech_list'][0]->mr_slno;
$pr_no=$result_title['new_tech_list'][0]->pr_no;

$comm_bid=$result_title['new_tech_list'][0]->master_bid_id;
$re_count_bid_com=$result_title['new_tech_list'][0]->commercial_resubmit_count;

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
$status_view=$result_title['new_tech_list'][0]->status_view;
// $query_item_details_list=$this->design_user->get_design_master_mr_items_material_single($edit_id,$mr_no,$mr_slno); /// item Details
 // $result_file=$this->design_user->get_design_mr_file_list($mr_slno,$mr_no); // file information
	$date_file_sub = array('bid_id_vendor' => $value );
 	$get_no_file=$this->db->get_where('master_vendor_tech_token_bid_c',$date_file_sub);

 	$mode_bid=$result_title['new_tech_list'][0]->mode_bid;

 	switch ($mode_bid) {
 		case 'Closed Bid':
 			$bid_type_id=1;
 			break;
 		case 'Simple Bid':
 			$bid_type_id=2;
 			break;
 		case 'Rank Order Bid':
 			$bid_type_id=3;
 			break;
 		
 		default:
 			# code...
 			break;
	 }
	 $data_table4 = array('pr_no' =>$pr_no);
$query_table4=$this->db->get_where('master_bid_t_c_comm_m ',$data_table4);
$result_table4=$query_table4->result();

$data_table6 = array('pr_no' =>$pr_no,'commercial_bid_id'=>$comm_bid,'re_count_bid_com'=>$re_count_bid_com);
$query_table6=$this->db->get_where('master_technical_commercial_terms_conditions',$data_table6);

$result_table6=$query_table6->result();
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

	$get_bid_submit = array('Bid_vendor_id' =>$vendor_slno_id);
	$submit_bid=$this->db->get_where('master_pr_bid_qoute',$get_bid_submit);
	// echo $this->db->last_query();

?>
<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-home">Home</a></li>
			<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-bid-new-commerical">New Commercial Bid</a></li>
			<li class="breadcrumb-item active">Commercial Bid Informations</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Commercial Bid View Details<small></small></h1>
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
				<h4 class="panel-title">Details of Commercial Bid</h4>
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
								<?=date('d-m-Y',strtotime($result_title['new_tech_list'][0]->date_start))?>
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
						<!-- <div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Job_code"> Bid Id<span style="color: red"></span></label>
							<div class="col-md-9">
								<?php 
								// $result_title['new_tech_list'][0]->bid_id
								?>
							</div>
						</div> -->
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Po_date"> End Date <span style="color: red"></span></label>
							<div class="col-md-9">
								<?=date('d-m-Y',strtotime($date_end=$result_title['new_tech_list'][0]->date_end))?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Advance_payment_date">Date of Query End </label>
							<div class="col-md-9">
								<?=date('d-m-Y',strtotime($result_title['new_tech_list'][0]->query_end_date))?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Advance_payment_date"> Type of Bid </label>
							<div class="col-md-9">
								<?=$result_title['new_tech_list'][0]->mode_bid?>
							</div>
						</div>
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-3" for="Advance_payment_date">Terms And Conditions</label>
							<div class="col-md-9">
							<a target="_blank" href="<?=base_url()?>upload_files/term_condition/<?=$result_table6[0]->file_name?>"> Click to View </a>  
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
					<h5 class="text-center">Remarks</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
					<?=$result_table4[0]->t_c_detail?>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h5 class="text-center">Commercial T&Cs document</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
					<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
						<thead>
								<tr>
									<th><strong>Upload Files</strong></th>										
									<th><strong>Status </strong></th>										
									<th><strong>Action </strong></th>
								</tr>
						</thead>
						<?php 
							$ven_upload=$this->db->get_where('master_bid_Com_vendor_term_m',array('vendor_id'=>$Vendor_email_id,'pr_no'=>$pr_no));
							foreach($ven_upload->result() as $key_id =>$value_files):?>
							<tr>
								
							<?php 
							echo '<td><a target="_blank" href="'.base_url().'upload_files/vendor_term_file/'.$value_files->file_name_stored.'">'.(($value_files->file_name)).'</a></td>';

							?>
							<td>
								<?php 
								$status_file_appr=$value_files->status_file_appr;
								if($status_file_appr==1){
									echo "Approved";
								}else if($status_file_appr==0){
									echo "Pending";
								}else{
									echo "Commented";
								}
								?>
							</td>
							<td>
								<?php 
									if(!empty($value_files->attach_file_link)){
										echo '<a target="_blank" href="'.base_url().$value_files->attach_file_link.'">Click To Download </a>';
									}else{
										echo "--";
									}
								?>
							</td>
							</tr>
							<?php 
							endforeach;
						?>
					</table>
				</div>
			</div>
			<br>
			<br>
			<div class="row">				
				<div class="col-md-12 col-lg-12">
					<h5 class="text-center">Price bid submissions</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
					<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
						<thead>
								<tr>
									<th><strong>Offer Date</strong></th>										
									<th><strong>Bid Information</strong></th>										
									<th><strong>Click View</strong></th>
								</tr>
						</thead>
						<tbody>
							<?php
							$x=0; 
								foreach ($submit_bid->result() as $key_bid_information => $value_detail_bid):
									$x++;
								// print_r($value_detail_bid);
							?>
							<tr>
								<td><?=date('d-m-Y',strtotime($value_detail_bid->date_entry))?></td>
								<td>
									<?php 
									// $comment=$value_detail_bid->comment;
									echo "Offer - ".$x;
									?>
									<?php 
									
									// if(!empty($comment)){
									// 	echo $comment;
									// }else{
									// 	echo "Not Comment";
									// }
									?>
								</td>
								<td> 
									<a href="<?=base_url()?>seller/user-vendor-bid-commerical-submission-bid-view/<?=$value?>/<?=$bid_type_id?>/<?=$value_detail_bid->Slno_simple?>" class="btn btn-sm btn-success m-r-5"><i class="fas fa-envelope-open-text"></i>   Click To View </a>
								</td>
							</tr>
							<?php
								endforeach;
							?>
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
					
          			if($status_view!=7){ 
						$ven_upload=$this->db->get_where('master_bid_Com_vendor_term_m',array('vendor_id'=>$Vendor_email_id,'pr_no'=>$pr_no));
						// echo $this->db->last_query();
						if($ven_upload->num_rows()==0){
							echo "<a href='#' style='color:green'><strong> Kindly Upload T & C Docs    </strong></a>  ";
						}else{

						

                // if(strtotime($today) >= strtotime($date_end)){
				?>
							<a href="<?=base_url()?>seller/user-vendor-bid-commerical-submission-bid/<?=$value?>/<?=$bid_type_id?>" class="btn btn-sm btn-success m-r-5"><i class="fas fa-envelope-open-text"></i>   Click To Submit Bid </a>
			<?php 
						}
					}else{
						echo "<a href='#' style='color:red'><strong> BId Is been Submitted By You   </strong></a>  ";
					}
				}
			}
				?>
              <a href="<?=base_url()?>seller/user-vendor-commerical-query-panel/<?=$value?>" class="btn btn-sm btn-warning m-r-5"><i class="fa fa-question-circle" aria-hidden="true"></i>  Query </a>
              <a  href="<?=base_url()?>seller/user-vendor-home" class="btn btn-sm btn-default">Back</a>
          </div>
      </div>

        </div>
    </div>
</div>
