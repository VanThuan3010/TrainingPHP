<?php
namespace HTCMage\TestModal\Block;

use \Magento\Framework\View\Element\Template\Context;
use \HTCMage\TestModal\Model\ResourceModel\Thuan\CollectionFactory as viewCollectionFactory;

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
        $viewCollection->addFieldToSelect('*')->load();
        return $viewCollection->getItems();
    }

     public function getPostUrl()
    {
        return $this->getUrl('testmodal/thuan/save');
    }

    public function getEditPageUrl()
    {
        return $this->getUrl('testmodal/thuan/edit');
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('testmodal/thuan/delete');
    }
}
