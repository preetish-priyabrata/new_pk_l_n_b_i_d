<?php 
$email_id=$this->session->userdata('bu_email_id');
if(empty($email_id)){
	
	redirect('bu-logout-by-pass');
}
 $table="master_pr_schedule";    
$get_pr_no=trim($get_pr_no);
// status_bu_used
 $data_check = array('status' => 1);
	$this->db->like('pr_no', $get_pr_no);  
   $query=$this->db->get_where($table,$data_check);
   // echo $this->db->last_query();
       // echo  $this->db->last_query();  <th>Bu PR Revised Schedule</th>  <td>'.$row->bu_revised_schedule.'</td>
    $output = '<div class="table-responsive">
      <h3 align="center">Total Data - '.$query->num_rows().'</h3>
      <table class="table table-striped table-bordered display example_buyer_bu" >
      <thead>
        <tr>
          <th>Discipline</th>
          <th>PR No</th>
          <th>Project Name</th>
          <th>Area</th>
          <th>Item</th>
          <th>UOM</th>
          <th>Quantity</th>
          <th>Original Schedule</th>         
           <th>PR Revised Schedule</th>         
          <th>Create Tracking</th>
          <th>Drafted </th>
          <th>Submitted </th>
        </tr>
        </thead>
        <tbody>
    ';
    foreach($query->result() as $row){
	    $slno=$row->slno;
	    $job_code=$row->job_code;
	    $status_bu_used=$row->status_bu_used;
	    $data_project = array('Project_Slno' =>$job_code);
		$table_project='master_project';
		$query_project=$this->db->get_where($table_project,$data_project);
		$data_db=$query_project->result(); // here fetch information 
		$row_PROJECT = $data_db[0]; 
	    $project_name=$row_PROJECT->Project_Name;
	    if($status_bu_used==0){
	    	  $submited='--' ;
	    	  $drafted='--';
	    	  $Creating='<a href="'.base_url().'bu-mr-new-create/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'" target="_blank"> Create Tracking Tool  </a>';
	    }else{
		    $data_check_drafted = array('project_slno' => $job_code,'Status'=>'2','pr_no_slno' =>$row->slno);

		    $query_drafted=$this->db->get_where('master_tracking_tools_m',$data_check_drafted);
		    if($query_drafted->num_rows()!=0){
		        $result_drafted=$query_drafted->result();
		        $drafted='<a href="'.base_url().'bu-mr-drafted/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_drafted[0]->Slno_tracking.'" target="_blank"> Click Drafted  </a>';
		    }else{
		        $drafted='--';
		    }
		    $data_check_submit = array('project_slno' => $job_code,'Status'=>'1' ,'pr_no_slno'=>$row->slno);
		    $query_submit=$this->db->get_where('master_tracking_tools_m',$data_check_submit);
		    if($query_submit->num_rows()!=0){
		         $result_submit=$query_submit->result();
		         $submited='<a href="'.base_url().'bu-view-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'" target="_blank"> Click View  </a> ||  <a href="'.base_url().'bu-view-edit-tracking-tool-m/'.$row->pr_no.'/'.$row->slno.'/'.$row->job_code.'/'.$result_submit[0]->Slno_tracking.'" target="_blank"> Click Edit  </a> ';
		    }else{
		       $submited='--' ;
		    }
		    $Creating="--";
		}
                    $output .= '
                    <tr>
                      <td>'.$row->discipline.'</td>
                      <td>'.$row->pr_no.'</td>
                      <td>'.$project_name.'</td>
                      <td>'.$row->area.'</td>
                      <td>'.$row->item.'</td>
                      <td>'.$row->UOM.'</td>
                      <td>'.$row->quantity.'</td>
                      <td>'.$row->original_schedule.'</td>
                      <td>'.$row->revised_schedule.'</td>
                     
                      <td>'.$Creating.'</td>
                      <td>'.$drafted.'</td>
                      <td>'.$submited.'</td>
                    </tr>
                    ';
                }
                $output .= '</tbody>
                </table>
                </div>';
                // $output .= '';
               
?>

<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item active"><a href="#" class="fa fa-home ">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Search</a></li>
				<li class="breadcrumb-item active">PR NO Search</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Search PR NO <small> <?=$get_pr_no?> </small></h1>
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
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">PR No  <small> <b><?=$get_pr_no?></b></small></h4>
				</div>
				<div class="panel-body">
					<div class="card">
					  	<div class="card-header">Pr Information</div>
					  	<div class="card-body">
					  		<?=$output;?>
					  	</div>
					  	<!-- <div class="card-footer">Footer</div> -->
					</div>					
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->