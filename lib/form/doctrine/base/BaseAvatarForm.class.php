<?php

/**
 * Avatar form base class.
 *
 * @method Avatar getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAvatarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'avatar_id'  => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'avt_image'  => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'avatar_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('avatar_id')), 'empty_value' => $this->getObject()->get('avatar_id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'avt_image'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('avatar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Avatar';
  }

}
