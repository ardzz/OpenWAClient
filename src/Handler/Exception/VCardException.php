<?php


namespace OpenWAClient\Handler\Exception;


class VCardException extends \Exception
{
    public static function elementAlreadyExists($element): VCardException
    {
        return new self('You can only set "' . $element . '" once.');
    }

    public static function emptyURL(): VCardException
    {
        return new self('Nothing returned from URL.');
    }

    public static function invalidImage(): VCardException
    {
        return new self('Returned data is not an image.');
    }

    public static function outputDirectoryNotExists(): VCardException
    {
        return new self('Output directory does not exist.');
    }
}