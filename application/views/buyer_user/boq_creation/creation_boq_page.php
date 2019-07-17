<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
$back_url_path=$information_transfer['back_url_path'];// back path to go saving url
	$back_url_path_id=$information_transfer['back_url_path_id'];// back path to go saving url
	$pr_no=$information_transfer['pr_no'];
	$slno_pr=$information_transfer['slno_pr'];
	$job_code=$information_transfer['job_code'];
	$pr_no_type=$information_transfer['pr_no_type'];
	$edit_type=$information_transfer['edit_type'];
	$commercial_edit_id=$information_transfer['commercial_edit_id'];
	$commercial_resubmit_count=$information_transfer['commercial_resubmit_count'];
	$commercial_resubmit_status=$information_transfer['commercial_resubmit_status'];
	$tech_evalution=$information_transfer['tech_evalution'];
	$tcomm_evalution_commer=$information_transfer['tcomm_evalution_commer'];
	$edit_Item=$information_transfer['edit_Item'];
// $pr_no=$pr_no;
// $slno_pr=$slno_pr;
// $job_code=$job_code; //Project_Slno
	$this->db->select('*');
	$this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	$this->db->where('master_project.Project_Slno', $job_code); 	
	$query_bu = $this->db->get();

	$this->db->distinct();
	$this->db->select('category_name');
	$this->db->where('status', '1'); 
	$query_category = $this->db->get('master_category');
	$url_remark='<a target="_blank" class="btn btn-sm btn-success" href="'.base_url().'design-pr-remark-history/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/1"> Click View Remark</a>';
	$query_master_category = $this->db->get('master_category');
?>
<!-- <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" /> -->
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">PR Requisition</a></li>
				<li class="breadcrumb-item active">Create New PR</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Create New PR Requisition </h1>
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
			<div class="alert alert-warning fade show">
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
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">New PR Requisition Information</h4>
				</div>
				<div class="panel-body">				
					<div class="row pull-right">
							<div class="col-md-12">  
								<form action="<?=base_url()?>buyer-bulk-pr-entry-new-information" method="POST">
									<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="hidden" value="<?=$pr_no?>" required="" readonly>
									<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
									<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
									<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
									<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="1" required="" readonly>

									<input type="hidden" name="back_url_path" value="<?=$back_url_path?>" required>
									<input type="hidden" name="back_url_path_id" value="<?=$back_url_path_id?>" required>
									<input type="hidden" name="pr_no_id" value="<?=$pr_no?>" required>
									<input type="hidden" name="slno_pr_id" value="<?=$slno_pr?>" required>
									<input type="hidden" name="job_code_id" value="<?=$job_code?>" required>
									<input type="hidden" name="pr_no_type" value="<?=$pr_no_type?>" required>
									<input type="hidden" name="edit_type_id" value="<?=$edit_type?>" required>
									<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>" required>
									<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>" required>
									<input type="hidden" name="commercial_resubmit_status" value="<?=$commercial_resubmit_status?>" required>
									<input type="hidden" name="tech_evalution" value="<?=$tech_evalution?>" required>
									<input type="hidden" name="tcomm_evalution_commer" value="<?=$tcomm_evalution_commer?>" required>
									<input type="hidden" name="edit_Item" value="<?=$edit_Item?>" required>
									<input type="submit" name="edit_Item" value="BulK Entry BOQ" class="btn btn-success btn-sm">

								</form>
								<br>
							<!-- <?=$url_remark?> -->
							</div>
					</div>
					<br>
					<br>
					<form action="<?=base_url()?>buyer-add-new-pr-save" method="POST" >
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">PR No. <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$get_mr_id=$this->design_user->get_design_mr_no();	

										?>
										<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="text" value="<?=$pr_no?>" required="" readonly>
										<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
										<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
										<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
										<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="1" required="" readonly>

										<input type="hidden" name="back_url_path" value="<?=$back_url_path?>" required>
										<input type="hidden" name="back_url_path_id" value="<?=$back_url_path_id?>" required>
										<input type="hidden" name="pr_no_id" value="<?=$pr_no?>" required>
										<input type="hidden" name="slno_pr_id" value="<?=$slno_pr?>" required>
										<input type="hidden" name="job_code_id" value="<?=$job_code?>" required>
										<input type="hidden" name="pr_no_type" value="<?=$pr_no_type?>" required>
										<input type="hidden" name="edit_type_id" value="<?=$edit_type?>" required>
										<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>" required>
										<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>" required>
										<input type="hidden" name="commercial_resubmit_status" value="<?=$commercial_resubmit_status?>" required>
										<input type="hidden" name="tech_evalution" value="<?=$tech_evalution?>" required>
										<input type="hidden" name="tcomm_evalution_commer" value="<?=$tcomm_evalution_commer?>" required>
										<input type="hidden" name="edit_Item" value="<?=$edit_Item?>" required>
										<small class="f-s-12 text-grey-darker">PR No.</small>
									</div>
								</div>
							 	

							</div>
							
							<div class="col-md-6 col-lg-6">
							
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="materials_id">Material Category <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_materials=$this->design_user->get_design_material_category_list();	
										
										?>
										<select name="materials_id" onchange="set_ccategory()" class="form-control m-b-5" id="materials_id">
										<!-- <select name="materials_id" onchange="set_ccategory()" class="form-control m-b-5" id="materials_id"> -->
											
												<option value="">--Select Material Category--</option>
											<?php
												foreach ($query_master_category->result() as $value_category) {
													?>
													<option value="<?=$value_category->category_name?>"><?=ucfirst($value_category->category_name)?></option>
													<?php
												}
											
												
											
											?>										
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Material Category</small>
									</div>
								</div>
							
                                







							</div>
                 







						 </div>
						 <div class="row">
							<div class="col-lg-12">
								<div id="cart-item-files"></div>
							</div>
						</div>
						 <div class="row">
						 	<div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="mr_date_of_creation">Search Material<span style="color: red">*</span></label>
										<div class="col-md-9">
											<input type="text" class="form-control m-b-5" id="employee_name"><br>
											<small class="f-s-12 text-grey-darker">Search Material</small>
										</div>

                               
								</div>
								
                               
							</div>
							<!--<div class="col-md-6 col-lg-6">
											
								 <input type="button" id="search_button" value="Search"> || <a  href="<?=base_url()?>design-user-add-new-material" class="btn btn-sm btn-default" onclick="new_material_Popup(this.href,'myWindow','900','600','yes');return false">Add New Material</a>
							</div>-->
							 <div id="search_results" style="padding:5px;"></div>



						 </div>
						 <br>
						<hr>
						<div class="row">
							<div class="col-lg-12">
								<div id="cart-item"></div>
							</div>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                             
                               <input type="submit" name="submission" value="Save" class="btn btn-info btn-sm">
                              
                                <a  href="<?=base_url().$back_url_path_id?>" class="btn btn-sm btn-success">Back</a> 
                               <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-danger">Home</a>  
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
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

