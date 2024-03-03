<?php

namespace Juiko\PhosphorIcon\Facades;

use Illuminate\Support\Facades\Facade;

class PhosphorIconFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'phosphoriconservice';
    }
}
