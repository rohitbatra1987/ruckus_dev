<?php

/**
 * BookLevels form base class.
 *
 * @method BookLevels getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookLevelsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'level_id'          => new sfWidgetFormInputHidden(),
      'level_code'        => new sfWidgetFormInputText(),
      'name'              => new sfWidgetFormInputText(),
      'level_description' => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'level_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('level_id')), 'empty_value' => $this->getObject()->get('level_id'), 'required' => false)),
      'level_code'        => new sfValidatorString(array('max_length' => 50)),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'level_description' => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('book_levels[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookLevels';
  }

}
