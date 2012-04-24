<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRegisterControllerPlugins() { 
        $this->bootstrap('frontController') ; 
        $front = $this->getResource('frontController') ; 
        $front->registerPlugin(new Wakejoe_Translate_Translate()); 
        $front->registerPlugin(new Wakejoe_Navigation_Navigation()); 
    } 
        
    public function _initDbAdapter(){
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db', $db);
    }
    
    public function _initMenu(){
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->addHelperPath(realpath(APPLICATION_PATH . '/views/helpers'), 'Application_View_Helper');
        $model = new Application_Model_Page();
        $pages = $model->getMenu('nl_BE');
        
        $container = new Zend_Navigation();
        
        foreach ($pages as $page){
            $menu = new Zend_Navigation_Page_Mvc(array(
                'label'         => $page['title'],
                //'controller'    => strtolower($page['title']),
                //'action'        => 'index',
                'route'        => 'page',
                'params'      => array('titleUrl' => $page['titleURL'])
            ));
            $container->addPage($menu);
        }
        
        //container toevoegen aan de nav
        $view->navigation($container);
        
        //return $container;
    }
    
    protected function _initTranslate(){
        /*$locale = new Zend_Locale('nl_BE'); //normaal in de prédispatch anders kan je de taal niet uitlezen
        Zend_Registry::set('Zend_Locale', $locale);
        
        $translate = new Zend_Translate('array', array('yes' => 'ja'), $locale);
        
        $model = new Application_Model_Translate();
        $translations = $model->getTranslationByLocale($locale);
        
        foreach ($translations as $translation){
            $t = array($translation->tag => $translation->translation);
            $translate->addTranslation($t, $locale);
        }
        
        Zend_Registry::set('Zend_Translate', $translate);
        
        
        $this->_request->getParam('lang');
        echo '<pre>';
        print_r($req);
        echo '</pre>';
        die();*/
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        $front->setRequest(new Zend_Controller_Request_Http());

        $request = $front->getRequest();
        Wakejoe_Translate_Translate::preDispatch($request);
        
    }


    /**
     * Creates all custom routers
     * 
     * @param array $options 
     * @return Zend_Controller_Router_Route
     */
    /*public function _initRouter(array $options = null){
        
        // get the router
        $router = $this->getResource('frontController')->getRouter();
        
        // add custom route
        $router->addRoute('page',
                new Zend_Controller_Router_Route('pagina/:titleUrl', array(
                    'controller' => 'page',
                    'action'     => 'index'
                )));
    
        return $router;
    }*/
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

