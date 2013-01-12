<?php


class Application_Form_InsertVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('insertvocable');

        $this->addElement('text', 'search_voc', array(
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
			
		 $this->addElement('submit', 'submit', array(
				'ignore'   => true,
				'label'    => 'Search',
				
			));
			
		$this->addElement('text','german_voc', array(
				'required'	=> true,
				'filters'	=> array('StringTrim'),
			));
		
				
		$this->addElement('text','english_voc', array(
				'required'	=> true,
				'filters'	=> array('StringTrim'),
			));
			
				
		$this->addElement('text','level', array(
				'required'	=> true,
				'filters'	=> array('StringTrim'),
			));
		
		 $this->addElement('submit', 'submit', array(
				'ignore'   => true,
				'label'    => 'Insert',
			));
	}
}

?>