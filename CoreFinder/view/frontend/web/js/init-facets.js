/**
 * Module : VP_CoreFinder
 * Fichier : view/frontend/web/js/init-facets.js
 * Rôle : Initialisation automatique des facettes dynamiques au chargement de la page (front)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

define([
    'jquery',
    'coreFinderFacets'
], function ($, initFacets) {
    'use strict';

    return function () {
        $(document).ready(function () {
            if ($('.vp-facets').length) {
                initFacets();
            }
        });
    };
});
