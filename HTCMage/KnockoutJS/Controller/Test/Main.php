<?php

namespace HTCMage\KnockoutJS\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use HTCMage\KnockoutJS\Model\ResourceModel\Thuan\CollectionFactory;

class Main extends Action
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
        return $this->PageFactory->create();
    }
}