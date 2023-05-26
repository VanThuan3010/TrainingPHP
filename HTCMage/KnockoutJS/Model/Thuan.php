<?php

namespace HTCMage\KnockoutJS\Model;

use Magento\Framework\Model\AbstractModel;
use HTCMage\KnockoutJS\Model\ResourceModel\Thuan as ResourceModel;

class Thuan extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('HTCMage\KnockoutJS\Model\ResourceModel\Thuan');
    }
}