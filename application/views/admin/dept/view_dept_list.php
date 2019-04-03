<?php 
$email_id=$this->session->userdata('email_id');
if(empty($email_id)){
	
	redirect('admin-logout-by-pass');
}
?>
<style type="text/css">
	.nav-tabs {
    background: #0d8ac3;
    border-radius: 5px 5px 0 0;
}
.nav > li > a {
    color: #fff;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <!--   
    https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css -->

<!-- 
    https://code.jquery.com/jquery-3.3.1.js
    
 -->
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>user-admin-home">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Dept</a></li>
				<li class="breadcrumb-item active">View Dept List</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">View Department List 
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
			 <div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					
					<h4 class="panel-title">Dept List</h4>
				</div>
				<div class="panel-body">
					
					<div class="pull-right">
						<a href="admin-add-project" class="btn btn-info fa fa-file" role="button" title="Create New Project"> Add dept </a>
					</div>
					<br>
					<br>
					
					    <a class="nav-link" href="<?=base_url()?>admin-view-dept"></a>
					 
					<br>
					<div class="tab-content">
  						<div class="tab-pane container active" id="home">
							<div class="table-responsive-sm">
								<table id="example" class="display" style="width:100%">
							        <thead>
							            <tr>
							                <th>Slno .</th>
							                <th>Department</th>							                
							            </tr>
							        </thead>	
							           
							    </table>
							</div>
							<br>
							<br>
							<a href="user-admin-home" class="btn btn-xs btn-success fa fa-angle-left"   role="button"><i class=""></i> Back</a>
						</div>
					</div>
				</div>
			</div>

			<!-- begin panel -->
			<!-- <div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Panel Title here</h4>
				</div>
				<div class="panel-body">

					Panel Content Here
				</div>
			</div> -->
			<!-- end panel -->
		</div>
		<!-- end #content -->

		