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
				<li class="breadcrumb-item active">On-going Commercial (Ranking) Bid</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">On-going Commercial (Ranking) Bid
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
					<div class="panel-heading-btn">
					<!-- 	<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title"> PR Schedule Ongoing Bid For(Rank Order) Bid </h4>
				</div>	
				<div class="panel-body">
					<form action="" method="POST" enctype="multipart/form-data"	>
						<div class="alert alert-secondary">
	                       	<span style="color: red"> *</span>All mandatory fields shall be duly filled up 
	                    </div>	   
	                    <div class="card-body">						        	
							<hr>
						    <div class="row">
								<div class="col-md-6 col-lg-6">
								 	<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Project <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control" onchange="load_data()" name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
													foreach ($query_design->result() as $key_job_code) {
														echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6"><!-- part g start -->									
									<div class="form-group row pull-right">
					                    <div class="form-group row pull-right">
					                        <div class="col-md-12">
					                            <button type="Submit" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="find">Get Info</button>
					                            
					                        </div>
					                    </div>
					                </div>
					            </div>					            
					        </div>
					    </div>
					</form>
				</div>
			</div>
			<?php 
			$send_button=$this->input->post('send_button');
			if($send_button=="find"){
				$table="master_pr_schedule"; 
				$job_code=$this->input->post('job_code');
				$data_check = array('job_code' => $job_code,'status'=>1, 'mr_status'=>1);
                $query=$this->db->get_where($table,$data_check);
								foreach ($query_design->result() as $key_job_code) {
									if($key_job_code->Project_Slno==$job_code){
										$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
				
									}
								}
                           

               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
				<h4 class="panel-title"> PR Schedule Project Name :- <?=$project_details_info?> </h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive-sm">
						<table id="table1" class="table" style="width:100%">
							<thead>
			                    <tr>
			                      <th>Discipline</th>
			                      <th>PR No</th>
			                      <th>Comment from Bu User</th>
			                      <th>Item</th>
			                      <th>UOM</th>
			                      <th>Quantity</th>
			                      <th>Original Schedule</th>
			                      <th>Procurement Remarks</th>
														<th>Query Pending</th>                     
			                      <th>Status</th>
			                      <th>Action</th>
			                      
			                    </tr>
			                </thead>
			                <tbody>
								<?php
								 foreach($query->result() as $row){
									 $pr_no=$row->pr_no;
									 $result_query=$this->db->get_where('master_bid_query_comm_m',array('pr_no'=>$pr_no,'status_responds'=>0));
								 	$data_check=array('pr_no'=>$pr_no,'buyer_user_id'=>$email_id,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1,'commercial_complete_status'=>2);
								 	$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
								 	$num_rows_check=$query_check->num_rows();
								 	if($num_rows_check!=0){
								 		$result_id=$query_check->result();
								 		$tech=$result_id[0]->type_bidding_technical;
								 		$design_user_status=$result_id[0]->buyer_user_status;
								 		$technical_complete_status=$result_id[0]->technical_complete_status;
								 		$comm_bid=$result_id[0]->comm_bid;
								 		if(!empty($result_id[0]->buyer_user_remark)){
								 			$buyer_user_remark=$result_id[0]->buyer_user_remark;
								 		}else{
								 			$buyer_user_remark="No Remark Received From procurement User";
								 		}
								 		if(!empty($result_id[0]->commercial_user_remark)){
								 			$commercial_user_remark=$result_id[0]->commercial_user_remark;
								 		}else{
								 			$commercial_user_remark="No Remark Send To Commercial community User";
								 		}
										 $query_bid='<a href="'.base_url().'buyer-commercial-query/'.$row->pr_no.'" class="btn btn-sm btn-lime" title="" >View Query</a>';
										 $rank_status=$result_id[0]->rank_status;
										 if($rank_status==0){
											 $url_auction='<a href="'.base_url().'buyer-rank-start-Commerical-ongoing-bid-pr-info-details/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/2/'.$comm_bid.'" class="btn btn-sm btn-pink" > Create Rank Bid Auction  </a>';	
										 }else{
											$url_auction="Rank Bid Auction Already Created";
										 }
								 		$status_detai="Ongoing";
								 		if($tech==1){
								 			$word="Commerical";
								 			$url='<a href="'.base_url().'buyer-s-c-Commerical-ongoing-bid-pr-info-details/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/2/'.$comm_bid.'" class="btn btn-sm btn-blue" > Click to View '.$word.' </a>';	
								 		}else{
								 			$word="Commerical";
								 			$url='<a href="'.base_url().'buyer-s-c-Commerical-ongoing-bid-pr-info-details/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/2/'.$comm_bid.'" class="btn btn-sm btn-blue" > Click to View '.$word.' </a>';	
								 		}
								 		$commercial_type_bid=$result_id[0]->commercial_type_bid;
								 		if($commercial_type_bid=='Rank Order Bid'){
						                    echo '
						                    <tr>
						                      <td>'.$row->discipline.'</td>
						                      <td>'.$row->pr_no.'</td>
						                      <td>'.$row->comment.'</td>
						                      <td>'.$row->item.'</td>
						                      <td>'.$row->UOM.'</td>
						                      <td>'.$row->quantity.'</td>
						                      <td>'.date('d-m-Y',strtotime($row->original_schedule)).'</td> 
						                       <td>'.$buyer_user_remark.'</td>
																	 <td>'.$result_query->num_rows().'</td>
						                      <td>'.$status_detai.'</td>
						                      <td>'.$url.'||'.$query_bid.' ||'.$url_auction. '</td>
						                    </tr>
						                    ';
						                }
					                }
					            }
								?>
							</tbody>
						</table>
					</div>
					<!-- table -->

				</div>
			</div>
		<?php }?>
						
					        		        
					    
					