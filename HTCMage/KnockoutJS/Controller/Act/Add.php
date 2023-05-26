<?php

namespace HTCMage\KnockoutJS\Controller\Act;

use HTCMage\KnockoutJS\Model\Thuan;
use Magento\Framework\Controller\Result\RedirectFactory;
use HTCMage\KnockoutJS\Model\ResourceModel\Thuan as ResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Add extends Action
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
        $params = $this->getRequest()->getParams();
        $per = $this->person->setData($params);
        $this->resourceModel->save($per);
        
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('knockoutjs/test/main');
        return $redirect;
    }
}