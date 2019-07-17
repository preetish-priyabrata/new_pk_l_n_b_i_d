<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_project=$query_design = $this->db->get('master_project');
$query_array_design = $this->db->get_where('master_admin',array('role_id' =>2));
$query_array_design_all= $this->db->get_where('master_admin');

$job_code_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$job_code_id=$this->input->post('job_code');
	$Starting_id=($this->input->post('Starting'));
	$ending_id=($this->input->post('ending'));
}else{
	$job_code_id=$ending_id=$Starting_id="";
}

?>
  <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['controls']}]}"></script>

 <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
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
				<li class="breadcrumb-item active">Report Q</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Design Dept. Productivity (DDP)<small></small></h3>
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
								 	<!-- <div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="job_code"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
													foreach ($query_design->result() as $key_job_code) {?>
														<option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){ echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
												<?php }
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>
									</div> -->
									<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="job_code_design"> Design User Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code_design" id="job_code_design" required="">
												<option value="">--Select Design user name---</option>
												<?php
												foreach ($query_array_design->result() as $key_design) {
													
													echo "<option value='".$key_design->email_id."'>".$key_design->Username." [ ".$key_design->email_id." ]</option>";
												}
												?>
												
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Design user name</small>
										</div>
									</div>
									<div class="form-group row  m-b-15">
										<label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
										<div class="col-md-9">
									    	<div class="row row-space-10">
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5" value="<?=$Starting_id?>" name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" />
												</div>
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5" value="<?=$ending_id?>" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" />
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
				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));

				// print_r($this->input->post());
				// Array ( [job_code] => 1 [job_code_design] => sam@ilab.com [Starting] => 05/01/2019 [ending] => 05/27/2019 [send_button] => find ) 
				$table="master_pr_schedule"; 

                // $job_code=$this->input->post('job_code');
                //  $data_check = array('job_code' => $job_code); 
                $this->db->where('master_pr_schedule.original_schedule >=', $Starting_query);
				$this->db->where('master_pr_schedule.original_schedule <=', $ending_query);
                $query_pr=$this->db->get($table);
                
               
                // ,'status'=>1, 'mr_status'=>1
				// $data_check = array('job_code' => $job_code);               
    //             foreach ($query_project->result() as $key_job_code) {
    //                 if($key_job_code->Project_Slno==$job_code){
    //                     $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
    //                     $job_Code=$key_job_code->job_Code;
    //                     $project_Description=$key_job_code->project_Description;
    //                     $Project_Name=ucwords($key_job_code->Project_Name);
    //                 }
				// }

				
				$job_code_design=$this->input->post('job_code_design');
				
				foreach ($query_array_design->result() as $key_design) {
					if($key_design->email_id==$job_code_design){
						$project_details_info=$design_user=$key_design->Username." [ ".$key_design->email_id." ]";
					}

				}

				
				$this->db->from('master_pr_process_detail');
				$this->db->where('master_pr_process_detail.design_date >=', $Starting_query);
				$this->db->where('master_pr_process_detail.design_date <=', $ending_query);
				$this->db->where('master_pr_process_detail.design_user_id', $job_code_design);
				// $this->db->where('master_pr_process_detail.project_slno', $job_code);
			
				// $this->db->join('master_pr_process_detail', 'master_pr_process_detail.pr_no = master_pr_bid_qoute_item_total.pr_no');
				$this->db->join('master_pr_schedule', 'master_pr_schedule.pr_no = master_pr_process_detail.pr_no');
				
				$query_supplyer_wise_info=$this->db->get();


				$total_no_pr=$query_pr->num_rows(); //total no of pr to be release
				$total_no_release_pr=$query_supplyer_wise_info->num_rows(); // totla no of pr released
                $total_no_pr_not_released=$total_no_pr-$total_no_release_pr; // total no of pr not release
				
               
				?>
       		<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title">Design User  Name :- <?=$project_details_info?>  </h4>

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
										<th>Project Name</th>
										<th>Design User Name</th>
										<th>Approved By(design approver's name)</th>

										<th>Item Name</th>
										<th>Scheduled PR date</th>
										<th>Actual PR released date</th>

										<th>Delay in PR release(in days)</th>
										<th>Scheduled Technical Clearance (TC)date</th>
										<th>Actual Technical Clearance(TC)date</th>

										<th>Delay in technical clearance(in days)</th>
										<th>Post order Actual drawing / datasheet submission date</th>
										<th>Final Drg. No.</th>

										<th>Scheduled manufacturing date</th>
										<th>Actual manufacturing clearance date</th>
										<th>Delay in giving manufacturing clearance</th>
										<!-- <th>Remarks(issues faced)</th> -->
									</tr>
                            	</thead>
                            	<tbody>
									<?php
										$actual_mfg_no_not=$actual_mfg_no=$total_planned_tech=$total_planned_not_tech=0;
										$data_project_details_actual_tech=$data_project_details_actual_mfg=$data_project=$data_project_details = array();
										// print_r($query_supplyer_wise_info->result());
										foreach($query_supplyer_wise_info->result() as $row_project):

											$Project_Name_id=$row_project->project_slno;
											foreach ($query_project->result() as $key_job_code) {
												if($key_job_code->Project_Slno==$Project_Name_id){
													$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
													$job_Code=$key_job_code->job_Code;
													$project_Description=$key_job_code->project_Description;
													$Project_Name_new=ucwords($key_job_code->Project_Name);
													$data_project[] =$Project_Name_new;
                                                    $data_project_details[]= array('project_id' => $Project_Name_new);
												}
											}
											$pr_no=$row_project->pr_no;
											$bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$pr_no));

											if($bu_query_information->num_rows()==1){
												 $result_bu_query_information=$bu_query_information->result();
												$single_bu_query_information=$result_bu_query_information[0];
												// print_r($single_bu_query_information);
												// `final_drg_no`, `scheduled_manufacturing_clearance_date`, `actual_manufacturing_clearance_date`, `remark_manufacturing_clearance`, `delivery_date_as_per_po`, `drg_submission_date_po`
												

												$final_drg_no=$single_bu_query_information->final_drg_no;
												if(!empty($single_bu_query_information->actual_manufacturing_clearance_date)){

													$actual_mfg_no++;
												

												$schedule_mfg_date= date('d-m-Y',strtotime($single_bu_query_information->scheduled_manufacturing_clearance_date)); 

												$actual_mfg_date= date('d-m-Y',strtotime($single_bu_query_information->actual_manufacturing_clearance_date)); 


												$date1_mfg = date('Y-m-d',strtotime($single_bu_query_information->scheduled_manufacturing_clearance_date));  

												$date_mfg_actuall = date('Y-m-d',strtotime($single_bu_query_information->actual_manufacturing_clearance_date));  

												$date1_new_mfg=date_create($date1_mfg);
												$date2_new_actual=date_create($date_mfg_actuall);

												$diff_new=date_diff($date1_new_mfg,$date2_new_actual);

												$value_delay_new=$diff_new->format("%R%a days");
											}else{
												$actual_mfg_no_not++;
												$data_project_details_actual_mfg[]= array('project_id' => $Project_Name_new);
												$value_delay_new=$Drg_approval_date=$actual_mfg_date=$schedule_mfg_date=$diff_new='--';
											}

											}else{
												$data_project_details_actual_mfg[]= array('project_id' => $Project_Name_new);
												$value_delay_new=$Drg_approval_date=$actual_mfg_date=$schedule_mfg_date=$diff_new=$final_drg_no='--';
											}


											
											$design_user_id=$row_project->design_user_id;
											foreach ($query_array_design->result() as $key_design) {
												if($key_design->email_id==$design_user_id){
													// $design_user=$key_design->Username." [ ".$key_design->email_id." ]";
													$Username=ucwords($key_design->Username);
													
												}
							
											}
											$approver_user_id=$row_project->approver_user_id;
											if(!empty($approver_user_id)){
												foreach ($query_array_design_all->result() as $key_design) {
													if($key_design->email_id==$approver_user_id){
														// $design_user=$key_design->Username." [ ".$key_design->email_id." ]";
														$approver_user_Username=ucwords($key_design->Username);
													}
								
												}
												$design_date=$row_project->design_date;
												$original_schedule=$row_project->original_schedule;
												$date1_orginal = date('Y-m-d',strtotime($original_schedule));  
												$date1=date_create($date1_orginal);
												$date2=date_create($design_date);
												$diff=date_diff($date1,$date2);
												// echo $diff->format("%R%a days");
												$value_delay=$diff->format("%R%a days");

												$planned_technical_clearance_date=$row_project->planned_technical_clearance_date;
												if($row_project->technical_user_status==1){
													$total_planned_tech++;

													$technical_date=$row_project->technical_date;
													$technical_date_tech=date('d-m-Y',strtotime($technical_date));
													$planned_technical_clearance_date_new = date('Y-m-d',strtotime($planned_technical_clearance_date));  
													$date1_new=date_create($planned_technical_clearance_date_new);
													$date2_new=date_create($technical_date);
													$diff=date_diff($date1_new,$date2_new);
													// echo $diff->format("%R%a days");
													$value_delay_new_tech=$diff->format("%R%a days");

												}else{
													$total_planned_not_tech++;
													$data_project_details_actual_tech[]= array('project_id' => $Project_Name_new);
													$technical_date_tech=$value_delay_new_tech="--";
												}
												$drg_submission_date=$row_project->drg_submission_date;
												if(!empty($drg_submission_date)){
													$drg_submission_date_new=date('d-m-Y',strtotime($drg_submission_date));
												}else{
													$drg_submission_date_new="--";
													
												}
											}else{
												$value_delay=$approver_user_Username="--";
											}
									?>
									<tr>
										<td><?=$Project_Name_new?></td>
										<td><?=$Username?></td>
										<td><?=$approver_user_Username?></td>

										<td><?=$row_project->item?></td>
										<td><?= date('d-m-Y',strtotime($original_schedule)); ?></td>
										<td><?= date('d-m-Y',strtotime($design_date)); ?></td>

										<td><?=$value_delay?></td>
										<td><?= date('d-m-Y',strtotime($planned_technical_clearance_date)); ?></td>
										<td><?= $technical_date_tech; ?></td>

										<td><?=$value_delay_new_tech?></td>
										<td><?=$drg_submission_date_new?></td>
										<td><?=$final_drg_no?></td>
										<td><?=$schedule_mfg_date?></td>
										<td><?=$actual_mfg_date?></td>
										<td><?=$value_delay_new?></td>
										<!-- <td></td> -->
									</tr>
										<?php endforeach; ?>
                            	</tbody>
							</table>
						</div>
                    </div>

                </div>
                <br>
                <br>
                <div class="row">
                
                	
                
                <?php
                // $data_project_details_actual_tech=$data_project_details_actual_mfg=$data_project=$data_project_details = array();
                 if(!empty($data_project)){
                            $data_buyer_new=array_unique($data_project);
                            // print_r($data_buyer_new);
                            $sort_buyer_new=sort($data_buyer_new);
                            // print_r($sort_buyer_new);
                            foreach ($data_buyer_new as $key_buyer):
                                // echo $key_buyer;
                                $total_pr=0;
                                foreach ($data_project_details as $key_buy => $value_buy) {
                                    if($data_project_details[$key_buy]['project_id']==$key_buyer){
                                        $total_pr++;  
                                    }  
                                }
                                $total_pr_pend_mfg=0;
                                foreach ($data_project_details_actual_mfg as $key_buy_1 => $value_buy) {
                                    if($data_project_details_actual_mfg[$key_buy_1]['project_id']==$key_buyer){
                                        $total_pr_pend_mfg++;  
                                    }  
                                }
                                $total_pr_tech=0;
                                foreach ($data_project_details_actual_tech as $key_buy_2 => $value_buy) {
                                    if($data_project_details_actual_tech[$key_buy_2]['project_id']==$key_buyer){
                                        $total_pr_tech++;  
                                    }  
                                }
                                $data_buyer_graph[] = array('data_project_name' =>$key_buyer, 'total_pr_no'=>$total_pr,'total_pr_pend_mfg'=>$total_pr_pend_mfg,'total_pr_tech'=>$total_pr_tech);
                            endforeach;

                            ?>
                            
                           
                        
                                <div class="col-lg-6">
                                   
                                        <table class="table table-bordered text-center" border="1">
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Total PR Handle</th>
                                                <th>Items pending for technical clearance:</th>
                                                <th>Items pending for manufacturing clearance:</th>
                                            
                                            </tr>
                                            <?php
                                            foreach ($data_buyer_graph as $key_info => $value_id) {
                                                ?>
                                                <tr>
                                                    <td><?=$data_buyer_graph[$key_info]['data_project_name']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_pr_no']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_pr_tech']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_pr_pend_mfg']?></td>
                                                  
                                                </tr>

                                                <?php
                                                # code...
                                            }
                                            ?>
                                        </table>
                                    </div>

                             
                            <br>
                            <br>
                            <?php
                   }

                   ?>
               </div>
                    <br>
                            <br>
                <div class="row">
                	 <div class="col-lg-12">
					<!-- <div id="chart_div" style="width: 900px; height: 500px;"></div> -->
						<div id="chart_div" style=""></div>
					</div>
                    

				</div>
				<div class="col-lg-6">
						<div id="chart_div1" ></div>
					</div>	
				</div>
			</div>
		<?php }?>
        </div>
    <script type="text/javascript">
    	google.setOnLoadCallback(drawChart);

		function drawChart() {
		    var data = google.visualization.arrayToDataTable([
		        ['Project Name', 'Total PR Handle', 'Items pending for technical clearance:','Items pending for manufacturing clearance'],
		         <?php
                    foreach ($data_buyer_graph as $key_info => $value_id) {
                        ?>
				['<?=$data_buyer_graph[$key_info]['data_project_name']?>',<?=$data_buyer_graph[$key_info]['total_pr_no']?>,<?=$data_buyer_graph[$key_info]['total_pr_tech']?>,<?=$data_buyer_graph[$key_info]['total_pr_pend_mfg']?>],

                                <?php
                             
                            }
                            ?>
		        // ['win7protemplate', 12, 5],
		        // ['S60', 14, 5],
		        // ['iPad', 3.5, 12], 

		        ]);

		    var view = new google.visualization.DataView(data);

		    view.setColumns([0, //The "descr column"
		    1, //Downlink column
		    {
		        calc: "stringify",
		        sourceColumn: 1, // Create an annotation column with source column "1"
		        type: "string",
		        role: "annotation"
		    },
		    2, // Uplink column
		    {
		        calc: "stringify",
		        sourceColumn: 2, // Create an annotation column with source column "2"
		        type: "string",
		        role: "annotation"
		    },
		     3, // Uplink column
		    {
		        calc: "stringify",
		        sourceColumn: 3, // Create an annotation column with source column "2"
		        type: "string",
		        role: "annotation"
		    }
		    ]);
		     var options = {
		        title: "Design Dept. Productivity (DDP) \n Design user  :- <?=$design_user?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
		        backgroundColor:'#a9e8f9',
		        // axes: {
		        //     x: {
		        //       0: { side: 'top', label: '->'} // Top x-axis.
		        //     }
		        //   },

		        // width: 600,
		        height: 400,
		        bar: {groupWidth: "95%"},
		        // legend: { position: "none" },
		      };

		    var columnWrapper = new google.visualization.ChartWrapper({
		        chartType: 'ColumnChart',
		        containerId: 'chart_div',
		        options:options,
		        dataTable: view
		    });

		    columnWrapper.draw();
		}
    </script>