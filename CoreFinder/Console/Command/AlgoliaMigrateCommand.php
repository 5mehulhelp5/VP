<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Console/Command/AlgoliaMigrateCommand.php
 * Rôle : Commande CLI pour importer/migrer les données exportées d’Algolia dans CoreFinder
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Console\Command;

use Magento\Framework\App\State;
use VP\CoreFinder\Model\FacetRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AlgoliaMigrateCommand extends Command
{
    protected $state;
    protected $facetRepository;

    public function __construct(
        State $state,
        FacetRepository $facetRepository
    ) {
        parent::__construct();
        $this->state = $state;
        $this->facetRepository = $facetRepository;
    }

    protected function configure()
    {
        $this->setName('corefinder:algolia:migrate')
            ->setDescription('Importe les données Algolia exportées dans CoreFinder');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode('adminhtml');
        $algoliaFile = BP . '/var/algolia_export.json';
        if (!file_exists($algoliaFile)) {
            $output->writeln('<error>Fichier d’export Algolia non trouvé : ' . $algoliaFile . '</error>');
            return Command::FAILURE;
        }
        $data = json_decode(file_get_contents($algoliaFile), true);

        // Exemple : migration des facettes (à adapter selon structure réelle)
        if (!empty($data['facets'])) {
            foreach ($data['facets'] as $facet) {
                // À spécialiser : $this->facetRepository->import($facet);
            }
        }

        $output->writeln('<info>Migration Algolia -> CoreFinder terminée.</info>');
        return Command::SUCCESS;
    }
}
