<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Setup/Patch/Schema/CreateFacetsTable.php
 * Rôle : Patch d’installation pour créer la table SQL des facettes dans Magento
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Setup\Patch\Schema;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\DB\Ddl\Table;

class CreateFacetsTable implements SchemaPatchInterface
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

        if (!$setup->tableExists('vp_corefinder_facets')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('vp_corefinder_facets')
            )->addColumn(
                'facet_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Facet ID'
            )->addColumn(
                'attribute_code',
                Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Attribute Code'
            )->addColumn(
                'label',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Label affiché'
            )->addColumn(
                'position',
                Table::TYPE_INTEGER,
                null,
                ['nullable' => false, 'default' => 0],
                'Ordre d’affichage'
            )->addColumn(
                'frontend_type',
                Table::TYPE_TEXT,
                32,
                ['nullable' => false, 'default' => 'checkbox'],
                'Type de rendu (checkbox, slider, select)'
            )->addColumn(
                'color_code',
                Table::TYPE_TEXT,
                16,
                ['nullable' => true],
                'Couleur HEX'
            )->addColumn(
                'icon_url',
                Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'URL icône'
            )->addColumn(
                'is_enabled',
                Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => 1],
                'Facette active ?'
            )->setComment('VP CoreFinder Facets Table');

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
