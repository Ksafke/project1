<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $this->_helper->getHelper('layout')->disableLayout();
       echo 'admin';
    }


}

