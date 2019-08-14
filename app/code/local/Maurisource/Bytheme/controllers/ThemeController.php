<?php
/**
 * Maurisource_Bytheme extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Maurisource
 * @package        Maurisource_Bytheme
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Theme front contrller
 *
 * @category    Maurisource
 * @package     Maurisource_Bytheme
 * @author      Ultimate Module Creator
 */
class Maurisource_Bytheme_ThemeController
    extends Mage_Core_Controller_Front_Action {
    /**
      * default action
      * @access public
      * @return void
      * @author Ultimate Module Creator
      */
    public function indexAction(){
         $this->loadLayout();
         $this->_initLayoutMessages('catalog/session');
         $this->_initLayoutMessages('customer/session');
         $this->_initLayoutMessages('checkout/session');
         if (Mage::helper('maurisource_bytheme/theme')->getUseBreadcrumbs()){
             if ($breadcrumbBlock = $this->getLayout()->getBlock('breadcrumbs')){
                 $breadcrumbBlock->addCrumb('home', array(
                            'label'    => Mage::helper('maurisource_bytheme')->__('Home'),
                            'link'     => Mage::getUrl(),
                        )
                 );
                 $breadcrumbBlock->addCrumb('themes', array(
                            'label'    => Mage::helper('maurisource_bytheme')->__('Themes'),
                            'link'    => '',
                    )
                 );
             }
         }
        $this->renderLayout();
    }
   
}
