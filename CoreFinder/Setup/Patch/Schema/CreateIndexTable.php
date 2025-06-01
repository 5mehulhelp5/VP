<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Setup/Patch/Schema/CreateIndexTable.php
 * Rôle : Patch d’installation pour créer la table SQL d’indexation des produits (recherche rapide)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Setup\Patch\Schema;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\DB\Ddl\Table;

class CreateIndexTable implements SchemaPatchInterface
{
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $setup = $this->moduleDataSetup;
        $setup->startSetup();

        if (!$setup->tableExists('vp_corefinder_index')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('vp_corefinder_index')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Index Row ID'
            )->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'ID Produit'
            )->addColumn(
                'store_id',
                Table::TYPE_SMALLINT,
                null,
                ['nullable' => false],
                'ID Boutique'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Nom du produit'
            )->addColumn(
                'sku',
                Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'SKU'
            )->addColumn(
                'attributes',
                Table::TYPE_TEXT,
                '2M',
                ['nullable' => false],
                'Attributs sérialisés'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Dernière mise à jour'
            )->setComment('VP CoreFinder Search Index');

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
