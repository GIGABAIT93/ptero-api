<?php

namespace Gigabait\PteroApi\Client\Server;

use Gigabait\PteroApi\PteroAPI;

class Database extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/servers';
    }

    /**
     * Summary of get
     * @param string $uuidShort
     * @return mixed
     */
    public function get(string $uuidShort)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $uuidShort . '/databases');
    }

    /**
     * Summary of set
     * @param string $database
     * @param string $remote
     * @return mixed
     */
    public function create(string $database, string $remote = "%")
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $uuidShort . '/databases');
    }
}
