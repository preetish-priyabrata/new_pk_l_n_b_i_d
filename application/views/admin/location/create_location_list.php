<?php
$email_id=$this->session->userdata('email_id');
if(empty($email_id)){

	redirect('admin-logout-by-pass');
}
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="user-admin-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Location</a></li>
				<li class="breadcrumb-item active">Create New Location</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Create Location Form </h1>
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

			 ?>

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="user-admin-home" class="btn btn-xs btn-icon btn-circle btn-danger" ><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Add New Location Information</h4>
				</div>
				<div class="panel-body">
					<div class="alert alert-secondary">
                    	<span style="color: red"> *</span> All mandatory fields shall be duly filled up
                    </div>

					<form action="admin-add-Location-save" method="POST" >
						 <input name="Location_name_form" id="Location_name_form" type="hidden" value="Create_new_location" required="">
						<div class="row">
							<div class="col-md-6 col-lg-6">

							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Location_name">Location Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" onkeyup="get_check_location()" placeholder="Enter Location name" name="Location_name" id="Location_name" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Location name</small>
										<br>
										<span id="error" style="color:red"></span>
									</div>
								</div>



							</div>
							<div class="col-md-6 col-lg-6">



								<!-- <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Location Description  <span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control" rows="3" name="Location_Description" required=""></textarea>
										<small class="f-s-12 text-grey-darker"> Please Enter Location description  </small>
									</div>
								</div> -->
							</div>

						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" id="save" class="btn btn-sm btn-primary m-r-5">Save</button>
                                <a  href="user-admin-home" class="btn btn-sm btn-default">Cancel</a>
                            </div>
                        </div>


					</form>

				</div>
			</div>

			<script type="text/javascript">
				function get_check_location() {
					var Location_name=$('#Location_name').val();
					$('#save').hide();			
					var type_of_name=$('#type_of_name').val();	
					var action_id="location_info";
					if(type_of_name!=""){
						$('#save').hide();
						queryString_id = 'action='+action_id+'&code='+ Location_name;
						jQuery.ajax({
						url: "<?=base_url()?>check_vehicle_type_status",
						data:queryString_id,
						type: "POST",
						success:function(data){
							if(data==1){
								$('#error').html('');
								$('#save').show();
							}else if(data==2){
								$('#error').html('Location Type Is already Is existed');
								$('#save').hide();

							}else{
								$('#error').html('Some Thing Went Wrong');
								$('#save').hide();
							}
						}
					});
						
					}else{
						$('#save').hide();
					}

				}
			</script>
