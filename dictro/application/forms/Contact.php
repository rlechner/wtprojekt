<?php

class Application_Form_Contact extends Zend_Form  
{  
  
     public function init()
    {
        $this->setMethod('post');
        $this->setName('contact-form');
		//$this->setAction('index');
        
        $this->addElement('text', 'name', array(
            'label' => 'Name:',
            'required' => true,
			'validators' => array( 
									array(
									'StringLength', false, array(3,30)),
							'validator' => 'alnum',
							
						)
        ));
       
        $this->addElement('text', 'subject', array(
            'label' => 'Subject:',
            'required' => true,
			'validators' => array( 
									array(
									'StringLength', false, array(3,30)),
							'validator' => 'alnum',
							
						)
        ));
        
        $this->addElement('text', 'email', array(
            'label' => 'E-Mail:',
            'required' => true,
			'validators' => array( 
									array(
									'StringLength', false, array(3,50)),
							//'validator' => 'alnum',
							
						)
        ));
        
        $this->addElement('textarea', 'message', array(
            'label' => 'Message:',
            'required' => true,
			'validators' => array( 
									array(
									'StringLength', false, array(3,1024)),
							'validator' => 'alnum',
							
						)
        ));
        
        $this->addElement('submit', 'submit-contact', array(
            'label' => 'Send',
            'ignore' => true,
        ));
    } 
  
}