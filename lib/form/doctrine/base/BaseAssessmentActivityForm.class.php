<?php

/**
 * AssessmentActivity form base class.
 *
 * @method AssessmentActivity getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssessmentActivityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ass_act_id'         => new sfWidgetFormInputHidden(),
      'assessment_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AssessmentType'), 'add_empty' => false)),
      'activity_type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'ass_act_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('ass_act_id')), 'empty_value' => $this->getObject()->get('ass_act_id'), 'required' => false)),
      'assessment_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AssessmentType'))),
      'activity_type_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'))),
    ));

    $this->widgetSchema->setNameFormat('assessment_activity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssessmentActivity';
  }

}
