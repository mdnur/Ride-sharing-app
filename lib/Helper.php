<?php

namespace lib;

class Helper{
    public static function header($location){
        echo "<script>window.location.href='$location';</script>";
    }
}