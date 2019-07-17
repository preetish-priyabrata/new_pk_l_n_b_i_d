<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$slno_value=$slno_id;
$query_check=$this->db->get_where('master_pr_schedule',array('slno'=>$slno_value,'status_bu_used'=>0,'mr_status'=>0));
if($query_check->num_rows()==1){
    $table_pr_sch=$query_check->result();
    $row=$table_pr_sch[0];

}else{
    $this->session->set_flashdata('error_message',' PR Schedule is already been used !!!');
    // After that you need to used redirect home
    redirect('user-bu-home'); 
}
?>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Transparent Sidebar</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Edit PR Schedule  <small></small></h1>
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
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Edit Form For PR Schedule</h4>
				</div>
				<div class="panel-body">
                    <div class="alert alert-secondary">
                        <span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                    </div>
                    <form action="<?=base_url()?>bu-pr-schedule-edit-save" method="POST" >
                    <input class="form-control m-b-5" placeholder="Enter Discipline" name="slno_ids" id="slno_ids" type="hidden" value="<?=$row->slno?>" required="">
						<div class="row">
							<div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="discipline">Discipline <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Discipline" name="discipline" id="discipline" type="text" value="<?=$row->discipline?>" required="">
										<small class="f-s-12 text-grey-darker">Here enter Discipline </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="pr_no">PR No <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter PR No" name="pr_no" id="pr_no" type="text" required="" value="<?=$row->pr_no?>" readonly>
										<small class="f-s-12 text-grey-darker">Here enter PR No </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Area">Area</label>
									<div class="col-md-9">
                                        <textarea class="form-control m-b-5" rows="5"  name="area" id="area"><?=$row->area?></textarea>
									
										<small class="f-s-12 text-grey-darker">Here enter Area </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="UOM">UOM <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter UOM" name="UOM" id="UOM" type="text" value="<?=$row->UOM?>" required="">
										<small class="f-s-12 text-grey-darker">Here enter UOM </small>
									</div>
                                </div>
								
							</div>
							<div class="col-md-6 col-lg-6">
                            <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="item">Item Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Item Name" name="item" id="item" value="<?=$row->item?>" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Item Name </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="quantity">Quantity <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5" placeholder="Enter Quantity" name="quantity" id="quantity" type="text" value="<?=$row->quantity?>" required="">
										<small class="f-s-12 text-grey-darker">Here enter Quantity </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="original_schedule">Pr Original Schedule <span style="color: red">*</span></label>
									<div class="col-md-9">
                                   
										<input class="form-control m-b-5 datepickers" placeholder="Enter Pr Original Schedule" name="original_schedule" id="original_schedule"  value="<?=$row->original_schedule?>" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Pr Original Schedule </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="revised_schedule">Pr Revised Schedule </label>
									<div class="col-md-9">
                                  
										<input class="form-control m-b-5 datepickers" placeholder="Enter Pr Revised Schedule" name="revised_schedule" id="revised_schedule" value="<?=$row->revised_schedule?>" type="text" >
										<small class="f-s-12 text-grey-darker">Here enter Pr Revised Schedule </small>
									</div>
                                </div>
                                <div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="scheduled_order">Pr ordering Scheduled Date  <span style="color: red">*</span></label>
									<div class="col-md-9">
                                    
										<input class="form-control m-b-5 datepickers" placeholder="Enter Pr ordering Scheduled Date " name="scheduled_order" id="scheduled_order" value="<?=$row->scheduled_order?>" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter Pr ordering Scheduled Date  </small>
									</div>
                                </div>
							</div>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
                                <a  href="user-admin-home" class="btn btn-sm btn-default">Cancel</a> 
                            </div>
                        </div>
						
						
					</form>

					
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->