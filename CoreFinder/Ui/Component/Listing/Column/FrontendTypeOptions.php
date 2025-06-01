<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Ui/Component/Listing/Column/FrontendTypeOptions.php
 * Rôle : Source d’options pour le type d’affichage des facettes (case, slider, dropdown…)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;

class FrontendTypeOptions implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'checkbox', 'label' => __('Case à cocher')],
            ['value' => 'slider',   'label' => __('Slider')],
            ['value' => 'select',   'label' => __('Liste déroulante')],
        ];
    }
}
