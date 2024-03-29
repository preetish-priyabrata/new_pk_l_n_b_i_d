<?php 
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){
	
	redirect('buy-logout-by-pass');
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="user-admin-home">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Category</a></li>
				<li class="breadcrumb-item active">View Category List</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">View  Category List </h1>
			<!-- end page-header -->
			<?php if(!empty($this->session->flashdata('success_message'))){?>
			<div class="alert alert-success fade show">
			    <span class="close" data-dismiss="alert">×</span>
			    <strong>Success!</strong>
			    <?=$this->session->flashdata('success_message')?> 
			
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
					
					<h4 class="panel-title">Category List</h4>
				</div>
				<div class="panel-body">
					
					<div class="pull-right">
						<a href="<?=base_url()?>buyer-new-material-catergory-new/1" class="btn btn-info fa fa-puzzle-piece " role="button" title="Here new Category is been created">Add New Material Category</a>
					</div>
					<br>
					<br>
					<div class="table-responsive-sm">
						<table id="example" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Category Name</th>	
					                <th>Click To View More</th>					               
					            </tr>
					        </thead>	
					        <tbody>
					        		<?php 
					        		$this->db->distinct();
									$this->db->select('category_name');
									$this->db->where('status', '1'); 
									$query = $this->db->get('master_category_item');
					        		$x=0;
					        		
					        		foreach ($query->result() as $value) {
					        			
					        			
					        								        		
					        			$x++;
					        			?>
					        			<tr>
							        		<td><?=$x?></td>
							                <td><?=ucfirst($value->category_name)?></td>
							               	<td><a href="<?=base_url()?>buyer-view-material-more/<?=$value->category_name?>">Click For More</a></td>
							        	
					            		</tr>
					        			<?php 
					        		}
					        		?>
					        </tbody>				        
					    </table>
					</div>
					<br>
					<br>
					<a href="user-design-home" class="btn btn-xs btn-success fa fa-angle-left"   role="button"><i class=""></i> Back</a>
				</div>
			</div>

		
		</div>
		<!-- end #content -->

		