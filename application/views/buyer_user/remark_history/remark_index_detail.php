<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
$pr_no=$pr_no;
$slno=$slno;
$job_code=$job_code;
$id=$id;
$data_info = array('pr_no' => $pr_no);
$query_remark=$this->db->get_where('master_bu_remark_pr',$data_info);
// 'pr_no'=>$pr_no,$slno=>$slno,'job_code'=>$job_code,'id'=>$id

?>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/>
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<!-- li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Transparent Sidebar</li> -->
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!-- <h1 class="page-header">Page with Transparent Sidebar <small>header small text goes here...</small></h1> -->
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
					<h4 class="panel-title">PR Remark History Pr No Is <?=$pr_no?></h4>
				</div>
				<div class="panel-body">
               
                <table id="remarks" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date On </th>
                            <th>Remark / Comment</th>
                            <th>Information</th>
                            <th>User Type</th>
                            <th>User Enter Email</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($query_remark->result() as $value_information):

                        ?>
                        <tr>
                            <td><?=$value_information->date_entry?></td>
                            <td>
                                <?php 
                                    if($value_information->type_remark=='R'){
                                        echo "<p style='color:green'>Remark</p> ";
                                    }else{
                                        echo "<p style='color:Red'>Comment</p> ";
                                    }
                                ?>
                            </td>
                            <td><?=$value_information->Comment_remark?></td>
                            <td>
                                <?php 
                                    $level_user=$value_information->level_user;
                                    switch($level_user){
                                        case '1':
                                            echo "Bu User";
                                        break;
                                        case '2':
                                            echo "Design User";
                                        break;
                                        case '3':
                                            echo "Approved User";
                                        break;
                                        case '4':
                                            echo "Procurment User";
                                        break;
                                        case '5':
                                            echo "Buyer User";
                                        break;
                                        case '6':
                                            echo "Technical Evalutor User";
                                        break;
                                        case '7':
                                            echo "Commercial Evalutor User";
                                        break;
                                        case '8':
                                            echo "Vendors User";
                                        break;
                                    }

                                ?>
                            </td>
                            <td><?=$value_information->email_id?></td>
                        </tr>
                        <?php 
                            endforeach;
                         ?>
                    </tbody>

                </table>
                <br>
                	<!-- table -->
					<div class="form-group row pull-right">
                            <div class="col-md-12">
                             
                                <a  href="<?=base_url()?>user-buyer-home" class="btn btn-sm btn-default btn-success">Back</a> 
                            </div>
                        </div>
				</div>
			</div> 
			<!-- end panel -->
		</div>
        <!-- end #content -->
        <script>
            $(document).ready(function() {
                $('#remarks').DataTable();
            } );
        </script>