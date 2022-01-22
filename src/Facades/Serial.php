<?php

namespace Codedcell\ViewCreator\Facades;

use Illuminate\Support\Facades\Facade;

class Serial extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'serial';
    }
}
