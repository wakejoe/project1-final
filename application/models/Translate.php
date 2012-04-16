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
        
        $select = $this->select()->where('local = ?', $locale);
        $result = $this->fetchAll($select);
        return $result;
    }
}

