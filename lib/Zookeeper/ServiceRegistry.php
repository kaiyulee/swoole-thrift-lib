<?php

namespace ZK;

use ZK\Service;
use ZK\ZK;

/**
 * Service registry
 */
class ServiceRegistry
{
    
    private static $services = [];

    public static function register($name, Service $service)
    {
        self::$services[$name] = $service;

        $path = $service->getNodePath();
        $val = $service->getNodeValue();

        return $this->set($path, $val); // mixed | null
    }

    public static function deregister($name)
    {
        if (isset(self::$services[$name])) {

            if (!(self::$serivice[$name] instanceof Service)) {
                throw new Exception("not a service object", 1);
                return false;
            }

            $path = self::$service[$name]->getNodePath();

            $empty = empty($this->getChildren($path));
            
            if (!$empty) {
                throw new Exception("not a empty node", 1);
                return false; 
            }

            unset(self::$services[$name]);

            return $this->deleteNode($path); // true | null
        }

        return true;
    }
}