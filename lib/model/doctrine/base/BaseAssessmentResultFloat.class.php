<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AssessmentResultFloat', 'doctrine');

/**
 * BaseAssessmentResultFloat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $assmt_result_id
 * @property integer $activity_id
 * @property integer $student_id
 * @property integer $assessment_id
 * @property string $result_data
 * @property integer $auto_id
 * @property string $device_id
 * @property string $device_session_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Activities $Activities
 * @property ActivityParameters $ActivityParameters
 * @property Students $Students
 * 
 * @method integer               getAssmtResultId()      Returns the current record's "assmt_result_id" value
 * @method integer               getActivityId()         Returns the current record's "activity_id" value
 * @method integer               getStudentId()          Returns the current record's "student_id" value
 * @method integer               getAssessmentId()       Returns the current record's "assessment_id" value
 * @method string                getResultData()         Returns the current record's "result_data" value
 * @method integer               getAutoId()             Returns the current record's "auto_id" value
 * @method string                getDeviceId()           Returns the current record's "device_id" value
 * @method string                getDeviceSessionId()    Returns the current record's "device_session_id" value
 * @method timestamp             getCreatedAt()          Returns the current record's "created_at" value
 * @method timestamp             getUpdatedAt()          Returns the current record's "updated_at" value
 * @method Activities            getActivities()         Returns the current record's "Activities" value
 * @method ActivityParameters    getActivityParameters() Returns the current record's "ActivityParameters" value
 * @method Students              getStudents()           Returns the current record's "Students" value
 * @method AssessmentResultFloat setAssmtResultId()      Sets the current record's "assmt_result_id" value
 * @method AssessmentResultFloat setActivityId()         Sets the current record's "activity_id" value
 * @method AssessmentResultFloat setStudentId()          Sets the current record's "student_id" value
 * @method AssessmentResultFloat setAssessmentId()       Sets the current record's "assessment_id" value
 * @method AssessmentResultFloat setResultData()         Sets the current record's "result_data" value
 * @method AssessmentResultFloat setAutoId()             Sets the current record's "auto_id" value
 * @method AssessmentResultFloat setDeviceId()           Sets the current record's "device_id" value
 * @method AssessmentResultFloat setDeviceSessionId()    Sets the current record's "device_session_id" value
 * @method AssessmentResultFloat setCreatedAt()          Sets the current record's "created_at" value
 * @method AssessmentResultFloat setUpdatedAt()          Sets the current record's "updated_at" value
 * @method AssessmentResultFloat setActivities()         Sets the current record's "Activities" value
 * @method AssessmentResultFloat setActivityParameters() Sets the current record's "ActivityParameters" value
 * @method AssessmentResultFloat setStudents()           Sets the current record's "Students" value
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssessmentResultFloat extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('assessment_result_float');
        $this->hasColumn('assmt_result_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('activity_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('student_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('assessment_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('result_data', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('auto_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('device_id', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('device_session_id', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
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
        $this->hasOne('Activities', array(
             'local' => 'activity_id',
             'foreign' => 'activity_id'));

        $this->hasOne('ActivityParameters', array(
             'local' => 'assessment_id',
             'foreign' => 'assessment_id'));

        $this->hasOne('Students', array(
             'local' => 'student_id',
             'foreign' => 'student_id'));
    }
}