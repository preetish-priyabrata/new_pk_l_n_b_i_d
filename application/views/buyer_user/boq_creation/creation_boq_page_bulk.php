<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
	$back_url_path=$information_transfer['back_url_path'];// back path to go saving url
	$back_url_path_id=$information_transfer['back_url_path_id'];// back path to go saving url
	$pr_no=$information_transfer['pr_no'];
	$slno_pr=$information_transfer['slno_pr'];
	$job_code=$information_transfer['job_code'];
	$pr_no_type=$information_transfer['pr_no_type'];
	$edit_type=$information_transfer['edit_type'];
	$commercial_edit_id=$information_transfer['commercial_edit_id'];
	$commercial_resubmit_count=$information_transfer['commercial_resubmit_count'];
	$commercial_resubmit_status=$information_transfer['commercial_resubmit_status'];
	$tech_evalution=$information_transfer['tech_evalution'];
	$tcomm_evalution_commer=$information_transfer['tcomm_evalution_commer'];
	$edit_Item=$information_transfer['edit_Item'];
// // $pr_no=$pr_no;
// // $slno_pr=$slno_pr;
// // $job_code=$job_code; //Project_Slno
// 	$this->db->select('*');
// 	$this->db->from('master_project');
// 	// $this->db->join('assign_project_user', ' (assign_project_user.project_slno = master_project.Project_Slno  AND master_project.status=1 ) ', 'right outer' );					
// 	// $this->db->where('assign_project_user.email_id', $email_id); 	
// 	$this->db->where('master_project.Project_Slno', $job_code); 	
// 	$query_bu = $this->db->get();

// 	$this->db->distinct();
// 	$this->db->select('category_name');
// 	$this->db->where('status', '1'); 
// 	$query_category = $this->db->get('master_category');
// 	$url_remark='<a target="_blank" class="btn btn-sm btn-success" href="'.base_url().'design-pr-remark-history/'.$pr_no.'/'.$slno_pr.'/'.$job_code.'/1"> Click View Remark</a>';
// 	$query_master_category = $this->db->get('master_category');
if ($this->input->server('REQUEST_METHOD') == 'POST'){ 
	if(!empty($this->input->post('upload_file_id'))){
		$_SESSION["cart_item"]="";
		$date_some_missiong=$data_unablefind='';

		$email_id=$this->session->userdata('buy_email_id');
        if(empty($email_id)){
            redirect('buy-logout-by-pass');
        }
        $date =date('Y-m-d');
        // $table="master_category_item_boq";    
        // $actions_file=$this->input->post('actions_file');        
        // switch ($actions_file) {
        //     case 'buyer_files_uploaded_details':
                if(isset($_FILES["new_boq_file"]["name"])){
                    $file_name=$_FILES["new_boq_file"]["name"];
                    $file_stored_name=date('Y-m-d')."-".date('His')."-".$_FILES["new_boq_file"]["name"];
                    $path = $_FILES["new_boq_file"]["tmp_name"];
// 
                    if ($_FILES["new_boq_file"]["error"] > 0) {
                        echo "3";
                        exit();
                    } else {
                        if(move_uploaded_file($_FILES["new_boq_file"]["tmp_name"], 'upload_files/boq_files/' . $file_stored_name)){
                            $data_array = array('filename'=>$file_stored_name, 'upload_by'=>$email_id,'boq_status'=>1,'pr_no'=>$pr_no);
                            $query_files=$this->db->insert('master_material_category_file_boq',$data_array);
                            $path_excel="upload_files/boq_files/".$file_stored_name;
                            $arr_file = explode('.', $_FILES['new_boq_file']['name']);
                            $extension =strtolower(end($arr_file));
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
                            $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                            $objReader->setReadDataOnly(true);
                            //FileName and Sheet Name
                            $objPHPExcel = $objReader->load($path_excel);

                            foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
                                $highestRow = $worksheet->getHighestRow();
                                $highestColumn = $worksheet->getHighestColumn();
                                for($row_item=2; $row_item<=$highestRow; $row_item++){
                                	$material_item_id = $worksheet->getCellByColumnAndRow(1, $row_item)->getValue();
                                    $qnt = $worksheet->getCellByColumnAndRow(2, $row_item)->getValue();

                                    if(!empty($material_item_id) && !empty($qnt)){
                                    	$data = array('material_item_id' => $material_item_id);  
                                    	$query_material=$this->db->get_where('master_category_item',$data);
                                    	if($query_material->num_rows()==1){
                                    		foreach ($query_material->result() as $row) {
                                    			$code=$row->slno_master_item;

					                    		$itemArray = array($code=>array('name'=>$row->material_item_name, 'technical_details'=>$row->technical_details , 'quantity'=>$qnt, 'item_uom'=>$row->uom ,'code'=>$code,'m_id'=>$material_item_id));
					                    	}
					                    	$match_if[]=$itemArray;
											if(!empty($this->session->userdata('cart_item'))) {
											  $_SESSION["cart_item"] = array_merge($this->session->userdata('cart_item'),$itemArray);
											  print_r($_SESSION["cart_item"]);
											} else {
											  $_SESSION["cart_item"] = $itemArray;
											   print_r($_SESSION["cart_item"]);
											}

                                    	 }else{
                                    	 	$data_unablefind[]=array('material_id'=>$material_item_id,'qnt'=>$qnt);
                                    	 }

                                    }else{
                                    	$date_some_missiong[]=array('material_id'=>$material_item_id,'qnt'=>$qnt);
                                    }                            

                                }

                            }
                        }
                    }
                }
                // 

            // }



	}
}

