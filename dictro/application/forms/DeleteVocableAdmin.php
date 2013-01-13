<?php


class Application_Form_DeleteVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/deletevocable');

        $this->addElement('text', 'vocableID', array(
                'label' => 'Vocable:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));       
        
        $this->addElement('submit', 'delete_button', array(
        		'ignore'   => true,
        		'label'    => 'Delete:',
        		//'label_class' => 'cssKlasseFuerDekorator',
        
        ));

    }
}

?>