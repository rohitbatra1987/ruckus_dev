<?php

/**
 * Activities form base class.
 *
 * @method Activities getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivitiesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'activity_id'      => new sfWidgetFormInputHidden(),
      'book_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'activity_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'), 'add_empty' => false)),
      'name'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'activity_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('activity_id')), 'empty_value' => $this->getObject()->get('activity_id'), 'required' => false)),
      'book_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'))),
      'activity_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityType'))),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activities[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Activities';
  }

}
