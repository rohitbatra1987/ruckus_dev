<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'           => new sfWidgetFormInputHidden(),
      'first_name'        => new sfWidgetFormInputText(),
      'last_name'         => new sfWidgetFormInputText(),
      'email_address'     => new sfWidgetFormInputText(),
      'additional_emails' => new sfWidgetFormTextarea(),
      'username'          => new sfWidgetFormInputText(),
      'salt'              => new sfWidgetFormInputText(),
      'pass'              => new sfWidgetFormInputText(),
      'is_active'         => new sfWidgetFormInputText(),
      'is_super_admin'    => new sfWidgetFormInputText(),
      'last_login'        => new sfWidgetFormDateTime(),
      'access_token'      => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'user_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_id')), 'empty_value' => $this->getObject()->get('user_id'), 'required' => false)),
      'first_name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_address'     => new sfValidatorString(array('max_length' => 255)),
      'additional_emails' => new sfValidatorString(),
      'username'          => new sfValidatorString(array('max_length' => 128)),
      'salt'              => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'pass'              => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'is_active'         => new sfValidatorInteger(array('required' => false)),
      'is_super_admin'    => new sfValidatorInteger(array('required' => false)),
      'last_login'        => new sfValidatorDateTime(array('required' => false)),
      'access_token'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
