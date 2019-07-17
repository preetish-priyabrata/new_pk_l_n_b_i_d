<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
$pr_no=$pr_no;
$slno_pr=$slno_pr;
$job_code=$job_code; //Project_Slno
	$this->db->select('*');
	$this->db->from('master_project');
	$this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	$this->db->where('assign_project_user.email_id', $email_id); 	
	$this->db->where('master_project.Project_Slno', $job_code); 	
	$query_bu = $this->db->get();

	$this->db->distinct();
	$this->db->select('category_name');
	$this->db->where('status', '1'); 
	$query_master_category = $this->db->get('master_category');
?>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">PR</a></li>
				<li class="breadcrumb-item active">Create New PR</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Create New PR </h1>
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

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Add New Material Requisition Information</h4>
				</div>
				<div class="panel-body">
					
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="design-add-new-mr-save" method="POST" >
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">PR No. <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$get_mr_id=$this->design_user->get_design_mr_no();	

										?>
										<input class="form-control m-b-5"  name="Mr_no" id="Mr_no" type="text" value="<?=$pr_no?>" required="" readonly>
										<small class="f-s-12 text-grey-darker">PR No.</small>
									</div>
								</div>
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="job_code">Job Code <span style="color: red">*</span></label>
									<div class="col-md-9">
										<!-- <input class="form-control m-b-5" placeholder="Enter Activity name" name="activity_name" id="activity_name" type="text" required=""> -->
										<select name="job_code" class="form-control m-b-5" id="job_code">
											<!-- <option value="">--Select Job Code--</option> -->
											<?php
												foreach ($query_bu->result() as $key_job_code) {

													echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
												}
											?>
										</select>
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="tech_evalution">Technical Evaluation <span style="color: red">*</span></label>
									<div class="col-md-9">
										<!-- <input class="form-control m-b-5" placeholder="Enter Activity name" name="activity_name" id="activity_name" type="text" required=""> -->
										<select name="tech_evalution" class="form-control m-b-5" id="tech_evalution">
											<option value="2">No</option>
											<option value="1">Yes</option>
										</select>
										<small class="f-s-12 text-grey-darker">Select Technical Evaluation</small>
									</div>
								</div>

								<!--<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Date Required <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 datepickers" placeholder="Enter Date Required " name="required_date" id="required_date" type="text" required="">
										<small class="f-s-12 text-grey-darker">Please enter Date Required</small>
									</div>
								 </div>--> 
								
                              


							</div>
							
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="approver_id">Approver Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_approver=$this->design_user->get_design_approver_list();	
											
										?>
										
										<select name="approver_id" class="form-control m-b-5" id="approver_id">
											<?php 
											if($data_array_approver['no_user']==2){?>
												<option value="">--No Approver Is found--</option>
												<?php
											}else if($data_array_approver['no_user']==1){
												?>
												<option value="">--Select Approver--</option>
											<?php
												foreach ($data_array_approver['user_approver'] as $key_approver) {
													echo "<option value='".$key_approver->slno."'>".$key_approver->Username." [ ".$key_approver->email_id." ]</option>";
												}
											
												
											}	
											?>										
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Approver </small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="materials_id">Material Category <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$data_array_materials=$this->design_user->get_design_material_category_list();	
										
										?>
										
										<select name="materials_id" class="form-control m-b-5" id="materials_id">
											
												<!--<option value="">--Select Material Category--</option>
											<?php
												foreach ($query_category->result() as $value_category) {
													?>
													<option value="<?=$value_category->category_name?>"><?=ucfirst($value_category->category_name)?></option>
													<?php
												}
											
												
											
											?>
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
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" name="mr_date_of_creation" value="<?=date('Y-m-d')?>" id="mr_date_of_creation" type="text" required="" readonly>
										<small class="f-s-12 text-grey-darker">Date Of Creating MR</small>
									</div>
								</div>









							</div>
                 







						 </div>
						 <div class="row">

							<table class="table table-bordered table-hover" id="invoiceTable">
								<thead>
									<tr>
										<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
										<th width="15%">Material Name</th>
										<th width="38%">Parameter</th>
										<th width="15%">UOM</th>
										<th width="15%">Quantity</th>
										<!-- <th width="15%">Total</th> -->
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><input class="case" type="checkbox"/></td>
										<td><input type="text" data-type="productCode" name="data[0]['product_id']" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="text" data-type="productName" name="data[0]['product_name']" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
										<td><input type="number" name="data[0]['price']" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<td><input type="number" name="data[0]['quantity']" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
										<!-- <td><input type="number" name="data[0]['total']" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td> -->
									</tr>
								</tbody>
							</table>
							<button type="button" class='delete btn btn-danger'>- Delete</button>
							<button type="button" class='addmore btn btn-success'>+ Add More</button>

						 </div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Next</button>
                               
                                <a  href="<?=base_url()?>user-design-home" class="btn btn-sm btn-danger">Cancel</a> 
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

var i=$('table#invoiceTable tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><input type="text" data-type="productCode" name="data['+i+'][product_id]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" data-type="productName" name="data['+i+'][product_name]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" name="data['+i+'][price]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="data['+i+'][quantity]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	// html += '<td><input type="text" name="data['+i+'][total]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '</tr>';
	$('table#invoiceTable').append(html);
	i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});
//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	if(type =='productCode' )autoTypeNo=0;
	if(type =='productName' )autoTypeNo=1; 	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		select: function( event, ui ) {
			var names = ui.item.data.split("|");						
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		element_id = id[id.length-1];
			$('#itemNo_'+element_id).val(names[0]);
			$('#itemName_'+element_id).val(names[1]);
			$('#quantity_'+element_id).val(1);
			$('#price_'+element_id).val(names[2]);
			$('#total_'+element_id).val( 1*names[2] );
			calculateTotal();
		}		      	
	});
});

 
</script>
				
