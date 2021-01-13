<?php


namespace OpenWAClient\Handler;


class Number
{
    static function format($number): string
    {
        return $number . "@c.us";
    }

    static function vCardFormat($number): string
    {
        return "+" . $number;
    }
}