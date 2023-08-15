<?php


class TimeHelper
{
    public static function getFormattedTime($time)
    {
        $timestamp = strtotime($time);
        return date('h:i a ', $timestamp);
    }

    public static function getFormattedTime1($time)
    {
        $timestamp = strtotime($time);
        return date('M-y H:i', $timestamp);
    }
}
