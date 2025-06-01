<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Helper/Ai.php
 * Rôle : Aide pour l’IA embarquée (gestion du modèle, entraînement, suggestions)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Helper;

use VP\CoreFinder\Model\IA\OnnxPredictor;

class Ai
{
    protected $onnxPredictor;

    public function __construct(OnnxPredictor $onnxPredictor)
    {
        $this->onnxPredictor = $onnxPredictor;
    }

    /**
     * Fait une suggestion automatique sur base IA
     */
    public function suggest($query)
    {
        return $this->onnxPredictor->predict($query);
    }

    /**
     * Entraîne le modèle IA local (exemple : logs de recherches, apprentissage supervisé)
     * NB : Méthode illustrative, à spécialiser selon stratégie IA.
     */
    public function autoTrain()
    {
        // Récupérer les logs de recherches
        // Mettre à jour le modèle local (ONNX ou fallback)
        // Ex : $this->onnxPredictor->train($dataset);
        return true;
    }
}
