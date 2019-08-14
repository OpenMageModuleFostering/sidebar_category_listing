<?php

class Matrix_Sidecat_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function isEnabled() {
		return (int)Mage::getStoreConfig('sidecat/display_settings/enabled');
	}
	public function displayOnSideBar() {
		return Mage::getStoreConfig('sidecat/display_settings/position');
	}
	public function getShowType(){
		return Mage::getStoreConfig('sidecat/display_settings/show_type');
	}
	public function getShowFont(){
		return Mage::getStoreConfig('sidecat/display_settings/show_font');
	}
	public function getCategoryColor(){
		return Mage::getStoreConfig('sidecat/display_settings/category_color');
	}
	public function getCategoryBg(){
		return Mage::getStoreConfig('sidecat/display_settings/category_background');
	}
	public function getCategoryLabel(){
		return Mage::getStoreConfig('sidecat/display_settings/category_label');
	}
	public function getCategoryTextColor(){
		return Mage::getStoreConfig('sidecat/display_settings/category_textColor');
	}
}
