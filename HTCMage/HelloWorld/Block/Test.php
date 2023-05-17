<?php
namespace HTCMage\HelloWorld\Block;
class Test extends \Magento\Framework\View\Element\Template
{	
	// public function __construct(\HTCMage\HelloWorld\Helper\Data $helperData)
	// {
	// 	$this->helperData = $helperData;
	// }
	// public function showText(){
	// 	echo $this->helperData->getGeneralConfig('display_text');
	// 	exit();
	// }
	public function getText($text) {
		return 'hiển thị '.$text;
	}
	
}
