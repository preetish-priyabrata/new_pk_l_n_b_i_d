<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_design = $this->db->get('master_project');
?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Report</a></li> 
				<li class="breadcrumb-item active">Report D</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Report to Extract data of desired columns of Sheet "Procurement & Projects" <small></small></h3>
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
										<label class="col-form-label col-md-3" for="Date_creation"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
													foreach ($query_design->result() as $key_job_code) {
														echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
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
				$table="master_pr_schedule"; 
                $job_code=$this->input->post('job_code');
               
                // ,'status'=>1, 'mr_status'=>1
                $date_year=date('Y');
				$data_check = array('job_code' => $job_code);               
                foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
              
                $query_pr=$this->db->get_where($table,$data_check);
                $commercial_count=$incom=$comp=0;
                // print_r($query_pr->result());
                // foreach($query_pr->result() as $row){
                //     $pr_no=$row->pr_no;
                //     $data_check=array('pr_no'=>$pr_no);
                //     $query_check_pr=$this->db->get_where('master_pr_process_detail',$data_check);
                //     $num_rows_check=$query_check_pr->num_rows();
                //     if($num_rows_check!=0){
                //         $pr_results=$query_check_pr->result();
                //         $commercial_complete=$pr_results[0]->commercial_complete_status;
                //         if($commercial_complete==1){
                //             $commercial_count++;
                //         }
                //         // commercial_complete_status
                //             $comp++;
                //     }else{
                //         $incom++;
                //     }
                // }
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Project Name :- <?=$project_details_info?> </h4> 

				</div>
				<div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Job Code </label>
                            <div class="col-md-9">
                                <?=$job_Code?>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Project Name </label>
                            <div class="col-md-9">
                                <?=$Project_Name?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Job Desc </label>
                            <div class="col-md-9">
                                <?=$project_Description?>
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
                                	<th>Sl No.</th>
                                    <th>Area</th>
                                    <th>Bu Coordinator</th>
                                    <th>Item / Activity Description</th>
                                    <th>PR No.</th>
                                    <th>Released by(design user)</th>
                                    <th>Approved by</th>
                                    <th>PR  L2 Schedule Release date</th>
                                    <th>Actual PR Release date</th>
                                    <th>PR Received date in Purchase(by procurement user)</th>
                                    <th>Assigned Buyer Name</th>
									<th>Enquiry floating data</th>
									<th>Bidder Information</th>
                                    <!-- <th>Bidder1 Name/date of offer receipt</th>
                                   	<th>Bidder1 L & T Comments date Vendor Reply Technical Clearance</th>
                                   	<th>Bidder2 Name/date of offer receipt</th>
                                    <th>Bidder2 L & T Comments date Vendor Reply Tech. Clearance</th>
                                    <th>Bidder3 Name/date of offer receipt</th>
                                    <th>Bidder3 L & T Comments date Vendor Reply Tech. Clearance</th>
                                    <th>Bidder4 Name/date of offer receipt</th>
                                    <th>Bidder4 L & T Comments date Vendor Reply Tech. Clearance</th>
                                    <th>Bidder5 Name/date of offer receipt</th>
                                    <th>Bidder5 L & T Comments date Vendor Reply Tech. Clearance</th> -->
                                    <th>No. of offers recd.</th>
                                    <th>Planned Technical Clearance date</th>
                                    <th>Actual Technical Clearance date</th>
                                    <th>Commercial Closure date</th>
                                    <th>L2 Schedule Ordering date </th>
                                    <th>Target date of Ordering</th>
                                    <!-- <th>LOI</th>
                                    <th>LOI date</th>
                                    <th>LOI Basic Value</th> -->
                                    <th>Supplier Name/Address & Contact details</th>
                                    <th>PO No.</th>
                                    <th>PO date</th>
                                    <th>PO Type Domestic or Import</th>
                                    <th>Delivery date as per PO</th>
                                   
                                    <th>BG Submission</th>
                                    <th>Advance payment date</th>
                                    <th>Drg. Submission date</th>
                                    <th>Drg. Approval date</th>
                                    <th>Mfg. Clearance</th>
                                    <th>Inspection Call date</th>
                                    <th>Inspection Call Remarks</th>
                                    <th>Inspection Clearance date</th> 
                                    <th>Inspection Clearance Remarks </th>
                                    <th>Dispatch Clearance</th>
                                    <th>Dispatch Clearance Remarks</th>
                                    <th>Qty. Receipt at Site</th>
                                    <th>Qty. Pending</th>
                                    <th>Supply Completion Yes/No</th>
                                    <th>Remarks-Projects</th>
                                    <th>ACE(Basic Value)in Rs.L</th>
                                    <th>Invoice value Gross in Rs.L</th>
                                    <th>Ordered Value Basic Value in Rs.L</th>
                                   	<th>Cost Saving</th>
                                    
                                    



                                   
                                    
                                 
                                </tr>
                            </thead>
                            <tbody>
								<?php 
								$x=0;
									foreach($query_pr->result() as $row):
										$pr_no=$row->pr_no;
										$revised_schedule=$row->revised_schedule;
										$scheduled_order=$row->scheduled_order;
										if(!empty($revised_schedule)){
											$value_revised_schedule=$revised_schedule;
										}else{
											$value_revised_schedule="--";
										}

										$bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$pr_no));
										if($bu_query_information->num_rows()==1){
											$results_bu_information=$bu_query_information->result();
											$short_bu_result=$results_bu_information[0];
											$Po_no=$short_bu_result->Po_no;
											if(!empty($Po_no)){
												$po_no_details=$Po_no;
											}else{
												$po_no_details='--';
											}
											$Po_date=$short_bu_result->Po_date;
											if(!empty($Po_date)){
												$Po_date_details=date('d-m-Y',strtotime($Po_date));
											}else{
												$Po_date_details='--';
											}
											$Bg_submission_date=$short_bu_result->Bg_submission_date;
											if(!empty($Bg_submission_date)){
												$Bg_submission_date_details=date('d-m-Y',strtotime($Bg_submission_date));
											}else{
												$Bg_submission_date_details='--';
											}
											$Advance_payment_date=$short_bu_result->Advance_payment_date;
											if(!empty($Advance_payment_date)){
												$Advance_payment_date_details=date('d-m-Y',strtotime($Advance_payment_date));
											}else{
												$Advance_payment_date_details='--';
											}
											$Drg_approval_date=$short_bu_result->Drg_approval_date;
											if(!empty($Drg_approval_date)){
												$Drg_approval_date_details=date('d-m-Y',strtotime($Drg_approval_date));
											}else{
												$Drg_approval_date_details='--';
											}
											$Mfg_clear_date=$short_bu_result->Mfg_clear_date;
											if(!empty($Mfg_clear_date)){
												$Mfg_clear_date_details=date('d-m-Y',strtotime($Mfg_clear_date));
											}else{
												$Mfg_clear_date_details='--';
											}
											$Mfg_clear_date=$short_bu_result->Mfg_clear_date;
											if(!empty($Mfg_clear_date)){
												$Mfg_clear_date_details=date('d-m-Y',strtotime($Mfg_clear_date));
											}else{
												$Mfg_clear_date_details='--';
											}
											$Inspection_call_date=$short_bu_result->Inspection_call_date;
											if(!empty($Inspection_call_date)){
												$Inspection_call_date_details=date('d-m-Y',strtotime($Inspection_call_date));
											}else{
												$Inspection_call_date_details='--';
											}
											$Inspection_call_remark=$short_bu_result->Inspection_call_remark;
											if(!empty($Inspection_call_remark)){
												$Inspection_call_remark_details=(($Inspection_call_remark));
											}else{
												$Inspection_call_remark_details='--';
											}
											$Inspection_clearance_date=$short_bu_result->Inspection_clearance_date;
											if(!empty($Inspection_clearance_date)){
												$Inspection_clearance_date_details=date('d-m-Y',strtotime($Inspection_clearance_date));
											}else{
												$Inspection_clearance_date_details='--';
											}
											$Inspection_clearance_remark=$short_bu_result->Inspection_clearance_remark;
											if(!empty($Inspection_clearance_remark)){
												$Inspection_clearance_remark_details=(($Inspection_clearance_remark));
											}else{
												$Inspection_clearance_remark_details='--';
											}
											$Dispatch_clearance_date=$short_bu_result->Dispatch_clearance_date;
											if(!empty($Dispatch_clearance_date)){
												$Dispatch_clearance_date_details=date('d-m-Y',strtotime($Dispatch_clearance_date));
											}else{
												$Dispatch_clearance_date_details='--';
											}
											$Dispatch_clearance_remark=$short_bu_result->Dispatch_clearance_remark;
											if(!empty($Dispatch_clearance_remark)){
												$Dispatch_clearance_remark_details=(($Dispatch_clearance_remark));
											}else{
												$Dispatch_clearance_remark_details='--';
											}
											$Qty_receipt_at_site=$short_bu_result->Qty_receipt_at_site;
											if(!empty($Qty_receipt_at_site)){
												$Qty_receipt_at_site_details=(($Qty_receipt_at_site));
											}else{
												$Qty_receipt_at_site_details='--';
											}
											$Qty_pending=$short_bu_result->Qty_pending;
											if(!empty($Qty_receipt_at_site)){
												$Qty_pending_details=(($Qty_pending));
											}else{
												$Qty_pending_details='--';
											}
											$Supply_completion=$short_bu_result->Supply_completion;
											if(!empty($Supply_completion)){
												if($Supply_completion==1){
													$Supply_completion_details='Yes';
												}else{
													$Supply_completion_details='No';
												}


											}else{
												$Supply_completion_details='--';
											}
											$ACE_Basic=$short_bu_result->ACE_Basic;
											if(!empty($ACE_Basic)){
												$ACE_Basic_details=(($ACE_Basic));
											}else{
												$ACE_Basic_details='--';
											}
											$Invoice_value=$short_bu_result->Invoice_value;
											if(!empty($Invoice_value)){
												$Invoice_value_details=(($Invoice_value));
											}else{
												$Invoice_value_details='--';
											}
											$Order_value=$short_bu_result->Order_value;
											if(!empty($Order_value)){
												$Order_value_details=(($Order_value));
											}else{
												$Order_value_details='--';
											}
											$Cost_saving=$short_bu_result->Cost_saving;
											if(!empty($Cost_saving)){
												$Cost_saving_details=(($Cost_saving));
											}else{
												$Cost_saving_details='--';
											}
											$Po_no=$short_bu_result->Po_no;
											if(!empty($Po_no)){
												$Po_no_details=(($Po_no));
											}else{
												$Po_no_details='--';
											}
											$Po_date=$short_bu_result->Po_date;
											if(!empty($Po_date)){
												$Po_date_details=date('d-m-Y',strtotime($Po_date));
											}else{
												$Po_date_details='--';
											}

											// print_r($short_bu_result);

										}else{
											$Po_date_details=$Po_no_details=$Cost_saving_details=$Order_value_details=$Invoice_value_details=$ACE_Basic_details=$Supply_completion_details=$Qty_pending_details=$Qty_receipt_at_site_details=$Dispatch_clearance_remark_details=$Dispatch_clearance_date_details=$Inspection_clearance_remark_details=$Inspection_clearance_date_details=$Inspection_call_remark_details=$Inspection_call_date_details=$Mfg_clear_date_details=$Drg_approval_date_details=$Advance_payment_date_details=$Bg_submission_date_details=$Po_date_details=$po_no_details='---';

										}
										// bu section over
										$original_schedule=$row->original_schedule;
										$data_check=array('pr_no'=>$pr_no);
										$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
										if($query_check->num_rows()==1){

											$result_process=$query_check->result();
										
											$design_user_id=$result_process[0]->design_user_id;
											$approver_user_id=$result_process[0]->approver_user_id;

											$result_information_design=$this->bumodal->get_user_information_admin($design_user_id);
											$design_user_name=$result_information_design->Username;

											$result_information_approver=$this->bumodal->get_user_information_admin($approver_user_id);
											// $approver_user_name=$result_information_approver->Username;

											$design_user_status=$result_process[0]->design_user_status;
											$approver_user_status=$result_process[0]->approver_user_status;
											if($design_user_status==1){
												$release_design_user=date('d-m-Y',strtotime($result_process[0]->design_date));
											}else if($design_user_status==3){
												$release_design_user="Comment To Design User From Approver";
											}else{
												$release_design_user="--";
											}

											if($approver_user_status==1){
												$approver_user_name=$result_information_approver->Username;
												$release_approver_date=date('d-m-Y',strtotime($result_process[0]->approver_date));
											}else if($approver_user_status==2){
												$approver_user_name=$result_information_approver->Username;
												$release_approver_date="Comment To Design User From Approver";
											}else if($approver_user_status==0){
												$approver_user_name='--';
												$release_approver_date="Not Approved";
											}

											$procurement_user_status=$result_process[0]->procurement_user_status;
											if($procurement_user_status==1){
												$buyer_user_id=$result_process[0]->buyer_user_id;
												$result_information_design=$this->bumodal->get_user_information_admin($buyer_user_id);
												$buyer_user_name=$result_information_design->Username;
											}else{
												$buyer_user_name="--";
											}
											$buyer_date_comm=$result_process[0]->buyer_date_comm;
											if(!empty($buyer_date_comm)){

												$release_buyer_date_comm=date('d-m-Y',strtotime($result_process[0]->buyer_date_comm));
												$query_number_ven=$this->db->get_where('master_bid_Com_vendor_m',array('pr_no'=>$pr_no,'submission_status'=>1));
												$total_no_received_offer=$query_number_ven->num_rows();
											}else{
												$release_buyer_date_comm='--';
												$total_no_received_offer="--";
											}

											$commercial_complete=$result_process[0]->commercial_complete_status;
											if($commercial_complete==1){
												$commercial_date=date('d-m-Y',strtotime($result_process[0]->commercial_date));
											}else{
												$commercial_date='--';
											}
											$planned_technical_clearance_date=$result_process[0]->planned_technical_clearance_date;
											if(!empty($planned_technical_clearance_date)){
												$planned_technical_clearance_date_new=date('d-m-Y',strtotime($result_process[0]->planned_technical_clearance_date));
											}else{
												$planned_technical_clearance_date_new='--';
											}
											$technical_user_status=$result_process[0]->technical_user_status;
											if($technical_user_status==1){
												$technical_date_details=date('d-m-Y',strtotime($result_process[0]->technical_date));
											}else{
												$technical_date_details='--';
											}
											$delivery_date_as_per_po=$result_process[0]->delivery_date_as_per_po;
											if(!empty($delivery_date_as_per_po)){
												$delivery_date_as_per_po_new=date('d-m-Y',strtotime($result_process[0]->delivery_date_as_per_po));
											}else{
												$delivery_date_as_per_po_new='--';
											}
											$drg_submission_date=$result_process[0]->delivery_date_as_per_po;
											if(!empty($drg_submission_date)){
												$drg_submission_date_new=date('d-m-Y',strtotime($result_process[0]->drg_submission_date));
											}else{
												$drg_submission_date_new='--';
											}
											

										}else{
											$design_user_name="--";
											$approver_user_name="--";
											$release_design_user="--";
											$release_approver_date="--";
											$buyer_user_name="--";
											$release_buyer_date_comm="--";
											$total_no_received_offer="--";
											$drg_submission_date_new=$delivery_date_as_per_po_new=$technical_date_details=$planned_technical_clearance_date_new=$commercial_date='--';

										}
										// print_r($row);
										$x++;
                                ?>
                                <tr>
                                	<td><?=$x?></td>
                                    <!--<td><?=$job_Code?></td>-->
                                    <td><?=$row->area?></td>
                                    <td>--</td>
                                    <td><?=$row->item?></td>
                                    <td><?=$pr_no?></td>
                                    <td><?=$design_user_name?></td>
	                                <td><?=$approver_user_name?></td>
	                                <td><?=$original_schedule?></td>
	                                <td><?=$release_design_user?></td>
	                                <td><?=$release_approver_date?></td>
	                                <td><?=$buyer_user_name?></td>
	                                <td><?=$release_buyer_date_comm?></td>
	                                <td><?=$total_no_received_offer?></td>
	                                <td><?=$planned_technical_clearance_date_new?></td>                                         
	                                <td><?=$technical_date_details?></td>               
	                                <td><?=$commercial_date?></td>
	                                <td><?=$value_revised_schedule?></td>
	                                <td><?=$scheduled_order?></td>
	                                
	                                <td>--</td>
									<td><?=$po_no_details?></td>
									<td><?=$Po_date_details?></td>
	                                <td>--</td>
									<td><?=$delivery_date_as_per_po_new?></td>
									
									<td><?=$Bg_submission_date_details?></td>
									<td><?=$Advance_payment_date_details?></td>
									<td><?=$drg_submission_date_new?></td>
									<td><?=$Drg_approval_date_details?></td>
									<td><?=$Mfg_clear_date_details?></td>
									<td><?=$Inspection_call_date_details?></td>
									<td><?=$Inspection_call_remark_details?></td>
									<td><?=$Inspection_clearance_date_details?></td>
									<td><?=$Inspection_clearance_remark_details?></td>
									<td><?=$Dispatch_clearance_date_details?></td>
									<td><?=$Dispatch_clearance_remark_details?></td>
									<td><?=$Qty_receipt_at_site_details?></td>
									<td><?=$Qty_pending_details?></td>
	                                <td><?=$Supply_completion_details?></td>
									<td>--</td>
									<td><?=$ACE_Basic_details?></td>
									<td><?=$Invoice_value_details?></td>
									<td><?=$Order_value_details?></td>
									<td><?=$Cost_saving_details?></td>
									
									
									
									  

									  

									  

									  

									  












                                    <!--<td><?=$row->quantity?></td>-->
                                    
                                   
                                </tr>
                                <?php 
                                    endforeach;
                                ?>
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
					        		        
					    
					