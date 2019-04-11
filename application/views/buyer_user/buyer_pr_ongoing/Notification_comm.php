<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
// 'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'commercial_edit_id'=>$commercial_edit_id,'comm_bid_db'=>$comm_bid_db,'commercial_resubmit_count'=>$commercial_resubmit_count

$Pr_no=$pr_no;
$commercial_bid_ref=$commercial_bid_ref;
$commercial_bid_id=$commercial_bid_id;
$commercial_edit_id=$commercial_edit_id;
$comm_bid_db=$comm_bid_db;
$commercial_resubmit_count=$commercial_resubmit_count;
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="user-buyer-home-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Notification </a></li>
				<li class="breadcrumb-item active">Notification </li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Notification Form For Commerical Bid </h1>
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
					<h4 class="panel-title">Commercial Notification To Vendor For technical bid </h4>
				</div>
				<div class="panel-body">
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					<form action="<?=base_url()?>buyer-notification-comm-save-info" method="POST" >
						<input type="hidden" value="<?=$Pr_no?>" name="Pr_no">
						<input type="hidden" value="<?=$commercial_bid_ref?>" name="commercial_bid_ref">
						<input type="hidden" value="<?=$commercial_bid_id?>" name="commercial_bid_id">
						<input type="hidden" value="<?=$commercial_edit_id?>" name="commercial_edit_id">
						<input type="hidden" value="<?=$comm_bid_db?>" name="comm_bid_db">
						<input type="hidden" value="<?=$commercial_resubmit_count?>" name="commercial_resubmit_count">
						

						<div class="row">
							<div class="col-md-12 col-lg-12">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="Technical_notification ">Commercial notification <span style="color: red">*</span></label>
									<div class="col-md-9">
										<textarea class="form-control" rows="3" name="Technical_notification " required=""></textarea>
										<small class="f-s-12 text-grey-darker">Here enter Commercial notification</small>
									</div>
								</div>
								
							</div>
							
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Send</button>
                                <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-default">Cancel</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
			
				
