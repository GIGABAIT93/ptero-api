<?php

namespace Gigabait\PteroApi\Client\Server;

use Gigabait\PteroApi\PteroAPI;

class Network extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/servers';
    }

    public function set($server_identifier, int $allocation_id, $params)
    {
        return $this->makeRequest(
            'POST',
            $this->endpoint . '/' . $server_identifier . '/network/allocations/' . $allocation_id,
            $params
        );
    }
}
