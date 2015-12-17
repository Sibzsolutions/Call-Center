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
class OnlyhumanController extends AppController {
	
	/*
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('usremail' => 'usremail')
            )
        )
    ),'RequestHandler','Paginator', 'Session'); 
	*/
	
	public $uses = array('User', 'Site_setting', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image', 'Offer_master', 'Attribute_master', 'Attribute_category', 'Attribute_value', 'Produc_attribute');
	
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
		 $this->Auth->authenticate = array('Form' => array('scope'=>array('User.usrtype'=>array('1'))));
		 $this->Auth->loginAction=array('controller' => 'Admin','action' => 'login');
		 $this->Auth->logoutRedirect=array('controller' => 'Admin','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Admin','action'=>'index');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login', 'index', 'product_details');  
		 
		 $this->layout="only_human_layout";   
		 
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
	  
	 public function product_details($id) {
		  
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

	  
}
?>