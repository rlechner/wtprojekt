<?php

class Application_Form_Login extends Zend_Form
	{
		
	public function init(){
		
		$this->setMethod('post');
		//$this->setAction('index');
		$this->addElement('text', 'name', array(
		'label' => 'Username:',
		'required' => true,
		'filters' => array('StringTrim'),
		));
		
		$this->addElement('password', 'password', array(
		'label' => 'Passwort:',
		'required' => true,
		));
		
		$this->addElement('submit', 'submit', array(
		'ignore' => true,
		'label' => 'Login',
		));
	
	}
}

?>