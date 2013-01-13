<?php


class Application_Form_SearchVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/insertvocable');

        $this->addElement('text', 'search_voc', array(
        		'label'	=> 'Vocable:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
			
		 $this->addElement('submit', 'search_button', array(
				'ignore'   => true,
				'label'    => 'Search',
				
			));
	}
}