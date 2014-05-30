<?php

class Application_Form_Signup extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $fname = new Zend_Form_Element_Text('fname'); 
        $fname->setRequired();
        $fname->addValidator(new Zend_Validate_Alpha); 
        $fname->setLabel('First Name: '); 
        $fname->setAttribs(array('style' => 'width:300px;')); 
        $fname->setOptions(array('class'=>'form-control'));
        
        
        $lname = new Zend_Form_Element_Text('lname'); 
        $lname->setRequired();
        $lname->addValidator(new Zend_Validate_Alpha); 
        $lname->setLabel('Last Name: ');
        $lname->setAttribs(array('style' => 'width:300px;')); 
        $lname->setOptions(array('class'=>'form-control'));
        
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
        
        
        $c_password = new Zend_Form_Element_Password('cpassword'); 
        $c_password->setRequired(); 
        $c_password->setLabel("Confirm Password: ");
        $c_password->setAttribs(array('style' => 'width:300px;'));
        $c_password->setOptions(array('class'=>'form-control')); 
        
        $BD = new Zend_Form_Element_Text('bd');
        $BD->setRequired(); 
        $BD->setLabel("BirthDate: ");
        $BD->addValidator(new Zend_Validate_Date);
        $BD->setAttribs(array('style' => 'width:300px;'));
        $BD->setOptions(array('class'=>'form-control'));
        
        $gender = new Zend_Form_Element_Radio('gender');
        $gender->setLabel("Gender: "); 
        $gender->addMultiOptions(array('Female','Male')); 
        $gender->setRequired();
        
        
        $submit = new Zend_Form_Element_Submit('submit');//btn btn-warning 
        $submit->setOptions(array('class'=>'btn btn-success active btn-default')); 
        
        $this->addElements(array($fname,$lname,$email,$password,$c_password,$gender,$BD,$submit));

    }


}

