<?php


namespace OpenWAClient\FileManager;

/**
 * Class Storage
 *
 * @package OpenWAClient\FileManager
 */
class Storage
{
    /**
     * @param     String     $file_name
     *
     * @return bool
     */
    static function exists(String $file_name): bool
    {
        return file_exists($file_name);
    }

    /**
     * @param     String     $file_name
     *
     * @return bool
     */
    static function remove(String $file_name): bool
    {
        return self::exists($file_name) ? unlink($file_name) : false;
    }

    /**
     * @param     String     $file_name
     *
     * @return false|string
     */
    static function read(String $file_name)
    {
        return self::exists($file_name) ? file_get_contents($file_name) : false;
    }
}