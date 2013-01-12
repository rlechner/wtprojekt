<?php


class Application_Form_SearchVocableAdmin extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

		$this->setAction('admin/searchvocable');

        $this->addElement('text', 'search_voc', array(
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
			
		 $this->addElement('submit', 'search_button', array(
				'ignore'   => true,
				'label'    => 'Search',
				
			));
