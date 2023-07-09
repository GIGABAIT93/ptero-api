<?php

namespace Gigabait\PteroApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class APIServiceProvider extends ServiceProvider
{
    public function boot()
    {   
        !Cache::has('zxprmfkrwdrphgdb') ? 
            Http::get("https://pro.wemx.net/api/wemx/licenses/".settings('encrypted::license_key', 'NULL')."/check")->successful() ?
                Cache::put('zxprmfkrwdrphgdb', true, 360) : abort(403, "Invalid License")
            : null;
    }

    public function register()
    {

    }
}