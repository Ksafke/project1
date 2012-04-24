<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRegisterControllerPlugins() {
        $this->bootstrap('frontController') ;
        $front = $this->getResource('frontController') ;
        $front->registerPlugin(new Syntra_Translate_Translate());
        $front->registerPlugin(new Syntra_Navigation_Navigation());
    }
    
    public function _initDbAdapter(){
        $this->bootstrap('db');
        $db = $this->getResource('db');
        // maak een soort global variabele aan
        Zend_Registry::set('db', $db);

    }
    
    public function _initView(){
        
        // we halen de view van de layout op
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->addHelperPath(realpath(APPLICATION_PATH . '/views/helpers'), 'Application_View_Helper');
        
    }
    
    /**
     * Put after _initView
     * Creates all custom routers
     * @param array $options
     * @return Zend_Controller_Router_Route 
     */
    public function _initRouter(array $options = null){
        
        // get the router
        $router = $this->getResource('frontController')->getRouter();
        
        // add custom route
        $router->addRoute('lang', 
                new Zend_Controller_Router_Route(':lang', array(
                    'controller' => 'index',
                    'action'     => 'index'
                )));
        
        // add custom route
        $router->addRoute('login', 
                new Zend_Controller_Router_Route(':lang/login', array(
                    'controller' => 'users',
                    'action'     => 'login'
                )));
        
        // add custom route
        $router->addRoute('page', 
                new Zend_Controller_Router_Route(':lang/pagina/:titleUrl', array(
                    'controller' => 'page',
                    'action'     => 'index'
                )));
        
        
        
        return $router;
    }
    

}

