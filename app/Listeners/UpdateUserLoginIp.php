<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;

class UpdateUserLoginIp
{
    public function handle(Login $event): void
    {
        $user = $event->user;
        $user->CLIENTE_IP = Request::ip();
        $user->save();
    }
}