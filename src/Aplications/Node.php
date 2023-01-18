<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Node extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/nodes';
    }

    public function getAll()
    {
        return $this->ptero->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $id);
    }

    public function getConf(int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $id . '/configuration');
    }
}
