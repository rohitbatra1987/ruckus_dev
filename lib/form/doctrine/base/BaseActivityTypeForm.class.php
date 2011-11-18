<?php

/**
 * ActivityType form base class.
 *
 * @method ActivityType getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivityTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'activity_type_id'     => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'act_type_description' => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'activity_type_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('activity_type_id')), 'empty_value' => $this->getObject()->get('activity_type_id'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'act_type_description' => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activity_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityType';
  }

}
