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
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,20)),
							'validator' => 'alnum',
							
						)
            ));
        
        
        $this->addElement('text', 'email', array(
        		'label' => 'E-Mail:',
        		'required' => true,
        		'filters'    => array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,50)),
							//'validator' => 'alnum',
							
						)
        ));
        
 
        $this->addElement('password', 'password1', array(
            'label' => 'Password:',
            'required' => true,
			
			'validators' => array( 
									array(
									'StringLength', false, array(3,20)),
							'validator' => 'alnum',
							
						)
            ));
        
        
        $this->addElement('password', 'password2', array(
        		'label' => 'Confirm Password:',
        		'required' => true,
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,20)),
							'validator' => 'alnum',
							
						)
        ));
        

	
        $this->addElement('submit', 'rbutton', array(
            'ignore'   => true,
            'label'    => 'Register',
            ));

    }
}

?>