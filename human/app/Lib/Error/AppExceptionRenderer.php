<?php ?>
<?php

/*
App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
}
*/


App::uses('ExceptionRenderer', 'Error');
 
class AppExceptionRenderer extends ExceptionRenderer {
	
    public function missingController($error) {
		$this->controller->header('HTTP/1.1 404 Not Found');
		$this->controller->render('/Errors/error404', 'default');
		$this->controller->response->send();
    }
	
	public function notFound($error) {
        $this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'));
    }
	
    public function missingAction($error) {
		$this->controller->redirect(array('controller' => 'errors', 'action' => 'error404'), 404);
    }
}



?>