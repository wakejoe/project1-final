<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    public function _initDbAdapter(){
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db', $db);
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
                'params'      => array('titelUrl' => $page['titleURL'])
            ));
            $container->addPage($menu);
        }
        
        //container toevoegen aan de nav
        $view->navigation($container);
        
        //return $container;
    }

}

