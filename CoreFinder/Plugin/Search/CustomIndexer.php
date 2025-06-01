<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Plugin/Search/CustomIndexer.php
 * Rôle : Plugin sur l’indexation standard Magento pour inclure la logique CoreFinder (facettes, suggestions, etc.)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Plugin\Search;

use Magento\CatalogSearch\Model\Indexer\Fulltext as MagentoFulltext;

class CustomIndexer
{
    /**
     * Ajoute des traitements supplémentaires lors de l’indexation
     */
    public function afterExecuteFull(MagentoFulltext $subject, $result)
    {
        // Ex : Mise à jour des tables d’index de CoreFinder, rafraîchissement des suggestions IA, etc.
        // $this->reindexFacets();
        return $result;
    }
}
