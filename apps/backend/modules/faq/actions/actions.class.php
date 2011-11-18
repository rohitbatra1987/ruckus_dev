<?php

/**
 * faq actions.
 *
 * @package    ruckus_dev
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->faqs = Doctrine_Core::getTable('Faq')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->faq = Doctrine_Core::getTable('Faq')->find(array($request->getParameter('faq_id')));
    $this->forward404Unless($this->faq);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FaqForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FaqForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($faq = Doctrine_Core::getTable('Faq')->find(array($request->getParameter('faq_id'))), sprintf('Object faq does not exist (%s).', $request->getParameter('faq_id')));
    $this->form = new FaqForm($faq);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($faq = Doctrine_Core::getTable('Faq')->find(array($request->getParameter('faq_id'))), sprintf('Object faq does not exist (%s).', $request->getParameter('faq_id')));
    $this->form = new FaqForm($faq);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($faq = Doctrine_Core::getTable('Faq')->find(array($request->getParameter('faq_id'))), sprintf('Object faq does not exist (%s).', $request->getParameter('faq_id')));
    $faq->delete();

    $this->redirect('faq/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $faq = $form->save();

      $this->redirect('faq/edit?faq_id='.$faq->getFaqId());
    }
  }
}
