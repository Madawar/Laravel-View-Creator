<?php

namespace Codedcell\ViewCreator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codedcell\ViewCreator\Skeleton\SkeletonClass
 */
class ViewCreatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'view-creator';
    }
}
