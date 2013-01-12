<?php


class Application_Form_Registration extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
		$this->setAction('register');

        $this->addElement('text', 'username', array(
                'label' => 'Username:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
        
        
        $this->addElement('text', 'email', array(
        		'label' => 'E-Mail:',
        		'required' => true,
        		'filters'    => array('StringTrim'),
        ));
        
 
        $this->addElement('password', 'password1', array(
            'label' => 'Password:',
            'required' => true,
            ));
        
        
        $this->addElement('password', 'password2', array(
        		'label' => 'Confirm Password:',
        		'required' => true,
        ));
        

	
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Register',
            ));

    }
}

?>