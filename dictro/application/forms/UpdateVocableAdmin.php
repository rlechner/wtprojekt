<?php


class Application_Form_UpdateVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/updatevocable');
		
		$this->addElement('text','voc_id', array(
				'label'		=> 'Vocable ID:',
				'required'	=> false,
				'filters'	=> array('StringTrim'),
			));
			
		$this->addElement('text','german_voc', array(
				'label'		=> 'German Vocable:',
				'required'	=> false,
				'filters'	=> array('StringTrim'),
			));
		
				
		$this->addElement('text','english_voc', array(
				'label'		=> 'English Vocable:',
				'required'	=> false,
				'filters'	=> array('StringTrim'),
			));
			
				
		$this->addElement('text','level', array(
				'label'		=> 'Level:',
				'required'	=> false,
				'filters'	=> array('StringTrim'),
			));
		
		 $this->addElement('submit', 'update_button', array(
				'ignore'   => true,
				'label'    => 'Update',
			));
	}
}

?>