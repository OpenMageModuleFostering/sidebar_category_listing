<?php

class Matrix_Sidecat_Model_Sidecat extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('sidecat/sidecat');
    }
}
