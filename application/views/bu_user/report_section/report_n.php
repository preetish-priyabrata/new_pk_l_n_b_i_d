<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}

$query_vendor_detail=$this->db->get('master_vendor_detail');
$query_project = $this->db->get('master_project');
$Vendor_email_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$Vendor_email_id=$this->input->post('Vendor_email_id');
	$Starting_id=($this->input->post('Starting'));
	$ending_id=($this->input->post('ending'));
}else{
	$Vendor_email_id=$ending_id=$Starting_id="";
}

?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
				<li class="breadcrumb-item active">Report N</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Supplier Performance Report (SPR)<small></small></h3>
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
										<label class="col-form-label col-md-3" for="Vendor_email_id"> Supplier Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="Vendor_email_id" id="Vendor_email_id" required="">
												<option value="">--Select Supplier Name---</option>
												<?php
													foreach ($query_vendor_detail->result() as $value) {
														?>
														<option value='<?=$value->Vendor_email_id?>' <?php if($Vendor_email_id==$value->Vendor_email_id){ echo "selected"; } ?>><?=$value->Organisation_name?></option>
												<?php	}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Supplier Name </small>
										</div>
									</div>
									<div class="form-group row  m-b-15">
									<label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
									<div class="col-md-9">
									    <div class="row row-space-10">
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5"  name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" value="<?=$Starting_id?>" />
                                            </div>
                                            <div class="col-xs-6 col-md-9">
                                                <input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" value="<?=$ending_id?>"/>
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
                $Vendor_email_id=$this->input->post('Vendor_email_id');
                foreach ($query_vendor_detail->result() as $value) {
                    if($Vendor_email_id==$value->Vendor_email_id){
                        // $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
                        $Organisation_name=$value->Organisation_name;
                        // $material_id=$value->material_item_id;
                        // $UOM=$value->uom;

                    }
				}
				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));

				$this->db->from('master_pr_bid_qoute_item_final_approve');
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates >=', $Starting_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates <=', $ending_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.Vendor_id', $Vendor_email_id);
				$query_supplyer_wise=$this->db->get();
				foreach ($query_supplyer_wise->result() as $key_id) {
			
					$Simple_id_slno[]= ($key_id->Simple_id_slno);
				
			
				}
				
			
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Supplier Name :- <?=$Organisation_name?>  :  </h4> 

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
                        <table id="table1" class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th>Supplier Name </th>
									<th>Project Name</th>
									<th>PR No</th>
									<th>PR Details</th>
                                    <th>PO No</th>
									<th>PO Date</th>
									<th>Order Date</th>
                                    <th>Order Basic Value</th>
                                   <!--  <th>Delay in BG submission (in days)</th> -->
                                    <th>Delay in Drawing submission (in days)</th>
                                    <th>Delay in Delivery (in days)</th>
                                   
                                 
                                </tr>
                            </thead>
                            <tbody>
								<?php
									$delay_sum_1=$delay_sum_2=$total_sum_1=$total_sum_2=0;
									if($query_supplyer_wise->num_rows()!=0){
										$final_Simple_id_slno=array_unique($Simple_id_slno); 
										foreach($final_Simple_id_slno as $row):
											// echo $row;
											$this->db->from('master_pr_bid_qoute_item_total');
											$this->db->where('master_pr_bid_qoute_item_total.simple_id_slno_total', $row);
										
											$this->db->join('master_pr_process_detail', 'master_pr_process_detail.pr_no = master_pr_bid_qoute_item_total.pr_no');
										$query_supplyer_wise_info=$this->db->get();
										$new_inform=$query_supplyer_wise_info->result();
										$short_information=$new_inform[0];
										// print_r($short_information);
											foreach ($query_project->result() as $key_job_code):
												if($key_job_code->Project_Slno==$short_information->project_slno){
													$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
													$job_Code=$key_job_code->job_Code;
													$project_Description=$key_job_code->project_Description;
													$Project_Name=ucwords($key_job_code->Project_Name);
												}

											endforeach;
											$commercial_user_status=$short_information->commercial_user_status;
											if($commercial_user_status==1){
												$commercial_date_new=date('d-m-Y',strtotime($short_information->commercial_date));
											}else{
												$commercial_date_new="--";
											}
											$pr_no=$short_information->pr_no;
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
												$Scheduled_draw_submission=$short_bu_result->Scheduled_draw_submission;
												$actual_draw_submission_date=$short_bu_result->actual_draw_submission_date;
												if(!empty($Scheduled_draw_submission) && !empty($actual_draw_submission_date)){
													$date1 = date('Y-m-d',strtotime($Scheduled_draw_submission));  
													$date1_1 = date('Y-m-d',strtotime($actual_draw_submission_date));  
													$date1_new=date_create($date1);
													$date1_1_new=date_create($date1_1);
													$diff_1=date_diff($date1_new,$date1_1_new);
													$value_delay_1=$diff_1->format("%R%a days");
													$array_delay_1=explode("days",$value_delay_1);
													// print_r($array_delay_1);
													$delay_sum_1=$delay_sum_1+(int)($array_delay_1[0]);
													$total_sum_1++;

												}else{
													$value_delay_1="--";

												}
												$schedule_delivery_date=$short_bu_result->schedule_delivery_date;
												$actual_delivery_date=$short_bu_result->actual_delivery_date;
												if(!empty($schedule_delivery_date) && !empty($actual_delivery_date)){
													$date2 = date('Y-m-d',strtotime($schedule_delivery_date));  
													$date2_2 = date('Y-m-d',strtotime($actual_delivery_date));  
													$date2_new=date_create($date2);
													$date2_2_new=date_create($date2_2);
													$diff_2=date_diff($date2_new,$date2_2_new);
													$value_delay_2=$diff_2->format("%R%a days");
													$array_delay_2=explode("days",$value_delay_2);
													// print_r($array_delay_1);
													$delay_sum_2=$delay_sum_2+(int)($array_delay_2[0]); 
													$total_sum_2++;

												}else{
													$value_delay_2="--";

												}


											// 	$design_date=$query_check_result[0]->design_date;
											// $date1_orginal = date('Y-m-d',strtotime($original_schedule));  
											// $date1=date_create($date1_orginal);
											// $date2=date_create($design_date);
											// $diff=date_diff($date1,$date2);
											// // echo $diff->format("%R%a days");
											
											// $value_delay=$diff->format("%R%a days");
											// $data_graph[]=array($pr_no,explode("days",$value_delay));
											}else{
												$value_delay_2=$value_delay_1=$Po_date_details=$po_no_details='--';

											}
											
								?>

                                <tr>
                                    <td><?=$Organisation_name?></td>
                                    <td><?=$Project_Name?></td>
                                     <td><?=$pr_no=$short_information->pr_no?></td>
                                    <td><?php 
                                        // $table="master_pr_schedule"; 
                                        $query_pr_item=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no))->result();
                                       echo $query_pr_item[0]->item;
                                       ?>
                                    </td>
                                    <td><?=$po_no_details?></td>                       
									<td><?=$Po_date_details?></td>
									<td><?=$commercial_date_new?></td>
                                    <td><?=$short_information->total_price?></td>
                                   <!--  <td>--</td> -->
									<td><?=$value_delay_1?></td>
									<td><?=$value_delay_2?></td>
                                    
                                </tr>
								<?php 
										endforeach;	

									}
								?>
                            </tbody>

                        </table>
                        </div>
                    </div>

                </div>
                <br>
				<br>
				<br>
				<br>
				<div class="row">
					<div class="col-lg-4">
						<table class="table-bordered table" border="1">
							<tr>
								<th>Average Delay in drawing submission(in days)</th>
								<?php if($total_sum_1!=0){?>
								<th><?=$total_no=$delay_sum_1/$total_sum_1?></th>
								<?php }else{
								    ?>
								    <th><?=$total_no=0?></th>
								    <?php
								}?>
							</tr>
							<tr>
								<th>Average Delay in Delivery(In days)</th>
									<?php if($total_sum_2!=0){?>
								<th><?=$total_no_released=$delay_sum_2/$total_sum_2?></th>
								<?php }else{
								    ?>
								    <th><?=$total_no_released=0?></th>
								    <?php
								}?>
							</tr>
							
							
						</table>

					</div>
					<div class="col-lg-8">
						<div id="chart_div" ></div>
					</div>

				</div>

					
				</div>
			</div>
		<?php }?>
        </div>
        <!-- end #content -->	
        	<!-- end #content -->
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
		    google.charts.setOnLoadCallback(drawChart);
		    function drawChart() {
		      var data = google.visualization.arrayToDataTable([
		        ["List", "Number", { role: "style" } ],
		        ['Average Delay in drawing submission(in days)',     <?=$total_no?> , "#b87333"],
				['Average Delay in Delivery(In days)',      <?=$total_no_released?>, "green"],
				
				
		       
		      ]);

		      var view = new google.visualization.DataView(data);
		      view.setColumns([0, 1,
		                       { calc: "stringify",
		                         sourceColumn: 1,
		                         type: "string",
		                         role: "annotation" },
		                       2]);

		      var options = {
		        title: " Supplier Performance Report (SPR) of Supplier Name :- <?=$Organisation_name?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
		        backgroundColor:'#a9e8f9',
		        // axes: {
		        //     x: {
		        //       0: { side: 'top', label: '->'} // Top x-axis.
		        //     }
		        //   },

		        width: 600,
		        height: 400,
		        bar: {groupWidth: "95%"},
		        legend: { position: "none" },
		      };
		      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
		      chart.draw(view, options);
		  }
		</script>
							
					        		        
					    
					