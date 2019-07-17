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
				<li class="breadcrumb-item active">Report B</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">List of PRs which are delayed beyond schedule/ List of PR to be released for given month<small></small></h3>
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
                                    <div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Month <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code_month" id="job_code_month" required="">
												<option value="">--Select Month---</option>
                                                <?php
                                                   $monthArray = range(1, 12);
                                                   foreach ($monthArray as $month) {
                                                   // padding the month with extra zero
                                                     $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                   // you can use whatever year you want
                                                   // you can use 'M' or 'F' as per your month formatting preference
                                                     $fdate = date("F", strtotime("2019-$monthPadding-01"));
                                                     ?>
                                                     <option value="<?=$monthPadding?>"><?=$fdate?></option><?php
                                                   }
													// foreach ($query_design->result() as $key_job_code) {
													// 	echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													// }
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Month </small>
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
                $job_code_month=$this->input->post('job_code_month');
                // ,'status'=>1, 'mr_status'=>1
				$date_year=date('Y');
				// ,'YEAR(original_schedule)'=>$date_year
				$data_check = array('job_code' => $job_code,'MONTH(original_schedule)'=>$job_code_month);               
                foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
                $month_text=date("F", strtotime("2019-$job_code_month-01"));
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
					<h4 class="panel-title"> Project Name :- <?=$project_details_info?>  Month :- <?=$month_text?> </h4> 

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
                        <table id="table1bu" class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th>Job Code</th>
                                    <th>PR Details</th>
                                    <th>Scheduled date</th>
                                    <th>Delay (in days)</th>
                                    <!-- <th>NO of Actual order settlement</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									foreach($query_pr->result() as $row):
										$pr_no=$row->pr_no;
										$original_schedule=$row->original_schedule;
										$data_check=array('pr_no'=>$pr_no);
										 $query_check=$this->db->get_where('master_pr_process_detail',$data_check);
										 if($query_check->num_rows()==1){
											 $query_check_result=$query_check->result();
											$design_date=$query_check_result[0]->design_date;
											$date1_orginal = date('Y-m-d',strtotime($original_schedule));  
											$date1=date_create($date1_orginal);
											$date2=date_create($design_date);
											$diff=date_diff($date1,$date2);
											// echo $diff->format("%R%a days");
											$value_delay=$diff->format("%R%a days");
										 }else{
											$value_delay="Not Started";
										 }
                                ?>
                                <tr>
                                    <td><?=$job_Code?></td>
                                    <td><?=$pr_no?></td>
                                    <td><?=date('d-m-Y',strtotime($row->original_schedule))?></td>
                                    <td><?=$value_delay?></td>

                                   
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
		<?php }?>
        </div>
        <!-- end #content -->			
					        		        
					    
					