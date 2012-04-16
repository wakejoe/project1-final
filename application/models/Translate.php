<?php

class Application_Model_Translate extends Zend_Db_Table_Abstract
{
    protected $_name = 'translate';
    protected $_primary = 'translateID';
    
    /**
     *  Get translations by local
     * 
     * @param Zend_Locale $locale
     * @return Zend_Db_Table_Abstract $result
     */
    public function getTranslationByLocale(Zend_Locale $locale){
        
        $result = $this->select()->where('local = ?', $locale);
        return $result;
    }
}

