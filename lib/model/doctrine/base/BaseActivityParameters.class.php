<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ActivityParameters', 'doctrine');

/**
 * BaseActivityParameters
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $assessment_id
 * @property integer $activity_type_id
 * @property string $ass_description
 * @property string $ass_data_type
 * @property string $name
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property ActivityType $ActivityType
 * @property Doctrine_Collection $AssessmentResultBoolean
 * @property Doctrine_Collection $AssessmentResultFloat
 * @property Doctrine_Collection $AssessmentResultInteger
 * @property Doctrine_Collection $AssessmentResultVarchar
 * 
 * @method integer             getAssessmentId()            Returns the current record's "assessment_id" value
 * @method integer             getActivityTypeId()          Returns the current record's "activity_type_id" value
 * @method string              getAssDescription()          Returns the current record's "ass_description" value
 * @method string              getAssDataType()             Returns the current record's "ass_data_type" value
 * @method string              getName()                    Returns the current record's "name" value
 * @method timestamp           getCreatedAt()               Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()               Returns the current record's "updated_at" value
 * @method ActivityType        getActivityType()            Returns the current record's "ActivityType" value
 * @method Doctrine_Collection getAssessmentResultBoolean() Returns the current record's "AssessmentResultBoolean" collection
 * @method Doctrine_Collection getAssessmentResultFloat()   Returns the current record's "AssessmentResultFloat" collection
 * @method Doctrine_Collection getAssessmentResultInteger() Returns the current record's "AssessmentResultInteger" collection
 * @method Doctrine_Collection getAssessmentResultVarchar() Returns the current record's "AssessmentResultVarchar" collection
 * @method ActivityParameters  setAssessmentId()            Sets the current record's "assessment_id" value
 * @method ActivityParameters  setActivityTypeId()          Sets the current record's "activity_type_id" value
 * @method ActivityParameters  setAssDescription()          Sets the current record's "ass_description" value
 * @method ActivityParameters  setAssDataType()             Sets the current record's "ass_data_type" value
 * @method ActivityParameters  setName()                    Sets the current record's "name" value
 * @method ActivityParameters  setCreatedAt()               Sets the current record's "created_at" value
 * @method ActivityParameters  setUpdatedAt()               Sets the current record's "updated_at" value
 * @method ActivityParameters  setActivityType()            Sets the current record's "ActivityType" value
 * @method ActivityParameters  setAssessmentResultBoolean() Sets the current record's "AssessmentResultBoolean" collection
 * @method ActivityParameters  setAssessmentResultFloat()   Sets the current record's "AssessmentResultFloat" collection
 * @method ActivityParameters  setAssessmentResultInteger() Sets the current record's "AssessmentResultInteger" collection
 * @method ActivityParameters  setAssessmentResultVarchar() Sets the current record's "AssessmentResultVarchar" collection
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseActivityParameters extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('activity_parameters');
        $this->hasColumn('assessment_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('activity_type_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('ass_description', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('ass_data_type', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
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
        $this->hasOne('ActivityType', array(
             'local' => 'activity_type_id',
             'foreign' => 'activity_type_id'));

        $this->hasMany('AssessmentResultBoolean', array(
             'local' => 'assessment_id',
             'foreign' => 'assessment_id'));

        $this->hasMany('AssessmentResultFloat', array(
             'local' => 'assessment_id',
             'foreign' => 'assessment_id'));

        $this->hasMany('AssessmentResultInteger', array(
             'local' => 'assessment_id',
             'foreign' => 'assessment_id'));

        $this->hasMany('AssessmentResultVarchar', array(
             'local' => 'assessment_id',
             'foreign' => 'assessment_id'));
    }
}