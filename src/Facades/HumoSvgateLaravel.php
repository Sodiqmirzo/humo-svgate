<?php

namespace HumoSvgate\HumoSvgateLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \HumoSvgate\HumoSvgateLaravel\HumoSvgateLaravel
 */
class HumoSvgateLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'humo-svgate-laravel';
    }
}
