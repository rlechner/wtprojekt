<?php

class Application_Form_Translate extends Zend_Form
{

    public function init() {

			// Set the method for the display form to POST
			$this->setMethod('post');
			$this->setAction('index');
					
			
			$speech = $this->createElement('radio','speech');
			
			$speech->setSeparator('')
			->addMultiOption('deToen','DE/EN')
			->addMultiOption('enTode','EN/DE')
			->setValue('deToen');
			$this->addElement($speech, 'speech');
			
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