<?php
namespace HTCMage\HelloWorld\Block;
class Test extends \Magento\Framework\View\Element\Template
{	
	public function getEnableTitle()
    {
        return $this->_scopeConfig->getValue('helloworld/general/display_text');
    }
	public function getNumRes()
    {
        return $this->_scopeConfig->getValue('helloworld/numberresult/list_mode');
    }
	public function getText($text) {
		return 'hiển thị '.$text;
	}
	
}
