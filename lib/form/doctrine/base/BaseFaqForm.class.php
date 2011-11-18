<?php

/**
 * Faq form base class.
 *
 * @method Faq getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFaqForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'faq_id'          => new sfWidgetFormInputHidden(),
      'faq_title'       => new sfWidgetFormInputText(),
      'faq_description' => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'faq_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('faq_id')), 'empty_value' => $this->getObject()->get('faq_id'), 'required' => false)),
      'faq_title'       => new sfValidatorString(array('max_length' => 255)),
      'faq_description' => new sfValidatorString(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('faq[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Faq';
  }

}
