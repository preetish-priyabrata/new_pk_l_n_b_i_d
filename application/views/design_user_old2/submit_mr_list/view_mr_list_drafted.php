<?php 
$email_id=$this->session->userdata('design_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
$job_Code_id=$job_Code_id;
$result_drafted=$this->design_user->design_mr_drafted_list($job_Code_id,$email_id);
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="<?=base_url()?>user-design-home">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Material Requisition</a></li>
				<li class="breadcrumb-item active">View Drafted Material Requisition List</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> View Drafted Material Requisition </h1>
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
					
					<h4 class="panel-title">Drafted Material Requisition List</h4>
				</div>
				<div class="panel-body">
					
					<div class="pull-right">
						<a href="<?=base_url()?>design-new-mr-order" class="btn btn-info fa fa-puzzle-piece " role="button" title="here new material requisition been created"> Create New Material Requisition</a>
					</div>
					<br>
					<br>
					<div class="table-responsive-sm">
						<table id="example" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>Slno .</th>
					                <th>Job Code</th>
					                <th>MR No.</th>
					                <th>Material Category</th>	                
					              	<th>Date of Creation</th>
					              	<th>Version</th>
					                <th>Action</th>
					            </tr>
					        </thead>	
					        <tbody>
					        	<?php 
					        		$x=0;
					        		// print_r($result_drafted);
					        		foreach ($result_drafted['drafted_list'] as $value_list) {
					        			$x++;
					        			// ( [slno_mr] => 1 [mr_no] => 2018-10-08-zQV2h [approver_id_slno] => 18 [approver_id] => siprah@gmail.com [approver_name] => Approver5 [job_code_id_slno] => 1 [job_code_id] => 0770 [materilal_category_id_slno] => 1 [material_category_name] => standard catalogued item [techinal_evalution] => 1 [status] => 4 [status_resubmit] => 0 [resubmit_count] => 0 [edit_id] => 0 [date_creation] => 2018-10-08 [time_creation] => 18:25:16 [time_date_creation] => 2018-10-09 12:53:24 [date_submition] => [time_submition] => [date_required] => 2018-10-16 [creators_id] => sam@ilab.com )
					        			$last_id=$value_list->slno_mr;
					        		?>
					        		<tr>
						        		<td><?=$x?></td>								                
						                <td><?=$value_list->job_code_id?></td>
						                <td><?=$value_list->mr_no?></td>
						                <td><?=$value_list->material_category_name?></td>
						                <td><?=$value_list->date_creation?></td>       
	                                   <td><?php $Status=$value_list->status;
						                if($Status==4){
						                	echo "Part-I Completed";
						                }else if($Status==5){
						                	echo "Part II Completed";
						                }else{
						                	echo "--";
						                }

						                ?></td>
						                
						                <td>
						                	<div class="btn-group">
												<a href="#" class="btn btn-purple btn-sm">Action</a>
												<a href="#" class="btn btn-purple dropdown-toggle" data-toggle="dropdown"></a>
												<ul class="dropdown-menu pull-right">	
													<?php 
														switch ($value_list->materilal_category_id_slno) {
															case '1':
						                                   
															if($Status==4){
						                                    	$edit=base_url().('design-new-mr-order-first/'.$last_id.'/'.'1/'.$last_id);
						                                	}else if($Status==5){
						                                		$edit=base_url().('design-new-mr-order-first-edit/'.$last_id.'/'.'1/'.$last_id);
						                                	}
						                                    
						                                    break;
						                                case '2':
						                                    if($Status==4){
						                                    	$edit=base_url().('design-new-mr-order-second/'.$last_id.'/'.'2/'.$last_id);
						                                	}else if($Status==5){
						                                		$edit=base_url().('design-new-mr-order-second-edit/'.$last_id.'/'.'2/'.$last_id);
						                                	}
						                                    
						                                    
						                                    break;
						                                case '3':
						                                     if($Status==4){
						                                    	$edit=base_url().('design-new-mr-order-third/'.$last_id.'/'.'3/'.$last_id);
						                                	}else if($Status==5){
						                                		$edit=base_url().('design-new-mr-order-third-edit/'.$last_id.'/'.'3/'.$last_id);
						                                	}
						                                    
						                                   
						                                    break;
						                                
						                                default:
						                                    $this->session->set_flashdata('error_message', ' Something went wrong ');
						                                    $edit=('user-design-home');
						                                    break;
													 	}
													 ?>										  	
													<li><a   <?php echo "href='".$edit."'";?> >Edit </a></li>
													<li class="divider"></li>
													<!-- <li><a <?php echo "href='change-category-status/".$user_id."/".$slno_id."/3' ";?> onclick="return confirm('Are you sure you want to delete this category?');">Delete</a></li> -->
												</ul>
											</div>
	                                   </td>
	                                   <!-- <td></td> -->
															  
						            </tr>

					        		<?php 



					        		}				        	
					        	?>
					        </tbody>				        
					    </table>
					</div>
					<br>
					<br>
					<a href="<?=base_url()?>user-design-home" class="btn btn-xs btn-success fa fa-angle-left"   role="button"><i class=""></i> Back</a>
				</div>
			</div>

		
		</div>
		<!-- end #content -->

		