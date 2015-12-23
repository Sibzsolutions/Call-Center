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

App::uses('CakeEmail', 'Network/Email');	
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
	
	public $uses = array('User', 'Site_setting', 'Category', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image', 'Offer_master', 'Attribute_master', 'Attribute_category', 'Attribute_value', 'Produc_attribute', 'Cart_master', 'Slider_image', 'Contact_us', 'Home_page_box', 'Review_master', 'Wishlist_master', 'Wishlist_detail', 'Coupon_master', 'Produc_color_image', 'Attribute_value', 'User_address', 'Order_master', 'Order_detail', 'Order_status', 'Payment_master', 'Shipping_master', 'Coupon_detail', 'Produc_quantity', 'Notify_prod_email', 'Payment_master', 'Shipping_master');
	
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('usremail' => 'usremail')
            )
        )
    ),'RequestHandler','Paginator', 'Session'); 
	
	public $helpers = array( 
	'Js' => array('Jquery'), 'Session');
	 
	 //This is the before filter method
	function beforeFilter()
	{
		 parent::beforeFilter();
		 AuthComponent::$sessionKey='onlyhuman';
		 $this->Auth->fields = array('username' => 'username','password' => 'password');
		 $this->Auth->authenticate = array('Form' => array('scope'=>array('User.usrtype'=>array('0'))));
		 $this->Auth->loginAction=array('controller' => 'Buyshops','action' => 'login');
		 $this->Auth->logoutRedirect=array('controller' => 'Buyshops','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Buyshops','action'=>'myaccount');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login', 'index', 'product_details', 'products', 'single', 'add_to_cart', 'checkout', 'remove_from_cart', 'sort_products', 'filter_search_type', 'contact_us', 'search_results', 'review_mgt', 'wishlist_mgt', 'add_to_cart_wishlist', 'remove_from_wishlist', 'coupon_mgt', 'color_change_imgs', 'att_cart', 'address', 'price_changed', 'add_new_addr', 'place_order_info', 'tell_a_friend', 'our_story', 'friendly_policies', 'legal', 'color_disclaimer', 'faq', 'privacy_policy', 'terms_and_conditions', 'about_us', 'catalog_download', 'catalog_request', 'hollowaysportswear', 'productvideos', 'instructional_videos', 'prebuilt_personalized_flyers', 'web_links', 'sizing_fit_guide', 'decoration_techniques', 'stock_decoration_library', 'uniform_decoration_guides', 'knowledge_center', 'tell_a_friends', 'disp_filter', 'category_tree_filter', 'place_order', 'place_order', 'quantity', 'changed_quantity');  
		 
		 $this->layout="buyshops_layout";   
		 
		 $this->Session->write('pre_controller', $this->params['controller']);
		 
		 $userdata = $this->Auth->user();
		
		 $this->set('user_data',$userdata);
		 
		 //For meta title, key and descriptions
		 $site_setting = $this->Site_setting->find('first');
		 $this->set('site_setting',$site_setting);
		 
		 $action_info = $this->request->params['action'];
		
		 if(($action_info !='login') && ($action_info !='register') && ($action_info !='address'))
		 {
			$this->Session->write('redirect_page_first', $this->referer()); 
		 }
		 
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
		 
		//Add to cart functionality
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
			
			if(isset($product_id))
			$product_id = array_unique($product_id);
			
			if(isset($product_id))
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
	 
	 //Filter search result page
	 Public function filter_search_type()
	 {
		$this->layout='';
		
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
		
		/*
		echo "One<pre>";
		print_r($one);
		echo "<pre>";
		*/
		
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
					
					//$data_one_last[] = $last_final;
					
					$data_fin_new[] = $search_first;
				}
				
				if($this->Session->check('id_first') == 1)
					$id_first = $this->Session->read('id_first');
				
				//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id_first, 'Produc_master.del_status'=>0)));
			
				/*
				$filter_one = $this->category_tree_filter($id_first);
				
				foreach($filter_one as $data)
				{
					if(count($data)>1)
					{
						foreach($data as $data_one)
						{
							if(!empty($data_one[0]))
								$shashi[$data_one[0]] = $data_one[0];
						}					
					}
					else
					{
						if(!empty($data[0]))
							$shashi[$data[0]] = $data[0];
					}
				}
				
				$shashia = array_unique($shashi);
				
				if($this->Session->check('cat_one') == 1)
				{
					$cat_one = $this->Session->read('cat_one');
					
					$shashia[$cat_one] = $cat_one;
				}
				
				echo "shashia<pre>";
				print_r($shashia);
				echo "<pre>";
				*/
				
				$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
		
				if(isset($id_first))
				$category_all[$id_first] = $id_first;
				
				//foreach($category_all)

				foreach($category_all as $key=>$cate_id)
				{
					$data = $this->sub_cat($cate_id);
					
					if(isset($data))
					{
						$mayur_data[$key] = $data;
					
						$key_two = key($mayur_data);
						
						$end_key = end($mayur_data[$key_two]);
						
						$key_one = key($mayur_data[$key_two]);
						
						$key_one = $key_one+1;
						
						$mayur_data[$key_two][$key_one] = $cate_id;			
						
						$shashi[] = $mayur_data;
					}			
				}
				
				if(isset($mayur_data))
				{
					$mayur_data = reset($mayur_data);
					$category_all = $mayur_data;
				}
				
				foreach($category_all as $one)
					$shashia[$one] = $one;
				
				$cat_prod_final = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id_first)));
				
				if(!empty($cat_prod_final['Category']['parentid']))
				{
					if($cat_prod_final['Category']['parentid'] !=0)
					{
						$shashia[$id_first] = $id_first;
						
						$sub_cat_prod = $this->Category->find('list', array('conditions'=>array('Category.id'=>$shashia)));
					}
				}
				else
				{
					$sub_cat_prod = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$shashia)));
				}
				
				//$sub_cat_prod[$id_first] = $id_first;
				
				//$products_id = $this->Produc_master->find('list', array('conditions'=>array('Produc_master.catid'=>$sub_cat_prod)));
				
				//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.isfeatured'=>1, 'Produc_master.catid'=>$category)));
				
				$products_id = $this->Produc_master->find('list', array('conditions'=>array('Produc_master.catid'=>$sub_cat_prod)));
				
				foreach($data_fin_new as $data_in)
				{
					if(in_array($data_in, $products_id))
						$final[] = $data_in;
				}
				
				unset($data_fin_new);
				
				if(isset($final))
				{					
					$data_fin_new = $final;
					
				/*
				foreach($products_id as $d)
				{
					$data_prod_one[] = $d;
				}
				
				echo "data_prod_one<pre>";
				print_r($data_prod_one);
				echo "<pre>";
				*/
				
				
				
				
				if((isset($min_price)) && (isset($max_price)))
						{
							$this->paginate = array(
					
							 'limit' => 8,
							 'conditions'=>array('Produc_master.id'=>$data_fin_new, 'Produc_master.del_status'=>0, 'Produc_master.prodprice >=' => $min_price, 'Produc_master.prodprice <=' => $max_price));		
							
							$products_first_one = $this->paginate('Produc_master');
						}
						else
						{
							$this->paginate = array(
							 'limit' => 8,
							 'conditions'=>array('Produc_master.id'=>$data_fin_new, 'Produc_master.del_status'=>0));		
							
							 $products_first_one = $this->paginate('Produc_master');
						}

				
				foreach($products_first_one as $product_first_one)
				{
					$product_first_one = $product_first_one['Produc_master'];
					
					$data_first_new['Produc_attribute']['prodid'] = $product_first_one['id'];
					
					$data_one_last[] = $data_first_new;					
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
							
							$products = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product_add['prodid'], 'Produc_master.del_status'=>0, 'Produc_master.prodprice >=' => $min_price, 'Produc_master.prodprice <=' => $max_price)));						
						}
						else
						{
							$products = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product_add['prodid'], 'Produc_master.del_status'=>0)));
						}
						
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
						
						//$search_new = array_unique($final_search);
						
						if(isset($product_list))
						$this->Session->write('sort_product_list', $product_list);
						
						if(isset($search_newa_new))
						$products = $search_newa_new;
						
						
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
						if(isset($products))
						foreach($products as $key=>$product)
						{
							$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
							
							if(!empty($offer_master_cat_data))
							{
								foreach($offer_master_cat_data as $lowest_price_cat)
								{
									$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
								}
								
								if(count($low_cat)>1)
								$max_discount_cat = max($low_cat);
								else
								$max_discount_cat = $low_cat[0];
							
								unset($low_cat);				
							}
							
							$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
							
							if(!empty($offer_master_data))
							{
								foreach($offer_master_data as $lowest_price)
								{
									$low[] = $lowest_price['Offer_master']['discount'];
								}
								
								if(isset($low))
								{
									if(count($low)>1)
										$max_discount = max($low);
									else
										$max_discount = $low[0];
									
									unset($low);
								}
							}
							
							if(isset($max_discount_cat) && isset($max_discount))
								$final_max_discount = max($max_discount_cat, $max_discount);
							elseif(isset($max_discount_cat))
								$final_max_discount = $max_discount_cat;
							elseif(isset($max_discount))
								$final_max_discount = $max_discount;
							else
								$final_max_discount = 0;
							
							if(isset($max_discount_cat))
							unset($max_discount_cat);	 
							
							if(isset($max_discount))
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
		}
		else
		{
			if($this->Session->check('id_first') == 1)
			$id_first = $this->Session->read('id_first');
			
			if($this->Session->check('sort_product_list') == 1)
			$this->Session->delete('sort_product_list');
			
			//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.catid'=>$id_first, 'Produc_master.del_status'=>0)));
		
			/*
			$filter_one = $this->category_tree_filter($id_first);
			
			foreach($filter_one as $data)
			{
				if(count($data)>1)
				{
					foreach($data as $data_one)
					{
						if(!empty($data_one[0]))
							$shashi[$data_one[0]] = $data_one[0];
					}					
				}
				else
				{
					if(!empty($data[0]))
						$shashi[$data[0]] = $data[0];
				}
			}
			
			$shashia = array_unique($shashi);
			
			if($this->Session->check('cat_one') == 1)
			{
				$cat_one = $this->Session->read('cat_one');
				
				$shashia[$cat_one] = $cat_one;
			}
			*/
			
			$category_all = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
		
				if(isset($id_first))
				$category_all[$id_first] = $id_first;
				
				//foreach($category_all)

				foreach($category_all as $key=>$cate_id)
				{
					$data = $this->sub_cat($cate_id);
					
					if(isset($data))
					{
						$mayur_data[$key] = $data;
					
						$key_two = key($mayur_data);
						
						$end_key = end($mayur_data[$key_two]);
						
						$key_one = key($mayur_data[$key_two]);
						
						$key_one = $key_one+1;
						
						$mayur_data[$key_two][$key_one] = $cate_id;			
						
						$shashi[] = $mayur_data;
					}			
				}
				
				if(isset($mayur_data))
				{
					$mayur_data = reset($mayur_data);
					$category_all = $mayur_data;
				}
				
				foreach($category_all as $one)
					$shashia[$one] = $one;
			
			$cat_prod_final = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id_first)));

			if(!empty($cat_prod_final['Category']['parentid']))
			{
				if($cat_prod_final['Category']['parentid'] !=0)
				{
					$sub_cat_prod = $this->Category->find('list', array('conditions'=>array('Category.id'=>$shashia)));
				}
			}
			else
			{
				$shashia[$id_first] = $id_first;
		
				$sub_cat_prod = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$shashia)));
			}
			
			//$sub_cat_prod[$id_first] = $id_first;
			
			//$products_id = $this->Produc_master->find('list', array('conditions'=>array('Produc_master.catid'=>$sub_cat_prod)));
			
			//$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.isfeatured'=>1, 'Produc_master.catid'=>$category)));
			
			$products_id = $this->Produc_master->find('list', array('conditions'=>array('Produc_master.catid'=>$sub_cat_prod)));
			
			//$products_id[$id_first] = $id_first;
			
			if((isset($min_price)) && (isset($max_price)))
			{							
				$this->paginate = array(

					 'limit' => 8,
					 'conditions'=>array('Produc_master.id'=>$products_id, 'Produc_master.del_status'=>0, 'Produc_master.prodprice >='=>$min_price, 'Produc_master.prodprice <='=>$max_price)
				);
			}
			else
			{
				$this->paginate = array(

					 'limit' => 8,
					 'conditions'=>array('Produc_master.del_status'=>0, 'Produc_master.id'=>$products_id)
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
					{
						if(count($low_cat)>0)
							$max_discount_cat = max($low_cat);
						else
							$max_discount_cat = $low_cat[0];
						
						unset($low_cat);				
					}
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
				
				if($offer_master_data !='')
				{
					foreach($offer_master_data as $lowest_price)
					{
						$low[] = $lowest_price['Offer_master']['discount'];
					}
					if(isset($low))
					{
						if(count($low)>0)
							$max_discount = max($low);
						else
							$max_discount = $low[0];						
					}
					
					unset($low);
				}
				
				if(isset($max_discount_cat) && isset($max_discount))
					$final_max_discount = max($max_discount_cat, $max_discount);
				elseif(isset($max_discount_cat))
					$final_max_discount = $max_discount_cat;
				elseif(isset($max_discount))
					$final_max_discount = $max_discount;
				else
					$final_max_discount = 0;	
																		
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
	 
	 
	 Public function category_tree_filter($catid)
	 {
		$shashi[] = $catid;
		  
		$new_data = array();  
	    $category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$catid)));
		
		foreach($category_data as $key=>$data)
		{
			//$first_cat_dataaa[] = $data['Category']['id'];
			
			if($this->Session->check('cat_one') == 1)
			{
				//$this->Session->delete('cat_one');				
			}
			else
			{
				if(!empty($data['Category']['id']))
					$this->Session->write('cat_one', $data['Category']['id']);
			}
			
			$one_data = $this->category_tree_filter($data['Category']['id']);
			
			//$new_data[] = $first_cat_dataaa;
			
			if(!empty($one_data))
			{
				$first_cat_data = $one_data;
				$new_data[] = $first_cat_data;
				unset($first_cat_data);
			}	
		}
		
		$one_final = $new_data + $shashi;
		
		unset($new_data);
		unset($shashi);
		
		return $one_final;		
	 }
	 
	 //Dynamic Category tree function
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
	  
	 Public function disp_filter($sub_cat)
	 {	
		$shashi = array();
		
		foreach($sub_cat as $cat)
		{	
			$shashi[] = $cat;
			if(!empty($cat['sub_type']))
			{
				$this->disp_filter($cat['sub_type']);
			}			
		}
		
		return $shashi;		
	  }
	  
	  
	  //Dynamic category display
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
	

    //Sort functionality
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
			
			$sub_cat_prod = $this->Category->find('list', array('conditions'=>array('Category.parentid'=>$id_first)));
		
			$products_id = $this->Produc_master->find('list', array('conditions'=>array('Produc_master.catid'=>$sub_cat_prod)));
			
			$products_id[$id_first] = $id_first;
			
			if($_REQUEST['type_id'] == 1)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodname' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));
				
				$this->paginate = array(
			
					 'limit' => 8,
					 'order' => array('prodname' => 'ASC'), 'conditions'=>array('OR'=>array('Produc_master.catid'=>$id_first, 'Produc_master.id'=>$products_id))
				 );
				 
				$products = $this->paginate('Produc_master');		
			}
			
			if($_REQUEST['type_id'] == 2)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('date_added' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));

				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('date_added' => 'DESC'), 'conditions'=>array('OR'=>array('Produc_master.catid'=>$id_first, 'Produc_master.id'=>$products_id))
				 );

				$products = $this->paginate('Produc_master');		
			}
		
			if($_REQUEST['type_id'] == 3)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'DESC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));

				$this->paginate = array(
		
					 'limit' => 8,
					 'order' => array('prodprice' => 'DESC'), 'conditions'=>array('OR'=>array('Produc_master.catid'=>$id_first, 'Produc_master.id'=>$products_id))
				 );
				 
				 $products = $this->paginate('Produc_master');						 
			}
			
			if($_REQUEST['type_id'] == 4)
			{
				//$products = $this->Produc_master->find('all', array('order' => array('prodprice' => 'ASC'), 'conditions'=>array('Produc_master.catid'=>$id_first)));
				
				$this->paginate = array(
	
					 'limit' => 8,
					 'order' => array('prodprice' => 'ASC'), 'conditions'=>array('OR'=>array('Produc_master.catid'=>$id_first, 'Produc_master.id'=>$products_id))
				);
				
				$products = $this->paginate('Produc_master');		
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
		
		$i=1;
		foreach($products as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
				$max_discount_cat = max($low_cat);
				else
				$max_discount_cat = $low_cat[0];	
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
			else
				$final_max_discount = 0;
			
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
	}
	
	//This is the Index page 
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
		
		$i=1;
		foreach($products as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
				$max_discount_cat = max($low_cat);
				else
				$max_discount_cat = $low_cat[0];	
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
			else
				$final_max_discount = 0;
			
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
		
		$this->set('product_slider', $products);
	  }
	
	//This is the Products page functionality
	public function products($id) 
	{
		$category = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id)));
		
		$this->set('category_seo', $category);
		
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
		
		$i=1;
		foreach($products as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
					$max_discount_cat = max($low_cat);
				else
					$max_discount_cat = $low_cat[0];	
				
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
			else
				$final_max_discount = 0;
			
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
		
		if(isset($id_first))
		$category_all[$id_first] = $id_first;
		
		//foreach($category_all)

		foreach($category_all as $key=>$cate_id)
		{
			$data = $this->sub_cat($cate_id);
			
			if(isset($data))
			{
				$mayur_data[$key] = $data;
			
				$key_two = key($mayur_data);
				
				$end_key = end($mayur_data[$key_two]);
				
				$key_one = key($mayur_data[$key_two]);
				
				$key_one = $key_one+1;
				
				$mayur_data[$key_two][$key_one] = $cate_id;			
				
				$shashi[] = $mayur_data;
			}			
		}
		
		if(isset($mayur_data))
		{
			$mayur_data = reset($mayur_data);
			$category_all = $mayur_data;
		}
		
		foreach($category_all as $one)
			$one_data[$one] = $one;
		
		//echo "<br>Id_first".$id_first;
		
		//, 'Produc_master.id'=>$id_first
		if(isset($category_all))
		{
			//$products = $this->Produc_master->find('all', array('conditions'=>array('OR'=>array('Produc_master.catid'=>$category_all), 'Produc_master.del_status'=>0)));		
			//category_all
			$this->paginate = array(
		
				 'limit' => 8,
				 'conditions'=>array('OR'=>array('Produc_master.catid'=>$one_data), 'Produc_master.del_status'=>0)
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
		
		/*
		echo "products<pre>";
		print_r($products);
		echo "<pre>";
		
		die();
		*/
		
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
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
				$max_discount_cat = max($low_cat);
				else
				$max_discount_cat = $low_cat[0];	
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
			else
				$final_max_discount = 0;
			
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
		
		/*
		echo "Products<pre>";
		print_r($products);
		echo "<pre>";
		
		die();
		*/
		
		$this->set('products', $products);
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$this->set('count_add_to_cart', $count_add_to_cart);
		}				
	}
	
	//This is the single product buy process
	public function buy_product($id=null, $quantity_data=null, $original_price=null, $original_discounted_price=null, $coupon_discounted_price=null, $coupon_info=null) 
	{		
		$single_data['prodid'] = $id;
		$single_data['quantity_data'] = $quantity_data;
		$single_data['original_price'] = $original_price;
		$single_data['discounted_price'] = $original_discounted_price;
		$single_data['coupon_discounted_price'] = $coupon_discounted_price;
		
		$single_data['coupon_info'] = $coupon_info;
		
		$single_product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id' =>$id)));
		
		$this->Session->write('single_data', $single_data);
		
		$this->Session->write('single_product', $single_product_data);
		
		$this->redirect('place_order');
	}
	
	//This is the paypal functionality
	public function paypal_pro() 
	{
		
	}
	
	//Do direct method of the paypal
	public function PPHttpPost($methodName_, $nvpStr_) {
		
		global $environment;
		
		$environment = 'sandbox';	// 'sandbox' or 'beta-sandbox' or 'live'
		
		// Set up your API credentials, PayPal end point, and API version.
		
		/*	
		$API_UserName = urlencode('sdk-three_api1.sdk.com'); // set your spi username //Receiver-1_api1.example.com
		$API_Password = urlencode('QFZCWN5HZM8VBG7Q'); // set your spi password //1376438244
		$API_Signature = urlencode('A.d9eRKfd1yVkRrtmMfCFLTqa6M9AyodL0SJkhYztxUi8W9pCXF6.4NI'); // set your spi Signature //AFcWxV21C7fd0v3bYYYRCpSSRI31AGmzqCOSewVu-JVUn9kkAyYV-xUQ
		
		
		
		// Set up your API credentials, PayPal end point, and API version.
		$API_UserName = urlencode('Receiver-1_api1.example.com'); // set your spi username //Receiver-1_api1.example.com
		$API_Password = urlencode('1376438244'); // set your spi password //1376438244
		$API_Signature = urlencode('AFcWxV21C7fd0v3bYYYRCpSSRI31AGmzqCOSewVu-JVUn9KKAyYV-xUQ'); // set your spi Signature //AFcWxV21C7fd0v3bYYYRCpSSRI31AGmzqCOSewVu-JVUn9kkAyYV-xUQ
		
		// Set up your API credentials, PayPal end point, and API version.
		$API_UserName = urlencode('shashikant.chobhe-facilitator_api1.sibzsolutions.com'); // set your spi username //shashikant.chobhe-facilitator_api1.sibzsolutions.com
		$API_Password = urlencode('XP3HXY38W5FK99WJ'); // set your spi password //XP3HXY38W5FK99WJ
		$API_Signature = urlencode('AFcWxV21C7fd0v3bYYYRCpSSRl31ANpP1KRpPmhAJKj8mlANKmikqgM3'); // set your spi Signature //AFcWxV21C7fd0v3bYYYRCpSSRl31ANpP1KRpPmhAJKj8mlANKmikqgM3
		
		
		// Set up your API credentials, PayPal end point, and API version.
		$API_UserName = urlencode('shashikant.chobhe-facilitator-1_api1.sibzsolutions.com'); // set your spi username //shashikant.chobhe-facilitator-1_api1.sibzsolutions.com
		$API_Password = urlencode('GKFMT5T4ZN4SPK6P'); // set your spi password //GKFMT5T4ZN4SPK6P
		$API_Signature = urlencode('AEdy4sVCKpCbKPdARiw9kjLCSoIBAAaWIzRGMTZxqOnSFZ3w1UsTfXvA'); // set your spi Signature //AEdy4sVCKpCbKPdARiw9kjLCSoIBAAaWIzRGMTZxqOnSFZ3w1UsTfXvA
		*/
		
		$paypal_data = $this->Payment_master->find('first');
		
		// Set up your API credentials, PayPal end point, and API version.
		$API_UserName = urlencode($paypal_data['Payment_master']['key']); // set your spi username //shashikant.chobhe-facilitator-1_api1.sibzsolutions.com
		$API_Password = urlencode($paypal_data['Payment_master']['password']); // set your spi password //GKFMT5T4ZN4SPK6P
		$API_Signature = urlencode($paypal_data['Payment_master']['desc']); // set your spi Signature //AEdy4sVCKpCbKPdARiw9kjLCSoIBAAaWIzRGMTZxqOnSFZ3w1UsTfXvA
		
		// Set up your API credentials, PayPal end point, and API version.
		/*
		$API_UserName = urlencode('amit.jagtap_api1.sibzsolutions.com'); // set your spi username //shashikant.chobhe-facilitator-1_api1.sibzsolutions.com
		$API_Password = urlencode('R7EQ9T2WQPM5DXSL'); // set your spi password //GKFMT5T4ZN4SPK6P
		$API_Signature = urlencode('An5ns1Kso7MWUdW4ErQKJJJ4qi4-ABKaKTnEkKMzSXh-ABhNRX3acZMR'); // set your spi Signature //AEdy4sVCKpCbKPdARiw9kjLCSoIBAAaWIzRGMTZxqOnSFZ3w1UsTfXvA
		*/
		
		
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
		if("sandbox" === $environment || "beta-sandbox" === $environment) {
			$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
		}
		$version = urlencode('51.0');
	 
		// Set the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
	 
		// Turn off the server and peer verification (TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
	 
		// Set the API operation, version, and API signature in the request.
		$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
	 
		// Set the request as a POST FIELD for curl.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
	 
		// Get response from the server.
		$httpResponse = curl_exec($ch);
	 	
		if(!$httpResponse) {
			exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
		}
	 
		// Extract the response details.
		$httpResponseAr = explode("&", $httpResponse);
	 
		$httpParsedResponseAr = array();
		foreach ($httpResponseAr as $i => $value) {
			$tmpAr = explode("=", $value);
			if(sizeof($tmpAr) > 1) {
				$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
			}
		}
		
		if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
			exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
		}
	 
		return $httpParsedResponseAr;
	}
	
	//This is the success payment page after the product is buy.
	public function success_payment() 
	{
		if($this->Session->check('place_order_info') == 1)
			$this->Session->delete('place_order_info');
		
		if($this->Session->check('place_order_data') == 1)
		{
			$_REQUEST = $this->Session->read('place_order_data');
			
			/*
			echo "Requested_data<pre>";
			print_r($_REQUEST);
			echo "<pre>";
			*/
			
			if(!empty($_REQUEST['coupon_info']))
			{
				$coupon_data = $this->Coupon_master->find('first', array('conditions'=>array('Coupon_master.coupon_number'=>$_REQUEST['coupon_info'])));
				
				if($coupon_data['Coupon_master']['discount_prcnt']!='')
					$_REQUEST['coupon_info_data'] = "You get the ".$coupon_data['Coupon_master']['discount_prcnt']." % discount";
				else
					$_REQUEST['coupon_info_data'] = "You get the ".$coupon_data['Coupon_master']['discount_price']." off";
			}	
			
			$place_order_address['Place_Order'] = $_REQUEST;			
		}
		
		if(!empty($place_order_address['Place_Order']))
		{			
			$userdata = $this->Auth->user();
			
			//$last_inserted_orderstatusid = $this->Order_status->getLastInsertId();
			
			//$order_data['Order_master']['orderstatus'] = $last_inserted_orderstatusid;
			
			/*
			$order_data['Order_master']['paymentid'] = $place_order_address['Place_Order']['user_payment_id'];
			
			$order_data['Order_master']['shippingid'] = $place_order_address['Place_Order']['user_shipping_id'];
			*/
			
			$order_data['Order_master']['paymentid'] = 1;
			
			$order_data['Order_master']['shippingid'] = 1;
			
			$order_data['Order_master']['usrid'] = $userdata['id'];
			
			$order_data['Order_master']['orderstartdate'] = date('Y-m-d H:i:s',time());			
			
			$order_data['Order_master']['orderenddate'] = date('Y-m-d H:i:s',time());			
			
			//$order_data['Order_master']['paymentid'] = 0;			
			
			//$order_data['Order_master']['shippingid'] = 0;			
			
			if($this->Session->check('original_price') == 1)
				$original_price = $this->Session->read('original_price');						
			
			if($this->Session->check('discounted_price') == 1)
				$discounted_price = $this->Session->read('discounted_price');						
			
			if(isset($discounted_price))
				$order_data['Order_master']['ordervalue'] = $discounted_price;
			
			if(isset($original_price))
				$order_data['Order_master']['ordervalue'] = $original_price;
			
			if($this->Session->check('discounted_price') == 1)
				$this->Session->delete('discounted_price');											
			
			if($this->Session->check('original_price') == 1)
				$this->Session->delete('original_price');						
			
			if(isset($_REQUEST['example_payment_amuont']))
				$order_data['Order_master']['ordervalue'] = $_REQUEST['example_payment_amuont'];
			
			$order_data['Order_master']['del_status'] = 0;
			
			$order_data['Order_master']['orderstatus'] = 'pending';
			
			/*
			$order_data['Order_master']['order_status'] = 1;
			
			$order_data['Order_master']['payment_id'] = $place_order_address['Place_Order']['user_payment_id'];
			
			$order_data['Order_master']['shipping_id'] = $place_order_address['Place_Order']['user_payment_id'];
			
			*/
			
			/*
			echo "Order Data<pre>";
			print_r($order_data);
			echo "<pre>";
			*/
			
			$this->Order_master->save($order_data);
			
			$last_inserted_orderid = $this->Order_master->getLastInsertId();
			
			$order_status['Order_status']['orderid'] = $last_inserted_orderid;
			
			//$last_inserted_orderid = 478;
			
			//$order_status['Order_status']['orderid'] = 478;
			
			$order_status['Order_status']['ostatusname'] = 'pending';
			
			$order_status['Order_status']['ostatusdesc'] = 'This is the order from the '.$userdata['usrfname'].' '.$userdata['usrlname'];
			
			$order_status['Order_status']['del_status'] = 0;
			
			$this->Order_status->save($order_status);
			
			/*
			echo "Order_status<pre>";
			print_r($order_status);
			echo "<pre>";
			*/
			
			if($this->Session->check('product_data_final') == 1)
			{
				$product_data_final = $this->Session->read('product_data_final');						
				
				$i=1;
				foreach($product_data_final as $key=>$product)
				{
					$product_one = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product['prodid'])));
					
					$product_data_final[$key]['Produc_master']['original_price'] = $product_one['Produc_master']['prodprice']; 		
					
					$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['prodid'] .'\',Offer_master.offerprod)')));
					
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
					
					if(isset($max_discount))
					{
						$final_max_discount = $max_discount;
										
						unset($max_discount);
						
						$discounted_price = ($product_one['Produc_master']['prodprice']-(($final_max_discount/100)*$product_one['Produc_master']['prodprice']));
						
						$product_data_final[$key]['Produc_master']['discounted_price'] = $discounted_price; 		
						
						$product_data_final[$key]['Produc_master']['discount'] = $final_max_discount; 		
							
						unset($final_max_discount);

						$i++;
					}
					
					$product_details['Order_detail']['orderid'] = $last_inserted_orderid;					
				}			
			}
			
			if(isset($product_data_final))
			foreach($product_data_final as $data)
			{
				$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$data['prodid'])));
				
				$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['catid'] .'\',Offer_master.offercat)')));
				
				if(!empty($offer_master_cat_data))
				{
					foreach($offer_master_cat_data as $lowest_price_cat)
					{
						$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
					}
					
					if(count($low_cat)>1)
						$max_discount_cat = max($low_cat);
					else
						$max_discount_cat = $low_cat[0];	
					
					unset($low_cat);				
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['id'] .'\',Offer_master.offerprod)')));
				
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
				else
					$final_max_discount = 0;
				
				unset($max_discount_cat);	 
				unset($max_discount);
				
				if(isset($final_max_discount))
				{
					//$products[$key]['Produc_master']['discount'] = $final_max_discount; 		
					
					$data['Produc_master']['discount'] = $final_max_discount; 		
					
					$discounted_price = ($product_data['Produc_master']['prodprice']-(($final_max_discount/100)*$product_data['Produc_master']['prodprice']));
					
					$data['Produc_master']['discounted_price'] = $discounted_price; 		
					
					unset($final_max_discount);
				}
				
				$attvid_data = explode(',', $data['attvid']);
					
				$one_count = 1;
				foreach($attvid_data as $attvid)
				{
					$attvid_txt_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$attvid)));
					
					$prod_att_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.attvid'=>$attvid_txt_data['Attribute_value']['id'], 'Produc_attribute.prodid'=>$data['prodid'])));
					
					if(!empty($prod_att_data['Produc_attribute']['add_cost']))
					{
						$cost_change = $prod_att_data['Produc_attribute']['add_cost'];
						$data['Produc_master']['discounted_price'] = ($data['Produc_master']['discounted_price'] + $cost_change);
					}
					else
					{
						$cost_change = $prod_att_data['Produc_attribute']['less_cost'];
						$data['Produc_master']['discounted_price'] = ($data['Produc_master']['discounted_price'] - $cost_change);
					}
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $data['prodid'] .'\',Offer_master.offerprod)')));
				
				if(isset($offer_master_data))
				{
					if(!empty($offer_master_data))
					{
						foreach($offer_master_data as $lowest_price)
							$low[] = $lowest_price['Offer_master']['discount'];
						
						if(isset($low))
							$max_discount = max($low);
						
						//echo "max_discount".$max_discount;
						
						$offer_master_data = $this->Offer_master->find('first', array('conditions'=>array('Offer_master.discount'=>$max_discount)));
						
						$product_details['Order_detail']['offer'] = $offer_master_data['Offer_master']['id'];
						
						unset($low);
					}
					else
						$product_details['Order_detail']['offer'] = 0;
				}
				else
					$product_details['Order_detail']['offer'] = 0;
				
				$product_details['Order_detail']['attvid'] = $data['attvid'];
				
				$product_details['Order_detail']['prodid'] = $data['prodid'];
				
				$product_details['Order_detail']['orderid'] = $last_inserted_orderid;
				
				if(isset($data['Produc_master']['discounted_price']))
					$product_details['Order_detail']['subtotal'] = $data['Produc_master']['discounted_price'];
				else
					$product_details['Order_detail']['subtotal'] = $data['Produc_master']['original_price'];
				
				if(!empty($data['quantity']))
				{
					$product_details['Order_detail']['prodqty'] = $data['quantity'];
					$product_details['Order_detail']['subtotal'] = ($data['quantity'] * $product_details['Order_detail']['subtotal']);
				}					
				else
				{
					$product_details['Order_detail']['prodqty'] = 1;
					$product_details['Order_detail']['subtotal'] = $data['Produc_master']['discounted_price'];
				}
				
				if(isset($data['Produc_master']['original_price']))
					$product_details['Order_detail']['prodprice'] = $data['Produc_master']['original_price'];
				else
					$product_details['Order_detail']['prodprice'] = 0;
				
				$product_details['Order_detail']['orderdate'] = date('Y-m-d H:i:s',time());
				
				/*
				if(isset($data['Produc_master']['discount']))
					$product_details['Order_detail']['offer'] = $data['Produc_master']['discount'];					
				else
					$product_details['Order_detail']['offer'] = 0;
				*/
				
				$product_details['Order_detail']['comments'] = 'N/A';
				
				$product_details['Order_detail']['pattid'] = $product_details['Order_detail']['attvid'];
				
				$product_details['Order_detail']['comments'] = $place_order_address['Place_Order']['user_comment'];
				
				$data_att_vid = explode(',', $product_details['Order_detail']['attvid']);
				
				//echo "<br>Quantity".$data['quantity'];
				
				foreach($data_att_vid as $att_vid)
				{
					$data_first = $this->Produc_quantity->find('first', array('conditions'=>array('Produc_quantity.prodid'=>$data['prodid'], 'Produc_quantity.attvid'=>$att_vid)));
					
					//$data_first = $this->Produc_quantity->find('first', array('conditions'=>array('Produc_quantity.prodid'=>32, 'Produc_quantity.attvid'=>21)));
					
					//echo "<br>Total".$data_first['Produc_quantity']['qty'];
					
					if(!empty($data_first))
					{
						$new_qty = ($data_first['Produc_quantity']['qty'] - $data['quantity']);
						
						$data_quantity['id'] = $data_first['Produc_quantity']['id'];
						$data_quantity['qty'] = $new_qty;
						
						$this->Produc_quantity->save($data_quantity);						
					}					
				}
								
				$this->Order_detail->create();
				$this->Order_detail->save($product_details);
				
				/*
				$order_status['Order_status']['ostatusname'] = 'This is the order status name';
				
				$order_status['Order_status']['ostatusdesc'] = 'This is the order description';
				
				$order_status['Order_status']['del_status'] = 0;
				
				$this->Order_status->create();
				$this->Order_status->save($order_status);
				*/				
			}
			
			$product_data_final = $this->Session->read('product_data_final');						
			
			$product_data_new = $this->Session->read('product_data_new');
			
			$i=1;
			
			$data_product_count = count($product_data_final);
			$data_count = 1;
			
			if(isset($product_data_final))
			foreach($product_data_final as $key=>$email_data)
			{	
				$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$email_data['prodid'])));
				
				$product = $product_data;
				
				$product_data['Produc_master']['original_price'] = $product_data['Produc_master']['prodprice']; 		
				
				//email_data['prodid'];
				$aemail_data = 1;
				
				$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['catid'] .'\',Offer_master.offercat)')));
				
				if(!empty($offer_master_cat_data))
				{
					foreach($offer_master_cat_data as $lowest_price_cat)
					{
						$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
					}
					
					if(count($low_cat)>1)
						$max_discount_cat = max($low_cat);
					else
						$max_discount_cat = $low_cat[0];	
					
					unset($low_cat);				
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['id'] .'\',Offer_master.offerprod)')));
				
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
				else
					$final_max_discount = 0;
				
				unset($max_discount_cat);	 
				unset($max_discount);
				
				if(isset($final_max_discount))
				{
					//$products[$key]['Produc_master']['discount'] = $final_max_discount; 		
					
					$product_data['Produc_master']['discount'] = $final_max_discount; 		
					
					$discounted_price = ($product_data['Produc_master']['prodprice']-(($final_max_discount/100)*$product_data['Produc_master']['prodprice']));
					
					$product_data['Produc_master']['discounted_price'] = $discounted_price; 		
					
					unset($final_max_discount);
				}
				
				$attvid_data = explode(',', $email_data['attvid']);
				
				$one_count = 1;
				foreach($attvid_data as $attvid)
				{
					$attvid_txt_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$attvid)));
					
					$prod_att_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.attvid'=>$attvid_txt_data['Attribute_value']['id'], 'Produc_attribute.prodid'=>$product_data['Produc_master']['id'])));
					
					if(!empty($prod_att_data['Produc_attribute']['add_cost']))
					{
						$cost_change = $prod_att_data['Produc_attribute']['add_cost'];
						$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price'] + $cost_change);
					}
					else
					{
						$cost_change = $prod_att_data['Produc_attribute']['less_cost'];
						$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price'] - $cost_change);
					}
					
					/*
					echo "<br>Cost_changed".$cost_change;
					
					echo "<br>Product_discount".$product_data['Produc_master']['discount'];
					
					echo "<br>Final_max_discount".$product_data['Produc_master']['discount'];
					
					$product_data['Produc_master']['discount'] = $final_max_discount; 		
					
					die();
					*/
					
					$attid_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$attvid_txt_data['Attribute_value']['attid'])));
					
					$att_one[$attid_data['Attribute_master']['attname']] = $attvid_txt_data['Attribute_value']['attvalue'];
					
					if(!empty($email_data['quantity']))
						$att_one['Quantity'] = $email_data['quantity'];
					else
						$att_one['Quantity'] = 1;
					
					$att_final[] = $att_one;
					
					/*
					if(!empty($email_data['quantity']))
					{
						if($one_count == 1)
							$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price'] * $email_data['quantity']);						
					}
					else
					{
						if($one_count == 1)
							$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price']);
					}
					*/
					
					$one_count++;
					
					unset($att_one);
				}
				
				if(!empty($email_data['quantity']))
					$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price'] * $email_data['quantity']);						
				else
					$product_data['Produc_master']['discounted_price'] = ($product_data['Produc_master']['discounted_price']);
				
				$email_final['product_data'] = $product_data['Produc_master'];
				
				$email_final['attributes'] = $att_final;
				
				unset($product_data);
				
				unset($att_final);
				
				if($data_count == 1)
				{
					$userdata = $this->Auth->user();
					
					$userdata['email'] = 'shashikant.chobhe@sibzsolutions.com';
					
					$email_final['userdata'] = $userdata;					
				}
				
				if($data_count == $data_product_count)
				{
					if(!empty($_REQUEST['coupon_info_data']))
					{
						$email_final['coupon_info_data'] = $_REQUEST['coupon_info_data'];
			
						$email_final['final_price'] = $_REQUEST['example_payment_amuont'];
					}
				}
				
				$email_one[] = $email_final;
				
				$data_count++;
			}
			
			/*
			foreach($email_one as $keyaa=>$one)
			{
				foreach($product_data_final as $data)
				{
					if($data['prodid'] == $one['product_data']['id'])
					{							
						$data_attvi = explode(',', $data['attvid']);
					}
				}
				
				$product_price = $one['product_data']['discounted_price'];
				
				$product_att_data = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid' => $one['product_data']['id'], 'Produc_attribute.attvid' => $data_attvi)));
				
				unset($data_attvi);
				
				foreach($product_att_data as $data_patt)
				{
					if(!(empty($data_patt['Produc_attribute']['add_cost'])))
					{
						$additional_cost = $data_patt['Produc_attribute']['add_cost'];
						
						$product_price = $product_price + $additional_cost;
					}
					else
					{
						$less_cost = $data_patt['Produc_attribute']['less_cost'];
						
						$product_price = $product_price - $less_cost;
					}
				}
				
				$email_one[$keyaa]['product_data']['discounted_price'] = $product_price;					
				
			}
			
			*/
			
			$site_setting_data = $this->Site_setting->find('first');
			
			//$email_one['coupon_info_data'] = $_REQUEST['coupon_info_data'];
			
			//$email_one['final_price'] = $_REQUEST['example_payment_amuont'];
			
			/*
			echo "Email_one<pre>";
			print_r($email_one);
			echo "<pre>";
			*/
			
			//Send email at the time of registration
			$Email = new CakeEmail();
			$Email->template('Order_product');
			$Email->emailFormat('html');
			$Email->to($userdata['email']);
			$Email->from($site_setting_data['Site_setting']['orderemail']);
			$Email->viewVars(array('email_product_data' => $email_one));
			$Email->subject('Order Details');
			$Email->send();			
						
			/*
			if($this->Session->check('single_data') == 1)
				$this->Session->delete('single_data');
			
			if($this->Session->check('single_product') == 1)
				$this->Session->delete('single_product');
			
			if($this->Session->check('product_data_final') == 1)
				$this->Session->delete('product_data_final');			
			*/
			
			$this->redirect('thanku');			
		}
	}
	
	//This is the thank you page
	public function thanku() 
	{
		
	}
	
	//This is the payment page after place order functionality.
	public function payment_page() 
	{
		$userdata = $this->Auth->user();
		
		$this->set('userdata', $userdata);
		
		$_REQUEST = $this->Session->read('place_order_data');
		
		$requested_place_order = $this->Session->read('requested_place_order');
		
		echo "requested_place_order<pre>";
		print_r($requested_place_order);
		echo "<pre>";
		
		echo "<pre>";
		print_r($_REQUEST);
		echo "<pre>";
		
		if($this->Session->check('place_order_data') == 1)
		{
			$_REQUEST = $this->Session->read('place_order_data');
		
			echo "Requested_data<pre>";
			print_r($_REQUEST);
			echo "<pre>";
			
			$original_price = $this->Session->read('original_price');
				//$this->Session->delete('original_price');
			
			$discounted_price = $this->Session->read('discounted_price');
				//$this->Session->delete('discounted_price');
			
			$product_data_new = $this->Session->read('product_data_new');
				//$this->Session->delete('product_data_new');
			
			/** DoDirectPayment NVP example; 
			 *
			 *  Process a credit card payment. 
			*/
			 
			$environment = 'sandbox';	// 'sandbox' or 'beta-sandbox' or 'live'
			 
			$paymentType = urlencode('Sale');				// 'Authorization' or 'Sale'
			$creditCardType = urlencode($_REQUEST['customer_credit_card_type']);
			
			//$creditCardNumber = urlencode($_REQUEST['customer_credit_card_number']);
			
			$creditCardNumber = urlencode($_REQUEST['User_address']['customer_credit_card_number']);
			
			
			$expDateMonth = $_REQUEST['cc_expiration_month'];
			$padDateMonth = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));
			$expDateYear = urlencode($_REQUEST['cc_expiration_year']);
			$cvv2Number = urlencode($_REQUEST['cc_cvv2_number']);
			
			if(empty($_REQUEST['example_payment_amuont']))
			{
				if(isset($original_price))
					$_REQUEST['example_payment_amuont'] = $original_price;
				if(isset($discounted_price))
					$_REQUEST['example_payment_amuont'] = $discounted_price;
			}
				
			$amount = urlencode($_REQUEST['example_payment_amuont']);
			
			$currencyID = urlencode('USD');							// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
			 
			/**
			 * Send HTTP POST Request
			 *
			 * @param	string	The API method name
			 * @param	string	The POST Message fields in &name=value pair format
			 * @return	array	Parsed HTTP Response body
			 */
			 
			// Set request-specific fields.
			
			//$firstName = urlencode($_POST['customer_first_name']);
			//$lastName = urlencode($_POST['customer_last_name']);
			
			/*
			$paymentType = urlencode('Sale');				// 'Authorization' or 'Sale'
			$creditCardType = urlencode($_POST['customer_credit_card_type']);
			$creditCardNumber = urlencode($_POST['customer_credit_card_number']);
			$expDateMonth = $_POST['cc_expiration_month'];
			$padDateMonth = urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));
			$expDateYear = urlencode($_POST['cc_expiration_year']);
			$cvv2Number = urlencode($_POST['cc_cvv2_number']);
			$amount = urlencode($_POST['example_payment_amuont']);
			$currencyID = urlencode('USD');							// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
			*/
			
			// Month must be padded with leading zero
			
			//$address1 = urlencode($_POST['customer_address1']);
			//$address2 = urlencode($_POST['customer_address2']);
			//$city = urlencode($_POST['customer_city']);
			//$state = urlencode($_POST['customer_state']);
			//$zip = urlencode($_POST['customer_zip']);
			//$country = urlencode($_POST['customer_country']);				// US or other valid country code
			
			// Add request-specific fields to the request string.
			/*
			
			$nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
						"&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
						"&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
			*/
			
			$amount = round($amount);
			
			$nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
					"&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&CURRENCYCODE=$currencyID";		
			
			// Execute the API operation; see the PPHttpPost function above.
			
			echo "nvpStr<pre>";
			print_r($nvpStr);
			echo "<pre>";
			
			$httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);
				  
			echo "httpParsedResponseAr<pre>";
			print_r($httpParsedResponseAr);
			echo "<pre>";
			
			//$httpParsedResponseAr["ACK"] = "SUCCESS";
			
			if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
				
				//exit('Direct Payment Completed Successfully: '.print_r($httpParsedResponseAr, true));
				
				$this->redirect('success_payment');
			} 
			else  
			{			
				foreach($httpParsedResponseAr as $key=>$data)
				{
					if(strpos($key,'L_LONGMESSAGE') !== false) {
						
						$data = substr($data, 0, -1);
						
						$data = preg_replace("/[^ea-zA-Z]/", " ", $data).".";
						
						$data = str_replace(" e ","",$data);
						
						$data = str_replace("This   transaction   cannot   be   processed   ","",$data);
						
						$data = str_replace(" e ","",$data);
						
						$message_data[] = $data;

						//$message_data[] = substr($data, 0, -1);
					}
				}
				
				$i=0;
				foreach($message_data as $data)
				{
					$data = $data;
					
					if($i==0)
						$data_msg = "<br>".$data;
					else
						$data_msg = $data_msg."<br>".$data;
					
					$i++;
				}
				
				$this->Session->setFlash('Sorry, Payment was not occure successfully. <br>You have following problems.'. $data_msg);
				
				//exit('DoDirectPayment failed: ' . print_r($httpParsedResponseAr, true));
				
				$this->redirect('place_order/'.$original_price.'/'.$discounted_price.'/'.$_REQUEST['coupon_info']);
			}
		}					
		else
		{
			$this->Session->setFlash('Sorry, Something went wrong. . . !!!');
			$this->redirect('place_order_data');
		}
	}

	//This is the add new address function which in place order page
	public function add_new_addr() 
	{
		$user_data = $this->Auth->user();
		
		$_REQUEST['usrid'] = $user_data['id'];
		
		$data['User_address'] = $_REQUEST;
		
		$this->User_address->create();
		if($this->User_address->save($data))
		{
			echo "yes";
			die();		
		}
		else
		{
			echo "no";
			die();		
		}
	}

	//This is the functionality for the buy multiple products(checkout page)
	public function place_order_info() 
	{	
		if(isset($_REQUEST))
		{			
			$this->Session->write('place_order_info', $_REQUEST);
			echo "yes";
		}
		else
			echo "no";
					
		die();
	}
	
	//This is the place order functionality.
	public function changed_quantity() 
	{
		$discounted_price = $_REQUEST['discounted_price'];
		
		$product_id = $_REQUEST['product_id'];
		
		$quantity_data = $_REQUEST['quantity_data'];
		
		echo $final_price = ($discounted_price * $quantity_data);
		
		if($this->Auth->user())
		{
			$userdata = $this->Auth->user();
			
			$cart_data = $this->Cart_master->find('first', array('conditions'=>array('Cart_master.user_id'=>$userdata['id'], 'Cart_master.del_status'=>0, 'Cart_master.product_id'=>$product_id)));
			
			$cart_data_new['Cart_master']['id'] = $cart_data['Cart_master']['id'];
			$cart_data_new['Cart_master']['quantity'] = $quantity_data;
			
			$this->Cart_master->save($cart_data_new);
		}
		
		if($this->Session->check('cart_data'))
		{
			$cart_data = $this->Session->read('cart_data');
			
			foreach($cart_data as $key_first=>$data)
			{
				if($key_first == $product_id)
				{
					foreach($data as $key=>$data_first)
					{
						if(($key == "Quantity") || ($key == "quantity"))
						{
							$data_second['attid'] = $quantity_data;
							$data_second['prodid'] = $data_first['prodid'];
							$data_second['key'] = $data_first['key'];
							
							$cart_data[$key_first][$key] = $data_second;
						}
					}
				}				
			}
			
			$this->Session->write('cart_data', $cart_data);
		}
		
		die();
	}
	
	//This is the place order functionality.
	public function place_order($original_price=null, $discounted_price=null, $coupon_info=null) 
	{
		if ($this->request->is('post'))
		{
			$this->User_address->set($this->request->data);
			if ($this->User_address->validates()) 
			{			
				$addr_data = $this->User_address->find('first', array('conditions'=>array('User_address.addr1'=>$this->request->data['User_address']['addr1'])));

				if(!empty($addr_data))
					$this->request->data['User_address']['id'] = $addr_data['User_address']['id'];
				else
				{
					$this->request->data['User_address']['is_main'] = 0;										
					
					$this->User_address->save($this->request->data);
					
					$id = $this->User_address->getLastInsertId();
					
					$this->request->data['User_address']['id'] = $id;										
				}
				
				$this->Session->write('place_order_data', $this->request->data);
				
				//$this->Session->write('place_order_data', $_REQUEST);
				//$this->redirect('payment_page');
				
				$this->Session->write('requested_place_order', $this->request->data);
				
				$this->redirect('payment_page');
			}
			/*
			else 
			{
				$errors = $this->User_address->validationErrors;
				
				echo "Errors<pre>";
				print_r($errors);
				echo "<pre>";
				
				//die();
			}
			*/			
		}
		
		$action_info = $this->request->params['action'];
		
		 if(($action_info !='login') && ($action_info !='register') && ($action_info !='address'))
			$this->Session->write('redirect_page_first', $this->referer()); 
		
		if(!$this->Auth->user())
			$this->redirect('login');
			
		if($this->Session->check('place_order_info') == 1)
		{
			$req_data = $this->Session->read('place_order_info');
			
			if(!empty($req_data['total_price_id']))
				$original_price = $req_data['total_price_id'];
			
			if(!empty($req_data['coupon_price_id']))
				$discounted_price = $req_data['coupon_price_id'];
			
			if(!empty($req_data['coupon_info']))
				$coupon_info = $req_data['coupon_info'];
			
			//$this->Session->delete('place_order_info');
		}
			
		if(!empty($_REQUEST['user_comment']))
		{
			$place_order_address['Place_Order'] = $_REQUEST;
			
			$this->Session->write('place_order_data', $_REQUEST);
				//$this->redirect('payment_page');
		}
		
		//For multiple product(checkout page)
		if(!empty($coupon_info))
			$this->set('coupon_info', $coupon_info);
		
		$redirect_page = $this->request->params['action'];
	
		$this->Session->write('redirect_page', $redirect_page);
		
		$user_data = $this->Auth->user();
		
		$user_address_data = $this->User_address->find('first', array('conditions'=>array('User_address.usrid'=>$user_data['id'], 'User_address.del_status'=>0, 'User_address.ismain'=>1)));
		
		if(empty($user_address_data))
			$user_address_data = $this->User_address->find('first', array('conditions'=>array('User_address.usrid'=>$user_data['id'], 'User_address.del_status'=>0)));
		
		if(empty($user_address_data))
			$user_address_data = $this->User_address->find('first', array('conditions'=>array('User_address.usrid'=>$user_data['id'])));
		
		$user_data['Addresses'] = $user_address_data;
		
		$this->set('userdata', $user_data);
		
		if(isset($original_price))
		{
			$this->Session->write('original_price', $original_price);						
			$this->set('original_price', $original_price);
		}
						
		if(isset($discounted_price))
		{
			$this->Session->write('discounted_price', $discounted_price);						
			$this->set('discounted_price', $discounted_price);
		}				
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');						
			$this->set('add_cart_session', $add_cart_session);
		}				
		
		if($this->Auth->user())
		{
			$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			foreach($all_products as $product)
			{
				if(isset($product['Cart_master']['quantity']))
					$data['quantity'] = $product['Cart_master']['quantity'];	
				else
					$data['quantity'] = 1;
				
				$product = $product['Cart_master'];
				
				$data['prodid'] = $product['product_id'];
				
				if(isset($product['attvid']))
				$data['attvid'] = $product['attvid'];
				
				$product_data[$product['product_id']] = $data;
			}
			
			/*
			if($this->Session->check('add_cart_session') == 1)
			{
				$add_cart_session = $this->Session->read('add_cart_session');						
				
				$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
				foreach($all_products as $product)
				{
					$product = $product['Cart_master'];
					
					$data['prodid'] = $product['product_id'];
					
					$data['attvid'] = $product['attvid'];
					
					$product_dataa[$product['product_id']] = $data;
				}
			}
			*/
		}

		//$product_data_new = $product_dataa + $product_data;
		
		if($this->Session->check('cart_data') == 1)
			$att_add_cart_session = $this->Session->read('cart_data');						
		
		if($this->Session->check('add_cart_session') == 1)
			$add_cart_session = $this->Session->read('add_cart_session');						
		
		/*
		if($this->Session->check('add_cart_session') == 1)
			$add_cart_session = $this->Session->read('add_cart_session');						
		*/
		
		if($this->Session->check('products_check') == 1)
			$products_check = $this->Session->read('products_check');						
		
		if(isset($att_add_cart_session))
		foreach($att_add_cart_session as $data_ses)
		{
			$i=1;
			$data_count_ses = count($data_ses)-1;
			foreach($data_ses as $key_ses=>$ses)
			{
				if(in_array($ses['prodid'], $products_check))
					$shashi[$ses['prodid']] = $data_ses;																	
			}
		}
		
		$si=0;			
		if(isset($add_cart_session))
		foreach($shashi as $data_ses)
		{
			$i=1;
			$data_count_ses = count($data_ses)-1;
			foreach($data_ses as $key_ses=>$ses)
			{					
				if($key_ses== 'Quantity')
				{
					$data_second[$ses['prodid']]['quantity'] = $ses['attid'];									
				}
				else
				{
					if($i==1)
					{
						if($i == $data_count_ses)
							$data_one = $ses['attvid'];
						else
							$data_one = $ses['attvid'].',';						
						$i++;					
					}					
					else
					{
						if($i == $data_count_ses)
							$data_one = $data_one.$ses['attvid'];								
						else
							$data_one = $data_one.$ses['attvid'].',';								
						
						$i++;																
					}						
				}						
			}
			
			$data_second[$ses['prodid']]['prodid'] = $ses['prodid'];
			$data_second[$ses['prodid']]['attvid'] = $data_one;
			
			unset($data_one);				
			
			if($si==0)
				$data_third = $data_second;
			else
				$data_third = $data_third + $data_second;
			
			$si++;				
		}
		
		if(isset($product_data) && isset($data_third)) //$data_final = $product_data + $data_third;
			$data_final = ($product_data + $data_third); //array_merge($product_data, $data_third);
		elseif((isset($product_data)) && (!isset($data_third)))
			$data_final = $product_data;
		elseif((!isset($product_data)) && (isset($data_third)))
			$data_final = $data_third;
		
		if(isset($data_final))
			$this->Session->write('product_data_final', $data_final);
		
		if(isset($data_final))
		$this->set('data_final', $data_final);
	
		$payment_data = $this->Payment_master->find('first');
		
		$this->set('payment_master', $payment_data);
		
		$shipping_data = $this->Shipping_master->find('first');
		
		$this->set('shipping_master', $shipping_data);
	
	}
	
	//This is the functionality after the paypal payment is not successed.
	public function cancel($id) {
		
	}
	
	//Dynamically fetched the subcategory
	public function sub_cat($id) {
		
		$new_data = array();  
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$id, 'Category.del_status'=>0)));
		
		if(!empty($category_data))
		foreach($category_data as $cat)
		{
			$data = $this->sub_cat($cat['Category']['id']);			
			
			$new_data[] = $cat['Category']['id'];
		}	

		if(isset($new_data))
			return $new_data;
	}
	
	//This is the product details page
	public function product_details($id) 
	{
		$product_seo = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		$this->set('product_seo', $product_seo);
		
		if($this->Session->check('one') == 1)
			$this->Session->delete('one');
		
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
		
		$i=1;
		foreach($products as $key=>$product)
		{
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
				$max_discount_cat = max($low_cat);
				else
				$max_discount_cat = $low_cat[0];	
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
			else
				$final_max_discount = 0;
			
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
		
		if($this->Session->check('cart_data') == 1)
		$att_add_cart_session = $this->Session->read('cart_data');						
		
		foreach($att_array as $key_first=>$arr)
		{
			foreach($arr as $key_second=>$data_att)
			{
				if(isset($att_add_cart_session))
				foreach($att_add_cart_session as $key_one_att=>$att_data)
				{
					if($key_one_att == $data_att['Produc_attribute']['prodid'])
					{
						foreach($att_data as $att_one_data)
						{
							if(isset($data_att['Produc_attribute']['attvid']) && isset($att_one_data['attvid']))
							{
								if($att_one_data['attvid'] == $data_att['Produc_attribute']['attvid'])
								{
									$att_array[$key_first][$key_second]['Produc_attribute']['selected'] = 1;
								}
							}							
						}
					}					
				}
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
		
		$wishlist_details_one = $this->Wishlist_detail->find('all', array('conditions'=>array('Wishlist_detail.prodid'=>$product['Produc_master']['id'])));
		
		foreach($wishlist_details_one as $details)
		$master_id[] = $details['Wishlist_detail']['master_id'];			
		
		if(isset($master_id) && isset($user_data['id']))
		$wishlist_master = $this->Wishlist_master->find('all', array('conditions'=>array('Wishlist_master.id'=>$master_id, 'Wishlist_master.del_status'=>0, 'Wishlist_master.usrid'=>$user_data['id'])));
		
		if(isset($wishlist_master))
		foreach($wishlist_master as $master)
		$wishlist_master_id[] = $master['Wishlist_master']['id'];			
		
		if(isset($wishlist_master_id))
		$wishlist_details = $this->Wishlist_detail->find('all', array('conditions'=>array('Wishlist_detail.master_id'=>$wishlist_master_id)));
	
		if(isset($wishlist_details))
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
		
		if(!empty($offer_master_cat_data))
		{
			foreach($offer_master_cat_data as $lowest_price_cat)
			{
				$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
			}
			
			$max_discount_cat = max($low_cat);
			
			unset($low_cat);				
		}
		
		$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Produc_master']['id'] .'\',Offer_master.offerprod)')));
		
		if(!empty($offer_master_data))
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
		else
			$final_max_discount = 0;
							
		unset($max_discount_cat);	 
		unset($max_discount);
					
		if(isset($final_max_discount))			
		{
			$product['Produc_master']['discount'] = $final_max_discount; 		
			
			$discounted_price = ($product['Produc_master']['prodprice']-(($final_max_discount/100)*$product['Produc_master']['prodprice']));
			
			$product['Produc_master']['discounted_price'] = $discounted_price; 		
			
			unset($final_max_discount);
		}
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			$product['Produc_master']['user_data'] = $user_data;
		}
		
		if(isset($product['Produc_master']))		
		$this->set('product', $product['Produc_master']);					
	}
	
	//This is the price change functionality call from the product details page(attributes).
	public function price_changed() 
	{
		/*
		if(!$this->Auth->user())
		{
			echo "not_logged";
			die();
		}
		*/
		
		if(isset($_REQUEST['checkid']))
			$_REQUEST['checked'] = $_REQUEST['checkid'];			
		
		if(isset($_REQUEST['attid']))
			$att_type_data = $_REQUEST['attid'];
		
		if($_REQUEST['checked'] == 1)
		{
			if($this->Session->check('one') == 1)
			{
				$one = $this->Session->read('one');			
				
				$data_first_element[$att_type_data] = $_REQUEST;
				
				$data_first = ($data_first_element + $one);
				
				$this->Session->write('one', $data_first);						
				
				$this->Session->write('one', $data_first);						
			}
			else
			{
				$data_first_element[$att_type_data] = $_REQUEST;
				$data_first[$att_type_data] = $_REQUEST;
				
				$this->Session->write('one', $data_first);			
			}
		}
		else
		{
			if($this->Session->check('one') == 1)
				$one = $this->Session->read('one');
			
				unset($one[$_REQUEST['attid']]);
			
			$this->Session->write('one', $one);						
		}
		
		if($this->Session->check('one') == 1)
			$one = $this->Session->read('one');
		
		if(!empty($one))
		{
			foreach($one as $data)
			$attvid_arr[] = $data['attvid'];
		
			$data = $_REQUEST;
			
			$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id' => $_REQUEST['prodid'])));
	
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				if(count($low_cat)>1)
				$max_discount_cat = max($low_cat);
				else
				$max_discount_cat = $low_cat[0];	
				unset($low_cat);				
			}
			
			$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product_data['Produc_master']['id'] .'\',Offer_master.offerprod)')));
			
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
			else
				$final_max_discount = 0;
			
			unset($max_discount_cat);	 
			unset($max_discount);
			
			if(isset($final_max_discount))
			{
				$product_data['Produc_master']['discount'] = $final_max_discount; 		
			
				$discounted_price = ($product_data['Produc_master']['prodprice']-(($final_max_discount/100)*$product_data['Produc_master']['prodprice']));
				
				$product_data['Produc_master']['discounted_price'] = $discounted_price; 		
				
				unset($final_max_discount);
			}
			
			$product_price = $product_data['Produc_master']['discounted_price'];
			
			if(!empty($attvid_arr))
			{
				$product_att_data = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid' => $_REQUEST['prodid'], 'Produc_attribute.attvid' => $attvid_arr)));
				
				foreach($product_att_data as $data_patt)
				{
					if(!(empty($data_patt['Produc_attribute']['add_cost'])))
					{
						$additional_cost = $data_patt['Produc_attribute']['add_cost'];
						
						$product_price = $product_price + $additional_cost;
					}
					else
					{
						$less_cost = $data_patt['Produc_attribute']['less_cost'];
						
						$product_price = $product_price - $less_cost;
					}
				}
			}					
			echo $product_price;				
		}		
		else
			echo "no_data";
		
		die();
	}
	
	//This is the color change images functionality
	public function color_change_imgs() 
	{
		if($_REQUEST['checkid'] == 1)
			$color_images_data = $this->Produc_color_image->find('all', array('order' => array('order' => 'ASC'), 'conditions'=>array('Produc_color_image.prodid'=>$_REQUEST['prodid'], 'Produc_color_image.attvid'=>$_REQUEST['attvid'], 'Produc_color_image.del_status'=>0)));
		else
		{
			$color_images_data = $this->Produc_image->find('all', array('order' => array('order' => 'ASC'), 'conditions'=>array('Produc_image.prodid'=>$_REQUEST['prodid'], 'Produc_image.del_status'=>0)));
			
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
	
	
	//This is the search results functionality
	public function search_results() 
	{ 
		if(isset($_REQUEST['search_text']))
			$search_text = $_REQUEST['search_text'];
		
		if($this->Session->check('search_text') == 1)
			$search_text = $this->Session->read('search_text');				
		else
			$this->Session->write('search_text', $search_text);				
		
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
				$con = $this->Session->read('con');				
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
	
	//This is the add to wishlist functionality.
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
	
	//This is the add to cart functionality
	public function add_to_cart() 
	{ 
		$product_data = $_REQUEST;
		
		$quantity = $product_data['quantity_data'];
		
		unset($product_data['quantity_data']);
		
		if($this->Session->check('cart_data'))
		{
			$cart_data = $this->Session->read('cart_data');
			
			foreach($cart_data as $key_cart_first=>$cart)
			{
				$i=1;
				$count_cart = count($cart)-1;
				foreach($cart as $key_cart=>$cart_first)
				{
					if($key_cart != 'Quantity')
					{
						if($i==1)
						{
							if($i == $count_cart)
								$mayur_cart = $cart_first['attvid'];
							else
								$mayur_cart = $cart_first['attvid'].',';
						}
						else
						{
							if($i == $count_cart)
								$mayur_cart = $mayur_cart.$cart_first['attvid'];
							else
								$mayur_cart = $mayur_cart.$cart_first['attvid'].',';
						}
						
						/*
						if($i==1)
							$shashi_cart = $mayur_cart;
						else
							$shashi_cart = $shashi_cart.$mayur_cart;					
						*/
						
						$i++;					
					}					
				}
				
				if(isset($mayur_cart))
					$shashi_cart = $mayur_cart;
				
				if(isset($shashi_cart))
				$cart_data[$key_cart_first]['attvid_set'] = $shashi_cart;
				
				unset($shashi_cart);
			}		
		}
		
		foreach($cart_data as $key=>$data_car)
		{			
			if($key == $_REQUEST['product_id'])
			{				
				foreach($data_car as $key_car=>$one_cart)
				{
					if(($key_car == 'color') || ($key_car == 'Color'))
					{
						$prod_qty = $one_cart['attvid'];
					}
				}
			}
		}
		
		if(isset($prod_qty))
		{
			$this->Session->write('notify_email_prod', $prod_qty);
			$qty = $prod_qty;
			
			$product_qty_data = $this->Produc_quantity->find('first', array('conditions'=>array('Produc_quantity.prodid' => $_REQUEST['product_id'], 'Produc_quantity.attvid' => $qty)));
		}
		
		
		
		//$data_qty_prod = explode(',', $prod_qty['attvid_set']);
		
		if(count($product_qty_data)<=0)
		{
			echo "N/A";
			die();
		}
		
		//$product_qty_data = $this->Produc_quantity->find('first', array('conditions'=>array('Produc_quantity.prodid' => $_REQUEST['prodid'], 'Produc_quantity.attvid' => $attvid_arr)));
		
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
			
			$cart_master_data = $this->Cart_master->find('first', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'] , 'Cart_master.product_id'=>$product_data['product_id'])));
			
			if(!empty($cart_master_data))
			{
				$add_to_cart['Cart_master']['id'] = $cart_master_data['Cart_master']['id'];
			}
			
			foreach($cart_data as $key_one=>$cart_one)
			{
				foreach($cart_one as $key_one_key=>$cart_one_data)
				{
					if($key_one == $product_data['product_id'])
					{
						$shashi_data = $cart_one['attvid_set'];
						break;
					}						
				}
				
				if(isset($shashi_data))
				{
					$add_to_cart['Cart_master']['attvid'] = $shashi_data;
					
					$add_to_cart['Cart_master']['user_id'] = $user_data['id'];
			
					$add_to_cart['Cart_master']['product_id'] = $product_data['product_id'];
				}
				else
				{
					$add_to_cart['Cart_master']['user_id'] = $user_data['id'];
			
					$add_to_cart['Cart_master']['product_id'] = $product_data['product_id'];
				}
			}
			
			$add_to_cart['Cart_master']['quantity'] = $quantity;
			
			$add_to_cart['Cart_master']['del_status'] = 0;
			
			$this->Cart_master->save($add_to_cart);		
			
			//$this->Cart_master->save($add_to_cart);		
			
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
	
	public function quantity() 
	{
		//echo "shashikant is in the quantity function";
		//die();
		
		$notify_email_prod_details = $this->Session->read('notify_email_prod');		
		
		$notify_email_prod[] = $notify_email_prod_details;
		
		foreach($notify_email_prod as $key=>$dataa)
		{
			/*
			if($key =='Quantity')
			{
				$info_prod[$key] = $dataa;
			}
			*/
			
			if(($key == "Color") || (($key == "color")))
			{
				$info_color_attvid = $dataa;
				
				$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$dataa)));
				
				$att_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$attvid_data['Attribute_value']['attid'])));
				
				$info_color_attid = $att_data['Attribute_master']['id'];				
				
				$info_prod['Color'] = $attvid_data['Attribute_value']['attvalue'];
				$info_product = $info_prod;
			}
			
			/*
			if(($key !='Quantity') && ($key !='attvid_set'))
			{
				$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$dataa)));
				
				//$att_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$attvi_data['Attribute_value']['attid'])))
				
				$info_prod[$key] = $attvid_data['Attribute_value']['attvalue'];
				$info_product = $info_prod;
			}
			*/
		}
		
		$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$_REQUEST['prod_id'])));
							
		$notify_prod_email['Notify_prod_email']['prodid'] = $product_data['Produc_master']['id'];
		
		$user_data['email'] = $_REQUEST['email_addr'];
		
		$user_data['email'] = "shashikant.chobhe@sibzsolutions.com";
		
		$notify_prod_email['Notify_prod_email']['usremail'] = $_REQUEST['email_addr'];
		
		$data['product'] = $product_data['Produc_master'];
		
		$data['usrdata'] = $_REQUEST['email_addr'];
		
		if(!empty($info_product))
			$data['info'] = $info_product;
				
		$site_setting_data = $this->Site_setting->find('first');
		
		//$notify_prod_email['Notify_prod_email']['attvid'] = $notify_email_prod['attvid_set'];
		$notify_prod_email['Notify_prod_email']['attvid'] = $info_color_attvid;
		
		$notify_prod_email['Notify_prod_email']['attid'] = $info_color_attid;
		
		if($this->Auth->user())
		{
			$userdata = $this->Auth->user();
			
			//, 'Notify_prod_email.attid'=>$notify_prod_email['Notify_prod_email']['attid'],
			
			$notify_prod_email_data = $this->Notify_prod_email->find('first', array('conditions'=>array('Notify_prod_email.prodid'=>$notify_prod_email['Notify_prod_email']['prodid'], 'Notify_prod_email.attvid'=>$notify_prod_email['Notify_prod_email']['attvid'], 'Notify_prod_email.usrid'=>$userdata['email']), 'order' => array(
                'id' => 'DESC'
				)));
			
			if(isset($notify_prod_email_data['Notify_prod_email']['id']))			
				$id = $notify_prod_email_data['Notify_prod_email']['id'];	
		}
		else
		{
			$userdata['email'] = $_REQUEST['email_addr'];
			
			//, 'Notify_prod_email.attid'=>$notify_prod_email['Notify_prod_email']['attid'],
			
			$notify_prod_email_data = $this->Notify_prod_email->find('first', array('conditions'=>array('Notify_prod_email.prodid'=>$notify_prod_email['Notify_prod_email']['prodid'], 'Notify_prod_email.attvid'=>$notify_prod_email['Notify_prod_email']['attvid'], 'Notify_prod_email.usremail'=>$userdata['email']), 'order' => array(
                'id' => 'DESC'
				)));
			
			if(isset($notify_prod_email_data['Notify_prod_email']['id']))
				$id = $notify_prod_email_data['Notify_prod_email']['id'];
		}
		
		if(!empty($id))
			$notify_prod_email['Notify_prod_email']['id'] = $id;
				
		if($this->Notify_prod_email->save($notify_prod_email))
		{
			//Send email at the time of registration
			$Email = new CakeEmail();
			$Email->template('Order_product_unavailable');
			$Email->emailFormat('html');
			$Email->to($user_data['email']);
			$Email->from($site_setting_data['Site_setting']['orderemail']);
			$Email->viewVars(array('email_unavailable_product' => $data));
			$Email->subject('Order Unavailable');
			$Email->send();		
			
			echo "yes";
			die();
		}
			echo "no";
			die();
	}
		
	//This is the registration process
	public function register() 
	{
		if ($this->request->is('post'))
		{
			$this->Session->write('registration_data', $this->request->data);
			
			$this->request->data['User']['usrtype']=0;
			$this->request->data['User']['del_status']=1;
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				
				$this->Session->write('usrdata_register', $this->request->data);
				
				//$usrid = $this->User->getLastInsertId();
				
				//$this->Session->write('usrid', $usrid);
			
				$this->redirect('address');
				
				//$this->User->save();
			} 
			
			/*
			if($this->User->save($this->request->data))
			{
				$usrid = $this->User->getLastInsertId();
				
				$this->Session->write('usrid', $usrid);
			
				$this->redirect('address');
			}
			*/
			
		}
	}
	
	//This is the address functionality(My account page)
	public function add_address() {	
	
		if($this->request->is('post'))
		{			
			$this->User_address->set($this->request->data);
			if ($this->User_address->validates()) 
			{
				$userdata = $this->Auth->user();
						
				$this->request->data['User_address']['usrid'] = $userdata['id'];
				
				$this->User_address->save($this->request->data);
				
				$this->Session->setFlash('Thanx.. You Successfully added the address');
				
				$this->redirect('myaccount');
			}
		}	
	}
	
	
	//This is the address functionality(My account page)
	public function address() {	
		
		if($this->request->is('post'))
		{
			
			$this->User_address->set($this->request->data);
			if ($this->User_address->validates()) 
			{
				if($this->Session->check('usrdata_register') == 1)
				{
					$usrdata_register = $this->Session->read('usrdata_register');
					
					$this->User->save($usrdata_register);
				
					$usrid = $this->User->getLastInsertId();
					
					//$this->Session->delete('usrdata_register');
					
					$usrdata['id'] = $usrid;
					$usrdata['del_staus'] = 0;
					
					$this->request->data['User_address']['usrid'] = $usrid;
					
					if($this->User_address->save($this->request->data))
					{
						$usrdata['id'] = $usrid;
						$usrdata['del_staus'] = 0;
						
						$this->Session->setFlash('Thanx.. You Successfully completed the registration process');						
						
						$this->Session->delete('usrdata_register');
						
						$this->redirect('login');						
					}
					else
					{
						$user['User']['id'] = $usrid;
						
						$this->User->delete($user['User']['id']);
						
						$this->Session->setFlash('Sorry registration is not completed.. Something went wrong');
						$this->redirect('register');					
					}
					
					$this->Session->delete('usrdata_register');
					
					
				}
				else
				{
					$userdata = $this->Auth->user();
						
					$this->request->data['User_address']['usrid'] = $userdata['id'];
					
					if($this->User_address->save($this->request->data))
					{
						$this->Session->setFlash('Thanx.. You Successfully added the address');
						$this->redirect('myaccount');
					}
				}
			}
			else
			{
				$errors = $this->User_address->validationErrors;
				
				echo "errors<pre>";
				print_r($errors);
				echo "<pre>";
				
				die();
			}			
		}		
	}
	
	//This is the login functionality
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
			 {
				 //$this->redirect($this->referer());
				 
				 if($this->Session->check('redirect_page_first')==1)
				 {
					echo $redirect_page = $this->Session->read('redirect_page_first');
					
					
					//$this->Session->delete('redirect_page_first');
					
					$this->redirect($redirect_page);			  
				 }
				 else				 
					$this->redirect('myaccount');			  
			 }			 
		}
	}
	
	//This is the logout functionality
	public function logout() 
	{
		return $this->redirect($this->Auth->logout());
	}
	
	//This is the checkout page. Display the all product which is in the cart.
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
			if(isset($products_checkout))
			foreach($products_checkout as $key=>$product)
			{
				$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['catid'] .'\',Offer_master.offercat)')));
				
				if(!empty($offer_master_cat_data))
				{
					foreach($offer_master_cat_data as $lowest_price_cat)
					{
						$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
					}
					
					$max_discount_cat = max($low_cat);					
					unset($low_cat);				
				}
				
				$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['id'] .'\',Offer_master.offerprod)')));
				
				if(!empty($offer_master_data))
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
				else
					$final_max_discount = 0;
				
				unset($max_discount_cat);	 
				unset($max_discount);
				
					
				$products_checkout[$key]['discount'] = $final_max_discount; 		
				
				$discounted_price = ($product['prodprice']-(($final_max_discount/100)*$product['prodprice']));
				
				$products_checkout[$key]['discounted_price'] = $discounted_price; 		
					
				unset($final_max_discount);
				$i++;
			}
		
		if($this->Session->check('cart_data') == 1)
		$att_add_cart_session = $this->Session->read('cart_data');						
		
		//if(isset($att_add_cart_session))
		
		if(isset($products_checkout))
		foreach($products_checkout as $key=>$products)
		{
			if(isset($user_data['id']))
				$cart_data_master = $this->Cart_master->find('first', array('conditions'=>array('Cart_master.product_id'=>$products['id'], 'Cart_master.user_id'=>$user_data['id'])));
						
			if(!empty($att_add_cart_session))
			foreach($att_add_cart_session as $key_prod=>$session_cart_att)
			{
				if($key_prod == $products['id'])
				{					
					foreach($session_cart_att as $key_att=>$session_one)
					{
						if($key_att == 'Quantity')
						{
							if(isset($session_one['attid']))
								$products_checkout[$key]['att'][$key_att] = $session_one['attid'];
						}
						else
						{
							$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id' => $session_one['attvid'])));
							
							$products_checkout[$key]['att'][$key_att] = $attvid_data['Attribute_value'];
						}
						
						unset($attvid_data);
					}
				}
			}
			
			/*
			else
			{
				$products_checkout[$key]['att']['Quantity'] = $cart_data_master['Cart_master']['quantity'];
				
				$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id' => $cart_data_master['Cart_master']['attvid'])));
			
				$att_master_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id' => $attvid_data['Attribute_value']['attid'])));
			
				$products_checkout[$key]['att'][$att_master_data['Attribute_master']['attname']] = $attvid_data['Attribute_value'];				
			}
			*/
		}
		
		if(isset($products_checkout))
		foreach($products_checkout as $key=>$products)
		{
			if(!empty($products['att']))
			{
				foreach($products['att'] as $keya=>$att_one)
				{
					if($keya !='Quantity')
						$attvid_arr[] = $att_one['id'];
					
					if($keya =='Quantity')
						$quantity = $att_one;
					
				}
				
				$product_price = $products['discounted_price'];
			
				if(isset($attvid_arr))
				{
					$product_att_data = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid' => $products['id'], 'Produc_attribute.attvid' => $attvid_arr)));
					
					unset($attvid_arr);
					
					foreach($product_att_data as $data_patt)
					{
						if(!(empty($data_patt['Produc_attribute']['add_cost'])))
						{
							$additional_cost = $data_patt['Produc_attribute']['add_cost'];
							
							$product_price = $product_price + $additional_cost;
						}
						else
						{
							$less_cost = $data_patt['Produc_attribute']['less_cost'];
							
							$product_price = $product_price - $less_cost;
						}
					}					
				}
				
				if(!empty($quantity))
					$products_checkout[$key]['discounted_price'] = ($product_price * $quantity);
				else
					$products_checkout[$key]['discounted_price'] = $product_price;
				
				//$products_checkout[$key]['discounted_price'] = $product_price;
			}
			
			/*
			if(!empty($products['att']['Color']['id']))
			{
				$prod_attributes_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.prodid' => $products['id'], 'Produc_attribute.attvid' => $products['att']['Color']['id'])));
				
				echo "Prod_attributes_data<pre>";
				print_r($prod_attributes_data);
				echo "<pre>";
				
				die();
				
				$discounted_price_final = ($products['att']['Quantity'] * $products['discounted_price']);
				
				
				
				if(!empty($prod_attributes_data['Produc_attribute']['add_cost']))
				{
					$price_change = $prod_attributes_data['Produc_attribute']['add_cost'];
					
					$discounted_price_final = $discounted_price_final + ($price_change* $products['att']['Quantity']);									
				}				
				else
				{
					$price_change = $prod_attributes_data['Produc_attribute']['less_cost'];
					
					$discounted_price_final = $discounted_price_final - ($price_change* $products['att']['Quantity']);				
				}

				//echo "<br>Discounted_price_final".$discounted_price_final;

				//die();				
						
				$products_checkout[$key]['discounted_price'] = $discounted_price_final;
			}
			*/
			
			if($this->Auth->user())
			{
				if(!empty($products['att']))
				{
					$attvid_data = $this->Cart_master->find('first', array('conditions'=>array('Cart_master.product_id' => $products['id'], 'Cart_master.user_id' => $user_data['id'])));
					
					$attvid_data_first = $attvid_data;
					
					$attvid_data = explode(',', $attvid_data['Cart_master']['attvid']);
					
					$i=0;
					foreach($attvid_data as $data_second)
					{
						$val_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$data_second)));
						
						if(isset($val_data['Attribute_value']['attid']))
						$att_val_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$val_data['Attribute_value']['attid'])));
						
						if(isset($val_data['Attribute_value']))
						$shashi_data[$att_val_data['Attribute_master']['attname']] = $val_data['Attribute_value'];
						
						if(isset($shashi_data))
						{
							if($i==0)
							$data_second_shashi = $shashi_data;
							else
							$data_second_shashi = $data_second_shashi + $shashi_data;
						}
						
						unset($shashi_data);
						
						$i++;
					}
					
					$data_second_shashi['Quantity'] = $attvid_data_first['Cart_master']['quantity'];				
					
					$products_checkout[$key]['att'] = $data_second_shashi;				
					
					if(isset($products['att']['quantity']))
						$products_checkout[$key]['att'] = $products['att']['quantity'];				
					
					unset($data_second_shashi);					
				}					
			}
			
			/*
			foreach($att_add_cart_session as $key_prod=>$session_cart_att)
			{
				if($key_prod == $products['id'])
				{
					foreach($session_cart_att as $key_att=>$session_one)
					{
						$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id' => $session_one['attvid'])));
						
						$products_checkout[$key]['att'][$key_att] = $attvid_data['Attribute_value'];
					}
				}
			}
			*/
		}
		
		if(!empty($products_checkout))
		foreach($products_checkout as $data)
			$products_check[] = $data['id'];
		
		if(!empty($products_check))
		$this->Session->write('products_check', $products_check);
		
		/*
		foreach($products_checkout as $key=>$check)
		{
			$one_count = 1;
			foreach($check['att'] as $attvid)
			{				
				if(!empty($attvid['id']))
				{
					$attvid_txt_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$attvid['id'])));
					
					$prod_att_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.attvid'=>$attvid_txt_data['Attribute_value']['id'], 'Produc_attribute.prodid'=>$check['id'])));
					
					if(!empty($prod_att_data['Produc_attribute']['add_cost']))
					{
						$cost_change = $prod_att_data['Produc_attribute']['add_cost'];
						$products_checkout[$key]['discounted_price'] = ($check['discounted_price'] + $cost_change);
					}
					
					if(!empty($prod_att_data['Produc_attribute']['less_cost']))
					{
						$cost_change = $prod_att_data['Produc_attribute']['less_cost'];
						$products_checkout[$key]['discounted_price'] = ($check['discounted_price'] - $cost_change);
					}					
				}
			}			
		}
		
		
					
		$one_count = 1;
		foreach($attvid_data as $attvid)
		{
			$attvid_txt_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$attvid)));
			
			$prod_att_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.attvid'=>$attvid_txt_data['Attribute_value']['id'], 'Produc_attribute.prodid'=>$data['prodid'])));
			
			if(!empty($prod_att_data['Produc_attribute']['add_cost']))
			{
				$cost_change = $prod_att_data['Produc_attribute']['add_cost'];
				$data['Produc_master']['discounted_price'] = ($data['Produc_master']['discounted_price'] + $cost_change);
			}
			else
			{
				$cost_change = $prod_att_data['Produc_attribute']['less_cost'];
				$data['Produc_master']['discounted_price'] = ($data['Produc_master']['discounted_price'] - $cost_change);
			}
		}
		*/
		
		if(isset($products_checkout))
		$this->set('products_checkout', $products_checkout);		

		}		
	}
	
	//This is the remove wishlist functionality.
	public function remove_from_wishlist($id) { 
		
		if($this->Auth->user())
		{	
			//$_REQUEST['wishlist_master_id']
			
			$user_data = $this->Auth->user();
			
			$wishlist_product = $this->Wishlist_master->find('first', array('conditions'=>array('Wishlist_master.id'=>$id, 'Wishlist_master.usrid'=>$user_data['id'])));
			
			$wishlist_product['Wishlist_master']['del_status'] = 1;
			
			if($this->Wishlist_master->save($wishlist_product))
				$this->redirect('my_wishlist');			
		}
		
		die();				
	}
	
	
	//This is the remove from cart functionality.
	public function remove_from_cart($id) { 
		
		$_REQUEST['product_id'] = $id;
		
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
		
		$this->redirect('checkout');
		
		die();						
	}
	
	//This is the tell a friend functionality.
	public function tell_a_friend() 
	{		
		if ($this->request->is('post')) 
		{
			$name_data = $this->request->data['Tell_a_friend']['name'];
			
			$email_data = $this->request->data['Tell_a_friend']['email'];
			
			$friends_data = array_slice($this->request->data,0,-1);
			
			$friends_chunk_data  = array_chunk($friends_data,2);
			
			foreach($friends_chunk_data as $key=>$friends_send_data)
			{
				$friends_final_data['name_from'] = $name_data;
				$friends_final_data['email_from'] = $email_data;
				$friends_final_data['name_to'] = $friends_send_data[0];
				$friends_final_data['email_to'] = $friends_send_data[1];
				
				$Email = new CakeEmail();
				$Email->template('tell_friends');
				$Email->emailFormat('html');
				$Email->to($friends_send_data[1]);
				$Email->from($email_data);
				$Email->viewVars(array('tell_friends_data' => $friends_final_data));
				$Email->subject('Invitation');
				$Email->send();	
			}
			
			$this->request->data = '';
			
			$this->Session->setFlash(__('You Successfully send the request to friends.... '));					
			
			$this->redirect(array(
				'action'=>'tell_a_friends'
			));		
		}		
	}
	
	//This is the contact us functionality.
	public function contact_us() 
	{ 		
		if(!empty($contact_us_data['Contact_us']))
		{
			if($this->Contact_us->save($contact_us_data))
			{	
				$this->Session->setFlash(__('Thanx For contact us... '));
				
				$site_setting_data = $this->Site_setting->find('first');
				
				//Send email at the time of registration
				$Email = new CakeEmail();
				$Email->template('Contact_us');
				$Email->emailFormat('html');
				$Email->to($site_setting_data['Site_setting']['orderemail']);
				$Email->from($contact_us_data['Contact_us']['email']);
				$Email->viewVars(array('contact_us_data' => $contact_us_data));
				$Email->subject('Contact_us');
				$Email->send();		
				
				$this->redirect('contact_us');
			}
		}
		
		if(isset($_REQUEST))
		$contact_us_data['Contact_us'] = $_REQUEST;
	}	
	
	//This is the order details functionality.
	public function order_details($id) 
	{
		$this->Session->Write('id', $id);
		
		$order_details = $this->Order_detail->find('all', array('conditions'=>array('Order_detail.orderid'=>$id)));
		
		foreach($order_details as $key=>$detail)
		{			
			$offer_details = $this->Offer_master->find('first', array('conditions'=>array('Offer_master.id'=>$detail['Order_detail']['offer'])));
			
			if(isset($offer_details['Offer_master']['offername']))
				$order_details[$key]['Order_detail']['offername'] = $offer_details['Offer_master']['offername'];
			
			$product_details = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$detail['Order_detail']['prodid'])));
			
			$prod_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product_details['Produc_master']['id'])));
			
			foreach($prod_images as $image)
			{
				$image = $image['Produc_image'];		
				
				if($image['isdefault']==1)
				$product_details['Produc_master']['images']['Default'] = $image;
				else
				$product_details['Produc_master']['images']['all'] = $image;				
			}			
			
			$order_details[$key]['Product_details'] = $product_details;
		}
		
		
		
		$this->set('order_details', $order_details);
	}
	
	//This is the my account functionality.
	public function profile() 
	{
		$userdata = $this->Auth->user();	
		
		if($this->request->is('post')) {
			
			if(!empty($this->request->data['User']['password_new']))
				$this->request->data['User']['password'] = $this->request->data['User']['password_new'];
			
			if(empty($this->request->data['User']['password']))
				unset($this->request->data['User']['password']);
			
			$this->User->set($this->request->data);
			if($this->User->validates()) {
				
				$this->User->save($this->request->data);	
				
				$this->Session->setFlash('Thanx.. You Successfully edited profile');
				
				$this->redirect('myaccount');
			}
			/*
			else
			{
				$errors = $this->ModelName->validationErrors;
				 
				echo "Errors<pre>";
				print_r($errors);
				echo "<pre>";
				
				die();
			}
			*/
		}		
	}
	
	//This is the my account functionality.
	public function myaccount() 
	{ 		
		$redirect_page = $this->request->params['action'];
		
		$this->Session->write('redirect_page', $redirect_page);
		
		$userdata = $this->Auth->user();	
		
		//$user_address_data = $this->User_address->find('all', array('conditions'=>array('User_address.usrid'=>$userdata['id'])));
		
		$this->paginate = array(
					
		 'limit' => 4,
		 'conditions'=>array('User_address.usrid'=>$userdata['id'])
		);		
		
		$user_address_data = $this->paginate('User_address');
		
		$this->set('user_address_data', $user_address_data);
		
		$orders = $this->Order_master->find('all', array('conditions'=>array('Order_master.del_status'=>0, 'Order_master.usrid'=>$userdata['id']), 'order' => array(
                'id' => 'DESC'
        )));
		
		foreach($orders as $key=>$order)
		{
			$payment_data = $this->Payment_master->find('first');
			$orders[$key]['Order_master']['payment'] = $payment_data['Payment_master']['name'];
			
			$shipping_data = $this->Shipping_master->find('first');
			$orders[$key]['Order_master']['shipping'] = $shipping_data['Shipping_master']['name'];
			
			$order_details = $this->Order_detail->find('all', array('conditions'=>array('Order_detail.orderid'=>$order['Order_master']['id'])));
			
			$orders[$key]['Order_detail'] = $order_details;			
		}
		
		$user_address_data = $this->User_address->find('all', array('conditions'=>array('User_address.usrid'=>$userdata['id'])));
		
		$userdata['Addresses'] = $user_address_data;
		
		$userdata['orders'] = $orders;
		
		$this->set('userdata', $userdata);
		
		if($this->request->is('post')) {
			
			$data = $this->User->find('first', array('conditions'=>array('User.id'=> $userdata['id'])));
			
			$password = $data['User']['password'];
			
			$myPassword = $this->request->data['User']['password'];
			
			$confirm_password = $this->request->data['User']['confirm_password'];
			
			$new_password = $this->request->data['User']['new_password'];
			
			$hashedPassword = Security::hash($myPassword, null, true); //Password Hashing/Encryption
			
			if($password != $hashedPassword)
			{
				$show_div = 0;
				$this->Session->setFlash(__('please enter the correct present password... '));
			}
			elseif($confirm_password == $new_password)
			{
				$show_div = 0;
				$this->Session->setFlash(__('Sorry, Your password doesnt matched... '));
			}
			else
			{
				$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
				$this->request->data['User']['id'] = $userdata['id'];
				
				$this->User->set($this->request->data);
				if ($this->User->validates()) {
					
					$this->User->save($this->request->data);
					
					$this->redirect('myaccount');
				}
			}
		}		
	}
	
	//This is the wishlist management.
	public function wishlist_mgt() 
	{
		$quantity_data = $_REQUEST['quantity_data'];
		$product_id = $_REQUEST['product_id'];
		
		$cart_data = $this->Session->read('cart_data');
		
		foreach($cart_data as $key_product=>$cart)
		{
			if($product_id == $key_product)
			{
				$i=1;
				$count_cart = count($cart)-1;
				foreach($cart as $key_cart=>$cart_first)
				{
					if($key_cart != 'Quantity')
					{
						if($i==1)
						{
							if($i == $count_cart)
								$mayur_cart = $cart_first['attvid'];
							else
								$mayur_cart = $cart_first['attvid'].',';
						}
						else
						{
							if($i == $count_cart)
								$mayur_cart = $cart_first['attvid'];
							else
								$mayur_cart = $cart_first['attvid'].',';
						}
						
						if($i==1)
							$shashi_cart = $mayur_cart;
						else
							$shashi_cart = $shashi_cart.$mayur_cart;					
						
						$i++;										
					}	
				}
			}			
		}
		
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
			$wishlist_data_detail['Wishlist_detail']['prodqty'] = $quantity_data;			
			$wishlist_data_detail['Wishlist_detail']['pattvid'] = $shashi_cart;			
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
	
	//This is the review management.
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
	
	//This is the my wishlist functionality
	public function my_wishlist() 
	{
		$userdata = $this->Auth->user();	
				
		$wishlist_all = $this->Wishlist_master->find('all', array('conditions'=>array('Wishlist_master.del_status'=>0, 'Wishlist_master.usrid'=>$userdata['id']), 'order'=>array(
                'id' => 'DESC'
			)));
		
		foreach($wishlist_all as $key=>$wishlist)
		{	
			//$wishlist['Wishlist_master']['id']
			$wishlist_details = $this->Wishlist_detail->find('first', array('conditions'=>array('Wishlist_detail.master_id'=>$wishlist['Wishlist_master']['id'])));
			
			if(isset($wishlist_details['Wishlist_detail']))
			$data_att = explode(',', $wishlist_details['Wishlist_detail']['pattvid']);
			
			foreach($data_att as $att)
			{
				$attvid_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id' => $att)));
			
				if(isset($attvid_data['Attribute_value']))
				$attid_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id' => $attvid_data['Attribute_value']['attid'])));
			
				if(isset($attvid_data['Attribute_value']))
				$wishlist_all[$key]['Wishlist_master']['att'][$attid_data['Attribute_master']['attname']] = $attvid_data['Attribute_value']['attvalue'];
				
				unset($attvid_data);
			}
			
			if(!empty($wishlist_details))
			{
				if(isset($wishlist_details['Wishlist_detail']))
				$cart_product = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.product_id'=>$wishlist_details['Wishlist_detail']['prodid'], 'Cart_master.user_id'=>$userdata['id'])));
				
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
						else
							$product_master['Produc_master']['add_to_cart'] = 0;								
						
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
				
				unset($wishlist_details);
			}						
		}
		
		$i=1;
		foreach($wishlist_all as $key=>$product)
		{
			if(isset($product['Wishlist_detail']['prod_details']))
			$offer_master_cat_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Wishlist_detail']['prod_details']['catid'] .'\',Offer_master.offercat)')));
			
			if(!empty($offer_master_cat_data))
			{
				foreach($offer_master_cat_data as $lowest_price_cat)
				{
					$low_cat[] = $lowest_price_cat['Offer_master']['discount'];
				}
				
				$max_discount_cat = max($low_cat);
				
				unset($low_cat);				
			}
			
			if(isset($product['Wishlist_detail']['prod_details']))
			$offer_master_data = $this->Offer_master->find('all', array('conditions'=>array('FIND_IN_SET(\''. $product['Wishlist_detail']['prod_details']['id'] .'\',Offer_master.offerprod)')));
			
			if(!empty($offer_master_data))
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
			else
				$final_max_discount = 0;
			
			unset($max_discount_cat);	 
			unset($max_discount);
						
			$wishlist_all[$key]['Wishlist_detail']['prod_details']['discount'] = $final_max_discount; 		
			
			if(isset($product['Wishlist_detail']['prod_details']))
			$discounted_price = ($product['Wishlist_detail']['prod_details']['prodprice']-(($final_max_discount/100)*$product['Wishlist_detail']['prod_details']['prodprice']));
			
			$wishlist_all[$key]['Wishlist_detail']['prod_details']['discounted_price'] = $discounted_price; 		
				
			unset($final_max_discount);
			$i++;
		}
		
		foreach($wishlist_all as $key_wish=>$all)
		{
			
			$pvid_data = explode(',', $all['Wishlist_detail']['pattvid']);
			
			foreach($pvid_data as $data_attv)
			{
				$attvid_txt_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$data_attv)));
					
				$prod_att_data = $this->Produc_attribute->find('first', array('conditions'=>array('Produc_attribute.attvid'=>$attvid_txt_data['Attribute_value']['id'], 'Produc_attribute.prodid'=>$all['Wishlist_detail']['prodid'])));
				
				if(!empty($prod_att_data['Produc_attribute']['add_cost']))
				{
					$cost_change = $prod_att_data['Produc_attribute']['add_cost'];
					$all['Wishlist_detail']['prod_details']['discounted_price'] = ($all['Wishlist_detail']['prod_details']['discounted_price'] + $cost_change);
				}
				else
				{
					$cost_change = $prod_att_data['Produc_attribute']['less_cost'];
					$all['Wishlist_detail']['prod_details']['discounted_price'] = ($all['Wishlist_detail']['prod_details']['discounted_price'] - $cost_change);
				}
			}
			
			if(!empty($all['Wishlist_detail']['prodqty']))
				$all['Wishlist_detail']['prod_details']['discounted_price'] = ($all['Wishlist_detail']['prod_details']['discounted_price'] * $all['Wishlist_detail']['prodqty']);
			
			$one[] = $all;
		}
		//$wishlist_all[$key_wish]
		
		unset($wishlist_all);
		
		if(isset($one))
		{
			$wishlist_all = $one;
			$this->set('wishlist', $wishlist_all);			
		}
			
		
		
	}
	
	//This is the coupon management.
	public function coupon_mgt() 
	{
		if(isset($_REQUEST['discounted_price']) && isset($_REQUEST['quantity_data']))
			$final_price = ($_REQUEST['discounted_price'] * $_REQUEST['quantity_data']);
		else			
			$final_price = $_REQUEST['total_price'];
		
		if($this->Auth->user())
		{
			$userdata = $this->Auth->user();			
			$coupon_details['Coupon_detail']['usrid'] = $userdata['id'];
			
			/*
			if(isset($_REQUEST['total_price']))
				$prodprice = $_REQUEST['total_price'];
			else
			{
				$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$_REQUEST['product_id'])));
				$prodprice = $product_data['Produc_master']['prodprice'];
			}
			*/
			
			$prodprice = $final_price;
			
			$coupon_data = $this->Coupon_master->find('first', array('conditions'=>array('Coupon_master.coupon_number'=>$_REQUEST['coupon_txt'])));
			
			if(!empty($coupon_data))
			{
				$coupon_details['Coupon_detail']['coupon_id'] = $coupon_data['Coupon_master']['id'];
			
				$count_coupon_details = $this->Coupon_detail->find('count', array('conditions'=>array('Coupon_detail.usrid'=>$userdata['id'], 'Coupon_detail.coupon_id'=>$coupon_data['Coupon_master']['id'])));
				
				if($count_coupon_details>0)
				{
					echo 0;
					die();
				}
				else
				{
					$this->Coupon_detail->save($coupon_details);
					
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
				}			
			}
			else
				echo 0;
		}
		else
		{
			echo "Please Logged in first";			
			die();
		}
		
		die();				
	}
	
	//This is the functionality which was occure at the time of choosing attributes for product.
	public function att_cart() 
	{
		//$this->Session->delete('cart_data');
		//die();
		
		$data = explode('_', $_REQUEST['val']);
		
		$key = $_REQUEST['key'];
		
		$attvid = $data[0];		
		
		$prodid = $data[1];		
		
		$cart_data['attvid'] = $attvid;
		$cart_data['prodid'] = $prodid;
		$cart_data['key'] = $key;
		
		if($this->Session->check('cart_data') == 1)
		{			
			if($_REQUEST['checked'] == 1)
			{
				$cart_data_new = $this->Session->read('cart_data');
				
				$keys = array_keys($cart_data_new);
				
				if(in_array($prodid, $keys))
				{
					$prodid_keys = array_keys($cart_data_new[$prodid]);
					
					if(in_array($key, $prodid_keys))
					{
						$cart_data_new[$prodid][$key] = $cart_data;						
						
						$this->Session->write('cart_data', $cart_data_new);
					}
					else
					{
						$cart_data_first = $cart_data_new[$prodid];
						
						$cart_data_first_key[$key] = $cart_data;
						
						$prodone_key = $cart_data_first_key + $cart_data_first;
						
						$cart_data_new[$prodid] = $prodone_key;
						
						$this->Session->write('cart_data', $cart_data_new);
					}
				}
				else
				{
					$cart_data_first_product = $this->Session->read('cart_data');
					
					$new_product[$key] = $cart_data;
					
					$new_one[$prodid] = $new_product;
					
					$another_key = $cart_data_first_product + $new_one;
					
					$this->Session->write('cart_data', $another_key);
				}									
			}
			else
			{
				$cart_data_new = $this->Session->read('cart_data');
				
				$keys = array_keys($cart_data_new);
				
				if(in_array($prodid, $keys))
					unset($cart_data_new[$prodid][$key]);
				
				if(empty($cart_data_new[$prodid]))
					unset($cart_data_new[$prodid]);
				
				$this->Session->write('cart_data', $cart_data_new);
			}						
		}
		else
		{
			if($_REQUEST['checked'] == 1)
			{
				$cart_one[$prodid][$key] = $cart_data;
				$this->Session->write('cart_data', $cart_one);
			}			
		}
		
		$cart_data = $this->Session->read('cart_data');
		
		foreach($cart_data as $key_one=>$cart_one)
		{
			foreach($cart_one as $key_two=>$cart_two)
			{
				$key_data[] = $key_two;
			}
			
			if(in_array('Quantity', $key_data))
			{
			}
			else
			{
				$count_key_data = count($key_data);
				
				$count_key_data = $count_key_data + 1;
				
				unset($data);
				
				$data['Quantity'] = 1;
				
				$cart_data[$key_one] = $data;
			}			
		}
		
		$this->Session->write('cart_data', $cart_data);
		
		/*
		$cart_data = $this->Session->read('cart_data');
		
		echo "cart_data<pre>";
		print_r($cart_data);
		echo "<pre>";
		
		die();
		*/
		
		if($this->Auth->user())
		{
			$userdata = $this->Auth->user();
		}
		else
		{
			
		}
	}
	
	//This is the address edit functionality.
	public function address_edit($id) 
	{
		//$address_data = $this->User_address->find('first', array('conditions'=>array('User_address.id'=>$id)));
		//$this->set('address_data', $address_data);
		
		if($this->request->data)
		{
			$this->User_address->set($this->request->data);
			if ($this->User_address->validates()) 
			{
				$userdata = $this->Auth->user();
				
				$user_addresses = $this->User_address->find('list', array('conditions'=>array('User_address.usrid'=>$userdata['id'])));
				
				foreach($user_addresses as $add)
				{
					$add_data['User_address']['ismain'] = 0;
					$add_data['User_address']['id'] = $add;
					
					$this->User_address->create();
					$this->User_address->save($add_data);
				}
				
				$this->request->data['User_address']['usrid'] = $userdata['id'];
				
				$this->User_address->set($this->request->data);
				if ($this->User_address->validates()) {
					
					$this->User_address->save($this->request->data);
				} 
				/*
				else 
				{
					$errors = $this->User_address->validationErrors;
					// handle errors
					
					echo "errors<pre>";
					print_r($errors);
					echo "<pre>";
					
					die();
				}
				die();
				*/
				
				$this->redirect('myaccount');
			}
		}
		/*
		else
		$this->request->data = $this->User_address->findById($id);
		*/
		
		$user_add_data = $this->User_address->find('first', array('conditions'=>array('User_address.id'=>$id)));
		
		$this->set('user_add_data', $user_add_data['User_address']);
	}
	
	//This is the address change status functionality
	public function address_status_change($id) 
	{
		$address_data = $this->User_address->find('first', array('conditions'=>array('User_address.id'=>$id)));
		
		if($address_data['User_address']['del_status'] == 0)
			$address_data['User_address']['del_status'] = 1;
		else
			$address_data['User_address']['del_status'] = 0;
		
		$this->User_address->save($address_data);
			
		$this->redirect('myaccount');
	}
	
	//This is the our strory functionality
	public function our_story() 
	{
		
	}
	
	//This is the friendly policies functionality
	public function friendly_policies() 
	{
		
	}
	
	//This is the legal functionality
	public function legal() 
	{
		
	}
	
	//This is the color disclaimer functionality
	public function color_disclaimer() 
	{
		
	}
	
	//This is the faq functionality
	public function faq() 
	{
		
	}
	
	//This is the privacy_policy functionality
	public function privacy_policy() 
	{
		
	}
	
	//This is the ourterms and conditions functionality
	public function terms_and_conditions() 
	{
		
	}
	
	//This is the catalog download functionality
	public function catalog_download() 
	{
		
	}
	
	//This is the catalog request functionality
	public function catalog_request() 
	{
		
	}
	
	//This is the hollowaysportswear functionality	
	public function hollowaysportswear() 
	{
		
	}
	
	//This is the productvideos functionality
	public function productvideos() 
	{
		
	}
	
	//This is the our strory functionality
	public function instructional_videos() 
	{
		
	}
	
	//This is the prebuilt personalized flyers functionality
	public function prebuilt_personalized_flyers() 
	{
		
	}
	
	//This is the web links functionality
	public function web_links() 
	{
		
	}
	
	//This is the sizing fit guide functionality
	public function sizing_fit_guide() 
	{
		
	}
	
	//This is the decoration techniques functionality
	public function decoration_techniques() 
	{
		
	}
	
	//This is the our strory functionality
	public function stock_decoration_library() 
	{
		
	}
	
	//This is the uniform decoration guides functionality
	public function uniform_decoration_guides() 
	{
		
	}
	
	//This is the our knowledge center functionality
	public function knowledge_center() 
	{
		
	}
	
	//This is the about us functionality
	public function about_us() 
	{
		
	}
}
?>