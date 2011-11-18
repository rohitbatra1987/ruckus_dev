<?php

/**
 * getdata actions.
 *
 * @package    ruckus
 * @subpackage getdata
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assessment_resultActions extends sfActions
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
			
			$response = array();
			$assessmentAutoId = array();

			$activity_type_id = Doctrine::getTable('Activities')->func_getActivityTypeId($activity_id);
			$student_obj = Doctrine::getTable('Students');
			
			if(is_array($assessments) && count($assessments))
			{
				$tbl_format = '<table width="100%">';
				foreach($assessments as $assessment){
					$auto_id = $assessment['auto_id'];
					unset($assessment['auto_id']);
				
					$device_session_id = $assessment['device_session_id'];
					$device_session_id_explode = explode('_', $device_session_id);
					$student_id = $device_session_id_explode[0]; 
					unset($assessment['device_session_id']);

					$authenticated = $student_obj->func_checkStudentId($student_id);
                                        
					if($authenticated[0]['student_id']!=''){
						foreach ($assessment as $assessment_parameter => $value) {
							$this->table = 'AssessmentResult';
							$tbl_format .= '<tr><td>'.$assessment_parameter.'</td><td>'.$value.'</td></tr>';
							$tbl_res_ass_datatype = Doctrine::getTable('ActivityParameters')->func_getDataType($assessment_parameter, $activity_type_id);
                                
							$this->table = $this->table.ucfirst($tbl_res_ass_datatype[0]['ass_data_type']);
                                                       
							$ass_table = new $this->table(); 
							
							$assessmentData = Doctrine::getTable($this->table)->func_checkAssessmentAutoId($device_id, $auto_id, $tbl_res_ass_datatype[0]['assessment_id'], $student_id);
							
							if($assessmentData['auto_id']==''){
								$ass_table->activity_id = $activity_id;
								$ass_table->student_id = $student_id;
								$ass_table->assessment_id = $tbl_res_ass_datatype[0]['assessment_id'];
								$ass_table->result_data = $value;
								$ass_table->auto_id = $auto_id;
								$ass_table->device_id = $device_id;
								$ass_table->device_session_id = $device_session_id;
								$ass_table->created_at = date("Y-m-d h:i:s", time());
								$ass_table->updated_at = date("Y-m-d h:i:s", time());
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
				$tbl_format .= '</table>';
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
