<?php
namespace HTCMage\RecommendPopup\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Checkout\Model\Session as CheckoutSession;

class Test extends Template
{
    protected $resourceConnection;
    protected $checkoutSession;

    public function __construct(
        Context $context,
        ResourceConnection $resourceConnection,
        CheckoutSession $checkoutSession,
        array $data = []
    ) {
        $this->resourceConnection = $resourceConnection;
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    public function getProductsData($id)
    {
        $productId = '';
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('catalog_product_link');

        $sql = "SELECT * FROM $tableName WHERE (`product_id` = $id AND `link_type_id` = '17') LIMIT 1";

        $results = $connection->fetchAll($sql);

        foreach ($results as $row) {
            $productId = $row['linked_product_id'];
        }
        return $productId;
    }
}