<?php

/**
 * metric_results actions.
 *
 * @package    ruckus
 * @subpackage metric_results
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class metric_resultsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  var $table = '';
  public function executeCreate(sfWebRequest $request)
  {
    $data = $request->getParameterHolder()->getAll();
	$data_array = json_decode($data['data'],true);
	
	$book_id = $data_array['book_id'];
	$metrices = $data_array['metrices'];
	$device_id = $data_array['device_id'];
		
	$response = array();
	$assessmentAutoId = array();
	$student_obj = Doctrine::getTable('Students');

	if(is_array($metrices) && count($metrices)){
		$tbl_format = '<table width="100%">';
		foreach($metrices as $metric){
			$auto_id = $metric['auto_id'];
			$device_session_id = $metric['device_session_id'];
			
			$device_session_id_explode = explode('_', $device_session_id);
			$student_id = $device_session_id_explode[0];
			unset($metric['auto_id'], $metric['device_session_id']);
			$authenticated = $student_obj->func_checkStudentId($student_id);
			
			if($authenticated[0]['student_id']!=''){
 
				foreach($metric as $metrice_parameter => $value){
					$this->table = 'MetricResult';
                                        //echo $metrice_parameter;die;
					$tbl_res_ass_datatype = Doctrine::getTable('Metric')->func_getDataType($metrice_parameter);
					
					$tbl_format .= '<tr><td>'.$metrice_parameter.'</td><td>'.$value.'</td></tr>';

				    $this->table = $this->table.ucfirst($tbl_res_ass_datatype[0]['mtr_data_type']);
					//print '<br>';
					$ass_table = new $this->table(); 
                                        //echo $device_id; die;
					$metricData = Doctrine::getTable($this->table)->func_checkMetricAutoId($device_id, $auto_id, $tbl_res_ass_datatype[0]['metric_id'], $student_id, $device_session_id);
					//print_r($metricData);die;
					if(!isset($metricData[0]['auto_id']) && $metricData[0]['auto_id']==''){
						$ass_table->book_id = $book_id;
						$ass_table->student_id = $student_id;
						$ass_table->metric_id = $tbl_res_ass_datatype[0]['metric_id'];
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
					unset($metricData);
				}
			}else{
				$response['STATUS'] = 0;
				$response['MESSAGE'] = "Login Required!";
				$json = json_encode($response);
				return $this->renderText($json);
			}
		}
		$response['STATUS'] = 1;
		$response['MESSAGE'] = "Data Inserted Successfully!";
		$response['autoIds'] = $assessmentAutoId;
		$tbl_format .= '</table>';
	}else{
		$response['STATUS'] = 0;
		$response['MSG'] = "No Data Received!";
	}

	$obj_CommonFunctions = new CommonFunctions();
	//$obj_CommonFunctions->get_BookRelatedDataToMail($user_id, $tbl_format);
	
	$json = json_encode($response);
	return $this->renderText($json);
  }
}
