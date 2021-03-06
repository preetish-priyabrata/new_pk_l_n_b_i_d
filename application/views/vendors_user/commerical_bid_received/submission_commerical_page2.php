<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}


$value=$vendor_slno_id; // vendor Bid Slno 
$value1=$type_bid; // type of bid close or open


$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_commerical_pr($value,$Vendor_email_id);
// print_r($result_title);
if($result_title['no_new_tech']!=1){
	$this->session->set_flashdata('error_message', 'Unable find Bid');
	redirect('user-vendor-home');
}

$pr_no=$result_title['new_tech_list'][0]->pr_no;


$data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();
$comm_bid=$result_process[0]->comm_bid;  // bid id information
$slno_pr=$result_process[0]->pr_no_slno;
$job_code=$result_process[0]->project_slno;
$date_end=$result_title['new_tech_list'][0]->date_end;

$data_table6 = array('pr_no' =>$pr_no,'commercial_bid_id'=>$comm_bid);
$query_table6=$this->db->get_where('master_technical_commercial_terms_conditions',$data_table6);
$result_table6=$query_table6->result();


$slno=$result_table6[0]->slno;
$file_name=$result_table6[0]->file_name;



// $data_table1= array('Simple_id_slno' =>$Simple_id_slno);
// $query_table1=$this->db->get_where('master_pr_bid_quote_item',$data_table1);
// $result_table1=$query_table1->result();




$case_bid=$mode_bid=$result_title['new_tech_list'][0]->mode_bid;
$master_bid_id_com=$result_title['new_tech_list'][0]->master_bid_id;
$data_get_list_commerical = array('master_bid_id_comm' =>$master_bid_id_com ,'mr_no_item'=>$pr_no);
 $query_get_list=$this->db->get_where('master_mr_material_item_comm_m',$data_get_list_commerical);

 $gst_query=$this->db->get_where('master_gst',array('status'=>1));
 $get_result=$gst_query->result();
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
	<style>
/* Hide HTML5 Up and Down arrows. */
input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
 
input[type="number"] {
    -moz-appearance: textfield;
}
		</style>
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
			<h4 class="panel-title">Submission of commercial bid</h4>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>seller/user-vendor-bid-submission-commerical-save-pr" method="POST"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
				<input type="hidden" name="master_bid_id" value="<?=$master_bid_id_com?>">
				<input type="hidden" name="vendor_bid_id" value="<?=$value?>">
				<input type="hidden" name="vendor_id" value="<?=$Vendor_email_id?>">
				<input type="hidden" name="mode_bid" value="<?=$mode_bid?>">
				<input type="hidden" name="mode_bid_id" value="<?=$type_bid?>">
				<input type="hidden" name="Category" value="<?=$value1?>">
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
						<?=date('d-m-Y',strtotime($result_title['new_tech_list'][0]->date_start))?>	
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
						<?=date('d-m-Y',strtotime($result_title['new_tech_list'][0]->date_end))?>	
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-form-label col-md-3" for="Advance_payment_date">Date of Query </label>
						<div class="col-md-9">
						<?=date('d-m-Y',strtotime($result_title['new_tech_list'][0]->date_end))?>	
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
                    		foreach ($query_get_list->result() as $key_value) {
                    			$x++;
                    		
                    		?>
                    		<input type="hidden" readonly class="form-control-plaintext" name="slno_mat[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->slno_item_mr?>">
                    		<tr>
                               <td><input type="text" readonly class="form-control-plaintext" name="item_name[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->material_name?>">
							   <input type="hidden" readonly class="form-control-plaintext" name="Resubmission_count_id[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->Resubmission_count_id?>">
							    <input type="hidden" readonly class="form-control-plaintext" name="item_id[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->material_id?>">
							    <input type="hidden" readonly class="form-control-plaintext" name="edit_id[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->edit_id?>">
							</td>
							   <td><input type="text" id="qty<?=$x?>" readonly class="form-control-plaintext" name="item_qnt[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->material_quantity?>"></td>
							   <td><input type="text" readonly class="form-control-plaintext" name="item_uom[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->material_unit?>"></td>
							   <td width="30%">
									<input type="hidden" readonly class="form-control-plaintext" name="parameter_tech[<?=$key_value->slno_item_mr?>]" value="<?=$key_value->parameter_tech?>">
									<?=$key_value->parameter_tech?>
							    </td>
							   <td> <input type="number" autocomplete="off" id="cost<?=$x?>"  onkeyup="fix_cala(<?=$x?>)" name="cost[<?=$key_value->slno_item_mr?>]" min="0"step="0.01" title="Currency INR" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
" required /> </td>
                    			<td> <input type="text" readonly class="form-control-plaintext" id="price<?=$x?>" name="price[<?=$key_value->slno_item_mr?>]"   value='0'/> </td>

                            </tr>

                    		<?php
                    		}
                    		?>
                    			<tr>
								<td colspan="5">Sub total (A) </td>
								<td ><input type="number" readonly="readonly" class="form-control" id="total" name="sub_total" /></td>
							</tr>
						
							<tr>
								<td colspan="5">Packing and Forwarding (P&F) Charges (B)</td>
								<td>		<input type="number" min="0" autocomplete="off"  class="form-control" id="package" onkeyup="fix_cala('tax')" name="package"  value="0.00"  min="1"step="0.01" title="Currency INR" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
