<?php

namespace Gigabait\PteroApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class APIServiceProvider extends ServiceProvider
{
    public function boot()
    {   
        // if (!Cache::has(♙('WVdwcmMyUnVhMngzWkc1emEyeDNiR3RrWVhOMw=='))) {
        //     if (Schema::hasTable('settings')) {
        //         $exists = DB::table('settings')->where('key', 'encrypted::license_key')->exists();
            
        //         if ($exists) {
        //             if ( !Http::get(♙('WVVoU01HTklUVFpNZVRsb1kwZHJkV1F5Vm5SbFF6VjNZMjA0ZGxsWVFuQk1NMlJzWWxobmRtSkhiR3BhVnpWNldsaE5kZz09').settings(♙('V2xjMWFtTnViSGRrUjFaclQycHdjMkZYVG14aWJrNXNXREowYkdWUlBUMD0='), 'NULL').'/check')->successful()) {
        //                 return abort(403, ♙("VTFjMU1sbFhlSEJhUTBKTllWZE9iR0p1VG13PQ=="));
        //             }
                    
        //             Cache::remember(♙('WVdwcmMyUnVhMngzWkc1emEyeDNiR3RrWVhOMw=='), ♙('VFdwRk1rMUVRVDA9'), fn() => true);
        //         }
        //     }
        // }
    }

    public function register()
    {

    }
}