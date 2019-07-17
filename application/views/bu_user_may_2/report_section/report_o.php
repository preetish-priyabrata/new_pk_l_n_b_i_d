<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$this->db->where('status', '1');
$query_category_item= $this->db->get('master_category_item');
// $query_data = $this->db->get('master_pr_bid_qoute_item_final_approve');12345php

$query_project = $this->db->get('master_project');

$query_vendor_detail=$this->db->get('master_vendor_detail');
?>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Report</a></li> 
				<li class="breadcrumb-item active">Report O</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Material Price trend (MPT)<small></small></h3>
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
										<label class="col-form-label col-md-3" for="slno_master_item"> Material Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="slno_master_item" id="slno_master_item" required="">
												<option value="">--Select Material Name---</option>
												<?php
													foreach ($query_category_item->result() as $value) {
														echo "<option value='".$value->slno_master_item ."'>".$value->material_item_name." [ ".$value->material_item_id." ]</option>";
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Material Name </small>
										</div>
                                    </div>
									<div class="form-group row  m-b-15">
									<label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
									<div class="col-md-9">
									    <div class="row row-space-10">
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5"  name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" />
                                            </div>
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" />
                                            </div>
                                        </div>
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
                $slno_master_item=$this->input->post('slno_master_item');
                foreach ($query_category_item->result() as $value) {
                    if($slno_master_item==$value->slno_master_item){
                        $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
                        $material_name=$value->material_item_name;
                        $material_id=$value->material_item_id;
                        $UOM=$value->uom;
                          
                       
                    }
				}
				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));
				$this->db->from('master_pr_bid_qoute_item_final_approve');
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates >=', $Starting_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates <=', $ending_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.Item_id', $material_id);
				$query_supplyer_wise=$this->db->get();
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Material Name :- <?=$material_name_detail?> </h4> 

				</div>
				<div class="panel-body">
                 <div class="row">
				 	<div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Start Date </label>
                            <div class="col-md-9">
                                <?=$Starting?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> End Date </label>
                            <div class="col-md-9">
                             <?=$ending?>
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
                                    <th>Material Code</th>
									<th>Material Name</th>
									<th>PR No</th>
									<th>Po No</th>
									<th>PO date</th>
                                    <th>UOM</th>
                                    <th>Qty.</th>
                                    
                                    <th>Order Basic Value of the item</th>
                                    <th>Project Name</th>
                                    <th>Supplier Name</th>
                                    <th>Total PO basic Value</th>

                                 
                                </tr>
                            </thead>
                            <tbody>
							<?php
									if($query_supplyer_wise->num_rows()!=0){
									foreach($query_supplyer_wise->result() as $row):
										
										$query_supplyer_wise_info=$this->db->get('master_pr_process_detail',array('pr_no'=>$row->pr_no));
										$new_inform=$query_supplyer_wise_info->result();
										$short_information=$new_inform[0];
										foreach ($query_project->result() as $key_job_code):
													if($key_job_code->Project_Slno==$short_information->project_slno){
														$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
														$job_Code=$key_job_code->job_Code;
														
														$Project_Name=ucwords($key_job_code->Project_Name);
													}

										endforeach;
										$Vendor_id=$row->Vendor_id;
										foreach ($query_vendor_detail->result() as $value) {
											if($Vendor_id==$value->Vendor_email_id){
												// $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
												$Organisation_name=$value->Organisation_name;
												// $material_id=$value->material_item_id;
												// $UOM=$value->uom;
						
											}
										}
										$bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$row->pr_no));
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
											$Order_value=$short_bu_result->Order_value;
											if(!empty($Order_value)){
												$Order_value_details=(($Order_value));
											}else{
												$Order_value_details='--';
											}
										}else{
											$Order_value_details=$Po_date_details=$po_no_details='--';
										}
                                 ?>
                                    <tr>
                                    <td><?=$material_id?></td>
                                    <td><?=$material_name?></td>
									<td><?=$row->pr_no?></td>
									<td><?=$po_no_details?></td>
									<td><?=$Po_date_details?></td>
                                    <td><?=$UOM?></td>
                                    <td><?=$row->Quantity?></td>		
                                    <td><?=$Order_value_details?></td>
                                    <td><?=$Project_Name?></td>
                                    <td><?=$Organisation_name?></td>
                                    <td>--</td>
									</tr>
								<?php 
								endforeach;
							}?>
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
					        		        
					    
					