<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AssessmentType', 'doctrine');

/**
 * BaseAssessmentType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $assessment_type_id
 * @property string $short_name
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $AssessmentActivity
 * 
 * @method integer             getAssessmentTypeId()   Returns the current record's "assessment_type_id" value
 * @method string              getShortName()          Returns the current record's "short_name" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method Doctrine_Collection getAssessmentActivity() Returns the current record's "AssessmentActivity" collection
 * @method AssessmentType      setAssessmentTypeId()   Sets the current record's "assessment_type_id" value
 * @method AssessmentType      setShortName()          Sets the current record's "short_name" value
 * @method AssessmentType      setName()               Sets the current record's "name" value
 * @method AssessmentType      setDescription()        Sets the current record's "description" value
 * @method AssessmentType      setAssessmentActivity() Sets the current record's "AssessmentActivity" collection
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssessmentType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('assessment_type');
        $this->hasColumn('assessment_type_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('short_name', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
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
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AssessmentActivity', array(
             'local' => 'assessment_type_id',
             'foreign' => 'assessment_type_id'));
    }
}