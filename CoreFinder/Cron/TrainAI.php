<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Cron/TrainAI.php
 * Rôle : Tâche planifiée (cron) pour améliorer l’apprentissage IA à partir des logs de recherche
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Cron;

use VP\CoreFinder\Helper\Ai;

class TrainAI
{
    protected $aiHelper;

    public function __construct(Ai $aiHelper)
    {
        $this->aiHelper = $aiHelper;
    }

    /**
     * Exécuté chaque nuit pour faire évoluer le modèle local (si logs présents)
     */
    public function execute()
    {
        $this->aiHelper->autoTrain();
    }
}
