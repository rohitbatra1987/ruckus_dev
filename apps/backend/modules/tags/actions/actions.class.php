<?php

/**
 * tags actions.
 *
 * @package    ruckus_dev
 * @subpackage tags
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tagsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tagss = Doctrine_Core::getTable('Tags')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tags = Doctrine_Core::getTable('Tags')->find(array($request->getParameter('tag_id')));
    $this->forward404Unless($this->tags);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TagsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TagsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tags = Doctrine_Core::getTable('Tags')->find(array($request->getParameter('tag_id'))), sprintf('Object tags does not exist (%s).', $request->getParameter('tag_id')));
    $this->form = new TagsForm($tags);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tags = Doctrine_Core::getTable('Tags')->find(array($request->getParameter('tag_id'))), sprintf('Object tags does not exist (%s).', $request->getParameter('tag_id')));
    $this->form = new TagsForm($tags);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tags = Doctrine_Core::getTable('Tags')->find(array($request->getParameter('tag_id'))), sprintf('Object tags does not exist (%s).', $request->getParameter('tag_id')));
    $tags->delete();

    $this->redirect('tags/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tags = $form->save();

      $this->redirect('tags/edit?tag_id='.$tags->getTagId());
    }
  }
}
