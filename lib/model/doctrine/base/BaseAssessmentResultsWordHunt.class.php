<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AssessmentResultsWordHunt', 'doctrine');

/**
 * BaseAssessmentResultsWordHunt
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $arwh_id
 * @property integer $student_id
 * @property integer $taps
 * @property integer $found_it
 * @property string $incorrect_word_taps
 * @property string $target_word
 * @property timestamp $time_stamp
 * @property integer $try_number
 * @property integer $activity_id
 * @property integer $auto_id
 * @property string $device_id
 * @property string $device_session_id
 * @property Activities $Activities
 * @property Students $Students
 * 
 * @method integer                   getArwhId()              Returns the current record's "arwh_id" value
 * @method integer                   getStudentId()           Returns the current record's "student_id" value
 * @method integer                   getTaps()                Returns the current record's "taps" value
 * @method integer                   getFoundIt()             Returns the current record's "found_it" value
 * @method string                    getIncorrectWordTaps()   Returns the current record's "incorrect_word_taps" value
 * @method string                    getTargetWord()          Returns the current record's "target_word" value
 * @method timestamp                 getTimeStamp()           Returns the current record's "time_stamp" value
 * @method integer                   getTryNumber()           Returns the current record's "try_number" value
 * @method integer                   getActivityId()          Returns the current record's "activity_id" value
 * @method integer                   getAutoId()              Returns the current record's "auto_id" value
 * @method string                    getDeviceId()            Returns the current record's "device_id" value
 * @method string                    getDeviceSessionId()     Returns the current record's "device_session_id" value
 * @method Activities                getActivities()          Returns the current record's "Activities" value
 * @method Students                  getStudents()            Returns the current record's "Students" value
 * @method AssessmentResultsWordHunt setArwhId()              Sets the current record's "arwh_id" value
 * @method AssessmentResultsWordHunt setStudentId()           Sets the current record's "student_id" value
 * @method AssessmentResultsWordHunt setTaps()                Sets the current record's "taps" value
 * @method AssessmentResultsWordHunt setFoundIt()             Sets the current record's "found_it" value
 * @method AssessmentResultsWordHunt setIncorrectWordTaps()   Sets the current record's "incorrect_word_taps" value
 * @method AssessmentResultsWordHunt setTargetWord()          Sets the current record's "target_word" value
 * @method AssessmentResultsWordHunt setTimeStamp()           Sets the current record's "time_stamp" value
 * @method AssessmentResultsWordHunt setTryNumber()           Sets the current record's "try_number" value
 * @method AssessmentResultsWordHunt setActivityId()          Sets the current record's "activity_id" value
 * @method AssessmentResultsWordHunt setAutoId()              Sets the current record's "auto_id" value
 * @method AssessmentResultsWordHunt setDeviceId()            Sets the current record's "device_id" value
 * @method AssessmentResultsWordHunt setDeviceSessionId()     Sets the current record's "device_session_id" value
 * @method AssessmentResultsWordHunt setActivities()          Sets the current record's "Activities" value
 * @method AssessmentResultsWordHunt setStudents()            Sets the current record's "Students" value
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssessmentResultsWordHunt extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('assessment_results_word_hunt');
        $this->hasColumn('arwh_id', 'integer', 8, array(
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
        $this->hasColumn('taps', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('found_it', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('incorrect_word_taps', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('target_word', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('time_stamp', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('try_number', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('activity_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Activities', array(
             'local' => 'activity_id',
             'foreign' => 'activity_id'));

        $this->hasOne('Students', array(
             'local' => 'student_id',
             'foreign' => 'student_id'));
    }
}