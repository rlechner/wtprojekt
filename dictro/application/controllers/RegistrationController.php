<?php

class RegistrationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	
        $db	= Zend_Db_Table_Abstract::getDefaultAdapter();
    	$registerForm = new Application_Form_Registration($_POST);

    	
    	
    	if ($this->getRequest()->isPost()) {
    		$this->request = $this->getRequest();
    		if (isset($_POST['rbutton']) && $registerForm->isValid($_POST)) {
    			
    			//$db = Zend_Registry::get('dbc');
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
  
    				$db->query('SET NAMES utf8;');
    				$query = ('	INSERT INTO `users`(`name`, `password`, `userstate`) 
    										VALUES (' . $registerForm->getValue('username') . ',
    												' . $registerForm->getValue('password2') . ', 92)	
    									');
   					
    				//$stmt   = $db -> query($query);
    				
    				$query->execute();
    				
    				$success=1;
    				
    				$this->view->success = $success;
    				
    				$this->redirect('index');
    				
    				return;
    			/*		
    			}
    			else {
    				
    				
    				echo "Registrierung failed";
    					
    			}*/
    		}
    	}
    	

    	$this->view->registerForm = $registerForm;
        
    }


}

