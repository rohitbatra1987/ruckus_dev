<?php

/**
 * Students form base class.
 *
 * @method Students getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id'    => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'stu_fname'     => new sfWidgetFormInputText(),
      'stu_lname'     => new sfWidgetFormInputText(),
      'stu_gender'    => new sfWidgetFormInputText(),
      'stu_age'       => new sfWidgetFormInputText(),
      'stu_avatar_id' => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'student_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_id')), 'empty_value' => $this->getObject()->get('student_id'), 'required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'stu_fname'     => new sfValidatorString(array('max_length' => 50)),
      'stu_lname'     => new sfValidatorString(array('max_length' => 50)),
      'stu_gender'    => new sfValidatorInteger(),
      'stu_age'       => new sfValidatorInteger(),
      'stu_avatar_id' => new sfValidatorInteger(),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('students[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Students';
  }

}
