<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
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
        
        $model = new Application_Model_Page();
        $pages = $model->getMenu('nl_BE');
        
        $container = new Zend_Navigation();
        
        foreach ($pages as $page) {
            $menu = new Zend_Navigation_Page_Mvc(array(
                'label'      => $page['title'],
                //'controller' => strtolower($page['title']),
                //'action'     => 'index',
                'route'      => 'page',   
                'params'     => array('titleUrl' => $page['titleURL'])
            ));
            $container->addPage($menu);
        }
        
        // container toevoegen aan de navigation
        $view->navigation($container);
        
        
        //return $container;
    }
    
    public function _initTranslate(){
        
        $locale = new Zend_Locale('nl_BE');
        Zend_Registry::set('Zend_Locale',$locale);
        
        $translate = new Zend_Translate('array', array('yes' => 'ja'), $locale);
        
        $model = new Application_Model_Translate();
        $translations = $model->getTranslationByLocale($locale);
        
        // haal alle vertalingen op voor de taal van locale
        foreach ($translations as $translation) {
            $t = array($translation->tag => $translation->translation);
            $translate->addTranslation($t, $locale);
        }
        // beschikbaar maken voor de rest van de website
        Zend_Registry::set('Zend_Translate', $translate);
        
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
        $router->addRoute('page', 
                new Zend_Controller_Router_Route('pagina/:titleUrl', array(
                    'controller' => 'page',
                    'action'     => 'index'
                )));
        
        return $router;
    }
    

}

