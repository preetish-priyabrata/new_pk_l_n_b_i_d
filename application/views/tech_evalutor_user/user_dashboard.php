<?php 
$email_id=$technical_email_id=$this->session->userdata('technical_email_id');
if(empty($technical_email_id)){
	
	redirect('tech-evalutor-logout-by-pass');
}
$technical_query=$x=0;
$data_check=array('approver_user_status'=>1,'design_user_status'=>1,'technical_user_status'=>2,'type_bidding_technical'=>1);
$this->db->order_by('design_date','Asc');
$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
foreach($query_check->result() as $key_comm_id =>$value_comm_id):
	$pr_no=$value_comm_id->pr_no;
	$comm_list=(unserialize($value_comm_id->tech_user_id_array));	
	if(in_array($email_id,$comm_list,TRUE)){
		
		$techincal_query_info=$this->db->get_where('master_bid_query_tech_m',array('pr_no'=>$pr_no,'status_responds'=>0));
		$tech_count=$techincal_query_info->num_rows();
		$technical_query=$technical_query+$tech_count;	
		$x++;
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
			<!-- <h1 class="page-header">Page with Transparent Sidebar <small>header small text goes here...</small></h1> -->
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
							<div class="stats-title">Pending Bid <br>To Be Approved</div>
							<div class="stats-number"><?=$x?></div>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4">
				<div class="widget widget-stats bg-gradient-lime m-b-10">
					<div class="stats-icon stats-icon-lg"><i class="fa fa-question-circle fa-fw"></i></div>
					<div class="stats-content">
						<div class="stats-title">Pending Technical <br>Query </div>
						<div class="stats-number"><?=$technical_query?></div>
						
					</div>
				</div>
			</div>
			</div>

		</div>
		<!-- end #content -->