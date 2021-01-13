<?php


namespace OpenWAClient\Handler\Exception;


class OpenWAException extends \Exception
{
    public static function elementAlreadyExists($element): OpenWAException
    {
        return new self('You can only set "' . $element . '" once.');
    }

    public static function emptyURL(): OpenWAException
    {
        return new self('Nothing returned from URL.');
    }

    public static function invalidImage(): OpenWAException
    {
        return new self('Returned data is not an image.');
    }

    public static function outputDirectoryNotExists(): OpenWAException
    {
        return new self('Output directory does not exist.');
    }
}