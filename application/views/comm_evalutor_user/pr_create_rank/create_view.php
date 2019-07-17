<?php 
$email_id=$this->session->userdata('commerical_email_id');
if(empty($email_id)){
	
	redirect('commerical-evalutor-logout-by-pass');
}
	
	$query_design = $this->db->get('master_project');

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">View New Bids</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">View New Bids
			 <!-- <small>header small text goes here...</small> -->
			</h1>
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
			
			  <?php 
			// $send_button=$this->input->post('send_button');
			// if($send_button=="find"){
				$table="master_pr_schedule"; 
				$job_code=$this->input->post('job_code');
				$data_check = array('job_code' => $job_code,'status'=>1, 'mr_status'=>1);
                $query=$this->db->get_where($table,$data_check);
                    // echo  $this->db->last_query();
               
               
                // $output .= '</table>';
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> PR Schedule List </h4>
				</div>
				<div class="panel-body">

					<table id="example" class="display" style="width:100%">
						<thead>
                    <tr>
											<th>PR No</th>
											<th>Comment from Bu User</th>
											<th>PR Details</th>
                      <th>Project Name</th>
											<th>Bid Ref</th>
											<th>Date Of PRs Release</th>
											<th>Planned commercial closure date</th>
											<th>Technical clearance Status</th>
                     
                     
                      <th>View</th>
                      
                    </tr>
                </thead>
                <tbody>
					<?php					
					 	$data_check=array('approver_user_status'=>1,'design_user_status'=>1,'commercial_complete_status'=>2 ,'rank_status'=>1);
						$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
						foreach($query_check->result() as $key_comm_id =>$value_comm_id):
							$comm_list=unserialize($value_comm_id->commercial_user_id_array);						
							if (in_array($email_id, $comm_list)){
								$commercial_type_bid=$value_comm_id->commercial_type_bid;
					 			if($commercial_type_bid=='Rank Order Bid'){
									$comm_bid=$value_comm_id->comm_bid;
									$job_code=$value_comm_id->project_slno;
									$query_project=$this->db->get_where('master_project',array('Project_Slno'=>$job_code));
									$result_project=$query_project->result();
									$project_name=ucwords($result_project[0]->Project_Name);
									$commercial_bid_ref=$value_comm_id->commercial_bid_ref;

									$type_bidding_technical=$value_comm_id->type_bidding_technical;
									if($type_bidding_technical==1){
										$technical_user_status=$value_comm_id->technical_user_status;
										if($technical_user_status==1){
											$tech_evalution="Completed";
										}else{
											$tech_evalution="Pending";
										}
									}else{
										$tech_evalution="No Technical evalution";
									}
									$planned_date=date('d-m-Y',strtotime($value_comm_id->commercial_closure_date));
									$design_date=date('d-m-Y',strtotime($value_comm_id->design_date));
									$pr_no=$value_comm_id->pr_no;
									$pr_details_query=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no));
									$result_pr_details=$pr_details_query->result();
									$query_pr_item_SLNO=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no));
									$result_pr_item=$query_pr_item_SLNO->result();
									$comment=ucwords($result_pr_item[0]->comment);
 
									$url='<a href="'.base_url().'commerical-user-received-pr-info/'.$value_comm_id->pr_no.'/'.$value_comm_id->pr_no_slno.'/'.$value_comm_id->project_slno.'/2/'.$comm_bid.'" > Click to View</a>';
									echo '
									<tr>
										<td>'.$value_comm_id->pr_no.'</td>
										<td>'.$comment.'</td>
										<td>'.$result_pr_details[0]->item.'</td>
										<td>'.$project_name.'</td>
										<td>'.$commercial_bid_ref.'</td>
										<td>'.$design_date.'</td>
										<td>'.$planned_date.'</td>
										<td>'.$tech_evalution.'</td>
										
										
									
										<td>'.$url.'</td>
									</tr>
									';

								}
							}
						endforeach;
						?>
						</tbody>
				</table>
					<!-- table -->

				</div>
			</div>
					 	

					        		        
					    
					