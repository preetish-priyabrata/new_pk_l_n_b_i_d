<?php 
$email_id=$this->session->userdata('technical_email_id');
if(empty($email_id)){
	
	redirect('tech-evalutor-logout-by-pass');
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
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-technical-evalutor-home" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">History Of Technical Bid</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">History Of Technical Bid
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
					<h4 class="panel-title"> History Of Technical Bid List </h4>
				</div>
				<div class="panel-body">

					<table id="example" class="display" style="width:100%">
						<thead>
                    <tr>
											<th>PR No</th>
											<th>Comment from Bu User</th>
											<th>Item Name</th>
                      <th>Project Name</th>
                      <th>Bid Ref</th>
                      
                      <th>Date of PR Release</th>
                      <th>View</th>
                      
                    </tr>
                </thead>
                <tbody>
					<?php					
					 	$data_check=array('approver_user_status'=>1,'design_user_status'=>1,'technical_user_status'=>1,'type_bidding_technical'=>1);
						 $this->db->order_by('design_date','Asc');
						 $query_check=$this->db->get_where('master_pr_process_detail',$data_check);
						foreach($query_check->result() as $key_comm_id =>$value_comm_id):
							$comm_list=unserialize($value_comm_id->tech_user_id_array);						
							if (in_array($email_id, $comm_list)){
								
									$tech_bid=$value_comm_id->tech_bid;
									$job_code=$value_comm_id->project_slno;
									$query_project=$this->db->get_where('master_project',array('Project_Slno'=>$job_code));
									$result_project=$query_project->result();
									$project_name=ucwords($result_project[0]->Project_Name);
									$technical_bid_ref=$value_comm_id->technical_bid_ref;
									$technical_bid_id=$value_comm_id->technical_bid_id;
									$url='<a href="'.base_url().'technical-user-bid-pr-new-material/'.$value_comm_id->pr_no.'/'.$value_comm_id->pr_no_slno.'/'.$value_comm_id->project_slno.'/2/'.$tech_bid.'" > Click to View</a>';
									$pr_no=$value_comm_id->pr_no;
									// $query_pr_item_SLNO=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no));
									// $result_pr_item=$query_pr_item_SLNO->result();
									
									$query_pr_item_SLNO=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no));
									$result_pr_item=$query_pr_item_SLNO->result();
									$item_name=$result_pr_item[0]->item;
									$comment=$result_pr_item[0]->comment;
									$design_date=date('d-m-Y',strtotime($value_comm_id->design_date));
									echo '
									<tr>
										<td>'.$value_comm_id->pr_no.'</td>
										<td>'.$comment.'</td>
										<td>'.$item_name.'</td>
										<td>'.$project_name.'</td>
										<td>'.$technical_bid_ref.'</td>
										
										<td>'.$design_date.'</td>
										
									  <td> <a href="'.base_url().'user-technical-evaluator-view-details-technical-bid-new-complete-view-pr/'.$value_comm_id->pr_no.'/'.$technical_bid_ref.'/'.$technical_bid_id.'/'.$tech_bid.'/3" class="btn btn-sm btn-lime" title="Click Here view Bid completed information of pr" >Click To View</a></td>
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
					 	

					        		        
					    
					