<?php

/* Below is a common class named CommonFuctions containing several functions.

  Functions Used are:
  func_calculate_datediff           : For calculating date difference between two given dates.
  func_getValues_AllBook            : For getting all the book which is used by user.
  func_getValues_MetricResult       : For getting metric result of user.
  func_getValues_AssessmentResult   : For getting assessment result of user.

 */

class CommonFunctions {
    /* Calculate Date Difference between two given dates */
	var $metricResult;
        var $q;
    
    public function func_calculate_datediff($created_at, $updated_at) {

        $start = strtotime($created_at);
        $end = strtotime($updated_at);

        if ($start !== -1 && $end !== -1) {
            if ($end >= $start) {
                $diff = $end - $start;
                if ($days = intval((floor($diff / 86400))))
                    $diff = $diff % 86400;
                if ($hours = intval((floor($diff / 3600))))
                    $diff = $diff % 3600;
                if ($minutes = intval((floor($diff / 60))))
                    $diff = $diff % 60;
                $diff = intval($diff);
                $time = array('days' => $days, 'hours' => $hours, 'minutes' => $minutes, 'seconds' => $diff);
            }
            return $time;
        }
    }

    /* End of Calculate Date Difference between two given dates */

    /* Get All books of user by their book_id */

    public function func_getValues_AllBook($id) {
        if ($id != '') {
            $where = "WHERE book_id=" . $id;
        } else {
            $where = "";
        }
        $book = Doctrine_Manager::getInstance()
                ->getConnection('doctrine')
                ->getDbh()
                ->query("(SELECT * FROM book " . $where . " )")
                ->fetchAll();

        return $book;
    }

    /* End of Get All books */

    /* Metric Result Calculation */

    public function func_getValues_MetricResult($id, $user_id) {
        $metricResult = Doctrine_Manager::getInstance()
                ->getConnection('doctrine')
                ->getDbh()
                ->query("(SELECT sum(a.result_data) AS result_data, b.name as metric FROM metric_result_float AS a LEFT JOIN metric AS b
			 ON a.metric_id=b.metric_id WHERE user_id= " . $user_id . ")
		UNION ALL
		(SELECT sum(a.result_data) AS result_data, b.name as metric FROM metric_result_integer AS a LEFT JOIN metric AS b
			 ON a.metric_id=b.metric_id WHERE user_id= " . $user_id . ")
		UNION ALL
		(SELECT a.result_data, b.name as metric FROM metric_result_varchar AS a LEFT JOIN metric AS b
			 ON a.metric_id=b.metric_id WHERE user_id= " . $user_id . ")")
                ->fetchAll();

        return $metricResult;
    }

    /* End of Metric Result Calculation */

    /* Assessment Result Calculation */

    public function func_getValues_AssessmentResult($user_id) {
        $resultAssessment = Doctrine_Manager::getInstance()
                ->getConnection('doctrine')
                ->getDbh()
                ->query("(SELECT c.name,sum(a.result_data)/count(a.result_data) avg,b.subject FROM assessment_result_float AS a LEFT JOIN (activityk AS c,assessment AS b)
				 ON (a.activity_id=c.activity_id AND a.assessment_id=b.assessment_id) WHERE user_id = '" . $user_id . "' GROUP BY a.activity_id, a.assessment_id)
		UNION ALL
		(SELECT c.name,sum(a.result_data)/count(a.result_data) avg,b.subject FROM assessment_result_integer AS a LEFT JOIN (activityk AS c,assessment AS b)
				 ON (a.activity_id=c.activity_id AND a.assessment_id=b.assessment_id) where user_id='" . $user_id . "' GROUP BY a.activity_id, a.assessment_id)
		UNION ALL
		(SELECT c.name,sum(a.result_data)/count(a.result_data) avg,b.subject FROM assessment_result_varchar AS a LEFT JOIN (activityk AS c,assessment AS b)
				 ON (a.activity_id=c.activity_id AND a.assessment_id=b.assessment_id) WHERE user_id = '" . $user_id . "' GROUP BY a.activity_id, a.assessment_id)")
                ->fetchAll();
        return $resultAssessment;
    }

    public function func_getLastMonthDate($date) {
        $get_last_month_date = Doctrine_Manager::getInstance()
                ->getConnection('doctrine')
                ->getDbh()
                ->query("SELECT DATE_ADD('$date', INTERVAL -1 MONTH)")
                ->fetchAll();
        return $get_last_month_date[0][0];
    }

