<?php


namespace App\Util\Client;


use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class DNDAPIClient
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * DNDAPIClient constructor.
     * @param HttpClientInterface $dnd
     */
    public function __construct(HttpClientInterface $dnd)
    {
        $this->client = $dnd;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function makeRequest(string $method, string $url, array $options = []): ResponseInterface
    {
        return $this->client->request($method,$url,$options);
    }
}