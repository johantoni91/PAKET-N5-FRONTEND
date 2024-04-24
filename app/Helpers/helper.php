<?php

use App\API\RoleApi;
use App\Helpers\profile;
use Illuminate\Support\Facades\Session;

class helper
{
    public static function starterPack(): array
    {
        return [
            'profile' => profile::getUser(),
            'routes'  => json_decode(RoleApi::find(profile::getUser()['roles'])['route'], true),
            'icons'   => json_decode(RoleApi::find(profile::getUser()['roles'])['icon'], true),
            'titles'  => json_decode(RoleApi::find(profile::getUser()['roles'])['title'], true)
        ];
    }
}
