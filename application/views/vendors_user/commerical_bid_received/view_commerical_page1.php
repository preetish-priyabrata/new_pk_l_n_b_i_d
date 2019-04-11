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
			<form action="<?=base_url()?>seller/user-vendor-bid-submission-commerical-save-pr" method="POST">
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
								<td colspan="5">Sub total</td>
								<td ><input type="text" readonly="readonly" class="form-control" id="total" name="sub_total" required=""value="<?=$result_table1[0]->sub_total?>" </td>
							</tr>
							<tr>
								<td colspan="5">Total Tax</td>
								<td ><input type="text"  class="form-control" id="total_tax" onkeyup="fix_cala('tax')" name="total_tax"  value="<?=$result_table1[0]->total_tax?>"  </td>
							</tr>
							<tr>
								<td colspan="5">Total Landed Cost </td>
								<td ><input type="text"  readonly="readonly" class="form-control" id="total_landed" name="total_landed"  value="<?=$result_table1[0]->total_price?>"  /></td>
							</tr>
							<tr>
								<td colspan="5">User Assumption Charges </td>
								<td ><input type="text" class="form-control" id="user_assmption" name="user_assumption" value="<?=$result_table1[0]->user_assumption_charge?>"/></td>
							</tr>
							<tr>
								<td colspan="5">Delivery Basis</td>
								<td ><input type="text" class="form-control" id="delivery_basis" name="delivery_basis"  value="<?=$result_table2[0]->field_value?>"required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Guarantee / Warranty</td>
								<?php if($result_table2[1]->field_name=='gaurantee warranty'){

									$gaurantee_warranty=$result_table2[1]->field_value;
								}else{
										$gaurantee_warranty="";
								}?>
								<td ><input type="text"  class="form-control" id="gaurantee_warranty" name="gaurantee_warranty" value="<?=$gaurantee_warranty?>"required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Delivery Schedule</td>
								<?php if($result_table2[2]->field_name=='delivery schedule'){

									$delivery_schedule=$result_table2[2]->field_value;
								}else{
										$delivery_schedule="";
								}?>
								<td ><input type="text"  class="form-control" id="delivery_schedule" name="delivery_schedule" value="<?=$delivery_schedule?>"required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Payment Terms</td>
								<?php if($result_table2[3]->field_name=='payment terms'){

									$payment_terms=$result_table2[3]->field_value;
								}else{
										$payment_terms="";
								}?>
								<td ><input type="text" class="form-control" id="payment_terms" name="payment_terms"  value="<?=$payment_terms?>" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Validity of Offer</td>
								<?php if($result_table2[4]->field_name=='validity of offer'){

									$validity_of_offer=$result_table2[4]->field_value;
								}else{
										$validity_of_offer="";
								}?>
								<td ><input type="text"  class="form-control" id="validity_of_offer" name="validity_of_offer" value="<?=$validity_of_offer?>" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Security BG</td>
								<?php if($result_table2[5]->field_name=='security BG'){

									$security_BG=$result_table2[5]->field_value;
								}else{
										$security_BG="";
								}?>
								<td ><input type="text" class="form-control" id="security_BG" name="security_BG" value="<?=$security_BG?>" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Liquidity Damage</td>
								<?php if($result_table2[6]->field_name=='liquidity damage'){

									$liquidity_damage=$result_table2[6]->field_value;
								}else{
										$liquidity_damage="";
								}?>
								<td ><input type="text" class="form-control" id="liquidity_damage" name="liquidity_damage" value="<?=$liquidity_damage?>" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Remarks</td>
								<?php if($result_table2[7]->field_name=='remarks'){

									$remarks=$result_table2[7]->field_value;
								}else{
										$remarks="";
								}?>
								<td ><textarea  class="form-control" id="remarks" name="remarks"  required="" /><?=$remarks?>"</textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div class="form-group row pull-right">
                <div class="col-md-12">
                <?php 	$today=date('Y-m-d');
          	 	if($date_end < $today) {

          	 	}else{
          	 		?>
                	<input type="button" value="Total" id="to_cal" onclick="totalIt()" />
                    <button type="submit" id="to_sub" class="btn btn-sm btn-primary m-r-5">Sent</button>
              <?php  }  ?>
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







	 





