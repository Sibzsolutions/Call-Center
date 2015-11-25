<?php 
App::uses('AppModel', 'Model');

class Order_master extends AppModel {
	
    public $name = 'Order_master';
	
	public $hasMany =array('Order_detail','Order_status');
	
	public $validate = array(
	
	
	
    );
}
?>