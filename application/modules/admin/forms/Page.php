<?php

class Admin_Form_Page extends Zend_Form_SubForm
{

    public function init()
    {
        //menu
        $this->addElement(new Zend_Form_Element_Text('menu', array(
            'label' => 'label.menu',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        //status
        $this->addElement(new Zend_Form_Element_Text('status', array(
            'label' => 'label.status',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
    }


}

