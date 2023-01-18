<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Allocations extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/nodes';
    }

    public function get(int $id, int $page = null)
    {
        $resp = $this->makeRequest('GET', $this->endpoint . '/' . $id . '/allocations');
        $total_pages = $resp['meta']['pagination']['total_pages'];
        if ($page == null) {
            $resp = $this->makeRequest('GET', $this->endpoint . '/' . $id . '/allocations', ['page' => $total_pages]);
        } else {
            $resp = $this->makeRequest('GET', $this->endpoint . '/' . $id . '/allocations', ['page' => $page]);
        }
        return $resp;
    }

    public function create(int $id, array $params)
    {
        return $this->makeRequest('POST', $this->endpoint . '/' . $id . '/allocations', $params);
    }

    public function delete(int $id, int $alloc_id)
    {
        return $this->makeRequest('DELETE', $this->endpoint . '/' . $id . '/allocations/' . $alloc_id);
    }
}
