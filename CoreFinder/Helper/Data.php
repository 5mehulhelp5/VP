<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Helper/Data.php
 * Rôle : Helper principal pour config, logs, sécurité et utilitaires divers du module
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLE = 'corefinder/general/enabled';
    const XML_PATH_MAX_SUGGESTIONS = 'corefinder/general/max_suggestions';
    const XML_PATH_ENABLE_IA = 'corefinder/general/enable_ia';

    public function isEnabled($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getMaxSuggestions($storeId = null)
    {
        return (int)$this->scopeConfig->getValue(self::XML_PATH_MAX_SUGGESTIONS, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function isIaEnabled($storeId = null)
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE_IA, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function log($message, $level = 'info')
    {
        $file = BP . '/var/log/vp_corefinder.log';
        $prefix = '[' . strtoupper($level) . '] ' . date('Y-m-d H:i:s') . ' ';
        @file_put_contents($file, $prefix . $message . PHP_EOL, FILE_APPEND);
    }
}
