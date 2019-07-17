<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}

	$this->db->select('*');
	$this->db->from('master_project');
	$this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	$this->db->where('assign_project_user.email_id', $email_id); 	
	$query_bu = $this->db->get();
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
			<h1 class="page-header">Add New Material Requisition  </h1>
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
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
					</div>
					
				</div>
				<div class="panel-body">
					
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="design-user-add-new-material-save" method="POST" >
						<div class="row">
							<div class="col-md-6 col-lg-6">
								
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Material Category<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Material Category " name="material_category" id="" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter Material Category</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">UOM<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter UOM" name="uom" id="" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter UOM</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Technical Parameters<span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control m-b-5" placeholder=" " name="technical_parameters" id="" type="text" required=""></textarea>
										<small class="f-s-12 text-grey-darker">Please enter Technical Parameters</small>
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
									<label class="col-form-label col-md-3" for="required_date">Material Id<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Material Id " name="material_id" id="" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter Material Id</small>
									</div>
								</div>
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
<script type="text/javascript">
	function get_project_details(){
		var job_code=$('#job_code').val();
		// alert(job_code);
		if(job_code!=""){

			$.ajax({
			  	url:'bu-job-code-desc',
			    method: 'post',
			    data: {field_id:'1',job_codes:job_code},
			    dataType: 'json',
			    success: function(response){
			    	$('input[name="Project_desc"]').empty();
			    	
			    	console.log(response.id_desc);
			    	$('#Project_desc').val(response.id_desc);
			    	
			   
				}
			});
		}else{
			$('#Project_desc').val(' ');
		}
	}
</script>
</html>
				
