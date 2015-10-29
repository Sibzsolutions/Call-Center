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
	
	public $uses = array('User', 'Site_setting', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image', 'Offer_master', 'Attribute_master', 'Attribute_category', 'Attribute_value', 'Produc_attribute', 'Cart_master', 'Slider_image');
	
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
		 $this->Auth->loginAction=array('controller' => 'Buyshops','action' => 'login');
		 $this->Auth->logoutRedirect=array('controller' => 'Buyshops','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Buyshops','action'=>'index');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login', 'index', 'product_details', 'products', 'single', 'add_to_cart', 'checkout', 'remove_from_cart');  
		 
		 $this->layout="buyshops_layout";   
		 
		 $userdata = $this->Auth->user();
		
		 $this->set('user_data',$userdata);
		 
		 //For meta title, key and descriptions
		 $site_setting = $this->Site_setting->find('first');
		 $this->set('site_setting',$site_setting);
		 
		 if(isset($this->request->params['action']))
		 {
			 $data_page = $this->request->params['action'];
		 	
			 $dynamic_page_data = $this->Dynamic_page->find('first',array(		
				'conditions'=>array('Dynamic_page.name'=>$data_page)
			 ));
		 }
		 
		 if(isset($dynamic_page_data))	
		 $this->set('dynamic_page_data',$dynamic_page_data);
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
	
	  public function index() {
		
		$this->layout='';
		
		$slider_images = $this->Slider_image->find('all', array('conditions'=>array('Slider_image.del_status'=>0)));
		
		$this->set(compact('slider_images'));
		
		$products = $this->Produc_master->find('all');
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.id'=>$product['id'])));
			
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
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.id'=>$product['id'])));
			
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
	
	public function products() {
	
		$products = $this->Produc_master->find('all');
		
		foreach($products as $key=>$product)
		{
			$product = $product['Produc_master'];
			
			$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.id'=>$product['id'])));
			
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
		
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
			
			$this->set('count_add_to_cart', $count_add_to_cart);
		}
	}
	
	public function product_details($id) {
	
		$product = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
				
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'],'Cart_master.product_id'=>$product['Produc_master']['id'], 'Cart_master.del_status'=>0)));
		
			$this->set('count_add_to_cart', $count_add_to_cart);
		}
		$product_image = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$product['Produc_master']['id'])));
		
		if(isset($product_image))
		$product['Produc_master']['images'] = $product_image;
		
		$this->set('product', $product['Produc_master']);				
	}
	 	 
	public function add_to_cart() { 
		
		$product_data = $_REQUEST;
		
		if($this->Auth->user())
		{
			$user_data = $this->Auth->user();
			
			$add_to_cart['Cart_master']['user_id'] = $user_data['id'];
			
			$add_to_cart['Cart_master']['product_id'] = $product_data['product_id'];
			
			$this->Cart_master->save($add_to_cart);		
			
			$count_add_to_cart = $this->Cart_master->find('count', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
			$this->set('count_add_to_cart', $count_add_to_cart);		
			
			if(isset($count_add_to_cart))
			{
				$this->Session->write('count_add_to_cart', $count_add_to_cart);
			}			
		}
		
		$data[$product_data['product_id']] = $product_data['product_id'];
		
		if($this->Session->check('add_cart_session') == 1)
		{
			$add_cart_session = $this->Session->read('add_cart_session');			
			
			$data_first = $add_cart_session + $data;
			
			$this->Session->write('add_cart_session', $data_first);
		}
		else
		{
			$this->Session->write('add_cart_session', $data);
		}
		
		$add_cart_session_pr = $this->Session->read('add_cart_session');			
		
		
		if(isset($add_cart_session_pr))
		{
			$count_add_cart_session = count($add_cart_session_pr);
			
			$this->Session->write('count_add_cart_session', $count_add_cart_session);
		}
		
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
			 $this->redirect('index');			 
		}
	}
	
	public function logout() 
	{
		return $this->redirect($this->Auth->logout());
	}
	
	public function checkout() {
	
		if($this->Auth->user())
		$user_data = $this->Auth->user();
		
		$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
		foreach($all_products as $product)
		{
			$product = $product['Cart_master'];
			
			$product_id[] = $product['product_id'];
		}
		
		if(isset($product_id))
		{
			$product_checkout = array();
			
			$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.id'=>$product_id)));
			
			foreach($products as $product)
			$products_checkout[] = $product['Produc_master'];
			
			foreach($products_checkout as $key=>$product)
			{
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.id'=>$product['id'])));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products_checkout[$key]['images']['Default'] = $image;
					else
					$products_checkout[$key]['images']['all'] = $image;				
				}
			}
			
			$this->set('products_checkout', $products_checkout);		
		}
	}
	
	public function remove_from_cart() { 
	
		$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.product_id'=>$_REQUEST['product_id'])));
		
		foreach($all_products as $prods)
		{
			$prods = $prods['Cart_master'];
			
			$rmv_cart['Cart_master']['id'] = $prods['id'];
			$rmv_cart['Cart_master']['del_status'] = 1;
			
			$this->Cart_master->create();
			$this->Cart_master->save($rmv_cart);
		}
		
		if($this->Auth->user())
		$user_data = $this->Auth->user();
		
		$all_products = $this->Cart_master->find('all', array('conditions'=>array('Cart_master.user_id'=>$user_data['id'], 'Cart_master.del_status'=>0)));
		
		foreach($all_products as $product)
		{
			$product = $product['Cart_master'];
			
			$product_id[] = $product['product_id'];
		}
		
		if(isset($product_id))
		{
			$product_checkout = array();
			
			$products = $this->Produc_master->find('all', array('conditions'=>array('Produc_master.id'=>$product_id)));
			
			foreach($products as $product)
			$products_checkout[] = $product['Produc_master'];
			
			foreach($products_checkout as $key=>$product)
			{
				$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.id'=>$product['id'])));
				
				foreach($product_images as $image)
				{
					$image = $image['Produc_image'];		
					
					if($image['isdefault']==1)
					$products_checkout[$key]['images']['Default'] = $image;
					else
					$products_checkout[$key]['images']['all'] = $image;				
				}
			}
			
			$this->set('products_checkout', $products_checkout);				
		}
	}	
	
}
?>