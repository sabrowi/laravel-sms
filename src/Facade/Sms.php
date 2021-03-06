<?php

namespace Firmantr3\Sms\Facade;

use RuntimeException;
use Illuminate\Support\Facades\Facade;

class Sms extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'sms-service';
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (! $instance) {
            throw new RuntimeException('A facade root has not been set.');
        }

        if (count($args) === 1) {
            return $instance->$method($args[0]);
        }

        return $instance->$method(...$args);
    }
}
