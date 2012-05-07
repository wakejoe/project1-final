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
        $form = new Application_Form_Pagina();
        $this->view->form = $form;
        
           if ($this->getRequest()->isPost()) 
            {
            // haal alle post variabelen op 
            $postParams = $this->getRequest()->getPost();
            if ($this->view->form->isValid($postParams)){
                $params = $this->view->form->getValues();
                
                $model = new Admin_Model_Addpage();
                
                /*echo '<pre>';
                print_r($model);
                echo '</pre>';
                die();*/
                $params['pageID'] = 1;
                
                $model->insert($params);
                
                
                
                echo 'uw pagina werd toegevoegd!';
                
            }
        }
    }


}



