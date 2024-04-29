<?php

use App\API\RoleApi;
use App\Helpers\profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class helper
{
    public static function starterPack(): array
    {
        return [
            'profile' => Session::get('data'),
            'routes'  => json_decode(RoleApi::find(Session::get('data')['roles'])['route'], true),
            'icons'   => json_decode(RoleApi::find(Session::get('data')['roles'])['icon'], true),
            'titles'  => json_decode(RoleApi::find(Session::get('data')['roles'])['title'], true)
        ];
    }
}