    /* End of Assessment Result Calculation */

    public function sendemail($to, $subject, $message) {
	
	
        $mail = new PHPGMailer();
        $mail->Username = 'mail.ruckus@gmail.com';
        $mail->Password = 'Hamesha1$';
        $mail->From = 'mail.ruckus@gmail.com';
	    $mail->FromName = 'Ruckus Media Group';
		$mail->Subject = $subject;
        foreach($to as $to)
		 {
		$mail->AddAddress($to);
         }
		$mail->IsHTML(true);
        $mail->Body = $message;
        $mail->Send();
    }

    public function func_sendReport($array_for_report_email, $data) {
        $to = $array_for_report_email['email_address'];
        $subject = 'Report';
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
td{ height:25px; line-height:22px}
#example1 {
-moz-border-radius: 10px;
border-radius: 16px; border:2px solid #000000;
font-size:20px; text-align:center; padding:15px;
}
#example3 {
-moz-border-radius: 10px;
border-radius: 16px; border:2px solid #000000;
font-size:20px; text-align:center; padding:15px;
}
#example2 {
-moz-border-radius: 10px;
border-radius: 16px; border:2px solid #dddfdf; background:#dddfdf;padding:15px;
}
</style>
</head>

<body style="font-family:Verdana; font-size:18px; color:#000000">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><strong>Ruckus</strong></td>
    <td rowspan="2" align="right" valign="middle">Reader Meter Email </td>
  </tr>
  <tr align="left" valign="top">
    <td>Parent Emails v.1</td>
  </tr>
</table>
<div id="example1">';
        $message .= "RUCKUS BRANDING: " . $array_for_report_email['first_name'] . "'s Progress Report";
        $message .= '</div><br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">Hello,<br />';
        $message .= "This will be an explanation of what this email is and what it is not so that the parent's will have an understanding of why they are receiving it. This will be an explanation of what this email is and what it is not so that the parent's will have an understanding of why they are receiving it.</td>
  </tr>
  <tr>";
        $message .= '<td colspan="2" align="center"><img src="untitled.jpg" width="414" height="317" vspace="10" /></td>
  </tr>
  <tr>
    <td colspan="2" valign="middle"><hr color="#000000" /></td>
  </tr>
  <tr>
    <td colspan="2"><strong>WORD BUILDING:</strong><br />
      In LEVEL 1 books your child has been learning what a word looks like on the page and how to find individual words in a story. This is one component of the <strong>print awareness and concepts</strong> curriculum objective.<br /><br />

