<?php

namespace HTCMage\TestModal\Controller\Thuan;

use HTCMage\TestModal\Model\Thuan;
use HTCMage\TestModal\Model\ResourceModel\Thuan as HeroResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    private $hero;
    private $heroResourceModel;

    public function __construct(
        Context $context,
        Thuan $hero,
        HeroResourceModel $heroResourceModel
    ) {
        $this->hero = $hero;
        $this->heroResourceModel = $heroResourceModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $params = $this->getRequest()->getParams();
        $hero = $this->hero->setData($params);
        try {
            $this->heroResourceModel->save($hero);
            $this->messageManager->addSuccessMessage(__("Successfully added %1", $params['name']));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong."));
        }
        
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('testmodal/test/add');
        return $redirect;
    }
}