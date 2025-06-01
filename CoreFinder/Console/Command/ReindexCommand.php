<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Console/Command/ReindexCommand.php
 * Rôle : Commande CLI pour lancer une réindexation complète via `bin/magento`
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Console\Command;

use Magento\Framework\App\State;
use VP\CoreFinder\Model\Indexer\Reindexer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReindexCommand extends Command
{
    protected $state;
    protected $reindexer;

    public function __construct(
        State $state,
        Reindexer $reindexer
    ) {
        parent::__construct();
        $this->state = $state;
        $this->reindexer = $reindexer;
    }

    protected function configure()
    {
        $this->setName('corefinder:reindex')
            ->setDescription('Réindexe manuellement les produits et facettes pour VP_CoreFinder');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode('adminhtml');
        $result = $this->reindexer->reindexAll();

        $output->writeln('<info>Réindexation terminée : ' . $result . ' entrées mises à jour.</info>');
        return Command::SUCCESS;
    }
}
