<?php

namespace lib;

class Session{


    public static function init(): void
    {
        session_start();
    }

    public static function set($key,$value): void
    {
        $_SESSION[$key] =$value;
    }


    public static function get ($key) {
        return $_SESSION[$key] ?? FALSE;
    }

    public static function checkSession(): void
    {
        self::init();
        if(!self::get("login")){
            self:: destory();
           header("location:login.php");
        }
    }


    public static function checkLogin() {
        self::init();
        if(self::get("login")){
           header("location:index.php");
        }
    }

    public static function destory(): void
    {
        session_destroy();
        session_unset();
//        header("Location:login.php?action=logout");
    }

}