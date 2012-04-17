<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $titleUrl = $this->_getParam('titleUrl');
        $model = new Application_Model_Page();
        $page = $model->getPage($titleUrl);
        $this->view->page = $page;
        
               
    }


}

