<?php
namespace HTCMage\TestModal\Controller\Thuan;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use HTCMage\TestModal\Model\Thuan;

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

        try {
            $this->myModelResource->load($id);
            $this->myModelResource->delete($id);
            $this->messageManager->addSuccessMessage(__("Delete Successfully"));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Can't delete record, Please try again."));
        }

        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('testmodal/test/add');
        return $redirect;
    }
}