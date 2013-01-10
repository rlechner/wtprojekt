<?php

class Application_Form_Translate extends Zend_Form
{

    public function init() {

			// Set the method for the display form to GET
			$this->setMethod('post');
			$this->setAction('index');
			$this->addElement('text', 'vocable', array(
					'label' => 'Vocable:',
					'required' => true,
					'filters' => array('StringTrim'),
					'validators' => array(
							array(
							'validator' => 'StringLength', 'options' => array(3, 255),
							'validator' => 'alnum',
							)
						)
				));
			$this->addElement('submit', 'index', array('label' => 'translate'));

    }
}

?>