<?php
namespace HTCMage\Events\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ValidateRegister implements ObserverInterface
{
    protected $actionFlag;
    protected $redirect;
    protected $messageManager;

    public function __construct(
        ActionFlag $actionFlag,
        RedirectInterface $redirect,
        ManagerInterface $messageManager,
		ScopeConfigInterface $scopeConfig
    ) {
		$this->scopeConfig = $scopeConfig;
        $this->actionFlag = $actionFlag;
        $this->redirect = $redirect;
        $this->messageManager = $messageManager;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $controller = $observer->getControllerAction();
        $email = $controller->getRequest()->getParam('email');

		$black_emails =  trim($this->scopeConfig->getValue('events/general/black_email'));
		$list_emails = explode(',', $black_emails);

		foreach ($list_emails as $mail){
			if($email == $mail)
			{
                $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
				$this->messageManager->addErrorMessage(__('You cannot register by this Email'));
				$this->redirect->redirect($controller->getResponse(), 'customer/account/create');
			}
		}
    }
}