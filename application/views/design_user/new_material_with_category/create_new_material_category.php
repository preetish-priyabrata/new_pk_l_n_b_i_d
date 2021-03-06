<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
$value=$value;	

?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">Create Category and Material with technical Parameter</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">New Category and Material upload 
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
					<h4 class="panel-title">Upload Material and Category </h4>
				</div>				
				<div class="panel-body">
					<div class="form-group row pull-right">
			             <div class="form-group row pull-right">
			                <div class="col-md-12">
								<a href="<?=base_url()?>design-user-add-new-material" class="btn btn-sm btn-default" onclick="new_material_Popup(this.href,'myWindow','900','600','yes');return false">Add New Single Material</a>
							</div>
						</div>
					</div>
					<br>
					<br>
					<form  method="POST" enctype="multipart/form-data"	>
						<div class="alert alert-secondary">
	                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
	                    </div>	              		
						<div class="card-body">						        	
							<hr>
						    <div class="row">
								
								<div class="col-md-6 col-lg-6"><!-- part g start -->
									<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="job_files">Attach Files <span style="color: red">*</span></label>
										<div class="col-md-9">
											<input class=" m-b-5" name="job_files" id="job_files" type="file" required="" required accept=".xls, .xlsx" >	
											<!-- <span class="btn btn-sm btn-info" > -->
											<small class="f-s-12 text-grey-darker">
												<a href="<?=base_url()?>sample/Line_Of_ Items.xls">Click To View Samples</a>
											</small>
											<!-- </span> -->
												<br>
											
										</div>
									</div>											
								</div>			
							</div>
							<div class="form-group row pull-right">
			                    <div class="form-group row pull-right">
			                        <div class="col-md-12">
			                            <button type="button" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="save">Save</button>
			                            <button type="button" class="btn btn-info btn-sm m-r-5" id="upload" style="display: none">Uploading ...</button>
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
			                           	 ?>
			                          
			                        </div>
			                    </div>			
							</div>
						</div>
					</form>
					<br />
					<div class="table-responsive" id="customer_data">

					</div>

				</div>
			
			<!-- end panel -->
		</div>
		<!-- end #content -->

<script>
$(document).ready(function(){

	load_data();
		$('#upload').hide();
	
	$('#sub').on('click', function () {
		if (document.getElementById('job_files').value !== '') {
			
        	var actions_file='design_files_uploaded_details';
        	
			// var slno_Mr_no = $('#job_files').val();
            var file_data = $('#job_files').prop('files')[0];           
            	$('#sub').hide();
				$('#upload').show();
	            if(file_data!=""){
	                var form_data = new FormData();
	                form_data.append('file', file_data);	               
	          		// form_data.append('slno_Mr_no', slno_Mr_no);
	          		form_data.append('actions_file', actions_file);

	                $.ajax({
	                    url: '<?php echo base_url(); ?>design-excel-upload/entry', // point to server-side controller method
	                    dataType: 'text', // what to expect back from the server
	                    cache: false,
	                    contentType: false,
	                    processData: false,
	                    data: form_data,
	                    type: 'post',
	                    success: function (response) {
	                    	if(response==1){
	                    		$('#sub').show();
								$('#upload').hide();
	                    		load_data();
	                    		alert('File Is successfully attached ');
	                    		 
	                    	}else if(response==2){
	                    		$('#sub').show();
								$('#upload').hide();
	                    		alert('Unable to Upload file4');
	                    	}else{
	                    		$('#sub').show();
								$('#upload').hide();
	                    	}

	                    }	             
	                });
	            }else{
	            	alert('Please Attachment Some file click on upload');
	            }
	        
	    }else{
	    	 alert('No File Attached');
	    }

    });



});
function load_data(){
	
	var actions_file='design_Views';
    // var Mr_no = $('#job_code').val();
    queryString_id = 'actions_file='+actions_file;
	    
	    	$('#sub').show();
			
			$.ajax({
				url:"<?php echo base_url(); ?>design-excel-upload/entry",
				data:queryString_id,
				method:"POST",
				success:function(data){
					
					$('#customer_data').html(data);
				}
			});
		
	}
	var popupWindow = null;
function new_material_Popup(url,winName,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}

</script>
