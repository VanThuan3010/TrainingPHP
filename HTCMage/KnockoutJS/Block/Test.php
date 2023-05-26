<?php
namespace HTCMage\KnockoutJS\Block;

use \Magento\Framework\View\Element\Template\Context;
use \HTCMage\KnockoutJS\Model\ResourceModel\Thuan\CollectionFactory as viewCollectionFactory;

class Test extends \Magento\Framework\View\Element\Template
{	
    protected $_viewCollectionFactory = null;

    public function __construct(
        Context $context,
        ViewCollectionFactory $viewCollectionFactory,
        array $data = []
    ) {
        $this->_viewCollectionFactory  = $viewCollectionFactory;
        parent::__construct($context, $data);
    }
    // connect
    public function getCollection()
    {
        $viewCollection = $this->_viewCollectionFactory ->create();
        $employeesData = [];
        // $viewCollection->addFieldToSelect('*')->load();
        // return json_encode($viewCollection->getItems());
        foreach ($viewCollection as $employ) {
           $employee = $employ->getData();
           $employeesData[] = [
                'id' => $employee['id'],
                'name' => $employee['name'],
                'age' => $employee['age'],
                'job' => $employee['job']
            ];
        }
        return json_encode($employeesData);
    }

    public function getPostUrl()
    {
        return $this->getUrl('knockoutjs/act/add');
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('knockoutjs/act/delete');
    }
}