In LEVEL 2 books your child has been learning how to use the pictures in a story to figure out an unknown word. This is an important skill that helps children read <strong>fluently</strong>.<br />
<br />
<span style="color:#999999">Your child has participated in <#> word building activities this <time frame>. The graphs below show how often your child has identified the word in the text on the first try.</span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><img src="untitled.jpg" width="414" height="317" vspace="10" /></td>
    <td align="left" valign="top"><span style="color:#999999; font-weight:500"><strong>Assessments based on activities in these books:</strong></span><br />
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">';
	  if(is_array($array_for_report_email['books_read_in_last_seven_sessions']) && count($array_for_report_email['books_read_in_last_seven_sessions'])){
        foreach ($array_for_report_email['books_read_in_last_seven_sessions'] as $key => $value) {
           $book = Doctrine::getTable('Book')->func_getBook($value['book_id']);
           //echo "<pre>";print_r($book);die;
		   $message .= "<tr>
			  <td align='center' valign='middle'>Book Cover<br />
				img</td>
			  <td><strong>".$book[0]['name']."</strong><br />
			  Teacher for a Day<br />
			  <br /></td>
			</tr>";
		}
	}
     $message .= '</table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><img src="untitled.jpg" width="414" height="317" vspace="10" /></td>
    <td align="left" valign="top"><span style="color:#999999; font-weight:500"><strong>Assessments based on activities in these books:</strong></span><br />
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle">Book Cover<br />
            img</td>
          <td><strong>My Little Pony</strong><br />
          Teacher for a Day<br />
          <br /></td>
        </tr>
        <tr>
          <td align="center" valign="middle">Book Cover<br />
            img</td>
          <td><strong>My Little Pony</strong><br />
          Teacher for a Day<br />
          <br /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><strong>COMPREHENSION:</strong> In LEVEL 1 books your child has been learning how to retell stories from books. By participating in this activity your child is demonstrating his/her <strong>comprehension</strong> of the text.<br />
    <br /></td>
  </tr>
  <tr>
    <td colspan="2"><span style="color:#999999">Your child has participated in &lt;#&gt; comprehension activities this &lt;time frame&gt;. The graph below<br />
    shows what percentage of answers your child has gotten correct.</span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><img src="untitled.jpg" width="414" height="317" vspace="10" /></td>
    <td align="left" valign="top"><span style="color:#999999; font-weight:500"><strong>Assessments based on activities in these books:</strong></span><br />
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle">Book Cover<br />
            img</td>
          <td><strong>My Little Pony</strong><br />
          Teacher for a Day<br />
          <br /></td>
        </tr>
        <tr>
          <td align="center" valign="middle">Book Cover<br />
            img</td>
          <td><strong>My Little Pony</strong><br />
          Teacher for a Day<br />
          <br /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" valign="middle"><hr color="#000000" /></td>
  </tr>
  <tr>
    <td colspan="2"><strong>RECOMMENDED FOR &lt;'.$array_for_report_email['first_name'].'&gt;:<br />
    </strong></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">Book Cover<br />
          img</td>
        <td align="center" valign="top">Book Cover<br />
          img</td>
        <td align="center" valign="top">Book Cover<br />
          img</td>
      </tr>
      <tr>';
      foreach ($array_for_report_email['recommended_books'] as $key => $value) {
      $message .=   "<td align='left' valign='top'><span style='font-size:22px; font-weight:500'>".$value['name']."</span><br />
<span style='font-size:22px;'>Teacher for a Day</span><br />
          <strong>LEVEL 2</strong>: Intermediate Readers<br />
          Available on the<br />
          <strong>My Little Pony Bookshelf</strong><br />
          Download from the App Store<br />
          <br />
<span style='font-size:22px; font-weight:500'>This book will help your child with:</span><br />
- ".$value['description']."</td>";
      }
   $message .= '</tr>
    </table></td>
  </tr>
</table><br />
<div id="example2">
TIP: This will be a straightforward tip about how the parent can engage their child in learning to read in the real world. This will be a straightforward tip about how the parent can engage their child in learning to read in the real world.<br />
</div><br />
<div id="example3">
FOOTER:<br />
<u>Click here</u> if you would like to stop receiving these emails.<br />
Disclaimer about the assessments in this email.
</div>
<div>' . $data . '</div>

