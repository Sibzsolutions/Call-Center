<?php
		
	error_reporting(0);

	App::import('Controller', 'Buyshops');
	$Buyshop = new BuyshopsController;
?>
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
</div>	 