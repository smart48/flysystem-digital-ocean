<?php

namespace Smart48\FlysystemDoSpaces;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Smart48\FlysystemDoSpaces\FlysystemDoSpaces
 */
class FlysystemDoSpacesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'flysystem-do-spaces';
    }
}
