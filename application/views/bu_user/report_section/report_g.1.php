<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_design = $this->db->get('master_project');
$data_array_buyer=$this->procurement_user->get_procurement_buyer_list();

$job_code_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $job_code_id=$this->input->post('job_code');
    $Starting_id=($this->input->post('Starting'));
    $ending_id=($this->input->post('ending'));
}else{
    $job_code_id=$ending_id=$Starting_id="";
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Report</a></li> 
				<li class="breadcrumb-item active">Report G</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Buyer Productivity Analysis (BPA)<small></small></h3>
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
					<h4 class="panel-title">Search Filter</h4>
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
											<select class="form-control"  name="job_code" id="job_code" required="">
												<option value="">--Select Project---</option>
												<?php
                                                    foreach ($query_design->result() as $key_job_code) {?>
                                                        <option value='<?=$key_job_code->Project_Slno?>'<?php if($job_code_id==$key_job_code->Project_Slno){ echo "selected";}?>><?=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]"?></option>
                                                <?php }
                                                ?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>
                                    </div>
                                    <div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Buyer <span style="color: red">*</span></label>
										<div class="col-md-9">
                                            <select name="buyer_id" class="form-control m-b-5" id="buyer_id"  required="" >
												<option value="">--Select Buyer---</option>
												<?php
												foreach ($data_array_buyer['user_buyer_list'] as $key_buyer) {
													
													echo "<option value='".$key_buyer->slno."'>".$key_buyer->Username." [ ".$key_buyer->email_id." ]</option>";
												}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Project </small>
										</div>
                                    </div>

                                    <div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="Date_creation"> Month <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="job_code_month" id="job_code_month" required="">
												<option value="">--Select Month---</option>
                                                <?php
                                                   $monthArray = range(1, 12);
                                                   foreach ($monthArray as $month) {
                                                   // padding the month with extra zero
                                                     $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                   // you can use whatever year you want
                                                   // you can use 'M' or 'F' as per your month formatting preference
                                                     $fdate = date("F", strtotime("2019-$monthPadding-01"));
                                                     ?>
                                                     <option value="<?=$monthPadding?>"><?=$fdate?></option><?php
                                                   }
													// foreach ($query_design->result() as $key_job_code) {
													// 	echo "<option value='".$key_job_code->Project_Slno."'>".$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]</option>";
													// }
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Month </small>
										</div>
									</div>
                                    <div class="form-group row  m-b-15">
                                        <label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
                                        <div class="col-md-9">
                                            <div class="row row-space-10">
                                                <div class="col-xs-6 col-md-9">
                                                    <input type="text" class="form-control  m-b-5" value="<?=$Starting_id?>" name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" />
                                                </div>
                                                <div class="col-xs-6 col-md-9">
                                                    <input type="text" class="form-control  m-b-5" value="<?=$ending_id?>" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-6 col-lg-6"><!-- part g start -->									
									<div class="form-group row pull-right">
					                    <div class="form-group row pull-right">
					                        <div class="col-md-12">
					                            <button type="Submit" class="btn btn-sm btn-primary m-r-5" name="send_button" id="sub" value="find">Search</button>
					                            
					                        </div>
					                    </div>
					                </div>
					            </div>					            
					        </div>
					    </div>
					</form>
					
				</div>
			</div>
			<!-- end panel -->
	
        
        <?php 
			$send_button=$this->input->post('send_button');
			if($send_button=="find"){
				$table="master_pr_schedule"; 
                $job_code=$this->input->post('job_code');
                $job_code_month=$this->input->post('job_code_month');
                $buyer_id=$this->input->post('buyer_id');
                // ,'status'=>1, 'mr_status'=>1
                $date_year=date('Y');
                // ,'YEAR(original_schedule)'=>$date_year
				$data_check = array('job_code' => $job_code,'MONTH(original_schedule)'=>$job_code_month);               
                foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
                foreach ($data_array_buyer['user_buyer_list'] as $key_buyer) {
                    if($key_buyer->slno==$buyer_id){
                        $buyer_name=$key_buyer->Username." [ ".$key_buyer->email_id." ]";
                        $buyer_email_id=$key_buyer->email_id;
                        $buyer_name_id=ucwords($key_buyer->Username);
                    }
                }
                $month_text=date("F", strtotime("2019-$job_code_month-01"));
                $query_pr=$this->db->get_where($table,$data_check);
                $commercial_count=$incom=$comp=0;
                // print_r($query_pr->result());
                // foreach($query_pr->result() as $row){
                //     $pr_no=$row->pr_no;
                //     $data_check=array('pr_no'=>$pr_no);
                //     $query_check_pr=$this->db->get_where('master_pr_process_detail',$data_check);
                //     $num_rows_check=$query_check_pr->num_rows();
                //     if($num_rows_check!=0){
                //         $pr_results=$query_check_pr->result();
                //         $commercial_complete=$pr_results[0]->commercial_complete_status;
                //         if($commercial_complete==1){
                //             $commercial_count++;
                //         }
                //         // commercial_complete_status
                //             $comp++;
                //     }else{
                //         $incom++;
                //     }
                // }
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Project Name :- <?=$project_details_info?> || Month :- <?=$month_text?> || Buyer Name :- <?=$buyer_name?> </h4> 

				</div>
				<div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Job Code </label>
                            <div class="col-md-9">
                                <?=$job_Code?>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Project Name </label>
                            <div class="col-md-9">
                                <?=$Project_Name?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Job Desc </label>
                            <div class="col-md-9">
                                <?=$project_Description?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                        <table id="table1bu" class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th>Job Code</th>
                                    <th>Buyer Name</th>
                                    <th>PR Details</th>
                                    <th>Item Description Details</th>
                                    <th>Qty</th>
                                    <th>PR Actual received date (from procurement user)</th>
                                    <th>Enquiry floating date</th>
                                    <th>No. of Offers received</th>
                                    <th>Actual Technical Clearance date</th>
                                    <th>L2 Schedule Ordering date</th>
                                    <th>Scheduled date</th>
                                    <th>Actual Ordering date</th>
                                    <th>Delay (in days)</th>
                                    <th>Supplier Name</th>
                                    <th>Basic Order Value</th>
                                    <th>Ace</th>
                                    <th>Saving</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($query_pr->result() as $row):
                                        $pr_no=$row->pr_no;
                                        $bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$pr_no));
                                        if($bu_query_information->num_rows()==1){
                                            $result_bu_query_information=$bu_query_information->result();
											$single_bu_query_information=$result_bu_query_information[0];
                                            $Cost_saving=$single_bu_query_information->Cost_saving;
                                            $ACE_Basic=$single_bu_query_information->ACE_Basic;
                                            $Order_value=$single_bu_query_information->Order_value;
                                            
                                        }else{
                                            $Order_value=$ACE_Basic=$Cost_saving='--';
                                        }
                                        $original_schedule=$row->original_schedule;
                                        $scheduled_order=$row->scheduled_order;
                                        $data_check=array('pr_no'=>$pr_no,'buyer_user_id'=>$buyer_email_id);
										$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
										if($query_check->num_rows()==1){
                                            $result_process_pr=$query_check->result();
                                            $short_value_pr=$result_process_pr[0];
                                            $procurement_date=date('d-m-Y',strtotime($short_value_pr->procurement_date));
                                            $buyer_date_comm=date('d-m-Y',strtotime($short_value_pr->buyer_date_comm));
                                            $query_number_ven=$this->db->get_where('master_bid_Com_vendor_m',array('pr_no'=>$pr_no,'submission_status'=>1));
                                            $total_no_received_offer=$query_number_ven->num_rows();
                                            $technical_complete_status=$short_value_pr->technical_complete_status;
                                            if($technical_complete_status==1){
                                                $technical_date=date('d-m-Y',strtotime($short_value_pr->technical_date));
                                            }else{
                                                $technical_date='Pending';
                                            }
                                            $commercial_complete_status=$short_value_pr->commercial_complete_status;
                                            if($commercial_complete_status==1){
                                                $commercial_date=date('d-m-Y',strtotime($short_value_pr->commercial_date));
                                                $date1_orginal = date('Y-m-d',strtotime($scheduled_order));  
                                                $date1=date_create($date1_orginal);
                                                $date2=date_create($commercial_date);
                                                $diff=date_diff($date1,$date2);
											// echo $diff->format("%R%a days");
											$value_delay=$diff->format("%R%a days");
                                            }else{
                                                $commercial_date='Pending';
                                                $value_delay='Pending';
                                            }
                                ?>
                                <tr>
                                    <td><?=$job_Code?></td>
                                    <td><?=$buyer_name_id?></td>
                                    <td><?=$row->pr_no?></td>
                                    <td><?=$row->item?></td>
                                    <td><?=$row->quantity?></td>
                                    <td><?=$procurement_date?></td>
                                    <td><?=$buyer_date_comm?></td>
                                    <td><?=$total_no_received_offer?></td>
                                    <td><?=$technical_date?></td>
                                    <td><?=date('d-m-Y',strtotime($row->original_schedule))?> </td>
                                    <td><?=date('d-m-Y',strtotime($row->scheduled_order))?></td>
                                    <td><?=$commercial_date?></td>
                                    <td><?=$value_delay?></td>
                                    <td>Supplier Name</td>
                                    <td><?=$Order_value?></td>
                                    <td><?=$ACE_Basic?></td>
                                    <td><?=$Cost_saving?></td>                                  
                                </tr>
                                <?php 
                                    }else{
                                        ?>
                                        <tr>
                                            <td><?=$job_Code?></td>
                                            <td>--</td>
                                            <td><?=$row->pr_no?></td>
                                            <td><?=$row->item?></td>
                                            <td><?=$row->quantity?></td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td><?=date('d-m-Y',strtotime($row->original_schedule))?></td>
                                            <td><?=date('d-m-Y',strtotime($row->scheduled_order))?></td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td><?=$Order_value?></td>
                                            <td><?=$ACE_Basic?></td>
                                            <td><?=$Cost_saving?></td> 
                                        </tr>
                                        <?php

                                    }
                                    endforeach;
                                ?>
                            </tbody>

                        </table>
                        </div>
                    </div>

                </div>

					
				</div>
			</div>
		<?php }?>
        </div>
        <!-- end #content -->			
					        		        
					    
					