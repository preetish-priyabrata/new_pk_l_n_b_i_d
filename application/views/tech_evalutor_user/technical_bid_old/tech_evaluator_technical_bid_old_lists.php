<?php
$technical_email_id=$this->session->userdata('technical_email_id');
if(empty($technical_email_id)){

	redirect('comm-evalutor-logout-by-pass');
}
$tech_slno=$this->session->userdata('tech_slno');
$list_success_bid=$this->tech_eva_db->technical_evaluator_bid_new_lists_old($tech_slno);
// $data=array'technical_email_id'=>$technical_email_id,'status_active' =>1;
// $query=$this->db->get_where('master_bid_technicalevaluation',$data);
?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>user-technical-evalutor-home">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Technical Bid New</a></li>
				<li class="breadcrumb-item active">List of Technical Bid Old List</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">List of Technical Bid Old</h1>
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

			 ?>
			 <div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>

					<h4 class="panel-title">Technical Bid New List</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="example_buyer" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Bid Ref</th>
					                <th>Bid Id.</th>					               
					              	<th>Status</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
					        		if($list_success_bid['no_bid']==1){
					        		$x=0;
					        		
					        		foreach ($list_success_bid['bid_ids_list'] as $bid_key_id) {
					        				$master_bid_id=$bid_key_id->master_bid_id;

					        			$x++;

					        			?>
					        		<tr>
					        			<td><?=$x?></td>
					        			<td><?=$bid_key_id->bid_ref?></td>
					        			<td><?=$bid_key_id->bid_id?></td>					        	
					        			<td><?php
		                                    $status_bid=$bid_key_id->status_bid;
		                                    if($status_bid==1){
		                                    	echo "<p style='color:green'> Active Bid</p>";
		                                    }else{
		                                    	echo "Closed Active Bid";
		                                    }
		          ?>

		                                </td>

		                                <td>
                                      <a href="<?=base_url()?>user-technical-evaluator-view-details-technical-bid-new-complete-view/<?=$bid_key_id->Slno_bid?>/<?=$bid_key_id->category?>/2" class="btn btn-sm btn-lime" title="Click Here Closed Bid Sent information of approved vendors" >View Details</a>
									  </td>




						            </tr>
						        <?php } }?>

					        </tbody>
					    </table>
					</div>
					<br>
					<br>
					<a href="<?=base_url()?>user-technical-evalutor-home" class="btn btn-xs btn-success fa fa-angle-left"   role="button"><i class=""></i> Back</a>
				</div>
			</div>


		</div>
		<!-- end #content -->
