<?php

class Application_Form_Pagina extends Zend_Form_SubForm
{

    public function init()
    {
        //create form
        //$this->setMethod('post'); Niet nodig want dit wordt op de merge form gedaan.
        //$this->setAttrib('enctype', 'multipart/form-data');
        
        //TITLE
        $this->addElement(new Zend_Form_Element_Text('title', array(
            'label' => 'label.title',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        //URL
        $this->addElement(new Zend_Form_Element_Text('titleURL', array(
            'label' => 'label.titelURL',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        //description
        $this->addElement(new Zend_Form_Element_Text('description', array(
            'label' => 'label.description',
            'filters' => array('stringTrim'),
            'required =>' => true
        )));
        
        /*submit button Deze knop komt bij de merge form 
        $this->addElement(new Zend_Form_Element_Button('submit', array(
            'type' => 'submit', 
            'value' => 'lable.addPage', 
            'required' => false,
            'ignore' => true
        )));*/
    }


}

