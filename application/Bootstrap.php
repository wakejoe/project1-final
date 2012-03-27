<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initMenu(){
        $model = new Application_Model_Page();
        $menu = $model->getMenu('nl_BE');
    }

}

