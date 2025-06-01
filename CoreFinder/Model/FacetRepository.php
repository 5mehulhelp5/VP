<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/FacetRepository.php
 * Rôle : Gère la récupération, manipulation et filtrage des facettes depuis la base
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model;

use VP\CoreFinder\Model\ResourceModel\Facet\CollectionFactory;

class FacetRepository
{
    protected $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Retourne toutes les facettes actives
     */
    public function getAllFacets()
    {
        return $this->collectionFactory->create()->addFieldToFilter('is_enabled', 1);
    }

    /**
     * Retourne les facettes filtrées par critères de recherche
     */
    public function getFilteredResults(array $filters)
    {
        $collection = $this->collectionFactory->create()->addFieldToFilter('is_enabled', 1);
        foreach ($filters as $attributeCode => $values) {
            $collection->addFieldToFilter($attributeCode, ['in' => $values]);
        }
        return $collection->getData();
    }
}
