<?php

/**
 * Avatar form.
 *
 * @package    ruckus_dev
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AvatarForm extends BaseAvatarForm
{
  public function configure()
  {
	  $this->widgetSchema['avt_image'] = new sfWidgetFormInputFileEditable(array(
      'file_src' => '/'.basename(sfConfig::get('Avatar')).'/'.$this->getObject()->getAvtImage(),
      'is_image' => true,
      'edit_mode' => strlen($this->getObject()->getAvt_image()) > 0,
      'template'  => '<div>%file%%input%</div>'
    ));
  }
}
