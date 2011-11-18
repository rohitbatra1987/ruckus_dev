<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GraphImages', 'doctrine');

/**
 * BaseGraphImages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $graph_id
 * @property integer $student_id
 * @property string $image_url
 * @property string $graph_type
 * @property integer $generate_time
 * @property string $graph_name
 * 
 * @method integer     getGraphId()       Returns the current record's "graph_id" value
 * @method integer     getStudentId()     Returns the current record's "student_id" value
 * @method string      getImageUrl()      Returns the current record's "image_url" value
 * @method string      getGraphType()     Returns the current record's "graph_type" value
 * @method integer     getGenerateTime()  Returns the current record's "generate_time" value
 * @method string      getGraphName()     Returns the current record's "graph_name" value
 * @method GraphImages setGraphId()       Sets the current record's "graph_id" value
 * @method GraphImages setStudentId()     Sets the current record's "student_id" value
 * @method GraphImages setImageUrl()      Sets the current record's "image_url" value
 * @method GraphImages setGraphType()     Sets the current record's "graph_type" value
 * @method GraphImages setGenerateTime()  Sets the current record's "generate_time" value
 * @method GraphImages setGraphName()     Sets the current record's "graph_name" value
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGraphImages extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('graph_images');
        $this->hasColumn('graph_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('student_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('image_url', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('graph_type', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('generate_time', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('graph_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}