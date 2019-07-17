<?php 
$technical_email_id=$this->session->userdata('technical_email_id');
if(empty($technical_email_id)){
	
	redirect('tech-evalutor-logout-by-pass');
}



$Slno_query=$Slno_query;
$pr_no=$pr_no;
$result_query1=$this->db->get_where('master_bid_query_tech_m',array('pr_no'=>$pr_no,'Slno_query'=>$Slno_query));
$result_query=$result_query1->result();
$vendor_id=$result_query[0]->Vendor_id;
$this->db->where('Vendor_email_id',$vendor_id);
$query_vendor=$this->db->get('master_vendor_detail');
$query_vendor_result=$query_vendor->result();
$value_id_vender=$query_vendor_result[0];

$project_info=$this->db->get_where('master_pr_process_detail',array('pr_no'=>$pr_no));
$result_query_project_info=$project_info->result();

 
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>user-technical-evalutor-home">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Query Panel View<small></small></h1>
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
				
				
					
					

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Query view</h4>
				</div>
				<div class="panel-body">
						<form  action="<?=base_url()?>tech-technical-query-view-save" method="post">
	          
							<div class="row">
								
								<div class="col-md-12 col-lg-12">

									<h4 class="panel-title ">Query  : <?=$result_query[0]->query_details?></h4>
									
									<hr style="height: 2px; background:  green">
								</div>
							</div>
							
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="activity_name">PR No. </label>
								<div class="col-md-9">
								<?=$pr_no?>
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="activity_name">Project Name. </label>
								<div class="col-md-9">
								<?=ucwords($result_query_project_info[0]->project_name)?>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="activity_name">Organisation Name. </label>
								<div class="col-md-9">
								<p><?=$value_id_vender->Organisation_name?></p>
								</div>
							</div>
						</div>
					</div>	
							
								
				     <div class="row">
	            	<div class="col-lg-2">
	              	<div class="form-group row m-b-15">
			     					<label class="col-form-label col-md-3" for="title">Reply <span style="color: red"></span></label>
									</div>
								</div>
						 		<div class="col-lg-9">
									
									<input type="hidden" name="pr_no" 	value="<?=$pr_no?>">
									
									<input type="hidden" name="Slno_query" value="<?=$Slno_query?>" 	>
									<textarea class="form-control" rows="3" name="query_details" ></textarea>
								</div>
								<div class="col-lg-1">
									 <button type="submit" class="btn btn-default">Submit</button>
									 <a  href="<?=base_url()?>user-technical-evalutor-home" class="btn btn-sm btn-link">Back</a>
								</div>
				      </div>
						 		
						</form>
					</div>
				</div>
				<!-- Query Block End  -->
				


					

				</div>


