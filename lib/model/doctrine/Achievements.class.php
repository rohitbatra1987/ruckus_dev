<?php

/**
 * Achievements
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ruckus_dev
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Achievements extends BaseAchievements
{
	 public function save(Doctrine_Connection $conn = null)
      {
		$cls_commonfunction = new CommonFunctions();
		$path= $cls_commonfunction->basepath();
		
		
	    $file = $_FILES;
		//print_r( $file);exit;
         if($file['achievements']['name']['ach_image']!=''){
            if(move_uploaded_file($file['achievements']['tmp_name']['ach_image'], $path."uploads/achievements/".time()."_".$file['achievements']['name']['ach_image'])){
               $this->setAchImage(time()."_".$file['achievements']['name']['ach_image']);
            }
        }else{
		
			$this->getAchImage("");
			
			}
        
      return parent::save($conn);
      }

}