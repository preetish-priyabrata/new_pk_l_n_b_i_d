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
				<li class="breadcrumb-item active">View Completed Bids</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">View Completed Bids
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
                      <th>Project Name</th>
                      <th>Bid Ref</th>
                      <th>Bid Id</th>
                      <!-- <th>Bid Publish Date</th> -->
                      <th>View</th>
                      
                    </tr>
                </thead>
                <tbody>
					<?php					
					 	$data_check=array('approver_user_status'=>1,'design_user_status'=>1,'commercial_complete_status'=>1);
						$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
						foreach($query_check->result() as $key_comm_id =>$value_comm_id):
							$comm_list=unserialize($value_comm_id->commercial_user_id_array);						
							if (in_array($email_id, $comm_list)){
								$commercial_type_bid=$value_comm_id->commercial_type_bid;
					 			
									$comm_bid=$value_comm_id->comm_bid;
									$job_code=$value_comm_id->project_slno;
									$query_project=$this->db->get_where('master_project',array('Project_Slno'=>$job_code));
									$result_project=$query_project->result();
									$project_name=ucwords($result_project[0]->Project_Name);
									$commercial_bid_ref=$value_comm_id->commercial_bid_ref;
									$commercial_bid_id=$value_comm_id->commercial_bid_id;

									// $commercial_bid_ref=$value_comm_id->commercial_bid_ref;
							 	// 	$commercial_bid_id=$value_comm_id->commercial_bid_id;
							 		
							 		$design_user_status=$value_comm_id->commercial_complete_status;
							 		$comm_bid_db=$comm_bid=$value_comm_id->comm_bid;
							 		$commercial_edit_id=$value_comm_id->commercial_edit_id;
							 		$commercial_resubmit_count=$value_comm_id->commercial_resubmit_count;
							 		$commercial_type_bid=$value_comm_id->commercial_type_bid;

							 		switch ($commercial_type_bid) {
							            case 'Closed Bid':
							                $last_otp_id=$type_bid='2';
							                break;
							            case 'Simple Bid':
							                 $last_otp_id=$type_bid='1';
							                break;
							            case 'Rank Order Bid':
							                 $last_otp_id=$type_bid='3';
							                break;
							        }
							        $pr_no=$value_comm_id->pr_no;
									$url='<a href="'.base_url().'commerical-otp-verification-success-view-pr/'.$type_bid.'/'.$last_otp_id.'/'.$pr_no.'/'.$commercial_bid_ref.'/'.$commercial_bid_id.'/'.$comm_bid_db.'/'.$commercial_edit_id.'/'.$commercial_resubmit_count.'/'.$commercial_type_bid.'"
					 			>Click to view</a>';
								
									echo '
									<tr>
										<td>'.$value_comm_id->pr_no.'</td>
										<td>'.$project_name.'</td>
										<td>'.$commercial_bid_ref.'</td>
										<td>'.$commercial_bid_id.'</td>
										
									
										<td>'.$url.'</td>
									</tr>
									';

								
							}
						endforeach;
						?>
						</tbody>
				</table>
					<!-- table -->

				</div>
			</div>
					 	

					        		        
					    
					