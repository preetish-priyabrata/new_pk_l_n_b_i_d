<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){

	redirect('vendor-logout-pass');
}
$values=$pr;




 
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Query Panel<small></small></h1>
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

<!-- Query Block End  -->
				<?php
				 	$result_query=$this->db->get_where('master_bid_query_comm_m',array('pr_no'=>$values));
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
					<h4 class="panel-title">Query List</h4>
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
					<h4 class="panel-title">Reply List</h4>
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
						 		
						<div class="col-lg-1">
									
									 <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-link">Back</a>
								</div>
					</div>
				</div>
				<!-- Query Block End  -->
				   
				 	
				
				




