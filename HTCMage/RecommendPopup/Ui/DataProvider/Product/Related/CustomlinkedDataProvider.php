<?php

namespace HTCMage\RecommendPopup\Ui\DataProvider\Product\Related;
use Magento\Catalog\Ui\DataProvider\Product\Related\AbstractDataProvider;
class CustomlinkedDataProvider extends AbstractDataProvider
{
    protected function getLinkType()
    {
        return 'customlinked';
    }
}
