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
        $this->view->form = new Application_Form_Login();

         // controle en mail versturen
        if ($this->getRequest()->isPost()) {
            // haal alle post variabelen op
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                
                $params = $this->view->form->getValues();
                
                $auth = Zend_Auth::getInstance();
                
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
                
                $authAdapter->setTableName('users')
                            ->setIdentityColumn('username')
                            ->setCredentialColumn('password')
                            ->setIdentity($params['login'])
                            ->setCredential(md5($params['password']));
                
                $result = $auth->authenticate($authAdapter);
                
                if ($result->isValid()) {
                    
                    $identity = Zend_Auth::getInstance()->getIdentity();
                    echo 'Ingelogd als ' . $identity;
                    
                } else {
                    
                    foreach ($result->getMessages() as $message) {
                        echo $message;
                    }
                    
                    // doen wat je wilt ... redirect, error, ... 
                    
                }
                

            }else{
                $loginErrors = new Zend_Session_Namespace('loginErrors');
                $loginErrors->errors = $this->view->form->getErrors();

            }
        }
    }


}



