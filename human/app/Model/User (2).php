<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	 
	 var $validate = array(
		
		 'username' => array(
		 
			 
			 'length' => array(
				'on' => 'create',
				'rule'      => array('between', 5, 40),
					'message'   => 'Your address must be between 8 and 40 characters.',
				),
			 'rule2' => array(		
				'on' => 'create',
				 'rule' => 'isUnique',
					'message'   => 'Username already exits.',
				),
		 ),
		 
		 'email' => array(
		 
			 'on'         => 'create',
			 'rule' => 'isUnique',
			 	'message'   => 'Email address already exits.',
		 ),
		 
		 'password' => array(
				
				'length' => array(
				'on' => 'create',
				'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
  		  ),
		  
		 /*
		 'old_password' => array(
				'length' => array(
				'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
  		  ),
			
         'new_password' => array(
				'length' => array(
					'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
		   ),
		   
		 
		 'confirm_password' => array(
				'length' => array(
				   'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
				'compare'    => array(
					'rule'      => array('password_confirm'),
					'message' => 'The passwords you entered do not match.',
				),
  		   ),
		 */
		  
		 'usrfname' => array(
		  
			'on' => 'create',
			'rule2' => array(
				'rule' => "/[A-Za-z ]+/",
				
				'message' => 'First name must contain letters and spaces only.',			
				
			),
          ),
		   
		 'usrlname' => array(
		  
			'on' => 'create',
			'rule2' => array(
				'rule' => "/[A-Za-z ]+/",
				'message' => 'Last name name must contain letters and spaces only.',			
			),
          ),		
   );
    	
    public function beforeSave($options = array()) {
		
		echo "shashiaknt_before_save";
		
		if (!empty($this->data[$this->alias]['password'])) {
            
			$passwordHasher = new SimplePasswordHasher();
          
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
			
			echo "Data<pre>";
			print_r($this->data);
			echo "<pre>";			
        }
        
		return true;
    }
	
	public function password_confirm() {
		
    $new_password = $this->data[$this->alias]['new_password'];
   	$confirm_password = $this->data[$this->alias]['confirm_password'];
	
	if($new_password == $confirm_password)
	return true;
	else
	return false;
    
   }
   



	
}
?>