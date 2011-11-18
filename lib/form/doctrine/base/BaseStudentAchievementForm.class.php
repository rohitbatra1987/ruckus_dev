<?php

/**
 * StudentAchievement form base class.
 *
 * @method StudentAchievement getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentAchievementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_achievement_id' => new sfWidgetFormInputHidden(),
      'student_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Students'), 'add_empty' => false)),
      'achievement_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Achievements'), 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'student_achievement_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_achievement_id')), 'empty_value' => $this->getObject()->get('student_achievement_id'), 'required' => false)),
      'student_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Students'))),
      'achievement_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Achievements'))),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('student_achievement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentAchievement';
  }

}
