<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $this->view->form = $this->view->loginFormulier();
         // controle en mail versturen
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                echo '<pre>';
                print_r($this->view->form->getErrors());
                echo '</pre>';
                die();
            }else{
                $loginErrors = new Zend_Session_Namespace('loginErrors');
                $loginErrors->errors = $this->view->form->getErrors();
            }
        }
    }


}



