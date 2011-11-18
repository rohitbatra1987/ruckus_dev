<?php

/**
 * AssessmentType form base class.
 *
 * @method AssessmentType getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssessmentTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'assessment_type_id' => new sfWidgetFormInputHidden(),
      'short_name'         => new sfWidgetFormInputText(),
      'name'               => new sfWidgetFormInputText(),
      'description'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'assessment_type_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('assessment_type_id')), 'empty_value' => $this->getObject()->get('assessment_type_id'), 'required' => false)),
      'short_name'         => new sfValidatorString(array('max_length' => 20)),
      'name'               => new sfValidatorString(array('max_length' => 255)),
      'description'        => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('assessment_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssessmentType';
  }

}
