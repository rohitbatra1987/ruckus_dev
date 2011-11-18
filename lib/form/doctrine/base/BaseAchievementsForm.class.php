<?php

/**
 * Achievements form base class.
 *
 * @method Achievements getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAchievementsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'achievement_id'  => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'ach_description' => new sfWidgetFormTextarea(),
      'ach_image'       => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'achievement_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('achievement_id')), 'empty_value' => $this->getObject()->get('achievement_id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'ach_description' => new sfValidatorString(),
      'ach_image'       => new sfValidatorString(array('max_length' => 255)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('achievements[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Achievements';
  }

}
