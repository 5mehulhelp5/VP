<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Observer/AddLayoutHandlesObserver.php
 * Rôle : Observer pour injecter dynamiquement des layout handles (ex : facettes sur pages personnalisées)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddLayoutHandlesObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();
        // Exemple : Ajout d’un handle custom selon la page
        // $layout->getUpdate()->addHandle('corefinder_facets_handle');
        return $this;
    }
}
