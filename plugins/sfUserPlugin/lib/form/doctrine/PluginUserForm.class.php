<?php

/**
 * User form.
 *
 * @package    ruckus
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginUserForm extends BaseUserForm
{
  public function configure()
  {

      $this->setWidgets(array(
      'first_name'     => new sfWidgetFormInputText(),
      'last_name'      => new sfWidgetFormInputText(),
      'email_address'  => new sfWidgetFormInputText(),
      'username'       => new sfWidgetFormInputText(),
      'pass'           => new sfWidgetFormInputPassword(),
      'confirm_password' => new sfWidgetFormInputPassword(),
    ));
      $this->widgetSchema->setLabel('pass', 'Password');
      $this->widgetSchema->setLabel('confirm_password', 'Confirm Password');
      
	    $this->setValidators(array(
            'username'        => new sfValidatorString(array('required' => true)),
			'pass'        => new sfValidatorString(array('required' => true)),
			'confirm_password' => new sfValidatorString(array('required' => true)),
			'first_name'       => new sfValidatorString(array('required' => true)),
			'last_name'        => new sfValidatorString(array('required' => true)),
		    'email_address'           => new sfValidatorEmail()));
		$this->mergePostValidator(new sfValidatorSchemaCompare('pass',
                                  sfValidatorSchemaCompare::EQUAL, 'confirm_password',
                                  array(),
                                  array('invalid' => 'The two passwords must be the same.')));  	
$this->widgetSchema->setNameFormat('newuser[%s]'); 
      
 
      
  }
}
