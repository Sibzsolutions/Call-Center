<?php ?>
<div class="header">
		<div class="logo"><img src="<?php echo $this->webroot.'img/local/logo.jpg';?>" /></div>
        <div class="top_right">
          <a href="<?php echo $this->webroot.'Superadmin/index'?>">Dashboard</a>
          <a href="<?php echo $this->webroot.'Superadmin/users'?>">User Management</a>
          <a href="#">Order Management</a>
          <?php
					
				if(AuthComponent::user()):
				?>
				<a href="<?php echo $this->webroot.'Superadmin/myaccount'; ?>">My Account</a>
				<a href="<?php echo $this->webroot.'Superadmin/logout'; ?>">Logout</a>
				
				
				<?php
				else:
				?>
				<a href="<?php echo $this->webroot.'Superadmin/login'; ?>">Login</a>
				<?php 
				endif;					
			?> 
        </div>
		<div class="main_menu">
		  <ul>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/site_setting'?>">Site Setting</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/dynamic_pages'?>">Manage Pages</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/categories'?>">Manage Categories</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/products'; ?>">Manage Products</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/attributes'; ?>">Manage Attributes</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/offers'; ?>">Manage Offers</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/main_slider_images'; ?>">Manage Slider Images</a></li>
			
			<li><a href="#">Manage Reviews</a></li>
		  </ul>
		  <div class="setting_icon"><img src="<?php echo $this->webroot.'img/local/setting_icon.jpg';?>" /></div>
		</div>
	  </div>