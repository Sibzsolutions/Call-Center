<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	 
	 var $validate = array(
		
		 'username' => array(
		 
			 'on'         => 'create',
			 'rule' => 'isUnique',
			 	'message'   => 'Username already exits.',
		 ),
		 
		 'email' => array(
		 
			 'on'         => 'create',
			 'rule' => 'isUnique',
			 	'message'   => 'Email address already exits.',
		 ),
		 
		 'password' => array(
				'length' => array(
				'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
  		  ),
	
		  'usrfname' => array(
		
            'rule' => "/^[a-z ,.'-]+$/i",
            'message' => 'Please do not use special characters.',			
          ),
		   
		  'usrlname' => array(
		  
				'rule' => "/^[a-z ,.'-]+$/i",
            	'message' => 'Please do not use special characters.',			
          ),		
   );
    	
    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        
		return true;
    }	
}
?>