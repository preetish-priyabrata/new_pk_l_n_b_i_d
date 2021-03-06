<?php 
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}
$value=$value;
$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_pr($value,$Vendor_email_id);
if($result_title['no_new_tech']!=1){
	// $this->session->set_flashdata('error_message', 'Unable find Bid');
	// redirect('user-vendor-home');
}

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
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Query Panel</h4>
				</div>
				<div class="panel-body">
						<form  action="<?=base_url()?>seller/user-vendor-bid-query-view-save-tech" method="post">
	            <div class="row">
								<div class="col-md-12 col-lg-12">

									<h4 class="panel-title ">Title Bid  : <?=$result_title['new_tech_list'][0]->title?></h4>
									
									<hr style="height: 2px; background:  green">
								</div>
							</div>



							<div class="row">
	            	<div class="col-lg-2">
	              	<div class="form-group row m-b-15">
			     					<label class="col-form-label col-md-3" for="title">Query <span style="color: red"></span></label>
									</div>
								</div>
						 		<div class="col-lg-9">
									<input type="hidden" name='query_slno' value="<?=$value?>">
									<input type="hidden" name="bid_slno" 	value="<?=$result_title['new_tech_list'][0]->master_bid_id?>">
									<input type="hidden" name="pr_no" 	value="<?=$result_title['new_tech_list'][0]->pr_no?>">
									<input type="hidden" name="pr_no_slno" 	value="<?=$result_title['new_tech_list'][0]->pr_slno?>">
									<input type="hidden" name="slno_vendor" 	value="<?=$result_title['new_tech_list'][0]->slno_vendor?>">
									<textarea class="form-control" rows="3" name="query_details" ></textarea>
								</div>
								<div class="col-lg-1">
									 <button type="submit" class="btn btn-default">Submit</button>
								</div>
				      </div>
						</form>
					</div>
				</div>
				<!-- Query Block End  -->
				
					<?php
				 	$result_query=$this->db->get_where('master_bid_query_tech_m',array('bid_slno'=>$value,'Vendor_id'=>$Vendor_email_id));
					// print_r($result_query);
				?>
				
				<!-- Query table WILL SHOW  -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<div class="panel-heading-btn">

							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
						<h4 class="panel-title">Query List </h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive-sm">
								<table class="display table vendor_example"  style="width:100%">
									<thead>
										 <tr>
											 <th>Slno .</th>
											 <th>Query</th>
											 <th>Query Date</th>
											 <th>Response Details</th>
											 <th>Response Date</th>
										 </tr>
								 </thead>
								 <tbody>
									<?php
									 $x=0;
									 		
												foreach ($result_query->result() as $key_query) {
													$x++;

													?>
													<tr>
														<td><?=$x?></td>
														<td><?=$key_query->query_details?></td>
														<td><?=date('d-m-Y',strtotime($key_query->date_query))?></td>
														<?php if($key_query->status_responds==1){?>
														<td><?=$key_query->response_detail?></td>
														<td><?=date('d-m-Y',strtotime($key_query->date_respond))?></td>
													<?php }else{
														?>
														<td>--</td>
														<td>--</td>
														<?php } 	?>
													
													</tr>
													<?php

												}

											
									  ?>

								 </tbody>

							</table>

						</div>
					</div>
					<a  href="<?=base_url()?>user-vendor-home" class="btn btn-sm btn-link">Back</a>

				</div>
