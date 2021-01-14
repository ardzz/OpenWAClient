<?php


namespace OpenWAClient\Handler\Exception;


use Exception;

/**
 * Class VCardException
 *
 * @package OpenWAClient\Handler\Exception
 */
class VCardException extends Exception
{
    /**
     * @param $element
     *
     * @return VCardException
     */
    public static function elementAlreadyExists($element): VCardException
    {
        return new self('You can only set "' . $element . '" once.');
    }

    /**
     * @return VCardException
     */
    public static function emptyURL(): VCardException
    {
        return new self('Nothing returned from URL.');
    }

    /**
     * @return VCardException
     */
    public static function invalidImage(): VCardException
    {
        return new self('Returned data is not an image.');
    }

    /**
     * @return VCardException
     */
    public static function outputDirectoryNotExists(): VCardException
    {
        return new self('Output directory does not exist.');
    }
}