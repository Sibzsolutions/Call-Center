<?php ?>
<div class="header">
		<div class="logo"><img src="<?php echo $this->webroot.'img/local/logo.jpg';?>" /></div>
        <div class="top_right">
          <a href="<?php echo $this->webroot.'Superadmin/index'?>">Dashboard</a>
          <a href="<?php echo $this->webroot.'Superadmin/users'?>">User Management</a>
          <a href="<?php echo $this->webroot.'Superadmin/site_setting'?>">Site Setting</a>
          <a href="<?php echo $this->webroot.'Superadmin/reviews'?>">Manage Reviews</a>
          <a href="<?php echo $this->webroot.'Superadmin/orders'?>">Order Management</a>
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
			
			<li><a href="<?php echo $this->webroot.'Superadmin/dynamic_pages'?>">Manage Pages</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/categories'?>">Manage Categories</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/products'; ?>">Manage Products</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/attributes'; ?>">Manage Attributes</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/offers'; ?>">Manage Offers</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/main_slider_images'; ?>">Manage Slider Images</a></li>
			
			<li><a href="<?php echo $this->webroot.'Superadmin/coupons'; ?>">Manage Coupons</a></li>
			
			<!--<li><a href="<?php //echo $this->webroot.'Superadmin/home_page_box'; ?>">Home Page Box</a></li>-->
			
			<!--<li><a href="<?php //echo $this->webroot.'Superadmin/footer_slider'; ?>">Footer Slider Images</a></li>-->
			
		  </ul>
		  <div class="setting_icon">
            <a href="<?php echo $this->webroot.'Superadmin/site_setting'?>"><img src="<?php echo $this->webroot.'img/local/setting_img.jpg';?>" /></a>
            <img src="<?php echo $this->webroot.'img/local/date_img.jpg';?>" />
          </div>
		</div>
	  </div>