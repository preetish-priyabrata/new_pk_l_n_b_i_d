<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
	// 
	$query_design = $this->db->get('master_project');

?>
<style type="text/css">
	div.dataTables_wrapper {
      /*  width: 1013px;
        margin: 0 auto;*/
    }
</style>
<!-- 
   
    
    
 -->
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
				<li class="breadcrumb-item active">PR Schedule Completed Technical</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Project PR Schedule Completed Technical
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
				
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title"> Completed Bid Technical </h4>
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
											<small class="f-s-12 text-grey-darker">Please Select Project For Upload PR Schedule Complete</small>
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
                    // echo  $this->db->last_query();
               
               
                // $output .= '</table>';
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> PR Schedule Complete List</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive-sm">
						<table id="table1" class=" table" >
							<thead>
			                    <tr>
			                      <th>Discipline</th>
			                      <th>PR No</th>			                      
			                      <th>Item</th>
			                      <th>UOM</th>
			                      <th>Quantity</th>
			                      <th>Original Schedule</th> 
			                      <th>procurement Remark</th>
			                      <th>Tecnical community Remark Send</th>                             
			                      <th>Status</th>
			                      <th>Action</th>
			                      
			                    </tr>
			                </thead>
                			<tbody>
								<?php
								 foreach($query->result() as $row){
								 	$pr_no=$row->pr_no;
								 	$data_check=array('pr_no'=>$pr_no,'buyer_user_id'=>$email_id,'approver_user_status'=>1,'design_user_status'=>1,'procurement_user_status'=>1,'technical_complete_status'=>1);
								 	$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
								 	$num_rows_check=$query_check->num_rows();
								 	if($num_rows_check!=0){
								 		$result_id=$query_check->result();
								 		$tech=$result_id[0]->type_bidding_technical;
								 		$design_user_status=$result_id[0]->buyer_user_status;
								 		$technical_complete_status=$result_id[0]->technical_complete_status;
								 		$url="#";
								 		if(!empty($result_id[0]->buyer_user_remark)){
								 			$buyer_user_remark=$result_id[0]->buyer_user_remark;
								 		}else{
								 			$buyer_user_remark="No Remark Received From procurement User";
								 		}
								 		if(!empty($result_id[0]->technical_user_remark)){
								 			$technical_user_remark=$result_id[0]->technical_user_remark;
								 		}else{
								 			$technical_user_remark="No Remark Send To Technical community User";
								 		}
								 		$technical_bid_ref=$result_id[0]->technical_bid_ref;
								 		$technical_bid_id=$result_id[0]->technical_bid_id;
								 		$tech_bid=$result_id[0]->tech_bid;
								 		$query_bid='<a href="'.base_url().'buyer-technical-query-completed/'.$row->pr_no.'" class="btn btn-sm btn-lime" title="" >View Query</a>';
								 		$status_detai="Completed Bid";
								 		$url='<a href="'.base_url().'buyer-technical-completed-bid-pr-info-details/'.$row->pr_no.'/'.$technical_bid_ref.'/'.$technical_bid_id.'/'.$tech_bid.'/5" class="btn btn-sm btn-lime" title="Click Here Closed Bid Sent information of approved vendors" >Click To View Bid</a>';
								 		// if($tech==1){
								 		// 	if($technical_complete_status==0){
								 		// 		$word="Techno";
									 	// 		$url='<a href="'.base_url().'buyer-technical-ongoing-bid-pr-info-details/'.$row->pr_no.'/'.$technical_bid_ref.'/'.$technical_bid_id.'/'.$tech_bid.'/5" class="btn btn-sm btn-lime" title="Click Here Closed Bid Sent information of approved vendors" >Click To View Bid</a>';
									 	// 	}elseif($technical_complete_status==1){
									 	// 		$word="Techno/Commerical";
									 	// 		$url='<a href="'.base_url().'buyer-user-create-new-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$tech.'" > Click to View '.$word.' </a>';	
									 	// 	}
								 		// }else{
								 		// 	$word="Commerical";
								 		// 	$url='<a href="'.base_url().'buyer-user-create-new-pr/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$tech.'" > Click to View '.$word.' </a>';	
								 		// }
								 		
					                    echo '
					                    <tr>
					                      <td>'.$row->discipline.'</td>
					                      <td>'.$row->pr_no.'</td>
					                     
					                      <td>'.$row->item.'</td>
					                      <td>'.$row->UOM.'</td>
					                      <td>'.$row->quantity.'</td>
					                      <td>'.$row->original_schedule.'</td> 
					                      <td>'.$buyer_user_remark.'</td>
					                      <td>'.$technical_user_remark.'</td>
					                      <td>'.$status_detai.'</td>
					                      <td>'.$url.' || '.$query_bid.'</td>
					                    </tr>
					                    ';
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
						
					        		        
					    
					