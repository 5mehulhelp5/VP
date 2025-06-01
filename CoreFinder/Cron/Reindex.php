<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Cron/Reindex.php
 * Rôle : Tâche planifiée pour la réindexation automatique des facettes et suggestions
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Cron;

use VP\CoreFinder\Model\Indexer\Reindexer;

class Reindex
{
    protected $reindexer;

    public function __construct(Reindexer $reindexer)
    {
        $this->reindexer = $reindexer;
    }

    /**
     * Exécuté via le cron : vp_corefinder_cron_reindex
     */
    public function execute()
    {
        $this->reindexer->reindexAll();
    }
}
