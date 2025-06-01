<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Controller/Index/Faceted.php
 * Rôle : Contrôleur frontend pour les requêtes AJAX de filtrage à facettes
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use VP\CoreFinder\Model\FacetRepository;

class Faceted extends Action
{
    protected $resultJsonFactory;
    protected $facetRepository;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        FacetRepository $facetRepository
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->facetRepository = $facetRepository;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        try {
            $filters = $this->getRequest()->getParam('filters', []);
            $facets = $this->facetRepository->getFilteredResults($filters);
            return $result->setData([
                'success' => true,
                'data' => $facets
            ]);
        } catch (\Exception $e) {
            return $result->setData([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}
