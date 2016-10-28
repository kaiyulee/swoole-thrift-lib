<?php

namespace Container;

class Container
{
    protected static $instance;

    protected static $instances = [];

    private function __construct()
    {
        //
    }

    public static function set($name, $concrete)
    {
        static::$instances[$name] = $concrete;
    }

    public static function get($name)
    {
        return static::$instances[$name];
    }
}
