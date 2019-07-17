<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$table='master_vendor_detail';
$query_vendor_detail=$this->db->get($table);
$query_data_year_new_info = $this->db->get('master_project');


$Vendor_email_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$Vendor_email_id=$this->input->post('Vendor_email_id');
	$Starting_id=($this->input->post('Starting'));
	$ending_id=($this->input->post('ending'));
}else{
	$Vendor_email_id=$ending_id=$Starting_id="";
}

?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="<?=base_url()?>file_css_admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>

<style>
/* Latest compiled and minified CSS included as External Resource*/

/* Optional theme */
/* @import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css'); */
 th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 100%;
    }
    table.display {
  margin: 0 auto;
  width: 8000px;
  /*width: 100%;*/
  clear: both;
  border-collapse: collapse;
  table-layout: fixed;         // add this 
  word-wrap:break-word;        // add this 
}
.dataTables_scroll
{
    overflow:auto;
}
.like-tables-row { display: table; width: 100%; }
.like-tables.row > [class*=col-] { display: table-cell; vertical-align: middle; border: 1px solid #000; float: none; }

</style>
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Report</a></li> 
				<li class="breadcrumb-item active">Report P</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Supplier Specific Spend (SSS)<small></small></h3>
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
										<label class="col-form-label col-md-3" for="Vendor_email_id"> Supplier Name <span style="color: red">*</span></label>
										<div class="col-md-9">
											<select class="form-control"  name="Vendor_email_id" id="Vendor_email_id" required="">
												<option value="">--Select Supplier Name---</option>
												<?php
													foreach ($query_vendor_detail->result() as $value) {

												?>
														<option value='<?=$value->Vendor_email_id?>'<?php if($Vendor_email_id==$value->Vendor_email_id){ echo "selected"; }?>><?=$value->Organisation_name?></option>
												<?php
													}
												?>
											</select>
											<small class="f-s-12 text-grey-darker">Please Select Supplier Name </small>
										</div>
									</div>
									<div class="form-group row  m-b-15">
										<label class="col-md-3 col-form-label"> Date <span style="color: red">*</span></label>
										<div class="col-md-9">
									    	<div class="row row-space-10">
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5"  name="Starting" id="datetimepicker6" placeholder="Starting Date" required="" value="<?=$Starting_id?>" />
												</div>
												<div class="col-xs-6 col-md-9">
													<input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" value="<?=$ending_id?>"  />
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
                $Vendor_email_id=$this->input->post('Vendor_email_id');
                foreach ($query_vendor_detail->result() as $value) {
                    if($Vendor_email_id==$value->Vendor_email_id){
                        // $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
                        $Organisation_name=$value->Organisation_name;
                        // $material_id=$value->material_item_id;
                        // $UOM=$value->uom;

                    }
				}
				
				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d',strtotime($this->input->post('ending')));
				
				$this->db->from('master_pr_bid_qoute_item_final_approve');
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates >=', $Starting_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates <=', $ending_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.Vendor_id', $Vendor_email_id);
				$query_supplyer_wise=$this->db->get();
				foreach ($query_supplyer_wise->result() as $key_id) {
			
					$Simple_id_slno[]= ($key_id->Simple_id_slno);
				
			
				}
				
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Supplier Name :- <?=$Organisation_name?> </h4> 

				</div>
				<div class="panel-body">
				<div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> Start Date </label>
                            <div class="col-md-9">
                                <?=$Starting?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group row m-b-15">
                            <label class="col-form-label col-md-3" for="Date_creation"> End Date </label>
                            <div class="col-md-9">
                             <?=$ending?>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table id="table1bu2" class="table table-bordered" border="1" width: 100%;>
                            <thead>
                                <tr role="row">
                                    <th>Supplier Name </th>
									<th>Project Name</th>
									<th>PR No</th>
                                    <th>Item Name</th>
                                    <th>Po No</th>
                                    <th>Po Date</th>
                                    <th>Year</th>
                                    <th>PO basic Value</th>
                                    <th>Saving Against ACE</th>
                                    <th class="dt-body-right">Competitor Information</th>
                                    <!-- <th>Competitor-2 Price (basic)</th>
                                    <th>Competitor-3 Price (basic)</th>
                                    <th>Competitor-4 Price (basic)</th> -->

                                 
                                </tr>
                            </thead>
                            <tbody>
                               
								<?php
								$year_id_data = array();
								$year_id = array();
								$item_id_date = array();
								$item_id = array();
									if($query_supplyer_wise->num_rows()!=0){
										$final_Simple_id_slno=array_unique($Simple_id_slno); 
										foreach($final_Simple_id_slno as $row):
											// echo $row;
											$this->db->from('master_pr_bid_qoute_item_total');
											$this->db->where('master_pr_bid_qoute_item_total.simple_id_slno_total', $row);
										
											$this->db->join('master_pr_process_detail', 'master_pr_process_detail.pr_no = master_pr_bid_qoute_item_total.pr_no');
											$this->db->join('master_pr_schedule', 'master_pr_schedule.pr_no = master_pr_bid_qoute_item_total.pr_no');
										$query_supplyer_wise_info=$this->db->get();
										// echo $this->db->last_query();
										$new_inform=$query_supplyer_wise_info->result();
										$short_information=$new_inform[0];
										// echo "<pre>";
										// print_r($short_information);
											foreach ($query_data_year_new_info->result() as $key_job_code):
												if($key_job_code->Project_Slno==$short_information->project_slno){
													$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
													$job_Code=$key_job_code->job_Code;
													$project_Description=$key_job_code->project_Description;
													$Project_Name=ucwords($key_job_code->Project_Name);
												}

											endforeach;
											$commercial_user_status=$short_information->commercial_user_status;
											if($commercial_user_status==1){
												$commercial_date_new=date('d-m-Y',strtotime($short_information->commercial_date));
											}else{
												$commercial_date_new="--";
											}
											$pr_no=$short_information->pr_no;
											$bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$pr_no));
											if($bu_query_information->num_rows()==1){
												$results_bu_information=$bu_query_information->result();
												$short_bu_result=$results_bu_information[0];
												$Po_no=$short_bu_result->Po_no;
												if(!empty($Po_no)){
													$po_no_details=$Po_no;
												}else{
													$po_no_details='--';
												}
												$Po_date=$short_bu_result->Po_date;
												if(!empty($Po_date)){
													$Po_date_details=date('d-m-Y',strtotime($Po_date));
												}else{
													$Po_date_details='--';
												}
												$Cost_saving=$short_bu_result->Cost_saving;
												if(!empty($Cost_saving)){
													$Cost_saving_details=(($Cost_saving));
												}else{
													$Cost_saving_details='--';
												}
												$Order_value=$short_bu_result->Order_value;
											if(!empty($Order_value)){
												$Order_value_details=(($Order_value));
												$commercial_date_new_year=date('Y',strtotime($commercial_date_new));
												$item=$short_information->item;
												if (ctype_digit($Order_value_details)) {
													$year_id_data[] = array('commercial_date_new_year' =>$commercial_date_new_year ,'Order_value_details' =>$Order_value_details);
													$year_id[]=($commercial_date_new_year);

													$item_id_date[] = array('item_detail' =>$item ,'Order_value_details' =>$Order_value_details);
													$item_id[]=($item);
												}

												
											}else{
												$Order_value_details='--';
											}
											}else{
												$Order_value_details=$Cost_saving_details=$Po_date_details=$po_no_details='--';
											}
											$comm_bid=$short_information->comm_bid;
											$pr_no=$short_information->pr_no;
											$query_vendor_information=$this->db->get_where('master_bid_Com_vendor_m',array('pr_no'=>$pr_no));
											// $date_total= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $comm_bid);
											// $this->db->limit(1);
											// $data_total=$this->db->get_where('master_pr_bid_qoute_item_total',$date_total);
											
								?>

                                <tr>
                                    <td><?=$Organisation_name?></td>
                                    <td><?=$Project_Name?></td>
									<td><?=$short_information->pr_no?></td>
									<td><?=$short_information->item?></td>
                                    <td><?=$po_no_details?></td>                       
									<td><?=$Po_date_details?></td>
									<td><?=date('Y',strtotime($commercial_date_new))?></td>
									<td><?=$Order_value_details?></td>
                                    <td><?=$Cost_saving_details?></td>
                                    <td >
										
										<div class="container">
										<div class="row like-tables">
											
												<div class="col-md-6">
													Competitor Name
												</div>
												<div class="col-md-6">
													Price
												</div>
											
										</div>
										<?php 
											foreach($query_vendor_information->result() as $vendor_info):
												$userid_ven=$vendor_info->vendor_id;
												if($Vendor_email_id!=$userid_ven){
												foreach ($query_vendor_detail->result() as $value) {
													if($userid_ven==$value->Vendor_email_id){
														// $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
														$Organisation_name_ven=$value->Organisation_name;
														// $material_id=$value->material_item_id;
														// $UOM=$value->uom;
								
													}
												}

												$date_total= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $comm_bid);
												$this->db->limit(1);
												$data_total=$this->db->get_where('master_pr_bid_qoute_item_total',$date_total);
										?>
										<div class="row like-tables">
										
												<div class="col-md-6">
													<?=$Organisation_name_ven?>
												</div>
												<div class="col-md-6">
													<?php 
													if($data_total->num_rows()!=0){
														$result_vendor=$data_total->result();
														echo $result_vendor[0]->total_price;
													}else{
														echo "--";
													}
													?>
												</div>
											
										</div>
											<?php 
												}
										endforeach;?>
										</div>
									</td>
									
                                    
                                </tr>
								<?php 
										endforeach;	

									}
								?>
                             
                            </tbody>

                        </table>
                        </div>
                    </div>

                </div>
                <br>
				<br>
				<br>
				<br>
				<div class="row">
					<?php 
						// $year_id_data = array();
						// $year_id = array();
						// $item_id_date = array();
						// $item_id = array();
					$data_data_year_new_info = array();
					if(!empty($year_id)){
						$year_id_new=array_unique($year_id);
						sort($year_id_new);
						$data_data_year_new_info = array();
						// print_r($data_year_new_info_id_new);
						foreach ($year_id_new as $key_year_new_info => $value_year_new_info) :
							# code...
							$total_price=0;
							foreach ($year_id_data as $key_data_year_new_info => $value_data_year_new_info) {
								$year_new_infoo=$year_id_data[$key_data_year_new_info]['commercial_date_new_year'];
								if($year_new_infoo==$value_year_new_info){
									// $data_year_new_info_name_list=$year_id_data[$key_data_year_new_info]['data_year_new_info_name'];
									$Total_unitprice_list=$year_id_data[$key_data_year_new_info]['Order_value_details'];
									$total_price=$total_price+$Total_unitprice_list;
								}
							}
							$data_data_year_new_info[]=array('year_info'=>$value_year_new_info,'sum_year'=>$total_price);
						endforeach;
					}
					$data_vendor_details = array();
					if(!empty($item_id)){
						$item_id_new=array_unique($item_id);
				
						$data_vendor_details = array();
						// print_r($data_year_new_info_id_new);
						foreach ($item_id_new as $key_item_id => $value_item_id) :
							# code...
							$total_price=0;
							foreach ($item_id_date as $item_id_key => $value_vendor_id) {
								$item_detail=$item_id_date[$item_id_key]['item_detail'];
								if($item_detail==$value_item_id){
									// $Organisation_name_id=$item_id_date[$item_id_key]['Organisation_name'];
									$Total_unitprice_list=$item_id_date[$item_id_key]['Order_value_details'];
									$total_price=$total_price+$Total_unitprice_list;
								}
							}
							$data_vendor_details[]=array('item_detail_id'=>$item_detail,'sum_year'=>$total_price);
						endforeach;
					}
	        		// foreach ($date_graph as $key_date => $value_date) {
	        		// 	print_r($date_graph[$key_date]['po_date']);
					
	        		// }

					?> 
					<div class="col-lg-6">
						<div id="chart_div1" ></div>
					</div>
					<div class="col-lg-6">
						<div id="chart_div" ></div>
					</div>
				</div>
				
					
				</div>
			</div>
		<?php }?>
        </div>
        <!-- end #content -->	
             	<!-- end #content -->
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
		    google.charts.setOnLoadCallback(drawChart);
		    function drawChart() {
		      var data = google.visualization.arrayToDataTable([
		        ["Year", "Number", { role: "style" } ],
		        <?php
		        if(!empty($year_id)){
		        		foreach ($data_data_year_new_info as $key_project_data => $value_project_data) {
	        		?>
	        		['<?=$data_data_year_new_info[$key_project_data]['year_info']?>', <?=$data_data_year_new_info[$key_project_data]['sum_year']?> , "#b87333"],
	        		<?php }

		        }else{
		        		?>
		        	['0',0],
		       <?php  }
		        ?>

		 
				
		       
		      ]);

		      var view = new google.visualization.DataView(data);
		      view.setColumns([0, 1,
		                       { calc: "stringify",
		                         sourceColumn: 1,
		                         type: "string",
		                         role: "annotation" },
		                       2]);

		      var options = {
		        title: "Year Wise Ordering Spend Vendor Name :- <?=$Organisation_name?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
		        backgroundColor:'#a9e8f9',
		        // axes: {
		        //     x: {
		        //       0: { side: 'top', label: '->'} // Top x-axis.
		        //     }
		        //   },

		        // width: 600,
		        height: 400,
		        bar: {groupWidth: "95%"},
		        legend: { position: "none" },
		      };
		      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
		      chart.draw(view, options);
		  }
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
		    google.charts.setOnLoadCallback(drawChart);
		    function drawChart() {
		      var data = google.visualization.arrayToDataTable([
		        ["Item Name", "Number", { role: "style" } ],
		        <?php
		        if(!empty($item_id)){
		        		foreach ($data_vendor_details as $key_vendor_data => $value_vendor_data) {
	        		?>
	        		['<?=$data_vendor_details[$key_vendor_data]['item_detail_id']?>', <?=$data_vendor_details[$key_vendor_data]['sum_year']?> , "green"],
	        		<?php }

		        }else{
		        		?>
		        	['0',0],
		       <?php  }
		        ?>

		 
				
		       
		      ]);

		      var view = new google.visualization.DataView(data);
		      view.setColumns([0, 1,
		                       { calc: "stringify",
		                         sourceColumn: 1,
		                         type: "string",
		                         role: "annotation" },
		                       2]);

		      var options = {
		        title: "Total Order Item Wise  Vendor Name :- <?=$Organisation_name?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
		        backgroundColor:'#a9e8f9',
		        // axes: {
		        //     x: {
		        //       0: { side: 'top', label: '->'} // Top x-axis.
		        //     }
		        //   },

		        // width: 600,
		        height: 400,
		        bar: {groupWidth: "95%"},
		        legend: { position: "none" },
		      };
		      var chart = new google.visualization.ColumnChart(document.getElementById("chart_div1"));
		      chart.draw(view, options);
		  }
		</script>
					    
					
        
		
					        		        
					    
					