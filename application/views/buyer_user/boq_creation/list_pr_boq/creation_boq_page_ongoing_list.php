<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
	// 
	$query_design = $this->db->get('master_project');

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.csss">
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li> -->
				<li class="breadcrumb-item active">On-going Edit Boq </li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">On-going Edit Boq
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
			
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> On-going List Edit Boq </h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive-sm">
						<table id="table1" class="table" style="width:100%">
							<thead>
			                    <tr>
			                      <th>Discipline</th>
			                      <th>Project name</th>
			                      <th>PR No</th>
			                      <th>Comment from Bu User</th>
			                      <th>Item</th>
			                      <th>UOM</th>
			                      <th>Quantity</th>
			                      <th>Original Schedule</th>
			                     
			                      <th>Action</th>
			                      
			                    </tr>
			                </thead>
			                <tbody>
								<?php
								
								 	//
								 	$data_check=array('buyer_user_id'=>$email_id,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1,'buyer_user_status'=>4);
								 	$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
								 	$num_rows_check=$query_check->num_rows();
								 	 foreach($query_check->result() as $row){
								 	 	 $pr_no=$row->pr_no;
								 	
								 		$result_id=$query_check->result();
								 		$tech=$row->type_bidding_technical;
								 		$design_user_status=$row->buyer_user_status;
								 		$technical_complete_status=$row->technical_complete_status;
								 		
								 		if(!empty($row->buyer_user_remark)){
								 			$buyer_user_remark=$row->buyer_user_remark;
								 		}else{
								 			$buyer_user_remark="No Remark Received From procurement User";
								 		}
								 		if(!empty($row->commercial_user_remark)){
								 			$commercial_user_remark=$row->commercial_user_remark;
								 		}else{
								 			$commercial_user_remark="No Remark Send To Commercial community User";
								 		}
								 		$query_bid='<a href="'.base_url().'buyer-commercial-query-completed/'.$row->pr_no.'" class="btn btn-sm btn-lime" title="" >View Query</a>';
								 		$comm_bid=$row->comm_bid;
								 		$status_detai="Completed";
								 		$url='<a href="'.base_url().'buyer-onging-pr-boq-edit-view-details/'.$row->pr_no.'/'.$row->pr_no_slno.'/'.$row->project_slno.'/2/'.$comm_bid.'" > Click to View </a>';	
								 		$commercial_bid_ref=$row->commercial_bid_ref;
								 		$commercial_bid_id=$row->commercial_bid_id;
								 		
								 		$design_user_status=$row->commercial_complete_status;
								 		$comm_bid_db=$comm_bid=$row->comm_bid;
								 		$commercial_edit_id=$row->commercial_edit_id;
								 		$commercial_resubmit_count=$row->commercial_resubmit_count;
								 		$commercial_type_bid=$row->commercial_type_bid;

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
								 		// $type_bid='',$last_insert_id='',$pr_no='',$commercial_bid_ref='',$commercial_bid_id='',$comm_bid_db='',$commercial_edit_id='',$commercial_resubmit_count='',$commercial_type_bid=''){
								 		
								 		$url_buyer_commplete='<a href="'.base_url().'buyer-ongoing-pr-float-back/'.$pr_no.'"
								 			>Click To Resume Bid </a>';
								 		$commercial_type_bid=$row->commercial_type_bid;
								 		$job_code=$row->project_slno;
										$query_project=$this->db->get_where('master_project',array('Project_Slno'=>$job_code));
										$result_project=$query_project->result();

									$project_name=ucwords($result_project[0]->Project_Name);
									$query_pr_item_SLNO=$this->db->get_where('master_pr_schedule',array('pr_no'=>$pr_no));
									$result_pr_item=$query_pr_item_SLNO->result();
									$item_name=$result_pr_item[0]->item;
								 		// if($commercial_type_bid!='Rank Order Bid'){
						                    echo '
						                    <tr>
						                      <td>'.$result_pr_item[0]->discipline.'</td>
						                      <td>'.$project_name.'</td>
						                      <td>'.$result_pr_item[0]->pr_no.'</td>
						                      <td>'.$result_pr_item[0]->comment.'</td>
						                      <td>'.$result_pr_item[0]->item.'</td>
						                      <td>'.$result_pr_item[0]->UOM.'</td>
						                      <td>'.$result_pr_item[0]->quantity.'</td>
						                      <td>'.date('d-m-Y',strtotime($result_pr_item[0]->original_schedule)).'</td> 
						                     
						                      <td>'.$url.'|| '.$url_buyer_commplete.'</td>
						                    </tr>
						                    ';
						                // }
					                
					            }
								?>
							</tbody>
						</table>
					</div>
					<!-- table -->

				</div>
			</div>
						
					        		        
					    
					