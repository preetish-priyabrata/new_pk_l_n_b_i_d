<?php 
// echo "string";
// exit;
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){
	
	redirect('vendor-logout-pass');
}
$url='seller/vendor-rank-bid-order-pr/'.$pr_slno.'/'.$vendor_id_bid.'/'.$master_bid_id.'/'.$slno_approve;
// 'pr_slno'=>$pr_slno,'vendor_id_bid'=>$vendor_id_bid,'master_bid_id'=>$master_bid_id,'slno_approve'=>$slno_approve);
// $category=$value;
// $vendor_id_bid=$value1;
$master_bid_id_com=$master_bid_id;
$slno_approve=$slno_approve;

// $value=$vendor_id_bid; // vendor Bid Slno
// $value1=$category; // Category
// $value2=$value2; // status of view
// $value3=$value3; //type of bid close or open
$result_new_bid=$this->vendor_db_usersnew->vendor_new_commerical_rank_bid_id_pr($Vendor_email_id,$slno_approve);
if($result_new_bid['no_new_tech']==2){
	redirect('user-vendor-home');
}
// print_r($result_new_bid);
$bid_rank_ids=$result_new_bid['new_tech_list'][0];
echo $no_of_times=$bid_rank_ids->no_of_times+1;

$slno_approve_got=$bid_rank_ids->slno_approve;
// $category_got=$bid_rank_ids->category;
$vendor_id_bid_got=$bid_rank_ids->vendor_id_bid;
$master_bid_id_got=$bid_rank_ids->master_bid_id;
$start=strtotime($bid_rank_ids->start_date);
$end_date=strtotime($bid_rank_ids->end_date);
$today=strtotime(date('Y-m-d H:i:s'));

if ($today > $start && $today < $end_date){
	if ($today < $end_date){
  		
	
  	}else{
  		echo "<p style='color:red'>Exipred1</p>";
  		// redirect('user-vendor-home');
  	}
}else{
	if($today > $end_date){
		echo "<p style='color:red'>Exipred</p>";
		// redirect('user-vendor-home');
		
	}else{
		echo "<p style='color:green'>Not Started</p>";
		// redirect('user-vendor-home');
	}  
}


$rank=$this->vendor_db_usersnew->vendor_new_commerical_rank_calculation_pr($master_bid_id,$Vendor_email_id);
$data_id=array('master_bid_id_com'=>$master_bid_id,'Vendor_id'=>$Vendor_email_id);
$query_rode=$this->db->get_where('master_pr_bid_qoute_item_total',$data_id);


// $result_title=$this->vendor_db_users->vendor_new_query_tech_title_commerical($vendor_id_bid,$Vendor_email_id);
// $case_bid=$mode_bid=$result_title['new_tech_list'][0]->mode_bid;
// $master_bid_id_com=$result_title['new_tech_list'][0]->master_bid_id;
$data_get_list_commerical = array('master_bid_id' =>$master_bid_id );
 $query_get_list=$this->db->get_where('master_buyer_material_details',$data_get_list_commerical);
?>
<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}


$value=$vendor_id_bid; // vendor Bid Slno 
// $value1=$type_bid; // type of bid close or open


$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_commerical_pr($value,$Vendor_email_id);
// print_r($result_title);
if($result_title['no_new_tech']!=1){
	// $this->session->set_flashdata('error_message', 'Unable find Bid');
	// redirect('user-vendor-home');
}
$mode_bid=$result_title['new_tech_list'][0]->mode_bid;

 	switch ($mode_bid) {
 		case 'Closed Bid':
 			$type_bid=$value1=1;
 			break;
 		case 'Simple Bid':
 			$type_bid=$value1=2;
 			break;
 		case 'Rank Order Bid':
 			$type_bid=$value1=3;
 			break;
 		
 		default:
 			# code...
 			break;
 	}
