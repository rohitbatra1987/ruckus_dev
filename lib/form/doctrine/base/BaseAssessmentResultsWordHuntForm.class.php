<?php

/**
 * AssessmentResultsWordHunt form base class.
 *
 * @method AssessmentResultsWordHunt getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssessmentResultsWordHuntForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'arwh_id'             => new sfWidgetFormInputHidden(),
      'student_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Students'), 'add_empty' => false)),
      'taps'                => new sfWidgetFormInputText(),
      'found_it'            => new sfWidgetFormInputText(),
      'incorrect_word_taps' => new sfWidgetFormTextarea(),
      'target_word'         => new sfWidgetFormInputText(),
      'time_stamp'          => new sfWidgetFormDateTime(),
      'try_number'          => new sfWidgetFormInputText(),
      'activity_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activities'), 'add_empty' => false)),
      'auto_id'             => new sfWidgetFormInputText(),
      'device_id'           => new sfWidgetFormInputText(),
      'device_session_id'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'arwh_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('arwh_id')), 'empty_value' => $this->getObject()->get('arwh_id'), 'required' => false)),
      'student_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Students'))),
      'taps'                => new sfValidatorInteger(),
      'found_it'            => new sfValidatorInteger(),
      'incorrect_word_taps' => new sfValidatorString(),
      'target_word'         => new sfValidatorString(array('max_length' => 255)),
      'time_stamp'          => new sfValidatorDateTime(),
      'try_number'          => new sfValidatorInteger(),
      'activity_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activities'))),
      'auto_id'             => new sfValidatorInteger(),
      'device_id'           => new sfValidatorString(array('max_length' => 255)),
      'device_session_id'   => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('assessment_results_word_hunt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssessmentResultsWordHunt';
  }

}
