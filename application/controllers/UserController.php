<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Users();
        $this->view->form = $form;
        
        // controle en mail versturen
        if ($this->getRequest()->isPost())
        {
            $postParams = $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                //login form
                $username = $params['username'];
                $password = $params['password'];
                
            }
        }
    }


}

