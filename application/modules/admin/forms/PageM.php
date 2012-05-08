<?php

class Admin_Form_PageM extends Zend_Form
{

    public function init()
    {
        //create form
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $page = new Admin_Form_Page();
        $this->addSubForm($page, 'page');
        $this->getSubForm('page')->removeDecorator('Fieldset');
        $this->getSubForm('page')->removeDecorator('DTDdWrapper');
        
        $pageLocal = new Application_Form_Pagina();
        $this->addSubForm($pageLocal, 'pageLocal');
        $this->getSubForm('pageLocal')->removeDecorator('Fieldset');
        $this->getSubForm('pageLocal')->removeDecorator('DTDdWrapper');
        
        $this->addElement(new Zend_Form_Element_Button('submit', array(
            'type' => 'submit', 
            'value' => 'lable.addPage', 
            'required' => false,
            'ignore' => true
        )));
    }


}

