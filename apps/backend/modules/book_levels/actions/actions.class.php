<?php

/**
 * book_levels actions.
 *
 * @package    ruckus_dev
 * @subpackage book_levels
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class book_levelsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->book_levelss = Doctrine_Core::getTable('BookLevels')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->book_levels = Doctrine_Core::getTable('BookLevels')->find(array($request->getParameter('level_id')));
    $this->forward404Unless($this->book_levels);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BookLevelsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BookLevelsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($book_levels = Doctrine_Core::getTable('BookLevels')->find(array($request->getParameter('level_id'))), sprintf('Object book_levels does not exist (%s).', $request->getParameter('level_id')));
    $this->form = new BookLevelsForm($book_levels);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($book_levels = Doctrine_Core::getTable('BookLevels')->find(array($request->getParameter('level_id'))), sprintf('Object book_levels does not exist (%s).', $request->getParameter('level_id')));
    $this->form = new BookLevelsForm($book_levels);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($book_levels = Doctrine_Core::getTable('BookLevels')->find(array($request->getParameter('level_id'))), sprintf('Object book_levels does not exist (%s).', $request->getParameter('level_id')));
    $book_levels->delete();

    $this->redirect('book_levels/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $book_levels = $form->save();

      $this->redirect('book_levels/edit?level_id='.$book_levels->getLevelId());
    }
  }
}
