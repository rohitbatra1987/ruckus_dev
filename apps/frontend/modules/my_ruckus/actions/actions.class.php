<?php

/**
 * my_ruckus actions.
 *
 * @package    ruckus
 * @subpackage my_ruckus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class my_ruckusActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
       if(!$this->getUser()->isAuthenticated())
   {
       $this->redirect('@login');
   }
   $this->user_id = $this->getUser()->getAttribute('user_id');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->user = Doctrine_Core::getTable('User')->find(array($request->getParameter('user_id')));
    $this->forward404Unless($this->user);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('user_id'))), sprintf('Object user does not exist (%s).', $request->getParameter('user_id')));
    $this->form = new UsersEditForm($user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('user_id'))), sprintf('Object user does not exist (%s).', $request->getParameter('user_id')));
    $this->form = new UsersEditForm($user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($user = Doctrine_Core::getTable('User')->find(array($request->getParameter('user_id'))), sprintf('Object user does not exist (%s).', $request->getParameter('user_id')));
    $user->delete();

    $this->redirect('my_ruckus/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

      $this->redirect('@my_ruckus');
    }
  }
}
