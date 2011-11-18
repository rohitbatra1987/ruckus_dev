<?php

/**
 * activity_parameters actions.
 *
 * @package    ruckus_dev
 * @subpackage activity_parameters
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activity_parametersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->activity_parameterss = Doctrine_Core::getTable('ActivityParameters')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->activity_parameters = Doctrine_Core::getTable('ActivityParameters')->find(array($request->getParameter('assessment_id')));
    $this->forward404Unless($this->activity_parameters);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActivityParametersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ActivityParametersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($activity_parameters = Doctrine_Core::getTable('ActivityParameters')->find(array($request->getParameter('assessment_id'))), sprintf('Object activity_parameters does not exist (%s).', $request->getParameter('assessment_id')));
    $this->form = new ActivityParametersForm($activity_parameters);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($activity_parameters = Doctrine_Core::getTable('ActivityParameters')->find(array($request->getParameter('assessment_id'))), sprintf('Object activity_parameters does not exist (%s).', $request->getParameter('assessment_id')));
    $this->form = new ActivityParametersForm($activity_parameters);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($activity_parameters = Doctrine_Core::getTable('ActivityParameters')->find(array($request->getParameter('assessment_id'))), sprintf('Object activity_parameters does not exist (%s).', $request->getParameter('assessment_id')));
    $activity_parameters->delete();

    $this->redirect('activity_parameters/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $activity_parameters = $form->save();

      $this->redirect('activity_parameters/edit?assessment_id='.$activity_parameters->getAssessmentId());
    }
  }
}
