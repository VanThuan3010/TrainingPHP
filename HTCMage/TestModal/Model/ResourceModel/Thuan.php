<?php

namespace HTCMage\TestModal\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Thuan extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('thuan', 'id');
    }
}