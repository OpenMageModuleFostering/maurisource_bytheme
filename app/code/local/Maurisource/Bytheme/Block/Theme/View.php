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
 * Theme view block
 *
 * @category    Maurisource
 * @package     Maurisource_Bytheme
 * @author      Ultimate Module Creator
 */
class Maurisource_Bytheme_Block_Theme_View
    extends Mage_Core_Block_Template {
    /**
     * get the current theme
     * @access public
     * @return mixed (Maurisource_Bytheme_Model_Theme|null)
     * @author Ultimate Module Creator
     */

    protected function _prepareLayout(){
        parent::_prepareLayout();
        return $this;
    }

	public function getCategory($categoryId){
		return Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('*')
		->addAttributeToFilter('url_key',$categoryId)->getFirstItem();
	}

	public function getSubCategories($categoryId){
		$arrSub = array();		
		$cats = explode(",",$this->getCategory($categoryId)->getChildren());
		foreach ($cats as $cat){
			$arrSub[] = Mage::getModel('catalog/category')->load($cat);
		}		

		return $arrSub;

	}
}
