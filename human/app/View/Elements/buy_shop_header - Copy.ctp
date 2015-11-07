<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
			<div class="header_top">
	<div class="container">
		<div class="one-fifth column row_1">
			<span class="selection-box"><select class="domains valid" name="domains">
		       <option>English</option>
		       <option>French</option>
		       <option>German</option>
		    </select></span>
         </div>
         <div class="cssmenu">
			<ul>
				<?php
					
					if(AuthComponent::user()):
					?>
					<li class="active"><a href="<?php echo $this->webroot.'buyshops/index'; ?>">My Account</a></li> 
					<li class="active"><a href="<?php echo $this->webroot.'buyshops/logout'; ?>">Logout</a></li> 
					<?php
					else:
					?>
					<li class="active"><a href="<?php echo $this->webroot.'buyshops/login'; ?>">Login</a></li> 
					<?php 
					endif;
					
				 ?>
			</ul>
		 </div>
	</div>
</div>	
<div class="wrap-box"></div>
<div class="header_bottom">
	    <div class="container">
			<div class="col-xs-8 header-bottom-left">
				<div class="col-xs-2 logo">
					<h1><a href="index.html"><span>Buy</span>shop</a></h1>
				</div>
				<div class="col-xs-6 menu">
				
				
				
				<ul class="megamenu skyblue">
				
				
				<?php 
					
					echo "Dynamic_menu<pre>";
					print_r($dynamic_menu);
					echo "<pre>";
					
					foreach($dynamic_menu as $cat)
					{
						echo "Cat<pre>";
						print_r($cat);
						echo "<pre>";
						
						die();
					}
					
					
					die();
					
				?>
				
				
		            <ul class="megamenu skyblue">
				      
					  <li class="active grid"><a class="color1" href="index.html">Men</a>
					  <div class="megapanel">
						
						<div class="row">
							
							<div class="col1">
								<div class="h_nav">
									<ul class="megamenu skyblue">
										<li class="active grid"><a class="color1" href="<?php echo $this->webroot.'buyshops/products'; //men.html ?>">Products</a>

										<div class="megapanel">
										<div class="row">
										
										<div class="col1">
											<div class="h_nav">
												<ul class="megamenu skyblue">
													<li class="active grid"><a class="color1" href="<?php echo $this->webroot.'buyshops/products'; //men.html ?>">Products</a></li>
													<li><a href="men.html">Accessories</a></li>
													<li><a href="men.html">Bags</a></li>
													<li><a href="men.html">Caps & Hats</a></li>
													<li><a href="men.html">Hoodies & Sweatshirts</a></li>
													<li><a href="men.html">Jackets & Coats</a></li>
													<li><a href="men.html">Jeans</a></li>
													<li><a href="men.html">Jewellery</a></li>
													<li><a href="men.html">Jumpers & Cardigans</a></li>
													<li><a href="men.html">Leather Jackets</a></li>
													<li><a href="men.html">Long Sleeve T-Shirts</a></li>
													<li><a href="men.html">Loungewear</a></li>
												</ul>	
											</div>							
										</div>							
									  </div>
									  </div>
										
										
										</li>
										<li><a href="men.html">Accessories</a></li>
										<li><a href="men.html">Bags</a></li>
										<li><a href="men.html">Caps & Hats</a></li>
										<li><a href="men.html">Hoodies & Sweatshirts</a></li>
										<li><a href="men.html">Jackets & Coats</a></li>
										<li><a href="men.html">Jeans</a></li>
										<li><a href="men.html">Jewellery</a></li>
										<li><a href="men.html">Jumpers & Cardigans</a></li>
										<li><a href="men.html">Leather Jackets</a></li>
										<li><a href="men.html">Long Sleeve T-Shirts</a></li>
										<li><a href="men.html">Loungewear</a></li>
									</ul>	
								</div>							
							</div>							
						  </div>
						</div>
					</li>
				
				<li class="grid"><a class="color2" href="#">Women</a>
					  <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="men.html">Accessories</a></li>
										<li><a href="men.html">Bags</a></li>
										<li><a href="men.html">Caps & Hats</a></li>
										<li><a href="men.html">Hoodies & Sweatshirts</a></li>
										<li><a href="men.html">Jackets & Coats</a></li>
										<li><a href="men.html">Jeans</a></li>
										<li><a href="men.html">Jewellery</a></li>
										<li><a href="men.html">Jumpers & Cardigans</a></li>
										<li><a href="men.html">Leather Jackets</a></li>
										<li><a href="men.html">Long Sleeve T-Shirts</a></li>
										<li><a href="men.html">Loungewear</a></li>
									</ul>	
								</div>							
							</div>							
						  </div>
						</div>
			    </li>
				
				<li><a class="color4" href="about.html">About</a></li>				
				<li><a class="color5" href="404.html">Blog</a></li>
				<li><a class="color6" href="contact.html">Support</a></li>
			  </ul> 
			</div>
		</div>
		
	    <div class="col-xs-4 header-bottom-right">
	       <div class="box_1-cart">
		   
		    <!--<div class="box_11"><a href="checkout.html">
		      <h4><p>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="<?php echo $this->webroot.'img/buy_shop/bag.png'; ?>" alt=""/><div class="clearfix"> </div></h4>
		      </a></div>
	          <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
	          <div class="clearfix"> </div>
	        </div>-->
			
	        <div class="search">	  
				<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		     </div>
	         <div class="clearfix"></div>
       </div>
        <div class="clearfix"></div>
</div>	 