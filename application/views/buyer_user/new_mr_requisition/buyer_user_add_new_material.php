<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buyer-logout-by-pass_new');exit;
}
	
	$query_master_category = $this->db->get('master_category');
	$query = $this->db->get('master_category_uom');
?>
<!DOCTYPE html>
<html>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<bpdy>
	<div class="container">
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add New Material </h1>
			<!-- end page-header -->
			<?php if(!empty($this->session->flashdata('success_message'))){?>
			<div class="alert alert-success fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>Success!</strong>
			  <?=$this->session->flashdata('success_message')?> 
			  <!-- <a href="#" class="alert-link">an example link</a>.  -->
			</div>
			<?php 
			}
			 // print_r($this->session->userdata());
			 ?>
			 <?php if(!empty($this->session->flashdata('error_message'))){?>
			<div class="alert alert-danger fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>error!</strong>
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
					
					</div>
					
				</div>
				<div class="panel-body">
					
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="buyer-user-add-new-material-save" method="POST" >
						<div class="row">
							<div class="col-md-6 col-lg-6">
								
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Material Category<span style="color: red">*</span></label>
									<div class="col-md-9">
										<!-- <input class="form-control m-b-5" placeholder="Enter Material Category " name="material_category" id="" type="text" required=""> -->
										<select class="form-control m-b-5"  name="material_category" id="material_category" required>
											<option value=''>please select material category</option>
											<?php
												foreach ($query_master_category->result() as $value) {
													?>
														<option value='<?=$value->category_name?>'><?=ucfirst($value->category_name)?></option>
													<?php


												}
												?>

												<?php

											?>
										</select>
										<small class="f-s-12 text-grey-darker">Please select Material Category</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">UOM<span style="color: red">*</span></label>
									<div class="col-md-9">
										<!--<input class="form-control m-b-5" placeholder="Enter UOM" name="uom" id="" type="text" required="">-->
										<select class="form-control m-b-5"  name="uom" id="uom" required>
											<option value=''>please select uom</option>
											<?php
												foreach ($query->result() as $value) {
													?>
														<option value='<?=$value->uom?>'><?=ucfirst($value->uom)?></option>
													<?php


												}
												?>

												<?php

											?>
                                        </select>
										<small class="f-s-12 text-grey-darker">Please select UOM</small>
									</div>
								</div>
								
							</div>

							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Material Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Material Name" name="material_name" id="" type="text" required=""></text>
										<small class="f-s-12 text-grey-darker">Please enter Material Name</small>
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Technical Parameters<span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control m-b-5" placeholder=" " name="technical_parameters" id="" type="text" required=""></textarea>
										<small class="f-s-12 text-grey-darker">Please enter Technical Parameters</small>
									</div>
								</div>  








                                <!--<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Material Id<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Material Id " name="material_id" id="" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter Material Id</small>
									</div>
								</div>-->
							</div>
						</div>				
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-info m-r-5">Save</button>
                               <a href="JavaScript:window.close()">Close</a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </div>
</bpdy>

</html>
				
