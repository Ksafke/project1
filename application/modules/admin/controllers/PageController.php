<?php

class Admin_PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $pModel = new Application_Model_Page();
        $pages = $pModel->getPages();
        $this->view->pages = $pages;
    }

    public function addAction()
    {
        // layout uitzetten
        //$this->_helper->getHelper('layout')->disableLayout();
        $form = new Application_Form_PageM();
        $this->view->form = $form;
    }


}



