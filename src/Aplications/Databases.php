<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Databases extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/servers';
    }

    /**
     * Summary of all
     * @param int $server_id
     * @return mixed
     */
    public function all(int $server_id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $server_id . '/databases?include=password,host');
    }

    /**
     * Summary of get
     * @param int $server_id
     * @param int $db_id
     * @return mixed
     */
    public function get(int $server_id, $db_id)
    {
        return $this->ptero->makeRequest('GET', $this->endpoint . '/' . $server_id . '/databases/' . $db_id);
    }

    /**
     * Summary of create
     * @param int $server_id
     * @param array $params ["database" => "matches", "remote" => "%", "host" => 4]
     * @return mixed
     */
    public function create(int $server_id, array $params)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $server_id . '/databases', $params . '/databases?include=password,host');
    }

    /**
     * Summary of resetPassword
     * @param int $server_id
     * @param mixed $db_id
     * @return mixed
     */
    public function resetPassword(int $server_id, $db_id)
    {
        return $this->ptero->makeRequest('POST', $this->endpoint . '/' . $server_id . '/databases/' . $db_id . '/reset-password');
    }

    /**
     * Summary of delete
     * @param int $server_id
     * @param mixed $db_id
     * @return mixed
     */
    public function delete(int $server_id, int $db_id)
    {
        return $this->ptero->makeRequest('DELETE', $this->endpoint . '/' . $server_id . '/databases/' . $db_id);
    }
}
