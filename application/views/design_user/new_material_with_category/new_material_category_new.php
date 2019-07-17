<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
//$value=$value;	

?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="<?=base_url()?>design-view-new-category-list">View Category List</a></li>
				<li class="breadcrumb-item active">New Material Category</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">New Material Category 
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
					<h4 class="panel-title">Add New Material Category </h4>
				</div>				
				<div class="panel-body">
					<form action="<?=base_url()?>design-new-material-catergory-new-save" method="POST" >
						<div class="pull-right">
						<!--<a href="<?=base_url()?>design-new-material-catergory-new-save" class="btn btn-info fa fa-puzzle-piece " role="button" title="Here new Category is been created">Add New Material Category</a>-->
					</div>
						<div class="alert alert-secondary">
	                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
	                    </div>	              		
						<div class="card-body">						        	
							<hr>
						    <div class="row">
								
								<div class="col-md-6 col-lg-6"><!-- part g start -->
									<div class="form-group row m-b-15">
										<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="material_category">Material Category<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Material Category " name="material_category" id="" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter material category</small>
									</div>
								</div>
									
												<br>
											
										</div>
									</div>											
								</div>			
							</div>
							<div class="form-group row pull-right">
			                    <div class="form-group row pull-right">
			                        <div class="col-md-12">
			                        	<button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
			                            <!--<button type="button" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="save">Save</button>-->
			                           <a href="<?=base_url()?>design-view-new-category-list" class="btn btn-xs btn-success fa fa-angle-left"   role="button"><i class=""></i> Back</a>
			                            <!--<button type="button" class="btn btn-info btn-sm m-r-5" id="upload" style="display: none">Uploading ...</button>
			                           	 <?php 
			                           	 if($value==1){
			                           	 	?>
			                           	 	  <a  href="<?=base_url()?>design-view-new-category-list" class="btn btn-sm btn-danger">Cancel</a> 
			                           	 	<?php 
			                           	 }else{
			                           	 	?>
			                           	 	  <a  href="<?=base_url()?>design-view-new-material-list" class="btn btn-sm btn-danger">Cancel</a> 
			                           	 	<?php
			                           	 }
			                           	 ?>-->
			                          
			                        </div>
			                    </div>			
							</div>
						</div>
					</form>
					<br />
					<!--<div class="table-responsive" id="customer_data">

					</div>-->

				</div>
			
			<!-- end panel -->
		</div>
		<!-- end #content -->

