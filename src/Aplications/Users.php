<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Users extends PteroAPI
{
    private $endpoint;
    public function __construct()
    {
        $this->endpoint = 'api/' . $this->api_type . '/users';
    }
}
