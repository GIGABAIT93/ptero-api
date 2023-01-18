<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Eggs extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/nests';
    }

    public function getAll(int $nest_id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $nest_id . '/eggs?include=nest,servers,variables');
    }

    public function get(int $nest_id, int $id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $nest_id . '/eggs/' . $id . '?include=variables');
    }
}
