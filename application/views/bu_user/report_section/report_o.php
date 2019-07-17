<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$this->db->where('status', '1');
$query_category_item= $this->db->get('master_category_item');
// $query_data = $this->db->get('master_pr_bid_qoute_item_final_approve');12345php

$query_project = $this->db->get('master_project');

$query_vendor_detail=$this->db->get('master_vendor_detail');

$material_item_name=$technical_details=$slno_master_item=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$slno_master_item=$this->input->post('slno_master_item');
	$Starting_id=($this->input->post('Starting'));
	$ending_id=($this->input->post('ending'));

	 $this->db->where('slno_master_item', $slno_master_item);
     $query_material=$this->db->get('master_category_item')->result();
     $technical_details=$query_material[0]->technical_details;
     $material_item_name=$query_material[0]->material_item_name;
}else{
	$slno_master_item=$ending_id=$Starting_id="";
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
				<li class="breadcrumb-item active">Report O</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h3 class="page-header">Material Price trend (MPT)<small></small></h3>
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
										<label class="col-form-label col-md-3" for="slno_master_item">Material Name  <span style="color: red">*</span> </label>
										<div class="col-md-9">
											<input type="text" name="title" class="form-control material_name" value="<?=$material_item_name?>" id="title" placeholder="Material Name" style="width:500px;" required="">
											<input type="hidden" name="slno_master_item" class="form-control material_name" id="slno_master_item"  style="width:500px;" required="" value="<?=$slno_master_item?>">
										</div>
									</div>

									<div class="form-group row m-b-15">
										<label class="col-form-label col-md-3" for="slno_master_item">Description</label>
										<div class="col-md-9">
											<textarea name="description"  id="description" readonly class="form-control" placeholder="Description" style="width:500px;" required=""><?=$technical_details?></textarea>
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
                                                <input type="text" class="form-control  m-b-5" name="ending" id="datetimepicker7" placeholder="Ending  Date" required="" value="<?=$ending_id?>" />
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
                $slno_master_item=$this->input->post('slno_master_item');
                foreach ($query_category_item->result() as $value) {
                    if($slno_master_item==$value->slno_master_item){
                        $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
                        $material_name=$value->material_item_name;
                        $material_id=$value->material_item_id;
                        $UOM=$value->uom;
                          
                       
                    }
				}
				$Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
				$ending=date('d-m-Y',strtotime($this->input->post('ending')));

				$Starting_query=date('Y-m-d H:i:s',strtotime($this->input->post('Starting')));
				$ending_query=date('Y-m-d H:i:s',strtotime($this->input->post('ending')));
				$this->db->from('master_pr_bid_qoute_item_final_approve');
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates >=', $Starting_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.commerical_entry_name_dates <=', $ending_query);
				$this->db->where('master_pr_bid_qoute_item_final_approve.Item_id', $material_id);
				$query_supplyer_wise=$this->db->get();
				// echo $this->db->last_query();
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Material Name :- <?=$material_name_detail?> </h4> 

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
                        <table id="table1bu" class="table table-bordered" border="1">
                            <thead>
                                <tr>
                                    <th>Material Code</th>
									<th>Material Name</th>
									<th>PR No</th>
									<th>Po No</th>
									<th>PO date</th>
                                    <th>UOM</th>
                                    <th>Qty.</th>
                                    
                                    <th>Unit Price </th>
                                    <th>Project Name</th>
                                    <th>Supplier Name</th>
                                    <th>Total PO basic Value</th>

                                 
                                </tr>
                            </thead>
                            <tbody>
							<?php
									$project_id=$project_detail_order=$date_graph = array();
									if($query_supplyer_wise->num_rows()!=0){
									foreach($query_supplyer_wise->result() as $row):
										$Unit_price=$row->Unit_price;
										$Total_unitprice=$row->Total_unitprice;
										$commerical_entry_name_dates=$row->commerical_entry_name_dates;
										$date_graph[] = array('po_date' => date('d-m-Y',strtotime($commerical_entry_name_dates)), 'price_in'=>$Unit_price);
										
										$query_supplyer_wise_info=$this->db->get('master_pr_process_detail',array('pr_no'=>$row->pr_no));
										$new_inform=$query_supplyer_wise_info->result();
										$short_information=$new_inform[0];
										foreach ($query_project->result() as $key_job_code):
													if($key_job_code->Project_Slno==$short_information->project_slno){
														$project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
														$job_Code=$key_job_code->job_Code;
														
														$Project_Name=ucwords($key_job_code->Project_Name);

														$project_detail_order[] = array('project_slno' =>$short_information->project_slno ,'project_name' =>$Project_Name,'Total_unitprice'=>$Total_unitprice);
														$project_id[]=($short_information->project_slno);
													}

										endforeach;
										$Vendor_id=$row->Vendor_id;
										foreach ($query_vendor_detail->result() as $value) {
											if($Vendor_id==$value->Vendor_email_id){
												// $material_name_detail=$value->material_item_name." [ ".$value->material_item_id." ]";
												$Organisation_name=$value->Organisation_name;
												// $material_id=$value->material_item_id;
												// $UOM=$value->uom;
												
													$vendor_detail_order[] = array('Vendor_id' =>$Vendor_id ,'Organisation_name' =>$Organisation_name,'Total_unitprice'=>$Total_unitprice);
													$vendor_id[]=($Vendor_id);
												
						
											}
										}
										$bu_query_information=$this->db->get_where('master_tracking_tools_m',array('pr_no'=>$row->pr_no));
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
											$Order_value=$short_bu_result->Order_value;
											if(!empty($Order_value)){
												$Order_value_details=(($Order_value));
											}else{
												$Order_value_details='--';
											}
										}else{
											$Order_value_details=$Po_date_details=$po_no_details='--';
										}
                                 ?>
                                    <tr>
                                    <td><?=$material_id?></td>
                                    <td><?=$material_name?></td>
									<td><?=$row->pr_no?></td>
									<td><?=$po_no_details?></td>
									<td><?=$Po_date_details?></td>
                                    <td><?=$UOM?></td>
                                    <td><?=$row->Quantity?></td>		
                                    <td><?=$Unit_price?></td>
                                    <td><?=$Project_Name?></td>
                                    <td><?=$Organisation_name?></td>
                                    <td><?=$Total_unitprice?></td>
									</tr>
								<?php 
								endforeach;
							}?>
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
					$data_project = array();
					if(!empty($project_id)){
						$project_id_new=array_unique($project_id);
				
						$data_project = array();
						// print_r($project_id_new);
						foreach ($project_id_new as $key_project_sln => $value_project_sln) :
							# code...
							$total_price=0;
							foreach ($project_detail_order as $key_project => $value_project) {
								$project_slno=$project_detail_order[$key_project]['project_slno'];
								if($project_slno==$value_project_sln){
									$project_name_list=$project_detail_order[$key_project]['project_name'];
									$Total_unitprice_list=$project_detail_order[$key_project]['Total_unitprice'];
									$total_price=$total_price+$Total_unitprice_list;
								}
							}
							$data_project[]=array('project_id_name'=>$project_name_list,'sum_project'=>$total_price);
						endforeach;
					}
					$data_vendor_details = array();
					if(!empty($vendor_id)){
						$vendor_id_new=array_unique($vendor_id);
				
						$data_vendor_details = array();
						// print_r($project_id_new);
						foreach ($vendor_id_new as $key_vendor_slno => $value_vendor_slno) :
							# code...
							$total_price=0;
							foreach ($vendor_detail_order as $key_vendor_id => $value_vendor_id) {
								$Vendor_id=$vendor_detail_order[$key_vendor_id]['Vendor_id'];
								if($Vendor_id==$value_vendor_slno){
									$Organisation_name_id=$vendor_detail_order[$key_vendor_id]['Organisation_name'];
									$Total_unitprice_list=$vendor_detail_order[$key_vendor_id]['Total_unitprice'];
									$total_price=$total_price+$Total_unitprice_list;
								}
							}
							$data_vendor_details[]=array('Organisation_name_id'=>$Organisation_name_id,'sum_project'=>$total_price);
						endforeach;
					}
	        		// foreach ($date_graph as $key_date => $value_date) {
	        		// 	print_r($date_graph[$key_date]['po_date']);
					
	        		// }
					if(!empty($project_id)){
					?> 
				</div>
					<div class="row">
					<div class="col-lg-12">
						<div id="curve_chart" ></div>
					</div>
					
				</div>
				<br>
					<br>
					<br>
					<br>
				<div class="row">
					<div class="col-lg-12">
						<div id="chart_div" ></div>
					</div>
				</div>
				<br>
					<br>
				<div class="row">
					
					<div class="col-lg-12">
						<div id="chart_div1" ></div>
					</div>

				</div>
					<?php }?>


					
				</div>
			</div>
		<?php }?>
        </div>
        <!-- end #content -->			
	<script type="text/javascript">
      	google.charts.load('current', {'packages':['corechart']});
      	google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	        	['Date', 'Materials Trend'],
	        	
	        	<?php 
	        		foreach ($date_graph as $key_date => $value_date) {
	        			?>
	        		['<?=$date_graph[$key_date]['po_date']?>', <?=$date_graph[$key_date]['price_in']?> ],
	        		<?php }?>
	          
	        ]);
	        var view = new google.visualization.DataView(data);
			    view.setColumns([0, 1, {
			        calc: 'stringify',
			        sourceColumn: 1,
			        type: 'string',
			        role: 'annotation'
			    }]);
	        var options = {
	          title: 'Materials Tend Report of Materials Name :- <?=$material_name?> for period From:- <?=$Starting?> To:-  <?=$ending?> ',
	          curveType: 'function',
	           backgroundColor:'#a9e8f9',
	            height: 400,
				// tooltip: { trigger: 'selection' },
	          legend: { position: 'bottom' }
	        };

        	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        	chart.draw(view,options);
      	}
    </script>
	       	<!-- end #content -->
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart']});
		    google.charts.setOnLoadCallback(drawChart);
		    function drawChart() {
		      var data = google.visualization.arrayToDataTable([
		        ["Project Name", "Number", { role: "style" } ],
		        <?php
		        if(!empty($project_id)){
		        		foreach ($data_project as $key_project_data => $value_project_data) {
	        		?>
	        		['<?=$data_project[$key_project_data]['project_id_name']?>', <?=$data_project[$key_project_data]['sum_project']?> , "#b87333"],
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
		        title: "Project Wise Total order Value of Materials Name :- <?=$material_name?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
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
		        ["Vendor Name", "Number", { role: "style" } ],
		        <?php
		        if(!empty($vendor_id)){
		        		foreach ($data_vendor_details as $key_vendor_data => $value_vendor_data) {
	        		?>
	        		['<?=$data_vendor_details[$key_vendor_data]['Organisation_name_id']?>', <?=$data_vendor_details[$key_vendor_data]['sum_project']?> , "green"],
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
		        title: "Vendor Wise Total order Value of Materials Name :- <?=$material_name?> for period From :-   <?=$Starting?>  To :-   <?=$ending?>  ",
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
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).on('keydown', '.material_name', function() {
					var id = this.id;
					var splitid = id.split('_');
					var index = splitid[1];

					$( '#'+id ).autocomplete({
					   source: function( request, response ) {
					    $.ajax({
					     url: "<?=base_url()?>search-material-query",
					     type: 'post',
					     dataType: "json",
					     data: {
					      search: request.term,request:1
					     },
					     success: function( data ) {
					      response( data );
					     }
					    });
					   },
					   select: function (event, ui) {
					    $(this).val(ui.item.label); // display the selected text
					    var userid = ui.item.value; // selected value

					    // AJAX
					    $.ajax({
					     url: '<?=base_url()?>search-material-query',
					     type: 'post',
					     data: {userid:userid,request:2},
					     dataType: 'json',
					     success:function(response){
					 
					      var len = response.length;

					      if(len > 0){
					       var id = response[0]['id'];
					       var material_item_name = response[0]['material_item_name'];
					       var material_item_id = response[0]['material_item_id'];
					       var technical_details = response[0]['technical_details'];
					       var uom = response[0]['uom'];

					       // Set value to textboxes
					       document.getElementById('slno_master_item').value = id;
					       // document.getElementById('title').value = material_item_name;
					       document.getElementById('description').value = technical_details;
					       // document.getElementById('email_'+index).value = material_item_id;
					       // document.getElementById('salary_'+index).value = uom;
					 
					      }
					 
					     }
					    });

					    return false;
					   }
					});


				});
			});
		</script>
					    
					