<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
	$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$query_bu = $this->db->get();

?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">PR Schedule</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Entry PR Schedule
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
					<h4 class="panel-title">Entry PR Schedule</h4>
				</div>				
				<div class="panel-body">
					<form  method="POST" enctype="multipart/form-data"	>
						<div class="alert alert-secondary">
	                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
	                    </div>	              		
						<div class="card-body">						        	
							<hr>
						    <div class="row">
								<div class="col-md-6 col-lg-6">
								 	<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control" onchange="load_data()" name="job_code" id="job_code" required="">

												<option value="">--Select Project---</option>
												<?php
													foreach ($query_bu->result() as $key_job_code) {
														echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													}
												?>
											</select>
											<!-- <input class="form-control m-b-5 datepickers" placeholder="Enter Project PR schedule" name="Date_creation" id="Date_creation" type="text" value="" required=""> -->
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>							
									</div>
								</div>
								<div class="col-md-6 col-lg-6"><!-- part g start -->
									<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="job_files">Attach Files <span style="color: red">*</span></label>
										<div class="col-md-9">
											<input class=" m-b-5" name="job_files" id="job_files" type="file" required="" required accept=".xls, .xlsx" >	
											<!-- <span class="btn btn-sm btn-info" > -->
											<small class="f-s-12 text-grey-darker">
												<a href="<?=base_url()?>sample/new_final_pr_schedule_2019.xlsx">Click To View Samples</a>
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
			                           	 
			                            <a  href="<?=base_url()?>user-bu-home" class="btn btn-sm btn-danger">Cancel</a> 
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
			
        	var actions_file='bu_files_uploaded_details';
        	var Mr_no = $('#job_code').val();
			// var slno_Mr_no = $('#job_files').val();
            var file_data = $('#job_files').prop('files')[0];
            if(Mr_no!=""){
            	$('#sub').hide();
				$('#upload').show();
	            if(file_data!=""){
	                var form_data = new FormData();
	                form_data.append('file', file_data);
	                form_data.append('job_code', Mr_no);
	          		// form_data.append('slno_Mr_no', slno_Mr_no);
	          		form_data.append('actions_file', actions_file);

	                $.ajax({
	                    url: '<?php echo base_url(); ?>excel-upload/entry', // point to server-side controller method
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
	                    		alert('Same File name is found ');
	                    	}else{
	                    		alert('Something went wrong Please check internet connection ');
	                    	}
	                        // $('#msg').html(response); // display success response from the server
	                    }
	                    // error: function (response) {
	                    //     $('#msg').html(response); // display error response from the server
	                    // }
	                });
	            }else{
	            	alert('Please Attachment Some file click on upload');
	            }
	        }else{
	        	alert('Please Select Project ');	
	        }
	    }else{
	    	 alert('No File Attached');
	    }

    });

	// $('#import_form').on('submit', function(event){
	// 	event.preventDefault();
	// 	$.ajax({
	// 		url:"<?php echo base_url(); ?>excel-upload/entry",
	// 		method:"POST",
	// 		data:new FormData(this),
	// 		contentType:false,
	// 		cache:false,
	// 		processData:false,
	// 		success:function(data){
	// 			$('#job_files').val('');
	// 			load_data();
	// 			alert(data);
	// 		}
	// 	})
	// });

});
function load_data(){
	var actions_file='bu_Views';
    var Mr_no = $('#job_code').val();
    queryString_id = 'actions_file='+actions_file+'&job_code='+ Mr_no;
	    if(Mr_no!=""){
	    	$('#sub').show();
			// jQuery.ajax({
			// 	url: "<?php echo base_url(); ?>file-upload-data",
			// 	data:queryString_id,
			// 	type: "POST",
			// 	success:function(data){
			// 		$("#cart-item-files").html(data);
			// 	}
			// });
			$.ajax({
				url:"<?php echo base_url(); ?>excel-upload/entry",
				data:queryString_id,
				method:"POST",
				success:function(data){
					$('#customer_data').html(data);
				}
			});
		}else{
			alert('Please Select Project');	
		}
	}
	function ConfirmDialog(message){
		// alert(message);
		var actions_file='delete';
		var strArray = message.split("/");
		queryString_id = 'actions_file='+actions_file+'&pr_slno='+ strArray[0];
    	$('<div></div>').appendTo('body')
                    .html('<div><h6>Do You Want Delete this Pr no :- '+strArray[1]+' ?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
					            $.ajax({
									url:"<?php echo base_url(); ?>pr-not-release-changes",
									data:queryString_id,
									method:"POST",
									success:function(data){
										if(data==1){
											alert('success delete of Pr no :- '+strArray[1]+' ?')
											load_data();
										}else{
											alert('Fail to delete Pr no :- '+strArray[1]+' ?')
										}
										// $('#customer_data').html(data);
									}
								});
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();
																
                                // $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                                
                                $(this).dialog("close");
                            },
                            No: function () {   
								// $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
                                                        $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
    };
    function in_active_hold(message){
		// alert(message);
		var actions_file='hold_prs';
		var strArray = message.split("/");
		queryString_id = 'actions_file='+actions_file+'&pr_slno='+ strArray[0];

            $.ajax({
				url:"<?php echo base_url(); ?>pr-not-release-changes",
				data:queryString_id,
				method:"POST",
				success:function(data){
					if(data==1){
						alert('Hold of Pr no :- '+strArray[1]+' .')
						load_data();
					}else{
						alert('Fail to Hold on Pr no :- '+strArray[1]+'. ')
					}
					// $('#customer_data').html(data);
				}
			});
                         
    };
    function in_active(message){
		// alert(message);
		var actions_file='active_prs';
		var strArray = message.split("/");
		queryString_id = 'actions_file='+actions_file+'&pr_slno='+ strArray[0];
    	
                    
					            $.ajax({
									url:"<?php echo base_url(); ?>pr-not-release-changes",
									data:queryString_id,
									method:"POST",
									success:function(data){
										if(data==1){
											alert('Active of Pr no :- '+strArray[1]+' .')
											load_data();
										}else{
											alert('Fail to Active Pr no :- '+strArray[1]+' .')
										}
										// $('#customer_data').html(data);
									}
								});
                                
    };
</script>
