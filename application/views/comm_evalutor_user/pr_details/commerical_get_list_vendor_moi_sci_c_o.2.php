<?php 
//  this only commerial bid for closed bid for moi and sci 
$commerical_email_id=$this->session->userdata('commerical_email_id');
if(empty($commerical_email_id)){
	
	redirect('comm-evalutor-logout-by-pass');
}
$type_bid=$type_bid;

$last_otp_id=$last_otp_id;

$pr_no=$pr_no;
$commercial_bid_ref=$commercial_bid_ref;
$commercial_bid_id=$commercial_bid_id;
 $Slno_bid=$comm_bid_db=$comm_bid_db;

$commercial_edit_id=$commercial_edit_id;
$commercial_resubmit_count=$commercial_resubmit_count;
$commercial_type_bid=$commercial_type_bid;

$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();
// print_r($result_process);

// project information
	$job_code=$result_process[0]->project_slno;
	$data_job_code = array('Project_Slno' =>$job_code);
	$query_job_code=$this->db->get_where('master_project',$data_job_code);
	$data_db_job_code=$query_job_code->result(); // here fetch information 
	$row_job_code = $data_db_job_code[0];
// location 
	$data_table2 = array('pr_no' =>$pr_no,'master_bid_id'=>$comm_bid_db);
	$query_table2=$this->db->get_where('master_bid_Com_details_m',$data_table2);
	$result_table2=$query_table2->result();
// commerical date
$data_table1= array('pr_no' =>$pr_no,'master_bid_id'=>$comm_bid_db);
$query_table1=$this->db->get_where('master_bid_Com_date_details_m',$data_table1);
$result_table1=$query_table1->result();
// master detail table
$data_table3 = array('pr_no' =>$pr_no,'Slno_bid'=>$comm_bid_db);
$query_table3=$this->db->get_where('master_bid_Com_m',$data_table3);
$result_table3=$query_table3->result();

$data_mr_no = array('pr_no' =>$pr_no);
	$query_mr_no=$this->db->get_where('master_mr_job_details_m',$data_mr_no);
	$data_db_jmr_no=$query_mr_no->result(); // here fetch information
	$row_mr_no = $data_db_jmr_no[0];

	$data=array('master_bid_id_com'=>$comm_bid_db);
		
	// $this->db->select_min('sub_total');
	$this->db->order_by('sub_total', 'asc');
	$this->db->order_by('date', 'asc');	
	$this->db->where('master_bid_id_com', $comm_bid_db);	
	$query_bid_sub=$this->db->get('master_pr_bid_qoute_item_total');
	// echo $this->db->last_query();
	foreach ($query_bid_sub->result() as $key_id) {
// 	// print_r($key_id);
		$array_vedeor_id[]= ($key_id->Vendor_id);
	

	}