$pr_no=$pr_slno;


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
?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/counter/CSS/jquery.countdownTimer.css" />
<style type="text/css">
/*	.clock_back{

	}
	.clock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: #17D4FE;
    font-size: 60px;
    font-family: Orbitron;
    letter-spacing: 7px;


}*/
/*html, body {
  height: 100%;
}

body {
  background: #0f3854;
  background: radial-gradient(ellipse at center, #0a2e38 0%, #000000 70%);
  background-size: 100%;
}*/

p {
  margin: 0;
  padding: 0;
}
.circle-badge {
  height: 100px;
  width: 100px;
  line-height:100px;
  text-align: center;
  border-radius: 50px;
  background: #1ACAC0;
  color:white;
  margin-left:auto;
  margin-right:auto;
}
#clock {
  font-family: 'Share Tech Mono', monospace;
  color: #ffffff;
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  color: #daf6ff;
  text-shadow: 0 0 20px #0aafe6, 0 0 20px rgba(10, 175, 230, 0);
}
#clock .time {
  letter-spacing: 0.05em;
  /*font-size: 80px;*/
  font-size: 60px;
  padding: 5px 0;
}
#clock .date {
  letter-spacing: 0.1em;
  font-size: 24px;
}
#clock .text {
  letter-spacing: 0.1em;
  font-size: 12px;
  padding: 20px 0 0;
}
.pk_clock{
  background: #0f3854;
  background: radial-gradient(ellipse at center, #0a2e38 0%, #000000 70%);
  background-size: 100%;
  height: 17em;
}
</style>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<!-- <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Vendor DashBoard<small>All Starts From Here</small></h1>
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
					<h4 class="panel-title">Rank Order Biding</h4>
				</div>
				<div class="panel-body">
					<?php if($query_rode->num_rows()< $no_of_times ){
						?>
						<form action="<?=base_url()?>seller/user-vendor-bid-submission-commerical-save-pr-rank" method="POST"  method="POST" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
					<?php }else{
						?>
						<form action="#">
							<?php 

					}?>
				<input type="hidden" name="master_bid_id" value="<?=$master_bid_id_com?>">
				<input type="hidden" name="vendor_bid_id" value="<?=$value?>">
				<input type="hidden" name="vendor_id" value="<?=$Vendor_email_id?>">
				<input type="hidden" name="mode_bid" value="<?=$mode_bid?>">
				<input type="hidden" name="mode_bid_id" value="<?=$type_bid?>">
				<input type="hidden" name="Category" value="<?=$value1?>">
				<input type="hidden" name="bid_ref" value="<?=$result_title['new_tech_list'][0]->bid_ref?>">
				<input type="hidden" name="url" value="<?=$url?>">
					<div class="row">
						<div class="col-lg-8 col-md-8">
								<?php 
									// print_r($rank);
								?>
								
								<div class="row">
							      <div >
							        <div class="col-xs-6 col-md-12 text-center">
							          <div class="circle-badge" style="background:#1ACAC0">
							            <strong>Rank <i id="ranks"><?=$rank['rank']?></i></strong>
							          </div>
							          <div>
							            <strong >Your Current Price :- <i id="price"> <?=$rank['sub_total']?></i></strong>
							          </div>
							          <div>
							         
							          </div>
							        </div>

							      </div>
							       <div >
							        <div class="col-xs-6 col-md-12 text-center">
							          <div class="circle-badge" style="background:green">
							            <strong><small>No Of Bid Left </small> : <?php 
							            				echo $no_of_times-$query_rode->num_rows()?></strong>
							          </div>
							          <div>
							           
							          </div>
							          <div>
							         
							          </div>
							        </div>

							      </div>
							    </div>


						</div>
						<div class="col-lg-4 col-md-4">	
							<div class="row">
								<div class="col-lg-12">
									<div class="pk_clock">
										<div id="clock">
										    <p class="date">{{ date }}</p>
										    <p class="time">{{ time }}</p>
										    <!-- <p class="text">DIGITAL CLOCK with Vue.js</p> -->
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<hr>
									<h1 class="text-center">Count Down</h1>
									<hr>
									<div class="text-center">
									 <table style="border:0px;">
		                                <tr>
		                                	<td style="width:70px;text-align:center;">Days</td>
		                                    <td style="width:70px;text-align:center;">Hours</td>
		                                    <td style="width:60px;text-align:center;">Minutes</td>
		                                    <td style="width:70px;text-align:center;">Seconds</td>
		                                </tr>
		                                <tr>
		                                    <td colspan="4"><span id="color_timer"></span></td>
		                                </tr>
		                            </table>
		                        </div>
		                        </div>
		                    </div>

						 </div>
					</div>
					<br>
					<br>
				
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
							   <td> <input type="text" autocomplete="off" id="cost<?=$x?>"  onkeyup="fix_cala(<?=$x?>)" name="cost[<?=$key_value->slno_item_mr?>]" required /> </td>
                    			<td> <input type="text" readonly class="form-control-plaintext" id="price<?=$x?>" name="price[<?=$key_value->slno_item_mr?>]"   value='0'/> </td>

                            </tr>

                    		<?php
                    		}
                    		?>
                    			<tr>
								<td colspan="5">Sub total</td>
								<td ><input type="text" readonly="readonly" class="form-control" id="total" name="sub_total" /></td>
							</tr>
							<tr>
								<td colspan="5">Total Tax</td>
								<td ><input type="text" autocomplete="off"  class="form-control" id="total_tax" onkeyup="fix_cala('tax')" name="total_tax"  value="0.00" /></td>
							</tr>
							<tr>
								<td colspan="5">Total Landed Cost </td>
								<td ><input type="text" autocomplete="off" readonly="readonly" class="form-control" id="total_landed" name="total_landed"  value="0.00" /></td>
							</tr>
							<tr>
								<td colspan="5">User Assumption Charges </td>
								<td ><input type="text" autocomplete="off" class="form-control" id="user_assmption" name="user_assumption" value="0.00" /></td>
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
			  <a href="#" data-toggle="modal" data-target="#exampleModal<?=$slno?>">Click To View</a>
			</label>

			 </div>
			</div>
			</div><br>
			<br>
		<!-- </div> -->
			<div class="form-group row pull-right">
                <div class="col-md-12">
                	<?php
                	
                	 if($query_rode->num_rows()< $no_of_times){
						?>
              
                	<input type="button" value="Total" id="to_cal" onclick="totalIt()" />
                    <button type="submit" id="to_sub" class="btn btn-sm btn-primary m-r-5" disabled>Send</button>
              <?php  } else{
              	echo "<p style='color :red'> You Have Exceed No of biding</p> <br>";
              } ?>
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
	$(document).ready(function () {
	  $('#myCheckbox').click(function () {
	    $('#to_sub').prop("disabled", !$("#myCheckbox").prop("checked")); 
	  })
	  var validateSession = setInterval(get_paids, 50000);
	});
	function get_paids() {
		<?php 

		$rank=$this->vendor_db_usersnew->vendor_new_commerical_rank_calculation_pr($master_bid_id,$Vendor_email_id);
		?>

		console.log('<?=$rank['rank']?>');
		console.log('<?=$rank['sub_total']?>');
		document.getElementById("ranks").value='<?=$rank['rank']?>';
		document.getElementById("price").value='<?=$rank['sub_total']?>';
		window.location.reload();
		// body...
	}
</script>

 <script>
                                $(function(){
                                    $('#color_timer').countdowntimer({
                                        // currentTime : true,
                                        // size : "lg",
                                        dateAndTime : '<?=$bid_rank_ids->end_date?>',
                                        size : "lg",
                                        borderColor : "#5D09FA",
                                        backgroundColor : "#FAF209",
                                        fontColor : "#FA0909",
                                        timeUp : timeisUp
                                    });
                                    function timeisUp() {
								        	setTimeout(function() {
											  window.location.href = "<?=base_url()?>user-vendor-home";
											}, 3000);
								    }
                                });
                            </script>
