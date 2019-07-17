<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_design = $this->db->get('master_project');




?>

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
										<label class="col-form-label col-md-3" for="Date_creation"> Design User Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code" id="job_code" required="">
												<option value="">--Select Design user name---</option>
												<?php
												foreach ($data_array_design['master_admin'] as $key_design) {
													
													echo "<option value='".$key_design->role_id."'>".$key_design->Username." [ ".$key_design->email_id." ]</option>";
												}
												?>
												
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Design user name</small>
										</div>
									</div>
								</div>
                             </div>
									</div>		
									</form>	
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
                foreach($query_pr->result() as $row){
                    $pr_no=$row->pr_no;
                    $data_check=array('pr_no'=>$pr_no);
                    $query_check_pr=$this->db->get_where('master_pr_process_detail',$data_check);
                    $num_rows_check=$query_check_pr->num_rows();
                    if($num_rows_check!=0){
                        $pr_results=$query_check_pr->result();
                        $commercial_complete=$pr_results[0]->commercial_complete_status;
                        if($commercial_complete==1){
                            $commercial_count++;
                        }
                        // commercial_complete_status
                            $comp++;
                    }else{
                        $incom++;
                    }
                }
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Project Name :- <?=$project_details_info?> </h4>

				</div>
				<div class="panel-body">
                <!--<div class="row">
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
                    </div>--
                </div>-->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" border="1">
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
                                    <th>Remarks(issues faced)</th>
                                  

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!--<td><?=$query_pr->num_rows()?></td>
                                    <td><?=$comp?></td>
                                    <td><?=$incom?></td>
                                    <td>--</td>
                                    <td><?=$commercial_count?></td>-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
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
					        		        
					    
					