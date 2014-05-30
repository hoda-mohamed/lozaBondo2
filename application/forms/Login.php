<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        
        $email = new Zend_Form_Element_Text('email'); 
        $email->setRequired(); 
        $email->addValidator(new Zend_Validate_EmailAddress); 
        $email->setLabel('E-mail: ');
        $email->setAttribs(array('style' => 'width:300px;'));
        $email->setOptions(array('class'=>'form-control')); 
        
        
        $password = new Zend_Form_Element_Password('password'); 
        $password->setRequired(); 
        $password->setLabel("Password: "); 
        $password->setAttribs(array('style' => 'width:300px;'));
        $password->setOptions(array('class'=>'form-control'));
        
       
        $submit = new Zend_Form_Element_Submit('submit');//btn btn-warning 
        $submit->setOptions(array('class'=>'btn btn-success active btn-default')); 
        
        $this->addElements(array($email,$password,$submit));
    }


}

