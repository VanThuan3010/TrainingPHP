<?php
namespace HTCMage\TestModal\Model\ResourceModel\Thuan;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use HTCMage\TestModal\Model\Thuan as Model;
use HTCMage\TestModal\Model\ResourceModel\Thuan as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}