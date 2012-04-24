<?php

class Application_View_Helper_LoginFormulier extends Zend_View_Helper_Abstract
{

    public function loginFormulier() {
        $errors = new Zend_Session_Namespace('loginErrors');
        //var_dump($errors->errors);
        $form = new Application_Form_Login();
        if(Zend_Session::namespaceIsset('loginErrors')){
            $form->setErrors($errors->errors);
            unset($errors);
        }

        return $form;
    }
}