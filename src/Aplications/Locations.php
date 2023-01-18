<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Locations extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/locations';
    }

    public function getAll()
    {
        return $this->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $id);
    }
}
