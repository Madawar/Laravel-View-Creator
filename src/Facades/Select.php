<?php

namespace Codedcell\ViewCreator\Facades;

use Illuminate\Support\Facades\Facade;

class Select extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'select';
    }
}
