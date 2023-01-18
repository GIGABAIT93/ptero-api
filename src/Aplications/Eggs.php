<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Eggs extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/nests';
    }

    public function getAll(int $nest_id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $nest_id . '/eggs?include=nest,servers,variables');
    }

    public function get(int $nest_id, int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $nest_id . '/eggs/' . $id . '?include=variables');
    }
}
