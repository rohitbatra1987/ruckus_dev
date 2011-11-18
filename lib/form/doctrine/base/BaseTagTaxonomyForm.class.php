<?php

/**
 * TagTaxonomy form base class.
 *
 * @method TagTaxonomy getObject() Returns the current form's model object
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTagTaxonomyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_taxonomy_id' => new sfWidgetFormInputHidden(),
      'book_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Book'), 'add_empty' => false)),
      'tag_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tags'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'tag_taxonomy_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tag_taxonomy_id')), 'empty_value' => $this->getObject()->get('tag_taxonomy_id'), 'required' => false)),
      'book_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Book'))),
      'tag_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tags'))),
    ));

    $this->widgetSchema->setNameFormat('tag_taxonomy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagTaxonomy';
  }

}
