<div id="cart">

   <div class="col-xs-4 header-bottom-right">
	       <div class="box_1-cart">
		      
			  <div class="box_11"><a href="<?php echo $this->webroot.'buyshops/checkout';?>">
		      
			  <h4>
			  
			  <p>
			  Cart: 
			  <span class="simpleCart_totalold">
			  </span> 
			  (<span id="simpleCart_quantity_old" class="simpleCart_quantityold">
			  <?php 
			  	
			  if($this->Session->check('count_add_cart_session') == 1)
			  $count_add_cart_session = $this->Session->read('count_add_cart_session');			
				
			  if($this->Session->check('count_add_to_cart') == 1)
			  $count_add_to_cart = $this->Session->read('count_add_to_cart');			
				
			  //echo "count_add_cart_session".$count_add_cart_session;
				
			  //echo "count_add_to_cart".$count_add_to_cart;
				
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
			  items)
			  </p>
			  <img src="<?php echo $this->webroot.'img/buy_shop/bag.png'; ?>" alt=""/>
			  
			  <div class="clearfix"> 
			  </div>
			  
			  </h4>
		      
			  </a>
			  
			  </div>
	          
			  <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
	          
			  <div class="clearfix"> </div>
	        
			</div>
	        
	         <div class="clearfix"></div>
   </div>
   </div>