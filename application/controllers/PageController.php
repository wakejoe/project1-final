<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $title = $this->_getParam('titleUrl'); 
        $model = new Application_Model_Page();
        $pages = $model->getPage($title);
        
        $this->view->page = $pages;
    }


}

