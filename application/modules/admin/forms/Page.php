<?php

class Admin_Form_Page extends Zend_Form_SubForm
{

    public function init()
    {
        
        $menu = new Zend_Form_Element_Radio("menu", array(
            'label' => 'label.menu',
            'required =>' => true
        ));
        $menu->addMultiOption("ja","ja")->setAttrib("checked","checked")
               ->addMultiOption("nee","nee");
        
        $status = new Zend_Form_Element_Radio("status", array(
            'label' => 'label.status',
            'required =>' => true
        ));
        $status->addMultiOption("online","online")->setAttrib("checked","checked")
               ->addMultiOption("offline","offline");
        
        $this->addElement($menu);
        $this->addElement($status);
        
    }


}

