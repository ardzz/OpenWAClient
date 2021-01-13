<?php


namespace OpenWAClient\FileManager;

class Storage
{
    static function exists(String $file_name): bool
    {
        return file_exists($file_name);
    }

    static function remove(String $file_name): bool
    {
        return self::exists($file_name) ? unlink($file_name) : false;
    }

    static function read(String $file_name)
    {
        return self::exists($file_name) ? file_get_contents($file_name) : false;
    }
}