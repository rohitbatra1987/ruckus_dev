<?php

/**
 * AssessmentResultIntegerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssessmentResultIntegerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AssessmentResultIntegerTable
     */
    
	public static function getInstance()
    {
        
		return Doctrine_Core::getTable('AssessmentResultInteger');
   
	}
	
	public function func_checkAssessmentAutoId($device_id, $auto_id, $assessment_id, $student_id){
	 //print $device_id;
	 $q = $this->createQuery('a')
         ->where('a.auto_id = ?',$auto_id)
         ->andWhere('a.device_id = ?',$device_id)
		 ->andWhere('a.assessment_id = ?',$assessment_id)
		 ->andWhere('a.student_id = ?',$student_id)
		 ->fetchOne();
	  return $q; 
	}
}