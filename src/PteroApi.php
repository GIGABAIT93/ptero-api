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
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

/**
 * @property-read Servers $servers
 * @property-read Databases $databases
 * @property-read Locations $locations
 * @property-read Allocations $allocations
 * @property-read Users $users
 * @property-read Nests $nests
 * @property-read Eggs $eggs
 * @property-read Node $node
 * @property-read Network $network
 */

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

        $method = strtolower($method);
        $allowedMethods = ['get', 'post', 'put', 'delete'];
        
        if (!in_array($method, $allowedMethods)) {
            throw new \InvalidArgumentException('Invalid HTTP method.');
        }

        $headers = [
            'Authorization' => 'Bearer ' . settings('pterodactyl::api_key'),
            'Accept' => 'application/json',
        ];
        
        $response = Http::withHeaders($headers)->$method(settings('pterodactyl::api_url'). '/' . $url, $data);
        return $response;
    }
}
