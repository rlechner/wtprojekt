<?php

class Application_Form_Contact extends Zend_Form  
{  
  
     public function init()
    {
        $this->setMethod('post');
        $this->setName('contact-form');
		//$this->setAction('index');
        
        $this->addElement('text', 'name', array(
            'label' => 'Name',
            'required' => true,
        ));
        
        $this->addElement('text', 'subject', array(
            'label' => 'Subject',
            'required' => true,
        ));
        
        $this->addElement('text', 'email', array(
            'label' => 'E-Mail',
            'required' => true,
        ));
        
        $this->addElement('textarea', 'message', array(
            'label' => 'Message',
            'required' => true,
        ));
        
        $this->addElement('submit', 'submit-contact', array(
            'label' => 'Send',
            'ignore' => true,
        ));
    } 
  
}