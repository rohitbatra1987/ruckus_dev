<?php

/**
 * StudentsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StudentsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object StudentsTable
     */
    
		public static function getInstance(){
		
        return Doctrine_Core::getTable('Students');
   
		}

		public function func_checkStudentId($student_id){
			$q = $this->createQuery('s')
			->where('s.student_id = ?',$student_id);
			return $authenticated = $q->fetchArray(); 
		}
}