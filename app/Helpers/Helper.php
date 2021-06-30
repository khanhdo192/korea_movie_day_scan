<?php
/**
 * @Author	HaiNM - VTT - BreadnTea
 * @Mail	nguyenminhhai@breadntea.vn
 */
namespace App\Helpers;

class Helper
{
    private static $instances = [];

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize');
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
}