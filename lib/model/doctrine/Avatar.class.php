<?php

/**
 * Avatar
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Avatar extends BaseAvatar
{
	 public function save(Doctrine_Connection $conn = null)
      {
		$cls_commonfunction = new CommonFunctions();
		$path= $cls_commonfunction->basepath();
		
		
	    $file = $_FILES;
         if($file['avatar']['name']['avt_image']!=''){
            if(move_uploaded_file($file['avatar']['tmp_name']['avt_image'], $path."uploads/avatar/".time()."_".$file['avatar']['name']['avt_image'])){
               $this->setAvtImage(time()."_".$file['avatar']['name']['avt_image']);
            }
        }else{
		
			$this->getAvtImage("");
			
			}
        
      return parent::save($conn);
      }


}