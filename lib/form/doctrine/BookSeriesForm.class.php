<?php

/**
 * BookSeries form.
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookSeriesForm extends BaseBookSeriesForm
{
 public function configure()
  {
	  $this->widgetSchema['series_icon'] = new sfWidgetFormInputFileEditable(array(
      'file_src' => '/'.basename(sfConfig::get('BookSeries')).'/'.$this->getObject()->getSeriesIcon(),
      'is_image' => true,
      'edit_mode' => strlen($this->getObject()->getSeriesIcon()) > 0,
      'template'  => '<div>%file%%input%</div>'
    ));
  }
}
