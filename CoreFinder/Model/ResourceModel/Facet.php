<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/ResourceModel/Facet.php
 * Rôle : Modèle de ressource pour la gestion SQL de l’entité Facet
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Facet extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('vp_corefinder_facets', 'facet_id');
    }
}
