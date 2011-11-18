<?php

/**
 * getdata actions.
 *
 * @package    ruckus
 * @subpackage getdata
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assessment_result_word_huntActions extends sfActions
{
	var $table = '';
	public function executeCreate(sfWebRequest $request)
	  {
		//$this->forward404Unless($request->isMethod(sfRequest::POST));
		//if($request->isMethod(sfRequest::POST)){
			$data = $request->getParameterHolder()->getAll(); //get all the data from request post/get
			$data_array = json_decode($data['data'],true); //convert the json string to array
			
			//$accessToken = $data_array['accessToken'];
			$activity_id = $data_array['activity_id'];
			$assessments = $data_array['assessments'];
			$device_id = $data_array['device_id'];
			$option_email = $data_array['email'];
	        
			
		/*	
			echo "<pre>";
			print_r($assessments);
			exit();
			*/
			$response = array();
			$assessmentAutoId = array();

		//	$activity_type_id = Doctrine::getTable('Activities')->func_getActivityTypeId($activity_id);
			
			$student_obj = Doctrine::getTable('Students');
			
			if(is_array($assessments) && count($assessments))
			{
				$tbl_format = '<table width="100%">';
				foreach($assessments as $assessment){
					$auto_id = $assessment['auto_id'];
					$found_it = $assessment['found_it'];
					$taps = $assessment['Taps'];
					$target_word = $assessment['target_word'];
					$incorrect_word_taps = $assessment['incorrect_word_taps'];
					
					unset($assessment['auto_id']);
					unset( $assessment['found_it']);
					unset($assessment['Taps']);
					unset($assessment['incorrect_word_taps']);
				
					$device_session_id = $assessment['device_session_id'];
					$device_session_id_explode = explode('_', $device_session_id);
					$student_id = $device_session_id_explode[0]; 
					unset($assessment['device_session_id']);

					$authenticated = $student_obj->func_checkStudentId($student_id);
                                        
					if($authenticated[0]['student_id']!=''){
						foreach ($assessment as $assessment_parameter => $value) {
						
							$this->table = 'AssessmentResultsWordHunt';
							$tbl_format .= '<tr><td>'.$assessment_parameter.'</td><td>'.$value.'</td></tr>';
							                           
							$ass_table = new $this->table(); 
							
							$assessmentData = Doctrine::getTable($this->table)->func_checkActivityAutoId($device_id,$auto_id,$activity_id, $student_id, $device_session_id);
							
							if($assessmentData['auto_id']==''){
							
							     $getMaxTryNo = Doctrine_Manager::getInstance()
                                     ->getConnection('doctrine')
                                     ->getDbh()
                                     ->query("SELECT max(try_number) as 'max'  from `assessment_results_word_hunt` where activity_id='".$activity_id."' and student_id='".$student_id."' and device_id='".$device_id."' and target_word='".trim($target_word)."'")
				                   ->fetchAll();
								$try_number=1+ $getMaxTryNo['0']['max']; 
								$ass_table->activity_id = $activity_id;
								$ass_table->student_id = $student_id;
								$ass_table->found_it = $found_it;
								$ass_table->auto_id = $auto_id;
								$ass_table->taps = $taps;
								$ass_table->try_number = $try_number;
								$ass_table->incorrect_word_taps = $incorrect_word_taps;
								$ass_table->found_it = $found_it;
								$ass_table->target_word = $target_word;
								$ass_table->device_id = $device_id;
								$ass_table->device_session_id = $device_session_id;
								$ass_table->time_stamp = date("Y-m-d h:i:s", time());
								$ass_table->save();
								$assessmentAutoId[$auto_id] = 1;
							}else{
								$assessmentAutoId[$auto_id] = 0;
							}
							unset($this->table);
							unset($assessmentData);
							
						}
					}else{
						$response['STATUS'] = 0;
						$response['MESSAGE'] = "Login Required!";
						$json = json_encode($response);
						return $this->renderText($json);
					}
					
					
				 }
				
				
				$objCommon=new CommonFunctions();
			
			   $objCommon->func_graphGenerate($student_id,$option_email);
				
				
				
				
				
				$response['STATUS'] = 1;
				$response['MESSAGE'] = "Data Inserted Successfully!";
				$response['autoIds'] = $assessmentAutoId;
			 }else{
				$response['STATUS'] = 0;
				$response['MESSAGE'] = "No data Found!";
			} // end of if() that checks accessToken dg fdgd f
		 /* } // end of if() that checks POST method
			  
			  else
			  {
				$response['STATUS'] = 0;
				$response['MESSAGE'] = "You are not using post method!";
				$response['accessToken'] = null;
		  } */
		$json = json_encode($response);
		  

		$obj_CommonFunctions = new CommonFunctions();
		//$obj_CommonFunctions->get_BookRelatedDataToMail($student_id, $tbl_format);


		return $this->renderText($json);
		  
	 
		  //$this->setTemplate('getdata'); 
	}
}
