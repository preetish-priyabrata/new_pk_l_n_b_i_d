<?php 
$email_id=$commerical_email_id=$this->session->userdata('commerical_email_id');
if(empty($commerical_email_id)){
	
	redirect('comm-evalutor-logout-by-pass');
}
$count_rank=$count_closeed=0;
$data_check=array('approver_user_status'=>1,'design_user_status'=>1,'commercial_complete_status'=>2);
$this->db->order_by('commercial_closure_date',"ASC");
	$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
foreach($query_check->result() as $key_comm_id =>$value_comm_id):
	$comm_list=unserialize($value_comm_id->commercial_user_id_array);						
	if (in_array($email_id, $comm_list)){
		$commercial_type_bid=$value_comm_id->commercial_type_bid;
		if($commercial_type_bid!='Rank Order Bid'){
			$count_closeed++;
		}
	}
endforeach;

$data_check_r=array('approver_user_status'=>1,'design_user_status'=>1,'commercial_complete_status'=>2 ,'rank_status'=>1);
$query_check_r=$this->db->get_where('master_pr_process_detail',$data_check_r);
foreach($query_check_r->result() as $key_comm_id_r =>$value_comm_id_r):
	$comm_list_r=unserialize($value_comm_id_r->commercial_user_id_array);						
	if (in_array($email_id, $comm_list_r)){
		$commercial_type_bid_r=$value_comm_id_r->commercial_type_bid;
		if($commercial_type_bid_r=='Rank Order Bid'){
			$count_rank++;
		}
	}
endforeach;
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
			<h1 class="page-header">DashBoard <small></small></h1>
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
				<div class="col-lg-4">
					<div class="widget widget-stats bg-gradient-purple m-b-10">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">Pending Bid (Closed order) <br>To Be Approved</div>
							<div class="stats-number"><?=$count_closeed?></div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="widget widget-stats bg-gradient-pink m-b-10">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">Pending Bid (Ranked order) <br>To Be Approved</div>
							<div class="stats-number"><?=$count_rank?></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end #content -->