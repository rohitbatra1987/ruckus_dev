<?php

/**
 * book_series actions.
 *
 * @package    ruckus_dev
 * @subpackage book_series
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class book_seriesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->book_seriess = Doctrine_Core::getTable('BookSeries')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->book_series = Doctrine_Core::getTable('BookSeries')->find(array($request->getParameter('series_id')));
    $this->forward404Unless($this->book_series);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BookSeriesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BookSeriesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($book_series = Doctrine_Core::getTable('BookSeries')->find(array($request->getParameter('series_id'))), sprintf('Object book_series does not exist (%s).', $request->getParameter('series_id')));
    $this->form = new BookSeriesForm($book_series);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($book_series = Doctrine_Core::getTable('BookSeries')->find(array($request->getParameter('series_id'))), sprintf('Object book_series does not exist (%s).', $request->getParameter('series_id')));
    $this->form = new BookSeriesForm($book_series);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($book_series = Doctrine_Core::getTable('BookSeries')->find(array($request->getParameter('series_id'))), sprintf('Object book_series does not exist (%s).', $request->getParameter('series_id')));
    $book_series->delete();

    $this->redirect('book_series/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $book_series = $form->save();

      $this->redirect('book_series/edit?series_id='.$book_series->getSeriesId());
    }
  }
}
