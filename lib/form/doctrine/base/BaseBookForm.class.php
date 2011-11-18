<?php

/**
 * Book form base class.
 *
 * @method Book getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'book_id'     => new sfWidgetFormInputHidden(),
      'level_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BookLevels'), 'add_empty' => false)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BookCategory'), 'add_empty' => false)),
      'series_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('BookSeries'), 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'bk_image'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'book_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('book_id')), 'empty_value' => $this->getObject()->get('book_id'), 'required' => false)),
      'level_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BookLevels'))),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BookCategory'))),
      'series_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('BookSeries'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'bk_image'    => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('book[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Book';
  }

}
