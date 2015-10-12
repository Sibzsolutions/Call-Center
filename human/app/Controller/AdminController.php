<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
	
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
	public $uses = array('User', 'Site_setting', 'Dynamic_page');

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
		$dynamic_pages_data = $this->Dynamic_page->find('all', array('order' => array('id' => 'DESC')));
		
		$this->set('dynamic_pages_data', $dynamic_pages_data);
		
		if ($this->request->is('post')) {
			
			$this->request->data['User']['last_login']=date('Y-m-d H:i:s',time());
			
			$this->User->save($this->request->data);
			$this->redirect('users');
		}
	}
	
	public function add_category() 
	{
		if ($this->request->is('post')) {
			
			$this->request->data['Dynamic_page']['page_content'] = $this->request->data['editor1'];
			
			if($this->Dynamic_page->save($this->request->data))
			$this->redirect('dynamic_pages');	
		}
	}
	
	public function category_edit($id) 
	{
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		$this->set('dynamic_page_data', $dynamic_page_data['Dynamic_page']);
				
		if ($this->request->is('post')) {
			
			$this->request->data['Dynamic_page']['page_content'] = $this->request->data['editor1'];
			
			if($this->Dynamic_page->save($this->request->data))
			$this->redirect('dynamic_pages');	
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
		$dynamic_page_data = $this->Dynamic_page->find('first', array('conditions'=>array('Dynamic_page.id'=>$id)));
		
		if($dynamic_page_data['Dynamic_page']['status']==1)
		$dynamic_page_data['Dynamic_page']['status'] = 0;
		else
		$dynamic_page_data['Dynamic_page']['status'] = 1;
		
		if($this->Dynamic_page->save($dynamic_page_data))
		$this->redirect('dynamic_pages');			
	}

	
	
	
}
