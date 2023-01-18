<?php

namespace Gigabait\PteroApi\Client\Server;

use Gigabait\PteroApi\PteroAPI;

class Network extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/servers';
    }

    public function set($server_identifier, int $allocation_id, $params)
    {
        return $this->ptero->makeRequest(
            'POST',
            $this->endpoint . '/' . $server_identifier . '/network/allocations/' . $allocation_id,
            $params
        );
    }
}
