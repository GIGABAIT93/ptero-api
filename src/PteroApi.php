<?php

namespace Gigabait\PteroApi;

use Gigabait\PteroApi\Aplications\Servers;
use Gigabait\PteroApi\Aplications\Locations;
use Gigabait\PteroApi\Aplications\Allocations;
use Gigabait\PteroApi\Aplications\Users;
use Gigabait\PteroApi\Aplications\Nests;
use Gigabait\PteroApi\Aplications\Eggs;
use Gigabait\PteroApi\Aplications\Node;

use Gigabait\PteroApi\Client\Server\Network;

use GuzzleHttp\Client;

class PteroAPI
{
    protected $api;
    protected $url;
    protected $api_type;
    protected $client;

    public $servers;
    public $locations;
    public $allocations;
    public $users;
    public $nests;
    public $eggs;
    public $node;

    public $network;

    public function __construct($api_key, $base_url, $api_type = 'application')
    {

        $this->api = $api_key;
        $this->url = $base_url;
        $this->api_type = $api_type;

        // Aplications
        $this->servers = new Servers();
        $this->locations = new Locations();
        $this->allocations = new Allocations();
        $this->users = new Users();
        $this->nests = new Nests();
        $this->eggs = new Eggs();
        $this->node = new Node();

        // Client
        $this->network = new Network();
    }

    protected function makeRequest($method, $url, $data = null)
    {
        $this->client = new Client([
            'base_uri' => $this->url,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->api
            ]
        ]);
        $options = [];
        if (!is_null($data)) {
            $options['json'] = $data;
        }
        $response = $this->client->request($method, $url, $options);
        $responseData = json_decode($response->getBody(), true);
        return $responseData;
    }
}
