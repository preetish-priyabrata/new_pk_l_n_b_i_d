 <!-- begin #sidebar -->
		<div id="sidebar" class="sidebar sidebar-transparent">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="<?=base_url()?>file_css_admin/assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?=$this->session->userdata('Username');?>
								<small>BU Panel User</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="<?=base_url()?>bu-change-password-module"><i class="fa fa-key"></i> Change Password</a></li>
                            <li><a href="<?=base_url()?>bu-logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            <!-- <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li> -->
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($menu_status==2){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>Project PR Schedule</span>
					    </a>
						<ul class="sub-menu">
						    
						    <li class="<?php if($sub_menu==4){ echo 'active'; }?>"><a href="<?=base_url()?>bu-pr-schedule" >Entry PR Schedule</a></li>
						    <li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-project" >Commercially Settled PR's</a></li>
						    <!-- <li><a href="index_v2.html">Dashboard v2</a></li> -->
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==22){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>New Order Book</span>
					    </a>
						<ul class="sub-menu">
						    
						    <li class="<?php if($sub_menu==422){ echo 'active'; }?>"><a href="<?=base_url()?>bu-create-new-order-book" >Entry New Order Book</a></li>
						    <li class="<?php if($sub_menu==522){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-new-order-book" >View Order Book</a></li>
						</ul>
					</li> 
					<li class="has-sub <?php if($menu_status==1){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>BTP Tracking Tool</span>
					    </a>
						<ul class="sub-menu">
							 <li class="<?php if($sub_menu==6){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-project-old" >View Project PR Schedule Tracking Tool </a></li>
						    <!-- <li class="<?php if($sub_menu==1){ echo 'active'; }?>"><a href="<?=base_url()?>bu-create-tracking" >Create  Tracking Tool</a></li> -->
						    <!-- <li class="<?php if($sub_menu==2){ echo 'active'; }?>"><a href="<?=base_url()?>bu-drafted-tracking" >Drafted  Tracking Tool</a></li> -->
						   <!--  <li class="<?php if($sub_menu==3){ echo 'active'; }?>"><a href="<?=base_url()?>bu-new-submited-tracking" >Submitted  Tracking Tool</a></li> -->
						  
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==5){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>PR Remarks Details</span>
					    </a>
						<ul class="sub-menu">
							 <li class="<?php if($sub_menu==56){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-project-old-remark" >View Entire Remarks Chain </a></li>
						
						  
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==6){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>Reports</span>
					    </a>
						<ul class="sub-menu">
							<li class="<?php if($sub_menu==66){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-a" title="Report on PR release Status of a Project: Planned Vs Actual ">Report on PR release Status of a Project: “Planned Vs Actual” </a></li>
							<li class="<?php if($sub_menu==67){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-b" title="Report On PR release status for a Period: Planned Vs Actual">Report On PR release status for a Period: Planned Vs Actual</a></li>
							<li class="<?php if($sub_menu==68){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-c" title="Report on PO release (order Settlement) Status">Report on PO release (Order Settlement) Status</a></li>
							<li class="<?php if($sub_menu==69){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-d" title="List of PRs/Items which are technically cleared but ordering is pending">Report on List of PRs technically cleared but order is pending</a></li>
							<li class="<?php if($sub_menu==69.1){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-e" title="Report to Extract data of desired columns of Sheet  Procurement & Projects ">Report to Extract data of desired columns of Sheet  Procurement & Projects</a></li>
							<!-- <li class="<?php if($sub_menu==69.2){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-f" title="Status of PRs - Buyer wise">Report F</a></li> -->
							<li class="<?php if($sub_menu==69.3){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-g" title="Status of PRs - Buyer wise">Status of PRs - Buyer wise</a></li>
							<li class="<?php if($sub_menu==69.4){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-i" title="New order book">Report on New order book</a></li>
							<!-- <li class="<?php if($sub_menu==69.9){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-l" title="New order book">Report L</a></li> -->
							<li class="<?php if($sub_menu==69.5){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-n" title="Supplier Performance Report">Report on Supplier Performance Report</a></li>
							<li class="<?php if($sub_menu==69.6){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-o" title="material Price trend (MPT)">Report on Material Price trend (MPT) </a></li>
							<li class="<?php if($sub_menu==69.7){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-p" title="Supplier Specific spend (SSS)">Report on Supplier Specific spend (SSS)</a></li>
							<li class="<?php if($sub_menu==69.8){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-q" title="Design Dept. Productivity (DDP)">Report on Design Dept. Productivity (DDP) Case 1</a></li>
							<li class="<?php if($sub_menu==69.81){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-q-1" title="Design Dept. Productivity (DDP)">Report on Design Dept. Productivity (DDP) Case 2</a></li>
							<li class="<?php if($sub_menu==69.82){ echo 'active'; }?>"><a href="<?=base_url()?>bu-view-report-q-2" title="Design Dept. Productivity (DDP)">Report on Design Dept. Productivity (DDP) Case 3 </a></li>
						</ul>
					</li>
					
					
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>