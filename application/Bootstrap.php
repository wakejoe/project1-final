<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    public function _initDbAdapter(){
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db', $db);
    }
    
    /**
     * Creates all custom routers
     * 
     * @param array $options 
     * @return Zend_Controller_Router_Route
     */
    public function _initRouter(array $options = null){
        
        // get the router
        $router = $this->getResource('frontController')->getRouter();
        
        // add custom route
        $router->addRoute('page', new Zend_Controller_Router_Route('pagina/:titleUrl', array('controller' => 'page', 'action' => 'index')));
    
        return $router;
    }
    
    public function _initMenu(){
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        
        $model = new Application_Model_Page();
        $pages = $model->getMenu('nl_BE');
        
        $container = new Zend_Navigation();
        
        foreach ($pages as $page){
            $menu = new Zend_Navigation_Page_Mvc(array(
                'label'         => $page['title'],
                'controller'    => strtolower($page['title']),
                'action'        => 'index',
                'params'      => array('titleUrl' => $page['titleURL'])
            ));
            $container->addPage($menu);
        }
        
        //container toevoegen aan de nav
        $view->navigation($container);
        
        //return $container;
    }

}

