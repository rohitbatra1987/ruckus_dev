<?php

/**
 * ActivitiesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ActivitiesTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ActivitiesTable
     */
    
		public static function getInstance(){
			return Doctrine_Core::getTable('Activities');
		}

		public function func_getActivityTypeId($activity_id){
			 $q = $this->createQuery('at')
				 ->where('at.activity_id = ?',$activity_id)
				 ->fetchArray(); 
				 return $q[0]['activity_type_id']; 
		}
}