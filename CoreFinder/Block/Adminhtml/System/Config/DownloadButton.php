<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Block/Adminhtml/System/Config/DownloadButton.php
 * Rôle : Affiche un bouton dans le back-office pour lancer le téléchargement du modèle IA ONNX
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\UrlInterface;

class DownloadButton extends Field
{
    protected $_template = 'VP_CoreFinder::system/config/download_button.phtml';
    protected $urlBuilder;

    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $data);
    }

    /**
     * Génère le bouton HTML
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    /**
     * Retourne l'URL pour lancer le téléchargement du modèle ONNX
     */
    public function getDownloadUrl()
    {
        return $this->urlBuilder->getUrl('corefinder/system/downloadModel');
    }
}
