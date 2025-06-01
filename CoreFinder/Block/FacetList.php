<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Block/FacetList.php
 * Rôle : Bloc frontend pour afficher les facettes dynamiques sur le site (catégories, recherche…)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Block;

use Magento\Framework\View\Element\Template;
use VP\CoreFinder\Model\FacetRepository;

class FacetList extends Template
{
    protected $facetRepository;

    public function __construct(
        Template\Context $context,
        FacetRepository $facetRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->facetRepository = $facetRepository;
    }

    /**
     * Retourne les facettes actives configurées dans le BO
     */
    public function getFacets()
    {
        return $this->facetRepository->getAllFacets();
    }
}
