<?php
namespace HTCMage\Events\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
class ValidateLogin implements ObserverInterface
{
    private $url;
    private $customerSession;
    private $messageManager;
	protected $scopeConfig;
    protected $actionFlag;
    protected $redirect;

    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        ActionFlag $actionFlag,
        RedirectInterface $redirect,
    ) {
        $this->responseFactory = $responseFactory;
        $this->messageManager = $messageManager;
		$this->scopeConfig = $scopeConfig;
        $this->actionFlag = $actionFlag;
        $this->redirect = $redirect;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $controller = $observer->getControllerAction();
        $customer = $controller->getRequest()->getParam('login')['username'];

		$black_emails =  trim($this->scopeConfig->getValue('events/general/black_email'));
		$list_emails = explode(',', $black_emails);

		foreach ($list_emails as $mail){
			if($customer == $mail)
			{
                $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
				$this->messageManager->addErrorMessage(__('You cannot login by this Email'));
                $this->redirect->redirect($controller->getResponse(), 'customer/account/login');
			}
		}
    }
}