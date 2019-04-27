<?php
$Vendor_email_id=$this->session->userdata('Vendor_email_id');
if(empty($Vendor_email_id)){

	redirect('vendor-logout-pass');
}
$result_new_bid=$this->vendor_db_usersnew->vendor_new_commerical_bid_list_pr($Vendor_email_id)
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>seller/user-vendor-home">Home</a></li>
				
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">New Commercial Bid<small></small></h1>
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
					<h4 class="panel-title">New Bid</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<?php
						// print_r($result_new_bid);
						?>
						<table id="vendor_example_new" class="display table" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Project Name [Bid Ref]</th>
					                <th>View Status</th>
													
					                <th>Type of Bid</th>
					                <th>Bid Start date</th>
					              	<th>Bid End date</th>
					              	<th>Action</th>
													<th>Query</th>
													<th>Term <br> & Condition </th>

					            </tr>
					        </thead>
					        <tbody>
					        	<?php
  										$x=0;
											if($result_new_bid['no_new_tech']==1){

													foreach ($result_new_bid['new_tech_list'] as  $key_technical) {
														$job_code=$key_technical->job_code;

														$query_project=$this->db->get_where('master_project',array('Project_Slno'=>$job_code));
														$result_project=$query_project->result();
														$x++;
  									?>
													  <tr>
													    	<td><?php echo $x;?></td>
													    	<td><?=ucwords($result_project[0]->Project_Name)?> [ <?php echo ucwords($key_technical->bid_ref);?> ]</td>
													     	<td>
																	<?php
																			$status_view=$key_technical->status_view;
																			switch ($status_view) {
																				case '5':
																					echo "<b style='color:Red;'>Not Viewed</b>";
																					break;
																				case '6':
																							echo "<b style='color:blue;'>Viewed</b>";
																						break;
																			  	case '7':
																							echo "<b style='color:green;'>Submitted</b>";
																						break;
																				case '8':
																							echo "<b style='color:orange;'>Resubmission Of Bid</b>";
																						break;

																				default:
																					// code...
																					break;
																			}
																	?>
															  </td>
																
													     	<td><?php echo $key_technical->mode_bid;?></td>
													     	<td><?php echo date('d-m-Y',strtotime($key_technical->date_start));?></td>
													     	<td><?php echo date('d-m-Y',strtotime($key_technical->date_end));?></td>
																<td><a href="<?=base_url()?>seller/user-vendor-bid-view-commerical-details-pr/<?=$key_technical->slno_vendor?>/<?=$status_view?>" class="btn btn-sm btn-success">View</a></td>
																<td><a href="<?=base_url()?>seller/user-vendor-commerical-query-panel/<?=$key_technical->slno_vendor?>" class="btn btn-sm btn-warning">Query</a></td>
																<td><a href="<?=base_url()?>seller/user-vendor-commerical-attachment-panel/<?=$key_technical->slno_vendor?>" class="btn btn-sm btn-info">upload </a></td>
													  </tr>
  												<?php }
												}
													?>

</tbody>
  </table>
    </div>
  </div>
<!-- </div> -->
<a  href="<?=base_url()?>user-vendor-home" class="btn btn-sm btn-link">Back</a>
</div>
</div>
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