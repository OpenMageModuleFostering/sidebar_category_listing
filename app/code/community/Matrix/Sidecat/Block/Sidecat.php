<?php
/**
 * matrix infologics Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * @category   Matrix Infologics
 * Author Matrix Infologics - Gagandeep
 */ 


class Matrix_Sidecat_Block_Sidecat extends Mage_Catalog_Block_Navigation
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSidecat()     
     { 
        if (!$this->hasData('sidecat')) {
            $this->setData('sidecat', Mage::registry('sidecat'));
        }
        return $this->getData('sidecat');
        
    }
	public function leftSidebarBlock() {
		$block = $this->getParentBlock();
		if($block) {
			
			if(Mage::helper('sidecat')->displayOnSideBar() == 'left') {
				$sidebarBlock = $this->getLayout()->createBlock('sidecat/sidebar');
				$block->insert($sidebarBlock,'', true, 'cat-sidebar');
			}
		}
	}
	public function rightSidebarBlock() {
		$block = $this->getParentBlock();
		if($block) {
			if(Mage::helper('sidecat')->displayOnSideBar() == 'right') {
				$sidebarBlock = $this->getLayout()->createBlock('sidecat/sidebar');
			
				$block->insert($sidebarBlock, '', true, 'cat-sidebar');
			}
		}
	}
}
