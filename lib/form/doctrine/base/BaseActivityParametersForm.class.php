<?php

/**
 * ActivityParameters form base class.
 *
 * @method ActivityParameters getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivityParametersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assessment_id'    => new sfWidgetFormInputHidden(),
      'activity_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'), 'add_empty' => false)),
      'ass_description'  => new sfWidgetFormTextarea(),
      'ass_data_type'    => new sfWidgetFormInputText(),
      'name'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'assessment_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('assessment_id')), 'empty_value' => $this->getObject()->get('assessment_id'), 'required' => false)),
      'activity_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'))),
      'ass_description'  => new sfValidatorString(array('required' => false)),
      'ass_data_type'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activity_parameters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityParameters';
  }

}
