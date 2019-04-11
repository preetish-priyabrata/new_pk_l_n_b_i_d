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
								<small>Admin Panel User</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="<?=base_url()?>admin-change-password-module"><i class="fa fa-key"></i> Change Password</a></li>
                            <li><a href="<?=base_url()?>admin-logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            <!-- <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li> -->
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($menu_status==1){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-users"></i>
						    <span>User</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==1){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-user" >Create & View User</a></li>
						    <!-- <li><a href="index_v2.html">Dashboard v2</a></li> -->
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==2){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-file"></i>
						    <span>Project</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==2){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-project" >Create & View Project</a></li>
						    <!-- <li><a href="index_v2.html">Dashboard v2</a></li> -->
						</ul>
					</li>				
					<!-- <li class="nav-header"> General Setting</li> -->
					
					<!-- <li class="has-sub <?php if($menu_status==5){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Category</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==5){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-category" >View Category</a></li>
						    
						</ul>
					</li> -->
					<!-- <li class="has-sub <?php if($menu_status==6){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Other Charges</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==6){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-other-charges" >Create & View Other Charges</a></li>
						    
						</ul>
					</li> -->				
					<!-- <li class="has-sub <?php if($menu_status==10){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Vehicle  </span>
					    </a>
						<ul class="sub-menu">
							<li class="<?php if($sub_menu==11){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-Vehicle-type-details" >Create & View Vehicle Type</a></li>
							<li class="<?php if($sub_menu==12){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-Vehicle-capacity-details" >Create & View Vehicle Capacity</a></li>
						    <li class="<?php if($sub_menu==10){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-Vehicle-details" >Create & View Vehicle</a></li>
						    
						</ul>
					</li>
					<li class="has-sub <?php if($menu_status==11){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Location  </span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==111){ echo 'active'; }?>"><a href="<?=base_url()?>admin-view-location-details" >Create & View Location</a></li>
						    
						</ul>
					</li>
					 -->

					
					
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>