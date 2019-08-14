<?php

class Matrix_Sidecat_Model_System_Config_Position
{
    public function toOptionArray()
    {
        $options = array(
					array('value'=>'left','label'=> Mage::helper('sidecat')->__('Left Sidebar')),
					array('value'=>'right','label'=> Mage::helper('sidecat')->__('Right Sidebar')),
				);
		
		return $options;
    }
}
