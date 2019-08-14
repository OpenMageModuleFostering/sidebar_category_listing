<?php

class Matrix_Sidecat_Model_System_Config_Type
{
    public function toOptionArray()
    {
        $options = array(
					array('value'=>'static','label'=> Mage::helper('sidecat')->__('Visible')),
					array('value'=>'click-2-click','label'=> Mage::helper('sidecat')->__('Onclick')),
					array('value'=>'fly-out','label'=> Mage::helper('sidecat')->__('Mousehover')),
				);
		
		return $options;
    }
}
