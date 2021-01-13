<?php


namespace OpenWAClient\Handler;


class Number
{
    static function format($number): string
    {
        return $number . "@c.us";
    }
}