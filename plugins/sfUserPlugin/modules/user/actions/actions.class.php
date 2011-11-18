<?php

/**
 * ActivityForm actions.
 *
 * @package    ruckus
 * @subpackage ActivityForm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

    
	var $checkUsernameAndEmail = "";
    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->hasCredential('user') == "") {
            $this->redirect('@login');
        } else {
            $this->redirect('@my_ruckus');
        }
    }

    /*     * **********   Login Function **************** */

    public function executeLogin(sfWebRequest $request) {
        if($this->getUser()->isAuthenticated())
        {
         $this->redirect('@my_ruckus');   
        }
        $this->form = new UsersLoginForm();       
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $formData = $this->form->getValues();
                $getSaltForLogin = Doctrine::getTable('User')->func_getSaltForLogin($formData['email']);
                if(count($getSaltForLogin))
                {
                	$getPassword = Doctrine::getTable('User')->func_generatePassword($getSaltForLogin['0']['salt'], $formData['password']);
                	$login = Doctrine::getTable('User')->func_login($formData['email'],$getPassword);
                    if (count($login)) {

                    Doctrine::getTable('User')->func_lastLogin($login['0']['user_id']);
                    $this->getUser()->setAttribute('user_id', $login['0']['user_id']);  
                    if($login['0']['is_super_admin'] == 1)
                    {
                    $this->getUser()->addCredential('SuperAdministrator');
                    }
                    $this->getUser()->setAuthenticated(true);

                        $this->getUser()->setFlash('message', 'You have logged in successfully.');
                        $this->redirect('@my_ruckus');
                    } // if login successful
                } // if salt is found that is email or username exists 
                else {
                    $this->getUser()->setFlash('message', 'Incorect Deatil Please try again');
                }
        } // if form is valid
    }// check POST method
    } // end of function

    /*     * **********   Login Function **************** */

    /*     * *********    NewUser Function ************** */

    public function executeNewuser(sfWebRequest $request) {
        $this->form = new UserForm();
        // check if the data is coming from POST method
        if ($request->isMethod('post')) {           
            // bind the form
        	$this->form->bind($request->getParameter($this->form->getName()));
                $captcha = new reCaptcha();
                $responsecaptcha = $captcha->recaptcha_check_answer($_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);                
                //check capcha
                if (!$responsecaptcha->is_valid) {
                    $this->getUser()->setFlash('message', 'Invalid Sequrity Code,Please enter again');
                }
                // get all values from form 
                else {
                    $formData = $this->form->getValues();
					$checkUsernameAndEmail = Doctrine::getTable('User')->func_checkUsernameAndEmail($formData['email_address'],$formData['username']);
                    if (count($checkUsernameAndEmail)) {
                        $this->getUser()->setFlash('message', 'UserName or Email is already taken');
                    } else {
                        $user = new User();
                        $user->setUsername($formData['username']);
                        $getSalt = Doctrine::getTable('User')->func_generateSalt();
                        $getPassword = Doctrine::getTable('User')->func_generatePassword($getSalt, $formData['pass']);
                        $user->setSalt($getSalt);
                        $user->setPass($getPassword);
                        $user->setIsActive(0);
                        $user->setFirstName($formData['first_name']);
                        $user->setLastName($formData['last_name']);
                        $user->setEmailAddress($formData['email_address']);
                        $user->save();
                        Doctrine::getTable('User')->func_sendVerificationEmail($formData['first_name'],$formData['email_address'],$getSalt);                      
                        $this->getUser()->setFlash('message', 'Thanks for registration. Account activation link has been sent into your email address.');
                        $this->redirect('@login');
                    } // if the username and email does not exist
                }
        }// check if the method is POST
    }

    /*     * *********    NewUser Function ************** */


    /*     * *********    Account Confirmation  Function ************** */

    public function executeConfirm(sfWebRequest $request) {
        $verify_code = $_GET['verify_code'];
        $email_address = $_GET['email_address'];
        $confirmSuccess = Doctrine::getTable('User')->func_confirmSaltToVerifyEmail($email_address, $verify_code);
        if (count($confirmSuccess)) {
        	Doctrine::getTable('User')->func_activate($email_address);
        	$user_id = Doctrine::getTable('User')->func_getValuesFromEmailAddress($email_address);
            $this->getUser()->addCredential('user', $user_id['0']['user_id']);
            $this->getUser()->setFlash('message', 'You have logged 
in successfully.');
            $this->redirect('user/home');
        } else {
            $this->getUser()->setFlash('message', 'Incorrect Attempt to confirm account');
            $this->redirect('user/login');
        }
    }

    /*     * *********    Account Confirmation  Function ************** */


    /*     * *********    Logout  Function ************** */

    public function executeLogout(sfWebRequest $request) {

        $this->getUser()->removeCredential('user');
        $this->getUser()->setAuthenticated(false);
        $this->redirect('user/login');
    }

    /*     * *********    Logout  Function ********************** */

    /*     * *********    Forgotpassword  Function ************** */

    public function executeForgotpassword(sfWebRequest $request) {
        $this->form = new UsersForgotPasswordForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $formData = $this->form->getValues();
                $get_values_from_email_address = Doctrine::getTable('User')->func_getValuesFromEmailAddress($formData['email']);
                if (count($get_values_from_email_address)) {
                    $generate_random_value = Doctrine::getTable('User')->func_generateRandomValue();
                    $getSalt = Doctrine::getTable('User')->func_generateSalt();
                    $getPassword = Doctrine::getTable('User')->func_generatePassword($getSalt, $generate_random_value);
                    Doctrine::getTable('User')->func_updateForgotPassword($formData['email'], $getPassword,$getSalt);
                    Doctrine::getTable('User')->func_sendForgotPasswordEmail($get_values_from_email_address['0']['first_name'],$formData['email'],$generate_random_value);
                    $this->getUser()->setFlash('message', 'Your Password has been reset and has been sent into your email address');
                    $this->redirect('@login');
                } // if the email address exists
                else {
                    $this->getUser()->setFlash('message', 'Sorry,Email Address is not exists. Please enter another email address');
                    $this->redirect('user/forgotpassword');
                }
            } // if the data is valid
        } // if the data is coming from POST method
    } // end of function

    /*     * *********    Forgotpassword  Function ************** */

    /*     * *********    Home Function ************** */

    public function executeHome(sfWebRequest $request) {
        $this->getUser()->setAuthenticated(true);
        if ($this->getUser()->hasCredential('user') == "") {
              $this->redirect('user/login'); 
        }
    }

    /*     * *********    Home Function ************** */

}

