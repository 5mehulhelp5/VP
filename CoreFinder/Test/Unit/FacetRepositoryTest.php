<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Test/Unit/FacetRepositoryTest.php
 * Rôle : Test unitaire de base pour le repository des facettes
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Test\Unit;

use PHPUnit\Framework\TestCase;
use VP\CoreFinder\Model\FacetRepository;
use VP\CoreFinder\Model\ResourceModel\Facet\CollectionFactory;

class FacetRepositoryTest extends TestCase
{
    public function testGetAllFacetsReturnsArray()
    {
        $collectionFactory = $this->createMock(CollectionFactory::class);
        $collectionFactory->method('create')->willReturn([]);
        $repo = new FacetRepository($collectionFactory);

        $this->assertIsIterable($repo->getAllFacets());
    }

    public function testGetFilteredResultsReturnsArray()
    {
        $collectionFactory = $this->createMock(CollectionFactory::class);
        $collectionFactory->method('create')->willReturn([]);
        $repo = new FacetRepository($collectionFactory);

        $this->assertIsIterable($repo->getFilteredResults(['brand' => ['Nike']]));
    }
}
