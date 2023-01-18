<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Node extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/nodes';
    }

    public function getAll()
    {
        return $this->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $id);
    }

    public function getConf(int $id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $id . '/configuration');
    }
}
