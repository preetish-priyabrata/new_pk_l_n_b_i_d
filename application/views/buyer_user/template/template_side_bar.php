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
								<small>Buyer Panel User</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-key"></i> Change Password</a></li>
                            <li><a href="<?=base_url()?>buy-logout"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            <!-- <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li> -->
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($menu_status==8){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-puzzle-piece"></i>
						    <span>Vendor </span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==8){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-view-vendors" >Create & View Vendor</a></li>
						    
						</ul>
					</li>

 					<li class="has-sub <?php if($menu_status==10){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>PR Received</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==10){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-pr-receive" >Received PR </a></li>						 
						</ul>
						
					</li>
					<li class="has-sub <?php if($menu_status==3){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>On-Going Bid </span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==3){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-pr-technical-ongoing" >On-going Technical Bid</a></li>		
						     <li class="<?php if($sub_menu==34){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-pr-commercial-closed-simple-ongoing" >On-going Commercial (Closed & Simple) Bid</a></li>						 
						</ul>
						
					</li>
					<!-- <li class="has-sub <?php if($menu_status==4){echo 'active';}?>">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fas fa-atlas"></i>
						    <span>Completed Bid </span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if($sub_menu==4){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-pr-technical-completed" >On-going Technical Bid</a></li>		
						     <li class="<?php if($sub_menu==44){ echo 'active'; }?>"><a href="<?=base_url()?>buyer-pr-commercial-closed-simple-completed" >On-going Commercial (Closed & Simple) Bid</a></li>						 
						</ul>
						
					</li> -->



			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
