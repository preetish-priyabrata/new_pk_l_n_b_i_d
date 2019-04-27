<?php 
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){
	
	redirect('vendor-logout-pass');
}
$comm_vendor_slno=$value;
// 
$query_vendor=$this->db->get_where('master_bid_Com_vendor_m',array('slno_vendor'=>$comm_vendor_slno,'vendor_id'=>$Vendor_email_id));
$result_ven=$query_vendor->result();
if($query_vendor->num_rows()==0){
    redirect('seller/user-vendor-home');
}
$rows_ven=$result_ven[0];

$bid_ref=$rows_ven->bid_ref;
$slno_vendor_id_master=$rows_ven->slno_vendor_id_master;
$bid_id=$rows_ven->bid_id;
$pr_no=$rows_ven->pr_no;
$commercial_resubmit_count=$rows_ven->commercial_resubmit_count;
$master_bid_id=$rows_ven->master_bid_id;
// 

?>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Vendor Upload Term and Conditon Agreement</h1>
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

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Attach Term & Conditon</h4>
				</div>
				<div class="panel-body">
                <form  action="<?=base_url()?>seller/vendor-bid-term-attach-files" method="post" enctype='multipart/form-data'>
	            <div class="row">
                    
								<div class="col-md-12 col-lg-12">

									<h4 class="panel-title ">Title Bid  : <h5><?=$rows_ven->title?>	</h5></h4>
									
									<hr style="height: 2px; background:  green">
								</div>
							</div>



							<div class="row">
	            	<div class="col-lg-2">
	              	    <div class="form-group row m-b-15">
			     					<label class="col-form-label col-md-5" for="title">Attach File  <span style="color: red">* (only Pdf file)</span></label>
									</div>
								</div>
						 		<div class="col-lg-6">
									<input type="hidden" name='bid_ref' value="<?=$bid_ref?>">
                                    <input type="hidden" name="slno_vendor_id_master" value="<?=$slno_vendor_id_master?>"	>
                                    <input type="hidden" name='bid_id' value="<?=$bid_id?>">
                                    <input type="hidden" name="pr_no" value="<?=$pr_no?>"	>
                                    <input type="hidden" name='commercial_resubmit_count' value="<?=$commercial_resubmit_count?>">
                                    <input type="hidden" name="comm_vendor_slno" value="<?=$comm_vendor_slno?>"	>
                                    <input type="hidden" name="master_bid_id" value="<?=$master_bid_id?>"	>

									<input type="file" name="term_file" required accept="application/pdf">
								</div>
								<div class="col-lg-1">
									 <button type="submit" class="btn btn-default">Submit</button>
								</div>
				      </div>
						</form>


                </div>
			</div>
			