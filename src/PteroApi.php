<?php

namespace Gigabait\PteroApi;

use Gigabait\PteroApi\Aplications\Servers;
use Gigabait\PteroApi\Aplications\Locations;
use Gigabait\PteroApi\Aplications\Allocations;
use Gigabait\PteroApi\Aplications\Databases;
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
    public $databases;
    public $locations;
    public $allocations;
    public $users;
    public $nests;
    public $eggs;
    public $node;

    public $network;

    /**
     * Summary of __construct
     * @param string $api_key
     * @param string $base_url
     * @param string $api_type
     */
    public function __construct(string $api_key, string $base_url, string $api_type = 'application')
    {

        $this->api = $api_key;
        $this->url = $base_url;
        $this->api_type = 'api/' . $api_type;

        // Aplications
        $this->servers = new Servers($this);
        $this->databases = new Databases($this);
        $this->locations = new Locations($this);
        $this->allocations = new Allocations($this);
        $this->users = new Users($this);
        $this->nests = new Nests($this);
        $this->eggs = new Eggs($this);
        $this->node = new Node($this);

        // Client
        $this->network = new Network($this);
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
            $options['form_params'] = $data;
        }
        try {
            $response = $this->client->request($method, $url, $options);
            $responseData = json_decode($response->getBody(), true);
            if ($responseData == null) {
                return true;
            }
            return $responseData;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
