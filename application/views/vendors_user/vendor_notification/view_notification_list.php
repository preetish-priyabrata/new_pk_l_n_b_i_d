<?php 
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){
	
	redirect('vendor-logout-pass');
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>user-vendor-home">Home</a></li>
			
				<li class="breadcrumb-item active">Notifications</li> 
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Notifications</h1>
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
			 <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>file_css_admin/DataTables/datatables.min.css"/> -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Notifications</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="vendor_example_new" class="display table" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Date Of Notfications</th>
					                <th>View Status</th>									
					              	<th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
					        	$x=0; 
					        		$data_get_id = array('vendor_id' => $Vendor_email_id );
											$this->db->order_by('date_entry', "desc");
											$this->db->order_by('view_status', "Asc");
					        		$query=$this->db->get_where('master_vendor_notifications',$data_get_id);
					        		foreach ($query->result() as $key => $value) {
					        		$x++;
					        		$view_status=$value->view_status;
					        	?>
					        	<tr>
					        		<td><?=$x?></td>
					        		<td><a href="<?=base_url()?>vendor-view-detail-noticfaction/<?=$value->slno_approve?>/<?=$view_status?>"><?=date('d-m-Y',strtotime($value->date_entry))?></a></td>
					        		<td><?php 
					        		if($view_status==0){
					        			echo "<p style='color:red'>Not viewed</p>";
					        		}else{
					        			echo "Viewed";
					        		}
					        		?></td>
					        		<td><a href="<?=base_url()?>vendor-view-detail-noticfaction/<?=$value->slno_approve?>/<?=$view_status?>">View Details</a></td>
					        	</tr>
					        	<?php 
					        		}
					        	?>
					        </tbody>
					    </table>
				</div>
			</div>
			<a  href="<?=base_url()?>user-vendor-home" class="btn btn-sm btn-link">Back</a>
			<!-- end panel -->
		</div>
		<!-- end #content -->
		<script type="text/javascript">
	$(document).ready( function () { 
    // Setup - add a text input to each header cell
    $('#vendor_example_new thead tr:eq(1) th').each( function () {
        var title = $('#vendor_example_new thead tr:eq(0) th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } ); 
  
    var table = $('#vendor_example_new').DataTable({
        orderCellsTop: true
    });
  
    // Apply the search
    table.columns().every(function (index) {
        $('#vendor_example_new thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });
});
</script>