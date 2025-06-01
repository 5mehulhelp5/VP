<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/Indexer/Reindexer.php
 * Rôle : Réindexation manuelle ou automatique des facettes et produits pour CoreFinder
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model\Indexer;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\ResourceConnection;

class Reindexer
{
    protected $productCollectionFactory;
    protected $storeManager;
    protected $resource;

    public function __construct(
        CollectionFactory $productCollectionFactory,
        StoreManagerInterface $storeManager,
        ResourceConnection $resource
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->storeManager = $storeManager;
        $this->resource = $resource;
    }

    public function reindexAll(): int
    {
        $connection = $this->resource->getConnection();
        $indexTable = $this->resource->getTableName('vp_corefinder_index');
        $connection->truncateTable($indexTable);

        $stores = $this->storeManager->getStores();
        $totalIndexed = 0;

        foreach ($stores as $store) {
            $collection = $this->productCollectionFactory->create();
            $collection->addStoreFilter($store);
            $collection->addAttributeToSelect('*');
            $collection->addFieldToFilter('status', 1);
            $collection->addFieldToFilter('visibility', ['neq' => 1]);

            foreach ($collection as $product) {
                $row = [
                    'product_id' => $product->getId(),
                    'store_id'   => $store->getId(),
                    'name'       => $product->getName(),
                    'sku'        => $product->getSku(),
                    'attributes' => json_encode($product->getData()),
                    'updated_at' => (new \DateTime())->format('Y-m-d H:i:s')
                ];

                $connection->insert($indexTable, $row);
                $totalIndexed++;
            }
        }

        return $totalIndexed;
    }
}
