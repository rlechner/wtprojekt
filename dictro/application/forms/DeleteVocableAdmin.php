<?php


class Application_Form_DeleteVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/deletevocable');

        $this->addElement('text', 'vocableID', array(
                'label' => 'Vocable ID:',
                'required' => true,
                'filters'    => array('StringTrim'),
				
				'validators' => array( 
									array(
									'StringLength', false, array(3,255)),
							'validator' => 'digits',
							
						)
            ));       
        
        $this->addElement('submit', 'delete_button', array(
        		'ignore'   => true,
        		'label'    => 'Delete:',
        		//'label_class' => 'cssKlasseFuerDekorator',
        
        ));

    }
}

?>