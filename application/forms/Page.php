<?php

class Application_Form_Page extends Zend_Form
{

    public function init()
    {
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
      
        // TITLE
        $this->addElement(new Zend_Form_Element_Text('menu',array(
            'label' => 'label.menu',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        // TITLEURL
        $this->addElement(new Zend_Form_Element_Text('status',array(
            'label' => 'label.status',
            'filters' => array('stringTrim'),
            'required' => true
        )));

        
        
    }


}

