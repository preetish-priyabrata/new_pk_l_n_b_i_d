<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}
$value=$value;
$key_values_slno=$token;
$master_bid_id=$master_bid_id;
$result_title=$this->vendor_db_usersnew->vendor_new_query_tech_title_pr($value,$Vendor_email_id);
if($result_title['no_new_tech']!=1){
	$this->session->set_flashdata('error_message', 'Unable find Bid');
	redirect('user-vendor-home');
}
$pr_no=$result_title['new_tech_list'][0]->pr_no;

 $date_end=$result_title['new_tech_list'][0]->date_end;
 $data_process = array('pr_no' =>$pr_no);
$query_process=$this->db->get_where('master_pr_process_detail',$data_process);
$result_process=$query_process->result();
$comm_bid=$result_process[0]->comm_bid;  // bid id information

 $data_table6 = array('pr_no' =>$pr_no,'commercial_bid_id'=>$comm_bid);
$query_table6=$this->db->get_where('master_technical_commercial_terms_conditions',$data_table6);
$result_table6=$query_table6->result();


$slno=$result_table6[0]->slno;
$file_name=$result_table6[0]->file_name;

?>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		      <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Creating New Bid For Technical Submission</h1>
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
					<h4 class="panel-title">Create New Technical Bid </h4>
				</div>
				<div class="panel-body">
          <h4 class="panel-title ">Title Bid  : <h5><?=$result_title['new_tech_list'][0]->title?></h5></h4>
          <hr style="height: 2px; background:  green">
          <div class="alert alert-secondary">
            <span style="color: red"> *</span> All mandatory fields shall be duly filled up
        	</div>
					<form action="<?=base_url()?>seller/pr-vendor-tech-file-new-bid-submission" method="POST" >
						<div class="row">
							<div class="col-md-6 col-lg-6">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">File Name <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input type="hidden" name="value_slno" id="value_slno" value="<?=$value?>">
										<input type="hidden" name="key_values_slno" id="key_values_slno" value="<?=$key_values_slno?>">
										<input type="hidden" name="master_bid_id" id="master_bid_id" value="<?=$master_bid_id?>">
										<input type="hidden" name="Vendor_email_id" id="Vendor_email_id" value="<?=$Vendor_email_id?>">
										<input type="hidden" name="pr_no" id="pr_no" value="<?=$pr_no?>">
										<input class="form-control m-b-5" placeholder="Enter File name" autocomplete="off" name="file_name" id="file_name" type="text" >
										<small class="f-s-12 text-grey-darker">Here enter File name</small>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-lg-5">
							 	<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3">Attach Files  <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input type="file" name="new_file" id="new_file" ><br />
										<small class="f-s-12 text-grey-darker"> Please Attach Files  </small>
									</div>
								</div>
							</div>
              				<div class="col-md-1 col-lg-1">
							 	<div class="form-group row m-b-15">
									<span class="btn btn-sm btn-info" id="sub">Upload</span>
								</div>
							</div>
						</div>
            <div class="row">
            	<div class="col-md-12">
            	<div id="cart-item-files"></div>
            </div>
            </div>
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
						<div class="form-group row pull-right">
                <div class="col-md-12">
                	<?php 
                	$today=date('Y-m-d');
                	if($date_end < $today) {

          	 	}else{
                		?>
                    <button type="submit"  name="submission" class="btn btn-sm btn-primary m-r-5" value="save">Save</button>
                     <button type="submit" disabled  name="submission" id="to_sub" class="btn btn-sm btn-lime m-r-5" value="sent">Sent</button>
                 <?php }?>
                    <a  href="<?=base_url()?>user-vendor-home" class="btn btn-sm btn-default">Cancel</a>
                </div>
            </div>


					</form>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
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
	function file_uploaded(){
		var value_slno =$('#value_slno').val();
		var value_keys_id=$('#key_values_slno').val();
		var master_bid_id=$('#master_bid_id').val();
		var actions_file='files_info_vendors';
		var pr_no=$('#pr_no').val();
		var Vendor_email_id=$('#Vendor_email_id').val();
		queryString_id = 'actions_file='+actions_file+'&master_bid_id='+master_bid_id+'&value_slno='+value_slno+'&Vendor_email_id='+Vendor_email_id+'&value_keys='+value_keys_id+'&pr_no='+pr_no;	
		jQuery.ajax({
			url: "<?php echo base_url(); ?>seller/vendor-file-upload-data-pr",
			
			data:queryString_id,
			type: "POST",
			success:function(data){
				$("#cart-item-files").html(data);
			}
		});

	}
		function file_delete(id) {
		var file_slno=id;
		var value_slno =$('#value_slno').val();
		var value_keys_id=$('#key_values_slno').val();
		var master_bid_id=$('#master_bid_id').val();
		var Vendor_email_id=$('#Vendor_email_id').val(); 
		var pr_no=$('#pr_no').val();    
		var actions_file='files_info_delete';
  //   	
		queryString_id = 'actions_file='+actions_file+'&master_bid_id='+master_bid_id+'&value_slno='+value_slno+'&Vendor_email_id='+Vendor_email_id+'&file_id='+id+'&value_keys='+value_keys_id+'&pr_no='+pr_no;	

		jQuery.ajax({
			url: "<?php echo base_url(); ?>seller/vendor-file-upload-data-pr",
			// enctype: 'multipart/form-data',
			data:queryString_id,
			type: "POST",
			success:function(data){
				if(data){
					file_uploaded();
                    alert('Successfull attach file is deleted ');
				}else{
					file_uploaded();
                    alert('Unable attached file deleted');
				}
			}
		});
		// body...
	}
   $(document).ready(function (e) {
   		file_uploaded();
   		$('#sub').on('click', function () {
   			// alert('hello');
   			var value_slno =$('#value_slno').val();
			var value_keys_id=$('#key_values_slno').val();
			var master_bid_id=$('#master_bid_id').val();
        	var actions_file='files_uploaded_details';
        	var file_name=$('#file_name').val();
        	var Vendor_email_id=$('#Vendor_email_id').val();
        	var pr_no=$('#pr_no').val();
   //      	var Mr_no = $('#Mr_no').val();
			// var slno_Mr_no = $('#slno_Mr_no').val();
            var file_data = $('#new_file').prop('files')[0];
            if(file_data!=""){
                var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('master_bid_id', master_bid_id);
          		form_data.append('value_keys', value_keys_id);
          		form_data.append('value_slno', value_slno);
          		form_data.append('file_name', file_name);
          		form_data.append('actions_file', actions_file);
          		form_data.append('Vendor_email_id',Vendor_email_id);
          		form_data.append('pr_no',pr_no);

                $.ajax({
                    url: '<?php echo base_url(); ?>seller/vendor-file-upload-data-pr', // point to server-side controller method
                    dataType: 'text', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                    	if(response==1){
                    		file_uploaded();
                    		alert('File Is successfully attached ');
                    		 
                    	}else if(response==2){
                    		alert('Same File name is found ');
                    	}else{
                    		alert('Some thing went worng Please check internet connection ');
                    	}
                        
                    }
                    
                });
            }else{
            	alert('Please Attachment Some file click on upload');
            }

        });
   	});
  $(document).ready(function () {
	  $('#myCheckbox').click(function () {
	    $('#to_sub').prop("disabled", !$("#myCheckbox").prop("checked")); 
	  })
	});
</script>