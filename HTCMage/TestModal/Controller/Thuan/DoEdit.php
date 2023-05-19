<?php
namespace HTCMage\TestModal\Controller\Thuan;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use HTCMage\TestModal\Model\Thuan;

class DoEdit extends Action
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
        $update = $this->getRequest()->getParams();
        $this->myModelResource->load($update['id']);
        $this->myModelResource->setData('name',$update['name']);
        $this->myModelResource->save();
        
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('testmodal/test/add');
        return $redirect;
    }
}