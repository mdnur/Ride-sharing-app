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
        return date('d-M H:i', $timestamp);
    }

    public static function getFormattedTime3($time)
    {
        $timestamp = strtotime($time);
        return date('M-y', $timestamp);
    }

    public static function getTimeDiff($date)
    {
        // Get the current time in Unix timestamp format.
        $currentTime = time();

        // Get the booking time in Unix timestamp format.
        $bookingTime = strtotime($date);

        // Calculate the difference between the current time and the booking time.
        $difference = $bookingTime - $currentTime;

        // If the difference is less than 24 hours, then disable the cancel button.
        if ($difference < 43200) {
            return false;
        }
        return true;
    }
    public static function checkTimeDiff($date)
    {
        // Get the current time in Unix timestamp format.
        $currentTime = time();

        // Get the booking time in Unix timestamp format.
        $bookingTime = strtotime($date);

        // Calculate the difference between the current time and the booking time.
        $difference = $bookingTime - $currentTime;

        // If the difference is less than 10 minutes (600 seconds), then disable the cancel button.
        if ($difference < 600) {
            return false;
        }
        return true;
    }


    public static function getFormattedTime4($time)
    {
        $timestamp = strtotime($time);
        return date('d-M-y h:i a', $timestamp);
    }
}
