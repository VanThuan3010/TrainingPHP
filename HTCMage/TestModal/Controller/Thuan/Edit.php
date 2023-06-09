<?php
namespace HTCMage\TestModal\Controller\Thuan;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use HTCMage\TestModal\Model\Thuan;

class Edit extends Action
{
    protected $myModelResource;

    public function __construct(
        Context $context,
        Thuan $myModelResource,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->myModelResource = $myModelResource;
        $this->PageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->PageFactory->create();
    }
}