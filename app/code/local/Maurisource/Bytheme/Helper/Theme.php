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
 * Theme helper
 *
 * @category    Maurisource
 * @package     Maurisource_Bytheme
 * @author      Ultimate Module Creator
 */
class Maurisource_Bytheme_Helper_Theme
    extends Mage_Core_Helper_Abstract {
    /**
     * get the url to the themes list page
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getThemesUrl(){
        if ($listKey = Mage::getStoreConfig('maurisource_bytheme/theme/url_rewrite_list')) {
            return Mage::getUrl('', array('_direct'=>$listKey));
        }
        return Mage::getUrl('maurisource_bytheme/theme/index');
    }
    /**
     * check if breadcrumbs can be used
     * @access public
     * @return bool
     * @author Ultimate Module Creator
     */
    public function getUseBreadcrumbs(){
        return Mage::getStoreConfigFlag('maurisource_bytheme/theme/breadcrumbs');
    }
    /**
     * check if the rss for theme is enabled
     * @access public
     * @return bool
     * @author Ultimate Module Creator
     */
    public function isRssEnabled(){
        return  Mage::getStoreConfigFlag('rss/config/active') && Mage::getStoreConfigFlag('maurisource_bytheme/theme/rss');
    }
    /**
     * get the link to the theme rss list
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getRssUrl(){
        return Mage::getUrl('maurisource_bytheme/theme/rss');
    }
}
