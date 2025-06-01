<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Console/Command/AlgoliaExportCommand.php
 * Rôle : Commande CLI pour exporter les données Algolia (produits, facettes, index) au format JSON pour migration
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AlgoliaExportCommand extends Command
{
    protected function configure()
    {
        $this->setName('corefinder:algolia:export')
            ->setDescription('Exporte les données Algolia du site Magento (JSON)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Exemple d’export JSON (adapter selon la structure Algolia utilisée)
        $algoliaFile = BP . '/var/algolia_export.json';
        $data = [
            'products' => [], // À récupérer via API Algolia ou base si sauvegardée localement
            'facets'   => [],
            'settings' => [],
        ];
        file_put_contents($algoliaFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $output->writeln('<info>Export Algolia terminé : ' . $algoliaFile . '</info>');
        return Command::SUCCESS;
    }
}
