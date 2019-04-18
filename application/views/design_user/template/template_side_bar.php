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
								<small>Design Panel User</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-key"></i> Change Password</a></li>
                            <li><a href="<?=base_url()?>design-logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            <!-- <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li> -->
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($menu_status==12){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Category & Material Setting  </span>
					    </a>
						<ul class="sub-menu">
							<li class="<?php if($sub_menu==121){ echo 'active'; }?>"><a href="<?=base_url()?>design-view-new-category-list" >View Category List</a></li>
						    <li class="<?php if($sub_menu==122){ echo 'active'; }?>"><a href="<?=base_url()?>design-view-new-material-list" >Create & View Material List</a></li>
						    
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==2){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>PR Schedule</span>
					    </a>                          
					   <ul class="sub-menu">
					   		  <li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>design-project-pr-schedule" >View Project PR Schedule</a></li>
					   		    <li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>design-project-pr-schedule-comment" >View Project PR Schedule Comment </a></li>
						    <!-- <li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>design-pr-schedule" >View PR Schedule</a></li> -->
						        <li class="<?php if($sub_menu==6){ echo 'active'; }?>"><a href="<?=base_url()?>design-pr-schedule-complete" >View PR Schedule Complete</a></li>
						</ul> 
					</li>
					<li class="has-sub <?php if($menu_status==2){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>PR Status</span>
					    </a> 
					    <ul class="sub-menu">
					   		<li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>design-project-pr-schedule-status" >View Project PR Schedule</a></li>

					  	</ul>
					</li>
					<li class="has-sub <?php if($menu_status==5){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>PR Remark Details</span>
					    </a>
						<ul class="sub-menu">
							 <li class="<?php if($sub_menu==56){ echo 'active'; }?>"><a href="<?=base_url()?>design-view-project-old-remark" >View Project PR Remark </a></li>
						
						  
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