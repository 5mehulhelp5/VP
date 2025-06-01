<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Setup/Patch/Data/ImportAlgoliaData.php
 * Rôle : Patch de migration pour importer les données Algolia dans les tables CoreFinder
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class ImportAlgoliaData implements DataPatchInterface
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

        $algoliaFile = BP . '/var/algolia_export.json';
        if (!file_exists($algoliaFile)) {
            $setup->endSetup();
            return;
        }
        $data = json_decode(file_get_contents($algoliaFile), true);

        // Exemple : importer les facettes Algolia
        if (!empty($data['facets'])) {
            $facetsTable = $setup->getTable('vp_corefinder_facets');
            foreach ($data['facets'] as $facet) {
                $row = [
                    'attribute_code' => $facet['attribute_code'] ?? '',
                    'label'          => $facet['label'] ?? '',
                    'position'       => $facet['position'] ?? 0,
                    'frontend_type'  => $facet['frontend_type'] ?? 'checkbox',
                    'color_code'     => $facet['color_code'] ?? null,
                    'icon_url'       => $facet['icon_url'] ?? null,
                    'is_enabled'     => 1,
                ];
                $setup->getConnection()->insert($facetsTable, $row);
            }
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
