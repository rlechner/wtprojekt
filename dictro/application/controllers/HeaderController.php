<?php

class HeaderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    
    public function logoutAction()
    {
    	Zend_Session::destroy(true);
    	$this->redirect('index');
    }
    
    public function registerAction(){
    	
    	$registerForm = new Application_Form_Registration($_POST);
    	
    	$this->view->registerForm = $registerForm;
    }

}

