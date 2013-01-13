<?php


class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('index');

        $this->addElement('text', 'username', array(
                'label' => 'Username:',
                'required' => true,
                'filters'    => array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,20)),
							'validator' => 'alnum',
							
						)
            ));
        
 
        $this->addElement('password', 'password', array(
            'label' => 'Passwort:',
            'required' => true,
			
			'validators' => array( 
									array(
									'StringLength', false, array(3,20)),
							'validator' => 'alnum',
							
						)
            ));
        
	
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
        	//'label_class' => 'cssKlasseFuerDekorator',
        
            ));

    }
}

?>