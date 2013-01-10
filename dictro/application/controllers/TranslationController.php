<?php

class TranslationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

    }

    public function indexAction()
    {
        $request = $this->getRequest();
		$form = new Application_Form_Translate();
		
		if ($this->getRequest()->isPost()) {
			$this->request = $this->getRequest();
			$x = $this->request->getParam('vocable');
			var_dump($x);
			if ($form->isValid($this->request->getPost())) {
				$db = Zend_Registry::get('dbc');
			
				if (! is_null($db)) {
					$values = $form->getValues();
					$translation = $db->query('SELECT german, english from vocable WHERE german LIKE "%' . $values['vocable'] . '%";');
					$wert = mysqli_fetch_assoc($translation);
					print_r($wert);
					$this->view->translation = $wert;
					//return $this->_helper->redirector('index');
					}
			}
		}
		$this->view->form = $form;
		
    }
    

}

