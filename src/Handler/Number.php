<?php


namespace OpenWAClient\Handler;


/**
 * Class Number
 *
 * @package OpenWAClient\Handler
 */
class Number
{
    /**
     * @param $number
     *
     * @return string
     */
    static function format($number): string
    {
        return $number . "@c.us";
    }
}