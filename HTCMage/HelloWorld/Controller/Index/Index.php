<?php
namespace HTCMage\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\HTCMage\HelloWorld\Helper\Data $helperData)
	{
		$this->_pageFactory = $pageFactory;
		$this->helperData = $helperData;
		return parent::__construct($context);
	}

	public function execute()
	{
		return $this->_pageFactory->create();
	}
	public function showText(){
		echo $this->helperData->getGeneralConfig('display_text');
		exit();
	}
}