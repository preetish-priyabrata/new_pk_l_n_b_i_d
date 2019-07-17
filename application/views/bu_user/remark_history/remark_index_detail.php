<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$values=$pr_no=$pr_no;
$slno=$slno;
$job_code=$job_code;
$id=$id;
$data_info = array('pr_no' => $pr_no);
$query_remark=$this->db->get_where('master_bu_remark_pr',$data_info);
// 'pr_no'=>$pr_no,$slno=>$slno,'job_code'=>$job_code,'id'=>$id

?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Transparent Sidebar</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">View Entire Remarks Chain For Pr No <small><?=$pr_no?></small></h1>
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
					<h4 class="panel-title">PR Remarks History Pr No Is <?=$pr_no?></h4>
				</div>
				<div class="panel-body">
                <br>
                	<!-- table -->
					<div class="form-group row pull-right">
                            <div class="col-md-12">
                             
                                <a  href="<?=base_url()?>user-bu-home" class="btn btn-sm btn-default btn-success">Back</a> 
                            </div>
                        </div>
                        <br>
                <table id="remarks" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date On </th>
                            <th>Remarks / Comment</th>
                            <th>Informations</th>
                            <th>User Type</th>
                            <th>User Enter Email</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($query_remark->result() as $value_information):

                        ?>
                        <tr>
                            <td><?=$value_information->date_entry?></td>
                            <td>
                                <?php 
                                    if($value_information->type_remark=='R'){
                                        echo "<p style='color:green'>Remark</p> ";
                                    }else{
                                        echo "<p style='color:Red'>Comment</p> ";
                                    }
                                ?>
                            </td>
                            <td><?=$value_information->Comment_remark?></td>
                            <td>
                                <?php 
                                    $level_user=$value_information->level_user;
                                    switch($level_user){
                                        case '1':
                                            echo "Bu User";
                                        break;
                                        case '2':
                                            echo "Design User";
                                        break;
                                        case '3':
                                            echo "Approved User";
                                        break;
                                        case '4':
                                            echo "Procurment User";
                                        break;
                                        case '5':
                                            echo "Buyer User";
                                        break;
                                        case '6':
                                            echo "Technical Evalutor User";
                                        break;
                                        case '7':
                                            echo "Commercial Evalutor User";
                                        break;
                                        case '8':
                                            echo "Vendors User";
                                        break;
                                    }

                                ?>
                            </td>
                            <td><?=$value_information->email_id?></td>
                        </tr>
                        <?php 
                            endforeach;
                         ?>
                    </tbody>

                </table>
                
				</div>
			</div> 
			<!-- end panel -->
      
        <?php
				 	$result_query=$this->db->get_where('master_bid_query_tech_m',array('pr_no'=>$values));
					 //print_r($result_query);
				?>
					

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Technical Pending Query List</h4>
				</div>
				<div class="panel-body">
						
	            <div class="row">
								
							
								
				      </div>
				      <div class="panel-body">
						<div class="table-responsive-sm">
								<table class="display table vendor_example"  style="width:100%">
									<thead>
										 <tr>
											 <th>Slno .</th>
											 <th>Query</th>
											 <th>Query Date</th>
											 
										 </tr>
								 </thead>
								 <tbody>
									<?php
									 $x=0;
									 		
												foreach ($result_query->result() as $key_query) {
													$x++;
                                                   if($key_query->status_responds==0){
								 			
													?>
													<tr>
														<td><?=$x?></td>
														<td><?=$key_query->query_details?></td>
														<td><?=$key_query->date_query?></td>
														
														
													
													</tr>
													<?php
												}

												}

											
									  ?>

								 </tbody>

							</table>

						</div>
					</div>
						 		
						
					</div>
				</div>
				<!-- Query Block End  -->
				   
				 	
				 	<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Technical Reply List</h4>
				</div>
				<div class="panel-body">
						
	            <div class="row">
								
							
								
				      </div>
				      <div class="panel-body">
						<div class="table-responsive-sm">
								<table class="display table vendor_example"  style="width:100%">
									<thead>
										 <tr>
											 <th>Slno .</th>
											 <th>Query</th>
											 <th>Query Date</th>
											  <th>Reply</th>
											 <th>Reply Date</th>
											
										 </tr>
								 </thead>
								 <tbody>
									<?php
									 $x=0;
									 		
												foreach ($result_query->result() as $key_query) {
													$x++;
                                                   if($key_query->status_responds==1){
								 			
													?>
													<tr>
														<td><?=$x?></td>
														<td><?=$key_query->query_details?></td>
														<td><?=$key_query->date_query?></td>
													<td><?=$key_query->response_detail?></td>
														<td><?=$key_query->date_respond?></td>
														
													
													</tr>
													<?php
												}

												}

											
									  ?>

								 </tbody>

							</table>

						</div>
					</div>
						 		
						
					</div>
                </div>
                <?php
				 	$result_query_comm=$this->db->get_where('master_bid_query_comm_m',array('pr_no'=>$values));
					 //print_r($result_query);
				?>
                <div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Commercial Pending Query List</h4>
				</div>
				<div class="panel-body">
						
	            <div class="row">
								
							
								
				      </div>
				      <div class="panel-body">
						<div class="table-responsive-sm">
								<table class="display table vendor_example"  style="width:100%">
									<thead>
										 <tr>
											 <th>Slno .</th>
											 <th>Query</th>
											 <th>Query Date</th>
											
										 </tr>
								 </thead>
								 <tbody>
									<?php
									 $x=0;
									 		
												foreach ($result_query_comm->result() as $key_query) {
													$x++;
                                                   if($key_query->status_responds==0){
								 			
													?>
													<tr>
														<td><?=$x?></td>
														<td><?=$key_query->query_details?></td>
														<td><?=$key_query->date_query?></td>
														
														
													
													</tr>
													<?php
												}

												}

											
									  ?>

								 </tbody>

							</table>

						</div>
					</div>
						 		
						
					</div>
				</div>
				<!-- Query Block End  -->
				   
				 	
				 	<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Commercial Reply List</h4>
				</div>
				<div class="panel-body">
						
	            <div class="row">
								
							
								
				      </div>
				      <div class="panel-body">
						<div class="table-responsive-sm">
								<table class="display table vendor_example"  style="width:100%">
									<thead>
										 <tr>
											 <th>Slno .</th>
											 <th>Query</th>
											 <th>Query Date</th>
											  <th>Reply</th>
											 <th>Reply Date</th>
											
										 </tr>
								 </thead>
								 <tbody>
									<?php
									 $x=0;
									 		
												foreach ($result_query_comm->result() as $key_query) {
													$x++;
                                                   if($key_query->status_responds==1){
								 			
													?>
													<tr>
														<td><?=$x?></td>
														<td><?=$key_query->query_details?></td>
														<td><?=$key_query->date_query?></td>
													<td><?=$key_query->response_detail?></td>
														<td><?=$key_query->date_respond?></td>
														
													
													</tr>
													<?php
												}

												}

											
									  ?>

								 </tbody>

							</table>
                           
						</div>
					</div>
						 		
						
					</div>
				</div>
				<!-- Query Block End  -->
				   
				 	
				
				
                </div>
				<!-- Query Block End  -->
        <!-- end #content -->
        <script>
            $(document).ready(function() {
                $('#remarks').DataTable();
            } );
        </script>