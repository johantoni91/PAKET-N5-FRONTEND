<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class log
{
    public static function insert(): array
    {
        $agent = new Agent();
        return [
            'users_id'          => profile::getUser()['id'],
            'username'          => profile::getUser()['users']['username'],
            'browser'           => $agent->browser(),
            'browser_version'   => $agent->version($agent->browser()),
            'os'                => $agent->platform(),
            'ip_address'        => Request::ip(),
            'mobile'            => $agent->device(),
        ];
    }
}
