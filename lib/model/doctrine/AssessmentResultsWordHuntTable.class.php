<?php

/**
 * AssessmentResultsWordHuntTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssessmentResultsWordHuntTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AssessmentResultsWordHuntTable
     */
    
		public static function getInstance(){
			return Doctrine_Core::getTable('AssessmentResultsWordHunt');
   
		}
		
		public function func_checkActivityAutoId($device_id, $auto_id, $activity_id, $student_id, $device_session_id = ''){
		 //print $device_id;
		 $q = $this->createQuery('a')
			 ->where('a.auto_id = ?',$auto_id)
			 ->andWhere('a.device_id = ?',$device_id)
			 ->andWhere('a.activity_id = ?',$activity_id)
			 ->andWhere('a.student_id = ?',$student_id)
			 ->andWhere('a.device_session_id = ?',$device_session_id)
			 ->fetchOne();
		  return $q; 
		}
}