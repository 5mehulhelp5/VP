/**
 * Module : VP_CoreFinder
 * Fichier : view/frontend/web/js/facets.js
 * Rôle : Gestion AJAX des facettes dynamiques (filtrage sans rechargement)
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

define([
    'jquery',
    'mage/url'
], function ($, urlBuilder) {
    'use strict';

    return function initFacetsAjax() {
        $('.vp-facets input[type="checkbox"]').on('change', function () {
            const selected = {};
            $('.vp-facets input[type="checkbox"]:checked').each(function () {
                const name = $(this).attr('name');
                const value = $(this).val();
                if (!selected[name]) {
                    selected[name] = [];
                }
                selected[name].push(value);
            });

            $.ajax({
                url: urlBuilder.build('corefinder/index/faceted'),
                type: 'POST',
                data: { filters: selected },
                success: function (data) {
                    if (data.productsHtml) {
                        $('.products-grid').html(data.productsHtml);
                    }
                    if (data.updatedFacetsHtml) {
                        $('.vp-facets').html(data.updatedFacetsHtml);
                    }
                },
                error: function () {
                    console.error('Erreur lors de l’actualisation des facettes.');
                }
            });
        });
    };
});
