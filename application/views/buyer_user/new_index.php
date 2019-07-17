<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
$commercial_query=$technical_query=0;
$data_check=array('buyer_user_id'=>$email_id,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1,'buyer_user_status'=>2);
$query_check=$this->db->get_where('master_pr_process_detail',$data_check);

$data_check1=array('buyer_user_id'=>$email_id,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1);
$query_check1=$this->db->get_where('master_pr_process_detail',$data_check1);
foreach($query_check1->result() as $info_id):
	$pr_no=$info_id->pr_no;
	$techincal_query_info=$this->db->get_where('master_bid_query_tech_m',array('pr_no'=>$pr_no,'status_responds'=>0));
	$tech_count=$techincal_query_info->num_rows();
	$technical_query=$technical_query+$tech_count;

	$commerical_query_info=$this->db->get_where('master_bid_query_comm_m',array('pr_no'=>$pr_no,'status_responds'=>0));
	$comm_count=$commerical_query_info->num_rows();
	$commercial_query=$commercial_query+$comm_count;

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
			<h1 class="page-header">DashBoard</h1>
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
						<div class="stats-title">Pending PRs </div>
						<div class="stats-number"><?=$query_check->num_rows()?></div>
						
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="widget widget-stats bg-gradient-lime m-b-10">
					<div class="stats-icon stats-icon-lg"><i class="fa fa-question-circle fa-fw"></i></div>
					<div class="stats-content">
						<div class="stats-title">Pending Technical Query </div>
						<div class="stats-number"><?=$technical_query?></div>
						
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="widget widget-stats bg-gradient-green m-b-10">
					<div class="stats-icon stats-icon-lg"><i class="fa fa-question-circle fa-fw"></i></div>
					<div class="stats-content">
						<div class="stats-title">Pending commercial Query </div>
						<div class="stats-number"><?=$commercial_query?></div>
						
					</div>
				</div>
			</div>

			 </div>
		</div>
		<!-- end #content -->