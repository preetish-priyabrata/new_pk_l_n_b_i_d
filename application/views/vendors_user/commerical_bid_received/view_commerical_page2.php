<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}

// vendor_slno_id'=>$vendor_slno_id,'type_bid'=>$bid_type_id,'Slno_simple'=>$Slno_simple
$vendor_slno_id=$vendor_slno_id; // vendor Bid Slno 
$bid_type_id=$type_bid; // type of bid close or open
$Slno_simple=$Slno_simple;



$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_commerical_pr($vendor_slno_id,$Vendor_email_id);
// print_r($result_title);
if($result_title['no_new_tech']!=1){
	$this->session->set_flashdata('error_message', 'Unable find Bid');
	redirect('user-vendor-home');
}

$pr_no=$result_title['new_tech_list'][0]->pr_no;


$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();

$slno_pr=$result_process[0]->pr_no_slno;
$job_code=$result_process[0]->project_slno;
$date_end=$result_title['new_tech_list'][0]->date_end;


$case_bid=$mode_bid=$result_title['new_tech_list'][0]->mode_bid;
$master_bid_id_com=$result_title['new_tech_list'][0]->master_bid_id;
$data_get_list_commerical = array('master_bid_id_comm' =>$master_bid_id_com ,'mr_no_item'=>$pr_no);
 $query_get_list=$this->db->get_where('master_mr_material_item_comm_m',$data_get_list_commerical);

// 
$get_data_item = array('Simple_id_slno' => $Slno_simple,'bid_slno'=> $vendor_slno_id, 'Vendor_id'=>$Vendor_email_id);
$item_infroamtion=$this->db->get_where('master_pr_bid_qoute_item',$get_data_item);
$data_table1 = array('simple_id_slno_total' => $Slno_simple,'vendor_Bid_slno'=> $vendor_slno_id, 'Vendor_id'=>$Vendor_email_id);

$query_table1=$this->db->get_where('master_pr_bid_qoute_item_total',$data_table1);
$result_table1=$query_table1->result();
//print_r($result_table1);
$data_table2 = array('simple_id_slno_misc' => $Slno_simple,'Bid_slno'=> $vendor_slno_id, 'Vendor_id'=>$Vendor_email_id);

$query_table2=$this->db->get_where('master_pr_bid_qoute_item_misc',$data_table2);
$result_table2=$query_table2->result();
//print_r($result_table2);


?>
<!-- begin #content -->
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-home">Home</a></li>
		<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-bid-new-commerical">New Commercial Bid Submission</a></li>
		<li class="breadcrumb-item active">Commercial Bid Submission Information</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Commercial Bid Submission<small></small></h1>
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

	?>
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">Submission of Commercial Bid</h4>
		</div>
		<div class="panel-body">
			<form action="#" >
				<input type="hidden" name="master_bid_id" value="<?=$master_bid_id_com?>">
				<input type="hidden" name="vendor_bid_id" value="<?=$vendor_slno_id?>">
				<input type="hidden" name="vendor_id" value="<?=$Vendor_email_id?>">
				<input type="hidden" name="mode_bid" value="<?=$mode_bid?>">
				<input type="hidden" name="mode_bid_id" value="<?=$type_bid?>">
				<input type="hidden" name="Category" value="<?=$type_bid?>">
				<input type="hidden" name="bid_ref" value="<?=$result_title['new_tech_list'][0]->bid_ref?>	">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Date_creation"> Bid Ref <span style="color: red"></span></label>
						<div class="col-md-9">

						<?=$result_title['new_tech_list'][0]->bid_ref?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Po_no">Start Date <span style="color: red"></span></label>
						<div class="col-md-9">
						<?=$result_title['new_tech_list'][0]->date_start?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Bg_submission_date">Title </label>
						<div class="col-md-9">
						<?=$result_title['new_tech_list'][0]->title?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Mfg_clear_date">Description <span style="color: red"></span></label>
						<div class="col-md-9">
							<?=$result_title['new_tech_list'][0]->description?>	
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Job_code"> Bid Id<span style="color: red"></span></label>
						<div class="col-md-9">
						<?=$result_title['new_tech_list'][0]->bid_id?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Po_date"> End Date <span style="color: red"></span></label>
						<div class="col-md-9">
						<?=$result_title['new_tech_list'][0]->date_end?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Advance_payment_date">Date of Query </label>
						<div class="col-md-9">
						<?=$result_title['new_tech_list'][0]->date_end?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Advance_payment_date"> Type of Bid </label>
						<div class="col-md-9">
							<?=$mode_bid?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h5 class="text-center">Material Information</h5>
					<hr style="height: 3px;background: #0257ab;margin-top: 1.5rem; margin-bottom: 1.5rem"/>
					<table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
						<thead>
							<tr>							
                                <th><strong>Name</strong></th>                                
                                <th><strong>Quantity</strong></th>
                                <th><strong>UOM</strong></th>
                                <th width="30%"><strong>Technical Parameter</strong></th>
                                <th>Unit Price</th>
								<th>Total Price</th>
                            </tr>						
						</thead>
						<tbody>							
							<?php 
							$x=0;
                    		foreach ($item_infroamtion->result() as $key_value) :
                    			$x++;
                    			
                    			
                    			
                    			
                    			
                    			