"></td>
							</tr>
							<tr>
								<td colspan="5">	Transportation Charges (C)</td>
								<td>		<input type="number" min="0" autocomplete="off"  class="form-control" id="Trans" onkeyup="fix_cala('tax1')" name="Trans"  value="0.00"  min="1"step="0.01" title="Currency INR" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
"></td>
							</tr>
						
							<tr>
								<td colspan="5">Total Item Value (A+B+C) </td>
								<td ><input type="text" autocomplete="off" readonly="readonly" class="form-control" id="total_landed" name="total_landed"  value="0.00" /></td>
							</tr>
							<tr>
								<td colspan="5">GST Type  </td>
								<td >
								<select onchange="getval(this);" name="gst_type" id="gst_type" class="form-control">
										<option value="1">CGST + SGST</option>
										<option value="2">IGST</option>
								</select>
								</td>
							</tr>
							<tr  class="data_SGST_CGST">
								<td colspan="5">CGST  -><div class="text-right"> <?=$CGST=$get_result[0]->CGST?>% <input type="hidden" name="CGST" id='CGST' value="<?=$CGST/100?>"></div>  </td>
								<td >
								<input type="text" name="CGST_value" id='CGST_value' value="0.00" readonly>
								</td>
							</tr>
							<tr class="data_SGST_CGST">
								<td colspan="5">SGST  -><div class="text-right"> <?=$SGST=$get_result[0]->SGST?>% </div>  <input type="hidden" name="SGST" id='SGST' value="<?=$SGST/100?>"></td>
								<td >
									<input type="text" name="SGST_value" id='SGST_value' value="0.00" readonly>
								</td>
							</tr>
							<tr class="data_IGST">
								<td colspan="5">IGST  -><div class="text-right"> <?=$IGST=$get_result[0]->IGST?>% </div>  <input type="hidden" name="IGST" id='IGST' value="<?=$IGST/100?>"></td>
								<td >
									<input type="text" name="IGST_value" id='IGST_value' value="0.00" readonly>
								</td>
							</tr>
							<tr >
								<td colspan="5">Total Item Value with GST </td>
								<td >
								<input type="text" name="Total_GST_value" id='Total_GST_value' value="0.00" readonly>
								</td>
							</tr>
						
							<tr>
								<td colspan="5">User Assumption Charges </td>
								<td ><input type="number" autocomplete="off" class="form-control" id="user_assmption" name="user_assumption" value="0.00"  min="0" step="0.01" title="Currency INR" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'
