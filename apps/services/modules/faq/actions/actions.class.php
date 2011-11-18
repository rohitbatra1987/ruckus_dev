<?php

/**
 * getdata actions.
 *
 * @package    ruckus
 * @subpackage getdata
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
	var $table = '';
	public function executeCreate(sfWebRequest $request)
	  {
		
			$data = $request->getParameterHolder()->getAll(); 
			$data_array = json_decode($data['data'],true); 
			$faqData = Doctrine::getTable('faq')->func_getFaqData();
			$response=array();
			if(empty($faqData))
			   {
			         $response['faq'][0]['status']="No Faq Found";
				
			   }
			 else
			   {  
			$i=0;
			foreach($faqData as $faq)
			   {
			       $response['faq'][$i]['title']=$faq['faq_title'];
				   $response['faq'][$i]['faq_description']=$faq['faq_description'];
			   $i=$i+1;
			   }
			   }
		     
		   $json = json_encode($response);
	    	return $this->renderText($json);
		  
	 
	}
}
