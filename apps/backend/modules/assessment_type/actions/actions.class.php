<?php

/**
 * assessment_type actions.
 *
 * @package    ruckus_dev
 * @subpackage assessment_type
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assessment_typeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->assessment_types = Doctrine_Core::getTable('AssessmentType')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->assessment_type = Doctrine_Core::getTable('AssessmentType')->find(array($request->getParameter('assessment_type_id')));
    $this->forward404Unless($this->assessment_type);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AssessmentTypeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AssessmentTypeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($assessment_type = Doctrine_Core::getTable('AssessmentType')->find(array($request->getParameter('assessment_type_id'))), sprintf('Object assessment_type does not exist (%s).', $request->getParameter('assessment_type_id')));
    $this->form = new AssessmentTypeForm($assessment_type);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($assessment_type = Doctrine_Core::getTable('AssessmentType')->find(array($request->getParameter('assessment_type_id'))), sprintf('Object assessment_type does not exist (%s).', $request->getParameter('assessment_type_id')));
    $this->form = new AssessmentTypeForm($assessment_type);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($assessment_type = Doctrine_Core::getTable('AssessmentType')->find(array($request->getParameter('assessment_type_id'))), sprintf('Object assessment_type does not exist (%s).', $request->getParameter('assessment_type_id')));
    $assessment_type->delete();

    $this->redirect('assessment_type/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $assessment_type = $form->save();

      $this->redirect('assessment_type/edit?assessment_type_id='.$assessment_type->getAssessmentTypeId());
    }
  }
}
