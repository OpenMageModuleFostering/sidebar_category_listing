<?php

class Matrix_Sidecat_Model_System_Config_Font
{
    public function toOptionArray()
    {
        $options = array(
					array('value'=>'lowercase','label'=> Mage::helper('sidecat')->__('Lowercase')),
					array('value'=>'uppercase','label'=> Mage::helper('sidecat')->__('Uppercase')),
					array('value'=>'capitalize','label'=> Mage::helper('sidecat')->__('Capitalize')),
				);
		
		return $options;
    }
}
