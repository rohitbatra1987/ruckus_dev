<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BookCategory', 'doctrine');

/**
 * BaseBookCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $category_id
 * @property string $name
 * @property string $bk_cat_description
 * @property string $bk_cat_code
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $Book
 * 
 * @method integer             getCategoryId()         Returns the current record's "category_id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getBkCatDescription()   Returns the current record's "bk_cat_description" value
 * @method string              getBkCatCode()          Returns the current record's "bk_cat_code" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method Doctrine_Collection getBook()               Returns the current record's "Book" collection
 * @method BookCategory        setCategoryId()         Sets the current record's "category_id" value
 * @method BookCategory        setName()               Sets the current record's "name" value
 * @method BookCategory        setBkCatDescription()   Sets the current record's "bk_cat_description" value
 * @method BookCategory        setBkCatCode()          Sets the current record's "bk_cat_code" value
 * @method BookCategory        setCreatedAt()          Sets the current record's "created_at" value
 * @method BookCategory        setUpdatedAt()          Sets the current record's "updated_at" value
 * @method BookCategory        setBook()               Sets the current record's "Book" collection
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBookCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('book_category');
        $this->hasColumn('category_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('bk_cat_description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('bk_cat_code', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Book', array(
             'local' => 'category_id',
             'foreign' => 'category_id'));
    }
}