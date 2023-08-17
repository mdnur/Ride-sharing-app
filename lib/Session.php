<?php

namespace lib;

date_default_timezone_set("Asia/Dhaka");

class Session
{


    public static function init(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // session_start();
    }

    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }


    public static function get($key)
    {
        return $_SESSION[$key] ?? FALSE;
    }

    public static function checkSession(): void
    {

        self::init();
        if (!self::get("login")) {
            self::destory();
            header("location:login.php");
        }
    }
    public static function CheckAdminSession(): void
    {
        self::init();
        if (!self::get("adminLogin")) {
            self::destory();
            header("location:login.php");
        }
    }

    public static function ifLogin()
    {
        if (!self::get("login")) {
            self::init();
        }
        if (self::get("login")) {
            return true;
        }
    }
    public static function checkLogin()
    {
        self::init();
        if (self::get("login")) {
            header("location:home.php");
        }
    }

    public static function CheckDriverSession(): void
    {
        self::init();
        if (!self::get("driverLogin")) {
            self::destory();
            header("location:login.php");
        }
    }
    public static function checkDriverLogin()
    {
        self::init();
        if (self::get("driverLogin")) {
            header("location:index.php");
        }
    }




    public static function checkAdminLogin()
    {
        self::init();
        if (self::get("adminLogin")) {
            header("location:index.php");
        }
    }

    public static function destory(): void
    {
        session_destroy();
        session_unset();
        //        header("Location:login.php?action=logout");
    }

    public static function getName($role)
    {
        return Session::get($role)['name'];
    }
}
