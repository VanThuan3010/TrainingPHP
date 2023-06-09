<?php
namespace HTCMage\RecommendPopup\Plugin;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Related as RelatedParent;
use Magento\Ui\Component\Form\Fieldset;

class Related extends RelatedParent {
    const GROUP_RELATED = 'related';
    const DATA_SCOPE_CUSTOMLINKED = 'customlinked';
    private $priceModifier;
    protected $product;

    public function afterModifyMeta($modify, $result) {
        if (isset($result[static::GROUP_RELATED]['children'])) {
            $result[static::GROUP_RELATED]['children'][$modify->scopePrefix . static::DATA_SCOPE_CUSTOMLINKED] = $this->getCustomlinkedFieldset($modify);
        }
        return $result;
    }
    private function getPriceModifier($modify) {
        if (!$this->priceModifier) {
            $this->priceModifier = \Magento\Framework\App\ObjectManager::getInstance()->get(
                    \Magento\Catalog\Ui\Component\Listing\Columns\Price::class
            );
        }
        return $this->priceModifier;
    }
    protected function getCustomlinkedFieldset($modify) {
        $content = __(
                'List suggest for this Product'
        );
        return [
            'children' => [
                'button_set' => $modify->getButtonSet(
                        $content, __('Add Suggest Product'), $modify->scopePrefix . static::DATA_SCOPE_CUSTOMLINKED
                ),
                'modal' => $this->getGenericModal(
                        __('Add Suggest Product'), $modify->scopePrefix . static::DATA_SCOPE_CUSTOMLINKED
                ),
                static::DATA_SCOPE_CUSTOMLINKED => $this->getGrid($modify->scopePrefix . static::DATA_SCOPE_CUSTOMLINKED),
            ],
            'arguments' => [
                'data' => [
                    'config' => [
                        'additionalClasses' => 'admin__fieldset-section',
                        'label' => __('Suggest Product'),
                        'collapsible' => false,
                        'componentType' => Fieldset::NAME,
                        'dataScope' => '',
                        'sortOrder' => 11,
                    ],
                ],
            ]
        ];
    }
    public function afterModifyData($modify , $data)
    {
        $product = $modify->locator->getProduct();
        $productId = $product->getId();

        if (!$productId) {
            return $data;
        }
        $priceModifier = $this->getPriceModifier($modify);
        $priceModifier->setData('name', 'price');
        $dataScopes = $this->getDataScopes();
        $dataScopes[] = static::DATA_SCOPE_CUSTOMLINKED;
        foreach ($dataScopes as $dataScope) {
            if($dataScope == static::DATA_SCOPE_CUSTOMLINKED){
            $data[$productId]['links'][$dataScope] = [];
            foreach ($modify->productLinkRepository->getList($product) as $linkItem) {
                if ($linkItem->getLinkType() !== $dataScope) {
                    continue;
                }
                $linkedProduct = $modify->productRepository->get(
                    $linkItem->getLinkedProductSku(),
                    false,
                    $modify->locator->getStore()->getId()
                );
                $data[$productId]['links'][$dataScope][] = $this->fillData($linkedProduct, $linkItem);
            }
            if (!empty($data[$productId]['links'][$dataScope])) {
                $dataMap = $priceModifier->prepareDataSource([
                    'data' => [
                        'items' => $data[$productId]['links'][$dataScope]
                    ]
                ]);
                $data[$productId]['links'][$dataScope] = $dataMap['data']['items'];
            }
        }
        }
        
        return $data;
    }
    public function beforeGetLinkedProducts($provider, $product) {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $this->product = $objectManager->create('HTCMage\RecommendPopup\Model\Product');
        $currentProduct = $this->product->load($product->getId());
        return [$currentProduct];
    }

}
