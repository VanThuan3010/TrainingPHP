<?php

namespace HTCMage\TestModal\Controller\Thuan;

use HTCMage\TestModal\Model\Thuan;
use Magento\Framework\Controller\Result\RedirectFactory;
use HTCMage\TestModal\Model\ResourceModel\Thuan as ResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    private $person;
    private $resourceModel;

    public function __construct(
        Context $context,
        Thuan $person,
        ResourceModel $resourceModel
    ) {
        $this->person = $person;
        $this->resourceModel = $resourceModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $params = $this->getRequest()->getParams('name');
        $per = $this->person->setData($params);
        try {
            $this->resourceModel->save($per);
            $this->messageManager->addSuccessMessage(__("Successfully added "));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong."));
        }
        
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('testmodal/test/add');
        return $redirect;
    }
}