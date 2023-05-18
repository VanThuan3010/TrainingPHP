<?php

namespace HTCMage\TestModal\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use HTCMage\TestModal\Model\ResourceModel\Thuan\CollectionFactory;

class Add extends Action
{
    protected $PageFactory;
    protected $thuanFactory;

    public function __construct(Context $context, PageFactory $pageFactory, CollectionFactory $thuanFactory)
    {
        parent::__construct($context);
        $this->PageFactory = $pageFactory;
        $this->thuanFactory = $thuanFactory;
    }

    public function execute()
    {
        // echo "Lấy dữ liệu từ bảng:";
        // $this->thuanFactory->create();
        // $collection = $this->thuanFactory->create()
        //     ->addFieldToSelect("*")
        //     ->setPageSize(3);
        // echo '<pre>';
        // print_r($collection->getData());
        // echo '<pre>';
        return $this->PageFactory->create();
    }
}