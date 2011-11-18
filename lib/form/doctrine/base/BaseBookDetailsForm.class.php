<?php

/**
 * BookDetails form base class.
 *
 * @method BookDetails getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'book_detail_id'      => new sfWidgetFormInputHidden(),
      'book_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'bk_content_location' => new sfWidgetFormInputText(),
      'bk_price'            => new sfWidgetFormInputText(),
      'bk_description'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'book_detail_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('book_detail_id')), 'empty_value' => $this->getObject()->get('book_detail_id'), 'required' => false)),
      'book_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'))),
      'bk_content_location' => new sfValidatorString(array('max_length' => 255)),
      'bk_price'            => new sfValidatorString(array('max_length' => 255)),
      'bk_description'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('book_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BookDetails';
  }

}
