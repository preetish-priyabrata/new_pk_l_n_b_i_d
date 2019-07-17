<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_bu=$query_design = $this->db->get('master_project');
// $this->db->select('*');
//   $this->db->from('master_project');
//   // $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );         
//   // $this->db->where('assign_project_user.email_id', $email_id);  
//   $query_bu = $this->db->get();

  $job_code_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $job_code_id=$this->input->post('job_code');
  // $Starting_id=($this->input->post('Starting'));
  // $ending_id=($this->input->post('ending'));
}else{
  $job_code_id=$ending_id=$Starting_id="";
}



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
			<h3 class="page-header">New Order Book<small></small></h3>
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
                            ?>

                            <option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
                        <?php }
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
        $table="master_new_order_book"; 
        $Slno_project=$job_code=$this->input->post('job_code');
          $data_check = array('Slno_project' => $Slno_project);
                $query=$this->db->get_where($table,$data_check)->result();
                foreach ($query_bu->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=$key_job_code->Project_Name;
                       
                    }
                }
                // $output .= '</table>';
               
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
                                  <th>Slno.</th>
                                    <th>Job Code</th>
                                    <th>Job description</th>
                                    <th>LOI date</th>
                                    <th>Contract sign date</th>
                                    <th>Contract value</th>
                                    <th>Supply order value</th>
                                    <th>Contract start date</th>
                                    <th>Contractual completion date</th>
                                    <th>Contract duration</th>
                                    <th>Target completion date</th>
                                    <th>Actual completion date</th>
                                    <th>Remarks</th>
                                    
                      

                                 
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                      			$x=0;
                      			foreach ($query as $key_new_book => $value_new_book) {
                        		$x++;
                     			?>
                     			<tr>
                     			 <td><?=$x?></td>
                      			 <td><?=$value_new_book->job_code?></td>
                                 <td><?=$value_new_book->Job_description?></td>
                                 <td><?=$value_new_book->LOI_date_contract?></td>
                                 <td><?=$value_new_book->Contract_sign_date?></td>
                                 <td><?=$value_new_book->Contract_value?></td>
                                 <td><?=$value_new_book->Supply_order_value?></td>
                                 <td><?=$value_new_book->Contract_start_date?></td>
                                 <td><?=$value_new_book->Contract_completion_date?></td>
                                 <td><?=$value_new_book->Contract_duration?></td>
                      	         <td><?=$value_new_book->Target_date_completion?></td>
                     	 	        <td><?=$value_new_book->Actual_completion_date?></td>
                                 <td><?=$value_new_book->Remark?></td>
                               </tr>
                         <?php }?>


                             
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
					        		        
					    
					