function set_ccategory(){
	check_load_cart();
	// var materials_id = $('#materials_id').val().trim();
	// $.ajax({
	// 	url: '<?=base_url()?>design-material-search-reset',
 //        method: 'post',
 //        data: {
            
 //            type: materials_id
 //        },
 //        success: function(returnData){
 //        	if(returnData==1){
 //        	check_load_cart();
 //        		$("#cart-item").html('');
 //        	}
 //        }
	// });
}
 $('#search_button').click(function(){
        //If the search button is clicked,
        //get the employee name that is being search for
        //from the search_box.
        var employee_name = $('#employee_name').val().trim();
        var materials_id = $('#materials_id').val().trim();
 		if(materials_id){
        //Carry out a GET Ajax request using JQuery
	        $.ajax({
	            //The URL of the PHP file that searches MySQL.
	            url: '<?=base_url()?>buyer-material-search-get',
	            method: 'post',
	            data: {
	                name: employee_name,
	                type: materials_id
	            },
	            success: function(returnData){
	            	$('#search_results').html(returnData);	             
	            }
	        });
	    }else{
	    	alert('Please Select Material Category');
	    }
    });
 function check_load_cart(){
 	 var employee_name = $('#employee_name').val().trim();
        var materials_id = $('#materials_id').val();
 		if(materials_id!=""){
        //Carry out a GET Ajax request using JQuery
	        $.ajax({
	            //The URL of the PHP file that searches MySQL.
	            url: '<?=base_url()?>buyer-material-search-get',
	            method: 'post',
	            data: {
	                name: employee_name,
	                type: materials_id
	            },
	            success: function(returnData){
	            	$('#search_results').html(returnData);
	              
	            }
	        });
	    }else{
	    	alert('Please Select Material Category');
	    }
 }

 	function cartAction(action,item_codes_order,value) {

var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
			var quantity=$("#qty_"+item_codes_order).val();
				queryString = 'action='+action+'&code='+ item_codes_order+'&quantity='+quantity;
				//+'&quantity='+$("#qty_"+item_codes_order).val()
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ item_codes_order+'&codes_value='+value;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
	jQuery.ajax({
	url: "<?=base_url()?>buyer-ajax-cart-new-services",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);
		check_load_cart();
		if(action != "") {
			switch(action) {
				case "add":
					$("#add_"+item_codes_order).hide();
					$("#added_"+item_codes_order).show();
				break;
				case "remove":
					$("#add_"+item_codes_order).show();
					$("#added_"+item_codes_order).hide();
				break;
				case "empty":
					$(".btnAddAction").show();
					$(".btnAdded").hide();
				break;
			}	 
		}
	},
	error:function (){}
	});	
}

</script>
				