?>
<!-- <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" /> -->
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-design-home" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">PR Requisition</a></li>
				<li class="breadcrumb-item active">Create New PR</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Create New PR Requisition </h1>
			<!-- end page-header -->
			<?php if(!empty($this->session->flashdata('success_message'))){?>
			<div class="alert alert-success fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>Success!</strong>
			  <?=$this->session->flashdata('success_message')?> 
			  <!-- <a href="#" class="alert-link">an example link</a>.  -->
			</div>
			<?php 
			}
			 // print_r($this->session->userdata());
			 ?>
			 <?php if(!empty($this->session->flashdata('error_message'))){?>
			<div class="alert alert-warning fade show">
			  <span class="close" data-dismiss="alert">×</span>
			  <strong>error!</strong>
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
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">New PR Requisition Information</h4>
				</div>
				<div class="panel-body">				
					<div class="row pull-right">
							<div class="col-md-12">  

								<form action="<?=base_url()?>buyer-bulk-pr-entry-new-information" method="POST">
									<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="hidden" value="<?=$pr_no?>" required="" readonly>
									<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
									<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
									<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
									<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="1" required="" readonly>

									<input type="hidden" name="back_url_path" value="<?=$back_url_path?>" required>
									<input type="hidden" name="back_url_path_id" value="<?=$back_url_path_id?>" required>
									<input type="hidden" name="pr_no_id" value="<?=$pr_no?>" required>
									<input type="hidden" name="slno_pr_id" value="<?=$slno_pr?>" required>
									<input type="hidden" name="job_code_id" value="<?=$job_code?>" required>
									<input type="hidden" name="pr_no_type" value="<?=$pr_no_type?>" required>
									<input type="hidden" name="edit_type_id" value="<?=$edit_type?>" required>
									<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>" required>
									<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>" required>
									<input type="hidden" name="commercial_resubmit_status" value="<?=$commercial_resubmit_status?>" required>
									<input type="hidden" name="tech_evalution" value="<?=$tech_evalution?>" required>
									<input type="hidden" name="tcomm_evalution_commer" value="<?=$tcomm_evalution_commer?>" required>
									<input type="hidden" name="edit_Item" value="<?=$edit_Item?>" required>
									<?php 
									if ($this->input->server('REQUEST_METHOD') == 'POST'){ 
										if(!empty($this->input->post('upload_file_id'))){
										?>
										<input type="submit" name="edit_Item" value="Re-Enter Bulk BOQ" class="btn btn-success btn-sm">
									<?php }}?>

								</form>
								<br>
						
							</div>
					</div>
					<br>
					<br>
					<!-- <?=base_url()?>buyer-add-new-pr-save_bulk -->
					<form action="" method="POST"  enctype="multipart/form-data">
					<div class="alert alert-secondary">
                        		<span style="color: red"> *</span> All mandatory fields shall be duly filled up 
                        	</div>
					
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="activity_name">PR No. <span style="color: red">*</span></label>
									<div class="col-md-9">
										<?php
										$get_mr_id=$this->design_user->get_design_mr_no();	

										?>
										<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="text" value="<?=$pr_no?>" required="" readonly>
										<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
										<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
										<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
										<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="1" required="" readonly>

										<input type="hidden" name="back_url_path" value="<?=$back_url_path?>" required>
										<input type="hidden" name="back_url_path_id" value="<?=$back_url_path_id?>" required>
										<input type="hidden" name="pr_no_id" value="<?=$pr_no?>" required>
										<input type="hidden" name="slno_pr_id" value="<?=$slno_pr?>" required>
										<input type="hidden" name="job_code_id" value="<?=$job_code?>" required>
										<input type="hidden" name="pr_no_type" value="<?=$pr_no_type?>" required>
										<input type="hidden" name="edit_type_id" value="<?=$edit_type?>" required>
										<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>" required>
										<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>" required>
										<input type="hidden" name="commercial_resubmit_status" value="<?=$commercial_resubmit_status?>" required>
										<input type="hidden" name="tech_evalution" value="<?=$tech_evalution?>" required>
										<input type="hidden" name="tcomm_evalution_commer" value="<?=$tcomm_evalution_commer?>" required>
										<input type="hidden" name="edit_Item" value="<?=$edit_Item?>" required>
										<input type="hidden" name="upload_file_id" value="new_upload_file_id">
										<small class="f-s-12 text-grey-darker">PR No.</small>
									</div>
								</div>
							 	

							</div>
							
							<div class="col-md-6 col-lg-6">
							
								<div class="form-group row m-b-15">
									<label class="col-form-label col-md-3" for="materials_id">Upload Bulk Material Id& Qunatity <span style="color: red">*</span></label>
									<div class="col-md-9">
										<input class="form-control m-b-5"  name="new_boq_file" id="new_boq_file" type="file" required="" >
										<small class="f-s-12 text-grey-darker">Select Material Category</small>
										<br>
										<a href="<?=base_url()?>sample/New_BOQ.xls">Click get sample of new BOQ</a>
									</div>
								</div>
							
                                







							</div>
                 







						 </div>
						
						 <br>
						<hr>
						<div class="row">
							<div class="col-lg-12">
								<div id="cart-item"></div>
							</div>
						</div>
						<div class="form-group row pull-right">
                            <div class="col-md-12">
                             <?php if ($this->input->server('REQUEST_METHOD') == 'POST'){ 
								if(!empty($this->input->post('upload_file_id'))){

								}else{?>
                               <input type="submit" name="submission" value="Save" class="btn btn-info btn-sm">
                              
                                <a  href="<?=base_url().$back_url_path_id?>" class="btn btn-sm btn-success">Back</a> 
                            <?php }

                        }?>
                               <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-danger">Home</a>  
                            </div>
                        </div>
						
						
					</form>
					
				</div>
			</div>
			<?php

			if ($this->input->server('REQUEST_METHOD') == 'POST'){ 
				if(!empty($this->input->post('upload_file_id'))){

			?>
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">BOQ Bulk Information</h4>
				</div>
				<div class="panel-body">
					<nav class="nav nav-pills nav-justified">
					    <a data-toggle="pill" href="#home1" class="nav-item nav-link active">Match Found </a>
					    <a data-toggle="pill" href="#home2" class="nav-item nav-link">Material Id Mismatch</a>
					    <a data-toggle="pill" href="#home3" class="nav-item nav-link ">Existence Of Blank Field</a>
					    <!-- <a data-toggle="pill" href="#home4"class="nav-item nav-link">Contact Us</a> -->
					</nav>
					<div class="tab-content">
					    <div id="home1" class="container tab-pane active"><br>
					      <h3>Match Found</h3>
					      <form action="" method="POST"  enctype="multipart/form-data">
					      		<input class="form-control m-b-5"  name="pr_no" id="pr_no" type="hidden" value="<?=$pr_no?>" required="" readonly>
								<input type="hidden" readonly="" name="slno_pr" id="slno_pr"  value="<?=$slno_pr?>">
								<input type="hidden" readonly="" name="job_code" id="job_code" value="<?=$job_code?>">
								<input class="form-control m-b-5"  name="pr_no_type" id="pr_no_type" type="hidden" value="new_pr_creater" required="" readonly>
								<input class="form-control m-b-5"  name="edit_type" id="edit_type" type="hidden" value="1" required="" readonly>

								<input type="hidden" name="back_url_path" value="<?=$back_url_path?>" required>
								<input type="hidden" name="back_url_path_id" value="<?=$back_url_path_id?>" required>
								<input type="hidden" name="pr_no_id" value="<?=$pr_no?>" required>
								<input type="hidden" name="slno_pr_id" value="<?=$slno_pr?>" required>
								<input type="hidden" name="job_code_id" value="<?=$job_code?>" required>
								<input type="hidden" name="pr_no_type" value="<?=$pr_no_type?>" required>
								<input type="hidden" name="edit_type_id" value="<?=$edit_type?>" required>
								<input type="hidden" name="commercial_edit_id" value="<?=$commercial_edit_id?>" required>
								<input type="hidden" name="commercial_resubmit_count" value="<?=$commercial_resubmit_count?>" required>
								<input type="hidden" name="commercial_resubmit_status" value="<?=$commercial_resubmit_status?>" required>
								<input type="hidden" name="tech_evalution" value="<?=$tech_evalution?>" required>
								<input type="hidden" name="tcomm_evalution_commer" value="<?=$tcomm_evalution_commer?>" required>
								<input type="hidden" name="edit_Item" value="<?=$edit_Item?>" required>
								<input type="hidden" name="upload_file_id" value="new_upload_file_id">
								<?php
								 if(!empty($_SESSION["cart_item"])){
	                					$sess_cart_item=$_SESSION["cart_item"];   
	                					print_r($sess_cart_item) ;           
						                $item_total = 0;
						                $id=0;

?>
					                <table class="table table-bordered" cellpadding="10" cellspacing="1" width="100%">
					                  <thead>
					                      <tr>
					                          <th><strong>Name</strong></th>
					                          <th><strong>Material Id</strong></th>
					                          <th><strong>Technical Parameter </strong></th>
					                          <th><strong>UOM</strong></th>
					                          <th><strong>Quantity</strong></th>           
					                          
					                      </tr>
					                  </thead>
					                  <tbody>
                    <?php
                   foreach($sess_cart_item as $item){
echo <<<EOD
<tr>
<td><strong><input type="hidden" name="material_name[{$id}]" value="{$item['name']}">
<input type="hidden" name="codes[{$id}]" value="{$item['code']}">{$item['name']}</strong></td>
<td><strong>{$item['m_id']}</strong></td>
<td><strong><input type="hidden" name="technical_details[{$id}]" value="{$item['technical_details']}">{$item['technical_details']}</strong></td>
<td><strong><input type="hidden" name="item_uom[{$id}]" value="{$item['item_uom']}">{$item['item_uom']}</strong></td>
<td><strong><input type="hidden" name="quantitys[{$id}]" value="{$item['quantity']}">{$item['quantity']}</strong></td>

</tr>
EOD;
$id++;
           }   
                 ?>
						               </tbody>
						             </table>
					<?php 

						               }?>
						      

					      <div class="form-group row pull-right">
                            <div class="col-md-12">
                            	<input type="submit" name="submission" value="Save" class="btn btn-info btn-sm">        
                               <a  href="<?=base_url().$back_url_path_id?>" class="btn btn-sm btn-success">Back</a> 
                               <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-danger">Home</a>  
                            </div>
                        </div>
						
						
					</form>
					    </div>
					    <div id="home2" class="container tab-pane fade"><br>
					      <h3>Material Id Mismatch</h3>
					      <table lass="table table-bordered">
					      	<thead>
					      		<tr>
					      			<th><strong>Material Id</strong></th>
					      			<th><strong>Quantity</strong></th>
					      		</tr>
					      	</thead>

					      </table>
					      <?php 

					      print_r($data_unablefind)
					      ?>
					    </div>
					    <div id="home3" class="container tab-pane fade"><br>
					      <h3>Existence Of Blank Field</h3>
					     
					       <?php 

					      print_r($date_some_missiong)
					      ?>
					      <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p> -->
					    </div>
					</div>



				</div>
			</div>




		<?php 
				}
			}
		?>
				
