<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$query_design = $this->db->get('master_project');
$data_array_buyer=$this->procurement_user->get_procurement_buyer_list();

$table='master_vendor_detail';
$query_vendor_detail=$this->db->get($table);

$buyer_id_new=$job_code_id=$ending_id=$Starting_id="";
$send_button_id=$this->input->post('send_button');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $job_code_id=$this->input->post('job_code');
    $Starting_id=($this->input->post('Starting'));
    $ending_id=($this->input->post('ending'));
    // $buyer_id_new=$this->input->post('buyer_id');
}else{
   $buyer_id_new=$job_code_id=$ending_id=$Starting_id="";
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
                // $buyer_id=$this->input->post('buyer_id');
                // ,'status'=>1, 'mr_status'=>1
                $date_year=date('Y');
                // ,'YEAR(original_schedule)'=>$date_year ,'MONTH(original_schedule)'=>$job_code_month
				$data_check = array('job_code' => $job_code);               
                foreach ($query_design->result() as $key_job_code) {
                    if($key_job_code->Project_Slno==$job_code){
                        $project_details_info=$key_job_code->job_Code." [ ".$key_job_code->Project_Name." ]";
                        $job_Code=$key_job_code->job_Code;
                        $project_Description=$key_job_code->project_Description;
                        $Project_Name=ucwords($key_job_code->Project_Name);
                    }
                }
                // foreach ($data_array_buyer['user_buyer_list'] as $key_buyer) {
                //     if($key_buyer->slno==$buyer_id){
                //         $buyer_name=$key_buyer->Username." [ ".$key_buyer->email_id." ]";
                //         $buyer_email_id=$key_buyer->email_id;
                //         $buyer_name_id=ucwords($key_buyer->Username);
                //     }
                // }
                 $Starting=date('d-m-Y',strtotime($this->input->post('Starting')));
                $ending=date('d-m-Y',strtotime($this->input->post('ending')));

                $Starting_query=date('Y-m-d',strtotime($this->input->post('Starting')));
                $ending_query=date('Y-m-d',strtotime($this->input->post('ending')));
                $this->db->where('master_pr_schedule.original_schedule >=', $Starting_query);
                $this->db->where('master_pr_schedule.original_schedule <=', $ending_query);
                $query_pr=$this->db->get_where($table,$data_check);
                $commercial_count=$incom=$comp=0;
               
				
               
				?>
			<div class="panel panel-inverse">
				<div class="panel-heading">					
					<h4 class="panel-title"> Project Name :- <?=$project_details_info?>  </h4> 

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
                                    $data_buyer_detail_comm=$data_buyer_detail_tech=$data_buyer_detail=$data_buyer = array();
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
                                        $data_check=array('pr_no'=>$pr_no,'buyer_user_id!='=>"");
										$query_check=$this->db->get_where('master_pr_process_detail',$data_check);
										if($query_check->num_rows()==1){
                                            $result_process_pr=$query_check->result();
                                            $short_value_pr=$result_process_pr[0];
                                            $procurement_date=date('d-m-Y',strtotime($short_value_pr->procurement_date));
                                            $buyer_date_comm=date('d-m-Y',strtotime($short_value_pr->buyer_date_comm));
                                            $query_number_ven=$this->db->get_where('master_bid_Com_vendor_m',array('pr_no'=>$pr_no,'submission_status'=>1));
                                            $buyer_id=$short_value_pr->buyer_user_id;
                                            foreach ($data_array_buyer['user_buyer_list'] as $key_buyer) {
                                                if($key_buyer->email_id==$buyer_id){
                                                    $buyer_name=$key_buyer->Username." [ ".$key_buyer->email_id." ]";
                                                    $buyer_email_id=$key_buyer->email_id;
                                                    $buyer_name_id=ucwords($key_buyer->Username);

                                                    $data_buyer[] =$buyer_name_id;
                                                    $data_buyer_detail[]= array('buyer_id' => $buyer_name_id);
                                                }
                                            }

                                            $total_no_received_offer=$query_number_ven->num_rows();
                                            $technical_complete_status=$short_value_pr->technical_complete_status;
                                            if($technical_complete_status==1){
                                                $technical_date=date('d-m-Y',strtotime($short_value_pr->technical_date));
                                                 $data_buyer_detail_tech[]= array('buyer_id' => $buyer_name_id);
                                            }else{
                                                $technical_date='Pending';
                                            }
                                            $commercial_complete_status=$short_value_pr->commercial_complete_status;
                                            if($commercial_complete_status==1){
                                                $commercial_date=date('d-m-Y',strtotime($short_value_pr->commercial_date));
                                                $date1_orginal = date('Y-m-d',strtotime($scheduled_order));  
                                                 $data_buyer_detail_comm[]= array('buyer_id' => $buyer_name_id);
                                                $date1=date_create($date1_orginal);
                                                $date2=date_create($commercial_date);
                                                $diff=date_diff($date1,$date2);

                                                $Bid_master_id_com=$short_value_pr->comm_bid;
                                                $this->db->where('master_pr_bid_qoute_item_final_approve.Bid_master_id_com', $Bid_master_id_com);
                                                $query_supplyer_wise=$this->db->get('master_pr_bid_qoute_item_final_approve')->result();
                                                // echo $this->db->last_query();
                                                // print_r($query_supplyer_wise);
                                                foreach ($query_vendor_detail->result() as $value) {
                                                    if($query_supplyer_wise[0]->Vendor_id==$value->Vendor_email_id){

                                                        $Organisation_name_ven=$value->Organisation_name;

                                                    }
                                                }
											// echo $diff->format("%R%a days");
											$value_delay=$diff->format("%R%a days");
                                            }else{
                                                $commercial_date='Pending';
                                                $value_delay='Pending';
                                                $Organisation_name_ven="--";
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
                                    <td><?=$Organisation_name_ven?></td>
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

                <br>
                <br>
                <br>
                <div class="container">
                    <?php
                        if(!empty($data_buyer)){
                            $data_buyer_new=array_unique($data_buyer);
                            // print_r($data_buyer_new);
                            $sort_buyer_new=sort($data_buyer_new);
                            // print_r($sort_buyer_new);
                            foreach ($data_buyer_new as $key_buyer):
                                // echo $key_buyer;
                                $total_pr=0;
                                foreach ($data_buyer_detail as $key_buy => $value_buy) {
                                    if($data_buyer_detail[$key_buy]['buyer_id']==$key_buyer){
                                        $total_pr++;  
                                    }  
                                }
                                $total_pr_tech=0;
                                 foreach ($data_buyer_detail_tech as $key_buy_tech => $value_buy) {
                                    if($data_buyer_detail_tech[$key_buy_tech]['buyer_id']==$key_buyer){
                                        $total_pr_tech++;  
                                    }  
                                }
                                $total_pr_comm=0;
                                 foreach ($data_buyer_detail_comm as $key_buy_comm => $value_buy) {
                                    if($data_buyer_detail_comm[$key_buy_comm]['buyer_id']==$key_buyer){
                                        $total_pr_comm++;  
                                    }  
                                }

                                $data_buyer_graph[] = array('buyer_name' =>$key_buyer, 'total_pr_no'=>$total_pr,'total_tech_no'=>$total_pr_tech ,'total_comm_no'=>$total_pr_comm  );
                                # code...
                            endforeach;
                            ?>
                            <div class="row justify-content-lg-center" >
                                <div class="col-lg-6 offset-md-1">
                                   
                                        <table class="table table-bordered text-center" border="1">
                                        <tr>
                                            <th>Buyer Name</th>
                                            <th>Pr Allocated No</th>
                                            <th>Technically Cleared No</th>
                                            <th>Actually order Settlement No</th>
                                        </tr>
                                            <?php
                                            foreach ($data_buyer_graph as $key_info => $value_id) {
                                                ?>
                                                <tr>
                                                    <td><?=$data_buyer_graph[$key_info]['buyer_name']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_pr_no']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_tech_no']?></td>
                                                    <td><?=$data_buyer_graph[$key_info]['total_comm_no']?></td>
                                                </tr>

                                                <?php
                                                # code...
                                            }
                                            ?>
                                        </table>
                                    </div>
                              
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                      <div id="columnchart_material" ></div>
                                </div>
                            </div>
                 <?php    }?>
               
             </div>
                        

            </div>
        </div>
    </div>
		<?php }?>
        </div>
        <!-- end #content -->	
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar','controls']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Buyer Name', 'Pr Allocated No', 'Technically Cleared No', 'Actually order Settlement No'],
            <?php
                foreach ($data_buyer_graph as $key_info => $value_id) :
            ?>
            ['<?=$data_buyer_graph[$key_info]['buyer_name']?>', <?=$data_buyer_graph[$key_info]['total_pr_no']?>, <?=$data_buyer_graph[$key_info]['total_tech_no']?>, <?=$data_buyer_graph[$key_info]['total_comm_no']?>],

        <?php endforeach; ?>

          // ['2014', 1000, 400, 200],
          // ['2015', 1170, 460, 250],
          // ['2016', 660, 1120, 300],
          // ['2017', 1030, 540, 350]
        ]);
      

            var view = new google.visualization.DataView(data);

            view.setColumns([0, //The "descr column"
            1, //Pr Allocated No
            {
                calc: "stringify",
                sourceColumn: 1, // Create an annotation column with source column "1"
                type: "string",
                role: "annotation"
            },
            2, // Technically Cleared No
            {
                calc: "stringify",
                sourceColumn: 2, // Create an annotation column with source column "2"
                type: "string",
                role: "annotation"
            },
            3, //Actually order Settlement No
            {
                calc: "stringify",
                sourceColumn: 3, // Create an annotation column with source column "2"
                type: "string",
                role: "annotation"
            }

            ]);
        var options = {
           
            chart: {
                title: 'Buyer Productivity Analysis (BPA)',
                subtitle: 'Project Name :- <?=$project_details_info?> For Period From : - <?=$Starting?> To :- <?=$ending?>',
                legend: { position: "bottom" }
            },
            colors: ['#1b9e77', '#d95f02', '#7570b3'],
            width: 600,
            height: 400,
             // legend: { position: "top" },
        // bar: {groupWidth: "95%"},
           dataTable: view

        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        //  var chart = new google.visualization.ChartWrapper({
        //     chartType: 'ColumnChart',
        //     containerId: 'columnchart_material',
        //     dataTable: view
        // });

        // columnWrapper.draw();
          // var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_material"));
              chart.draw(data,view, google.charts.Bar.convertOptions(options));

        // chart.draw(data,view, google.charts.Bar.convertOptions(options));
      }
       function getValueAt(column, dataTable, row) {
        return dataTable.getFormattedValue(row, column);
      }
    </script>
		
					        		        
					    
					