if(!empty($array_vedeor_id)){
	$final_id_vendor=array_unique($array_vedeor_id); // will remove duplicate values
}else{
	  $this->session->set_flashdata('error_message',  'Sorry No vendor has Submitted Commerical information. Please Ask Buyer For looking to it . Here is bid id and bid reference no "' .$bid_info_buyer[0]->bid_id.'/'.$bid_info_buyer[0]->bid_ref.'"');
	// redirect('user-commerical-evalutor-home');
}
$data_table12= array('mr_no_item' =>$pr_no,'master_bid_id_comm'=>$comm_bid_db);
$query_table12=$this->db->get_where('master_mr_material_item_comm_m',$data_table12);
$query_get_list=$result_table12=$query_table1->result();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Comparative Statement</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	
	</head>
	<style type="text/css">
		html ,body {
			padding: 0;
			margin: 0;
			width: 100%;
			height: auto;
			background-color: white;
		}
		/* display this row with flex and use wrap (= respect columns' widths) */

		.row-flex {
			display: flex;
			flex-wrap: wrap;
		}


		/* vertical spacing between columns */

		[class*="col-"] {
			/*margin-bottom: 30px;*/
			margin-bottom: 2px;
		}
		#bordes{
			border: 1px solid red;
		}

		.content {
			height: 100%;
			padding: 20px 20px 10px;
		}
		.no-gutters {
			margin-right: 0;
			margin-left: 0;
		}
		 .col,[class*="col-"] {
					padding-right: 0;
					padding-left: 0;
		}
		
		table {
			border: 1px solid #ccc;
			border-collapse: collapse;
			/*table-layout: fixed;*/
			width: 100%;
		}
		table tr {
			border: 1px solid #ddd;
			padding: .35em;
		}
		table tr:nth-child(even) {
			background: #f8f8f8;  
		}
		table th,
		table td {
			padding: .625em;
			text-align: left;
		}
		table th {
			background: #999;
			color: #fff;
			font-size: .85em;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		table td {
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		table tr td:last-child{
			/*padding: .625em;*/
				background: #ccc;
				/*last-child*/
				/*nth-child*/
		}

	</style>
	<body >
		<?php 
			if(!empty($this->session->flashdata('success_message'))){?>
				<div class="alert alert-success fade show">
					<span class="close" data-dismiss="alert">×</span>
					<strong>Success!</strong>
						<?=$this->session->flashdata('success_message')?> 
				</div>
			<?php 
			} 
			if(!empty($this->session->flashdata('error_message'))){?>
				<div class="alert alert-danger fade show">
					<span class="close" data-dismiss="alert">×</span>
					<strong>Error !</strong>
					<?=$this->session->flashdata('error_message')?> 
				</div>
			<?php 
			}
			?>
		<form action="<?=base_url()?>commerrical-user-send-approve-nofication-pr" method="POST"  id="bid_tech" name="bid_tech" class="bid_tech">
		<div class="container-fluid">
			<div class="row ">
				<div class="jumbotron text-center" style="margin-bottom:0 ; width: 100%; padding: 1em">
					<h1>LARSEN & TOUBRO LIMITED</h1>
					<p>Center Procurement Dept , MMH SBG , <br>
						Godrej Waterside Tower -2 , 11th Floor , DP-5  <br>
						Sector V , Salt Lake  City . Kolkata :- 700091</p>
					<br>
					<b>[ COMPARATIVE STATEMENT ]</b>
				</div>
			</div>
			<hr>
				<input type="hidden" name="type_bid" value="<?=$type_bid?>">
				<input type="hidden" name="last_otp_id" value="<?=$last_otp_id?>">
				<input type="hidden" name="pr_no" value="<?=$pr_no?>">
				<input type="hidden" name="commercial_bid_ref" value="<?=$commercial_bid_ref?>">
				<input type="hidden" name="commercial_bid_id" value="<?=$commercial_bid_id?>">
				<input type="hidden" name="comm_bid_db" value="<?=$comm_bid_db?>">
				<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>">
				<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>">
				<input type="hidden" name="commercial_type_bid" value="<?=$commercial_type_bid?>">
				<div class="row row-flex no-gutters">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
						<div class="content colour-1">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="Project_Name">Project</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="Project_Name" id="Project_Name" type="text" value="<?=$row_job_code->Project_Name?>" required="">[<?=$row_job_code->job_Code?>]
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-3" for="activity_name">PR Nos</label>
								<div class="col-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="activity_name" id="activity_name" value="<?=$pr_no?>" type="text" required="">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="location_detail">Location</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="location_detail" id="location_detail" type="text" required="" value="<?=$result_table2[0]->location_detail?>">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="bid_id">Bid No</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="bid_id" id="bid_id" type="text" value="<?=$commercial_bid_id?>" required="">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="bid_start_date">Open Date</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="bid_start_date" id="bid_start_date" value="<?=$result_table1[0]->bid_start_date?>" type="text" required="">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="bid_closed_date">Closed Date</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="bid_closed_date" id="bid_closed_date" type="text" value="<?=$result_table1[0]->bid_closed_date?>" required="">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="mode_bid">Bid Type</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="mode_bid" id="mode_bid" type="text" value="<?=$result_table3[0]->mode_bid?>" required="">
								</div>
							</div>
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="mode_bid">ACE Value</label>
								<div class="col-md-9">
									<input readonly  class="form-control-plaintext" placeholder="Enter Activity name" name="mode_bid" id="mode_bid" type="text" value="<?=$result_table3[0]->Ace_value_detail?>" required="">
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
						<div class="content colour-3">
							<h3>Currency</h3>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>SRL</th>
										<th>Currency</th>
										<th>Rate</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>INR</td>
										<td>1.00</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="w-100"></div>
				<!-- here table of comparasation -->
				<div class="row">
					<div class="table-responsive">
						<?php
							$times_repeat=array_count_values($array_vedeor_id);
						?>
						<table class="table table-bordered" border="1" cellpadding="10" cellspacing="1" width="100%">
              <thead>
                <tr>
									<th  scope="row">#</th>                         	
                  <th><strong>Name</strong></th>                             
                  <th><strong>UOM</strong></th>
                  <th><strong>Quantity</strong></th>
                  <th><strong>Select Vendor</strong></th>
                  <?php 
											foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
												$id_count=$times_repeat[$userid_ven];
												echo '<th ><p class="text-center">'.$userid_ven.'</p>'
									?>
												<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
													<tr>
														<th width="25%"  scope="row">Currency</th>
														<th>
															<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																<thead>
																	<tr>
																		<th width="25%" colspan = "3"  scope="row"><p class="text-center"> Quoted Price(INR)</p></th>
																		<?php 
																			if($id_count!=1){
																				for ($i=1; $i <$id_count ; $i++) {
																		?>
																					<th width="25%" colspan = "3"  scope="row"><p class="text-center"> Negotiated Price <?=$i?> (INR)</p></th>
																		<?php
																				}
																			}
																		?>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<th width="25%"  scope="row">Unit Rate</th>
																		<th width="25%">Converted Rate</th>
																		<th width="25%">Total Price</th>
																		<?php 
																			if($id_count!=1){
																				for ($i=1; $i <$id_count ; $i++) { 
																		?>
																					<th width="25%"  scope="row"> Unit Rate</th>
																					<th width="25%">Converted Rate</th>
																					<th width="25%">Total Price</th>
																		<?php 
																				}
																			}
																		?>
																	</tr>
																</tbody>
															</table>
														</th>
													</tr>
												</table>
										<?php
											}
										?>
								</tr>
              </thead>
              <tbody>
							<?php
								$x=0;
                foreach ($query_table12->result() as $key_value){
									$slno_mat=$key_value->slno_item_mr;
									$x++;
							?>
									<input type="hidden" name="slno_mat_mateial[]" value="<?=$slno_mat?>">
                  <tr>
									</tr>
									<tr>
										<td><?=$x?></td>
										<td><?=$key_value->material_name?></td>
										<td><?=$key_value->material_unit?></td>
										<td><?=$key_value->material_quantity?></td>
										<td>
											<select class="form-control" name="vendor_apporved[<?=$slno_mat?>]">
											<?php 
												foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
													echo "<option value=".$userid_ven.">".$userid_ven."</option>";
												}
											?>
											</select>
										</td>
										<?php 
											foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
												$id_count=$times_repeat[$userid_ven];
												$date_im = array('Vendor_id' => $userid_ven,'Bid_master_id_com'=> $comm_bid_db,'comm_item_slno'=>$slno_mat);
												$data_ve_item=$this->db->get_where('master_pr_bid_qoute_item',$date_im);
										?>
												<td>
													<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
														<tr>
															<th width="25%">INR</th>
															<th>
																<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																	<tbody>
																		<?php 
																			foreach ($data_ve_item->result() as $key_item => $value_item) {
																				echo "<th width='25%'>".$value_item->Unit_price."</th>";
																				echo "<th width='25%'>".$value_item->Unit_price."</th>";
																				echo "<th width='25%'>".$value_item->Total_unitprice."</th>";
																			}
																		?>
																	</tbody>
																</table>
															</th>
														</tr>
													</table>
												</td>
										<?php
											}
										?>
									</tr>
							<?php
								}
							?>
							<tr>
								<th></th>
								<th colspan="4"><strong>Sub total (A)</strong></th>
								<?php
									foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
										$id_count=$times_repeat[$userid_ven];
										$date_Short = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
										$data_Short=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Short);
								?>
										<th>
											<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
												<tr>
													<th width="25%"></th>
													<!-- this will be inr blank -->
													<?php
														foreach ($data_Short->result() as $key_short => $value_short) {
													?>
															<th width="25%"></th>
															<th width="25%"></th>
															<th width="25%"><?=$value_short->sub_total?></th>
											<?php 
														}
											?></tr>
											</table>
										</th>
								<?php
									}
								?>
							</tr>
							<!-- Packing and Forwarding (P&F) Charges (B) -->
							<tr>
								<th></th>
								<th colspan="4"><strong>Packing and Forwarding (P&F) Charges (B)</strong></th>
								<?php 
										foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
											$id_count=$times_repeat[$userid_ven];
											$date_package = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
											$data_package=$this->db->get_where('master_pr_bid_qoute_item_total',$date_package);
								?>		
								<th>
											<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
												<tr>
													<th width="25%"></th>
													<!-- this will be inr blank -->
													<?php
														foreach ($data_package->result() as $key_package => $value_package) {
													?>
															<th width="25%"></th>
															<th width="25%"></th>
															<th width="25%">
																<?php
																	$package=$value_package->package;
																	if(!empty($package)){
																			echo $package;
																		}else{
																			echo 0;
																		}
																?>
															</th>
												<?php 
														}
												?>
												</tr>
											</table>
										</th>
									<?php
										}
									?>
								</tr>
									<!-- end  Packing and Forwarding (P&F) Charges (B) -->
									<!-- Transportation Charges (C) -->
								<tr>
									<th></th>
									<th colspan="4"><strong>Transportation Charges (C)</strong></th>
								<?php 
										foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
											$id_count=$times_repeat[$userid_ven];
											$date_Trans = array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
											$data_Trans=$this->db->get_where('master_pr_bid_qoute_item_total',$date_Trans);
								?>
									<th>
											<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
												<tr>
													<th width="25%"></th><!-- this will be inr blank -->
													<?php
														foreach ($data_Trans->result() as $key_Trans => $value_Trans) {
													?>
															<th width="25%"></th>
															<th width="25%"></th>
															<th width="25%">
																<?php
																		$Trans=$value_Trans->Trans;
																		if(!empty($Trans)){
																			echo $Trans;
																		}else{
																			echo 0;
																		}
																?>
															</th>
											<?php 
														}
											?>
												</tr>
											</table>
									</th>
									<?php
										}
									?>
								</tr>
								<!-- end  Transportation Charges (C) -->
								<tr>
									<th></th>
									<th colspan="4"><strong>Total Item Value (A+B+C)</strong></th>
									<?php 
										foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
											$id_count=$times_repeat[$userid_ven];
											$date_total= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
											$data_total=$this->db->get_where('master_pr_bid_qoute_item_total',$date_total);
									?>
									<th>
											<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
												<tr>
													<th width="25%"></th>
													<!-- this will be inr blank -->
													<?php
														foreach ($data_total->result() as $key_total => $value_total) {
													?>
															<th width="25%"></th>
															<th width="25%"></th>
															<th width="25%"><?=$value_total->total_price?></th>
											<?php 
														}
											?>
												</tr>
											</table>
										</th>
									<?php
										}
									?>
								</tr>
								<tr>
									<th></th>
									<th colspan="4"><strong>GST Type</strong></th>
									<?php 
											foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
												$id_count=$times_repeat[$userid_ven];
												$date_GST= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
												$data_GST=$this->db->get_where('master_pr_bid_qoute_item_total',$date_GST);
									?>
									<th>
												<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
													<tr>
														<th width="25%"></th>
														<!-- this will be inr blank -->
														<?php
																foreach ($data_GST->result() as $key_gst => $value_gst) {
														?>
																	<th width="25%"></th>
																	<th width="25%"></th>
																	<th width="25%">
														<?php 	$gst_type=$value_gst->gst_type;
																		if($gst_type==1){
																			echo 'CGST + SGST';
																		}else	if($gst_type==2){
																			echo 'IGST';
																		}else{
																			echo "--";
																		}
														?>
																	</th> 
														<?php 
																}
														?>
													</tr>
												</table>
											</th>
										<?php
											}
										?>
									</tr>
									<!-- cgst -->
									<tr>
										<th></th>
										<th colspan="4"><strong>CGST</strong></th>
										<?php
											foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
												$id_count=$times_repeat[$userid_ven];
												$date_CGST= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
												$data_CGST=$this->db->get_where('master_pr_bid_qoute_item_total',$date_CGST);
										?>
										<th>
											<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
												<tr>
													<th width="25%"></th>
													<!-- this will be inr blank -->
													<?php
														foreach ($data_CGST->result() as $key_CGST => $value_CGST) {
													?>
															<th width="25%"><?=$CGST=$value_CGST->CGST_percent?>%</th>
															<th width="25%"></th>
															<th width="25%">
																<?php 
																	$CGST_value=$value_CGST->CGST_value;
																	if(!empty($CGST_value)){
																		echo $CGST_value;
																	}else{
																		echo "--";
																	}
																?>
															</th>
											<?php }?>
												</tr>
											</table>
										</th>
									<?php }?>
								</tr>
								<!-- end Cgst -->
								<!-- sgst -->
								<tr>
									<th></th>
									<th colspan="4"><strong>SGST</strong></th>
									<?php 
											foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
												$id_count=$times_repeat[$userid_ven];
												$date_SGST= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
												$data_SGST=$this->db->get_where('master_pr_bid_qoute_item_total',$date_SGST);
									?>
									<th>
												<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
													<tr>
														<th width="25%"></th>
														<!-- this will be inr blank -->
														<?php
															foreach ($data_SGST->result() as $key_SGST => $value_SGST) {
														?>
																<th width="25%"><?=$SGST=$value_SGST->SGST_percent?>%</th>
																<th width="25%"></th>
																<th width="25%">
																	<?php
																		$SGST_value=$value_SGST->SGST_value;
																		if(!empty($SGST_value)){
																			echo $SGST_value;
																		}else{
																			echo "--";
																		}
																	?>
																</th>
												<?php }?>
													</tr>
												</table>
											</th>
										<?php }?>
									</tr>
									<!-- end Sgst -->
									<!-- Igst -->
									<tr>
										<th></th>
										<th colspan="4"><strong>IGST</strong></th>
										<?php 
												foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
													$id_count=$times_repeat[$userid_ven];
													$date_IGST= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
													$data_IGST=$this->db->get_where('master_pr_bid_qoute_item_total',$date_IGST);
										?>
										<th>	
													<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
														<tr>
															<th width="25%"></th>
															<!-- this will be inr blank -->
															<?php
																foreach ($data_IGST->result() as $key_IGST => $value_IGST) {
															?>
																	<th width="25%"><?=$IGST=$value_IGST->IGST_percent?>%</th>
																	<th width="25%"></th>
																	<th width="25%">
																		<?php
																			$IGST_value=$value_IGST->IGST_value;
																			if(!empty($IGST_value)){
																				echo $IGST_value;
																				
																			}else{
																				echo "--";
																			}
																		?>
																	</th>
													<?php }?>
													</tr>
												</table>
											</th>
									<?php
											}
									?>
									</tr>
									<!-- end Igst -->
									<!-- Total Item Value with GST -->
									<tr>
										<th></th>
										<th colspan="4"><strong>Total Item Value with GST</strong></th>
										<?php 
												foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
													$id_count=$times_repeat[$userid_ven];
													$date_total_gst_value= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
													$data_total_gst_value=$this->db->get_where('master_pr_bid_qoute_item_total',$date_total_gst_value);
										?>
										<th>
													<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
														<tr>
															<th width="25%"></th>
															<!-- this will be inr blank -->
															<?php
																	foreach ($data_total_gst_value->result() as $key_total_gst => $value_total_gst) {
															?>
																		<th width="25%"></th>
																		<th width="25%"></th>
																		<th width="25%">
																			<?php 
																					$total_gst_value=$value_total_gst->total_gst_value;
																					if(!empty($total_gst_value)){
																						echo $total_gst_value;
																					}else{
																						echo "--";
																					}
																			?>
																		</th>
														<?php }?>
														</tr>
													</table>
												</th>
												<?php
												}
												?>
											</tr>
											<!-- end Total Item Value with GST -->
											<!-- User Assumption Charges -->
											<tr>
												<th></th>
												<th colspan="4"><strong>User Assumption Charges</strong></th>
												<?php
														foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
															$id_count=$times_repeat[$userid_ven];
															$date_user_assumption_charge= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid);
															$data_user_assumption_charge=$this->db->get_where('master_pr_bid_qoute_item_total',$date_user_assumption_charge);
												?>
												<th>
															<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																<tr>
																	<th width="25%"></th>
																	<!-- this will be inr blank -->
																	<?php
																			foreach ($data_user_assumption_charge->result() as $key_user_assumption_charge => $value_user_assumption_charge) {
																	?>
																				<th width="25%"></th>
																				<th width="25%"></th>
																				<th width="25%"><?=$value_user_assumption_charge->user_assumption_charge?></th>
																<?php }?>
																</tr>
															</table>
														</th>
												<?php }?>
											</tr>
											<!-- Price Basis -->
											<tr>
												<th></th>
												<th colspan="4"><strong>Price Basis</strong></th>
												<?php 
														foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
															$id_count=$times_repeat[$userid_ven];
															$date_price_basis= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'price_basis');
															$data_price_basis=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_price_basis);
												?>
												<th>
															<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																<tr>
																	<th width="25%"></th>
																	<!-- this will be inr blank -->
																	<?php 
																			foreach ($data_price_basis->result() as $key_price_basis => $value_price_basis) {
																	?>
																				<th width="25%"></th>
																				<th width="25%"></th>
																				<th width="25%"><?=$value_price_basis->field_value?></th>
																<?php }?>
																</tr>
															</table>
												</th>
												<?php	}?>  
											</tr>
											<!-- Place Of Delivery -->
											<tr>
												<th></th>
												<th colspan="4"><strong>Place Of Delivery</strong></th>
												<?php 
														foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
															$id_count=$times_repeat[$userid_ven];
															$date_place_delivery= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'place_delivery');
															$data_place_delivery=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_place_delivery);
												?>
												<th>
															<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																<tr>
																	<th width="25%"></th>
																	<!-- this will be inr blank -->
																	<?php 
																			foreach ($data_place_delivery->result() as $key_place_delivery => $value_place_delivery) {
																	?>
																				<th width="25%"></th>
																				<th width="25%"></th>
																				<th width="25%"><?=$value_place_delivery->field_value?></th>
																<?php }?>
																</tr>
															</table>
												</th>
												<?php	}?>  
											</tr>
											<!-- Delivery Basis -->
											<tr>
												<th></th>
												<th colspan="4"><strong>Delivery Basis</strong></th>
												<?php 
														foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
															$id_count=$times_repeat[$userid_ven];
															$date_delivery_basis= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'delivery basis');
															$data_delivery_basis=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_delivery_basis);
												?>
												<th>
															<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
																<tr>
																	<th width="25%"></th>
																	<!-- this will be inr blank -->
																	<?php 
																			foreach ($data_delivery_basis->result() as $key_delivery_basis => $value_delivery_basis) {
																	?>
																				<th width="25%"></th>
																				<th width="25%"></th>
																				<th width="25%"><?=$value_delivery_basis->field_value?></th>
																<?php }?>
																</tr>
															</table>
												</th>
												<?php	}?>  
											</tr>
											<!-- Gurantee /Warranty -->
											<tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong> Gurantee / Warranty</strong></th> 
			                        <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_gaurantee= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'gaurantee warranty');
						 						$data_gaurantee=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_gaurantee);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_gaurantee->result() as $key_gaurantee => $value_gaurantee) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_gaurantee->field_value?></th> 
								 							<?php }?>
								 							</tr>

								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Delivery Schedule -->
			                    <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong> Delivery Schedule </strong></th> 
			                       <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_delivery= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'delivery schedule');
						 						$data_delivery=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_delivery);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_delivery->result() as $key_delivery => $value_delivery) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_delivery->field_value?></th> 
								 							<?php }?>
								 							</tr>

								 						

								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Payment Terms -->
			                    <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong> Payment Terms </strong></th> 
			                       	<?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_payment= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'payment terms');
						 						$data_payment=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_payment);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_payment->result() as $key_payment => $value_payment) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_payment->field_value?></th> 
								 							<?php }?>
								 							</tr>


								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Validity Of Offer -->
			                     <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong>Validity Of Offer</strong></th> 
			                        <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_validity= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'validity of offer');
						 						$data_validity=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_validity);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_validity->result() as $key_validity => $value_validity) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_validity->field_value?></th> 
								 							<?php }?>
								 							</tr>
								 						

								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Security BG -->
			                     <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong> Security BG</strong></th> 
			                        <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_security= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'security BG');
						 						$data_security=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_security);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_security->result() as $key_security => $value_security) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_security->field_value?></th> 
								 							<?php }?>
								 							</tr>

								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Liquidity Damage -->
			                     <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong>Liquidity Damage</strong></th> 
			                       	<?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_liquidity= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'liquidity damage');
						 						$data_liquidity=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_liquidity);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_liquidity->result() as $key_liquidity => $value_liquidity) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_liquidity->field_value?></th> 
								 							<?php }?>
								 							</tr>

								 						

								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                    <!-- Remarks -->
			                     <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong>Remarks</strong></th> 
			                        <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_remarks= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'remarks');
						 						$data_remarks=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_remarks);
								 				// 
								 				
								 				?>
								 				<th>
								 					<table class="table-bordered" cellpadding="10" cellspacing="1" width="100%">
								 							<tr>
								 								<th width="25%"></th> 
								 								<!-- this will be inr blank -->
								 								<?php 
								 								foreach ($data_remarks->result() as $key_remarks => $value_remarks) {

								 									?>
								 								<th width="25%"></th> 
								 								<th width="25%"></th> 
								 								<th width="25%"><?=$value_remarks->field_value?></th> 
								 							<?php }?>
								 							</tr>


								 					</table>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
			                      <!-- Remarks -->
			                     <tr>   
		                    		<th></th>                         	
			                        <th colspan="4"><strong>Notification</strong></th> 
			                        <?php 
								 			foreach ($final_id_vendor as $key_ven_id =>$userid_ven) {
								 				$id_count=$times_repeat[$userid_ven];
								 				$date_remarks= array('Vendor_id' => $userid_ven,'master_bid_id_com'=> $Slno_bid,'field_name'=>'remarks');
						 						$data_remarks=$this->db->get_where('master_pr_bid_qoute_item_misc',$date_remarks);
								 				// 
								 				
								 				?>
								 				<th>
								 					<select  class="form-control" name="vendor_notification[]">
								 						<option value="">--Please Select For Notification--</option>
								 						<option value="<?=$userid_ven?>"><?=$userid_ven?></option>
								 					</select>
								 					
								 				</th>
								 				</th>
								 					<?php
								 				
								 				
								 			}
										?>
		                           
			                       
			                    </tr>
                        </tbody>
                    </table>
                   

                </div>
			    </div>
			    <div class="w-100"></div>
			    
			    <div class="w-100"></div>
			    <div class="form-group row push-right float-right">
                    <div class="col-md-12">
                    	<input type="submit" name="Submit_btn" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure want to send Notification?');" value="Notification">
                    	<input type="submit" name="Submit_btn" class="btn btn-sm btn-success" onclick="return confirm('Are you sure want to Approved And Completed process bidding?');" value="Approved And Complete">
						<!-- <a href="<?=base_url()?>generate-otp-bid-referecnce/" class="btn btn-sm btn-primary">Notification </a> -->
						<a  href="<?=base_url()?>user-commerical-evalutor-home" class="btn btn-sm btn-info">Home</a>
                    </div>
                </div>
			    
			  
			    
			  <!-- </div> -->




		</div>
	</form>
	</body>
</html>
	