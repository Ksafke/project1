<?php

class Application_Form_PageLocal extends Zend_Form
{

    public function init()
    {
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
      
        // TITLE
        $this->addElement(new Zend_Form_Element_Text('title',array(
            'label' => 'label.title',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        // TITLEURL
        $this->addElement(new Zend_Form_Element_Text('titleUrl',array(
            'label' => 'label.titleUrl',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        // description
        $this->addElement(new Zend_Form_Element_Textarea('description',array(
            'label' => 'label.description',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        // LOCAL
        $this->addElement(new Zend_Form_Element_Text('local',array(
            'label' => 'label.local',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        
    }


}

