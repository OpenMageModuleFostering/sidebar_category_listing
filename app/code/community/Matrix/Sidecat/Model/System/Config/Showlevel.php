<?php

class Matrix_Sidecat_Model_System_Config_Showlevel
{
    public function toOptionArray()
    {
        $options = array(
					array('value'=>'all','label'=> Mage::helper('sidecat')->__('All')),
					array('value'=>1,'label'=> Mage::helper('sidecat')->__('1')),
					array('value'=>2,'label'=> Mage::helper('sidecat')->__('2')),
					array('value'=>3,'label'=> Mage::helper('sidecat')->__('3')),
					array('value'=>4,'label'=> Mage::helper('sidecat')->__('4')),
				);
		
		return $options;
    }
}
