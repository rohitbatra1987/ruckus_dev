<?php

/**
 * metric_parameters actions.
 *
 * @package    ruckus_dev
 * @subpackage metric_parameters
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class metric_parametersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->metric_parameterss = Doctrine_Core::getTable('MetricParameters')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->metric_parameters = Doctrine_Core::getTable('MetricParameters')->find(array($request->getParameter('metric_id')));
    $this->forward404Unless($this->metric_parameters);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MetricParametersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MetricParametersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($metric_parameters = Doctrine_Core::getTable('MetricParameters')->find(array($request->getParameter('metric_id'))), sprintf('Object metric_parameters does not exist (%s).', $request->getParameter('metric_id')));
    $this->form = new MetricParametersForm($metric_parameters);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($metric_parameters = Doctrine_Core::getTable('MetricParameters')->find(array($request->getParameter('metric_id'))), sprintf('Object metric_parameters does not exist (%s).', $request->getParameter('metric_id')));
    $this->form = new MetricParametersForm($metric_parameters);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($metric_parameters = Doctrine_Core::getTable('MetricParameters')->find(array($request->getParameter('metric_id'))), sprintf('Object metric_parameters does not exist (%s).', $request->getParameter('metric_id')));
    $metric_parameters->delete();

    $this->redirect('metric_parameters/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $metric_parameters = $form->save();

      $this->redirect('metric_parameters/edit?metric_id='.$metric_parameters->getMetricId());
    }
  }
}
