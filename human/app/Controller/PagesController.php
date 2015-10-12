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
class PagesController extends AppController {
	
	public $components = array('Auth' => array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array('usremail' => 'usremail')
            )
        )
    ),'RequestHandler','Paginator', 'Session'); 
	
	public $helpers = array( 'Js' => array('Jquery'), 'Session');
	 
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
	

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	public function try_index() {
		
		$this->layout="superadministrator_layout";
	
		//echo "shashikant is started the new project.";		
	}
	
	public function chartjs() {
	}
	public function morris() {
	}
	public function flot() {
	}
	public function top_nav() {
	}
	public function boxed() {
	}
	public function fixed() {
	}
	public function collapsed_sidebar() {
	}
	public function inline() {
	}
	public function general() {
	}
	public function icons() {
	}
	public function buttons() {
	}
	public function sliders() {
	}
	public function timeline() {
	}
	public function modals() {
	}
	public function advanced() {
	}
	public function editors() {
	}
	public function simple() {
	}
	public function data() {
	}
	public function invoice() {
	}
	public function profile() {
	}
	public function login() {
	}
	public function register() {
	}
	public function lockscreen() {
	}
	public function error_one() {
	}
	public function error_two() {
	}
	public function blank() {
	}




	
	/*
	
	Theme Pages Name
	
	chartjs
	morris
	flot
	top-nav
	boxed
	fixed
	collapsed-sidebar
	inline
	general
	icons
	buttons
	sliders
	timeline
	modals
	general
	advanced
	editors
	simple
	data
	invoice
	profile
	login
	register
	lockscreen
	404
	500	
	blank
	*/
}
