<div id="cart" class="cart_box">
		   <a href="<?php echo $this->webroot.'buyshops/checkout';?>">
             <span id="simpleCart_quantity_old" class="simpleCart_quantity_old">
				  
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
				  
				  </span>
           </a>
	      </div>