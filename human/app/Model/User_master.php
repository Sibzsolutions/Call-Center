<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User_master extends AppModel {
	 
	 var $validate = array(

		'username' => array(
		   				'unique'=>array(
								 'on'=>'create',
								 'rule' => 'isUnique',
                    				'message' => 'Email must be unique.'
					   				 ),
						/*'alpha' =>array(
						        'rule' => 'alphaNumeric',
                    			'message' => 'This must not contain any symbols.'      
									  ), 
						*/
						 'length' => array(
							 'on'=>'create',
           					 'rule' => array('minLength', '4'),
           					 'message' => 'Minimum 4 characters long',
        						)
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