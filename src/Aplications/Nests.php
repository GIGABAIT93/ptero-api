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

    /**
     * Summary of pagination
     * @param int $page
     * @return mixed
     */
    public function pagination(int $page)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint, ['page' => $page]);
    }

    /**
     * Summary of all
     * @return mixed
     */
    public function all()
    {
        return $this->ptero->makeRequest('GET', $this->endpoint);
    }

    /**
     * Summary of get
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $id);
    }
}
