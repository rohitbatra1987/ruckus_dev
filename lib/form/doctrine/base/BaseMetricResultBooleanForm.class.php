<?php

/**
 * MetricResultBoolean form base class.
 *
 * @method MetricResultBoolean getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMetricResultBooleanForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'metric_result_id'  => new sfWidgetFormInputHidden(),
      'metric_id'         => new sfWidgetFormInputHidden(),
      'book_id'           => new sfWidgetFormInputHidden(),
      'student_id'        => new sfWidgetFormInputHidden(),
      'result_data'       => new sfWidgetFormInputText(),
      'auto_id'           => new sfWidgetFormInputText(),
      'device_id'         => new sfWidgetFormInputText(),
      'device_session_id' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'metric_result_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('metric_result_id')), 'empty_value' => $this->getObject()->get('metric_result_id'), 'required' => false)),
      'metric_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('metric_id')), 'empty_value' => $this->getObject()->get('metric_id'), 'required' => false)),
      'book_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('book_id')), 'empty_value' => $this->getObject()->get('book_id'), 'required' => false)),
      'student_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_id')), 'empty_value' => $this->getObject()->get('student_id'), 'required' => false)),
      'result_data'       => new sfValidatorString(array('max_length' => 255)),
      'auto_id'           => new sfValidatorInteger(),
      'device_id'         => new sfValidatorString(array('max_length' => 255)),
      'device_session_id' => new sfValidatorString(array('max_length' => 255)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('metric_result_boolean[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MetricResultBoolean';
  }

}
