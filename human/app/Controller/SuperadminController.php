<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Static content controller. Test
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

//App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class SuperadminController extends AppController {

	

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User', 'Site_setting', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image', 'Offer_master', 'Attribute_master', 'Attribute_category', 'Attribute_value', 'Produc_attribute', 'Slider_image');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	
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
		 AuthComponent::$sessionKey='superadmin';
		 $this->Auth->fields = array('username' => 'username','password' => 'password');
		 $this->Auth->authenticate = array('Form' => array('scope'=>array('User.usrtype'=>array('2'))));
		 $this->Auth->loginAction=array('controller' => 'Superadmin','action' => 'login');
		 $this->Auth->logoutRedirect=array('controller' => 'Superadmin','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Superadmin','action'=>'index');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login');  
		 
		 $this->layout="Superadministrator_layout";   
		 
		 
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
	
	function register() 
	{
		$this->layout='';
		
		if($this->request->data)
		{
			$this->request->data['User']['usrtype'] = 2;
			
			$this->request->data['User']['last_login'] = date('Y-m-d H:i:s',time());
			
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash('Successfully registered');
				$this->redirect('login');
			}
		}
	}
		
	public function login() {
		
		$this->layout='';
		
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
	public function index() {
		
		$this->layout="superadministrator_layout";
	}	
	
	public function site_setting() 
	{
		$site_setting = $this->Site_setting->find('first');
		$this->set('site_setting',$site_setting);
		
		if ($this->request->is('post')) {
			
			$this->Site_setting->save($this->request->data);
			
			$this->redirect('site_setting');
		}
	}
	
	public function users() 
	{
		$users_data = $this->User->find('all', array('order' => array('id' => 'DESC')));
				
		$this->set('users_data', $users_data);
	}
	
	public function user_edit($id) 
	{
		$user_data = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
				
		$this->set('edit_user_data', $user_data['User']);
		
		if ($this->request->is('post')) {
			
			if($this->User->save($this->request->data))
			{
				$this->redirect('users');
			}
		}
	}
	
	public function user_status_change($id) 
	{
		$user_data = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
		
		if($user_data['User']['del_status'] == 1)
		$user_data['User']['del_status'] = 0;
		else
		$user_data['User']['del_status'] = 1;
		
		if($this->User->save($user_data))
		$this->redirect('users');		
	}

	public function add_user() 
	{
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			if($this->User->save($this->request->data))
			$this->redirect('users');
		}
	}
	
	public function dynamic_pages() 
	{
		$dynamic_pages_data = $this->Dynamic_page->find('all', array('order' => array('id' => 'DESC')));
		
		$this->set('dynamic_pages_data', $dynamic_pages_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->User->save($this->request->data);
			$this->redirect('users');
		}
	}
	
	public function add_dynamic_page() 
	{
		if ($this->request->is('post')) {
			
			$this->request->data['Dynamic_page']['page_content'] = $this->request->data['editor1'];
			
			if($this->Dynamic_page->save($this->request->data))
			$this->redirect('dynamic_pages');	
		}
	}
	
	public function dynamic_page_edit($id) 
	{
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		$this->set('dynamic_page_data', $dynamic_page_data['Dynamic_page']);
				
		if ($this->request->is('post')) {
			
			$this->request->data['Dynamic_page']['page_content'] = $this->request->data['editor1'];
			
			if($this->Dynamic_page->save($this->request->data))
			$this->redirect('dynamic_pages');	
		}
	}
	
	public function dynamic_page_delete($id) 
	{
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		$dynamic_page_data['Dynamic_page']['status'] = 0;
		
		if($this->Dynamic_page->save($dynamic_page_data))
		$this->redirect('dynamic_pages');	
	}
	
	public function dynamic_page_status_change($id) 
	{
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		if($dynamic_page_data['Dynamic_page']['status']==1)
		$dynamic_page_data['Dynamic_page']['status'] = 0;
		else
		$dynamic_page_data['Dynamic_page']['status'] = 1;
		
		if($this->Dynamic_page->save($dynamic_page_data))
		$this->redirect('dynamic_pages');			
	}
	
	public function categories() 
	{
		$categories_data = $this->Category->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($categories_data as $key=>$data)
		{
			$categories_first = $this->Category->find('first', array('conditions' => array('Category.id' => $data['Category']['parentid'])));
			
			if(isset($categories_first['Category']['catname']))
			$categories_data[$key]['Category']['parent_name'] = $categories_first['Category']['catname'];
			else
			$categories_data[$key]['Category']['parent_name'] = "N/A";
		}
		
		$this->set('categories_data', $categories_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->User->save($this->request->data);
			$this->redirect('users');
		}
	}
	
	function product_tree($catid, $selected_id){
		
		$products_data = $this->Produc_master->find('all', array('order'=>array('id'=>'desc')));
		
		foreach($products_data as $product)
		echo '<option value="'.$product['Produc_master']['id'].'">'.$product['Produc_master']['prodname'].'</option>';
	}
	
	function attribute_tree($catid, $selected_id){
		
		$attributes_data = $this->Attribute_master->find('all', array('order'=>array('id'=>'desc')));
				
		foreach($attributes_data as $attribute)
		{
			if($selected_id == $attribute['Attribute_master']['id'])
			echo '<option selected="selected" value="'.$attribute['Attribute_master']['id'].'">'.$attribute['Attribute_master']['attname'].'</option>';	
			else
			echo '<option value="'.$attribute['Attribute_master']['id'].'">'.$attribute['Attribute_master']['attname'].'</option>';
		}
	}

	function category_tree($catid, $selected_id){
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$catid)));
		
		foreach($category_data as $data)
		{
			 $data = $data['Category'];
			 if(isset($selected_id))
			 {
				 if($selected_id == $data['id'])
				 echo '<option selected="selected" value="'.$data['id'].'">'.$data['catname'].'</option>';
				 else
				 echo '<option value="'.$data['id'].'">'.$data['catname'].'</option>';
			 }
			 else
			 echo '<option value="'.$data['id'].'">'.$data['catname'].'</option>';
			 
			 $this->category_tree($data['id'], $selected_id);
		}
	}

	public function add_category() 
	{
		$attribute_data = $this->Attribute_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($attribute_data as $data)
		{
			 $att_data[$data['Attribute_master']['id']] = $data['Attribute_master']['attname'];
		}
		
		if(isset($att_data))
		$this->set('att_data', $att_data);
		
		if ($this->request->is('post')) {
			
			$name = $this->request->data['Category']['catimg']['name'];
			$tmp_name = $this->request->data['Category']['catimg']['tmp_name'];
			$type = $this->request->data['Category']['catimg']['type'];
			$type_data = explode('/', $type);
			$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
			if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
			{
				//Uploadation code for images
				if(move_uploaded_file($tmp_name, WWW_ROOT . 'img/category/'.$name))
				{ 
					$url="../webroot/img/category/".$name;
					$thumbnail_url="../webroot/img/category/thumb/small_images/".$name;							
					$this->make_thumb($url,$thumbnail_url,200);
					
					$url="../webroot/img/category/".$name;
					$thumbnail_url="../webroot/img/category/thumb/large_images/".$name;							
					$this->make_thumb($url,$thumbnail_url,1500);
				}
				else
				{
					$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
					$this->redirect('add_category');	
				}
			}
			else
			{
				$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
				$this->redirect('add_category');	
			}
			
			$this->request->data['Category']['catimg'] = $this->request->data['Category']['catimg']['name'];
			
			$this->request->data['Category']['parent_id'] = 0;
			
			if($this->Category->save($this->request->data))
			
			if($this->request->data['Category']['att'] !='')
			{
				$cat_id = $this->Category->getLastInsertId();
				
				foreach($this->request->data['Category']['att'] as $data)
				{
					$att_cat['attid'] = $data;
					$att_cat['catid'] = $cat_id;
					$att_cat['del_status'] = 0;
					
					$this->Attribute_category->create();
					$this->Attribute_category->save($att_cat);
				}
			}
			
			$this->redirect('categories');	
		}
	}
	
	//Make Thumb function of the uploaded images
	function make_thumb($src, $dest, $desired_width) {
                        
		if(substr(strtolower(strrchr($src, '.')), 1) == 'png')
		$source_image = imagecreatefrompng($src);
		
		else
		$source_image = imagecreatefromjpeg($src);
		
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		
		$desired_height = floor($height * ($desired_width / $width));	//Height calculations
		//$desired_width = floor($width * ($desired_height / $height));	//Width calculations
		
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
		
		imagecopyresized($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		imagejpeg($virtual_image, $dest);
    }
	
	public function category_edit($id) 
	{
		$attribute_data = $this->Attribute_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($attribute_data as $data)
		{
			 $att_data[$data['Attribute_master']['id']] = $data['Attribute_master']['attname'];
		}
		
		if(isset($att_data))
		$this->set('att_data', $att_data);
		
		$category_data = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id)));
		
		$attribute_data_cat = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $category_data['Category']['id'])));
		
		foreach($attribute_data_cat as $cat)
		{
			$cat_id['attid'][] = $cat['Attribute_category']['attid'];
		}
		
		if(isset($cat_id))
		$this->set('cat_id', $cat_id);
		
		$this->set('category_data', $category_data['Category']);
				
		if ($this->request->is('post')) {
			
			if($this->request->data['Category']['catimg']['name'] != '')
			{
				$name = $this->request->data['Category']['catimg']['name'];
				$tmp_name = $this->request->data['Category']['catimg']['tmp_name'];
				$type = $this->request->data['Category']['catimg']['type'];
				$type_data = explode('/', $type);
				$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
				if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
				{
					//Uploadation code for images
					if(move_uploaded_file($tmp_name, WWW_ROOT . 'img/category/'.$name))
					{ 
						$url="../webroot/img/category/".$name;
						$thumbnail_url="../webroot/img/category/thumb/small_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,200);
						
						$url="../webroot/img/category/".$name;
						$thumbnail_url="../webroot/img/category/thumb/large_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,1500);
					}
					else
					{
						$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
						$this->redirect('add_category');	
					}
				}
				else
				{
					$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
					$this->redirect('add_category');	
				}
				
				$this->request->data['Category']['catimg'] = $this->request->data['Category']['catimg']['name'];
			}
			else
			unset($this->request->data['Category']['catimg']);
			
			$this->Category->save($this->request->data);
			
			if(isset($this->request->data['Category']['att']) !='')
			{
				$cat_id = $this->request->data['Category']['id'];
				
				$this->Attribute_category->deleteAll(array('Attribute_category.catid' => $cat_id));
				
				foreach($this->request->data['Category']['att'] as $data)
				{
					$att_cat['attid'] = $data;
					$att_cat['catid'] = $cat_id;
					$att_cat['del_status'] = 0;
					
					$this->Attribute_category->create();
					$this->Attribute_category->save($att_cat);
				}
			}
			
			$this->redirect('categories');	
		}
	}
	
	public function category_status_change($id) 
	{
		$category_data = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id)));
		
		if($category_data['Category']['del_status']==1)
		$category_data['Category']['del_status'] = 0;
		else
		$category_data['Category']['del_status'] = 1;
		
		if($this->Category->save($category_data))
		$this->redirect('categories');			
	}
	
	public function sub_category() 
	{		
		$id = $_REQUEST['main_category_id'];
			
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$id)));
		
		foreach($category_data as $data)
		{
			$category = $data['Category'];
			
			$sub_cat_data[$category['id']] = $category['catname'];
		}
		
		$this->set('sub_cat_data', $sub_cat_data);
	}
	
	//This is the skip functionality
	public function add_sub_category() 
	{
		$main_categories = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>0)));
		
		foreach($main_categories as $data)
		{
			$category = $data['Category'];
			
			$main_cat_data[$category['id']] = $category['catname'];
		}
		
		$this->set('main_cat_data', $main_cat_data);
		
		if ($this->request->is('post')) {
			
			$name = $this->request->data['Category']['catimg']['name'];
			$tmp_name = $this->request->data['Category']['catimg']['tmp_name'];
			$type = $this->request->data['Category']['catimg']['type'];
			$type_data = explode('/', $type);
			$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
			if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
			{
				//Uploadation code for images
				if(move_uploaded_file($tmp_name, WWW_ROOT . 'img/category/'.$name))
				{ 
					$url="../webroot/img/category/".$name;
					$thumbnail_url="../webroot/img/category/thumb/small_images/".$name;							
					$this->make_thumb($url,$thumbnail_url,200);
					
					$url="../webroot/img/category/".$name;
					$thumbnail_url="../webroot/img/category/thumb/large_images/".$name;							
					$this->make_thumb($url,$thumbnail_url,1500);
				}
				else
				{
					$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
					$this->redirect('add_category');	
				}
			}
			else
			{
				$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
				$this->redirect('add_category');	
			}
			
			$this->request->data['Category']['catimg'] = $this->request->data['Category']['catimg']['name'];
			
			$this->request->data['Category']['parent_id'] = 0;
			
			if($this->Category->save($this->request->data))
			$this->redirect('categories');	
		}
	}
		
	public function products() 
	{
		$products_data = $this->Produc_master->find('all', array('order' => array('id' => 'DESC')));
		
		$this->set('products_data', $products_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['Product']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->Product->save($this->request->data);
			$this->redirect('products');
		}
	}
	
	/*
	public function product_attribute_change()//$id 
	{
		$cat_attribute_data = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $_REQUEST['cat_id'])));
		
		if($cat_attribute_data != '')
		{
			foreach($cat_attribute_data as $cat)
			$attid[] = $cat['Attribute_category']['attid'];
			
			if(isset($attid))
			{
				$attributes_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $attid)));
				
				foreach($attributes_data as $master_data)
				$master_attid[] = $master_data['Attribute_master']['id'];
				
				$attribute_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $master_attid)));
				
				foreach($attribute_data as $key=>$data)
				{
					$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
					
					$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
				}
				
				echo "Attribute_data<pre>";
				print_r($attribute_data);
				echo "<pre>";

				die();
				
				$this->set('attribute_data', $attribute_data);		
			}
		}
	}
	
	public function product_attribute_change_edit()
	{
		$product_id = $_REQUEST['product_id'];
		
		$cat_id = $_REQUEST['cat_id'];
		
		$product_attribute = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid'=>$product_id)));
		
		foreach($product_attribute as $attribute)
		{
			$product['id'] = $attribute['Produc_attribute']['attvid'];
			$product['add_cost'] = $attribute['Produc_attribute']['add_cost'];
			$product['less_cost'] = $attribute['Produc_attribute']['less_cost'];			
			$product['del_status'] = $attribute['Produc_attribute']['del_status'];			
			
			$prd_att[] = $product;
		}
		
		$this->set('product_att_data', $prd_att);
		
		$cat_attribute_data = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $cat_id)));
		
		if($cat_attribute_data != '')
		{
			foreach($cat_attribute_data as $cat)
			$attid[] = $cat['Attribute_category']['attid'];
			
			if(isset($attid))
			{
				$attributes_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $attid)));
				
				foreach($attributes_data as $master_data)
				$master_attid[] = $master_data['Attribute_master']['id'];
				
				$attribute_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $master_attid)));
				
				foreach($attribute_data as $key=>$data)
				{
					$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
					
					$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
				}
				
				$this->set('attribute_data', $attribute_data);		
			}
		}
	}
	*/
	
		public function product_attribute_change()//$id 
	{
		$cat_attribute_data = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $_REQUEST['cat_id'])));
		
		if($cat_attribute_data != '')
		{
			foreach($cat_attribute_data as $cat)
			$attid[] = $cat['Attribute_category']['attid'];
			
			if(isset($attid))
			{
				$attributes_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $attid)));
				
				foreach($attributes_data as $master_data)
				$master_attid[] = $master_data['Attribute_master']['id'];
				
				$attribute_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $master_attid)));
				
				foreach($attribute_data as $key=>$data)
				{
					$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
					
					$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
				}
				
				$this->set('attribute_data', $attribute_data);		
			}
		}
	}
	
	public function product_attribute_change_edit()
	{
		$product_id = $_REQUEST['product_id'];
		
		$cat_id = $_REQUEST['cat_id'];
		
		$product_attribute = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid'=>$product_id)));
		
		foreach($product_attribute as $attribute)
		{
			$product['id'] = $attribute['Produc_attribute']['attvid'];
			$product['add_cost'] = $attribute['Produc_attribute']['add_cost'];
			$product['less_cost'] = $attribute['Produc_attribute']['less_cost'];			
			$product['del_status'] = $attribute['Produc_attribute']['del_status'];			
			
			$prd_att[] = $product;
		}
		
		$this->set('product_att_data', $prd_att);
		
		$cat_attribute_data = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $cat_id)));
		
		if($cat_attribute_data != '')
		{
			foreach($cat_attribute_data as $cat)
			$attid[] = $cat['Attribute_category']['attid'];
			
			if(isset($attid))
			{
				$attributes_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $attid)));
				
				foreach($attributes_data as $master_data)
				$master_attid[] = $master_data['Attribute_master']['id'];
				
				$attribute_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $master_attid)));
				
				foreach($attribute_data as $key=>$data)
				{
					$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
					
					$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
				}
				
				$this->set('attribute_data', $attribute_data);		
			}
		}
	}

	public function add_products() 
	{
		$attribute_data = $this->Attribute_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($attribute_data as $key=>$data)
		{
			$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
			
			$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
		}
		
		$this->set('attribute_data', $attribute_data);
		
		if ($this->request->is('post')) {
			
			$this->Produc_master->save($this->request->data);
			
			$last_inserted_id = $this->Produc_master->getLastInsertId();
			
			foreach($this->request->data['Produc_master']['attribute'] as $data_second)
			{
				if(isset($data_second['id']))
				{
					if($data_second['id'] !='')
					{
						$product_att['Produc_attribute']['prodid'] = $last_inserted_id;
						$product_att['Produc_attribute']['attvid'] = $data_second['id'];
						$product_att['Produc_attribute']['add_cost'] = $data_second['add_cost'];
						$product_att['Produc_attribute']['less_cost'] = $data_second['less_cost'];
						$product_att['Produc_attribute']['del_status'] = $data_second['del_status'];
						
						$this->Produc_attribute->create();
						$this->Produc_attribute->save($product_att);
					}
				}
			}
			
			foreach($this->request->data['Produc_master']['catimg'] as $data)
			{
				$name = $data['name'];
				$tmp_name = $data['tmp_name'];
				$type = $data['type'];
				$type_data = explode('/', $type);
				$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
				if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
				{
					
					//Uploadation code for images
					if(move_uploaded_file($tmp_name, WWW_ROOT. 'img/product/'.$name))
					{ 
						$url="../webroot/img/product/".$name;
						$thumbnail_url="../webroot/img/product/thumb/small_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,200);
						
						$url="../webroot/img/product/".$name;
						$thumbnail_url="../webroot/img/product/thumb/large_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,1500);
						
						$product_image_data['Produc_image']['prodid'] = $last_inserted_id;
						$product_image_data['Produc_image']['imagepath'] = $data['name'];
						$product_image_data['Produc_image']['del_status'] = 0;						
						
						$this->Produc_image->create();
						$this->Produc_image->save($product_image_data);					
					}
					else
					{
						$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
						$this->redirect('add_category');	
					}
				}
				else
				{
					$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
					$this->redirect('add_category');	
				}
			}
			$this->redirect('products');	
		}
	}
	
	public function product_edit($id) 
	{
		$this->set('page_id', $id);
		
		$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		$cat_id = $product_data['Produc_master']['catid'];
		
		$product_attribute = $this->Produc_attribute->find('all', array('conditions'=>array('Produc_attribute.prodid'=>$id)));
		
		foreach($product_attribute as $attribute)
		{
			$product['id'] = $attribute['Produc_attribute']['attvid'];
			$product['add_cost'] = $attribute['Produc_attribute']['add_cost'];
			$product['less_cost'] = $attribute['Produc_attribute']['less_cost'];			
			$product['del_status'] = $attribute['Produc_attribute']['del_status'];			
			
			$prd_att[] = $product;
		}
		
		$this->set('product_att_data', $prd_att);
		
		$cat_attribute_data = $this->Attribute_category->find('all', array('conditions' => array('Attribute_category.catid' => $cat_id)));
		
		if($cat_attribute_data != '')
		{
			foreach($cat_attribute_data as $cat)
			$attid[] = $cat['Attribute_category']['attid'];
			
			if(isset($attid))
			{
				$attributes_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $attid)));
				
				foreach($attributes_data as $master_data)
				$master_attid[] = $master_data['Attribute_master']['id'];
				
				$attribute_data = $this->Attribute_master->find('all', array('conditions' => array('Attribute_master.id' => $master_attid)));
				
				foreach($attribute_data as $key=>$data)
				{
					$attribute_value_data = $this->Attribute_value->find('all', array('conditions' => array('Attribute_value.attid' => $data['Attribute_master']['id']), 'order' => array('id' => 'DESC')));
					
					$attribute_data[$key]['Attribute_value'] = $attribute_value_data;
				}
				
				$this->set('attribute_data', $attribute_data);		
			}
		}
		
		$this->set('product_data', $product_data['Produc_master']);
				
		if ($this->request->is('post')) {
			
			$this->Produc_master->save($this->request->data);
			
			$last_inserted_id = $this->request->data['Produc_master']['id'];
			
			$this->Produc_attribute->deleteAll(array('Produc_attribute.prodid' => $last_inserted_id));
			
			foreach($this->request->data['Produc_master']['attribute'] as $data_second)
			{
				if(isset($data_second['id']))
				{
					if($data_second['id'] !='')
					{
						$product_att['Produc_attribute']['prodid'] = $last_inserted_id;
						$product_att['Produc_attribute']['attvid'] = $data_second['id'];
						$product_att['Produc_attribute']['add_cost'] = $data_second['add_cost'];
						$product_att['Produc_attribute']['less_cost'] = $data_second['less_cost'];
						$product_att['Produc_attribute']['del_status'] = $data_second['del_status'];
						
						$this->Produc_attribute->create();
						$this->Produc_attribute->save($product_att);
					}
				}
			}
			
			if($this->request->data['Produc_master']['produc_images'][0]['name'] != '')			
			{
				$this->Produc_image->deleteAll(array('Produc_image.prodid' => $last_inserted_id));
			
				foreach($this->request->data['Produc_master']['produc_images'] as $data)
				{
					$name = $data['name'];
					$tmp_name = $data['tmp_name'];
					$type = $data['type'];
					$type_data = explode('/', $type);
					$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
					if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
					{
						//Uploadation code for images
						if(move_uploaded_file($tmp_name, WWW_ROOT. 'img/product/'.$name))
						{ 
							$url="../webroot/img/product/".$name;
							$thumbnail_url="../webroot/img/product/thumb/small_images/".$name;							
							$this->make_thumb($url,$thumbnail_url,200);
							
							$url="../webroot/img/product/".$name;
							$thumbnail_url="../webroot/img/product/thumb/large_images/".$name;							
							$this->make_thumb($url,$thumbnail_url,1500);
							
							$product_image_data['Produc_image']['prodid'] = $last_inserted_id;
							$product_image_data['Produc_image']['imagepath'] = $data['name'];
							$product_image_data['Produc_image']['del_status'] = 0;						
							
							$this->Produc_image->create();
							$this->Produc_image->save($product_image_data);					
						}
						else
						{
							$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
							$this->redirect('add_product');	
						}
					}
					else
					{
						$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
						$this->redirect('add_product');	
					}
				}
			}
			
			$this->redirect('products');					
		}
	}
	
	public function product_status_change($id) 
	{
		$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		if($product_data['Produc_master']['del_status']==1)
		$product_data['Produc_master']['del_status'] = 0;	
		
		else
		$product_data['Produc_master']['del_status'] = 1;
		
		if($this->Produc_master->save($product_data))
		$this->redirect('products');					
	}
	
	public function saved_imgalt() 
	{
		$data['Produc_image']['id'] = $_REQUEST['image_id'];
		$data['Produc_image']['imgalt'] = $_REQUEST['saved_imgalt_text'];
		
		if($this->Produc_image->save($data))
		echo "Yes";
		else
		echo "No";
		
		die();
	}
	
	public function is_default_image() 
	{
		$data['Produc_image']['id'] = $_REQUEST['image_id'];
		$data['Produc_image']['isdefault'] = $_REQUEST['is_default'];
		
		if($this->Produc_image->save($data))
		echo "Yes";
		else
		echo "No";
		
		die();
	}
	
	public function change_order_image() 
	{
		$data['Produc_image']['id'] = $_REQUEST['image_id'];
		$data['Produc_image']['order'] = $_REQUEST['change_order_number'];
		
		if($this->Produc_image->save($data))
		echo "Yes";
		else
		echo "No";
		
		die();
	}
	
	public function change_status_image() 
	{
		$data['Produc_image']['id'] = $_REQUEST['image_id'];
		$data['Produc_image']['del_status'] = $_REQUEST['type_data'];
		
		if($this->Produc_image->save($data))
		echo "Yes";
		else
		echo "No";
		
		die();
	}
	
	public function product_images($id) 
	{
		$product_images = $this->Produc_image->find('all', array('conditions'=>array('Produc_image.prodid'=>$id), 'order' => array('id' => 'DESC')));
		
		foreach($product_images as $key=>$product)
		{
			$product_data = $product['Produc_image'];
			
			$product_master_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product_data['prodid'])));
			$product_images[$key]['Produc_image']['prodname'] = $product_master_data['Produc_master']['prodname'];
			
		}
		
		$count_data = count($product_images);
		
		for($i=1;$i<=$count_data;$i++)
		$total_order_number[$i] = $i;
		
		$this->set('total_order_number', $total_order_number);
		
		$this->set('product_images', $product_images);
		
		if ($this->request->is('post')) {
			
			$this->request->data['Product']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->Product->save($this->request->data);
			$this->redirect('products');
		}
	}
	
	public function offers() 
	{
		$offers_data = $this->Offer_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($offers_data as $offer_key=>$data)
		{
			$offercat_data = explode(',', $data['Offer_master']['offercat']);
			
			$count_data = count($offercat_data);
			
			$offerprod_data = explode(',', $data['Offer_master']['offerprod']);
			
			$count_data_prod = count($offerprod_data);
			
			for($i=0;$i<$count_data;$i++)
			{
				
				if($offercat_data[$i] == 0)
				$category_txt[] = 'All';
				else
				{
					$category_name = $this->Category->find('first', array('conditions' => array('Category.id' => $offercat_data[$i])));
				
					if($i==0)
					{
						if(isset($category_name['Category']['catname']))
						$category_txt[] = $category_name['Category']['catname'];
						else
						$category_txt[] = 'N/A';
					}
					elseif($i==($count_data-1))
					{
						if(isset($category_name['Category']['catname']))
						$category_txt[] = $category_name['Category']['catname'];
						else
						$category_txt[] = 'N/A';
					}
					else
					{
						if(isset($category_name['Category']['catname']))
						$category_txt[] = $category_name['Category']['catname'].',';
						else
						$category_txt[] = 'N/A';
					}
				}
			}
			
			$offers_data[$offer_key]['Offer_master']['category_txt'] = $category_txt;
			
			unset($category_txt);
			
			for($i=0;$i<$count_data_prod;$i++)
			{
				
				if($offercat_data[$i] == 0)
				$product_txt[] = 'All';
				else
				{
					if(isset($offercat_data[$i]))
					$product_name = $this->Produc_master->find('first', array('conditions' => array('Produc_master.id' => $offercat_data[$i])));
					if($i==0)
					{
						if(isset($product_name['Produc_master']['prodname']))
						$product_txt[] = $product_name['Produc_master']['prodname'];
						else
						$product_txt[] = 'N/A';
					}
					elseif($i==($count_data_prod-1))
					{
						if(isset($product_name['Produc_master']['prodname']))
						$product_txt[] = $product_name['Produc_master']['prodname'];
						else
						$product_txt[] = 'N/A';
					}
					else
					{
						if(isset($product_name['Produc_master']['prodname']))
						$product_txt[] = $product_name['Produc_master']['prodname'].',';
						else
						$product_txt[] = 'N/A';
					}
				}
			}
			
			$offers_data[$offer_key]['Offer_master']['product_txt'] = $product_txt;
			
			unset($product_txt);
		}
		
		$this->set('offers_data', $offers_data);
	}

	public function add_offer() 
	{
		if ($this->request->is('post')) {
			
			$this->request->data['Offer_master']['offerstartdt'] = date("Y-m-d H:i:s",strtotime($this->request->data['Offer_master']['start_date']));
			
			$this->request->data['Offer_master']['offerenddt'] = date("Y-m-d H:i:s",strtotime($this->request->data['Offer_master']['end_date']));
			
			$i=0;
			if(isset($this->request->data['Offer_master']['catid']))
			{
				$count_data = count($this->request->data['Offer_master']['catid']);
				$count_data = ($count_data-1);
				
				foreach($this->request->data['Offer_master']['catid'] as $key=>$cat_data)
				{
					if($count_data == 0)
					$cate = $cat_data;
					else
					{
						if($i==0)
						$cate = $cat_data.',';
						else
						{
							if($key == $count_data)
							$cate = $cate.$cat_data;
							else
							$cate = $cate.$cat_data.',';
						}
					}
					
					$i++;
				}
				
				$offercat = $cate;
				$this->request->data['Offer_master']['offerprod'] = $offerprod;
			}
			
			$i=0;
			if(isset($this->request->data['Offer_master']['productid']))
			{
				$count_data = count($this->request->data['Offer_master']['productid']);
				$count_data = ($count_data-1);
			
				foreach($this->request->data['Offer_master']['productid'] as $key=>$cat_data)
				{
					if($count_data == 0)
					$cate = $cat_data;
					else
					{
						if($i==0)
						$cate = $cat_data.',';
						else
						{
							if($key == $count_data)
							$cate = $cate.$cat_data;
							else
							$cate = $cate.$cat_data.',';
						}
					}
									
					$i++;
				}
				
				$offerprod = $cate;
				
				$this->request->data['Offer_master']['offercat'] = $offercat;
			}
			
			if($this->Offer_master->save($this->request->data))
			$this->redirect('offers');
		}
	}
	
	public function offer_edit($id) 
	{
		$offer_data = $this->Offer_master->find('first', array('conditions'=>array('Offer_master.id'=>$id)));
		
		$this->set('offer_data', $offer_data['Offer_master']);
				
		if ($this->request->is('post')) {
			
			$this->request->data['Offer_master']['offerstartdt'] = date("Y-m-d H:i:s",strtotime($this->request->data['Offer_master']['start_date']));
			
			$this->request->data['Offer_master']['offerenddt'] = date("Y-m-d H:i:s",strtotime($this->request->data['Offer_master']['end_date']));
			
			$i=0;
			if(isset($this->request->data['Offer_master']['catid']))
			{
				$count_data = count($this->request->data['Offer_master']['catid']);
				$count_data = ($count_data-1);
				
				foreach($this->request->data['Offer_master']['catid'] as $key=>$cat_data)
				{
					if($count_data == 0)
					$cate = $cat_data;
					else
					{
						if($i==0)
						$cate = $cat_data.',';
						else
						{
							if($key == $count_data)
							$cate = $cate.$cat_data;
							else
							$cate = $cate.$cat_data.',';
						}
					}
				
					$i++;
				}
				
				$offercat = $cate;
				
				$this->request->data['Offer_master']['offerprod'] = $offerprod;
			}
			
			$i=0;
			if(isset($this->request->data['Offer_master']['productid']))
			{
				$count_data = count($this->request->data['Offer_master']['productid']);
				$count_data = ($count_data-1);
				
				foreach($this->request->data['Offer_master']['productid'] as $key=>$cat_data)
				{
					if($count_data == 0)
					$cate = $cat_data;
					else
					{
						if($i==0)
						$cate = $cat_data.',';
						else
						{
							if($key == $count_data)
							$cate = $cate.$cat_data;
							else
							$cate = $cate.$cat_data.',';
						}
					}
					
					$i++;
				}
				
				$offerprod = $cate;
				
				$this->request->data['Offer_master']['offercat'] = $offercat;
			}
			
			
			if($this->Offer_master->save($this->request->data))
			$this->redirect('offers');
		}
	}
	
	public function offer_status_change($id) 
	{
		$offer_data = $this->Offer_master->find('first', array('conditions'=>array('Offer_master.id'=>$id)));
		
		if($offer_data['Offer_master']['del_status']==1)
		$offer_data['Offer_master']['del_status'] = 0;
		else
		$offer_data['Offer_master']['del_status'] = 1;
		
		if($this->Offer_master->save($offer_data))
		$this->redirect('offers');			
	}
	
	public function attributes() 
	{
		$attribute_data = $this->Attribute_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($attribute_data as $key=>$data)
		{
			$data = $data['Attribute_master'];
			
			$attribute_cat_data = $this->Attribute_category->find('first', array('conditions' => array('Attribute_category.attid' => $data['id'])));	
			$data_second = $attribute_cat_data['Attribute_category'];
			
			$cat_data = $this->Category->find('first', array('conditions' => array('Category.id' => $data_second['catid'])));							
			
			$catname = $cat_data['Category']['catname'];
			
			$attribute_data[$key]['Attribute_master']['catname'] = $catname;			
		}
		
		$this->set('attributes_data', $attribute_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['Product']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->Product->save($this->request->data);
			$this->redirect('products');
		}
	}
	
	public function add_attribute() 
	{
		if($this->request->is('post')) {
			
			$this->Attribute_master->save($this->request->data);
			
			$att_values['Attribute_category']['attid'] = $this->Attribute_master->getLastInsertID();
			
			$att_values['Attribute_category']['catid'] = $this->request->data['Attribute_master']['catid'];
			
			$att_values['Attribute_category']['is_main'] = $this->request->data['Attribute_master']['is_main'];
			
			$att_values['Attribute_category']['del_status'] = $this->request->data['Attribute_master']['del_status'];
			
			if($this->Attribute_category->save($att_values))
			$this->redirect('attributes');	
		}
	}
	
	public function attribute_edit($id) 
	{
		$attribute_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$id)));
		
		$attribute_cat_data = $this->Attribute_category->find('first', array('conditions'=>array('Attribute_category.attid'=>$id)));
		
		$attribute_data['Attribute_category'] = $attribute_cat_data['Attribute_category'];
		
		$this->set('attribute_data', $attribute_data);
				
		if ($this->request->is('post')) {
						
			$this->Attribute_master->save($this->request->data);
			
			$last_inserted_id = $this->request->data['Attribute_master']['id'];
			
			$attribute_cat_data = $this->Attribute_category->find('first', array('conditions'=>array('Attribute_category.attid'=>$last_inserted_id)));
			
			$att_values['Attribute_category']['id'] = $attribute_cat_data['Attribute_category']['id'];
			
			$att_values['Attribute_category']['attid'] = $last_inserted_id;
			
			$att_values['Attribute_category']['catid'] = $this->request->data['Attribute_master']['catid'];
			
			$att_values['Attribute_category']['is_main'] = $this->request->data['Attribute_master']['is_main'];
			
			$att_values['Attribute_category']['del_status'] = $this->request->data['Attribute_master']['del_status'];
			
			if($this->Attribute_category->save($att_values))
			$this->redirect('attributes');	
		}
	}
	
	public function attribute_status_change($id) 
	{
		$attribute_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$id)));
		
		if($attribute_data['Attribute_master']['del_status']==1)
		$attribute_data['Attribute_master']['del_status'] = 0;
		else
		$attribute_data['Attribute_master']['del_status'] = 1;
		
		if($this->Attribute_master->save($attribute_data))
		$this->redirect('attributes');			
	}
	
	function offer_product_tree($catid, $selected_id){
		
		$id_data = explode(',', $selected_id);		
		
		$products_data = $this->Produc_master->find('all', array('order'=>array('id'=>'desc')));
		
		foreach($products_data as $product)
		{
			$product = $product['Produc_master'];
			$i= 0;
			foreach($id_data as $id_one)
			 {
				if($id_one == $product['id'])
				{
					echo '<option selected="selected" value="'.$product['id'].'">'.$product['prodname'].'</option>';
					$i++;
				}
			 }
			 
			 if($i==0)
			 echo '<option value="'.$product['id'].'">'.$product['prodname'].'</option>';
		}
	}

	function offer_category_tree($catid, $selected_id){
		
		$id_data = explode(',', $selected_id);		
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$catid)));
		
		foreach($category_data as $data)
		{
			$data = $data['Category'];
			
			 $i=0;
			 foreach($id_data as $id_one)
			 {
				if($id_one == $data['id'])
				{
					echo '<option selected="selected" value="'.$data['id'].'">'.$data['catname'].'</option>';				 
					$i++;
				}
			 }
			 
			 if($i==0)
			 echo '<option value="'.$data['id'].'">'.$data['catname'].'</option>';
			 
			 $this->offer_category_tree($data['id'], $selected_id);
		}
	}
	
	public function attribute_values($id) 
	{
		$this->set('id', $id);
		
		$attribute_value_data = $this->Attribute_value->find('all', array('order' => array('id' => 'DESC'), 'conditions' => array('Attribute_value.attid' => $id)));
		
		foreach($attribute_value_data as $key=>$att_data)
		{
			$attribute_master_data = $this->Attribute_master->find('first', array('conditions' => array('Attribute_master.id' => $att_data['Attribute_value']['attid'])));
			
			$attribute_value_data[$key]['Attribute_value']['attname'] = $attribute_master_data['Attribute_master']['attname'];			
		}
		
		$this->set('attribute_values_data', $attribute_value_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['Product']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->Product->save($this->request->data);
			$this->redirect('products');
		}
	}
	
	public function add_attribute_value($id) 
	{
		$this->set('id', $id);
		
		if($this->request->is('post')) {
			
			$this->Attribute_value->save($this->request->data);
			
			$this->redirect('attribute_values/'.$id);	
		}
	}

	public function attribute_value_edit($id) 
	{
		$attribute_value_data = $this->Attribute_value->find('first', array('conditions'=>array('Attribute_value.id'=>$id)));
		
		$attribute_master_data = $this->Attribute_master->find('first', array('conditions'=>array('Attribute_master.id'=>$attribute_value_data['Attribute_value']['attid'])));
		
		$attribute_value_data['Attribute_master'] = $attribute_master_data['Attribute_master'];
		
		$this->set('attribute_value_data', $attribute_value_data);
				
		if ($this->request->is('post')) {
			
			$this->Attribute_value->save($this->request->data);
			
			$this->redirect('attribute_values/'.$id);	
			
			die();	
		}
	}		
	
	public function attribute_value_status_change($id, $redirect_id) 
	{
		$attribute_value_data = $this->Attribute_value->find('first', array('conditions'=>array('attribute_value.id'=>$id)));
		
		if($attribute_value_data['Attribute_value']['del_status']==1)
		$attribute_value_data['Attribute_value']['del_status'] = 0;
		else
		$attribute_value_data['Attribute_value']['del_status'] = 1;
		
		if($this->Attribute_value->save($attribute_value_data))
		$this->redirect('attribute_values/'.$redirect_id);			
	}	
			
	public function main_slider_images() 
	{
		$slider_images = $this->Slider_image->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($slider_images as $key=>$slider_image)
		{
			$slider_image = $slider_image['Slider_image'];
			
			if($slider_image['cat_id'] !='')
			{
				$cat_id = $slider_image['cat_id'];
				$category_data = $this->Category->find('first', array('conditions'=>array('Category.id'=>$cat_id)));
				$slider_images[$key]['Slider_image']['catname'] = $category_data['Category']['catname'];
			}
			
			if($slider_image['product_id'] !='')
			{
				$product_id = $slider_image['product_id'];
				$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$product_id)));
				$slider_images[$key]['Slider_image']['prodname'] = $product_data['Produc_master']['prodname'];
			}			
		}
		
		$this->set(compact('slider_images'));
		
		if ($this->request->is('post')) {
			
			$this->request->data['Product']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->Product->save($this->request->data);
			$this->redirect('products');
		}
	}		
				
	public function main_slider_image_edit($id) 
	{
		echo "Id".$id;		
		
		echo "<br>main_slider_image_edit";
		
		$products = $this->Produc_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($products as $product)
		{
			$product = $product['Produc_master'];
			
			$products_dropdown[$product['id']] = $product['prodname'];			
		}
		
		$category_data = $this->Category->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($category_data as $category)
		{
			$category = $category['Category'];
			
			$categories_dropdown[$category['id']] = $category['catname'];			
		}
		
		$this->set(compact('products_dropdown', 'categories_dropdown'));
		
		$slider_images_data = $this->Slider_image ->find('first', array('conditions'=>array('Slider_image.id'=>$id)));
		
		$this->set(compact('slider_images_data'));
		
		if ($this->request->is('post')) {
			
			echo "Requested_data<pre>";
			print_r($this->request->data);
			echo "<pre>";
			
			if($this->request->data['Slider_image']['image']['name'] !='')
			{
				$this->request->data['Slider_image']['image_path'] = $this->request->data['Slider_image']['image']['name'];
				
				$name = $this->request->data['Slider_image']['image']['name'];
				$tmp_name = $this->request->data['Slider_image']['image']['tmp_name'];
				$type = $this->request->data['Slider_image']['image']['type'];
				$type_data = explode('/', $type);
				$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
				if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
				{
					//Uploadation code for images
					if(move_uploaded_file($tmp_name, WWW_ROOT. 'img/slider/'.$name))
					{ 
						$url="../webroot/img/slider/".$name;
						$thumbnail_url="../webroot/img/slider/thumb/small_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,200);
						
						$url="../webroot/img/slider/".$name;
						$thumbnail_url="../webroot/img/slider/thumb/large_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,1500);						
					}
					else
					{
						$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
						$this->redirect('add_main_slider_image');	
					}
				}
				else
				{
					$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
					$this->redirect('add_main_slider_image');	
				}			
			}
			
			if($this->request->data['Slider_image']['Category'] == 1)
			$this->request->data['Slider_image']['cat_id'] = $this->request->data['Slider_image']['category_id'];
			
			if($this->request->data['Slider_image']['Product'] == 1)
			$this->request->data['Slider_image']['product_id'] = $this->request->data['Slider_image']['product_id'];
			
			$this->Slider_image->save($this->request->data);
			
			$this->redirect('main_slider_images');								
		}
	}			
					
	public function add_main_slider_image() 
	{
		$products = $this->Produc_master->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($products as $product)
		{
			$product = $product['Produc_master'];
			
			$products_dropdown[$product['id']] = $product['prodname'];			
		}
		
		$category_data = $this->Category->find('all', array('order' => array('id' => 'DESC')));
		
		foreach($category_data as $category)
		{
			$category = $category['Category'];
			
			$categories_dropdown[$category['id']] = $category['catname'];			
		}
		
		$this->set(compact('products_dropdown', 'categories_dropdown'));
		
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['Slider_image']['image']))
			{
				$this->request->data['Slider_image']['image_path'] = $this->request->data['Slider_image']['image']['name'];
				
				$name = $this->request->data['Slider_image']['image']['name'];
				$tmp_name = $this->request->data['Slider_image']['image']['tmp_name'];
				$type = $this->request->data['Slider_image']['image']['type'];
				$type_data = explode('/', $type);
				$arr_ext = array('pjpeg','jpeg','jpg','png'); //set allowed extensions
				if(in_array($type_data[1], $arr_ext)) //Restriction to the uploaded images
				{
					//Uploadation code for images
					if(move_uploaded_file($tmp_name, WWW_ROOT. 'img/slider/'.$name))
					{ 
						$url="../webroot/img/slider/".$name;
						$thumbnail_url="../webroot/img/slider/thumb/small_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,200);
						
						$url="../webroot/img/slider/".$name;
						$thumbnail_url="../webroot/img/slider/thumb/large_images/".$name;							
						$this->make_thumb($url,$thumbnail_url,1500);						
					}
					else
					{
						$this->Session->setFlash(__('Sorry, File was not uploaded. Please try after sometime... '));
						$this->redirect('add_main_slider_image');	
					}
				}
				else
				{
					$this->Session->setFlash(__('Sorry, Please insert the image in JPEG, JPG, PNG, PJPEG format only... '));
					$this->redirect('add_main_slider_image');	
				}			
			}
			
			if($this->request->data['Slider_image']['Category'] == 1)
			$this->request->data['Slider_image']['cat_id'] = $this->request->data['Slider_image']['category_id'];
			
			if($this->request->data['Slider_image']['Product'] == 1)
			$this->request->data['Slider_image']['product_id'] = $this->request->data['Slider_image']['product_id'];
			
			$this->Slider_image->save($this->request->data);
			
			$this->redirect('main_slider_images');				
		}
	}				
	
	public function main_slider_image_status_change($id) 
	{
		$slider_image_data = $this->Slider_image->find('first', array('conditions'=>array('Slider_image.id'=>$id)));
		
		if($slider_image_data['Slider_image']['del_status']==1)
		$slider_image_data['Slider_image']['del_status'] = 0;	
		
		else
		$slider_image_data['Slider_image']['del_status'] = 1;
		
		if($this->Slider_image->save($slider_image_data))
		$this->redirect('main_slider_images');					
	}
					
	
}
