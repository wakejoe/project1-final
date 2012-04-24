<?php

class Admin_PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $this->_helper->getHelper('layout')->disableLayout();
        $form = new Application_Form_Pagina();
        $this->view->form = $form;
    }


}



