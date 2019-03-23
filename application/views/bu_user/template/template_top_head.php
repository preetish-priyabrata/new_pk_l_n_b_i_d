<?php 
$created_session_id=$this->session->userdata('session_id');
if(empty($created_session_id)){
	
	redirect('bu-logout-by-pass');
}
?>
<style type="text/css">
	.page-sidebar-toggled.page-sidebar-minified .sidebar.sidebar-transparent,.sidebar-bg,
.sidebar.sidebar-transparent,.sidebar-bg {
    background: linear-gradient(rgba(188, 14, 14, 0.5), rgba(29, 19, 93, 0.5)), url(<?=base_url()?>file_css_admin/assets/css/default/images/cover-sidebar.jpg);
    background-size: cover
}
</style>
<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="<?=base_url()?>user-bu-home" class="navbar-brand"><span class="navbar-logo rounded-circle" style="background: url(<?=base_url()?>file_css_admin/assets/img/logo/logo-admin.png) no-repeat;width: 48px; background-size: cover; height: 40px; margin-top: -6px ;"></span> <b>Ilab</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li>
					<form class="navbar-form" action="<?=base_url()?>bu-search-pr-no" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="get_pr_no" placeholder="Enter PR NO" required="" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>				
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url()?>file_css_admin/assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline"><?=$this->session->userdata('Username');?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<!-- <a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div> -->
						<a href="<?=base_url()?>bu-logout" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		