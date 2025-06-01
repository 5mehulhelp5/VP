<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/Facet.php
 * Rôle : Modèle EAV représentant une facette de filtrage
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model;

use Magento\Framework\Model\AbstractModel;

class Facet extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\VP\CoreFinder\Model\ResourceModel\Facet::class);
    }
}
