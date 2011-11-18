<?php

/**
 * api_user actions.
 *
 * @package    ruckus
 * @subpackage api_user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class api_userActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeForgot_password(sfWebRequest $request)
  {
      $response = array();
    $data = $request->getParameterHolder()->getAll();
                $get_values_from_email_address = Doctrine::getTable('User')->func_getValuesFromEmailAddress($data['email']);
                if (count($get_values_from_email_address)) {
                    $generate_random_value = Doctrine::getTable('User')->func_generateRandomValue();
                    $getSalt = Doctrine::getTable('User')->func_generateSalt();
                    $getPassword = Doctrine::getTable('User')->func_generatePassword($getSalt, $generate_random_value);
                    Doctrine::getTable('User')->func_updateForgotPassword($data['email'], $getPassword,$getSalt);
                    Doctrine::getTable('User')->func_sendForgotPasswordEmail($get_values_from_email_address['0']['first_name'],$data['email'],$generate_random_value);
                    $response['result'] = "success";
                } // if the email address exists
                else {
                    $response['result'] = "fail";
                }
    $json = json_encode($response);
    return $this->renderText($json);
  }
  
    public function executeLogin(sfWebRequest $request) { 
        //if ($request->isMethod('post')) {
                $response = array();
                $data = $request->getParameterHolder()->getAll();
                $getSaltForLogin = Doctrine::getTable('User')->func_getSaltForLogin($data['username']);
                if(count($getSaltForLogin))
                {
                	$getPassword = Doctrine::getTable('User')->func_generatePassword($getSaltForLogin['0']['salt'], $data['password']);
                	 $login = Doctrine::getTable('User')->func_login($data['username'],$getPassword);
                    if (count($login) && $login['0']['is_super_admin'] == 0) {
                       $response['result'] = "success";
                       $response['user_id'] = $login['0']['user_id'];
                    } // if login successful
                    else
                    {
                        $response['result'] = "fail";
                    }
                    
                } // if salt is found that is email or username exists 
                else {
                   $response['result'] = "fail";
                }
    $json = json_encode($response);
    return $this->renderText($json);
   // }// check POST method
    } // end of function
    
    
}
