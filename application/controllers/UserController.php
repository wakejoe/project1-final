<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->form = $this->view->loginFormulier();
        
        // controle en mail versturen
        if ($this->getRequest()->isPost())
        {
            $postParams = $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                echo '<pre>';
                print_r($params);
                echo '</pre>';
                die();
      
            }else{
                
                die('alles invullen!');
                
           }
        }
    }


}

