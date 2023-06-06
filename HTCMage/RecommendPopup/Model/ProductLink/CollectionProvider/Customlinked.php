<?php
namespace HTCMage\RecommendPopup\Model\ProductLink\CollectionProvider;
class Customlinked {
    public function getLinkedProducts($product) {
        return $product->getCustomlinkedProducts();
    }
}
