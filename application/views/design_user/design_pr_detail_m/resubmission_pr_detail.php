<?php 
echo $email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('design-logout-by-pass');
}
// if(isset($_SESSION['cart_item'])){
	
// 	// redirect('user-design-home');
// }else{
// 	redirect('user-design-home');
// }
$pr_no=$Pr_no;
$slno_pr=$Pr_no_slno;
$job_code=$Project_slno; //Project_Slno
$data_process = array('pr_no' => $pr_no);
$result_table_process=$this->db->get_where('master_pr_process_detail',$data_process)->result();

$data_table=array('pr_no'=>$pr_no,'mr_forword_status'=>0);
$query_data=$this->db->get_where('master_mr_job_details_m',$data_table);
if($query_data->num_rows()!=1){
	$this->session->set_flashdata('error_message', ' Something went wrong ');
	redirect('user-design-home');
	exit();
}
$result_table=$query_data->result();
	$this->db->select('*');
	$this->db->from('master_project');
	$this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	$this->db->where('assign_project_user.email_id', $email_id); 	
	$this->db->where('master_project.Project_Slno', $job_code); 	
	$query_bu = $this->db->get();

	$this->db->distinct();
	$this->db->select('category_name');
	$this->db->where('status', '1'); 
	$query_category = $this->db->get('master_category_item');
	// $this->db->select('*');
	// $this->db->from('master_project');
	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
	// $this->db->where('assign_project_user.email_id', $email_id); 	
	// $this->db->where('master_project.Project_Slno', $job_code); 	
	// $query_bu = $this->db->get();

	// $this->db->distinct();
	// $this->db->select('category_name');
	// $this->db->where('status', '1'); 
	// $query_category = $this->db->get('master_category_item');
	// exit;
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
				<li class="breadcrumb-item active">Resubmission of PR Request</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Resubmission of PR Request</h1>
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
					<h4 class="panel-title">Add PR Informations</h4>
				</div>
				<div class="panel-body">
					
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="<?=base_url()?>design-add-new-pr-save" method="POST" >
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
										<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="resubmission_pr_type" required="" readonly>
										<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="<?=$edit_id=$result_table[0]->edit_id+1?>" required="" readonly>
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
										 
										<select name="tech_evalution" class="form-control m-b-5" id="tech_evalution">
											<option value="2" <?php if($result_table[0]->techinal_evalution==2){echo "selected";} ?>>No</option>
											<option value="1" <?php if($result_table[0]->techinal_evalution==1){echo "selected";} ?>>Yes</option>
										</select>
										<small class="f-s-12 text-grey-darker">Select Technical Evaluation</small>
									</div>
								</div>

								<input class="form-control m-b-5 datepickers" placeholder="Enter Date Required " name="required_date" id="required_date" type="hidden" required="" value="<?=$result_table[0]->date_required?>">
								<!-- <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="required_date">Date Required <span style="color: red">*</span></label>
									<div class="col-md-9">
										
										
										<small class="f-s-12 text-grey-darker">Please enter Date Required</small>
									</div>
								</div> -->
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="date_clearfication_bid">Planned Technical Date <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5 datepickers" placeholder="Enter Planned Technical Date" name="planned_technical_clearance_date" id="planned_technical_clearance_date" type="text" required="" value="<?=$result_table_process[0]->planned_technical_clearance_date?>">
										<small class="f-s-12 text-grey-darker">Please Select Planned Technical Date</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Remarks<span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control" rows="3" name="Remark" required=""></textarea>
										<small class="f-s-12 text-grey-darker"> Please enter Remarks To Approver </small>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="approver_id">Approver Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<select name="approver_id" class="form-control m-b-5" id="approver_id">
										<?php
										$data_array_approver=$this->design_user->get_design_approver_list();	
											
											if($data_array_approver['no_user']==2){?>
												<option value="">--No Approver Is found--</option>
												<?php
											}else if($data_array_approver['no_user']==1){
												?>
												
											<?php
												foreach ($data_array_approver['user_approver'] as $key_approver) {
												 if($result_table[0]->approver_id_slno==$key_approver->slno){
													echo "<option value='".$key_approver->slno."'>".$key_approver->Username." [ ".$key_approver->email_id." ]</option>";
				
													}
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
										
										<select name="materials_id" onchange="set_ccategory()" class="form-control m-b-5" id="materials_id">
											
												<option value="">--Select Material Category--</option>
											<?php
												foreach ($query_category->result() as $value_category) {
													?>
				<option value="<?=$value_category->category_name?>" <?php if($result_table[0]->material_category_name==$value_category->category_name){echo "selected";} ?>><?=ucfirst($value_category->category_name)?></option>
													<?php
												}
											
												
											
											?>										
											
										</select>
										<small class="f-s-12 text-grey-darker">Select Job Code</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="mr_date_of_creation">Date Of Creating<span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control-plaintext m-b-5" name="mr_date_of_creation"  id="mr_date_of_creation" type="text" required=""  value="<?=$result_table[0]->date_creation?>">


										<small class="f-s-12 text-grey-darker">Date Of Creating PR</small>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="job_code">Attach Files <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter  File Title Name" name="job_files_name" id="job_files_name" type="text"  >
										<input class=" m-b-5" placeholder="Enter Activity name" name="job_files" id="job_files" type="file"  >	<span class="btn btn-sm btn-info" id="sub">Upload</span>	<br>								
										<!-- <small class="f-s-12 text-grey-darker">Job Attachment</small> -->
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
							<div class="col-md-6 col-lg-6">
											
								 <input type="button" id="search_button" value="Search"> || <a  href="<?=base_url()?>design-user-add-new-material" class="btn btn-sm btn-default" onclick="new_material_Popup(this.href,'myWindow','900','600','yes');return false">Add New Material</a>
							</div>
							



						 </div>
						 <div class="row">
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
                               <!--  <button type="submit" class="btn btn-sm btn-primary m-r-5" >Next</button> -->
                               <!-- <input type="submit" name="submission" value="Save" class="btn btn-success btn-sm"> -->
                               <!--<input type="submit" name="submission" value="Send" class="btn btn-info btn-sm">-->
                                <input type="submit" name="submission" value="Send" class="btn btn-info btn-sm">
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

function set_ccategory(){
	var materials_id = $('#materials_id').val().trim();
	$.ajax({
		url: '<?=base_url()?>design-material-search-reset',
        method: 'post',
        data: {
            
            type: materials_id
        },
        success: function(returnData){
        	if(returnData==1){
        	check_load_cart();
        		$("#cart-item").html('');
        	}
        }
	});
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
	            url: '<?=base_url()?>design-material-search-get',
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
	            url: '<?=base_url()?>design-material-search-get',
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

 	function cartAction(action,item_codes_order,value='') {

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
	url: "<?=base_url()?>ajax-cart-new-services",
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
 $(document).ready(function (e) {
 	check_load_cart();
   		file_uploaded();
   		view_cart_items();
        $('#sub').on('click', function () {
        	var actions_file='files_uploaded_details';
        	var pr_no = $('#pr_no').val();
			var slno_pr = $('#slno_pr').val();
			var job_code = $('#job_code').val();
			var edit_type = $('#edit_type').val();
			// var edit_type = $('#edit_type').val();
			var job_files_name = $('#job_files_name').val();
            var file_data = $('#job_files').prop('files')[0];
            if(file_data!=""){
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('pr_no', pr_no);
          		form_data.append('slno_pr', slno_pr);
          		form_data.append('job_code', job_code);
          		form_data.append('edit_type', edit_type);
          		form_data.append('job_files_name', job_files_name);
          		form_data.append('actions_file', actions_file);

                $.ajax({
                    url: '<?php echo base_url(); ?>design-file-upload-data', // point to server-side controller method
                    dataType: 'text', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                    	if(response==1){
                    		file_uploaded();
                    		alert('File Is successfully attached ');
                    		 
                    	}else if(response==2){
                    		alert('Same File name is found ');
                    	}else{
                    		alert('Something went wrong please check internet connection ');
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

        });
    });

 	function file_uploaded(){
		var actions_file='files_info';
    	var pr_no = $('#pr_no').val();
		var slno_pr = $('#slno_pr').val();
		var job_code = $('#job_code').val();
		queryString_id = 'actions_file='+actions_file+'&pr_no='+ pr_no+'&slno_pr='+slno_pr+'&job_code='+job_code;

		jQuery.ajax({
			url: "<?php echo base_url(); ?>design-file-upload-data",
			data:queryString_id,
			type: "POST",
			success:function(data){
				$("#cart-item-files").html(data);
			}
		});

	}
	// pr_no
// slno_pr
// job_code
// edit_type
// job_files_name
	function file_delete(id) {
		var actions_file='files_info_delete';
    	var pr_no = $('#pr_no').val();
		var slno_pr = $('#slno_pr').val();
		var job_code = $('#job_code').val();
		queryString_id = 'actions_file='+actions_file+'&pr_no='+ pr_no+'&slno_pr='+slno_pr+'&file_id='+id+'&job_code='+job_code;

		jQuery.ajax({
			url: "<?php echo base_url(); ?>design-file-upload-data",
			data:queryString_id,
			type: "POST",
			success:function(data){
				if(data){
					file_uploaded();
                    alert('Successfull attach file is deleted ');	
				}else{
					file_uploaded();
                    alert('Unable attached file deleted');
				}
			}
		});
		// body...
	}
 	var popupWindow = null;
function new_material_Popup(url,winName,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
function view_cart_items(){
	var pr_no = $('#pr_no').val();
	var edit_type = <?=$result_table[0]->edit_id?>;
	var queryString = "";

		queryString = 'pr_no='+ pr_no+'&edit_type='+edit_type;
	jQuery.ajax({
	url: "<?=base_url()?>design-user-new-resubmission-cart",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);
		check_load_cart();
		
	},
	// error:function (){}
	});	

}

</script>
				
