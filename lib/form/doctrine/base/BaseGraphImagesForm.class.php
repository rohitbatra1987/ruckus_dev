<?php

/**
 * GraphImages form base class.
 *
 * @method GraphImages getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGraphImagesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'graph_id'      => new sfWidgetFormInputHidden(),
      'student_id'    => new sfWidgetFormInputText(),
      'image_url'     => new sfWidgetFormTextarea(),
      'graph_type'    => new sfWidgetFormInputText(),
      'generate_time' => new sfWidgetFormInputText(),
      'graph_name'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'graph_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('graph_id')), 'empty_value' => $this->getObject()->get('graph_id'), 'required' => false)),
      'student_id'    => new sfValidatorInteger(),
      'image_url'     => new sfValidatorString(),
      'graph_type'    => new sfValidatorString(array('max_length' => 50)),
      'generate_time' => new sfValidatorInteger(),
      'graph_name'    => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('graph_images[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GraphImages';
  }

}
