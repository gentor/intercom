<?php

namespace Gentor\Intercom\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gentor\Intercom\IntercomService
 */
class Intercom extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'intercom';
    }
}