"></td>
							</tr>
							<tr>
								<td colspan="5">Price Basis</td>
								<td ><input type="text" autocomplete="off"  class="form-control" id="price_basis" name="price_basis"  required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Place Of Delivery</td>
								<td ><input type="text" autocomplete="off"  class="form-control" id="place_delivery" name="place_delivery"  required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Delivery Basis</td>
								<td ><input type="text" autocomplete="off"  class="form-control" id="delivery_basis" name="delivery_basis"  required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Guarantee / Warranty</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="gaurantee_warranty" name="gaurantee_warranty"  required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Delivery Schedule</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="delivery_schedule" name="delivery_schedule" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Payment Terms</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="payment_terms" name="payment_terms" required=""  /></td>
							</tr>
							<tr>
								<td colspan="5">Validity of Offer</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="validity_of_offer" name="validity_of_offer"  autocomplete="off"9 required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Security BG</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="security_BG" name="security_BG"  required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Liquidity Damage</td>
								<td ><input type="text" autocomplete="off" class="form-control" id="liquidity_damage" name="liquidity_damage" required="" /></td>
							</tr>
							<tr>
								<td colspan="5">Remarks</td>
								<td ><textarea  class="form-control" id="remarks" name="remarks" required="" /></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class="row"> -->
			<div class="form-group row text-center">
				 <div class="col-md-12">
			<div>
			  <label for="myCheckbox"><input id="myCheckbox" name="i_accept" type="checkbox"/>I Agree
			  <!--  class="btn btn-primary"-->
			  <!-- <a href="#" data-toggle="modal" data-target="#exampleModal<?=$slno?>">Click To View</a> -->
			</label>

			 </div>
			</div>
			</div><br>
			<br>
		<!-- </div> -->
			<div class="form-group row pull-right">
                <div class="col-md-12">
                <?php 	$today=date('Y-m-d');
          	 	if($date_end < $today) {

          	 	}else{
          	 		?>
                	<input type="button" value="Total" id="to_cal" onclick="totalIt()" />
                    <button type="submit" id="to_sub" class="btn btn-sm btn-primary m-r-5" disabled>Send</button>
              <?php  }  ?>
                    <a  href="<?=base_url()?>seller/user-vendor-home" class="btn btn-sm btn-default">Cancel</a> 
                </div>
            </div>
		</form>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal<?=$slno?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Term And Condition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php 
      	// print_r(pathinfo(base_url().'upload_files/term_condition/'.$file_name));
      		$file_name_FORMATION=(pathinfo(base_url().'upload_files/term_condition/'.$file_name));
      		if($file_name_FORMATION['extension']=='png' or $file_name_FORMATION['extension']=='jpg' or $file_name_FORMATION['extension']=='jpge'){
      			?>
      			<img src="<?=base_url()?>upload_files/term_condition/<?=$file_name?>"   style="width:400; height:500px;"  >
      			<?php 
      		}else if($file_name_FORMATION['extension']=='xlsx' or $file_name_FORMATION['extension']=='xls'){
      			$path_excel="upload_files/term_condition/".$file_name;
                            // $arr_file = explode('.', $_FILES['file']['name']);
                            $extension =strtolower(($file_name_FORMATION['extension']));
                            switch ($extension) {
                                case 'xls':
                                 $inputFileType = 'Xls';
                                break;
                                case 'xlsx':
                                 $inputFileType = 'Xlsx';
                                break;                  
                                case 'xml':
                                 $inputFileType = 'Xml';
                                break;
                                case 'ods':
                                 $inputFileType = 'Ods';
                                break;
                                case 'slk':
                                 $inputFileType = 'Slk';
                                break;                  
                                case 'gnumeric':
                                 $inputFileType = 'Gnumeric';
                                break;
                                case 'csv':
                                 $inputFileType = 'Csv';
                                break;

                                default:
                                # code...
                                break;
                            }
                            ?>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <?php 

                              $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                            $objReader->setReadDataOnly(true);
                            //FileName and Sheet Name
                            $objPHPExcel = $objReader->load($path_excel);
                            foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                
                                $columnLoopLimiter = $highestColumn;
								++$columnLoopLimiter;
								
								$headings = $worksheet->rangeToArray('A1:' . $highestColumn . 1, NULL, TRUE, FALSE, TRUE)[1];

                               
                                 for($row=2; $row<=$highestRow; $row++){
                                 	echo "<tr>";
                                 	  $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE, TRUE);
    								echo "<td>",$rowData[$row]['A'],"<td>";       
    								// echo "</td>"   ;                   
                                 	for($col='B'; $col<=$columnLoopLimiter; $col++){
                                 		if (!empty($rowData[$row][$col])) {
                                 			
                                 		 echo "<td>",$headings[$col], '', $rowData[$row][$col], "</td>";
                                 		
                                 		}
                                 	}
                                 	// echo "<br>";
                                 	 echo "</tr>"   ; 
                                 }
                                // print_r($highestColumn);

                            }
                         

                                // for($row=1; $row<=$highestRow; $row++){


                                // }
?>
   </table>
   </div>
