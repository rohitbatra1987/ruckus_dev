<?php

/**
 * AssessmentResultFloat form base class.
 *
 * @method AssessmentResultFloat getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssessmentResultFloatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assmt_result_id'   => new sfWidgetFormInputHidden(),
      'activity_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activities'), 'add_empty' => true)),
      'student_id'        => new sfWidgetFormInputHidden(),
      'assessment_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityParameters'), 'add_empty' => true)),
      'result_data'       => new sfWidgetFormInputText(),
      'auto_id'           => new sfWidgetFormInputText(),
      'device_id'         => new sfWidgetFormInputText(),
      'device_session_id' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'assmt_result_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('assmt_result_id')), 'empty_value' => $this->getObject()->get('assmt_result_id'), 'required' => false)),
      'activity_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activities'), 'required' => false)),
      'student_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_id')), 'empty_value' => $this->getObject()->get('student_id'), 'required' => false)),
      'assessment_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityParameters'), 'required' => false)),
      'result_data'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'auto_id'           => new sfValidatorInteger(),
      'device_id'         => new sfValidatorString(array('max_length' => 255)),
      'device_session_id' => new sfValidatorString(array('max_length' => 255)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('assessment_result_float[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssessmentResultFloat';
  }

}
