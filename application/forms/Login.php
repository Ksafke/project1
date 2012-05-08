<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $l = Zend_Registry::get('Zend_Locale');
        $url = $l . '/login';
        // formulier aanmaken
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        //$this->setAction($url);
      
        // LOGIN
        $this->addElement(new Zend_Form_Element_Text('login',array(
            'label' => 'label.login',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        // PASSWORD
        $this->addElement(new Zend_Form_Element_Text('password',array(
            'label' => 'label.password',
            'filters' => array('stringTrim'),
            'required' => true
        )));
        
        $btn = new Zend_Form_Element_Button('submit',array(
            'type' => 'submit',
            'value' => 'label.login',
            'required' => false,
            'ignore'  => true,
        ));
        
        $this->addElement($btn);
    }


}

