<?php

/**
 * User form.
 *
 * @package    ruckus
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsersEditForm extends BaseUserForm
{
  public function configure()
  {

      $this->setWidgets(array(
      'first_name'     => new sfWidgetFormInputText(),
      'last_name'      => new sfWidgetFormInputText(),
      'additional_emails'  => new sfWidgetFormInputText(),
    ));
      $this->widgetSchema->setLabel('first_name', 'Password');
      $this->widgetSchema->setLabel('last_name', 'Confirm Password');
      $this->widgetSchema->setLabel('additional_emails', 'Additional Emails');
      
	    $this->setValidators(array(
                'additional_emails'       => new sfValidatorString(array('required' => false)),
			'first_name'       => new sfValidatorString(array('required' => true)),
			'last_name'        => new sfValidatorString(array('required' => true)))); 	
$this->widgetSchema->setNameFormat('newuser[%s]'); 
      
 
      
  }
}
