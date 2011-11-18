<?php
class UsersForgotPasswordForm extends sfForm 
{ 
    public function configure() 
    { 
        $this->setWidgets(array( 
            'email' => new sfWidgetFormInput()
        )); 
        $this->widgetSchema->setNameFormat('forgotpassword[%s]'); 
        $this->setValidators(array( 
            'email' => new sfValidatorEmail(array( 
                'required' => true 
            ), array( 
                'required' => 'Please enter your email' 
            )) 
        )); 
        $this->widgetSchema->setNameFormat('forgotpassword[%s]'); 
        $this->errorSchema = new 
        sfValidatorErrorSchema($this->validatorSchema); 
        parent::setup(); 
    } 
} 
?>