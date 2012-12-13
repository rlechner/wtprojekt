<?php

class FooterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $this->view->actionName = $request->getActionName();
        $this->view->controllerName = $request->getControllerName();
    }

}
