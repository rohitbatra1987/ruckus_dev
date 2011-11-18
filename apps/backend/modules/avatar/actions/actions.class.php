<?php

/**
 * avatar actions.
 *
 * @package    ruckus_dev
 * @subpackage avatar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class avatarActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->avatars = Doctrine_Core::getTable('Avatar')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->avatar = Doctrine_Core::getTable('Avatar')->find(array($request->getParameter('avatar_id')));
    $this->forward404Unless($this->avatar);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AvatarForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AvatarForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($avatar = Doctrine_Core::getTable('Avatar')->find(array($request->getParameter('avatar_id'))), sprintf('Object avatar does not exist (%s).', $request->getParameter('avatar_id')));
    $this->form = new AvatarForm($avatar);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($avatar = Doctrine_Core::getTable('Avatar')->find(array($request->getParameter('avatar_id'))), sprintf('Object avatar does not exist (%s).', $request->getParameter('avatar_id')));
    $this->form = new AvatarForm($avatar);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($avatar = Doctrine_Core::getTable('Avatar')->find(array($request->getParameter('avatar_id'))), sprintf('Object avatar does not exist (%s).', $request->getParameter('avatar_id')));
    $avatar->delete();

    $this->redirect('avatar/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $avatar = $form->save();

      $this->redirect('avatar/edit?avatar_id='.$avatar->getAvatarId());
    }
  }
}
