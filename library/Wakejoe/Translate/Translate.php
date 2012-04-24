<?php

class Wakejoe_Translate_Translate extends Zend_Controller_Plugin_Abstract
{
    
    public function preDispatch(Zend_Controller_Request_Abstract $request){
       
        $locale = new Zend_Locale($request->getParam('lang'));
        
        Zend_Registry::set('Zend_Locale', $locale);
        
        $translate = new Zend_Translate('array', array('yes' => 'ja'), $locale);
        
        $model = new Application_Model_Translate();
        $translations = $model->getTranslationByLocale($locale);
        
        foreach ($translations as $translation){
            $t = array($translation->tag => $translation->translation);
            $translate->addTranslation($t, $locale);
        }
        
        Zend_Registry::set('Zend_Translate', $translate);
    }
}
?>
