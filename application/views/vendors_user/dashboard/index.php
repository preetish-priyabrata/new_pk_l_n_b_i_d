<?php 
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){
	
	redirect('vendor-logout-pass');
}
// master_bid_vendor_m
//  ongoing project 
$data_view = array('vendor_id' => $Vendor_email_id,'status'=>1,'status_active'=>1);
$quety_on_goin=$this->db->get_where('master_bid_vendor_m',$data_view);
$quety_on_going_comm=$this->db->get_where('master_bid_Com_vendor_m',$data_view);

$data_view_new= array('vendor_id' => $Vendor_email_id,'status'=>1,'status_view'=>5,'status_active'=>1);
$quety_on_goin_new=$this->db->get_where('master_bid_vendor_m',$data_view_new);

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
			<h1 class="page-header">Vendor DashBoard</h1>
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

			 <div class="row">
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-indigo">
						<div class="stats-icon">
							<i class="fas fa-file"></i>
							<!-- <i class="fa fa-desktop"></i> -->
						</div>
						<div class="stats-info">
							<h4>Technical Bid ongoing </h4>
							<p><?=$quety_on_goin->num_rows()?></p>	
						</div>
						<div class="stats-link">
							<a href="<?=base_url()?>seller/user-vendor-bid-new-technical">View Detail 
						

								<i class="fa fa-arrow-alt-circle-right"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon">
							<i class="fas fa-file"></i>
							<!-- <i class="fa fa-desktop"></i> -->
						</div>
						<div class="stats-info">
							<h4>New Technical Bid </h4>
							<p><?=$quety_on_goin_new->num_rows()?></p>	
						</div>
						<div class="stats-link">
							<a href="<?=base_url()?>seller/user-vendor-bid-new-technical">View Detail 
							

								<i class="fa fa-arrow-alt-circle-right"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon">
							<i class="fas fa-file"></i>
							<!-- <i class="fa fa-desktop"></i> -->
						</div>
						<div class="stats-info">
							<h4>Commerical Bid ongoing </h4>
							<p><?=$quety_on_going_comm->num_rows()?></p>	
						</div>
						<div class="stats-link">
							<a href="<?=base_url()?>seller/user-vendor-bid-new-commerical">View Detail 

								<i class="fa fa-arrow-alt-circle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<!-- end #content -->