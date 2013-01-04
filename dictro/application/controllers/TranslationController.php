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
			if ($form->isValid($request->getPost())) {
				$db = Zend_Registry::get('dbc');
				if (! is_null($db)) {
					$values = $form->getValues();
					$translation = "test";
					$translation = $db->query('SELECT english from vocabulary WHERE german LIKE "%' + $values['vocabel'] + '%";');
					$this->view->translation = $translation;
					return $this->_helper->redirector('index');
				}
			}
		}
		$this->view->form = $form;
    }


}

