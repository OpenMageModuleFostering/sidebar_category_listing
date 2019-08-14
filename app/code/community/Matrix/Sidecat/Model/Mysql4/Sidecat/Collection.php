<?php

class Matrix_Sidecat_Model_Mysql4_Sidecat_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('sidecat/sidecat');
    }
}
