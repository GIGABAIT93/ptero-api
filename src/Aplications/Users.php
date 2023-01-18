<?php

namespace Gigabait\PteroApi\Aplications;

use Gigabait\PteroApi\PteroAPI;

class Users extends PteroAPI
{
    private $endpoint;
    protected $ptero;
    public function __construct(PteroAPI $ptero)
    {
        $this->ptero = $ptero;
        $this->endpoint = $ptero->api_type . '/users';
    }
}
