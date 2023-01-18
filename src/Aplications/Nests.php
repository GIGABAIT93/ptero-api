<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Nests extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/nests';
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
