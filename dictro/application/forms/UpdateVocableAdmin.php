<?php


class Application_Form_UpdateVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/updatevocable');
		
		$this->addElement('text','voc_id', array(
				'label'		=> 'Vocable ID:',
				'required'	=> true,
				'filters'	=> array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(1,6)),
							'validator' => 'digits',
							
						)
			));
			
		$this->addElement('text','german_voc', array(
				'label'		=> 'German Vocable:',
				'required'	=> true,
				'filters'	=> array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,255)),
							'validator' => 'alpha',
							
						)
				
			));
		
				
		$this->addElement('text','english_voc', array(
				'label'		=> 'English Vocable:',
				'required'	=> true,
				'filters'	=> array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,255)),
							'validator' => 'alpha',
							
						)
			));
			
				
		$this->addElement('text','level', array(
				'label'		=> 'Level:',
				'required'	=> true,
				'filters'	=> array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(1,2)),
							'validator' => 'digits',
							
						)
			));
		
		 $this->addElement('submit', 'update_button', array(
				'ignore'   => true,
				'label'    => 'Update',
			));
	}
}

?>