</body>
</html>';
      $this->sendemail($to, $subject, $message);
    }

    function get_BookRelatedDataToMail($user_id,$tbl_format = ""){
        $array_for_report_email = array();
		$user = Doctrine::getTable('User')->func_getValuesFromUserId($user_id);
		$array_for_report_email['first_name'] = $user['0']['first_name'];
		$array_for_report_email['email_address'] = $user['0']['email_address'];
                $books_read_in_last_seven_sessions = Doctrine::getTable('Book')->func_getBooksInLastSevenSessions($user_id);
		$array_for_report_email['books_read_in_last_seven_sessions'] = $books_read_in_last_seven_sessions;
		$array_recommended_books = Doctrine::getTable('Book')->func_getBook();
		$array_for_report_email['recommended_books'] = $array_recommended_books;
		$this->func_sendReport($array_for_report_email, $tbl_format);
		return $array_for_report_email;
    }
	
	
	function func_getSessionTimeTakenResult($student_id,$device_session_id) {
		
		
		 $get_data_type_from_metric = Doctrine_Query::create()
                ->select('l.mtr_data_type,l.metric_id')
                ->from('MetricParameters l')
                ->where('l.name="TimeTaken"')
                ->fetchArray();
			
        foreach ($get_data_type_from_metric as $mat) {
		
	
	
		          $metricResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
				 ->query("SELECT  SUM(result_data) AS book_wise_sum,book_id  from   metric_result_" . $mat['mtr_data_type'] . " where  student_id ='".$student_id."' AND device_session_id='".$device_session_id."' AND  metric_id =".$mat['metric_id']."")
                 ->fetchAll();
                 }
           return $metricResult;
    }
	
	
	
	
    function func_getTimeTakenResult($user_id) {
		
		
		 $get_data_type_from_metric = Doctrine_Query::create()
                ->select('l.mtr_data_type,l.metric_id')
                ->from('MetricParameters l')
                ->where('l.name="TimeTaken"')
                ->fetchArray();
			
			
        foreach ($get_data_type_from_metric as $mat) {
		
		          $metricResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
				 ->query("SELECT  SUM(last_seven_session_results) AS book_wise_sum,book_id,book_name FROM (SELECT SUM( mrf.result_data ) as 'last_seven_session_results', mrf.device_session_id , mrf.book_id as 'book_id',b.name as 'book_name' from  metric_result_" . $mat['mtr_data_type'] . " mrf  left Join book b on b.book_id=mrf.book_id  where mrf.student_id ='" . $user_id . "' AND mrf.metric_id =" . $mat['metric_id'] . " group by mrf.`device_session_id` order by `device_session_id`  desc LIMIT 7) AS `metric_result_float` group by book_id")
                 ->fetchAll();
                 }
           return $metricResult;
    }

	
	 function fun_getImageLog($user_id,$image_name,$name,$time,$type="")	
	   {
	        $image_url='uploads/graph/'.$image_name;
			$metricResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("insert into  graph_images(graph_id,student_id,image_url,graph_type,generate_time,graph_name)values('','".$user_id."','". $image_url."','".$name."','".$time."','".$type."')");
	   }
	    function func_getBookId($level)
           {
		     
			  $getBookIds = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT book_id from book where level_id='".$level."'")
				 ->fetchAll();
				 return  $getBookIds;
			  	 
		   }
	  function 	func_getActivityTypeId($name)
	      {
		    $getActivityTypeId = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT activity_type_id  from `activity_type` where act_type_description='".$name."'")
				 ->fetchAll();
				 return  $getActivityTypeId;
			 
		  }  
	   function func_getActivityId($bookId,$activityTypeId)
	       {
		   
		       $bookId=implode(',',$bookId);
			  
			   $getActivityId = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT activity_id  from `activities` where book_id in(".$bookId.") and  activity_type_id='".$activityTypeId."'")
				 ->fetchAll();
				 return  $getActivityId;
		   }
	    
	  function fun_getAssmentResult($studentId,$activityId,$startDate='',$endDate,$datatype,$found_it)
	       {
		     
			 $start=date("Y-m-d",strtotime(date("Y-m-d", strtotime($endDate['0'])) . " +1 day"));
			
			
			
			  $getAssementResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
               /*
			     ->query("select (select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d %H:%i:%s') between '".$startDate['0']."' and '".$start."' and student_id='".$studentId."' and activity_id in (".$activityId.") and found_it in(".$found_it.") ) as 'count_4',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d %H:%i:%s') between '".$startDate['1']."' and '".$endDate['1']."' and student_id='".$studentId."' and activity_id in (".$activityId.") and   found_it in(".$found_it.") ) as 'count_3',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d %H:%i:%s') between '".$startDate['2']."' and '".$endDate['2']."' and student_id='".$studentId."' and activity_id in (".$activityId.") and  found_it in(".$found_it.") ) as 'count_2',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d %H:%i:%s') between '".$startDate['3']."' and '".$endDate['3']."' and student_id='".$studentId."' and activity_id in (".$activityId.")  and found_it in(".$found_it.") ) as 'count_1'  from `assessment_results_".$datatype."` limit 1")
				 
				 */
				 
				 ->query("select (select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d')='".$endDate['0']."'  and student_id='".$studentId."' and activity_id in (".$activityId.") and found_it in(".$found_it.") ) as 'count_4',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d')='".$endDate['1']."' and  student_id='".$studentId."' and activity_id in (".$activityId.") and   found_it in(".$found_it.") ) as 'count_3',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d')='".$endDate['2']."' and student_id='".$studentId."' and activity_id in (".$activityId.") and  found_it in(".$found_it.") ) as 'count_2',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d')='".$endDate['3']."'  and student_id='".$studentId."' and activity_id in (".$activityId.")  and found_it in(".$found_it.") ) as 'count_1',(select count(*)   from assessment_results_".$datatype."  where DATE_FORMAT( FROM_UNIXTIME(SUBSTRING_INDEX(`device_session_id`,'_',-1 ) ),'%Y-%m-%d')='".$endDate['4']."'  and student_id='".$studentId."' and activity_id in (".$activityId.")  and found_it in(".$found_it.") ) as 'count_0'  from `assessment_results_".$datatype."` limit 1")
				 
				 
				 ->fetchAll();
				 return  $getAssementResult;
		   } 	
	
	function func_mailformat($total_time,$student_id,$time="",$option_email="",$book_name="")
	    {
		
		   $date=date('Y-m-d');
           $mailResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT img.image_url,img.graph_name,student.stu_fname,img.graph_name,student.student_id,student.stu_gender,student.user_id,student.stu_lname FROM `graph_images` img left Join students student on img.student_id=student.student_id  and student.student_id='".$student_id."' and generate_time='".$time."' order by graph_id desc limit 0,3")
				 ->fetchAll();
				 $image=array();
				
				  
		  foreach($mailResult as $res)
		    {
			   $first_name=$res['stu_fname'];
			   $stu_gender=$res['stu_gender'];
			   
			   $user_id=$res['user_id'];
			   $image[$res['graph_name']]=$res['image_url'];
			}		 
		  
		   $userInfoResult = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT first_name,email_address,additional_emails from  user where user_id='". $user_id."'")
				 ->fetchAll();
			$to= $userInfoResult['0']['email_address'];
			$accountname=$userInfoResult['0']['first_name'];
		    if($option_email!="")
		         {
            $to=$to.','.$option_email;	 
                 }
		
		   if($userInfoResult['0']['additional_emails']!="")
		         {
			  $to=$to.','.$userInfoResult['0']['additional_emails'];	
			     }
		 
		    $hosturl="http://".$_SERVER['HTTP_HOST'];
		    $subject = 'Report';
		     $myFile = $hosturl.'/mailer/index.html';
			 $content="";
           if ($fp = fopen($myFile, 'r')) 
		     {
           $content = file_get_contents($myFile);
		   	}
		 $content=str_replace('parents123!@#',ucfirst($accountname),$content);
		 $content=str_replace('#child123!',ucfirst($first_name),$content);
		 $bookname="";
		 foreach($book_name as $book)
		   {
		    $bookname=$bookname."<li>".$book."</li>";
		   }
		  
		  if($stu_gender=="0")
		     {
			  	$gender="he";
				$genderP="his";
			 } 
		 else
		     {
			    $gender="she";
			   	$genderP="her";
				
				
			}	
		 $content=str_replace('#gander123!',$gender,$content);	  
		  $content=str_replace('#ganderP',$genderP,$content);	  
		 if($bookname=="")
		   {
		  $content=str_replace('#book123!',$bookname,$content);
		   }
		  else
		  { 
		 $content=str_replace('#book123!',"<ul>".$bookname."</ul>",$content);
		   }
		 if($total_time!=0)
		   {	
         $content=str_replace('#piegraph!@#','<span style="font-size:13pt;color:#0264af; text-align:center">   '.$first_name.'</span> has spent <span style="font-size:13pt;color:#0264af; text-align:center"> '.ceil(round($total_time/60,2)).' </span> minutes reading Ruckus book this week<img src="'.$hosturl.'/'.$image['pie'].'"  vspace="10" />',$content);
	       }
		 else
		  {
		     $content=str_replace('#piegraph!@#','<span style="font-size:13pt;color:#0264af; text-align:center">   '.$first_name.'</span> has spent <span style="font-size:13pt;color:#0264af; text-align:center"> '.ceil(round($total_time/60,2)).' </span> minutes reading Ruckus book this week',$content);
		  }  
		 $content=str_replace('#bargraph!@#','<img src="'.$hosturl.'/'.$image['bar'].'"  vspace="10" />',$content);
		 
		 $content=str_replace('#bar1graph!@#','<img src="'.$hosturl.'/'.$image['bar1'].'"  vspace="10" />',$content);
		  
		  
		   $lastActivity="";
		   $getsessionDeviceIds=$this->func_sessionDeviceId($student_id);
		   
		   foreach($getsessionDeviceIds as $getsessionDeviceId)
		    {
			
		
			
		    $getLastActivities=$this->func_lastactivities($getsessionDeviceId['device_session_id']);
			
		    $sessionDevId=explode('_',$getsessionDeviceId['device_session_id']);
			
			$sessionTime=$this->func_getSessionTimeTakenResult($student_id,$getsessionDeviceId['device_session_id']);
			
			
			
		$time=$sessionTime['0']['book_wise_sum'];
			if($time=="")
			  {
			    $time=0;
			  }
			
			$makeTime=round($time/60,2);
			
			
			$sessionTimeTaken=$makeTime;
			
			$sessionDevIdDateFormat=date('F d,y H:i:s',$sessionDevId['1']);
		    $lastActivity=$lastActivity."<tr><th colspan=\"4\" align=\"left\" bgcolor=\"#ffffff\" style=\"padding:2px 10px\">".$sessionDevIdDateFormat."    Time Taken :".$sessionTimeTaken." minutes</th></tr>";
			$K=0;	
		    foreach($getLastActivities as $getLastActivity)
		    {
			  if($getLastActivity['found_it']=="1")
			     {
				   $found_it="Yes";
				 }
				else
				 {
				    $found_it="No";
				 }
				 if($K%2==0)
				   { 
				     $bg="#d8ffd0";
				   }
				 else
				   {
				      $bg="#FFFFFF";
				   }   
			 $target_word=$getLastActivity['target_word'];
			 $incorrect_word_taps=substr($getLastActivity['incorrect_word_taps'],0,-1);
			 $lastActivity=$lastActivity."<tr><td align=\"left\" bgcolor=".$bg."  style=\"padding:2px 10px\">".$getLastActivity['taps']."</td><td align=\"left\" bgcolor=".$bg."  style=\"padding:2px 10px\">".$target_word."</td><td align=\"left\" bgcolor=".$bg."  style=\"padding:2px 10px\">".$incorrect_word_taps."</td><td align=\"left\" bgcolor=".$bg."  style=\"padding:2px 10px\">".$found_it."</td></tr>";
			    $K=$K+1;
			}
			}
	       if($lastActivity=="")
		      {
			   $content=str_replace('#lastactivity!@#','<table width="450" align="center" border="1" ><tr><td></td></tr></table>',$content);
			  }
		    if($lastActivity!="")
		      {
			   $content=str_replace('#lastactivity!@#','<table  width="450" align="center" cellpadding="0" cellspacing="0"   style="font-family:verdana; color:#000000; font-size:12px"><tr><th colspan="4" align="center"  style="padding:10px;color:#4aa936;font-weight:bold;font-size:18px;">WORD BUILDER</th>
  </tr><tr><td align="left" bgcolor="#adf59c" style="padding:2px 10px" ><b>Taps</b></td><td align="left" bgcolor="#adf59c" style="padding:2px 10px"><b>Target Word</b></td><td align="left" bgcolor="#adf59c" style="padding:2px 10px" ><b>Incorrect Tap</b></td><td align="left" bgcolor="#adf59c" style="padding:2px 10px" ><b>Recognized </b></td></tr>'.$lastActivity.'</table>',$content);
			  }
			  
			  $reconizedBookResult=$this->func_reconizeBook();
			  $reconixedBook="";
			  foreach($reconizedBookResult as $reconized)
			     {
		     $reconixedBook=$reconixedBook.'
    <td align="left" valign="top" style="width:220"><img src="'.$hosturl.'/uploads/book_series/'.$reconized['bk_image'].'" style="padding-left:10px;" /><br /><br /><strong>'.$reconized['name'].'</strong><br /><br /><strong>Level '.$reconized['level_id'].':</strong>'.$reconized['level_description'].'<br /><br />Available on the My Little Pony <br> Bookshelf<br /><a href="#" style="color:#0066b5;">Download from the App Store</a><br /><br /><strong>This book will help with: </strong><br />- Word Building <br />- Reading Comprehension</td>';
				 }
		         $content=str_replace('#reconizedBook!@#',$reconixedBook,$content);
            	 $to=explode(',',$to); 
		     	 $subject=ucfirst($first_name)."'s Ruckus Progress Report for ".date('d/m/Y H:i a');
                 $this->sendemail($to, $subject, $content);
		}
		
		
		
		
		
		function func_sessionDeviceId($student_id)
		   {
		       $getDeviceIds = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT device_session_id  from `assessment_results_word_hunt` where student_id='".$student_id."' group by  `device_session_id` order by arwh_id desc limit 2 ")
				 ->fetchAll();
				 return  $getDeviceIds;
		   }
		
		
		function func_lastactivities($device_session_id)
		  {
		     $getLastActivities = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT *  from `assessment_results_word_hunt` where device_session_id='".$device_session_id."' order by arwh_id desc limit 0,7 ")
				 ->fetchAll();
				 return  $getLastActivities;
		  }
		
		
		function func_reconizeBook()
		    {
			
			   $getReconizeBooks = Doctrine_Manager::getInstance()
                 ->getConnection('doctrine')
                 ->getDbh()
                 ->query("SELECT b.name,b.bk_image,l.level_description,l.level_id FROM `book` b left Join book_levels l on b.level_id=l.level_id order by  rand()")
				 ->fetchAll();
				 return  $getReconizeBooks;
			
			}
		
		function func_piegraphGenerate($student_id,$time,$name,$basepath)
		       {
			   
			    $metricResult=$this->func_getTimeTakenResult($student_id);
			    $book_name=array();
	            $book_time=array();
			    if(empty($metricResult))
			         {
				  $book_name[]="";
		          $book_time[]="";
				     }
	           foreach($metricResult as $matric)
	                 {
	           $book_name[]=$matric['book_name'];
		       $book_time[]=$matric['book_wise_sum'];
	                 }
               $total_time=array_sum($book_time);
			   $MyData = new pData();   
               $MyData->addPoints($book_time,"ScoreA");  
                /* Define the absissa serie */
               $MyData->addPoints($book_name,"Labels");
               $MyData->setAbscissa("Labels");
                /* Create the pChart object */
               $myPicture = new pImage(500,317,$MyData,TRUE);
                /* Draw a solid background */
               $Settings = array("R"=>255, "G"=>255, "B"=>255, "Dash"=>0, "DashR"=>193, "DashG"=>172, "DashB"=>237);
               $myPicture->drawFilledRectangle(0,0,400,230,$Settings);
                /* Draw a gradient overlay */
               $Settings = array("StartR"=>255, "StartG"=>255, "StartB"=>255, "EndR"=>255, "EndG"=>255, "EndB"=>255, "Alpha"=>50);
               $myPicture->drawGradientArea(0,0,400,230,DIRECTION_VERTICAL,$Settings);
               $myPicture->drawGradientArea(0,0,0,0,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
   /* Set the default font properties */ 
               $myPicture->setFontProperties(array("FontName"=>$basepath."verdana.ttf","FontSize"=>10,"R"=>80,"G"=>80,"B"=>80));
   /* Create the pPie object */ 
               $PieChart = new pPie($myPicture,$MyData);
   /* Define the slice color */
               $PieChart->setSliceColor(0,array("R"=>40,"G"=>74,"B"=>134));
               $PieChart->setSliceColor(1,array("R"=>97,"G"=>77,"B"=>63));
               $PieChart->setSliceColor(2,array("R"=>97,"G"=>113,"B"=>63));
  /* Draw a simple pie chart */ 
  /* Enable shadow computing */ 
               $myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 /* Draw a splitted pie chart */ 
               $PieChart->draw3DPie(230,175,array("WriteValues"=>TRUE,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE,"DrawLabels"=>TRUE));
  /* Render the picture (choose the best way) */
              $picname=$student_id.'_'.$name.'_'. $time.'.png';
			  $this->fun_getImageLog($student_id,$picname,$name,$time,'pie');
	          $myPicture->render("uploads/graph/".$picname);
			  $book_time=array('book_time'=>$book_time);
			  return  array_merge((array)$book_name,$book_time);
			 
			 //  return  $book_name.'-'.$book_time;
	           }
		function func_bargraphGenerate($student_id,$time,$type,$basepath,$success,$r="",$g="",$b="",$name)
		       {
		         
			$bookIdResult=$this->func_getBookId('1,2');
			 $bookID=array();
			  foreach($bookIdResult as $book)
			  {
			      $bookID[]=$book['book_id'];
			  } 
			 
			 $getActivityTypeIdResult=$this->func_getActivityTypeId('WORD HUNT'); 
		     foreach($getActivityTypeIdResult as $activityTypeId)
			  {
			     $activityTypeId=$activityTypeId['activity_type_id'];
			  }
			 $getActivityIdResult=$this->func_getActivityId($bookID,$activityTypeId);
			  $actId=array(); 
			  foreach($getActivityIdResult as $activityId)
			  {
			    $actId[]=$activityId['activity_id'];
			  }
			  $actNewId=implode(',',$actId);
			       
						   $k=0;
						   $j=0;
						   for($i=0;$i<5;$i=$i+1)
						      {
							 
							 $date[$k]=date("Y-m-d",strtotime("-$i day"));
							 $dateRec[]=date('M d',strtotime("-$i day"));
							  $k=$k+1;
							   }
							   
							    $successaccessmentResult=$this->fun_getAssmentResult($student_id,$actNewId,'',$date,"word_hunt",$success);
								
								$totalaccessmentResult=$this->fun_getAssmentResult($student_id,$actNewId,'',$date,"word_hunt",'0,1');
								
								for($i=0;$i<5;$i=$i+1)
								  {
								    $j=$i;
									if($totalaccessmentResult['0']['count_'.$j]=="0")
									  {
									    $totalaccessmentResult['0']['count_'.$j]=1;
									  }
								    $per[$i]=($successaccessmentResult['0']['count_'.$j]/$totalaccessmentResult['0']['count_'.$j])*100;
								  }
								  
								  $MyData = new pData();  
								  
								  
                                $MyData->addPoints($per,"Server A");
                                $MyData->setAxisName(0,"Percentage");
                                $MyData->addPoints(array_reverse($dateRec),"Months");
                                $MyData->setSerieDescription("Months","Month");
                                $MyData->setAbscissa("Months");
                                $myPicture = new pImage(350,230,$MyData);
                               /* Turn of Antialiasing */
                                $myPicture->Antialias = FALSE;

                               /* Add a border to the picture */
                              $myPicture->drawGradientArea(0,0,400,230,DIRECTION_VERTICAL,array("StartR"=>255,"StartG"=>255,"StartB"=>255,"EndR"=>255,"EndG"=>255,"EndB"=>255,"Alpha"=>100));
                               // $myPicture->drawRectangle(0,0,400,229,array("R"=>0,"G"=>0,"B"=>0));

 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>$basepath."Silkscreen.ttf","FontSize"=>6));

 /* Define the chart area */
 $myPicture->setGraphArea(60,40,350,200);

 /* Draw the scale */


 $scaleSettings = array("GridR"=>300,"GridG"=>300,"GridB"=>200,"DrawSubTicks"=>FALSE,"CycleBackground"=>FALSE,"Pos"=>SCALE_POS_LEFTRIGHT
, "Mode"=>SCALE_MODE_MANUAL,"LabelingMethod"=>LABELING_ALL);
 
 
 
 
 
 
 $myPicture->drawScale($scaleSettings);

 

 
 /* Turn on shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

 /* Draw the chart */
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 $settings = array("Surrounding"=>-30,"InnerSurrounding"=>30,"Mode"=>0);
 
  
$myPicture->drawBarChart($settings,$r,$g,$b);

 /* Render the picture (choose the best way) */
 $picname=$student_id.'_'.$name.'_'.$time.'.png';
 $this->fun_getImageLog($student_id,$picname,$type,$time,$name);
 $myPicture->render("uploads/graph/".$picname);
		       }
		  
		  
		  
		function func_graphGenerate($student_id,$option_email="")
		    {
			  
			
	//		   $basepath="C:\Windows\Fonts/";
		       $basepath="/opt/bitnami/apache2/htdocs/ruckus_dev/lib/model/fonts/";
		      $time=time();
			   $piegraph=$this->func_piegraphGenerate($student_id,$time,"pie",$basepath);
			   $total_time=$piegraph['book_time']['0'];
			   unset($piegraph['book_time']);
			   $bargraph=$this->func_bargraphGenerate($student_id,$time,"bar",$basepath,1,'0','72','132',"bar");
			   $bargraph1=$this->func_bargraphGenerate($student_id,$time,"bar",$basepath,0,'151','17','24',"bar1");
               $this->func_mailformat($total_time,$student_id,$time,$option_email,$piegraph);	
		    }
	
	
	
// root path for file upload
	public function basepath() {
	
			$path = "c://wamp/www/ruckus_dev/web/";       
            return $path;
      
    }
// End of root path for file upload

}

?>