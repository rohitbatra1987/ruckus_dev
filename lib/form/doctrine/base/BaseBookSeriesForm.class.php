<?php

/**
 * BookSeries form base class.
 *
 * @method BookSeries getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookSeriesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'series_id'       => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'series_icon'     => new sfWidgetFormInputText(),
      'srs_description' => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'series_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('series_id')), 'empty_value' => $this->getObject()->get('series_id'), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 255)),
      'series_icon'     => new sfValidatorString(array('max_length' => 255)),
      'srs_description' => new sfValidatorString(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('book_series[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookSeries';
  }

}
