<?php

class Matrix_Sidecat_Model_Mysql4_Sidecat extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the sidecat_id refers to the key field in your database table.
        $this->_init('sidecat/sidecat', 'sidecat_id');
    }
}
