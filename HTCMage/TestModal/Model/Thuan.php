<?php

namespace HTCMage\TestModal\Model;

use Magento\Framework\Model\AbstractModel;
use HTCMage\TestModal\Model\ResourceModel\Thuan as ResourceModel;

class Thuan extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('HTCMage\TestModal\Model\ResourceModel\Thuan');
    }
}