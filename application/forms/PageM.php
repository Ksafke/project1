<?php

class Application_Form_PageM extends Zend_Form
{

    public function init()
    {
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
      
        $page = new Application_Form_Page();
        
        $this->addSubForm($page, 'Page');
        $this->getSubForm('Page')->removeDecorator('Fieldset');
        $this->getSubForm('Page')->removeDecorator('DTDdWrapper');

        
        $pageLocal = new Application_Form_PageLocal();
        
        $this->addSubForm($pageLocal, 'PageLocal');
        $this->getSubForm('PageLocal')->removeDecorator('Fieldset');
        $this->getSubForm('PageLocal')->removeDecorator('DTDdWrapper');
    
        $btn = new Zend_Form_Element_Button('submit',array(
            'type' => 'submit',
            'value' => 'label.addPage',
            'required' => false,
            'ignore'  => true,
        ));
        
        $this->addElement($btn);
        
    }


}

