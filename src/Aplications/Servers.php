<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Servers extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/servers';
    }

    public function all()
    {
        return $this->ptero->makeRequest('GET', $this->endpoint);
    }

    public function get(int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $id);
    }

    public function getExternal($id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/external/' . $id);
    }

    public function create(array $params)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint, $params);
    }

    public function unsuspend(int $id)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $id . '/unsuspend');
    }

    public function suspend(int $id)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $id . '/suspend');
    }

    public function delete(int $id)
    {
        return $this->ptero->makeRequest('DELETE', $this->endpoint . '/' . $id);
    }

    public function forceDelete(int $id)
    {
        return $this->ptero->makeRequest('DELETE', $this->endpoint . '/' . $id . '/force');
    }
}
