<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Allocations extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/nodes';
    }

    /**
     * Summary of get
     * @param int $node_id
     * @param int|null $page
     * @return mixed
     */
    public function get(int $node_id, int $page = null)
    {
        $resp = $this->ptero->makeRequest('GET', $this->endpoint . '/' . $node_id . '/allocations');
        $total_pages = $resp['meta']['pagination']['total_pages'];
        if ($page == null) {
            $resp = $this->ptero->makeRequest('GET', $this->endpoint . '/' . $node_id . '/allocations', ['page' => $total_pages]);
        } else {
            $resp = $this->ptero->makeRequest('GET', $this->endpoint . '/' . $node_id . '/allocations', ['page' => $page]);
        }
        return $resp;
    }

    /**
     * Summary of create
     * @param int $id
     * @param array $params  ['ip' => '0.0.0.0', 'ports' => [25580, 25581]]
     * @return mixed
     */
    public function create(int $id, array $params)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $id . '/allocations', $params);
    }

    /**
     * Summary of delete
     * @param int $id
     * @param int $alloc_id
     * @return mixed
     */
    public function delete(int $node_id, int $allocation_id)
    {
        return $this->ptero->makeRequest('DELETE', $this->endpoint . '/' . $node_id . '/allocations/' . $allocation_id);
    }
}
