<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	 
	 var $validate = array(
		
		 'required' => array(
		 'on'         => 'create',
		 'rule' => 'isUnique',
        
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
		  
				'rule' => 'notEmpty',
				'message' => 'A last name is required',
				
				'alpha'=>array(
				   'rule' => "/^[a-z ,.'-]+$/i",
				'message' => 'Please do not use special characters.',
				'allowEmpty' => true
				)
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