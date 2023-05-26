<?php
namespace HTCMage\KnockoutJS\Controller\Act;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use HTCMage\KnockoutJS\Model\Thuan;

class Delete extends Action
{
    protected $myModelResource;

    public function __construct(
        Context $context,
        Thuan $myModelResource
    ) {
        parent::__construct($context);
        $this->myModelResource = $myModelResource;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParams('id');
        $this->myModelResource->load($id);
        $this->myModelResource->delete($id);

        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('knockoutjs/test/main');
        return $redirect;
    }
}