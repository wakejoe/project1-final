<?php

class Admin_PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
    }

    public function addAction()
    {
        $this->_helper->getHelper('layout')->disableLayout();
        $form = new Admin_Form_PageM();
        $this->view->form = $form;
        
           if ($this->getRequest()->isPost()) 
            {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                $modelPageLocal = new Admin_Model_Addpage();
                $modelPage = new Admin_Model_Page();
                
                /*echo '<pre>';
                print_r($params['page']['status']);
                echo '</pre>';
                die();*/
                
                $params['pageLocal']['pageID'] = $modelPage->insert($params['page']);
                
                $modelPageLocal->insert($params['pageLocal']);
                
                
                
                echo 'uw pagina werd toegevoegd!';
                
            }
        }
    }


}



