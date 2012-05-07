<?php

class Application_Form_Users extends Zend_Form
{

    public function init()
    {
        //create form
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setAction('login');
        
        //first name
        $this->addElement(new Zend_Form_Element_Text('login', array(
            'label' => 'username',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        //first name
        $this->addElement(new Zend_Form_Element_password('password', array(
            'label' => 'password',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        //submit button
        $this->addElement(new Zend_Form_Element_Button('submit', array(
            'type' => 'submit', 
            'value' => 'login', 
            'required' => false,
            'ignore' => true
        )));
    }


}

