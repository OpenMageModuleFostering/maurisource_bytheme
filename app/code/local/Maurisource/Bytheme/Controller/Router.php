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
 * Router
 *
 * @category    Maurisource
 * @package     Maurisource_Bytheme
 * @author      Ultimate Module Creator
 */
class Maurisource_Bytheme_Controller_Router
    extends Mage_Core_Controller_Varien_Router_Abstract {
    /**
     * init routes
     * @access public
     * @param Varien_Event_Observer $observer
     * @return Maurisource_Bytheme_Controller_Router
     * @author Ultimate Module Creator
     */
    public function initControllerRouters($observer){
        $front = $observer->getEvent()->getFront();
        $front->addRouter('maurisource_bytheme', $this);
        return $this;
    }
    /**
     * Validate and match entities and modify request
     * @access public
     * @param Zend_Controller_Request_Http $request
     * @return bool
     * @author Ultimate Module Creator
     */
    public function match(Zend_Controller_Request_Http $request){
        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()
                ->setRedirect(Mage::getUrl('install'))
                ->sendResponse();
            exit;
        }

        
	

        $urlKey = trim($request->getPathInfo(), '/');
        
	if ($urlKey == Mage::getStoreConfig('categorybrowser_options/messages/url_slug',Mage::app()->getStore())){
                    $request->setModuleName('by-category')
                        ->setControllerName('theme')
                        ->setActionName('index');
		return true;
	}elseif (substr($urlKey,0,8) == Mage::getStoreConfig('categorybrowser_options/messages/url_slug',Mage::app()->getStore())){
		$var = str_replace(Mage::getStoreConfig('categorybrowser_options/messages/url_slug',Mage::app()->getStore()) . '/','',$urlKey);
                    $request->setModuleName('by-theme')
                        ->setControllerName('theme')
                        ->setActionName('view')
			->setParam('themeId',$var);
                return true;

	}


        return false;
    }
}
