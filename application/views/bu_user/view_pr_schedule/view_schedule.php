<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}


?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">PR Schedule View</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> View PR Schedule
			 <!-- <small>header small text goes here...</small> -->
			</h1>
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
					<!-- 	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">View PR Schedule</h4>
				</div>
				
					<div class="panel-body">
					<div class="alert alert-secondary">
                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
                    </div>	
                    <form action="<?=base_url()?>bu_view_pr_schedule_new" method="POST">
                    <input type="hidden" name="Slno_tracking" value="">					
						
						      <div id="collapseOne" class="collapse show" data-parent="#accordion">
						        <div class="card-body">
						        	
						        	<hr>
						         	<div class="row">
										<div class="col-md-6 col-lg-6">
										 	<div class="form-group row m-b-15">
												<label class="col-form-label col-md-3" for="project"> Project  <span style="color: red">*</span></label>
												<div class="col-md-9">
													<input class="form-control m-b-5 datepickers" placeholder="Enter Project " name="Date_creation" id="Date_creation" type="text" value="" required="">
													<small class="f-s-12 text-grey-darker">Here enter Project</small>
												</div>
												

												<!-- part g start -->
												
												< --end -->
											</div>
											</div>
											



							
							  
				</form>
				
			</div>
			<div class="form-group row pull-right">
                    <div class="form-group row pull-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary m-r-5" name="send_button" value="save">View</button>
                             <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary m-r-5" name="send_button" value="save">Save</button>
                           <user-buuser-home" class="btn btn-sm btn-danger">Cancel</a> 
                        </div>
                    </div>			
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->