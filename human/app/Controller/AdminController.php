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
class AdminController extends AppController {

	

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User', 'Site_setting', 'Dynamic_page', 'Category', 'Produc_master', 'Produc_image');

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
		 AuthComponent::$sessionKey='admin';
		 $this->Auth->fields = array('username' => 'username','password' => 'password');
		 $this->Auth->authenticate = array('Form' => array('scope'=>array('User.usrtype'=>array('2'))));
		 $this->Auth->loginAction=array('controller' => 'Admin','action' => 'login');
		 $this->Auth->logoutRedirect=array('controller' => 'Admin','action' => 'login');
		 $this->Auth->loginRedirect = array('controller'=>'Admin','action'=>'index');
		 $this->Auth->authError = __('');
         $this->Auth->loginError = __('Invalid Username or Password entered, please try again.'); 
		 $this->Auth->allow('register','login');  
		 
		 $this->layout="Superadministrator_layout";   
		 
		 
		 $userdata = $this->Auth->user();
		
		 $this->set('user_data',$userdata);
		 		  
		 //For meta title, key and descriptions
		 //$site_setting = $this->Site_setting->find('first');
		 //$this->set('site_settings',$site_setting);					 
	}
	
	function register() 
	{
		$this->layout='';
		
		if($this->request->data)
		{
			debug($this->request->data);
			
			$this->request->data['User']['usrtype']=2;
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
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
		if ($this->request->is('post')) {
					
			$this->Site_setting->save($this->request->data);
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
		$user['User']['id'] = $id;
		$user['User']['inactive'] = '0';
		
		if($this->User->save($user))
		$this->redirect('users');		
	}
	
	public function user_delete($id) 
	{
		$user_data = $this->User->find('first', array('conditions'=>array('User.usrid'=>$id)));
		
		$user_data['User']['del_status'] = 1;
		
		$this->User->save($user_data);
		
		$this->redirect('users');
		
		if ($this->request->is('post')) {
			
			$this->User->save($this->request->data);
		}
	}
	
	public function add_user() 
	{
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->User->save($this->request->data);
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
		
		$this->set('categories_data', $categories_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->User->save($this->request->data);
			$this->redirect('users');
		}
	}
	
	public function adisplayParent($id) {
		
		//, $session_id
		//$cat = array();
		$i = 0;
		//$sql = "SELECT * FROM ads_01_cat WHERE id = '$id'";
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$id)));
				
		if(count($category_data)>0)
		{
			while(count($category_data))
			{
				echo "<pre>";
				print_r($category_data);
				echo "<pre>";
				
				//$content = '--> <a href="cat_list.php?session_id='.$session_id.'&id='.$row['id'].'">'.$row['name'].'</a>';
				
				$cat = array_fill($i, 1, $category_data);
				
				echo "Cat<pre>";
				print_r($cat);
				echo "<pre>";
				
				//$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$category_data[$i]['Category']['id'])));
				$this->displayParent($category_data[$i]['Category']['id']);  //, $session_id
				$i++;
			}
		}
		if(isset($car))
		{
			echo "cat<pre>";
			print_r($cat);
			echo "<pre>";
		}
		
		
		
		$cat = array_reverse($cat);
		$count_cat = count($cat);
		 
		for($i=0; $i<=$count; $i++) 
		{
			echo $cat[$i];		
		}
	}  
	
	function displayParent($id, $session_id) {
		
		$i = 0;
		$cat;
		
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>$id)));
		
		//if($result = mysql_query($sql))
		if($category_data)
		{
			foreach($category_data as $data)
			{
				$content[$data['Category']['id']] = $data['Category']['catname'];
				
				$cat[] = $data['Category']; //array_fill($i, 1, $content);
				
				$this->displayParent($data['Category']['id'], 1);
			}
			
		}
		if(isset($cat))
		return $cat;
		else
		return false;
		
		unset($cat);
		
		/*
		$cat = array_reverse($cat);
		$count_cat = count($cat);
		 
		for($i=0; $i<=$count; $i++) {
		echo $cat[$i];
		}
		*/
	}  
	
	public function add_category() 
	{
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>0)));
		
		$i=1;
		foreach($category_data as $key=>$data)
		{
			$first_data = $this->displayParent($data['Category']['id'], $i);
			
			if(isset($first_data))
			$category_data[$key]['sub_category'] = $first_data;
			
			unset($first_data);
			
			$i++;
		}
		
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
		$category_data = $this->Category->find('first', array('conditions'=>array('Category.id'=>$id)));
		
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
			
			if($this->Category->save($this->request->data))
			$this->redirect('categories');	
		}
	}
	
	public function category_delete($id) 
	{
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		$dynamic_page_data['Dynamic_page']['status'] = 0;
		
		if($this->Dynamic_page->save($dynamic_page_data))
		$this->redirect('dynamic_pages');	
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
			
			echo "Request_data<pre>";
			print_r($this->request->data);
			echo "<pre>";
			
			die();
			
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
	
	public function add_products() 
	{
		$category_data = $this->Category->find('all', array('conditions'=>array('Category.parentid'=>0)));
		
		$i=1;
		foreach($category_data as $key=>$data)
		{
			$first_data = $this->displayParent($data['Category']['id'], $i);
			
			if(isset($first_data))
			$category_data[$key]['sub_category'] = $first_data;
			
			unset($first_data);
			
			$i++;
		}
		
		if ($this->request->is('post')) {
			
			$this->Produc_master->save($this->request->data);
			
			$last_inserted_id = $this->Produc_master->getLastInsertId();
			
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
			$this->redirect('add_products');	
		}
	}
	
	
	public function product_edit($id) 
	{
		$product_data = $this->Produc_master->find('first', array('conditions'=>array('Produc_master.id'=>$id)));
		
		$this->set('product_data', $product_data['Produc_master']);
				
		if ($this->request->is('post')) {
						
			$this->Produc_master->save($this->request->data);
			
			$last_inserted_id = $this->request->data['Produc_master']['id'];
			
			//if(count($this->request->data['Produc_master']['produc_images'])>0)
			//$this->Produc_image->deleteAll(array('Produc_image.prodid' => $last_inserted_id));
			
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
			$this->redirect('add_products');					
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
	
		
	
}
