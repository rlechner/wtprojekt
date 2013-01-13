<?php


class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('index');

        $this->addElement('text', 'vocable', array(
                'label' => 'Vocable:',
                'required' => true,
                'filters'    => array('StringTrim'),
				'validators' => array( 
									array(
									'StringLength', false, array(3,255)),
							//'validator' => 'alpha',
							
						)
            ));       
	
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Search',
			
        	//'label_class' => 'cssKlasseFuerDekorator',
        
            ));
        
        $this->addElement('submit', 'submit', array(
        		'ignore'   => true,
        		'label'    => 'Delete',
        		//'label_class' => 'cssKlasseFuerDekorator',
        
        ));

    }
}

?>