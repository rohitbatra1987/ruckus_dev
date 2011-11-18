<?php
class UsersNewuserForm extends sfForm 
{ 
    public function configure() 
    { 
        parent::configure();
		$this->setWidgets(array( 
            'username' => new sfWidgetFormInput(), 
            'password' => new sfWidgetFormInputPassword(), 
			'confirmpassword' => new sfWidgetFormInputPassword(),
			'firstname' => new sfWidgetFormInput(),
            'lastname' => new sfWidgetFormInput(),
            'email' => new sfWidgetFormInput()
	    )); 
		$this->widgetSchema->setLabel('username', 'UserName');
        $this->widgetSchema->setLabel('password', 'Password');
        $this->widgetSchema->setLabel('confirmpassword', 'Confirm Password');
        $this->widgetSchema->setLabel('firstname', 'First Name');
		$this->widgetSchema->setLabel('lastname', 'Last Name');
		$this->widgetSchema->setLabel('email', 'Email');
	    $this->setValidators(array(
            'username'        => new sfValidatorString(array('required' => true)),
			'password'        => new sfValidatorString(array('required' => true)),
			'confirmpassword' => new sfValidatorString(array('required' => true)),
			'firstname'       => new sfValidatorString(array('required' => true)),
			'lastname'        => new sfValidatorString(array('required' => true)),
		    'email'           => new sfValidatorEmail()));
		$this->mergePostValidator(new sfValidatorSchemaCompare('password',
                                  sfValidatorSchemaCompare::EQUAL, 'confirmpassword',
                                  array(),
                                  array('invalid' => 'The two passwords must be the same.')));  	
		$this->widgetSchema->setNameFormat('newuser[%s]'); 
        $this->errorSchema = new 
        sfValidatorErrorSchema($this->validatorSchema); 
		parent::setup(); 
    } 
} 
?>