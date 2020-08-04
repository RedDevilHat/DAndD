<?php

namespace App\Command;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class LoadDataCommand extends Command
{
    private const BASE_URI = 'https://www.dnd5eapi.co';
    private const CACHE_PREFIX_KEY = 'dnd5eapi_';

    protected static $defaultName = 'load-data';

    private HttpClientInterface $httpClient;
    private CacheItemPoolInterface $cache;

    public function __construct(
        HttpClientInterface $httpClient,
        CacheItemPoolInterface $cache,
        string $name = null
    ) {
        parent::__construct($name);
        $this->httpClient = $httpClient;
        $this->cache = $cache;
    }

    protected function configure(): void
    {
        $this
            ->addOption(
                'format',
                null,
                InputOption::VALUE_OPTIONAL,
                'Format (json, csv)',
                'json'
            );
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $io = new SymfonyStyle($input, $output);

        $links = $this->load('/api/', 'links');

        $items = [];
        $total = 0;
        foreach ($links as $link) {
            $items[$link] = $this->load($link, 'link_'.md5($link))['results'];
            $total += count($items[$link]);
        }

        $io->progressStart($total);
        $data = [];
        foreach ($items as $collection) {
            foreach ($collection as $item) {
                $url = $item['url'];
                $data[] = $this->load($url, 'data_'.md5($url));
                $io->progressAdvance();
            }
        }
        $io->progressFinish();
        $io->newLine();

        $format = strtolower((string)$input->getOption('format'));

        if ('csv' === $format) {
            $content = (new CsvEncoder())->encode($data, CsvEncoder::FORMAT);
        } else {
            $content = (new JsonEncoder())->encode($data, JsonEncoder::FORMAT);
        }

        $io->writeln($content);

        return 0;
    }

    private function load(string $path, string $cacheKey): array
    {
        $item = $this->cache->getItem(self::CACHE_PREFIX_KEY.$cacheKey);
        if (!$item->isHit()) {
            $response = $this->httpClient->request('GET', self::BASE_URI.$path);
            usleep(20000);
            $data = $response->toArray();
            $item->set($data);
            $this->cache->save($item);
        } else {
            $data = $item->get();
        }

        return $data;
    }
}
