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
 * Theme list block
 *
 * @category    Maurisource
 * @package     Maurisource_Bytheme
 * @author Ultimate Module Creator
 */
class Maurisource_Bytheme_Block_Theme_List
    extends Mage_Core_Block_Template {
    /**
     * prepare the layout
     * @access protected
     * @return Maurisource_Bytheme_Block_Theme_List
     * @author Ultimate Module Creator
     */
    protected function _prepareLayout(){
        parent::_prepareLayout();
        return $this;
    }

	public function getCategories(){
		$arrCats = array();
                
                
		$categories = Mage::getModel('catalog/category')->getCategories(Mage::getStoreConfig('categorybrowser_options/messages/starting_directory',Mage::app()->getStore()));

		foreach ($categories as $cat){
			$arrCats[] = array(
				'cat' => $cat,
				'children' => Mage::getModel('catalog/category')->getCategories($cat->getId())
			);
		}

		return $arrCats;
	}
}
