<?php
$email_id=$this->session->userdata('buy_email_id');
if(empty($email_id)){

	redirect('buy-logout-by-pass');
}
$result_drafted=$this->buyer_user->drafted_bid_information_commerical($email_id,1,'');

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Send Bid Information</a></li>
				<li class="breadcrumb-item active">Send Bid Information of Commercial</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Send Information Of Commercial Bid</h1>
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

			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">

						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Save Bid Information</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">						
						<table id="example_buyer" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Bid Ref</th>
					              	<th>Bid Start Date</th>

					              	<th>Bid End Date</th>
					              	<th>Bid Query Date</th>
					              	<th>Bid Type</th>
					              	<th>Status</th>
					                <th>Action</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
					        	$x=0;
					        		if($result_drafted['no_bid']==1){
					        			foreach ($result_drafted['bid_list'] as $key_techniacl) {
					        				
					        				$bid_ref=$key_techniacl->bid_ref;
					        				$Slno_bid=$key_techniacl->Slno_bid;
					        				$result_drafted_dates=$this->buyer_user->drafted_bid_information_DATE_commerical($Slno_bid,1);
					        				// print_r($result_drafted_dates);
					        				if($result_drafted_dates['no_bid_date']==1){
					        					$x++;
					        					 // Array ( [no_bid_date] => 1 [bid_date_list] => Array ( [0] => stdClass Object ( [Slno_bid_date] => 1 [bid_slno] => 3 [buyer_slno] => 1 [bid_start_date] => 2018-12-04 [bid_closed_date] => 2018-12-15 [bid_query_closed_date] => 2018-12-06 [status] => 4 [master_bid_id] => 1 ) ) )
						        				$mode_bid=$key_techniacl->mode_bid;
						        				if($mode_bid=='Rank Order Bid'){
							        				$category=$key_techniacl->category;
							        					$sent_imteration=base_url()."buyer-bid-query-commerical-intimation/".$Slno_bid."/".$category;
							        					$sent_notifivation=base_url()."buyer-bid-query-commerical-inti-notification/".$Slno_bid."/".$category;
							        				switch ($category) {
							        					case '1':
							        						$edit=base_url()."buyer-bid-send-commerical-view/".$Slno_bid."/".$category;
							        						$send=base_url()."buyer-bid-query-commerical/".$Slno_bid."/".$category;
							        						break;
							        					case '2':
							        						$edit=base_url()."buyer-bid-send-commerical-view/".$Slno_bid."/".$category;
							        						$send=base_url()."buyer-bid-query-commerical/".$Slno_bid."/".$category;
							        						break;
							        					case '3':
							        						$edit=base_url()."buyer-bid-send-commerical-view/".$Slno_bid."/".$category;
							        						$send=base_url()."buyer-bid-query-commerical/".$Slno_bid."/".$category;
							        						break;
							        					default:
							        						$edit="#";
							        						$send="#";
							        						break;
							        				}
							        				?>
							        				<tr>
							        					<td><?=$x?></td>
							        					<td><?=$bid_ref?></td>
							        					<td><?=$result_drafted_dates['bid_date_list'][0]->bid_start_date?></td>
							        					<td><?=$result_drafted_dates['bid_date_list'][0]->bid_closed_date?></td>
							        					<td><?=$result_drafted_dates['bid_date_list'][0]->bid_query_closed_date?></td>
							        					<td><?=$key_techniacl->mode_bid?></td>
							        					<td><b style='color: green'> Send</b></td>
							        					<td><a href="<?=$edit?>" class="btn-info btn-sm "><i class="fa fa-tv"></i> View</a> || <a href="<?=$send?>" class="btn-warning btn-sm"><i class="fa fa-question-circle" aria-hidden="true"></i> Query</a>
							        						<?php if($key_techniacl->count_id==0){?>							        					<br>
							        					<br> <a href="<?=$sent_imteration?>" class="btn-success btn-sm"> <i class="fa fa-paper-plane"></i> Sent Invitation</a>
							        				<?php }else{
							        					?>
							        					<br>
							        					<br> <a href="<?=$sent_notifivation?>" class="btn btn-purple btn-sm"> <i class="fa fa-paper-plane"></i> Sent Notifications</a>
							        					<?php }?> 
							        				</td>
							        				</tr>

							        				<?php
							        			}
					        				}else{
					        					// $data_id = array('Slno_bid'=>$Slno_bid);
					        					// $data_update = array('status_bid' => 4 );
					        					// $this->db->update('master_bid_commerical',$data_update,$data_id);
					        				}
					        				# code...
					        			}
					        		}
					        	?>
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
