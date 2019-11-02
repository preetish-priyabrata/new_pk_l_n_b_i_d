<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_design = $this->db->get('master_project');

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
				<li class="breadcrumb-item active">Report On PR release status for a Period: Planned Vs Actual</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Report On PR release status for a Period: Planned Vs Actual<small></small></h3>
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
													foreach ($query_design->result() as $key_job_code) {?>
														<option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){ echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
												<?php }
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
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
				$table="master_pr_schedule"; 
                $job_code=$this->input->post('job_code');
               
				$data_check = array('job_code' => $job_code);               
                foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
                $Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));
				$this->db->where('master_pr_schedule.original_schedule >=', $Starting_query);
				$this->db->where('master_pr_schedule.original_schedule <=', $ending_query);
                $query_pr=$this->db->get_where($table,$data_check);
                $commercial_count=$incom=$comp=0;
                
				
               
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
                        <table id="table1bu" class="table table-bordered" border="1" width="100%">
                            <thead>
                                <tr>
									<th>Job Code</th>
									<th>PR No</th>
                                    <th>PR Details</th>
									<th>Scheduled date</th>
									<th>Actual Released date</th>
                                    <th>Delay (in days)</th>
                                    <!-- <th>NO of Actual order settlement</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_no_released_not=$total_no=$total_no_released=0;

									foreach($query_pr->result() as $row):
										
										$pr_no=$row->pr_no;
										$pr_item=$row->item;
										$original_schedule=$row->original_schedule;
										$data_check=array('pr_no'=>$pr_no);
										 $query_check=$this->db->get_where('master_pr_process_detail',$data_check);
										 if($query_check->num_rows()==1){
										 	$total_no_released++;
											 $query_check_result=$query_check->result();
											$design_date=$query_check_result[0]->design_date;
											$date1_orginal = date('Y-m-d',strtotime($original_schedule));  
											$date1=date_create($date1_orginal);
											$date2=date_create($design_date);
											$diff=date_diff($date1,$date2);
											// echo $diff->format("%R%a days");
											
											$value_delay=$diff->format("%R%a days");
											$data_graph[]=array($pr_no,explode("days",$value_delay));
											$release_date=date('d-m-Y',strtotime($design_date));
										 }else{
										 	$total_no_released_not++;
											$value_delay="Not released";
											$release_date="--";
										 }
										
                                ?>
                                <tr>
									<td><?=$job_Code?></td>
									<td><?=$pr_no?></td>
                                    <td><?=$pr_item?></td>
									<td><?=date('d-m-Y',strtotime($row->original_schedule))?></td>
									<td><?=$release_date?></td>
                                    <td><?=$value_delay?></td>

                                   
                                </tr>
                                <?php 
									endforeach;
									// print_r($data_graph);
                                ?>
                            </tbody>

                        </table>
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
								<th>Total PR planned</th>
								<th><?=$total_no=$query_pr->num_rows()?></th>
							</tr>
							<tr>
								<th>Total PR released</th>
								<th><?=$total_no_released?></th>
							</tr>
							<tr>
								<th>PR not released</th>
								<th><?=$total_no_released_not?></th>
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
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
		    google.charts.setOnLoadCallback(drawChart);
		    function drawChart() {
		      var data = google.visualization.arrayToDataTable([
		        ["List", "Number", { role: "style" } ],
		        ['Total PR planned',     <?=$total_no?> , "#b87333"],
				['Total PR released',      <?=$total_no_released?>, "green"],
				['PR not released',  <?=$total_no_released_not?>, "red"],
				
		       
		      ]);

		      var view = new google.visualization.DataView(data);
		      view.setColumns([0, 1,
		                       { calc: "stringify",
		                         sourceColumn: 1,
		                         type: "string",
		                         role: "annotation" },
		                       2]);

		      var options = {
		        title: " Report On PR release status for a Period: Planned Vs Actual \n Project Name :- <?=$project_details_info?> \n From :- <?=$Starting?> To:- <?=$ending?> ",
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
					