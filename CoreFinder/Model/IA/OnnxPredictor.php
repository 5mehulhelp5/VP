<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Model/IA/OnnxPredictor.php
 * Rôle : Inférence locale du modèle ONNX (suggestions IA, corrections, etc.)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Model\IA;

use Ort\RuntimeEnvironment;
use Ort\Session;
use Ort\Tensor;
use Magento\Framework\App\Filesystem\DirectoryList;

class OnnxPredictor
{
    protected $session;
    protected $modelPath;

    public function __construct(DirectoryList $directoryList)
    {
        $this->modelPath = $directoryList->getPath(DirectoryList::VAR_DIR) . '/corefinder/vp_search.onnx';
        $this->loadModel();
    }

    protected function loadModel()
    {
        if (!file_exists($this->modelPath)) {
            throw new \Exception("Modèle ONNX introuvable : {$this->modelPath}");
        }

        $env = new RuntimeEnvironment();
        $this->session = new Session($env, $this->modelPath);
    }

    public function predict(string $input): array
    {
        $inputTensor = Tensor::createFromStrings([$input]);
        $results = $this->session->run(['input' => $inputTensor]);
        return $results['output']->toArray(); // À adapter /!\
    }
}
