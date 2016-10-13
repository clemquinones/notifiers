<?php

namespace Clem\Notifiers;


use Illuminate\Support\Facades\Facade;

class Flash extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'flash';
    }
}