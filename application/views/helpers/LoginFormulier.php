<?php

class Application_View_Helper_LoginFormulier extends Zend_View_Helper_Abstract{
    
    public function loginFormulier() {
        
        $form = new Application_Form_Users();
        return $form;
    }
}
