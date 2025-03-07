<?php

namespace spkm\IsamsApi\Facades;

use Illuminate\Support\Facades\Facade;

class Isams extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'isams';
    }
}