<?php 
      		}else if($file_name_FORMATION['extension']=='docx' or $file_name_FORMATION['extension']=='doc'){
      			?>
<iframe src="https://docs.google.com/viewerng/viewer?url=<?=base_url()?>upload_files/term_condition/<?=$file_name?>&hl=en&embedded=true"  width='100%' height='100%'  style="width:400; height:500px;"  frameborder='0'></iframe>
      			<?php

      		}else if($file_name_FORMATION['extension']=='pdf'){
      			?>
					<iframe src="<?=base_url()?>upload_files/term_condition/<?=$file_name?>"  width='100%' height='100%'  style="width:400; height:500px;"  frameborder='0'></iframe>

      			<?php
      		}else{
      			?>
<iframe src="https://docs.google.com/viewerng/viewer?url=<?=base_url()?>upload_files/term_condition/<?=$file_name?>&hl=en&embedded=true"  width='100%' height='100%'  style="width:400; height:500px;"  frameborder='0'></iframe>

      			<?php
      		}

      	?>
   
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
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
	   var package=$('#package').val();
		 var Trans=$('#Trans').val(); 
		 var gst_type=$('#gst_type').val(); 
		 var price_total = parseFloat(sub_total)+parseFloat(package)+parseFloat(Trans);
		 if(gst_type==1){
			var CGST=$('#CGST').val(); 
			var SGST=$('#SGST').val(); 
			var price_total_cgst=(parseFloat(price_total)*parseFloat(CGST));
			var price_total_sgst=(parseFloat(price_total)*parseFloat(SGST));
			document.getElementById("SGST_value").value=isNaN(price_total_sgst)?"0.00":price_total_sgst.toFixed(2);
			document.getElementById("CGST_value").value=isNaN(price_total_cgst)?"0.00":price_total_cgst.toFixed(2);
			var price_total_total_gst=parseFloat(price_total_cgst)+parseFloat(price_total_sgst)+parseFloat(price_total);

			document.getElementById("Total_GST_value").value=isNaN(price_total_total_gst)?"0.00":price_total_total_gst.toFixed(2);
			
		 }else{
			var IGST=$('#IGST').val();
			var price_total_igst=(parseFloat(price_total)*parseFloat(IGST)); 
			document.getElementById("IGST_value").value=isNaN(price_total_igst)?"0.00":price_total_igst.toFixed(2);
			var price_total_total_gst=parseFloat(price_total_igst)+parseFloat(price_total);
			document.getElementById("Total_GST_value").value=isNaN(price_total_total_gst)?"0.00":price_total_total_gst.toFixed(2);
		 }
	  //  var price_total = parseFloat(sub_total)+parseFloat(package)+parseFloat(Trans); 
	   document.getElementById("total_landed").value=isNaN(price_total)?"0.00":price_total.toFixed(2);
	   	$('#to_sub').show();
		$('#to_cal').hide();             
	}   
	function fix_cala(id){
		$('#to_sub').hide();
		$('#to_cal').show();
	}
	function getval(sel){
    // alert(sel.value);
		var gst=sel.value;
		if(gst==1){
			$(".data_SGST_CGST").show();
			$(".data_IGST").hide();
			$('#to_sub').hide();
			$('#to_cal').show();
			totalIt();
		}else{
			$(".data_IGST").show();
			$(".data_SGST_CGST").hide();
			$('#to_sub').hide();
			$('#to_cal').show();
			totalIt();
		// `	totalIt();`
		}
	}
	$(document).ready(function(){

		$('#to_sub').hide();
		$(".data_IGST").hide();
		
	});
	$(document).ready(function () {
	  $('#myCheckbox').click(function () {
	    $('#to_sub').prop("disabled", !$("#myCheckbox").prop("checked")); 
	  })
	});

$(document).ready( function($) {
 
    // Disable scroll when focused on a number input.
    $('form').on('focus', 'input[type=number]', function(e) {
        $(this).on('wheel', function(e) {
            e.preventDefault();
        });
    });
 
    // Restore scroll on number inputs.
    $('form').on('blur', 'input[type=number]', function(e) {
        $(this).off('wheel');
    });
 
    // Disable up and down keys.
    $('form').on('keydown', 'input[type=number]', function(e) {
        if ( e.which == 38 || e.which == 40 )
            e.preventDefault();
    });  
      
});
</script>