echo <<<EOD
	<tr>
		<td>{$key_value->Item_name}</td>
		<td>{$key_value->Quantity}</td>
		<td>{$key_value->Uom_unit}</td>
		<td>{$key_value->parameter_tech}</td>
		<td>{$key_value->Unit_price}</td>
		<td>{$key_value->Total_unitprice}</td>
	</tr>

EOD;
                    	endforeach;
                    		?>

                    			<tr>
								<td colspan="5">Sub total (A)</td>
								<td ><?=$result_table1[0]->sub_total?></td>
							</tr>
							<tr>
								<td colspan="5">Packing and Forwarding (P&F) Charges (B)</td>
								<td ><?php
								$package=$result_table1[0]->package;
								if(!empty($package)){
									echo $package;
								}else{
									echo 0;
								}
								?> </td>
							</tr>
							<tr>
								<td colspan="5">	Transportation Charges (C)</td>
								<td ><?php 
								$Trans=$result_table1[0]->Trans;
								if(!empty($Trans)){
									echo $Trans;
								}else{
									echo 0;
								}
								?> </td>
							
							</tr>
							<tr>
								<td colspan="5">Total Item Value (A+B+C) </td>
								<td ><?=$result_table1[0]->total_price?></td>
							</tr>
							<tr>
								<td colspan="5">GST Type  </td>
								<td >
								<?php 
								 $gst_type=$result_table1[0]->gst_type;
								if($gst_type==1){
									echo 'CGST + SGST';
								}else	if($gst_type==2){
									echo 'IGST';
								}else{
									echo "--";
								}
								?>							
								</td>
							</tr>
							<?php 
							if($gst_type!=0){
								if($gst_type==1){
							?>
							<tr>
								<td colspan="5">CGST  -><div class="text-right"> <?=$CGST=$result_table1[0]->CGST_percent?>%   </td>
								<td >
								<?=$CGST_value=$result_table1[0]->CGST_value?>
								
								</td>
							</tr>
							<tr>
								<td colspan="5">SGST  -><div class="text-right"> <?=$SGST=$result_table1[0]->SGST_percent?>% </div>  <input type="hidden" name="SGST" id='SGST' value="<?=$SGST/100?>"></td>
								<td >
								<?=$SGST_value=$result_table1[0]->SGST_value?>
									
								</td>
							</tr>
								<?php }else{?>
							<tr>
								<td colspan="5">IGST  -><div class="text-right"> <?=$IGST=$result_table1[0]->IGST_percent?>% </div>  <input type="hidden" name="IGST" id='IGST' value="<?=$IGST/100?>"></td>
								<td >
								<?php
								$IGST_value=$result_table1[0]->IGST_value;
								if(!empty($IGST_value)){
										$IGST_value;
									}else{
										echo "0.00";
									}
									?>
								</td>
							</tr>
								<?php } ?>
								<tr >
								<td colspan="5">Total Item Value with GST </td>
								<td >
								<?php echo  $total_gst_value=$result_table1[0]->total_gst_value;
									
								?>
								</td>
							</tr>
								<?php }?>
							<tr>
								<td colspan="5">User Assumption Charges </td>
								<td ><?=$result_table1[0]->user_assumption_charge?></td>
							</tr>
							<tr>
								<td colspan="5">Price Basis</td>
							
								<td >
								<?php 
									if(!empty($result_table2[8]->field_name)){
										if($result_table2[8]->field_name=='price_basis'){

											echo $price_basis=$result_table2[8]->field_value;
										}else{
											echo	$price_basis="";
										}
									}else{
										echo "--";
									}
										?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Place Of Delivery</td>
								
								<td >
								<?php 
										if(!empty($result_table2[9]->field_name)){
											if($result_table2[9]->field_name=='place_delivery'){

												echo $place_delivery=$result_table2[9]->field_value;
											}else{
												echo	$place_delivery="";
											}
										}else{
											echo "--";
										}
											?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Delivery Basis</td>
							
								<td >	
									<?php 
										if($result_table2[0]->field_name=='delivery basis'){
											echo $delivery_basis=$result_table2[0]->field_value;
										}else{
											echo $delivery_basis="";
										}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Guarantee / Warranty</td>
								
								<td ><?php 
											if($result_table2[1]->field_name=='gaurantee warranty'){

												echo $gaurantee_warranty=$result_table2[1]->field_value;
											}else{
												echo $gaurantee_warranty="";
											}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Delivery Schedule</td>
								
								<td >
								<?php if($result_table2[2]->field_name=='delivery schedule'){

												echo $delivery_schedule=$result_table2[2]->field_value;
											}else{
												echo $delivery_schedule="";
											}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Payment Terms</td>
								
								<td ><?php 
											if($result_table2[3]->field_name=='payment terms'){
												echo $payment_terms=$result_table2[3]->field_value;
											}else{
											echo $payment_terms="";
											}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Validity of Offer</td>
							
								<td >
								<?php 
									if($result_table2[4]->field_name=='validity of offer'){
										echo $validity_of_offer=$result_table2[4]->field_value;
									}else{
											echo $validity_of_offer="";
										}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Security BG</td>
								
								<td >
								<?php 
										if($result_table2[5]->field_name=='security BG'){

											echo $security_BG=$result_table2[5]->field_value;
										}else{
											echo $security_BG="";
										}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Liquidity Damage</td>
								
								<td >
								<?php 
									if($result_table2[6]->field_name=='liquidity damage'){

										echo $liquidity_damage=$result_table2[6]->field_value;
									}else{
											echo $liquidity_damage="";
									}?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Remarks</td>
								
								<td >
								<?php 
									if($result_table2[7]->field_name=='remarks'){

											echo $remarks=$result_table2[7]->field_value;
									}else{
											echo 	$remarks="";
									}?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div class="form-group row pull-right">
                <div class="col-md-12">
                
                    <a  href="<?=base_url()?>seller/user-vendor-home" class="btn btn-sm btn-default">Cancel</a> 
                </div>
            </div>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	 function calc(idx) {
	 		var cost=$("#cost"+idx).val();
	 		// alert(idx+":"+cost);
	 		var qntid=$("#qty"+idx).val();
	 		// alert(idx+":"+qntid);
		  var price = parseFloat(cost)*parseFloat(qntid);
		   // alert(idx+":"+price);  
		  document.getElementById("price"+idx).value= isNaN(price)?"0.00":price.toFixed(2);
	   
	}

	function totalIt() {
	  
	  var total=0;
	  for (var i=1;i<=<?=$x?>;i++) {
	    calc(i);  
	    var price = parseFloat(document.getElementById("price"+i).value);
	    total += isNaN(price)?0:price;
	  }
	  
	  document.getElementById("total").value=isNaN(total)?"0.00":total.toFixed(2);   
	   var sub_total=$('#total').val();    
	   var total_tax=$('#total_tax').val();   
	   var price_total = parseFloat(sub_total)+parseFloat(total_tax); 
	   document.getElementById("total_landed").value=isNaN(price_total)?"0.00":price_total.toFixed(2);
	   	$('#to_sub').show();
		$('#to_cal').hide();             
	}   
	function fix_cala(id){
		 $('#to_sub').hide();
		$('#to_cal').show();
	}
	$(document).ready(function(){
		$('#to_sub').hide();
	});
</script>







	 




