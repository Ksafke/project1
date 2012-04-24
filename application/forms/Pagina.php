<?php

class Application_Form_Pagina extends Zend_Form
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
        // description
        $this->addElement(new Zend_Form_Element_Textarea('description',array(
            'label' => 'label.description',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        $btn = new Zend_Form_Element_Button('submit',array(
            'type' => 'submit',
            'value' => 'label.addPage',
            'required' => false,
            'ignore'  => true,
        ));
        
        $this->addElement($btn);
    }


}

