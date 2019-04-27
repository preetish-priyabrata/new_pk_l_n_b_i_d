<?php 
$commerical_email_id=$this->session->userdata('commerical_email_id');
if(empty($commerical_email_id)){
	
	redirect('comm-evalutor-logout-by-pass');
}
// 'type_bid'=>$value,'last_otp_id'=>$last_insert_id,'pr_no'=>$pr_no,'commercial_bid_ref'=>$commercial_bid_ref,'commercial_bid_id'=>$commercial_bid_id,'comm_bid_db'=>$comm_bid_db,'commercial_edit_id'=>$commercial_edit_id,'commercial_resubmit_count'=>$commercial_resubmit_count,'commercial_type_bid'=>$commercial_type_bid
$type_bid=$type_bid;

$last_otp_id=$last_otp_id;
$get_array= (explode("-",$last_otp_id));
$pr_no=$pr_no;
$commercial_bid_ref=$commercial_bid_ref;
$commercial_bid_id=$commercial_bid_id;
$comm_bid_db=$comm_bid_db;

$commercial_edit_id=$commercial_edit_id;
$commercial_resubmit_count=$commercial_resubmit_count;
$commercial_type_bid=$commercial_type_bid;

$data_check=array('pr_no'=>$pr_no,'approver_user_status'=>1,'design_user_status'=>1,'commercial_complete_status'=>2);
   $query_check=$this->db->get_where('master_pr_process_detail',$data_check);
   if($query_check->num_rows()!=1){
    redirect('comm-evalutor-logout-by-pass');
	 }
	 $comm_id=$query_check->result();

$url='<a href="'.base_url().'Commercila-otp-c-s-r-ongoing-bid-pr-notification-arra-vendor/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid.'" class="btn btn-sm btn-lime" title="" >Generate New OTP</a>';
?>

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
			<h1 class="page-header">OTP Verification </h1>
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
					<h4 class="panel-title">Please Enter Valid OTP Here</h4>
				</div>
				<div class="panel-body">
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandory fields shall be duly filled up 
                        	</div>
					<form action="<?=base_url()?>commerical-otp-verification-pr-array" method="POST" >
					<input  name="type_bid" id="type_bid" type="hidden" required="" value="<?=$type_bid?>" >
							<input  name="pr_no" id="pr_no" type="hidden" required="" value="<?=$pr_no?>" >
							<input  name="commercial_bid_ref" id="commercial_bid_ref" type="hidden" required="" value="<?=$commercial_bid_ref?>" >
							<input  name="commercial_bid_id" id="commercial_bid_id" type="hidden" required="" value="<?=$commercial_bid_id?>" >
							<input  name="comm_bid_db" id="comm_bid_db" type="hidden" required="" value="<?=$comm_bid_db?>" >
							<input  name="last_otp_id" id="last_otp_id" type="hidden" required="" value="<?=$last_otp_id?>" >

							<input  name="commercial_edit_id" id="commercial_edit_id" type="hidden" required="" value="<?=$commercial_edit_id?>" >
							<input  name="commercial_resubmit_count" id="commercial_resubmit_count" type="hidden" required="" value="<?=$commercial_resubmit_count?>" >
							<input  name="commercial_type_bid" id="commercial_type_bid" type="hidden" required="" value="<?=$commercial_type_bid?>" >
						<div class="row">
							<?php
							$x=0; 
							$data_array_approver_comm=$this->buyer_user->get_user_generic_list('1','0','0','10','','');	
							$comm_list=unserialize($comm_id[0]->commercial_user_id_array);  
							// foreach($comm_list as $key_comm_list =>$value_comm_list):
								foreach ($data_array_approver_comm['user_approver'] as $key_approver):
									if(in_array($key_approver->email_id, $comm_list)){
								?>
							<div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="OTP"><?=$key_approver->Username?>  <span style="color: red">*</span></label>
									<div class="col-md-9">
									<input class="form-control m-b-5" placeholder="Enter OTP" name="email_ids[<?=$get_array[$x]?>]"  type="hidden" value="<?=$key_approver->email_id?>" required="">
										<input class="form-control m-b-5" placeholder="Enter OTP" name="OTP[<?=$get_array[$x]?>]" id="OTP" type="text" required="">
										<small class="f-s-12 text-grey-darker">Here enter OTP</small>
									</div>
								</div>
								
							</div>

							<?php
							$x++;
									}
							endforeach;
							?>
							
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Verify</button>
                               
                               <!--  <a href="<?=base_url()?>generate-otp-bid-referecnce/<?=$type_bid?>/<?=$pr_no?>/<?=$commercial_bid_ref?>/<?=$commercial_bid_id?>/<?=$comm_bid_db?>" class="btn btn-sm btn-lime">Resend OTP</a> -->
                               <?=$url?>
                                <a  href="<?=base_url()?>user-commerical-evalutor-home" class="btn btn-sm btn-info">Home</a> 
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
		<script type="hidden/javascript">  
    $(function () {  
        $(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 116;  
        });  
    });  
</script> 