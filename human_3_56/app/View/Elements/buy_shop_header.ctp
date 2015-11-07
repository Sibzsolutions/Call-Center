<?php
		
	error_reporting(0);

	App::import('Controller', 'Buyshops');
	$Buyshop = new BuyshopsController;
?>

<div class="header">
    <div class="width1220" style="min-height:127px;">
      <div class="logo"><a href="<?php echo $this->webroot.'buyshops/'; ?>"><img src="<?php echo $this->webroot.'img/only_human_userside/logo.jpg'; ?>" /></a></div>
      <div class="m_logo"><img src="<?php echo $this->webroot.'img/only_human_userside/mobile_logo.jpg'; ?>" /></div>
      <div class="top_right">
		
		<div id="cart">
		   <div class="col-xs-4 header-bottom-right">
			   <div class="box_1-cart">
				 <div class="box_11"><a href="<?php echo $this->webroot.'buyshops/checkout';?>">
				  <h4><p>Cart: <span class="simpleCart_total_old"></span> (<span id="simpleCart_quantity_old" class="simpleCart_quantity_old">
				  
				  <?php 
					
				  if($this->Session->check('count_add_cart_session') == 1)
				  $count_add_cart_session = $this->Session->read('count_add_cart_session');			
					
				  if($this->Session->check('count_add_to_cart') == 1)
				  $count_add_to_cart = $this->Session->read('count_add_to_cart');			
					
				  //echo "count_add_cart_session".$count_add_cart_session."<br>";
					
				  //echo "count_add_to_cart".$count_add_to_cart."<br>";
					
				  if(isset($count_add_to_cart) && isset($count_add_cart_session))
					echo ($count_add_to_cart+$count_add_cart_session); 			  
				  elseif(isset($count_add_cart_session))
					echo $count_add_cart_session; 
				  elseif(isset($count_add_to_cart))
					echo $count_add_to_cart; 
				  else
					echo "0" ; 							
				  
				  ?>
				  
				  </span> items)</p><img src="<?php echo $this->webroot.'img/buy_shop/bag.png'; ?>" alt=""/><div class="clearfix"> </div></h4>
				  </a></div>
				  <!--<p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
				  <div class="clearfix"> </div>
				</div>
			
			 <div class="clearfix"></div>
		   </div>
	   </div>
	  
	  
	  
	  
        <div class="online_store"><img src="<?php echo $this->webroot.'img/only_human_userside/online_store.jpg'; ?>" /></div>
        <div class="top_menu">
			
		  
		  <a href="#">My Wishlist</a>
		  <a href="#">Blog</a>
		  <a href="#">Checkout</a>
		  <a href="#">English</a>
		  <a href="#">USD</a>
		  
			<?php
					
				if(AuthComponent::user()):
				?>
				<a href="<?php echo $this->webroot.'buyshops/index'; ?>">My Account</a>
				<a href="#">My Wishlist</a>
				<a href="<?php echo $this->webroot.'buyshops/logout'; ?>">Logout</a>
				<?php
				else:
				?>
				<a href="<?php echo $this->webroot.'buyshops/login'; ?>">Login</a>
				<?php 
				endif;					
			?>
		
          
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="width1220">
        <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
		
		<div class="col-xs-6 menu">
				
				<ul class="megamenu skyblue">
				
				<?php 
					
					foreach($dynamic_menu as $cat)
					{						
						?>
						<!--<li class="active grid"><a class="color1" href="<?php //echo $cat['Category']['url']; ?>"><?php //echo $cat['Category']['catname']; ?></a>-->
						<li class="active grid" ><a  href="<?php echo $cat['Category']['url']; ?>"><?php echo $cat['Category']['catname']; ?></a>
						<div class="megapanel">
						<?php
						if($cat['Category']['sub_type'] != '')
						{
							$Buyshop->disp($cat['Category']['sub_type']);
						}
						else
						{
							echo '</li>';
						}
						?>
						</div>
						<?php						
					}
				?>
				
				  <!--<li><a href="#">adult</a></li>
				  <li><a href="#">youth</a></li>
				  <li><a href="#">ladies</a></li>
				  <li><a href="#">girls</a></li>
				  <li><a href="#">accessories</a></li>
				  <li><a href="#">showroom</a></li>-->
		  
				</ul> 
			</div>
		
          
        
        </nav>
        <div class="search">
          <input type="text" name="textfield" id="textfield" placeholder="Search Here" />
          <input type="submit" name="button" id="button" value="Submit" class="search_icon" />
        </div>
      </div>
    </div>
    <!--<div class="banner">
      <div class="width1220">
        <img src="<?php echo $this->webroot.'img/only_human_userside/banner.jpg'; ?>" />
      </div>
    </div>-->
  </div>
<div class="clearfix"></div>
<?php /*
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
			<div class="col-xs-10 header-bottom-left">
				<div class="col-xs-2 logo">
					<h1><a href="index.html"><span>Buy</span>shop</a></h1>
				</div>
				<div class="col-xs-6 menu">
				
				<ul class="megamenu skyblue">
				
				<?php 
					
					foreach($dynamic_menu as $cat)
					{						
						?>
						<!--<li class="active grid"><a class="color1" href="<?php //echo $cat['Category']['url']; ?>"><?php //echo $cat['Category']['catname']; ?></a>-->
						<li class="active grid" ><a  href="<?php echo $cat['Category']['url']; ?>"><?php echo $cat['Category']['catname']; ?></a>
						<div class="megapanel">
						<?php
						if($cat['Category']['sub_type'] != '')
						{
							$Buyshop->disp($cat['Category']['sub_type']);
						}
						else
						{
							echo '</li>';
						}
						?>
						</div>
						<?php						
					}
				?>

				</ul> 
			</div>
		</div>
		
	    <div class="col-xs-2 header-bottom-right">
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
</div>	 <?php 

*/

?>
