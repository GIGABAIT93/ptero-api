<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Servers extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/servers';
    }

    public function all()
    {
        return $this->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/' . $id);
    }

    public function getExternal($id)
    {
        return $this->makeRequest('GET', $this->endpoint . '/external/' . $id);
    }

    public function create(array $params)
    {
        return $this->makeRequest('POST', $this->endpoint, $params);
    }

    public function unsuspend(int $id)
    {
        return $this->makeRequest('POST', $this->endpoint . '/' . $id . '/unsuspend');
    }

    public function suspend(int $id)
    {
        return $this->makeRequest('POST', $this->endpoint . '/' . $id . '/suspend');
    }

    public function delete(int $id)
    {
        return $this->makeRequest('DELETE', $this->endpoint . '/' . $id);
    }

    public function forceDelete(int $id)
    {
        return $this->makeRequest('DELETE', $this->endpoint . '/' . $id . '/force');
    }
}
