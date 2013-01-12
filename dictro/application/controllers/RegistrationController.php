<?php

class RegistrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
        //$db	= Zend_Db_Table_Abstract::getDefaultAdapter();
    	$registerForm = new Application_Form_Registration($_POST);

    	
    	
    	if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
    		if (isset($_POST['rbutton']) && $registerForm->isValid($_POST)) {
    			
    			$db = Zend_Registry::get('dbc');
    			$db->query('SET NAMES utf8;');
    			/*
    			$adapter = new Zend_Auth_Adapter_DbTable(
    					$db,
    					'users',
    					'name',
    					'password'
    			);
    	
    			$adapter->setIdentity($registerForm->getValue('username'));
    			$adapter->setCredential($registerForm->getValue('passwor2'));
    	
    			$result = $adapter->authenticate($adapter);
    	
    			if (User nicht vorhanden) {
				*/
    				$values = $registerForm->getValues();
  					
    				if( $registerForm->getValue('password1') != $registerForm->getValue('password2')){
    					$success=-1;
    					$this->view->success = $success;
    					//$this->redirect('registration');
    					
    					
    					
    				}
    				else{
    				
    				
    				$db->query('SET NAMES utf8;');
    				$stmt = $db->prepare  ('	INSERT INTO `users`(`name`, `password`, `userstate`) 
    											VALUES ("' . $registerForm->getValue('username') . '",
    													"' . $registerForm->getValue('password2') . '", 92)	
    									');
    				
    				$stmt->execute();
    				
    				$success=1;
    				
    				$this->view->success = $success;
    				
    				$this->redirect('index');
    				
    				return;
    				}
    		}
    	}
    	

    	$this->view->registerForm = $registerForm;
        
    }


}

