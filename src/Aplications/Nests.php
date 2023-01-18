<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Nests extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/nests';
    }

    public function getAll()
    {
        return $this->ptero->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $id);
    }
}
