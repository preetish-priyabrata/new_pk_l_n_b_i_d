<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	redirect('design-logout-by-pass');
	
}
$vendor_slno=$slno;
$project_pr_no=$pr_no;
$ven_upload=$this->db->get_where('master_bid_Com_vendor_term_m',array('slno'=>$vendor_slno,'pr_no'=>$project_pr_no));
$value_files=$ven_upload->result(); 
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="<?=base_url()?>user-buyer-home" class="fa fa-home ">Home</a></li>
				<!-- li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Transparent Sidebar</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Pr No :-  <small><?=$project_pr_no?></small></h1>
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
					<h4 class="panel-title">Terms And Conditions Approval/Comments </h4>
				</div>
				<div class="panel-body">
                    <form action="<?=base_url()?>buyer--comment-term-condition-save" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input value="<?=$vendor_slno?>" name="vendor_slno" type="hidden">
                        <input value="<?=$value_files[0]->vendor_id?>" name="vendor_id" type="hidden">
						<div class="col-md-6 col-lg-6">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="activity_name">Uploaded Files</label>
                                <div class="col-md-9">
                                    <?php echo '<a class="btn btn-success" target="_blank" href="'.base_url().'upload_files/vendor_term_file/'.$value_files[0]->file_name_stored.'">Download</a>'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
							<div class="form-group row m-b-15">
								<label class="col-form-label col-md-3" for="type_approved_comment">Type Of Selection <span style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <select name="type_approved_comment" id="type_approved_comment" required>
                                        <option value="">Please Select </option>
                                        <option value="1">Approved</option>
                                        <option value="2">Comments</option>

                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group row m-b-15" id="file_attach">
								<label class="col-form-label col-md-3" for="attachment_file">Attach Comment File <span style="color: red">*</span></label>
                                <div class="col-md-9">
                                    <input type="file" name="attachment_file" id="attachment_file">
                                    
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="form-group row pull-right">
                            <div class="col-md-12">
                               <!--  <button type="submit" class="btn btn-sm btn-primary m-r-5" >Next</button> -->
                               <!-- <input type="submit" name="submission" value="Save" class="btn btn-success btn-sm"> -->
                               <input type="submit" name="submission"   onclick="return submitCheck()" value="Send" class="btn btn-info btn-sm">
                               <button  type="button" onClick="self.close()" class="btn btn-sm btn-primary" >Close</button>
                               
                               <!-- <a  href="<?=base_url()?>user-approver-home" class="btn btn-sm btn-danger">Cancel</a>  -->
                            </div>
                        </div>

                    </form>
                                
					
				</div>
            </div> 
            <!-- end panel -->
		</div>
        <!-- end #content -->
        <script type="text/javascript">
        
            $(document).ready(function() {
		        $('#file_attach').hide();
                $('#type_approved_comment').on('change', function () {
                    var selectVal = $("#type_approved_comment option:selected").val();
                    // alert(selectVal);
                    if(selectVal==1){
                        $('#file_attach').hide();
                        $('#attachment_file').prop('required',false);
                    }else{
                        $('#file_attach').show();
                        $('#attachment_file').prop('required',true);
                    }
                });
                
            });
        </script>