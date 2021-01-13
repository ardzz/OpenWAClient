<?php


namespace OpenWAClient\FileManager;


class Media
{
    private static function getMimeType(String $filename)
    {
        return Storage::exists($filename) ? mime_content_type($filename) : false;
    }

    static function fileToBase64(String $filename)
    {
        return Storage::exists($filename) ? base64_encode(Storage::read($filename)) : false;
    }

    static function format(String $filename)
    {
        if (Storage::exists($filename) && self::isImage($filename)){
            return sprintf("data:%s;base64,%s", self::getMimeType($filename), self::fileToBase64($filename));
        }
        return false;
    }

    static function formatFile(String $filename)
    {
        if (Storage::exists($filename)){
            return sprintf("data:%s;base64,%s", self::getMimeType($filename), self::fileToBase64($filename));
        }
        return false;
    }

    private static function isImage(string $filename): bool
    {
        if (Storage::exists($filename)){
            $image = getimagesize($filename);
            $allowed = [IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP];
            return $image ? in_array($image[2], $allowed) : false;
        }
        return false;
    }
}