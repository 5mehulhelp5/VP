<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/ResourceModel/Facet/Collection.php
 * Rôle : Collection de facettes utilisée pour récupérer les filtres actifs/BO
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model\ResourceModel\Facet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \VP\CoreFinder\Model\Facet::class,
            \VP\CoreFinder\Model\ResourceModel\Facet::class
        );
    }
}
