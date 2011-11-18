<?php

/**
 * achievements actions.
 *
 * @package    ruckus_dev
 * @subpackage achievements
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class achievementsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->achievementss = Doctrine_Core::getTable('Achievements')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->achievements = Doctrine_Core::getTable('Achievements')->find(array($request->getParameter('achievement_id')));
    $this->forward404Unless($this->achievements);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AchievementsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AchievementsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($achievements = Doctrine_Core::getTable('Achievements')->find(array($request->getParameter('achievement_id'))), sprintf('Object achievements does not exist (%s).', $request->getParameter('achievement_id')));
    $this->form = new AchievementsForm($achievements);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($achievements = Doctrine_Core::getTable('Achievements')->find(array($request->getParameter('achievement_id'))), sprintf('Object achievements does not exist (%s).', $request->getParameter('achievement_id')));
    $this->form = new AchievementsForm($achievements);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($achievements = Doctrine_Core::getTable('Achievements')->find(array($request->getParameter('achievement_id'))), sprintf('Object achievements does not exist (%s).', $request->getParameter('achievement_id')));
    $achievements->delete();

    $this->redirect('achievements/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $achievements = $form->save();

      $this->redirect('achievements/edit?achievement_id='.$achievements->getAchievementId());
    }
  }
}
