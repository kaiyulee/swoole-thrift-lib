<?php

namespace ZK;

/**
* service discovery
*/
class ServiceDiscovery
{
    public static $zk;

    public static function setServer($zk)
    {
        self::$zk = $zk;
    }

    public static function discover($service_node)
    {
        $val = self::$zk->get($service_node);

        if (empty($val)) {
            return null;
        }

        return $val;
    }
}
