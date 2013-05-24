<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="./index.html">
				ATON <sup>Admin Panel </sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/settings'); ?>">Website Settings</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?php echo $user->username; ?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li class="divider"></li>
                                                        <li><a href="<?php echo base_url('admin/login/logout'); ?>">Logout</a></li>
						</ul>
						
					</li>
				</ul>

			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li class="<?php echo isset($home_active)?'active':''; ?>">
						<a href="<?php echo base_url('admin/home'); ?>">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					
					<li class="dropdown <?php echo isset($products_active)?'active':''; ?>">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-th"></i>
							<span>Products</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/categories'); ?>">Categories</a></li>
							<li><a href="<?php echo base_url('admin/products'); ?>">Products</a></li>
						</ul> 				
					</li>
					
					<li class="dropdown <?php echo isset($pages_active)?'active':''; ?>">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-copy"></i>
							<span>Pages</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/pages/home'); ?>">Home</a></li>
							<li><a href="<?php echo base_url('admin/pages/aboutus'); ?>">About us</a></li>
							<li><a href="<?php echo base_url('admin/pages/contactus'); ?>">Contact us</a></li>
						</ul> 				
					</li>
					
                                        <li class="<?php echo isset($gallery_active)?'active':''; ?>">
						<a href="<?php echo base_url('admin/gallery'); ?>">
							<i class="icon-picture"></i>
							<span>Gallery</span>
						</a>	    				
					</li>
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->