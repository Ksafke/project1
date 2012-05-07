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
                $authAdapter->setTableName('users') // table name
                        ->setIdentityColumn('username') // veld gebruikersnaam
                        ->setCredentialColumn('password') // veld wachtwoord
                        ->setIdentity($params['login']) // form info
                        ->setCredential(md5($params['password']));
                $authResult = $auth->authenticate($authAdapter);


                if($authResult->isValid()){
                    $identity = Zend_Auth::getInstance()->getIdentity();

                    echo 'Ingelogd als ' . $identity;
                    // get userdata based on hte identity
                }else{
                    // TODO define errors
                    foreach ($authResult->getMessages() as $message) {
                        echo $message . '<br />';
                    }
                    $this->_redirect('/');
                }

            }else{
                $loginErrors = new Zend_Session_Namespace('loginErrors');
                $loginErrors->errors = $this->view->form->getErrors();

            }
        }
    }


}



