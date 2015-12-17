<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

 class BuyshopsController extends AppController {
	
	/*
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('usremail' => 'usremail')
            )
        )
    ),'RequestHandler','Paginator', 'Session'); 
	*/
	
	public $uses = array('User', 'Site_setting', 'Category', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image', 'Offer_master', 'Attribute_master', 'Attribute_category', 'Attribute_value', 'Produc_attribute', 'Cart_master', 'Slider_image', 'Contact_us', 'Home_page_box', 'Review_master', 'Wishlist_master', 'Wishlist_detail', 'Coupon_master', 'Produc_color_image');
	
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('usremail' => 'usremail')
            )
        )
    ),'RequestHandler','Paginator', 'Session'); 
	
	public $helpers = array( 
	'Js' => array('Jquery'), 'Session');
	 
	function beforeFilter()
	{
		 parent::beforeFilter();
		 AuthComponent::$sessionKey='onlyhuman';
		 $this->Auth->fields = array('username' => 'username','password' => 'password');
		 $this->Auth->authenticate = array('Form' => array('scope'=>array('User.usrtype'=>array('0'))));
		 $this->Auth->loginAction=array('controller' => 'Buyshops','action' => 'myaccount');
		 $this->Auth->logoutRedirect=array('controller' => 'Buyshops','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Buyshops','action'=>'myaccount');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login', 'index', 'product_details', 'products', 'single', 'add_to_cart', 'checkout', 'remove_from_cart', 'sort_products', 'filter_search_type', 'contact_us', 'search_results', 'review_mgt', 'wishlist_mgt', 'add_to_cart_wishlist', 'remove_from_wishlist', 'coupon_mgt', 'color_change_imgs');  
		 
		 $this->layout="buyshops_layout";   
		 
		 $userdata = $this->Auth->user();
		
		 $this->set('user_data',$userdata);
		 
		 //For meta title, key and descriptions
		 $site_setting = $this->Site_setting->find('first');
		 $this->set('site_setting',$site_setting);
		 
		 if(isset($this->request->params['action']))
		 {
			 $data_page = $this->request->params['action'];
				
			 $dynamic_page_data = $this->Dynamic_page->find('first',array('conditions'=>array('Dynamic_page.name'=>$data_page)));
		 }
		 
		 if(isset($dynamic_page_data))	
		 $this->set('dynamic_page_data',$dynamic_page_data);
			
		 $site_setting = $this->Site_setting->find('first');	
		 $this->set('site_setting', $site_setting);	
		
		 $cat_data = $this->Category->find('all',array('conditions'=>array('Category.del_status'=>0, 'Category.parentid'=>0)));
		 
		 foreach($cat_data as $key=>$cat)
		 {
			 $cat_data_tree = $this->category_tree($cat['Category']['id']);
			 
			 $cat['Category']['url'] = $this->webroot.'buyshops/products/'.$cat['Category']['id'];
			 
			 $data_first[$key] = $cat;
			 $data_first[$key]['Category']['sub_type'] = $cat_data_tree;
		 }
		 		 
		if(isset($data_first))
		$this->set('dynamic_menu', $data_first);		 
		 
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
						
			$list_add_to_cart = $this->Cart_master->find('list', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
			
				$product_id[] = $product['product_id'];
			}
			
			$product_id = array_unique($product_id);
			
			$count_add_to_cart = count($product_id);
			
			$this->set('count_add_to_cart', $count_add_to_cart);		
			
			if(isset($count_add_to_cart))
			$this->Session->write('count_add_to_cart', $count_add_to_cart);			
		}
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
	
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = $add_cart_session;
		elseif(isset($product_id))
		$product_id = $product_id;
		
		if(isset($product_id))
		{
			if(count($product_id)>1)
			$add_cart = array_unique($product_id);
			else
			$add_cart = $product_id;
		}
		
		if(isset($add_cart))
		$count_checkout = count($add_cart);
		else
		$count_checkout = 0;
		
		if(isset($count_checkout))
		$this->Session->write('count_checkout', $count_checkout);			
		
		if(isset($product_data['product_id']))
		{
			$data[$product_data['product_id']] = $product_data['product_id'];
			
			$this->Session->write('data', $data);			
		}
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');			
			
			if((isset($add_cart_session)) && ((isset($data))))
			$data_first = $add_cart_session + $data;
			if((!isset($add_cart_session)) && ((isset($data))))
			$data_first = $data;
			if((isset($add_cart_session)) && (!(isset($data))))
			$data_first = $add_cart_session;
			
			if(isset($product_page_id))
			if(in_array($product_page_id, $data_first))
			$present = in_array($product_page_id, $data_first);
			else
			$present = 0;	
			
			if(isset($present))
			$this->Session->write('present', $present);
			
			$this->Session->write('add_cart_session', $data_first);
		}
		else
		{
			if(isset($data))
			$this->Session->write('add_cart_session', $data);
		}
		
		$add_cart_session_pr = $this->Session->read('add_cart_session');			
		
		if(isset($add_cart_session_pr))
		{
			$count_add_cart_session = count($add_cart_session_pr);
			
			$this->Session->write('count_add_cart_session', $count_add_cart_session);
		}				
		 
	 }
	 
	 Public function filter_search_type(){
		
		$this->layout='';
		
		/*
		echo "Requested_data<pre>";
		print_r($_REQUEST);
		echo "<pre>";
		*/
		
		if((isset($_REQUEST['length_min'])) && (isset($_REQUEST['length_max'])))
		{
			$min_price = $_REQUEST['length_min'];
			$max_price = $_REQUEST['length_max'];
			
			$this->Session->write('min_price', $min_price);
			$this->Session->write('max_price', $max_price);			
		}
		elseif(($this->Session->check('min_price') == 1) && ($this->Session->check('max_price') == 1))
		{
			$min_price = $this->Session->read('min_price');
			$max_price = $this->Session->read('max_price');
		}
		else
		{
			$this->Session->delete('min_price');
			$this->Session->delete('max_price');			
		}
		
		//echo "<br>min_price".$min_price;
		//echo "<br>max_price".$max_price;
		
		if(isset($_REQUEST['type']))
		$att_type_data = explode('_', $_REQUEST['type']);
		
		if(isset($_REQUEST['checked']))		
		if($_REQUEST['checked'] == 1)
		{
			if($this->Session->check('one') == 1)
			{
				$one = $this->Session->read('one');			
						
				$data_first_element[$att_type_data[1]] = $_REQUEST;
				
				$one[$att_type_data[3]][$att_type_data[1]] = $_REQUEST;
				
				$this->Session->write('one', $one);						
			}
			else
			{
				$data_first_element[$att_type_data[1]] = $_REQUEST;
				$data_first[$att_type_data[3]][$att_type_data[1]] = $_REQUEST;
				
				$this->Session->write('one', $data_first);			
			}
		}
		else
		{
			$one = $this->Session->read('one');			
			
			unset($one[$att_type_data[3]][$att_type_data[1]]);
			
			if(count($one[$att_type_data[3]]) == 0)
			unset($one[$att_type_data[3]]);
		
			$this->Session->write('one', $one);						
		}
		
		$one = $this->Session->read('one');						
		
		if($this->Session->check('id_first') == 1)
		$id_first = $this->Session->read('id_first');
		
		if(!empty($one))
		{
			foreach($one as $key=>$data)
			{
				$count_data_main = count($data);
				
				$i=0;
				foreach($data as $first_key=>$first_data)
				{
					$id_both = explode('_', $first_data['type']);
					
					$att = $id_both[1];
					
					//$conditions_att_or_one[$key]['OR'][$first_key]['Produc_attribute.attvid'] = $att;
					
					$conditions_att_or[$key]['OR'][$first_key]['Produc_attribute.attvid'] = $att;
					
					$i++;
				}
				
				//if(isset($conditions_att_or))
				//$conditions_and['AND'] = $conditions_att_or;			
			}
			
			//'Produc_master.catid'=>$id_first
			
			$count_conditions_att_or = count($conditions_att_or);
			
			//$conditions_att_or['AND'] = $conditions_att_or_one;
			
			if(isset($conditions_att_or))
			{
				$i=0;
				foreach($conditions_att_or as $condition)
				{
					$products_val = $this->Produc_attribute->find('all', array('conditions'=>$condition));		
					
					if(!empty($products_val))
					{
						foreach($products_val as $val)
						{
							$val_shashi[] = $val['Produc_attribute']['prodid'];
							
							$new_val[$val['Produc_attribute']['prodid']] = $val;
						}
					}
					else
					{
						$new_val[0]['Produc_attribute']['prodid'] = 0;
					}
					
					//$prod_common[] = $products_val;					
					
					if(isset($new_val))
					$prod_common[] = $new_val;					
					
					unset($new_val);
					unset($val);
				}
				
				if(isset($prod_common))
				{
					$count_prod_common = count($prod_common);
					
					foreach($prod_common as $data_como)
					{
						foreach($data_como as $name_first)
						{
							$one_last[] = $name_first['Produc_attribute']['prodid'];
						}
					}
					
					if($count_conditions_att_or>1)
					{
						$one_last_last = array_count_values($one_last);
						
						unset($one_last);
						
						foreach($one_last_last as $key_last=>$last)
						{
							if($last>=$count_prod_common)
							{
								$one_last[] = $key_last;	
							}
						}
					}
				}
			}
			
			if(isset($one_last))
			{
				$search_new = $one_last;
				
				foreach($search_new as $search_first)
				{
					$last_final['Produc_attribute']['prodid'] = $search_first;
					
					$data_fin[] = $last_final;
				}
			
			
				if(isset($conditions_att_or))
				$products_cat = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id_first)));
				else
				$products_cat = $this->Produc_master->find('all');	
				
				//$products_cat = $this->Produc_master->find('all', array('conditions'=>$id_first));
				
				foreach($products_cat as $prodid)
				{
					$prod_id[] = $prodid['Produc_master']['id'];
				}
				
				foreach($data_fin as $data_fin_first)
				{
					foreach($prod_id as $prod_id_first)
					{
						if($data_fin_first['Produc_attribute']['prodid'] == $prod_id_first)
							$data_one_last[]['Produc_attribute']['prodid'] = $prod_id_first;
					}				
				}
								
				if(isset($data_one_last))
				{
					foreach($data_one_last as $product_add)
					{
						$product_add = $product_add['Produc_attribute'];
						
						//$products = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product_add['prodid'], 'Produc_master.del_status'=>0)));
						
						if((isset($min_price)) && (isset($max_price)))
						{
							//$conditions['AND'][0]['Produc_master.duration <=']=$min_price;	
							//$conditions['AND'][0]['Produc_master.price <=']=$max_price;	
							
							$this->paginate = array(

							 'limit' => 8,
							 'conditions'=>array('Produc_master.id'=>$product_add['prodid'], 'Produc_master.del_status'=>0, 'Produc_master.prodprice >=' => $min_price, 'Produc_master.prodprice <=' => $max_price)
							);			
						}
						else
						{
							$this->paginate = array(

							 'limit' => 8,
							 'conditions'=>array('Produc_master.id'=>$product_add['prodid'], 'Produc_master.del_status'=>0)
							);			
						}
						
					
						$products = $this->paginate('Produc_master');
						
						/*
						echo "products<pre>";
						print_r($products);
						echo "<pre>";
						*/
						
						if(isset($products[0]))
						{
							$products = $products[0];
							
							$product_list[] = $products['Produc_master']['id'];
						}
						
						if(isset($products['Produc_master']))
						$product = $products['Produc_master'];
					
						if(isset($product))
						$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
						
						if(isset($product_images))
						foreach($product_images as $image)
						{
							$image = $image['Produc_image'];		
							
							if($image['isdefault']==1)
							$products['Produc_master']['images']['Default'] = $image;
							else
							$products['Produc_master']['images']['all'] = $image;				
						}
						
						if(isset($products))
						$final_search[] = $products;
					}
					
					if(isset($final_search))
					{
						foreach($final_search as $fin)
						{
							if(isset($fin['Produc_master']))
							{
								$search_newa['Produc_master'] = $fin['Produc_master'];
								
								if(isset($fin['Produc_master']['id']))
								$search_newa_new[$fin['Produc_master']['id']] = $search_newa;
							}
						}
						
						/*
						echo "search_newa_new<pre>";
						print_r($search_newa_new);
						echo "<pre>";
						
						die();
						*/
						
						//$search_new = array_unique($final_search);
						
						if(isset($product_list))
						$this->Session->write('sort_product_list', $product_list);
						
						if(isset($search_newa_new))
						$products = $search_newa_new;
						
						$i=1;
						if(isset($products))
						foreach($products as $key=>$product)
						{
							$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
							
							if($offer_master_cat_data !='')
							{
								foreach($offer_master_cat_data as $lowest_price_cat)
								{
									$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
								}
								
								$max_discount_cat = max($low_cat);
								
								unset($low_cat);				
							}
							
							$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
							
							if($offer_master_data !='')
							{
								foreach($offer_master_data as $lowest_price)
								{
									$low[] = $lowest_price['Offer_master']['discount'];
								}
								if(isset($low))
								$max_discount = max($low);
								
								unset($low);
							}
							
							if(isset($max_discount_cat) && isset($max_discount))
								$final_max_discount = max($max_discount_cat, $max_discount);
							elseif(isset($max_discount_cat))
								$final_max_discount = $max_discount_cat;
							elseif(isset($max_discount))
								$final_max_discount = $max_discount;
												
							unset($max_discount_cat);	 
							unset($max_discount);
										
							$products[$key]['Produc_master']['discount'] = $final_max_discount; 		
							
							$discounted_price = ($product['Produc_master']['prodprice']-(($final_max_discount/100)*$product['Produc_master']['prodprice']));
							
							$products[$key]['Produc_master']['discounted_price'] = $discounted_price; 		
								
							unset($final_max_discount);
							$i++;
						}
						
						if(isset($products))
						$this->set('products', $products);		
					}			
				}
			}
		}
		else
		{
			if($this->Session->check('id_first') == 1)
			$id_first = $this->Session->read('id_first');
			
			if($this->Session->check('sort_product_list') == 1)
			$this->Session->delete('sort_product_list');
			
			//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id_first, 'Produc_master.del_status'=>0)));
		
			if((isset($min_price)) && (isset($max_price)))
			{							
				$this->paginate = array(

					 'limit' => 8,
					 'conditions'=>array('Produc_master.catid'=>$id_first, 'Produc_master.del_status'=>0, 'Produc_master.prodprice >='=>$min_price, 'Produc_master.prodprice <='=>$max_price)
				);
			}
			else
			{
				$this->paginate = array(

					 'limit' => 8,
					 'conditions'=>array('Produc_master.catid'=>$id_first, 'Produc_master.del_status'=>0)
				);
			}
			
			$products = $this->paginate('Produc_master');
			
			foreach($products as $key=>$product)
			{
				$product = $product['Produc_master'];
				
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products[$key]['Produc_master']['images']['Default'] = $image;
					else
					$products[$key]['Produc_master']['images']['all'] = $image;				
				}
			}
			
			$i=1;
			foreach($products as $key=>$product)
			{
				$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
				
				if($offer_master_cat_data !='')
				{
					foreach($offer_master_cat_data as $lowest_price_cat)
					{
						$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
					}
					
					$max_discount_cat = max($low_cat);
					
					unset($low_cat);				
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
				
				if($offer_master_data !='')
				{
					foreach($offer_master_data as $lowest_price)
					{
						$low[] = $lowest_price['Offer_master']['discount'];
					}
					if(isset($low))
					$max_discount = max($low);
					
					unset($low);
				}
				
				if(isset($max_discount_cat) && isset($max_discount))
					$final_max_discount = max($max_discount_cat, $max_discount);
				elseif(isset($max_discount_cat))
					$final_max_discount = $max_discount_cat;
				elseif(isset($max_discount))
					$final_max_discount = $max_discount;
									
				unset($max_discount_cat);	 
				unset($max_discount);
							
				$products[$key]['Produc_master']['discount'] = $final_max_discount; 		
				
				$discounted_price = ($product['Produc_master']['prodprice']-(($final_max_discount/100)*$product['Produc_master']['prodprice']));
				
				$products[$key]['Produc_master']['discounted_price'] = $discounted_price; 		
					
				unset($final_max_discount);
				$i++;
			}
			
			
			$this->set('products', $products);
		}
		
		
		
	 }
	 
	 Public function category_tree($catid){
		  
		$new_data = array();  
	    $category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$catid)));
		
		foreach($category_data as $key=>$data)
		{
			$data['Category']['url'] = $this->webroot.'buyshops/products/'.$data['Category']['id'];	
			
			$first_cat_data = $data;
			
			$first_cat_data['Category']['sub_type'] = $this->category_tree($data['Category']['id']);
			
			$new_data[] = $first_cat_data;
		}
		
		return $new_data;		
	 }

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 */
		//public $uses = array();
	
	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	
	  Public function disp($sub_cat){
		  
			foreach($sub_cat as $cat)
			{
				?>
				<div class="megapanels">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<ul class="megamenu skyblue">
									<li style="margin-left:40px;" class="active grid"><a class="color1" href="<?php echo $cat['Category']['url'] ?>"><?php echo $cat['Category']['catname']?></a>
									<?php 
									
									if($cat['Category']['sub_type'] !='')
									{
										$this->disp($cat['Category']['sub_type']);
									}
									else
									{
										echo '</li>';
									}
									
									?>
								</ul>
							</div>							
						</div>							
				  </div>
			  </div>
			  <?php
			}
	  }
	  
	public function sort_products() {
		
		$this->layout='';
		
		if(isset($_REQUEST['type_id']))
			$this->Session->write('type_id', $_REQUEST['type_id']);
		
		if($this->Session->check('type_id') == 1)
			$_REQUEST['type_id'] = $this->Session->read('type_id');
		else
			$this->Session->delete('type_id');
		
		if($this->Session->check('sort_product_list') == 1)
		{			
			$product_lists = $this->Session->read('sort_product_list');
			
			if($_REQUEST['type_id'] == 1)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.id'=>$product_lists)));
				
				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.id'=>$product_lists)
				 );
				 
				 $products = $this->paginate('Produc_master');		
			}
		
			if($_REQUEST['type_id'] == 2)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.id'=>$product_lists)));
				
				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.id'=>$product_lists)
				 );
				 
				 $products = $this->paginate('Produc_master');		
				
			}
		
			if($_REQUEST['type_id'] == 3)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.id'=>$product_lists)));
				
				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.id'=>$product_lists)
				 );
				 
				$products = $this->paginate('Produc_master');		
				
			}
			
			if($_REQUEST['type_id'] == 4)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.id'=>$product_lists)));			
				
				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.id'=>$product_lists)
				 );
				
				$products = $this->paginate('Produc_master');		
			}
		}	
		else
		{
			$this->Session->delete('sort_product_list');
			
			if($this->Session->check('id_first') == 1)
			$id_first = $this->Session->read('id_first');
			
			if($_REQUEST['type_id'] == 1)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));
				
				$this->paginate = array(
			
					 'limit' => 8,
					 'order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)
				 );
				 
				$products = $this->paginate('Produc_master');		
				
				if(empty($products))
				{
					$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
					
					$this->paginate = array(
			
						 'limit' => 8,
						 'order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$category_all)
					);
					
					$products = $this->paginate('Produc_master');		
				}				 
			}
			
			if($_REQUEST['type_id'] == 2)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));

				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)
				 );

				$products = $this->paginate('Produc_master');		
				
				if(empty($products))
				{
					$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
					
					$this->paginate = array(
			
						 'limit' => 8,
						 'order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$category_all)
					);
					
					$products = $this->paginate('Produc_master');		
				}				 
			}
		
			if($_REQUEST['type_id'] == 3)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));

				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)
				 );
				 
				 $products = $this->paginate('Produc_master');		
				 
				if(empty($products))
				{
					$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
					
					$this->paginate = array(
			
						 'limit' => 8,
						 'order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$category_all)
					);
					
					$products = $this->paginate('Produc_master');		
				}				 
			}
			
			if($_REQUEST['type_id'] == 4)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));
				
				$this->paginate = array(
	
					 'limit' => 8,
					 'order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)
				);
				
				$products = $this->paginate('Produc_master');		
				
				if(empty($products))
				{
					$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
					
					$this->paginate = array(
			
						 'limit' => 8,
						 'order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$category_all)
					);
					
					$products = $this->paginate('Produc_master');		
				}				 
				
			}		
		}
		
		
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		$this->set('products', $products);
	}
	
	public function index() {
		
		$this->layout='';
		
		$category = $this->Category->find('list', array('conditions'=>array('Category.del_status'=>0)));
		
		$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.isfeatured'=>1, 'Produc_master.catid'=>$category)));
		
		$cat_data = $this->Category->find('all');
		
		$this->set('cat_data', $cat_data);
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			if(isset($add_cart))			
			{
				if(in_array($product['id'], $add_cart))
				$products[$key]['Produc_master']['add_to_cart'] = 1;
				else
				$products[$key]['Produc_master']['add_to_cart'] = 0;	
			}
			else
				$products[$key]['Produc_master']['add_to_cart'] = 0;	
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array(
                'id' => 'DESC'
            )));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		$this->set('product_slider', $products);
		
		$home_page_data = $this->Home_page_box->find('first');
		
		$this->set('home_page_data', $home_page_data);
		
		$slider_images = $this->Slider_image->find('all', array('conditions'=>array('Slider_image.del_status'=>0), 'order' => array(
                'Slider_image.picture_order' => 'ASC'
            )));
		
		
		
		$this->set(compact('slider_images'));
		
		$products = $this->Produc_master->find('all');
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		$this->set('products', $products);
	  }
	  
	 /*
	 
	 public function product_details($id=1) {
				  
		$product_details = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
			
		foreach($product_details as $key=>$product)
		{
			if(isset($product['Produc_master']))
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$product_details[$key]['images']['Default'] = $image;
				else
				$product_details[$key]['images']['all'] = $image;				
			}
		}		
			
		$this->set('product_details', $product_details);			
	 }	
	
	*/
	
	public function products($id) {
		
		$category = $this->Category->find('list', array('conditions'=>array('Category.del_status'=>0)));

		$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.isfeatured'=>1, 'Produc_master.catid'=>$category)));
		
		$cat_data = $this->Category->find('all');
		
		$this->set('cat_data', $cat_data);
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array(
                'id' => 'DESC'
            )));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		$this->set('product_slider', $products);

		$category = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id)));
		
		if(isset($category['Category']))
		$this->set('catname', $category['Category']['catname']);
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();

			$list_add_to_cart = $this->Cart_master->find('list', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		}
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');			
		
		if((isset($list_add_to_cart)) && (isset($add_cart_session)))
			$add_cart = $list_add_to_cart + $add_cart_session;
		elseif((isset($list_add_to_cart)) && (!isset($add_cart_session)))
			$add_cart = $list_add_to_cart; 
		elseif((!isset($list_add_to_cart)) && (isset($add_cart_session)))
			$add_cart = $add_cart_session;
		
		if(isset($id))
		{
			$id_first = $id;
			$this->Session->write('id_first', $id_first);
		}
		
		if($this->Session->check('min_price') == 1)
			$this->Session->delete('min_price');
	
		if($this->Session->check('max_price') == 1)
			$this->Session->delete('max_price');			
		
		if($this->Session->check('sort_product_list') == 1)
			$this->Session->delete('sort_product_list');
		
		 if(isset($id))
		 {		 
			$id_first = $id;
			
			 $category_att = $this->Attribute_category->find('all',array('conditions'=>array('Attribute_category.catid'=>$id_first, 'Attribute_category.del_status'=>0)));
			 
			 foreach($category_att as $cat_key=>$att)
			 {
				 $att_master = $this->Attribute_master->find('first',array('conditions'=>array('Attribute_master.id'=>$att['Attribute_category']['attid']), 'Attribute_master.del_status'=>0));
				 
				 $category_att[$cat_key]['Attribute_category']['Attribute_master'] = $att_master['Attribute_master'];
				 
				 $att_values = $this->Attribute_value->find('all',array('conditions'=>array('Attribute_value.attid'=>$att_master['Attribute_master']['id'])));
				 
				 $category_att[$cat_key]['Attribute_category']['Attribute_master']['Attribute_Values'] = $att_values;				 
			 }
			 
			 $this->set('category_att', $category_att);
		 }
	
		if($this->Session->check('one') == 1)
		$this->Session->delete('one');
		
		$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
		
		$category_all[] = $id_first;
		
		//foreach($category_all)
				
		foreach($category_all as $key=>$cate_id)
		{
			$data = $this->sub_cat($cate_id);
			
			$mayur_data[$key] = $data;
			
			$key_two = key($mayur_data);
			
			$end_key = end($mayur_data[$key_two]);
			
			$key_one = key($mayur_data[$key_two]);
			
			$key_one = $key_one+1;
			
			$mayur_data[$key_two][$key_one] = $cate_id;			
			
			$shashi[] = $mayur_data;
		}
		
		$mayur_data = reset($mayur_data);
		
		$category_all = $mayur_data;
				
		if(isset($category_all))
		{
			//$products = $this->Produc_master->find('all', array('conditions'=>array('OR'=>array('Produc_master.catid'=>$category_all), 'Produc_master.del_status'=>0)));		
			
			$this->paginate = array(
		
				 'limit' => 8,
				 'conditions'=>array('OR'=>array('Produc_master.catid'=>$category_all), 'Produc_master.del_status'=>0)
			);
			
			$products = $this->paginate('Produc_master');		
		}	
		else
		{
			//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id, 'Produc_master.del_status'=>0)));

			$this->paginate = array(
		
				 'limit' => 8,
				 'conditions'=>array('Produc_master.catid'=>$id, 'Produc_master.del_status'=>0)
			);			
		
			$products = $this->paginate('Produc_master');
		}
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
	
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = $add_cart_session;
		elseif(isset($product_id))
		$product_id = $product_id;
		
		if(isset($product_id))
		{
			if(count($product_id)>1)
			{				
				$add_cart = array_unique($product_id);
				
				foreach($products as $key=>$product)
				{
					$product = $product['Produc_master'];
					
					if(isset($add_cart))			
					{
						if(in_array($product['id'], $add_cart))
						$products[$key]['Produc_master']['add_to_cart'] = 1;
						else
						$products[$key]['Produc_master']['add_to_cart'] = 0;	
					}
					else
						$products[$key]['Produc_master']['add_to_cart'] = 0;	
					
					$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array(
						'id' => 'DESC'
					)));
					
					foreach($product_images as $image)
					{
						$image = $image['Produc_image'];		
						
						if($image['isdefault']==1)
						$products[$key]['Produc_master']['images']['Default'] = $image;
						else
						$products[$key]['Produc_master']['images']['all'] = $image;				
					}
				}			
			}
			else
			{
				$add_cart = $product_id;
				
				foreach($products as $key=>$product)
				{
					$product = $product['Produc_master'];
					
					if(isset($add_cart))			
					{
						if($product['id'] == $add_cart)
						$products[$key]['Produc_master']['add_to_cart'] = 1;
						else
						$products[$key]['Produc_master']['add_to_cart'] = 0;	
					}
					else
						$products[$key]['Produc_master']['add_to_cart'] = 0;	
					
					$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array(
						'id' => 'DESC'
					)));
					
					foreach($product_images as $image)
					{
						$image = $image['Produc_image'];		
						
						if($image['isdefault']==1)
						$products[$key]['Produc_master']['images']['Default'] = $image;
						else
						$products[$key]['Produc_master']['images']['all'] = $image;				
					}
				}
			}
		}
		else
		{
			foreach($products as $key=>$product)
			{
				$product = $product['Produc_master'];
				
				if(isset($add_cart))			
				{
					if($product['id'] == $add_cart)
					$products[$key]['Produc_master']['add_to_cart'] = 1;
					else
					$products[$key]['Produc_master']['add_to_cart'] = 0;	
				}
				else
					$products[$key]['Produc_master']['add_to_cart'] = 0;	
				
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array(
					'id' => 'DESC'
				)));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products[$key]['Produc_master']['images']['Default'] = $image;
					else
					$products[$key]['Produc_master']['images']['all'] = $image;				
				}
			}
		}
		$i=1;
		foreach($products as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if($offer_master_cat_data !='')
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(isset($low_cat))
				$max_discount_cat = $low_cat;
				
				unset($low_cat);				
			}
			
			$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
			
			if($offer_master_data !='')
			{
				foreach($offer_master_data as $lowest_price)
				{
					$low[] = $lowest_price['Offer_master']['discount'];
				}
				if(isset($low))
				$max_discount = max($low);
				
				unset($low);
			}
			
			if(isset($max_discount_cat) && isset($max_discount))
				$final_max_discount = max($max_discount_cat, $max_discount);
			elseif(isset($max_discount_cat))
				$final_max_discount = $max_discount_cat;
			elseif(isset($max_discount))
				$final_max_discount = $max_discount;
								
			unset($max_discount_cat);	 
			unset($max_discount);
						
			if(isset($final_max_discount))
			{
				$products[$key]['Produc_master']['discount'] = $final_max_discount; 		
			
				$discounted_price = ($product['Produc_master']['prodprice']-(($final_max_discount/100)*$product['Produc_master']['prodprice']));
				
				$products[$key]['Produc_master']['discounted_price'] = $discounted_price; 		
					
				unset($final_max_discount);
			}
			$i++;
		}
		
		$this->set('products', $products);
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$this->set('count_add_to_cart', $count_add_to_cart);
		}				
	}
	public function place_order($original_price=null, $discounted_price=null) 
	{
		$user_data = $this->Auth->user();
		
		echo "user_data<pre>";
		print_r($user_data);
		echo "<pre>";
		
		echo "<br>Original Price".$original_price;
		
		echo "<br>Discounted Price".$discounted_price;
		
		echo "<br>Requested_data<pre>";
		print_r($_REQUEST);
		echo "<pre>";
		
		echo "This is the place order functionality";						
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = array_merge($add_cart_session);
		elseif(isset($product_id))
		$product_id = array_merge($product_id);
		
		if(isset($product_id))
		$product_id = array_unique($product_id);
		
		echo "Product_id<pre>";
		print_r($product_id);
		echo "<pre>";
		
		die();		
	}
	
	public function sub_cat($id) {
		
		$new_data = array();  
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$id)));
		
		foreach($category_data as $cat)
		{
			$data = $this->sub_cat($cat['Category']['id']);
			
			
			
			$new_data[] = $cat['Category']['id'];
		}	
		
		return $new_data;
	}
	
	public function product_details($id) 
	{
		$reviews = $this->Review_master->find('all', array('conditions'=>array('Review_master.approval'=>1, 'Review_master.prodid'=>$id)));
		
		$this->set('reviews', $reviews);
		
		$category = $this->Category->find('list', array('conditions'=>array('Category.del_status'=>0)));
		
		$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.isfeatured'=>1, 'Produc_master.catid'=>$category)));
		
		$cat_data = $this->Category->find('all');
		
		$this->set('cat_data', $cat_data);
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id']), 'order' => array('order' => 'ASC')));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		$this->set('product_slider', $products);
		
		$product_page_id = $id;
		
		$this->set('page_id', $id);
		
		$product_att = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid'=>$id)));
		
		foreach($product_att as $key=>$attribute)
		{
			$att_value = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$attribute['Produc_attribute']['attvid'])));
			
			$att_master = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$att_value['Attribute_value']['attid'])));
			
			$product_att[$key]['Produc_attribute']['Attribute_master'] = $att_master['Attribute_master']['attname'];			

			$product_att[$key]['Produc_attribute']['attid'] = $att_master['Attribute_master']['id'];			
		}
		
		$att_array = array();
		
		foreach($product_att as $key=>$data)
		{
			$att_master = $data['Produc_attribute']['Attribute_master'];
				
			if (isset($att_array[$att_master])) {
				
				$att_array[$att_master][] = $data;
			} 
			else 
			{
				$att_array[$att_master] = array($data);
			}			
		}
		
		foreach($att_array as $key_val=>$att_val)
		{
			foreach($att_val as $key_val_inner=>$att_val_inner)
			{				
				$att_value_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$att_val_inner['Produc_attribute']['attvid'])));
				
				$att_array[$key_val][$key_val_inner]['Produc_attribute']['att_val_name'] = $att_value_data['Attribute_value']['attvalue'];				
				
				$att_array[$key_val][$key_val_inner]['Produc_attribute']['att_value_img'] = $att_value_data['Attribute_value']['att_value_img'];				
				
				$att_array[$key_val][$key_val_inner]['Produc_attribute']['att_value_id'] = $att_value_data['Attribute_value']['id'];				
			}
		}
		
		$this->set('att_array', $att_array);
		
		$product = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');			
			
			$data = $this->Session->read('data');			
			
			$data_first = $add_cart_session;
			
			if(in_array($product_page_id, $data_first))
			$present = in_array($product_page_id, $data_first);
			else
			$present = 0;	
			
			if(isset($present))
			$this->Session->write('present', $present);			
		}
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
				
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));//,'Cart_master.product_id'=>$product['Produc_master']['id']
		
			$this->set('count_add_to_cart', $count_add_to_cart);
		}
		
		if(isset($product['Produc_master']))
		$product_image = $this->Produc_image->find('all', array('order' => array('order' => 'ASC'), 'conditions'=>array('Produc_image.prodid'=>$product['Produc_master']['id'])));
		
		if(isset($product_image))
		$product['Produc_master']['images'] = $product_image;
		
		$wishlist_details = $this->Wishlist_detail->find('all', array('conditions'=>array('Wishlist_detail.prodid'=>$product['Produc_master']['id'])));
		
		foreach($wishlist_details as $details)
		$master_id[] = $details['Wishlist_detail']['master_id'];			
		
		if(isset($master_id) && isset($user_data['id']))
		$wishlist_master = $this->Wishlist_master->find('all', array('conditions'=>array('Wishlist_master.id'=>$master_id, 'Wishlist_master.usrid'=>$user_data['id'])));
		
		if(isset($wishlist_master))
		foreach($wishlist_master as $master)
		$wishlist_master_id[] = $master['Wishlist_master']['id'];			
		
		if(isset($wishlist_master_id))
		$wishlist_details = $this->Wishlist_detail->find('all', array('conditions'=>array('Wishlist_detail.master_id'=>$wishlist_master_id)));
		
		foreach($wishlist_details as $final_details)
		$wishlist_details_prodid[] = $final_details['Wishlist_detail']['prodid'];			
		
		if(isset($wishlist_details_prodid))
		{
			if(in_array($product['Produc_master']['id'], $wishlist_details_prodid))
			$product['Produc_master']['wishlist_id'] = 1;
			else
			$product['Produc_master']['wishlist_id'] = 0;	
		}
		else
			$product['Produc_master']['wishlist_id'] = 0;	
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $productaa)
			{
				$producta = $productaa['Cart_master'];
				$product_id[] = $producta['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = $add_cart_session;
		elseif(isset($product_id))
		$product_id = $product_id;
		
		if(isset($product_id))
		{
			if(count($product_id)>1)
			{				
				$add_cart = array_unique($product_id);
				
				if(isset($add_cart))			
				{
					if(in_array($product['Produc_master']['id'], $add_cart))
					$product['Produc_master']['add_to_cart'] = 1;
					else
					$product['Produc_master']['add_to_cart'] = 0;	
				}
				else
					$product['Produc_master']['add_to_cart'] = 0;						
			}
		}
		else
			$product['Produc_master']['add_to_cart'] = 0;						
		
		$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
		
		if($offer_master_cat_data !='')
		{
			foreach($offer_master_cat_data as $lowest_price_cat)
			{
				$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
			}
			
			$max_discount_cat = max($low_cat);
			
			unset($low_cat);				
		}
		
		$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
		
		if($offer_master_data !='')
		{
			foreach($offer_master_data as $lowest_price)
			{
				$low[] = $lowest_price['Offer_master']['discount'];
			}
			if(isset($low))
			$max_discount = max($low);
			
			unset($low);
		}
		
		if(isset($max_discount_cat) && isset($max_discount))
			$final_max_discount = max($max_discount_cat, $max_discount);
		elseif(isset($max_discount_cat))
			$final_max_discount = $max_discount_cat;
		elseif(isset($max_discount))
			$final_max_discount = $max_discount;
							
		unset($max_discount_cat);	 
		unset($max_discount);
					
		$product['Produc_master']['discount'] = $final_max_discount; 		
		
		$discounted_price = ($product['Produc_master']['prodprice']-(($final_max_discount/100)*$product['Produc_master']['prodprice']));
		
		$product['Produc_master']['discounted_price'] = $discounted_price; 		
			
		unset($final_max_discount);
		
		if(isset($product['Produc_master']))		
		$this->set('product', $product['Produc_master']);					
	}
	
	public function color_change_imgs() 
	{
		//$this->layout='';
		
		if($_REQUEST['checkid'] == 1)
		$color_images_data = $this->Produc_color_image->find('all', array('order' => array('order' => 'ASC'), 'conditions'=>array('Produc_color_image.prodid'=>$_REQUEST['prodid'], 'Produc_color_image.attvid'=>$_REQUEST['attvid'])));
		else
		{
			$color_images_data = $this->Produc_image->find('all', array('order' => array('order' => 'ASC'), 'conditions'=>array('Produc_image.prodid'=>$_REQUEST['prodid'])));
			
			foreach($color_images_data as $data)
			{
				$data['Produc_image']['image_path'] = $data['Produc_image']['imagepath'];
				
				$data['Produc_color_image'] = $data['Produc_image'];
				
				$second_data[] = $data;
				
				unset($data);
			}
			
			unset($color_images_data);
			
			$color_images_data = $second_data;
		}
		
		$this->set('color_images_data', $color_images_data);
	}
	
	public function search_results() 
	{ 
		if(isset($_REQUEST['search_text']))
		$search_text = $_REQUEST['search_text'];
		
		if($this->Session->check('search_text') == 1)
		{
			$search_text = $this->Session->read('search_text');
		}				
		else
		{
			$this->Session->write('search_text', $search_text);
		}				
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();

			$list_add_to_cart = $this->Cart_master->find('list', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		}
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');			
		
		if((isset($list_add_to_cart)) && (isset($add_cart_session)))
			$add_cart = $list_add_to_cart + $add_cart_session;
		elseif((isset($list_add_to_cart)) && (!isset($add_cart_session)))
			$add_cart = $list_add_to_cart; 
		elseif((!isset($list_add_to_cart)) && (isset($add_cart_session)))
			$add_cart = $add_cart_session;
		
		if(isset($id))
		{
			$id_first = $id;
			$this->Session->write('id_first', $id_first);
		}
		
		if($this->Session->check('min_price') == 1)
			$this->Session->delete('min_price');
	
		if($this->Session->check('max_price') == 1)
			$this->Session->delete('max_price');			
		
		if($this->Session->check('sort_product_list') == 1)
			$this->Session->delete('sort_product_list');

		if(isset($search_text))
		{
			//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id, 'Produc_master.del_status'=>0)));
			
			//$conditions = array('Produc_master.del_status'=>0, 'Produc_master.prodname LIKE'=>'%'.$search_text.'%');
			
			if($this->Session->check('con') == 1)
			{
				$con = $this->Session->read('con');
			}				
			else
			{
				$con = array('Produc_master.del_status'=>0, 'Produc_master.del_status'=>0, 'Produc_master.prodname LIKE'=>'%'.$search_text.'%');
				$this->Session->write('con', $con);
			}				

			$this->paginate = array(
		
				 'limit' => 8,
				 'conditions'=> $con
			);			
		
			$products = $this->paginate('Produc_master');	
		}
		if(isset($products))
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			if(isset($add_cart))			
			{
				
				if(in_array($product['id'], $add_cart))
				$products[$key]['Produc_master']['add_to_cart'] = 1;
				else
				$products[$key]['Produc_master']['add_to_cart'] = 0;	
			}
			else
				$products[$key]['Produc_master']['add_to_cart'] = 0;	
				
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
			
			foreach($product_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$products[$key]['Produc_master']['images']['Default'] = $image;
				else
				$products[$key]['Produc_master']['images']['all'] = $image;				
			}
		}
		
		if(isset($products))
		$this->set('products', $products);
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$this->set('count_add_to_cart', $count_add_to_cart);
		}				
	}
	
	public function add_to_cart_wishlist() { 
		
		$product_data = $_REQUEST;
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$add_to_cart['Cart_master']['user_id'] = $user_data['id'];
			
			$add_to_cart['Cart_master']['product_id'] = $product_data['product_id'];
			
			if($this->Cart_master->save($add_to_cart))
				echo "yes";
			else
				echo "no";
		}
		
		die();
	}
	
	public function add_to_cart() 
	{ 
		$this->layout='';
		
		$product_data = $_REQUEST;
		
		$product_checkout[$product_data['product_id']] = $product_data['product_id'];
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');							
			
			$add_cart_sessiona = array_merge($product_checkout, $add_cart_session);
			
			$this->Session->write('add_cart_session', $add_cart_sessiona);													
		}
		else
		$this->Session->write('add_cart_session', $product_checkout);							
		
		if($this->Session->check('page_id') == 1)
			$product_page_id = $this->Session->read('page_id');	
		elseif(isset($_REQUEST['page_id']))
		{
			$product_page_id = $_REQUEST['page_id'];
			$this->Session->delete('page_id');			
		}
		else
			$this->Session->delete('page_id');				
		
		if($this->Session->check('add_cart_session') == 1)
			$add_cart_session = $this->Session->read('add_cart_session');						
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$add_to_cart['Cart_master']['user_id'] = $user_data['id'];
			
			$add_to_cart['Cart_master']['product_id'] = $product_data['product_id'];
			
			$this->Cart_master->save($add_to_cart);		
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = array_merge($add_cart_session);
		elseif(isset($product_id))
		$product_id = array_merge($product_id);
		
		if(isset($product_id))
		{
			$add_cart = array_unique($product_id);			
			echo count($add_cart);
			
			
		}
		else
			echo "0";
		
		die();
	}
	
	public function register() 
	{
		if ($this->request->is('post'))
		{
			$this->request->data['User']['usrtype']=0;
			$this->request->data['User']['del_status']=0;
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('Successfully registered');
				$this->redirect('login');
			}
		}
	}
		
	public function login() {
		
		if ($this->request->is('post')) {
			
			 if(($this->Auth->login()) !=1)
			 {
				 $this->Session->setFlash(
				  __('Username or password is incorrect'),
				  'default',
					 array(),
					 'auth'
				 );
			 }
			 else
			 $this->redirect('myaccount');			 
		}
	}
	
	public function logout() 
	{
		return $this->redirect($this->Auth->logout());
	}
	
	public function checkout() 
	{
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = array_merge($add_cart_session);
		elseif(isset($product_id))
		$product_id = array_merge($product_id);
		
		if(isset($product_id))
		$product_id = array_unique($product_id);
		
		if(isset($product_id))
		{
			$product_checkout = array();
			
			$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.id'=>$product_id)));
			
			foreach($products as $product)
			$products_checkout[] = $product['Produc_master'];
			
			if(isset($products_checkout))
			foreach($products_checkout as $key=>$product)
			{
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['id'])));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products_checkout[$key]['images']['Default'] = $image;
					else
					$products_checkout[$key]['images']['all'] = $image;				
				}
			}

			$i=1;
			foreach($products_checkout as $key=>$product)
			{
				$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['catid'] .'\',Offer_master.offercat)')));
				
				if($offer_master_cat_data !='')
				{
					foreach($offer_master_cat_data as $lowest_price_cat)
					{
						$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
					}
					
					$max_discount_cat = max($low_cat);
					
					unset($low_cat);				
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['id'] .'\',Offer_master.offerprod)')));
				
				if($offer_master_data !='')
				{
					foreach($offer_master_data as $lowest_price)
					{
						$low[] = $lowest_price['Offer_master']['discount'];
					}
					if(isset($low))
					$max_discount = max($low);
					
					unset($low);
				}
				
				if(isset($max_discount_cat) && isset($max_discount))
					$final_max_discount = max($max_discount_cat, $max_discount);
				elseif(isset($max_discount_cat))
					$final_max_discount = $max_discount_cat;
				elseif(isset($max_discount))
					$final_max_discount = $max_discount;
									
				unset($max_discount_cat);	 
				unset($max_discount);
							
				$products_checkout[$key]['discount'] = $final_max_discount; 		
				
				$discounted_price = ($product['prodprice']-(($final_max_discount/100)*$product['prodprice']));
				
				$products_checkout[$key]['discounted_price'] = $discounted_price; 		
					
				unset($final_max_discount);
				$i++;
			}
			
		if(isset($products_checkout))
		$this->set('products_checkout', $products_checkout);		

		}
	}
	
	public function remove_from_wishlist() { 
		
		if($this->Auth->user())
		{			
			$user_data = $this->Auth->user();
			
			$wishlist_product = $this->Wishlist_master->find('first', array('conditions'=>array('Wishlist_master.id'=>$_REQUEST['wishlist_master_id'], 'Wishlist_master.usrid'=>$user_data['id'])));
			
			$wishlist_product['Wishlist_master']['del_status'] = 1;
			
			if($this->Wishlist_master->save($wishlist_product))
				echo "Saved";
			else
				echo "Not saved";
		}
		
		die();				
	}
	
	public function remove_from_cart() { 
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');						
			
			foreach($add_cart_session as $key=>$value)
			{
				if($value == $_REQUEST['product_id'])
					unset($add_cart_session[$key]);
			}
			
			$this->Session->write('add_cart_session', $add_cart_session);			
		}
		
		if($this->Auth->user())
		{			
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0, 'Cart_master.product_id'=>$_REQUEST['product_id'])));
			
			$all_products_count_db = count($all_products);
			
			if($all_products !='')
			foreach($all_products as $product)
			{
				$prods = $product['Cart_master'];
				
				$rmv_cart['Cart_master']['id'] = $prods['id'];
				$rmv_cart['Cart_master']['del_status'] = 1;
				
				if($all_products_count_db>1)
					$this->Cart_master->save($rmv_cart);				
				else
				{
					$this->Cart_master->create();
					$this->Cart_master->save($rmv_cart);				
				}									
			}
		}
		
		if($this->Session->check('add_cart_session') == 1)
		$add_cart_session = $this->Session->read('add_cart_session');						
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			foreach($all_products as $product)
			{
				$product = $product['Cart_master'];
				
				$product_id[] = $product['product_id'];
			}
		}
		
		if(isset($add_cart_session) && isset($product_id))
		$product_id = array_merge($product_id, $add_cart_session);
		elseif(isset($add_cart_session))
		$product_id = array_merge($add_cart_session);
		elseif(isset($product_id))
		$product_id = array_merge($product_id);
		
		$product_id = array_unique($product_id);
		
		echo count($product_id);
		
		die();						
	}
	public function contact_us() { 

		$contact_us_data['Contact_us'] = $_REQUEST;
			
		if(!empty($contact_us_data['Contact_us']))
		{
			if($this->Contact_us->save($contact_us_data))
			$this->redirect('contact_us');			
		}
	}	
	
	public function myaccount() { 
	
		$userdata = $this->Auth->user();	
		$this->set('userdata', $userdata);
		
		if ($this->request->is('post')) {
			
			$data = $this->User->find('first', array('conditions'=>array('User.id'=> $userdata['id'])));
			
			$password = $data['User']['password'];
			
			$myPassword = $this->request->data['User']['password'];
			
			$hashedPassword = Security::hash($myPassword, null, true); //Password Hashing/Encryption
			
			if($password != $hashedPassword)
			{
				$this->Session->setFlash(__('please enter the correct present password... '));
				
				$this->redirect(array(
				'action' => 'myaccount'
				));
			}
			else
			{
				$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
				$this->request->data['User']['id'] = $userdata['id'];
				
				$this->User->set($this->request->data);
				if ($this->User->validates()) {
					
					$this->User->save();
				}
				/*
				else 
				{
					$errors = $this->User->validationErrors;
					
					echo "Errors<pre>";
					print_r($errors);
					echo "<pre>";
					die();
					// handle errors
				}
				*/				
			}
		}		
	}
	
	public function wishlist_mgt() 
	{
		$userdata = $this->Auth->user();	
		
		if($userdata)
		{
			$wishlist_data['Wishlist_master']['usrid'] = $userdata['id'];
			$wishlist_data['Wishlist_master']['prodid'] = $_REQUEST['product_id'];			
			$wishlist_data['Wishlist_master']['datecreated'] = date('Y-m-d H:i:s',time());
			$wishlist_data['Wishlist_master']['lastupdated'] = date('Y-m-d H:i:s',time());
			
			$this->Wishlist_master->save($wishlist_data);			
						
			$master_id = $this->Wishlist_master->getLastInsertId();
			
			$wishlist_data_detail['Wishlist_detail']['master_id'] = $master_id;			
			$wishlist_data_detail['Wishlist_detail']['prodid'] = $_REQUEST['product_id'];			
			$wishlist_data_detail['Wishlist_detail']['datecreated'] = date('Y-m-d H:i:s',time());
			$wishlist_data_detail['Wishlist_detail']['dateupdated'] = date('Y-m-d H:i:s',time());
			
			if($this->Wishlist_detail->save($wishlist_data_detail))
			echo "yes";
			else
			echo "no";		
		}
		else
		echo "no";		
		
		die();
		
	}
	
	public function review_mgt() 
	{ 
		$userdata = $this->Auth->user();	
		
		if($userdata)
		{
			$review_data['Review_master']['user_id'] = $userdata['id'];
			$review_data['Review_master']['review_txt'] = $_REQUEST['review_text'];
			$review_data['Review_master']['prodid'] = $_REQUEST['product_id'];
			
			if($this->Review_master->save($review_data))
			echo "yes";
			else
			echo "no";		
		}
		else
		echo "no";		
	
		die();
	}
	
	public function my_wishlist() 
	{
		$userdata = $this->Auth->user();	
				
		$wishlist_all = $this->Wishlist_master->find('all', array('conditions'=>array('Wishlist_master.del_status'=>0, 'Wishlist_master.usrid'=>$userdata['id'])));
		
		foreach($wishlist_all as $key=>$wishlist)
		{		
			$wishlist_details = $this->Wishlist_detail->find('first', array('conditions'=>array('Wishlist_detail.master_id'=>$wishlist['Wishlist_master']['id'])));
			
			if(isset($wishlist_details)!='')
			{
				if(isset($wishlist_details['Wishlist_detail']))
				$cart_product = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.product_id'=>$wishlist_details['Wishlist_detail']['prodid'], 'Cart_master.user_id'=>$userdata['id'])));
				
				if(isset($wishlist_details['Wishlist_detail']))
				$product_master = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$wishlist_details['Wishlist_detail']['prodid'])));
				
				if($this->Session->check('add_cart_session') == 1)
				$add_cart_session = $this->Session->read('add_cart_session');						
		
				if($this->Auth->user())
				{
					$user_data = $this->Auth->user();
					
					$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
					
					foreach($all_products as $product)
					{
						$product = $product['Cart_master'];
						
						$product_id[] = $product['product_id'];
					}
					
					if(isset($add_cart_session) && isset($product_id))
					$product_id = array_merge($product_id, $add_cart_session);
					elseif(isset($add_cart_session))
					$product_id = $add_cart_session;
					elseif(isset($product_id))
					$product_id = $product_id;
					
					if(isset($product_id))
					{
						if(count($product_id)>1)
						{				
							$add_cart = array_unique($product_id);
							
							$product = $product_master['Produc_master'];
								
							if(isset($add_cart))			
							{
								if(in_array($product['id'], $add_cart))
									$product_master['Produc_master']['add_to_cart'] = 1;								
								else
									$product_master['Produc_master']['add_to_cart'] = 0;
							}
							else
								$product_master['Produc_master']['add_to_cart'] = 0;
						}
					}				
				}
				
				if(isset($wishlist_details['Wishlist_detail']))
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$wishlist_details['Wishlist_detail']['prodid'])));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products_checkout['Default'] = $image;
					else
					$products_checkout['all'] = $image;				
				}
				
				$wishlist_details['Wishlist_detail']['prod_details'] = $product_master['Produc_master'];
				
				$wishlist_details['Wishlist_detail']['images'] = $products_checkout;
				
				$wishlist_all[$key]['Wishlist_detail'] = $wishlist_details['Wishlist_detail'];
			}			
		}
			
		$i=1;
		foreach($wishlist_all as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Wishlist_detail']['prod_details']['catid'] .'\',Offer_master.offercat)')));
			
			if($offer_master_cat_data !='')
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				$max_discount_cat = max($low_cat);
				
				unset($low_cat);				
			}
			
			$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Wishlist_detail']['prod_details']['id'] .'\',Offer_master.offerprod)')));
			
			if($offer_master_data !='')
			{
				foreach($offer_master_data as $lowest_price)
				{
					$low[] = $lowest_price['Offer_master']['discount'];
				}
				if(isset($low))
				$max_discount = max($low);
				
				unset($low);
			}
			
			if(isset($max_discount_cat) && isset($max_discount))
				$final_max_discount = max($max_discount_cat, $max_discount);
			elseif(isset($max_discount_cat))
				$final_max_discount = $max_discount_cat;
			elseif(isset($max_discount))
				$final_max_discount = $max_discount;
								
			unset($max_discount_cat);	 
			unset($max_discount);
						
			$wishlist_all[$key]['Wishlist_detail']['prod_details']['discount'] = $final_max_discount; 		
			
			$discounted_price = ($product['Wishlist_detail']['prod_details']['prodprice']-(($final_max_discount/100)*$product['Wishlist_detail']['prod_details']['prodprice']));
			
			$wishlist_all[$key]['Wishlist_detail']['prod_details']['discounted_price'] = $discounted_price; 		
				
			unset($final_max_discount);
			$i++;
		}
		
		$this->set('wishlist', $wishlist_all);		
	
	}
	
	public function buy_product($id) 
	{
		$product_data = $this->Produc_master->find('first', array('Produc_master.id' =>$id));
		
		echo "product_data<pre>";
		print_r($product_data);
		echo "<pre>";
		
		die();
	}
	
	public function coupon_mgt() 
	{
		if(isset($_REQUEST['total_price']))
		$prodprice = $_REQUEST['total_price'];
		else
		{
			$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$_REQUEST['product_id'])));
			$prodprice = $product_data['Produc_master']['prodprice'];
		}
		
		$coupon_data = $this->Coupon_master->find('first', array('conditions'=>array('Coupon_master.coupon_number'=>$_REQUEST['coupon_txt'])));
		
		if($coupon_data !='')
		{
			if($coupon_data['Coupon_master']['discount_prcnt']!='')
			{
				$final_price = ($prodprice-(($coupon_data['Coupon_master']['discount_prcnt']/100)*$prodprice));
			}
			else
			{
				$final_price = (($prodprice)-$coupon_data['Coupon_master']['discount_price']);
			}			
			
			echo $final_price;
		}
		else
		{
			echo 0;
		}
		
		die();				
	}
	
	
}
?>