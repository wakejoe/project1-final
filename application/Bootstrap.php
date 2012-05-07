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
    }
    
    public function _initAutoload(){
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Admin',
            'basePath' => APPLICATION_PATH.'/modules/admin/'
        ));
        return $autoloader;
    }
    
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
                    'controller' => 'user',
                    'action'     => 'index'
                )));
        
        // add custom route
        $router->addRoute('page',
                new Zend_Controller_Router_Route(':lang/pagina/:titleUrl', array(
                    'controller' => 'page',
                    'action'     => 'index'
                )));
        
        // add admin route
        $router->addRoute('admin',
                new Zend_Controller_Router_Route('admin/:controller/:action', array(
                    'module'     => 'admin',
                    'controller' => 'index',
                    'action'     => 'index'
                )));
            
        return $router;
    }

}

