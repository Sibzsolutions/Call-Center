<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User_address extends AppModel {
	 
	 public $name = 'User_address';
	 
	 var $validate = array(
		
		 'addr1' => array(
			 
			 'length' => array(
				'on' => 'create',
				'rule'      => array('between', 8, 300),
					'message'   => 'Your address must be between 8 and 40 characters.',
				),
		 ),
		 
		 'email' => array(
		 
			 'on'         => 'create',
			 'rule' => 'isUnique',
			 	'message'   => 'Email address already exits.',
		 ),
		 
		 'usrzip' => array(
				
				'zip_char' => array(
				///^[a-z ,.'-]+$/i  alphaNumeric
				'on' => 'create',
				'rule' => "Numeric",
					'message' => 'Please do not use characters.',			
				),
				
				'length' => array(
				'on' => 'create',
				'rule'      => array('minLength', 4),
					'message'   => 'Your zip code must be have minimum 4 digits',
				),
  		  ),
		 
		  'usrcity' => array(
				
				'city_rule' => array(
				'on' => 'create',
				'rule' => "/[A-Za-z ]+/",
					'message' => 'City name must contain letters and spaces only.',			
				)
  		  ),
		  
		  'usrcountry' => array(
								
				'country_rule' => array(
				'on' => 'create',				
				'rule' => "/[A-Za-z ]+/",
					'message' => 'Country name must contain letters and spaces only.',			
				)
  		  ),
		 
		  'usrstate' => array(
				
				'state_rule' => array(
				'on' => 'create',
				'rule' => "/[A-Za-z ]+/",
					'message' => 'State name must contain letters and spaces only.',			
				)
  		  ),
		  
		  'usrphones' => array(
			
			'on' => 'create',
			'rule' => array('phone', null, 'us'),
			'message' => 'Please enter correct format.', 
			),
		 
         'new_password' => array(
		 
				'length' => array(
					'on' => 'create',
					'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
		   ),
		   
		 'confirm_password' => array(
				'on' => 'create',
				'length' => array(
				   'rule'      => array('between', 8, 40),
					'message'   => 'Your password must be between 8 and 40 characters.',
				),
				'compare'    => array(
					'rule'      => array('password_confirm'),
					'message' => 'The passwords you entered do not match.',
				),
  		   ),
		
		 'usrfname' => array(
			'on' => 'create',
            'rule' => "/^[a-z ,.'-]+$/i",
            'message' => 'Please do not use special characters.',			
          ),
		   
		 'usrlname' => array(
				'on' => 'create',
				'rule' => "/^[a-z ,.'-]+$/i",
            	'message' => 'Please do not use special characters.',			
          ),		
		
		'customer_credit_card_number' => array(
		
    	'rule' => array('cc', 'all', false, null),    	
    	'message' => 'Your credit card number is not in the correct format.'
    	)
   );
    	
    public function beforeSave($options = array()) {
		
		if (!empty($this->data[$this->alias]['password'])) {
            
			$passwordHasher = new SimplePasswordHasher();
          
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);			
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