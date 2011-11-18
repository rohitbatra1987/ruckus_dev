<?php

/**
 * activities actions.
 *
 * @package    ruckus_dev
 * @subpackage activities
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activitiesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->activitiess = Doctrine_Core::getTable('Activities')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->activities = Doctrine_Core::getTable('Activities')->find(array($request->getParameter('activity_id')));
    $this->forward404Unless($this->activities);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActivitiesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActivitiesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($activities = Doctrine_Core::getTable('Activities')->find(array($request->getParameter('activity_id'))), sprintf('Object activities does not exist (%s).', $request->getParameter('activity_id')));
    $this->form = new ActivitiesForm($activities);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($activities = Doctrine_Core::getTable('Activities')->find(array($request->getParameter('activity_id'))), sprintf('Object activities does not exist (%s).', $request->getParameter('activity_id')));
    $this->form = new ActivitiesForm($activities);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($activities = Doctrine_Core::getTable('Activities')->find(array($request->getParameter('activity_id'))), sprintf('Object activities does not exist (%s).', $request->getParameter('activity_id')));
    $activities->delete();

    $this->redirect('activities/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $activities = $form->save();

      $this->redirect('activities/edit?activity_id='.$activities->getActivityId());
    }
  }
}
