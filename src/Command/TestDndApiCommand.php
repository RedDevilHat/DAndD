<?php

namespace App\Command;

use App\Util\Client\DNDAPIClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TestDndApiCommand extends Command
{
    protected static $defaultName = 'app:test:dnd-api';
    /**
     * @var DNDAPIClient
     */
    private $client;

    /**
     * TestDndApiCommand constructor.
     * @param DNDAPIClient $client
     */
    public function __construct(DNDAPIClient $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    protected function configure()
    {
        $this
            ->setDescription('Test DND Api Client')
            ->addArgument('method', InputArgument::REQUIRED, 'method')
            ->addArgument('url', InputArgument::REQUIRED, 'URL')

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $method = $input->getArgument('method');
        $url = $input->getArgument('url');

        $io->block(sprintf('%s %s', $method, $url));
        $io->success($this->client->makeRequest($method, $url)->getContent());

        return 0;
    }
}
